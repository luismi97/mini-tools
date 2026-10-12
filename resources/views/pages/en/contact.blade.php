@php $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title">
    <p>We read every message. Write to us to:</p>
    <ul>
        <li>report a bug or a wrong result,</li>
        <li><a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}">suggest a new tool or an improvement</a>,</li>
        <li>ask about advertising or partnerships.</li>
    </ul>

    <div class="panel not-prose mt-8 flex flex-wrap items-center justify-between gap-4 p-5">
        <div>
            <p class="text-sm text-muted">Email</p>
            <a href="mailto:{{ $email }}" class="text-lg font-semibold text-ink no-underline">{{ $email }}</a>
        </div>
        <a href="mailto:{{ $email }}?subject={{ rawurlencode(config('site.name').' feedback') }}" class="btn btn-primary no-underline">Send an email</a>
    </div>

    <h2>Before you write</h2>
    <p>If something does not work, please tell us which tool you used, your browser (for example Chrome, Safari or Firefox) and what happened. <strong>Please do not send us private files</strong> — describing the problem is enough.</p>
</x-page-layout>
