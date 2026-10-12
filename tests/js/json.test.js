import { test } from 'node:test';
import assert from 'node:assert/strict';
import { formatJson, jsonToCsv, jsonToTypeScript, locateError, minifyJson, parseJson } from '../../resources/js/lib/json.js';

test('parses valid JSON', () => {
    const result = parseJson('{"a": [1, 2]}');
    assert.equal(result.ok, true);
    assert.deepEqual(result.value, { a: [1, 2] });
});

test('reports empty input', () => {
    assert.equal(parseJson('   ').ok, false);
});

test('locates trailing comma with line and column', () => {
    const result = parseJson('{\n  "a": 1,\n}');
    assert.equal(result.ok, false);
    assert.equal(result.error.message, 'Trailing commas are not allowed');
    assert.equal(result.error.line, 3);
    assert.equal(result.error.column, 1);
});

test('locates single quotes, comments and missing commas', () => {
    assert.match(locateError("{'a': 1}").message, /double quotes/);
    assert.match(locateError('{"a": 1 // note\n}').message, /Comments/);
    assert.equal(locateError('[1 2]').message, "Expected ',' or ']' after array item");
    assert.equal(locateError('[1 2]').position, 3);
    assert.equal(locateError('{"a": 1} x').message, 'Unexpected content after the end of the JSON value');
    assert.equal(locateError('"abc').message, 'Unterminated string');
    assert.equal(locateError('[01]').message, "Expected ',' or ']' after array item");
});

test('validator accepts everything JSON.parse accepts', () => {
    const samples = ['0', '-1.5e+10', '"\\u00e9\\n"', 'true', 'null', '[]', '{}', '{"a":{"b":[1,{"c":null}]}}', ' \n[ 1 , "x" ] \n'];
    for (const s of samples) {
        JSON.parse(s);
        assert.equal(locateError(s), null, s);
    }
});

test('formats with indentation, tabs and sorted keys', () => {
    assert.equal(formatJson({ b: 1, a: 2 }, '2'), '{\n  "b": 1,\n  "a": 2\n}');
    assert.equal(formatJson({ a: 1 }, 'tab'), '{\n\t"a": 1\n}');
    assert.equal(formatJson({ b: 1, a: { d: 1, c: 2 } }, '2', true), '{\n  "a": {\n    "c": 2,\n    "d": 1\n  },\n  "b": 1\n}');
    assert.equal(minifyJson({ a: [1, 2] }), '{"a":[1,2]}');
});

test('converts JSON to CSV with flattening, escaping and formula protection', () => {
    const csv = jsonToCsv([
        { id: 1, name: 'Ada, Countess', owner: { city: 'London' } },
        { id: 2, name: 'Say "hi"', extra: '=SUM(A1)' },
    ]);
    assert.equal(csv, [
        'id,name,owner.city,extra',
        '1,"Ada, Countess",London,',
        '2,"Say ""hi""",,\'=SUM(A1)',
    ].join('\r\n'));
    assert.equal(jsonToCsv([1, -2]), 'value\r\n1\r\n-2');
    assert.equal(jsonToCsv([]), '');
});

test('infers TypeScript interfaces', () => {
    const ts = jsonToTypeScript({ id: 1, tags: ['a'], users: [{ name: 'x' }, { name: 'y', age: 3 }], meta: null });
    assert.match(ts, /export interface Root \{\n  id: number;\n  tags: string\[\];\n  users: User\[\];\n  meta: null;\n\}/);
    assert.match(ts, /export interface User \{\n  name: string;\n  age\?: number;\n\}/);
    assert.equal(jsonToTypeScript([1, 'a']), 'export type Root = (number | string)[];');
    assert.match(jsonToTypeScript({ 'first-name': 'a' }), /"first-name": string;/);
});
