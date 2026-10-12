import { imagesToPdfTool } from '../lib/images-to-pdf-tool';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('jpgToPdf', () =>
        imagesToPdfTool({ accept: ['image/jpeg'], extensions: ['jpg', 'jpeg'], filename: 'images.pdf' }),
    );
});
