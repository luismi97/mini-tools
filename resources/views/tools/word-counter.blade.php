<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/word-counter.js')</x-slot:script>

    <div x-data="wordCounter" @input.once="trackUse()" class="space-y-6">
        <dl class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-6" aria-live="polite">
            @foreach (['words' => 'Words', 'characters' => 'Characters', 'charactersNoSpaces' => 'Characters (no spaces)', 'sentences' => 'Sentences', 'paragraphs' => 'Paragraphs', 'lines' => 'Lines'] as $key => $label)
                <div class="panel p-4">
                    <dt class="text-xs text-muted">{{ __($label) }}</dt>
                    <dd class="mt-1 text-2xl font-semibold tabular-nums text-ink" x-text="n(stats.{{ $key }})">0</dd>
                </div>
            @endforeach
        </dl>

        <div class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_300px]">
            <div class="panel overflow-hidden">
                <div class="flex items-center justify-between px-4 py-2.5">
                    <label for="wc-input" class="kicker">{{ __('Your text') }}</label>
                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="clear()" :disabled="!text"><x-icon name="trash" :size="14" /> {{ __('Clear') }}</button>
                </div>
                <textarea id="wc-input" x-ref="input" x-model="text" placeholder="{{ __('Start typing or paste your text here...') }}"
                    class="h-96 w-full resize-y border-0 bg-transparent px-4 pb-4 text-[15px] leading-7 text-ink placeholder:text-faint focus:outline-none focus:ring-0"></textarea>
            </div>

            <div class="space-y-4">
                <div class="panel divide-y divide-line">
                    <div class="flex justify-between px-4 py-3 text-sm"><span class="text-muted">{{ __('Reading time') }}</span><span class="font-medium text-ink" x-text="duration(stats.readingMinutes)"></span></div>
                    <div class="flex justify-between px-4 py-3 text-sm"><span class="text-muted">{{ __('Speaking time') }}</span><span class="font-medium text-ink" x-text="duration(stats.speakingMinutes)"></span></div>
                </div>
                <div class="panel p-4">
                    <h2 class="kicker">{{ __('Top keywords') }}</h2>
                    <ol class="mt-3 space-y-2 text-sm" x-show="stats.keywords.length">
                        <template x-for="k in stats.keywords" :key="k.word">
                            <li class="flex items-center gap-2">
                                <span class="min-w-0 flex-1 truncate text-ink" x-text="k.word"></span>
                                <span class="font-mono text-xs text-muted" x-text="`${k.count} · ${k.percent}%`"></span>
                            </li>
                        </template>
                    </ol>
                    <p x-show="!stats.keywords.length" class="mt-3 text-sm text-faint">{{ __('Keywords appear as you type.') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-tool-page>
