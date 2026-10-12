<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/json-formatter.js')</x-slot:script>

    <div x-data="jsonFormatter" class="panel overflow-hidden">
        {{-- Toolbar --}}
        <div class="flex flex-wrap items-center gap-2 border-b border-line bg-paper/60 p-3">
            <button type="button" class="btn btn-primary" @click="run('json')">
                <x-icon name="align-left" :size="16" /> {{ __('Format') }}
            </button>
            <button type="button" class="btn btn-secondary" @click="run('min')">
                <x-icon name="minimize" :size="16" /> {{ __('Minify') }}
            </button>
            <button type="button" class="btn btn-secondary" @click="validate()">
                <x-icon name="check-circle" :size="16" /> {{ __('Validate') }}
            </button>
            <span class="mx-1 hidden h-6 w-px bg-line sm:block" aria-hidden="true"></span>
            <button type="button" class="btn btn-ghost" @click="run('csv')">To CSV</button>
            <button type="button" class="btn btn-ghost" @click="run('ts')">{{ __('To TypeScript') }}</button>

            <div class="flex w-full items-center gap-3 sm:ml-auto sm:w-auto">
                <label class="flex items-center gap-2 text-sm text-muted">
                    <span class="sr-only sm:not-sr-only">{{ __('Indent') }}</span>
                    <select x-model="indent" class="field w-auto py-1.5" aria-label="{{ __('Indentation') }}">
                        <option value="2">{{ __('2 spaces') }}</option>
                        <option value="4">{{ __('4 spaces') }}</option>
                        <option value="tab">{{ __('Tabs') }}</option>
                    </select>
                </label>
                <label class="flex items-center gap-2 text-sm text-muted">
                    <input type="checkbox" x-model="sortKeys" class="size-4 accent-accent">
                    {{ __('Sort keys') }}
                </label>
            </div>
        </div>

        <div class="grid lg:grid-cols-2">
            {{-- Input --}}
            <div class="flex min-w-0 flex-col border-b border-line lg:border-b-0 lg:border-r">
                <div class="flex items-center justify-between px-4 py-2.5">
                    <label for="json-input" class="kicker">{{ __('Input') }}</label>
                    <div class="flex items-center gap-1">
                        <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="loadSample()">{{ __('Load sample') }}</button>
                        <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="clear()" :disabled="!input">
                            <x-icon name="trash" :size="14" /> {{ __('Clear') }}
                        </button>
                    </div>
                </div>
                <textarea
                    id="json-input"
                    x-ref="input"
                    x-model="input"
                    @input="liveValidate()"
                    @keydown.ctrl.enter.prevent="run('json')"
                    @keydown.meta.enter.prevent="run('json')"
                    spellcheck="false"
                    autocomplete="off"
                    autocapitalize="off"
                    placeholder='Paste your JSON here... e.g. {"name": "value"}'
                    class="h-80 w-full resize-y border-0 bg-transparent px-4 pb-4 font-mono text-[13px] leading-6 text-ink placeholder:text-faint focus:outline-none focus:ring-0 lg:h-[28rem]"
                ></textarea>
                <div class="flex min-h-11 items-center justify-between gap-3 border-t border-line px-4 py-2 text-sm" aria-live="polite">
                    <template x-if="status && status.type === 'valid'">
                        <span class="flex items-center gap-1.5 text-success"><x-icon name="check-circle" :size="16" /> <span x-text="status.message"></span></span>
                    </template>
                    <template x-if="status && status.type === 'error'">
                        <button type="button" class="flex min-w-0 items-center gap-1.5 text-left text-danger" @click="jumpToError()">
                            <x-icon name="alert-circle" :size="16" />
                            <span class="truncate">
                                <span x-show="status.line" x-text="$t('Line :line, column :column: ', { line: status.line, column: status.column })"></span>
                                <span x-text="status.message"></span>
                            </span>
                        </button>
                    </template>
                    <span x-show="!status" class="text-faint">{{ __('Tip: press Ctrl + Enter to format') }}</span>
                    <span class="shrink-0 font-mono text-xs text-faint" x-text="inputSize"></span>
                </div>
            </div>

            {{-- Output --}}
            <div class="flex min-w-0 flex-col">
                <div class="flex items-center justify-between px-4 py-2.5">
                    <label for="json-output" class="kicker" x-text="$t(outputLabel)">{{ __('Output') }}</label>
                    <div class="flex items-center gap-1">
                        <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="copy()" :disabled="!output">
                            <x-icon name="copy" :size="14" x-show="!copied" />
                            <x-icon name="check" :size="14" x-show="copied" x-cloak />
                            <span x-text="copied ? $t('Copied') : $t('Copy')">{{ __('Copy') }}</span>
                        </button>
                        <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="download()" :disabled="!output">
                            <x-icon name="download" :size="14" /> {{ __('Download') }}
                        </button>
                    </div>
                </div>
                <textarea
                    id="json-output"
                    x-model="output"
                    readonly
                    spellcheck="false"
                    placeholder="{{ __('The result will appear here.') }}"
                    class="h-80 w-full resize-y border-0 bg-transparent px-4 pb-4 font-mono text-[13px] leading-6 text-ink placeholder:text-faint focus:outline-none focus:ring-0 lg:h-[28rem]"
                ></textarea>
                <div class="flex min-h-11 items-center justify-between gap-3 border-t border-line px-4 py-2 text-sm">
                    <button type="button" class="btn btn-ghost -ml-2 px-2 py-1 text-xs" @click="useOutputAsInput()" x-show="output && (outputKind === 'json' || outputKind === 'min')" x-cloak>
                        <x-icon name="repeat" :size="14" /> {{ __('Use as input') }}
                    </button>
                    <span></span>
                    <span class="shrink-0 font-mono text-xs text-faint" x-show="output" x-text="outputSize" x-cloak></span>
                </div>
            </div>
        </div>
    </div>
</x-tool-page>
