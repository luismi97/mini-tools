<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/bmi-calculator.js')</x-slot:script>

    <div x-data="bmiCalculator" @input.once="trackUse()" class="grid gap-6 lg:grid-cols-[360px_minmax(0,1fr)]">
        <div class="panel self-start p-5">
            <x-fields.body />
        </div>
        <div aria-live="polite">
            <template x-if="result().ok">
                <div class="panel space-y-6 p-5">
                    <div>
                        <p class="kicker">{{ __('Your BMI') }}</p>
                        <p class="mt-1 flex items-baseline gap-3">
                            <span class="text-5xl font-semibold tracking-tight text-ink" x-text="result().bmi"></span>
                            <span class="text-lg font-medium" :class="categoryClass(result().category)" x-text="$t(result().category)"></span>
                        </p>
                    </div>
                    <div>
                        <div class="relative h-3 rounded-full" style="background: linear-gradient(90deg, var(--color-info) 0 14%, var(--color-success) 14% 40%, var(--color-warning) 40% 60%, var(--color-danger) 60% 100%)">
                            <span class="absolute top-1/2 size-5 -translate-x-1/2 -translate-y-1/2 rounded-full border-[3px] border-surface bg-ink shadow" :style="`left:${markerLeft(result().bmi)}`"></span>
                        </div>
                        <div class="mt-2 grid grid-cols-[14%_26%_20%_40%] text-[11px] text-muted">
                            <span>&lt; 18.5</span><span>18.5–24.9</span><span>25–29.9</span><span>30+</span>
                        </div>
                    </div>
                    <p class="rounded-lg bg-sunken px-4 py-3 text-sm text-muted">
                        {{ __('Healthy weight for your height:') }}
                        <span class="font-medium text-ink" x-text="`${formatWeight(result().healthyMinKg)} – ${formatWeight(result().healthyMaxKg)}`"></span>
                    </p>
                </div>
            </template>
            <p x-show="!result().ok" x-cloak class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" x-text="result().message"></p>
            <p class="mt-3 text-xs leading-5 text-faint">{{ __('For adults 20+. BMI is a screening measure, not a diagnosis. This tool does not provide medical advice.') }}</p>
        </div>
    </div>
</x-tool-page>
