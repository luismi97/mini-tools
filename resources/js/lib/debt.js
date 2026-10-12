/**
 * Debt payoff planner: avalanche vs. snowball (pure, unit-tested).
 *
 * Each month: interest accrues, every debt receives its minimum payment, and the
 * rest of the monthly budget (extra + minimums freed by paid-off debts) goes to
 * the target debt — highest APR first (avalanche) or smallest balance first (snowball).
 */

import { t } from './i18n.js';

export const MAX_MONTHS = 600;

const round2 = (v) => Math.round((v + Number.EPSILON) * 100) / 100;

/**
 * @param {Array<{name: string, balance: number, apr: number, minPayment: number}>} debts
 * @param {{strategy?: 'avalanche'|'snowball'|'minimum', extra?: number}} options
 *        "minimum" pays only minimums, with no extra and no rollover
 */
export function payoffPlan(debts, { strategy = 'avalanche', extra = 0 } = {}) {
    const list = debts
        .map((d, i) => ({
            id: i,
            name: d.name || t('Debt :n', { n: i + 1 }),
            balance: Number(d.balance),
            apr: Number(d.apr),
            minPayment: Number(d.minPayment),
        }))
        .filter((d) => d.balance > 0);

    if (list.length === 0) throw new Error(t('Add at least one debt with a balance.'));
    for (const d of list) {
        if (!(d.apr >= 0) || !(d.minPayment > 0)) throw new Error(t('Check the interest rate and minimum payment of ":name".', { name: d.name }));
    }

    const state = list.map((d) => ({ ...d, interestPaid: 0, paidOffMonth: null }));
    const rollover = strategy !== 'minimum';
    const budget = list.reduce((s, d) => s + d.minPayment, 0) + (rollover ? Math.max(0, Number(extra) || 0) : 0);

    let month = 0;
    let totalInterest = 0;
    let totalPaid = 0;

    while (state.some((d) => d.balance > 0) && month < MAX_MONTHS) {
        month++;
        const active = state.filter((d) => d.balance > 0);
        let interestThisMonth = 0;

        for (const d of active) {
            const interest = (d.balance * d.apr) / 100 / 12;
            d.balance += interest;
            d.interestPaid += interest;
            interestThisMonth += interest;
        }
        totalInterest += interestThisMonth;

        let available = rollover ? budget : active.reduce((s, d) => s + d.minPayment, 0);
        if (month === 1 && available <= interestThisMonth) {
            throw new Error(t('Your payments do not cover the monthly interest, so the debt would never be paid off. Increase the payments.'));
        }

        for (const d of active) {
            const pay = Math.min(d.minPayment, d.balance);
            d.balance -= pay;
            available -= pay;
            totalPaid += pay;
        }

        if (rollover) {
            const order = active
                .filter((d) => d.balance > 0)
                .sort((a, b) => (strategy === 'snowball' ? a.balance - b.balance || b.apr - a.apr : b.apr - a.apr || a.balance - b.balance));
            for (const d of order) {
                if (available <= 0) break;
                const pay = Math.min(available, d.balance);
                d.balance -= pay;
                available -= pay;
                totalPaid += pay;
            }
        }

        for (const d of active) {
            if (d.balance <= 0.005) {
                d.balance = 0;
                d.paidOffMonth ??= month;
            }
        }
    }

    if (state.some((d) => d.balance > 0)) {
        throw new Error(t('These payments would take more than :years years. Increase the payments.', { years: MAX_MONTHS / 12 }));
    }

    return {
        strategy,
        months: month,
        totalInterest: round2(totalInterest),
        totalPaid: round2(totalPaid),
        monthlyBudget: round2(budget),
        debts: state
            .map((d) => ({ name: d.name, paidOffMonth: d.paidOffMonth, interestPaid: round2(d.interestPaid) }))
            .sort((a, b) => a.paidOffMonth - b.paidOffMonth),
    };
}
