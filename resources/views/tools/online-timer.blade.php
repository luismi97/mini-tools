<x-tool-page :tool="$tool" :seo="$seo" :related="$related">
    <x-slot:script>@vite('resources/js/tools/online-timer.js')</x-slot:script>

    <div x-data="onlineTimer" class="space-y-4">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div class="inline-flex rounded-lg bg-sunken p-1 text-sm" role="tablist" aria-label="{{ __('Mode') }}">
                @foreach (['timer' => 'Timer', 'stopwatch' => 'Stopwatch', 'pomodoro' => 'Pomodoro'] as $key => $label)
                    <button type="button" role="tab" :aria-selected="mode === '{{ $key }}'" @click="switchMode('{{ $key }}')"
                        class="rounded-md px-4 py-1.5 transition" :class="mode === '{{ $key }}' ? 'bg-surface font-medium text-ink shadow-sm' : 'text-muted hover:text-ink'">{{ __($label) }}</button>
                @endforeach
            </div>
            <label class="flex items-center gap-2 text-sm text-muted"><input type="checkbox" x-model="sound" class="size-4 accent-accent"> {{ __('Alarm sound') }}</label>
        </div>

        {{-- Timer --}}
        <div x-show="mode === 'timer'" class="panel p-6 text-center">
            <p class="font-mono text-7xl font-semibold tabular-nums tracking-tight sm:text-8xl" :class="finished ? 'text-danger' : 'text-ink'" x-text="fmtCountdown(left())" role="timer" aria-live="off"></p>
            <p x-show="finished" x-cloak class="mt-2 font-medium text-danger">{{ __('Time’s up!') }}</p>
            <div x-show="!running() && pausedLeft === null" class="mx-auto mt-6 max-w-md space-y-4">
                <div class="flex flex-wrap justify-center gap-1.5">
                    <template x-for="m in presets" :key="m">
                        <button type="button" class="rounded-md border border-line-strong px-3 py-1 text-sm text-muted hover:text-ink" @click="setPreset(m)" x-text="m >= 60 ? $t('1 hour') : $t(':count min', { count: m })"></button>
                    </template>
                </div>
                <div class="grid grid-cols-3 gap-2">
                    @foreach (['hours' => 'Hours', 'minutes' => 'Minutes', 'seconds' => 'Seconds'] as $field => $label)
                        <div>
                            <label for="t-{{ $field }}" class="mb-1 block text-xs text-muted">{{ __($label) }}</label>
                            <input id="t-{{ $field }}" type="number" min="0" max="{{ $field === 'hours' ? 99 : 59 }}" x-model.number="duration.{{ $field }}" @input="finished = false" class="field text-center">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-6 flex justify-center gap-2">
                <button type="button" class="btn btn-primary min-w-28" x-show="!running()" @click="start()" :disabled="left() <= 0" x-text="pausedLeft !== null ? $t('Resume') : $t('Start')"></button>
                <button type="button" class="btn btn-primary min-w-28" x-show="running()" x-cloak @click="pause()">{{ __('Pause') }}</button>
                <button type="button" class="btn btn-secondary min-w-24" @click="reset()">{{ __('Reset') }}</button>
            </div>
        </div>

        {{-- Stopwatch --}}
        <div x-show="mode === 'stopwatch'" x-cloak class="panel p-6 text-center">
            <p class="font-mono text-7xl font-semibold tabular-nums tracking-tight text-ink sm:text-8xl" x-text="fmt(swElapsed(), { centiseconds: true })" role="timer"></p>
            <div class="mt-6 flex justify-center gap-2">
                <button type="button" class="btn btn-primary min-w-28" @click="swToggle()" x-text="swStart ? $t('Stop') : (swBefore ? $t('Resume') : $t('Start'))"></button>
                <button type="button" class="btn btn-secondary min-w-24" @click="swLap()" :disabled="!swStart">{{ __('Lap') }}</button>
                <button type="button" class="btn btn-secondary min-w-24" @click="swReset()" :disabled="swStart">{{ __('Reset') }}</button>
            </div>
            <ol x-show="laps.length" class="mx-auto mt-6 max-h-64 max-w-md divide-y divide-line overflow-auto rounded-lg border border-line text-left text-sm">
                <template x-for="lap in laps" :key="lap.n">
                    <li class="flex justify-between px-4 py-2 font-mono tabular-nums">
                        <span class="text-muted" x-text="$t('Lap :n', { n: lap.n })"></span>
                        <span class="text-ink" x-text="fmt(lap.split, { centiseconds: true })"></span>
                        <span class="text-muted" x-text="fmt(lap.total, { centiseconds: true })"></span>
                    </li>
                </template>
            </ol>
        </div>

        {{-- Pomodoro --}}
        <div x-show="mode === 'pomodoro'" x-cloak class="panel p-6 text-center">
            <p class="kicker" x-text="phase === 'work' ? $t('Focus · round :n', { n: round }) : (phase === 'long' ? $t('Long break') : $t('Short break'))"></p>
            <p class="mt-2 font-mono text-7xl font-semibold tabular-nums tracking-tight sm:text-8xl" :class="phase === 'work' ? 'text-ink' : 'text-success'" x-text="fmtCountdown(left())" role="timer"></p>
            <div class="mt-6 flex justify-center gap-2">
                <button type="button" class="btn btn-primary min-w-28" x-show="!running()" @click="start()" x-text="pausedLeft !== null ? $t('Resume') : $t('Start')"></button>
                <button type="button" class="btn btn-primary min-w-28" x-show="running()" x-cloak @click="pause()">{{ __('Pause') }}</button>
                <button type="button" class="btn btn-secondary" @click="nextPhase()">{{ __('Skip') }}</button>
                <button type="button" class="btn btn-ghost" @click="reset()">{{ __('Reset') }}</button>
            </div>
            <div class="mx-auto mt-6 grid max-w-sm grid-cols-3 gap-2" x-show="!running()">
                @foreach (['work' => 'Focus', 'short' => 'Short break', 'long' => 'Long break'] as $field => $label)
                    <div>
                        <label for="p-{{ $field }}" class="mb-1 block text-xs text-muted">{{ __($label) }} (min)</label>
                        <input id="p-{{ $field }}" type="number" min="1" max="120" x-model.number="pomo.{{ $field }}" class="field text-center">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-tool-page>
