/**
 * Send an analytics event. Safe to call when analytics is disabled (no-op).
 *
 * Only send metadata (tool slug, counts, sizes, formats) — never user content
 * such as pasted text, file names or form values.
 *
 * Supported events: tool_open, tool_use, tool_result, file_upload,
 * file_download, premium_click, ad_click.
 *
 * @param {string} name
 * @param {Record<string, string|number|boolean|null>} [params]
 */
export function track(name, params = {}) {
    const payload = { tool: document.body.dataset.tool || undefined, ...params };

    if (typeof window.gtag === 'function') {
        window.gtag('event', name, payload);
    } else if (Array.isArray(window.dataLayer) && document.body.dataset.analytics === 'gtm') {
        window.dataLayer.push({ event: name, ...payload });
    }
}
