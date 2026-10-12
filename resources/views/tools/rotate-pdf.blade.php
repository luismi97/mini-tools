<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/rotate-pdf.js')</x-slot:script>

    <div x-data="rotatePdf">
        <x-pdf-pages mode="rotate" action="{{ __('Download rotated PDF') }}" />
    </div>
</x-tool-page>
