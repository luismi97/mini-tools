<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/loan-calculator.js')</x-slot:script>

    <div x-data="loanCalculator" class="grid gap-6 lg:grid-cols-[360px_minmax(0,1fr)]">
        {{-- Inputs --}}
        <form class="panel space-y-5 self-start p-5" @submit.prevent="calculate()" novalidate>
            <div>
                <label for="amount" class="label">{{ __('Loan amount') }}</label>
                <div class="flex">
                    <input id="amount" type="number" inputmode="decimal" min="0" step="any" x-model="form.amount" class="field rounded-r-none" :aria-invalid="!!errors.amount">
                    <select x-model="form.currency" class="field w-24 rounded-l-none border-l-0" aria-label="{{ __('Currency') }}">
                        @foreach (\App\Support\Locales::currencies(['USD', 'EUR', 'GBP', 'CAD', 'AUD', 'MXN', 'INR']) as $currency)
                            <option>{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>
                <p x-show="errors.amount" x-text="errors.amount" class="mt-1 text-sm text-danger" x-cloak></p>
            </div>

            <div>
                <label for="rate" class="label">{{ __('Interest rate (APR)') }}</label>
                <div class="relative">
                    <input id="rate" type="number" inputmode="decimal" min="0" max="100" step="any" x-model="form.rate" class="field pr-8" :aria-invalid="!!errors.rate">
                    <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-sm text-faint">%</span>
                </div>
                <p x-show="errors.rate" x-text="errors.rate" class="mt-1 text-sm text-danger" x-cloak></p>
            </div>

            <div>
                <label for="term" class="label">{{ __('Loan term') }}</label>
                <div class="flex">
                    <input id="term" type="number" inputmode="numeric" min="1" step="1" x-model="form.term" class="field rounded-r-none" :aria-invalid="!!errors.term">
                    <select x-model="form.termUnit" class="field w-28 rounded-l-none border-l-0" aria-label="{{ __('Term unit') }}">
                        <option value="years">{{ __('Years') }}</option>
                        <option value="months">{{ __('Months') }}</option>
                    </select>
                </div>
                <p x-show="errors.term" x-text="errors.term" class="mt-1 text-sm text-danger" x-cloak></p>
            </div>

            <fieldset>
                <legend class="label">{{ __('Payment frequency') }}</legend>
                <div class="grid grid-cols-3 gap-1 rounded-lg bg-sunken p-1">
                    <template x-for="(meta, key) in frequencies" :key="key">
                        <label class="cursor-pointer rounded-md px-2 py-1.5 text-center text-sm transition"
                               :class="form.frequency === key ? 'bg-surface font-medium text-ink shadow-sm' : 'text-muted hover:text-ink'">
                            <input type="radio" name="frequency" class="sr-only" :value="key" x-model="form.frequency">
                            <span x-text="$t(meta.label)"></span>
                        </label>
                    </template>
                </div>
            </fieldset>

            <button type="submit" class="btn btn-primary w-full">
                <x-icon name="calculator" :size="16" /> {{ __('Calculate') }}
            </button>
        </form>

        {{-- Results --}}
        <div class="min-w-0 space-y-6">
            <div class="panel p-5" aria-live="polite">
                <template x-if="result">
                    <div>
                        <p class="kicker" x-text="$t(frequencies[form.frequency].label + ' payment')"></p>
                        <p class="mt-1 text-4xl font-semibold tracking-tight text-ink" x-text="money(result.payment)"></p>
                        <p class="mt-1 text-sm text-muted" x-text="$t(frequencies[form.frequency].summary, { count: result.periods })"></p>

                        <dl class="mt-6 grid gap-4 sm:grid-cols-3">
                            <div class="rounded-lg bg-sunken p-4">
                                <dt class="text-xs text-muted">{{ __('Loan amount') }}</dt>
                                <dd class="mt-1 font-semibold text-ink" x-text="money(Number(form.amount))"></dd>
                            </div>
                            <div class="rounded-lg bg-sunken p-4">
                                <dt class="text-xs text-muted">{{ __('Total interest') }}</dt>
                                <dd class="mt-1 font-semibold text-ink" x-text="money(result.totalInterest)"></dd>
                            </div>
                            <div class="rounded-lg bg-sunken p-4">
                                <dt class="text-xs text-muted">{{ __('Total paid') }}</dt>
                                <dd class="mt-1 font-semibold text-ink" x-text="money(result.totalPaid)"></dd>
                            </div>
                        </dl>

                        <div class="mt-6">
                            <div class="flex h-2.5 overflow-hidden rounded-full bg-sunken" role="img" :aria-label="$t('Principal :a%, interest :b%', { a: 100 - interestShare, b: interestShare })">
                                <div class="bg-accent" :style="`width: ${100 - interestShare}%`"></div>
                                <div class="bg-line-strong" :style="`width: ${interestShare}%`"></div>
                            </div>
                            <div class="mt-2 flex justify-between text-xs text-muted">
                                <span class="flex items-center gap-1.5"><span class="size-2 rounded-full bg-accent"></span> {{ __('Principal') }} <span x-text="(100 - interestShare) + '%'"></span></span>
                                <span class="flex items-center gap-1.5"><span class="size-2 rounded-full bg-line-strong"></span> {{ __('Interest') }} <span x-text="interestShare + '%'"></span></span>
                            </div>
                        </div>
                    </div>
                </template>
                <p x-show="!result" class="py-6 text-center text-sm text-muted">{{ __('Fix the highlighted fields to see your results.') }}</p>
            </div>

            {{-- Amortization schedule --}}
            <div x-show="result" class="panel overflow-hidden">
                <div class="flex flex-wrap items-center justify-between gap-3 border-b border-line px-5 py-3">
                    <h2 class="font-semibold tracking-tight">{{ __('Amortization schedule') }}</h2>
                    <div class="flex items-center gap-2">
                        <div class="flex rounded-lg bg-sunken p-1 text-sm">
                            <button type="button" class="rounded-md px-3 py-1" :class="view === 'yearly' ? 'bg-surface font-medium shadow-sm' : 'text-muted'" @click="view = 'yearly'">{{ __('By year') }}</button>
                            <button type="button" class="rounded-md px-3 py-1" :class="view === 'payments' ? 'bg-surface font-medium shadow-sm' : 'text-muted'" @click="view = 'payments'">{{ __('By payment') }}</button>
                        </div>
                        <button type="button" class="btn btn-ghost px-2.5 py-1.5" @click="exportCsv()">
                            <x-icon name="download" :size="16" /> CSV
                        </button>
                    </div>
                </div>
                <div class="max-h-[32rem] overflow-auto">
                    <table class="w-full text-right text-sm tabular-nums">
                        <thead class="sticky top-0 bg-surface text-xs text-muted shadow-[0_1px_0_var(--color-line)]">
                            <tr>
                                <th class="px-5 py-2.5 text-left font-medium" x-text="view === 'yearly' ? $t('Year') : '#'"></th>
                                <th class="px-3 py-2.5 font-medium">{{ __('Payment') }}</th>
                                <th class="px-3 py-2.5 font-medium">{{ __('Principal') }}</th>
                                <th class="px-3 py-2.5 font-medium">{{ __('Interest') }}</th>
                                <th class="px-5 py-2.5 font-medium">{{ __('Balance') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-line">
                            <template x-for="row in (view === 'yearly' ? years : rows)" :key="view + (row.year || row.period)">
                                <tr class="hover:bg-paper">
                                    <td class="px-5 py-2 text-left text-muted" x-text="row.year || row.period"></td>
                                    <td class="px-3 py-2" x-text="money(row.payment)"></td>
                                    <td class="px-3 py-2" x-text="money(row.principal)"></td>
                                    <td class="px-3 py-2" x-text="money(row.interest)"></td>
                                    <td class="px-5 py-2 font-medium text-ink" x-text="money(row.balance)"></td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                    <div x-show="view === 'payments' && result && visibleRows < result.periods" class="border-t border-line p-3 text-center">
                        <button type="button" class="btn btn-secondary" @click="visibleRows = result.periods">
                            {{ __('Show all') }} <span x-text="result?.periods"></span> {{ __('payments') }}
                        </button>
                    </div>
                </div>
            </div>

            <p class="text-xs leading-5 text-faint">
                {{ __('This calculator provides estimates for informational purposes only.') }}
                {{ __('Actual loan terms may vary by lender.') }}
            </p>
        </div>
    </div>
</x-tool-page>
