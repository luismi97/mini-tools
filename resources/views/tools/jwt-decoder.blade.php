<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/jwt-decoder.js')</x-slot:script>

    <div x-data="jwtDecoder" class="space-y-6">
        <div class="panel overflow-hidden">
            <div class="flex items-center justify-between px-4 py-2.5">
                <label for="jwt-input" class="kicker">{{ __('Encoded token') }}</label>
                <div class="flex items-center gap-1">
                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="loadSample()">{{ __('Load sample') }}</button>
                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="clear()" :disabled="!token"><x-icon name="trash" :size="14" /> {{ __('Clear') }}</button>
                </div>
            </div>
            <textarea id="jwt-input" x-model="token" rows="5" spellcheck="false" autocomplete="off"
                placeholder="{{ __('Paste a JWT, e.g. eyJhbGciOiJIUzI1NiIs...') }}"
                class="w-full resize-y border-0 bg-transparent px-4 pb-4 font-mono text-[13px] leading-6 break-all text-ink placeholder:text-faint focus:outline-none focus:ring-0"></textarea>
            <div class="flex min-h-11 flex-wrap items-center gap-3 border-t border-line px-4 py-2 text-sm" aria-live="polite">
                <span x-show="error" x-cloak class="flex items-center gap-1.5 text-danger"><x-icon name="alert-circle" :size="16" /> <span x-text="error"></span></span>
                <template x-if="result">
                    <span class="flex flex-wrap items-center gap-2">
                        <span class="rounded-full px-2 py-0.5 font-mono text-xs"
                              :class="result.status === 'valid' ? 'bg-success-soft text-success' : 'bg-danger-soft text-danger'"
                              x-text="{ valid: $t('Not expired'), expired: $t('Expired'), 'not-yet-valid': $t('Not yet valid') }[result.status]"></span>
                        <span class="text-muted" x-text="$t('Algorithm: :alg', { alg: result.header.alg || $t('unknown') })"></span>
                    </span>
                </template>
                <span x-show="!error && !result" class="text-faint">{{ __('Decoding happens in your browser. The signature is not verified.') }}</span>
            </div>
        </div>

        <template x-if="result">
            <div class="space-y-6">
                <div class="grid gap-6 lg:grid-cols-2">
                    <template x-for="part in ['header', 'payload']" :key="part">
                        <div class="panel min-w-0 overflow-hidden">
                            <div class="flex items-center justify-between border-b border-line px-4 py-2.5">
                                <h2 class="kicker" x-text="$t(part === 'header' ? 'Header' : 'Payload')"></h2>
                                <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="copy(part)">
                                    <x-icon name="copy" :size="14" /> <span x-text="copied === part ? $t('Copied') : $t('Copy')"></span>
                                </button>
                            </div>
                            <pre class="max-h-96 overflow-auto p-4 font-mono text-[13px] leading-6 text-ink" x-text="pretty(result[part])"></pre>
                        </div>
                    </template>
                </div>

                <div class="panel overflow-hidden" x-show="result.times.length">
                    <h2 class="border-b border-line px-5 py-3 font-semibold tracking-tight">{{ __('Time claims') }}</h2>
                    <dl class="divide-y divide-line text-sm">
                        <template x-for="t in result.times" :key="t.claim">
                            <div class="grid gap-1 px-5 py-3 sm:grid-cols-[180px_1fr]">
                                <dt class="text-muted"><span x-text="$t(t.label)"></span> <code class="font-mono text-xs text-faint" x-text="'(' + t.claim + ')'"></code></dt>
                                <dd class="font-mono text-ink" x-text="formatDate(t.date)"></dd>
                            </div>
                        </template>
                    </dl>
                </div>
            </div>
        </template>
    </div>
</x-tool-page>
