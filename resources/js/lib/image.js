/**
 * Client-side image decoding/encoding with <canvas>. Nothing is uploaded.
 */

import { t } from './i18n.js';

// Free-tier limits. A future Pro plan can raise these (see CLAUDE.md, Monetization).
export const LIMITS = {
    maxFileSize: 25 * 1024 * 1024,
    maxFiles: 30,
    maxPixels: 50_000_000,
};

export const EXTENSIONS = {
    'image/jpeg': 'jpg',
    'image/png': 'png',
    'image/webp': 'webp',
};

export const FORMAT_LABELS = {
    'image/jpeg': 'JPG',
    'image/png': 'PNG',
    'image/webp': 'WebP',
    'image/heic': 'HEIC',
    'image/heif': 'HEIF',
    'image/svg+xml': 'SVG',
};

export const isHeicType = (type) => type === 'image/heic' || type === 'image/heif';

/**
 * @param {File} file
 * @param {string[]} acceptedTypes
 * @returns {string|null} error message, or null when the file is acceptable
 */
export function validateImageFile(file, acceptedTypes) {
    // Some systems report .jpg files with an empty or non-standard MIME type.
    const type = normalizeType(file);
    if (!acceptedTypes.includes(type)) {
        return t('Unsupported file type. Accepted: :formats.', { formats: acceptedTypes.map((type) => FORMAT_LABELS[type]).join(', ') });
    }
    if (file.size > LIMITS.maxFileSize) {
        return t('File is larger than :size MB.', { size: Math.round(LIMITS.maxFileSize / 1024 / 1024) });
    }
    if (file.size === 0) {
        return t('File is empty.');
    }
    return null;
}

export function normalizeType(file) {
    if (file.type === 'image/jpg' || file.type === 'image/pjpeg') return 'image/jpeg';
    if (file.type === 'image/heic-sequence') return 'image/heic';
    if (file.type === 'image/heif-sequence') return 'image/heif';
    if (file.type) return file.type;
    // Windows often reports an empty MIME type for .heic files.
    const ext = file.name.split('.').pop()?.toLowerCase();
    return { jpg: 'image/jpeg', jpeg: 'image/jpeg', png: 'image/png', webp: 'image/webp', heic: 'image/heic', heif: 'image/heif', svg: 'image/svg+xml' }[ext] ?? '';
}

/**
 * Intrinsic size of an SVG from its width/height attributes or viewBox
 * (browsers report 0 or 150×150 for SVGs without explicit dimensions).
 * @returns {{width: number, height: number}}
 */
export function svgSize(text) {
    const tag = /<svg\b[^>]*>/i.exec(text)?.[0] ?? '';
    const attr = (name) => new RegExp(`\\s${name}\\s*=\\s*["']([^"']+)["']`, 'i').exec(tag)?.[1];
    const px = (v) => {
        const m = /^\s*([\d.]+)\s*(px)?\s*$/i.exec(v ?? '');
        return m ? parseFloat(m[1]) : null;
    };
    const viewBox = (attr('viewBox') ?? '').split(/[\s,]+/).map(Number);
    const vbW = viewBox.length === 4 && viewBox[2] > 0 ? viewBox[2] : null;
    const vbH = viewBox.length === 4 && viewBox[3] > 0 ? viewBox[3] : null;

    let width = px(attr('width'));
    let height = px(attr('height'));
    if (width && !height) height = vbW && vbH ? (width * vbH) / vbW : width;
    if (height && !width) width = vbW && vbH ? (height * vbW) / vbH : height;
    if (!width || !height) {
        width = vbW ?? 300;
        height = vbH ?? 150;
    }
    return { width, height };
}

async function decodeSvg(file) {
    const text = await file.text();
    const { width, height } = svgSize(text);
    // Loaded through <img>: scripts inside the SVG never run.
    const url = URL.createObjectURL(new Blob([text], { type: 'image/svg+xml' }));
    try {
        const img = new Image();
        img.src = url;
        await img.decode();
        return { source: img, width: Math.round(width), height: Math.round(height), close: () => {} };
    } catch {
        throw new Error(t('This SVG could not be read. It may be invalid or use external resources.'));
    } finally {
        URL.revokeObjectURL(url);
    }
}

/**
 * HEIC/HEIF: try the browser first (Safari 17+ decodes it natively), then fall
 * back to libheif (heic-to, ~3 MB), which is downloaded only when needed.
 */
