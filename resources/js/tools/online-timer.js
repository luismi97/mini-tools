import { formatCountdown, formatDuration, toMs } from '../lib/timer';
import { track } from '../lib/analytics';
import { t } from '../lib/i18n';

/** Three short beeps with the Web Audio API (no audio file to download). */
function beep() {
    try {
        const ctx = new (window.AudioContext || window.webkitAudioContext)();
        [0, 0.35, 0.7].forEach((offset) => {
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.frequency.value = 880;
            gain.gain.setValueAtTime(0.0001, ctx.currentTime + offset);
            gain.gain.exponentialRampToValueAtTime(0.4, ctx.currentTime + offset + 0.02);
            gain.gain.exponentialRampToValueAtTime(0.0001, ctx.currentTime + offset + 0.25);
            osc.connect(gain).connect(ctx.destination);
            osc.start(ctx.currentTime + offset);
            osc.stop(ctx.currentTime + offset + 0.3);
        });
        setTimeout(() => ctx.close(), 1500);
    } catch {
        // Audio not available.
    }
}

document.addEventListener('alpine:init', () => {
    window.Alpine.data('onlineTimer', () => {
        const baseTitle = document.title;
        let ticker = null;

        return {
            mode: 'timer',
            now: Date.now(),
            sound: true,

            // Countdown timer: absolute end time keeps it accurate in background tabs.
            duration: { hours: 0, minutes: 5, seconds: 0 },
            endAt: null,
            pausedLeft: null,
            finished: false,
            presets: [1, 3, 5, 10, 15, 30, 60],

            // Stopwatch
            swStart: null,
            swBefore: 0,
            laps: [],

            // Pomodoro
            pomo: { work: 25, short: 5, long: 15 },
            phase: 'work',
            round: 1,

            init() {
                ticker = setInterval(() => this.tick(), 100);
            },

            destroy() {
                clearInterval(ticker);
                document.title = baseTitle;
            },

            tick() {
                this.now = Date.now();
                if (this.endAt && this.now >= this.endAt) this.complete();
                const label = this.mode === 'stopwatch' ? (this.swStart ? formatDuration(this.swElapsed()) : null) : this.endAt ? formatCountdown(this.left()) : null;
                document.title = label ? `${label} · ${t(this.mode === 'pomodoro' ? (this.phase === 'work' ? 'Focus' : 'Break') : 'Timer')}` : baseTitle;
            },

            /* ---- countdown (timer + pomodoro) ---- */
            left() {
                if (this.endAt) return Math.max(0, this.endAt - this.now);
                if (this.pausedLeft !== null) return this.pausedLeft;
                return this.mode === 'pomodoro' ? this.phaseMs() : toMs(this.duration);
            },

            running() {
                return this.endAt !== null;
            },

            start() {
                const ms = this.left();
                if (ms <= 0) return;
                this.finished = false;
                this.endAt = Date.now() + ms;
                this.pausedLeft = null;
                track('tool_use', { action: `start_${this.mode}` });
            },

            pause() {
                this.pausedLeft = this.left();
                this.endAt = null;
            },

            reset() {
                this.endAt = null;
                this.pausedLeft = null;
                this.finished = false;
            },

            setPreset(minutes) {
                this.reset();
                this.duration = { hours: Math.floor(minutes / 60), minutes: minutes % 60, seconds: 0 };
            },

            complete() {
                this.endAt = null;
                this.pausedLeft = null;
                this.finished = true;
                if (this.sound) beep();
                if (this.mode === 'pomodoro') this.nextPhase(true);
            },

            phaseMs() {
                const minutes = this.phase === 'work' ? this.pomo.work : this.phase === 'short' ? this.pomo.short : this.pomo.long;
                return (Number(minutes) || 1) * 60000;
            },

            nextPhase(autoStart = false) {
                if (this.phase === 'work') {
                    this.phase = this.round % 4 === 0 ? 'long' : 'short';
                } else {
                    this.phase = 'work';
                    this.round++;
                }
                this.reset();
                if (autoStart) this.start();
            },

            /* ---- stopwatch ---- */
            swElapsed() {
                return this.swBefore + (this.swStart ? this.now - this.swStart : 0);
            },

            swToggle() {
                if (this.swStart) {
                    this.swBefore = this.swElapsed();
                    this.swStart = null;
                } else {
                    this.swStart = Date.now();
                    track('tool_use', { action: 'start_stopwatch' });
                }
            },

            swLap() {
                const total = this.swElapsed();
                const previous = this.laps.length ? this.laps[0].total : 0;
                this.laps.unshift({ n: this.laps.length + 1, split: total - previous, total });
            },

            swReset() {
                this.swStart = null;
                this.swBefore = 0;
                this.laps = [];
            },

            switchMode(mode) {
                this.reset();
                this.mode = mode;
            },

            fmt: formatDuration,
            fmtCountdown: formatCountdown,
        };
    });
});
