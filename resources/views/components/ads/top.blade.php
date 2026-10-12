{{-- min-height reserves space to avoid layout shift (CLS) when the ad loads. --}}
<x-ads.slot position="top" {{ $attributes->merge(['class' => 'min-h-[100px]']) }} />
