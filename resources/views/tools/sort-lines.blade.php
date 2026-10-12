<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/sort-lines.js')</x-slot:script>

    <div x-data="sortLines">
        <x-text-tool input-label="{{ __('Original list') }}" output-label="{{ __('Sorted list') }}" placeholder="{{ __('One item per line...') }}">
            <x-slot:toolbar>
                <label class="flex items-center gap-2 text-sm text-muted">
                    {{ __('Order') }}
                    <select x-model="options.order" class="field w-auto py-1.5">
                        <option value="asc">A → Z</option>
                        <option value="desc">Z → A</option>
                        <option value="length">{{ __('Shortest first') }}</option>
                        <option value="length-desc">{{ __('Longest first') }}</option>
                        <option value="reverse">{{ __('Reverse order') }}</option>
                        <option value="random">{{ __('Random') }}</option>
                    </select>
                </label>
                <button type="button" class="btn btn-secondary py-1.5" x-show="options.order === 'random'" x-cloak @click="options.seed++">
                    <x-icon name="refresh" :size="14" /> {{ __('Shuffle again') }}
                </button>
                <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="options.natural" class="size-4 accent-accent"> {{ __('Natural sort') }}</label>
                <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="options.caseSensitive" class="size-4 accent-accent"> {{ __('Case sensitive') }}</label>
                <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="options.unique" class="size-4 accent-accent"> {{ __('Remove duplicates') }}</label>
                <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="options.removeEmpty" class="size-4 accent-accent"> {{ __('Remove empty lines') }}</label>
            </x-slot:toolbar>
        </x-text-tool>
    </div>
</x-tool-page>
