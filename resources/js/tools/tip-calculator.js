import { calculateTip, splitTipsByHours } from '../lib/calculators';
import { track } from '../lib/analytics';
import { formatMoney } from '../lib/utils';
import { localCurrency } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('tipCalculator', () => ({
        mode: 'bill',
        totalTips: 120,
        workers: [{ id: 1, name: '', hours: 8 }, { id: 2, name: '', hours: 6 }, { id: 3, name: '', hours: 4 }],
        nextId: 4,
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

        pool() {
            return splitTipsByHours(Number(this.totalTips), this.workers.map((w) => Number(w.hours)));
        },

        addWorker() {
            if (this.workers.length < 50) this.workers.push({ id: this.nextId++, name: '', hours: 8 });
        },

        removeWorker(id) {
            if (this.workers.length > 1) this.workers = this.workers.filter((w) => w.id !== id);
        },

        money(value) {
            return formatMoney(value, this.currency);
        },

        changePeople(delta) {
            this.people = Math.min(100, Math.max(1, (Number(this.people) || 1) + delta));
        },

        trackUse() {
            track('tool_use', { action: 'calculate', mode: this.mode });
        },
    }));
});
