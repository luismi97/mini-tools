import { imageBatch } from '../lib/image-batch';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('pngToJpg', () =>
        imageBatch({
            accept: ['image/png'],
            settings: { quality: 90 },
            outputType: () => 'image/jpeg',
            keepSmallerOriginal: false,
            zipName: 'jpg-images.zip',
        }),
    );
});
