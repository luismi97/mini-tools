<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/jpg-to-png.js')</x-slot:script>

    <div x-data="jpgToPng">
        <x-image-batch accept="image/jpeg,.jpg,.jpeg" formats="{{ __('JPG or JPEG') }}" result-label="PNG">
            <x-slot:settings>
                <p class="text-sm text-muted">{{ __('Output:') }} <span class="font-medium text-ink">PNG</span> {{ __('(lossless)') }}</p>
            </x-slot:settings>
        </x-image-batch>
    </div>
</x-tool-page>
