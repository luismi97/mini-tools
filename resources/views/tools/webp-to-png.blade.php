<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/webp-to-png.js')</x-slot:script>

    <div x-data="webpToPng">
        <x-image-batch accept="image/webp,.webp" formats="{{ __('WebP') }}" result-label="PNG">
            <x-slot:settings>
                <p class="text-sm text-muted">{{ __('Output:') }} <span class="font-medium text-ink">PNG</span> {{ __('(transparency kept)') }}</p>
            </x-slot:settings>
        </x-image-batch>
    </div>
</x-tool-page>
