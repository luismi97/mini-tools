import { parseDate, todayUtc } from '../lib/age';
import { addToDate, dateDifference, toIso } from '../lib/dates';
import { track } from '../lib/analytics';
import { formatNumber } from '../lib/utils';
import { intlLocale, tc } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('dateCalculator', () => {
        const today = toIso(todayUtc());
        return {
            mode: 'difference',
            start: today,
            end: toIso(addToDate(todayUtc(), { days: 30 }).date),
            includeEnd: false,
            base: today,
            period: { years: 0, months: 0, weeks: 0, days: 30 },
            subtract: 0, // 0 = add, 1 = subtract (matches the segmented control values)
            businessDays: false,

            difference() {
                const a = parseDate(this.start);
                const b = parseDate(this.end);
                return a && b ? dateDifference(a, b, { includeEnd: this.includeEnd }) : null;
            },

            added() {
                const d = parseDate(this.base);
                if (!d) return null;
                return addToDate(d, {
                    years: Number(this.period.years) || 0,
                    months: Number(this.period.months) || 0,
                    weeks: Number(this.period.weeks) || 0,
                    days: Number(this.period.days) || 0,
                    subtract: Boolean(this.subtract),
                    businessDays: this.businessDays,
                });
            },

            longDate(date) {
                return date.toLocaleDateString(intlLocale(), { timeZone: 'UTC', weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            },

            n(value) {
                return formatNumber(value, 0);
            },

            /** plural(3, 'day', 'days') → "3 days" (translated). */
            plural(value, singular, plural) {
                return tc(`:count ${singular}`, `:count ${plural}`, value, { count: this.n(value) });
            },

            trackUse() {
                track('tool_use', { action: this.mode });
            },
        };
    });
});
