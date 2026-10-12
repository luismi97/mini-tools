import { randomIntegers } from '../lib/random';
import { track } from '../lib/analytics';
import { copyText } from '../lib/utils';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('randomNumberGenerator', () => ({
        min: 1,
        max: 100,
        count: 1,
        unique: true,
        sort: 'none',
        numbers: [],
        error: '',
        copied: false,
        rolling: false,

        presets: [
            { label: 'Dice (1–6)', min: 1, max: 6 },
            { label: '1–10', min: 1, max: 10 },
            { label: '1–100', min: 1, max: 100 },
            { label: 'Lottery (6 of 49)', min: 1, max: 49, count: 6, unique: true, sort: 'asc' },
        ],

        applyPreset(p) {
            Object.assign(this, { min: p.min, max: p.max, count: p.count ?? 1, unique: p.unique ?? this.unique, sort: p.sort ?? 'none' });
            this.generate();
        },

        generate(trackIt = true) {
            try {
                this.numbers = randomIntegers({ min: this.min, max: this.max, count: this.count, unique: this.unique, sort: this.sort });
                this.error = '';
                this.rolling = true;
                setTimeout(() => (this.rolling = false), 250);
                if (trackIt) track('tool_use', { action: 'generate', count: Number(this.count) });
            } catch (e) {
                this.error = e.message;
                this.numbers = [];
            }
        },

        async copy() {
            this.copied = await copyText(this.numbers.join(', '));
            setTimeout(() => (this.copied = false), 1500);
        },
    }));
});
