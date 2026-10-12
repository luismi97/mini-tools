import { imageBatch } from '../lib/image-batch';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('heicToJpg', () =>
        imageBatch({
            accept: ['image/heic', 'image/heif'],
            settings: { quality: 90, format: 'image/jpeg' },
            outputType: (item, s) => s.format,
            keepSmallerOriginal: false,
            zipName: 'converted-photos.zip',
        }),
    );
});
