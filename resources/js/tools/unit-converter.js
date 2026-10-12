import { CATEGORIES, convertUnit, formatUnitValue } from '../lib/units';
import { track } from '../lib/analytics';
import { copyText } from '../lib/utils';

const DEFAULTS = {
    length: ['km', 'mi'],
    weight: ['kg', 'lb'],
    temperature: ['c', 'f'],
    volume: ['l', 'gal'],
    area: ['m2', 'ft2'],
    speed: ['kph', 'mph'],
    time: ['h', 'min'],
    data: ['GB', 'MB'],
};

document.addEventListener('alpine:init', () => {
    window.Alpine.data('unitConverter', () => ({
        categories: CATEGORIES,
        category: 'length',
        from: 'km',
        to: 'mi',
        value: 1,
        copied: false,

        init() {
            this.$watch('category', (c) => {
                [this.from, this.to] = DEFAULTS[c];
                track('tool_use', { action: 'category', category: c });
            });
        },

        units() {
            return CATEGORIES[this.category].units;
        },

        result() {
            return convertUnit(Number(this.value), this.from, this.to, this.category);
        },

        formatted() {
            return this.value === '' ? '—' : formatUnitValue(this.result());
        },

        all() {
            const value = Number(this.value);
            return Object.entries(this.units())
                .filter(([key]) => key !== this.from)
                .map(([key, unit]) => ({ key, label: unit.label, value: formatUnitValue(convertUnit(value, this.from, key, this.category)) }));
        },

        swap() {
            [this.from, this.to] = [this.to, this.from];
        },

        async copy() {
            this.copied = await copyText(this.formatted().replace(/,/g, ''));
            setTimeout(() => (this.copied = false), 1500);
        },
    }));
});
