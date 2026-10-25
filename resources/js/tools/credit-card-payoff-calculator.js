import { MINIMUM_DEFAULTS, minimumPaymentPlan, paymentForMonths, payoffWithPayment, yearlyBalances } from '../lib/credit-card';
import { balanceChart } from '../lib/chart';
import { decodeState, encodeState } from '../lib/share-state';
import { track } from '../lib/analytics';
import { copyText, debounce, formatDuration, formatMoney, formatMonthYear } from '../lib/utils';
import { localCurrency } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('creditCardPayoff', () => {
        const defaults = {
            balance: 5000,
            apr: 22.9,
            mode: 'payment',
            payment: 250,
            months: 24,
            minPercent: MINIMUM_DEFAULTS.percent,
            minFloor: MINIMUM_DEFAULTS.floor,
            currency: localCurrency(),
        };

        return {
            form: { ...defaults },
            copied: false,

            init() {
                const shared = decodeState(location.hash, defaults, { mode: ['payment', 'months'] });
                if (shared.currency && !/^[A-Z]{3}$/.test(shared.currency)) delete shared.currency;
                Object.assign(this.form, shared);
                const save = debounce(() => history.replaceState(null, '', `#${encodeState(this.form, defaults)}`), 300);
                this.$watch('form', save, { deep: true });
            },

            result() {
                const f = this.form;
                const balance = Number(f.balance);
                const apr = Number(f.apr);
                try {
                    const payment = f.mode === 'months'
                        ? paymentForMonths({ balance, apr, months: Math.round(Number(f.months)) })
                        : Number(f.payment);
                    const plan = payoffWithPayment({ balance, apr, payment });
                    let minimum = null;
                    try {
                        minimum = minimumPaymentPlan({ balance, apr, percent: Number(f.minPercent), floor: Number(f.minFloor) || 0 });
                    } catch {
                        // The comparison is optional.
                    }
                    return { ok: true, payment, plan, minimum };
                } catch (e) {
                    return { ok: false, message: e.message };
                }
            },

            chart() {
                const r = this.result();
                if (!r.ok) return null;
                return balanceChart(yearlyBalances(r.plan.balances), r.minimum ? yearlyBalances(r.minimum.balances) : []);
            },

            payoffDate(months) {
                const now = new Date();
                return formatMonthYear(new Date(Date.UTC(now.getFullYear(), now.getMonth() + months, 1)), 'long');
            },

            duration(months) {
                return formatDuration(months);
            },

            money(value) {
                return formatMoney(value, this.form.currency);
            },

            async copyLink() {
                history.replaceState(null, '', `#${encodeState(this.form, defaults)}`);
                this.copied = await copyText(location.href);
                setTimeout(() => (this.copied = false), 2000);
                track('tool_use', { action: 'copy_link' });
            },

            trackUse() {
                track('tool_use', { action: 'calculate', mode: this.form.mode });
            },
        };
    });
});
