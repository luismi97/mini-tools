import { calculateAge, parseDate, todayUtc } from '../lib/age';
import { track } from '../lib/analytics';
import { formatNumber } from '../lib/utils';
import { intlLocale } from '../lib/i18n';

const iso = (date) => date.toISOString().slice(0, 10);

document.addEventListener('alpine:init', () => {
    window.Alpine.data('ageCalculator', () => ({
        birth: '',
        on: iso(todayUtc()),
        today: iso(todayUtc()),

        result() {
            const birth = parseDate(this.birth);
            const on = parseDate(this.on);
            if (!birth || !on) return null;
            try {
                return { ok: true, ...calculateAge(birth, on) };
            } catch (e) {
                return { ok: false, message: e.message };
            }
        },

        n(value) {
            return formatNumber(value, 0);
        },

        longDate(date) {
            return date.toLocaleDateString(intlLocale(), { timeZone: 'UTC', year: 'numeric', month: 'long', day: 'numeric' });
        },

        trackUse() {
            track('tool_use', { action: 'calculate' });
        },
    }));
});
