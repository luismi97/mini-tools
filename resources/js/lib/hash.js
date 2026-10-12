/**
 * Hashing (pure, unit-tested). SHA family via the Web Crypto API; MD5 is not
 * available there, so it is implemented here (RFC 1321).
 */

import { t } from './i18n.js';

export const ALGORITHMS = {
    md5: 'MD5',
    'sha-1': 'SHA-1',
    'sha-256': 'SHA-256',
    'sha-384': 'SHA-384',
    'sha-512': 'SHA-512',
};

const toHex = (bytes) => Array.from(bytes, (b) => b.toString(16).padStart(2, '0')).join('');

/**
 * @param {ArrayBuffer|Uint8Array} data
 * @param {keyof ALGORITHMS} algorithm
 * @returns {Promise<string>} lowercase hex digest
 */
export async function hashBytes(data, algorithm) {
    const bytes = data instanceof Uint8Array ? data : new Uint8Array(data);
    if (algorithm === 'md5') return md5(bytes);
    const name = ALGORITHMS[algorithm];
    if (!name) throw new Error(t('Unknown algorithm.'));
    return toHex(new Uint8Array(await crypto.subtle.digest(name, bytes)));
}

export function hashText(text, algorithm) {
    return hashBytes(new TextEncoder().encode(text), algorithm);
}

/* ---------------------------------------------------------------- MD5 */

const S = [7, 12, 17, 22, 7, 12, 17, 22, 7, 12, 17, 22, 7, 12, 17, 22, 5, 9, 14, 20, 5, 9, 14, 20, 5, 9, 14, 20, 5, 9, 14, 20,
    4, 11, 16, 23, 4, 11, 16, 23, 4, 11, 16, 23, 4, 11, 16, 23, 6, 10, 15, 21, 6, 10, 15, 21, 6, 10, 15, 21, 6, 10, 15, 21];
const K = Array.from({ length: 64 }, (_, i) => Math.floor(Math.abs(Math.sin(i + 1)) * 2 ** 32) >>> 0);

/** @param {Uint8Array} message */
export function md5(message) {
    const length = message.length;
    const padded = new Uint8Array((((length + 8) >>> 6) + 1) * 64);
    padded.set(message);
    padded[length] = 0x80;
    const view = new DataView(padded.buffer);
    const bits = length * 8;
    view.setUint32(padded.length - 8, bits >>> 0, true);
    view.setUint32(padded.length - 4, Math.floor(bits / 2 ** 32), true);

    let a0 = 0x67452301;
    let b0 = 0xefcdab89;
    let c0 = 0x98badcfe;
    let d0 = 0x10325476;
    const M = new Uint32Array(16);

    for (let offset = 0; offset < padded.length; offset += 64) {
        for (let i = 0; i < 16; i++) M[i] = view.getUint32(offset + i * 4, true);
        let A = a0;
        let B = b0;
        let C = c0;
        let D = d0;
        for (let i = 0; i < 64; i++) {
            let F;
            let g;
            if (i < 16) {
                F = (B & C) | (~B & D);
                g = i;
            } else if (i < 32) {
                F = (D & B) | (~D & C);
                g = (5 * i + 1) % 16;
            } else if (i < 48) {
                F = B ^ C ^ D;
                g = (3 * i + 5) % 16;
            } else {
                F = C ^ (B | ~D);
                g = (7 * i) % 16;
            }
            F = (F + A + K[i] + M[g]) >>> 0;
            A = D;
            D = C;
            C = B;
            B = (B + ((F << S[i]) | (F >>> (32 - S[i])))) >>> 0;
        }
        a0 = (a0 + A) >>> 0;
        b0 = (b0 + B) >>> 0;
        c0 = (c0 + C) >>> 0;
        d0 = (d0 + D) >>> 0;
    }

    const out = new DataView(new ArrayBuffer(16));
    [a0, b0, c0, d0].forEach((v, i) => out.setUint32(i * 4, v, true));
    return toHex(new Uint8Array(out.buffer));
}
