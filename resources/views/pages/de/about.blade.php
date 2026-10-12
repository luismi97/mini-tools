@php $site = config('site.name'); $count = \App\Support\Catalog::tools()->count(); @endphp
<x-page-layout :seo="$seo" :title="$title">
    <p>{{ $site }} ist eine Sammlung von {{ $count }} kostenlosen Online-Tools für alltägliche Aufgaben: JSON formatieren, Bilder komprimieren und umwandeln, PDFs zusammenfügen und teilen, Wörter zählen, Passwörter und QR-Codes erstellen sowie Kredite, Prozente und vieles mehr berechnen.</p>
    <p>Wir bauen die Tools, die wir uns selbst wünschen: schnell, auf eine Aufgabe fokussiert, kostenlos und ohne Anmeldung, Pop-ups oder Tricks.</p>

    <h2>Privat von Grund auf</h2>
    <p>Fast alle Tools auf {{ $site }} laufen vollständig in deinem Browser. Wenn du ein Foto komprimierst, eine PDF zusammenfügst oder JSON formatierst, passiert die Arbeit mit moderner Browsertechnik auf deinem eigenen Gerät. <strong>Deine Dateien und Texte werden nie auf unsere Server hochgeladen</strong> — du kannst die Tools also bedenkenlos mit privaten Fotos, Verträgen, Rechnungen und Quellcode nutzen.</p>

    <h2>So bauen wir unsere Tools</h2>
    <ul>
        <li><strong>Genauigkeit zuerst.</strong> Die Rechner nutzen dokumentierte Standardformeln, und jeder kritische Teil der Logik ist durch automatisierte Tests abgedeckt.</li>
        <li><strong>Geschwindigkeit.</strong> Jede Seite lädt nur den Code, den sie braucht. Schwere Bibliotheken wie PDF-Engines werden erst geladen, wenn du sie nutzt.</li>
        <li><strong>Barrierefreiheit.</strong> Die Tools funktionieren mit Tastatur und Screenreader, auf Handy und Desktop, im hellen und im dunklen Modus.</li>
        <li><strong>Offene Standards.</strong> Wir nutzen bewährte Open-Source-Bibliotheken wie PDF.js, pdf-lib und libheif.</li>
    </ul>

    <h2>Wie {{ $site }} kostenlos bleibt</h2>
    <p>{{ $site }} finanziert sich über unaufdringliche Werbung. Anzeigen blockieren nie ein Tool und stehen nie im Arbeitsbereich. Künftig bieten wir eventuell einen optionalen Bezahlplan mit Extras wie größeren Dateien und Stapelverarbeitung an; die Kernfunktionen bleiben kostenlos.</p>

    <h2>Tool vorschlagen</h2>
    <p>Dir fehlt etwas? Wir fügen regelmäßig neue Tools hinzu — je nachdem, was gebraucht wird. <a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}">Schick uns deine Idee</a>.</p>
</x-page-layout>
