/**
 * Image resize math (pure, unit-tested).
 */

export const MAX_DIMENSION = 16384;

/**
 * @param {number} width  original width
 * @param {number} height original height
 * @param {{mode: 'percent'|'dimensions', percent?: number, width?: number|string, height?: number|string, keepAspect?: boolean}} options
 * @returns {{width: number, height: number}}
 */
export function computeResize(width, height, options) {
    let w;
    let h;

    if (options.mode === 'percent') {
        const p = Number(options.percent) || 100;
        w = (width * p) / 100;
        h = (height * p) / 100;
    } else {
        const tw = Number(options.width) || 0;
        const th = Number(options.height) || 0;
        if (!tw && !th) {
            w = width;
            h = height;
        } else if (options.keepAspect !== false) {
            const scale = tw && th ? Math.min(tw / width, th / height) : tw ? tw / width : th / height;
            w = width * scale;
            h = height * scale;
        } else {
            w = tw || width;
            h = th || height;
        }
    }

    return {
        width: clamp(Math.round(w)),
        height: clamp(Math.round(h)),
    };
}

/**
 * Clamp a crop rectangle so it stays inside the image and keeps a minimum size.
 * @returns {{x: number, y: number, width: number, height: number}}
 */
export function clampRect(rect, imageWidth, imageHeight, minSize = 1) {
    const width = Math.min(Math.max(minSize, Math.round(rect.width)), imageWidth);
    const height = Math.min(Math.max(minSize, Math.round(rect.height)), imageHeight);
    const x = Math.min(Math.max(0, Math.round(rect.x)), imageWidth - width);
    const y = Math.min(Math.max(0, Math.round(rect.y)), imageHeight - height);
    return { x, y, width, height };
}

/**
 * Largest centered rectangle with the given aspect ratio (w/h) that fits the image.
 */
export function centeredRect(imageWidth, imageHeight, ratio) {
    if (!ratio) {
        return { x: 0, y: 0, width: imageWidth, height: imageHeight };
    }
    let width = imageWidth;
    let height = width / ratio;
    if (height > imageHeight) {
        height = imageHeight;
        width = height * ratio;
    }
    return clampRect({ x: (imageWidth - width) / 2, y: (imageHeight - height) / 2, width, height }, imageWidth, imageHeight);
}

/**
 * Move or resize a crop rectangle while dragging.
 * @param {{x: number, y: number, width: number, height: number}} start rect when the drag began
 * @param {'move'|'nw'|'ne'|'sw'|'se'} mode
 * @param {number} dx pointer delta in image pixels
 * @param {number} dy pointer delta in image pixels
 * @param {number} W image width
 * @param {number} H image height
 * @param {number|null} ratio locked aspect ratio (w/h) or null for free
 */
export function dragRect(start, mode, dx, dy, W, H, ratio = null, min = 10) {
    if (mode === 'move') {
        return clampRect({ ...start, x: start.x + dx, y: start.y + dy }, W, H);
    }

    const west = mode.includes('w');
    const north = mode.includes('n');
    let left = start.x;
    let top = start.y;
    let right = start.x + start.width;
    let bottom = start.y + start.height;

    if (west) left = Math.min(Math.max(0, left + dx), right - min);
    else right = Math.max(Math.min(W, right + dx), left + min);
    if (north) top = Math.min(Math.max(0, top + dy), bottom - min);
    else bottom = Math.max(Math.min(H, bottom + dy), top + min);

    if (ratio) {
        // Width drives; height follows. The corner opposite the handle stays fixed.
        let width = right - left;
        let height = width / ratio;
        const maxHeight = north ? bottom : H - top;
        if (height > maxHeight) {
            height = maxHeight;
            width = height * ratio;
        }
        if (west) left = right - width;
        else right = left + width;
        if (north) top = bottom - height;
        else bottom = top + height;
    }

    return clampRect({ x: left, y: top, width: right - left, height: bottom - top }, W, H);
}

function clamp(value) {
    return Math.min(MAX_DIMENSION, Math.max(1, value));
}
