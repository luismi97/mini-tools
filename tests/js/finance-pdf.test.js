import { test } from 'node:test';
import assert from 'node:assert/strict';
import { calculateLoan, extraSavings, paymentDate, validateLoan } from '../../resources/js/lib/loan.js';
import { calculateMortgage } from '../../resources/js/lib/mortgage.js';
import { balanceChart, linePath, niceMax } from '../../resources/js/lib/chart.js';
import { decodeState, encodeState } from '../../resources/js/lib/share-state.js';
import { minimumPaymentPlan, paymentForMonths, payoffWithPayment, yearlyBalances } from '../../resources/js/lib/credit-card.js';
import { analyzeOffer, compareLoans, effectiveApr } from '../../resources/js/lib/loan-compare.js';
import { formatPageNumber, pageNumberPosition } from '../../resources/js/lib/page-numbers.js';
import { numbersToRanges, parsePageRanges, rangesToIndexes } from '../../resources/js/lib/page-ranges.js';

test('extra payments shorten the loan and save interest', () => {
    const input = { amount: 200000, annualRate: 6, termYears: 30, frequency: 'monthly' };
    const base = calculateLoan(input);
    const extra = calculateLoan({ ...input, extra: 200 });
    assert.equal(extra.payment, base.payment, 'scheduled payment is unchanged');
    assert.equal(extra.schedule[0].payment, round(base.payment + 200));
    assert.ok(extra.periods < 260 && extra.periods > 240, `periods ${extra.periods}`);
    assert.equal(extra.schedule.at(-1).balance, 0);
    const principal = extra.schedule.reduce((s, r) => s + r.principal, 0);
    assert.ok(Math.abs(principal - 200000) < 0.01);
    const savings = extraSavings(base, extra);
    // $200k @ 6% / 30y + $200/month extra saves about $79.8k and ~9 years.
    assert.ok(Math.abs(savings.interestSaved - 79800) < 500, `saved ${savings.interestSaved}`);
    assert.equal(savings.periodsSaved, base.periods - extra.periods);
    assert.ok(validateLoan({ ...input, extra: -5 }).extra);
    assert.deepEqual(validateLoan({ ...input, extra: 0 }), {});
});

const round = (v) => Math.round(v * 100) / 100;

test('payment dates step by month, two weeks or a week', () => {
    const first = new Date(Date.UTC(2026, 0, 31));
    assert.equal(paymentDate(first, 1, 'monthly').toISOString().slice(0, 10), '2026-01-31');
    assert.equal(paymentDate(first, 2, 'monthly').toISOString().slice(0, 10), '2026-02-28');
    assert.equal(paymentDate(first, 13, 'monthly').toISOString().slice(0, 10), '2027-01-31');
    assert.equal(paymentDate(first, 3, 'biweekly').toISOString().slice(0, 10), '2026-02-28');
    assert.equal(paymentDate(first, 2, 'weekly').toISOString().slice(0, 10), '2026-02-07');
});

test('mortgage extra payment reports savings and keeps the base schedule', () => {
    const input = { homePrice: 400000, downPayment: 20, termYears: 30, annualRate: 6.5 };
    const plain = calculateMortgage(input);
    assert.equal(plain.interestSaved, 0);
    assert.equal(plain.periodsSaved, 0);
    const extra = calculateMortgage({ ...input, extraPayment: 300 });
    assert.equal(extra.principalAndInterest, plain.principalAndInterest);
    assert.equal(extra.monthlyTotal, round(plain.monthlyTotal + 300));
    assert.ok(extra.months < plain.months);
    assert.ok(extra.interestSaved > 0);
    assert.equal(extra.baseMonths, plain.months);
    assert.equal(extra.baseYearly.length, 30);
    assert.throws(() => calculateMortgage({ ...input, extraPayment: -1 }));
});

test('chart geometry', () => {
    assert.equal(niceMax(0), 1);
    assert.equal(niceMax(87000), 100000);
    assert.equal(niceMax(180000), 200000);
    assert.equal(niceMax(230000), 250000);
    assert.equal(niceMax(410000), 500000);
    assert.equal(linePath([10, 0], 2, 10, { width: 100, height: 50, pad: 0 }), 'M0 0 L100 50');
    const chart = balanceChart([100, 50, 0], [100, 80, 60, 30, 0]);
    assert.equal(chart.years, 4);
    assert.equal(chart.yMax, 100);
    assert.match(chart.area, /Z$/);
    assert.ok(chart.compare.startsWith('M'));
    assert.equal(balanceChart([5, 0]).compare, '');
});

test('share state round-trips typed values and ignores junk', () => {
    const defaults = { amount: 25000, rate: 6.5, frequency: 'monthly', taxed: false };
    const hash = encodeState({ amount: 30000, rate: 7.25, frequency: 'weekly', taxed: true, secret: 'x' }, defaults);
    assert.equal(hash, 'amount=30000&rate=7.25&frequency=weekly&taxed=true');
    assert.deepEqual(decodeState(`#${hash}`, defaults), { amount: 30000, rate: 7.25, frequency: 'weekly', taxed: true });
    assert.deepEqual(decodeState('#amount=abc&rate=&frequency=daily&other=1', defaults, { frequency: ['monthly', 'weekly'] }), {});
    assert.deepEqual(decodeState('', defaults), {});
});

