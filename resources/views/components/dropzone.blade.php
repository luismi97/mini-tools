{{--
    File drop area. The surrounding Alpine component must provide:
    `dragging` (bool), `onDrop(event)` and `onPick(event)`.

    Props: accept (input accept attr), hint (formats/limits line), multiple, label
--}}
@props(['accept', 'hint', 'multiple' => true, 'label' => null])
<label
    {{ $attributes->merge(['class' => 'panel flex cursor-pointer flex-col items-center justify-center gap-3 border-2 border-dashed px-6 py-12 text-center transition']) }}
    :class="dragging ? 'border-accent bg-accent-soft' : 'border-line-strong hover:border-accent'"
    @dragover.prevent="dragging = true"
    @dragleave.prevent="dragging = false"
    @drop.prevent="onDrop($event)"
>
    <span class="grid size-12 place-items-center rounded-full bg-accent-soft text-accent">
        <x-icon name="upload" :size="22" />
    </span>
    <span class="text-base font-medium text-ink">{{ $label ?? __('Drop files here or') }} <span class="text-accent underline underline-offset-4">{{ __('browse') }}</span></span>
    <span class="text-sm text-muted">{{ $hint }}</span>
    <input type="file" class="sr-only" accept="{{ $accept }}" @if ($multiple) multiple @endif @change="onPick($event)">
</label>
