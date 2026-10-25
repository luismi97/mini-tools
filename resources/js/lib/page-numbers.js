/**
 * Page-number layout for "Add Page Numbers to PDF" (pure, unit-tested).
 * Positions are computed in the page's *visual* frame (as the reader sees it)
 * and mapped back to PDF user space, so rotated pages get upright numbers.
 */
import { t } from './i18n.js';

/** Position key → English label (translated at display time). */
export const POSITIONS = {
    'top-left': 'Top left',
    'top-center': 'Top center',
    'top-right': 'Top right',
    'bottom-left': 'Bottom left',
    'bottom-center': 'Bottom center',
    'bottom-right': 'Bottom right',
};

export const FORMATS = {
    n: { label: '1, 2, 3' },
    'n-of-total': { label: '1 / 10' },
    'page-n': { label: 'Page 1' },
    'page-n-of-total': { label: 'Page 1 of 10' },
};

/** Text for page `n` of `total` in the current page language. */
export function formatPageNumber(format, n, total) {
    switch (format) {
        case 'n-of-total':
            return `${n} / ${total}`;
        case 'page-n':
            return t('Page :n', { n });
        case 'page-n-of-total':
            return t('Page :n of :total', { n, total });
        default:
            return String(n);
    }
}

/**
 * Where to draw the text.
 * @param {{box: {x: number, y: number, width: number, height: number}, rotation: number,
 *          textWidth: number, fontSize: number, position: string, margin: number}} input
 *        box: the page's crop box in PDF units; rotation: the page's /Rotate (0, 90, 180, 270)
 * @returns {{x: number, y: number, rotate: number}} PDF coordinates and text rotation (degrees, counter-clockwise)
 */
export function pageNumberPosition({ box, rotation = 0, textWidth, fontSize, position, margin }) {
    const r = ((rotation % 360) + 360) % 360;
    const W = box.width;
    const H = box.height;
    // Size of the page as displayed.
    const [vw, vh] = r % 180 ? [H, W] : [W, H];

    const [vertical, horizontal] = position.split('-');
    const u = horizontal === 'left' ? margin : horizontal === 'right' ? vw - margin - textWidth : (vw - textWidth) / 2;
    const v = vertical === 'top' ? vh - margin - fontSize : margin;

    // Visual (u, v) → unrotated page space. /Rotate turns the page clockwise.
    let x;
    let y;
    if (r === 90) [x, y] = [W - v, u];
    else if (r === 180) [x, y] = [W - u, H - v];
    else if (r === 270) [x, y] = [v, H - u];
    else [x, y] = [u, v];

    return { x: box.x + x, y: box.y + y, rotate: r };
}
