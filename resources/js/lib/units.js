/**
 * Unit conversion (pure, unit-tested). Every unit has a factor to its
 * category's base unit; temperature is converted with formulas.
 */
import { intlLocale } from './i18n.js';

export const CATEGORIES = {
    length: {
        label: 'Length',
        units: {
            mm: { label: 'Millimeters', factor: 0.001 },
            cm: { label: 'Centimeters', factor: 0.01 },
            m: { label: 'Meters', factor: 1 },
            km: { label: 'Kilometers', factor: 1000 },
            in: { label: 'Inches', factor: 0.0254 },
            ft: { label: 'Feet', factor: 0.3048 },
            yd: { label: 'Yards', factor: 0.9144 },
            mi: { label: 'Miles', factor: 1609.344 },
            nmi: { label: 'Nautical miles', factor: 1852 },
        },
    },
    weight: {
        label: 'Weight',
        units: {
            mg: { label: 'Milligrams', factor: 1e-6 },
            g: { label: 'Grams', factor: 0.001 },
            kg: { label: 'Kilograms', factor: 1 },
            t: { label: 'Metric tons', factor: 1000 },
            oz: { label: 'Ounces', factor: 0.028349523125 },
            lb: { label: 'Pounds', factor: 0.45359237 },
            st: { label: 'Stones', factor: 6.35029318 },
            ton: { label: 'US tons', factor: 907.18474 },
        },
    },
    temperature: {
        label: 'Temperature',
        units: {
            c: { label: 'Celsius (°C)' },
            f: { label: 'Fahrenheit (°F)' },
            k: { label: 'Kelvin (K)' },
        },
    },
    volume: {
        label: 'Volume',
        units: {
            ml: { label: 'Milliliters', factor: 0.001 },
            l: { label: 'Liters', factor: 1 },
            m3: { label: 'Cubic meters', factor: 1000 },
            tsp: { label: 'Teaspoons (US)', factor: 0.00492892159375 },
            tbsp: { label: 'Tablespoons (US)', factor: 0.01478676478125 },
            floz: { label: 'Fluid ounces (US)', factor: 0.0295735295625 },
            cup: { label: 'Cups (US)', factor: 0.2365882365 },
            pt: { label: 'Pints (US)', factor: 0.473176473 },
            qt: { label: 'Quarts (US)', factor: 0.946352946 },
            gal: { label: 'Gallons (US)', factor: 3.785411784 },
            galuk: { label: 'Gallons (UK)', factor: 4.54609 },
        },
    },
    area: {
        label: 'Area',
        units: {
            cm2: { label: 'Square centimeters', factor: 1e-4 },
            m2: { label: 'Square meters', factor: 1 },
            ha: { label: 'Hectares', factor: 1e4 },
            km2: { label: 'Square kilometers', factor: 1e6 },
            in2: { label: 'Square inches', factor: 0.00064516 },
            ft2: { label: 'Square feet', factor: 0.09290304 },
            yd2: { label: 'Square yards', factor: 0.83612736 },
            ac: { label: 'Acres', factor: 4046.8564224 },
            mi2: { label: 'Square miles', factor: 2589988.110336 },
        },
    },
    speed: {
        label: 'Speed',
        units: {
            mps: { label: 'Meters per second', factor: 1 },
            kph: { label: 'Kilometers per hour', factor: 1 / 3.6 },
            mph: { label: 'Miles per hour', factor: 0.44704 },
            kn: { label: 'Knots', factor: 1852 / 3600 },
            fps: { label: 'Feet per second', factor: 0.3048 },
        },
    },
    time: {
        label: 'Time',
        units: {
            ms: { label: 'Milliseconds', factor: 0.001 },
            s: { label: 'Seconds', factor: 1 },
            min: { label: 'Minutes', factor: 60 },
            h: { label: 'Hours', factor: 3600 },
            d: { label: 'Days', factor: 86400 },
            wk: { label: 'Weeks', factor: 604800 },
            mo: { label: 'Months (average)', factor: 2629746 },
            yr: { label: 'Years (average)', factor: 31556952 },
        },
    },
    data: {
        label: 'Data',
        units: {
            bit: { label: 'Bits', factor: 0.125 },
            B: { label: 'Bytes', factor: 1 },
            KB: { label: 'Kilobytes (KB)', factor: 1e3 },
            MB: { label: 'Megabytes (MB)', factor: 1e6 },
            GB: { label: 'Gigabytes (GB)', factor: 1e9 },
            TB: { label: 'Terabytes (TB)', factor: 1e12 },
            KiB: { label: 'Kibibytes (KiB)', factor: 1024 },
            MiB: { label: 'Mebibytes (MiB)', factor: 1024 ** 2 },
            GiB: { label: 'Gibibytes (GiB)', factor: 1024 ** 3 },
            TiB: { label: 'Tebibytes (TiB)', factor: 1024 ** 4 },
        },
    },
};

function toCelsius(value, unit) {
    if (unit === 'f') return ((value - 32) * 5) / 9;
    if (unit === 'k') return value - 273.15;
    return value;
}

function fromCelsius(value, unit) {
    if (unit === 'f') return (value * 9) / 5 + 32;
    if (unit === 'k') return value + 273.15;
    return value;
}

/**
 * @returns {number} converted value (NaN for unknown units or invalid input)
 */
export function convertUnit(value, from, to, category) {
    const cat = CATEGORIES[category];
    if (!cat || !cat.units[from] || !cat.units[to] || !Number.isFinite(value)) return NaN;
    if (category === 'temperature') return fromCelsius(toCelsius(value, from), to);
    return (value * cat.units[from].factor) / cat.units[to].factor;
}

/** Human-friendly number: up to 10 significant digits, exponent for extremes. */
export function formatUnitValue(value) {
    if (!Number.isFinite(value)) return '—';
    const abs = Math.abs(value);
    if (abs !== 0 && (abs >= 1e15 || abs < 1e-6)) return value.toExponential(6).replace(/\.?0+e/, 'e');
    return Number(value.toPrecision(10)).toLocaleString(intlLocale(), { maximumFractionDigits: 10 });
}
