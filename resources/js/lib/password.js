/**
 * Secure password generation with the Web Crypto API (pure, unit-tested).
 */

import { t } from './i18n.js';

export const SETS = {
    lower: 'abcdefghijklmnopqrstuvwxyz',
    upper: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
    digits: '0123456789',
    symbols: '!@#$%^&*()-_=+[]{};:,.<>?/~',
};

const AMBIGUOUS = /[Il1O0o|`'"]/g;

/** Unbiased random integer in [0, max) using rejection sampling. */
export function randomInt(max) {
    const limit = Math.floor(0x100000000 / max) * max;
    const buf = new Uint32Array(1);
    let value;
    do {
        crypto.getRandomValues(buf);
        value = buf[0];
    } while (value >= limit);
    return value % max;
}

/**
 * @param {{length: number, lower?: boolean, upper?: boolean, digits?: boolean, symbols?: boolean, excludeAmbiguous?: boolean}} options
 */
export function generatePassword({ length = 16, lower = true, upper = true, digits = true, symbols = true, excludeAmbiguous = false } = {}) {
    const size = Math.min(128, Math.max(4, Math.floor(Number(length)) || 16));
    let sets = Object.entries({ lower, upper, digits, symbols })
        .filter(([, on]) => on)
        .map(([name]) => SETS[name]);
    if (excludeAmbiguous) sets = sets.map((s) => s.replace(AMBIGUOUS, ''));
    sets = sets.filter(Boolean);
    if (sets.length === 0) throw new Error(t('Select at least one character type.'));

    const pool = sets.join('');
    // Guarantee at least one character from every selected set, then fill and shuffle.
    const chars = sets.map((s) => s[randomInt(s.length)]);
    while (chars.length < size) chars.push(pool[randomInt(pool.length)]);
    for (let i = chars.length - 1; i > 0; i--) {
        const j = randomInt(i + 1);
        [chars[i], chars[j]] = [chars[j], chars[i]];
    }
    return { password: chars.join(''), poolSize: pool.length };
}

/**
 * Entropy in bits for a random password, with a human label.
 */
export function strength(length, poolSize) {
    const bits = Math.round(length * Math.log2(Math.max(poolSize, 1)));
    let label = 'Very weak';
    if (bits >= 128) label = 'Very strong';
    else if (bits >= 80) label = 'Strong';
    else if (bits >= 60) label = 'Good';
    else if (bits >= 40) label = 'Weak';
    return { bits, label };
}
