<?php

/*
| German copy for the text tools. See content/de/tools.php.
*/

return [
    'word-counter' => [
        'slug' => 'wortzaehler',
        'name' => 'Wortzähler',
        'short_description' => 'Wörter, Zeichen, Sätze und Lesezeit sofort zählen.',
        'description' => 'Füge deinen Text ein oder tippe ihn, um Wörter, Zeichen mit und ohne Leerzeichen, Sätze und Absätze zu zählen — dazu Lesezeit, Sprechzeit und Keyword-Dichte.',
        'seo_title' => 'Wortzähler und Zeichenzähler online',
        'seo_description' => 'Kostenloser Wortzähler. Zählt Wörter, Zeichen (mit und ohne Leerzeichen), Sätze und Absätze und zeigt Lesezeit und häufigste Keywords.',
        'content' => <<<'HTML'
<h2>Übliche Längenvorgaben</h2>
<ul>
<li><strong>Meta-Description:</strong> etwa 150–160 Zeichen.</li>
<li><strong>Seitentitel für Google:</strong> etwa 50–60 Zeichen.</li>
<li><strong>Beitrag auf X (Twitter):</strong> 280 Zeichen.</li>
<li><strong>LinkedIn-Beitrag:</strong> 3000 Zeichen.</li>
<li><strong>Aufsätze und Hausarbeiten:</strong> oft 500–1500 Wörter.</li>
<li><strong>Gut rankender Blogartikel:</strong> häufig 1000–2000 Wörter, je nach Thema.</li>
</ul>
<h2>Schreibtipps</h2>
<p>Am Bildschirm wird überflogen: Teile lange Absätze in Blöcke aus zwei bis vier Sätzen und nutze Zwischenüberschriften, um die Leser zu führen. Kurze Sätze lesen sich online besser. Nutze die Keyword-Liste, um zu prüfen, ob dein Hauptthema natürlich vorkommt und du kein Wort überstrapazierst. Um die Schreibweise zu korrigieren, nutze „Groß- und Kleinschreibung ändern“; um zwei Entwürfe zu vergleichen, „Texte vergleichen“.</p>
HTML,
        'steps' => [
            'Tippe oder füge deinen Text in das Feld ein. Die Zählungen aktualisieren sich beim Tippen.',
            'Sieh die Anzahl der Wörter, Zeichen (mit und ohne Leerzeichen), Sätze, Absätze und Zeilen.',
            'Prüfe die geschätzte Lese- und Sprechzeit — praktisch für Artikel, Reden und Präsentationen.',
            'Prüfe die häufigsten Wörter und ihre Dichte, um Wiederholungen zu vermeiden und deinen SEO-Fokus zu kontrollieren.',
        ],
        'faq' => [
            ['q' => 'Wie werden Wörter gezählt?', 'a' => 'Ein Wort ist jede Folge von Buchstaben oder Ziffern. Wörter mit Bindestrich wie <em>E-Mail-Adresse</em> zählen als ein Wort. Satzzeichen und Emojis zählen nicht als Wörter.'],
            ['q' => 'Zählt die Zeichenanzahl Leerzeichen mit?', 'a' => 'Beides wird angezeigt: <strong>Zeichen</strong> enthält Leerzeichen und Zeilenumbrüche, <strong>Zeichen (ohne Leerzeichen)</strong> schließt alle Leerräume aus. Emojis und Umlaute zählen jeweils als ein Zeichen.'],
            ['q' => 'Wie wird die Lesezeit berechnet?', 'a' => 'Die Lesezeit geht von einer durchschnittlichen stillen Lesegeschwindigkeit von 238 Wörtern pro Minute aus. Die Sprechzeit nimmt 130 Wörter pro Minute an, ein übliches Tempo für Präsentationen.'],
            ['q' => 'Was ist die Keyword-Dichte?', 'a' => 'Sie gibt an, wie oft ein Wort im Verhältnis zur Gesamtwortzahl vorkommt. Sehr häufige Wörter wie <em>der</em>, <em>die</em> oder <em>und</em> werden ignoriert, damit du die Wörter siehst, die deinen Text ausmachen.'],
            ['q' => 'Wird mein Text gespeichert oder hochgeladen?', 'a' => 'Nein. Alles wird in deinem Browser gezählt. Dein Text wird nie an einen Server gesendet.'],
        ],
    ],

    'case-converter' => [
        'slug' => 'gross-kleinschreibung-aendern',
        'name' => 'Groß- und Kleinschreibung ändern',
        'short_description' => 'Text in GROSSBUCHSTABEN, kleinbuchstaben, Titel-Schreibweise, camelCase und mehr umwandeln.',
        'description' => 'Wandle Text mit einem Klick in Groß- oder Kleinbuchstaben, Titel-Schreibweise, Satzanfang groß oder Entwicklerformate wie camelCase, snake_case und kebab-case um.',
        'seo_title' => 'Groß- und Kleinschreibung online ändern',
        'seo_description' => 'Kostenloser Case Converter. Text in GROSSBUCHSTABEN, kleinbuchstaben, Titel-Schreibweise, Satzanfang groß, camelCase, snake_case und kebab-case umwandeln.',
        'content' => <<<'HTML'
<h2>Welche Schreibweise passt wann?</h2>
<ul>
<li><strong>Satzanfang groß</strong>: Fließtext, Oberflächentexte und die meisten Überschriften im Deutschen.</li>
<li><strong>Titel-Schreibweise</strong>: englische Überschriften, Buch- und Artikeltitel.</li>
<li><strong>GROSSBUCHSTABEN</strong>: kurze Labels, Abkürzungen und Hervorhebungen (sparsam).</li>
<li><strong>camelCase und PascalCase</strong>: Variablen, Funktionen und Klassen in JavaScript, Java und C#.</li>
<li><strong>snake_case und CONSTANT_CASE</strong>: Python, Ruby, SQL-Spalten und Konstanten.</li>
<li><strong>kebab-case</strong>: URLs, CSS-Klassen und Dateinamen.</li>
</ul>
<p>Du hast versehentlich einen ganzen Absatz mit aktivierter Feststelltaste getippt? Füge ihn hier ein und wandle ihn mit einem Klick in „Satzanfang groß“ um, statt alles neu zu schreiben. Um danach Wörter oder Zeichen zu zählen, nutze den Wortzähler.</p>
HTML,
        'steps' => [
            'Füge deinen Text in das Eingabefeld ein oder tippe ihn.',
            'Wähle eine Schreibweise: GROSSBUCHSTABEN, kleinbuchstaben, Titel-Schreibweise, Satzanfang groß und mehr.',
            'Für Code wandle den Text in <strong>camelCase</strong>, <strong>snake_case</strong>, <strong>kebab-case</strong>, <strong>PascalCase</strong> oder <strong>CONSTANT_CASE</strong> um.',
            'Kopiere den umgewandelten Text oder lade ihn als Datei herunter.',
        ],
        'faq' => [
            ['q' => 'Was ist die Titel-Schreibweise?', 'a' => 'Die Titel-Schreibweise (Title Case) schreibt den ersten Buchstaben jedes wichtigen Wortes groß, während kurze englische Wörter wie <em>a</em>, <em>and</em>, <em>of</em> und <em>the</em> klein bleiben, außer am Anfang oder Ende. Das ist der Stil englischer Schlagzeilen und Buchtitel; im Deutschen nutzt man „Satzanfang groß“.'],
            ['q' => 'Was ist der Unterschied zwischen Titel-Schreibweise und Jedes Wort Groß?', 'a' => '„Jedes Wort Groß“ schreibt jedes Wort groß, auch kurze. Die Titel-Schreibweise folgt den Regeln englischer Überschriften und lässt kleine Wörter klein.'],
            ['q' => 'Wie funktioniert „Satzanfang groß“?', 'a' => 'Alles wird kleingeschrieben und dann der erste Buchstabe jedes Satzes großgeschrieben. Substantive und Eigennamen musst du anschließend von Hand korrigieren.'],
            ['q' => 'Kann ich Text reparieren, der mit aktivierter Feststelltaste getippt wurde?', 'a' => 'Ja. Nutze uMGEKEHRT, um Groß- und Kleinbuchstaben zu tauschen, oder „Satzanfang groß“, um ihn korrekt neu zu schreiben.'],
            ['q' => 'Wird mein Text gespeichert?', 'a' => 'Nein. Die Umwandlung passiert in deinem Browser, und nichts wird hochgeladen.'],
        ],
    ],

    'text-compare' => [
        'slug' => 'texte-vergleichen',
        'name' => 'Texte vergleichen',
        'short_description' => 'Zwei Texte vergleichen und die Unterschiede hervorheben.',
        'description' => 'Füge zwei Versionen eines Textes ein und sieh genau, was hinzugefügt und entfernt wurde — zeilen- oder wortweise. Ideal für Dokumente, Verträge und Code.',
        'seo_title' => 'Texte vergleichen: Unterschiede finden',
        'seo_description' => 'Zwei Texte online vergleichen und Unterschiede zeilen- oder wortweise hervorheben. Groß-/Kleinschreibung und Leerzeichen ignorieren. Text bleibt im Browser.',
        'content' => <<<'HTML'
<h2>Was du vergleichen kannst</h2>
<ul>
<li>Zwei Versionen eines Vertrags, Aufsatzes oder Artikels.</li>
<li>Konfigurationsdateien und Code-Schnipsel.</li>
<li>Zu unterschiedlichen Zeitpunkten exportierte Listen, um Zu- und Abgänge zu sehen.</li>
<li>Übersetzungen oder Lektorate vor der Veröffentlichung.</li>
</ul>
<h2>Zeilen- oder wortweise vergleichen</h2>
<p>Der zeilenweise Modus zeigt, welche Zeilen sich geändert haben — perfekt für Code und Daten. Der wortweise Modus zeigt genau, welche Wörter sich innerhalb eines Absatzes geändert haben — ideal zum Korrekturlesen. Kombiniere ihn mit „Doppelte Zeilen entfernen“ und „Zeilen sortieren“, um Listen zu vergleichen, bei denen die Reihenfolge egal ist.</p>
HTML,
        'steps' => [
            'Füge links den Originaltext und rechts den geänderten Text ein.',
            "Die Unterschiede erscheinen sofort darunter: <span class='rounded bg-danger-soft px-1 text-danger'>entfernter</span> Text in Rot und <span class='rounded bg-success-soft px-1 text-success'>hinzugefügter</span> Text in Grün.",
            'Vergleiche <strong>zeilenweise</strong> für Code, Listen und Dokumente oder <strong>wortweise</strong>, um kleine Änderungen in Sätzen zu finden.',
            'Ignoriere Groß-/Kleinschreibung oder überflüssige Leerzeichen, wenn nur der Inhalt zählt.',
        ],
        'faq' => [
            ['q' => 'Wie funktioniert der Textvergleich?', 'a' => 'Das Tool nutzt den Diff-Algorithmus von Myers — denselben Ansatz wie Git —, um die kleinste Menge an Einfügungen und Löschungen zu finden, die den Originaltext in den neuen Text verwandelt.'],
            ['q' => 'Soll ich zeilen- oder wortweise vergleichen?', 'a' => 'Zeilenweise eignet sich am besten für Code, CSV-Daten, Listen und lange Dokumente. Wortweise hebt genau die geänderten Wörter in Sätzen hervor — ideal für Textkorrekturen und Vertragsversionen.'],
            ['q' => 'Kann ich Code vergleichen?', 'a' => 'Ja. Nutze den zeilenweisen Modus. Aktiviere „Leerzeichen ignorieren“, um reine Einrückungsänderungen auszublenden.'],
            ['q' => 'Gibt es ein Größenlimit?', 'a' => 'Texte mit Tausenden Zeilen werden sofort verglichen. Sind die beiden Texte extrem unterschiedlich, bittet dich das Tool, kleinere Abschnitte zu vergleichen.'],
            ['q' => 'Wird mein Text ins Internet hochgeladen?', 'a' => 'Nein. Der Vergleich läuft vollständig in deinem Browser, vertrauliche Dokumente bleiben also privat.'],
        ],
    ],

    'remove-duplicate-lines' => [
        'slug' => 'doppelte-zeilen-entfernen',
        'name' => 'Doppelte Zeilen entfernen',
        'short_description' => 'Wiederholte Zeilen aus einer Liste löschen und die Reihenfolge behalten.',
        'description' => 'Entferne doppelte Zeilen aus E-Mail-Listen, Keywords, URLs oder Namen in einem Schritt — mit Optionen, Groß-/Kleinschreibung zu ignorieren, Leerzeichen zu kürzen und leere Zeilen zu entfernen.',
        'seo_title' => 'Doppelte Zeilen aus jeder Liste entfernen',
        'seo_description' => 'Doppelte Zeilen kostenlos entfernen. Behält die ursprüngliche Reihenfolge, ignoriert auf Wunsch Groß-/Kleinschreibung und Leerzeichen. Auch für große Listen.',
        'content' => <<<'HTML'
<h2>Jede Liste bereinigen</h2>
<p>Duplikate schleichen sich in E-Mail-Listen, Keyword-Recherchen, Produktkataloge und Datenexporte ein. Wenn du sie entfernst, verschickst du keine E-Mail doppelt, zählst kein Keyword zweimal und importierst keine doppelten Datensätze in eine Datenbank.</p>
<h2>Tipps</h2>
<ul>
<li>Aktiviere <strong>Groß-/Kleinschreibung ignorieren</strong> für E-Mails und Keywords, bei denen sie keine Rolle spielt.</li>
<li>Lass <strong>Überflüssige Leerzeichen entfernen</strong> aktiviert, um Duplikate zu finden, die sich nur durch unsichtbare Leerzeichen unterscheiden.</li>
<li>Du brauchst die Liste auch alphabetisch? Schick sie durch „Zeilen sortieren“.</li>
</ul>
<h2>Funktioniert mit Tabellendaten</h2>
<p>Kopiere eine Spalte aus Excel oder Google Tabellen, füge sie hier ein und füge die eindeutigen Werte wieder zurück. Jede Zelle wird zu einer Zeile — so bereinigst du Tausende Zeilen in Sekunden, ganz ohne Formeln.</p>
HTML,
        'steps' => [
            'Füge deine Liste in das Eingabefeld ein, einen Eintrag pro Zeile.',
            'Doppelte Zeilen werden sofort entfernt. Das erste Vorkommen jeder Zeile bleibt in der ursprünglichen Reihenfolge erhalten.',
            'Lege fest, ob <strong>Apfel</strong> und <strong>apfel</strong> als dieselbe Zeile gelten und ob Leerzeichen gekürzt und leere Zeilen entfernt werden sollen.',
            'Kopiere die bereinigte Liste oder lade sie als Textdatei herunter.',
        ],
        'faq' => [
            ['q' => 'Bleibt die ursprüngliche Reihenfolge erhalten?', 'a' => 'Ja. Die Zeilen behalten ihre ursprüngliche Reihenfolge, nur spätere Wiederholungen werden entfernt. Um die Liste zusätzlich zu sortieren, nutze „Zeilen sortieren“.'],
            ['q' => 'Was bewirkt „Groß-/Kleinschreibung ignorieren“?', 'a' => 'Ist die Option aktiv, gelten Zeilen, die sich nur in der Groß- und Kleinschreibung unterscheiden (etwa <em>Email</em> und <em>email</em>), als Duplikate, und nur die erste bleibt erhalten.'],
            ['q' => 'Wozu dient das Entfernen überflüssiger Leerzeichen?', 'a' => 'Aus Tabellen oder Dokumenten kopierte Zeilen haben oft unsichtbare Leerzeichen am Anfang oder Ende. Werden sie entfernt, werden solche Zeilen sicher als Duplikate erkannt.'],
            ['q' => 'Kann ich eine E-Mail- oder Keyword-Liste bereinigen?', 'a' => 'Ja. Es funktioniert mit jeder Liste: E-Mails, URLs, Keywords, Artikelnummern oder Namen. Große Listen mit Hunderttausenden Zeilen werden im Nu verarbeitet.'],
            ['q' => 'Bleiben meine Daten privat?', 'a' => 'Ja. Der Text wird in deinem Browser verarbeitet und nie hochgeladen.'],
        ],
    ],

    'sort-lines' => [
        'slug' => 'zeilen-sortieren',
        'name' => 'Zeilen sortieren',
        'short_description' => 'Zeilen alphabetisch, nach Länge, umgekehrt oder zufällig sortieren.',
        'description' => 'Sortiere jede Liste von A bis Z oder Z bis A mit natürlicher Zahlensortierung, nach Länge, umgekehrt oder zufällig gemischt. Optional Duplikate und leere Zeilen entfernen.',
        'seo_title' => 'Zeilen alphabetisch sortieren online',
        'seo_description' => 'Textzeilen online alphabetisch sortieren: A–Z, Z–A, natürliche Zahlensortierung, nach Länge, umgekehrt oder zufällig. Kostenlos und sofort.',
        'content' => <<<'HTML'
<h2>Listen so sortieren, wie man es erwartet</h2>
<p>Eine einfache alphabetische Sortierung setzt „Eintrag 10“ vor „Eintrag 2“, weil sie Zeichen für Zeichen vergleicht. Die natürliche Sortierung vergleicht Zahlen nach ihrem Wert — so landen Dateinamen, Versionen, Kapitel und Rechnungsnummern in der richtigen Reihenfolge.</p>
<h2>Beliebte Anwendungen</h2>
<ul>
<li>Namen, Glossare und Literaturverzeichnisse alphabetisch ordnen.</li>
<li>Eine Liste für Verlosungen, Zufallsteams oder Quizfragen mischen.</li>
<li>Ein Protokoll oder eine Zeitleiste umkehren.</li>
<li>Keywords oder URLs sortieren, bevor du sie mit „Texte vergleichen“ abgleichst.</li>
</ul>
<p>Um wiederholte Einträge zu entfernen, ohne die Reihenfolge zu ändern, nutze „Doppelte Zeilen entfernen“.</p>
HTML,
        'steps' => [
            'Füge deine Liste in das Eingabefeld ein, einen Eintrag pro Zeile.',
            'Wähle die Reihenfolge: <strong>A → Z</strong>, <strong>Z → A</strong>, nach Länge, umgekehrt oder zufällig (mischen).',
            'Lass <strong>Natürliche Sortierung</strong> aktiviert, damit <em>Eintrag 2</em> vor <em>Eintrag 10</em> steht.',
            'Entferne bei Bedarf Duplikate und leere Zeilen und kopiere oder lade die sortierte Liste herunter.',
        ],
        'faq' => [
            ['q' => 'Was ist natürliche Sortierung?', 'a' => 'Die natürliche Sortierung ordnet Zahlen im Text nach ihrem Wert, so wie ein Mensch es erwartet: <em>Datei 2</em> kommt vor <em>Datei 10</em>. Eine einfache alphabetische Sortierung würde <em>Datei 10</em> zuerst einordnen.'],
            ['q' => 'Wie sortiere ich eine Liste alphabetisch?', 'a' => 'Füge die Liste ein und wähle A → Z. Die Sortierung ignoriert Groß-/Kleinschreibung, außer du aktivierst „Groß-/Kleinschreibung beachten“.'],
            ['q' => 'Wie mische ich eine Liste zufällig?', 'a' => 'Wähle „Zufällig“. Jeder Klick auf <strong>Neu mischen</strong> erzeugt eine neue Zufallsreihenfolge — praktisch für Verlosungen, Teameinteilungen oder Quizfragen.'],
            ['q' => 'Funktioniert es mit Umlauten und anderen Sprachen?', 'a' => 'Ja. Die Sortierung nutzt einen sprachbewussten Vergleich, Umlaute werden also bei ihrem Grundbuchstaben einsortiert.'],
            ['q' => 'Wird meine Liste ins Internet hochgeladen?', 'a' => 'Nein. Die Sortierung passiert in deinem Browser.'],
        ],
    ],

    'lorem-ipsum-generator' => [
        'slug' => 'lorem-ipsum-generator',
        'name' => 'Lorem-Ipsum-Generator',
        'short_description' => 'Blindtext nach Absätzen, Sätzen oder Wörtern erzeugen.',
        'description' => 'Erzeuge Lorem-Ipsum-Blindtext für Mockups und Layouts. Wähle Absätze, Sätze oder Wörter, behalte den klassischen Anfang und exportiere als reinen Text oder HTML.',
        'seo_title' => 'Lorem-Ipsum-Generator: Blindtext erzeugen',
        'seo_description' => 'Lorem-Ipsum-Blindtext online erzeugen. Absätze, Sätze oder Wörter, optional HTML-Absätze und Kopieren mit einem Klick. Kostenlos für jedes Projekt.',
        'content' => <<<'HTML'
<h2>Woher kommt Lorem Ipsum?</h2>
<p>Die klassische Passage stammt aus „De finibus bonorum et malorum“, das Cicero 45 v. Chr. schrieb. Drucker nutzen seit dem 16. Jahrhundert verwürfelte Versionen dieses Textes, weil er eine natürliche Verteilung von Buchstaben und Wortlängen hat — Layouts wirken realistisch, ohne dass der Inhalt ablenkt.</p>
<h2>Tipps für Designer und Entwickler</h2>
<ul>
<li>Verwende realistische Längen: Erzeuge so viele Wörter, wie dein echter Inhalt haben wird.</li>
<li>Ersetze den Blindtext so früh wie möglich durch echten Text — Inhalt prägt das Design.</li>
<li>Nutze die HTML-Option, um Absätze direkt in deine Prototypen einzufügen.</li>
</ul>
<p>Du willst wissen, wie lang dein echter Text ist? Nutze den Wortzähler.</p>
HTML,
        'steps' => [
            'Wähle, wie viel Blindtext du brauchst und ob in <strong>Absätzen</strong>, <strong>Sätzen</strong> oder <strong>Wörtern</strong>.',
            'Lass <strong>Mit „Lorem ipsum…“ beginnen</strong> aktiviert für den klassischen Anfang oder deaktiviere es für vollständig zufälligen Text.',
            'Aktiviere <strong>HTML</strong>, um jeden Absatz in <code>&lt;p&gt;</code>-Tags zu setzen — fertig zum Einfügen in eine Webseite.',
            'Kopiere oder lade den Text herunter. Klicke auf <strong>Generieren</strong> für eine neue Variante.',
        ],
        'faq' => [
            ['q' => 'Was ist Lorem Ipsum?', 'a' => 'Lorem Ipsum ist verwürfelter lateinischer Blindtext, abgeleitet aus einem Werk Ciceros. Designer und Entwickler nutzen ihn, um Layouts zu füllen, damit die Aufmerksamkeit beim Design statt beim Inhalt liegt.'],
            ['q' => 'Warum Blindtext statt echtem Text?', 'a' => 'Er zeigt, wie echter Text in einem Layout fließen wird — Zeilenlänge, Absatzabstände und Typografie —, bevor der endgültige Text fertig ist, ohne dass die Bedeutung ablenkt.'],
            ['q' => 'Darf ich den erzeugten Text kostenlos verwenden?', 'a' => 'Ja. Lorem Ipsum ist nicht urheberrechtlich geschützt, und du kannst den erzeugten Text in jedem Projekt verwenden.'],
            ['q' => 'Wie viel Text kann ich erzeugen?', 'a' => 'Bis zu 200 Absätze oder Sätze bzw. 5000 Wörter auf einmal.'],
        ],
    ],
];
