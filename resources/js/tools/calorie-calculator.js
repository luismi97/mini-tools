import { ACTIVITY, calories } from '../lib/health';
import { bodyInput } from '../lib/body-input';
import { track } from '../lib/analytics';
import { formatNumber } from '../lib/utils';

document.addEventListener('alpine:init', () => {
    window.Alpine.data('calorieCalculator', () => ({
        ...bodyInput(),
        sex: 'female',
        age: 30,
        activity: 'light',
        activities: ACTIVITY,

        result() {
            try {
                return { ok: true, ...calories({ sex: this.sex, age: Number(this.age), weightKg: this.weightKg(), heightCm: this.heightCm(), activity: this.activity }) };
            } catch (e) {
                return { ok: false, message: e.message };
            }
        },

        goals(r) {
            return [
                { label: 'Lose 1 lb (0.5 kg) per week', value: r.loss, note: '−500 kcal/day' },
                { label: 'Lose 0.5 lb (0.25 kg) per week', value: r.mildLoss, note: '−250 kcal/day' },
                { label: 'Maintain weight', value: r.maintain, note: 'TDEE' },
                { label: 'Gain 0.5 lb (0.25 kg) per week', value: r.mildGain, note: '+250 kcal/day' },
                { label: 'Gain 1 lb (0.5 kg) per week', value: r.gain, note: '+500 kcal/day' },
            ];
        },

        n(value) {
            return formatNumber(value, 0);
        },

        trackUse() {
            track('tool_use', { action: 'calculate', activity: this.activity });
        },
    }));
});
