<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/lorem-ipsum-generator.js')</x-slot:script>

    <div x-data="loremIpsumGenerator" class="space-y-4">
        <div class="panel flex flex-wrap items-end gap-x-6 gap-y-4 p-4">
            <div>
                <label for="lorem-count" class="label">{{ __('Amount') }}</label>
                <input id="lorem-count" type="number" min="1" :max="options.unit === 'words' ? 5000 : 200" x-model.number="options.count" class="field w-24">
            </div>
            <div>
                <p class="label">{{ __('Unit') }}</p>
                <x-segmented model="options.unit" :options="['paragraphs' => 'Paragraphs', 'sentences' => 'Sentences', 'words' => 'Words']" label="{{ __('Unit') }}" />
            </div>
            <div class="space-y-1.5 text-sm text-muted">
                <label class="flex items-center gap-2"><input type="checkbox" x-model="options.startWithLorem" class="size-4 accent-accent"> {{ __('Start with “Lorem ipsum…”') }}</label>
                <label class="flex items-center gap-2" x-show="options.unit === 'paragraphs'"><input type="checkbox" x-model="options.html" class="size-4 accent-accent"> {{ __('HTML <p> tags') }}</label>
            </div>
            <button type="button" class="btn btn-primary sm:ml-auto" @click="generate()"><x-icon name="refresh" :size="16" /> {{ __('Generate') }}</button>
        </div>

        <div class="panel overflow-hidden">
            <div class="flex items-center justify-between px-4 py-2.5">
                <label for="lorem-output" class="kicker">{{ __('Placeholder text') }}</label>
                <div class="flex items-center gap-1">
                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="copy()"><x-icon name="copy" :size="14" /> <span x-text="copied ? $t('Copied') : $t('Copy')"></span></button>
                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="download()"><x-icon name="download" :size="14" /> {{ __('Download') }}</button>
                </div>
            </div>
            <textarea id="lorem-output" x-model="output" readonly
                class="h-96 w-full resize-y border-0 bg-transparent px-4 pb-4 text-[15px] leading-7 text-ink focus:outline-none focus:ring-0"></textarea>
        </div>
    </div>
</x-tool-page>
