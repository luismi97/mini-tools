/**
 * Unix timestamp conversion (pure, unit-tested).
 */

import { intlLocale, t } from './i18n.js';

/**
 * Parse a Unix timestamp; seconds vs. milliseconds is detected automatically
 * (values above 1e11 are treated as milliseconds — after the year 5138 in seconds).
 * @returns {{date: Date, unit: 'seconds'|'milliseconds'}}
 */
export function parseTimestamp(input) {
    const text = String(input).trim();
    if (!/^-?\d+(\.\d+)?$/.test(text)) throw new Error(t('Enter a Unix timestamp made of digits, for example 1767225600.'));
    const value = Number(text);
    const unit = Math.abs(value) > 1e11 ? 'milliseconds' : 'seconds';
    const date = new Date(unit === 'seconds' ? value * 1000 : value);
    if (Number.isNaN(date.getTime())) throw new Error(t('This timestamp is out of range.'));
    return { date, unit };
}

/** Relative description like "3 days ago" or "in 2 hours". */
export function relativeTime(date, now = Date.now()) {
    const diff = date.getTime() - now;
    const abs = Math.abs(diff);
    const units = [
        ['year', 31556952000],
        ['month', 2629746000],
        ['week', 604800000],
        ['day', 86400000],
        ['hour', 3600000],
        ['minute', 60000],
        ['second', 1000],
    ];
    for (const [name, ms] of units) {
        if (abs >= ms || name === 'second') {
            const n = Math.round(abs / ms);
            if (n === 0) return t('just now');
            return new Intl.RelativeTimeFormat(intlLocale(), { numeric: 'always' }).format(diff < 0 ? -n : n, name);
        }
    }
    return t('just now');
}

/**
 * Convert a date-time string to timestamps. Without an explicit offset,
 * "local" interprets it in the browser time zone and "utc" in UTC.
 * @param {string} value e.g. "2026-10-06T14:30" or "2026-10-06 14:30:00"
 * @param {'local'|'utc'} zone
 */
export function dateToTimestamp(value, zone = 'local') {
    const text = String(value).trim().replace(' ', 'T');
    const m = /^(\d{4})-(\d{2})-(\d{2})(?:T(\d{2}):(\d{2})(?::(\d{2}))?)?$/.exec(text);
    if (!m) throw new Error(t('Use the format YYYY-MM-DD HH:MM:SS.'));
    const parts = [Number(m[1]), Number(m[2]) - 1, Number(m[3]), Number(m[4] ?? 0), Number(m[5] ?? 0), Number(m[6] ?? 0)];
    const ms = zone === 'utc' ? Date.UTC(...parts) : new Date(...parts).getTime();
    return { seconds: Math.floor(ms / 1000), milliseconds: ms };
}
