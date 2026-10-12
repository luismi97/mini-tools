import { track } from './analytics';
import { LIMITS, canPreview, encodeImage, normalizeType, renameWithExtension, validateImageFile } from './image';
import { debounce, downloadBlob, formatBytes } from './utils';
import { t } from './i18n.js';

let nextId = 1;

/**
 * Shared Alpine component logic for batch image tools (compress, convert...).
 *
 * @param {object} config
 * @param {string[]} config.accept                accepted MIME types
 * @param {(file: File, settings: object) => string} config.outputType  target MIME type
 * @param {object} config.settings                initial settings (quality 0–100, ...)
 * @param {boolean} [config.keepSmallerOriginal]  if the result is bigger than the original, keep the original
 * @param {(w: number, h: number, settings: object) => {width: number, height: number}} [config.resize] output size
 * @param {string} config.zipName                 file name for "Download All"
 */
export function imageBatch(config) {
    return {
        items: [],
        settings: { ...config.settings },
        dragging: false,
        notice: '',
        busy: false,
        pendingRun: undefined, // set when settings change mid-run; triggers one more pass

        init() {
            this.reprocessSoon = debounce(() => this.processAll(true), 350);
            this.$watch('settings', () => this.reprocessSoon(), { deep: true });

            // Paste images from the clipboard anywhere on the page.
            window.addEventListener('paste', (event) => {
                const files = [...(event.clipboardData?.files ?? [])];
                if (files.length) this.addFiles(files);
            });
        },

        get doneItems() {
            return this.items.filter((item) => item.status === 'done');
        },

        get totals() {
            const done = this.doneItems;
            const original = done.reduce((sum, item) => sum + item.originalSize, 0);
            const result = done.reduce((sum, item) => sum + item.resultSize, 0);
            return {
                original: formatBytes(original),
                result: formatBytes(result),
                saved: original ? Math.round((1 - result / original) * 100) : 0,
            };
        },

        formatBytes,

        onDrop(event) {
            this.dragging = false;
            this.addFiles([...event.dataTransfer.files]);
        },

        onPick(event) {
            this.addFiles([...event.target.files]);
            event.target.value = '';
        },

        addFiles(files) {
            this.notice = '';
            const room = LIMITS.maxFiles - this.items.length;
            if (files.length > room) {
                this.notice = t('You can process up to :count images at a time. Extra files were skipped.', { count: LIMITS.maxFiles });
                files = files.slice(0, Math.max(0, room));
            }

            const added = [];
            for (const file of files) {
                const error = validateImageFile(file, config.accept);
                const inputType = normalizeType(file);
                const item = {
                    id: nextId++,
                    file,
                    name: file.name,
                    inputType,
                    originalSize: file.size,
                    previewUrl: error || !canPreview(inputType) ? null : URL.createObjectURL(file),
                    rejected: Boolean(error),
                    status: error ? 'error' : 'pending',
                    error,
                    blob: null,
                    resultUrl: null,
                    resultSize: 0,
                    resultName: '',
                    width: 0,
                    height: 0,
                    keptOriginal: false,
                };
                this.items.push(item);
                if (!error) added.push(item);
            }

            if (added.length) {
                track('file_upload', { count: added.length });
                this.processAll();
            }
        },

        async processAll(force = false) {
            if (this.busy) {
                this.pendingRun = this.pendingRun || force;
                return;
            }
            this.busy = true;
            track('tool_use', { action: 'process', count: this.items.length });

            // Sequential on purpose: decoding many large images in parallel can exhaust memory.
            for (const item of this.items) {
                // Files rejected by validation are never processed.
                if (item.rejected) continue;
                if (!force && item.status === 'done') continue;
                await this.processItem(item);
            }

            this.busy = false;
            if (this.doneItems.length) {
                track('tool_result', { count: this.doneItems.length, saved_percent: this.totals.saved });
            }
            if (this.pendingRun !== undefined) {
                const again = this.pendingRun;
                this.pendingRun = undefined;
                this.processAll(again);
            }
        },

        async processItem(item) {
            // Alpine wraps items in proxies; look the live one up to trigger reactivity.
            item = this.items.find((i) => i.id === item.id);
            if (!item) return;
            item.status = 'processing';
            item.error = null;
            const type = config.outputType(item, this.settings);
            try {
                const { blob, width, height } = await encodeImage(item.file, {
                    type,
                    quality: Number(this.settings.quality),
                    maxWidth: Number(this.settings.maxWidth) || null,
                    resize: config.resize ? (w, h) => config.resize(w, h, this.settings) : null,
                    background: this.settings.background || null,
                });

                const resized = Number(this.settings.maxWidth) || config.resize;
                const keepOriginal = config.keepSmallerOriginal && type === item.inputType && blob.size >= item.originalSize && !resized;
                const finalBlob = keepOriginal ? item.file : blob;

                if (item.resultUrl) URL.revokeObjectURL(item.resultUrl);
                Object.assign(item, {
                    blob: finalBlob,
                    resultUrl: URL.createObjectURL(finalBlob),
                    resultSize: finalBlob.size,
                    resultName: renameWithExtension(item.name, keepOriginal ? item.inputType : type),
                    width,
                    height,
                    keptOriginal: keepOriginal,
                    status: 'done',
                });
            } catch (e) {
                item.status = 'error';
                item.error = e.message || t('Could not process this image.');
            }
        },

        savedPercent(item) {
            if (!item.resultSize) return 0;
            return Math.round((1 - item.resultSize / item.originalSize) * 100);
        },

        download(item) {
            if (!item.blob) return;
            downloadBlob(item.blob, item.resultName);
            track('file_download', { count: 1, format: item.resultName.split('.').pop() });
        },

        async downloadAll() {
            const done = this.doneItems;
            if (done.length === 0) return;
            if (done.length === 1) return this.download(done[0]);

            // Loaded on demand so the zip code is only fetched when needed.
            const { zipSync } = await import('fflate');
            const files = {};
            const used = new Set();
            for (const item of done) {
                let name = item.resultName;
                for (let n = 2; used.has(name); n++) name = item.resultName.replace(/(\.\w+)$/, `-${n}$1`);
                used.add(name);
                // Images are already compressed; level 0 just stores them.
                files[name] = [new Uint8Array(await item.blob.arrayBuffer()), { level: 0 }];
            }
            downloadBlob(new Blob([zipSync(files)], { type: 'application/zip' }), config.zipName);
            track('file_download', { count: done.length, format: 'zip' });
        },

        remove(item) {
            [item.previewUrl, item.resultUrl].forEach((url) => url && URL.revokeObjectURL(url));
            this.items = this.items.filter((i) => i.id !== item.id);
        },

        clear() {
            this.items.forEach((item) => [item.previewUrl, item.resultUrl].forEach((url) => url && URL.revokeObjectURL(url)));
            this.items = [];
            this.notice = '';
        },
    };
}
