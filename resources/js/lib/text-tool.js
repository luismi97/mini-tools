import { track } from './analytics';
import { intlLocale, tc, t } from './i18n';
import { copyText, debounce, downloadBlob } from './utils';

/**
 * Shared Alpine logic for "input → output" text tools (encoders, converters).
 * Pairs with the <x-text-tool> Blade component.
 *
 * Note: no getters here, so tools can extend the returned object with spread.
 *
 * @param {object} config
 * @param {(input: string, options: object) => string|{text: string, meta: any}} config.convert
 *        throw an Error to show a message; return { text, meta } to expose `meta` to the view
 * @param {object} [config.options]                  reactive options bound in the toolbar
 * @param {(options: object) => void} [config.swap]   flips options when output becomes input
 * @param {string|((options: object) => string)} [config.filename] download file name
 * @param {string} [config.mimeType]
 * @param {string} [config.sample]                   sample input for "Load sample"
 */
export function textTool(config) {
    return {
        input: '',
        output: '',
        error: '',
        meta: null,
        copied: false,
        used: false,
        options: { ...(config.options ?? {}) },
        canSwap: typeof config.swap === 'function',
        hasSample: Boolean(config.sample),

        init() {
            const run = debounce(() => this.convert(), 150);
            this.$watch('input', run);
            this.$watch('options', run, { deep: true });
        },

        convert() {
            if (!this.input) {
                this.output = '';
                this.error = '';
                return;
            }
            try {
                const result = config.convert(this.input, this.options);
                // convert() may return a string, or { text, meta } to expose extra info (e.g. counts).
                this.output = typeof result === 'string' ? result : result.text;
                this.meta = typeof result === 'string' ? null : result.meta;
                this.error = '';
                if (!this.used) {
                    this.used = true;
                    track('tool_use', { action: this.options.mode ?? 'convert' });
                }
            } catch (e) {
                this.output = '';
                this.error = e.message || t('Something went wrong.');
            }
        },

        swap() {
            if (!this.canSwap || !this.output) return;
            const next = this.output;
            config.swap(this.options);
            this.input = next;
        },

        async copy() {
            if (!this.output) return;
            this.copied = await copyText(this.output);
            setTimeout(() => (this.copied = false), 1500);
            track('tool_result', { action: 'copy' });
        },

        download() {
            if (!this.output) return;
            const name = typeof config.filename === 'function' ? config.filename(this.options) : config.filename ?? 'output.txt';
            downloadBlob(new Blob([this.output], { type: config.mimeType ?? 'text/plain' }), name);
            track('file_download', { format: name.split('.').pop() });
        },

        loadSample() {
            this.input = config.sample ?? '';
        },

        clear() {
            this.input = '';
            this.output = '';
            this.error = '';
        },

        stats(text) {
            const chars = text.length;
            return tc(':count character', ':count characters', chars, { count: chars.toLocaleString(intlLocale()) });
        },
    };
}
