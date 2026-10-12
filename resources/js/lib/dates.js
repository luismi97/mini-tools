/**
 * Date calculator math on UTC calendar days (pure, unit-tested).
 */
import { DAY, WEEKDAYS, addMonths, calculateAge } from './age.js';

const isWeekend = (date) => date.getUTCDay() === 0 || date.getUTCDay() === 6;
const addDays = (date, n) => new Date(date.getTime() + n * DAY);

/**
 * Difference between two dates.
 * @param {{includeEnd?: boolean}} options count the end date as a full day
 */
export function dateDifference(start, end, { includeEnd = false } = {}) {
    const forward = end >= start;
    const [a, b] = forward ? [start, end] : [end, start];
    const span = Math.round((b - a) / DAY);
    const days = span + (includeEnd ? 1 : 0);

    // Business days in [a, b) — plus b itself when includeEnd.
    let business = 0;
    const last = includeEnd ? span : span - 1;
    for (let i = 0; i <= last; i++) {
        if (!isWeekend(addDays(a, i))) business++;
    }

    const breakdown = calculateAge(a, includeEnd ? addDays(b, 1) : b);

    return {
        direction: forward ? 'forward' : 'backward',
        days,
        weeks: Math.floor(days / 7),
        remainderDays: days % 7,
        businessDays: business,
        weekendDays: days - business,
        years: breakdown.years,
        months: breakdown.months,
        monthDays: breakdown.days,
        totalMonths: breakdown.totalMonths,
        hours: days * 24,
    };
}

/**
 * Add (or subtract) a period to a date.
 * @param {{years?: number, months?: number, weeks?: number, days?: number, subtract?: boolean, businessDays?: boolean}} period
 *        with businessDays, `days` counts Monday–Friday only (years/months/weeks are ignored)
 */
export function addToDate(date, { years = 0, months = 0, weeks = 0, days = 0, subtract = false, businessDays = false }) {
    const sign = subtract ? -1 : 1;
    let result;

    if (businessDays) {
        result = date;
        let remaining = Math.abs(Math.trunc(days));
        while (remaining > 0) {
            result = addDays(result, sign);
            if (!isWeekend(result)) remaining--;
        }
    } else {
        result = addMonths(date, sign * (Math.trunc(years) * 12 + Math.trunc(months)));
        result = addDays(result, sign * (Math.trunc(weeks) * 7 + Math.trunc(days)));
    }

    return { date: result, weekday: WEEKDAYS[result.getUTCDay()] };
}

export function toIso(date) {
    return date.toISOString().slice(0, 10);
}
