import { test } from 'node:test';
import assert from 'node:assert/strict';
import { matchBrowserLocale, redirectTarget, suggestedLocale, readPreference, savePreference } from '../../resources/js/lib/locale-pref.js';

const alternates = { en: '/merge-pdf', es: '/es/unir-pdf', de: '/de/pdf-zusammenfuegen' };

test('matchBrowserLocale picks the first supported base language', () => {
    assert.equal(matchBrowserLocale(['pt-BR', 'es-MX', 'en'], ['en', 'es']), 'es');
    assert.equal(matchBrowserLocale(['DE-at'], ['en', 'de']), 'de');
    assert.equal(matchBrowserLocale(['ja', 'zh'], ['en', 'es']), null);
    assert.equal(matchBrowserLocale(undefined, ['en']), null);
});

test('suggestedLocale only suggests a different, available language before any choice', () => {
    assert.equal(suggestedLocale({ preferred: null, browserLanguages: ['es-419'], current: 'en', alternates }), 'es');
    assert.equal(suggestedLocale({ preferred: null, browserLanguages: ['en-US'], current: 'en', alternates }), null);
    assert.equal(suggestedLocale({ preferred: null, browserLanguages: ['fr'], current: 'en', alternates }), null);
    assert.equal(suggestedLocale({ preferred: 'en', browserLanguages: ['es'], current: 'en', alternates }), null);
});

test('redirectTarget sends returning visitors from outside the site to their language', () => {
    const base = { preferred: 'es', current: 'en', alternates, host: 'tinyknacks.com' };
    assert.equal(redirectTarget({ ...base, referrer: 'https://www.google.com/' }), '/es/unir-pdf');
    assert.equal(redirectTarget({ ...base, referrer: '' }), '/es/unir-pdf');
    // Inside the site (e.g. after picking English in the switcher): never bounce.
    assert.equal(redirectTarget({ ...base, referrer: 'https://tinyknacks.com/es/unir-pdf' }), null);
    assert.equal(redirectTarget({ ...base, preferred: 'en' }), null);
    assert.equal(redirectTarget({ ...base, preferred: 'it' }), null);
    assert.equal(redirectTarget({ ...base, preferred: null }), null);
});

test('preference storage survives blocked localStorage', () => {
    const map = new Map();
    const storage = { getItem: (k) => map.get(k) ?? null, setItem: (k, v) => map.set(k, v) };
    savePreference('de', storage);
    assert.equal(readPreference(storage), 'de');
    const blocked = { getItem() { throw new Error('denied'); }, setItem() { throw new Error('denied'); } };
    assert.equal(readPreference(blocked), null);
    assert.doesNotThrow(() => savePreference('es', blocked));
});
