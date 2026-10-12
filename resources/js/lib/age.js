/**
 * Age / date difference math on calendar dates (pure, unit-tested).
 * Dates are handled as UTC calendar days to avoid time-zone and DST issues.
 */

import { t } from './i18n.js';

export const DAY = 86_400_000;
export const WEEKDAYS = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

/** "2024-02-29" → UTC Date, or null if invalid. */
export function parseDate(value) {
    const m = /^(\d{4})-(\d{2})-(\d{2})$/.exec(String(value));
    if (!m) return null;
    const date = new Date(Date.UTC(+m[1], +m[2] - 1, +m[3]));
    return date.getUTCMonth() === +m[2] - 1 ? date : null;
}

export function todayUtc(now = new Date()) {
    return new Date(Date.UTC(now.getFullYear(), now.getMonth(), now.getDate()));
}

function daysInMonth(year, month) {
    return new Date(Date.UTC(year, month + 1, 0)).getUTCDate();
}

export function addMonths(date, count) {
    const total = date.getUTCMonth() + count;
    const year = date.getUTCFullYear() + Math.floor(total / 12);
    const month = ((total % 12) + 12) % 12;
    return new Date(Date.UTC(year, month, Math.min(date.getUTCDate(), daysInMonth(year, month))));
}

/** Birthday in a given year; Feb 29 falls back to Feb 28 in non-leap years. */
function birthdayIn(year, birth) {
    const month = birth.getUTCMonth();
    const day = Math.min(birth.getUTCDate(), daysInMonth(year, month));
    return new Date(Date.UTC(year, month, day));
}

/**
 * @param {Date} birth UTC date
 * @param {Date} on    UTC date
 */
export function calculateAge(birth, on) {
    if (on < birth) throw new Error(t('The birth date must be before the "age on" date.'));

    // Whole months first (anchor = birth + N months, clamped to month end), then remaining days.
    let totalMonthsElapsed = (on.getUTCFullYear() - birth.getUTCFullYear()) * 12 + (on.getUTCMonth() - birth.getUTCMonth());
    let anchor = addMonths(birth, totalMonthsElapsed);
    if (anchor > on) {
        totalMonthsElapsed--;
        anchor = addMonths(birth, totalMonthsElapsed);
    }
    const years = Math.floor(totalMonthsElapsed / 12);
    const months = totalMonthsElapsed % 12;
    const days = Math.round((on - anchor) / DAY);

    const totalDays = Math.round((on - birth) / DAY);

    let next = birthdayIn(on.getUTCFullYear(), birth);
    if (next < on) next = birthdayIn(on.getUTCFullYear() + 1, birth);
    const daysUntil = Math.round((next - on) / DAY);

    return {
        years,
        months,
        days,
        totalMonths: totalMonthsElapsed,
        totalWeeks: Math.floor(totalDays / 7),
        totalDays,
        totalHours: totalDays * 24,
        bornOn: WEEKDAYS[birth.getUTCDay()],
        nextBirthday: {
            date: next,
            weekday: WEEKDAYS[next.getUTCDay()],
            daysUntil,
            turning: next.getUTCFullYear() - birth.getUTCFullYear(),
        },
    };
}
