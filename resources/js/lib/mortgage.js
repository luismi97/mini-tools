/**
 * Mortgage payment with taxes, insurance, PMI and HOA (pure, unit-tested).
 * Principal & interest reuse the loan amortization engine.
 */
import { calculateLoan, yearlySummary } from './loan.js';
import { t } from './i18n.js';

const round2 = (v) => Math.round((v + Number.EPSILON) * 100) / 100;

/**
 * @param {{homePrice: number, downPayment: number, downPaymentType?: 'amount'|'percent', termYears: number,
 *          annualRate: number, propertyTaxRate?: number, insurance?: number, pmiRate?: number, hoa?: number}} input
 *        propertyTaxRate and pmiRate are annual %, insurance is per year, hoa is per month
 */
export function calculateMortgage({
    homePrice,
    downPayment,
    downPaymentType = 'percent',
    termYears,
    annualRate,
    propertyTaxRate = 0,
    insurance = 0,
    pmiRate = 0,
    hoa = 0,
}) {
    if (!(homePrice > 0)) throw new Error(t('Enter a home price greater than 0.'));
    const down = downPaymentType === 'percent' ? (homePrice * downPayment) / 100 : downPayment;
    if (!(down >= 0)) throw new Error(t('Enter a down payment of 0 or more.'));
    if (down >= homePrice) throw new Error(t('The down payment must be less than the home price.'));
    if (!(termYears > 0 && termYears <= 50)) throw new Error(t('Enter a loan term between 1 and 50 years.'));
    if (!(annualRate >= 0 && annualRate <= 30)) throw new Error(t('Enter an interest rate between 0% and 30%.'));

    const loanAmount = homePrice - down;
    const loan = calculateLoan({ amount: loanAmount, annualRate, termYears, frequency: 'monthly' });

    const tax = (homePrice * propertyTaxRate) / 100 / 12;
    const insuranceMonthly = insurance / 12;
    const downPercent = (down / homePrice) * 100;

    // PMI applies with less than 20% down and is removed when the balance reaches 78% of the price.
    const needsPmi = downPercent < 20 && pmiRate > 0;
    const pmi = needsPmi ? (loanAmount * pmiRate) / 100 / 12 : 0;
    let pmiMonths = 0;
    if (needsPmi) {
        const limit = homePrice * 0.78;
        const index = loan.schedule.findIndex((row) => row.balance <= limit);
        pmiMonths = index === -1 ? loan.periods : index + 1;
    }

    const months = loan.periods;
    const monthlyTotal = loan.payment + tax + insuranceMonthly + pmi + hoa;
    const totalTaxes = tax * months;
    const totalInsurance = insuranceMonthly * months;
    const totalPmi = pmi * pmiMonths;
    const totalHoa = hoa * months;

    return {
        loanAmount: round2(loanAmount),
        downPayment: round2(down),
        downPercent: Math.round(downPercent * 100) / 100,
        principalAndInterest: loan.payment,
        tax: round2(tax),
        insurance: round2(insuranceMonthly),
        pmi: round2(pmi),
        hoa: round2(hoa),
        monthlyTotal: round2(monthlyTotal),
        pmiMonths,
        months,
        totalInterest: loan.totalInterest,
        totalPrincipalAndInterest: loan.totalPaid,
        totalCost: round2(loan.totalPaid + totalTaxes + totalInsurance + totalPmi + totalHoa + down),
        totals: {
            taxes: round2(totalTaxes),
            insurance: round2(totalInsurance),
            pmi: round2(totalPmi),
            hoa: round2(totalHoa),
        },
        yearly: yearlySummary(loan.schedule, 12),
    };
}
