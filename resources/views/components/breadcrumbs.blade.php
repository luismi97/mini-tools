@props(['items' => []])
@if (count($items) > 1)
    <nav aria-label="{{ __('Breadcrumb') }}" {{ $attributes->merge(['class' => 'text-sm']) }}>
        <ol class="flex flex-wrap items-center gap-1 text-muted">
            @foreach ($items as $item)
                <li class="flex items-center gap-1">
                    @if ($loop->last)
                        <span aria-current="page" class="text-ink">{{ $item['label'] }}</span>
                    @else
                        <a href="{{ $item['url'] }}" class="hover:text-ink">{{ $item['label'] }}</a>
                        <x-icon name="chevron-right" :size="14" class="text-faint" />
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif
