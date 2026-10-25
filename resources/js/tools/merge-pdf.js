import { fileList } from '../lib/file-list';
import { PDF_LIMITS, describePdf, mergePdfs } from '../lib/pdf';
import { track } from '../lib/analytics';
import { downloadBlob, formatBytes } from '../lib/utils';
import { t } from '../lib/i18n';

/** Safe download name without extension: "Q3 report" → "Q3 report"; empty → "merged". */
function cleanName(name) {
    const clean = String(name).replace(/\.pdf$/i, '').replace(/[\\/:*?"<>|]+/g, '-').trim();
    return clean || 'merged';
}

document.addEventListener('alpine:init', () => {
    window.Alpine.data('mergePdf', () => {
        // The merged file stays outside Alpine state (large binary, no need to proxy it).
        let blob = null;
        const list = fileList({
            accept: ['application/pdf'],
            extensions: ['pdf'],
            maxFiles: PDF_LIMITS.maxFiles,
            maxSize: PDF_LIMITS.maxFileSize,
            describe: describePdf,
        });

        return {
            ...list,
            error: '',
            outputName: 'merged',
            result: null,

            init() {
                // Any change to the list makes the last merged file stale.
                this.$watch('files.length', () => (this.result = null));
            },

            totalPages() {
                return this.validFiles().reduce((sum, f) => sum + (f.pages || 0), 0);
            },

            async merge() {
                const files = this.validFiles();
                if (files.length < 2 || this.busy) return;
                this.busy = true;
                this.error = '';
                track('tool_use', { action: 'merge', count: files.length });
                try {
                    const bytes = await mergePdfs(files.map((f) => f.file));
                    blob = new Blob([bytes], { type: 'application/pdf' });
                    this.result = { name: `${cleanName(this.outputName)}.pdf`, pages: this.totalPages(), size: formatBytes(blob.size) };
                    downloadBlob(blob, this.result.name);
                    track('file_download', { format: 'pdf', count: 1 });
                } catch (e) {
                    this.error = e.message || t('The PDFs could not be merged.');
                } finally {
                    this.busy = false;
                }
            },

            downloadAgain() {
                if (blob && this.result) downloadBlob(blob, this.result.name);
            },

            startOver() {
                blob = null;
                this.result = null;
                this.clear();
            },

            clear() {
                list.clear.call(this);
                this.result = null;
            },
        };
    });
});
