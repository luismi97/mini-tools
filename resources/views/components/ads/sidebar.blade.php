{{-- Sidebar ads only make sense on wide screens; hidden below lg. --}}
<x-ads.slot position="sidebar" format="vertical" {{ $attributes->merge(['class' => 'hidden min-h-[600px] lg:block']) }} />
