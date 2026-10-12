/**
 * Client-side translations. The layout injects the current locale's strings as
 * `window.__i18n` (from lang/js/{locale}.json) and the Intl locale as
 * `window.__locale`. English is the key itself, so the default locale needs no
 * dictionary. DOM-free: works in Node tests (falls back to English).
 *
 * Usage: t('Copied'), t('This PDF only has :count pages.', { count: 3 })
 * In Alpine templates: $t('Copy')
 */

export function t(key, params = {}) {
    const dict = globalThis.__i18n ?? {};
    let text = dict[key] ?? key;
    // Longest names first so ":minutes" is not clobbered by ":min".
    const entries = Object.entries(params).sort((a, b) => b[0].length - a[0].length);
    for (const [name, value] of entries) {
        text = text.replaceAll(`:${name}`, String(value));
    }
    return text;
}

/** Pick the singular or plural key by count (both keys must exist in the dictionaries). */
export function tc(singular, plural, count, params = {}) {
    return t(count === 1 ? singular : plural, { count, ...params });
}

/** BCP 47 locale for Intl formatting (numbers, currency, dates). */
export function intlLocale() {
    return globalThis.__locale ?? 'en-US';
}

/** Default ISO 4217 currency of the current locale (config/locales.php), e.g. EUR on /de. */
export function localCurrency() {
    return globalThis.__currency ?? 'USD';
}
