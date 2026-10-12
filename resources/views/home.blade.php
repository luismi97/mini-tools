<x-layouts.app :seo="$seo" :show-header-search="false">
    <section class="border-b border-line">
        <div class="mx-auto max-w-3xl px-4 pb-16 pt-16 text-center sm:px-6 sm:pt-24">
            <p class="kicker">{{ __(':count free tools · no sign-up', ['count' => $categories->sum(fn ($c) => $c->tools->count())]) }}</p>
            <h1 class="mt-4 text-4xl font-semibold tracking-tight text-ink sm:text-5xl">{{ __('Free Online Tools') }}</h1>
            <p class="mx-auto mt-4 max-w-xl text-lg leading-8 text-muted">{{ __(config('site.tagline')) }}</p>
            <div class="mx-auto mt-8 max-w-xl text-left">
                <x-search size="hero" />
            </div>
            <ul class="mt-8 flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-sm text-muted">
                <li class="flex items-center gap-1.5"><x-icon name="shield" :size="16" class="text-accent" /> {{ __('Files stay on your device') }}</li>
                <li class="flex items-center gap-1.5"><x-icon name="zap" :size="16" class="text-accent" /> {{ __('Instant results') }}</li>
                <li class="flex items-center gap-1.5"><x-icon name="check-circle" :size="16" class="text-accent" /> {{ __('100% free') }}</li>
            </ul>
        </div>
    </section>

    <div class="mx-auto max-w-6xl px-4 sm:px-6">
        <section class="mt-14" aria-labelledby="popular-heading">
            <div class="flex items-end justify-between gap-4">
                <h2 id="popular-heading" class="text-xl font-semibold tracking-tight">{{ __('Popular tools') }}</h2>
            </div>
            <div class="mt-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($popular as $tool)
                    <x-tool-card :tool="$tool" />
                @endforeach
            </div>
        </section>

        <section id="categories" class="mt-16" aria-labelledby="categories-heading">
            <h2 id="categories-heading" class="text-xl font-semibold tracking-tight">{{ __('Categories') }}</h2>
            <div class="mt-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($categories as $category)
                    @php $count = $category->tools->count(); @endphp
                    @if ($count)
                        <a href="{{ $category->url() }}" class="panel group flex gap-4 p-5 transition hover:border-line-strong hover:shadow-sm">
                    @else
                        <div class="flex gap-4 rounded-xl border border-dashed border-line p-5">
                    @endif
                        <span @class(['grid size-10 shrink-0 place-items-center rounded-lg', 'bg-accent-soft text-accent' => $count, 'bg-sunken text-faint' => ! $count])>
                            <x-icon :name="$category->icon" />
                        </span>
                        <span class="min-w-0">
                            <span class="flex items-center gap-2">
                                <span @class(['font-semibold tracking-tight', 'text-ink' => $count, 'text-muted' => ! $count])>{{ $category->name }}</span>
                                <span class="font-mono text-xs text-faint">{{ $count ? trans_choice(':count tool|:count tools', $count) : __('Coming soon') }}</span>
                            </span>
                            <span class="mt-1 block text-sm leading-6 text-muted">{{ $category->description }}</span>
                        </span>
                    @if ($count)
                        </a>
                    @else
                        </div>
                    @endif
                @endforeach
            </div>
        </section>

        @if ($recent->isNotEmpty())
            <section class="mt-16" aria-labelledby="recent-heading">
                <h2 id="recent-heading" class="text-xl font-semibold tracking-tight">{{ __('Recently added') }}</h2>
                <ul class="mt-5 divide-y divide-line rounded-xl border border-line bg-surface">
                    @foreach ($recent as $tool)
                        <li>
                            <a href="{{ $tool->url() }}" class="group flex items-center gap-4 px-5 py-4 transition hover:bg-sunken">
                                <x-icon :name="$tool->icon" class="text-accent" />
                                <span class="min-w-0 flex-1">
                                    <span class="font-medium text-ink">{{ $tool->name }}</span>
                                    <span class="hidden text-sm text-muted sm:inline"> &mdash; {{ $tool->short_description }}</span>
                                </span>
                                <span class="hidden font-mono text-xs text-faint sm:inline">{{ $tool->category->name }}</span>
                                <x-icon name="arrow-right" :size="16" class="text-faint transition group-hover:translate-x-0.5 group-hover:text-ink" />
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
        @endif

        <section id="all-tools" class="mt-16" aria-labelledby="all-tools-heading">
            <h2 id="all-tools-heading" class="text-xl font-semibold tracking-tight">{{ __('All tools') }}</h2>
            <div class="mt-5 grid gap-x-8 gap-y-8 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($categories->filter(fn ($c) => $c->tools->isNotEmpty()) as $category)
                    <div>
                        <h3 class="kicker"><a href="{{ $category->url() }}" class="hover:text-ink">{{ $category->name }}</a></h3>
                        <ul class="mt-3 space-y-2 text-sm">
                            @foreach ($category->tools as $tool)
                                <li><a href="{{ $tool->url() }}" class="text-ink hover:text-accent">{{ $tool->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
            <p class="mt-10 flex flex-wrap items-center gap-x-2 gap-y-1 text-sm text-muted">
                <x-icon name="lightbulb" :size="16" class="text-accent" />
                {{ __('Missing a tool?') }}
                <a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}" class="font-medium text-accent hover:underline">{{ __('Suggest a tool') }}</a>
            </p>
        </section>

        <section class="prose-tool mt-16 grid gap-10 border-t border-line pt-12 md:grid-cols-3">
            <div>
                <h2 class="text-lg">{{ __('Private by design') }}</h2>
                <p>{{ __('Almost every tool runs entirely in your browser. Your images, PDFs and text are processed on your own device and are never uploaded to our servers — safe for contracts, invoices and personal photos.') }}</p>
            </div>
            <div>
                <h2 class="text-lg">{{ __('Fast and free') }}</h2>
                <p>{{ __('No sign-up, no watermarks and no waiting in upload queues. Pages load only the code each tool needs, so results appear instantly, even on a phone.') }}</p>
            </div>
            <div>
                <h2 class="text-lg">{{ __('Built for everyday tasks') }}</h2>
                <p>{{ __('From compressing images and merging PDFs to counting words, generating passwords and calculating loans — :count focused tools in one place, with new ones added regularly.', ['count' => $categories->sum(fn ($c) => $c->tools->count())]) }}</p>
            </div>
        </section>
    </div>
</x-layouts.app>
