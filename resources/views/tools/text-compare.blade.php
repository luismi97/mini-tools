<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/text-compare.js')</x-slot:script>

    <div x-data="textCompare" class="space-y-4">
        <div class="panel flex flex-wrap items-center gap-x-6 gap-y-3 p-3">
            <x-segmented model="options.mode" :options="['lines' => 'By line', 'words' => 'By word']" label="{{ __('Compare mode') }}" />
            <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="options.ignoreCase" class="size-4 accent-accent"> {{ __('Ignore case') }}</label>
            <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="options.ignoreWhitespace" class="size-4 accent-accent"> {{ __('Ignore whitespace') }}</label>
            <div class="flex gap-1 sm:ml-auto">
                <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="loadSample()">{{ __('Load sample') }}</button>
                <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="swap()"><x-icon name="swap" :size="14" /> {{ __('Swap') }}</button>
                <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="clear()"><x-icon name="trash" :size="14" /> {{ __('Clear') }}</button>
            </div>
        </div>

        <div class="grid gap-4 lg:grid-cols-2">
            @foreach (['before' => 'Original text', 'after' => 'Changed text'] as $model => $label)
                <div class="panel overflow-hidden">
                    <label for="compare-{{ $model }}" class="kicker block px-4 pt-3">{{ __($label) }}</label>
                    <textarea id="compare-{{ $model }}" x-model="{{ $model }}" spellcheck="false" placeholder="{{ __('Paste text here...') }}"
                        class="h-60 w-full resize-y border-0 bg-transparent px-4 py-2 font-mono text-[13px] leading-6 text-ink placeholder:text-faint focus:outline-none focus:ring-0"></textarea>
                </div>
            @endforeach
        </div>

        <p x-show="error" x-cloak x-text="error" class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" role="alert"></p>

        <div x-show="result" x-cloak class="panel overflow-hidden" aria-live="polite">
            <div class="flex flex-wrap items-center gap-3 border-b border-line bg-paper/60 px-4 py-3 text-sm">
                <h2 class="font-semibold tracking-tight">{{ __('Differences') }}</h2>
                <template x-if="result && !identical()">
                    <span class="flex gap-2">
                        <span class="rounded-full bg-success-soft px-2 py-0.5 font-mono text-xs text-success" x-text="`+${result.added}`"></span>
                        <span class="rounded-full bg-danger-soft px-2 py-0.5 font-mono text-xs text-danger" x-text="`−${result.removed}`"></span>
                        <span class="text-muted" x-text="options.mode === 'lines' ? $t('lines') : $t('words')"></span>
                    </span>
                </template>
                <span x-show="identical()" class="text-success">{{ __('The texts are identical.') }}</span>
            </div>
            <div class="max-h-[32rem] overflow-auto p-4 font-mono text-[13px] leading-6 whitespace-pre-wrap break-words text-ink"><template x-for="(chunk, i) in (result ? result.chunks : [])" :key="i"><span
                :class="{
                    'block': options.mode === 'lines',
                    'bg-success-soft text-success': chunk.type === 'insert',
                    'bg-danger-soft text-danger line-through decoration-danger/50': chunk.type === 'delete',
                    'mr-1': options.mode === 'words' && chunk.type === 'delete',
                }"><span x-show="options.mode === 'lines' && chunk.type !== 'equal'" class="select-none" x-text="chunk.type === 'insert' ? '+ ' : '− '"></span><span x-text="chunk.value"></span></span></template></div>
        </div>
    </div>
</x-tool-page>
