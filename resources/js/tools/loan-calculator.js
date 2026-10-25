import { FREQUENCIES, calculateLoan, extraSavings, paymentDate, scheduleToCsv, validateLoan, yearlySummary } from '../lib/loan';
import { balanceChart } from '../lib/chart';
import { decodeState, encodeState } from '../lib/share-state';
import { track } from '../lib/analytics';
import { copyText, debounce, downloadBlob, formatDuration, formatMonthYear } from '../lib/utils';
import { intlLocale, localCurrency } from '../lib/i18n';

const PAGE_SIZE = 60;

/** First day of next month, as YYYY-MM-DD. */
function nextMonth() {
    const now = new Date();
    return new Date(Date.UTC(now.getFullYear(), now.getMonth() + 1, 1)).toISOString().slice(0, 10);
}

document.addEventListener('alpine:init', () => {
    window.Alpine.data('loanCalculator', () => {
        const defaults = {
            amount: 25000,
            rate: 6.5,
            term: 5,
            termUnit: 'years',
            frequency: 'monthly',
            currency: localCurrency(),
            extra: 0,
            start: nextMonth(),
        };

        return {
            form: { ...defaults },
            errors: {},
            result: null,
            base: null,
            savings: null,
            view: 'yearly',
            visibleRows: PAGE_SIZE,
            frequencies: FREQUENCIES,
            copied: false,

            init() {
                const shared = decodeState(location.hash, defaults, { termUnit: ['years', 'months'], frequency: Object.keys(FREQUENCIES) });
                if (shared.currency && !/^[A-Z]{3}$/.test(shared.currency)) delete shared.currency;
                if (shared.start && !/^\d{4}-\d{2}-\d{2}$/.test(shared.start)) delete shared.start;
                Object.assign(this.form, shared);

                this.recalculate = debounce(() => {
                    this.calculate();
                    history.replaceState(null, '', `#${encodeState(this.form, defaults)}`);
                }, 200);
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
                    extra: this.extraAmount(),
                };
            },

            extraAmount() {
                return this.form.extra === '' ? 0 : Number(this.form.extra);
            },

            calculate({ silent = false } = {}) {
                const input = this.input;
                this.errors = validateLoan(input);
                if (Object.keys(this.errors).length) {
                    this.result = this.base = this.savings = null;
                    return;
                }
                this.result = calculateLoan(input);
                this.base = input.extra > 0 ? calculateLoan({ ...input, extra: 0 }) : null;
                this.savings = this.base ? extraSavings(this.base, this.result) : null;
                this.visibleRows = PAGE_SIZE;
                if (!silent) {
                    track('tool_use', { action: 'calculate', frequency: this.form.frequency, extra: input.extra > 0 });
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

            chart() {
                if (!this.result) return null;
                const balances = (schedule, perYear) => [Number(this.form.amount), ...yearlySummary(schedule, perYear).map((y) => y.balance)];
                return balanceChart(
                    balances(this.result.schedule, this.result.perYear),
                    this.base ? balances(this.base.schedule, this.base.perYear) : [],
                );
            },

            firstDate() {
                const date = new Date(`${this.form.start}T00:00:00Z`);
                return Number.isNaN(date.getTime()) ? null : date;
            },

            payoffDate() {
                const first = this.firstDate();
                return first && this.result ? formatMonthYear(paymentDate(first, this.result.periods, this.form.frequency), 'long') : '';
            },

            rowDate(period) {
                const first = this.firstDate();
                if (!first) return period;
                return paymentDate(first, period, this.form.frequency).toLocaleDateString(intlLocale(), { dateStyle: 'medium', timeZone: 'UTC' });
            },

            duration(periods) {
                return formatDuration((periods * 12) / FREQUENCIES[this.form.frequency].perYear);
            },

            money(value) {
                try {
                    return new Intl.NumberFormat(intlLocale(), { style: 'currency', currency: this.form.currency }).format(value);
                } catch {
                    return value.toFixed(2);
                }
            },

            async copyLink() {
                history.replaceState(null, '', `#${encodeState(this.form, defaults)}`);
                this.copied = await copyText(location.href);
                setTimeout(() => (this.copied = false), 2000);
                track('tool_use', { action: 'copy_link' });
            },

            exportCsv() {
                if (!this.result) return;
                downloadBlob(new Blob([scheduleToCsv(this.result.schedule)], { type: 'text/csv' }), 'amortization-schedule.csv');
                track('file_download', { format: 'csv' });
            },
        };
    });
});
