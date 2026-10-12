import { test } from 'node:test';
import assert from 'node:assert/strict';
import { decodeBase64, decodeBase64Bytes, encodeBase64 } from '../../resources/js/lib/base64.js';
import { decodeUrl, encodeUrl, parseUrl } from '../../resources/js/lib/url.js';
import { decodeJwt } from '../../resources/js/lib/jwt.js';
import { generateUuids, inspectUuid, uuidv7 } from '../../resources/js/lib/uuid.js';
import { csvToJson, detectDelimiter, parseCsvRows } from '../../resources/js/lib/csv.js';
import { jsonToCsv } from '../../resources/js/lib/json.js';

test('base64 round-trips UTF-8 and supports URL-safe output', () => {
    assert.equal(encodeBase64('Hello, World!'), 'SGVsbG8sIFdvcmxkIQ==');
    assert.equal(decodeBase64(encodeBase64('Café ☕ 日本')), 'Café ☕ 日本');
    assert.equal(encodeBase64('??>>', true), 'Pz8-Pg');
    assert.equal(decodeBase64('Pz8-Pg'), '??>>');
    assert.equal(decodeBase64('data:text/plain;base64,SGk='), 'Hi');
    assert.throws(() => decodeBase64('not base64!'), /not valid Base64/);
    assert.throws(() => decodeBase64('/w=='), /binary/);
    assert.deepEqual([...decodeBase64Bytes('/w==')], [255]);
});

test('url encode/decode and parse', () => {
    assert.equal(encodeUrl('a b&c=d/é'), 'a%20b%26c%3Dd%2F%C3%A9');
    assert.equal(encodeUrl('https://x.io/a b?q=1&r=é', 'full'), 'https://x.io/a%20b?q=1&r=%C3%A9');
    assert.equal(decodeUrl('a%20b+c', true), 'a b c');
    assert.throws(() => decodeUrl('%E0%A4%A'), /malformed/);
    const parts = parseUrl('https://example.com:8080/path?q=hello%20world&x=1#top');
    assert.equal(parts.host, 'example.com:8080');
    assert.deepEqual(parts.params, [['q', 'hello world'], ['x', '1']]);
    assert.equal(parseUrl('not a url'), null);
});

test('jwt decoding, claims and status', () => {
    const header = encodeBase64(JSON.stringify({ alg: 'HS256', typ: 'JWT' }), true);
    const payload = encodeBase64(JSON.stringify({ sub: '123', name: 'Ada', exp: 1000, iat: 500 }), true);
    const token = `${header}.${payload}.sig`;

    const decoded = decodeJwt(`Bearer ${token}`, 2_000_000);
    assert.equal(decoded.header.alg, 'HS256');
    assert.equal(decoded.payload.name, 'Ada');
    assert.equal(decoded.status, 'expired');
    assert.deepEqual(decoded.times.map((t) => t.claim), ['exp', 'iat']);
    assert.equal(decodeJwt(token, 10_000).status, 'valid');
    assert.throws(() => decodeJwt('abc'), /three parts/);
    assert.throws(() => decodeJwt('e30.bm9wZQ.x'), /payload is not a valid JSON/);
});

test('uuid generation and inspection', () => {
    const ids = generateUuids(50);
    assert.equal(new Set(ids).size, 50);
    assert.ok(ids.every((id) => inspectUuid(id).version === 4));

    const v7 = uuidv7(1_700_000_000_000);
    assert.equal(inspectUuid(v7).version, 7);
    assert.ok(v7.startsWith('018bcfe5-6800'), v7);

    const [upper] = generateUuids(1, { uppercase: true, hyphens: false, braces: true });
    assert.match(upper, /^\{[0-9A-F]{32}\}$/);
    assert.equal(generateUuids(5000).length, 1000);
    assert.equal(inspectUuid('nope').valid, false);
});

test('csv parsing handles quotes, newlines and delimiters', () => {
    assert.deepEqual(parseCsvRows('a,b\r\n"x, y","say ""hi"""\n"multi\nline",2\n\n'), [
        ['a', 'b'],
        ['x, y', 'say "hi"'],
        ['multi\nline', '2'],
    ]);
    assert.equal(detectDelimiter('a;b;c\n1;2;3'), ';');
    assert.equal(detectDelimiter('a\tb\n1\t2'), '\t');
    assert.throws(() => parseCsvRows('"open,1'), /never closed/);
});

test('csv to json with headers, types and duplicates', () => {
    assert.deepEqual(csvToJson('id;name;zip;active\n1;Ada;007;true\n2;Bob;;false'), [
        { id: 1, name: 'Ada', zip: '007', active: true },
        { id: 2, name: 'Bob', zip: '', active: false },
    ]);
    assert.deepEqual(csvToJson('a,a,\n1,2,3'), [{ a: 1, a_2: 2, column_3: 3 }]);
    assert.deepEqual(csvToJson('1,2\n3,4', { header: false, inferTypes: false }), [['1', '2'], ['3', '4']]);
});

test('json to csv with a custom delimiter', () => {
    assert.equal(jsonToCsv([{ a: 'x;y', b: 1 }], ';'), 'a;b\r\n"x;y";1');
});
