/**
 * Language preference (pure, DOM-free, unit-tested).
 *
 * - English is always the default: the root URLs are English and crawlers are never redirected.
 * - First visit: if the browser language matches another available version of the page,
 *   suggest it in a small banner (no automatic redirect — Google recommends against it).
 * - Once the visitor picks a language (switcher or banner), it is stored in localStorage and
 *   later visits that arrive from outside the site land directly on that language.
 *
 * The <head> of layouts/app.blade.php inlines a copy of redirectTarget() so the redirect
 * happens before the first paint; keep both in sync.
 */

export const STORAGE_KEY = 'tk-locale';

/** First supported locale in the browser's preference list ("pt-BR" → "pt"), or null. */
export function matchBrowserLocale(browserLanguages, supported) {
    for (const language of browserLanguages ?? []) {
        const base = String(language).toLowerCase().split('-')[0];
        if (supported.includes(base)) {
            return base;
        }
    }
    return null;
}

/**
 * URL to send a returning visitor to, or null. Only for visits arriving from outside the site,
 * so moving around inside the site (or switching language) never bounces.
 */
export function redirectTarget({ preferred, current, alternates, referrer, host }) {
    if (!preferred || preferred === current || !alternates?.[preferred]) {
        return null;
    }
    if (referrer) {
        try {
            if (new URL(referrer).host === host) {
                return null;
            }
        } catch {
            // Malformed referrer: treat as external.
        }
    }
    return alternates[preferred];
}

/** Locale to suggest in the banner, or null (already chose, no match, or same language). */
export function suggestedLocale({ preferred, browserLanguages, current, alternates }) {
    if (preferred) {
        return null;
    }
    const match = matchBrowserLocale(browserLanguages, Object.keys(alternates ?? {}));
    return match && match !== current ? match : null;
}

export function readPreference(storage = globalThis.localStorage) {
    try {
        return storage?.getItem(STORAGE_KEY) ?? null;
    } catch {
        return null; // Private mode or blocked storage.
    }
}

export function savePreference(locale, storage = globalThis.localStorage) {
    try {
        storage?.setItem(STORAGE_KEY, locale);
    } catch {
        // Ignore: the preference is a convenience.
    }
}
