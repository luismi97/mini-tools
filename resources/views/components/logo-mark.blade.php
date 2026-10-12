{{--
    Tiny Knack symbol: a geometric lowercase "k" whose lower leg is a dot ("tiny").
    Fixed brand colors (logos do not invert with the theme). Keep in sync with
    public/favicon.svg and GenerateSeoImages::logoMark().
--}}
<svg {{ $attributes->merge(['class' => 'size-7 shrink-0']) }} viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <rect width="32" height="32" rx="9" fill="#0f766e"/>
    <g stroke="#fff" stroke-width="3.6" stroke-linecap="round" fill="none">
        <path d="M11.5 8v16.5"/>
        <path d="M11.5 19.5 19.5 11.5"/>
    </g>
    <circle cx="20.2" cy="21.6" r="2.7" fill="#fff"/>
</svg>
