import { PDF_LIMITS, editPdfPages, openPdfForRender, renderPdfPage } from './pdf';
import { track } from './analytics';
import { baseName, downloadBlob, formatBytes } from './utils';
import { t } from './i18n.js';

const THUMB_LIMIT = 200;

/**
 * Shared Alpine logic for page-level PDF edits (Rotate PDF, Delete PDF Pages).
 * Pairs with <x-pdf-pages>. Renders page thumbnails with pdf.js, keeps per-page
 * rotation/keep state, and writes the result with pdf-lib.
 *
 * @param {{mode: 'rotate'|'delete', suffix: string}} config
 */
export function pdfPagesTool(config) {
    // Kept outside Alpine state: reactive proxies break pdf.js private class fields.
    let doc = null;

    return {
        mode: config.mode,
        file: null,
        name: '',
        size: '',
        pages: [], // { index, number, thumb, rotation, keep }
        dragging: false,
        busy: false,
        loadingThumbs: false,
        error: '',
        done: '',

        onDrop(event) {
            this.dragging = false;
            this.load(event.dataTransfer.files[0]);
        },

        onPick(event) {
            this.load(event.target.files[0]);
            event.target.value = '';
        },

        async load(file) {
            this.error = '';
            this.done = '';
            if (!file) return;
            if (!/\.pdf$/i.test(file.name) && file.type !== 'application/pdf') {
                this.error = t('Please choose a PDF file.');
                return;
            }
            if (file.size > PDF_LIMITS.maxFileSize) {
                this.error = t('File is larger than :size.', { size: formatBytes(PDF_LIMITS.maxFileSize) });
                return;
            }
            this.busy = true;
            try {
                this.reset();
                doc = await openPdfForRender(file);
                this.file = file;
                this.name = file.name;
                this.size = formatBytes(file.size);
                this.pages = Array.from({ length: doc.numPages }, (_, i) => ({ index: i, number: i + 1, thumb: null, rotation: 0, keep: true }));
                track('file_upload', { count: 1 });
            } catch (e) {
                this.error = e.message;
            } finally {
                this.busy = false;
            }
            this.renderThumbs();
        },

        async renderThumbs() {
            if (!doc) return;
            this.loadingThumbs = true;
            const current = doc;
            for (const page of this.pages.slice(0, THUMB_LIMIT)) {
                if (current !== doc) return; // a new file was loaded
                try {
                    const { blob } = await renderPdfPage(current, page.number, { dpi: 40, type: 'image/jpeg', quality: 70 });
                    page.thumb = URL.createObjectURL(blob);
                } catch {
                    // Leave the placeholder for pages that fail to render.
                }
            }
            this.loadingThumbs = false;
        },

        rotate(page, delta) {
            page.rotation = (page.rotation + delta + 360) % 360;
            this.done = '';
        },

        rotateAll(delta) {
            this.pages.forEach((p) => this.rotate(p, delta));
        },

        toggle(page) {
            page.keep = !page.keep;
            this.done = '';
        },

        keepAll(value) {
            this.pages.forEach((p) => (p.keep = value));
        },

        keptCount() {
            return this.pages.filter((p) => p.keep).length;
        },

        changed() {
            return this.pages.some((p) => p.rotation !== 0 || !p.keep);
        },

        async save() {
            if (!this.file || this.busy || !this.changed()) return;
            if (this.keptCount() === 0) {
                this.error = t('Keep at least one page.');
                return;
            }
            this.busy = true;
            this.error = '';
            track('tool_use', { action: config.mode, pages: this.pages.length });
            try {
                const bytes = await editPdfPages(this.file, this.pages);
                downloadBlob(new Blob([bytes], { type: 'application/pdf' }), `${baseName(this.name)}-${config.suffix}.pdf`);
                this.done = config.mode === 'delete'
                    ? t('Done — :removed page(s) removed, :kept kept.', { removed: this.pages.length - this.keptCount(), kept: this.keptCount() })
                    : t('Done — your rotated PDF has been downloaded.');
                track('file_download', { format: 'pdf', count: 1 });
            } catch (e) {
                this.error = e.message || t('The PDF could not be saved.');
            } finally {
                this.busy = false;
            }
        },

        reset() {
            this.pages.forEach((p) => p.thumb && URL.revokeObjectURL(p.thumb));
            this.pages = [];
            doc?.destroy();
            doc = null;
            Object.assign(this, { file: null, name: '', size: '', done: '' });
        },
    };
}
