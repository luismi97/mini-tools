import { diffText } from '../lib/diff';
import { track } from '../lib/analytics';
import { debounce } from '../lib/utils';

const SAMPLE_A = `Tiny Knacks is a collection of free online tools.
Every tool runs in your browser.
Your files are never uploaded.
Built with Laravel and Alpine.js.`;

const SAMPLE_B = `Tiny Knacks is a collection of fast, free online tools.
Every tool runs in your browser.
Your files and data are never uploaded.
New tools are added every month.`;

document.addEventListener('alpine:init', () => {
    window.Alpine.data('textCompare', () => ({
        before: '',
        after: '',
        options: { mode: 'lines', ignoreCase: false, ignoreWhitespace: false },
        result: null,
        error: '',
        used: false,

        init() {
            const run = debounce(() => this.compare(), 250);
            this.$watch('before', run);
            this.$watch('after', run);
            this.$watch('options', run, { deep: true });
        },

        compare() {
            if (!this.before && !this.after) {
                this.result = null;
                this.error = '';
                return;
            }
            try {
                this.result = diffText(this.before, this.after, this.options.mode, this.options);
                this.error = '';
                if (!this.used) {
                    this.used = true;
                    track('tool_use', { action: 'compare', mode: this.options.mode });
                }
            } catch (e) {
                this.result = null;
                this.error = e.message;
            }
        },

        identical() {
            return this.result && this.result.added === 0 && this.result.removed === 0;
        },

        swap() {
            [this.before, this.after] = [this.after, this.before];
        },

        loadSample() {
            this.before = SAMPLE_A;
            this.after = SAMPLE_B;
        },

        clear() {
            this.before = '';
            this.after = '';
        },
    }));
});
