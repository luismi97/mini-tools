<?php

/*
| German copy for batch 6: Credit Card Payoff, Loan Comparison, Organize PDF,
| Add Page Numbers to PDF. See content/de/tools.php.
*/

return [
    'credit-card-payoff-calculator' => [
        'slug' => 'kreditkarten-tilgungsrechner',
        'name' => 'Kreditkarten-Tilgungsrechner',
        'short_description' => 'Sieh, wie lange die Tilgung deiner Kreditkarte dauert und was sie kostet.',
        'description' => 'Gib Saldo und Zinssatz deiner Karte ein und sieh, wann du mit einer festen Monatsrate schuldenfrei bist oder welche Rate du für ein Zieldatum brauchst – im Vergleich zur Mindestzahlung.',
        'seo_title' => 'Kreditkarten-Tilgungsrechner: wann schuldenfrei?',
        'seo_description' => 'Berechne kostenlos, wie lange die Tilgung deiner Kreditkarte dauert, die Zinsen insgesamt und die nötige Rate – im Vergleich zur Mindestzahlung.',
        'content' => <<<'HTML'
<h2>Warum die Mindestzahlung dich in den Schulden hält</h2>
<p>Bei Kreditkarten mit Teilzahlung besteht die Mindestzahlung meist aus den Monatszinsen plus einem kleinen Prozentsatz des Saldos. Sinkt der Saldo, sinkt auch die Mindestzahlung, und der größte Teil jeder Zahlung geht weiter an die Zinsen. Ein Saldo von einigen tausend Euro kann so viele Jahre laufen und mehr Zinsen kosten als die ursprünglichen Einkäufe. Eine feste Monatsrate, auch eine kleine, ändert das Ergebnis komplett.</p>
<h2>Zwei Wege zur Tilgung</h2>
<ul>
<li><strong>Einen festen Betrag zahlen</strong>: Gib ein, was du monatlich zahlen kannst, und sieh dein Datum ohne Schulden und die Zinsen insgesamt.</li>
<li><strong>Schuldenfrei sein in</strong> einer gewählten Zahl von Monaten: Du erhältst die nötige Monatsrate.</li>
</ul>
<p>Mehrere Karten und Kredite? Der „Schuldenabbau-Rechner“ vergleicht Lawinen- und Schneeballmethode für alle Schulden. Du überlegst, mit einem Ratenkredit umzuschulden? Prüfe die Rate mit dem „Kreditrechner“ und vergleiche Angebote mit dem „Kreditvergleichsrechner“.</p>
HTML,
        'steps' => [
            'Gib den <strong>Kartensaldo</strong> und den <strong>Jahreszins</strong> ein (beides steht auf deiner Abrechnung).',
            'Wähle <strong>Einen festen Betrag zahlen</strong> und gib deine Monatsrate ein, oder <strong>Schuldenfrei sein in</strong> und wähle eine Zahl von Monaten.',
            'Sieh dein Datum ohne Schulden, die Zinsen insgesamt und den Vergleich mit der Mindestzahlung.',
            'Kopiere den Link, um deinen Plan zu speichern oder zu teilen.',
        ],
        'faq' => [
            ['q' => 'Wie lange dauert es, meine Kreditkarte abzuzahlen?', 'a' => 'Das hängt von Saldo, Zinssatz und deiner Monatsrate ab. Gib sie oben ein, um die genaue Zahl der Monate zu sehen. Nur die Mindestzahlung zu leisten, kann selbst kleine Schulden über viele Jahre strecken.'],
            ['q' => 'Wie werden die Kreditkartenzinsen berechnet?', 'a' => 'Die Zinsen fallen monatlich an, ungefähr der Jahreszins geteilt durch 12, auf den Saldo. Jede Bank hat eigene Regeln, daher ist das Ergebnis eine gute Schätzung und keine exakte Kopie deiner Abrechnung.'],
            ['q' => 'Wie viel muss ich zahlen, um in 2 Jahren schuldenfrei zu sein?', 'a' => 'Wähle <strong>Schuldenfrei sein in</strong> und gib 24 Monate ein. Der Rechner zeigt die feste Monatsrate, die den Saldo in dieser Zeit tilgt.'],
            ['q' => 'Warum dauert die Mindestzahlung so lange?', 'a' => 'Die Mindestzahlung besteht meist aus den Zinsen plus etwa 1 % des Saldos. Sie sinkt also mit dem Saldo, und der Großteil jeder Zahlung geht an die Zinsen. Du kannst diese Regeln unter <strong>Bedingungen der Mindestzahlung</strong> ändern.'],
            ['q' => 'Sind neue Einkäufe berücksichtigt?', 'a' => 'Nein. Die Schätzung geht davon aus, dass du die Karte nicht mehr nutzt, der Zinssatz gleich bleibt und jede Zahlung pünktlich erfolgt.'],
        ],
    ],

    'loan-comparison-calculator' => [
        'slug' => 'kreditvergleichsrechner',
        'name' => 'Kreditvergleichsrechner',
        'short_description' => 'Vergleiche bis zu vier Kreditangebote nach Rate, Gebühren und Gesamtkosten.',
        'description' => 'Vergleiche Kreditangebote mit Zinssatz, Laufzeit und einmaligen Gebühren nebeneinander und finde das insgesamt günstigste, die niedrigste Rate und den effektiven Jahreszins.',
        'seo_title' => 'Kreditvergleichsrechner: Angebote vergleichen',
        'seo_description' => 'Vergleiche bis zu 4 Kreditangebote: Monatsrate, Zinsen, Gebühren, Gesamtkosten und effektiver Jahreszins – und finde den günstigsten Kredit.',
        'content' => <<<'HTML'
<h2>Der niedrigste Zins ist nicht immer der günstigste Kredit</h2>
<p>Banken werben mit dem Sollzins, doch einmalige Gebühren wie Bearbeitungs- oder Vermittlungsgebühren verändern die echten Kosten. Ein Kredit zu 6,9 % mit 800 € Gebühren kann teurer sein als einer zu 7,5 % ohne Gebühren. Dieser Rechner fasst Zinsen und Gebühren zu den Gesamtkosten des Kredits zusammen und zeigt den effektiven Jahreszins – den Zinssatz, den du inklusive Gebühren wirklich zahlst.</p>
<h2>Monatsrate oder Gesamtkosten</h2>
<p>Eine längere Laufzeit senkt die Monatsrate, erhöht aber fast immer die Zinsen insgesamt. Die Markierungen zeigen, welches Angebot die niedrigste Rate hat und welches insgesamt am günstigsten ist, damit du bewusst zwischen Spielraum im Budget und Kosten wählst.</p>
<p>Hast du dich entschieden, öffne den „Kreditrechner“, um den vollständigen Tilgungsplan und die Wirkung von Sondertilgungen zu sehen. Für Immobilie oder Auto berücksichtigen der „Hypothekenrechner“ und der „Autokreditrechner“ Steuern, Versicherung und Inzahlungnahme.</p>
HTML,
        'steps' => [
            'Gib jedes <strong>Kreditangebot</strong> ein: Betrag, Zinssatz, Laufzeit und einmalige <strong>Gebühren</strong>.',
            'Füge mit <strong>Weiteres Angebot hinzufügen</strong> bis zu vier Angebote hinzu.',
            'Vergleiche Monatsrate, Zinsen insgesamt, Gesamtkosten des Kredits und effektiven Jahreszins.',
            'Achte auf die Markierungen <strong>Am günstigsten</strong> und <strong>Niedrigste Rate</strong>, um dich zu entscheiden.',
        ],
        'faq' => [
            ['q' => 'Wie vergleiche ich zwei Kreditangebote?', 'a' => 'Vergleiche die Gesamtkosten des Kredits – Zinsen plus Gebühren –, nicht nur den Zinssatz oder die Monatsrate. Gib beide Angebote hier ein, das günstigste wird hervorgehoben.'],
            ['q' => 'Was ist der effektive Jahreszins?', 'a' => 'Er enthält neben den Zinsen auch die einmaligen Gebühren. Da Gebühren den tatsächlich ausgezahlten Betrag verringern, liegt der effektive Jahreszins bei Krediten mit Gebühren über dem Sollzins.'],
            ['q' => 'Ist eine niedrigere Monatsrate besser?', 'a' => 'Nicht unbedingt. Eine längere Laufzeit senkt die Rate, erhöht aber meist die Zinsen insgesamt. Wähle die niedrigste Rate nur, wenn dein Budget den Spielraum braucht.'],
            ['q' => 'Welche Gebühren soll ich eintragen?', 'a' => 'Trage ein, was du für den Kredit bezahlst, etwa Bearbeitungs-, Vermittlungs- oder Schätzgebühren. Optionale Versicherungen und Verzugsgebühren gehören nicht dazu.'],
            ['q' => 'Werden meine Daten gespeichert?', 'a' => 'Nein. Alles wird in deinem Browser berechnet, und nichts wird an unsere Server gesendet.'],
        ],
    ],

    'organize-pdf' => [
        'slug' => 'pdf-seiten-sortieren',
        'name' => 'PDF-Seiten sortieren',
        'short_description' => 'Seiten einer PDF per Drag & Drop neu ordnen, drehen und entfernen.',
        'description' => 'Sieh alle Seiten deiner PDF, zieh sie in eine neue Reihenfolge, dreh schief gescannte Seiten, entferne überflüssige und lade die sortierte Datei herunter.',
        'seo_title' => 'PDF-Seiten sortieren: Reihenfolge online ändern',
        'seo_description' => 'Ändere die Seitenreihenfolge einer PDF kostenlos: Seiten ziehen, drehen oder entfernen und herunterladen. Alles passiert in deinem Browser.',
        'content' => <<<'HTML'
<h2>Jede Seite an ihren Platz</h2>
<p>Gescannte Dokumente landen oft in falscher Reihenfolge, in Berichten muss ein Anhang ans Ende und zusammengefügte Dateien brauchen das Deckblatt vorne. Dieses Werkzeug zeigt eine Vorschau jeder Seite: Zieh die Seiten in die gewünschte Reihenfolge, dreh schief gescannte Seiten und entferne leere oder doppelte Seiten – alles in einem Schritt.</p>
<h2>Privat von Anfang an</h2>
<p>Deine PDF wird vollständig in deinem Browser geöffnet und neu erstellt. Nichts wird hochgeladen, daher eignet sich das Werkzeug auch für Verträge, Kontoauszüge und Arztbriefe.</p>
<p>Um zuerst mehrere Dateien zu kombinieren, nutze „PDF zusammenfügen“. Um einzelne Seiten in ein eigenes Dokument zu übernehmen, nutze „PDF teilen“. Wenn nur die Ausrichtung falsch ist, geht es mit „PDF drehen“ am schnellsten, und „Seitenzahlen in PDF einfügen“ nummeriert das fertige Dokument.</p>
HTML,
        'steps' => [
            'Zieh eine PDF in das Feld oder klicke, um sie auszuwählen. Eine Vorschau jeder Seite erscheint.',
            'Zieh die Seiten in die gewünschte Reihenfolge oder nutze die Pfeile unter jeder Seite.',
            'Klicke auf eine Seite, um sie zu drehen, oder auf den Papierkorb, um sie zu entfernen.',
            'Klicke auf <strong>Sortierte PDF herunterladen</strong>, um die neue Datei zu speichern.',
        ],
        'faq' => [
            ['q' => 'Wie ändere ich die Reihenfolge der Seiten in einer PDF?', 'a' => 'Öffne die PDF hier und zieh jede Seite an ihre neue Position. Auf dem Handy nutzt du die Pfeile unter jeder Seite. Danach lädst du die sortierte Datei herunter.'],
            ['q' => 'Kann ich gleichzeitig Seiten drehen und entfernen?', 'a' => 'Ja. Ein Klick auf eine Seite dreht sie um 90 Grad, und der Papierkorb markiert sie zum Entfernen – so korrigierst du alles in einem Durchgang.'],
            ['q' => 'Kann ich Änderungen rückgängig machen?', 'a' => 'Mit <strong>Ursprüngliche Reihenfolge</strong> stellst du die Anfangsreihenfolge wieder her. Deine Originaldatei wird nie verändert; das Werkzeug lädt eine neue Kopie herunter.'],
            ['q' => 'Wird meine PDF hochgeladen?', 'a' => 'Nein. Die Seiten werden in deinem Browser angezeigt und neu erstellt, das Dokument verlässt dein Gerät also nie.'],
            ['q' => 'Kann ich Seiten aus mehreren PDFs sortieren?', 'a' => 'Kombiniere die Dateien zuerst mit „PDF zusammenfügen“ und öffne dann die zusammengefügte Datei hier, um ihre Seiten zu ordnen.'],
        ],
    ],

    'add-page-numbers-to-pdf' => [
        'slug' => 'seitenzahlen-in-pdf-einfuegen',
        'name' => 'Seitenzahlen in PDF einfügen',
        'short_description' => 'Nummeriere die Seiten einer PDF an der gewünschten Position und im gewünschten Stil.',
        'description' => 'Füge einer PDF Seitenzahlen in einer Ecke oder mittig hinzu, als „1“, „1 / 10“ oder „Seite 1 von 10“, lass das Deckblatt aus und wähle die erste Zahl. Läuft in deinem Browser.',
        'seo_title' => 'Seitenzahlen in PDF einfügen – kostenlos & privat',
        'seo_description' => 'Füge einer PDF kostenlos Seitenzahlen hinzu: Position, Format und Startzahl wählen, Deckblatt auslassen. Deine Datei bleibt auf deinem Gerät.',
        'content' => <<<'HTML'
<h2>Wann Seitenzahlen wichtig sind</h2>
<p>Berichte, Abschlussarbeiten, Verträge, Handbücher und gedruckte Unterlagen lassen sich viel leichter prüfen und besprechen, wenn jede Seite nummeriert ist. Seitenzahlen schützen auch Ausdrucke: Eine fehlende oder vertauschte Seite fällt sofort auf. Viele PDFs aus Scannern, Handys oder Präsentationsprogrammen haben überhaupt keine Seitenzahlen.</p>
<h2>Wähle den Stil</h2>
<ul>
<li>Setz die Zahl in eine beliebige Ecke oder mittig, oben oder unten.</li>
<li>Nutze eine einfache Zahl, „1 / 10“, „Seite 1“ oder „Seite 1 von 10“.</li>
<li>Lass das Deckblatt aus, indem du auf Seite 2 beginnst, und wähle die erste Zahl, um eine Reihe fortzusetzen.</li>
</ul>
<p>Du bereitest das Dokument noch vor? „PDF zusammenfügen“ kombiniert Dateien, „PDF-Seiten sortieren“ korrigiert die Reihenfolge und „PDF-Seiten löschen“ entfernt Seiten, die du nicht brauchst.</p>
HTML,
        'steps' => [
            'Zieh eine PDF in das Feld oder klicke, um sie auszuwählen.',
            'Wähle <strong>Position</strong> und <strong>Format</strong> der Zahlen. Die Vorschau zeigt, wie es aussieht.',
            'Um das Deckblatt auszulassen, beginne die Nummerierung auf Seite 2. Ändere bei Bedarf die erste Zahl.',
            'Klicke auf <strong>Seitenzahlen einfügen</strong>, um die nummerierte PDF herunterzuladen.',
        ],
        'faq' => [
            ['q' => 'Wie füge ich einer PDF Seitenzahlen hinzu?', 'a' => 'Öffne die PDF hier, wähle Position und Format der Zahlen und klicke auf <strong>Seitenzahlen einfügen</strong>. Die nummerierte Kopie ist in Sekunden heruntergeladen.'],
            ['q' => 'Kann ich die erste Seite auslassen?', 'a' => 'Ja. Trag bei <strong>Nummerierung ab Seite</strong> eine 2 ein, dann bleibt das Deckblatt frei. Lass die erste Zahl auf 1, wenn die zweite Seite die Nummer 1 tragen soll.'],
            ['q' => 'Welche Formate gibt es?', 'a' => 'Eine einfache Zahl, „1 / 10“, „Seite 1“ und „Seite 1 von 10“, klein, mittel oder groß, in jeder Ecke oder mittig.'],
            ['q' => 'Was ist mit Quer- oder gedrehten Seiten?', 'a' => 'Die Zahlen werden so platziert, wie jede Seite angezeigt wird. Sie stehen daher auch auf Quer- und gedrehten Seiten richtig herum.'],
            ['q' => 'Wird meine PDF hochgeladen?', 'a' => 'Nein. Die Zahlen werden in deinem Browser eingefügt, und die Datei verlässt dein Gerät nie.'],
        ],
    ],
];
