@php $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title">
    <p>Leggiamo tutti i messaggi. Scrivici per:</p>
    <ul>
        <li>segnalare un errore o un risultato sbagliato,</li>
        <li><a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}">proporre un nuovo strumento o un miglioramento</a>,</li>
        <li>chiedere informazioni su pubblicità o collaborazioni.</li>
    </ul>

    <div class="panel not-prose mt-8 flex flex-wrap items-center justify-between gap-4 p-5">
        <div>
            <p class="text-sm text-muted">Email</p>
            <a href="mailto:{{ $email }}" class="text-lg font-semibold text-ink no-underline">{{ $email }}</a>
        </div>
        <a href="mailto:{{ $email }}?subject={{ rawurlencode('Feedback su '.config('site.name')) }}" class="btn btn-primary no-underline">Invia un’email</a>
    </div>

    <h2>Prima di scrivere</h2>
    <p>Se qualcosa non funziona, indicaci lo strumento che hai usato, il tuo browser (ad esempio Chrome, Safari o Firefox) e cosa è successo. <strong>Per favore non inviarci file privati</strong>: basta descrivere il problema.</p>
</x-page-layout>
