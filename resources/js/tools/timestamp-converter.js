import { dateToTimestamp, parseTimestamp, relativeTime } from '../lib/timestamp';
import { track } from '../lib/analytics';
import { copyText } from '../lib/utils';
import { intlLocale } from '../lib/i18n';

const pad = (n) => String(n).padStart(2, '0');
const localInput = (d) => `${d.getFullYear()}-${pad(d.getMonth() + 1)}-${pad(d.getDate())}T${pad(d.getHours())}:${pad(d.getMinutes())}:${pad(d.getSeconds())}`;

document.addEventListener('alpine:init', () => {
    window.Alpine.data('timestampConverter', () => ({
        now: Date.now(),
        timestamp: String(Math.floor(Date.now() / 1000)),
        dateInput: localInput(new Date()),
        zone: 'local',
        copied: '',
        timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone,
        used: false,

        init() {
            this.tick = setInterval(() => (this.now = Date.now()), 1000);
        },

        destroy() {
            clearInterval(this.tick);
        },

        parsed() {
            try {
                return { ok: true, ...parseTimestamp(this.timestamp) };
            } catch (e) {
                return { ok: false, message: e.message };
            }
        },

        rows() {
            const p = this.parsed();
            if (!p.ok) return [];
            const d = p.date;
            return [
                ['Local time', d.toLocaleString(intlLocale(), { dateStyle: 'full', timeStyle: 'long' })],
                ['UTC', d.toUTCString()],
                ['ISO 8601', d.toISOString()],
                ['Relative', relativeTime(d, this.now)],
                ['Seconds', String(Math.floor(d.getTime() / 1000))],
                ['Milliseconds', String(d.getTime())],
            ];
        },

        converted() {
            try {
                return { ok: true, ...dateToTimestamp(this.dateInput, this.zone) };
            } catch (e) {
                return { ok: false, message: e.message };
            }
        },

        useNow() {
            this.timestamp = String(Math.floor(Date.now() / 1000));
        },

        async copy(value, key) {
            if (await copyText(value)) {
                this.copied = key;
                setTimeout(() => (this.copied = ''), 1500);
            }
            if (!this.used) {
                this.used = true;
                track('tool_use', { action: 'copy' });
            }
        },
    }));
});
