import { ALGORITHMS, hashBytes, hashText } from '../lib/hash';
import { track } from '../lib/analytics';
import { copyText, debounce, formatBytes } from '../lib/utils';
import { t } from '../lib/i18n';

const MAX_FILE = 200 * 1024 * 1024;

document.addEventListener('alpine:init', () => {
    window.Alpine.data('hashGenerator', () => ({
        source: 'text',
        text: 'Hello, World!',
        file: null, // { name, size }
        hashes: {},
        uppercase: false,
        compare: '',
        busy: false,
        error: '',
        copied: '',
        algorithms: ALGORITHMS,

        init() {
            this.$watch('text', debounce(() => this.computeText(), 150));
            this.computeText();
        },

        async computeText() {
            if (this.source !== 'text') return;
            this.hashes = await this.computeAll((algo) => hashText(this.text, algo));
        },

        async computeAll(fn) {
            const out = {};
            for (const algo of Object.keys(ALGORITHMS)) out[algo] = await fn(algo);
            return out;
        },

        async pickFile(event) {
            const picked = event.target.files[0];
            event.target.value = '';
            if (!picked) return;
            if (picked.size > MAX_FILE) {
                this.error = t('File is larger than :size.', { size: formatBytes(MAX_FILE) });
                return;
            }
            this.error = '';
            this.busy = true;
            this.source = 'file';
            this.file = { name: picked.name, size: formatBytes(picked.size) };
            try {
                const bytes = new Uint8Array(await picked.arrayBuffer());
                this.hashes = await this.computeAll((algo) => hashBytes(bytes, algo));
                track('tool_use', { action: 'file' });
            } catch {
                this.error = t('The file could not be read.');
            } finally {
                this.busy = false;
            }
        },

        useText() {
            this.source = 'text';
            this.file = null;
            this.computeText();
        },

        display(value) {
            return this.uppercase ? value.toUpperCase() : value;
        },

        matchFor(value) {
            const c = this.compare.trim().toLowerCase();
            return c && value && c === value.toLowerCase();
        },

        compareState() {
            const c = this.compare.trim();
            if (!c) return null;
            const hit = Object.entries(this.hashes).find(([, v]) => v === c.toLowerCase());
            return hit ? { ok: true, algo: ALGORITHMS[hit[0]] } : { ok: false };
        },

        async copy(algo) {
            if (await copyText(this.display(this.hashes[algo]))) {
                this.copied = algo;
                setTimeout(() => (this.copied = ''), 1500);
            }
        },
    }));
});
