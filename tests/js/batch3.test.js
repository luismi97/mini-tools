import { test } from 'node:test';
import assert from 'node:assert/strict';
import { CATEGORIES, convertUnit, formatUnitValue } from '../../resources/js/lib/units.js';
import { addToDate, dateDifference, toIso } from '../../resources/js/lib/dates.js';
import { parseDate } from '../../resources/js/lib/age.js';
import { calculateMortgage } from '../../resources/js/lib/mortgage.js';
import { payoffPlan } from '../../resources/js/lib/debt.js';
import { svgSize } from '../../resources/js/lib/image.js';

test('svg intrinsic size from attributes or viewBox', () => {
    assert.deepEqual(svgSize('<svg width="120" height="80"></svg>'), { width: 120, height: 80 });
    assert.deepEqual(svgSize('<svg viewBox="0 0 24 12"></svg>'), { width: 24, height: 12 });
    assert.deepEqual(svgSize('<svg width="48px" viewBox="0 0 24 12"></svg>'), { width: 48, height: 24 });
    assert.deepEqual(svgSize("<?xml version='1.0'?><svg xmlns='http://www.w3.org/2000/svg' width='100%' viewBox='0,0,10,20'></svg>"), { width: 10, height: 20 });
    assert.deepEqual(svgSize('<svg></svg>'), { width: 300, height: 150 });
});

const close = (a, b, eps = 1e-9) => assert.ok(Math.abs(a - b) <= eps * Math.max(1, Math.abs(b)), `${a} ≈ ${b}`);

test('unit conversions', () => {
    close(convertUnit(1, 'mi', 'km', 'length'), 1.609344);
    close(convertUnit(12, 'in', 'ft', 'length'), 1);
    close(convertUnit(1, 'kg', 'lb', 'weight'), 2.2046226218);
    close(convertUnit(100, 'c', 'f', 'temperature'), 212);
    close(convertUnit(32, 'f', 'c', 'temperature'), 0);
    close(convertUnit(0, 'k', 'c', 'temperature'), -273.15);
    close(convertUnit(1, 'cup', 'tbsp', 'volume'), 16);
    close(convertUnit(3, 'tsp', 'tbsp', 'volume'), 1);
    close(convertUnit(1, 'ac', 'ft2', 'area'), 43560);
    close(convertUnit(100, 'kph', 'mph', 'speed'), 62.137119224);
    close(convertUnit(1, 'GiB', 'MB', 'data'), 1073.741824);
    close(convertUnit(1, 'd', 'h', 'time'), 24);
    assert.ok(Number.isNaN(convertUnit(1, 'kg', 'km', 'length')));
    // Every non-temperature unit converts to itself and round-trips.
    for (const [category, cat] of Object.entries(CATEGORIES)) {
        for (const unit of Object.keys(cat.units)) close(convertUnit(convertUnit(7, unit, Object.keys(cat.units)[0], category), Object.keys(cat.units)[0], unit, category), 7);
    }
    assert.equal(formatUnitValue(1609.344), '1,609.344');
    assert.equal(formatUnitValue(1e-9), '1e-9');
    assert.equal(formatUnitValue(0.1 + 0.2), '0.3');
});

test('date difference with business days', () => {
    // Mon 2026-10-05 → Mon 2026-10-19: 14 days, 10 business days.
    const d = dateDifference(parseDate('2026-10-05'), parseDate('2026-10-19'));
    assert.equal(d.days, 14);
    assert.equal(d.weeks, 2);
    assert.equal(d.businessDays, 10);
    assert.equal(d.weekendDays, 4);
    const incl = dateDifference(parseDate('2026-10-05'), parseDate('2026-10-19'), { includeEnd: true });
    assert.equal(incl.days, 15);
    assert.equal(incl.businessDays, 11);
    const back = dateDifference(parseDate('2026-12-25'), parseDate('2026-01-01'));
    assert.equal(back.direction, 'backward');
    assert.equal(back.days, 358);
    assert.deepEqual([back.months, back.monthDays], [11, 24]);
});

