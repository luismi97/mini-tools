import { test } from 'node:test';
import assert from 'node:assert/strict';
import { hashText, md5 } from '../../resources/js/lib/hash.js';
import { dateToTimestamp, parseTimestamp, relativeTime } from '../../resources/js/lib/timestamp.js';
import { contrast, formats, hslToRgb, parseColor, rgbToHsl } from '../../resources/js/lib/color.js';
import { findMatches, replaceAll, segments } from '../../resources/js/lib/regex.js';
import { bmi, calories, dueDate } from '../../resources/js/lib/health.js';
import { calculateAutoLoan } from '../../resources/js/lib/autoloan.js';
import { makeTeams, pickRandom, randomIntegers } from '../../resources/js/lib/random.js';
import { formatCountdown, formatDuration, toMs } from '../../resources/js/lib/timer.js';
import { parseDate } from '../../resources/js/lib/age.js';

test('hash vectors (RFC 1321 / FIPS 180)', async () => {
    const enc = (s) => new TextEncoder().encode(s);
    assert.equal(md5(enc('')), 'd41d8cd98f00b204e9800998ecf8427e');
    assert.equal(md5(enc('abc')), '900150983cd24fb0d6963f7d28e17f72');
    assert.equal(md5(enc('The quick brown fox jumps over the lazy dog')), '9e107d9d372bb6826bd81d3542a419d6');
    assert.equal(md5(enc('a'.repeat(1000))), 'cabe45dcc9ae5b66ba86600cca6b8ba8');
    assert.equal(await hashText('abc', 'sha-1'), 'a9993e364706816aba3e25717850c26c9cd0d89d');
    assert.equal(await hashText('abc', 'sha-256'), 'ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad');
    assert.match(await hashText('abc', 'sha-512'), /^ddaf35a193617aba/);
    assert.equal(await hashText('café', 'md5'), md5(enc('café')));
});

test('unix timestamps', () => {
    const s = parseTimestamp('1767225600');
    assert.equal(s.unit, 'seconds');
    assert.equal(s.date.toISOString(), '2026-01-01T00:00:00.000Z');
    assert.equal(parseTimestamp('1767225600000').unit, 'milliseconds');
    assert.throws(() => parseTimestamp('abc'), /digits/);
    assert.deepEqual(dateToTimestamp('2026-01-01 00:00', 'utc'), { seconds: 1767225600, milliseconds: 1767225600000 });
    assert.equal(relativeTime(new Date(0), 3 * 86400000), '3 days ago');
    assert.equal(relativeTime(new Date(7200000), 0), 'in 2 hours');
});

test('colors and contrast', () => {
    assert.deepEqual(parseColor('#0f766e'), { r: 15, g: 118, b: 110 });
    assert.deepEqual(parseColor('#fff'), { r: 255, g: 255, b: 255 });
    assert.deepEqual(parseColor('rgb(255, 0, 128)'), { r: 255, g: 0, b: 128 });
    assert.deepEqual(parseColor('rgb(10 20 30 / 50%)'), { r: 10, g: 20, b: 30 });
    assert.deepEqual(parseColor('hsl(120, 100%, 50%)'), { r: 0, g: 255, b: 0 });
    assert.equal(parseColor('nope'), null);
    assert.equal(parseColor('rgb(300, 0, 0)'), null);
    assert.deepEqual(rgbToHsl({ r: 255, g: 0, b: 0 }), { h: 0, s: 100, l: 50 });
    assert.deepEqual(hslToRgb(210, 50, 40), { r: 51, g: 102, b: 153 });
    assert.equal(formats({ r: 15, g: 118, b: 110 }).hex, '#0f766e');
    const bw = contrast({ r: 0, g: 0, b: 0 }, { r: 255, g: 255, b: 255 });
    assert.equal(bw.ratio, 21);
    assert.ok(bw.aaaNormal);
    const grey = contrast({ r: 119, g: 119, b: 119 }, { r: 255, g: 255, b: 255 });
    assert.equal(grey.ratio, 4.48);
    assert.equal(grey.aaNormal, false);
    assert.equal(grey.aaLarge, true);
});

