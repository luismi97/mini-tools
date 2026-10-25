import { compareLoans } from '../lib/loan-compare';
import { track } from '../lib/analytics';
import { formatMoney, formatNumber } from '../lib/utils';
import { localCurrency } from '../lib/i18n';

const LETTERS = 'ABCD';
const MAX_OFFERS = 4;

document.addEventListener('alpine:init', () => {
    window.Alpine.data('loanComparison', () => ({
        currency: localCurrency(),
        // Sample where the lowest rate is not the cheapest loan once fees are counted.
        offers: [
            { amount: 20000, apr: 7.5, term: 5, unit: 'years', fees: 0 },
            { amount: 20000, apr: 6.9, term: 5, unit: 'years', fees: 800 },
            { amount: 20000, apr: 8.4, term: 4, unit: 'years', fees: 0 },
        ],

        letter(i) {
            return LETTERS[i];
        },

        results() {
            return compareLoans(this.offers.map((o) => ({
                amount: Number(o.amount),
                apr: Number(o.apr),
                months: Math.round(Number(o.term) * (o.unit === 'years' ? 12 : 1)),
                fees: o.fees === '' ? 0 : Number(o.fees),
            })));
        },

        /** "Offer B costs $X less than Offer A" — cheapest vs. the most expensive valid offer. */
        verdict() {
            const rows = this.results().map((r, i) => ({ ...r, i })).filter((r) => r.ok);
            if (rows.length < 2) return '';
            const cheapest = rows.reduce((a, b) => (b.totalCost < a.totalCost ? b : a));
            const priciest = rows.reduce((a, b) => (b.totalCost > a.totalCost ? b : a));
            if (priciest.totalCost - cheapest.totalCost < 0.01) return '';
            return { cheapest: LETTERS[cheapest.i], priciest: LETTERS[priciest.i], difference: priciest.totalCost - cheapest.totalCost };
        },

        addOffer() {
            if (this.offers.length >= MAX_OFFERS) return;
            const last = this.offers.at(-1);
            this.offers.push({ ...last, fees: 0 });
            track('tool_use', { action: 'add_offer', count: this.offers.length });
        },

        removeOffer(i) {
            if (this.offers.length > 2) this.offers.splice(i, 1);
        },

        canAdd() {
            return this.offers.length < MAX_OFFERS;
        },

        money(value) {
            return formatMoney(value, this.currency);
        },

        percent(value) {
            return `${formatNumber(value, 2)}%`;
        },

        trackUse() {
            track('tool_use', { action: 'compare', count: this.offers.length });
        },
    }));
});
