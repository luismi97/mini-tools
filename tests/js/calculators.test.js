import { test } from 'node:test';
import assert from 'node:assert/strict';
import { applyPercent, calculateTip, convertSalary, percentChange, percentOf, whatPercent } from '../../resources/js/lib/calculators.js';
import { calculateAge, parseDate } from '../../resources/js/lib/age.js';
import { compoundInterest } from '../../resources/js/lib/compound.js';
import { parsePageRanges, rangesToIndexes } from '../../resources/js/lib/page-ranges.js';
import { centeredRect, clampRect, computeResize, dragRect } from '../../resources/js/lib/resize.js';

test('percentage calculations', () => {
    assert.equal(percentOf(15, 200), 30);
    assert.equal(whatPercent(30, 200), 15);
    assert.equal(whatPercent(1, 0), null);
    assert.equal(percentChange(80, 100), 25);
    assert.equal(percentChange(-50, -25), 50);
    assert.equal(percentChange(0, 5), null);
    assert.equal(applyPercent(200, -10), 180);
});

test('tip split and rounding', () => {
    assert.deepEqual(calculateTip({ bill: 100, tipPercent: 18, people: 4 }), { tip: 18, total: 118, perPerson: 29.5, tipPerPerson: 4.5 });
    const rounded = calculateTip({ bill: 100, tipPercent: 18, people: 4, roundUp: true });
    assert.equal(rounded.perPerson, 30);
    assert.equal(rounded.total, 120);
    assert.equal(rounded.tip, 20);
    assert.equal(calculateTip({ bill: 50, tipPercent: 10, people: 0 }).perPerson, 55);
});

test('salary conversion', () => {
    const r = convertSalary(25, 'hourly');
    assert.equal(r.annual, 52000);
    assert.equal(r.monthly, 4333.33);
    assert.equal(r.weekly, 1000);
    assert.equal(r.daily, 200);
    assert.equal(convertSalary(60000, 'annual', { hoursPerWeek: 37.5 }).hourly, 30.77);
});

test('age calculation including leap years', () => {
    const age = calculateAge(parseDate('1990-08-25'), parseDate('2026-10-06'));
    assert.deepEqual([age.years, age.months, age.days], [36, 1, 11]);
    assert.equal(age.nextBirthday.daysUntil, 323);
    assert.equal(age.nextBirthday.turning, 37);

    const leap = calculateAge(parseDate('2000-02-29'), parseDate('2023-02-28'));
    assert.equal(leap.years, 23); // Feb 28 counts as the birthday in non-leap years
    assert.equal(leap.nextBirthday.daysUntil, 0);

    const endOfMonth = calculateAge(parseDate('2020-01-31'), parseDate('2020-03-01'));
    assert.deepEqual([endOfMonth.years, endOfMonth.months, endOfMonth.days], [0, 1, 1]);

    assert.equal(parseDate('2023-02-29'), null);
    assert.throws(() => calculateAge(parseDate('2030-01-01'), parseDate('2026-01-01')));
});

test('compound interest', () => {
    const annual = compoundInterest({ principal: 1000, annualRate: 5, years: 10, compoundsPerYear: 1 });
    assert.equal(annual.futureValue, 1628.89);
    assert.equal(annual.yearly.length, 10);

    const monthly = compoundInterest({ principal: 10000, annualRate: 7, years: 20, compoundsPerYear: 12, contribution: 200 });
    // FV = 10000(1+r)^240 + 200((1+r)^240-1)/r with r = 0.07/12
    const r = 0.07 / 12;
    const expected = 10000 * (1 + r) ** 240 + (200 * ((1 + r) ** 240 - 1)) / r;
    assert.ok(Math.abs(monthly.futureValue - expected) < 0.05, `${monthly.futureValue} vs ${expected}`);
    assert.equal(monthly.totalContributions, 10000 + 200 * 240);
    assert.ok(Math.abs(monthly.futureValue - monthly.totalContributions - monthly.totalInterest) < 0.02);
});

test('page ranges', () => {
    assert.deepEqual(parsePageRanges('1-3, 5, 8-', 10), [[1, 3], [5, 5], [8, 10]]);
    assert.deepEqual(rangesToIndexes([[1, 2], [4, 4]]), [0, 1, 3]);
    assert.deepEqual(parsePageRanges('-2', 5), [[1, 2]]);
    assert.throws(() => parsePageRanges('12', 10), /only has 10 pages/);
    assert.throws(() => parsePageRanges('5-2', 10), /reversed/);
    assert.throws(() => parsePageRanges('a', 10), /not a valid/);
    assert.throws(() => parsePageRanges('', 10), /at least one/);
});

test('resize and crop math', () => {
    assert.deepEqual(computeResize(4000, 3000, { mode: 'percent', percent: 50 }), { width: 2000, height: 1500 });
    assert.deepEqual(computeResize(4000, 3000, { mode: 'dimensions', width: 1000, keepAspect: true }), { width: 1000, height: 750 });
    assert.deepEqual(computeResize(4000, 3000, { mode: 'dimensions', width: 1000, height: 1000, keepAspect: true }), { width: 1000, height: 750 });
    assert.deepEqual(computeResize(4000, 3000, { mode: 'dimensions', width: 500, height: 500, keepAspect: false }), { width: 500, height: 500 });
    assert.deepEqual(clampRect({ x: -10, y: 950, width: 200, height: 200 }, 1000, 1000), { x: 0, y: 800, width: 200, height: 200 });
    assert.deepEqual(centeredRect(1600, 900, 1), { x: 350, y: 0, width: 900, height: 900 });
});

test('crop dragging: move, free resize and locked ratio', () => {
    const start = { x: 100, y: 100, width: 200, height: 100 };
    assert.deepEqual(dragRect(start, 'move', 1000, -50, 1000, 800), { x: 800, y: 50, width: 200, height: 100 });
    assert.deepEqual(dragRect(start, 'se', 50, 20, 1000, 800), { x: 100, y: 100, width: 250, height: 120 });
    assert.deepEqual(dragRect(start, 'nw', -20, -20, 1000, 800), { x: 80, y: 80, width: 220, height: 120 });
    // 2:1 ratio from the south-east handle: width 300 -> height 150
    assert.deepEqual(dragRect(start, 'se', 100, 0, 1000, 800, 2), { x: 100, y: 100, width: 300, height: 150 });
    // Ratio limited by the bottom edge: max height 700 -> width 1400 capped by image width
    const big = dragRect(start, 'se', 5000, 5000, 1000, 800, 1);
    assert.equal(big.width, big.height);
    assert.ok(big.x + big.width <= 1000 && big.y + big.height <= 800);
});
