import { generateLorem } from '../lib/lorem';
import { track } from '../lib/analytics';
import { copyText, downloadBlob } from '../lib/utils';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('loremIpsumGenerator', () => ({
        options: { count: 3, unit: 'paragraphs', startWithLorem: true, html: false },
        output: '',
        copied: false,

        init() {
            this.generate(false);
            this.$watch('options', () => this.generate(false), { deep: true });
        },

        generate(trackIt = true) {
            this.output = generateLorem(this.options);
            if (trackIt) track('tool_use', { action: 'generate', unit: this.options.unit, count: Number(this.options.count) });
        },

        async copy() {
            this.copied = await copyText(this.output);
            setTimeout(() => (this.copied = false), 1500);
        },

        download() {
            downloadBlob(new Blob([this.output], { type: 'text/plain' }), this.options.html ? 'lorem-ipsum.html' : 'lorem-ipsum.txt');
            track('file_download', { format: this.options.html ? 'html' : 'txt' });
        },
    }));
});
