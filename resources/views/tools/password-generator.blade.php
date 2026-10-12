<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/password-generator.js')</x-slot:script>

    <div x-data="passwordGenerator" class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_340px]">
        <div class="min-w-0 space-y-4">
            <div class="panel p-5">
                <template x-if="passwords.length === 1">
                    <div class="flex flex-wrap items-center gap-3">
                        <output class="min-w-0 flex-1 break-all font-mono text-2xl text-ink sm:text-3xl" x-text="passwords[0]" aria-live="polite"></output>
                        <div class="flex gap-2">
                            <button type="button" class="btn btn-secondary" @click="generate()" aria-label="{{ __('Generate a new password') }}"><x-icon name="refresh" :size="16" /></button>
                            <button type="button" class="btn btn-primary" @click="copy(0)">
                                <x-icon name="copy" :size="16" /> <span x-text="copied === 0 ? $t('Copied') : $t('Copy')">{{ __('Copy') }}</span>
                            </button>
                        </div>
                    </div>
                </template>
                <template x-if="passwords.length > 1">
                    <div>
                        <div class="mb-3 flex items-center justify-between">
                            <p class="kicker" x-text="$t(':count passwords', { count: passwords.length })"></p>
                            <div class="flex gap-2">
                                <button type="button" class="btn btn-secondary" @click="generate()"><x-icon name="refresh" :size="16" /> {{ __('Generate') }}</button>
                                <button type="button" class="btn btn-primary" @click="copy('all')"><x-icon name="copy" :size="16" /> <span x-text="copied === 'all' ? $t('Copied') : $t('Copy all')"></span></button>
                            </div>
                        </div>
                        <ul class="divide-y divide-line rounded-lg border border-line">
                            <template x-for="(pw, i) in passwords" :key="i + pw">
                                <li class="flex items-center gap-3 px-3 py-2">
                                    <span class="min-w-0 flex-1 break-all font-mono text-sm text-ink" x-text="pw"></span>
                                    <button type="button" class="btn btn-ghost px-2 py-1 text-xs" @click="copy(i)" x-text="copied === i ? $t('Copied') : $t('Copy')"></button>
                                </li>
                            </template>
                        </ul>
                    </div>
                </template>
                <p x-show="error" x-cloak x-text="error" class="text-sm text-danger" role="alert"></p>

                <div x-show="passwords.length" class="mt-5">
                    <div class="h-2 overflow-hidden rounded-full bg-sunken">
                        <div class="h-full rounded-full transition-all" :class="meterClass()" :style="`width:${Math.min(100, strength().bits / 1.28)}%`"></div>
                    </div>
                    <p class="mt-2 text-sm text-muted"><span class="font-medium text-ink" x-text="$t(strength().label)"></span> &middot; <span x-text="strength().bits"></span> {{ __('bits of entropy') }}</p>
                </div>
            </div>
        </div>

        <div class="panel space-y-5 self-start p-5">
            <div>
                <div class="mb-1.5 flex items-center justify-between">
                    <label for="pw-length" class="text-sm font-medium text-ink">{{ __('Length') }}</label>
                    <input type="number" min="4" max="128" x-model.number="options.length" class="field w-20 py-1 text-center" aria-label="{{ __('Password length') }}">
                </div>
                <input id="pw-length" type="range" min="4" max="64" x-model.number="options.length" class="w-full accent-accent">
            </div>
            <div class="space-y-2.5 text-sm text-ink">
                <label class="flex items-center gap-2"><input type="checkbox" x-model="options.upper" class="size-4 accent-accent"> {{ __('Uppercase (A–Z)') }}</label>
                <label class="flex items-center gap-2"><input type="checkbox" x-model="options.lower" class="size-4 accent-accent"> {{ __('Lowercase (a–z)') }}</label>
                <label class="flex items-center gap-2"><input type="checkbox" x-model="options.digits" class="size-4 accent-accent"> {{ __('Numbers (0–9)') }}</label>
                <label class="flex items-center gap-2"><input type="checkbox" x-model="options.symbols" class="size-4 accent-accent"> Symbols (!@#$…)</label>
                <label class="flex items-center gap-2 text-muted"><input type="checkbox" x-model="options.excludeAmbiguous" class="size-4 accent-accent"> {{ __('Exclude look-alikes (l, 1, O, 0)') }}</label>
            </div>
            <div>
                <label for="pw-count" class="label">{{ __('How many') }}</label>
                <input id="pw-count" type="number" min="1" max="50" x-model.number="count" class="field w-24">
            </div>
        </div>
    </div>
</x-tool-page>
