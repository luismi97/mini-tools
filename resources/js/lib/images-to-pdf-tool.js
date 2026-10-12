import { fileList } from './file-list';
import { imagesToPdf } from './pdf';
import { LIMITS } from './image';
import { track } from './analytics';
import { downloadBlob } from './utils';
import { t } from './i18n.js';

/**
 * Alpine component for "images → PDF" tools (JPG to PDF, Image to PDF).
 * @param {{accept: string[], extensions: string[], filename: string}} config
 */
export function imagesToPdfTool(config) {
    return {
        ...fileList({
            accept: config.accept,
            extensions: config.extensions,
            maxFiles: 100,
            maxSize: LIMITS.maxFileSize,
            thumbnails: true,
        }),
        options: { pageSize: 'a4', orientation: 'auto', margin: 'small' },
        error: '',

        async convert() {
            const files = this.validFiles();
            if (!files.length || this.busy) return;
            this.busy = true;
            this.error = '';
            track('tool_use', { action: 'convert', count: files.length, page_size: this.options.pageSize });
            try {
                const bytes = await imagesToPdf(files.map((f) => f.file), this.options);
                downloadBlob(new Blob([bytes], { type: 'application/pdf' }), config.filename);
                track('file_download', { format: 'pdf', count: 1 });
            } catch (e) {
                this.error = e.message || t('The PDF could not be created.');
            } finally {
                this.busy = false;
            }
        },
    };
}
