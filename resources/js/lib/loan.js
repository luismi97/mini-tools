/**
 * Loan amortization math (pure, unit-tested with node --test).
 * Payments are rounded to cents; the final payment absorbs the rounding
 * difference so the balance ends at exactly zero.
 */
import { t } from './i18n.js';

// `summary` is a whole sentence per frequency (not "every :period") so each language
// can phrase it naturally ("monatlich", "tous les mois"…).
export const FREQUENCIES = {
    monthly: { label: 'Monthly', perYear: 12, summary: ':count payments, every month' },
    biweekly: { label: 'Biweekly', perYear: 26, summary: ':count payments, every two weeks' },
    weekly: { label: 'Weekly', perYear: 52, summary: ':count payments, every week' },
};

export const LIMITS = {
    maxAmount: 1_000_000_000,
    maxRate: 100,
    maxYears: 50,
};

const round2 = (value) => Math.round((value + Number.EPSILON) * 100) / 100;

/**
 * @param {{amount: number, annualRate: number, termYears: number, frequency: keyof FREQUENCIES}} input
 * @returns {{errors: Record<string, string>}} | result
 */
export function validateLoan({ amount, annualRate, termYears, frequency, extra = 0 }) {
    const errors = {};
    if (!Number.isFinite(extra) || extra < 0) errors.extra = t('Enter an extra payment of 0 or more.');
    if (!Number.isFinite(amount) || amount <= 0) errors.amount = t('Enter a loan amount greater than 0.');
    else if (amount > LIMITS.maxAmount) errors.amount = t('Loan amount is too large.');
    if (!Number.isFinite(annualRate) || annualRate < 0) errors.rate = t('Enter an interest rate of 0 or more.');
    else if (annualRate > LIMITS.maxRate) errors.rate = t('Interest rate must be :max% or less.', { max: LIMITS.maxRate });
    if (!Number.isFinite(termYears) || termYears <= 0) errors.term = t('Enter a loan term greater than 0.');
    else if (termYears > LIMITS.maxYears) errors.term = t('Loan term must be :max years or less.', { max: LIMITS.maxYears });
    if (!FREQUENCIES[frequency]) errors.frequency = t('Choose a payment frequency.');
    return errors;
}

/**
 * @param {{amount: number, annualRate: number, termYears: number, frequency: keyof FREQUENCIES, extra?: number}} input
 *        extra: additional principal paid with every payment (shortens the loan)
 */
export function calculateLoan({ amount, annualRate, termYears, frequency, extra = 0 }) {
    const { perYear } = FREQUENCIES[frequency];
    const periods = Math.max(1, Math.round(termYears * perYear));
    const rate = annualRate / 100 / perYear;
    const additional = Number.isFinite(extra) && extra > 0 ? extra : 0;

    const payment = round2(rate === 0 ? amount / periods : (amount * rate) / (1 - (1 + rate) ** -periods));

    const schedule = [];
    let balance = amount;
    let totalPaid = 0;
    let totalInterest = 0;

    for (let period = 1; period <= periods; period++) {
        const interest = round2(balance * rate);
        let principal = round2(payment - interest + additional);
        if (period === periods || principal > balance) principal = round2(balance);
        const paid = round2(principal + interest);
        balance = round2(balance - principal);

        totalPaid += paid;
        totalInterest += interest;
        schedule.push({ period, payment: paid, principal, interest, balance });

        if (balance <= 0) break;
    }

    return {
        payment,
        periods: schedule.length,
        perYear,
        totalPaid: round2(totalPaid),
        totalInterest: round2(totalInterest),
        schedule,
    };
}

/**
 * Date of payment number `period` (1-based) when the first payment is on `first`.
 * Monthly payments keep the day of month (clamped to short months); biweekly and
 * weekly payments step by 14 and 7 days. Works in UTC.
 * @param {Date} first
 */
export function paymentDate(first, period, frequency) {
    const steps = period - 1;
    if (frequency === 'monthly') {
        const total = first.getUTCMonth() + steps;
        const year = first.getUTCFullYear() + Math.floor(total / 12);
        const month = ((total % 12) + 12) % 12;
        const last = new Date(Date.UTC(year, month + 1, 0)).getUTCDate();
        return new Date(Date.UTC(year, month, Math.min(first.getUTCDate(), last)));
    }
    const days = frequency === 'biweekly' ? 14 : 7;
    return new Date(first.getTime() + steps * days * 86_400_000);
}

/**
 * Savings from paying extra: compares a schedule with extra payments against the plain one.
 * @returns {{interestSaved: number, periodsSaved: number}}
 */
export function extraSavings(base, withExtra) {
    return {
        interestSaved: round2(Math.max(0, base.totalInterest - withExtra.totalInterest)),
        periodsSaved: Math.max(0, base.periods - withExtra.periods),
    };
}

/**
 * Group a schedule into years of payments.
 */
export function yearlySummary(schedule, perYear) {
    const years = [];
    for (let i = 0; i < schedule.length; i += perYear) {
        const rows = schedule.slice(i, i + perYear);
        years.push({
            year: years.length + 1,
            payment: round2(rows.reduce((s, r) => s + r.payment, 0)),
            principal: round2(rows.reduce((s, r) => s + r.principal, 0)),
            interest: round2(rows.reduce((s, r) => s + r.interest, 0)),
            balance: rows[rows.length - 1].balance,
        });
    }
    return years;
}

export function scheduleToCsv(schedule) {
    const lines = [['Payment #', 'Payment', 'Principal', 'Interest', 'Balance'].map((h) => t(h)).join(',')];
    for (const r of schedule) {
        lines.push([r.period, r.payment, r.principal, r.interest, r.balance].map((v, i) => (i === 0 ? v : v.toFixed(2))).join(','));
    }
    return lines.join('\r\n');
}
