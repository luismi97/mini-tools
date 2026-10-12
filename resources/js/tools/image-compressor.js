import { imageBatch } from '../lib/image-batch';
import { isHeicType } from '../lib/image';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('imageCompressor', () =>
        imageBatch({
            accept: ['image/jpeg', 'image/png', 'image/webp', 'image/heic', 'image/heif'],
            settings: { quality: 75, format: 'original', maxWidth: '' },
            // Browsers cannot encode HEIC, so "Same as input" turns HEIC into JPG.
            outputType: (item, settings) =>
                settings.format !== 'original' ? settings.format : isHeicType(item.inputType) ? 'image/jpeg' : item.inputType,
            keepSmallerOriginal: true,
            zipName: 'compressed-images.zip',
        }),
    );
});
