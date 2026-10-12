<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/pdf-to-jpg.js')</x-slot:script>

    <div x-data="pdfToJpg" class="space-y-4">
        <template x-if="!file">
            <x-dropzone accept="application/pdf,.pdf" :multiple="false" label="{{ __('Drop a PDF here or') }}" hint="{{ __('PDF · up to 100 MB · up to 200 pages') }}" />
        </template>
        <p x-show="busy && !file" x-cloak class="text-sm text-muted">{{ __('Reading PDF…') }}</p>
        <p x-show="error" x-cloak x-text="error" class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" role="alert"></p>

        <div x-show="file" x-cloak class="panel divide-y divide-line">
            <div class="flex flex-wrap items-center gap-4 p-4">
                <span class="grid size-12 place-items-center rounded-lg bg-accent-soft text-accent"><x-icon name="file-text" /></span>
                <div class="min-w-0 flex-1">
                    <p class="truncate font-medium text-ink" x-text="name"></p>
                    <p class="text-sm text-muted" x-text="`${size} · ` + $tc(':count page', ':count pages', pageCount)"></p>
                    <p x-show="pageCount > renderLimit()" class="text-sm text-danger" x-text="$t('Only the first :count pages will be converted.', { count: renderLimit() })"></p>
                </div>
                <button type="button" class="btn btn-ghost" @click="reset()" :disabled="busy"><x-icon name="refresh" :size="16" /> {{ __('Choose another PDF') }}</button>
            </div>

            <div class="flex flex-wrap items-end gap-x-8 gap-y-4 p-4">
                <div>
                    <p class="label">{{ __('Resolution') }}</p>
                    <x-segmented model="options.dpi" :options="[72 => '72 DPI', 150 => '150 DPI', 300 => '300 DPI']" label="{{ __('Resolution') }}" />
                </div>
                <div>
                    <label for="pdf-quality" class="label">{{ __('JPG quality') }}</label>
                    <select id="pdf-quality" x-model.number="options.quality" class="field w-36">
                        <option value="95">{{ __('Maximum') }}</option>
                        <option value="90">{{ __('High') }}</option>
                        <option value="80">{{ __('Medium') }}</option>
                        <option value="65">{{ __('Low') }}</option>
                    </select>
                </div>
                <div class="ml-auto flex items-center gap-3">
                    <span x-show="busy" class="font-mono text-sm text-muted" x-text="progress + '%'"></span>
                    <button type="button" class="btn btn-primary" @click="convert()" :disabled="busy">
                        <x-icon name="file-image" :size="16" /> <span x-text="busy ? $t('Converting…') : $t('Convert to JPG')">{{ __('Convert to JPG') }}</span>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="pages.length" x-cloak class="panel overflow-hidden">
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-line bg-paper/60 px-4 py-3">
                <p class="text-sm text-muted"><span class="font-medium text-ink" x-text="pages.length"></span> {{ __('page(s) converted') }}</p>
                <button type="button" class="btn btn-primary" @click="downloadAll()" :disabled="busy">
                    <x-icon name="download" :size="16" /> <span x-text="pages.length > 1 ? $t('Download All (.zip)') : $t('Download')"></span>
                </button>
            </div>
            <ul class="grid gap-4 p-4 sm:grid-cols-3 lg:grid-cols-5">
                <template x-for="page in pages" :key="page.number">
                    <li class="flex flex-col overflow-hidden rounded-lg border border-line">
                        <img :src="page.url" :alt="`Page ${page.number}`" class="aspect-[3/4] w-full bg-white object-contain" loading="lazy">
                        <div class="flex items-center justify-between gap-2 border-t border-line px-2.5 py-2">
                            <span class="text-xs text-muted" x-text="$t('Page :n', { n: page.number }) + ` · ${page.size}`"></span>
                            <button type="button" class="btn btn-ghost px-1.5 py-1" @click="download(page)" :aria-label="$t('Download page :n', { n: page.number })"><x-icon name="download" :size="16" /></button>
                        </div>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</x-tool-page>
