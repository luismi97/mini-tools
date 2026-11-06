{{-- Fixed size (.ad-unit-top) reserves the space and avoids layout shift (CLS) when the ad loads. --}}
<x-ads.slot position="top" :format="false" {{ $attributes }} />
