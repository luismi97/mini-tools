@props(['size' => 'compact'])
@php $hero = $size === 'hero'; @endphp
<div x-data="search({ shortcut: {{ $hero ? 'true' : 'false' }} })" class="relative" @click.outside="close()" @keydown.escape="close(); $refs.input.blur()">
    <label for="search-{{ $size }}" class="sr-only">{{ __('Search tools') }}</label>
    <div class="relative">
        <x-icon name="search" :size="$hero ? 20 : 16" @class([
            'pointer-events-none absolute top-1/2 -translate-y-1/2 text-faint',
            'left-4' => $hero,
            'left-3' => ! $hero,
        ]) />
        <input
            id="search-{{ $size }}"
            x-ref="input"
            x-model="query"
            @focus="show()"
            @input="show()"
            @keydown.arrow-down.prevent="move(1)"
            @keydown.arrow-up.prevent="move(-1)"
            @keydown.enter.prevent="go()"
            type="search"
            autocomplete="off"
            spellcheck="false"
            role="combobox"
            aria-autocomplete="list"
            aria-controls="search-results-{{ $size }}"
            :aria-expanded="open"
            placeholder="{{ __('Search tools...') }}"
            @class([
                'w-full border border-line-strong bg-surface text-ink placeholder:text-faint focus:border-accent focus:outline-none focus:ring-4 focus:ring-accent/15',
                'h-14 rounded-xl pl-12 pr-14 text-base shadow-sm' => $hero,
                'h-9 rounded-lg pl-9 pr-3 text-sm' => ! $hero,
            ])
        >
        @if ($hero)
            <kbd class="pointer-events-none absolute right-4 top-1/2 hidden -translate-y-1/2 rounded border border-line-strong px-1.5 py-0.5 font-mono text-xs text-faint sm:block">/</kbd>
        @endif
    </div>

    <ul
        id="search-results-{{ $size }}"
        x-show="open"
        x-cloak
        x-transition.opacity.duration.100ms
        role="listbox"
        class="absolute inset-x-0 top-full z-40 mt-2 max-h-96 overflow-auto rounded-xl border border-line bg-surface p-1.5 shadow-lg {{ $hero ? '' : 'min-w-72 right-0 left-auto' }}"
    >
        <template x-for="(tool, i) in results" :key="tool.url">
            <li role="option" :aria-selected="i === active">
                <a :href="tool.url" @mouseenter="active = i"
                   class="flex flex-col rounded-lg px-3 py-2"
                   :class="i === active ? 'bg-sunken' : ''">
                    <span class="text-sm font-medium text-ink" x-text="tool.name"></span>
                    <span class="truncate text-xs text-muted" x-text="tool.description"></span>
                </a>
            </li>
        </template>
        <li x-show="results.length === 0" class="px-3 py-2 text-sm text-muted">
            {{ __('No tools found. More are coming soon.') }}
            <a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}" class="mt-1 block font-medium text-accent hover:underline">{{ __('Suggest a tool') }}</a>
        </li>
    </ul>
</div>
