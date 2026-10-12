import { generatePassword, strength } from '../lib/password';
import { track } from '../lib/analytics';
import { copyText } from '../lib/utils';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('passwordGenerator', () => ({
        options: { length: 16, lower: true, upper: true, digits: true, symbols: true, excludeAmbiguous: false },
        count: 1,
        passwords: [],
        poolSize: 0,
        error: '',
        copied: null,

        init() {
            this.generate(false);
            this.$watch('options', () => this.generate(false), { deep: true });
            this.$watch('count', () => this.generate(false));
        },

        generate(trackIt = true) {
            try {
                const n = Math.min(50, Math.max(1, Math.floor(Number(this.count)) || 1));
                const list = [];
                for (let i = 0; i < n; i++) {
                    const { password, poolSize } = generatePassword(this.options);
                    list.push(password);
                    this.poolSize = poolSize;
                }
                this.passwords = list;
                this.error = '';
                if (trackIt) track('tool_use', { action: 'generate', length: Number(this.options.length), count: n });
            } catch (e) {
                this.passwords = [];
                this.error = e.message;
            }
        },

        strength() {
            return strength(Number(this.options.length), this.poolSize);
        },

        meterClass() {
            const bits = this.strength().bits;
            if (bits >= 80) return 'bg-success';
            if (bits >= 60) return 'bg-accent';
            if (bits >= 40) return 'bg-warning';
            return 'bg-danger';
        },

        async copy(index) {
            const text = index === 'all' ? this.passwords.join('\n') : this.passwords[index];
            if (await copyText(text)) {
                this.copied = index;
                setTimeout(() => (this.copied = null), 1500);
            }
        },
    }));
});
