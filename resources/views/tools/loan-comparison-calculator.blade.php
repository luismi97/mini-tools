<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/loan-comparison-calculator.js')</x-slot:script>

    <div x-data="loanComparison" @input.once="trackUse()" class="space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <p class="text-sm text-muted">{{ __('Enter each offer exactly as the lender quotes it. Fees are upfront costs such as origination or closing fees.') }}</p>
            <select x-model="currency" class="field w-24 py-1.5" aria-label="{{ __('Currency') }}">
                @foreach (\App\Support\Locales::currencies(['USD', 'EUR', 'GBP', 'CAD', 'AUD', 'MXN', 'INR']) as $currency)
                    <option>{{ $currency }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4" aria-live="polite">
            <template x-for="(offer, i) in offers" :key="i">
                <section class="panel flex flex-col overflow-hidden transition"
                    :class="results()[i].cheapest ? 'border-accent ring-2 ring-accent/20' : ''">
                    <header class="flex items-center justify-between gap-2 border-b border-line bg-paper/60 px-4 py-2.5">
                        <h2 class="font-semibold tracking-tight text-ink" x-text="$t('Offer :letter', { letter: letter(i) })"></h2>
                        <button type="button" class="btn btn-ghost px-1.5 py-1" @click="removeOffer(i)" x-show="offers.length > 2" :aria-label="$t('Remove offer :letter', { letter: letter(i) })"><x-icon name="x" :size="16" /></button>
                    </header>

                    <div class="grid grid-cols-2 gap-3 p-4">
                        <div class="col-span-2">
                            <label :for="`lc-amount-${i}`" class="mb-1 block text-xs text-muted">{{ __('Loan amount') }}</label>
                            <input :id="`lc-amount-${i}`" type="number" inputmode="decimal" min="0" step="any" x-model="offer.amount" class="field">
                        </div>
                        <div>
                            <label :for="`lc-apr-${i}`" class="mb-1 block text-xs text-muted">{{ __('Interest rate (%)') }}</label>
                            <input :id="`lc-apr-${i}`" type="number" inputmode="decimal" min="0" step="any" x-model="offer.apr" class="field">
                        </div>
                        <div>
                            <label :for="`lc-fees-${i}`" class="mb-1 block text-xs text-muted">{{ __('Fees') }}</label>
                            <input :id="`lc-fees-${i}`" type="number" inputmode="decimal" min="0" step="any" x-model="offer.fees" class="field" placeholder="0">
                        </div>
                        <div class="col-span-2">
                            <label :for="`lc-term-${i}`" class="mb-1 block text-xs text-muted">{{ __('Loan term') }}</label>
                            <div class="flex">
                                <input :id="`lc-term-${i}`" type="number" inputmode="numeric" min="1" step="1" x-model="offer.term" class="field min-w-0 rounded-r-none">
                                <select x-model="offer.unit" class="field w-28 rounded-l-none border-l-0" aria-label="{{ __('Term unit') }}">
                                    <option value="years">{{ __('Years') }}</option>
                                    <option value="months">{{ __('Months') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-auto border-t border-line bg-sunken/50 p-4">
                        <template x-if="results()[i].ok">
                            <div>
                                <div class="flex flex-wrap gap-1.5">
                                    <span x-show="results()[i].cheapest" class="rounded-full bg-success-soft px-2 py-0.5 text-xs font-medium text-success">{{ __('Cheapest overall') }}</span>
                                    <span x-show="results()[i].lowestPayment" class="rounded-full bg-accent-soft px-2 py-0.5 text-xs font-medium text-accent">{{ __('Lowest payment') }}</span>
                                </div>
                                <p class="mt-2 text-xs text-muted">{{ __('Monthly payment') }}</p>
                                <p class="text-2xl font-semibold tracking-tight text-ink" x-text="money(results()[i].payment)"></p>
                                <dl class="mt-3 space-y-1.5 text-sm">
                                    <div class="flex justify-between gap-2"><dt class="text-muted">{{ __('Total interest') }}</dt><dd class="tabular-nums text-ink" x-text="money(results()[i].totalInterest)"></dd></div>
                                    <div class="flex justify-between gap-2"><dt class="text-muted">{{ __('Fees') }}</dt><dd class="tabular-nums text-ink" x-text="money(results()[i].fees)"></dd></div>
                                    <div class="flex justify-between gap-2 border-t border-line pt-1.5 font-medium"><dt class="text-ink">{{ __('Total cost of borrowing') }}</dt><dd class="tabular-nums text-ink" x-text="money(results()[i].totalCost)"></dd></div>
                                    <div class="flex justify-between gap-2"><dt class="text-muted" title="{{ __('The interest rate once fees are included.') }}">{{ __('Effective APR') }}</dt><dd class="tabular-nums text-ink" x-text="percent(results()[i].effectiveApr)"></dd></div>
                                </dl>
                            </div>
                        </template>
                        <p x-show="!results()[i].ok" class="text-sm text-danger" x-text="results()[i].error"></p>
                    </div>
                </section>
            </template>

            <button type="button" x-show="canAdd()" @click="addOffer()"
                class="panel grid min-h-40 place-items-center border-2 border-dashed border-line-strong p-6 text-sm font-medium text-muted transition hover:border-accent hover:text-accent">
                <span class="flex flex-col items-center gap-2"><span class="grid size-10 place-items-center rounded-full bg-accent-soft text-lg text-accent">+</span> {{ __('Add another offer') }}</span>
            </button>
        </div>

        <p x-show="verdict()" class="rounded-lg bg-success-soft px-4 py-3 text-sm text-success"
           x-text="verdict() && $t('Offer :cheapest costs :amount less than Offer :priciest over the life of the loan.', { cheapest: verdict().cheapest, priciest: verdict().priciest, amount: money(verdict().difference) })"></p>

        <p class="text-xs leading-5 text-faint">{{ __('This calculator provides estimates for informational purposes only. Actual loan terms may vary by lender.') }}</p>
    </div>
</x-tool-page>
