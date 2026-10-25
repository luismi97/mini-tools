/**
 * Tiny SVG chart geometry (pure, unit-tested). No chart library: calculators
 * only need one or two balance curves, so we build the path strings here and
 * let <x-balance-chart> render them.
 */

export const CHART = { width: 600, height: 220, pad: 4 };

/** Rounded maximum for the y axis: 1, 2, 2.5 or 5 × 10^n at or above `value`. */
export function niceMax(value) {
    if (!(value > 0)) return 1;
    const power = 10 ** Math.floor(Math.log10(value));
    for (const step of [1, 2, 2.5, 5, 10]) {
        if (step * power >= value) return step * power;
    }
    return 10 * power;
}

/**
 * Points of a series scaled into the chart box. `xMax` is the length of the
 * longest series so shorter series (e.g. with extra payments) end earlier.
 * @param {number[]} values
 */
function points(values, xMax, yMax, { width, height, pad }) {
    const span = Math.max(1, xMax - 1);
    return values.map((v, i) => [
        pad + (i / span) * (width - pad * 2),
        pad + (1 - Math.min(Math.max(v, 0), yMax) / yMax) * (height - pad * 2),
    ]);
}

const fmt = (n) => Math.round(n * 10) / 10;

/** "M x y L x y …" through every point. */
export function linePath(values, xMax, yMax, box = CHART) {
    return points(values, xMax, yMax, box)
        .map(([x, y], i) => `${i ? 'L' : 'M'}${fmt(x)} ${fmt(y)}`)
        .join(' ');
}

/** Closed area under the line, down to the x axis. */
export function areaPath(values, xMax, yMax, box = CHART) {
    if (!values.length) return '';
    const pts = points(values, xMax, yMax, box);
    const bottom = fmt(box.height - box.pad);
    return `${linePath(values, xMax, yMax, box)} L${fmt(pts.at(-1)[0])} ${bottom} L${fmt(pts[0][0])} ${bottom} Z`;
}

/**
 * Everything <x-balance-chart> needs for a remaining-balance chart.
 * @param {number[]} main     balance at the start and after each year
 * @param {number[]} [compare] optional second series drawn as a dashed line
 */
export function balanceChart(main, compare = []) {
    const xMax = Math.max(main.length, compare.length);
    const yMax = niceMax(Math.max(...main, ...compare, 0));
    return {
        area: areaPath(main, xMax, yMax),
        line: linePath(main, xMax, yMax),
        compare: compare.length ? linePath(compare, xMax, yMax) : '',
        yMax,
        years: Math.max(0, xMax - 1),
    };
}
