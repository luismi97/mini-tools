{{--
    Page grid for PDF page edits. Use inside an x-data built with pdfPagesTool().
    Props: mode ("rotate" | "delete"), action (translated primary button label)
--}}
@props(['mode', 'action'])
<div class="space-y-4">
    <template x-if="!file">
        <x-dropzone accept="application/pdf,.pdf" :multiple="false" :label="__('Drop a PDF here or')" :hint="__('PDF · up to 100 MB')" />
    </template>
    <p x-show="busy && !file" x-cloak class="text-sm text-muted">{{ __('Reading PDF…') }}</p>
    <p x-show="error" x-cloak x-text="error" class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" role="alert"></p>

    <div x-show="file" x-cloak class="panel overflow-hidden">
        <div class="flex flex-wrap items-center gap-3 border-b border-line bg-paper/60 px-4 py-3">
            <div class="min-w-0 flex-1">
                <p class="truncate font-medium text-ink" x-text="name"></p>
                <p class="text-xs text-muted">
                    <span x-text="`${size} · ` + $tc(':count page', ':count pages', pages.length)"></span>
                    @if ($mode === 'delete')
                        <span x-text="' · ' + $t(':count selected for removal', { count: pages.length - keptCount() })"></span>
                    @endif
                    <span x-show="loadingThumbs"> · {{ __('loading previews…') }}</span>
                </p>
            </div>
            @if ($mode === 'rotate')
                <button type="button" class="btn btn-secondary" @click="rotateAll(-90)"><x-icon name="rotate-ccw" :size="16" /> {{ __('Rotate all left') }}</button>
                <button type="button" class="btn btn-secondary" @click="rotateAll(90)"><x-icon name="rotate-cw" :size="16" /> {{ __('Rotate all right') }}</button>
            @else
                <button type="button" class="btn btn-ghost" @click="keepAll(true)">{{ __('Keep all') }}</button>
            @endif
            <button type="button" class="btn btn-ghost" @click="reset()" :disabled="busy"><x-icon name="refresh" :size="16" /> {{ __('New PDF') }}</button>
        </div>

        <ul class="grid grid-cols-2 gap-4 p-4 sm:grid-cols-4 lg:grid-cols-6">
            <template x-for="page in pages" :key="page.index">
                <li class="flex flex-col items-center gap-2">
                    <button type="button"
                        class="relative grid aspect-[3/4] w-full place-items-center overflow-hidden rounded-lg border-2 bg-white transition"
                        :class="page.keep ? 'border-line hover:border-accent' : 'border-danger opacity-50'"
                        @click="{{ $mode === 'rotate' ? 'rotate(page, 90)' : 'toggle(page)' }}"
                        :aria-label="$t(@js($mode === 'rotate' ? 'Rotate page :number' : 'Remove or keep page :number'), { number: page.number })">
                        <img x-show="page.thumb" :src="page.thumb" alt="" class="max-h-full max-w-full transition-transform duration-200"
                             :style="`transform: rotate(${page.rotation}deg) scale(${page.rotation % 180 ? 0.75 : 1})`">
                        <span x-show="!page.thumb" class="font-mono text-sm text-faint" x-text="page.number"></span>
                        @if ($mode === 'delete')
                            <span x-show="!page.keep" class="absolute inset-0 grid place-items-center bg-danger/10">
                                <span class="grid size-9 place-items-center rounded-full bg-danger text-white"><x-icon name="trash" :size="18" /></span>
                            </span>
                        @endif
                    </button>
                    <div class="flex w-full items-center justify-between">
                        <span class="font-mono text-xs text-muted" x-text="page.number"></span>
                        @if ($mode === 'rotate')
                            <span class="flex">
                                <button type="button" class="btn btn-ghost px-1.5 py-1" @click="rotate(page, -90)" :aria-label="$t('Rotate page :number left', { number: page.number })"><x-icon name="rotate-ccw" :size="15" /></button>
                                <button type="button" class="btn btn-ghost px-1.5 py-1" @click="rotate(page, 90)" :aria-label="$t('Rotate page :number right', { number: page.number })"><x-icon name="rotate-cw" :size="15" /></button>
                            </span>
                        @else
                            <button type="button" class="btn btn-ghost px-1.5 py-1 text-xs" @click="toggle(page)" x-text="page.keep ? $t('Remove') : $t('Keep')"></button>
                        @endif
                    </div>
                </li>
            </template>
        </ul>

        <div class="flex flex-wrap items-center justify-end gap-3 border-t border-line p-4">
            <p x-show="done" x-text="done" class="text-sm text-success" x-cloak></p>
            <p x-show="!changed() && !done" class="text-sm text-muted">{{ $mode === 'rotate' ? __('Click a page to rotate it.') : __('Click the pages you want to remove.') }}</p>
            <button type="button" class="btn btn-primary" @click="save()" :disabled="busy || !changed()">
                <x-icon name="download" :size="16" /> <span x-text="busy ? $t('Saving…') : @js($action)">{{ $action }}</span>
            </button>
        </div>
    </div>
</div>
