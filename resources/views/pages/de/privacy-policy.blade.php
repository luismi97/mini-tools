@php $site = config('site.name'); $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title" updated="6. Oktober 2026">
    <p>Diese Datenschutzerklärung erläutert, welche Informationen {{ $site }} („wir“) erhebt, wenn du diese Website nutzt, und wie sie verwendet werden. Wir erheben nur die Daten, die für den Betrieb und die Verbesserung der Website mindestens nötig sind.</p>

    <h2>Dateien und Texte, die du mit unseren Tools verwendest</h2>
    <p>Unsere Tools verarbeiten deine Dateien und Texte <strong>lokal in deinem Browser</strong>. Bilder, PDFs, Dokumente, Passwörter und eingefügte Texte werden von unseren Servern weder empfangen noch gespeichert noch eingesehen. Wenn du die Seite schließt oder neu lädst, sind diese Daten weg.</p>

    <h2>Automatisch erhobene Informationen</h2>
    <p>Wie die meisten Websites kann unser Hosting-Anbieter übliche Server-Logs (IP-Adresse, Browsertyp, aufgerufene Seiten und Zeitpunkt der Anfrage) aus Sicherheitsgründen und für den Betrieb speichern. Diese Logs werden nur begrenzt aufbewahrt und nicht genutzt, um dich zu identifizieren.</p>

    <h2>Analyse</h2>
    <p>Wir nutzen möglicherweise Google Analytics, um zu verstehen, wie Besucher die Website nutzen, etwa welche Tools am beliebtesten sind. Analytics erhält anonyme Nutzungsereignisse wie „Tool verwendet“ oder „Datei heruntergeladen“ mit technischen Details wie der Anzahl der Dateien oder dem Ausgabeformat. <strong>Wir senden niemals den Inhalt deiner Dateien oder Texte an die Analyse.</strong> Google Analytics verwendet Cookies; du kannst es mit dem <a href="https://tools.google.com/dlpage/gaoptout" rel="noopener" target="_blank">Browser-Add-on zur Deaktivierung von Google Analytics</a> abschalten.</p>

    <h2>Werbung und Cookies</h2>
    <p>Wir zeigen möglicherweise Anzeigen von Google AdSense. Drittanbieter, darunter Google, verwenden Cookies, um Anzeigen auf Grundlage deiner früheren Besuche auf dieser und anderen Websites auszuliefern. Werbe-Cookies ermöglichen es Google und seinen Partnern, Anzeigen auf Basis deiner Besuche auf dieser und/oder anderen Websites im Internet zu schalten.</p>
    <ul>
        <li>Du kannst personalisierte Werbung in den <a href="https://adssettings.google.com" rel="noopener" target="_blank">Google-Anzeigeneinstellungen</a> deaktivieren.</li>
        <li>Die Verwendung von Cookies mancher Drittanbieter für personalisierte Werbung kannst du unter <a href="https://www.aboutads.info/choices/" rel="noopener" target="_blank">www.aboutads.info</a> deaktivieren.</li>
        <li>Mehr erfahren: <a href="https://policies.google.com/technologies/partner-sites" rel="noopener" target="_blank">Wie Google Daten von Websites verwendet, die Google-Dienste nutzen</a>.</li>
    </ul>
    <p>Wo das Gesetz es verlangt (zum Beispiel im Europäischen Wirtschaftsraum, im Vereinigten Königreich und in der Schweiz), bitten wir um deine Einwilligung, bevor wir nicht notwendige Cookies verwenden.</p>

    <h2>Konten</h2>
    <p>{{ $site }} erfordert kein Konto, wir erheben also keine Namen, E-Mail-Adressen oder Passwörter für die Nutzung der Tools.</p>

    <h2>Kinder</h2>
    <p>Diese Website richtet sich nicht an Kinder unter 13 Jahren, und wir erheben wissentlich keine personenbezogenen Daten von ihnen.</p>

    <h2>Deine Rechte</h2>
    <p>Je nach Wohnort (zum Beispiel nach der DSGVO in der EU) hast du das Recht auf Auskunft, Berichtigung oder Löschung der personenbezogenen Daten, die wir über dich haben. Da wir die Inhalte, die du mit unseren Tools verarbeitest, nicht speichern, gibt es in der Regel nichts zu löschen. Für eine Anfrage schreib uns an <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>

    <h2>Änderungen dieser Erklärung</h2>
    <p>Wir können diese Datenschutzerklärung von Zeit zu Zeit aktualisieren. Das Datum oben auf dieser Seite zeigt die letzte Änderung.</p>

    <h2>Kontakt</h2>
    <p>Fragen zum Datenschutz? Schreib uns an <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>
</x-page-layout>
