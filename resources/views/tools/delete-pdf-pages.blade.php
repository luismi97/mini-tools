<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/delete-pdf-pages.js')</x-slot:script>

    <div x-data="deletePdfPages">
        <x-pdf-pages mode="delete" action="{{ __('Download edited PDF') }}" />
    </div>
</x-tool-page>
