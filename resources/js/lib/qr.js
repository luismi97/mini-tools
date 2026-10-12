/**
 * QR code payload builders and renderers (pure; unit-tested with node --test).
 * qrcode-generator only computes the module matrix; SVG/PNG rendering is ours
 * so colors, margin and size are fully controlled.
 */
import qrcode from 'qrcode-generator';
import { t } from './i18n.js';

// Encode text as UTF-8 so accents, emoji and non-Latin scripts work.
qrcode.stringToBytes = (s) => Array.from(new TextEncoder().encode(s));

export const TYPES = ['url', 'text', 'email', 'phone', 'wifi'];

/**
 * Build the string encoded in the QR code for each content type.
 * @returns {{value: string} | {error: string}}
 */
export function buildPayload(type, data) {
    switch (type) {
        case 'url': {
            const url = (data.url || '').trim();
            if (!url) return { error: t('Enter a URL.') };
            return { value: /^[a-z][a-z0-9+.-]*:/i.test(url) ? url : `https://${url}` };
        }
        case 'text': {
            if (!data.text) return { error: t('Enter some text.') };
            return { value: data.text };
        }
        case 'email': {
            const to = (data.email || '').trim();
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(to)) return { error: t('Enter a valid email address.') };
            const params = [];
            if (data.subject) params.push(`subject=${encodeURIComponent(data.subject)}`);
            if (data.body) params.push(`body=${encodeURIComponent(data.body)}`);
            return { value: `mailto:${to}${params.length ? `?${params.join('&')}` : ''}` };
        }
        case 'phone': {
            const phone = (data.phone || '').replace(/[^\d+]/g, '');
            if (phone.replace(/\D/g, '').length < 3) return { error: t('Enter a valid phone number.') };
            return { value: `tel:${phone}` };
        }
        case 'wifi': {
            if (!data.ssid) return { error: t('Enter the network name (SSID).') };
            const security = ['WPA', 'WEP', 'nopass'].includes(data.security) ? data.security : 'WPA';
            if (security !== 'nopass' && !data.password) return { error: t('Enter the Wi-Fi password.') };
            const parts = [`T:${security}`, `S:${escapeWifi(data.ssid)}`];
            if (security !== 'nopass') parts.push(`P:${escapeWifi(data.password)}`);
            if (data.hidden) parts.push('H:true');
            return { value: `WIFI:${parts.join(';')};;` };
        }
        default:
            return { error: t('Unknown QR code type.') };
    }
}

function escapeWifi(value) {
    return String(value).replace(/([\\;,:"])/g, '\\$1');
}

/**
 * @param {string} value
 * @param {'L'|'M'|'Q'|'H'} level error correction level
 * @returns {{count: number, isDark: (row: number, col: number) => boolean}}
 */
export function createMatrix(value, level = 'M') {
    const qr = qrcode(0, level);
    qr.addData(value, 'Byte');
    try {
        qr.make();
    } catch {
        throw new Error(t('Too much content for a QR code. Shorten the text or lower the error correction level.'));
    }
    const count = qr.getModuleCount();
    return { count, isDark: (row, col) => qr.isDark(row, col) };
}

export function isHexColor(value) {
    return /^#[0-9a-f]{6}$/i.test(value);
}

/**
 * Render the matrix as a standalone SVG document.
 * @param {{count: number, isDark: Function}} matrix
 * @param {{size: number, margin: number, foreground: string, background: string}} options margin in modules
 */
export function renderSvg(matrix, { size, margin, foreground, background }) {
    const fg = isHexColor(foreground) ? foreground : '#000000';
    const bg = isHexColor(background) ? background : '#ffffff';
    const total = matrix.count + margin * 2;

    // One path; consecutive dark modules in a row are merged into a single rect.
    let d = '';
    for (let row = 0; row < matrix.count; row++) {
        let col = 0;
        while (col < matrix.count) {
            if (!matrix.isDark(row, col)) {
                col++;
                continue;
            }
            const start = col;
            while (col < matrix.count && matrix.isDark(row, col)) col++;
            d += `M${start + margin} ${row + margin}h${col - start}v1h-${col - start}z`;
        }
    }

    return `<svg xmlns="http://www.w3.org/2000/svg" width="${size}" height="${size}" viewBox="0 0 ${total} ${total}" shape-rendering="crispEdges">`
        + `<rect width="100%" height="100%" fill="${bg}"/>`
        + `<path fill="${fg}" d="${d}"/>`
        + '</svg>';
}

/**
 * Draw the matrix on a canvas context of size×size pixels.
 * Module edges are rounded to whole pixels so there are no hairline seams.
 */
export function drawOnCanvas(ctx, matrix, { size, margin, foreground, background }) {
    const total = matrix.count + margin * 2;
    const scale = size / total;
    ctx.fillStyle = isHexColor(background) ? background : '#ffffff';
    ctx.fillRect(0, 0, size, size);
    ctx.fillStyle = isHexColor(foreground) ? foreground : '#000000';
    for (let row = 0; row < matrix.count; row++) {
        const y0 = Math.round((row + margin) * scale);
        const y1 = Math.round((row + margin + 1) * scale);
        for (let col = 0; col < matrix.count; col++) {
            if (!matrix.isDark(row, col)) continue;
            const x0 = Math.round((col + margin) * scale);
            const x1 = Math.round((col + margin + 1) * scale);
            ctx.fillRect(x0, y0, x1 - x0, y1 - y0);
        }
    }
}

/** WCAG contrast ratio between two hex colors. */
export function contrastRatio(a, b) {
    const luminance = (hex) => {
        const [r, g, b2] = [1, 3, 5].map((i) => {
            const c = parseInt(hex.slice(i, i + 2), 16) / 255;
            return c <= 0.03928 ? c / 12.92 : ((c + 0.055) / 1.055) ** 2.4;
        });
        return 0.2126 * r + 0.7152 * g + 0.0722 * b2;
    };
    const [l1, l2] = [luminance(a), luminance(b)].sort((x, y) => y - x);
    return (l1 + 0.05) / (l2 + 0.05);
}
