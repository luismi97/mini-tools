import { contrast, formats, parseColor } from '../lib/color';
import { track } from '../lib/analytics';
import { copyText } from '../lib/utils';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('colorConverter', () => ({
        input: '#0f766e',
        foreground: '#ffffff',
        background: '#0f766e',
        copied: '',
        used: false,

        color() {
            const rgb = parseColor(this.input);
            return rgb ? { rgb, ...formats(rgb) } : null;
        },

        setFromPicker(value) {
            this.input = value;
        },

        contrastResult() {
            const fg = parseColor(this.foreground);
            const bg = parseColor(this.background);
            return fg && bg ? contrast(fg, bg) : null;
        },

        swap() {
            [this.foreground, this.background] = [this.background, this.foreground];
        },

        hexOr(value, fallback) {
            const c = parseColor(value);
            return c ? formats(c).hex : fallback;
        },

        async copy(value, key) {
            if (await copyText(value)) {
                this.copied = key;
                setTimeout(() => (this.copied = ''), 1500);
            }
            if (!this.used) {
                this.used = true;
                track('tool_use', { action: 'copy' });
            }
        },
    }));
});
