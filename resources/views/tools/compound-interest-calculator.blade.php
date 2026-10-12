<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/compound-interest-calculator.js')</x-slot:script>

    <div x-data="compoundInterestCalculator" @input.once="trackUse()" class="grid gap-6 lg:grid-cols-[360px_minmax(0,1fr)]">
        <form class="panel space-y-5 self-start p-5" @submit.prevent novalidate>
            <div>
                <label for="ci-principal" class="label">{{ __('Initial investment') }}</label>
                <div class="flex">
                    <input id="ci-principal" type="number" inputmode="decimal" min="0" step="any" x-model="form.principal" class="field rounded-r-none">
                    <select x-model="form.currency" class="field w-24 rounded-l-none border-l-0" aria-label="{{ __('Currency') }}">
                        @foreach (\App\Support\Locales::currencies(['USD', 'EUR', 'GBP', 'CAD', 'AUD', 'MXN', 'INR']) as $currency)
                            <option>{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>
                <p x-show="errors().principal" x-text="errors().principal" class="mt-1 text-sm text-danger" x-cloak></p>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="ci-rate" class="label">{{ __('Annual rate (%)') }}</label>
                    <input id="ci-rate" type="number" inputmode="decimal" min="0" max="100" step="any" x-model="form.rate" class="field">
                    <p x-show="errors().rate" x-text="errors().rate" class="mt-1 text-sm text-danger" x-cloak></p>
                </div>
                <div>
                    <label for="ci-years" class="label">{{ __('Years') }}</label>
                    <input id="ci-years" type="number" min="1" max="100" step="1" x-model="form.years" class="field">
                    <p x-show="errors().years" x-text="errors().years" class="mt-1 text-sm text-danger" x-cloak></p>
                </div>
            </div>
            <div>
                <label for="ci-compounds" class="label">{{ __('Compounding') }}</label>
                <select id="ci-compounds" x-model="form.compounds" class="field">
                    <template x-for="(label, n) in compounding" :key="n">
                        <option :value="n" x-text="$t(label)" :selected="Number(n) === Number(form.compounds)"></option>
                    </template>
                </select>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="ci-contribution" class="label">{{ __('Contribution') }}</label>
                    <input id="ci-contribution" type="number" inputmode="decimal" min="0" step="any" x-model="form.contribution" class="field">
                    <p x-show="errors().contribution" x-text="errors().contribution" class="mt-1 text-sm text-danger" x-cloak></p>
                </div>
                <div>
                    <label for="ci-frequency" class="label">{{ __('Every') }}</label>
                    <select id="ci-frequency" x-model="form.contributionFrequency" class="field">
                        <option value="monthly">{{ __('Month') }}</option>
                        <option value="yearly">{{ __('Year') }}</option>
                    </select>
                </div>
            </div>
        </form>

        <div class="min-w-0 space-y-6" aria-live="polite">
            <template x-if="result()">
                <div class="space-y-6">
                    <div class="panel p-5">
                        <p class="kicker" x-text="$t('Future value after :count years', { count: form.years })"></p>
                        <p class="mt-1 text-4xl font-semibold tracking-tight text-ink" x-text="money(result().futureValue)"></p>
                        <dl class="mt-6 grid gap-4 sm:grid-cols-2">
                            <div class="rounded-lg bg-sunken p-4">
                                <dt class="flex items-center gap-1.5 text-xs text-muted"><span class="size-2 rounded-full bg-line-strong"></span> {{ __('Total contributions') }}</dt>
                                <dd class="mt-1 font-semibold text-ink" x-text="money(result().totalContributions)"></dd>
                            </div>
                            <div class="rounded-lg bg-sunken p-4">
                                <dt class="flex items-center gap-1.5 text-xs text-muted"><span class="size-2 rounded-full bg-accent"></span> {{ __('Total interest earned') }}</dt>
                                <dd class="mt-1 font-semibold text-ink" x-text="money(result().totalInterest)"></dd>
                            </div>
                        </dl>
                        <div class="mt-6 flex h-2.5 overflow-hidden rounded-full bg-sunken" role="img"
                             :aria-label="$t('Contributions :a%, interest :b%', { a: share(result().totalContributions, result().futureValue), b: share(result().totalInterest, result().futureValue) })">
                            <div class="bg-line-strong" :style="`width:${share(result().totalContributions, result().futureValue)}%`"></div>
                            <div class="bg-accent" :style="`width:${share(result().totalInterest, result().futureValue)}%`"></div>
                        </div>
                    </div>

                    <div class="panel overflow-hidden">
                        <div class="flex items-center justify-between border-b border-line px-5 py-3">
                            <h2 class="font-semibold tracking-tight">{{ __('Growth by year') }}</h2>
                            <button type="button" class="btn btn-ghost px-2.5 py-1.5" @click="exportCsv()"><x-icon name="download" :size="16" /> CSV</button>
                        </div>
                        <div class="max-h-[28rem] overflow-auto">
                            <table class="w-full text-right text-sm tabular-nums">
                                <thead class="sticky top-0 bg-surface text-xs text-muted shadow-[0_1px_0_var(--color-line)]">
                                    <tr>
                                        <th class="px-5 py-2.5 text-left font-medium">{{ __('Year') }}</th>
                                        <th class="px-3 py-2.5 font-medium">{{ __('Contributions') }}</th>
                                        <th class="px-3 py-2.5 font-medium">{{ __('Interest') }}</th>
                                        <th class="px-5 py-2.5 font-medium">{{ __('Balance') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-line">
                                    <template x-for="row in result().yearly" :key="row.year">
                                        <tr class="hover:bg-paper">
                                            <td class="px-5 py-2 text-left text-muted" x-text="row.year"></td>
                                            <td class="px-3 py-2" x-text="money(row.contributions)"></td>
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
            <div x-show="!result()" class="panel p-8 text-center text-sm text-muted">{{ __('Fix the highlighted fields to see your results.') }}</div>
            <p class="text-xs leading-5 text-faint">{{ __('Estimates only. Assumes a constant rate of return and does not include taxes, fees or inflation.') }}</p>
        </div>
    </div>
</x-tool-page>
