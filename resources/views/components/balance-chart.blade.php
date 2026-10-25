{{--
    Remaining-balance chart (inline SVG, no chart library).
    The surrounding Alpine component provides `money(value)`; `data` is an Alpine
    expression returning balanceChart() from resources/js/lib/chart.js (or null).

    <x-balance-chart data="chart()" :label="__('With extra payments')" :compare-label="__('Without extra payments')" />
--}}
@props(['data', 'label', 'compareLabel' => null, 'title' => null])
<template x-if="{{ $data }}">
    <figure class="panel p-5" x-data="{ c: null }" x-effect="c = {{ $data }}">
        <figcaption class="flex flex-wrap items-center justify-between gap-x-4 gap-y-2">
            <h2 class="font-semibold tracking-tight">{{ $title ?? __('Balance over time') }}</h2>
            <span class="flex flex-wrap gap-x-4 gap-y-1 text-xs text-muted">
                <span class="flex items-center gap-1.5"><span class="h-0.5 w-4 rounded bg-accent"></span> {{ $label }}</span>
                @if ($compareLabel)
                    <span x-show="c && c.compare" class="flex items-center gap-1.5"><span class="w-4 border-t-2 border-dashed border-line-strong"></span> {{ $compareLabel }}</span>
                @endif
            </span>
        </figcaption>
        <div class="mt-4 grid grid-cols-[auto_minmax(0,1fr)] gap-x-3">
            <div class="flex flex-col justify-between py-0.5 text-right text-xs tabular-nums text-faint" aria-hidden="true">
                <span x-text="c && money(c.yMax)"></span>
                <span x-text="c && money(c.yMax / 2)"></span>
                <span x-text="c && money(0)"></span>
            </div>
            <svg viewBox="0 0 600 220" preserveAspectRatio="none" class="h-44 w-full overflow-visible sm:h-52" role="img"
                 :aria-label="c && $t('Remaining balance from :start to 0 over :count years', { start: money(c.yMax), count: c.years })">
                <g class="stroke-line" stroke-width="1" vector-effect="non-scaling-stroke">
                    <line x1="0" x2="600" y1="4" y2="4" vector-effect="non-scaling-stroke" />
                    <line x1="0" x2="600" y1="110" y2="110" vector-effect="non-scaling-stroke" />
                    <line x1="0" x2="600" y1="216" y2="216" vector-effect="non-scaling-stroke" />
                </g>
                <path :d="c && c.area" class="fill-accent/15" />
                <path :d="c && c.compare" fill="none" class="stroke-line-strong" stroke-width="2" stroke-dasharray="6 5" vector-effect="non-scaling-stroke" />
                <path :d="c && c.line" fill="none" class="stroke-accent" stroke-width="2.5" stroke-linejoin="round" vector-effect="non-scaling-stroke" />
            </svg>
            <span></span>
            <div class="mt-1 flex justify-between text-xs text-faint" aria-hidden="true">
                <span>{{ __('Today') }}</span>
                <span x-text="c && $tc(':count year', ':count years', c.years)"></span>
            </div>
        </div>
    </figure>
</template>
