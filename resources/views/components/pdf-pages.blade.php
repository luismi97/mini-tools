{{--
    Page grid for PDF page edits. Use inside an x-data built with pdfPagesTool().
    Props: mode ("rotate" | "delete" | "organize"), action (translated primary button label)
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
                    @if ($mode !== 'rotate')
                        <span x-show="pages.length - keptCount() > 0" x-text="' · ' + $t(':count selected for removal', { count: pages.length - keptCount() })"></span>
                    @endif
                    <span x-show="loadingThumbs"> · {{ __('loading previews…') }}</span>
                </p>
            </div>
            @if ($mode === 'rotate')
                <button type="button" class="btn btn-secondary" @click="rotateAll(-90)"><x-icon name="rotate-ccw" :size="16" /> {{ __('Rotate all left') }}</button>
                <button type="button" class="btn btn-secondary" @click="rotateAll(90)"><x-icon name="rotate-cw" :size="16" /> {{ __('Rotate all right') }}</button>
            @elseif ($mode === 'organize')
                <button type="button" class="btn btn-secondary" @click="reverse()"><x-icon name="sort" :size="16" /> {{ __('Reverse order') }}</button>
                <button type="button" class="btn btn-ghost" @click="restoreOrder()" :disabled="!reordered()">{{ __('Original order') }}</button>
            @else
                <button type="button" class="btn btn-ghost" @click="keepAll(true)">{{ __('Keep all') }}</button>
            @endif
            <button type="button" class="btn btn-ghost" @click="reset()" :disabled="busy"><x-icon name="refresh" :size="16" /> {{ __('New PDF') }}</button>
        </div>

        @if ($mode === 'organize')
            <p class="border-b border-line px-4 py-2 text-xs text-muted">{{ __('Drag pages to reorder them, or use the arrows. The number under each page is its original position.') }}</p>
        @endif

        <ul class="grid grid-cols-2 gap-4 p-4 sm:grid-cols-4 lg:grid-cols-6">
            <template x-for="(page, position) in pages" :key="page.index">
                <li class="flex flex-col items-center gap-2 rounded-lg transition"
                    @if ($mode === 'organize')
                        draggable="true" @dragstart="dragStart(position)" @dragover.prevent="dragOver(position)" @dragend="dragEnd()" @drop.prevent
                        :class="dragIndex === position ? 'opacity-60 ring-2 ring-accent' : ''"
                    @endif
                >
                    <button type="button"
                        class="relative grid aspect-[3/4] w-full place-items-center overflow-hidden rounded-lg border-2 bg-white transition"
                        :class="page.keep ? 'border-line hover:border-accent' : 'border-danger opacity-50'"
                        @if ($mode === 'organize') style="cursor: grab" @endif
                        @click="{{ ['rotate' => 'rotate(page, 90)', 'delete' => 'toggle(page)', 'organize' => 'rotate(page, 90)'][$mode] }}"
                        :aria-label="$t(@js($mode === 'delete' ? 'Remove or keep page :number' : 'Rotate page :number'), { number: page.number })">
                        <img x-show="page.thumb" :src="page.thumb" alt="" draggable="false" class="max-h-full max-w-full transition-transform duration-200"
                             :style="`transform: rotate(${page.rotation}deg) scale(${page.rotation % 180 ? 0.75 : 1})`">
                        <span x-show="!page.thumb" class="font-mono text-sm text-faint" x-text="page.number"></span>
                        @if ($mode === 'organize')
                            <span class="absolute left-1.5 top-1.5 grid min-w-6 place-items-center rounded-full bg-ink/80 px-1.5 font-mono text-xs text-paper" x-text="position + 1"></span>
                        @endif
                        @if ($mode !== 'rotate')
                            <span x-show="!page.keep" class="absolute inset-0 grid place-items-center bg-danger/10">
                                <span class="grid size-9 place-items-center rounded-full bg-danger text-white"><x-icon name="trash" :size="18" /></span>
                            </span>
                        @endif
                    </button>
                    <div class="flex w-full items-center justify-between">
                        @if ($mode === 'organize')
                            <span class="font-mono text-xs text-muted" x-text="$t('p. :number', { number: page.number })"></span>
                        @else
                            <span class="font-mono text-xs text-muted" x-text="page.number"></span>
                        @endif
                        @if ($mode === 'rotate')
                            <span class="flex">
                                <button type="button" class="btn btn-ghost px-1.5 py-1" @click="rotate(page, -90)" :aria-label="$t('Rotate page :number left', { number: page.number })"><x-icon name="rotate-ccw" :size="15" /></button>
                                <button type="button" class="btn btn-ghost px-1.5 py-1" @click="rotate(page, 90)" :aria-label="$t('Rotate page :number right', { number: page.number })"><x-icon name="rotate-cw" :size="15" /></button>
                            </span>
                        @elseif ($mode === 'organize')
                            <span class="flex">
                                <button type="button" class="btn btn-ghost px-1 py-1" @click="move(position, -1)" :disabled="position === 0" :aria-label="$t('Move page :number earlier', { number: page.number })"><x-icon name="arrow-up" :size="15" class="-rotate-90" /></button>
                                <button type="button" class="btn btn-ghost px-1 py-1" @click="move(position, 1)" :disabled="position === pages.length - 1" :aria-label="$t('Move page :number later', { number: page.number })"><x-icon name="arrow-up" :size="15" class="rotate-90" /></button>
                                <button type="button" class="btn btn-ghost px-1 py-1" @click="toggle(page)" :aria-label="$t('Remove or keep page :number', { number: page.number })" :class="page.keep ? '' : 'text-danger'"><x-icon name="trash" :size="15" /></button>
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
            <p x-show="!changed() && !done" class="text-sm text-muted">{{ ['rotate' => __('Click a page to rotate it.'), 'delete' => __('Click the pages you want to remove.'), 'organize' => __('Reorder, rotate or remove pages, then download.')][$mode] }}</p>
            <button type="button" class="btn btn-primary" @click="save()" :disabled="busy || !changed()">
                <x-icon name="download" :size="16" /> <span x-text="busy ? $t('Saving…') : @js($action)">{{ $action }}</span>
            </button>
        </div>
    </div>
</div>
