<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/png-to-jpg.js')</x-slot:script>

    <div x-data="pngToJpg">
        <x-image-batch accept="image/png,.png" formats="PNG" result-label="JPG">
            <x-slot:settings>
                <x-fields.quality />
                <p class="text-sm text-muted sm:pb-6">{{ __('Output:') }} <span class="font-medium text-ink">JPG</span> {{ __('(white background)') }}</p>
            </x-slot:settings>
        </x-image-batch>
    </div>
</x-tool-page>
