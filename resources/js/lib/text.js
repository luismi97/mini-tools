/**
 * Text utilities: counting, case conversion, line operations (pure, unit-tested).
 */
import { intlLocale } from './i18n.js';

const WORD = /[\p{L}\p{N}]+(?:['’\-.][\p{L}\p{N}]+)*/gu;

const STOPWORDS = new Set(
    ('a about above after again against all am an and any are as at be because been before being below between both but by can could did do does doing down during each few for from further had has have having he her here hers him his how i if in into is it its itself just me more most my no nor not now of off on once only or other our ours out over own same she should so some such than that the their theirs them then there these they this those through to too under until up very was we were what when where which while who whom why will with would you your yours')
        .split(' ')
        .concat("it's i'm i've i'll i'd you're you've you'll we're we've they're they've he's she's that's there's what's let's don't doesn't didn't isn't aren't wasn't weren't can't couldn't won't wouldn't shouldn't haven't hasn't".split(' '))
        // Spanish: keyword density must also work for texts written in the site's other language.
        .concat('al algo algunas algunos ante antes como con contra cual cuando de del desde donde durante e el ella ellas ellos en entre era eran es esa esas ese eso esos esta estaba estado estan están estar estas este esto estos fue fueron ha había han hasta hay la las le les lo los me mi mis mucho muy más ni no nos nosotros o os otra otro para pero poco por porque que qué se sea ser si sido sin sobre son su sus también tanto te tiene tienen todo todos tu tus un una uno unos y ya yo él'.split(' ')),
);

export function words(text) {
    return text.match(WORD) ?? [];
}

function graphemeCount(text) {
    if (typeof Intl !== 'undefined' && Intl.Segmenter) {
        let count = 0;
        for (const _ of new Intl.Segmenter('en', { granularity: 'grapheme' }).segment(text)) count++;
        return count;
    }
    return [...text].length;
}

/**
 * @returns {{words: number, characters: number, charactersNoSpaces: number, sentences: number,
 *            paragraphs: number, lines: number, readingMinutes: number, speakingMinutes: number,
 *            keywords: Array<{word: string, count: number, percent: number}>}}
 */
export function analyzeText(text) {
    const list = words(text);
    const characters = graphemeCount(text);
    const charactersNoSpaces = graphemeCount(text.replace(/\s+/g, ''));
    const sentences = text
        .split(/[.!?…]+(?=\s|$)/u)
        .filter((s) => /[\p{L}\p{N}]/u.test(s)).length;
    const paragraphs = text.split(/\n\s*\n/).filter((p) => p.trim()).length;
    const lines = text ? text.split(/\r\n|\r|\n/).length : 0;

    const counts = new Map();
    let counted = 0;
    for (const w of list) {
        const key = w.toLowerCase().replace(/’/g, "'");
        if (key.length < 3 || STOPWORDS.has(key) || /^\d+$/.test(key)) continue;
        counts.set(key, (counts.get(key) ?? 0) + 1);
        counted++;
    }
    const keywords = [...counts.entries()]
        .sort((a, b) => b[1] - a[1] || a[0].localeCompare(b[0]))
        .slice(0, 10)
        .map(([word, count]) => ({ word, count, percent: list.length ? Math.round((count / list.length) * 1000) / 10 : 0 }));

    return {
        words: list.length,
        characters,
        charactersNoSpaces,
        sentences,
        paragraphs,
        lines,
        // Average adult reading speed ~238 wpm, speaking ~130 wpm.
        readingMinutes: list.length / 238,
        speakingMinutes: list.length / 130,
        keywords,
        uniqueKeywords: counted ? counts.size : 0,
    };
}

/* -------------------------------------------------------------- Case */

const SMALL_WORDS = new Set('a an and as at but by en for if in nor of on or per the to v vs via'.split(' '));

const capitalize = (w) => w.charAt(0).toUpperCase() + w.slice(1).toLowerCase();

function splitIdentifierWords(text) {
    return text
        .replace(/([a-z0-9])([A-Z])/g, '$1 $2')
        .replace(/([A-Z]+)([A-Z][a-z])/g, '$1 $2')
        .split(/[^\p{L}\p{N}]+/u)
        .filter(Boolean);
}

export const CASES = {
    upper: 'UPPERCASE',
    lower: 'lowercase',
    title: 'Title Case',
    sentence: 'Sentence case',
    capitalized: 'Capitalized Case',
    alternating: 'aLtErNaTiNg',
    inverse: 'iNVERSE cASE',
    camel: 'camelCase',
    pascal: 'PascalCase',
    snake: 'snake_case',
    kebab: 'kebab-case',
    constant: 'CONSTANT_CASE',
};

export function convertCase(text, mode) {
    switch (mode) {
        case 'upper':
            return text.toUpperCase();
        case 'lower':
            return text.toLowerCase();
        case 'capitalized':
            return text.toLowerCase().replace(/(^|[\s\-"'(\[])(\p{L})/gu, (_, pre, ch) => pre + ch.toUpperCase());
        case 'title':
            return text
                .split('\n')
                .map((line) => {
                    const tokens = line.split(/(\s+)/);
                    const wordIdx = tokens.map((t, i) => (/\S/.test(t) ? i : -1)).filter((i) => i >= 0);
                    const first = wordIdx[0];
                    const last = wordIdx[wordIdx.length - 1];
                    return tokens
                        .map((t, i) => {
                            if (!/\S/.test(t)) return t;
                            const lower = t.toLowerCase();
                            if (i !== first && i !== last && SMALL_WORDS.has(lower.replace(/[^\p{L}]/gu, ''))) return lower;
                            return lower.replace(/\p{L}/u, (c) => c.toUpperCase());
                        })
                        .join('');
                })
                .join('\n');
        case 'sentence':
            return text.toLowerCase().replace(/(^\s*|[.!?…]\s+|\n\s*)(\p{L})/gu, (_, pre, ch) => pre + ch.toUpperCase());
        case 'alternating': {
            let i = 0;
            return [...text].map((c) => (/\p{L}/u.test(c) ? (i++ % 2 ? c.toUpperCase() : c.toLowerCase()) : c)).join('');
        }
        case 'inverse':
            return [...text].map((c) => (c === c.toUpperCase() ? c.toLowerCase() : c.toUpperCase())).join('');
        case 'camel':
        case 'pascal':
        case 'snake':
        case 'kebab':
        case 'constant':
            return text
                .split('\n')
                .map((line) => {
                    const parts = splitIdentifierWords(line);
                    if (mode === 'camel') return parts.map((w, i) => (i ? capitalize(w) : w.toLowerCase())).join('');
                    if (mode === 'pascal') return parts.map(capitalize).join('');
                    if (mode === 'snake') return parts.map((w) => w.toLowerCase()).join('_');
                    if (mode === 'kebab') return parts.map((w) => w.toLowerCase()).join('-');
                    return parts.map((w) => w.toUpperCase()).join('_');
                })
                .join('\n');
        default:
            return text;
    }
}

/* ------------------------------------------------------------- Lines */

const splitLines = (text) => text.split(/\r\n|\r|\n/);

/**
 * @param {{caseSensitive?: boolean, trim?: boolean, removeEmpty?: boolean}} options
 * @returns {{text: string, removed: number, kept: number}}
 */
export function removeDuplicateLines(text, { caseSensitive = true, trim = true, removeEmpty = false } = {}) {
    const seen = new Set();
    const kept = [];
    let removed = 0;
    for (const line of splitLines(text)) {
        const value = trim ? line.trim() : line;
        if (value === '') {
            if (removeEmpty) removed++;
            else kept.push(value);
            continue;
        }
        const key = caseSensitive ? value : value.toLowerCase();
        if (seen.has(key)) {
            removed++;
            continue;
        }
        seen.add(key);
        kept.push(value);
    }
    return { text: kept.join('\n'), removed, kept: kept.length };
}

/**
 * @param {{order?: 'asc'|'desc'|'length'|'length-desc'|'reverse'|'random', natural?: boolean,
 *          caseSensitive?: boolean, removeEmpty?: boolean, unique?: boolean, trim?: boolean}} options
 * @param {() => number} [random] injectable for tests
 */
export function sortLines(text, { order = 'asc', natural = true, caseSensitive = false, removeEmpty = true, unique = false, trim = true } = {}, random = Math.random) {
    let lines = splitLines(text).map((l) => (trim ? l.trim() : l));
    if (removeEmpty) lines = lines.filter((l) => l !== '');
    if (unique) {
        const seen = new Set();
        lines = lines.filter((l) => {
            const key = caseSensitive ? l : l.toLowerCase();
            if (seen.has(key)) return false;
            seen.add(key);
            return true;
        });
    }

    // Page language: in Spanish "ñ" sorts after "n", not as a plain "n".
    const collator = new Intl.Collator(intlLocale(), { numeric: natural, sensitivity: caseSensitive ? 'variant' : 'base' });

    switch (order) {
        case 'desc':
            lines.sort((a, b) => collator.compare(b, a));
            break;
        case 'length':
            lines.sort((a, b) => a.length - b.length || collator.compare(a, b));
            break;
        case 'length-desc':
            lines.sort((a, b) => b.length - a.length || collator.compare(a, b));
            break;
        case 'reverse':
            lines.reverse();
            break;
        case 'random':
            for (let i = lines.length - 1; i > 0; i--) {
                const j = Math.floor(random() * (i + 1));
                [lines[i], lines[j]] = [lines[j], lines[i]];
            }
            break;
        default:
            lines.sort((a, b) => collator.compare(a, b));
    }
    return lines.join('\n');
}