test('credit card payoff with a fixed payment', () => {
    // $5,000 at 20% APR paying $200/month → n = -ln(1 - rB/P) / ln(1 + r) = 32.6 → 33 payments, ~$1,520 interest.
    const plan = payoffWithPayment({ balance: 5000, apr: 20, payment: 200 });
    assert.equal(plan.months, 33);
    assert.ok(Math.abs(plan.totalInterest - 1520) < 15, `interest ${plan.totalInterest}`);
    assert.equal(plan.balances[0], 5000);
    assert.equal(plan.balances.at(-1), 0);
    assert.ok(Math.abs(plan.totalPaid - (5000 + plan.totalInterest)) < 0.02);
    assert.throws(() => payoffWithPayment({ balance: 5000, apr: 20, payment: 80 }), /never be paid off/);
});

test('credit card payment needed for a target date', () => {
    const payment = paymentForMonths({ balance: 5000, apr: 20, months: 24 });
    assert.equal(payment, 254.48);
    assert.ok(payoffWithPayment({ balance: 5000, apr: 20, payment }).months <= 24);
    assert.equal(paymentForMonths({ balance: 1200, apr: 0, months: 12 }), 100);
    assert.throws(() => paymentForMonths({ balance: 1000, apr: 10, months: 0 }));
});

test('minimum payments take far longer', () => {
    const minimum = minimumPaymentPlan({ balance: 5000, apr: 20 });
    assert.equal(minimum.firstPayment, round(5000 * 0.01 + round(5000 * 0.2 / 12)));
    assert.ok(minimum.months > 150, `months ${minimum.months}`);
    assert.ok(minimum.totalInterest > 4000);
    const years = yearlyBalances(minimum.balances);
    assert.equal(years[0], 5000);
    assert.equal(years.at(-1), 0);
});

test('loan comparison: fees raise the effective APR and the cheapest offer is flagged', () => {
    assert.equal(effectiveApr(10000, Array(12).fill(1000)), effectiveApr(10000, Array(12).fill(1000)));
    const noFees = analyzeOffer({ amount: 10000, apr: 6, months: 36 });
    assert.equal(noFees.payment, 304.22);
    assert.equal(noFees.effectiveApr, 6);
    const withFees = analyzeOffer({ amount: 10000, apr: 6, months: 36, fees: 300 });
    assert.ok(withFees.effectiveApr > 7.9 && withFees.effectiveApr < 8.2, `effective ${withFees.effectiveApr}`);
    assert.equal(withFees.totalCost, round(noFees.totalInterest + 300));

    const [a, b, c] = compareLoans([
        { amount: 10000, apr: 6, months: 36, fees: 300 },
        { amount: 10000, apr: 7, months: 36 },
        { amount: 0, apr: 7, months: 36 },
    ]);
    assert.equal(a.cheapest, false);
    assert.equal(b.cheapest, true);
    assert.equal(a.lowestPayment, true);
    assert.equal(c.ok, false);
    assert.ok(c.error);
});

test('page number text and placement, including rotated pages', () => {
    assert.equal(formatPageNumber('n', 3, 10), '3');
    assert.equal(formatPageNumber('n-of-total', 3, 10), '3 / 10');
    assert.equal(formatPageNumber('page-n-of-total', 3, 10), 'Page 3 of 10');

    const box = { x: 0, y: 0, width: 600, height: 800 };
    const base = { box, textWidth: 20, fontSize: 10, margin: 30 };
    assert.deepEqual(pageNumberPosition({ ...base, position: 'bottom-center' }), { x: 290, y: 30, rotate: 0 });
    assert.deepEqual(pageNumberPosition({ ...base, position: 'top-right' }), { x: 550, y: 760, rotate: 0 });
    // Displayed 800 wide × 600 high; bottom-center of the view is the right edge of the unrotated page.
    assert.deepEqual(pageNumberPosition({ ...base, rotation: 90, position: 'bottom-center' }), { x: 570, y: 390, rotate: 90 });
    assert.deepEqual(pageNumberPosition({ ...base, rotation: 180, position: 'bottom-left' }), { x: 570, y: 770, rotate: 180 });
    assert.deepEqual(pageNumberPosition({ ...base, rotation: 270, position: 'bottom-left' }), { x: 30, y: 770, rotate: 270 });
    assert.deepEqual(pageNumberPosition({ ...base, box: { ...box, x: 10, y: 20 }, position: 'bottom-left' }), { x: 40, y: 50, rotate: 0 });
});

test('page numbers compact back into ranges', () => {
    assert.equal(numbersToRanges([9, 1, 2, 3, 5, 8, 2]), '1-3, 5, 8-9');
    assert.equal(numbersToRanges([]), '');
    assert.equal(numbersToRanges([4]), '4');
    const text = numbersToRanges([1, 2, 4]);
    assert.deepEqual(rangesToIndexes(parsePageRanges(text, 5)), [0, 1, 3]);
});
