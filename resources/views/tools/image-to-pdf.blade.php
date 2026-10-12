<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/image-to-pdf.js')</x-slot:script>

    <div x-data="imageToPdf">
        <x-images-to-pdf accept="image/jpeg,image/png,image/webp,.jpg,.jpeg,.png,.webp" hint="{{ __('JPG, PNG or WebP · up to 25 MB each · up to 100 images') }}" />
    </div>
</x-tool-page>
