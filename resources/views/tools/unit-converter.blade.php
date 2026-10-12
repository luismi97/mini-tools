<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/unit-converter.js')</x-slot:script>

    <div x-data="unitConverter" class="space-y-6">
        <div class="flex gap-1.5 overflow-x-auto pb-1" role="tablist" aria-label="{{ __('Unit category') }}">
            <template x-for="(cat, key) in categories" :key="key">
                <button type="button" role="tab" :aria-selected="category === key" @click="category = key"
                    class="shrink-0 rounded-lg border px-3.5 py-2 text-sm transition"
                    :class="category === key ? 'border-accent bg-accent-soft font-medium text-accent' : 'border-line-strong text-muted hover:text-ink'"
                    x-text="$t(cat.label)"></button>
            </template>
        </div>

        <div class="panel grid items-end gap-4 p-5 md:grid-cols-[1fr_auto_1fr]">
            <div class="space-y-2">
                <label for="unit-value" class="label">{{ __('From') }}</label>
                <input id="unit-value" type="number" inputmode="decimal" step="any" x-model="value" class="field text-lg">
                <select x-model="from" class="field" aria-label="{{ __('From unit') }}">
                    <template x-for="(unit, key) in units()" :key="category + key">
                        <option :value="key" x-text="$t(unit.label)" :selected="key === from"></option>
                    </template>
                </select>
            </div>
            <button type="button" class="btn btn-secondary mx-auto md:mb-1" @click="swap()" aria-label="{{ __('Swap units') }}">
                <x-icon name="swap" :size="16" />
            </button>
            <div class="space-y-2">
                <p class="label">To</p>
                <div class="flex h-[46px] items-center justify-between gap-2 rounded-lg border border-line bg-sunken px-3">
                    <output class="truncate text-lg font-semibold text-ink" x-text="formatted()" aria-live="polite"></output>
                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="copy()" x-text="copied ? $t('Copied') : $t('Copy')"></button>
                </div>
                <select x-model="to" class="field" aria-label="{{ __('To unit') }}">
                    <template x-for="(unit, key) in units()" :key="category + key">
                        <option :value="key" x-text="$t(unit.label)" :selected="key === to"></option>
                    </template>
                </select>
            </div>
        </div>

        <div class="panel overflow-hidden">
            <h2 class="border-b border-line px-5 py-3 font-semibold tracking-tight">
                <span x-text="$t(':value :unit in other units', { value: value || 0, unit: $t(units()[from]?.label ?? '').toLowerCase() })"></span>
            </h2>
            <dl class="grid divide-y divide-line sm:grid-cols-2 sm:divide-y-0">
                <template x-for="row in all()" :key="category + row.key">
                    <div class="flex items-center justify-between gap-4 border-line px-5 py-2.5 text-sm sm:border-b">
                        <dt class="text-muted" x-text="$t(row.label)"></dt>
                        <dd class="font-medium tabular-nums text-ink" x-text="row.value"></dd>
                    </div>
                </template>
            </dl>
        </div>
    </div>
</x-tool-page>