async function decodeHeic(file) {
    try {
        const bitmap = await createImageBitmap(file, { imageOrientation: 'from-image' });
        return { source: bitmap, width: bitmap.width, height: bitmap.height, close: () => bitmap.close() };
    } catch {
        // Not supported natively.
    }
    const { heicTo } = await import('heic-to/csp');
    try {
        const bitmap = await heicTo({ blob: file, type: 'bitmap', options: { imageOrientation: 'from-image' } });
        return { source: bitmap, width: bitmap.width, height: bitmap.height, close: () => bitmap.close() };
    } catch {
        throw new Error(t('This HEIC image could not be read. It may be corrupted or use an unsupported variant.'));
    }
}

/**
 * Decode a file into something drawable, honoring EXIF orientation.
 * @returns {Promise<{source: CanvasImageSource, width: number, height: number, close: () => void}>}
 */
export async function decodeImage(file) {
    const type = normalizeType(file);
    if (isHeicType(type)) {
        return decodeHeic(file);
    }
    if (type === 'image/svg+xml') {
        return decodeSvg(file);
    }
    if ('createImageBitmap' in window) {
        try {
            const bitmap = await createImageBitmap(file, { imageOrientation: 'from-image' });
            return { source: bitmap, width: bitmap.width, height: bitmap.height, close: () => bitmap.close() };
        } catch {
            // Fall through to <img> decoding.
        }
    }

    const url = URL.createObjectURL(file);
    try {
        const img = new Image();
        img.decoding = 'async';
        img.src = url;
        await img.decode();
        return { source: img, width: img.naturalWidth, height: img.naturalHeight, close: () => {} };
    } catch {
        throw new Error(t('This image could not be read. It may be corrupted.'));
    } finally {
        URL.revokeObjectURL(url);
    }
}

/**
 * Re-encode an image file.
 * @param {File} file
 * @param {{type: string, quality: number, maxWidth?: number|null, resize?: (w: number, h: number) => {width: number, height: number}, crop?: {x: number, y: number, width: number, height: number}}} options
 *        quality is 0–100; `resize` overrides `maxWidth`; `crop` is in source pixels
 * @returns {Promise<{blob: Blob, width: number, height: number}>}
 */
export async function encodeImage(file, { type, quality, maxWidth = null, resize = null, crop = null, background = null }) {
    const image = await decodeImage(file);
    try {
        if (image.width * image.height > LIMITS.maxPixels) {
            throw new Error(t('Image dimensions are too large to process in the browser.'));
        }

        const src = crop ?? { x: 0, y: 0, width: image.width, height: image.height };
        let width;
        let height;
        if (resize) {
            ({ width, height } = resize(src.width, src.height));
        } else {
            const scale = maxWidth && src.width > maxWidth ? maxWidth / src.width : 1;
            width = Math.max(1, Math.round(src.width * scale));
            height = Math.max(1, Math.round(src.height * scale));
        }
        if (width * height > LIMITS.maxPixels) {
            throw new Error(t('The output size is too large to process in the browser.'));
        }

        const canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;
        const ctx = canvas.getContext('2d');
        if (background || type === 'image/jpeg') {
            // JPEG has no transparency; paint white (or the chosen color) instead of black behind transparent pixels.
            ctx.fillStyle = background || '#ffffff';
            ctx.fillRect(0, 0, width, height);
        }
        ctx.imageSmoothingQuality = 'high';
        ctx.drawImage(image.source, src.x, src.y, src.width, src.height, 0, 0, width, height);

        const blob = await new Promise((resolve) => canvas.toBlob(resolve, type, quality / 100));
        canvas.width = canvas.height = 0; // free memory early

        if (!blob) throw new Error(t('Encoding failed.'));
        if (blob.type !== type) {
            throw new Error(t('Your browser cannot create :format images. Try the latest Chrome, Edge or Firefox.', { format: FORMAT_LABELS[type] }));
        }
        return { blob, width, height };
    } finally {
        image.close();
    }
}

/** Whether the browser can show this file in an <img> without decoding it ourselves. */
export function canPreview(type) {
    return !isHeicType(type);
}

export function renameWithExtension(filename, type) {
    const dot = filename.lastIndexOf('.');
    const base = dot > 0 ? filename.slice(0, dot) : filename;
    return `${base}.${EXTENSIONS[type]}`;
}
