import { generateUuids, inspectUuid } from '../lib/uuid';
import { track } from '../lib/analytics';
import { copyText, downloadBlob } from '../lib/utils';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('uuidGenerator', () => ({
        options: { count: 10, version: 'v4', uppercase: false, hyphens: true, braces: false },
        output: '',
        copied: false,
        check: '',

        init() {
            this.generate(false);
            this.$watch('options', () => this.generate(false), { deep: true });
        },

        generate(trackIt = true) {
            this.output = generateUuids(this.options.count, this.options).join('\n');
            if (trackIt) track('tool_use', { action: 'generate', version: this.options.version, count: Number(this.options.count) });
        },

        lineCount() {
            return this.output ? this.output.split('\n').length : 0;
        },

        async copy() {
            this.copied = await copyText(this.output);
            setTimeout(() => (this.copied = false), 1500);
        },

        download() {
            downloadBlob(new Blob([this.output + '\n'], { type: 'text/plain' }), 'uuids.txt');
            track('file_download', { format: 'txt' });
        },

        checkResult() {
            if (!this.check.trim()) return null;
            return inspectUuid(this.check);
        },
    }));
});
