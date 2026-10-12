<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/remove-duplicate-lines.js')</x-slot:script>

    <div x-data="removeDuplicateLines">
        <x-text-tool input-label="{{ __('Original list') }}" output-label="{{ __('Unique lines') }}" placeholder="{{ __('One item per line...') }}">
            <x-slot:toolbar>
                <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" :checked="!options.caseSensitive" @change="options.caseSensitive = !$event.target.checked" class="size-4 accent-accent"> {{ __('Ignore case') }}</label>
                <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="options.trim" class="size-4 accent-accent"> {{ __('Trim spaces') }}</label>
                <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="options.removeEmpty" class="size-4 accent-accent"> {{ __('Remove empty lines') }}</label>
                <p class="text-sm sm:ml-auto" x-show="meta && input" x-cloak>
                    <span class="font-medium text-success" x-text="$t(':count removed', { count: meta?.removed ?? 0 })"></span>
                    <span class="text-muted" x-text="' · ' + $t(':count lines kept', { count: meta?.kept ?? 0 })"></span>
                </p>
            </x-slot:toolbar>
        </x-text-tool>
    </div>
</x-tool-page>
