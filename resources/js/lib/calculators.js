/**
 * Small calculators: percentage, tip and salary (pure, unit-tested).
 * Functions return null when the result is undefined (e.g. division by zero).
 */

const finite = (v) => (Number.isFinite(v) ? v : null);

/* ----------------------------------------------------------- Percentage */

/** What is P% of X? */
export function percentOf(percent, value) {
    return finite((percent / 100) * value);
}

/** X is what percent of Y? */
export function whatPercent(part, whole) {
    return whole === 0 ? null : finite((part / whole) * 100);
}

/** Percentage increase/decrease from A to B. */
export function percentChange(from, to) {
    return from === 0 ? null : finite(((to - from) / Math.abs(from)) * 100);
}

/** Increase (positive percent) or decrease (negative percent) X by P%. */
export function applyPercent(value, percent) {
    return finite(value * (1 + percent / 100));
}

/* ------------------------------------------------------------------ Tip */

/**
 * @param {{bill: number, tipPercent: number, people: number, roundUp?: boolean}} input
 */
export function calculateTip({ bill, tipPercent, people, roundUp = false }) {
    const persons = Math.max(1, Math.floor(people) || 1);
    const tip = bill * (tipPercent / 100);
    let perPerson = (bill + tip) / persons;
    if (roundUp) perPerson = Math.ceil(perPerson);
    const total = roundUp ? perPerson * persons : bill + tip;
    return {
        tip: round2(total - bill),
        total: round2(total),
        perPerson: round2(perPerson),
        tipPerPerson: round2((total - bill) / persons),
    };
}

/**
 * Share a tip pool by hours worked. Works in cents and hands leftover cents to the
 * largest remainders, so the shares always add up to the exact total.
 *
 * @param {number} totalTips
 * @param {number[]} hours Hours per person (invalid or negative values count as 0).
 * @returns {{totalHours: number, perHour: number, shares: number[]}|null}
 */
export function splitTipsByHours(totalTips, hours) {
    const clean = hours.map((h) => (Number.isFinite(h) && h > 0 ? h : 0));
    const totalHours = clean.reduce((sum, h) => sum + h, 0);
    if (!Number.isFinite(totalTips) || totalTips < 0 || totalHours === 0) return null;

    const cents = Math.round(totalTips * 100);
    const exact = clean.map((h) => (cents * h) / totalHours);
    const shares = exact.map(Math.floor);
    const byRemainder = exact.map((value, i) => [value - shares[i], i]).sort((a, b) => b[0] - a[0]);
    let left = cents - shares.reduce((sum, s) => sum + s, 0);
    for (const [, i] of byRemainder) {
        if (left <= 0) break;
        shares[i] += 1;
        left -= 1;
    }

    return { totalHours, perHour: round2(totalTips / totalHours), shares: shares.map((s) => s / 100) };
}

/* --------------------------------------------------------------- Salary */

export const PAY_PERIODS = {
    hourly: 'Hourly',
    daily: 'Daily',
    weekly: 'Weekly',
    biweekly: 'Biweekly',
    semimonthly: 'Semi-monthly',
    monthly: 'Monthly',
    annual: 'Annual',
};

/**
 * Convert a pay amount between periods.
 * @param {number} amount
 * @param {keyof PAY_PERIODS} period
 * @param {{hoursPerWeek?: number, daysPerWeek?: number, weeksPerYear?: number}} schedule
 * @returns {Record<keyof PAY_PERIODS, number>}
 */
export function convertSalary(amount, period, { hoursPerWeek = 40, daysPerWeek = 5, weeksPerYear = 52 } = {}) {
    const perYear = {
        hourly: hoursPerWeek * weeksPerYear,
        daily: daysPerWeek * weeksPerYear,
        weekly: weeksPerYear,
        biweekly: weeksPerYear / 2,
        semimonthly: 24,
        monthly: 12,
        annual: 1,
    };
    const annual = amount * perYear[period];
    return Object.fromEntries(Object.entries(perYear).map(([key, n]) => [key, round2(n ? annual / n : 0)]));
}

export function round2(value) {
    return Math.round((value + Number.EPSILON) * 100) / 100;
}
