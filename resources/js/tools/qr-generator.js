import { buildPayload, contrastRatio, createMatrix, drawOnCanvas, renderSvg } from '../lib/qr';
import { track } from '../lib/analytics';
import { debounce, downloadBlob } from '../lib/utils';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('qrGenerator', () => ({
        type: 'url',
        data: {
            url: 'https://example.com',
            text: '',
            email: '',
            subject: '',
            body: '',
            phone: '',
            ssid: '',
            password: '',
            security: 'WPA',
            hidden: false,
        },
        options: {
            size: 512,
            margin: 4,
            foreground: '#000000',
            background: '#ffffff',
            level: 'M',
        },
        svg: '',
        error: '',
        matrix: null,
        tracked: false,

        types: {
            url: 'URL',
            text: 'Text',
            email: 'Email',
            phone: 'Phone',
            wifi: 'Wi-Fi',
        },

        init() {
            const update = debounce(() => this.generate(), 150);
            this.$watch('type', update);
            this.$watch('data', update, { deep: true });
            this.$watch('options', update, { deep: true });
            this.generate();
        },

        get lowContrast() {
            return contrastRatio(this.options.foreground, this.options.background) < 3;
        },

        generate() {
            const payload = buildPayload(this.type, this.data);
            if (payload.error) {
                this.error = payload.error;
                this.svg = '';
                this.matrix = null;
                return;
            }
            try {
                this.matrix = createMatrix(payload.value, this.options.level);
                this.error = '';
                this.svg = renderSvg(this.matrix, { ...this.options, size: '100%' });
                if (this.tracked) {
                    track('tool_use', { action: 'generate', type: this.type });
                }
                this.tracked = true;
            } catch (e) {
                this.error = e.message;
                this.svg = '';
                this.matrix = null;
            }
        },

        downloadSvg() {
            if (!this.matrix) return;
            const svg = renderSvg(this.matrix, { ...this.options, size: Number(this.options.size) });
            downloadBlob(new Blob([svg], { type: 'image/svg+xml' }), `qr-code-${this.type}.svg`);
            track('file_download', { format: 'svg', type: this.type });
        },

        downloadPng() {
            if (!this.matrix) return;
            const size = Number(this.options.size);
            const canvas = document.createElement('canvas');
            canvas.width = canvas.height = size;
            drawOnCanvas(canvas.getContext('2d'), this.matrix, { ...this.options, size });
            canvas.toBlob((blob) => {
                if (blob) downloadBlob(blob, `qr-code-${this.type}.png`);
            }, 'image/png');
            track('file_download', { format: 'png', type: this.type });
        },
    }));
});
