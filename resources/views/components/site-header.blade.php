@props(['showSearch' => true, 'alternates' => []])
<header class="border-b border-line bg-paper/90">
    <div class="mx-auto flex h-16 max-w-6xl items-center gap-3 px-4 sm:px-6">
        <a href="{{ lroute('home') }}" class="flex shrink-0 items-center gap-2.5 whitespace-nowrap font-semibold tracking-tight" aria-label="{{ __(':site home', ['site' => config('site.name')]) }}">
            <x-logo-mark />
            <x-wordmark />
        </a>

        <nav class="ml-6 hidden items-center gap-1 text-sm lg:flex" aria-label="{{ __('Primary') }}">
            @foreach (\App\Support\Catalog::categories()->filter(fn ($c) => $c->tools->isNotEmpty())->take(4) as $category)
                <a href="{{ $category->url() }}"
                   @class([
                       'rounded-md px-2.5 py-1.5 transition-colors hover:bg-sunken hover:text-ink',
                       'text-ink' => url()->current() === $category->url(),
                       'text-muted' => url()->current() !== $category->url(),
                   ])>{{ $category->name }}</a>
            @endforeach
            <a href="{{ lroute('home') }}#all-tools" class="rounded-md px-2.5 py-1.5 text-muted transition-colors hover:bg-sunken hover:text-ink">{{ __('All tools') }}</a>
        </nav>

        <div class="ml-auto flex min-w-0 flex-1 items-center justify-end gap-2">
            @if ($showSearch)
                <div class="min-w-0 flex-1 md:max-w-64">
                    <x-search size="compact" />
                </div>
            @endif
            {{-- On phones the language list lives in the menu to leave room for search. --}}
            <x-language-switcher :alternates="$alternates" class="hidden sm:block" />
            <x-mobile-menu :alternates="$alternates" />
        </div>
    </div>
</header>
