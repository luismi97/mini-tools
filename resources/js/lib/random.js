/**
 * Cryptographically secure random numbers and picks (pure, unit-tested).
 */
import { randomInt } from './password.js';
import { intlLocale, t } from './i18n.js';

export const MAX_COUNT = 10000;

/**
 * @param {{min: number, max: number, count?: number, unique?: boolean, sort?: 'none'|'asc'|'desc'}} options
 */
export function randomIntegers({ min, max, count = 1, unique = false, sort = 'none' }) {
    min = Math.ceil(Number(min));
    max = Math.floor(Number(max));
    count = Math.floor(Number(count));
    if (!Number.isFinite(min) || !Number.isFinite(max)) throw new Error(t('Enter a minimum and a maximum.'));
    if (min > max) throw new Error(t('The minimum must be less than or equal to the maximum.'));
    if (!(count >= 1 && count <= MAX_COUNT)) throw new Error(t('Generate between 1 and :max numbers.', { max: MAX_COUNT.toLocaleString(intlLocale()) }));
    const span = max - min + 1;
    if (span > 2 ** 32) throw new Error(t('The range is too large (maximum about 4.29 billion values).'));
    if (unique && count > span) throw new Error(t('There are only :span different numbers between :min and :max.', { span, min, max }));

    let numbers;
    if (unique) {
        const seen = new Set();
        while (seen.size < count) seen.add(min + randomInt(span));
        numbers = [...seen];
    } else {
        numbers = Array.from({ length: count }, () => min + randomInt(span));
    }
    if (sort === 'asc') numbers.sort((a, b) => a - b);
    if (sort === 'desc') numbers.sort((a, b) => b - a);
    return numbers;
}

/**
 * Pick `count` distinct entries from a list (Fisher–Yates partial shuffle).
 */
export function pickRandom(items, count = 1) {
    const list = [...items];
    const n = Math.min(Math.max(1, Math.floor(count)), list.length);
    for (let i = 0; i < n; i++) {
        const j = i + randomInt(list.length - i);
        [list[i], list[j]] = [list[j], list[i]];
    }
    return list.slice(0, n);
}

/** Split a list into `teams` groups of near-equal size, randomly. */
export function makeTeams(items, teams) {
    const shuffled = pickRandom(items, items.length);
    const groups = Array.from({ length: Math.max(1, Math.floor(teams)) }, () => []);
    shuffled.forEach((item, i) => groups[i % groups.length].push(item));
    return groups;
}
