<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/crop-image.js')</x-slot:script>

    <div x-data="cropImage" class="space-y-4">
        <template x-if="!url">
            <x-dropzone accept="image/jpeg,image/png,image/webp" :multiple="false" label="{{ __('Drop an image here or') }}"
                hint="{{ __('JPG, PNG or WebP · up to 25 MB · you can also paste (Ctrl + V)') }}" />
        </template>
        <p x-show="error" x-cloak x-text="error" class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" role="alert"></p>

        <div x-show="url" x-cloak class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_300px]">
            {{-- Stage --}}
            <div class="panel grid place-items-center overflow-hidden bg-sunken p-4">
                <div class="relative inline-block max-w-full touch-none overflow-hidden select-none" x-ref="stage">
                    <img :src="url" alt="{{ __('Image to crop') }}" @load="onImageLoad($event)" class="block max-h-[65vh] max-w-full" draggable="false">
                    <div x-show="natural.width" class="absolute cursor-move outline-none ring-2 ring-white focus-visible:ring-accent"
                         :style="boxStyle() + ';box-shadow:0 0 0 9999px rgb(0 0 0 / .55)'"
                         tabindex="0" role="slider" aria-label="{{ __('Crop selection. Use arrow keys to move.') }}"
                         @pointerdown="startDrag($event, 'move')" @keydown="nudge($event)">
                        {{-- Rule-of-thirds guides --}}
                        <div class="pointer-events-none absolute inset-0 grid grid-cols-3 grid-rows-3">
                            @for ($i = 0; $i < 9; $i++)
                                <span class="border border-white/25"></span>
                            @endfor
                        </div>
                        @foreach (['nw' => '-left-1.5 -top-1.5 cursor-nwse-resize', 'ne' => '-right-1.5 -top-1.5 cursor-nesw-resize', 'sw' => '-bottom-1.5 -left-1.5 cursor-nesw-resize', 'se' => '-bottom-1.5 -right-1.5 cursor-nwse-resize'] as $corner => $classes)
                            <span class="absolute size-3.5 rounded-sm border-2 border-white bg-accent {{ $classes }}"
                                  @pointerdown.stop="startDrag($event, '{{ $corner }}')"></span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Controls --}}
            <div class="panel space-y-5 self-start p-5">
                <div>
                    <p class="label">{{ __('Aspect ratio') }}</p>
                    <div class="grid grid-cols-4 gap-1.5">
                        <template x-for="(meta, key) in ratios" :key="key">
                            <button type="button" class="rounded-md border px-2 py-1.5 text-sm transition"
                                :class="ratio === key ? 'border-accent bg-accent-soft font-medium text-accent' : 'border-line-strong text-muted hover:text-ink'"
                                @click="ratio = key" x-text="$t(meta.label)"></button>
                        </template>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    @foreach (['x' => 'X', 'y' => 'Y', 'width' => 'Width', 'height' => 'Height'] as $field => $label)
                        <div>
                            <label for="crop-{{ $field }}" class="mb-1 block text-xs text-muted">{{ __($label) }} (px)</label>
                            <input id="crop-{{ $field }}" type="number" min="0" class="field py-1.5 font-mono"
                                   :value="rect.{{ $field }}" @change="setField('{{ $field }}', $event.target.value)">
                        </div>
                    @endforeach
                </div>
                <p class="text-xs text-muted" x-text="$t('Original: :size px', { size: `${natural.width} × ${natural.height}` })"></p>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="crop-format" class="label">{{ __('Format') }}</label>
                        <select id="crop-format" x-model="format" class="field">
                            <option value="original">{{ __('Original') }}</option>
                            <option value="image/jpeg">JPG</option>
                            <option value="image/png">PNG</option>
                            <option value="image/webp">{{ __('WebP') }}</option>
                        </select>
                    </div>
                    <div x-show="outputType() !== 'image/png'">
                        <label for="crop-quality" class="label">{{ __('Quality') }}</label>
                        <input id="crop-quality" type="number" min="10" max="100" x-model.number="quality" class="field">
                    </div>
                </div>

                <button type="button" class="btn btn-primary w-full" @click="crop()" :disabled="busy">
                    <x-icon name="crop" :size="16" /> <span x-text="busy ? $t('Cropping…') : $t('Crop & download')">{{ __('Crop & download') }}</span>
                </button>
                <p x-show="result" x-cloak class="text-sm text-success" x-text="result && $t('Saved :size px :format (:bytes)', { size: `${result.width} × ${result.height}`, format: result.ext.toUpperCase(), bytes: result.size })"></p>
                <button type="button" class="btn btn-ghost w-full" @click="reset()">
                    <x-icon name="refresh" :size="16" /> {{ __('Choose another image') }}
                </button>
            </div>
        </div>
    </div>
</x-tool-page>
