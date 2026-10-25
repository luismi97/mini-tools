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
                <x-segmented model="mode" :options="['extract' => 'Extract pages', 'ranges' => 'Split by ranges', 'every' => 'Every page']" label="{{ __('Split mode') }}" class="flex-wrap" />

                <div x-show="mode !== 'every'" class="flex flex-wrap items-end gap-3">
                    <div class="min-w-0 flex-1">
                        <label for="split-ranges" class="label">{{ __('Pages') }}</label>
                        <input id="split-ranges" type="text" x-model="ranges" class="field max-w-md font-mono" placeholder="{{ __('e.g. 1-3, 5, 8-') }}" spellcheck="false" @keydown.enter.prevent="split()">
                    </div>
                    <span class="flex gap-1">
                        <button type="button" class="btn btn-ghost" @click="selectAll(true)">{{ __('Select all') }}</button>
                        <button type="button" class="btn btn-ghost" @click="selectAll(false)">{{ __('Clear') }}</button>
                    </span>
                </div>

                <p class="text-sm" :class="parsed().ok ? 'text-muted' : 'text-danger'" x-text="summary()"></p>

                <div class="flex flex-wrap items-center gap-3">
                    <button type="button" class="btn btn-primary" @click="split()" :disabled="busy || !parsed().ok">
                        <x-icon name="scissors" :size="16" /> <span x-text="busy ? $t('Splitting…') : $t('Split PDF')">{{ __('Split PDF') }}</span>
                    </button>
                    <p x-show="done" x-text="done" class="text-sm text-success" x-cloak></p>
                </div>
            </div>

            {{-- Visual page picker: click pages to add or remove them from the selection. --}}
            <div class="p-4">
                <p class="mb-3 text-xs text-muted" x-show="mode !== 'every'">{{ __('Tip: click the pages to select them — the page field updates automatically.') }}</p>
                <ul class="grid grid-cols-3 gap-3 sm:grid-cols-5 lg:grid-cols-8">
                    <template x-for="(group, i) in groups()" :key="i">
                        <li>
                            <button type="button" class="relative grid aspect-[3/4] w-full place-items-center overflow-hidden rounded-lg border-2 bg-white transition disabled:cursor-default"
                                :class="group ? 'border-accent ring-2 ring-accent/20' : 'border-line opacity-60 hover:opacity-100'"
                                :disabled="mode === 'every'"
                                :aria-pressed="!!group"
                                @click="togglePage(i + 1)"
                                :aria-label="$t('Select page :number', { number: i + 1 })">
                                <img x-show="thumbs[i]" :src="thumbs[i]" alt="" class="max-h-full max-w-full">
                                <span x-show="!thumbs[i]" class="font-mono text-sm text-faint" x-text="i + 1"></span>
                                <span x-show="group && mode !== 'extract'" class="absolute right-1 top-1 rounded-full bg-accent px-1.5 text-xs font-medium text-white" x-text="$t('File :n', { n: group })"></span>
                                <span x-show="group && mode === 'extract'" class="absolute right-1 top-1 grid size-5 place-items-center rounded-full bg-accent text-white"><x-icon name="check" :size="12" /></span>
                            </button>
                            <p class="mt-1 text-center font-mono text-xs text-muted" x-text="i + 1"></p>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </div>
</x-tool-page>
