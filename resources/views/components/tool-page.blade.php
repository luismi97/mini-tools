{{--
    Common structure for every tool page:
    Breadcrumb → Title → Description → Ad → Tool interface/result → Ad →
    How to use → Content → FAQ → Related tools.

    Props:
      tool, seo, related  — provided by ToolController
      clientSide — true when the tool never sends user data to the server
    Steps, FAQ and long-form content come from the tool record in the current
    locale ($tool->steps, $tool->faq, $tool->content — see HasTranslations).
    Slots:
      default — the tool interface and its result
      script  — the tool's own @vite entry (loaded only on this page)
      about   — optional extra long-form content
--}}
@props(['tool', 'seo', 'related', 'clientSide' => true])
@php
    $steps = $tool->steps ?? [];
    $faq = $tool->faq ?? [];
    if ($faq) {
        $seo->schema([
            '@type' => 'FAQPage',
            'inLanguage' => \App\Support\Locales::get('hreflang'),
            'mainEntity' => collect($faq)->map(fn ($item) => [
                '@type' => 'Question',
                'name' => $item['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => html_entity_decode(strip_tags($item['a']), ENT_QUOTES | ENT_HTML5)],
            ])->all(),
        ]);
    }
    $showAds = $tool->showsAds();
    $linker = new \App\Support\InternalLinker($tool);
@endphp
<x-layouts.app :seo="$seo" :tool="$tool" :ads="$showAds">
    <x-slot:head>{{ $script ?? '' }}</x-slot:head>

    <div class="mx-auto max-w-6xl px-4 pt-6 sm:px-6">
        <x-breadcrumbs :items="$seo->breadcrumbs" />

        <x-tool-header :tool="$tool" class="mt-6" />

        @if ($showAds)
            <x-ads.top class="mt-8" />
        @endif

        <section class="mt-8" aria-label="{{ $tool->name }}">
            {{ $slot }}
        </section>

        @if ($showAds)
            <x-ads.bottom class="mt-10" />
        @endif

        <div class="mt-16 grid gap-12 lg:grid-cols-[minmax(0,1fr)_300px]">
            <div class="space-y-12">
                @if ($steps)
                    <section class="prose-tool">
                        <h2>{{ __('How to use :name', ['name' => $tool->name]) }}</h2>
                        <ol class="mt-4 space-y-3">
                            @foreach ($steps as $step)
                                <li class="flex gap-3">
                                    <span class="grid size-6 shrink-0 place-items-center rounded-full bg-sunken font-mono text-xs text-ink">{{ $loop->iteration }}</span>
                                    <span>{!! $step !!}</span>
                                </li>
                            @endforeach
                        </ol>
                    </section>
                @endif

                @if ($tool->content)
                    <section class="prose-tool">{!! $linker->link($tool->content) !!}</section>
                @endif

                @isset($about)
                    <section class="prose-tool">{{ $about }}</section>
                @endisset

                @if ($faq)
                    <section class="prose-tool">
                        <h2>{{ __('Frequently asked questions') }}</h2>
                        <div class="mt-4 divide-y divide-line border-y border-line">
                            @foreach ($faq as $item)
                                <details class="group py-4" @if ($loop->first) open @endif>
                                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-medium text-ink [&::-webkit-details-marker]:hidden">
                                        <h3 class="text-[15px] font-medium">{{ $item['q'] }}</h3>
                                        <x-icon name="chevron-right" :size="16" class="text-faint transition group-open:rotate-90" />
                                    </summary>
                                    <p class="mt-2">{!! $linker->link($item['a']) !!}</p>
                                </details>
                            @endforeach
                        </div>
                    </section>
                @endif
            </div>

            <aside class="space-y-6">
                @if ($showAds)
                    <x-ads.sidebar class="sticky top-6" />
                @endif
                @if ($clientSide)
                    <div class="panel p-5">
                        <div class="flex items-center gap-2 text-sm font-medium text-ink">
                            <x-icon name="shield" :size="16" class="text-accent" />
                            {{ __('Private by design') }}
                        </div>
                        <p class="mt-2 text-sm leading-6 text-muted">{{ __('This tool runs in your browser. Your data is processed on your device and is never uploaded to our servers.') }}</p>
                    </div>
                @endif
            </aside>
        </div>

        @if ($related->isNotEmpty())
            <section class="mt-16">
                <h2 class="text-xl font-semibold tracking-tight">{{ __('Related tools') }}</h2>
                <div class="mt-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($related as $item)
                        <x-tool-card :tool="$item" />
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</x-layouts.app>
