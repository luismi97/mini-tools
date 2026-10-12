/**
 * UUID generation and validation (pure, unit-tested). Uses the Web Crypto API.
 */

const HEX = Array.from({ length: 256 }, (_, i) => i.toString(16).padStart(2, '0'));

function format(bytes) {
    const h = Array.from(bytes, (b) => HEX[b]).join('');
    return `${h.slice(0, 8)}-${h.slice(8, 12)}-${h.slice(12, 16)}-${h.slice(16, 20)}-${h.slice(20)}`;
}

export function uuidv4() {
    if (typeof crypto.randomUUID === 'function') return crypto.randomUUID();
    const bytes = crypto.getRandomValues(new Uint8Array(16));
    bytes[6] = (bytes[6] & 0x0f) | 0x40;
    bytes[8] = (bytes[8] & 0x3f) | 0x80;
    return format(bytes);
}

/** Time-ordered UUID (RFC 9562): 48-bit Unix ms timestamp + random bits. */
export function uuidv7(now = Date.now()) {
    const bytes = crypto.getRandomValues(new Uint8Array(16));
    let ts = now;
    for (let i = 5; i >= 0; i--) {
        bytes[i] = ts % 256;
        ts = Math.floor(ts / 256);
    }
    bytes[6] = (bytes[6] & 0x0f) | 0x70;
    bytes[8] = (bytes[8] & 0x3f) | 0x80;
    return format(bytes);
}

/**
 * @param {number} count 1–1000
 * @param {{version?: 'v4'|'v7', uppercase?: boolean, hyphens?: boolean, braces?: boolean}} options
 */
export function generateUuids(count, { version = 'v4', uppercase = false, hyphens = true, braces = false } = {}) {
    const n = Math.min(1000, Math.max(1, Math.floor(Number(count)) || 1));
    const make = version === 'v7' ? uuidv7 : uuidv4;
    return Array.from({ length: n }, () => {
        let id = make();
        if (!hyphens) id = id.replace(/-/g, '');
        if (uppercase) id = id.toUpperCase();
        return braces ? `{${id}}` : id;
    });
}

/**
 * @returns {{valid: boolean, version: number|null}}
 */
export function inspectUuid(value) {
    const clean = String(value).trim().replace(/^\{|\}$/g, '');
    const match = /^[0-9a-f]{8}-?[0-9a-f]{4}-?([0-9a-f])[0-9a-f]{3}-?[89ab][0-9a-f]{3}-?[0-9a-f]{12}$/i.exec(clean);
    return match ? { valid: true, version: parseInt(match[1], 16) } : { valid: false, version: null };
}
