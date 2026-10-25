/**
 * Parse page range expressions such as "1-3, 5, 8-" (pure, unit-tested).
 * Pages are 1-based. "8-" means "from 8 to the last page".
 *
 * @returns {Array<[number, number]>} inclusive [start, end] pairs, in the given order
 */

import { t } from './i18n.js';

export function parsePageRanges(input, pageCount) {
    const parts = String(input).split(',').map((p) => p.trim()).filter(Boolean);
    if (parts.length === 0) throw new Error(t('Enter at least one page or range, for example 1-3, 5.'));

    return parts.map((part) => {
        const m = /^(\d+)?\s*(?:(-)\s*(\d+)?)?$/.exec(part);
        if (!m || (!m[1] && !m[3])) throw new Error(t('":part" is not a valid page or range.', { part }));

        const start = m[1] ? Number(m[1]) : 1;
        const end = m[2] ? (m[3] ? Number(m[3]) : pageCount) : start;

        if (start < 1 || end < 1) throw new Error(t('Page numbers start at 1.'));
        if (start > pageCount || end > pageCount) throw new Error(t(pageCount === 1 ? 'This PDF only has :count page.' : 'This PDF only has :count pages.', { count: pageCount }));
        if (start > end) throw new Error(t('":part" is reversed. Use :fixed instead.', { part, fixed: `${end}-${start}` }));
        return [start, end];
    });
}

/** Compact 1-based page numbers into range text: [1, 2, 3, 5, 8, 9] → "1-3, 5, 8-9" (sorted, deduplicated). */
export function numbersToRanges(numbers) {
    const sorted = [...new Set(numbers)].filter((n) => Number.isInteger(n) && n > 0).sort((a, b) => a - b);
    const parts = [];
    for (let i = 0; i < sorted.length; i++) {
        const start = sorted[i];
        while (sorted[i + 1] === sorted[i] + 1) i++;
        parts.push(start === sorted[i] ? `${start}` : `${start}-${sorted[i]}`);
    }
    return parts.join(', ');
}

/** Expand ranges to a flat list of 0-based page indexes (duplicates kept, order preserved). */
export function rangesToIndexes(ranges) {
    return ranges.flatMap(([start, end]) => Array.from({ length: end - start + 1 }, (_, i) => start - 1 + i));
}
