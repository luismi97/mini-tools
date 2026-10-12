/**
 * Compound interest with optional regular contributions (pure, unit-tested).
 *
 * Simulated month by month using the effective monthly rate implied by the
 * compounding frequency, so any compounding frequency can be combined with
 * monthly or yearly contributions. Contributions are made at the end of each period.
 */

export const COMPOUNDING = {
    1: 'Annually',
    2: 'Semi-annually',
    4: 'Quarterly',
    12: 'Monthly',
    365: 'Daily',
};

const round2 = (v) => Math.round((v + Number.EPSILON) * 100) / 100;

/**
 * @param {{principal: number, annualRate: number, years: number, compoundsPerYear: number,
 *          contribution?: number, contributionFrequency?: 'monthly'|'yearly'}} input
 */
export function compoundInterest({ principal, annualRate, years, compoundsPerYear, contribution = 0, contributionFrequency = 'monthly' }) {
    const n = Number(compoundsPerYear) || 12;
    const monthlyRate = (1 + annualRate / 100 / n) ** (n / 12) - 1;
    const months = Math.round(years * 12);

    let balance = principal;
    let contributed = principal;
    const yearly = [];
    let yearStart = { contributed, interest: 0 };
    let interestTotal = 0;

    for (let m = 1; m <= months; m++) {
        const interest = balance * monthlyRate;
        balance += interest;
        interestTotal += interest;

        const contributes = contributionFrequency === 'yearly' ? m % 12 === 0 : true;
        if (contribution && contributes) {
            balance += contribution;
            contributed += contribution;
        }

        if (m % 12 === 0 || m === months) {
            yearly.push({
                year: Math.ceil(m / 12),
                contributions: round2(contributed - yearStart.contributed),
                interest: round2(interestTotal - yearStart.interest),
                totalContributions: round2(contributed),
                totalInterest: round2(interestTotal),
                balance: round2(balance),
            });
            yearStart = { contributed, interest: interestTotal };
        }
    }

    return {
        futureValue: round2(balance),
        totalContributions: round2(contributed),
        totalInterest: round2(interestTotal),
        yearly,
    };
}
