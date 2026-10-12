<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/url-encoder.js')</x-slot:script>

    <div x-data="urlEncoder" class="space-y-6">
        <x-text-tool output-label="{{ __('Result') }}" placeholder="{{ __('Paste a URL or text...') }}">
            <x-slot:toolbar>
                <x-segmented model="options.mode" :options="['encode' => 'Encode', 'decode' => 'Decode']" label="{{ __('Mode') }}" />
                <x-segmented model="options.scope" :options="['component' => 'Component', 'full' => 'Full URL']" label="{{ __('Encoding scope') }}" x-show="options.mode === 'encode'" />
                <label class="flex items-center gap-2 text-sm text-muted" x-show="options.mode === 'decode'" x-cloak>
                    <input type="checkbox" x-model="options.plusAsSpace" class="size-4 accent-accent"> {{ __('Treat + as space') }}
                </label>
            </x-slot:toolbar>
        </x-text-tool>

        <template x-if="parsedUrl()">
            <div class="panel overflow-hidden">
                <h2 class="border-b border-line px-5 py-3 font-semibold tracking-tight">{{ __('URL breakdown') }}</h2>
                <dl class="grid gap-x-6 gap-y-2 px-5 py-4 text-sm sm:grid-cols-[120px_1fr]">
                    <dt class="text-muted">{{ __('Protocol') }}</dt><dd class="break-all font-mono text-ink" x-text="parsedUrl().protocol"></dd>
                    <dt class="text-muted">{{ __('Host') }}</dt><dd class="break-all font-mono text-ink" x-text="parsedUrl().host"></dd>
                    <dt class="text-muted">{{ __('Path') }}</dt><dd class="break-all font-mono text-ink" x-text="parsedUrl().path"></dd>
                    <dt class="text-muted" x-show="parsedUrl().hash">{{ __('Fragment') }}</dt><dd class="break-all font-mono text-ink" x-show="parsedUrl().hash" x-text="parsedUrl().hash"></dd>
                </dl>
                <template x-if="parsedUrl().params.length">
                    <table class="w-full border-t border-line text-left text-sm">
                        <thead class="text-xs text-muted"><tr><th class="px-5 py-2 font-medium">{{ __('Parameter') }}</th><th class="px-5 py-2 font-medium">{{ __('Decoded value') }}</th></tr></thead>
                        <tbody class="divide-y divide-line">
                            <template x-for="([key, value], i) in parsedUrl().params" :key="i">
                                <tr><td class="break-all px-5 py-2 font-mono text-ink" x-text="key"></td><td class="break-all px-5 py-2 font-mono text-ink" x-text="value"></td></tr>
                            </template>
                        </tbody>
                    </table>
                </template>
            </div>
        </template>
    </div>
</x-tool-page>
