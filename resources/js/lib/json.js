/**
 * Pure JSON helpers for the JSON Formatter (no DOM access, unit-tested with node --test).
 */
import { t } from './i18n.js';

/**
 * @returns {{ok: true, value: any} | {ok: false, error: {message: string, line: number|null, column: number|null, position: number|null}}}
 */
export function parseJson(text) {
    if (!text || !text.trim()) {
        return { ok: false, error: { message: t('Input is empty.'), line: null, column: null, position: null } };
    }
    try {
        return { ok: true, value: JSON.parse(text) };
    } catch (e) {
        return { ok: false, error: describeError(String(e.message), text) };
    }
}

/**
 * Native JSON.parse error messages differ per browser and recent V8 versions
 * omit the position, so errors are located with a small strict validator that
 * gives consistent, human-friendly messages.
 */
function describeError(nativeMessage, text) {
    const found = locateError(text);
    if (!found) {
        return { message: nativeMessage, line: null, column: null, position: null };
    }
    const before = text.slice(0, found.position);
    const line = before.split('\n').length;
    const column = found.position - before.lastIndexOf('\n');
    return { message: found.message, line, column, position: found.position };
}

/**
 * @returns {{message: string, position: number} | null} null when the text is valid JSON.
 */
export function locateError(text) {
    const len = text.length;
    let i = 0;

    const fail = (message) => {
        throw { jsonError: true, message, position: Math.min(i, len) };
    };
    const ws = () => {
        while (i < len && ' \t\n\r'.includes(text[i])) i++;
    };
    const unexpected = (expected) => {
        if (i >= len) fail(t('Unexpected end of input'));
        if (text[i] === '/') fail(t('Comments are not allowed in JSON'));
        if (text[i] === "'") fail(t('Strings and property names must use double quotes'));
        fail(expected ?? t('Unexpected character :char', { char: JSON.stringify(text[i]) }));
    };

    const string = () => {
        i++;
        while (i < len) {
            const c = text[i];
            if (c === '"') {
                i++;
                return;
            }
            if (c === '\\') {
                const next = text[i + 1];
                if (next !== undefined && '"\\/bfnrt'.includes(next)) i += 2;
                else if (next === 'u' && /^[0-9a-fA-F]{4}$/.test(text.slice(i + 2, i + 6))) i += 6;
                else fail(t('Invalid escape sequence in string'));
                continue;
            }
            if (c < ' ') fail(t('Line breaks and control characters must be escaped in strings'));
            i++;
        }
        fail(t('Unterminated string'));
    };

    const number = () => {
        const re = /-?(?:0|[1-9]\d*)(?:\.\d+)?(?:[eE][+-]?\d+)?/y;
        re.lastIndex = i;
        if (!re.exec(text)) fail(t('Invalid number'));
        i = re.lastIndex;
    };

    const object = () => {
        i++;
        ws();
        if (text[i] === '}') {
            i++;
            return;
        }
        for (;;) {
            ws();
            if (text[i] === '}') fail(t('Trailing commas are not allowed'));
            if (text[i] !== '"') unexpected(t('Expected a property name in double quotes'));
            string();
            ws();
            if (text[i] !== ':') unexpected(t("Expected ':' after property name"));
            i++;
            value();
            ws();
            if (text[i] === ',') {
                i++;
                continue;
            }
            if (text[i] === '}') {
                i++;
                return;
            }
            unexpected(t("Expected ',' or '}' after property value"));
        }
    };

    const array = () => {
        i++;
        ws();
        if (text[i] === ']') {
            i++;
            return;
        }
        for (;;) {
            ws();
            if (text[i] === ']') fail(t('Trailing commas are not allowed'));
            value();
            ws();
            if (text[i] === ',') {
                i++;
                continue;
            }
            if (text[i] === ']') {
                i++;
                return;
            }
            unexpected(t("Expected ',' or ']' after array item"));
        }
    };

    const value = () => {
        ws();
        const c = text[i];
        if (c === '{') return object();
        if (c === '[') return array();
        if (c === '"') return string();
        if (c === '-' || (c >= '0' && c <= '9')) return number();
        for (const literal of ['true', 'false', 'null']) {
            if (text.startsWith(literal, i)) {
                i += literal.length;
                return;
            }
        }
        unexpected();
    };

    try {
        value();
        ws();
        if (i < len) fail(t('Unexpected content after the end of the JSON value'));
        return null;
    } catch (e) {
        if (e && e.jsonError) return { message: e.message, position: e.position };
        throw e;
    }
}

export function sortKeysDeep(value) {
    if (Array.isArray(value)) return value.map(sortKeysDeep);
    if (isPlainObject(value)) {
        return Object.fromEntries(
            Object.keys(value)
                .sort((a, b) => a.localeCompare(b))
                .map((key) => [key, sortKeysDeep(value[key])]),
        );
    }
    return value;
}

