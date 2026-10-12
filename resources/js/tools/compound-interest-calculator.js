import { COMPOUNDING, compoundInterest } from '../lib/compound';
import { track } from '../lib/analytics';
import { downloadBlob, formatMoney } from '../lib/utils';
import { localCurrency, t } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('compoundInterestCalculator', () => ({
        form: {
            principal: 10000,
            rate: 7,
            years: 20,
            compounds: 12,
            contribution: 200,
            contributionFrequency: 'monthly',
            currency: localCurrency(),
        },
        compounding: COMPOUNDING,

        errors() {
            const e = {};
            const f = this.form;
            if (!(Number(f.principal) >= 0)) e.principal = t('Enter 0 or more.');
            if (!(Number(f.rate) >= 0 && Number(f.rate) <= 100)) e.rate = t('Enter a rate between 0 and 100.');
            if (!(Number(f.years) > 0 && Number(f.years) <= 100)) e.years = t('Enter between 1 and 100 years.');
            if (!(Number(f.contribution) >= 0)) e.contribution = t('Enter 0 or more.');
            return e;
        },

        result() {
            if (Object.keys(this.errors()).length) return null;
            const f = this.form;
            return compoundInterest({
                principal: Number(f.principal),
                annualRate: Number(f.rate),
                years: Number(f.years),
                compoundsPerYear: Number(f.compounds),
                contribution: Number(f.contribution),
                contributionFrequency: f.contributionFrequency,
            });
        },

        money(value) {
            return formatMoney(value, this.form.currency);
        },

        share(part, total) {
            return total > 0 ? Math.round((part / total) * 100) : 0;
        },

        exportCsv() {
            const r = this.result();
            if (!r) return;
            const lines = [['Year', 'Contributions', 'Interest', 'Total contributions', 'Total interest', 'Balance'].map((h) => t(h)).join(',')];
            r.yearly.forEach((y) => lines.push([y.year, y.contributions, y.interest, y.totalContributions, y.totalInterest, y.balance].join(',')));
            downloadBlob(new Blob([lines.join('\r\n')], { type: 'text/csv' }), 'compound-interest.csv');
            track('file_download', { format: 'csv' });
        },

        trackUse() {
            track('tool_use', { action: 'calculate' });
        },
    }));
});
