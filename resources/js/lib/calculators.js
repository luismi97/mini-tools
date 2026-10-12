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
