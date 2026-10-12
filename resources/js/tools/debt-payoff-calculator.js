import { payoffPlan } from '../lib/debt';
import { track } from '../lib/analytics';
import { formatMoney } from '../lib/utils';
import { intlLocale, localCurrency, t } from '../lib/i18n';

let nextId = 4;

document.addEventListener('alpine:init', () => {
    window.Alpine.data('debtPayoffCalculator', () => ({
        debts: [
            // Sample where the methods differ: the smallest debt is not the most expensive one.
            { id: 1, name: t('Credit card'), balance: 5200, apr: 24.9, minPayment: 150 },
            { id: 2, name: t('Store card'), balance: 900, apr: 15.9, minPayment: 35 },
            { id: 3, name: t('Car loan'), balance: 9800, apr: 7.2, minPayment: 290 },
        ],
        extra: 200,
        strategy: 'avalanche',
        currency: localCurrency(),

        addDebt() {
            this.debts.push({ id: nextId++, name: '', balance: '', apr: '', minPayment: '' });
        },

        removeDebt(id) {
            this.debts = this.debts.filter((d) => d.id !== id);
        },

        plans() {
            const debts = this.debts.filter((d) => Number(d.balance) > 0);
            try {
                return {
                    ok: true,
                    avalanche: payoffPlan(debts, { strategy: 'avalanche', extra: Number(this.extra) || 0 }),
                    snowball: payoffPlan(debts, { strategy: 'snowball', extra: Number(this.extra) || 0 }),
                    minimum: payoffPlan(debts, { strategy: 'minimum' }),
                };
            } catch (e) {
                return { ok: false, message: e.message };
            }
        },

        selected(plans) {
            return plans[this.strategy];
        },

        dateAfter(months) {
            const date = new Date();
            date.setMonth(date.getMonth() + months);
            return date.toLocaleDateString(intlLocale(), { month: 'short', year: 'numeric' });
        },

        duration(months) {
            const y = Math.floor(months / 12);
            const m = months % 12;
            return [y ? t(y > 1 ? ':count yrs' : ':count yr', { count: y }) : '', m ? t(':count mo', { count: m }) : ''].filter(Boolean).join(' ') || t(':count mo', { count: 0 });
        },

        money(value) {
            return formatMoney(value, this.currency);
        },

        trackUse() {
            track('tool_use', { action: 'calculate', debts: this.debts.length });
        },
    }));
});
