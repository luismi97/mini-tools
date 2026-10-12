import { analyzeText } from '../lib/text';
import { track } from '../lib/analytics';
import { debounce, formatNumber } from '../lib/utils';
import { t } from '../lib/i18n';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('wordCounter', () => ({
        text: '',
        stats: analyzeText(''),

        init() {
            // Instant for normal texts, debounced for very long ones.
            const slow = debounce(() => (this.stats = analyzeText(this.text)), 200);
            this.$watch('text', (value) => (value.length > 50000 ? slow() : (this.stats = analyzeText(value))));
        },

        n(value) {
            return formatNumber(value, 0);
        },

        duration(minutes) {
            if (!minutes) return t(':count sec', { count: 0 });
            const total = Math.max(1, Math.round(minutes * 60));
            const m = Math.floor(total / 60);
            const s = total % 60;
            const sec = t(':count sec', { count: s });
            return m ? `${t(':count min', { count: m })}${s ? ` ${sec}` : ''}` : sec;
        },

        clear() {
            this.text = '';
            this.$refs.input.focus();
        },

        trackUse() {
            track('tool_use', { action: 'count' });
        },
    }));
});
