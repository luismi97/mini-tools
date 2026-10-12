{{--
    Links to the current page in every language (from Seo::alternates), or to
    each language's home page when the page has no translations (e.g. 404).
    Plain links (no auto-redirect), so search engines can crawl every version.
    data-locale lets app.js remember the visitor's choice (lib/locale-pref.js).
    Variants: menu (header dropdown), inline (footer), list (mobile menu).
--}}
@use('App\Support\Locales')
@props(['alternates' => [], 'variant' => 'menu'])
@php
    $links = collect(Locales::all())->map(fn ($config, $code) => [
        'code' => $code,
        'label' => $config['native'],
        'href' => $alternates[$code] ?? lroute('home', [], $code),
        'hreflang' => $config['hreflang'],
        'current' => $code === Locales::current(),
    ]);
@endphp
@if ($variant === 'inline')
    {{-- Wraps onto several lines on narrow screens as more languages are added. --}}
    <nav {{ $attributes->merge(['class' => 'flex max-w-xs flex-wrap items-center gap-x-3 gap-y-1.5']) }} aria-label="{{ __('Language') }}">
        <x-icon name="globe" :size="14" />
        @foreach ($links as $link)
            @if ($link['current'])
                <span class="font-medium text-ink" aria-current="true">{{ $link['label'] }}</span>
            @else
                <a href="{{ $link['href'] }}" hreflang="{{ $link['hreflang'] }}" lang="{{ $link['hreflang'] }}" data-locale="{{ $link['code'] }}" class="hover:text-ink">{{ $link['label'] }}</a>
            @endif
        @endforeach
    </nav>
@elseif ($variant === 'list')
    {{-- Two-column grid with large touch targets (mobile menu). --}}
    <ul {{ $attributes->merge(['class' => 'grid grid-cols-2 gap-1.5']) }}>
        @foreach ($links as $link)
            <li>
                <a href="{{ $link['href'] }}" hreflang="{{ $link['hreflang'] }}" lang="{{ $link['hreflang'] }}" data-locale="{{ $link['code'] }}"
                   @class(['flex min-h-11 items-center justify-between gap-2 rounded-lg border px-3 text-sm transition-colors', 'border-accent bg-accent-soft font-medium text-ink' => $link['current'], 'border-line text-muted hover:border-line-strong hover:text-ink' => ! $link['current']])
                   @if ($link['current']) aria-current="true" @endif>
                    {{ $link['label'] }}
                    @if ($link['current'])
                        <x-icon name="check" :size="16" class="text-accent" />
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
@else
    <details {{ $attributes->merge(['class' => 'relative']) }}>
        <summary class="flex h-9 cursor-pointer list-none items-center gap-1.5 rounded-lg border border-line-strong bg-surface px-2.5 text-sm text-muted hover:text-ink [&::-webkit-details-marker]:hidden" aria-label="{{ __('Language') }}">
            <x-icon name="globe" :size="16" />
            <span class="font-medium uppercase">{{ Locales::current() }}</span>
        </summary>
        <ul class="absolute right-0 z-50 mt-2 min-w-36 rounded-xl border border-line bg-surface p-1 shadow-lg">
            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['href'] }}" hreflang="{{ $link['hreflang'] }}" lang="{{ $link['hreflang'] }}" data-locale="{{ $link['code'] }}"
                       @class(['flex items-center justify-between rounded-lg px-3 py-2 text-sm hover:bg-sunken', 'font-medium text-ink' => $link['current'], 'text-muted' => ! $link['current']])
                       @if ($link['current']) aria-current="true" @endif>
                        {{ $link['label'] }}
                        @if ($link['current'])
                            <x-icon name="check" :size="14" class="text-accent" />
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </details>
@endif
