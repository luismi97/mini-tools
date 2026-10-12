<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/age-calculator.js')</x-slot:script>

    <div x-data="ageCalculator" @input.once="trackUse()" class="grid gap-6 lg:grid-cols-[340px_minmax(0,1fr)]">
        <div class="panel space-y-5 self-start p-5">
            <div>
                <label for="age-birth" class="label">{{ __('Date of birth') }}</label>
                <input id="age-birth" type="date" x-model="birth" :max="on" class="field">
            </div>
            <div>
                <label for="age-on" class="label">{{ __('Age on') }}</label>
                <input id="age-on" type="date" x-model="on" class="field">
                <button type="button" class="mt-1.5 text-xs text-accent hover:underline" x-show="on !== today" @click="on = today">{{ __('Reset to today') }}</button>
            </div>
        </div>

        <div class="space-y-6" aria-live="polite">
            <template x-if="result() && result().ok">
                <div class="space-y-6">
                    <div class="panel p-5">
                        <p class="kicker">{{ __('Age') }}</p>
                        <p class="mt-2 flex flex-wrap items-baseline gap-x-4 gap-y-1 text-ink">
                            <span><span class="text-5xl font-semibold tracking-tight" x-text="result().years"></span> <span class="text-muted" x-text="result().years === 1 ? $t('year') : $t('years')"></span></span>
                            <span><span class="text-3xl font-semibold tracking-tight" x-text="result().months"></span> <span class="text-muted" x-text="result().months === 1 ? $t('month') : $t('months')"></span></span>
                            <span><span class="text-3xl font-semibold tracking-tight" x-text="result().days"></span> <span class="text-muted" x-text="result().days === 1 ? $t('day') : $t('days')"></span></span>
                        </p>
                        <p class="mt-3 text-sm text-muted" x-text="$t('Born on a :weekday.', { weekday: $t(result().bornOn) })"></p>
                    </div>

                    <dl class="grid gap-4 sm:grid-cols-4">
                        <template x-for="[label, key] in [['Total months', 'totalMonths'], ['Total weeks', 'totalWeeks'], ['Total days', 'totalDays'], ['Total hours', 'totalHours']]" :key="key">
                            <div class="panel p-4">
                                <dt class="text-xs text-muted" x-text="$t(label)"></dt>
                                <dd class="mt-1 text-xl font-semibold text-ink" x-text="n(result()[key])"></dd>
                            </div>
                        </template>
                    </dl>

                    <div class="panel flex items-center gap-4 p-5">
                        <span class="grid size-12 shrink-0 place-items-center rounded-full bg-accent-soft text-accent"><x-icon name="calendar" /></span>
                        <p class="text-ink" x-text="result().nextBirthday.daysUntil === 0
                            ? $t('Happy birthday! Turning :age today.', { age: result().nextBirthday.turning })
                            : $tc('Next birthday in :count day — :weekday, :date (turning :age).', 'Next birthday in :count days — :weekday, :date (turning :age).', result().nextBirthday.daysUntil, { count: n(result().nextBirthday.daysUntil), weekday: $t(result().nextBirthday.weekday), date: longDate(result().nextBirthday.date), age: result().nextBirthday.turning })"></p>
                    </div>
                </div>
            </template>
            <p x-show="result() && !result().ok" x-cloak class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" x-text="result()?.message"></p>
            <div x-show="!result()" class="panel p-8 text-center text-sm text-muted">{{ __('Enter a date of birth to see the exact age.') }}</div>
        </div>
    </div>
</x-tool-page>
