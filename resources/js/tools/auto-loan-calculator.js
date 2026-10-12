import { calculateAutoLoan } from '../lib/autoloan';
import { track } from '../lib/analytics';
import { formatMoney } from '../lib/utils';
import { localCurrency } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('autoLoanCalculator', () => ({
        form: { price: 32000, downPayment: 4000, tradeIn: 0, tradeInOwed: 0, salesTaxRate: 6.5, fees: 600, annualRate: 7, months: 60, taxAfterTradeIn: true },
        currency: localCurrency(),
        terms: [36, 48, 60, 72, 84],

        input(overrides = {}) {
            const f = { ...this.form, ...overrides };
            return {
                price: Number(f.price),
                downPayment: Number(f.downPayment) || 0,
                tradeIn: Number(f.tradeIn) || 0,
                tradeInOwed: Number(f.tradeInOwed) || 0,
                salesTaxRate: Number(f.salesTaxRate) || 0,
                fees: Number(f.fees) || 0,
                annualRate: Number(f.annualRate),
                months: Number(f.months),
                taxAfterTradeIn: f.taxAfterTradeIn,
            };
        },

        result() {
            try {
                return { ok: true, ...calculateAutoLoan(this.input()) };
            } catch (e) {
                return { ok: false, message: e.message };
            }
        },

        comparison() {
            return this.terms.map((months) => {
                try {
                    const r = calculateAutoLoan(this.input({ months }));
                    return { months, payment: r.monthlyPayment, interest: r.totalInterest };
                } catch {
                    return { months, payment: null, interest: null };
                }
            });
        },

        money(value) {
            return value === null ? '—' : formatMoney(value, this.currency);
        },

        trackUse() {
            track('tool_use', { action: 'calculate' });
        },
    }));
});
