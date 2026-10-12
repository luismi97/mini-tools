import { segments } from '../lib/regex';
import { track } from '../lib/analytics';
import { debounce } from '../lib/utils';
import { t } from '../lib/i18n';

const TIMEOUT_MS = 1500;

document.addEventListener('alpine:init', () => {
    window.Alpine.data('regexTester', () => {
        // Worker kept outside reactive state.
        let worker = null;
        let pending = null;
        let requestId = 0;

        const createWorker = () => new Worker(new URL('../lib/regex-worker.js', import.meta.url), { type: 'module' });

        return {
            pattern: '(\\w+)@(\\w+)\\.(com|org)',
            flags: { g: true, i: true, m: false, s: false, u: false },
            text: 'Contact us at hello@example.com or support@tinyknacks.org.\nInvalid: user@@example, test@site',
            replacement: '',
            showReplace: false,
            matches: [],
            truncated: false,
            replaced: null,
            error: '',
            busy: false,
            used: false,

            init() {
                const run = debounce(() => this.run(), 150);
                this.$watch('pattern', run);
                this.$watch('text', run);
                this.$watch('flags', run, { deep: true });
                this.$watch('replacement', run);
                this.$watch('showReplace', run);
                this.run();
            },

            flagString() {
                return Object.entries(this.flags).filter(([, on]) => on).map(([f]) => f).join('');
            },

            run() {
                if (!this.pattern) {
                    this.matches = [];
                    this.error = '';
                    this.replaced = null;
                    return;
                }
                worker ??= createWorker();
                const id = ++requestId;
                clearTimeout(pending);
                this.busy = true;

                pending = setTimeout(() => {
                    // Catastrophic backtracking: kill the worker and report it.
                    worker.terminate();
                    worker = null;
                    this.busy = false;
                    this.matches = [];
                    this.error = t('The pattern took too long to run (possible catastrophic backtracking). Simplify nested quantifiers like (a+)+.');
                }, TIMEOUT_MS);

                worker.onmessage = (event) => {
                    if (event.data.id !== id) return;
                    clearTimeout(pending);
                    this.busy = false;
                    if (event.data.ok) {
                        this.matches = event.data.matches;
                        this.truncated = event.data.truncated;
                        this.replaced = event.data.replaced;
                        this.error = '';
                        if (!this.used) {
                            this.used = true;
                            track('tool_use', { action: 'test' });
                        }
                    } else {
                        this.matches = [];
                        this.replaced = null;
                        this.error = event.data.error;
                    }
                };
                worker.postMessage({ id, pattern: this.pattern, flags: this.flagString(), text: this.text, replacement: this.showReplace ? this.replacement : null });
            },

            highlighted() {
                return segments(this.text, this.matches);
            },
        };
    });
});
