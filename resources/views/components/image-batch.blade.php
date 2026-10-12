{{--
    Shared UI for batch image tools. Must be used inside an x-data built
    with imageBatch() from resources/js/lib/image-batch.js.

    Props: accept (input accept attr), formats (translated label, e.g. __('JPG, PNG or WebP')),
           resultLabel (translated download button label)
    Slot:  settings — tool-specific controls bound to `settings.*`
--}}
@props(['accept', 'formats', 'resultLabel' => null])
@php $resultLabel ??= __('Download'); @endphp
<div class="space-y-4">
    <x-dropzone :accept="$accept" :label="__('Drop images here or')"
        :hint="__(':formats · up to 25 MB each · up to 30 files · you can also paste (Ctrl + V)', ['formats' => $formats])" />

    {{-- Settings --}}
    <div class="panel flex flex-wrap items-end gap-x-8 gap-y-4 p-4">
        {{ $settings }}
    </div>

    <p x-show="notice" x-cloak x-text="notice" class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" role="alert"></p>

    {{-- Results --}}
    <div x-show="items.length" x-cloak class="panel overflow-hidden">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-line bg-paper/60 px-4 py-3">
            <p class="text-sm text-muted" aria-live="polite">
                <template x-if="doneItems.length">
                    <span>
                        <span x-text="$t(':count done', { count: doneItems.length })"></span> &middot;
                        <span x-text="totals.original"></span> &rarr; <span class="font-medium text-ink" x-text="totals.result"></span>
                        <span class="ml-1 rounded-full px-2 py-0.5 font-mono text-xs"
                              :class="totals.saved > 0 ? 'bg-success-soft text-success' : 'bg-sunken text-muted'"
                              x-text="(totals.saved > 0 ? '−' : '') + Math.abs(totals.saved) + '%'"></span>
                    </span>
                </template>
                <span x-show="busy" class="ml-2">{{ __('Processing…') }}</span>
            </p>
            <div class="flex items-center gap-2">
                <button type="button" class="btn btn-ghost" @click="clear()">
                    <x-icon name="trash" :size="16" /> {{ __('Clear') }}
                </button>
                <button type="button" class="btn btn-primary" @click="downloadAll()" :disabled="busy || !doneItems.length">
                    <x-icon name="download" :size="16" />
                    <span x-text="doneItems.length > 1 ? $t('Download All (.zip)') : $t('Download')">{{ __('Download') }}</span>
                </button>
            </div>
        </div>

        <ul class="divide-y divide-line">
            <template x-for="item in items" :key="item.id">
                <li class="flex items-center gap-4 px-4 py-3">
                    <div class="size-14 shrink-0 overflow-hidden rounded-lg border border-line bg-sunken">
                        <img x-show="item.resultUrl || item.previewUrl" :src="item.resultUrl || item.previewUrl" alt="" class="size-full object-cover" loading="lazy" decoding="async">
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-medium text-ink" x-text="item.status === 'done' ? item.resultName : item.name"></p>
                        <p class="mt-0.5 text-xs text-muted">
                            <template x-if="item.status === 'done'">
                                <span>
                                    <span x-text="formatBytes(item.originalSize)"></span> &rarr;
                                    <span class="font-medium text-ink" x-text="formatBytes(item.resultSize)"></span>
                                    <span class="text-faint" x-text="` · ${item.width}×${item.height}`"></span>
                                    <span x-show="item.keptOriginal" class="text-faint"> · {{ __('already optimized') }}</span>
                                </span>
                            </template>
                            <span x-show="item.status === 'pending' || item.status === 'processing'" class="text-faint">{{ __('Processing…') }}</span>
                            <span x-show="item.status === 'error'" class="text-danger" x-text="item.error"></span>
                        </p>
                    </div>
                    <span x-show="item.status === 'done'"
                          class="hidden shrink-0 rounded-full px-2 py-0.5 font-mono text-xs sm:inline"
                          :class="savedPercent(item) > 0 ? 'bg-success-soft text-success' : 'bg-sunken text-muted'"
                          x-text="(savedPercent(item) > 0 ? '−' : '+') + Math.abs(savedPercent(item)) + '%'"></span>
                    <div class="flex shrink-0 items-center gap-1">
                        <button type="button" class="btn btn-secondary px-2.5 py-1.5" @click="download(item)" x-show="item.status !== 'error'" :disabled="item.status !== 'done'" :aria-label="$t('Download :name', { name: item.name })">
                            <x-icon name="download" :size="16" /><span class="hidden sm:inline">{{ $resultLabel }}</span>
                        </button>
                        <button type="button" class="btn btn-ghost px-2 py-1.5" @click="remove(item)" :aria-label="$t('Remove :name', { name: item.name })">
                            <x-icon name="x" :size="16" />
                        </button>
                    </div>
                </li>
            </template>
        </ul>
    </div>
</div>
