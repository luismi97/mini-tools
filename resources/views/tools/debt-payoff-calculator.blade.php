<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/debt-payoff-calculator.js')</x-slot:script>

    <div x-data="debtPayoffCalculator" @input.once="trackUse()" class="space-y-6">
        <div class="panel overflow-hidden">
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-line bg-paper/60 px-4 py-3">
                <h2 class="font-semibold tracking-tight">{{ __('Your debts') }}</h2>
                <select x-model="currency" class="field w-24 py-1.5" aria-label="{{ __('Currency') }}">
                    @foreach (\App\Support\Locales::currencies(['USD', 'CAD', 'AUD', 'GBP', 'EUR', 'MXN']) as $currency)
                        <option>{{ $currency }}</option>
                    @endforeach
                </select>
            </div>
            <div class="hidden grid-cols-[1.4fr_1fr_0.7fr_1fr_40px] gap-3 px-4 pt-3 text-xs text-muted sm:grid">
                <span>{{ __('Name') }}</span><span>{{ __('Balance') }}</span><span>APR %</span><span>{{ __('Min. payment') }}</span><span></span>
            </div>
            <ul class="divide-y divide-line sm:divide-y-0">
                <template x-for="(debt, i) in debts" :key="debt.id">
                    <li class="grid grid-cols-2 gap-3 px-4 py-3 sm:grid-cols-[1.4fr_1fr_0.7fr_1fr_40px] sm:py-2">
                        <input type="text" x-model="debt.name" class="field col-span-2 sm:col-span-1" :placeholder="$t('Debt :n', { n: i + 1 })" :aria-label="$t('Debt :n name', { n: i + 1 })">
                        <input type="number" inputmode="decimal" min="0" step="any" x-model="debt.balance" class="field" placeholder="{{ __('Balance') }}" :aria-label="$t('Debt :n balance', { n: i + 1 })">
                        <input type="number" inputmode="decimal" min="0" step="any" x-model="debt.apr" class="field" placeholder="{{ __('APR %') }}" :aria-label="$t('Debt :n interest rate', { n: i + 1 })">
                        <input type="number" inputmode="decimal" min="0" step="any" x-model="debt.minPayment" class="field" placeholder="{{ __('Minimum') }}" :aria-label="$t('Debt :n minimum payment', { n: i + 1 })">
                        <button type="button" class="btn btn-ghost px-2" @click="removeDebt(debt.id)" :disabled="debts.length === 1" :aria-label="$t('Remove debt :n', { n: i + 1 })"><x-icon name="x" :size="16" /></button>
                    </li>
                </template>
            </ul>
            <div class="flex flex-wrap items-end justify-between gap-4 border-t border-line p-4">
                <button type="button" class="btn btn-secondary" @click="addDebt()" :disabled="debts.length >= 20">{{ __('+ Add debt') }}</button>
                <div>
                    <label for="debt-extra" class="label">{{ __('Extra payment per month') }}</label>
                    <input id="debt-extra" type="number" inputmode="decimal" min="0" step="any" x-model="extra" class="field w-40">
                </div>
            </div>
        </div>

        <template x-if="plans().ok">
            <div class="space-y-6" aria-live="polite">
                <div class="grid gap-4 md:grid-cols-3">
                    @foreach (['avalanche' => ['Avalanche', 'Highest interest first'], 'snowball' => ['Snowball', 'Smallest balance first'], 'minimum' => ['Minimums only', 'No extra payments']] as $key => [$title, $subtitle])
                        <button type="button" @click="strategy = '{{ $key }}'"
                            class="panel p-4 text-left transition"
                            :class="strategy === '{{ $key }}' ? 'border-accent ring-2 ring-accent/20' : 'hover:border-line-strong'">
                            <p class="flex items-center justify-between">
                                <span class="font-semibold text-ink">{{ __($title) }}</span>
                                @if ($key === 'avalanche')
                                    <span class="rounded-full bg-success-soft px-2 py-0.5 text-xs text-success">{{ __('Saves most') }}</span>
                                @endif
                            </p>
                            <p class="text-xs text-muted">{{ __($subtitle) }}</p>
                            <p class="mt-3 text-2xl font-semibold tracking-tight text-ink" x-text="duration(plans().{{ $key }}.months)"></p>
                            <p class="text-sm text-muted" x-text="$t('Debt-free by :date', { date: dateAfter(plans().{{ $key }}.months) })"></p>
                            <p class="mt-2 text-sm text-muted">{{ __('Interest:') }} <span class="font-medium text-ink" x-text="money(plans().{{ $key }}.totalInterest)"></span></p>
                        </button>
                    @endforeach
                </div>

                <p x-show="strategy !== 'minimum'" class="rounded-lg bg-success-soft px-4 py-3 text-sm text-success"
                   x-text="$t('Compared with paying only the minimums, this plan saves :amount in interest and makes you debt-free :time sooner.', { amount: money(plans().minimum.totalInterest - selected(plans()).totalInterest), time: duration(plans().minimum.months - selected(plans()).months) })"></p>

                <div class="panel overflow-hidden">
                    <h2 class="border-b border-line px-5 py-3 font-semibold tracking-tight">{{ __('Payoff order') }}</h2>
                    <ol class="divide-y divide-line">
                        <template x-for="(debt, i) in selected(plans()).debts" :key="debt.name + i">
                            <li class="flex items-center gap-4 px-5 py-3 text-sm">
                                <span class="grid size-7 shrink-0 place-items-center rounded-full bg-accent-soft font-mono text-xs text-accent" x-text="i + 1"></span>
                                <span class="min-w-0 flex-1 truncate font-medium text-ink" x-text="debt.name"></span>
                                <span class="text-muted" x-text="$t('Paid off :date', { date: dateAfter(debt.paidOffMonth) })"></span>
                                <span class="hidden w-32 text-right text-muted sm:block" x-text="$t(':amount interest', { amount: money(debt.interestPaid) })"></span>
                            </li>
                        </template>
                    </ol>
                </div>
            </div>
        </template>
        <p x-show="!plans().ok" x-cloak class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" x-text="plans().message"></p>
        <p class="text-xs leading-5 text-faint">{{ __('Estimates assume fixed interest rates, no new charges and on-time payments. For informational purposes only.') }}</p>
    </div>
</x-tool-page>
