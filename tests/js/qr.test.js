import { test } from 'node:test';
import assert from 'node:assert/strict';
import { buildPayload, contrastRatio, createMatrix, renderSvg } from '../../resources/js/lib/qr.js';

test('builds URL payloads, adding https when missing', () => {
    assert.deepEqual(buildPayload('url', { url: 'example.com' }), { value: 'https://example.com' });
    assert.deepEqual(buildPayload('url', { url: 'http://a.io/x' }), { value: 'http://a.io/x' });
    assert.ok(buildPayload('url', { url: '  ' }).error);
});

test('builds email, phone and text payloads', () => {
    assert.equal(buildPayload('email', { email: 'a@b.co', subject: 'Hi there', body: 'A&B' }).value, 'mailto:a@b.co?subject=Hi%20there&body=A%26B');
    assert.ok(buildPayload('email', { email: 'nope' }).error);
    assert.equal(buildPayload('phone', { phone: '+1 (555) 010-9999' }).value, 'tel:+15550109999');
    assert.equal(buildPayload('text', { text: 'héllo' }).value, 'héllo');
});

test('builds Wi-Fi payloads with escaping', () => {
    assert.equal(
        buildPayload('wifi', { ssid: 'My;Net', password: 'p:a"ss', security: 'WPA', hidden: true }).value,
        'WIFI:T:WPA;S:My\\;Net;P:p\\:a\\"ss;H:true;;',
    );
    assert.equal(buildPayload('wifi', { ssid: 'Open', security: 'nopass' }).value, 'WIFI:T:nopass;S:Open;;');
    assert.ok(buildPayload('wifi', { ssid: 'X', security: 'WPA' }).error);
});

test('creates a matrix and renders SVG', () => {
    const matrix = createMatrix('https://example.com', 'M');
    assert.equal(matrix.count, 25); // version 2
    const svg = renderSvg(matrix, { size: 256, margin: 4, foreground: '#112233', background: '#ffffff' });
    assert.match(svg, /^<svg [^>]*viewBox="0 0 33 33"/);
    assert.match(svg, /fill="#112233"/);
    // Finder pattern: top-left module is dark.
    assert.ok(matrix.isDark(0, 0));
});

test('encodes UTF-8 content', () => {
    assert.doesNotThrow(() => createMatrix('Café ☕ 日本語', 'M'));
});

test('rejects content that does not fit and invalid colors fall back', () => {
    assert.throws(() => createMatrix('x'.repeat(5000), 'H'), /Too much content/);
    const svg = renderSvg(createMatrix('a'), { size: 100, margin: 0, foreground: 'red"/><script>', background: '#fff' });
    assert.doesNotMatch(svg, /script/);
});

test('contrast ratio', () => {
    assert.equal(Math.round(contrastRatio('#000000', '#ffffff')), 21);
    assert.equal(contrastRatio('#777777', '#777777'), 1);
});
