import Alpine from 'alpinejs';
import { track } from './lib/analytics';
import { t, tc } from './lib/i18n';
import search from './components/search';
import { readPreference, savePreference, suggestedLocale } from './lib/locale-pref';

window.Alpine = Alpine;

// $t('Copy') in templates translates with the injected dictionary (see lib/i18n.js).
Alpine.magic('t', () => t);
Alpine.magic('tc', () => tc);

Alpine.data('search', search);

// "This page is also available in …" banner (components/locale-suggestion.blade.php).
Alpine.data('localeSuggestion', (data) => ({
    target: null,
    init() {
        const browserLanguages = navigator.languages?.length ? navigator.languages : [navigator.language];
        const target = suggestedLocale({ preferred: readPreference(), browserLanguages, current: data.current, alternates: data.alternates });
        // Shown after the page settles so it never competes with the main content.
        if (target) {
            setTimeout(() => { this.target = target; }, 800);
        }
    },
    text(key) {
        return data.strings[this.target]?.[key] ?? '';
    },
    href() {
        return data.alternates[this.target] ?? '#';
    },
    choose() {
        savePreference(this.target);
        track('language_switch', { from: data.current, to: this.target, source: 'suggestion' });
    },
    dismiss() {
        savePreference(data.current);
        this.target = null;
    },
}));

// Choosing a language in any switcher remembers it for future visits (lib/locale-pref.js).
document.addEventListener('click', (event) => {
    const link = event.target.closest('a[data-locale]');
    if (link) {
        savePreference(link.dataset.locale);
        track('language_switch', { from: document.documentElement.lang, to: link.dataset.locale, source: 'switcher' });
    }
});

// Tool entries are separate module scripts that register their own Alpine
// components. Module scripts run before DOMContentLoaded, so starting Alpine
// here guarantees every component is registered first.
document.addEventListener('DOMContentLoaded', () => {
    Alpine.start();

    const toolSlug = document.body.dataset.tool;
    if (toolSlug) {
        track('tool_open', { tool: toolSlug });
    }
});

// Any element with data-premium-click (e.g. "Go Pro" links) reports premium interest.
document.addEventListener('click', (event) => {
    const el = event.target.closest('[data-premium-click]');
    if (el) {
        track('premium_click', { tool: document.body.dataset.tool || null, source: el.dataset.premiumClick });
    }
});

// Ad clicks happen inside cross-origin iframes; the only signal we get is the
// window losing focus to an ad iframe.
window.addEventListener('blur', () => {
    const active = document.activeElement;
    if (active && active.tagName === 'IFRAME' && active.closest('[data-ad-slot]')) {
        track('ad_click', { slot: active.closest('[data-ad-slot]').dataset.adSlot });
    }
});
