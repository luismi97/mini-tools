<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/heic-to-jpg.js')</x-slot:script>

    <div x-data="heicToJpg">
        <x-image-batch accept=".heic,.heif,image/heic,image/heif" formats="{{ __('HEIC or HEIF') }}" result-label="{{ __('Download') }}">
            <x-slot:settings>
                <div>
                    <p class="label">{{ __('Convert to') }}</p>
                    <x-segmented model="settings.format" :options="['image/jpeg' => 'JPG', 'image/png' => 'PNG']" label="{{ __('Output format') }}" />
                </div>
                <x-fields.quality x-show="settings.format === 'image/jpeg'" />
            </x-slot:settings>
        </x-image-batch>
        <p class="mt-3 text-xs text-faint">
            {!! __('HEIC decoding uses :libheif via :heicto, licensed under LGPL-3.0 and loaded unmodified.', [
                'libheif' => '<a href="https://github.com/strukturag/libheif" class="underline hover:text-ink" rel="noopener" target="_blank">libheif</a>',
                'heicto' => '<a href="https://github.com/hoppergee/heic-to" class="underline hover:text-ink" rel="noopener" target="_blank">heic-to</a>',
            ]) !!}
        </p>
    </div>
</x-tool-page>
