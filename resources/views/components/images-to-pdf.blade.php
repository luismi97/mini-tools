{{-- Shared UI for images → PDF tools. Use inside an x-data built with imagesToPdfTool(). --}}
@props(['accept', 'hint'])
<x-file-list :accept="$accept" :hint="$hint" :label="__('Drop images here or')" icon="image">
    <x-slot:settings>
        <div>
            <label for="pdf-page-size" class="label">{{ __('Page size') }}</label>
            <select id="pdf-page-size" x-model="options.pageSize" class="field w-40">
                <option value="a4">A4</option>
                <option value="letter">{{ __('US Letter') }}</option>
                <option value="fit">{{ __('Fit to image') }}</option>
            </select>
        </div>
        <div x-show="options.pageSize !== 'fit'">
            <label for="pdf-orientation" class="label">{{ __('Orientation') }}</label>
            <select id="pdf-orientation" x-model="options.orientation" class="field w-40">
                <option value="auto">{{ __('Auto') }}</option>
                <option value="portrait">{{ __('Portrait') }}</option>
                <option value="landscape">{{ __('Landscape') }}</option>
            </select>
        </div>
        <div>
            <label for="pdf-margin" class="label">{{ __('Margin') }}</label>
            <select id="pdf-margin" x-model="options.margin" class="field w-40">
                <option value="none">{{ __('No margin') }}</option>
                <option value="small">{{ __('Small') }}</option>
                <option value="large">{{ __('Large') }}</option>
            </select>
        </div>
    </x-slot:settings>
    <x-slot:actions>
        <p x-show="error" x-text="error" class="text-sm text-danger" x-cloak></p>
        <button type="button" class="btn btn-primary" @click="convert()" :disabled="busy || !validFiles().length">
            <x-icon name="file-text" :size="16" /> <span x-text="busy ? $t('Creating PDF…') : $t('Convert to PDF')">{{ __('Convert to PDF') }}</span>
        </button>
    </x-slot:actions>
</x-file-list>
