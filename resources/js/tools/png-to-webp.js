import { imageBatch } from '../lib/image-batch';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('pngToWebp', () =>
        imageBatch({
            accept: ['image/png'],
            settings: { quality: 85 },
            outputType: () => 'image/webp',
            keepSmallerOriginal: false,
            zipName: 'webp-images.zip',
        }),
    );
});
