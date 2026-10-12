<?php

/*
| German copy for converters, generators, health calculators and everyday
| tools. See content/de/tools.php.
*/

return [
    'json-to-csv' => [
        'slug' => 'json-in-csv',
        'name' => 'JSON in CSV',
        'short_description' => 'JSON-Arrays für Excel und Google Tabellen in CSV umwandeln.',
        'description' => 'Wandle JSON sofort in CSV um. Verschachtelte Objekte werden zu Spalten, und du kannst Komma, Semikolon, Tabulator oder senkrechten Strich als Trennzeichen wählen.',
        'seo_title' => 'JSON in CSV umwandeln – kostenlos für Excel',
        'seo_description' => 'JSON kostenlos online in CSV umwandeln. Flacht verschachtelte Objekte ab, unterstützt Komma, Semikolon und Tabulator und liefert eine fertige CSV-Datei.',
        'content' => <<<'HTML'
<h2>JSON-Daten in Excel oder Google Tabellen öffnen</h2>
<p>APIs und Datenbanken exportieren JSON, Tabellenkalkulationen arbeiten aber mit Zeilen und Spalten. Wenn du JSON in CSV umwandelst, kannst du die Daten sortieren, filtern, in Diagramme packen und mit Menschen teilen, die nicht programmieren.</p>
<h2>So behandelt die Umwandlung deine Daten</h2>
<ul>
<li>Jedes Objekt im Array wird zu einer Zeile.</li>
<li>Jeder Schlüssel, der in einem Objekt vorkommt, wird zu einer Spalte.</li>
<li>Verschachtelte Objekte werden abgeflacht, zum Beispiel <code>address.city</code>.</li>
<li>Werte, die eine Tabellenkalkulation als Formel deuten könnte, werden zur Sicherheit maskiert.</li>
</ul>
<p>Dein JSON ist ungültig? Korrigiere es zuerst mit dem JSON-Formatierer. Du brauchst den umgekehrten Weg? Nutze „CSV in JSON“.</p>
HTML,
        'steps' => [
            'Füge ein JSON-Array von Objekten (oder ein einzelnes Objekt) in die Eingabe ein oder klicke auf <strong>Beispiel laden</strong>.',
            'Wähle das Trennzeichen: Komma für die meisten Tools, Semikolon für Excel in Ländern mit Dezimalkomma (wie Deutschland) oder Tabulator für TSV.',
            'Die CSV erscheint sofort. Verschachtelte Objekte werden zu Spalten wie <code>address.city</code>.',
            'Kopiere die CSV oder lade sie als <code>.csv</code>-Datei herunter — bereit für Excel, Google Tabellen oder Numbers.',
        ],
        'faq' => [
            ['q' => 'Welche JSON-Struktur funktioniert am besten?', 'a' => 'Ein Array von Objekten, etwa <code>[{&quot;name&quot;: &quot;Ada&quot;}, {&quot;name&quot;: &quot;Alan&quot;}]</code>. Jedes Objekt wird zu einer Zeile und jeder Schlüssel zu einer Spalte. Objekte mit unterschiedlichen Schlüsseln werden zusammengeführt; fehlende Werte bleiben leer.'],
            ['q' => 'Wie werden verschachtelte Objekte und Arrays behandelt?', 'a' => 'Verschachtelte Objekte werden in Punktnotation abgeflacht (<code>address.city</code>). Arrays werden als JSON-Text in die Zelle geschrieben, damit keine Daten verloren gehen.'],
            ['q' => 'Warum ein Semikolon als Trennzeichen?', 'a' => 'In Ländern, in denen das Komma als Dezimaltrennzeichen dient (wie Deutschland, Österreich und die Schweiz), erwartet Excel durch Semikolon getrennte Dateien. Wähle Semikolon, wenn beim Öffnen alle Spalten zusammenkleben.'],
            ['q' => 'Ist es sicher, die CSV in Excel zu öffnen?', 'a' => 'Ja. Werten, die mit <code>=</code>, <code>+</code>, <code>-</code> oder <code>@</code> beginnen, wird ein Apostroph vorangestellt, um Formel-Injection zu verhindern.'],
            ['q' => 'Werden meine Daten ins Internet hochgeladen?', 'a' => 'Nein. Die Umwandlung passiert vollständig in deinem Browser.'],
        ],
    ],

    'csv-to-json' => [
        'slug' => 'csv-in-json',
        'name' => 'CSV in JSON',
        'short_description' => 'CSV oder Tabellendaten in sauberes JSON umwandeln.',
        'description' => 'Füge CSV oder aus Excel kopierte Daten ein und erhalte ein JSON-Array von Objekten. Trennzeichen werden automatisch erkannt, Zahlen und Booleans werden in echte Typen umgewandelt.',
        'seo_title' => 'CSV in JSON umwandeln – online und kostenlos',
        'seo_description' => 'CSV kostenlos in JSON umwandeln. Erkennt Trennzeichen, verarbeitet Felder in Anführungszeichen, wandelt Zahlen und Booleans um und funktioniert mit Excel.',
        'content' => <<<'HTML'
<h2>Warum CSV in JSON umwandeln?</h2>
<p>JSON ist das Format, das Webanwendungen, APIs und JavaScript direkt verstehen. Einen Tabellenexport in JSON umzuwandeln erleichtert es, eine Datenbank zu befüllen, eine API-Antwort zu simulieren, Daten in ein CMS zu importieren oder Konfiguration in eine Anwendung zu laden.</p>
<h2>Saubere Daten, echte Typen</h2>
<p>Mit der Typerkennung werden Zahlen zu Zahlen und <code>true</code>/<code>false</code> zu Booleans, während Werte wie Postleitzahlen mit führender Null Text bleiben. Felder in Anführungszeichen mit Kommas und Zeilenumbrüchen werden korrekt erkannt.</p>
<p>Du willst das Ergebnis prüfen oder verschönern? Füge es in den JSON-Formatierer ein. Zurück zur Tabelle geht es mit „JSON in CSV“.</p>
HTML,
        'steps' => [
            'Füge deine CSV-Daten in die Eingabe ein oder klicke auf <strong>Beispiel laden</strong>. Du kannst direkt aus Excel oder Google Tabellen einfügen.',
            'Lass das Trennzeichen auf <strong>Automatisch</strong> oder wähle Komma, Semikolon, Tabulator oder senkrechten Strich.',
            'Lass <strong>Erste Zeile ist Kopfzeile</strong> aktiviert, um ein Array von Objekten zu erhalten, oder deaktiviere es für ein Array von Arrays.',
            'Mit <strong>Typen erkennen</strong> werden Zahlen und true/false zu echten JSON-Werten. Kopiere das Ergebnis oder lade es als <code>.json</code> herunter.',
        ],
        'faq' => [
            ['q' => 'Kann ich aus Excel oder Google Tabellen kopierte Daten einfügen?', 'a' => 'Ja. Tabellendaten werden als tabulatorgetrennter Text kopiert, und das automatische Trennzeichen erkennt das.'],
            ['q' => 'Wie werden Anführungszeichen und Zeilenumbrüche in Zellen behandelt?', 'a' => 'Der Parser folgt dem CSV-Standard (RFC 4180): Felder in doppelten Anführungszeichen dürfen Kommas, Zeilenumbrüche und maskierte Anführungszeichen (<code>&quot;&quot;</code>) enthalten.'],
            ['q' => 'Warum bleiben manche Zahlen Text?', 'a' => 'Werte mit führender Null, wie Postleitzahlen oder IDs wie <code>007</code>, bleiben Text, damit keine Information verloren geht. Sehr lange Zahlen bleiben ebenfalls Text, um Genauigkeitsfehler zu vermeiden.'],
            ['q' => 'Was ist mit doppelten oder leeren Spaltennamen?', 'a' => 'Doppelte Überschriften erhalten ein Suffix (<code>name_2</code>), leere heißen <code>column_N</code> — so bleiben alle Werte erhalten.'],
            ['q' => 'Bleiben meine Daten privat?', 'a' => 'Ja. Die Umwandlung passiert in deinem Browser, deine Daten werden nie hochgeladen.'],
        ],
    ],

    'unit-converter' => [
        'slug' => 'einheitenumrechner',
        'name' => 'Einheitenumrechner',
        'short_description' => 'Länge, Gewicht, Temperatur, Volumen, Fläche, Geschwindigkeit und mehr umrechnen.',
        'description' => 'Rechne sofort zwischen metrischen und imperialen Einheiten um: Kilometer in Meilen, Kilo in Pfund, Celsius in Fahrenheit, Cups in Milliliter, Quadratfuß in Quadratmeter, MB in GB und vieles mehr.',
        'seo_title' => 'Einheitenumrechner: Länge, Gewicht und mehr',
        'seo_description' => 'Kostenloser Einheitenumrechner: Länge, Gewicht, Temperatur, Volumen, Fläche, Geschwindigkeit, Zeit und Daten. Metrisch und imperial, präzise Ergebnisse.',
        'content' => <<<'HTML'
<h2>Metrisches und imperiales System</h2>
<p>Der größte Teil der Welt nutzt das metrische System (Meter, Kilogramm, Liter, °C), die USA verwenden überwiegend traditionelle Einheiten (Fuß, Pfund, Gallonen, °F), und Großbritannien mischt beides. Rezepte, Reisen, Online-Shopping, Baupläne und Hausaufgaben verlangen ständig Umrechnungen zwischen den Systemen.</p>
<h2>Nützliche Richtwerte</h2>
<ul>
<li>1 Zoll = 2,54 cm · 1 Fuß = 30,48 cm · 1 Meile = 1,609 km</li>
<li>1 kg = 2,2046 lb · 1 Unze = 28,35 g</li>
<li>1 Cup (US) = 236,6 ml · 1 Esslöffel = 3 Teelöffel</li>
<li>0 °C = 32 °F · 100 °C = 212 °F</li>
<li>1 Acre = 43.560 ft² · 1 Hektar = 2,471 Acres</li>
</ul>
<p>Du arbeitest mit Daten statt Maßen? Probiere den Datumsrechner. Für Geld erledigt der Prozentrechner Rabatte und Aufschläge.</p>
HTML,
        'steps' => [
            'Wähle eine Kategorie: Länge, Gewicht, Temperatur, Volumen, Fläche, Geschwindigkeit, Zeit oder Daten.',
            'Gib einen Wert ein und wähle <strong>Ausgangs-</strong> und <strong>Zieleinheit</strong>.',
            'Das Ergebnis aktualisiert sich sofort. Mit <strong>Tauschen</strong> drehst du die Umrechnung um.',
            'Sieh denselben Wert in allen anderen Einheiten der Kategorie in der Tabelle darunter.',
        ],
        'faq' => [
            ['q' => 'Wie viele Zentimeter hat ein Zoll?', 'a' => 'Genau 2,54 Zentimeter. Ein Fuß misst 30,48 cm und eine Meile 1,609344 Kilometer — das sind exakte internationale Definitionen.'],
            ['q' => 'Wie rechne ich Celsius in Fahrenheit um?', 'a' => 'Multipliziere mit 9/5 und addiere 32: °F = °C × 9/5 + 32. Zum Beispiel sind 20 °C gleich 68 °F. Für den Rückweg ziehst du 32 ab und multiplizierst mit 5/9.'],
            ['q' => 'Wie viele Pfund (lb) hat ein Kilo?', 'a' => 'Ein Kilogramm entspricht etwa 2,2046 Pfund (lb), und ein Pfund (lb) sind genau 0,45359237 Kilogramm.'],
            ['q' => 'Sind Cups und Gallonen US- oder britische Maße?', 'a' => 'Cups, Flüssigunzen, Pints, Quarts und Gallonen verwenden US-Maße. Britische (imperiale) Gallonen sind separat aufgeführt, weil sie etwa 20 % größer sind.'],
            ['q' => 'Was ist der Unterschied zwischen MB und MiB?', 'a' => 'Ein Megabyte (MB) sind 1.000.000 Bytes — die Einheit der Speicherhersteller. Ein Mebibyte (MiB) sind 1.048.576 Bytes (1024²) — die Einheit vieler Betriebssysteme. Deshalb zeigt eine 1-TB-Festplatte etwa 931 GiB an.'],
        ],
    ],

    'qr-generator' => [
        'slug' => 'qr-code-generator',
        'name' => 'QR-Code-Generator',
        'short_description' => 'QR-Codes für Links, Text, E-Mail, Telefon und WLAN erstellen.',
        'description' => 'Erstelle eigene QR-Codes mit deinen Farben, deiner Größe und deinem Rand und lade sie als PNG oder SVG herunter. Kostenlos, ohne Konto und ohne etwas an einen Server zu senden.',
        'seo_title' => 'QR-Code-Generator kostenlos als PNG und SVG',
        'seo_description' => 'Kostenlose QR-Codes für URL, Text, E-Mail, Telefon und WLAN erstellen. Farben, Größe und Rand frei wählbar. Download als PNG oder SVG, ohne Anmeldung.',
        'content' => <<<'HTML'
<h2>Was kannst du mit einem QR-Code machen?</h2>
<ul>
<li><strong>URL</strong>: auf eine Website, Speisekarte, ein Portfolio oder eine Bewertungsseite verlinken.</li>
<li><strong>WLAN</strong>: Gäste ohne Passworteingabe mit deinem Netzwerk verbinden.</li>
<li><strong>E-Mail und Telefon</strong>: mit einem Scan eine E-Mail oder einen Anruf starten.</li>
<li><strong>Text</strong>: eine kurze Notiz, einen Rabattcode oder eine Seriennummer teilen.</li>
</ul>
<h2>Tipps für QR-Codes, die immer funktionieren</h2>
<p>Achte auf guten Kontrast — einen dunklen Code auf hellem Hintergrund — und lass rundherum einen freien Rand. Drucke ihn mindestens 2 × 2 cm groß, und größer, wenn er aus der Ferne gescannt wird, etwa auf einem Plakat. Wähle eine höhere Fehlerkorrektur, wenn der Code zerkratzt oder teilweise verdeckt werden könnte.</p>
<p>Die hier erstellten Codes sind statisch und dauerhaft kostenlos: Sie laufen nicht ab und hängen nicht von unserer Website ab.</p>
HTML,
        'steps' => [
            'Wähle, was der QR-Code enthalten soll: eine <strong>URL</strong>, <strong>Text</strong>, eine <strong>E-Mail</strong>, eine <strong>Telefon</strong>nummer oder <strong>WLAN</strong>-Zugangsdaten.',
            'Fülle die Angaben aus. Die Vorschau aktualisiert sich beim Tippen.',
            'Passe Größe, Rand und Farben an. Bleib bei einer dunklen Farbe auf hellem Hintergrund, damit jedes Handy den Code scannen kann.',
            'Lade deinen QR-Code als <strong>PNG</strong> für Dokumente und soziale Netzwerke oder als <strong>SVG</strong> für Druck und Design-Tools herunter.',
        ],
        'faq' => [
            ['q' => 'Laufen diese QR-Codes ab?', 'a' => 'Nein. Die QR-Codes sind statisch: Der Inhalt ist direkt im Bild kodiert, sie funktionieren also für immer und hängen nicht von unserer Website ab.'],
            ['q' => 'Soll ich PNG oder SVG herunterladen?', 'a' => 'Nutze PNG für Websites, Dokumente und soziale Netzwerke. Nutze SVG für Druck, Plakate und Design-Tools — ein Vektorformat, das in jeder Größe gestochen scharf bleibt.'],
            ['q' => 'Wie funktioniert der WLAN-QR-Code?', 'a' => 'Beim Scannen mit der Handykamera bietet der WLAN-QR-Code an, sich automatisch mit dem Netzwerk zu verbinden, ohne das Passwort einzutippen. Er funktioniert mit aktuellen iPhones und Android-Geräten.'],
            ['q' => 'Was ist die Fehlerkorrekturstufe?', 'a' => 'Die Fehlerkorrektur sorgt dafür, dass ein QR-Code lesbar bleibt, auch wenn ein Teil beschädigt oder verdeckt ist. Höhere Stufen (Q, H) sind robuster, machen den Code aber dichter. M ist eine gute Standardwahl.'],
            ['q' => 'Werden meine Daten gespeichert?', 'a' => 'Nein. Die QR-Codes werden in deinem Browser erstellt. Deine URLs, Nachrichten und WLAN-Passwörter werden nie an unsere Server gesendet.'],
        ],
    ],

    'password-generator' => [
        'slug' => 'passwort-generator',
        'name' => 'Passwort-Generator',
        'short_description' => 'Sichere Zufallspasswörter mit gewünschter Länge und Zeichen erstellen.',
        'description' => 'Erzeuge sichere Zufallspasswörter mit wählbarer Länge, Groß- und Kleinbuchstaben, Ziffern und Sonderzeichen. Sieh die Stärke in Bit und erstelle bis zu 50 Passwörter auf einmal.',
        'seo_title' => 'Passwort-Generator: sichere Zufallspasswörter',
        'seo_description' => 'Sichere Zufallspasswörter erzeugen. Länge und Zeichen wählen, ähnliche Zeichen ausschließen und die Stärke prüfen. Erstellt in deinem Browser.',
        'content' => <<<'HTML'
<h2>Was macht ein Passwort sicher?</h2>
<p>Die Stärke hängt vor allem von der <strong>Länge</strong> und dem <strong>Zufall</strong> ab. Ein zufälliges Passwort mit 16 Zeichen aus Buchstaben, Ziffern und Sonderzeichen hat über 100 Bit Entropie — weit mehr, als ein Angreifer erraten kann. Von Menschen ausgedachte Passwörter wie Namen, Daten oder Wörter mit einer Zahl am Ende sind vorhersehbar, egal wie clever sie wirken.</p>
<h2>Bewährte Vorgehensweisen</h2>
<ul>
<li>Verwende für jedes Konto ein anderes Passwort.</li>
<li>Speichere Passwörter in einem Passwort-Manager, statt sie wiederzuverwenden.</li>
<li>Aktiviere die Zwei-Faktor-Authentifizierung (2FA) für E-Mail, Bank und soziale Netzwerke.</li>
<li>Ändere dein Passwort sofort, wenn ein Dienst ein Datenleck meldet.</li>
</ul>
<p>Du brauchst eindeutige IDs statt Geheimnisse? Probiere den UUID-Generator.</p>
HTML,
        'steps' => [
            'Wähle die <strong>Länge</strong> des Passworts. Für wichtige Konten werden 16 Zeichen oder mehr empfohlen.',
            'Wähle die Zeichen: Kleinbuchstaben, Großbuchstaben, Ziffern und Sonderzeichen.',
            'Wenn du das Passwort von Hand tippen musst, kannst du ähnliche Zeichen wie <code>l</code>, <code>1</code>, <code>O</code> und <code>0</code> ausschließen.',
            'Kopiere dein Passwort mit einem Klick. Klicke auf <strong>Generieren</strong> für ein neues oder erstelle bis zu 50 auf einmal.',
        ],
        'faq' => [
            ['q' => 'Sind diese Passwörter sicher?', 'a' => 'Ja. Sie werden in deinem Browser mit der Web Crypto API erzeugt, einem kryptografisch sicheren Zufallszahlengenerator, und nie gesendet oder auf einem Server gespeichert.'],
            ['q' => 'Wie lang sollte ein Passwort sein?', 'a' => 'Mindestens 12 Zeichen, und 16 oder mehr für E-Mail, Bank und das Master-Passwort deines Passwort-Managers. Länge bringt mehr Sicherheit als Komplexität.'],
            ['q' => 'Was bedeutet die Stärke in Bit?', 'a' => 'Die Entropie misst, wie viele Versuche ein Angreifer bräuchte. Jedes zusätzliche Bit verdoppelt den Aufwand. Über 60 Bit reicht für die meisten Konten, über 80 Bit ist auch gegen Offline-Angriffe stark.'],
            ['q' => 'Kann ich ein sicheres Passwort wiederverwenden?', 'a' => 'Nein. Nutze für jedes Konto ein eigenes Passwort und speichere sie in einem Passwort-Manager. Wird eine Website gehackt, bleiben deine anderen Konten sicher.'],
            ['q' => 'Ist jeder Zeichentyp garantiert enthalten?', 'a' => 'Ja. Jedes Passwort enthält mindestens ein Zeichen jedes ausgewählten Typs.'],
        ],
    ],

    'uuid-generator' => [
        'slug' => 'uuid-generator',
        'name' => 'UUID-Generator',
        'short_description' => 'Zufällige UUID v4 und zeitlich sortierte UUID v7 in großen Mengen erzeugen.',
        'description' => 'Erzeuge bis zu 1000 UUIDs (GUIDs) auf einmal in Version 4 oder 7, in Großbuchstaben, ohne Bindestriche oder in geschweiften Klammern, und validiere vorhandene UUIDs.',
        'seo_title' => 'UUID-Generator für v4 und v7 (GUID) in Mengen',
        'seo_description' => 'UUIDs kostenlos erzeugen. UUID v4 und v7 in Mengen, in Großbuchstaben, ohne Bindestriche oder mit GUID-Klammern. Kryptografisch sicher, im Browser.',
        'content' => <<<'HTML'
<h2>Wann UUIDs sinnvoll sind</h2>
<p>UUIDs sind ideal, wenn IDs an vielen Stellen ohne zentralen Zähler erzeugt werden müssen: verteilte Datenbanken, offlinefähige Apps, Message Queues, Dateinamen und öffentliche IDs, die nicht verraten sollen, wie viele Datensätze es gibt.</p>
<h2>UUID-Versionen im Überblick</h2>
<ul>
<li><strong>v4</strong>: 122 zufällige Bits; die am besten unterstützte Version.</li>
<li><strong>v7</strong>: beginnt mit einem Unix-Timestamp, die IDs sind also nach Erstellungszeit sortiert und halten Datenbankindizes effizient.</li>
<li><strong>v1</strong>: basiert auf Zeit und Rechner; weitgehend durch v7 ersetzt.</li>
</ul>
<p>Du brauchst zufällige Geheimnisse statt IDs? Nutze den Passwort-Generator.</p>
HTML,
        'steps' => [
            'Wähle, wie viele UUIDs du brauchst (bis zu 1000 auf einmal).',
            'Wähle die Version: <strong>v4</strong> (zufällig, am gebräuchlichsten) oder <strong>v7</strong> (zeitlich sortiert, ideal für Datenbankschlüssel).',
            'Wechsle bei Bedarf zu Großbuchstaben, entferne die Bindestriche oder setze jede UUID in geschweifte Klammern.',
            'Kopiere die Liste oder lade sie als Textdatei herunter. Klicke auf <strong>Generieren</strong> für einen neuen Satz.',
        ],
        'faq' => [
            ['q' => 'Was ist eine UUID?', 'a' => 'Eine UUID (Universally Unique Identifier), auch GUID genannt, ist eine 128-Bit-Kennung aus 32 Hexadezimalziffern, zum Beispiel <code>123e4567-e89b-42d3-a456-426614174000</code>. Sie lässt sich überall ohne Abstimmung erzeugen und ist in der Praxis eindeutig.'],
            ['q' => 'Soll ich UUID v4 oder v7 verwenden?', 'a' => 'v4 ist vollständig zufällig und funktioniert überall. v7 beginnt mit einem Timestamp, neue IDs sind also nach Erstellungszeit sortiert, was Datenbankindizes schneller und kompakter macht. Nutze v7 für Primärschlüssel, wenn dein Stack es unterstützt.'],
            ['q' => 'Sind diese UUIDs sicher und eindeutig?', 'a' => 'Sie werden mit dem kryptografisch sicheren Zufallszahlengenerator deines Browsers (Web Crypto API) erzeugt. Die Wahrscheinlichkeit einer Kollision bei v4 ist verschwindend gering.'],
            ['q' => 'Ist eine GUID dasselbe wie eine UUID?', 'a' => 'Ja. GUID ist Microsofts Name für dasselbe 128-Bit-Format. Nutze die Optionen Großbuchstaben und Klammern für den klassischen GUID-Stil <code>{XXXXXXXX-...}</code>.'],
        ],
    ],

    'random-number-generator' => [
        'slug' => 'zufallszahlengenerator',
        'name' => 'Zufallszahlengenerator',
        'short_description' => 'Zufallszahlen in jedem Bereich erzeugen, mit oder ohne Wiederholung.',
        'description' => 'Erzeuge eine oder Tausende echte Zufallszahlen in einem beliebigen Bereich, ohne Wiederholungen und mit Sortieroptionen. Mit Schnellwahl für Würfel und Lottozahlen.',
        'seo_title' => 'Zufallszahlengenerator ohne Wiederholung',
        'seo_description' => 'Kostenloser Zufallszahlengenerator. Zahlen in jedem Bereich ziehen, mit oder ohne Wiederholung, sortiert oder nicht. Kryptografisch sicher und sofort.',
        'content' => <<<'HTML'
<h2>Beliebte Anwendungen</h2>
<ul>
<li><strong>Gewinnspiele und Verlosungen:</strong> Gewinnerlose ohne Wiederholung ziehen.</li>
<li><strong>Spiele:</strong> würfeln oder eine Zahl von 1 bis 10 wählen.</li>
<li><strong>Lottozahlen:</strong> sechs verschiedene Zahlen von 1 bis 49 ziehen.</li>
<li><strong>Unterricht und Forschung:</strong> Zufallsstichproben ziehen oder Gruppen zuteilen.</li>
</ul>
<h2>Echt zufällig und fair</h2>
<p>Viele einfache Generatoren nutzen vorhersagbare Pseudozufallsfunktionen. Dieser verwendet den kryptografisch sicheren Generator deines Browsers und vermeidet die subtile Verzerrung naiver Methoden, sodass jede Zahl im Bereich gleich wahrscheinlich ist. Um Namen statt Zahlen zu ziehen, nutze den Zufallsgenerator für Namen. Für sichere Zufallspasswörter nutze den Passwort-Generator.</p>
HTML,
        'steps' => [
            'Lege den <strong>Mindest-</strong> und den <strong>Höchstwert</strong> fest (beide inklusive) oder wähle eine Schnellwahl wie Würfel oder Lotto.',
            'Wähle, wie viele Zahlen du brauchst — bis zu 10.000 auf einmal.',
            'Aktiviere <strong>Keine Wiederholungen</strong> für Verlosungen und Gewinnspiele und sortiere die Ergebnisse bei Bedarf.',
            'Klicke auf <strong>Generieren</strong> und kopiere die Zahlen.',
        ],
        'faq' => [
            ['q' => 'Sind diese Zahlen wirklich zufällig?', 'a' => 'Sie werden mit dem kryptografisch sicheren Zufallszahlengenerator deines Browsers (Web Crypto API) erzeugt, mit verzerrungsfreier Auswahl, sodass jede Zahl im Bereich gleich wahrscheinlich ist.'],
            ['q' => 'Kann ich ihn für eine Verlosung oder ein Gewinnspiel nutzen?', 'a' => 'Ja. Nummeriere die Teilnahmen, setze den Bereich von 1 bis zur Anzahl der Teilnahmen, aktiviere „Keine Wiederholungen“ und erzeuge so viele Gewinner, wie du brauchst. Für Namen nutze den Zufallsgenerator für Namen.'],
            ['q' => 'Sind Minimum und Maximum eingeschlossen?', 'a' => 'Ja. Ein Bereich von 1 bis 6 kann 1, 2, 3, 4, 5 oder 6 ergeben — genau wie ein Würfel.'],
            ['q' => 'Kann ich negative Zahlen erzeugen?', 'a' => 'Ja. Nutze ein negatives Minimum, zum Beispiel −50 bis 50.'],
        ],
    ],

    'bmi-calculator' => [
        'slug' => 'bmi-rechner',
        'name' => 'BMI-Rechner',
        'short_description' => 'Body-Mass-Index und Normalgewichtsbereich berechnen.',
        'description' => 'Berechne deinen BMI in metrischen oder US-Einheiten, sieh deine Kategorie und den Normalgewichtsbereich für deine Größe — nach den Richtlinien für Erwachsene von WHO und CDC.',
        'seo_title' => 'BMI-Rechner für Erwachsene',
        'seo_description' => 'Kostenloser BMI-Rechner für Erwachsene, in Kilogramm oder Pfund. Finde deinen Body-Mass-Index, deine Kategorie und dein Normalgewicht für deine Größe heraus.',
        'content' => <<<'HTML'
<h2>Was dein BMI bedeutet</h2>
<p>Der Body-Mass-Index setzt dein Gewicht ins Verhältnis zu deiner Größe und ergibt eine einzige Zahl, mit der Gesundheitsorganisationen das Gewicht einordnen. Bei den meisten Erwachsenen ist ein BMI zwischen 18,5 und 24,9 mit den geringsten Gesundheitsrisiken verbunden, höhere Werte gehen mit einem erhöhten Risiko für Krankheiten wie Typ-2-Diabetes und Herz-Kreislauf-Erkrankungen einher.</p>
<h2>Grenzen des BMI</h2>
<ul>
<li>Er unterscheidet nicht zwischen Muskeln und Fett — muskulöse Menschen können als übergewichtig erscheinen.</li>
<li>Er zeigt nicht, wo sich Fett ansammelt; der Taillenumfang ist ein weiterer nützlicher Wert.</li>
<li>Gesunde Bereiche können je nach Alter, Geschlecht und Herkunft variieren.</li>
</ul>
<p>Um dein Ziel in einen Tagesplan zu übersetzen, schätze deinen Energiebedarf mit dem Kalorienrechner.</p>
HTML,
        'steps' => [
            'Wähle <strong>Metrisch</strong> (Kilogramm und Zentimeter) oder <strong>US-Einheiten</strong> (Pfund, Fuß und Zoll).',
            'Gib dein Gewicht und deine Größe ein. Das Ergebnis aktualisiert sich beim Tippen.',
            'Sieh deinen BMI, seine Kategorie und seine Position auf der Skala.',
            'Prüfe den Normalgewichtsbereich für deine Größe.',
        ],
        'faq' => [
            ['q' => 'Wie wird der BMI berechnet?', 'a' => 'Der Body-Mass-Index ist dein Gewicht in Kilogramm geteilt durch deine Größe in Metern zum Quadrat (kg/m²). In US-Einheiten entspricht das 703 × Pfund ÷ Zoll².'],
            ['q' => 'Welche BMI-Kategorien gibt es für Erwachsene?', 'a' => 'Unter 18,5 ist Untergewicht, 18,5–24,9 Normalgewicht, 25–29,9 Übergewicht und ab 30 Adipositas — nach Weltgesundheitsorganisation und CDC.'],
            ['q' => 'Ist der BMI genau?', 'a' => 'Der BMI ist ein schnelles Screening-Instrument, keine Diagnose. Er unterscheidet nicht zwischen Muskeln und Fett — Sportler können hohe Werte haben — und berücksichtigt weder Alter, Geschlecht, Herkunft noch Fettverteilung. Sprich mit medizinischem Fachpersonal über deine Gesundheit.'],
            ['q' => 'Können Kinder diesen BMI-Rechner nutzen?', 'a' => 'Nein. Bei Kindern und Jugendlichen wird der BMI mit alters- und geschlechtsspezifischen Perzentilen verglichen. Dieser Rechner ist für Erwachsene ab 20 Jahren.'],
            ['q' => 'Werden meine Daten gespeichert?', 'a' => 'Nein. Die Berechnung läuft in deinem Browser, und nichts wird an unsere Server gesendet.'],
        ],
    ],

    'calorie-calculator' => [
        'slug' => 'kalorienrechner',
        'name' => 'Kalorienrechner',
        'short_description' => 'Tägliche Kalorien zum Abnehmen, Halten oder Zunehmen schätzen.',
        'description' => 'Berechne deinen Grundumsatz und deinen täglichen Gesamtumsatz mit der Mifflin-St-Jeor-Gleichung sowie die Tageskalorien zum Abnehmen, Halten oder Zunehmen.',
        'seo_title' => 'Kalorienrechner: Kalorienbedarf und Gesamtumsatz',
        'seo_description' => 'Kostenloser Kalorienrechner. Finde Grundumsatz und täglichen Gesamtumsatz nach Mifflin-St Jeor heraus und die Kalorien zum Abnehmen, Halten oder Zunehmen.',
        'content' => <<<'HTML'
<h2>Wie viele Kalorien brauchst du?</h2>
<p>Dein täglicher Kalorienbedarf hängt von Körpergröße, Alter, Geschlecht und Aktivitätslevel ab. Der Rechner schätzt zuerst deinen Grundumsatz — die Energie, die dein Körper in Ruhe braucht — und multipliziert ihn dann mit einem Aktivitätsfaktor, um deinen täglichen Gesamtumsatz zu schätzen. Isst du ungefähr so viel, bleibt dein Gewicht stabil.</p>
<h2>So nutzt du die Zahlen</h2>
<ul>
<li>Wähle dein Aktivitätslevel ehrlich — die meisten Menschen überschätzen es.</li>
<li>Strebe allmähliche Veränderungen an: 0,25–0,5 kg pro Woche.</li>
<li>Setz auf Eiweiß, Gemüse und wenig verarbeitete Lebensmittel, um mit weniger Kalorien satt zu werden.</li>
<li>Rechne neu, sobald sich dein Gewicht um 2–5 kg verändert.</li>
</ul>
<p>Sieh mit dem BMI-Rechner, wo du heute stehst.</p>
HTML,
        'steps' => [
            'Wähle dein Geschlecht und gib dein Alter ein.',
            'Gib Gewicht und Größe in metrischen oder US-Einheiten ein.',
            'Wähle das Aktivitätslevel, das eine typische Woche am besten beschreibt.',
            'Sieh, wie viele Kalorien du pro Tag verbrauchst (Gesamtumsatz), und deine Tagesziele zum Abnehmen, Halten oder Zunehmen.',
        ],
        'faq' => [
            ['q' => 'Wie werden die Tageskalorien berechnet?', 'a' => 'Der Rechner schätzt deinen Grundumsatz mit der Mifflin-St-Jeor-Gleichung — sie gilt für die meisten Erwachsenen als eine der genauesten — und multipliziert ihn mit einem Aktivitätsfaktor, um deinen täglichen Gesamtumsatz zu erhalten.'],
            ['q' => 'Was ist der Unterschied zwischen Grundumsatz und Gesamtumsatz?', 'a' => 'Der Grundumsatz ist die Energie, die dein Körper in völliger Ruhe verbraucht. Der Gesamtumsatz addiert alles andere: Alltagsbewegung, Sport und Verdauung. Der Gesamtumsatz ist das, was du essen solltest, um dein Gewicht zu halten.'],
            ['q' => 'Wie viele Kalorien sollte ich zum Abnehmen essen?', 'a' => 'Ein Defizit von etwa 500 Kalorien pro Tag führt zu rund 0,5 kg Gewichtsverlust pro Woche. Die meisten Erwachsenen sollten ohne ärztliche Begleitung nicht unter etwa 1200 (Frauen) bzw. 1500 (Männer) Kalorien pro Tag gehen.'],
            ['q' => 'Warum weicht mein Ergebnis von meiner Fitnessuhr ab?', 'a' => 'Alle Kalorienwerte sind Schätzungen. Uhren und Formeln beruhen auf unterschiedlichen Annahmen. Nutze das Ergebnis als Ausgangspunkt und passe es an, je nachdem, wie sich dein Gewicht in 2–3 Wochen entwickelt.'],
            ['q' => 'Ist das eine medizinische Beratung?', 'a' => 'Nein. Bei Schwangerschaft, Erkrankungen oder sportlichen Zielen wende dich an eine Ärztin, einen Arzt oder eine Ernährungsfachkraft.'],
        ],
    ],

    'due-date-calculator' => [
        'slug' => 'geburtsterminrechner',
        'name' => 'Geburtsterminrechner',
        'short_description' => 'Geburtstermin, Schwangerschaftswoche und Trimester berechnen.',
        'description' => 'Gib den ersten Tag deiner letzten Periode und deine Zykluslänge ein, um Geburtstermin, Empfängnisdatum, Schwangerschaftswoche und wichtige Meilensteine zu schätzen.',
        'seo_title' => 'Geburtsterminrechner und Schwangerschaftswoche',
        'seo_description' => 'Kostenloser Geburtsterminrechner. Errechne Geburtstermin, Empfängnis, Schwangerschaftswoche und Trimester aus dem ersten Tag deiner letzten Periode.',
        'content' => <<<'HTML'
<h2>So wird die Schwangerschaftsdauer berechnet</h2>
<p>Eine Schwangerschaft dauert im Schnitt etwa 40 Wochen (280 Tage), gerechnet ab dem ersten Tag der letzten Periode, nicht ab der Empfängnis. Ist dein Zyklus länger oder kürzer als 28 Tage, findet der Eisprung meist später oder früher statt — der Rechner verschiebt den Geburtstermin entsprechend.</p>
<h2>Wichtige Meilensteine</h2>
<ul>
<li><strong>Woche 1–12:</strong> erstes Trimester; hier finden meist die erste Vorsorgeuntersuchung und der erste Ultraschall statt.</li>
<li><strong>Woche 18–22:</strong> das ausführliche Organscreening.</li>
<li><strong>Woche 27–40:</strong> drittes Trimester mit häufigeren Vorsorgeterminen.</li>
<li><strong>Woche 39–40:</strong> Die Schwangerschaft gilt als termingerecht.</li>
</ul>
<p>Du willst den Countdown verfolgen? Der Datumsrechner zeigt die genaue Anzahl der Tage zwischen heute und deinem Geburtstermin.</p>
HTML,
        'steps' => [
            'Gib den <strong>ersten Tag deiner letzten Periode</strong> ein.',
            'Passe die <strong>durchschnittliche Zykluslänge</strong> an, falls sie nicht 28 Tage beträgt.',
            'Sieh deinen errechneten Geburtstermin, deine Schwangerschaftswoche und das aktuelle Trimester.',
            'Prüfe die wichtigsten Meilensteine der Schwangerschaft.',
        ],
        'faq' => [
            ['q' => 'Wie wird der Geburtstermin berechnet?', 'a' => 'Der Rechner nutzt die Naegele-Regel: 280 Tage (40 Wochen) nach dem ersten Tag der letzten Periode, angepasst für Zyklen, die länger oder kürzer als 28 Tage sind.'],
            ['q' => 'Wie genau ist der Geburtstermin?', 'a' => 'Es ist eine Schätzung. Nur etwa 4 % der Babys kommen genau am Termin zur Welt; die meisten zwischen der 37. und 42. Woche. Ein früher Ultraschall liefert das genaueste Datum, und deine Ärztin, dein Arzt oder deine Hebamme kann es anpassen.'],
            ['q' => 'Warum werden die Wochen ab der letzten Periode gezählt?', 'a' => 'Die Schwangerschaft wird ab dem ersten Tag der letzten Periode gezählt, weil Eisprung und Empfängnis selten genau bekannt sind. Deshalb gilt man bei der Empfängnis bereits als etwa 2 Wochen schwanger.'],
            ['q' => 'Wie sind die Trimester eingeteilt?', 'a' => 'Das erste Trimester reicht bis zum Ende der 12. Woche, das zweite von der 13. bis zur 26. Woche und das dritte von der 27. Woche bis zur Geburt.'],
            ['q' => 'Ist das eine medizinische Beratung?', 'a' => 'Nein. Dieses Tool dient nur zur Information. Folge immer den Empfehlungen deiner Ärztin, deines Arztes oder deiner Hebamme.'],
        ],
    ],

    'online-timer' => [
        'slug' => 'online-timer',
        'name' => 'Online-Timer und Stoppuhr',
        'short_description' => 'Countdown-Timer, Stoppuhr mit Runden und Pomodoro-Timer.',
        'description' => 'Ein kostenloser Online-Timer mit Alarm, eine Stoppuhr mit Rundenzeiten und ein Pomodoro-Timer für konzentriertes Arbeiten. Präzise auch in Hintergrund-Tabs, mit der Zeit im Tab-Titel.',
        'seo_title' => 'Online-Timer und Stoppuhr mit Alarm',
        'seo_description' => 'Kostenloser Online-Timer mit Alarm, Stoppuhr mit Runden und Pomodoro-Timer. Präzise auch in Hintergrund-Tabs. Ohne App und ohne Anmeldung.',
        'content' => <<<'HTML'
<h2>Drei Tools in einem</h2>
<p>Nutze den <strong>Timer</strong> zum Kochen, für Training, Präsentationen, Prüfungen und Nickerchen; die <strong>Stoppuhr</strong> mit Runden fürs Laufen, Schwimmen oder um Aufgaben zu messen; und den <strong>Pomodoro-Timer</strong>, um in 25-Minuten-Blöcken mit regelmäßigen Pausen zu lernen oder zu arbeiten. Die Zeit erscheint im Browser-Tab, du kannst also in einem anderen Tab weiterarbeiten und siehst trotzdem, wie viel Zeit noch bleibt.</p>
<h2>Tipps für konzentriertes Arbeiten</h2>
<ul>
<li>Nimm dir pro Pomodoro nur eine Aufgabe vor und schalte Benachrichtigungen stumm.</li>
<li>Nutze die Pausen, um aufzustehen, dich zu dehnen und die Augen zu entspannen.</li>
<li>Notiere, wie viele Runden jede Aufgabe braucht, um das nächste Mal besser zu planen.</li>
</ul>
<p>Du musst Tage statt Minuten zählen? Nutze den Datumsrechner.</p>
HTML,
        'steps' => [
            'Wähle <strong>Timer</strong> für einen Countdown, <strong>Stoppuhr</strong> zum Messen mit Runden oder <strong>Pomodoro</strong> für Fokus-Sitzungen.',
            'Wähle beim Timer eine Schnellwahl (1 bis 60 Minuten) oder gib Stunden, Minuten und Sekunden ein.',
            'Drücke <strong>Start</strong>. Die Restzeit erscheint auch im Tab-Titel, du kannst also den Tab wechseln.',
            'Ist die Zeit um, ertönt ein Alarm. Schalte den Ton aus, wenn du einen stillen Timer bevorzugst.',
        ],
        'faq' => [
            ['q' => 'Läuft der Timer weiter, wenn ich den Tab wechsle?', 'a' => 'Ja. Der Timer orientiert sich an der Uhrzeit statt an gezählten Takten, bleibt also auch in Hintergrund-Tabs präzise, und die Restzeit steht im Tab-Titel.'],
            ['q' => 'Warum habe ich den Alarm nicht gehört?', 'a' => 'Prüfe, ob der Ton aktiviert und dein Gerät nicht stummgeschaltet ist. Manche Browser blockieren Ton, bis du mit der Seite interagierst — das Drücken von Start zählt als Interaktion.'],
            ['q' => 'Was ist die Pomodoro-Technik?', 'a' => 'Eine Zeitmanagement-Methode: Du arbeitest 25 Minuten konzentriert und machst dann 5 Minuten Pause. Nach vier Runden folgt eine längere Pause von 15 bis 30 Minuten. Der Timer wechselt die Phasen automatisch.'],
            ['q' => 'Wie genau ist die Stoppuhr?', 'a' => 'Sie zeigt Hundertstelsekunden an und nutzt die Uhr deines Geräts, die auf wenige Millisekunden genau ist. Mit „Runde“ hältst du Zwischenzeiten fest.'],
            ['q' => 'Funktioniert er offline?', 'a' => 'Sobald die Seite geladen ist, funktionieren Timer, Stoppuhr und Pomodoro in deinem Browser auch ohne Internetverbindung.'],
        ],
    ],

    'random-name-picker' => [
        'slug' => 'namen-zufallsgenerator',
        'name' => 'Zufallsgenerator für Namen',
        'short_description' => 'Gewinner aus einer Liste ziehen oder Personen in Teams aufteilen.',
        'description' => 'Füge eine Namensliste ein, um fair einen oder mehrere Gewinner zu ziehen — auf Wunsch werden sie für die nächste Runde entfernt — oder teile alle zufällig in Teams auf.',
        'seo_title' => 'Zufallsgenerator für Namen: Gewinner und Teams',
        'seo_description' => 'Kostenloser Zufallsgenerator für Namen. Gewinner aus einer Liste für Verlosungen und Unterricht ziehen oder Namen in Zufallsteams aufteilen. Ohne Anmeldung.',
        'content' => <<<'HTML'
<h2>Ideal für Unterricht, Teams und Gewinnspiele</h2>
<p>Lehrkräfte nutzen Namensauslosungen, um Schülerinnen und Schüler fair aufzurufen, Teams, um zu entscheiden, wer zuerst präsentiert, und Creator, um Gewinner eines Gewinnspiels vor ihrem Publikum zu ziehen. Da die Auslosung zufällig und transparent ist, kann niemand behaupten, sie sei manipuliert.</p>
<h2>Tipps</h2>
<ul>
<li>Aktiviere <strong>Gezogene Namen entfernen</strong>, damit alle drankommen, bevor jemand zweimal gezogen wird.</li>
<li>Nutze <strong>Teams bilden</strong> für Gruppenarbeiten, Sport und Spiele.</li>
<li>Bereinige deine Liste zuerst mit „Doppelte Zeilen entfernen“, wenn du Namen aus mehreren Quellen kopiert hast.</li>
</ul>
<p>Du verlost nummerierte Lose? Nutze den Zufallszahlengenerator.</p>
HTML,
        'steps' => [
            'Füge die Namen ein oder tippe sie, einen pro Zeile. Du kannst eine Spalte direkt aus einer Tabelle einfügen.',
            'Wähle <strong>Gewinner ziehen</strong>, um einen oder mehrere Namen zu ziehen, oder <strong>Teams bilden</strong>, um alle zufällig in Gruppen aufzuteilen.',
            'Entferne bei Bedarf die gezogenen Namen aus der Liste, damit die nächste Ziehung nur die übrigen enthält.',
            'Klicke auf den Button und kopiere das Ergebnis zum Teilen.',
        ],
        'faq' => [
            ['q' => 'Ist die Namensauslosung fair?', 'a' => 'Ja. Die Gewinner werden mit einem kryptografisch sicheren Zufallsgenerator gezogen, jeder Name hat also exakt dieselbe Chance. Die Animation dient nur dem Spaß und beeinflusst das Ergebnis nicht.'],
            ['q' => 'Kann ich mehrere Gewinner auf einmal ziehen?', 'a' => 'Ja. Gib an, wie viele Gewinner du brauchst; derselbe Name wird in einer Ziehung nie zweimal gezogen.'],
            ['q' => 'Wie werden die Teams gebildet?', 'a' => 'Alle werden zufällig gemischt und auf die gewählte Anzahl von Teams verteilt, die Teams unterscheiden sich also höchstens um eine Person.'],
            ['q' => 'Was passiert, wenn ein Name zweimal vorkommt?', 'a' => 'Jede Zeile zählt als Teilnahme, ein doppelter Name hat also die doppelte Chance. Wenn du das nicht willst, nutze vorher „Doppelte Zeilen entfernen“.'],
            ['q' => 'Werden die Namen gespeichert?', 'a' => 'Nein. Die Liste bleibt in deinem Browser und wird nie hochgeladen.'],
        ],
    ],
];
