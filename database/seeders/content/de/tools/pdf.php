<?php

/*
| German copy for the PDF tools (and Image to PDF). See content/de/tools.php.
*/

return [
    'merge-pdf' => [
        'slug' => 'pdf-zusammenfuegen',
        'name' => 'PDF zusammenfügen',
        'short_description' => 'Mehrere PDF-Dateien in beliebiger Reihenfolge zu einem Dokument kombinieren.',
        'description' => 'Füge deine PDF-Dateien hinzu, zieh sie in die gewünschte Reihenfolge und füge sie zu einer einzigen PDF zusammen. Die Dateien werden in deinem Browser kombiniert und nie hochgeladen.',
        'seo_title' => 'PDF zusammenfügen – online, kostenlos und privat',
        'seo_description' => 'PDFs kostenlos online zusammenfügen. Mehrere PDFs zu einer kombinieren, per Drag & Drop sortieren und sofort herunterladen. Ohne Upload und Anmeldung.',
        'content' => <<<'HTML'
<h2>Wann sich das Zusammenfügen von PDFs lohnt</h2>
<p>PDFs zu kombinieren ist praktisch, wenn du ein einziges Dokument verschicken musst: eine Bewerbung mit Lebenslauf und Anschreiben, eine Spesenabrechnung mit allen Belegen oder einen Vertrag mit seinen Anlagen. Eine Datei lässt sich leichter per E-Mail senden, in Portale mit nur einem Anhang hochladen und in der richtigen Reihenfolge drucken.</p>
<h2>PDFs zusammenfügen, ohne sie hochzuladen</h2>
<p>Die meisten Online-PDF-Dienste laden deine Dokumente auf ihre Server. Dieses Tool kombiniert die Dateien direkt in deinem Browser, sodass vertrauliche Dokumente wie Kontoauszüge, Arztberichte und Verträge deinen Computer oder dein Handy nie verlassen.</p>
<h2>Tipps</h2>
<ul>
<li>Nutze zuerst „PDF teilen“, wenn du nur einige Seiten einer Datei brauchst.</li>
<li>Du hast Fotos oder Scans statt PDFs? Wandle sie mit „JPG in PDF“ um und füge sie dann zusammen.</li>
<li>Du brauchst die Seiten als Bilder? Nutze „PDF in JPG“.</li>
</ul>
HTML,
        'steps' => [
            'Zieh zwei oder mehr PDF-Dateien in das Feld oder klicke, um sie auszuwählen.',
            'Zieh die Dateien (oder nutze die Pfeile) in die gewünschte Reihenfolge. Die Seitenzahl jeder Datei wird angezeigt.',
            'Klicke auf <strong>PDFs zusammenfügen</strong>.',
            'Deine kombinierte PDF wird sofort als <code>merged.pdf</code> heruntergeladen.',
        ],
        'faq' => [
            ['q' => 'Werden meine PDF-Dateien auf einen Server hochgeladen?', 'a' => 'Nein. Die PDFs werden vollständig in deinem Browser zusammengefügt, vertrauliche Dokumente verlassen dein Gerät also nie.'],
            ['q' => 'Gibt es ein Datei- oder Größenlimit?', 'a' => 'Du kannst bis zu 30 PDFs gleichzeitig zusammenfügen, jeweils bis zu 100 MB. Sehr große Dateien können je nach Gerät etwas länger dauern.'],
            ['q' => 'Bleiben Links, Lesezeichen und Formularfelder erhalten?', 'a' => 'Seiteninhalte, Bilder und Text bleiben genau gleich. Interaktive Extras wie Lesezeichen und manche Formularfelder werden möglicherweise nicht übernommen.'],
            ['q' => 'Kann ich passwortgeschützte PDFs zusammenfügen?', 'a' => 'Nein. Entferne zuerst das Passwort der PDF und füge sie dann zusammen.'],
            ['q' => 'Kann ich Seiten umsortieren oder entfernen?', 'a' => 'Hier sortierst du ganze Dateien. Um einzelne Seiten zu entfernen oder zu extrahieren, nutze „PDF teilen“ vor oder nach dem Zusammenfügen.'],
        ],
    ],

    'split-pdf' => [
        'slug' => 'pdf-teilen',
        'name' => 'PDF teilen',
        'short_description' => 'Seiten extrahieren oder eine PDF in mehrere kleinere Dateien aufteilen.',
        'description' => 'Extrahiere bestimmte Seiten in eine neue PDF, teile ein Dokument nach eigenen Bereichen auf oder speichere jede Seite als eigene PDF. Deine Datei wird im Browser verarbeitet.',
        'seo_title' => 'PDF teilen online: Seiten kostenlos extrahieren',
        'seo_description' => 'PDFs kostenlos online teilen. Seiten extrahieren, nach Bereichen aufteilen oder jede Seite einzeln speichern. Privat: Deine Dateien bleiben auf deinem Gerät.',
        'content' => <<<'HTML'
<h2>Warum eine PDF teilen?</h2>
<p>Eine große PDF enthält oft mehr, als du teilen möchtest. Durch das Aufteilen kannst du nur die relevanten Seiten eines Vertrags verschicken, eine einzelne Rechnung aus einem Monatsauszug herauslösen, zusammen gescannte Dokumente trennen oder eine riesige Datei in Teile zerlegen, die die Grenzen von E-Mail und Upload-Formularen einhalten.</p>
<h2>Beispiele für Seitenbereiche</h2>
<ul>
<li><code>1-3</code>: Seiten 1, 2 und 3.</li>
<li><code>1, 4, 7</code>: drei einzelne Seiten.</li>
<li><code>5-</code>: von Seite 5 bis zur letzten Seite.</li>
<li><code>1-2, 10-12</code>: zwei Seitengruppen.</li>
</ul>
<p>Um Seiten aus verschiedenen Dateien zu kombinieren, nutze „PDF zusammenfügen“. Um Seiten in Bilder umzuwandeln, nutze „PDF in JPG“.</p>
HTML,
        'steps' => [
            'Zieh eine PDF in das Feld oder klicke, um sie auszuwählen. Nach dem Laden wird die Seitenzahl angezeigt.',
            'Wähle einen Modus: <strong>Seiten extrahieren</strong> in eine neue PDF, <strong>Nach Bereichen teilen</strong> in mehrere PDFs oder <strong>Jede Seite</strong> als eigene PDF.',
            'Gib die Seiten oder Bereiche ein, zum Beispiel <code>1-3, 5, 8-</code> (<code>8-</code> bedeutet ab Seite 8 bis zum Ende).',
            'Klicke auf <strong>PDF teilen</strong>. Eine einzelne Datei wird direkt heruntergeladen, mehrere Dateien gemeinsam als ZIP.',
        ],
        'faq' => [
            ['q' => 'Wie extrahiere ich bestimmte Seiten aus einer PDF?', 'a' => 'Wähle „Seiten extrahieren“ und gib die Seitenzahlen ein, zum Beispiel <code>2, 4-6</code>. Du erhältst eine neue PDF nur mit diesen Seiten in dieser Reihenfolge.'],
            ['q' => 'Kann ich eine PDF in mehrere Dateien aufteilen?', 'a' => 'Ja. Nutze „Nach Bereichen teilen“: Jeder durch Komma getrennte Bereich wird zu einer eigenen PDF. Oder wähle „Jede Seite“, um jede Seite separat zu speichern.'],
            ['q' => 'Wird meine PDF ins Internet hochgeladen?', 'a' => 'Nein. Die PDF wird in deinem Browser geteilt und verlässt dein Gerät nie — sicher für Verträge, Rechnungen und andere private Dokumente.'],
            ['q' => 'Wird die Originaldatei verändert?', 'a' => 'Nein. Deine Original-PDF bleibt genau gleich; das Tool erstellt nur neue Dateien.'],
            ['q' => 'Funktioniert es mit passwortgeschützten PDFs?', 'a' => 'Nein. Entferne zuerst das Passwort der PDF.'],
        ],
    ],

    'pdf-to-jpg' => [
        'slug' => 'pdf-in-jpg',
        'name' => 'PDF in JPG',
        'short_description' => 'Jede Seite einer PDF in ein hochwertiges JPG-Bild umwandeln.',
        'description' => 'Wandle jede Seite einer PDF in ein JPG-Bild in der gewünschten Auflösung um. Lade die Seiten einzeln oder alle zusammen als ZIP herunter. Deine PDF wird im Browser verarbeitet.',
        'seo_title' => 'PDF in JPG umwandeln – kostenlos und in hoher Qualität',
        'seo_description' => 'PDF kostenlos in JPG umwandeln. Jede Seite wird ein hochauflösendes Bild (bis 300 DPI). Download als ZIP. Deine PDF bleibt auf deinem Gerät.',
        'content' => <<<'HTML'
<h2>Warum eine PDF in JPG umwandeln?</h2>
<p>Bilder lassen sich in Chats und sozialen Netzwerken leichter teilen als PDFs, in Präsentationen und Dokumente einfügen und auf jedem Gerät sofort anzeigen. Eine PDF-Seite in JPG umzuwandeln ist auch der einfachste Weg, eine Folie, einen Flyer oder ein Zertifikat in ein Bild zu verwandeln.</p>
<h2>Die richtige Auflösung wählen</h2>
<ul>
<li><strong>72 DPI</strong>: kleine Vorschauen und Miniaturen.</li>
<li><strong>150 DPI</strong>: Bildschirm, Dokumente und Präsentationen.</li>
<li><strong>300 DPI</strong>: Druck und Zoom auf kleine Schrift.</li>
</ul>
<p>Du brauchst nur einige Seiten? Extrahiere sie zuerst mit „PDF teilen“. Um aus Bildern wieder ein Dokument zu machen, nutze „JPG in PDF“.</p>
HTML,
        'steps' => [
            'Zieh eine PDF in das Feld oder klicke, um sie auszuwählen.',
            'Wähle die Auflösung: <strong>72 DPI</strong> für Bildschirme, <strong>150 DPI</strong> für die meisten Zwecke oder <strong>300 DPI</strong> für den Druck.',
            'Klicke auf <strong>In JPG umwandeln</strong>. Jede Seite wird als Bild erzeugt und als Vorschau angezeigt.',
            'Lade einzelne Seiten herunter oder klicke auf <strong>Alle herunterladen</strong>, um alle Seiten als ZIP zu erhalten.',
        ],
        'faq' => [
            ['q' => 'Welche DPI soll ich wählen?', 'a' => '150 DPI eignet sich gut zum Teilen und für Dokumente. Nutze 300 DPI für den Druck oder wenn du kleine Schrift vergrößern musst, und 72 DPI für Web-Vorschauen. Höhere DPI bedeuten größere Dateien.'],
            ['q' => 'Wird meine PDF auf einen Server hochgeladen?', 'a' => 'Nein. Die Seiten werden in deinem Browser mit PDF.js erzeugt, derselben Engine, die Firefox nutzt. Deine Datei verlässt dein Gerät nie.'],
            ['q' => 'Wie viele Seiten kann ich umwandeln?', 'a' => 'Bis zu 200 Seiten pro PDF bei Dateien bis 100 MB.'],
            ['q' => 'Kann ich eine PDF in PNG umwandeln?', 'a' => 'Dieses Tool erstellt JPG-Bilder, ideal für Dokumente und Fotos. Wenn du PNG brauchst, wandle die JPGs anschließend mit „JPG in PNG“ um.'],
            ['q' => 'Funktioniert es mit passwortgeschützten PDFs?', 'a' => 'Nein. Entferne zuerst das Passwort der PDF.'],
        ],
    ],

    'jpg-to-pdf' => [
        'slug' => 'jpg-in-pdf',
        'name' => 'JPG in PDF',
        'short_description' => 'JPG-Fotos und Scans in ein einziges PDF-Dokument umwandeln.',
        'description' => 'Kombiniere JPG-Bilder zu einer PDF, wähle Seitengröße, Ausrichtung und Ränder und sortiere die Seiten vor dem Download. Alles passiert in deinem Browser.',
        'seo_title' => 'JPG in PDF umwandeln: Bilder zu einer PDF',
        'seo_description' => 'JPG kostenlos in PDF umwandeln. Mehrere Fotos in einer PDF mit A4, US Letter oder Bildgröße kombinieren. Privat, schnell und ohne Anmeldung.',
        'content' => <<<'HTML'
<h2>Fotos und Scans in eine einzige PDF verwandeln</h2>
<p>PDF ist das Standardformat für Dokumente, die du an Schulen, Arbeitgeber, Banken und Behörden schickst. JPG-Fotos von Belegen, Ausweisen, Hausaufgaben oder unterschriebenen Seiten in eine einzige PDF zu packen, hält alles geordnet und macht die Datei leicht hochzuladen und zu drucken.</p>
<h2>Tipps für ein gutes Ergebnis</h2>
<ul>
<li>Fotografiere Dokumente bei gutem Licht, flach liegend und von oben.</li>
<li>Nutze „Bild zuschneiden“, um Hintergrund und Tischkanten vor dem Umwandeln zu entfernen.</li>
<li>Wähle A4 oder US Letter für Dokumente zum Drucken und „An Bild anpassen“ für Fotoalben.</li>
<li>Kombiniere das Ergebnis mit anderen Dokumenten über „PDF zusammenfügen“.</li>
</ul>
<p>Du hast auch PNG-Screenshots oder WebP-Bilder? Nutze „Bild in PDF“, das alle gängigen Bildformate akzeptiert.</p>
HTML,
        'steps' => [
            'Zieh deine JPG-Fotos oder gescannten Seiten in das Feld oder klicke, um sie auszuwählen. Füge so viele hinzu, wie du brauchst.',
            'Zieh die Bilder (oder nutze die Pfeile), um die Seitenreihenfolge festzulegen.',
            'Wähle die Seitengröße — <strong>A4</strong>, <strong>US Letter</strong> oder <strong>An Bild anpassen</strong> — sowie Ausrichtung und Ränder.',
            'Klicke auf <strong>In PDF umwandeln</strong>, um eine PDF mit jedem Bild auf einer eigenen Seite herunterzuladen.',
        ],
        'faq' => [
            ['q' => 'Wie kombiniere ich mehrere JPGs zu einer PDF?', 'a' => 'Füge alle JPG-Dateien hinzu, bring sie in die richtige Reihenfolge und klicke auf „In PDF umwandeln“. Jedes Bild wird zu einer Seite derselben PDF.'],
            ['q' => 'Werden meine Fotos richtig ausgerichtet?', 'a' => 'Ja. Die von Handys und Kameras gespeicherte Ausrichtung (EXIF) wird angewendet, sodass Hochformatfotos aufrecht stehen. Die automatische Ausrichtung stellt die Seite bei breiten Bildern außerdem ins Querformat.'],
            ['q' => 'Welche Seitengröße soll ich wählen?', 'a' => 'Nutze A4 in Deutschland, Österreich, der Schweiz und den meisten Ländern, und US Letter für die USA und Kanada. „An Bild anpassen“ erzeugt Seiten in der exakten Größe jedes Fotos, ohne weiße Ränder.'],
            ['q' => 'Werden meine Bilder ins Internet hochgeladen?', 'a' => 'Nein. Die PDF wird in deinem Browser erstellt. Deine Fotos und Dokumente verlassen dein Gerät nie.'],
            ['q' => 'Kann ich PNG- oder WebP-Bilder hinzufügen?', 'a' => 'Diese Seite ist für JPG-Dateien. Nutze „Bild in PDF“, um JPG-, PNG- und WebP-Bilder in einer PDF zu kombinieren.'],
        ],
    ],

    'rotate-pdf' => [
        'slug' => 'pdf-drehen',
        'name' => 'PDF drehen',
        'short_description' => 'Alle Seiten oder nur die schief liegenden Seiten drehen.',
        'description' => 'Korrigiere seitlich oder kopfüber liegende Seiten: Sieh dir jede Seite in der Vorschau an, drehe einzelne Seiten oder das ganze Dokument und lade die korrigierte PDF herunter. Deine Datei verlässt nie den Browser.',
        'seo_title' => 'PDF drehen online: eine Seite oder alle',
        'seo_description' => 'PDF-Seiten kostenlos online drehen. Jede Seite in der Vorschau sehen, eine oder alle um 90° oder 180° drehen und dauerhaft speichern. Privat: ohne Upload.',
        'content' => <<<'HTML'
<h2>Schiefe Scans in Sekunden korrigieren</h2>
<p>Scanner und Scan-Apps auf dem Handy speichern manche Seiten oft seitlich oder kopfüber, vor allem wenn ein Dokument Hoch- und Querformatseiten mischt. Durch das Drehen lässt sich die PDF am Bildschirm richtig lesen und in der korrekten Ausrichtung drucken.</p>
<h2>Nur drehen, was nötig ist</h2>
<p>Mit den Vorschauen drehst du einzelne Seiten statt der ganzen Datei. Jeder Klick dreht eine Seite um 90° im Uhrzeigersinn; die Pfeiltasten drehen nach links oder rechts, und die Drehung wird verlustfrei dauerhaft in der heruntergeladenen Datei gespeichert.</p>
<p>Du musst auch Seiten entfernen? Nutze „PDF-Seiten löschen“. Um mehrere Dokumente zu kombinieren, nutze „PDF zusammenfügen“, und um Seiten in Bilder umzuwandeln, „PDF in JPG“.</p>
HTML,
        'steps' => [
            'Zieh eine PDF in das Feld oder klicke, um sie auszuwählen. Für jede Seite erscheint eine Vorschau.',
            'Klicke auf eine Seite (oder ihre Pfeiltasten), um sie um 90° zu drehen. Mit <strong>Alle drehen</strong> drehst du alle Seiten auf einmal.',
            'Drehe nur die Seiten, die es brauchen, zum Beispiel seitlich oder kopfüber gescannte Seiten.',
            'Klicke auf <strong>Gedrehte PDF herunterladen</strong>, um die korrigierte Datei zu speichern.',
        ],
        'faq' => [
            ['q' => 'Kann ich nur eine Seite einer PDF drehen?', 'a' => 'Ja. Jede Seite hat eigene Drehtasten, du kannst also nur die schiefen Seiten drehen und den Rest unverändert lassen.'],
            ['q' => 'Ist die Drehung dauerhaft?', 'a' => 'Ja. Die neue Ausrichtung wird in der heruntergeladenen PDF gespeichert, sie öffnet sich also in jedem PDF-Reader, Browser und Drucker korrekt.'],
            ['q' => 'Verringert das Drehen die Qualität?', 'a' => 'Nein. Die Drehung ändert nur die Ausrichtung der Seite. Text, Bilder und Qualität bleiben genau gleich.'],
            ['q' => 'Wird meine PDF ins Internet hochgeladen?', 'a' => 'Nein. Die PDF wird in deinem Browser verarbeitet und verlässt dein Gerät nie.'],
            ['q' => 'Funktioniert es mit passwortgeschützten PDFs?', 'a' => 'Nein. Entferne zuerst das Passwort der PDF.'],
        ],
    ],

    'delete-pdf-pages' => [
        'slug' => 'pdf-seiten-loeschen',
        'name' => 'PDF-Seiten löschen',
        'short_description' => 'Unerwünschte Seiten visuell aus einer PDF entfernen.',
        'description' => 'Sieh dir jede Seite einer PDF in der Vorschau an, klicke auf die Seiten, die weg sollen, und lade eine saubere Kopie herunter. Ideal für leere Seiten aus Scans und vertrauliche Seiten, die du nicht teilen willst.',
        'seo_title' => 'PDF-Seiten kostenlos löschen',
        'seo_description' => 'Seiten aus einer PDF kostenlos online entfernen. Alle Seiten in der Vorschau sehen, zum Löschen anklicken und die neue PDF herunterladen. Im Browser.',
        'content' => <<<'HTML'
<h2>Warum Seiten aus einer PDF entfernen?</h2>
<p>Gescannte Dokumente enthalten oft leere Seiten, doppelte Seiten oder Deckblätter. Manchmal musst du ein Dokument auch ohne die Seiten mit persönlichen oder vertraulichen Daten teilen. Wenn du diese Seiten entfernst, wird die Datei kleiner, übersichtlicher und sicherer zum Versenden.</p>
<h2>Entfernen, behalten oder extrahieren</h2>
<p>Dieses Tool ist ideal, wenn du einige Seiten verwerfen und den Rest behalten möchtest. Wenn du nur wenige Seiten eines langen Dokuments brauchst, kannst du sie mit „PDF teilen“ über ihre Seitenzahlen extrahieren. Schiefe Seiten korrigierst du mit „PDF drehen“, und mehrere bereinigte Dateien lassen sich mit „PDF zusammenfügen“ kombinieren.</p>
HTML,
        'steps' => [
            'Zieh eine PDF in das Feld oder klicke, um sie auszuwählen. Für jede Seite erscheint eine Vorschau.',
            'Klicke auf die Seiten, die du entfernen möchtest. Sie werden rot markiert; ein weiterer Klick behält die Seite.',
            'Prüfe am Zähler, wie viele Seiten gelöscht werden.',
            'Klicke auf <strong>Bearbeitete PDF herunterladen</strong>, um eine Kopie ohne diese Seiten zu speichern.',
        ],
        'faq' => [
            ['q' => 'Wie lösche ich Seiten aus einer PDF?', 'a' => 'Öffne die PDF hier, klicke auf jede Seite, die du entfernen willst, und lade die bearbeitete Datei herunter. Die übrigen Seiten behalten ihre ursprüngliche Reihenfolge.'],
            ['q' => 'Wird die Originaldatei verändert?', 'a' => 'Nein. Deine Original-PDF bleibt unverändert; das Tool lädt eine neue Kopie ohne die gelöschten Seiten herunter.'],
            ['q' => 'Kann ich leere Seiten aus einem Scan entfernen?', 'a' => 'Ja. In den Vorschauen erkennst du leere oder doppelte Seiten leicht — klicke sie einfach an, um sie zu entfernen.'],
            ['q' => 'Wird meine PDF ins Internet hochgeladen?', 'a' => 'Nein. Alles passiert in deinem Browser, private Dokumente verlassen dein Gerät also nie.'],
            ['q' => 'Kann ich Seiten extrahieren statt sie zu löschen?', 'a' => 'Ja. Wenn du nur einige Seiten behalten willst, kannst du mit „PDF teilen“ die Seitenzahlen der zu extrahierenden Seiten eingeben.'],
        ],
    ],

    'image-to-pdf' => [
        'slug' => 'bild-in-pdf',
        'name' => 'Bild in PDF',
        'short_description' => 'JPG-, PNG- und WebP-Bilder in eine einzige PDF-Datei umwandeln.',
        'description' => 'Wandle Fotos, Screenshots und Scans in allen gängigen Formaten in eine einzige PDF um. Sortiere die Bilder, wähle Seitengröße und Ränder und lade sofort herunter.',
        'seo_title' => 'Bild in PDF umwandeln: JPG, PNG und WebP',
        'seo_description' => 'Bilder kostenlos in PDF umwandeln. JPG, PNG und WebP in einer PDF kombinieren, Seiten sortieren und A4, US Letter oder Bildgröße wählen. Ohne Upload.',
        'content' => <<<'HTML'
<h2>Beliebige Bilder in einer PDF kombinieren</h2>
<p>Mach aus Screenshots, gescannten Seiten, Fotos von Belegen und exportierten Diagrammen eine einzige PDF, die jeder öffnen, drucken oder an eine E-Mail anhängen kann. Du kannst JPG-, PNG- und WebP-Bilder im selben Dokument mischen und beliebig sortieren.</p>
<h2>Die richtige Seitengröße wählen</h2>
<ul>
<li><strong>A4</strong>: Standardformat für Dokumente im deutschsprachigen Raum und den meisten Ländern.</li>
<li><strong>US Letter</strong>: Standard in den USA und Kanada.</li>
<li><strong>An Bild anpassen</strong>: Jede Seite hat genau die Größe ihres Bildes, ohne weiße Ränder.</li>
</ul>
<p>Du hast nur JPG-Fotos? „JPG in PDF“ funktioniert genauso. Um das Ergebnis mit anderen PDFs zu kombinieren, nutze „PDF zusammenfügen“.</p>
HTML,
        'steps' => [
            'Zieh deine Bilder in das Feld oder klicke, um sie auszuwählen. Du kannst JPG, PNG und WebP in derselben PDF mischen.',
            'Sortiere die Bilder per Drag & Drop oder mit den Pfeiltasten.',
            'Wähle Seitengröße, Ausrichtung und Rand.',
            'Klicke auf <strong>In PDF umwandeln</strong> — deine PDF wird sofort heruntergeladen.',
        ],
        'faq' => [
            ['q' => 'Welche Bildformate kann ich in PDF umwandeln?', 'a' => 'JPG, JPEG, PNG und WebP. Du kannst verschiedene Formate in derselben PDF kombinieren.'],
            ['q' => 'Was passiert mit transparenten Hintergründen von PNGs?', 'a' => 'Transparente Bereiche werden auf eine weiße Seite gelegt, so wie sie auch gedruckt aussehen.'],
            ['q' => 'Kann ich Screenshots in eine PDF umwandeln?', 'a' => 'Ja. Screenshots sind meist PNG-Dateien: Füge alle hinzu, sortiere sie und wandle sie um. Nutze „An Bild anpassen“, um weiße Ränder zu vermeiden.'],
            ['q' => 'Bleiben meine Bilder privat?', 'a' => 'Ja. Alles passiert in deinem Browser, deine Bilder werden also nie hochgeladen.'],
        ],
    ],
];
