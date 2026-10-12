import { applyPercent, percentChange, percentOf, whatPercent } from '../lib/calculators';
import { track } from '../lib/analytics';
import { formatNumber } from '../lib/utils';

const num = (v) => (v === '' || v === null ? NaN : Number(v));

document.addEventListener('alpine:init', () => {
    window.Alpine.data('percentageCalculator', () => ({
        a: { percent: 15, value: 200 },
        b: { part: 30, whole: 200 },
        c: { from: 80, to: 100 },
        d: { value: 200, percent: 10, direction: 'increase' },
        trackUse() {
            track('tool_use', { action: 'calculate' });
        },

        resultA() {
            return formatNumber(percentOf(num(this.a.percent), num(this.a.value)), 6);
        },

        resultB() {
            const r = whatPercent(num(this.b.part), num(this.b.whole));
            return r === null ? '—' : `${formatNumber(r, 4)}%`;
        },

        resultC() {
            const r = percentChange(num(this.c.from), num(this.c.to));
            if (r === null) return { text: '—', label: '' };
            return { text: `${formatNumber(Math.abs(r), 4)}%`, label: r > 0 ? 'increase' : r < 0 ? 'decrease' : 'no change' };
        },

        resultD() {
            const p = num(this.d.percent) * (this.d.direction === 'decrease' ? -1 : 1);
            return formatNumber(applyPercent(num(this.d.value), p), 6);
        },
    }));
});
