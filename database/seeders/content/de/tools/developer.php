<?php

/*
| German copy for the developer tools. See content/de/tools.php.
*/

return [
    'json-formatter' => [
        'slug' => 'json-formatierer',
        'name' => 'JSON-Formatierer',
        'short_description' => 'JSON direkt im Browser formatieren, validieren und minifizieren.',
        'description' => 'Füge dein JSON ein, um es sauber einzurücken, für die Produktion zu minifizieren oder zu validieren und die genaue Zeile jedes Syntaxfehlers zu finden. Deine Daten verlassen nie den Browser.',
        'seo_title' => 'JSON-Formatierer und Validator online',
        'seo_description' => 'Kostenloser JSON-Formatierer und Validator. JSON sofort im Browser verschönern, minifizieren und validieren — ohne Datenupload und ohne Anmeldung.',
        'content' => <<<'HTML'
<h2>Warum JSON formatieren?</h2>
<p>APIs und Logdateien liefern JSON oft als eine einzige endlose Zeile, die kaum lesbar ist. Formatieren fügt einheitliche Einrückungen und Zeilenumbrüche hinzu, damit du die Struktur siehst, fehlende Felder erkennst und schneller debuggst. Minifizieren macht das Gegenteil: Es entfernt alle unnötigen Leerzeichen, damit Antworten und Konfigurationsdateien so klein wie möglich sind.</p>
<h2>Häufige JSON-Fehler, die dieser Validator findet</h2>
<ul>
<li>Abschließende Kommas nach dem letzten Element eines Objekts oder Arrays.</li>
<li>Einfache statt doppelte Anführungszeichen bei Strings und Schlüsseln.</li>
<li>Eigenschaftsnamen ohne Anführungszeichen und Kommentare, die JSON nicht erlaubt.</li>
<li>Fehlende Kommas, eckige oder geschweifte Klammern.</li>
</ul>
<p>Jeder Fehler wird mit genauer Zeile und Spalte gemeldet. Du brauchst die Daten in einer Tabelle? Nutze „JSON in CSV“ oder gehe den umgekehrten Weg mit „CSV in JSON“.</p>
HTML,
        'steps' => [
            'Füge dein JSON in das Feld <strong>Eingabe</strong> ein oder tippe es, oder klicke auf <strong>Beispiel laden</strong>, um es auszuprobieren.',
            'Klicke auf <strong>Formatieren</strong> zum Verschönern oder auf <strong>Minifizieren</strong>, um alle Leerzeichen zu entfernen. Wähle 2 Leerzeichen, 4 Leerzeichen oder Tabulatoren und sortiere die Schlüssel bei Bedarf alphabetisch.',
            'Ist dein JSON ungültig, zeigt die Fehlermeldung die genaue Zeile und Spalte, und der Cursor springt zum Problem.',
            'Kopiere das Ergebnis oder lade es als Datei herunter. Du kannst das JSON auch in <strong>CSV</strong> oder <strong>TypeScript</strong>-Interfaces umwandeln.',
        ],
        'faq' => [
            ['q' => 'Wird mein JSON an einen Server gesendet?', 'a' => 'Nein. Formatierung, Validierung und Umwandlung laufen vollständig in deinem Browser mit JavaScript. Deine Daten verlassen dein Gerät nie, du kannst das Tool also bedenkenlos mit privaten oder sensiblen Informationen nutzen.'],
            ['q' => 'Was ist der Unterschied zwischen Formatieren und Minifizieren?', 'a' => 'Formatieren (auch Verschönern genannt) fügt Einrückungen und Zeilenumbrüche hinzu, damit JSON gut lesbar ist. Minifizieren entfernt alle unnötigen Leerzeichen, damit es in der Produktion oder bei der Übertragung möglichst klein ist.'],
            ['q' => 'Warum ist mein JSON ungültig?', 'a' => 'Die häufigsten Ursachen sind abschließende Kommas, einfache statt doppelte Anführungszeichen, Eigenschaftsnamen ohne Anführungszeichen, Kommentare und fehlende Kommas zwischen Elementen. JSON ist strenger als die Objektsyntax von JavaScript. Der Validator zeigt Zeile und Spalte des ersten gefundenen Fehlers.'],
            ['q' => 'Wie funktioniert die Umwandlung von JSON in CSV?', 'a' => 'Ein Array von Objekten wird zu einer Zeile pro Objekt mit einer Spalte pro Schlüssel. Verschachtelte Objekte werden in Punktnotation abgeflacht (zum Beispiel <code>owner.name</code>), verschachtelte Arrays als JSON-Text in der Zelle gespeichert.'],
            ['q' => 'Gibt es ein Größenlimit?', 'a' => 'Es gibt kein festes Limit, aber da alles in deinem Browser läuft, können sehr große Dateien (Dutzende Megabyte) je nach Gerät langsam sein.'],
        ],
    ],

    'base64-encoder' => [
        'slug' => 'base64-kodieren-dekodieren',
        'name' => 'Base64-Encoder und -Decoder',
        'short_description' => 'Texte und Dateien in Base64 kodieren und dekodieren, auch URL-sicher.',
        'description' => 'Wandle Text in Base64 und zurück um, mit voller UTF-8-Unterstützung, wechsle zu URL-sicherem Base64 oder mache aus einer beliebigen Datei einen Base64-String oder eine Data-URI.',
        'seo_title' => 'Base64 kodieren und dekodieren: Text und Dateien',
        'seo_description' => 'Kostenloser Base64-Encoder und -Decoder. Unterstützt UTF-8 und Emojis, URL-sicheres Base64 und Dateien als Data-URI. Läuft in deinem Browser.',
        'content' => <<<'HTML'
<h2>Wofür wird Base64 verwendet?</h2>
<ul>
<li>Kleine Bilder als Data-URI in HTML oder CSS einbetten.</li>
<li>Binäre Anhänge per E-Mail (MIME) verschicken.</li>
<li>Binärdaten in JSON, XML oder Umgebungsvariablen speichern.</li>
<li>HTTP-Basic-Authentifizierung und JSON Web Tokens.</li>
</ul>
<h2>Base64 ist keine Verschlüsselung</h2>
<p>Base64 ändert nur die Darstellung der Daten — jeder kann es sofort dekodieren. Verwende es nie, um Passwörter oder Geheimnisse zu verstecken, und verlass dich für Vertraulichkeit immer auf echte Verschlüsselung. Für sichere Geheimnisse nutze den Passwort-Generator; um Tokens mit Base64URL zu untersuchen, nutze den JWT-Decoder.</p>
HTML,
        'steps' => [
            'Wähle <strong>Kodieren</strong>, um Text in Base64 umzuwandeln, oder <strong>Dekodieren</strong>, um Base64 wieder in lesbaren Text zu verwandeln.',
            'Füge deinen Text oder Base64-String ein. Das Ergebnis erscheint sofort beim Tippen.',
            'Aktiviere <strong>URL-sicher</strong>, um <code>-</code> und <code>_</code> statt <code>+</code> und <code>/</code> zu verwenden (wie in JWTs und URLs).',
            'Um ein Bild oder eine beliebige Datei zu kodieren, nutze weiter unten <strong>Datei kodieren</strong> und kopiere den Base64-String oder die vollständige Data-URI.',
        ],
        'faq' => [
            ['q' => 'Was ist Base64?', 'a' => 'Base64 ist eine Kodierung, die Binärdaten mit 64 druckbaren ASCII-Zeichen darstellt. Sie wird genutzt, um Bilder in HTML und CSS einzubetten, Anhänge per E-Mail zu senden und Daten in JSON oder URLs zu transportieren. Es ist eine Kodierung, keine Verschlüsselung: Jeder kann sie dekodieren.'],
            ['q' => 'Werden Emojis und Umlaute unterstützt?', 'a' => 'Ja. Der Text wird vor dem Kodieren in UTF-8 umgewandelt, sodass Emojis, Umlaute, ß und nicht-lateinische Schriften korrekt kodiert und dekodiert werden.'],
            ['q' => 'Was ist URL-sicheres Base64?', 'a' => 'URL-sicheres Base64 (Base64URL) ersetzt <code>+</code> durch <code>-</code> und <code>/</code> durch <code>_</code> und entfernt das Padding <code>=</code>, damit das Ergebnis in URLs und Dateinamen verwendet werden kann. Der Decoder akzeptiert beide Varianten automatisch.'],
            ['q' => 'Warum macht Base64 Daten größer?', 'a' => 'Je 3 Byte Eingabe werden zu 4 Base64-Zeichen, kodierte Daten sind also etwa 33 % größer als das Original.'],
            ['q' => 'Werden meine Daten ins Internet hochgeladen?', 'a' => 'Nein. Kodieren und Dekodieren passieren in deinem Browser. Deine Texte und Dateien verlassen dein Gerät nie.'],
        ],
    ],

    'url-encoder' => [
        'slug' => 'url-kodieren-dekodieren',
        'name' => 'URL-Encoder und -Decoder',
        'short_description' => 'URLs und Parameter mit Prozent-Kodierung kodieren oder dekodieren.',
        'description' => 'Kodiere Text für die sichere Verwendung in URLs oder dekodiere prozentkodierte Strings in lesbaren Text, und sieh dir jeden Teil und Parameter einer URL an.',
        'seo_title' => 'URL kodieren und dekodieren online',
        'seo_description' => 'Kostenloser URL-Encoder und -Decoder. Query-Werte oder ganze URLs kodieren, %20-Sequenzen dekodieren und Parameter sofort aufschlüsseln.',
        'content' => <<<'HTML'
<h2>Warum URLs kodiert werden müssen</h2>
<p>URLs dürfen nur einen begrenzten Zeichensatz enthalten. Leerzeichen, Umlaute, Emojis und Symbole wie <code>&amp;</code>, <code>?</code> und <code>#</code> müssen prozentkodiert werden, damit Browser und Server sie richtig interpretieren. Ein nicht kodierter Query-Wert ist eine häufige Ursache für kaputte Links und verlorene Parameter.</p>
<h2>Häufige Kodierungen</h2>
<ul>
<li>Leerzeichen → <code>%20</code> (oder <code>+</code> in Formulardaten)</li>
<li><code>&amp;</code> → <code>%26</code></li>
<li><code>/</code> → <code>%2F</code></li>
<li><code>ü</code> → <code>%C3%BC</code></li>
</ul>
<h2>Kodierung für Entwickler</h2>
<p>In JavaScript verwendest du <code>encodeURIComponent()</code> für einzelne Query-Werte und <code>encodeURI()</code> für vollständige URLs. In PHP sind die Entsprechungen <code>rawurlencode()</code> und <code>urlencode()</code>, das Leerzeichen als Pluszeichen kodiert. Einen Wert doppelt zu kodieren ist ein häufiger Fehler und erzeugt Sequenzen wie <code>%2520</code>.</p>
<p>Du arbeitest mit Tokens oder Binärdaten? Der Base64-Encoder und -Decoder und der JWT-Decoder helfen dir weiter.</p>
HTML,
        'steps' => [
            'Wähle <strong>Kodieren</strong> für die Prozent-Kodierung oder <strong>Dekodieren</strong>, um Sequenzen wie <code>%20</code> in lesbaren Text zu verwandeln.',
            'Füge deinen Text oder deine URL ein. Das Ergebnis aktualisiert sich beim Tippen.',
            'Nutze <strong>Komponente</strong> für Query-Werte und Pfadsegmente oder <strong>Vollständige URL</strong>, um Zeichen wie <code>/</code>, <code>?</code> und <code>&amp;</code> beizubehalten.',
            'Ist die Eingabe eine vollständige URL, werden ihre Teile und Parameter darunter in einer Tabelle angezeigt.',
        ],
        'faq' => [
            ['q' => 'Was ist URL-Kodierung?', 'a' => 'URL-Kodierung (Prozent-Kodierung) ersetzt Zeichen, die in einer URL nicht erlaubt sind, durch ein <code>%</code> gefolgt von zwei Hexadezimalziffern. Ein Leerzeichen wird zum Beispiel zu <code>%20</code> und ein <code>ü</code> zu <code>%C3%BC</code>.'],
            ['q' => 'Was ist der Unterschied zwischen Komponente und vollständiger URL?', 'a' => 'Der Modus Komponente (<code>encodeURIComponent</code>) kodiert alle reservierten Zeichen — genau das brauchst du für einen einzelnen Query-Wert. Der Modus Vollständige URL (<code>encodeURI</code>) lässt Zeichen, die eine URL strukturieren, unverändert, etwa <code>:</code>, <code>/</code>, <code>?</code>, <code>&amp;</code> und <code>=</code>.'],
            ['q' => 'Warum verwenden manche URLs + für Leerzeichen?', 'a' => 'HTML-Formulare kodieren Leerzeichen in Query-Strings als <code>+</code>. Lass <strong>+ als Leerzeichen behandeln</strong> aktiviert, wenn du Formulardaten oder Query-Strings dekodierst.'],
            ['q' => 'Werden meine Daten irgendwohin gesendet?', 'a' => 'Nein. Alles wird in deinem Browser verarbeitet.'],
        ],
    ],

    'jwt-decoder' => [
        'slug' => 'jwt-decoder',
        'name' => 'JWT-Decoder',
        'short_description' => 'JSON Web Tokens dekodieren und Claims sowie Ablaufzeit prüfen.',
        'description' => 'Füge ein JWT ein, um Header und Payload zu dekodieren, exp, iat und nbf als lesbare Daten anzuzeigen und zu prüfen, ob das Token abgelaufen ist. Die Dekodierung passiert auf deinem Gerät.',
        'seo_title' => 'JWT-Decoder: JSON Web Tokens dekodieren',
        'seo_description' => 'JWT-Tokens kostenlos dekodieren. Header, Payload, Ablaufdaten und Token-Status ansehen. Privat: Das Token verlässt deinen Browser nicht.',
        'content' => <<<'HTML'
<h2>So funktionieren JWTs</h2>
<p>Ein JSON Web Token transportiert Daten (Claims) über einen Benutzer oder eine Sitzung, etwa eine ID, Rollen und ein Ablaufdatum. Header und Payload sind Base64URL-kodiertes JSON, und die Signatur lässt den Server prüfen, dass niemand sie verändert hat. Da der Payload nur kodiert ist, kann ihn jeder mit dem Token lesen — lege nie Geheimnisse in ein JWT.</p>
<h2>Typische Prüfungen beim Debuggen</h2>
<ul>
<li>Ist das Token abgelaufen (<code>exp</code> in der Vergangenheit)?</li>
<li>Verursacht eine Uhrabweichung Probleme mit <code>nbf</code>?</li>
<li>Passen <code>aud</code> oder <code>iss</code> zu dem, was deine API erwartet?</li>
<li>Ist der Algorithmus (<code>alg</code>) der, den dein Server konfiguriert hat?</li>
</ul>
<p>Um andere Base64-Strings zu dekodieren, nutze den Base64-Encoder und -Decoder.</p>
HTML,
        'steps' => [
            'Füge ein JSON Web Token (JWT) in das Feld ein. Das Präfix <code>Bearer</code> wird automatisch entfernt.',
            'Header und Payload werden sofort dekodiert und als formatiertes JSON angezeigt.',
            'Prüfe die Claims <strong>exp</strong>, <strong>iat</strong> und <strong>nbf</strong> als lesbare Daten und ob das Token abgelaufen ist.',
            'Kopiere den dekodierten Header oder Payload mit einem Klick.',
        ],
        'faq' => [
            ['q' => 'Ist es sicher, mein JWT hier einzufügen?', 'a' => 'Ja. Das Token wird vollständig in deinem Browser dekodiert und nie an einen Server gesendet. Behandle Produktions-Tokens trotzdem wie Passwörter und teile sie nicht.'],
            ['q' => 'Prüft dieses Tool die Signatur?', 'a' => 'Nein. Es dekodiert nur Header und Payload, die Base64URL-kodiertes JSON sind. Die Signaturprüfung erfordert das Secret oder den öffentlichen Schlüssel und sollte auf deinem Server erfolgen.'],
            ['q' => 'Was bedeuten exp, iat und nbf?', 'a' => '<code>exp</code> ist das Ablaufdatum, <code>iat</code> der Ausstellungszeitpunkt und <code>nbf</code> der Zeitpunkt, vor dem das Token nicht akzeptiert werden darf. Alle sind Unix-Timestamps in Sekunden.'],
            ['q' => 'Aus welchen drei Teilen besteht ein JWT?', 'a' => 'Ein JWT besteht aus Header (Algorithmus und Token-Typ), Payload (den Claims) und Signatur, getrennt durch Punkte: <code>header.payload.signature</code>.'],
        ],
    ],

    'hash-generator' => [
        'slug' => 'hash-generator',
        'name' => 'Hash-Generator',
        'short_description' => 'MD5-, SHA-1-, SHA-256- und SHA-512-Hashes aus Text oder Dateien erzeugen.',
        'description' => 'Berechne MD5-, SHA-1-, SHA-256-, SHA-384- und SHA-512-Hashes eines beliebigen Textes oder einer Datei auf einmal und prüfe Downloads durch Vergleich von Prüfsummen. Läuft in deinem Browser.',
        'seo_title' => 'Hash-Generator für MD5, SHA-256 und SHA-512',
        'seo_description' => 'MD5-, SHA-1-, SHA-256- und SHA-512-Hashes aus Text oder Dateien erzeugen und Prüfsummen vergleichen. Dateien bleiben im Browser, ohne Upload.',
        'content' => <<<'HTML'
<h2>Typische Einsatzzwecke für Hashes</h2>
<ul>
<li><strong>Downloads prüfen:</strong> Vergleiche die vom Softwareanbieter veröffentlichte SHA-256-Prüfsumme mit der heruntergeladenen Datei.</li>
<li><strong>Änderungen erkennen:</strong> Dieselbe Datei hat immer denselben Hash, unterschiedliche Hashes bedeuten also unterschiedlichen Inhalt.</li>
<li><strong>Entwicklung:</strong> Cache-Keys, ETags und Inhaltskennungen erzeugen.</li>
<li><strong>Deduplizierung:</strong> Identische Dateien über ihre Hashes finden.</li>
</ul>
<h2>Welchen Algorithmus solltest du verwenden?</h2>
<p>Nutze SHA-256 für fast alles: Er ist schnell, weit verbreitet und sicher. SHA-512 liefert einen noch längeren Digest. MD5 und SHA-1 eignen sich für schnelle Integritätsprüfungen, aber nicht für Sicherheitszwecke. Um Daten zu kodieren statt einen Fingerabdruck zu erzeugen, nutze den Base64-Encoder und -Decoder.</p>
HTML,
        'steps' => [
            'Gib einen Text ein oder füge ihn ein, oder wähle <strong>Hash einer Datei berechnen</strong>, um die Prüfsumme einer beliebigen Datei zu erhalten.',
            'MD5, SHA-1, SHA-256, SHA-384 und SHA-512 werden gleichzeitig berechnet.',
            'Kopiere den benötigten Hash in Klein- oder Großbuchstaben.',
            'Um einen Download zu prüfen, füge die erwartete Prüfsumme in <strong>Vergleichen</strong> ein — bei Übereinstimmung wird sie grün markiert.',
        ],
        'faq' => [
            ['q' => 'Was ist ein Hash?', 'a' => 'Eine Hashfunktion verwandelt jede Eingabe in einen Fingerabdruck fester Länge. Dieselbe Eingabe ergibt immer denselben Hash, und schon ein geändertes Zeichen verändert ihn komplett. Hashes dienen zum Prüfen von Downloads, Erkennen von Änderungen und Indizieren von Daten.'],
            ['q' => 'Wie prüfe ich die Prüfsumme einer Datei?', 'a' => 'Berechne den Hash der heruntergeladenen Datei und füge die vom Anbieter veröffentlichte Prüfsumme (meist SHA-256) in „Vergleichen“ ein. Stimmen sie überein, ist die Datei vollständig und unverändert.'],
            ['q' => 'Sind MD5 oder SHA-1 sicher?', 'a' => 'Für Sicherheitszwecke nicht mehr. Für beide sind Kollisionsangriffe bekannt, nutze also SHA-256 oder SHA-512 für alles Sicherheitsrelevante. MD5 eignet sich weiterhin für schnelle Prüfungen ohne Sicherheitsbezug.'],
            ['q' => 'Sollte ich Passwörter mit SHA-256 speichern?', 'a' => 'Nein. Passwörter sollten mit langsamen, gesalzenen Algorithmen wie bcrypt, scrypt oder Argon2 gespeichert werden. Schnelle Hashes wie SHA-256 lassen sich leicht per Brute Force angreifen.'],
            ['q' => 'Werden meine Texte und Dateien hochgeladen?', 'a' => 'Nein. Die Hashes werden in deinem Browser mit der Web Crypto API berechnet. Dateien jeder Art bis 200 MB bleiben auf deinem Gerät.'],
        ],
    ],

    'timestamp-converter' => [
        'slug' => 'unix-timestamp-konverter',
        'name' => 'Unix-Timestamp-Konverter',
        'short_description' => 'Unix-Timestamps in Datumsangaben umrechnen und umgekehrt.',
        'description' => 'Wandle Epoch-Timestamps in Sekunden oder Millisekunden in Ortszeit, UTC und ISO 8601 um und mache aus jedem Datum einen Unix-Timestamp. Zeigt den aktuellen Timestamp live an.',
        'seo_title' => 'Unix-Timestamp in Datum umrechnen und zurück',
        'seo_description' => 'Unix-Timestamps in lesbare Daten umrechnen und umgekehrt. Sekunden oder Millisekunden, Ortszeit, UTC und ISO 8601 — mit aktueller Epoch-Zeit.',
        'content' => <<<'HTML'
<h2>Warum Entwickler Unix-Zeit verwenden</h2>
<p>Ein Unix-Timestamp beschreibt einen Zeitpunkt mit einer einzigen Zahl, die weltweit gleich ist — ideal für Datenbanken, APIs, Logs, den Ablauf von JWTs und Cache-Header. Sie in lesbare Daten umzuwandeln gehört beim Debuggen zum Alltag.</p>
<h2>Häufige Fehler</h2>
<ul>
<li>Sekunden und Millisekunden verwechseln: Eine 13-stellige Zahl ist in Millisekunden.</li>
<li>Zeitzonen vergessen: Timestamps sind immer in UTC, nur die Anzeige ist lokal.</li>
<li>Daten als 32-Bit-Ganzzahlen speichern, die im Januar 2038 überlaufen.</li>
</ul>
<p>Du dekodierst ein Token mit den Claims <code>exp</code> und <code>iat</code>? Der JWT-Decoder rechnet sie automatisch um. Um Kalendertage zwischen zwei Daten zu zählen, nutze den Datumsrechner.</p>
HTML,
        'steps' => [
            'Der aktuelle Unix-Timestamp wird oben angezeigt und jede Sekunde aktualisiert.',
            'Füge einen Timestamp in <strong>Timestamp in Datum</strong> ein. Sekunden und Millisekunden werden automatisch erkannt.',
            'Sieh ihn als Ortszeit, UTC, ISO 8601 und relative Zeit (zum Beispiel „vor 3 Tagen“).',
            'Nutze <strong>Datum in Timestamp</strong>, um ein Datum mit Uhrzeit in deiner Zeitzone oder in UTC umzuwandeln.',
        ],
        'faq' => [
            ['q' => 'Was ist ein Unix-Timestamp?', 'a' => 'Ein Unix-Timestamp (Epoch-Zeit) ist die Anzahl der Sekunden seit dem 1. Januar 1970, 00:00:00 UTC. Datenbanken, APIs, Logs und Programmiersprachen nutzen ihn, weil er in allen Zeitzonen gleich ist.'],
            ['q' => 'Sekunden oder Millisekunden?', 'a' => 'Die meisten Systeme (Unix, PHP, Python, Datenbanken) verwenden Sekunden — heute 10 Stellen. JavaScript und Java verwenden Millisekunden — 13 Stellen. Der Konverter erkennt, was du eingefügt hast.'],
            ['q' => 'Was ist das Jahr-2038-Problem?', 'a' => 'Systeme, die Timestamps als vorzeichenbehaftete 32-Bit-Ganzzahlen speichern, laufen am 19. Januar 2038 über (Timestamp 2147483647). Moderne Systeme nutzen 64-Bit-Werte, die für Milliarden von Jahren reichen.'],
            ['q' => 'Wie erhalte ich den aktuellen Timestamp im Code?', 'a' => 'JavaScript: <code>Math.floor(Date.now() / 1000)</code>. PHP: <code>time()</code>. Python: <code>int(time.time())</code>. SQL (MySQL): <code>UNIX_TIMESTAMP()</code>.'],
        ],
    ],

    'color-converter' => [
        'slug' => 'farbkonverter',
        'name' => 'Farbkonverter und Kontrastprüfer',
        'short_description' => 'HEX-, RGB- und HSL-Farben umrechnen und den WCAG-Kontrast prüfen.',
        'description' => 'Rechne Farben mit einem Farbwähler zwischen HEX, RGB und HSL um und prüfe das Kontrastverhältnis zwischen Text und Hintergrund nach WCAG AA und AAA.',
        'seo_title' => 'Farbkonverter für HEX, RGB, HSL und Kontrast',
        'seo_description' => 'HEX in RGB und HSL umrechnen und den Farbkontrast nach WCAG für Barrierefreiheit prüfen. Kostenloser Farbkonverter mit Farbwähler und AA/AAA-Ergebnissen.',
        'content' => <<<'HTML'
<h2>Mit Farbformaten arbeiten</h2>
<p>Design-Tools liefern Farben oft als HEX, während CSS-Frameworks, Canvas-Code und Bildbibliotheken RGB oder HSL erwarten können. HSL ist besonders praktisch für Paletten: Du behältst den Farbton und änderst die Helligkeit, um passende Hover-Zustände, Rahmen und Hintergründe zu erstellen.</p>
<h2>Barrierefreier Farbkontrast</h2>
<p>Etwa jeder zwölfte Mann hat eine Farbsehschwäche, und viele Menschen lesen draußen auf dem Handy. Die Web Content Accessibility Guidelines (WCAG) verlangen ein Kontrastverhältnis von mindestens 4.5:1 für normalen Text und 3:1 für großen Text. Prüfe jede Text-Hintergrund-Kombination in deinem Design, auch Buttons und Platzhaltertexte in Eingabefeldern.</p>
<p>Du erstellst einen QR-Code in deinen Markenfarben? Teste hier zuerst den Kontrast und nutze dann den QR-Code-Generator.</p>
HTML,
        'steps' => [
            'Gib eine Farbe in einem beliebigen Format ein — <code>#0f766e</code>, <code>rgb(15, 118, 110)</code> oder <code>hsl(175, 77%, 26%)</code> — oder wähle sie mit dem Farbwähler.',
            'Kopiere die Farbe als HEX, RGB oder HSL für CSS, Design-Tools oder Code.',
            'Gib im <strong>Kontrastprüfer</strong> eine Text- und eine Hintergrundfarbe ein.',
            'Prüfe die WCAG-Ergebnisse: Ziel ist mindestens AA (4.5:1) für normalen Text.',
        ],
        'faq' => [
            ['q' => 'Was ist der Unterschied zwischen HEX, RGB und HSL?', 'a' => 'Sie beschreiben dieselben Farben auf unterschiedliche Weise. HEX und RGB geben die Kanäle Rot, Grün und Blau an; HSL nutzt Farbton, Sättigung und Helligkeit, was hellere oder dunklere Varianten einer Farbe erleichtert.'],
            ['q' => 'Welches Kontrastverhältnis brauche ich?', 'a' => 'WCAG 2 Stufe AA verlangt 4.5:1 für normalen Text und 3:1 für großen Text (etwa 24 px oder 19 px fett). Stufe AAA verlangt 7:1 und 4.5:1. Mehr Kontrast macht Text für mehr Menschen lesbar, auch für Menschen mit Sehschwäche.'],
            ['q' => 'Warum ist barrierefreier Kontrast für SEO wichtig?', 'a' => 'Lesbarer Text hält Besucher auf der Seite, und Barrierefreiheits-Audits wie Lighthouse markieren kontrastarmen Text. Barrierefreie Websites erreichen außerdem mehr Menschen.'],
            ['q' => 'Wird etwas hochgeladen?', 'a' => 'Nein. Alle Umrechnungen und Kontrastberechnungen erfolgen in deinem Browser.'],
        ],
    ],

    'regex-tester' => [
        'slug' => 'regex-tester',
        'name' => 'Regex-Tester',
        'short_description' => 'Reguläre Ausdrücke mit Live-Hervorhebung und Gruppen testen.',
        'description' => 'Teste reguläre Ausdrücke in JavaScript mit Live-Hervorhebung der Treffer, Capture-Gruppen, benannten Gruppen und Vorschau der Ersetzung. Muster laufen in einem sicheren Hintergrund-Worker.',
        'seo_title' => 'Regex-Tester: reguläre Ausdrücke online testen',
        'seo_description' => 'Kostenloser Regex-Tester mit Live-Hervorhebung, Capture-Gruppen, Flags und Ersetzungsvorschau. Reguläre Ausdrücke in JavaScript, sicher und privat.',
        'content' => <<<'HTML'
<h2>Regex-Spickzettel</h2>
<ul>
<li><code>\d</code> Ziffer · <code>\w</code> Wortzeichen · <code>\s</code> Leerraum · <code>.</code> beliebiges Zeichen</li>
<li><code>*</code> 0 oder mehr · <code>+</code> 1 oder mehr · <code>?</code> optional · <code>{2,4}</code> 2 bis 4</li>
<li><code>^</code> Anfang · <code>$</code> Ende · <code>\b</code> Wortgrenze</li>
<li><code>[abc]</code> eines davon · <code>[^abc]</code> keines davon · <code>a|b</code> entweder oder</li>
<li><code>(…)</code> Capture-Gruppe · <code>(?:…)</code> ohne Capture · <code>(?=…)</code> Lookahead</li>
</ul>
<h2>Tipps zum Testen</h2>
<p>Füge echte Beispiele ein, auch Fälle, die nicht passen sollen, und beobachte die Hervorhebung beim Bearbeiten. Halte Muster so spezifisch wie möglich und vermeide verschachtelte Quantoren, damit die Suche schnell bleibt. Um Text nach dem Finden des richtigen Musters massenhaft umzuwandeln, helfen „Groß- und Kleinschreibung ändern“ und „Zeilen sortieren“.</p>
HTML,
        'steps' => [
            'Gib deinen regulären Ausdruck in das Feld <strong>Muster</strong> ein (ohne umgebende Schrägstriche).',
            'Aktiviere die benötigten Flags: <code>g</code> global, <code>i</code> Groß-/Kleinschreibung ignorieren, <code>m</code> mehrzeilig, <code>s</code> Punkt inkl. Zeilenumbrüche, <code>u</code> Unicode.',
            'Füge deinen Testtext ein. Treffer werden sofort hervorgehoben und mit ihren Capture-Gruppen aufgelistet.',
            'Aktiviere <strong>Ersetzen</strong>, um eine Ersetzung mit <code>$1</code>, <code>$2</code> oder <code>$&lt;name&gt;</code> vorab zu sehen.',
        ],
        'faq' => [
            ['q' => 'Welche Regex-Variante nutzt dieser Tester?', 'a' => 'Er nutzt die JavaScript-Regex-Engine (ECMAScript) deines Browsers — dieselbe wie Node.js und TypeScript. Die Syntax entspricht größtenteils PCRE, Python und Java, aber manche Funktionen wie Lookbehind-Unterstützung oder possessive Quantoren unterscheiden sich.'],
            ['q' => 'Was sind Capture-Gruppen?', 'a' => 'Klammern erfassen den Teil des Treffers, den sie umschließen, damit du ihn wiederverwenden kannst. Benannte Gruppen wie <code>(?&lt;jahr&gt;\d{4})</code> machen Muster lesbarer. Nutze <code>(?:...)</code>, um ohne Erfassung zu gruppieren.'],
            ['q' => 'Warum hat mein Muster das Zeitlimit überschritten?', 'a' => 'Verschachtelte Quantoren wie <code>(a+)+</code> können katastrophales Backtracking auslösen, bei dem die Engine exponentiell viele Kombinationen probiert. Der Tester bricht nach 1,5 Sekunden ab, damit dein Browser reaktionsfähig bleibt.'],
            ['q' => 'Wird mein Text irgendwohin gesendet?', 'a' => 'Nein. Die Suche läuft in deinem Browser in einem Hintergrund-Worker. Nichts wird hochgeladen.'],
        ],
    ],
];
