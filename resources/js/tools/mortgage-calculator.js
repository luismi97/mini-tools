import { calculateMortgage } from '../lib/mortgage';
import { balanceChart } from '../lib/chart';
import { decodeState, encodeState } from '../lib/share-state';
import { track } from '../lib/analytics';
import { copyText, debounce, formatDuration, formatMoney, formatMonthYear } from '../lib/utils';
import { intlLocale, localCurrency } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('mortgageCalculator', () => {
        const defaults = {
            homePrice: 400000,
            downPayment: 20,
            downPaymentType: 'percent',
            termYears: 30,
            annualRate: 6.5,
            propertyTaxRate: 1.1,
            insurance: 1500,
            pmiRate: 0.5,
            hoa: 0,
            extraPayment: 0,
            currency: localCurrency(),
        };

        return {
            form: { ...defaults },
            copied: false,

            init() {
                const shared = decodeState(location.hash, defaults, { downPaymentType: ['percent', 'amount'] });
                if (shared.currency && !/^[A-Z]{3}$/.test(shared.currency)) delete shared.currency;
                if (shared.termYears && ![30, 25, 20, 15, 10].includes(shared.termYears)) delete shared.termYears;
                Object.assign(this.form, shared);
                const save = debounce(() => history.replaceState(null, '', `#${encodeState(this.form, defaults)}`), 300);
                this.$watch('form', save, { deep: true });
            },

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
                            extraPayment: f.extraPayment === '' ? 0 : Number(f.extraPayment),
                        }),
                    };
                } catch (e) {
                    return { ok: false, message: e.message };
                }
            },

            breakdown(r) {
                return [
                    { label: 'Principal & interest', value: r.principalAndInterest, color: 'bg-accent' },
                    { label: 'Extra principal', value: r.extraPayment, color: 'bg-success' },
                    { label: 'Property tax', value: r.tax, color: 'bg-info' },
                    { label: 'Home insurance', value: r.insurance, color: 'bg-warning' },
                    { label: 'PMI', value: r.pmi, color: 'bg-danger' },
                    { label: 'HOA fees', value: r.hoa, color: 'bg-line-strong' },
                ].filter((row) => row.value > 0);
            },

            chart() {
                const r = this.result();
                if (!r.ok) return null;
                const balances = (yearly) => [r.loanAmount, ...yearly.map((y) => y.balance)];
                return balanceChart(balances(r.yearly), r.periodsSaved > 0 ? balances(r.baseYearly) : []);
            },

            share(value, total) {
                return total > 0 ? (value / total) * 100 : 0;
            },

            payoffDate(months) {
                const now = new Date();
                return formatMonthYear(new Date(Date.UTC(now.getFullYear(), now.getMonth() + months, 1)), 'long');
            },

            duration(months) {
                return formatDuration(months);
            },

            /** "$", "€", "R$"… for the amount option of the down payment. */
            symbol() {
                try {
                    return new Intl.NumberFormat(intlLocale(), { style: 'currency', currency: this.form.currency })
                        .formatToParts(0)
                        .find((p) => p.type === 'currency').value;
                } catch {
                    return this.form.currency;
                }
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
                track('tool_use', { action: 'calculate' });
            },
        };
    });
});
