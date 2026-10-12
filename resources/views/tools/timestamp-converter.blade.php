<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/timestamp-converter.js')</x-slot:script>

    <div x-data="timestampConverter" class="space-y-6">
        <div class="panel flex flex-wrap items-center justify-between gap-4 p-5">
            <div>
                <p class="kicker">{{ __('Current Unix timestamp') }}</p>
                <p class="mt-1 font-mono text-3xl font-semibold tabular-nums text-ink" x-text="Math.floor(now / 1000)"></p>
                <p class="mt-1 text-xs text-muted" x-text="$t('Your time zone: :zone', { zone: timeZone })"></p>
            </div>
            <button type="button" class="btn btn-secondary" @click="copy(String(Math.floor(now / 1000)), 'now')">
                <x-icon name="copy" :size="16" /> <span x-text="copied === 'now' ? $t('Copied') : $t('Copy')"></span>
            </button>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            <section class="panel min-w-0 overflow-hidden">
                <div class="space-y-3 border-b border-line p-5">
                    <h2 class="font-semibold tracking-tight">{{ __('Timestamp to date') }}</h2>
                    <div class="flex gap-2">
                        <input type="text" inputmode="numeric" x-model="timestamp" class="field font-mono" aria-label="{{ __('Unix timestamp') }}" spellcheck="false">
                        <button type="button" class="btn btn-secondary shrink-0" @click="useNow()">{{ __('Now') }}</button>
                    </div>
                    <p x-show="parsed().ok" class="text-xs text-muted" x-text="$t('Detected: :unit', { unit: $t(parsed().unit) })"></p>
                    <p x-show="!parsed().ok" x-cloak class="text-sm text-danger" x-text="parsed().message"></p>
                </div>
                <dl class="divide-y divide-line text-sm" aria-live="polite">
                    <template x-for="[label, value] in rows()" :key="label">
                        <div class="flex items-center gap-3 px-5 py-2.5">
                            <dt class="w-28 shrink-0 text-muted" x-text="$t(label)"></dt>
                            <dd class="min-w-0 flex-1 break-words font-mono text-[13px] text-ink" x-text="value"></dd>
                            <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="copy(value, label)" x-text="copied === label ? $t('Copied') : $t('Copy')"></button>
                        </div>
                    </template>
                </dl>
            </section>

            <section class="panel min-w-0 space-y-4 self-start p-5">
                <h2 class="font-semibold tracking-tight">{{ __('Date to timestamp') }}</h2>
                <div>
                    <label for="ts-date" class="label">{{ __('Date and time') }}</label>
                    <input id="ts-date" type="datetime-local" step="1" x-model="dateInput" class="field">
                </div>
                <x-segmented model="zone" :options="['local' => 'Local time', 'utc' => 'UTC']" label="{{ __('Time zone') }}" />
                <template x-if="converted().ok">
                    <dl class="divide-y divide-line rounded-lg border border-line text-sm">
                        <div class="flex items-center gap-3 px-4 py-2.5">
                            <dt class="w-28 text-muted">{{ __('Seconds') }}</dt>
                            <dd class="min-w-0 flex-1 break-all font-mono text-ink" x-text="converted().seconds"></dd>
                            <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="copy(String(converted().seconds), 'cs')" x-text="copied === 'cs' ? $t('Copied') : $t('Copy')"></button>
                        </div>
                        <div class="flex items-center gap-3 px-4 py-2.5">
                            <dt class="w-28 text-muted">{{ __('Milliseconds') }}</dt>
                            <dd class="min-w-0 flex-1 break-all font-mono text-ink" x-text="converted().milliseconds"></dd>
                            <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="copy(String(converted().milliseconds), 'cm')" x-text="copied === 'cm' ? $t('Copied') : $t('Copy')"></button>
                        </div>
                    </dl>
                </template>
                <p x-show="!converted().ok" x-cloak class="text-sm text-danger" x-text="converted().message"></p>
            </section>
        </div>
    </div>
</x-tool-page>
