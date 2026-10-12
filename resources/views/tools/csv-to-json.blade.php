<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/csv-to-json.js')</x-slot:script>

    <div x-data="csvToJson">
        <x-text-tool input-label="CSV" output-label="JSON" placeholder="{{ __('Paste CSV here...') }}">
            <x-slot:toolbar>
                <label class="flex items-center gap-2 text-sm text-muted">
                    {{ __('Delimiter') }}
                    <select x-model="options.delimiter" class="field w-auto py-1.5">
                        <option value="auto">{{ __('Auto') }}</option>
                        <option value=",">{{ __('Comma') }}</option>
                        <option value=";">{{ __('Semicolon') }}</option>
                        <option value="tab">{{ __('Tab') }}</option>
                        <option value="|">{{ __('Pipe') }}</option>
                    </select>
                </label>
                <label class="flex items-center gap-2 text-sm text-muted">
                    {{ __('Output') }}
                    <select x-model="options.indent" class="field w-auto py-1.5">
                        <option value="2">{{ __('2 spaces') }}</option>
                        <option value="4">{{ __('4 spaces') }}</option>
                        <option value="min">{{ __('Minified') }}</option>
                    </select>
                </label>
                <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="options.header" class="size-4 accent-accent"> {{ __('First row is header') }}</label>
                <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="options.inferTypes" class="size-4 accent-accent"> {{ __('Detect types') }}</label>
            </x-slot:toolbar>
        </x-text-tool>
    </div>
</x-tool-page>
