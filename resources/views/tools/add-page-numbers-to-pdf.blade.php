<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/add-page-numbers-to-pdf.js')</x-slot:script>

    <div x-data="addPageNumbers" class="space-y-4">
        <template x-if="!file">
            <x-dropzone accept="application/pdf,.pdf" :multiple="false" label="{{ __('Drop a PDF here or') }}" hint="{{ __('PDF · up to 100 MB') }}" />
        </template>
        <p x-show="busy && !file" x-cloak class="text-sm text-muted">{{ __('Reading PDF…') }}</p>
        <p x-show="error" x-cloak x-text="error" class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" role="alert"></p>

        <div x-show="file" x-cloak class="panel overflow-hidden">
            <div class="flex flex-wrap items-center gap-3 border-b border-line bg-paper/60 px-4 py-3">
                <div class="min-w-0 flex-1">
                    <p class="truncate font-medium text-ink" x-text="name"></p>
                    <p class="text-xs text-muted" x-text="`${size} · ` + $tc(':count page', ':count pages', pageCount)"></p>
                </div>
                <button type="button" class="btn btn-ghost" @click="reset()" :disabled="busy"><x-icon name="refresh" :size="16" /> {{ __('New PDF') }}</button>
            </div>

            <div class="grid gap-6 p-4 md:grid-cols-[minmax(0,240px)_minmax(0,1fr)]">
                {{-- Live preview of the first numbered page --}}
                <div class="mx-auto w-full max-w-60">
                    <div class="relative aspect-[3/4] w-full overflow-hidden rounded-lg border border-line bg-white shadow-sm">
                        <img x-show="preview" :src="preview" alt="" class="size-full object-contain">
                        <span class="absolute whitespace-nowrap rounded bg-accent px-1.5 py-0.5 font-mono text-[11px] font-medium text-white shadow" :style="sampleStyle()" x-text="sample()"></span>
                    </div>
                    <p class="mt-2 text-center text-xs text-faint">{{ __('Preview') }}</p>
                </div>

                <div class="space-y-5">
                    <fieldset>
                        <legend class="label">{{ __('Position') }}</legend>
                        <div class="grid w-full max-w-xs grid-cols-3 gap-1 rounded-lg bg-sunken p-1">
                            <template x-for="(label, pos) in positions" :key="pos">
                                <button type="button" class="grid h-9 place-items-center rounded-md transition"
                                    :class="options.position === pos ? 'bg-surface text-accent shadow-sm' : 'text-faint hover:text-ink'"
                                    :aria-pressed="options.position === pos"
                                    @click="options.position = pos"
                                    :aria-label="$t(label)" :title="$t(label)">
                                    <span class="flex size-5 border border-current p-0.5" :class="{ 'items-start': pos.startsWith('top'), 'items-end': pos.startsWith('bottom'), 'justify-start': pos.endsWith('left'), 'justify-center': pos.endsWith('center'), 'justify-end': pos.endsWith('right') }">
                                        <span class="size-1.5 rounded-full bg-current"></span>
                                    </span>
                                </button>
                            </template>
                        </div>
                    </fieldset>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="pn-format" class="label">{{ __('Format') }}</label>
                            <select id="pn-format" x-model="options.format" class="field">
                                <template x-for="(meta, key) in formats" :key="key">
                                    <option :value="key" x-text="$t(meta.label)" :selected="options.format === key"></option>
                                </template>
                            </select>
                        </div>
                        <div>
                            <label for="pn-size" class="label">{{ __('Text size') }}</label>
                            <select id="pn-size" x-model.number="options.fontSize" class="field">
                                <option value="9">{{ __('Small') }}</option>
                                <option value="11">{{ __('Medium') }}</option>
                                <option value="14">{{ __('Large') }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="pn-first" class="label">{{ __('Start numbering on page') }}</label>
                            <input id="pn-first" type="number" inputmode="numeric" min="1" :max="pageCount" step="1" x-model="options.firstPage" class="field">
                            <p class="mt-1 text-xs text-faint">{{ __('Use 2 to skip a cover page.') }}</p>
                        </div>
                        <div>
                            <label for="pn-start" class="label">{{ __('First number') }}</label>
                            <input id="pn-start" type="number" inputmode="numeric" min="0" step="1" x-model="options.startAt" class="field">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-end gap-3 border-t border-line p-4">
                <p x-show="done" x-text="done" class="text-sm text-success" x-cloak></p>
                <p x-show="!valid()" class="text-sm text-danger" x-cloak>{{ __('Check the page and number settings.') }}</p>
                <button type="button" class="btn btn-primary" @click="save()" :disabled="busy || !valid()">
                    <x-icon name="download" :size="16" /> <span x-text="busy ? $t('Saving…') : $t('Add page numbers')">{{ __('Add page numbers') }}</span>
                </button>
            </div>
        </div>
    </div>
</x-tool-page>
