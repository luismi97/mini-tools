import { parseDate, todayUtc } from '../lib/age';
import { toIso } from '../lib/dates';
import { dueDate } from '../lib/health';
import { track } from '../lib/analytics';
import { intlLocale, t } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('dueDateCalculator', () => {
        const today = todayUtc();
        return {
            lmp: toIso(new Date(today.getTime() - 70 * 86_400_000)),
            cycle: 28,
            max: toIso(today),

            result() {
                const lmp = parseDate(this.lmp);
                if (!lmp) return { ok: false, message: t('Enter the first day of your last period.') };
                try {
                    return { ok: true, ...dueDate(lmp, Number(this.cycle), todayUtc()) };
                } catch (e) {
                    return { ok: false, message: e.message };
                }
            },

            longDate(date) {
                return date.toLocaleDateString(intlLocale(), { timeZone: 'UTC', weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            },

            shortDate(date) {
                return date.toLocaleDateString(intlLocale(), { timeZone: 'UTC', year: 'numeric', month: 'short', day: 'numeric' });
            },

            trackUse() {
                track('tool_use', { action: 'calculate' });
            },
        };
    });
});
