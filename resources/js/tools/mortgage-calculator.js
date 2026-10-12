import { calculateMortgage } from '../lib/mortgage';
import { track } from '../lib/analytics';
import { formatMoney } from '../lib/utils';
import { intlLocale, localCurrency } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('mortgageCalculator', () => ({
        form: {
            homePrice: 400000,
            downPayment: 20,
            downPaymentType: 'percent',
            termYears: 30,
            annualRate: 6.5,
            propertyTaxRate: 1.1,
            insurance: 1500,
            pmiRate: 0.5,
            hoa: 0,
        },
        currency: localCurrency(),

        result() {
            const f = this.form;
            try {
                return {
                    ok: true,
                    ...calculateMortgage({
                        homePrice: Number(f.homePrice),
                        downPayment: Number(f.downPayment),
                        downPaymentType: f.downPaymentType,
                        termYears: Number(f.termYears),
                        annualRate: Number(f.annualRate),
                        propertyTaxRate: Number(f.propertyTaxRate) || 0,
                        insurance: Number(f.insurance) || 0,
                        pmiRate: Number(f.pmiRate) || 0,
                        hoa: Number(f.hoa) || 0,
                    }),
                };
            } catch (e) {
                return { ok: false, message: e.message };
            }
        },

        breakdown(r) {
            return [
                { label: 'Principal & interest', value: r.principalAndInterest, color: 'bg-accent' },
                { label: 'Property tax', value: r.tax, color: 'bg-info' },
                { label: 'Home insurance', value: r.insurance, color: 'bg-warning' },
                { label: 'PMI', value: r.pmi, color: 'bg-danger' },
                { label: 'HOA fees', value: r.hoa, color: 'bg-line-strong' },
            ].filter((row) => row.value > 0);
        },

        share(value, total) {
            return total > 0 ? (value / total) * 100 : 0;
        },

        payoffDate(months) {
            const date = new Date();
            date.setMonth(date.getMonth() + months);
            return date.toLocaleDateString(intlLocale(), { month: 'long', year: 'numeric' });
        },

        money(value) {
            return formatMoney(value, this.currency);
        },

        trackUse() {
            track('tool_use', { action: 'calculate' });
        },
    }));
});
