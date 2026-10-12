@php $site = config('site.name'); $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title" updated="October 6, 2026">
    <p>By using {{ $site }} you agree to these Terms of Use. If you do not agree, please do not use the website.</p>

    <h2>Use of the tools</h2>
    <p>The tools are provided free of charge for personal and commercial use. You may not misuse the website, for example by attempting to disrupt it, overload it with automated requests, or use it for any unlawful purpose.</p>

    <h2>Your content</h2>
    <p>You keep all rights to the files and text you process. Because the tools run in your browser, we do not receive or store your content. You are responsible for making sure you have the right to process the content you use.</p>

    <h2>No warranty</h2>
    <p>The tools and their results are provided "as is", without warranty of any kind. Calculators provide estimates for informational purposes only and are not financial, legal, medical or professional advice. Always double-check important results and keep a copy of your original files.</p>

    <h2>Limitation of liability</h2>
    <p>To the maximum extent permitted by law, {{ $site }} is not liable for any loss or damage arising from the use of, or inability to use, the website or its tools, including loss of data.</p>

    <h2>Third-party services</h2>
    <p>The website may display advertising and use analytics provided by third parties, whose own terms and privacy policies apply. See our <a href="{{ \App\Http\Controllers\PageController::url('privacy-policy') }}">Privacy Policy</a> for details.</p>

    <h2>Changes</h2>
    <p>We may update these terms or change, add or remove tools at any time. Continued use of the website means you accept the current terms.</p>

    <h2>Contact</h2>
    <p>Questions about these terms? Email <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>
</x-page-layout>
