<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/regex-tester.js')</x-slot:script>

    <div x-data="regexTester" class="space-y-4">
        <div class="panel space-y-3 p-4">
            <label for="rx-pattern" class="label">{{ __('Pattern') }}</label>
            <div class="flex items-center rounded-lg border border-line-strong bg-surface font-mono text-sm focus-within:border-accent focus-within:ring-2 focus-within:ring-accent/25">
                <span class="pl-3 text-faint">/</span>
                <input id="rx-pattern" type="text" x-model="pattern" spellcheck="false" autocomplete="off" class="min-w-0 flex-1 border-0 bg-transparent px-1 py-2 text-ink focus:outline-none focus:ring-0">
                <span class="pr-3 text-faint" x-text="'/' + flagString()"></span>
            </div>
            <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-sm text-muted">
                @foreach (['g' => 'global', 'i' => 'ignore case', 'm' => 'multiline', 's' => 'dot all', 'u' => 'unicode'] as $flag => $label)
                    <label class="flex items-center gap-1.5"><input type="checkbox" x-model="flags.{{ $flag }}" class="size-4 accent-accent"> <code class="font-mono text-ink">{{ $flag }}</code> {{ __($label) }}</label>
                @endforeach
                <label class="flex items-center gap-1.5 sm:ml-auto"><input type="checkbox" x-model="showReplace" class="size-4 accent-accent"> {{ __('Replace') }}</label>
            </div>
            <div x-show="showReplace" x-cloak>
                <label for="rx-replace" class="label">{{ __('Replace with') }}</label>
                <input id="rx-replace" type="text" x-model="replacement" spellcheck="false" class="field font-mono" placeholder="e.g. $1 at $2">
            </div>
            <p x-show="error" x-cloak x-text="error" class="rounded-lg bg-danger-soft px-3 py-2 text-sm text-danger" role="alert"></p>
        </div>

        <div class="grid gap-4 lg:grid-cols-2">
            <div class="panel overflow-hidden">
                <label for="rx-text" class="kicker block px-4 pt-3">{{ __('Test string') }}</label>
                <textarea id="rx-text" x-model="text" spellcheck="false" class="h-64 w-full resize-y border-0 bg-transparent px-4 py-2 font-mono text-[13px] leading-6 text-ink focus:outline-none focus:ring-0"></textarea>
            </div>
            <div class="panel overflow-hidden">
                <p class="kicker px-4 pt-3" aria-live="polite">
                    <span x-text="$tc(':count match', ':count matches', matches.length, { count: matches.length + (truncated ? '+' : '') })"></span>
                </p>
                <div class="h-64 overflow-auto px-4 py-2 font-mono text-[13px] leading-6 whitespace-pre-wrap break-words text-ink"><template x-for="(seg, i) in highlighted()" :key="i"><span :class="seg.match === null ? '' : (seg.match % 2 ? 'rounded-sm bg-info/25' : 'rounded-sm bg-accent/25')" x-text="seg.text"></span></template></div>
            </div>
        </div>

        <div x-show="showReplace && replaced !== null" x-cloak class="panel overflow-hidden">
            <p class="kicker px-4 pt-3">{{ __('Replacement result') }}</p>
            <pre class="max-h-64 overflow-auto px-4 py-2 font-mono text-[13px] leading-6 whitespace-pre-wrap text-ink" x-text="replaced"></pre>
        </div>

        <div x-show="matches.length" class="panel overflow-hidden">
            <h2 class="border-b border-line px-5 py-3 font-semibold tracking-tight">{{ __('Match details') }}</h2>
            <div class="max-h-80 overflow-auto">
                <table class="w-full text-left text-sm">
                    <thead class="sticky top-0 bg-surface text-xs text-muted"><tr><th class="px-5 py-2 font-medium">#</th><th class="px-3 py-2 font-medium">{{ __('Match') }}</th><th class="px-3 py-2 font-medium">{{ __('Position') }}</th><th class="px-5 py-2 font-medium">{{ __('Groups') }}</th></tr></thead>
                    <tbody class="divide-y divide-line">
                        <template x-for="(m, i) in matches.slice(0, 200)" :key="i">
                            <tr>
                                <td class="px-5 py-2 text-muted" x-text="i + 1"></td>
                                <td class="break-all px-3 py-2 font-mono text-ink" x-text="m.value || $t('(empty)')"></td>
                                <td class="px-3 py-2 font-mono text-muted" x-text="`${m.index}–${m.end}`"></td>
                                <td class="break-all px-5 py-2 font-mono text-ink" x-text="m.named ? Object.entries(m.named).map(([k, v]) => `${k}: ${v}`).join(', ') : m.groups.map((g, j) => `$${j + 1}: ${g ?? '—'}`).join(', ') || '—'"></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-tool-page>
