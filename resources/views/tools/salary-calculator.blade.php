<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/salary-calculator.js')</x-slot:script>

    <div x-data="salaryCalculator" @input.once="trackUse()" class="grid gap-6 lg:grid-cols-[360px_minmax(0,1fr)]">
        <div class="panel space-y-5 self-start p-5">
            <div>
                <label for="salary-amount" class="label">{{ __('Pay amount') }}</label>
                <div class="flex">
                    <input id="salary-amount" type="number" inputmode="decimal" min="0" step="any" x-model="amount" class="field rounded-r-none">
                    <select x-model="currency" class="field w-24 rounded-l-none border-l-0" aria-label="{{ __('Currency') }}">
                        @foreach (\App\Support\Locales::currencies(['USD', 'EUR', 'GBP', 'CAD', 'AUD', 'MXN', 'INR']) as $currency)
                            <option>{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label for="salary-period" class="label">{{ __('Per') }}</label>
                <select id="salary-period" x-model="period" class="field">
                    <template x-for="(label, key) in periods" :key="key">
                        <option :value="key" x-text="$t(label)" :selected="key === period"></option>
                    </template>
                </select>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <div>
                    <label for="salary-hours" class="mb-1 block text-xs text-muted">{{ __('Hours / week') }}</label>
                    <input id="salary-hours" type="number" min="1" max="168" step="any" x-model="hoursPerWeek" class="field">
                </div>
                <div>
                    <label for="salary-days" class="mb-1 block text-xs text-muted">{{ __('Days / week') }}</label>
                    <input id="salary-days" type="number" min="1" max="7" step="any" x-model="daysPerWeek" class="field">
                </div>
                <div>
                    <label for="salary-weeks" class="mb-1 block text-xs text-muted">{{ __('Weeks / year') }}</label>
                    <input id="salary-weeks" type="number" min="1" max="53" step="any" x-model="weeksPerYear" class="field">
                </div>
            </div>
            <p x-show="!valid()" x-cloak class="text-sm text-danger">{{ __('Check the values: hours 1–168, days 1–7, weeks 1–53.') }}</p>
        </div>

        <div class="panel self-start overflow-hidden" aria-live="polite">
            <template x-if="result()">
                <dl class="divide-y divide-line">
                    <template x-for="(label, key) in periods" :key="key">
                        <div class="flex items-center justify-between px-5 py-3.5" :class="key === period ? 'bg-accent-soft' : ''">
                            <dt class="text-sm" :class="key === period ? 'font-medium text-accent' : 'text-muted'" x-text="$t(label)"></dt>
                            <dd class="text-lg font-semibold tabular-nums text-ink" x-text="money(result()[key])"></dd>
                        </div>
                    </template>
                </dl>
            </template>
            <p class="border-t border-line px-5 py-3 text-xs text-faint">{{ __('Gross pay before taxes and deductions.') }}</p>
        </div>
    </div>
</x-tool-page>
