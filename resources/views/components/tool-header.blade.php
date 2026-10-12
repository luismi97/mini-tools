@props(['tool'])
<header {{ $attributes->merge(['class' => 'flex items-start gap-4']) }}>
    <span class="hidden size-12 shrink-0 place-items-center rounded-xl bg-accent-soft text-accent sm:grid">
        <x-icon :name="$tool->icon" :size="24" />
    </span>
    <div>
        <h1 class="text-2xl font-semibold tracking-tight text-ink sm:text-3xl">{{ $tool->name }}</h1>
        <p class="mt-2 max-w-2xl text-[15px] leading-7 text-muted">{{ $tool->description ?: $tool->short_description }}</p>
        <p class="mt-3 flex flex-wrap items-center gap-x-3 gap-y-1 text-xs text-faint">
            <span>{{ $tool->is_premium ? __('Pro tool') : __('Free') }}</span>
            <span aria-hidden="true">&middot;</span>
            <span>{{ __('No sign-up') }}</span>
            @if ($tool->updated_at)
                <span aria-hidden="true">&middot;</span>
                <span>{{ __('Updated') }} <time datetime="{{ $tool->updated_at->toDateString() }}">{{ $tool->updated_at->locale(app()->getLocale())->translatedFormat(__('F Y')) }}</time></span>
            @endif
        </p>
    </div>
</header>
