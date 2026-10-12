import { test } from 'node:test';
import assert from 'node:assert/strict';
import { calculateLoan, scheduleToCsv, validateLoan, yearlySummary } from '../../resources/js/lib/loan.js';

test('monthly payment matches the standard amortization formula', () => {
    // $200,000 at 6% for 30 years -> $1,199.10 per month (well-known reference value).
    const result = calculateLoan({ amount: 200000, annualRate: 6, termYears: 30, frequency: 'monthly' });
    assert.equal(result.payment, 1199.1);
    assert.equal(result.periods, 360);
    assert.equal(result.schedule.at(-1).balance, 0);
    assert.ok(Math.abs(result.totalInterest - 231676.38) < 5, `total interest ${result.totalInterest}`);
});

test('principal payments sum to the loan amount', () => {
    for (const frequency of ['monthly', 'biweekly', 'weekly']) {
        const { schedule, totalPaid, totalInterest } = calculateLoan({ amount: 25000, annualRate: 7.5, termYears: 5, frequency });
        const principal = schedule.reduce((s, r) => s + r.principal, 0);
        assert.ok(Math.abs(principal - 25000) < 0.01, `${frequency}: ${principal}`);
        assert.ok(Math.abs(totalPaid - (25000 + totalInterest)) < 0.01);
    }
});

test('payment counts per frequency', () => {
    const base = { amount: 10000, annualRate: 5, termYears: 2 };
    assert.equal(calculateLoan({ ...base, frequency: 'monthly' }).periods, 24);
    assert.equal(calculateLoan({ ...base, frequency: 'biweekly' }).periods, 52);
    assert.equal(calculateLoan({ ...base, frequency: 'weekly' }).periods, 104);
});

test('zero interest splits the amount evenly', () => {
    const result = calculateLoan({ amount: 1200, annualRate: 0, termYears: 1, frequency: 'monthly' });
    assert.equal(result.payment, 100);
    assert.equal(result.totalInterest, 0);
    assert.equal(result.totalPaid, 1200);
});

test('validation catches bad input', () => {
    assert.deepEqual(validateLoan({ amount: 1000, annualRate: 5, termYears: 3, frequency: 'monthly' }), {});
    const errors = validateLoan({ amount: 0, annualRate: -1, termYears: 0, frequency: 'daily' });
    assert.deepEqual(Object.keys(errors).sort(), ['amount', 'frequency', 'rate', 'term']);
    assert.ok(validateLoan({ amount: NaN, annualRate: 5, termYears: 3, frequency: 'monthly' }).amount);
});

test('yearly summary and CSV export', () => {
    const { schedule, perYear } = calculateLoan({ amount: 12000, annualRate: 4, termYears: 2, frequency: 'monthly' });
    const years = yearlySummary(schedule, perYear);
    assert.equal(years.length, 2);
    assert.equal(years[1].balance, 0);
    const csv = scheduleToCsv(schedule).split('\r\n');
    assert.equal(csv[0], 'Payment #,Payment,Principal,Interest,Balance');
    assert.equal(csv.length, 25);
});
