/**
 * Health calculators: BMI, calories (TDEE) and pregnancy due date (pure, unit-tested).
 * Results are general estimates, not medical advice.
 */
import { DAY } from './age.js';
import { t } from './i18n.js';

export const LB_PER_KG = 2.2046226218;
export const CM_PER_IN = 2.54;

export const BMI_CATEGORIES = [
    { max: 18.5, label: 'Underweight' },
    { max: 25, label: 'Healthy weight' },
    { max: 30, label: 'Overweight' },
    { max: Infinity, label: 'Obesity' },
];

/**
 * @param {number} weightKg
 * @param {number} heightCm
 */
export function bmi(weightKg, heightCm) {
    if (!(weightKg > 0) || !(heightCm > 0)) throw new Error(t('Enter your weight and height.'));
    const m = heightCm / 100;
    const value = weightKg / (m * m);
    if (value < 5 || value > 150) throw new Error(t('Check the values: this BMI is outside the realistic range.'));
    const category = BMI_CATEGORIES.find((c) => value < c.max).label;
    return {
        bmi: Math.round(value * 10) / 10,
        category,
        healthyMinKg: Math.round(18.5 * m * m * 10) / 10,
        healthyMaxKg: Math.round(24.9 * m * m * 10) / 10,
    };
}

export const ACTIVITY = {
    sedentary: { label: 'Sedentary (little or no exercise)', factor: 1.2 },
    light: { label: 'Lightly active (1–3 days/week)', factor: 1.375 },
    moderate: { label: 'Moderately active (3–5 days/week)', factor: 1.55 },
    active: { label: 'Very active (6–7 days/week)', factor: 1.725 },
    extra: { label: 'Extra active (physical job or 2× training)', factor: 1.9 },
};

/**
 * Mifflin-St Jeor BMR × activity factor.
 * @param {{sex: 'male'|'female', age: number, weightKg: number, heightCm: number, activity: keyof ACTIVITY}} input
 */
export function calories({ sex, age, weightKg, heightCm, activity }) {
    if (!(age >= 15 && age <= 100)) throw new Error(t('Enter an age between 15 and 100.'));
    if (!(weightKg > 0) || !(heightCm > 0)) throw new Error(t('Enter your weight and height.'));
    const bmr = 10 * weightKg + 6.25 * heightCm - 5 * age + (sex === 'female' ? -161 : 5);
    const tdee = bmr * ACTIVITY[activity].factor;
    const r = (v) => Math.round(v);
    return {
        bmr: r(bmr),
        maintain: r(tdee),
        mildLoss: r(tdee - 250),
        loss: r(tdee - 500),
        mildGain: r(tdee + 250),
        gain: r(tdee + 500),
    };
}

/**
 * Pregnancy dates from the first day of the last menstrual period (Naegele's rule,
 * adjusted for cycle length).
 * @param {Date} lmp UTC date
 * @param {number} cycleLength days (21–45)
 * @param {Date} today UTC date
 */
export function dueDate(lmp, cycleLength = 28, today = new Date()) {
    if (!(cycleLength >= 20 && cycleLength <= 45)) throw new Error(t('Enter a cycle length between 20 and 45 days.'));
    const shift = cycleLength - 28;
    const due = new Date(lmp.getTime() + (280 + shift) * DAY);
    const conception = new Date(lmp.getTime() + (14 + shift) * DAY);
    const elapsed = Math.floor((today.getTime() - lmp.getTime() - shift * DAY) / DAY);

    if (elapsed < 0) throw new Error(t('The date of your last period cannot be in the future.'));
    if (elapsed > 44 * 7) throw new Error(t('This date is more than 44 weeks ago. Check the date of your last period.'));

    const weeks = Math.floor(elapsed / 7);
    return {
        due,
        conception,
        gestationalWeeks: weeks,
        gestationalDays: elapsed % 7,
        trimester: weeks < 13 ? 1 : weeks < 27 ? 2 : 3,
        daysToGo: Math.max(0, Math.round((due.getTime() - today.getTime()) / DAY)),
        progress: Math.min(100, Math.round((elapsed / 280) * 100)),
        milestones: [
            { label: 'End of first trimester', date: new Date(lmp.getTime() + (13 * 7 + shift) * DAY) },
            { label: 'Anatomy scan window (18–22 weeks)', date: new Date(lmp.getTime() + (18 * 7 + shift) * DAY) },
            { label: 'Third trimester begins', date: new Date(lmp.getTime() + (27 * 7 + shift) * DAY) },
            { label: 'Full term (39 weeks)', date: new Date(lmp.getTime() + (39 * 7 + shift) * DAY) },
        ],
    };
}
