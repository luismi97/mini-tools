{{--
    Small banner suggesting this page in the visitor's browser language (first visit only,
    never an automatic redirect). Written in the suggested language, not the current one,
    so a Spanish speaker on an English page reads Spanish. Logic: lib/locale-pref.js.
--}}
@use('App\Support\Locales')
@props(['alternates' => []])
@if (count($alternates) > 1)
    @php
        $data = [
            'current' => Locales::current(),
            'alternates' => $alternates,
            'strings' => collect($alternates)->keys()->mapWithKeys(function ($code) {
                $language = Locales::get('native', $code);

                return [$code => [
                    'text' => __('This page is also available in :language.', ['language' => $language], $code),
                    'switch' => __('View in :language', ['language' => $language], $code),
                    'dismiss' => __('Not now', [], $code),
                ]];
            })->all(),
        ];
    @endphp
    <div x-data="localeSuggestion(@js($data))" x-show="target" x-cloak
         x-transition:enter="transition duration-200 ease-out" x-transition:enter-start="translate-y-4 opacity-0"
         x-transition:leave="transition duration-150 ease-in" x-transition:leave-end="translate-y-4 opacity-0"
         class="fixed inset-x-3 bottom-3 z-40 sm:inset-x-auto sm:bottom-5 sm:right-5 sm:w-96"
         role="region" :aria-label="text('text')" :lang="target">
        <div class="panel flex items-start gap-3 p-4 shadow-lg">
            <span class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-accent-soft text-accent">
                <x-icon name="globe" :size="18" />
            </span>
            <div class="min-w-0 flex-1">
                <p class="text-sm text-ink" x-text="text('text')"></p>
                <div class="mt-3 flex flex-wrap gap-2">
                    <a :href="href()" :hreflang="target" @click="choose()" class="btn btn-primary" x-text="text('switch')"></a>
                    <button type="button" @click="dismiss()" class="btn btn-ghost" x-text="text('dismiss')"></button>
                </div>
            </div>
        </div>
    </div>
@endif
