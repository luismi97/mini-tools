<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/date-calculator.js')</x-slot:script>

    <div x-data="dateCalculator" @input.once="trackUse()" @change.once="trackUse()" class="space-y-6">
        <x-segmented model="mode" :options="['difference' => 'Days between dates', 'add' => 'Add or subtract']" label="{{ __('Calculator mode') }}" />

        {{-- Days between dates --}}
        <div x-show="mode === 'difference'" class="grid gap-6 lg:grid-cols-[340px_minmax(0,1fr)]">
            <div class="panel space-y-4 self-start p-5">
                <div>
                    <label for="dc-start" class="label">{{ __('Start date') }}</label>
                    <input id="dc-start" type="date" x-model="start" class="field">
                </div>
                <div>
                    <label for="dc-end" class="label">{{ __('End date') }}</label>
                    <input id="dc-end" type="date" x-model="end" class="field">
                </div>
                <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="includeEnd" class="size-4 accent-accent"> {{ __('Include end date (+1 day)') }}</label>
            </div>
            <div aria-live="polite">
                <template x-if="difference()">
                    <div class="space-y-4">
                        <div class="panel p-5">
                            <p class="kicker" x-text="difference().direction === 'backward' ? $t('Days between (end is before start)') : $t('Days between')"></p>
                            <p class="mt-1 text-5xl font-semibold tracking-tight text-ink" x-text="plural(difference().days, 'day', 'days')"></p>
                            <p class="mt-2 text-sm text-muted" x-text="$t(':years, :months and :days', { years: plural(difference().years, 'year', 'years'), months: plural(difference().months, 'month', 'months'), days: plural(difference().monthDays, 'day', 'days') })"></p>
                        </div>
                        <dl class="grid gap-4 sm:grid-cols-4">
                            <div class="panel p-4"><dt class="text-xs text-muted">{{ __('Weeks') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="$t(':weeks wk :days d', { weeks: n(difference().weeks), days: difference().remainderDays })"></dd></div>
                            <div class="panel p-4"><dt class="text-xs text-muted">{{ __('Business days') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="n(difference().businessDays)"></dd></div>
                            <div class="panel p-4"><dt class="text-xs text-muted">{{ __('Weekend days') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="n(difference().weekendDays)"></dd></div>
                            <div class="panel p-4"><dt class="text-xs text-muted">{{ __('Hours') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="n(difference().hours)"></dd></div>
                        </dl>
                    </div>
                </template>
                <p x-show="!difference()" class="panel p-6 text-center text-sm text-muted">{{ __('Pick two dates.') }}</p>
            </div>
        </div>

        {{-- Add or subtract --}}
        <div x-show="mode === 'add'" x-cloak class="grid gap-6 lg:grid-cols-[340px_minmax(0,1fr)]">
            <div class="panel space-y-4 self-start p-5">
                <div>
                    <label for="dc-base" class="label">{{ __('Start date') }}</label>
                    <input id="dc-base" type="date" x-model="base" class="field">
                </div>
                <x-segmented model="subtract" :options="[0 => 'Add', 1 => 'Subtract']" label="{{ __('Add or subtract') }}" class="w-full [&>button]:flex-1" />
                <div class="grid grid-cols-4 gap-2">
                    @foreach (['years' => 'Years', 'months' => 'Months', 'weeks' => 'Weeks', 'days' => 'Days'] as $field => $label)
                        <div>
                            <label for="dc-{{ $field }}" class="mb-1 block text-xs text-muted">{{ __($label) }}</label>
                            <input id="dc-{{ $field }}" type="number" min="0" step="1" x-model="period.{{ $field }}" class="field px-2 text-center"
                                   @if ($field !== 'days') :disabled="businessDays" @endif>
                        </div>
                    @endforeach
                </div>
                <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="businessDays" class="size-4 accent-accent"> {{ __('Business days only (Mon–Fri)') }}</label>
            </div>
            <div aria-live="polite">
                <template x-if="added()">
                    <div class="panel p-5">
                        <p class="kicker">{{ __('Result') }}</p>
                        <p class="mt-1 text-3xl font-semibold tracking-tight text-ink sm:text-4xl" x-text="longDate(added().date)"></p>
                        <p class="mt-2 text-sm text-muted" x-text="businessDays ? $t(subtract ? ':count business days before the start date, skipping weekends.' : ':count business days after the start date, skipping weekends.', { count: period.days || 0 }) : $t('Months are added by calendar month; month-end dates are adjusted to the last valid day.')"></p>
                    </div>
                </template>
            </div>
        </div>
    </div>
</x-tool-page>
