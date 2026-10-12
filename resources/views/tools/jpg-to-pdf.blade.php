<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/jpg-to-pdf.js')</x-slot:script>

    <div x-data="jpgToPdf">
        <x-images-to-pdf accept="image/jpeg,.jpg,.jpeg" hint="{{ __('JPG or JPEG · up to 25 MB each · up to 100 images') }}" />
    </div>
</x-tool-page>
