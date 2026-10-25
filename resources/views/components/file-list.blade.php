{{--
    Ordered file list with drag & drop reordering. Use inside an x-data built
    with fileList() from resources/js/lib/file-list.js.

    Props: accept, hint, label (translated), icon (fallback icon when there is no thumbnail)
    Slots: settings (optional), actions (primary button area)
--}}
@props(['accept', 'hint', 'label' => null, 'icon' => 'file-text'])
<div class="space-y-4">
    <x-dropzone :accept="$accept" :hint="$hint" :label="$label ?? __('Drop files here or')" />

    <p x-show="notice" x-cloak x-text="notice" class="rounded-lg bg-danger-soft px-4 py-2.5 text-sm text-danger" role="alert"></p>

    <div x-show="files.length" x-cloak class="panel overflow-hidden">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-line bg-paper/60 px-4 py-3">
            <p class="text-sm text-muted" x-text="$t(':count file(s) · drag to reorder', { count: files.length })"></p>
            <span class="flex flex-wrap gap-1">
                <button type="button" class="btn btn-ghost" @click="sortByName()" x-show="files.length > 1"><x-icon name="sort" :size="16" /> {{ __('Sort A–Z') }}</button>
                <button type="button" class="btn btn-ghost" @click="clear()"><x-icon name="trash" :size="16" /> {{ __('Clear') }}</button>
            </span>
        </div>
        <ul class="divide-y divide-line">
            <template x-for="(item, index) in files" :key="item.id">
                <li class="flex items-center gap-3 px-4 py-3 transition"
                    :class="dragIndex === index ? 'bg-accent-soft' : ''"
                    draggable="true"
                    @dragstart="dragStart(index)" @dragover.prevent="dragOver(index)" @dragend="dragEnd()" @drop.prevent>
                    <span class="w-6 shrink-0 text-center font-mono text-xs text-faint" x-text="index + 1"></span>
                    <div class="grid size-12 shrink-0 place-items-center overflow-hidden rounded-lg border border-line bg-sunken text-faint">
                        <img x-show="item.thumb" :src="item.thumb" alt="" class="size-full object-cover" loading="lazy">
                        <x-icon name="{{ $icon }}" x-show="!item.thumb" />
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-medium text-ink" x-text="item.name"></p>
                        <p class="text-xs" :class="item.error ? 'text-danger' : 'text-muted'"
                           x-text="item.error || [item.size, item.meta].filter(Boolean).join(' · ')"></p>
                    </div>
                    <div class="flex shrink-0 items-center">
                        <button type="button" class="btn btn-ghost px-2 py-1.5" @click="move(index, -1)" :disabled="index === 0" aria-label="{{ __('Move up') }}"><x-icon name="arrow-up" :size="16" /></button>
                        <button type="button" class="btn btn-ghost px-2 py-1.5" @click="move(index, 1)" :disabled="index === files.length - 1" aria-label="{{ __('Move down') }}"><x-icon name="arrow-down" :size="16" /></button>
                        <button type="button" class="btn btn-ghost px-2 py-1.5" @click="remove(item)" :aria-label="$t('Remove :name', { name: item.name })"><x-icon name="x" :size="16" /></button>
                    </div>
                </li>
            </template>
        </ul>
    </div>

    <div x-show="files.length" x-cloak class="panel flex flex-wrap items-end gap-x-6 gap-y-4 p-4">
        {{ $settings ?? '' }}
        <div class="ml-auto flex items-center gap-3">
            {{ $actions }}
        </div>
    </div>
</div>
