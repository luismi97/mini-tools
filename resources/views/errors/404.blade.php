@php
    // URLs that match no route never pass through the SetLocale middleware,
    // so pick the language from the URL prefix (e.g. /es/...).
    foreach (\App\Support\Locales::codes() as $code) {
        $prefix = \App\Support\Locales::get('prefix', $code);
        if ($prefix !== '' && request()->segment(1) === $prefix) {
            app()->setLocale($code);
        }
    }
@endphp
<x-layouts.app :seo="\App\Support\Seo::make(__('Page not found'), __('The page you are looking for does not exist.'))->noindex()">
    <div class="mx-auto max-w-xl px-4 py-24 text-center sm:px-6">
        <p class="kicker">{{ __('Error 404') }}</p>
        <h1 class="mt-3 text-3xl font-semibold tracking-tight">{{ __('Page not found') }}</h1>
        <p class="mt-3 text-muted">{{ __("The page you are looking for doesn't exist or has been moved. Try searching for a tool instead.") }}</p>
        <div class="mt-8 text-left">
            <x-search size="hero" />
        </div>
        <a href="{{ lroute('home') }}" class="btn btn-secondary mt-8">{{ __('Back to all tools') }}</a>
    </div>
</x-layouts.app>
