/**
 * Timer formatting helpers (pure, unit-tested). Timers track absolute end
 * times instead of counting ticks, so they stay accurate in background tabs.
 */

/** 3725000 → "1:02:05"; with centiseconds → "1:02:05.00". */
export function formatDuration(ms, { centiseconds = false } = {}) {
    const totalMs = Math.max(0, Math.round(ms));
    const h = Math.floor(totalMs / 3600000);
    const m = Math.floor((totalMs % 3600000) / 60000);
    const s = Math.floor((totalMs % 60000) / 1000);
    const cs = Math.floor((totalMs % 1000) / 10);
    const base = h > 0 ? `${h}:${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')}` : `${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')}`;
    return centiseconds ? `${base}.${String(cs).padStart(2, '0')}` : base;
}

/** For a countdown, round up so "00:00" only shows when time is actually up. */
export function formatCountdown(ms) {
    return formatDuration(Math.ceil(Math.max(0, ms) / 1000) * 1000);
}

export function toMs({ hours = 0, minutes = 0, seconds = 0 }) {
    return ((Number(hours) || 0) * 3600 + (Number(minutes) || 0) * 60 + (Number(seconds) || 0)) * 1000;
}
