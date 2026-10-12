<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/due-date-calculator.js')</x-slot:script>

    <div x-data="dueDateCalculator" @input.once="trackUse()" @change.once="trackUse()" class="grid gap-6 lg:grid-cols-[340px_minmax(0,1fr)]">
        <div class="panel space-y-4 self-start p-5">
            <div>
                <label for="dd-lmp" class="label">{{ __('First day of last period') }}</label>
                <input id="dd-lmp" type="date" x-model="lmp" :max="max" class="field">
            </div>
            <div>
                <label for="dd-cycle" class="label">{{ __('Average cycle length (days)') }}</label>
                <input id="dd-cycle" type="number" min="20" max="45" x-model="cycle" class="field">
            </div>
        </div>

        <div aria-live="polite">
            <template x-if="result().ok">
                <div class="space-y-4">
                    <div class="panel p-5">
                        <p class="kicker">{{ __('Estimated due date') }}</p>
                        <p class="mt-1 text-3xl font-semibold tracking-tight text-ink sm:text-4xl" x-text="longDate(result().due)"></p>
                        <p class="mt-2 text-sm text-muted">
                            <span x-text="$tc(':weeks weeks and :count day pregnant', ':weeks weeks and :count days pregnant', result().gestationalDays, { weeks: result().gestationalWeeks })"></span>
                            &middot; <span x-text="$t('Trimester :n', { n: result().trimester })"></span>
                            &middot; <span x-text="$t(':count days to go', { count: result().daysToGo })"></span>
                        </p>
                        <div class="mt-4 h-2.5 overflow-hidden rounded-full bg-sunken" role="progressbar" :aria-valuenow="result().progress" aria-valuemin="0" aria-valuemax="100">
                            <div class="h-full rounded-full bg-accent" :style="`width:${result().progress}%`"></div>
                        </div>
                    </div>
                    <div class="panel divide-y divide-line">
                        <div class="flex justify-between px-5 py-3 text-sm"><span class="text-muted">{{ __('Estimated conception') }}</span><span class="font-medium text-ink" x-text="shortDate(result().conception)"></span></div>
                        <template x-for="m in result().milestones" :key="m.label">
                            <div class="flex justify-between px-5 py-3 text-sm"><span class="text-muted" x-text="$t(m.label)"></span><span class="font-medium text-ink" x-text="shortDate(m.date)"></span></div>
                        </template>
                    </div>
                </div>
            </template>
            <p x-show="!result().ok" x-cloak class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" x-text="result().message"></p>
            <p class="mt-3 text-xs leading-5 text-faint">{{ __('For information only — not medical advice. Your healthcare provider will confirm your due date.') }}</p>
        </div>
    </div>
</x-tool-page>
