<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/calorie-calculator.js')</x-slot:script>

    <div x-data="calorieCalculator" @input.once="trackUse()" @change.once="trackUse()" class="grid gap-6 lg:grid-cols-[380px_minmax(0,1fr)]">
        <div class="panel space-y-5 self-start p-5">
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <p class="label">{{ __('Sex') }}</p>
                    <x-segmented model="sex" :options="['female' => 'Female', 'male' => 'Male']" :label="__('Sex')" class="w-full [&>button]:flex-1" />
                </div>
                <div>
                    <label for="cal-age" class="label">{{ __('Age') }}</label>
                    <input id="cal-age" type="number" min="15" max="100" x-model="age" class="field">
                </div>
            </div>
            <x-fields.body />
            <div>
                <label for="cal-activity" class="label">{{ __('Activity level') }}</label>
                <select id="cal-activity" x-model="activity" class="field">
                    <template x-for="(meta, key) in activities" :key="key">
                        <option :value="key" x-text="$t(meta.label)" :selected="key === activity"></option>
                    </template>
                </select>
            </div>
        </div>

        <div aria-live="polite">
            <template x-if="result().ok">
                <div class="space-y-4">
                    <div class="panel p-5">
                        <p class="kicker">{{ __('Calories to maintain your weight') }}</p>
                        <p class="mt-1 text-5xl font-semibold tracking-tight text-ink"><span x-text="n(result().maintain)"></span> <span class="text-xl font-normal text-muted">{{ __('kcal/day') }}</span></p>
                        <p class="mt-2 text-sm text-muted" x-text="$t('Basal metabolic rate (BMR): :value kcal/day', { value: n(result().bmr) })"></p>
                    </div>
                    <div class="panel divide-y divide-line">
                        <template x-for="g in goals(result())" :key="g.label">
                            <div class="flex items-center justify-between gap-4 px-5 py-3" :class="g.note === 'TDEE' ? 'bg-accent-soft' : ''">
                                <div>
                                    <p class="text-sm font-medium text-ink" x-text="$t(g.label)"></p>
                                    <p class="text-xs text-muted" x-text="$t(g.note)"></p>
                                </div>
                                <p class="text-lg font-semibold tabular-nums text-ink" x-text="`${n(g.value)} kcal`"></p>
                            </div>
                        </template>
                    </div>
                </div>
            </template>
            <p x-show="!result().ok" x-cloak class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" x-text="result().message"></p>
            <p class="mt-3 text-xs leading-5 text-faint">{{ __('Estimates for healthy adults. Not medical advice — consult a professional for personalized guidance.') }}</p>
        </div>
    </div>
</x-tool-page>
