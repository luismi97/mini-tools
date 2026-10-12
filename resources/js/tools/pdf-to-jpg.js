import { PDF_LIMITS, openPdfForRender, renderPdfPage } from '../lib/pdf';
import { track } from '../lib/analytics';
import { baseName, downloadBlob, formatBytes } from '../lib/utils';
import { t } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('pdfToJpg', () => {
        // Kept outside Alpine state: reactive proxies break pdf.js private class fields.
        let doc = null;

        return {
            file: null,
            name: '',
            size: '',
            pageCount: 0,
            options: { dpi: 150, quality: 90 },
            pages: [], // { number, url, blob, size, width, height }
            progress: 0,
            dragging: false,
            busy: false,
            error: '',

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
                    this.clearPages();
                    doc = await openPdfForRender(file);
                    this.file = file;
                    this.name = file.name;
                    this.size = formatBytes(file.size);
                    this.pageCount = doc.numPages;
                    track('file_upload', { count: 1 });
                } catch (e) {
                    this.error = e.message;
                } finally {
                    this.busy = false;
                }
            },

            renderLimit() {
                return Math.min(this.pageCount, PDF_LIMITS.maxRenderPages);
            },

            async convert() {
                if (!doc || this.busy) return;
                this.busy = true;
                this.error = '';
                this.clearPages();
                track('tool_use', { action: 'convert', pages: this.pageCount, dpi: Number(this.options.dpi) });
                try {
                    const total = this.renderLimit();
                    for (let n = 1; n <= total; n++) {
                        const { blob, width, height } = await renderPdfPage(doc, n, {
                            dpi: Number(this.options.dpi),
                            type: 'image/jpeg',
                            quality: Number(this.options.quality),
                        });
                        this.pages.push({ number: n, blob, url: URL.createObjectURL(blob), size: formatBytes(blob.size), width, height });
                        this.progress = Math.round((n / total) * 100);
                    }
                    track('tool_result', { pages: total });
                } catch (e) {
                    this.error = e.message || t('The PDF could not be converted.');
                } finally {
                    this.busy = false;
                }
            },

            pageName(page) {
                return `${baseName(this.name)}-page-${page.number}.jpg`;
            },

            download(page) {
                downloadBlob(page.blob, this.pageName(page));
                track('file_download', { format: 'jpg', count: 1 });
            },

            async downloadAll() {
                if (this.pages.length === 1) return this.download(this.pages[0]);
                const { zipSync } = await import('fflate');
                const files = {};
                for (const page of this.pages) {
                    files[this.pageName(page)] = [new Uint8Array(await page.blob.arrayBuffer()), { level: 0 }];
                }
                downloadBlob(new Blob([zipSync(files)], { type: 'application/zip' }), `${baseName(this.name)}-jpg.zip`);
                track('file_download', { format: 'zip', count: this.pages.length });
            },

            clearPages() {
                this.pages.forEach((p) => URL.revokeObjectURL(p.url));
                this.pages = [];
                this.progress = 0;
            },

            reset() {
                this.clearPages();
                doc?.destroy();
                doc = null;
                Object.assign(this, { file: null, name: '', pageCount: 0, error: '' });
            },
        };
    });
});
