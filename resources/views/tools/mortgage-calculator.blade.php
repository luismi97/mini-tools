<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/mortgage-calculator.js')</x-slot:script>

    <div x-data="mortgageCalculator" @input.once="trackUse()" class="grid gap-6 lg:grid-cols-[380px_minmax(0,1fr)]">
        <form class="panel space-y-5 self-start p-5" @submit.prevent novalidate>
            <div>
                <label for="m-price" class="label">{{ __('Home price') }}</label>
                <div class="flex">
                    <input id="m-price" type="number" inputmode="decimal" min="0" step="any" x-model="form.homePrice" class="field rounded-r-none">
                    <select x-model="form.currency" class="field w-24 rounded-l-none border-l-0" aria-label="{{ __('Currency') }}">
                        @foreach (\App\Support\Locales::currencies(['USD', 'CAD', 'AUD', 'GBP', 'EUR']) as $currency)
                            <option>{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <label for="m-down" class="label">{{ __('Down payment') }}</label>
                <div class="flex">
                    <input id="m-down" type="number" inputmode="decimal" min="0" step="any" x-model="form.downPayment" class="field rounded-r-none">
                    <select x-model="form.downPaymentType" class="field w-20 rounded-l-none border-l-0" aria-label="{{ __('Down payment type') }}">
                        <option value="percent">%</option>
                        <option value="amount" x-text="symbol()">$</option>
                    </select>
                </div>
                <p class="mt-1 text-xs text-faint" x-show="result().ok" x-text="form.downPaymentType === 'percent' ? money(result().downPayment) : result().downPercent + '%'"></p>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="m-term" class="label">{{ __('Loan term') }}</label>
                    <select id="m-term" x-model.number="form.termYears" class="field">
                        @foreach ([30, 25, 20, 15, 10] as $years)
                            <option value="{{ $years }}">{{ trans_choice(':count year|:count years', $years, ['count' => $years]) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="m-rate" class="label">{{ __('Interest rate (%)') }}</label>
                    <input id="m-rate" type="number" inputmode="decimal" min="0" max="30" step="any" x-model="form.annualRate" class="field">
                </div>
            </div>

            <details class="group rounded-lg border border-line" open>
                <summary class="flex cursor-pointer list-none items-center justify-between px-3 py-2 text-sm font-medium text-ink [&::-webkit-details-marker]:hidden">
                    {{ __('Taxes, insurance & fees') }}
                    <x-icon name="chevron-right" :size="16" class="text-faint transition group-open:rotate-90" />
                </summary>
                <div class="grid grid-cols-2 gap-3 border-t border-line p-3">
                    <div>
                        <label for="m-tax" class="mb-1 block text-xs text-muted">{{ __('Property tax (%/year)') }}</label>
                        <input id="m-tax" type="number" inputmode="decimal" min="0" step="any" x-model="form.propertyTaxRate" class="field">
                    </div>
                    <div>
                        <label for="m-ins" class="mb-1 block text-xs text-muted">{{ __('Home insurance per year') }}</label>
                        <input id="m-ins" type="number" inputmode="decimal" min="0" step="any" x-model="form.insurance" class="field">
                    </div>
                    <div>
                        <label for="m-pmi" class="mb-1 block text-xs text-muted">{{ __('PMI (%/year)') }}</label>
                        <input id="m-pmi" type="number" inputmode="decimal" min="0" step="any" x-model="form.pmiRate" class="field">
                    </div>
                    <div>
                        <label for="m-hoa" class="mb-1 block text-xs text-muted">{{ __('HOA fees per month') }}</label>
                        <input id="m-hoa" type="number" inputmode="decimal" min="0" step="any" x-model="form.hoa" class="field">
                    </div>
                </div>
            </details>

            <div class="border-t border-line pt-5">
                <label for="m-extra" class="label">{{ __('Extra payment per month') }}</label>
                <input id="m-extra" type="number" inputmode="decimal" min="0" step="any" x-model="form.extraPayment" class="field" placeholder="0">
                <p class="mt-1 text-xs text-faint">{{ __('Optional: see how paying a little more each time shortens the loan.') }}</p>
            </div>
        </form>

        <div class="min-w-0 space-y-6" aria-live="polite">
            <template x-if="result().ok">
                <div class="space-y-6">
                    <div class="panel p-5">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="kicker">{{ __('Monthly payment') }}</p>
                                <p class="mt-1 text-4xl font-semibold tracking-tight text-ink" x-text="money(result().monthlyTotal)"></p>
                            </div>
                            <button type="button" class="btn btn-ghost px-2.5 py-1.5" @click="copyLink()">
                                <x-icon name="link" :size="16" /> <span x-text="copied ? $t('Link copied') : $t('Copy link')">{{ __('Copy link') }}</span>
                            </button>
                        </div>
                        <p class="mt-1 text-sm text-muted" x-text="$t('Loan amount :amount · :percent% down · paid off :date', { amount: money(result().loanAmount), percent: result().downPercent, date: payoffDate(result().months) })"></p>

                        <p x-show="result().periodsSaved > 0" class="mt-4 rounded-lg bg-success-soft px-4 py-3 text-sm text-success"
                           x-text="$t('Paying :extra extra saves :amount in interest and finishes :time sooner.', { extra: money(result().extraPayment), amount: money(result().interestSaved), time: duration(result().periodsSaved) })"></p>

                        <div class="mt-5 flex h-3 overflow-hidden rounded-full bg-sunken" role="img" aria-label="{{ __('Monthly payment breakdown') }}">
                            <template x-for="row in breakdown(result())" :key="row.label">
                                <div :class="row.color" :style="`width:${share(row.value, result().monthlyTotal)}%`"></div>
                            </template>
                        </div>
                        <dl class="mt-4 divide-y divide-line text-sm">
                            <template x-for="row in breakdown(result())" :key="row.label">
                                <div class="flex items-center justify-between gap-3 py-2">
                                    <dt class="flex items-center gap-2 text-muted"><span class="size-2.5 shrink-0 rounded-full" :class="row.color"></span><span x-text="$t(row.label)"></span></dt>
                                    <dd class="font-medium tabular-nums text-ink" x-text="money(row.value)"></dd>
                                </div>
                            </template>
                        </dl>
                        <p x-show="result().pmi > 0" class="mt-3 text-xs text-muted" x-text="$t('PMI is estimated for the first :count months, until the balance reaches 78% of the home price.', { count: result().pmiMonths })"></p>
                    </div>

                    <dl class="grid gap-4 sm:grid-cols-3">
                        <div class="panel p-4"><dt class="text-xs text-muted">{{ __('Total interest') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="money(result().totalInterest)"></dd></div>
                        <div class="panel p-4"><dt class="text-xs text-muted">{{ __('Total of payments') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="money(result().totalPrincipalAndInterest)"></dd></div>
                        <div class="panel p-4"><dt class="text-xs text-muted">{{ __('Total cost of home') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="money(result().totalCost)"></dd></div>
                    </dl>

                    <x-balance-chart data="chart()" :label="__('Remaining balance')" :compare-label="__('Without extra payments')" />

                    <div class="panel overflow-hidden">
                        <h2 class="border-b border-line px-5 py-3 font-semibold tracking-tight">{{ __('Amortization by year') }}</h2>
                        <div class="max-h-[26rem] overflow-auto">
                            <table class="w-full text-right text-sm tabular-nums">
                                <thead class="sticky top-0 bg-surface text-xs text-muted shadow-[0_1px_0_var(--color-line)]">
                                    <tr><th class="px-5 py-2.5 text-left font-medium">{{ __('Year') }}</th><th class="px-3 py-2.5 font-medium">{{ __('Principal') }}</th><th class="px-3 py-2.5 font-medium">{{ __('Interest') }}</th><th class="px-5 py-2.5 font-medium">{{ __('Balance') }}</th></tr>
                                </thead>
                                <tbody class="divide-y divide-line">
                                    <template x-for="row in result().yearly" :key="row.year">
                                        <tr class="hover:bg-paper">
                                            <td class="px-5 py-2 text-left text-muted" x-text="row.year"></td>
                                            <td class="px-3 py-2" x-text="money(row.principal)"></td>
                                            <td class="px-3 py-2" x-text="money(row.interest)"></td>
                                            <td class="px-5 py-2 font-medium text-ink" x-text="money(row.balance)"></td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </template>
            <p x-show="!result().ok" x-cloak class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" x-text="result().message"></p>
            <p class="text-xs leading-5 text-faint">{{ __('This calculator provides estimates for informational purposes only. Actual loan terms, taxes and insurance may vary by lender and location.') }}</p>
        </div>
    </div>
</x-tool-page>
