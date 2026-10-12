/**
 * Auto loan: price, down payment, trade-in, sales tax and fees (pure, unit-tested).
 * Monthly payments reuse the loan amortization engine.
 */
import { calculateLoan } from './loan.js';
import { t } from './i18n.js';

const round2 = (v) => Math.round((v + Number.EPSILON) * 100) / 100;

/**
 * @param {{price: number, downPayment?: number, tradeIn?: number, tradeInOwed?: number, salesTaxRate?: number,
 *          fees?: number, annualRate: number, months: number, taxAfterTradeIn?: boolean}} input
 *        taxAfterTradeIn: most US states tax only the price minus the trade-in value
 */
export function calculateAutoLoan({ price, downPayment = 0, tradeIn = 0, tradeInOwed = 0, salesTaxRate = 0, fees = 0, annualRate, months, taxAfterTradeIn = true }) {
    if (!(price > 0)) throw new Error(t('Enter the vehicle price.'));
    if (!(months >= 6 && months <= 120)) throw new Error(t('Enter a loan term between 6 and 120 months.'));
    if (!(annualRate >= 0 && annualRate <= 40)) throw new Error(t('Enter an interest rate between 0% and 40%.'));

    const taxable = taxAfterTradeIn ? Math.max(0, price - tradeIn) : price;
    const salesTax = (taxable * salesTaxRate) / 100;
    const netTradeIn = tradeIn - tradeInOwed;
    const amount = price + salesTax + fees - downPayment - netTradeIn;

    if (amount <= 0) throw new Error(t('Your down payment and trade-in already cover the full price — no loan is needed.'));

    const loan = calculateLoan({ amount, annualRate, termYears: months / 12, frequency: 'monthly' });

    return {
        amountFinanced: round2(amount),
        salesTax: round2(salesTax),
        monthlyPayment: loan.payment,
        totalInterest: loan.totalInterest,
        totalOfPayments: loan.totalPaid,
        totalCost: round2(loan.totalPaid + downPayment + Math.max(0, netTradeIn)),
        months: loan.periods,
    };
}
