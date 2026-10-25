/**
 * Small browser helpers shared by all tools.
 */
import { intlLocale, t } from './i18n';

/** 27 → "2 yrs 3 mo" in the page language. */
export function formatDuration(months) {
    const total = Math.max(0, Math.round(months));
    const y = Math.floor(total / 12);
    const m = total % 12;
    return [y ? t(y > 1 ? ':count yrs' : ':count yr', { count: y }) : '', m ? t(':count mo', { count: m }) : ''].filter(Boolean).join(' ') || t(':count mo', { count: 0 });
}

/** "Mar 2031" / "mars 2031" in the page language. */
export function formatMonthYear(date, month = 'short') {
    return date.toLocaleDateString(intlLocale(), { month, year: 'numeric', timeZone: 'UTC' });
}

export function formatBytes(bytes) {
    if (!Number.isFinite(bytes) || bytes <= 0) return '0 B';
    const units = ['B', 'KB', 'MB', 'GB'];
    const i = Math.min(Math.floor(Math.log(bytes) / Math.log(1024)), units.length - 1);
    const value = bytes / 1024 ** i;
    return `${value >= 100 || i === 0 ? Math.round(value) : value.toFixed(1)} ${units[i]}`;
}

/** 1234.5678 -> "1,234.57" in the page language. Returns an em dash for null/NaN. */
export function formatNumber(value, maxDecimals = 2) {
    if (value === null || value === undefined || !Number.isFinite(value)) return '—';
    return value.toLocaleString(intlLocale(), { maximumFractionDigits: maxDecimals });
}

export function formatMoney(value, currency = 'USD') {
    if (!Number.isFinite(value)) return '—';
    try {
        return new Intl.NumberFormat(intlLocale(), { style: 'currency', currency }).format(value);
    } catch {
        return value.toFixed(2);
    }
}

export async function copyText(text) {
    try {
        await navigator.clipboard.writeText(text);
        return true;
    } catch {
        // Fallback for non-secure contexts / older browsers.
        const el = document.createElement('textarea');
        el.value = text;
        el.setAttribute('readonly', '');
        el.style.position = 'fixed';
        el.style.opacity = '0';
        document.body.appendChild(el);
        el.select();
        const ok = document.execCommand('copy');
        el.remove();
        return ok;
    }
}

export function downloadBlob(blob, filename) {
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
    a.remove();
    setTimeout(() => URL.revokeObjectURL(url), 1000);
}

export function debounce(fn, wait = 250) {
    let timer;
    return (...args) => {
        clearTimeout(timer);
        timer = setTimeout(() => fn(...args), wait);
    };
}

/** "photo.final.JPG" -> "photo.final" */
export function baseName(filename) {
    const dot = filename.lastIndexOf('.');
    return dot > 0 ? filename.slice(0, dot) : filename;
}
