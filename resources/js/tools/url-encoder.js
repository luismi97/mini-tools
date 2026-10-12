import { decodeUrl, encodeUrl, parseUrl } from '../lib/url';
import { textTool } from '../lib/text-tool';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('urlEncoder', () => ({
        ...textTool({
            options: { mode: 'encode', scope: 'component', plusAsSpace: true },
            convert: (input, o) => (o.mode === 'encode' ? encodeUrl(input, o.scope) : decodeUrl(input, o.plusAsSpace)),
            swap: (o) => (o.mode = o.mode === 'encode' ? 'decode' : 'encode'),
            filename: (o) => (o.mode === 'encode' ? 'encoded-url.txt' : 'decoded-url.txt'),
            sample: 'https://example.com/search?q=free online tools&lang=en&ref=café',
        }),

        parsedUrl() {
            return parseUrl(this.options.mode === 'decode' ? this.output : this.input);
        },
    }));
});
