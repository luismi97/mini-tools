{{-- min-height reserves space to avoid layout shift (CLS) when the ad loads. --}}
<x-ads.slot position="bottom" {{ $attributes->merge(['class' => 'min-h-[250px]']) }} />
