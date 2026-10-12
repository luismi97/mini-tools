<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/random-name-picker.js')</x-slot:script>

    <div x-data="randomNamePicker" class="grid gap-6 lg:grid-cols-2">
        <div class="panel overflow-hidden">
            <div class="flex items-center justify-between px-4 py-2.5">
                <label for="np-names" class="kicker">{{ __('Names (one per line)') }}</label>
                <span class="font-mono text-xs text-faint" x-text="$t(':count entries', { count: names().length })"></span>
            </div>
            <textarea id="np-names" x-model="input" class="h-72 w-full resize-y border-0 bg-transparent px-4 pb-4 text-[15px] leading-7 text-ink focus:outline-none focus:ring-0"></textarea>
        </div>

        <div class="space-y-4">
            <div class="panel space-y-4 p-5">
                <x-segmented model="mode" :options="['pick' => 'Pick winners', 'teams' => 'Make teams']" label="{{ __('Mode') }}" />
                <div class="flex flex-wrap items-end gap-4">
                    <div x-show="mode === 'pick'">
                        <label for="np-count" class="label">{{ __('Winners') }}</label>
                        <input id="np-count" type="number" min="1" x-model="count" class="field w-24">
                    </div>
                    <div x-show="mode === 'teams'" x-cloak>
                        <label for="np-teams" class="label">{{ __('Teams') }}</label>
                        <input id="np-teams" type="number" min="2" x-model="teams" class="field w-24">
                    </div>
                    <label x-show="mode === 'pick'" class="flex items-center gap-2 pb-2 text-sm text-muted"><input type="checkbox" x-model="removePicked" class="size-4 accent-accent"> {{ __('Remove picked names') }}</label>
                </div>
                <button type="button" class="btn btn-primary w-full" @click="pick()" :disabled="shuffling || names().length === 0">
                    <x-icon name="shuffle" :size="16" /> <span x-text="mode === 'teams' ? $t('Make teams') : $t('Pick')"></span>
                </button>
            </div>

            <div class="panel min-h-40 p-5" aria-live="polite">
                <p x-show="shuffling" class="py-8 text-center text-3xl font-semibold text-muted" x-text="display"></p>
                <template x-if="!shuffling && winners.length">
                    <div>
                        <p class="kicker" x-text="winners.length > 1 ? $t('Winners') : $t('Winner')"></p>
                        <ol class="mt-2 space-y-1">
                            <template x-for="(w, i) in winners" :key="i">
                                <li class="text-3xl font-semibold tracking-tight text-ink" x-text="winners.length > 1 ? `${i + 1}. ${w}` : w"></li>
                            </template>
                        </ol>
                    </div>
                </template>
                <template x-if="!shuffling && groups.length">
                    <div class="grid gap-3 sm:grid-cols-2">
                        <template x-for="(g, i) in groups" :key="i">
                            <div class="rounded-lg bg-sunken p-3">
                                <p class="kicker" x-text="$t('Team :n', { n: i + 1 })"></p>
                                <p class="mt-1 text-sm text-ink" x-text="g.join(', ')"></p>
                            </div>
                        </template>
                    </div>
                </template>
                <p x-show="!shuffling && !winners.length && !groups.length" class="py-8 text-center text-sm text-muted">{{ __('The result appears here.') }}</p>
                <div class="mt-3 flex justify-end" x-show="!shuffling && (winners.length || groups.length)">
                    <button type="button" class="btn btn-ghost" @click="copy()"><x-icon name="copy" :size="16" /> <span x-text="copied ? $t('Copied') : $t('Copy')"></span></button>
                </div>
            </div>
        </div>
    </div>
</x-tool-page>
