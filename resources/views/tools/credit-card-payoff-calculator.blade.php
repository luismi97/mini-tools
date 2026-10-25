<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/credit-card-payoff-calculator.js')</x-slot:script>

    <div x-data="creditCardPayoff" @input.once="trackUse()" class="grid gap-6 lg:grid-cols-[360px_minmax(0,1fr)]">
        <form class="panel space-y-5 self-start p-5" @submit.prevent novalidate>
            <div>
                <label for="cc-balance" class="label">{{ __('Card balance') }}</label>
                <div class="flex">
                    <input id="cc-balance" type="number" inputmode="decimal" min="0" step="any" x-model="form.balance" class="field rounded-r-none">
                    <select x-model="form.currency" class="field w-24 rounded-l-none border-l-0" aria-label="{{ __('Currency') }}">
                        @foreach (\App\Support\Locales::currencies(['USD', 'EUR', 'GBP', 'CAD', 'AUD', 'MXN', 'INR']) as $currency)
                            <option>{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label for="cc-apr" class="label">{{ __('Interest rate (APR)') }}</label>
                <div class="relative">
                    <input id="cc-apr" type="number" inputmode="decimal" min="0" max="100" step="any" x-model="form.apr" class="field pr-8">
                    <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-sm text-faint">%</span>
                </div>
            </div>

            <div class="space-y-3">
                <p class="label">{{ __('I want to…') }}</p>
                <x-segmented model="form.mode" :options="['payment' => 'Pay a fixed amount', 'months' => 'Be debt-free by']" :label="__('Calculation')" class="w-full flex-wrap [&>button]:flex-1" />
                <div x-show="form.mode === 'payment'">
                    <label for="cc-payment" class="mb-1 block text-xs text-muted">{{ __('Monthly payment') }}</label>
                    <input id="cc-payment" type="number" inputmode="decimal" min="0" step="any" x-model="form.payment" class="field">
                </div>
                <div x-show="form.mode === 'months'" x-cloak>
                    <label for="cc-months" class="mb-1 block text-xs text-muted">{{ __('Months to pay it off') }}</label>
                    <input id="cc-months" type="number" inputmode="numeric" min="1" max="600" step="1" x-model="form.months" class="field">
                    <div class="mt-2 flex flex-wrap gap-1">
                        @foreach ([12, 18, 24, 36, 48] as $m)
                            <button type="button" class="rounded-md border border-line px-2.5 py-1 text-xs transition" @click="form.months = {{ $m }}"
                                :class="Number(form.months) === {{ $m }} ? 'border-accent bg-accent-soft text-accent' : 'text-muted hover:border-line-strong'">{{ trans_choice(':count month|:count months', $m, ['count' => $m]) }}</button>
                        @endforeach
                    </div>
                </div>
            </div>

            <details class="group rounded-lg border border-line">
                <summary class="flex cursor-pointer list-none items-center justify-between px-3 py-2 text-sm font-medium text-ink [&::-webkit-details-marker]:hidden">
                    {{ __('Minimum payment terms') }}
                    <x-icon name="chevron-right" :size="16" class="text-faint transition group-open:rotate-90" />
                </summary>
                <div class="space-y-3 border-t border-line p-3">
                    <p class="text-xs text-muted">{{ __('Used for the comparison. Most cards charge interest plus a percentage of the balance, with a fixed minimum.') }}</p>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="cc-min-pct" class="mb-1 block text-xs text-muted">{{ __('Interest + % of balance') }}</label>
                            <input id="cc-min-pct" type="number" inputmode="decimal" min="0" step="any" x-model="form.minPercent" class="field">
                        </div>
                        <div>
                            <label for="cc-min-floor" class="mb-1 block text-xs text-muted">{{ __('At least') }}</label>
                            <input id="cc-min-floor" type="number" inputmode="decimal" min="0" step="any" x-model="form.minFloor" class="field">
                        </div>
                    </div>
                </div>
            </details>
        </form>

        <div class="min-w-0 space-y-6" aria-live="polite">
            <template x-if="result().ok">
                <div class="space-y-6">
                    <div class="panel p-5">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div class="min-w-0">
                                <template x-if="form.mode === 'payment'">
                                    <div>
                                        <p class="kicker">{{ __('Time to pay off') }}</p>
                                        <p class="mt-1 text-4xl font-semibold tracking-tight text-ink" x-text="duration(result().plan.months)"></p>
                                    </div>
                                </template>
                                <template x-if="form.mode === 'months'">
                                    <div>
                                        <p class="kicker">{{ __('Monthly payment needed') }}</p>
                                        <p class="mt-1 text-4xl font-semibold tracking-tight text-ink" x-text="money(result().payment)"></p>
                                    </div>
                                </template>
                                <p class="mt-1 text-sm text-muted" x-text="$t('Debt-free by :date', { date: payoffDate(result().plan.months) })"></p>
                            </div>
                            <button type="button" class="btn btn-ghost px-2.5 py-1.5" @click="copyLink()">
                                <x-icon name="link" :size="16" /> <span x-text="copied ? $t('Link copied') : $t('Copy link')">{{ __('Copy link') }}</span>
                            </button>
                        </div>
                        <dl class="mt-5 grid gap-3 sm:grid-cols-3">
                            <div class="rounded-lg bg-sunken p-3"><dt class="text-xs text-muted">{{ __('Payments') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="$tc(':count month', ':count months', result().plan.months)"></dd></div>
                            <div class="rounded-lg bg-sunken p-3"><dt class="text-xs text-muted">{{ __('Total interest') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="money(result().plan.totalInterest)"></dd></div>
                            <div class="rounded-lg bg-sunken p-3"><dt class="text-xs text-muted">{{ __('Total paid') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="money(result().plan.totalPaid)"></dd></div>
                        </dl>
                    </div>

                    <div x-show="result().minimum" class="grid gap-4 sm:grid-cols-2">
                        <div class="panel border-accent p-4 ring-2 ring-accent/20">
                            <p class="text-sm font-semibold text-ink" x-text="$t('Your plan')"></p>
                            <p class="text-xs text-muted" x-text="$t(':amount per month', { amount: money(result().payment) })"></p>
                            <p class="mt-3 text-2xl font-semibold tracking-tight text-ink" x-text="duration(result().plan.months)"></p>
                            <p class="text-sm text-muted">{{ __('Interest:') }} <span class="font-medium text-ink" x-text="money(result().plan.totalInterest)"></span></p>
                        </div>
                        <div class="panel p-4">
                            <p class="text-sm font-semibold text-ink" x-text="$t('Paying the minimum')"></p>
                            <p class="text-xs text-muted" x-text="result().minimum && $t('Starts at :amount and shrinks with the balance', { amount: money(result().minimum.firstPayment) })"></p>
                            <p class="mt-3 text-2xl font-semibold tracking-tight text-ink" x-text="result().minimum && duration(result().minimum.months)"></p>
                            <p class="text-sm text-muted">{{ __('Interest:') }} <span class="font-medium text-ink" x-text="result().minimum && money(result().minimum.totalInterest)"></span></p>
                        </div>
                    </div>

                    <p x-show="result().minimum && result().minimum.totalInterest > result().plan.totalInterest" class="rounded-lg bg-success-soft px-4 py-3 text-sm text-success"
                       x-text="result().minimum && $t('Compared with paying only the minimums, this plan saves :amount in interest and makes you debt-free :time sooner.', { amount: money(result().minimum.totalInterest - result().plan.totalInterest), time: duration(Math.max(0, result().minimum.months - result().plan.months)) })"></p>

                    <x-balance-chart data="chart()" :label="__('Your plan')" :compare-label="__('Paying the minimum')" />
                </div>
            </template>
            <p x-show="!result().ok" x-cloak class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" x-text="result().message"></p>
            <p class="text-xs leading-5 text-faint">{{ __('Estimates assume a fixed interest rate, no new purchases and on-time payments. For informational purposes only.') }}</p>
        </div>
    </div>
</x-tool-page>
