{{--
    Segmented control bound to an Alpine expression.
    <x-segmented model="options.mode" :options="['encode' => 'Encode', 'decode' => 'Decode']" :label="__('Mode')" />
    Option texts are English keys; this component translates them.
--}}
@props(['model', 'options', 'label' => null])
<div {{ $attributes->merge(['class' => 'inline-flex rounded-lg bg-sunken p-1 text-sm']) }} role="radiogroup" @if ($label) aria-label="{{ $label }}" @endif>
    @foreach ($options as $value => $text)
        <button type="button" role="radio"
            :aria-checked="{{ $model }} === @js($value)"
            @click="{{ $model }} = @js($value)"
            class="rounded-md px-3 py-1 transition"
            :class="{{ $model }} === @js($value) ? 'bg-surface font-medium text-ink shadow-sm' : 'text-muted hover:text-ink'">{{ __($text) }}</button>
    @endforeach
</div>
