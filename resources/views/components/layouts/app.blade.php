@props([
    'seo' => null,
    'ads' => config('ads.enabled'),
    'tool' => null,
    'showHeaderSearch' => true,
])
@use('App\Support\Locales')
@php
    $seo ??= \App\Support\Seo::make(config('site.name'), __(config('site.default_description')));
    $adsReady = $ads && config('ads.enabled') && config('ads.client_id');
    $locale = Locales::current();
    $i18nScript = \App\Support\Translations::scriptUrl($locale);
@endphp
<!DOCTYPE html>
<html lang="{{ Locales::get('hreflang') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (count($seo->alternates) > 1)
        {{-- Visitors who chose a language before land on it when arriving from outside the site.
             Runs before the first paint; crawlers have no stored choice, so they always get the
             requested URL. Mirrors redirectTarget() in resources/js/lib/locale-pref.js. --}}
        <script>(function(){try{var p=localStorage.getItem('tk-locale'),a=@json($seo->alternates),r=document.referrer;if(!p||p===@json($locale)||!a[p])return;if(r&&new URL(r).host===location.host)return;location.replace(a[p]+location.search+location.hash);}catch(e){}})();</script>
    @endif
    <title>{{ $seo->fullTitle() }}</title>
    <meta name="description" content="{{ $seo->description }}">
    <link rel="canonical" href="{{ $seo->canonical }}">
    @if (count($seo->alternates) > 1)
        @foreach ($seo->alternates as $code => $href)
            <link rel="alternate" hreflang="{{ Locales::get('hreflang', $code) }}" href="{{ $href }}">
        @endforeach
        <link rel="alternate" hreflang="x-default" href="{{ $seo->alternates[Locales::default()] }}">
    @endif
    <meta name="robots" content="{{ $seo->robots() }}">
    @if (config('site.verification.google'))
        <meta name="google-site-verification" content="{{ config('site.verification.google') }}">
    @endif
    @if (config('ads.client_id'))
        {{-- AdSense site ownership verification (works even while ADS_ENABLED=false). --}}
        <meta name="google-adsense-account" content="{{ config('ads.client_id') }}">
    @endif
    @if (config('site.verification.bing'))
        <meta name="msvalidate.01" content="{{ config('site.verification.bing') }}">
    @endif
    <meta name="theme-color" content="#f6f5f1" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#111113" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="48x48">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <meta property="og:type" content="{{ $seo->ogType }}">
    <meta property="og:site_name" content="{{ config('site.name') }}">
    <meta property="og:title" content="{{ $seo->fullTitle() }}">
    <meta property="og:description" content="{{ $seo->description }}">
    <meta property="og:url" content="{{ $seo->canonical }}">
    <meta property="og:image" content="{{ $seo->image }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ $seo->title }}">
    <meta property="og:locale" content="{{ Locales::get('og') }}">
    @foreach (array_keys($seo->alternates) as $code)
        @if ($code !== $locale)
            <meta property="og:locale:alternate" content="{{ Locales::get('og', $code) }}">
        @endif
    @endforeach
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo->fullTitle() }}">
    <meta name="twitter:description" content="{{ $seo->description }}">
    <meta name="twitter:image" content="{{ $seo->image }}">
    <meta name="twitter:image:alt" content="{{ $seo->title }}">
    @if (config('site.twitter'))
        <meta name="twitter:site" content="{{ '@'.config('site.twitter') }}">
    @endif

    @foreach ($seo->schemas as $schema)
        <script type="application/ld+json">{!! \App\Support\Seo::json($schema) !!}</script>
    @endforeach

    {{-- Locale + UI strings for JavaScript (lib/i18n.js). Deferred scripts run in document
         order with the module scripts below, so the dictionary is ready before them. --}}
    <script>window.__locale = @json(Locales::get('intl')); window.__currency = @json(Locales::get('currency') ?? 'USD');</script>
    @if ($i18nScript)
        <script src="{{ $i18nScript }}" defer></script>
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{ $head ?? '' }}

    @if ($adsReady)
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ urlencode(config('ads.client_id')) }}" crossorigin="anonymous"></script>
    @endif
    <x-analytics />
</head>
<body class="flex min-h-screen flex-col font-sans" @if ($tool) data-tool="{{ $tool->slug }}" @endif @if (config('analytics.enabled') && config('analytics.gtm_id')) data-analytics="gtm" @endif>
    <x-analytics.noscript />
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 btn btn-primary">{{ __('Skip to content') }}</a>

    <x-site-header :show-search="$showHeaderSearch" :alternates="$seo->alternates" />

    <main id="main" class="flex-1">
        {{ $slot }}
    </main>

    <x-site-footer :alternates="$seo->alternates" />

    <x-locale-suggestion :alternates="$seo->alternates" />

    <script type="application/json" id="search-index">{!! \App\Support\Seo::json(\App\Support\Catalog::searchIndex()) !!}</script>
</body>
</html>
