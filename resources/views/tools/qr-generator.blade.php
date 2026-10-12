<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/qr-generator.js')</x-slot:script>

    <div x-data="qrGenerator" class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_380px]">
        <div class="panel min-w-0">
            {{-- Type tabs --}}
            <div class="flex gap-1 overflow-x-auto border-b border-line p-2" role="tablist" aria-label="{{ __('QR code content type') }}">
                <template x-for="(label, key) in types" :key="key">
                    <button type="button" role="tab" :aria-selected="type === key" @click="type = key"
                            class="shrink-0 rounded-md px-3.5 py-1.5 text-sm transition"
                            :class="type === key ? 'bg-accent-soft font-medium text-accent' : 'text-muted hover:bg-sunken hover:text-ink'"
                            x-text="$t(label)"></button>
                </template>
            </div>

            {{-- Content fields --}}
            <div class="space-y-4 p-5">
                <div x-show="type === 'url'">
                    <label for="qr-url" class="label">{{ __('Website URL') }}</label>
                    <input id="qr-url" type="url" x-model="data.url" class="field" placeholder="{{ __('https://example.com') }}" autocomplete="off">
                </div>

                <div x-show="type === 'text'" x-cloak>
                    <label for="qr-text" class="label">{{ __('Text') }}</label>
                    <textarea id="qr-text" x-model="data.text" rows="4" class="field" placeholder="{{ __('Type any text...') }}"></textarea>
                </div>

                <div x-show="type === 'email'" x-cloak class="space-y-4">
                    <div>
                        <label for="qr-email" class="label">{{ __('Email address') }}</label>
                        <input id="qr-email" type="email" x-model="data.email" class="field" placeholder="name@example.com" autocomplete="off">
                    </div>
                    <div>
                        <label for="qr-subject" class="label">{{ __('Subject') }} <span class="font-normal text-faint">{{ __('(optional)') }}</span></label>
                        <input id="qr-subject" type="text" x-model="data.subject" class="field">
                    </div>
                    <div>
                        <label for="qr-body" class="label">{{ __('Message') }} <span class="font-normal text-faint">{{ __('(optional)') }}</span></label>
                        <textarea id="qr-body" x-model="data.body" rows="3" class="field"></textarea>
                    </div>
                </div>

                <div x-show="type === 'phone'" x-cloak>
                    <label for="qr-phone" class="label">{{ __('Phone number') }}</label>
                    <input id="qr-phone" type="tel" x-model="data.phone" class="field" placeholder="+1 555 010 9999" autocomplete="off">
                    <p class="mt-1 text-xs text-faint">{{ __('Include the country code for international callers.') }}</p>
                </div>

                <div x-show="type === 'wifi'" x-cloak class="space-y-4">
                    <div>
                        <label for="qr-ssid" class="label">{{ __('Network name (SSID)') }}</label>
                        <input id="qr-ssid" type="text" x-model="data.ssid" class="field" autocomplete="off">
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="qr-security" class="label">{{ __('Security') }}</label>
                            <select id="qr-security" x-model="data.security" class="field">
                                <option value="WPA">WPA / WPA2 / WPA3</option>
                                <option value="WEP">WEP</option>
                                <option value="nopass">{{ __('None (open network)') }}</option>
                            </select>
                        </div>
                        <div x-show="data.security !== 'nopass'">
                            <label for="qr-password" class="label">{{ __('Password') }}</label>
                            <input id="qr-password" type="text" x-model="data.password" class="field" autocomplete="off" spellcheck="false">
                        </div>
                    </div>
                    <label class="flex items-center gap-2 text-sm text-muted">
                        <input type="checkbox" x-model="data.hidden" class="size-4 accent-accent"> {{ __('Hidden network') }}
                    </label>
                </div>
            </div>

            {{-- Appearance --}}
            <div class="grid gap-5 border-t border-line p-5 sm:grid-cols-2">
                <div>
                    <div class="mb-1.5 flex items-center justify-between">
                        <label for="qr-size" class="text-sm font-medium text-ink">{{ __('Size') }}</label>
                        <span class="font-mono text-sm text-muted" x-text="options.size + ' px'"></span>
                    </div>
                    <input id="qr-size" type="range" min="128" max="2048" step="32" x-model.number="options.size" class="w-full accent-accent">
                </div>
                <div>
                    <div class="mb-1.5 flex items-center justify-between">
                        <label for="qr-margin" class="text-sm font-medium text-ink">{{ __('Margin') }}</label>
                        <span class="font-mono text-sm text-muted" x-text="options.margin"></span>
                    </div>
                    <input id="qr-margin" type="range" min="0" max="10" step="1" x-model.number="options.margin" class="w-full accent-accent">
                </div>
                <div class="flex gap-4">
                    <div class="flex-1">
                        <label for="qr-fg" class="label">{{ __('Foreground') }}</label>
                        <div class="flex items-center gap-2">
                            <input id="qr-fg" type="color" x-model="options.foreground" class="h-9 w-12 cursor-pointer rounded-md border border-line-strong bg-surface p-1">
                            <span class="font-mono text-sm uppercase text-muted" x-text="options.foreground"></span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <label for="qr-bg" class="label">{{ __('Background') }}</label>
                        <div class="flex items-center gap-2">
                            <input id="qr-bg" type="color" x-model="options.background" class="h-9 w-12 cursor-pointer rounded-md border border-line-strong bg-surface p-1">
                            <span class="font-mono text-sm uppercase text-muted" x-text="options.background"></span>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="qr-level" class="label">{{ __('Error correction') }}</label>
                    <select id="qr-level" x-model="options.level" class="field">
                        <option value="L">{{ __('Low (7%)') }}</option>
                        <option value="M">{{ __('Medium (15%)') }}</option>
                        <option value="Q">{{ __('Quartile (25%)') }}</option>
                        <option value="H">{{ __('High (30%)') }}</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- Preview --}}
        <div class="panel flex flex-col items-center gap-4 self-start p-5 lg:sticky lg:top-6">
            <p class="kicker self-start">{{ __('Preview') }}</p>
            <div class="grid aspect-square w-full max-w-80 place-items-center overflow-hidden rounded-lg border border-line bg-sunken">
                <div x-show="svg" class="size-full" x-html="svg"></div>
                <p x-show="!svg" x-cloak class="px-6 text-center text-sm text-muted" x-text="error"></p>
            </div>
            <p x-show="svg && lowContrast" x-cloak class="w-full rounded-lg bg-danger-soft px-3 py-2 text-sm text-danger" role="alert">
                {{ __('Low contrast between colors — this QR code may not scan. Use a dark foreground on a light background.') }}
            </p>
            <div class="grid w-full grid-cols-2 gap-2">
                <button type="button" class="btn btn-primary" @click="downloadPng()" :disabled="!svg">
                    <x-icon name="download" :size="16" /> PNG
                </button>
                <button type="button" class="btn btn-secondary" @click="downloadSvg()" :disabled="!svg">
                    <x-icon name="download" :size="16" /> SVG
                </button>
            </div>
        </div>
    </div>
</x-tool-page>
