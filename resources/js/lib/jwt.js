/**
 * JWT decoding (pure, unit-tested). Decoding only — signatures are NOT verified.
 */
import { decodeBase64 } from './base64.js';
import { t } from './i18n.js';

const TIME_CLAIMS = { exp: 'Expires', iat: 'Issued at', nbf: 'Not valid before' };

export function decodeJwt(token, now = Date.now()) {
    const parts = String(token).trim().replace(/^Bearer\s+/i, '').split('.');
    if (parts.length !== 3 && parts.length !== 2) {
        throw new Error(t('A JWT has three parts separated by dots: header.payload.signature'));
    }

    const header = parsePart(parts[0], 'header');
    const payload = parsePart(parts[1], 'payload');

    const times = Object.entries(TIME_CLAIMS)
        .filter(([claim]) => typeof payload[claim] === 'number')
        .map(([claim, label]) => ({ claim, label, date: new Date(payload[claim] * 1000) }));

    let status = 'valid';
    if (typeof payload.exp === 'number' && payload.exp * 1000 < now) status = 'expired';
    else if (typeof payload.nbf === 'number' && payload.nbf * 1000 > now) status = 'not-yet-valid';

    return { header, payload, signature: parts[2] ?? '', times, status };
}

function parsePart(part, name) {
    let text;
    try {
        text = decodeBase64(part);
    } catch {
        throw new Error(t(name === 'header' ? 'The header is not valid Base64URL.' : 'The payload is not valid Base64URL.'));
    }
    try {
        const value = JSON.parse(text);
        if (value === null || typeof value !== 'object') throw new Error();
        return value;
    } catch {
        throw new Error(t(name === 'header' ? 'The header is not a valid JSON object.' : 'The payload is not a valid JSON object.'));
    }
}
