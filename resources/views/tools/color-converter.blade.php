<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/color-converter.js')</x-slot:script>

    <div x-data="colorConverter" class="space-y-6">
        <section class="panel grid gap-6 p-5 md:grid-cols-[200px_minmax(0,1fr)]">
            <div class="space-y-3">
                <div class="aspect-square w-full rounded-xl border border-line" :style="`background:${color()?.hex ?? 'transparent'}`" role="img" :aria-label="$t('Color preview :hex', { hex: color()?.hex ?? '' })"></div>
                <input type="color" :value="color()?.hex ?? '#000000'" @input="setFromPicker($event.target.value)" aria-label="{{ __('Color picker') }}"
                       class="h-10 w-full cursor-pointer rounded-lg border border-line-strong bg-surface p-1">
            </div>
            <div class="min-w-0 space-y-4">
                <div>
                    <label for="color-input" class="label">{{ __('Color') }}</label>
                    <input id="color-input" type="text" x-model="input" spellcheck="false" class="field font-mono" placeholder="#0f766e, rgb(15, 118, 110) or hsl(175, 77%, 26%)">
                    <p x-show="!color()" x-cloak class="mt-1 text-sm text-danger">{{ __('Enter a valid HEX, RGB or HSL color.') }}</p>
                </div>
                <dl class="divide-y divide-line rounded-lg border border-line" x-show="color()">
                    <template x-for="key in ['hex', 'rgb', 'hsl']" :key="key">
                        <div class="flex items-center gap-3 px-4 py-2.5">
                            <dt class="w-12 text-xs uppercase text-muted" x-text="key"></dt>
                            <dd class="min-w-0 flex-1 font-mono text-sm text-ink" x-text="color()?.[key]"></dd>
                            <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="copy(color()[key], key)" x-text="copied === key ? $t('Copied') : $t('Copy')"></button>
                        </div>
                    </template>
                </dl>
            </div>
        </section>

        <section class="panel overflow-hidden">
            <h2 class="border-b border-line px-5 py-3 font-semibold tracking-tight">{{ __('Contrast checker (WCAG 2)') }}</h2>
            <div class="grid gap-6 p-5 md:grid-cols-[minmax(0,1fr)_minmax(0,1fr)]">
                <div class="space-y-4">
                    @foreach (['foreground' => 'Text color', 'background' => 'Background color'] as $field => $label)
                        <div>
                            <label for="c-{{ $field }}" class="label">{{ __($label) }}</label>
                            <div class="flex gap-2">
                                <input type="color" :value="hexOr({{ $field }}, '#000000')" @input="{{ $field }} = $event.target.value" aria-label="{{ __(':label picker', ['label' => __($label)]) }}"
                                       class="h-[38px] w-12 shrink-0 cursor-pointer rounded-lg border border-line-strong bg-surface p-1">
                                <input id="c-{{ $field }}" type="text" x-model="{{ $field }}" spellcheck="false" class="field font-mono">
                            </div>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-ghost -ml-2" @click="swap()"><x-icon name="swap" :size="16" /> {{ __('Swap colors') }}</button>
                </div>
                <div class="space-y-4" aria-live="polite">
                    <div class="rounded-xl border border-line p-5" :style="`background:${hexOr(background, '#ffffff')};color:${hexOr(foreground, '#000000')}`">
                        <p class="text-2xl font-semibold">{{ __('Large text preview') }}</p>
                        <p class="mt-1 text-sm">{{ __('Normal text preview: the quick brown fox jumps over the lazy dog.') }}</p>
                    </div>
                    <template x-if="contrastResult()">
                        <div>
                            <p class="text-3xl font-semibold tracking-tight text-ink" x-text="`${contrastResult().ratio} : 1`"></p>
                            <ul class="mt-3 grid grid-cols-2 gap-2 text-sm">
                                <template x-for="[label, pass] in [['AA normal text', contrastResult().aaNormal], ['AA large text', contrastResult().aaLarge], ['AAA normal text', contrastResult().aaaNormal], ['AAA large text', contrastResult().aaaLarge]]" :key="label">
                                    <li class="flex items-center justify-between rounded-lg px-3 py-2" :class="pass ? 'bg-success-soft text-success' : 'bg-danger-soft text-danger'">
                                        <span x-text="$t(label)"></span><span class="font-medium" x-text="pass ? $t('Pass') : $t('Fail')"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </template>
                </div>
            </div>
        </section>
    </div>
</x-tool-page>
