import { FREQUENCIES, calculateLoan, scheduleToCsv, validateLoan, yearlySummary } from '../lib/loan';
import { track } from '../lib/analytics';
import { debounce, downloadBlob } from '../lib/utils';
import { intlLocale, localCurrency } from '../lib/i18n';

const PAGE_SIZE = 60;

document.addEventListener('alpine:init', () => {
    window.Alpine.data('loanCalculator', () => ({
        form: {
            amount: 25000,
            rate: 6.5,
            term: 5,
            termUnit: 'years',
            frequency: 'monthly',
            currency: localCurrency(),
        },
        errors: {},
        result: null,
        view: 'yearly',
        visibleRows: PAGE_SIZE,
        frequencies: FREQUENCIES,

        init() {
            this.recalculate = debounce(() => this.calculate(), 200);
            this.$watch('form', () => this.recalculate(), { deep: true });
            this.calculate({ silent: true });
        },

        get input() {
            const term = Number(this.form.term);
            return {
                amount: Number(this.form.amount),
                annualRate: Number(this.form.rate),
                termYears: this.form.termUnit === 'months' ? term / 12 : term,
                frequency: this.form.frequency,
            };
        },

        calculate({ silent = false } = {}) {
            this.errors = validateLoan(this.input);
            if (Object.keys(this.errors).length) {
                this.result = null;
                return;
            }
            this.result = calculateLoan(this.input);
            this.visibleRows = PAGE_SIZE;
            if (!silent) {
                track('tool_use', { action: 'calculate', frequency: this.form.frequency });
                track('tool_result', { periods: this.result.periods });
            }
        },

        get years() {
            return this.result ? yearlySummary(this.result.schedule, this.result.perYear) : [];
        },

        get rows() {
            return this.result ? this.result.schedule.slice(0, this.visibleRows) : [];
        },

        get interestShare() {
            if (!this.result || !this.result.totalPaid) return 0;
            return Math.round((this.result.totalInterest / this.result.totalPaid) * 100);
        },

        money(value) {
            try {
                return new Intl.NumberFormat(intlLocale(), { style: 'currency', currency: this.form.currency }).format(value);
            } catch {
                return value.toFixed(2);
            }
        },

        exportCsv() {
            if (!this.result) return;
            downloadBlob(new Blob([scheduleToCsv(this.result.schedule)], { type: 'text/csv' }), 'amortization-schedule.csv');
            track('file_download', { format: 'csv' });
        },
    }));
});
