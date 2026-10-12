{{-- Weight and height inputs (metric / imperial). Use inside a component that spreads bodyInput(). --}}
<div {{ $attributes->merge(['class' => 'space-y-4']) }}>
    <x-segmented model="units" :options="['imperial' => 'US units', 'metric' => 'Metric']" :label="__('Units')" />
    <div x-show="units === 'metric'" class="grid grid-cols-2 gap-3">
        <div>
            <label for="body-kg" class="label">{{ __('Weight (kg)') }}</label>
            <input id="body-kg" type="number" inputmode="decimal" min="1" step="any" x-model="kg" class="field">
        </div>
        <div>
            <label for="body-cm" class="label">{{ __('Height (cm)') }}</label>
            <input id="body-cm" type="number" inputmode="decimal" min="1" step="any" x-model="cm" class="field">
        </div>
    </div>
    <div x-show="units === 'imperial'" x-cloak class="grid grid-cols-3 gap-3">
        <div>
            <label for="body-lb" class="label">{{ __('Weight (lb)') }}</label>
            <input id="body-lb" type="number" inputmode="decimal" min="1" step="any" x-model="lb" class="field">
        </div>
        <div>
            <label for="body-ft" class="label">{{ __('Height (ft)') }}</label>
            <input id="body-ft" type="number" inputmode="numeric" min="1" step="1" x-model="ft" class="field">
        </div>
        <div>
            <label for="body-in" class="label">(in)</label>
            <input id="body-in" type="number" inputmode="decimal" min="0" max="11.9" step="any" x-model="inch" class="field">
        </div>
    </div>
</div>
