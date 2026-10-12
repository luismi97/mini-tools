import { imageBatch } from '../lib/image-batch';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('jpgToPng', () =>
        imageBatch({
            accept: ['image/jpeg'],
            settings: { quality: 100 },
            outputType: () => 'image/png',
            keepSmallerOriginal: false,
            zipName: 'png-images.zip',
        }),
    );
});
