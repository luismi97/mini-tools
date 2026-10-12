import { pdfPagesTool } from '../lib/pdf-pages-tool';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('deletePdfPages', () => pdfPagesTool({ mode: 'delete', suffix: 'edited' }));
});
