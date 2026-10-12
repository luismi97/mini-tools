@props(['alternates' => []])
@php $categories = \App\Support\Catalog::categories()->filter(fn ($c) => $c->tools->isNotEmpty()); @endphp
<footer class="mt-20 border-t border-line">
    <div class="mx-auto grid max-w-6xl gap-10 px-4 py-12 sm:px-6 md:grid-cols-[1.2fr_2fr]">
        <div>
            <a href="{{ lroute('home') }}" class="flex items-center gap-2.5 font-semibold tracking-tight">
                <x-logo-mark />
                <x-wordmark />
            </a>
            <p class="mt-3 max-w-xs text-sm leading-6 text-muted">{{ __(config('site.tagline')) }} {{ __('Most tools run entirely in your browser — your files and data stay on your device.') }}</p>
            <x-language-switcher variant="inline" :alternates="$alternates" class="mt-5 text-sm text-muted" />
        </div>

        <div class="grid grid-cols-2 gap-8 sm:grid-cols-3">
            @foreach ($categories as $category)
                <div>
                    <h2 class="kicker"><a href="{{ $category->url() }}" class="hover:text-ink">{{ $category->name }}</a></h2>
                    <ul class="mt-3 space-y-2 text-sm">
                        @foreach ($category->tools->take(6) as $tool)
                            <li><a href="{{ $tool->url() }}" class="text-muted hover:text-ink">{{ $tool->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
    <div class="border-t border-line">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-x-6 gap-y-2 px-4 py-5 text-xs text-faint sm:px-6">
            <p>&copy; {{ date('Y') }} {{ config('site.name') }}. {{ __('Free online tools.') }}</p>
            <nav aria-label="{{ __('Legal') }}" class="flex flex-wrap gap-x-5 gap-y-2">
                @foreach (\App\Http\Controllers\PageController::PAGES as $key => $page)
                    <a href="{{ \App\Http\Controllers\PageController::url($key) }}" class="hover:text-ink">{{ __($page['title']) }}</a>
                @endforeach
            </nav>
        </div>
    </div>
</footer>
