import { imageBatch } from '../lib/image-batch';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('webpToPng', () =>
        imageBatch({
            accept: ['image/webp'],
            settings: { quality: 100 },
            outputType: () => 'image/png',
            keepSmallerOriginal: false,
            zipName: 'png-images.zip',
        }),
    );
});
