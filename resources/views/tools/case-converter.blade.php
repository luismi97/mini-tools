<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/case-converter.js')</x-slot:script>

    <div x-data="caseConverter">
        <x-text-tool :mono="false" output-label="{{ __('Converted text') }}" placeholder="{{ __('Type or paste your text here...') }}">
            <x-slot:toolbar>
                <div class="flex flex-wrap gap-1.5" role="radiogroup" aria-label="{{ __('Case') }}">
                    <template x-for="(label, key) in cases" :key="key">
                        <button type="button" role="radio" :aria-checked="options.mode === key" @click="options.mode = key"
                            class="rounded-md border px-2.5 py-1.5 text-sm transition"
                            :class="options.mode === key ? 'border-accent bg-accent-soft font-medium text-accent' : 'border-line-strong text-muted hover:text-ink'"
                            x-text="$t(label)"></button>
                    </template>
                </div>
            </x-slot:toolbar>
        </x-text-tool>
    </div>
</x-tool-page>
