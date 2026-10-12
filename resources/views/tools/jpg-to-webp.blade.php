<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/jpg-to-webp.js')</x-slot:script>

    <div x-data="jpgToWebp">
        <x-image-batch accept="image/jpeg,image/png,.jpg,.jpeg" formats="{{ __('JPG or JPEG (PNG also works)') }}" result-label="{{ __('WebP') }}">
            <x-slot:settings>
                <x-fields.quality />
                <p class="text-sm text-muted sm:pb-6">{{ __('Output:') }} <span class="font-medium text-ink">{{ __('WebP') }}</span></p>
            </x-slot:settings>
        </x-image-batch>
    </div>
</x-tool-page>
