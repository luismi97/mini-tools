/**
 * Color parsing/conversion and WCAG contrast (pure, unit-tested).
 */

const clamp = (v, min, max) => Math.min(max, Math.max(min, v));

/**
 * Parse #rgb, #rrggbb, rgb(r, g, b), rgb(r g b), hsl(h, s%, l%) or a bare "r, g, b".
 * @returns {{r: number, g: number, b: number}|null}
 */
export function parseColor(input) {
    const text = String(input).trim().toLowerCase();

    let m = /^#?([0-9a-f]{3}|[0-9a-f]{6})$/.exec(text);
    if (m) {
        const hex = m[1].length === 3 ? m[1].split('').map((c) => c + c).join('') : m[1];
        return { r: parseInt(hex.slice(0, 2), 16), g: parseInt(hex.slice(2, 4), 16), b: parseInt(hex.slice(4, 6), 16) };
    }

    m = /^(?:rgba?\()?\s*(\d{1,3})\s*[,\s]\s*(\d{1,3})\s*[,\s]\s*(\d{1,3})\s*(?:[,/]\s*[\d.]+%?\s*)?\)?$/.exec(text);
    if (m) {
        const [r, g, b] = m.slice(1, 4).map(Number);
        if ([r, g, b].every((v) => v <= 255)) return { r, g, b };
        return null;
    }

    m = /^hsla?\(\s*(-?[\d.]+)(?:deg)?\s*[,\s]\s*([\d.]+)%\s*[,\s]\s*([\d.]+)%\s*(?:[,/]\s*[\d.]+%?\s*)?\)$/.exec(text);
    if (m) return hslToRgb(Number(m[1]), Number(m[2]), Number(m[3]));

    return null;
}

export function hslToRgb(h, s, l) {
    h = ((h % 360) + 360) % 360;
    s = clamp(s, 0, 100) / 100;
    l = clamp(l, 0, 100) / 100;
    const k = (n) => (n + h / 30) % 12;
    const a = s * Math.min(l, 1 - l);
    const f = (n) => l - a * Math.max(-1, Math.min(k(n) - 3, Math.min(9 - k(n), 1)));
    return { r: Math.round(f(0) * 255), g: Math.round(f(8) * 255), b: Math.round(f(4) * 255) };
}

export function rgbToHsl({ r, g, b }) {
    const [rn, gn, bn] = [r / 255, g / 255, b / 255];
    const max = Math.max(rn, gn, bn);
    const min = Math.min(rn, gn, bn);
    const l = (max + min) / 2;
    let h = 0;
    let s = 0;
    if (max !== min) {
        const d = max - min;
        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
        if (max === rn) h = (gn - bn) / d + (gn < bn ? 6 : 0);
        else if (max === gn) h = (bn - rn) / d + 2;
        else h = (rn - gn) / d + 4;
        h *= 60;
    }
    return { h: Math.round(h), s: Math.round(s * 100), l: Math.round(l * 100) };
}

export function formats(rgb) {
    const hex = '#' + [rgb.r, rgb.g, rgb.b].map((v) => v.toString(16).padStart(2, '0')).join('');
    const { h, s, l } = rgbToHsl(rgb);
    return {
        hex,
        rgb: `rgb(${rgb.r}, ${rgb.g}, ${rgb.b})`,
        hsl: `hsl(${h}, ${s}%, ${l}%)`,
        cssVar: `${rgb.r} ${rgb.g} ${rgb.b}`,
    };
}

function luminance({ r, g, b }) {
    const [R, G, B] = [r, g, b].map((v) => {
        const c = v / 255;
        return c <= 0.03928 ? c / 12.92 : ((c + 0.055) / 1.055) ** 2.4;
    });
    return 0.2126 * R + 0.7152 * G + 0.0722 * B;
}

/**
 * WCAG 2.x contrast ratio and pass/fail for each level.
 */
export function contrast(foreground, background) {
    const [l1, l2] = [luminance(foreground), luminance(background)].sort((a, b) => b - a);
    const ratio = Math.round(((l1 + 0.05) / (l2 + 0.05)) * 100) / 100;
    return {
        ratio,
        aaNormal: ratio >= 4.5,
        aaLarge: ratio >= 3,
        aaaNormal: ratio >= 7,
        aaaLarge: ratio >= 4.5,
    };
}
