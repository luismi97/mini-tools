import { imageBatch } from '../lib/image-batch';
import { isHeicType } from '../lib/image';
import { computeResize } from '../lib/resize';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('imageResizer', () =>
        imageBatch({
            accept: ['image/jpeg', 'image/png', 'image/webp', 'image/heic', 'image/heif'],
            settings: { mode: 'percent', percent: 50, width: 1280, height: '', keepAspect: true, format: 'original', quality: 90 },
            outputType: (item, s) => (s.format !== 'original' ? s.format : isHeicType(item.inputType) ? 'image/jpeg' : item.inputType),
            resize: (w, h, s) => computeResize(w, h, s),
            keepSmallerOriginal: false,
            zipName: 'resized-images.zip',
        }),
    );
});
