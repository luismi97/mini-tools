<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/png-to-webp.js')</x-slot:script>

    <div x-data="pngToWebp">
        <x-image-batch accept="image/png,.png" formats="PNG" result-label="{{ __('WebP') }}">
            <x-slot:settings>
                <x-fields.quality />
                <p class="text-sm text-muted sm:pb-6">{{ __('Output:') }} <span class="font-medium text-ink">{{ __('WebP') }}</span> {{ __('(transparency kept)') }}</p>
            </x-slot:settings>
        </x-image-batch>
    </div>
</x-tool-page>
