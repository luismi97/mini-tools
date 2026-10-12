import { decodeBase64, encodeBase64 } from '../lib/base64';
import { textTool } from '../lib/text-tool';
import { track } from '../lib/analytics';
import { copyText, downloadBlob, formatBytes } from '../lib/utils';
import { t } from '../lib/i18n';

const MAX_FILE = 10 * 1024 * 1024;

document.addEventListener('alpine:init', () => {
    window.Alpine.data('base64Encoder', () => ({
        ...textTool({
            options: { mode: 'encode', urlSafe: false },
            convert: (input, o) => (o.mode === 'encode' ? encodeBase64(input, o.urlSafe) : decodeBase64(input)),
            swap: (o) => (o.mode = o.mode === 'encode' ? 'decode' : 'encode'),
            filename: (o) => (o.mode === 'encode' ? 'base64.txt' : 'decoded.txt'),
            sample: t('Hello, World! 👋 Base64 encodes text and files as ASCII.'),
        }),

        file: null, // { name, size, dataUrl }
        fileError: '',
        fileCopied: '',

        encodeFile(event) {
            const picked = event.target.files[0];
            event.target.value = '';
            this.fileError = '';
            this.file = null;
            if (!picked) return;
            if (picked.size > MAX_FILE) {
                this.fileError = t('File is larger than 10 MB.');
                return;
            }
            const reader = new FileReader();
            reader.onload = () => {
                this.file = { name: picked.name, size: formatBytes(picked.size), dataUrl: String(reader.result) };
                track('file_upload', { count: 1 });
            };
            reader.onerror = () => (this.fileError = t('The file could not be read.'));
            reader.readAsDataURL(picked);
        },

        fileBase64() {
            return this.file ? this.file.dataUrl.slice(this.file.dataUrl.indexOf(',') + 1) : '';
        },

        async copyFile(kind) {
            const ok = await copyText(kind === 'uri' ? this.file.dataUrl : this.fileBase64());
            this.fileCopied = ok ? kind : '';
            setTimeout(() => (this.fileCopied = ''), 1500);
        },

        downloadFileBase64() {
            downloadBlob(new Blob([this.fileBase64()], { type: 'text/plain' }), `${this.file.name}.base64.txt`);
            track('file_download', { format: 'txt' });
        },
    }));
});
