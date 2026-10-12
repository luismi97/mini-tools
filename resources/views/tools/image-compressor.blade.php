<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/image-compressor.js')</x-slot:script>

    <div x-data="imageCompressor">
        <x-image-batch accept="image/jpeg,image/png,image/webp,image/heic,image/heif,.heic,.heif" formats="{{ __('JPG, PNG, WebP or HEIC') }}" result-label="{{ __('Download') }}">
            <x-slot:settings>
                <x-fields.quality />
                <div>
                    <label for="format" class="label">{{ __('Output format') }}</label>
                    <select id="format" x-model="settings.format" class="field w-44">
                        <option value="original">{{ __('Same as input') }}</option>
                        <option value="image/jpeg">JPG</option>
                        <option value="image/webp">{{ __('WebP') }}</option>
                        <option value="image/png">PNG</option>
                    </select>
                </div>
                <div>
                    <label for="max-width" class="label">{{ __('Max width') }}</label>
                    <select id="max-width" x-model="settings.maxWidth" class="field w-44">
                        <option value="">{{ __('Original size') }}</option>
                        <option value="3840">{{ __('3840 px (4K)') }}</option>
                        <option value="2560">{{ __('2560 px') }}</option>
                        <option value="1920">{{ __('1920 px (Full HD)') }}</option>
                        <option value="1280">{{ __('1280 px') }}</option>
                        <option value="800">{{ __('800 px') }}</option>
                    </select>
                </div>
            </x-slot:settings>
        </x-image-batch>
    </div>
</x-tool-page>
