import { test } from 'node:test';
import assert from 'node:assert/strict';
import { analyzeText, convertCase, removeDuplicateLines, sortLines } from '../../resources/js/lib/text.js';
import { diffArrays, diffText } from '../../resources/js/lib/diff.js';
import { generateLorem } from '../../resources/js/lib/lorem.js';
import { generatePassword, randomInt, strength } from '../../resources/js/lib/password.js';

test('analyzes words, characters, sentences and paragraphs', () => {
    const r = analyzeText("Hello world! It's a well-known test.\n\nSecond paragraph here. Café ☕ 2026.");
    assert.equal(r.words, 11);
    assert.equal(r.sentences, 4);
    assert.equal(r.paragraphs, 2);
    assert.equal(r.lines, 3);
    assert.equal(analyzeText('👍🏽 a').characters, 3); // emoji with skin tone = 1 grapheme
    assert.equal(analyzeText('').words, 0);
    const kw = analyzeText('apple banana apple cherry apple banana the the the').keywords;
    assert.deepEqual(kw[0], { word: 'apple', count: 3, percent: 33.3 });
    assert.ok(!kw.some((k) => k.word === 'the'));
});

test('case conversions', () => {
    assert.equal(convertCase('the lord of the rings', 'title'), 'The Lord of the Rings');
    assert.equal(convertCase('hello world. how ARE you? fine', 'sentence'), 'Hello world. How are you? Fine');
    assert.equal(convertCase('hello world', 'capitalized'), 'Hello World');
    assert.equal(convertCase('Hello World', 'inverse'), 'hELLO wORLD');
    assert.equal(convertCase('hello', 'alternating'), 'hElLo');
    assert.equal(convertCase('user account ID', 'camel'), 'userAccountId');
    assert.equal(convertCase('userAccountID', 'snake'), 'user_account_id');
    assert.equal(convertCase('Hello big World', 'kebab'), 'hello-big-world');
    assert.equal(convertCase('max retry count', 'constant'), 'MAX_RETRY_COUNT');
    assert.equal(convertCase('xml http request', 'pascal'), 'XmlHttpRequest');
});

test('remove duplicate lines', () => {
    const r = removeDuplicateLines('a\nb\n A\na\n\nc', { caseSensitive: false });
    assert.equal(r.text, 'a\nb\n\nc');
    assert.equal(r.removed, 2);
    assert.equal(removeDuplicateLines('x\n\ny\n\n', { removeEmpty: true }).text, 'x\ny');
    assert.equal(removeDuplicateLines('a\nA', { caseSensitive: true }).removed, 0);
});

test('sort lines', () => {
    assert.equal(sortLines('item 10\nitem 2\nItem 1'), 'Item 1\nitem 2\nitem 10');
    assert.equal(sortLines('b\na\nc', { order: 'desc' }), 'c\nb\na');
    assert.equal(sortLines('ccc\na\nbb', { order: 'length' }), 'a\nbb\nccc');
    assert.equal(sortLines('1\n2\n3', { order: 'reverse' }), '3\n2\n1');
    assert.equal(sortLines('b\na\nb\nA', { unique: true }), 'a\nb');
    let i = 0;
    const seq = [0.1, 0.9, 0.5];
    assert.equal(sortLines('a\nb\nc\nd', { order: 'random' }, () => seq[i++ % 3]).split('\n').length, 4);
});

test('myers diff produces a minimal edit script', () => {
    const ops = diffArrays([...'ABCABBA'], [...'CBABAC']);
    const edits = ops.filter((o) => o.type !== 'equal').length;
    assert.equal(edits, 5); // known minimal edit distance for this classic example
    const rebuilt = ops.filter((o) => o.type !== 'delete').map((o) => o.value).join('');
    assert.equal(rebuilt, 'CBABAC');
    const original = ops.filter((o) => o.type !== 'insert').map((o) => o.value).join('');
    assert.equal(original, 'ABCABBA');
    assert.deepEqual(diffArrays([], []), []);
    assert.deepEqual(diffArrays(['a'], []), [{ type: 'delete', value: 'a' }]);
});

test('text diff by lines and words', () => {
    const lines = diffText('one\ntwo\nthree', 'one\n2\nthree\nfour');
    assert.equal(lines.added, 2);
    assert.equal(lines.removed, 1);
    assert.deepEqual(lines.chunks.map((c) => c.type), ['equal', 'delete', 'insert', 'equal', 'insert']);

    const words = diffText('the quick brown fox', 'the slow brown fox', 'words');
    assert.equal(words.added, 1);
    assert.equal(words.removed, 1);
    assert.equal(diffText('Hello', 'hello', 'lines', { ignoreCase: true }).added, 0);

    // Adjacent word changes are grouped: deletions first, then insertions.
    const grouped = diffText('Built with Laravel and Alpine.', 'New tools are added every month.', 'words');
    assert.deepEqual(grouped.chunks.map((c) => c.type), ['delete', 'insert']);
    assert.equal(grouped.chunks[0].value, 'Built with Laravel and Alpine.');
    assert.equal(grouped.chunks[1].value, 'New tools are added every month.');
});

test('lorem ipsum generation', () => {
    let s = 1;
    const rand = () => ((s = (s * 16807) % 2147483647) / 2147483647);
    const paragraphs = generateLorem({ count: 3, unit: 'paragraphs' }, rand);
    assert.equal(paragraphs.split('\n\n').length, 3);
    assert.ok(paragraphs.startsWith('Lorem ipsum dolor sit amet'));
    assert.equal(generateLorem({ count: 12, unit: 'words' }, rand).split(' ').length, 12);
    assert.match(generateLorem({ count: 2, unit: 'paragraphs', html: true }, rand), /^<p>.*<\/p>\n<p>.*<\/p>$/s);
    assert.ok(!generateLorem({ count: 1, unit: 'sentences', startWithLorem: false }, rand).startsWith('Lorem ipsum dolor sit amet, consectetur'));
});

test('password generation', () => {
    const { password, poolSize } = generatePassword({ length: 24 });
    assert.equal(password.length, 24);
    assert.match(password, /[a-z]/);
    assert.match(password, /[A-Z]/);
    assert.match(password, /\d/);
    assert.match(password, /[^A-Za-z0-9]/);
    assert.equal(poolSize, 26 + 26 + 10 + 27);

    const digitsOnly = generatePassword({ length: 8, lower: false, upper: false, symbols: false });
    assert.match(digitsOnly.password, /^\d{8}$/);
    assert.doesNotMatch(generatePassword({ length: 100, excludeAmbiguous: true }).password, /[Il1O0o]/);
    assert.throws(() => generatePassword({ lower: false, upper: false, digits: false, symbols: false }), /at least one/);

    for (let i = 0; i < 200; i++) assert.ok(randomInt(7) < 7);
    assert.deepEqual(strength(16, 89), { bits: 104, label: 'Strong' });
    assert.equal(strength(6, 10).label, 'Very weak');
});
