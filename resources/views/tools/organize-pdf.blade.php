<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/organize-pdf.js')</x-slot:script>

    <div x-data="organizePdf">
        <x-pdf-pages mode="organize" action="{{ __('Download organized PDF') }}" />
    </div>
</x-tool-page>
