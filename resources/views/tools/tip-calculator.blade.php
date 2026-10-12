<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/tip-calculator.js')</x-slot:script>

    <div x-data="tipCalculator" @input.once="trackUse()" class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_380px]">
        <div class="panel space-y-6 p-5">
            <div>
                <label for="tip-bill" class="label">{{ __('Bill amount') }}</label>
                <div class="flex">
                    <input id="tip-bill" type="number" inputmode="decimal" min="0" step="any" x-model="bill" class="field rounded-r-none text-lg">
                    <select x-model="currency" class="field w-24 rounded-l-none border-l-0" aria-label="{{ __('Currency') }}">
                        @foreach (\App\Support\Locales::currencies(['USD', 'EUR', 'GBP', 'CAD', 'AUD', 'MXN']) as $currency)
                            <option>{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <p class="label">{{ __('Tip') }}</p>
                <div class="flex flex-wrap items-center gap-2">
                    <template x-for="p in presets" :key="p">
                        <button type="button" class="rounded-lg border px-4 py-2 text-sm font-medium transition"
                            :class="Number(tipPercent) === p ? 'border-accent bg-accent text-on-accent' : 'border-line-strong text-ink hover:bg-sunken'"
                            @click="tipPercent = p" x-text="p + '%'"></button>
                    </template>
                    <div class="relative">
                        <input type="number" min="0" max="100" step="any" x-model="tipPercent" class="field w-24 pr-7" aria-label="{{ __('Custom tip percent') }}">
                        <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-sm text-faint">%</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap items-end gap-6">
                <div>
                    <label for="tip-people" class="label">{{ __('Number of people') }}</label>
                    <div class="flex items-center gap-2">
                        <button type="button" class="btn btn-secondary size-10 p-0" @click="changePeople(-1)" aria-label="{{ __('Fewer people') }}">−</button>
                        <input id="tip-people" type="number" min="1" max="100" x-model="people" class="field w-20 text-center">
                        <button type="button" class="btn btn-secondary size-10 p-0" @click="changePeople(1)" aria-label="{{ __('More people') }}">+</button>
                    </div>
                </div>
                <label class="flex items-center gap-2 pb-2.5 text-sm text-muted">
                    <input type="checkbox" x-model="roundUp" class="size-4 accent-accent"> {{ __('Round up per person') }}
                </label>
            </div>
        </div>

        <div class="panel self-start p-5" aria-live="polite">
            <template x-if="result()">
                <div>
                    <p class="kicker">{{ __('Each person pays') }}</p>
                    <p class="mt-1 text-5xl font-semibold tracking-tight text-ink" x-text="money(result().perPerson)"></p>
                    <dl class="mt-6 divide-y divide-line text-sm">
                        <div class="flex justify-between py-2.5"><dt class="text-muted">{{ __('Tip') }}</dt><dd class="font-medium text-ink" x-text="money(result().tip)"></dd></div>
                        <div class="flex justify-between py-2.5"><dt class="text-muted">{{ __('Total') }}</dt><dd class="font-medium text-ink" x-text="money(result().total)"></dd></div>
                        <div class="flex justify-between py-2.5"><dt class="text-muted">{{ __('Tip per person') }}</dt><dd class="font-medium text-ink" x-text="money(result().tipPerPerson)"></dd></div>
                    </dl>
                </div>
            </template>
            <p x-show="!result()" class="text-sm text-muted">{{ __('Enter a valid bill amount.') }}</p>
        </div>
    </div>
</x-tool-page>
