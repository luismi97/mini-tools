/**
 * Regex matching (pure, unit-tested). The page runs this inside a Web Worker
 * with a timeout, so a catastrophic pattern can never freeze the tab.
 */

export const MAX_MATCHES = 1000;

/**
 * @returns {{matches: Array<{index: number, end: number, value: string, groups: Array<string|undefined>, named: Record<string, string>|null}>, truncated: boolean}}
 */
export function findMatches(pattern, flags, text) {
    let re;
    try {
        re = new RegExp(pattern, flags.includes('g') ? flags : flags + 'g');
    } catch (e) {
        throw new Error(e.message.replace(/^Invalid regular expression: /, ''));
    }

    const matches = [];
    let m;
    while ((m = re.exec(text)) !== null) {
        matches.push({ index: m.index, end: m.index + m[0].length, value: m[0], groups: m.slice(1), named: m.groups ? { ...m.groups } : null });
        if (m[0] === '') re.lastIndex++; // avoid infinite loops on empty matches
        if (!flags.includes('g') || matches.length >= MAX_MATCHES) break;
    }
    return { matches, truncated: matches.length >= MAX_MATCHES };
}

export function replaceAll(pattern, flags, text, replacement) {
    return text.replace(new RegExp(pattern, flags), replacement);
}

/**
 * Split text into plain and matched segments for highlighting.
 */
export function segments(text, matches) {
    const out = [];
    let last = 0;
    for (const [i, m] of matches.entries()) {
        if (m.index > last) out.push({ text: text.slice(last, m.index), match: null });
        if (m.end > m.index) out.push({ text: text.slice(m.index, m.end), match: i });
        last = Math.max(last, m.end);
    }
    if (last < text.length) out.push({ text: text.slice(last), match: null });
    return out;
}
