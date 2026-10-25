import { track } from './analytics';
import { formatBytes } from './utils';
import { t } from './i18n.js';

let nextId = 1;

/**
 * Shared Alpine logic for an ordered list of files (merge, images → PDF...).
 * Pairs with the <x-file-list> Blade component.
 *
 * @param {object} config
 * @param {string[]} config.accept       MIME types
 * @param {string[]} config.extensions   fallback extensions (lowercase, no dot)
 * @param {number} config.maxFiles
 * @param {number} config.maxSize        bytes per file
 * @param {boolean} [config.thumbnails]  create object-URL previews (images)
 * @param {(file: File) => Promise<string|{meta: string, pages?: number, thumb?: string}>} [config.describe]
 *        async metadata label, e.g. "12 pages" (or an object that can add a preview); throw to reject
 */
export function fileList(config) {
    return {
        files: [],
        dragging: false,
        notice: '',
        busy: false,
        dragIndex: null,

        onDrop(event) {
            this.dragging = false;
            this.addFiles([...event.dataTransfer.files]);
        },

        onPick(event) {
            this.addFiles([...event.target.files]);
            event.target.value = '';
        },

        accepts(file) {
            const ext = file.name.split('.').pop()?.toLowerCase();
            return config.accept.includes(file.type) || config.extensions.includes(ext);
        },

        addFiles(list) {
            this.notice = '';
            let added = 0;
            for (const file of list) {
                if (this.files.length >= config.maxFiles) {
                    this.notice = t('You can add up to :count files.', { count: config.maxFiles });
                    break;
                }
                if (!this.accepts(file)) {
                    this.notice = t('":name" is not a supported file type.', { name: file.name });
                    continue;
                }
                if (file.size > config.maxSize) {
                    this.notice = t('":name" is larger than :size.', { name: file.name, size: formatBytes(config.maxSize) });
                    continue;
                }
                const item = {
                    id: nextId++,
                    file,
                    name: file.name,
                    size: formatBytes(file.size),
                    thumb: config.thumbnails ? URL.createObjectURL(file) : null,
                    meta: '',
                    pages: 0,
                    error: '',
                };
                this.files.push(item);
                added++;
                if (config.describe) this.describe(item.id);
            }
            if (added) track('file_upload', { count: added });
        },

        async describe(id) {
            const item = this.files.find((f) => f.id === id);
            if (!item) return;
            try {
                const info = await config.describe(item.file);
                if (typeof info === 'string') {
                    item.meta = info;
                } else {
                    // The item may have been removed while it was being described.
                    if (!this.files.some((f) => f.id === id)) {
                        if (info.thumb) URL.revokeObjectURL(info.thumb);
                        return;
                    }
                    Object.assign(item, { meta: info.meta, pages: info.pages ?? 0, thumb: info.thumb ?? item.thumb });
                }
            } catch (e) {
                item.error = e.message || t('This file could not be read.');
            }
        },

        validFiles() {
            return this.files.filter((f) => !f.error);
        },

        sortByName() {
            this.files = [...this.files].sort((a, b) => a.name.localeCompare(b.name, undefined, { numeric: true, sensitivity: 'base' }));
        },

        move(index, delta) {
            const target = index + delta;
            if (target < 0 || target >= this.files.length) return;
            const copy = [...this.files];
            [copy[index], copy[target]] = [copy[target], copy[index]];
            this.files = copy;
        },

        dragStart(index) {
            this.dragIndex = index;
        },

        dragOver(index) {
            if (this.dragIndex === null || this.dragIndex === index) return;
            const copy = [...this.files];
            const [moved] = copy.splice(this.dragIndex, 1);
            copy.splice(index, 0, moved);
            this.files = copy;
            this.dragIndex = index;
        },

        dragEnd() {
            this.dragIndex = null;
        },

        remove(item) {
            if (item.thumb) URL.revokeObjectURL(item.thumb);
            this.files = this.files.filter((f) => f.id !== item.id);
        },

        clear() {
            this.files.forEach((f) => f.thumb && URL.revokeObjectURL(f.thumb));
            this.files = [];
            this.notice = '';
        },
    };
}
