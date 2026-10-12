<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/percentage-calculator.js')</x-slot:script>

    @php
        $input = 'field inline-block w-28 text-center font-mono';
    @endphp
    <div x-data="percentageCalculator" @input.once="trackUse()" class="grid gap-4 md:grid-cols-2">
        <section class="panel p-5">
            <h2 class="kicker">{{ __('Percentage of a number') }}</h2>
            <div class="mt-4 flex flex-wrap items-center gap-2 text-ink">
                {{ __('What is') }} <input type="number" step="any" x-model="a.percent" class="{{ $input }}" aria-label="{{ __('Percent') }}"> {{ __('% of') }}
                <input type="number" step="any" x-model="a.value" class="{{ $input }}" aria-label="{{ __('Number') }}"> ?
            </div>
            <p class="mt-5 text-3xl font-semibold tracking-tight text-ink" x-text="resultA()" aria-live="polite"></p>
        </section>

        <section class="panel p-5">
            <h2 class="kicker">{{ __('What percent is X of Y') }}</h2>
            <div class="mt-4 flex flex-wrap items-center gap-2 text-ink">
                <input type="number" step="any" x-model="b.part" class="{{ $input }}" aria-label="{{ __('Part') }}"> {{ __('is what % of') }}
                <input type="number" step="any" x-model="b.whole" class="{{ $input }}" aria-label="{{ __('Whole') }}"> ?
            </div>
            <p class="mt-5 text-3xl font-semibold tracking-tight text-ink" x-text="resultB()" aria-live="polite"></p>
        </section>

        <section class="panel p-5">
            <h2 class="kicker">{{ __('Percentage change') }}</h2>
            <div class="mt-4 flex flex-wrap items-center gap-2 text-ink">
                {{ __('From') }} <input type="number" step="any" x-model="c.from" class="{{ $input }}" aria-label="{{ __('Old value') }}"> {{ __('to') }}
                <input type="number" step="any" x-model="c.to" class="{{ $input }}" aria-label="{{ __('New value') }}">
            </div>
            <p class="mt-5 flex items-baseline gap-2" aria-live="polite">
                <span class="text-3xl font-semibold tracking-tight text-ink" x-text="resultC().text"></span>
                <span class="text-sm font-medium" :class="resultC().label === 'increase' ? 'text-success' : resultC().label === 'decrease' ? 'text-danger' : 'text-muted'" x-text="resultC().label && $t(resultC().label)"></span>
            </p>
        </section>

        <section class="panel p-5">
            <h2 class="kicker">{{ __('Add or subtract a percentage') }}</h2>
            <div class="mt-4 flex flex-wrap items-center gap-2 text-ink">
                <select x-model="d.direction" class="field w-auto" aria-label="{{ __('Increase or decrease') }}">
                    <option value="increase">{{ __('Increase') }}</option>
                    <option value="decrease">{{ __('Decrease') }}</option>
                </select>
                <input type="number" step="any" x-model="d.value" class="{{ $input }}" aria-label="{{ __('Number') }}"> {{ __('by') }}
                <input type="number" step="any" x-model="d.percent" class="{{ $input }}" aria-label="{{ __('Percent') }}"> %
            </div>
            <p class="mt-5 text-3xl font-semibold tracking-tight text-ink" x-text="resultD()" aria-live="polite"></p>
        </section>
    </div>
</x-tool-page>
