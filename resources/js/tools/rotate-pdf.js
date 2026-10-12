import { pdfPagesTool } from '../lib/pdf-pages-tool';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('rotatePdf', () => pdfPagesTool({ mode: 'rotate', suffix: 'rotated' }));
});
