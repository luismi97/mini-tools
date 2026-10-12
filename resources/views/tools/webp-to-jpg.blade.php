<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/webp-to-jpg.js')</x-slot:script>

    <div x-data="webpToJpg">
        <x-image-batch accept="image/webp,.webp" formats="{{ __('WebP') }}" result-label="JPG">
            <x-slot:settings>
                <x-fields.quality />
                <p class="text-sm text-muted sm:pb-6">{{ __('Output:') }} <span class="font-medium text-ink">JPG</span></p>
            </x-slot:settings>
        </x-image-batch>
    </div>
</x-tool-page>
