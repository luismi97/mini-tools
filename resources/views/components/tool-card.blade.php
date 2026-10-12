@props(['tool'])
<a href="{{ $tool->url() }}" {{ $attributes->merge(['class' => 'group panel flex h-full flex-col p-5 transition hover:border-line-strong hover:shadow-sm']) }}>
    <div class="flex items-start justify-between gap-3">
        <span class="grid size-10 place-items-center rounded-lg bg-accent-soft text-accent">
            <x-icon :name="$tool->icon" />
        </span>
        <x-icon name="arrow-right" :size="16" class="mt-1 -translate-x-1 text-faint opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100" />
    </div>
    <h3 class="mt-4 font-semibold tracking-tight text-ink">{{ $tool->name }}</h3>
    <p class="mt-1 text-sm leading-6 text-muted">{{ $tool->short_description }}</p>
    @if ($tool->is_premium)
        <span class="mt-3 self-start rounded-full bg-sunken px-2 py-0.5 font-mono text-[11px] uppercase tracking-wider text-muted">{{ __('Pro') }}</span>
    @endif
</a>
