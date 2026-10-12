import { PAY_PERIODS, convertSalary } from '../lib/calculators';
import { track } from '../lib/analytics';
import { formatMoney } from '../lib/utils';
import { localCurrency } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('salaryCalculator', () => ({
        amount: 25,
        period: 'hourly',
        hoursPerWeek: 40,
        daysPerWeek: 5,
        weeksPerYear: 52,
        currency: localCurrency(),
        periods: PAY_PERIODS,

        valid() {
            const ok = (v, min, max) => Number.isFinite(Number(v)) && Number(v) >= min && Number(v) <= max;
            return ok(this.amount, 0, 1e12) && ok(this.hoursPerWeek, 1, 168) && ok(this.daysPerWeek, 1, 7) && ok(this.weeksPerYear, 1, 53);
        },

        result() {
            if (!this.valid()) return null;
            return convertSalary(Number(this.amount), this.period, {
                hoursPerWeek: Number(this.hoursPerWeek),
                daysPerWeek: Number(this.daysPerWeek),
                weeksPerYear: Number(this.weeksPerYear),
            });
        },

        money(value) {
            return formatMoney(value, this.currency);
        },

        trackUse() {
            track('tool_use', { action: 'calculate', period: this.period });
        },
    }));
});
