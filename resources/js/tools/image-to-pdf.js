import { imagesToPdfTool } from '../lib/images-to-pdf-tool';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('imageToPdf', () =>
        imagesToPdfTool({
            accept: ['image/jpeg', 'image/png', 'image/webp'],
            extensions: ['jpg', 'jpeg', 'png', 'webp'],
            filename: 'images.pdf',
        }),
    );
});