test('regex matching, groups and highlighting segments', () => {
    const { matches } = findMatches('(\\w+)@(\\w+)\\.com', 'g', 'a@b.com, c@d.com');
    assert.equal(matches.length, 2);
    assert.deepEqual(matches[1].groups, ['c', 'd']);
    assert.equal(findMatches('a', '', 'aaa').matches.length, 1);
    assert.equal(findMatches('x*', 'g', 'abc').matches.length, 4); // empty matches do not loop forever
    assert.deepEqual(findMatches('(?<year>\\d{4})', 'g', 'in 2026').matches[0].named, { year: '2026' });
    assert.throws(() => findMatches('(', 'g', 'x'));
    assert.equal(replaceAll('(\\d+)', 'g', 'a1 b22', '<$1>'), 'a<1> b<22>');
    assert.deepEqual(segments('hello world', findMatches('o', 'g', 'hello world').matches).map((s) => s.match), [null, 0, null, 1, null]);
});

test('health: BMI, calories and due date', () => {
    const b = bmi(70, 175);
    assert.equal(b.bmi, 22.9);
    assert.equal(b.category, 'Healthy weight');
    assert.equal(bmi(95, 175).category, 'Obesity');
    assert.equal(b.healthyMinKg, 56.7);

    // Mifflin-St Jeor: male, 30 y, 80 kg, 180 cm → BMR 1780.
    const c = calories({ sex: 'male', age: 30, weightKg: 80, heightCm: 180, activity: 'moderate' });
    assert.equal(c.bmr, 1780);
    assert.equal(c.maintain, 2759);
    assert.equal(calories({ sex: 'female', age: 30, weightKg: 80, heightCm: 180, activity: 'sedentary' }).bmr, 1614);

    const d = dueDate(parseDate('2026-01-01'), 28, parseDate('2026-03-12'));
    assert.equal(d.due.toISOString().slice(0, 10), '2026-10-08');
    assert.equal(d.conception.toISOString().slice(0, 10), '2026-01-15');
    assert.deepEqual([d.gestationalWeeks, d.gestationalDays, d.trimester], [10, 0, 1]);
    assert.equal(dueDate(parseDate('2026-01-01'), 35, parseDate('2026-03-12')).due.toISOString().slice(0, 10), '2026-10-15');
    assert.throws(() => dueDate(parseDate('2026-05-01'), 28, parseDate('2026-03-12')), /future/);
});

test('auto loan', () => {
    const r = calculateAutoLoan({ price: 30000, downPayment: 3000, tradeIn: 5000, tradeInOwed: 2000, salesTaxRate: 7, fees: 500, annualRate: 6, months: 60 });
    assert.equal(r.salesTax, 1750); // 7% of (30000 - 5000)
    assert.equal(r.amountFinanced, 26250); // 30000 + 1750 + 500 - 3000 - 3000
    assert.equal(r.monthlyPayment, 507.49); // 26250 × 0.005 / (1 − 1.005^−60) = 507.487
    assert.equal(r.months, 60);
    assert.throws(() => calculateAutoLoan({ price: 1000, downPayment: 2000, annualRate: 5, months: 36 }), /no loan is needed/);
});

test('secure random numbers and picks', () => {
    const nums = randomIntegers({ min: 1, max: 6, count: 1000 });
    assert.ok(nums.every((n) => n >= 1 && n <= 6 && Number.isInteger(n)));
    assert.equal(new Set(nums).size, 6);
    const unique = randomIntegers({ min: 1, max: 10, count: 10, unique: true, sort: 'asc' });
    assert.deepEqual(unique, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
    assert.throws(() => randomIntegers({ min: 1, max: 5, count: 6, unique: true }), /only 5/);
    assert.throws(() => randomIntegers({ min: 5, max: 1 }), /minimum/);
    const picked = pickRandom(['a', 'b', 'c', 'd'], 2);
    assert.equal(new Set(picked).size, 2);
    const teams = makeTeams(['a', 'b', 'c', 'd', 'e'], 2);
    assert.deepEqual(teams.map((t) => t.length).sort(), [2, 3]);
});

test('timer formatting', () => {
    assert.equal(formatDuration(3725000), '1:02:05');
    assert.equal(formatDuration(65430, { centiseconds: true }), '01:05.43');
    assert.equal(formatCountdown(1), '00:01');
    assert.equal(formatCountdown(0), '00:00');
    assert.equal(toMs({ minutes: 25 }), 1500000);
});
