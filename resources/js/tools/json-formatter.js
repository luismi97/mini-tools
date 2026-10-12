import { formatJson, jsonToCsv, jsonToTypeScript, minifyJson, parseJson } from '../lib/json';
import { track } from '../lib/analytics';
import { copyText, debounce, downloadBlob, formatBytes } from '../lib/utils';
import { t } from '../lib/i18n';

const SAMPLE = `{"id":1024,"name":"Tiny Knack","active":true,"tags":["json","formatter","online"],"owner":{"name":"Ada Lovelace","email":"ada@example.com"},"plans":[{"name":"Free","price":0},{"name":"Pro","price":4.99,"features":["No ads","Batch processing"]}]}`;

const OUTPUTS = {
    json: { label: 'Formatted JSON', file: 'formatted.json', type: 'application/json' },
    min: { label: 'Minified JSON', file: 'minified.json', type: 'application/json' },
    csv: { label: 'CSV', file: 'data.csv', type: 'text/csv' },
    ts: { label: 'TypeScript', file: 'types.ts', type: 'text/plain' },
};

document.addEventListener('alpine:init', () => {
    window.Alpine.data('jsonFormatter', () => ({
        input: '',
        output: '',
        outputKind: 'json',
        indent: '2',
        sortKeys: false,
        status: null, // { type: 'valid' | 'error', message, line, column, position }
        copied: false,

        init() {
            this.liveValidate = debounce(() => this.validate({ silent: true }), 400);
        },

        get outputLabel() {
            return OUTPUTS[this.outputKind].label;
        },

        get inputSize() {
            return formatBytes(new Blob([this.input]).size);
        },

        get outputSize() {
            return formatBytes(new Blob([this.output]).size);
        },

        parse() {
            const result = parseJson(this.input);
            this.status = result.ok
                ? { type: 'valid', message: t('Valid JSON') }
                : { type: 'error', ...result.error };
            return result;
        },

        validate({ silent = false } = {}) {
            if (!this.input.trim()) {
                this.status = null;
                return;
            }
            const result = this.parse();
            if (!silent) {
                track('tool_use', { action: 'validate' });
                track('tool_result', { action: 'validate', success: result.ok });
                if (!result.ok) this.jumpToError();
            }
        },

        run(kind) {
            track('tool_use', { action: kind });
            const result = this.parse();
            if (!result.ok) {
                this.output = '';
                this.jumpToError();
                track('tool_result', { action: kind, success: false });
                return;
            }

            const value = result.value;
            try {
                this.output = {
                    json: () => formatJson(value, this.indent, this.sortKeys),
                    min: () => minifyJson(value),
                    csv: () => jsonToCsv(value),
                    ts: () => jsonToTypeScript(value),
                }[kind]();
                this.outputKind = kind;
                track('tool_result', { action: kind, success: true, size_kb: Math.round(this.output.length / 1024) });
            } catch (e) {
                this.status = { type: 'error', message: e.message };
                track('tool_result', { action: kind, success: false });
            }
        },

        jumpToError() {
            const pos = this.status?.position;
            const el = this.$refs.input;
            if (pos === null || pos === undefined || !el) return;
            el.focus();
            el.setSelectionRange(pos, Math.min(pos + 1, this.input.length));
        },

        async copy() {
            if (!this.output) return;
            this.copied = await copyText(this.output);
            setTimeout(() => (this.copied = false), 1500);
        },

        download() {
            if (!this.output) return;
            const meta = OUTPUTS[this.outputKind];
            downloadBlob(new Blob([this.output], { type: meta.type }), meta.file);
            track('file_download', { format: this.outputKind });
        },

        useOutputAsInput() {
            if (this.outputKind === 'json' || this.outputKind === 'min') {
                this.input = this.output;
                this.validate({ silent: true });
            }
        },

        loadSample() {
            this.input = SAMPLE;
            this.run('json');
        },

        clear() {
            this.input = '';
            this.output = '';
            this.status = null;
            this.$refs.input.focus();
        },
    }));
});
