import { PDF_LIMITS, extractPdfPages, loadPdf, openPdfForRender, renderThumbnails } from '../lib/pdf';
import { numbersToRanges, parsePageRanges, rangesToIndexes } from '../lib/page-ranges';
import { track } from '../lib/analytics';
import { baseName, downloadBlob, formatBytes } from '../lib/utils';
import { t, tc } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('splitPdf', () => {
        // Kept outside Alpine state: reactive proxies break pdf.js private class fields.
        let preview = null;

        return {
            file: null,
            name: '',
            size: '',
            pageCount: 0,
            thumbs: [], // object URLs by page index
            mode: 'extract',
            ranges: '',
            dragging: false,
            busy: false,
            error: '',
            done: '',

            init() {
                // A new selection makes the last "Done" message stale.
                this.$watch('mode', () => (this.done = ''));
                this.$watch('ranges', () => (this.done = ''));
            },

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
                    this.thumbs = Array(this.pageCount).fill(null);
                    this.ranges = this.pageCount > 1 ? `1-${Math.min(3, this.pageCount)}` : '1';
                    track('file_upload', { count: 1 });
                } catch (e) {
                    this.error = e.message;
                    return;
                } finally {
                    this.busy = false;
                }
                this.renderThumbs(file);
            },

            async renderThumbs(file) {
                try {
                    const doc = await openPdfForRender(file);
                    if (this.file !== file) return doc.destroy();
                    preview = doc;
                    await renderThumbnails(doc, {
                        cancelled: () => preview !== doc,
                        onThumb: (number, url) => (this.thumbs[number - 1] = url),
                    });
                } catch {
                    // Previews are optional; the range field still works.
                }
            },

            parsed() {
                if (this.mode === 'every') return { ok: true, ranges: [] };
                try {
                    return { ok: true, ranges: parsePageRanges(this.ranges, this.pageCount) };
                } catch (e) {
                    return { ok: false, message: e.message };
                }
            },

            /** Output file number (1-based) of each page, or 0 when the page is not included. */
            groups() {
                const result = this.parsed();
                const map = Array(this.pageCount).fill(0);
                if (!result.ok) return map;
                if (this.mode === 'every') return map.map((_, i) => i + 1);
                result.ranges.forEach(([start, end], g) => {
                    for (let n = start; n <= end; n++) map[n - 1] ||= this.mode === 'extract' ? 1 : g + 1;
                });
                return map;
            },

            togglePage(number) {
                if (this.mode === 'every') return;
                const result = this.parsed();
                const selected = new Set(result.ok ? rangesToIndexes(result.ranges).map((i) => i + 1) : []);
                if (selected.has(number)) selected.delete(number);
                else selected.add(number);
                this.ranges = numbersToRanges([...selected]);
                this.done = '';
            },

            selectAll(value) {
                this.ranges = value ? `1-${this.pageCount}` : '';
            },

            summary() {
                const result = this.parsed();
                if (!result.ok) return result.message;
                if (this.mode === 'every') return t(':count separate PDF files (one per page), downloaded as a ZIP.', { count: this.pageCount });
                const pages = rangesToIndexes(result.ranges).length;
                return this.mode === 'extract'
                    ? tc('1 PDF with :count page.', '1 PDF with :count pages.', pages)
                    : (result.ranges.length === 1 ? t('1 PDF file.') : t(':count PDF files, downloaded as a ZIP.', { count: result.ranges.length }));
            },

            async split() {
                const result = this.parsed();
                if (!this.file || !result.ok || this.busy) return;
                this.busy = true;
                this.error = '';
                this.done = '';
                track('tool_use', { action: this.mode, pages: this.pageCount });

                try {
                    const base = baseName(this.name);
                    let groups;
                    let names;
                    if (this.mode === 'extract') {
                        groups = [rangesToIndexes(result.ranges)];
                        names = [`${base}-extracted.pdf`];
                    } else if (this.mode === 'ranges') {
                        groups = result.ranges.map((r) => rangesToIndexes([r]));
                        names = result.ranges.map(([s, e]) => `${base}-pages-${s === e ? s : `${s}-${e}`}.pdf`);
                    } else {
                        groups = Array.from({ length: this.pageCount }, (_, i) => [i]);
                        names = groups.map((_, i) => `${base}-page-${i + 1}.pdf`);
                    }

                    const outputs = await extractPdfPages(this.file, groups);
                    if (outputs.length === 1) {
                        downloadBlob(new Blob([outputs[0]], { type: 'application/pdf' }), names[0]);
                    } else {
                        const { zipSync } = await import('fflate');
                        const files = Object.fromEntries(outputs.map((bytes, i) => [names[i], bytes]));
                        downloadBlob(new Blob([zipSync(files)], { type: 'application/zip' }), `${base}-split.zip`);
                    }
                    this.done = tc('Done — :count file created.', 'Done — :count files created.', outputs.length);
                    track('file_download', { format: outputs.length === 1 ? 'pdf' : 'zip', count: outputs.length });
                } catch (e) {
                    this.error = e.message || t('The PDF could not be split.');
                } finally {
                    this.busy = false;
                }
            },

            reset() {
                this.thumbs.forEach((url) => url && URL.revokeObjectURL(url));
                preview?.destroy();
                preview = null;
                Object.assign(this, { file: null, name: '', pageCount: 0, thumbs: [], error: '', done: '' });
            },
        };
    });
});