/** @param {any} value @param {'2'|'4'|'tab'|number|string} indent */
export function formatJson(value, indent = 2, sortKeys = false) {
    const space = indent === 'tab' ? '\t' : Number(indent) || 2;
    return JSON.stringify(sortKeys ? sortKeysDeep(value) : value, null, space);
}

export function minifyJson(value) {
    return JSON.stringify(value);
}

/* ----------------------------------------------------------------- CSV */

/**
 * Array of objects -> CSV (nested objects flattened with dot notation).
 * A single object becomes one row; primitives go into a "value" column.
 */
export function jsonToCsv(value, delimiter = ',') {
    const rows = Array.isArray(value) ? value : [value];
    if (rows.length === 0) return '';

    const flat = rows.map((row) => (isPlainObject(row) ? flatten(row) : { value: row }));
    const headers = [...new Set(flat.flatMap((row) => Object.keys(row)))];
    const cell = (v) => csvCell(v, delimiter);

    const lines = [headers.map(cell).join(delimiter)];
    for (const row of flat) {
        lines.push(headers.map((h) => cell(row[h])).join(delimiter));
    }
    return lines.join('\r\n');
}

function flatten(obj, prefix = '', out = {}) {
    for (const [key, value] of Object.entries(obj)) {
        const path = prefix ? `${prefix}.${key}` : key;
        if (isPlainObject(value) && Object.keys(value).length > 0) {
            flatten(value, path, out);
        } else {
            out[path] = value;
        }
    }
    return out;
}

function csvCell(value, delimiter = ',') {
    if (value === undefined || value === null) return '';
    let s = typeof value === 'object' ? JSON.stringify(value) : String(value);
    // Prevent CSV/formula injection when the file is opened in a spreadsheet.
    if (typeof value === 'string' && /^[=+\-@\t\r]/.test(s)) s = `'${s}`;
    return s.includes(delimiter) || /["\r\n]/.test(s) ? `"${s.replace(/"/g, '""')}"` : s;
}

/* ---------------------------------------------------------- TypeScript */

/**
 * Infer TypeScript interfaces from a JSON value.
 */
export function jsonToTypeScript(value, rootName = 'Root') {
    const interfaces = [];
    const used = new Set();

    const uniqueName = (base) => {
        let name = base;
        let i = 2;
        while (used.has(name)) name = `${base}${i++}`;
        used.add(name);
        return name;
    };

    const typeOfValues = (values, hint) => {
        const objects = values.filter(isPlainObject);
        const arrays = values.filter(Array.isArray);
        const types = new Set();

        for (const v of values) {
            if (v === null) types.add('null');
            else if (typeof v === 'string') types.add('string');
            else if (typeof v === 'number') types.add('number');
            else if (typeof v === 'boolean') types.add('boolean');
        }
        if (arrays.length) types.add(arrayType(arrays.flat(), hint));
        if (objects.length) types.add(objectType(objects, hint));

        return [...types].join(' | ') || 'unknown';
    };

    const arrayType = (items, hint) => {
        if (items.length === 0) return 'unknown[]';
        const inner = typeOfValues(items, singular(hint));
        return inner.includes(' ') ? `(${inner})[]` : `${inner}[]`;
    };

    const objectType = (objects, hint) => {
        const keys = [...new Set(objects.flatMap((o) => Object.keys(o)))];
        if (keys.length === 0) return 'Record<string, unknown>';

        const name = uniqueName(pascalCase(hint));
        const lines = keys.map((key) => {
            const present = objects.filter((o) => Object.hasOwn(o, key));
            const optional = present.length < objects.length ? '?' : '';
            return `  ${safeKey(key)}${optional}: ${typeOfValues(present.map((o) => o[key]), key)};`;
        });
        interfaces.push(`export interface ${name} {\n${lines.join('\n')}\n}`);
        return name;
    };

    const rootType = typeOfValues([value], rootName);
    const output = interfaces.reverse();
    if (!isPlainObject(value) || rootType !== pascalCase(rootName)) {
        output.unshift(`export type ${pascalCase(rootName)} = ${rootType};`);
    }
    return output.join('\n\n');
}

function pascalCase(s) {
    const name = String(s)
        .split(/[^A-Za-z0-9]+/)
        .filter(Boolean)
        .map((part) => part.charAt(0).toUpperCase() + part.slice(1))
        .join('');
    if (!name) return 'Item';
    return /^[0-9]/.test(name) ? `T${name}` : name;
}

function singular(s) {
    const word = String(s);
    if (/ies$/i.test(word)) return word.slice(0, -3) + 'y';
    if (/[^s]s$/i.test(word)) return word.slice(0, -1);
    return `${word}Item`;
}

function safeKey(key) {
    return /^[A-Za-z_$][\w$]*$/.test(key) ? key : JSON.stringify(key);
}

export function isPlainObject(value) {
    return value !== null && typeof value === 'object' && !Array.isArray(value);
}
