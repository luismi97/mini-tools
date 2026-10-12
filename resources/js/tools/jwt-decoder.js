import { decodeJwt } from '../lib/jwt';
import { track } from '../lib/analytics';
import { copyText, debounce } from '../lib/utils';
import { intlLocale } from '../lib/i18n';

// Sample token (not a real secret): {"alg":"HS256","typ":"JWT"} . {"sub":"1234567890","name":"Ada Lovelace","role":"admin","iat":1767225600,"exp":4102444800}
const SAMPLE = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkFkYSBMb3ZlbGFjZSIsInJvbGUiOiJhZG1pbiIsImlhdCI6MTc2NzIyNTYwMCwiZXhwIjo0MTAyNDQ0ODAwfQ.k5tU4cuB2CeUQ0PJGoeD6ntT-kvXhCB3uHKcSvAtT3E';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('jwtDecoder', () => ({
        token: '',
        result: null,
        error: '',
        copied: '',
        used: false,

        init() {
            this.$watch('token', debounce(() => this.decode(), 150));
        },

        decode() {
            if (!this.token.trim()) {
                this.result = null;
                this.error = '';
                return;
            }
            try {
                this.result = decodeJwt(this.token);
                this.error = '';
                if (!this.used) {
                    this.used = true;
                    track('tool_use', { action: 'decode' });
                }
            } catch (e) {
                this.result = null;
                this.error = e.message;
            }
        },

        pretty(value) {
            return JSON.stringify(value, null, 2);
        },

        formatDate(date) {
            return `${date.toISOString().replace('T', ' ').replace(/\.\d+Z$/, ' UTC')} (${date.toLocaleString(intlLocale())})`;
        },

        async copy(part) {
            const ok = await copyText(this.pretty(this.result[part]));
            this.copied = ok ? part : '';
            setTimeout(() => (this.copied = ''), 1500);
        },

        loadSample() {
            this.token = SAMPLE;
        },

        clear() {
            this.token = '';
        },
    }));
});
