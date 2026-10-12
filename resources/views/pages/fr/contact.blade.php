@php $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title">
    <p>Nous lisons tous les messages. Écrivez-nous pour :</p>
    <ul>
        <li>signaler un bug ou un résultat incorrect,</li>
        <li><a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}">proposer un nouvel outil ou une amélioration</a>,</li>
        <li>nous interroger sur la publicité ou des partenariats.</li>
    </ul>

    <div class="panel not-prose mt-8 flex flex-wrap items-center justify-between gap-4 p-5">
        <div>
            <p class="text-sm text-muted">E-mail</p>
            <a href="mailto:{{ $email }}" class="text-lg font-semibold text-ink no-underline">{{ $email }}</a>
        </div>
        <a href="mailto:{{ $email }}?subject={{ rawurlencode('Retour sur '.config('site.name')) }}" class="btn btn-primary no-underline">Envoyer un e-mail</a>
    </div>

    <h2>Avant d’écrire</h2>
    <p>Si quelque chose ne fonctionne pas, indiquez-nous l’outil utilisé, votre navigateur (par exemple Chrome, Safari ou Firefox) et ce qui s’est passé. <strong>Merci de ne pas nous envoyer de fichiers privés</strong> : une description du problème suffit.</p>
</x-page-layout>
