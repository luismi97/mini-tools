import { calculateTip } from '../lib/calculators';
import { track } from '../lib/analytics';
import { formatMoney } from '../lib/utils';
import { localCurrency } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('tipCalculator', () => ({
        bill: 80,
        tipPercent: 18,
        people: 2,
        roundUp: false,
        currency: localCurrency(),
        presets: [10, 15, 18, 20, 25],

        result() {
            const bill = Number(this.bill);
            if (!Number.isFinite(bill) || bill < 0) return null;
            return calculateTip({
                bill,
                tipPercent: Math.max(0, Number(this.tipPercent) || 0),
                people: Number(this.people),
                roundUp: this.roundUp,
            });
        },

        money(value) {
            return formatMoney(value, this.currency);
        },

        changePeople(delta) {
            this.people = Math.min(100, Math.max(1, (Number(this.people) || 1) + delta));
        },

        trackUse() {
            track('tool_use', { action: 'calculate' });
        },
    }));
});
