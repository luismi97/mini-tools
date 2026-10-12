{{--
    Navigation menu for phones and tablets (hidden from lg, where the header shows the
    category links). A native modal <dialog> gives focus trapping, Escape to close,
    an inert page behind and focus returning to the button for free. The page does
    not scroll while it is open; tapping the backdrop closes it.
--}}
@props(['alternates' => []])
@php
    $categories = \App\Support\Catalog::categories()->filter(fn ($c) => $c->tools->isNotEmpty());
    $current = url()->current();
@endphp
<div class="lg:hidden" x-data="{
        open() { $refs.menu.showModal(); document.documentElement.classList.add('overflow-hidden'); },
        close() { $refs.menu.close(); },
    }">
    <button type="button" @click="open()"
            class="flex size-9 items-center justify-center rounded-lg border border-line-strong bg-surface text-muted transition-colors hover:text-ink"
            aria-haspopup="dialog" aria-controls="mobile-menu" aria-label="{{ __('Menu') }}">
        <x-icon name="menu" :size="18" />
    </button>

    <dialog id="mobile-menu" x-ref="menu" class="menu-sheet" aria-label="{{ __('Menu') }}"
            @close="document.documentElement.classList.remove('overflow-hidden')"
            @click.self="close()">
        <div class="flex h-full flex-col">
            <div class="flex h-16 shrink-0 items-center justify-between border-b border-line pl-4 pr-3">
                <a href="{{ lroute('home') }}" class="flex items-center gap-2.5 font-semibold tracking-tight" aria-label="{{ __(':site home', ['site' => config('site.name')]) }}">
                    <x-logo-mark />
                    <x-wordmark />
                </a>
                <button type="button" @click="close()" autofocus
                        class="flex size-10 items-center justify-center rounded-lg text-muted transition-colors hover:bg-sunken hover:text-ink"
                        aria-label="{{ __('Close menu') }}">
                    <x-icon name="x" :size="20" />
                </button>
            </div>

            <nav class="flex-1 overflow-y-auto overscroll-contain px-3 pb-[max(1.5rem,env(safe-area-inset-bottom))] pt-3" aria-label="{{ __('Primary') }}">
                <a href="{{ lroute('home') }}#all-tools" @click="close()" class="flex min-h-12 items-center gap-3 rounded-xl px-2 text-[15px] font-semibold text-ink transition-colors hover:bg-sunken">
                    <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-accent text-on-accent"><x-icon name="layers" :size="18" /></span>
                    <span class="flex-1">{{ __('All tools') }}</span>
                    <x-icon name="chevron-right" :size="16" class="text-faint" />
                </a>

                <p class="kicker mt-5 px-2">{{ __('Categories') }}</p>
                <ul class="mt-2 space-y-0.5">
                    @foreach ($categories as $category)
                        @php $active = $current === $category->url(); @endphp
                        <li>
                            <a href="{{ $category->url() }}" @click="close()"
                               @class(['flex min-h-12 items-center gap-3 rounded-xl px-2 transition-colors', 'bg-sunken text-ink' => $active, 'text-ink hover:bg-sunken' => ! $active])
                               @if ($active) aria-current="page" @endif>
                                <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-accent-soft text-accent">
                                    <x-icon :name="$category->icon" :size="18" />
                                </span>
                                <span class="min-w-0 flex-1 text-[15px] font-medium">{{ $category->name }}</span>
                                <span class="shrink-0 font-mono text-xs text-faint">{{ $category->tools->count() }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}" @click="close()" class="mt-4 flex min-h-12 items-center gap-3 rounded-xl border border-dashed border-line-strong px-2 text-[15px] font-medium text-ink transition-colors hover:bg-sunken">
                    <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-sunken text-muted"><x-icon name="lightbulb" :size="18" /></span>
                    <span class="flex-1">{{ __('Suggest a tool') }}</span>
                    <x-icon name="chevron-right" :size="16" class="text-faint" />
                </a>

                <div class="mt-6 border-t border-line px-1 pt-5">
                    <p class="kicker">{{ __('Language') }}</p>
                    <x-language-switcher variant="list" :alternates="$alternates" class="mt-2" />
                </div>
            </nav>
        </div>
    </dialog>
</div>
