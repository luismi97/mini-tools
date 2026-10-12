/**
 * Myers O(ND) diff (pure, unit-tested).
 * Only the active diagonals are stored per step, so memory grows with D², not N·D.
 */

import { t } from './i18n.js';

export const MAX_EDITS = 3000;

/**
 * @template T
 * @param {T[]} a
 * @param {T[]} b
 * @returns {Array<{type: 'equal'|'insert'|'delete', value: T}>}
 */
export function diffArrays(a, b) {
    const n = a.length;
    const m = b.length;
    const max = n + m;
    const offset = max + 1;
    const v = new Int32Array(2 * max + 3);
    const trace = [];

    for (let d = 0; d <= max; d++) {
        if (d > MAX_EDITS) {
            throw new Error(t('The texts are too different to compare. Try comparing smaller sections.'));
        }
        let done = false;
        for (let k = -d; k <= d; k += 2) {
            let x = k === -d || (k !== d && v[offset + k - 1] < v[offset + k + 1]) ? v[offset + k + 1] : v[offset + k - 1] + 1;
            let y = x - k;
            while (x < n && y < m && a[x] === b[y]) {
                x++;
                y++;
            }
            v[offset + k] = x;
            if (x >= n && y >= m) {
                done = true;
                break;
            }
        }
        trace.push(v.slice(offset - d, offset + d + 1));
        if (done) return backtrack(trace, a, b);
    }
    return backtrack(trace, a, b);
}

function backtrack(trace, a, b) {
    const get = (d, k) => trace[d][k + d];
    let x = a.length;
    let y = b.length;
    const ops = [];

    for (let d = trace.length - 1; d > 0; d--) {
        const k = x - y;
        const prevK = k === -d || (k !== d && get(d - 1, k - 1) < get(d - 1, k + 1)) ? k + 1 : k - 1;
        const prevX = get(d - 1, prevK);
        const prevY = prevX - prevK;
        const midX = prevK === k + 1 ? prevX : prevX + 1;
        const midY = midX - k;

        while (x > midX && y > midY) {
            ops.push({ type: 'equal', value: a[--x] });
            y--;
        }
        if (prevK === k + 1) ops.push({ type: 'insert', value: b[prevY] });
        else ops.push({ type: 'delete', value: a[prevX] });
        x = prevX;
        y = prevY;
    }
    while (x > 0 && y > 0) {
        ops.push({ type: 'equal', value: a[--x] });
        y--;
    }
    return ops.reverse();
}

/**
 * Diff two texts by line or by word, merging consecutive operations.
 * @param {'lines'|'words'} mode
 * @returns {{chunks: Array<{type: string, value: string}>, added: number, removed: number}}
 */
export function diffText(before, after, mode = 'lines', { ignoreCase = false, ignoreWhitespace = false } = {}) {
    const tokenize = mode === 'words' ? (t) => t.split(/(\s+)/).filter((s) => s !== '') : (t) => t.split(/\r\n|\r|\n/);
    const left = tokenize(before);
    const right = tokenize(after);
    const norm = (s) => {
        let out = ignoreWhitespace ? s.replace(/\s+/g, ' ').trim() : s;
        if (ignoreCase) out = out.toLowerCase();
        return out;
    };

    // Diff normalized keys, then map back to the original tokens for display.
    const ops = diffArrays(left.map(norm), right.map(norm));
    let li = 0;
    let ri = 0;
    let added = 0;
    let removed = 0;
    const tokens = [];

    for (const op of ops) {
        if (op.type === 'equal') {
            tokens.push({ type: 'equal', value: right[ri++] });
            li++;
        } else if (op.type === 'insert') {
            const value = right[ri++];
            if (mode === 'lines' || /\S/.test(value)) added++;
            tokens.push({ type: 'insert', value });
        } else {
            const value = left[li++];
            if (mode === 'lines' || /\S/.test(value)) removed++;
            tokens.push({ type: 'delete', value });
        }
    }

    const chunks = mode === 'words' ? groupWordChanges(tokens) : mergeRuns(tokens, '\n');
    return { chunks, added, removed };
}

function mergeRuns(tokens, joiner) {
    const chunks = [];
    for (const t of tokens) {
        const last = chunks[chunks.length - 1];
        if (last && last.type === t.type) last.value += joiner + t.value;
        else chunks.push({ ...t });
    }
    return chunks;
}

/**
 * In word mode, a change like "Built with X" → "New tools Y" would interleave
 * token by token. Changes separated only by whitespace are grouped so all
 * deleted words are shown first, then all inserted words.
 */
function groupWordChanges(tokens) {
    const chunks = [];
    let i = 0;
    while (i < tokens.length) {
        if (tokens[i].type === 'equal') {
            const last = chunks[chunks.length - 1];
            if (last && last.type === 'equal') last.value += tokens[i].value;
            else chunks.push({ type: 'equal', value: tokens[i].value });
            i++;
            continue;
        }
        let del = '';
        let ins = '';
        while (i < tokens.length) {
            const t = tokens[i];
            const bridge = t.type === 'equal' && !/\S/.test(t.value) && tokens[i + 1] && tokens[i + 1].type !== 'equal';
            if (t.type === 'delete') del += t.value;
            else if (t.type === 'insert') ins += t.value;
            else if (bridge) {
                del += t.value;
                ins += t.value;
            } else break;
            i++;
        }
        if (del.trim()) chunks.push({ type: 'delete', value: del });
        if (ins.trim()) chunks.push({ type: 'insert', value: ins });
    }
    return chunks;
}
