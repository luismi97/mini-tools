<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/random-number-generator.js')</x-slot:script>

    <div x-data="randomNumberGenerator" x-init="generate(false)" class="grid gap-6 lg:grid-cols-[340px_minmax(0,1fr)]">
        <div class="panel space-y-5 self-start p-5">
            <div class="flex flex-wrap gap-1.5">
                <template x-for="p in presets" :key="p.label">
                    <button type="button" class="rounded-md border border-line-strong px-2.5 py-1 text-xs text-muted hover:text-ink" @click="applyPreset(p)" x-text="$t(p.label)"></button>
                </template>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div><label for="rn-min" class="label">{{ __('Minimum') }}</label><input id="rn-min" type="number" step="1" x-model="min" class="field"></div>
                <div><label for="rn-max" class="label">{{ __('Maximum') }}</label><input id="rn-max" type="number" step="1" x-model="max" class="field"></div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div><label for="rn-count" class="label">{{ __('How many') }}</label><input id="rn-count" type="number" min="1" max="10000" x-model="count" class="field"></div>
                <div>
                    <label for="rn-sort" class="label">{{ __('Sort') }}</label>
                    <select id="rn-sort" x-model="sort" class="field">
                        <option value="none">{{ __('No sorting') }}</option>
                        <option value="asc">{{ __('Ascending') }}</option>
                        <option value="desc">{{ __('Descending') }}</option>
                    </select>
                </div>
            </div>
            <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="unique" class="size-4 accent-accent"> {{ __('No duplicates') }}</label>
            <button type="button" class="btn btn-primary w-full" @click="generate()"><x-icon name="dice" :size="16" /> {{ __('Generate') }}</button>
        </div>

        <div class="panel flex min-h-60 flex-col p-5" aria-live="polite">
            <p x-show="error" x-cloak class="rounded-lg bg-danger-soft px-3 py-2 text-sm text-danger" x-text="error"></p>
            <template x-if="numbers.length === 1">
                <p class="grid flex-1 place-items-center font-mono text-7xl font-semibold tabular-nums text-ink transition-transform" :class="rolling ? 'scale-90' : 'scale-100'" x-text="numbers[0]"></p>
            </template>
            <template x-if="numbers.length > 1">
                <div class="flex-1">
                    <p class="kicker mb-3" x-text="$t(':count numbers', { count: numbers.length })"></p>
                    <div class="flex max-h-96 flex-wrap gap-2 overflow-auto">
                        <template x-for="(n, i) in numbers.slice(0, 2000)" :key="i">
                            <span class="rounded-md bg-sunken px-2.5 py-1 font-mono text-sm tabular-nums text-ink" x-text="n"></span>
                        </template>
                    </div>
                    <p x-show="numbers.length > 2000" class="mt-2 text-xs text-muted">{{ __('Showing the first 2,000 — copy to get all.') }}</p>
                </div>
            </template>
            <div class="mt-4 flex justify-end" x-show="numbers.length">
                <button type="button" class="btn btn-ghost" @click="copy()"><x-icon name="copy" :size="16" /> <span x-text="copied ? $t('Copied') : $t('Copy')"></span></button>
            </div>
        </div>
    </div>
</x-tool-page>
