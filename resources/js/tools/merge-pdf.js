import { fileList } from '../lib/file-list';
import { PDF_LIMITS, describePdf, mergePdfs } from '../lib/pdf';
import { track } from '../lib/analytics';
import { downloadBlob } from '../lib/utils';
import { t } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('mergePdf', () => ({
        ...fileList({
            accept: ['application/pdf'],
            extensions: ['pdf'],
            maxFiles: PDF_LIMITS.maxFiles,
            maxSize: PDF_LIMITS.maxFileSize,
            describe: describePdf,
        }),
        error: '',

        async merge() {
            const files = this.validFiles();
            if (files.length < 2 || this.busy) return;
            this.busy = true;
            this.error = '';
            track('tool_use', { action: 'merge', count: files.length });
            try {
                const bytes = await mergePdfs(files.map((f) => f.file));
                downloadBlob(new Blob([bytes], { type: 'application/pdf' }), 'merged.pdf');
                track('file_download', { format: 'pdf', count: 1 });
            } catch (e) {
                this.error = e.message || t('The PDFs could not be merged.');
            } finally {
                this.busy = false;
            }
        },
    }));
});
