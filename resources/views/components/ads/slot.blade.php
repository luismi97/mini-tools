{{--
    Single source of ad markup. Renders nothing unless ads are enabled globally
    and both a client ID and a slot ID are configured for this position.
    Whether a specific page/tool allows ads is decided by the caller
    (see Tool::showsAds()).
--}}
@props(['position', 'format' => 'auto'])
@php
    $client = config('ads.client_id');
    $slot = config("ads.slots.{$position}");
@endphp
@if (config('ads.enabled') && $client && $slot)
    <aside {{ $attributes->merge(['class' => 'ad-slot']) }} data-ad-slot="{{ $position }}" aria-label="{{ __('Advertisement') }}">
        <p class="kicker mb-1 text-center text-[10px]">{{ __('Advertisement') }}</p>
        <ins class="adsbygoogle block"
             data-ad-client="{{ $client }}"
             data-ad-slot="{{ $slot }}"
             data-ad-format="{{ $format }}"
             data-full-width-responsive="true"></ins>
        <script>(window.adsbygoogle = window.adsbygoogle || []).push({});</script>
    </aside>
@endif
