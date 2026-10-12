@php $site = config('site.name'); $count = \App\Support\Catalog::tools()->count(); @endphp
<x-page-layout :seo="$seo" :title="$title">
    <p>{{ $site }} is a collection of {{ $count }} free online tools for everyday tasks: formatting JSON, compressing and converting images, merging and splitting PDFs, counting words, generating passwords and QR codes, and calculating loans, percentages and more.</p>
    <p>We build tools we wish existed: fast, focused on one job, free to use and free of sign-ups, pop-ups and dark patterns.</p>

    <h2>Private by design</h2>
    <p>Almost every tool on {{ $site }} runs entirely in your web browser. When you compress a photo, merge a PDF or format JSON, the work happens on your own device using modern browser technology. <strong>Your files and text are never uploaded to our servers</strong>, which makes the tools safe to use with personal photos, contracts, invoices and source code.</p>

    <h2>How we build our tools</h2>
    <ul>
        <li><strong>Accuracy first.</strong> Calculators use standard, documented formulas, and every critical piece of logic is covered by automated tests.</li>
        <li><strong>Speed.</strong> Pages load only the code they need. Heavy libraries, such as PDF engines, are downloaded only when you actually use them.</li>
        <li><strong>Accessibility.</strong> Tools work with a keyboard and screen readers, on phones and on desktops, in light and dark mode.</li>
        <li><strong>Open standards.</strong> We rely on well-known open-source libraries such as PDF.js, pdf-lib and libheif.</li>
    </ul>

    <h2>How {{ $site }} stays free</h2>
    <p>{{ $site }} is supported by non-intrusive advertising. Ads never block a tool and are never placed inside the tool area. In the future we may offer an optional paid plan with extras such as larger files and batch processing — the core tools will stay free.</p>

    <h2>Suggest a tool</h2>
    <p>Missing something? We add new tools regularly based on what people need. <a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}">Send us your idea</a>.</p>
</x-page-layout>
