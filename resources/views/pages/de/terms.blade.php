@php $site = config('site.name'); $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title" updated="6. Oktober 2026">
    <p>Mit der Nutzung von {{ $site }} akzeptierst du diese Nutzungsbedingungen. Wenn du nicht einverstanden bist, nutze die Website bitte nicht.</p>

    <h2>Nutzung der Tools</h2>
    <p>Die Tools stehen kostenlos für private und kommerzielle Zwecke zur Verfügung. Du darfst die Website nicht missbrauchen, etwa indem du versuchst, ihren Betrieb zu stören, sie mit automatisierten Anfragen zu überlasten oder sie für rechtswidrige Zwecke zu nutzen.</p>

    <h2>Deine Inhalte</h2>
    <p>Du behältst alle Rechte an den Dateien und Texten, die du verarbeitest. Da die Tools in deinem Browser laufen, erhalten oder speichern wir deine Inhalte nicht. Du bist dafür verantwortlich, dass du die Inhalte, die du verwendest, verarbeiten darfst.</p>

    <h2>Keine Gewährleistung</h2>
    <p>Die Tools und ihre Ergebnisse werden „wie besehen“ und ohne Gewährleistung jeglicher Art bereitgestellt. Die Rechner liefern nur Schätzwerte zu Informationszwecken und stellen keine Finanz-, Rechts-, medizinische oder sonstige fachliche Beratung dar. Prüfe wichtige Ergebnisse immer selbst und bewahre eine Kopie deiner Originaldateien auf.</p>

    <h2>Haftungsbeschränkung</h2>
    <p>Soweit gesetzlich zulässig, haftet {{ $site }} nicht für Verluste oder Schäden, die aus der Nutzung oder der Unmöglichkeit der Nutzung der Website oder ihrer Tools entstehen, einschließlich Datenverlust.</p>

    <h2>Dienste Dritter</h2>
    <p>Die Website kann Werbung anzeigen und Analysedienste Dritter nutzen, für die deren eigene Bedingungen und Datenschutzbestimmungen gelten. Details findest du in unserer <a href="{{ \App\Http\Controllers\PageController::url('privacy-policy') }}">Datenschutzerklärung</a>.</p>

    <h2>Änderungen</h2>
    <p>Wir können diese Bedingungen jederzeit aktualisieren und Tools ändern, hinzufügen oder entfernen. Wenn du die Website weiter nutzt, akzeptierst du die jeweils geltenden Bedingungen.</p>

    <h2>Kontakt</h2>
    <p>Fragen zu diesen Bedingungen? Schreib uns an <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>
</x-page-layout>
