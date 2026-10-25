import { pdfPagesTool } from '../lib/pdf-pages-tool';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('organizePdf', () => pdfPagesTool({ mode: 'organize', suffix: 'organized' }));
});
