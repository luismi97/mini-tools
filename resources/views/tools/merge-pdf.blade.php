<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/merge-pdf.js')</x-slot:script>

    <div x-data="mergePdf">
        <x-file-list accept="application/pdf,.pdf" label="{{ __('Drop PDF files here or') }}" hint="{{ __('PDF · up to 100 MB each · up to 30 files') }}">
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
