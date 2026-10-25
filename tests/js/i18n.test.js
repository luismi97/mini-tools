import { test } from 'node:test';
import assert from 'node:assert/strict';
import { readFileSync, readdirSync } from 'node:fs';
import { localCurrency, t, tc } from '../../resources/js/lib/i18n.js';
import { CATEGORIES } from '../../resources/js/lib/units.js';
import { ACTIVITY, BMI_CATEGORIES } from '../../resources/js/lib/health.js';
import { FREQUENCIES } from '../../resources/js/lib/loan.js';
import { COMPOUNDING } from '../../resources/js/lib/compound.js';
import { PAY_PERIODS } from '../../resources/js/lib/calculators.js';
import { CASES } from '../../resources/js/lib/text.js';
import { WEEKDAYS } from '../../resources/js/lib/age.js';
import { FORMATS, POSITIONS } from '../../resources/js/lib/page-numbers.js';

/*
 * Labels that templates translate at display time with $t(variable). The static
 * t('…') literals are checked by tests/Feature/I18nTest.php.
 */
const dynamicLabels = [
    ...Object.values(CATEGORIES).flatMap((c) => [c.label, ...Object.values(c.units).map((u) => u.label)]),
    ...BMI_CATEGORIES.map((c) => c.label),
    ...Object.values(ACTIVITY).map((a) => a.label),
    ...Object.values(FREQUENCIES).flatMap((f) => [f.label, f.summary, `${f.label} payment`]),
    ...Object.values(COMPOUNDING),
    ...Object.values(PAY_PERIODS),
    ...Object.values(CASES),
    ...WEEKDAYS,
    ...Object.values(POSITIONS),
    ...Object.values(FORMATS).map((f) => f.label),
    // Labels defined inside tool entries and views.
    'Extra principal', 'Paying the minimum', 'Your plan',
    'Expires', 'Issued at', 'Not valid before', 'Header', 'Payload',
    'Very weak', 'Weak', 'Good', 'Strong', 'Very strong',
    'End of first trimester', 'Anatomy scan window (18–22 weeks)', 'Third trimester begins', 'Full term (39 weeks)',
    'Lose 1 lb (0.5 kg) per week', 'Lose 0.5 lb (0.25 kg) per week', 'Maintain weight', 'Gain 0.5 lb (0.25 kg) per week', 'Gain 1 lb (0.5 kg) per week', 'TDEE',
    'Principal & interest', 'Property tax', 'Home insurance', 'PMI', 'HOA fees',
    'Local time', 'UTC', 'ISO 8601', 'Relative', 'Seconds', 'Milliseconds', 'seconds', 'milliseconds',
    'Dice (1–6)', 'Lottery (6 of 49)', 'URL', 'Text', 'Email', 'Phone', 'Wi-Fi', 'Free',
    'Formatted JSON', 'Minified JSON', 'increase', 'decrease', 'no change', 'Focus', 'Break', 'Timer',
    'AA normal text', 'AA large text', 'AAA normal text', 'AAA large text',
    'Total months', 'Total weeks', 'Total days', 'Total hours',
    ':count day', ':count days', ':count month', ':count months', ':count year', ':count years',
];

const locales = readdirSync(new URL('../../lang/js/', import.meta.url)).filter((f) => f.endsWith('.json'));

test('every dynamic label has a translation in every JS dictionary', () => {
    assert.ok(locales.length > 0);
    for (const file of locales) {
        const dict = JSON.parse(readFileSync(new URL(`../../lang/js/${file}`, import.meta.url), 'utf8'));
        const missing = [...new Set(dynamicLabels)].filter((key) => !(key in dict));
        assert.deepEqual(missing, [], `Add these keys to lang/js/${file}`);
    }
});

test('t() falls back to the English key and fills placeholders', () => {
    delete globalThis.__i18n;
    assert.equal(t('Copy'), 'Copy');
    assert.equal(t('This PDF only has :count pages.', { count: 3 }), 'This PDF only has 3 pages.');

    globalThis.__i18n = { 'Copy': 'Copiar', ':min to :minutes': ':min a :minutes' };
    assert.equal(t('Copy'), 'Copiar');
    // Longer placeholder names are replaced first, so :minutes is not clobbered by :min.
    assert.equal(t(':min to :minutes', { min: 1, minutes: 5 }), '1 a 5');
    assert.equal(tc(':count page', ':count pages', 1), '1 page');
    assert.equal(tc(':count page', ':count pages', 2), '2 pages');
    delete globalThis.__i18n;
});

test('localCurrency() uses the locale default and falls back to USD', () => {
    delete globalThis.__currency;
    assert.equal(localCurrency(), 'USD');
    globalThis.__currency = 'EUR';
    assert.equal(localCurrency(), 'EUR');
    delete globalThis.__currency;
});
