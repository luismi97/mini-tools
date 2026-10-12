import { imageBatch } from '../lib/image-batch';
import { MAX_DIMENSION } from '../lib/resize';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('svgToPng', () =>
        imageBatch({
            accept: ['image/svg+xml'],
            // background '' = transparent PNG; otherwise a hex color painted behind the SVG.
            settings: { scale: 2, background: '', quality: 100 },
            outputType: () => 'image/png',
            // SVG is vector: render it at N× its intrinsic size for crisp results.
            resize: (w, h, s) => {
                const scale = Number(s.scale) || 1;
                return {
                    width: Math.min(MAX_DIMENSION, Math.max(1, Math.round(w * scale))),
                    height: Math.min(MAX_DIMENSION, Math.max(1, Math.round(h * scale))),
                };
            },
            keepSmallerOriginal: false,
            zipName: 'png-images.zip',
        }),
    );
});
