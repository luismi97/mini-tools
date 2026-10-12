/**
 * UTF-8 safe Base64 helpers (pure, unit-tested).
 */

import { t } from './i18n.js';

function bytesToBinary(bytes) {
    let binary = '';
    const chunk = 0x8000;
    for (let i = 0; i < bytes.length; i += chunk) {
        binary += String.fromCharCode(...bytes.subarray(i, i + chunk));
    }
    return binary;
}

export function encodeBase64(text, urlSafe = false) {
    const base64 = btoa(bytesToBinary(new TextEncoder().encode(text)));
    return urlSafe ? base64.replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '') : base64;
}

/**
 * Decode Base64 / Base64URL (with or without padding, or a data: URI) to bytes.
 * @returns {Uint8Array}
 */
export function decodeBase64Bytes(input) {
    let clean = String(input).trim().replace(/^data:[^,]*;base64,/i, '').replace(/\s+/g, '');
    clean = clean.replace(/-/g, '+').replace(/_/g, '/');
    if (!/^[A-Za-z0-9+/]*={0,2}$/.test(clean) || clean.length % 4 === 1) {
        throw new Error(t('This is not valid Base64.'));
    }
    clean = clean.padEnd(Math.ceil(clean.length / 4) * 4, '=');
    const binary = atob(clean);
    const bytes = new Uint8Array(binary.length);
    for (let i = 0; i < binary.length; i++) bytes[i] = binary.charCodeAt(i);
    return bytes;
}

export function decodeBase64(input) {
    const bytes = decodeBase64Bytes(input);
    try {
        return new TextDecoder('utf-8', { fatal: true }).decode(bytes);
    } catch {
        throw new Error(t('The decoded data is binary (for example an image or file), not text.'));
    }
}
