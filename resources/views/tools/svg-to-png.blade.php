<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/svg-to-png.js')</x-slot:script>

    <div x-data="svgToPng">
        <x-image-batch accept="image/svg+xml,.svg" formats="SVG" result-label="PNG">
            <x-slot:settings>
                <div>
                    <p class="label">{{ __('Scale') }}</p>
                    <x-segmented model="settings.scale" :options="[1 => '1×', 2 => '2×', 4 => '4×', 8 => '8×']" label="{{ __('Scale') }}" />
                </div>
                {{-- bgColor always holds a valid color for the picker; settings.background is '' when transparent. --}}
                <div class="flex items-center gap-4 pb-1" x-data="{ bgColor: '#ffffff' }">
                    <label class="flex items-center gap-2 text-sm text-muted">
                        <input type="checkbox" class="size-4 accent-accent" :checked="!settings.background"
                               @change="settings.background = $event.target.checked ? '' : bgColor">
                        {{ __('Transparent background') }}
                    </label>
                    <input type="color" x-show="settings.background" x-cloak x-model="bgColor" @input="settings.background = bgColor" aria-label="{{ __('Background color') }}"
                           class="h-9 w-12 cursor-pointer rounded-md border border-line-strong bg-surface p-1">
                </div>
            </x-slot:settings>
        </x-image-batch>
    </div>
</x-tool-page>
