<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/auto-loan-calculator.js')</x-slot:script>

    <div x-data="autoLoanCalculator" @input.once="trackUse()" class="grid gap-6 lg:grid-cols-[380px_minmax(0,1fr)]">
        <form class="panel space-y-4 self-start p-5" @submit.prevent novalidate>
            <div>
                <label for="al-price" class="label">{{ __('Vehicle price') }}</label>
                <div class="flex">
                    <input id="al-price" type="number" inputmode="decimal" min="0" step="any" x-model="form.price" class="field rounded-r-none">
                    <select x-model="currency" class="field w-24 rounded-l-none border-l-0" aria-label="{{ __('Currency') }}">
                        @foreach (\App\Support\Locales::currencies(['USD', 'CAD', 'AUD', 'GBP', 'EUR']) as $currency)
                            <option>{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                @foreach (['downPayment' => 'Down payment', 'tradeIn' => 'Trade-in value', 'tradeInOwed' => 'Owed on trade-in', 'fees' => 'Fees', 'salesTaxRate' => 'Sales tax (%)', 'annualRate' => 'Interest rate (%)'] as $field => $label)
                    <div>
                        <label for="al-{{ $field }}" class="mb-1 block text-xs text-muted">{{ __($label) }}</label>
                        <input id="al-{{ $field }}" type="number" inputmode="decimal" min="0" step="any" x-model="form.{{ $field }}" class="field">
                    </div>
                @endforeach
            </div>
            <div>
                <p class="label">{{ __('Loan term') }}</p>
                <div class="grid grid-cols-5 gap-1 rounded-lg bg-sunken p-1">
                    <template x-for="m in terms" :key="m">
                        <button type="button" class="rounded-md py-1.5 text-sm transition" @click="form.months = m"
                            :class="Number(form.months) === m ? 'bg-surface font-medium text-ink shadow-sm' : 'text-muted hover:text-ink'" x-text="m"></button>
                    </template>
                </div>
                <p class="mt-1 text-xs text-faint">{{ __('months') }}</p>
            </div>
            <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="form.taxAfterTradeIn" class="size-4 accent-accent"> {{ __('Sales tax on price minus trade-in') }}</label>
        </form>

        <div class="min-w-0 space-y-4" aria-live="polite">
            <template x-if="result().ok">
                <div class="space-y-4">
                    <div class="panel p-5">
                        <p class="kicker">{{ __('Monthly payment') }}</p>
                        <p class="mt-1 text-4xl font-semibold tracking-tight text-ink" x-text="money(result().monthlyPayment)"></p>
                        <p class="mt-1 text-sm text-muted" x-text="$t(':count payments', { count: result().months })"></p>
                        <dl class="mt-5 grid gap-3 sm:grid-cols-2">
                            <div class="rounded-lg bg-sunken p-3"><dt class="text-xs text-muted">{{ __('Amount financed') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="money(result().amountFinanced)"></dd></div>
                            <div class="rounded-lg bg-sunken p-3"><dt class="text-xs text-muted">{{ __('Sales tax') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="money(result().salesTax)"></dd></div>
                            <div class="rounded-lg bg-sunken p-3"><dt class="text-xs text-muted">{{ __('Total interest') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="money(result().totalInterest)"></dd></div>
                            <div class="rounded-lg bg-sunken p-3"><dt class="text-xs text-muted">{{ __('Total cost of the car') }}</dt><dd class="mt-1 font-semibold text-ink" x-text="money(result().totalCost)"></dd></div>
                        </dl>
                    </div>
                    <div class="panel overflow-hidden">
                        <h2 class="border-b border-line px-5 py-3 font-semibold tracking-tight">{{ __('Compare loan terms') }}</h2>
                        <table class="w-full text-right text-sm tabular-nums">
                            <thead class="text-xs text-muted"><tr><th class="px-5 py-2 text-left font-medium">{{ __('Term') }}</th><th class="px-3 py-2 font-medium">{{ __('Monthly') }}</th><th class="px-5 py-2 font-medium">{{ __('Total interest') }}</th></tr></thead>
                            <tbody class="divide-y divide-line">
                                <template x-for="row in comparison()" :key="row.months">
                                    <tr :class="Number(form.months) === row.months ? 'bg-accent-soft' : ''">
                                        <td class="px-5 py-2 text-left text-ink" x-text="$t(':count months', { count: row.months })"></td>
                                        <td class="px-3 py-2 text-ink" x-text="money(row.payment)"></td>
                                        <td class="px-5 py-2 text-muted" x-text="money(row.interest)"></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </template>
            <p x-show="!result().ok" x-cloak class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" x-text="result().message"></p>
            <p class="text-xs leading-5 text-faint">{{ __('This calculator provides estimates for informational purposes only. Actual loan terms may vary by lender.') }}</p>
        </div>
    </div>
</x-tool-page>
