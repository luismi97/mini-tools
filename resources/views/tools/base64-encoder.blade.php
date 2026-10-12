<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/base64-encoder.js')</x-slot:script>

    <div x-data="base64Encoder" class="space-y-6">
        <x-text-tool input-label="{{ __('Input') }}" output-label="{{ __('Result') }}" placeholder="{{ __('Paste text to encode, or Base64 to decode...') }}">
            <x-slot:toolbar>
                <x-segmented model="options.mode" :options="['encode' => 'Encode', 'decode' => 'Decode']" :label="__('Mode')" />
                <label class="flex items-center gap-2 text-sm text-muted" x-show="options.mode === 'encode'">
                    <input type="checkbox" x-model="options.urlSafe" class="size-4 accent-accent"> {{ __('URL-safe') }}
                </label>
            </x-slot:toolbar>
        </x-text-tool>

        <div class="panel p-5">
            <h2 class="font-semibold tracking-tight">{{ __('Encode a file') }}</h2>
            <p class="mt-1 text-sm text-muted">{{ __('Convert an image or any file (up to 10 MB) to Base64 or a data URI.') }}</p>
            <label class="btn btn-secondary mt-4 cursor-pointer">
                <x-icon name="upload" :size="16" /> {{ __('Choose file') }}
                <input type="file" class="sr-only" @change="encodeFile($event)">
            </label>
            <p x-show="fileError" x-text="fileError" class="mt-3 text-sm text-danger" x-cloak></p>
            <template x-if="file">
                <div class="mt-4 space-y-3">
                    <p class="text-sm text-muted"><span class="font-medium text-ink" x-text="file.name"></span> &middot; <span x-text="file.size"></span></p>
                    <textarea readonly rows="4" class="field font-mono text-xs" x-text="file.dataUrl.length > 5000 ? file.dataUrl.slice(0, 5000) + '…' : file.dataUrl" aria-label="{{ __('Data URI preview') }}"></textarea>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" class="btn btn-primary" @click="copyFile('base64')">
                            <x-icon name="copy" :size="16" /> <span x-text="fileCopied === 'base64' ? $t('Copied') : $t('Copy Base64')"></span>
                        </button>
                        <button type="button" class="btn btn-secondary" @click="copyFile('uri')">
                            <x-icon name="copy" :size="16" /> <span x-text="fileCopied === 'uri' ? $t('Copied') : $t('Copy data URI')"></span>
                        </button>
                        <button type="button" class="btn btn-ghost" @click="downloadFileBase64()">
                            <x-icon name="download" :size="16" /> {{ __('Download .txt') }}
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </div>
</x-tool-page>
