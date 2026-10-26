<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/merge-pdf.js')</x-slot:script>

    <div x-data="mergePdf" class="space-y-4">
        <div x-show="result" x-cloak class="panel flex flex-wrap items-center gap-4 border-success/40 bg-success-soft p-4" role="status">
            <span class="grid size-10 shrink-0 place-items-center rounded-full bg-success text-white"><x-icon name="check" :size="20" /></span>
            <div class="min-w-0 flex-1">
                <p class="font-medium text-ink">{{ __('Your PDF is ready') }}</p>
                <p class="truncate text-sm text-muted" x-text="result && `${result.name} · ${$tc(':count page', ':count pages', result.pages)} · ${result.size}`"></p>
            </div>
            <button type="button" class="btn btn-primary" @click="downloadAgain()"><x-icon name="download" :size="16" /> {{ __('Download again') }}</button>
            <button type="button" class="btn btn-ghost" @click="startOver()"><x-icon name="refresh" :size="16" /> {{ __('Start over') }}</button>
        </div>

        <x-file-list accept="application/pdf,.pdf" :pages="true" label="{{ __('Drop PDF files here or') }}" hint="{{ __('PDF · up to 100 MB each · up to 30 files') }}">
            <x-slot:settings>
                <div>
                    <label for="merge-name" class="label">{{ __('File name') }}</label>
                    <div class="flex">
                        <input id="merge-name" type="text" x-model="outputName" class="field w-48 rounded-r-none" spellcheck="false" maxlength="80">
                        <span class="field w-auto rounded-l-none border-l-0 bg-sunken text-muted">.pdf</span>
                    </div>
                </div>
                <p class="text-sm text-muted" x-show="totalPages()" x-text="$t(':files files · :pages pages in total', { files: validFiles().length, pages: totalPages() })"></p>
            </x-slot:settings>
            <x-slot:actions>
                <p x-show="error" x-text="error" class="text-sm text-danger" x-cloak></p>
                <p x-show="validFiles().length < 2" class="text-sm text-muted">{{ __('Add at least 2 PDFs') }}</p>
                <button type="button" class="btn btn-primary" @click="merge()" :disabled="busy || validFiles().length < 2">
                    <x-icon name="layers" :size="16" /> <span x-text="busy ? $t('Merging…') : $t('Merge PDF')">{{ __('Merge PDF') }}</span>
                </button>
            </x-slot:actions>
        </x-file-list>
    </div>
</x-tool-page>
