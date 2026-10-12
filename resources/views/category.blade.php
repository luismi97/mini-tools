<x-layouts.app :seo="$seo">
    <div class="mx-auto max-w-6xl px-4 pt-6 sm:px-6">
        <x-breadcrumbs :items="$seo->breadcrumbs" />

        <header class="mt-6 flex items-start gap-4">
            <span class="hidden size-12 shrink-0 place-items-center rounded-xl bg-accent-soft text-accent sm:grid">
                <x-icon :name="$category->icon" :size="24" />
            </span>
            <div>
                <h1 class="text-2xl font-semibold tracking-tight sm:text-3xl">{{ $category->seoTitle() }}</h1>
                <p class="mt-2 max-w-2xl text-[15px] leading-7 text-muted">{{ $category->description }}</p>
            </div>
        </header>

        <x-ads.top class="mt-8" />

        @if ($category->tools->isEmpty())
            <div class="panel mt-8 px-6 py-12 text-center">
                <p class="font-medium text-ink">{{ __(':name are coming soon.', ['name' => $category->name]) }}</p>
                <p class="mt-1 text-sm text-muted">{{ __('In the meantime, explore the tools below.') }}</p>
            </div>
        @else
            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($category->tools as $tool)
                    <x-tool-card :tool="$tool" />
                @endforeach
            </div>
        @endif

        @if ($category->intro)
            <section class="prose-tool mt-14 max-w-3xl">
                {{-- :name is lowercased for English prose; :title keeps the original (gendered languages use it). --}}
                <h2>{{ __('About our :name', ['name' => mb_strtolower($category->name), 'title' => $category->name]) }}</h2>
                {!! (new \App\Support\InternalLinker)->link($category->intro) !!}
            </section>
        @endif

        @php $others = $otherCategories->filter(fn ($c) => $c->tools->isNotEmpty()); @endphp
        @if ($others->isNotEmpty())
            <section class="mt-16">
                <h2 class="text-xl font-semibold tracking-tight">{{ __('More categories') }}</h2>
                <div class="mt-5 flex flex-wrap gap-2">
                    @foreach ($others as $other)
                        <a href="{{ $other->url() }}" class="btn btn-secondary">
                            <x-icon :name="$other->icon" :size="16" class="text-accent" />
                            {{ $other->name }}
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</x-layouts.app>