test('add and subtract periods', () => {
    assert.equal(toIso(addToDate(parseDate('2026-01-31'), { months: 1 }).date), '2026-02-28');
    assert.equal(toIso(addToDate(parseDate('2026-10-06'), { days: 90 }).date), '2027-01-04');
    assert.equal(toIso(addToDate(parseDate('2026-10-06'), { years: 1, weeks: 2 }).date), '2027-10-20');
    assert.equal(toIso(addToDate(parseDate('2026-10-06'), { days: 30, subtract: true }).date), '2026-09-06');
    // Friday + 1 business day = Monday; Monday - 1 business day = Friday.
    assert.equal(toIso(addToDate(parseDate('2026-10-09'), { days: 1, businessDays: true }).date), '2026-10-12');
    assert.equal(toIso(addToDate(parseDate('2026-10-12'), { days: 1, businessDays: true, subtract: true }).date), '2026-10-09');
    assert.equal(addToDate(parseDate('2026-10-06'), { days: 0 }).weekday, 'Tuesday');
});

test('mortgage payment, PMI and totals', () => {
    // $400k home, 20% down, 6.5%, 30 years → P&I on $320k = $2,022.62 (standard reference value).
    const m = calculateMortgage({ homePrice: 400000, downPayment: 20, termYears: 30, annualRate: 6.5, propertyTaxRate: 1.2, insurance: 1800, hoa: 50 });
    assert.equal(m.loanAmount, 320000);
    assert.equal(m.principalAndInterest, 2022.62);
    assert.equal(m.tax, 400);
    assert.equal(m.insurance, 150);
    assert.equal(m.pmi, 0);
    assert.equal(m.monthlyTotal, 2622.62);
    assert.equal(m.yearly.length, 30);

    const pmi = calculateMortgage({ homePrice: 300000, downPayment: 15000, downPaymentType: 'amount', termYears: 30, annualRate: 6, pmiRate: 0.5 });
    assert.equal(pmi.downPercent, 5);
    assert.equal(pmi.pmi, 118.75);
    assert.ok(pmi.pmiMonths > 100 && pmi.pmiMonths < 160, `PMI months ${pmi.pmiMonths}`);
    assert.throws(() => calculateMortgage({ homePrice: 100, downPayment: 100, termYears: 30, annualRate: 5 }), /less than the home price/);
});

test('debt payoff: avalanche saves interest, snowball clears small debts first', () => {
    const debts = [
        { name: 'Card A', balance: 5000, apr: 24, minPayment: 150 },
        { name: 'Card B', balance: 1000, apr: 12, minPayment: 50 },
        { name: 'Car', balance: 8000, apr: 6, minPayment: 250 },
    ];
    const avalanche = payoffPlan(debts, { strategy: 'avalanche', extra: 200 });
    const snowball = payoffPlan(debts, { strategy: 'snowball', extra: 200 });
    const minimum = payoffPlan(debts, { strategy: 'minimum' });

    assert.ok(avalanche.totalInterest <= snowball.totalInterest);
    assert.equal(snowball.debts[0].name, 'Card B');
    assert.equal(avalanche.debts[0].name, 'Card A');
    assert.ok(minimum.months > avalanche.months);
    assert.ok(minimum.totalInterest > avalanche.totalInterest);

    const single = payoffPlan([{ balance: 1000, apr: 12, minPayment: 100 }]);
    assert.equal(single.months, 11);
    assert.ok(single.totalInterest > 50 && single.totalInterest < 60, `${single.totalInterest}`);

    assert.throws(() => payoffPlan([{ balance: 10000, apr: 24, minPayment: 100 }]), /never be paid off/);
    assert.throws(() => payoffPlan([]), /at least one debt/);
});
