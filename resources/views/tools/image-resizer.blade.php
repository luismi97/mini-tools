<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/image-resizer.js')</x-slot:script>

    <div x-data="imageResizer">
        <x-image-batch accept="image/jpeg,image/png,image/webp,image/heic,image/heif,.heic,.heif" formats="{{ __('JPG, PNG, WebP or HEIC') }}" result-label="{{ __('Download') }}">
            <x-slot:settings>
                <div>
                    <p class="label">{{ __('Resize') }}</p>
                    <x-segmented model="settings.mode" :options="['percent' => 'By percentage', 'dimensions' => 'By size']" label="{{ __('Resize mode') }}" />
                </div>
                <div x-show="settings.mode === 'percent'" class="w-full sm:w-64">
                    <div class="mb-1.5 flex items-center justify-between">
                        <label for="resize-percent" class="text-sm font-medium text-ink">{{ __('Scale') }}</label>
                        <span class="font-mono text-sm text-muted" x-text="settings.percent + '%'"></span>
                    </div>
                    <input id="resize-percent" type="range" min="5" max="200" step="5" x-model.number="settings.percent" class="w-full accent-accent">
                </div>
                <div x-show="settings.mode === 'dimensions'" x-cloak class="flex flex-wrap items-end gap-3">
                    <div>
                        <label for="resize-width" class="label">{{ __('Width (px)') }}</label>
                        <input id="resize-width" type="number" min="1" max="16384" x-model.number="settings.width" class="field w-32" placeholder="{{ __('Auto') }}">
                    </div>
                    <div>
                        <label for="resize-height" class="label">{{ __('Height (px)') }}</label>
                        <input id="resize-height" type="number" min="1" max="16384" x-model.number="settings.height" class="field w-32" placeholder="{{ __('Auto') }}">
                    </div>
                    <label class="flex items-center gap-2 pb-2 text-sm text-muted">
                        <input type="checkbox" x-model="settings.keepAspect" class="size-4 accent-accent"> {{ __('Lock aspect ratio') }}
                    </label>
                </div>
                <div>
                    <label for="resize-format" class="label">{{ __('Format') }}</label>
                    <select id="resize-format" x-model="settings.format" class="field w-40">
                        <option value="original">{{ __('Same as input') }}</option>
                        <option value="image/jpeg">JPG</option>
                        <option value="image/png">PNG</option>
                        <option value="image/webp">{{ __('WebP') }}</option>
                    </select>
                </div>
            </x-slot:settings>
        </x-image-batch>
    </div>
</x-tool-page>
