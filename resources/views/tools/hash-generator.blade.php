<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/hash-generator.js')</x-slot:script>

    <div x-data="hashGenerator" class="space-y-4">
        <div class="panel overflow-hidden">
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-line bg-paper/60 px-4 py-2.5">
                <span class="kicker" x-text="source === 'text' ? $t('Text input') : $t('File')"></span>
                <div class="flex items-center gap-2">
                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" x-show="source === 'file'" x-cloak @click="useText()">{{ __('Use text instead') }}</button>
                    <label class="btn btn-secondary cursor-pointer px-3 py-1.5">
                        <x-icon name="upload" :size="16" /> {{ __('Hash a file') }}
                        <input type="file" class="sr-only" @change="pickFile($event)">
                    </label>
                </div>
            </div>
            <textarea x-show="source === 'text'" x-model="text" spellcheck="false" aria-label="{{ __('Text to hash') }}" placeholder="{{ __('Type or paste text...') }}"
                class="h-36 w-full resize-y border-0 bg-transparent px-4 py-3 font-mono text-[13px] leading-6 text-ink focus:outline-none focus:ring-0"></textarea>
            <div x-show="source === 'file'" x-cloak class="flex items-center gap-3 px-4 py-6">
                <span class="grid size-10 place-items-center rounded-lg bg-accent-soft text-accent"><x-icon name="file-text" /></span>
                <div>
                    <p class="font-medium text-ink" x-text="file?.name"></p>
                    <p class="text-sm text-muted" x-text="busy ? $t('Hashing…') : file?.size"></p>
                </div>
            </div>
            <p x-show="error" x-cloak x-text="error" class="mx-4 mb-4 rounded-lg bg-danger-soft px-3 py-2 text-sm text-danger"></p>
        </div>

        <div class="panel divide-y divide-line" aria-live="polite">
            <div class="flex items-center justify-between px-4 py-2.5">
                <h2 class="font-semibold tracking-tight">{{ __('Hashes') }}</h2>
                <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="uppercase" class="size-4 accent-accent"> {{ __('Uppercase') }}</label>
            </div>
            <template x-for="(label, algo) in algorithms" :key="algo">
                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 px-4 py-3" :class="matchFor(hashes[algo]) ? 'bg-success-soft' : ''">
                    <span class="w-20 shrink-0 text-sm font-medium text-ink" x-text="label"></span>
                    <code class="min-w-0 flex-1 break-all font-mono text-[13px] text-ink" x-text="hashes[algo] ? display(hashes[algo]) : '…'"></code>
                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="copy(algo)" x-text="copied === algo ? $t('Copied') : $t('Copy')"></button>
                </div>
            </template>
        </div>

        <div class="panel p-4">
            <label for="hash-compare" class="label">{{ __('Compare with an expected hash') }}</label>
            <input id="hash-compare" type="text" x-model="compare" spellcheck="false" class="field font-mono" placeholder="{{ __('Paste a checksum to verify') }}">
            <p x-show="compareState()" x-cloak class="mt-2 text-sm"
               :class="compareState()?.ok ? 'text-success' : 'text-danger'"
               x-text="compareState()?.ok ? $t('Match — it is the :algo hash.', { algo: compareState().algo }) : $t('No match with any of the hashes above.')"></p>
        </div>
    </div>
</x-tool-page>
