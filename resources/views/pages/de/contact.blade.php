@php $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title">
    <p>Wir lesen jede Nachricht. Schreib uns, um:</p>
    <ul>
        <li>einen Fehler oder ein falsches Ergebnis zu melden,</li>
        <li><a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}">ein neues Tool oder eine Verbesserung vorzuschlagen</a>,</li>
        <li>nach Werbung oder Kooperationen zu fragen.</li>
    </ul>

    <div class="panel not-prose mt-8 flex flex-wrap items-center justify-between gap-4 p-5">
        <div>
            <p class="text-sm text-muted">E-Mail</p>
            <a href="mailto:{{ $email }}" class="text-lg font-semibold text-ink no-underline">{{ $email }}</a>
        </div>
        <a href="mailto:{{ $email }}?subject={{ rawurlencode('Feedback zu '.config('site.name')) }}" class="btn btn-primary no-underline">E-Mail schreiben</a>
    </div>

    <h2>Bevor du schreibst</h2>
    <p>Wenn etwas nicht funktioniert, nenn uns das Tool, deinen Browser (zum Beispiel Chrome, Safari oder Firefox) und was passiert ist. <strong>Bitte schick uns keine privaten Dateien</strong> — eine Beschreibung des Problems reicht.</p>
</x-page-layout>
