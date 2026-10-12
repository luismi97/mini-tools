import { imageBatch } from '../lib/image-batch';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('jpgToWebp', () =>
        imageBatch({
            accept: ['image/jpeg', 'image/png'],
            settings: { quality: 80 },
            outputType: () => 'image/webp',
            keepSmallerOriginal: false,
            zipName: 'webp-images.zip',
        }),
    );
});
