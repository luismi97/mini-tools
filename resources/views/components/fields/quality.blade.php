{{-- Quality slider bound to settings.quality (0–100) of an imageBatch() component. --}}
<div {{ $attributes->merge(['class' => 'w-full sm:w-72']) }}>
    <div class="mb-1.5 flex items-center justify-between">
        <label for="quality" class="text-sm font-medium text-ink">{{ __('Quality') }}</label>
        <span class="font-mono text-sm text-muted" x-text="settings.quality + '%'"></span>
    </div>
    <input id="quality" type="range" min="10" max="100" step="1" x-model.number="settings.quality" class="w-full accent-accent">
    <div class="mt-1 flex justify-between text-xs text-faint"><span>{{ __('Smaller file') }}</span><span>{{ __('Better quality') }}</span></div>
</div>
