<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/uuid-generator.js')</x-slot:script>

    <div x-data="uuidGenerator" class="grid gap-6 lg:grid-cols-[320px_minmax(0,1fr)]">
        <div class="panel space-y-5 self-start p-5">
            <div>
                <label for="uuid-count" class="label">{{ __('How many') }}</label>
                <input id="uuid-count" type="number" min="1" max="1000" x-model.number="options.count" class="field">
            </div>
            <div>
                <p class="label">{{ __('Version') }}</p>
                <x-segmented model="options.version" :options="['v4' => 'Version 4', 'v7' => 'Version 7']" label="{{ __('UUID version') }}" class="w-full [&>button]:flex-1" />
                <p class="mt-1.5 text-xs text-muted" x-text="options.version === 'v4' ? $t('Random. The most widely used.') : $t('Time-ordered. Great for database keys.')"></p>
            </div>
            <div class="space-y-2 text-sm text-muted">
                <label class="flex items-center gap-2"><input type="checkbox" x-model="options.uppercase" class="size-4 accent-accent"> {{ __('Uppercase') }}</label>
                <label class="flex items-center gap-2"><input type="checkbox" x-model="options.hyphens" class="size-4 accent-accent"> {{ __('Hyphens') }}</label>
                <label class="flex items-center gap-2"><input type="checkbox" x-model="options.braces" class="size-4 accent-accent"> Braces { }</label>
            </div>
            <button type="button" class="btn btn-primary w-full" @click="generate()">
                <x-icon name="refresh" :size="16" /> {{ __('Generate') }}
            </button>
        </div>

        <div class="min-w-0 space-y-6">
            <div class="panel overflow-hidden">
                <div class="flex items-center justify-between px-4 py-2.5">
                    <label for="uuid-output" class="kicker"><span x-text="lineCount()"></span> UUIDs</label>
                    <div class="flex items-center gap-1">
                        <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="copy()">
                            <x-icon name="copy" :size="14" /> <span x-text="copied ? $t('Copied') : $t('Copy all')"></span>
                        </button>
                        <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="download()">
                            <x-icon name="download" :size="14" /> {{ __('Download') }}
                        </button>
                    </div>
                </div>
                <textarea id="uuid-output" x-model="output" readonly spellcheck="false"
                    class="h-80 w-full resize-y border-0 bg-transparent px-4 pb-4 font-mono text-[13px] leading-6 text-ink focus:outline-none focus:ring-0"></textarea>
            </div>

            <div class="panel p-5">
                <label for="uuid-check" class="label">{{ __('Validate a UUID') }}</label>
                <input id="uuid-check" type="text" x-model="check" class="field font-mono" placeholder="{{ __('Paste a UUID to check its format and version') }}" spellcheck="false">
                <template x-if="checkResult()">
                    <p class="mt-2 flex items-center gap-1.5 text-sm" :class="checkResult().valid ? 'text-success' : 'text-danger'">
                        <span x-text="checkResult().valid ? $t('Valid UUID (version :n)', { n: checkResult().version }) : $t('Not a valid UUID')"></span>
                    </p>
                </template>
            </div>
        </div>
    </div>
</x-tool-page>
