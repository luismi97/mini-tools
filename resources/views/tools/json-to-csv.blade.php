<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/json-to-csv.js')</x-slot:script>

    <div x-data="jsonToCsv">
        <x-text-tool input-label="JSON" output-label="CSV" placeholder='Paste JSON here, e.g. [{"name": "Ada", "age": 36}]'>
            <x-slot:toolbar>
                <span class="text-sm text-muted">{{ __('Delimiter') }}</span>
                <x-segmented model="options.delimiter" :options="[',' => 'Comma', ';' => 'Semicolon', 'tab' => 'Tab', '|' => 'Pipe']" label="{{ __('Delimiter') }}" />
            </x-slot:toolbar>
        </x-text-tool>
    </div>
</x-tool-page>
