{{--
    Two-pane "input → output" UI for text tools. Use inside an x-data built
    with textTool() from resources/js/lib/text-tool.js.

    Props:  inputLabel, outputLabel, placeholder (already translated), mono (monospace font), rows
    Slots:  toolbar — options bound to `options.*` (optional)
            extra   — content rendered under the panes (optional)
--}}
@props([
    'inputLabel' => null,
    'outputLabel' => null,
    'placeholder' => null,
    'mono' => true,
])
@php
    $inputLabel ??= __('Input');
    $outputLabel ??= __('Output');
    $placeholder ??= __('Paste or type here...');
@endphp
<div class="panel overflow-hidden">
    @isset($toolbar)
        <div class="flex flex-wrap items-center gap-x-6 gap-y-3 border-b border-line bg-paper/60 p-3">
            {{ $toolbar }}
        </div>
    @endisset

    <div class="grid lg:grid-cols-2">
        <div class="flex min-w-0 flex-col border-b border-line lg:border-b-0 lg:border-r">
            {{-- Toolbars wrap so longer translations (e.g. German) never overflow on phones. --}}
            <div class="flex flex-wrap items-center justify-between gap-x-3 gap-y-1 px-4 py-2.5">
                <label for="tool-input" class="kicker">{{ $inputLabel }}</label>
                <div class="ml-auto flex flex-wrap items-center justify-end gap-1">
                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" x-show="hasSample" @click="loadSample()">{{ __('Load sample') }}</button>
                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="clear()" :disabled="!input">
                        <x-icon name="trash" :size="14" /> {{ __('Clear') }}
                    </button>
                </div>
            </div>
            <textarea id="tool-input" x-model="input" spellcheck="false" autocomplete="off" autocapitalize="off"
                placeholder="{{ $placeholder }}"
                @class([
                    'h-72 w-full resize-y border-0 bg-transparent px-4 pb-4 text-ink placeholder:text-faint focus:outline-none focus:ring-0 lg:h-96',
                    'font-mono text-[13px] leading-6' => $mono,
                    'text-sm leading-6' => ! $mono,
                ])></textarea>
            <div class="flex min-h-11 items-center justify-between gap-3 border-t border-line px-4 py-2 text-sm" aria-live="polite">
                <span x-show="error" x-cloak class="flex min-w-0 items-center gap-1.5 text-danger">
                    <x-icon name="alert-circle" :size="16" /> <span class="truncate" x-text="error"></span>
                </span>
                <span x-show="!error"></span>
                <span class="shrink-0 font-mono text-xs text-faint" x-text="stats(input)"></span>
            </div>
        </div>

        <div class="flex min-w-0 flex-col">
            <div class="flex flex-wrap items-center justify-between gap-x-3 gap-y-1 px-4 py-2.5">
                <label for="tool-output" class="kicker">{{ $outputLabel }}</label>
                <div class="ml-auto flex flex-wrap items-center justify-end gap-1">
                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" x-show="canSwap" @click="swap()" :disabled="!output" title="{{ __('Use the output as input') }}">
                        <x-icon name="swap" :size="14" /> {{ __('Swap') }}
                    </button>
                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="copy()" :disabled="!output">
                        <x-icon name="copy" :size="14" x-show="!copied" />
                        <x-icon name="check" :size="14" x-show="copied" x-cloak />
                        <span x-text="copied ? $t('Copied') : $t('Copy')">{{ __('Copy') }}</span>
                    </button>
                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="download()" :disabled="!output">
                        <x-icon name="download" :size="14" /> {{ __('Download') }}
                    </button>
                </div>
            </div>
            <textarea id="tool-output" x-model="output" readonly spellcheck="false" placeholder="{{ __('The result will appear here.') }}"
                @class([
                    'h-72 w-full resize-y border-0 bg-transparent px-4 pb-4 text-ink placeholder:text-faint focus:outline-none focus:ring-0 lg:h-96',
                    'font-mono text-[13px] leading-6' => $mono,
                    'text-sm leading-6' => ! $mono,
                ])></textarea>
            <div class="flex min-h-11 items-center justify-end border-t border-line px-4 py-2">
                <span class="font-mono text-xs text-faint" x-show="output" x-text="stats(output)"></span>
            </div>
        </div>
    </div>

    {{ $extra ?? '' }}
</div>
