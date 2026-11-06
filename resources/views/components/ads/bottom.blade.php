{{-- Fixed size (.ad-unit-bottom) reserves the space and avoids layout shift (CLS) when the ad loads. --}}
<x-ads.slot position="bottom" :format="false" {{ $attributes }} />
