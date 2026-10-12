<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/split-pdf.js')</x-slot:script>

    <div x-data="splitPdf" class="space-y-4">
        <template x-if="!file">
            <x-dropzone accept="application/pdf,.pdf" :multiple="false" label="{{ __('Drop a PDF here or') }}" hint="{{ __('PDF · up to 100 MB') }}" />
        </template>
        <p x-show="busy && !file" x-cloak class="text-sm text-muted">{{ __('Reading PDF…') }}</p>
        <p x-show="error" x-cloak x-text="error" class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" role="alert"></p>

        <div x-show="file" x-cloak class="panel divide-y divide-line">
            <div class="flex flex-wrap items-center gap-4 p-4">
                <span class="grid size-12 place-items-center rounded-lg bg-accent-soft text-accent"><x-icon name="file-text" /></span>
                <div class="min-w-0 flex-1">
                    <p class="truncate font-medium text-ink" x-text="name"></p>
                    <p class="text-sm text-muted" x-text="`${size} · ` + $tc(':count page', ':count pages', pageCount)"></p>
                </div>
                <button type="button" class="btn btn-ghost" @click="reset()"><x-icon name="refresh" :size="16" /> {{ __('Choose another PDF') }}</button>
            </div>

            <div class="space-y-5 p-4">
                <x-segmented model="mode" :options="['extract' => 'Extract pages', 'ranges' => 'Split by ranges', 'every' => 'Every page']" label="{{ __('Split mode') }}" />

                <div x-show="mode !== 'every'">
                    <label for="split-ranges" class="label">{{ __('Pages') }}</label>
                    <input id="split-ranges" type="text" x-model="ranges" class="field max-w-md font-mono" placeholder="e.g. 1-3, 5, 8-" spellcheck="false" @keydown.enter.prevent="split()">
                </div>

                <p class="text-sm" :class="parsed().ok ? 'text-muted' : 'text-danger'" x-text="summary()"></p>

                <div class="flex flex-wrap items-center gap-3">
                    <button type="button" class="btn btn-primary" @click="split()" :disabled="busy || !parsed().ok">
                        <x-icon name="scissors" :size="16" /> <span x-text="busy ? $t('Splitting…') : $t('Split PDF')">{{ __('Split PDF') }}</span>
                    </button>
                    <p x-show="done" x-text="done" class="text-sm text-success" x-cloak></p>
                </div>
            </div>
        </div>
    </div>
</x-tool-page>
