/**
 * Keep a calculator's inputs in the URL hash (pure, unit-tested) so a result can
 * be bookmarked or shared: /loan-calculator#amount=25000&rate=6.5
 * The hash is never sent to the server, so cached HTML is unaffected.
 */

/** Serialize the keys of `state` that are in `defaults`. */
export function encodeState(state, defaults) {
    const params = new URLSearchParams();
    for (const key of Object.keys(defaults)) {
        const value = state[key];
        if (value === undefined || value === null || value === '') continue;
        params.set(key, String(value));
    }
    return params.toString();
}

/**
 * Read values from a hash ("#a=1&b=x"), typed like `defaults`. Unknown keys,
 * non-numeric numbers and values outside `options[key]` (allowed list) are ignored.
 * @param {string} hash
 * @param {Record<string, string|number|boolean>} defaults
 * @param {Record<string, string[]>} [options]
 */
export function decodeState(hash, defaults, options = {}) {
    const params = new URLSearchParams(String(hash).replace(/^#/, ''));
    const result = {};
    for (const [key, fallback] of Object.entries(defaults)) {
        if (!params.has(key)) continue;
        const raw = params.get(key);
        if (typeof fallback === 'number') {
            const n = Number(raw);
            if (raw.trim() !== '' && Number.isFinite(n)) result[key] = n;
        } else if (typeof fallback === 'boolean') {
            result[key] = raw === 'true' || raw === '1';
        } else if (!options[key] || options[key].includes(raw)) {
            result[key] = raw.slice(0, 40);
        }
    }
    return result;
}
