/**
 * URL encoding helpers (pure, unit-tested).
 */

import { t } from './i18n.js';

/** @param {'component'|'full'} mode */
export function encodeUrl(text, mode = 'component') {
    return mode === 'full' ? encodeURI(text) : encodeURIComponent(text);
}

export function decodeUrl(text, plusAsSpace = false) {
    try {
        return decodeURIComponent(plusAsSpace ? text.replace(/\+/g, ' ') : text);
    } catch {
        throw new Error(t('The text contains malformed percent-encoding (for example a "%" not followed by two hex digits).'));
    }
}

/**
 * Break a URL into its parts, or null if the text is not an absolute URL.
 */
export function parseUrl(text) {
    const value = text.trim();
    if (!/^[a-z][a-z0-9+.-]*:\/\//i.test(value)) return null;
    try {
        const url = new URL(value);
        return {
            protocol: url.protocol.replace(/:$/, ''),
            host: url.host,
            path: url.pathname,
            hash: url.hash.replace(/^#/, ''),
            params: [...url.searchParams.entries()],
        };
    } catch {
        return null;
    }
}
