import { bmi } from '../lib/health';
import { bodyInput } from '../lib/body-input';
import { track } from '../lib/analytics';

const SCALE_MIN = 15;
const SCALE_MAX = 40;

document.addEventListener('alpine:init', () => {
    window.Alpine.data('bmiCalculator', () => ({
        ...bodyInput(),

        result() {
            try {
                return { ok: true, ...bmi(this.weightKg(), this.heightCm()) };
            } catch (e) {
                return { ok: false, message: e.message };
            }
        },

        markerLeft(value) {
            return `${Math.min(100, Math.max(0, ((value - SCALE_MIN) / (SCALE_MAX - SCALE_MIN)) * 100))}%`;
        },

        categoryClass(category) {
            return {
                Underweight: 'text-info',
                'Healthy weight': 'text-success',
                Overweight: 'text-warning',
                Obesity: 'text-danger',
            }[category];
        },

        trackUse() {
            track('tool_use', { action: 'calculate', units: this.units });
        },
    }));
});
