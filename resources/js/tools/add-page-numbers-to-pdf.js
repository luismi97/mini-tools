import { PDF_LIMITS, addPageNumbers, loadPdf, openPdfForRender, renderPdfPage } from '../lib/pdf';
import { FORMATS, POSITIONS, formatPageNumber } from '../lib/page-numbers';
import { track } from '../lib/analytics';
import { baseName, debounce, downloadBlob, formatBytes } from '../lib/utils';
import { t } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('addPageNumbers', () => ({
        file: null,
        name: '',
        size: '',
        pageCount: 0,
        preview: null, // object URL of page 1
        options: {
            position: 'bottom-center',
            format: 'n',
            startAt: 1,
            firstPage: 1,
            fontSize: 11,
        },
        positions: POSITIONS,
        formats: FORMATS,
        dragging: false,
        busy: false,
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
                const doc = await loadPdf(file);
                this.reset();
                this.file = file;
                this.name = file.name;
                this.size = formatBytes(file.size);
                this.pageCount = doc.getPageCount();
                track('file_upload', { count: 1 });
            } catch (e) {
                this.error = e.message;
                return;
            } finally {
                this.busy = false;
            }
            this.renderPreview(file);
        },

        init() {
            // The preview shows the first numbered page.
            const refresh = debounce(() => this.file && this.renderPreview(this.file), 300);
            this.$watch('options.firstPage', refresh);
        },

        async renderPreview(file) {
            const number = Math.min(Math.max(this.firstPage(), 1), this.pageCount);
            try {
                const doc = await openPdfForRender(file);
                try {
                    const { blob } = await renderPdfPage(doc, number, { width: 480, type: 'image/jpeg', quality: 85 });
                    if (this.file !== file) return;
                    if (this.preview) URL.revokeObjectURL(this.preview);
                    this.preview = URL.createObjectURL(blob);
                } finally {
                    doc.destroy();
                }
            } catch {
                // The preview is optional.
            }
        },

        firstPage() {
            const n = Math.round(Number(this.options.firstPage));
            return Number.isFinite(n) ? n : 1;
        },

        valid() {
            const start = Number(this.options.startAt);
            const size = Number(this.options.fontSize);
            const first = this.firstPage();
            return Number.isInteger(start) && start >= 0 && start <= 100000
                && size >= 6 && size <= 36
                && first >= 1 && first <= this.pageCount;
        },

        /** Sample label for the preview, e.g. "Page 1 of 12". */
        sample() {
            const start = Number(this.options.startAt) || 0;
            return formatPageNumber(this.options.format, start, start + this.pageCount - this.firstPage());
        },

        /** CSS placement of the sample label over the preview. */
        sampleStyle() {
            const [vertical, horizontal] = this.options.position.split('-');
            const x = { left: 'left:6%', center: 'left:50%;transform:translateX(-50%)', right: 'right:6%' }[horizontal];
            const y = vertical === 'top' ? 'top:3.5%' : 'bottom:3.5%';
            return `${x};${y}`;
        },

        async save() {
            if (!this.file || this.busy || !this.valid()) return;
            this.busy = true;
            this.error = '';
            this.done = '';
            track('tool_use', { action: 'number', position: this.options.position, format: this.options.format, pages: this.pageCount });
            try {
                const { bytes, numbered } = await addPageNumbers(this.file, {
                    ...this.options,
                    startAt: Number(this.options.startAt),
                    firstPage: this.firstPage(),
                    fontSize: Number(this.options.fontSize),
                });
                downloadBlob(new Blob([bytes], { type: 'application/pdf' }), `${baseName(this.name)}-numbered.pdf`);
                this.done = t('Done — :count pages numbered.', { count: numbered });
                track('file_download', { format: 'pdf', count: 1 });
            } catch (e) {
                this.error = e.message || t('The PDF could not be saved.');
            } finally {
                this.busy = false;
            }
        },

        reset() {
            if (this.preview) URL.revokeObjectURL(this.preview);
            Object.assign(this, { file: null, name: '', size: '', pageCount: 0, preview: null, done: '', error: '' });
        },
    }));
});
