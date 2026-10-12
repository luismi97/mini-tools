/**
 * CSV parsing (RFC 4180) and CSV → JSON conversion (pure, unit-tested).
 */

import { t } from './i18n.js';

export const DELIMITERS = { ',': 'Comma', ';': 'Semicolon', '\t': 'Tab', '|': 'Pipe' };

export function detectDelimiter(text) {
    const firstLine = text.split(/\r?\n/, 1)[0] ?? '';
    let best = ',';
    let bestCount = 0;
    for (const d of Object.keys(DELIMITERS)) {
        // Ignore delimiters inside quoted fields.
        const count = firstLine.replace(/"[^"]*"/g, '').split(d).length - 1;
        if (count > bestCount) {
            best = d;
            bestCount = count;
        }
    }
    return best;
}

/**
 * @returns {string[][]} rows of fields; blank lines are skipped
 */
export function parseCsvRows(text, delimiter = ',') {
    if (text.charCodeAt(0) === 0xfeff) text = text.slice(1);

    const rows = [];
    let row = [];
    let field = '';
    let inQuotes = false;
    let i = 0;

    while (i < text.length) {
        const c = text[i];
        if (inQuotes) {
            if (c === '"') {
                if (text[i + 1] === '"') {
                    field += '"';
                    i += 2;
                    continue;
                }
                inQuotes = false;
                i++;
                continue;
            }
            field += c;
            i++;
            continue;
        }
        if (c === '"' && field === '') {
            inQuotes = true;
            i++;
        } else if (c === delimiter) {
            row.push(field);
            field = '';
            i++;
        } else if (c === '\n' || c === '\r') {
            row.push(field);
            rows.push(row);
            row = [];
            field = '';
            i += c === '\r' && text[i + 1] === '\n' ? 2 : 1;
        } else {
            field += c;
            i++;
        }
    }

    if (inQuotes) throw new Error(t('A quoted field is never closed. Check for a missing double quote (").'));
    if (field !== '' || row.length) {
        row.push(field);
        rows.push(row);
    }
    return rows.filter((r) => !(r.length === 1 && r[0].trim() === ''));
}

export function inferValue(value) {
    if (value === 'true') return true;
    if (value === 'false') return false;
    if (value === 'null') return null;
    // Leading zeros (zip codes, IDs like 007) stay strings.
    if (/^-?(0|[1-9]\d*)(\.\d+)?([eE][+-]?\d+)?$/.test(value) && value.length < 16) return Number(value);
    return value;
}

/**
 * @param {{delimiter?: string, header?: boolean, inferTypes?: boolean}} options delimiter 'auto' detects it
 */
export function csvToJson(text, { delimiter = 'auto', header = true, inferTypes = true } = {}) {
    const d = delimiter === 'auto' ? detectDelimiter(text) : delimiter;
    const rows = parseCsvRows(text, d);
    if (rows.length === 0) return [];

    const convert = (v) => (inferTypes ? inferValue(v) : v);

    if (!header) return rows.map((r) => r.map(convert));

    const seen = new Map();
    const keys = rows[0].map((name, i) => {
        const base = name.trim() || `column_${i + 1}`;
        const n = (seen.get(base) ?? 0) + 1;
        seen.set(base, n);
        return n > 1 ? `${base}_${n}` : base;
    });

    return rows.slice(1).map((r) => Object.fromEntries(keys.map((key, i) => [key, convert(r[i] ?? '')])));
}
