/**
 * Compare loan offers side by side (pure, unit-tested). Reuses the amortization
 * engine in loan.js and adds upfront fees and the effective APR they imply.
 */
import { calculateLoan, LIMITS } from './loan.js';
import { t } from './i18n.js';

const round2 = (v) => Math.round((v + Number.EPSILON) * 100) / 100;

/**
 * Annual rate (%) at which the payments are worth exactly what you receive
 * (amount minus upfront fees). Bisection on the monthly rate.
 * @param {number} received
 * @param {number[]} payments monthly payments
 */
export function effectiveApr(received, payments) {
    const total = payments.reduce((s, p) => s + p, 0);
    if (!(received > 0) || total <= received) return 0;
    const presentValue = (rate) => payments.reduce((s, p, i) => s + p / (1 + rate) ** (i + 1), 0);
    let low = 0;
    let high = 1;
    for (let i = 0; i < 100; i++) {
        const mid = (low + high) / 2;
        if (presentValue(mid) > received) low = mid;
        else high = mid;
    }
    return Math.round(((low + high) / 2) * 12 * 100 * 1000) / 1000;
}

/**
 * @param {{name?: string, amount: number, apr: number, months: number, fees?: number}} offer
 */
export function analyzeOffer({ amount, apr, months, fees = 0 }) {
    if (!(amount > 0 && amount <= LIMITS.maxAmount)) throw new Error(t('Enter a loan amount greater than 0.'));
    if (!(apr >= 0 && apr <= LIMITS.maxRate)) throw new Error(t('Enter an interest rate between 0% and 100%.'));
    if (!(Number.isInteger(months) && months >= 1 && months <= LIMITS.maxYears * 12)) {
        throw new Error(t('Enter a term between 1 and :max months.', { max: LIMITS.maxYears * 12 }));
    }
    if (!(fees >= 0 && fees < amount)) throw new Error(t('Fees must be 0 or more and less than the loan amount.'));

    const loan = calculateLoan({ amount, annualRate: apr, termYears: months / 12, frequency: 'monthly' });
    return {
        payment: loan.payment,
        months: loan.periods,
        totalInterest: loan.totalInterest,
        fees: round2(fees),
        totalCost: round2(loan.totalInterest + fees),
        totalPaid: round2(loan.totalPaid + fees),
        effectiveApr: fees > 0 ? effectiveApr(amount - fees, loan.schedule.map((r) => r.payment)) : apr,
    };
}

/**
 * Analyze every offer and flag the cheapest overall and the lowest payment.
 * Offers with invalid input get `{ error }` and are skipped when ranking.
 */
export function compareLoans(offers) {
    const results = offers.map((offer) => {
        try {
            return { ok: true, ...analyzeOffer(offer) };
        } catch (e) {
            return { ok: false, error: e.message };
        }
    });
    const valid = results.filter((r) => r.ok);
    if (valid.length >= 2) {
        const cheapest = Math.min(...valid.map((r) => r.totalCost));
        const lowest = Math.min(...valid.map((r) => r.payment));
        for (const r of valid) {
            r.cheapest = r.totalCost === cheapest;
            r.lowestPayment = r.payment === lowest;
        }
    }
    return results;
}
