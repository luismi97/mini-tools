{{--
    Brand wordmark: the site name as one lowercase word, first part light, rest
    semibold ("Tiny Knack" → tiny|knack). Screen readers get the real name.
--}}
@php
    $parts = preg_split('/\s+/', trim(config('site.name')));
    $first = mb_strtolower(array_shift($parts));
    $rest = mb_strtolower(implode('', $parts));
@endphp
<span {{ $attributes->merge(['class' => 'whitespace-nowrap text-[17px] tracking-tight']) }} aria-label="{{ config('site.name') }}">
    <span aria-hidden="true"><span class="font-normal text-muted">{{ $first }}</span><span class="font-semibold text-ink">{{ $rest }}</span></span>
</span>
