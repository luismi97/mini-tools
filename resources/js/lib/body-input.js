import { CM_PER_IN, LB_PER_KG } from './health';

/**
 * Shared metric/imperial body measurement fields for health calculators.
 * Spread into an Alpine component; values are read with weightKg()/heightCm().
 */
export function bodyInput(defaults = {}) {
    return {
        units: 'imperial',
        kg: defaults.kg ?? 70,
        cm: defaults.cm ?? 175,
        lb: defaults.lb ?? 160,
        ft: defaults.ft ?? 5,
        inch: defaults.inch ?? 9,

        weightKg() {
            return this.units === 'metric' ? Number(this.kg) : Number(this.lb) / LB_PER_KG;
        },

        heightCm() {
            return this.units === 'metric' ? Number(this.cm) : ((Number(this.ft) || 0) * 12 + (Number(this.inch) || 0)) * CM_PER_IN;
        },

        formatWeight(kg) {
            return this.units === 'metric' ? `${kg.toFixed(1)} kg` : `${(kg * LB_PER_KG).toFixed(0)} lb`;
        },
    };
}
