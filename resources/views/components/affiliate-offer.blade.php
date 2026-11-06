{{--
    Labeled affiliate recommendation below a tool (config/affiliates.php). Renders nothing
    until the offer has an https URL and a brand. Clicks are reported by app.js; no third-party
    script loads with this box, so it costs no performance.
--}}
@props(['tool'])
@php
    $key = $tool->is_premium ? null : collect(config('affiliates.offers'))->search(fn ($offer) => in_array($tool->slug, $offer['tools'], true)
        && str_starts_with((string) $offer['url'], 'https://')
        && filled($offer['brand']));
    $offer = $key ? config("affiliates.offers.{$key}") : null;
@endphp
@if ($offer)
    <aside {{ $attributes->merge(['class' => 'panel flex flex-wrap items-center justify-between gap-x-6 gap-y-3 p-5']) }} aria-label="{{ __('Sponsored') }}">
        <div class="min-w-0 flex-1 basis-64">
            <p class="text-sm font-medium text-ink">{{ __($offer['title']) }}</p>
            <p class="mt-1 text-sm text-muted">{{ __($offer['text'], ['brand' => $offer['brand']]) }}</p>
            <p class="mt-2 text-xs text-faint">{{ __('Affiliate link: we may earn a commission at no extra cost to you.') }}</p>
        </div>
        <a href="{{ $offer['url'] }}" target="_blank" rel="sponsored noopener" data-affiliate-click="{{ $key }}" class="btn btn-secondary shrink-0">{{ __('Try :brand', ['brand' => $offer['brand']]) }}</a>
    </aside>
@endif
