/**
 * Credit card payoff math (pure, unit-tested).
 *
 * Interest is charged monthly at APR / 12 on the balance, then the payment is
 * applied. The "minimum payment" plan mimics common card terms: interest plus a
 * percentage of the balance, never less than a fixed floor.
 */
import { t } from './i18n.js';

export const MAX_MONTHS = 600;
export const MINIMUM_DEFAULTS = { percent: 1, floor: 25 };

const round2 = (v) => Math.round((v + Number.EPSILON) * 100) / 100;

function validate(balance, apr) {
    if (!(balance > 0)) throw new Error(t('Enter a balance greater than 0.'));
    if (!(apr >= 0 && apr <= 100)) throw new Error(t('Enter an interest rate between 0% and 100%.'));
}

/**
 * Month-by-month simulation. `pay(balance, interest)` returns the payment for that month.
 * @returns {{months: number, totalInterest: number, totalPaid: number, firstPayment: number, balances: number[]}}
 *          balances: balance at the start and after every month
 */
function simulate(balance, apr, pay) {
    const rate = apr / 100 / 12;
    const balances = [balance];
    let totalInterest = 0;
    let totalPaid = 0;
    let firstPayment = 0;
    let month = 0;

    while (balance > 0.005) {
        if (month >= MAX_MONTHS) {
            throw new Error(t('These payments would take more than :years years. Increase the payments.', { years: MAX_MONTHS / 12 }));
        }
        month++;
        const interest = round2(balance * rate);
        const payment = round2(Math.min(pay(balance, interest), balance + interest));
        if (month === 1) {
            if (payment <= interest) {
                throw new Error(t('Your payments do not cover the monthly interest, so the debt would never be paid off. Increase the payments.'));
            }
            firstPayment = payment;
        }
        balance = round2(balance + interest - payment);
        totalInterest += interest;
        totalPaid += payment;
        balances.push(Math.max(0, balance));
    }

    return { months: month, totalInterest: round2(totalInterest), totalPaid: round2(totalPaid), firstPayment, balances };
}

/** Pay a fixed amount every month. */
export function payoffWithPayment({ balance, apr, payment }) {
    validate(balance, apr);
    if (!(payment > 0)) throw new Error(t('Enter a monthly payment greater than 0.'));
    return simulate(balance, apr, () => payment);
}

/** Fixed monthly payment (rounded up to the cent) that clears the balance in `months`. */
export function paymentForMonths({ balance, apr, months }) {
    validate(balance, apr);
    if (!(Number.isInteger(months) && months >= 1 && months <= MAX_MONTHS)) {
        throw new Error(t('Enter a number of months between 1 and :max.', { max: MAX_MONTHS }));
    }
    const rate = apr / 100 / 12;
    const exact = rate === 0 ? balance / months : (balance * rate) / (1 - (1 + rate) ** -months);
    return Math.ceil(round2(exact * 100)) / 100;
}

/** Pay only the card's minimum each month: interest + `percent`% of the balance, at least `floor`. */
export function minimumPaymentPlan({ balance, apr, percent = MINIMUM_DEFAULTS.percent, floor = MINIMUM_DEFAULTS.floor }) {
    validate(balance, apr);
    if (!(percent > 0) || !(floor >= 0)) throw new Error(t('Check the minimum payment settings.'));
    return simulate(balance, apr, (b, interest) => Math.max(floor, (b * percent) / 100 + interest));
}

/** Balance at the start and at the end of every year (for the chart). */
export function yearlyBalances(balances) {
    const years = balances.filter((_, i) => i % 12 === 0);
    if ((balances.length - 1) % 12 !== 0) years.push(balances.at(-1));
    return years;
}
