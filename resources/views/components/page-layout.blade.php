{{-- Simple long-form page (About, Privacy, Terms, Contact). --}}
@props(['seo', 'title', 'updated' => null])
<x-layouts.app :seo="$seo">
    <div class="mx-auto max-w-3xl px-4 pt-6 sm:px-6">
        <x-breadcrumbs :items="$seo->breadcrumbs" />
        <h1 class="mt-6 text-3xl font-semibold tracking-tight text-ink">{{ $title }}</h1>
        @if ($updated)
            <p class="mt-2 text-sm text-faint">{{ __('Last updated: :date', ['date' => $updated]) }}</p>
        @endif
        <div class="prose-page mt-8">
            {{ $slot }}
        </div>
    </div>
</x-layouts.app>
