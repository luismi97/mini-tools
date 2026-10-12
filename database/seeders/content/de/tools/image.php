<?php

/*
| German copy for the image tools. See content/de/tools.php.
*/

return [
    'image-compressor' => [
        'slug' => 'bilder-komprimieren',
        'name' => 'Bilder komprimieren',
        'short_description' => 'JPG-, PNG- und WebP-Bilder ohne sichtbaren Qualitätsverlust verkleinern.',
        'description' => 'Komprimiere ein oder mehrere Bilder auf einmal und sieh, wie viel jede Datei spart. Die Bilder werden auf deinem Gerät verarbeitet und nie auf einen Server hochgeladen.',
        'seo_title' => 'Bilder komprimieren: JPG, PNG und WebP online',
        'seo_description' => 'JPG-, PNG- und WebP-Bilder kostenlos online komprimieren. Einstellbare Qualität, Stapelverarbeitung und sofortiger Download. Deine Dateien bleiben bei dir.',
        'content' => <<<'HTML'
<h2>Warum Bilder komprimieren?</h2>
<p>Große Bilder sind die häufigste Ursache für langsame Websites. Komprimieren verkleinert die Dateigröße — oft um 60 bis 80 % — ohne sichtbaren Unterschied und verbessert so Ladezeit, Core Web Vitals und SEO. Kleinere Dateien lassen sich außerdem leichter per E-Mail verschicken, in Formulare mit Größenlimit hochladen und speichern.</p>
<h2>Verlustbehaftete und verlustfreie Kompression</h2>
<p>JPG und WebP komprimieren verlustbehaftet: Sie verwerfen Details, die das Auge kaum bemerkt — deshalb wirkt der Qualitätsregler so stark. PNG ist verlustfrei, bei als PNG gespeicherten Fotos sparst du daher am meisten, wenn du sie in WebP oder JPG umwandelst oder mit „Bildgröße ändern“ verkleinerst.</p>
<h2>Die besten Formate fürs Web</h2>
<ul>
<li><strong>WebP</strong>: insgesamt die beste Wahl für Websites; siehe „JPG in WebP“ und „PNG in WebP“.</li>
<li><strong>JPG</strong>: universell kompatibel für Fotos.</li>
<li><strong>PNG</strong>: Screenshots, Logos und Grafiken, die scharfe Kanten oder Transparenz brauchen.</li>
</ul>
HTML,
        'steps' => [
            'Zieh deine JPG-, PNG- oder WebP-Bilder in das Feld, klicke zum Auswählen oder füge ein Bild mit Strg + V ein.',
            'Stell den Regler <strong>Qualität</strong> ein. 70–80 % verkleinert die Datei meist stark ohne sichtbaren Unterschied.',
            'Wandle bei Bedarf in ein anderes Format um oder begrenze die maximale Breite — große Fotos zu verkleinern spart am meisten Platz.',
            'Lade jedes Bild einzeln herunter oder klicke auf <strong>Alle herunterladen</strong>, um alle komprimierten Bilder als ZIP zu erhalten.',
        ],
        'faq' => [
            ['q' => 'Werden meine Bilder auf einen Server hochgeladen?', 'a' => 'Nein. Die Komprimierung läuft vollständig in deinem Browser auf deinem Gerät. Deine Bilder werden nie hochgeladen, gespeichert oder von jemand anderem gesehen.'],
            ['q' => 'Welche Qualität soll ich wählen?', 'a' => 'Für Fotos auf Websites ist 70–80 % ein guter Kompromiss zwischen Größe und Qualität. Nutze 85–95 % für Bilder, bei denen Details wichtig sind, und 50–65 %, wenn die kleinste Datei Vorrang hat.'],
            ['q' => 'Warum ist mein PNG kaum kleiner geworden?', 'a' => 'PNG ist verlustfrei, der Qualitätsregler wirkt daher kaum. Für deutlich kleinere Dateien wandle PNG-Fotos über das Ausgabeformat in <strong>WebP</strong> oder <strong>JPG</strong> um oder reduziere die maximale Breite. Wird die Datei durch das Neukodieren größer, bleibt das Original erhalten.'],
            ['q' => 'Entfernt die Komprimierung EXIF-Metadaten?', 'a' => 'Ja. Neu kodierte Bilder enthalten keine EXIF-Metadaten wie Kameradaten oder GPS-Standort, was auch deine Privatsphäre schützt. Die Ausrichtung wird vor dem Entfernen angewendet.'],
            ['q' => 'Wie viele Bilder kann ich auf einmal komprimieren?', 'a' => 'Bis zu 30 Bilder pro Durchgang, jeweils bis 25 MB.'],
        ],
    ],

    'image-resizer' => [
        'slug' => 'bildgroesse-aendern',
        'name' => 'Bildgröße ändern',
        'short_description' => 'Bilder in Pixeln oder Prozent skalieren, einzeln oder viele auf einmal.',
        'description' => 'Ändere Breite und Höhe von JPG-, PNG- und WebP-Bildern auf exakte Pixel oder prozentual, mit beibehaltenem Seitenverhältnis. Skaliere im Stapel und lade alles als ZIP herunter.',
        'seo_title' => 'Bildgröße ändern: JPG, PNG und WebP kostenlos',
        'seo_description' => 'Bildgröße kostenlos online ändern. Breite und Höhe in Pixeln oder prozentual, Seitenverhältnis beibehalten, im Stapel verarbeiten. Ohne Upload.',
        'content' => <<<'HTML'
<h2>Warum die Bildgröße ändern?</h2>
<p>Handykameras liefern Fotos mit 4000 Pixeln Breite oder mehr — viel größer, als ein Bildschirm braucht. Wenn du sie auf die tatsächliche Anzeigegröße bringst, laden sie schneller, brauchen weniger Speicher und erfüllen die Vorgaben von Websites, Onlineshops und sozialen Netzwerken.</p>
<h2>Empfohlene Bildgrößen</h2>
<ul>
<li><strong>Hero-Bilder auf Websites:</strong> 1920 px breit.</li>
<li><strong>Blog- und Produktbilder:</strong> 800–1200 px breit.</li>
<li><strong>Instagram-Beiträge:</strong> 1080 × 1080 px (quadratisch) oder 1080 × 1350 px (Hochformat).</li>
<li><strong>YouTube-Thumbnails:</strong> 1280 × 720 px.</li>
<li><strong>E-Mail-Anhänge:</strong> 1200–1600 px an der langen Seite.</li>
</ul>
<p>Du brauchst einen exakten Ausschnitt statt einer kleineren Größe? Nutze „Bild zuschneiden“, um das Foto auf ein bestimmtes Seitenverhältnis zu bringen, und verkleinere es danach mit „Bilder komprimieren“.</p>
HTML,
        'steps' => [
            'Zieh deine JPG-, PNG- oder WebP-Bilder in das Feld, wähle sie aus oder füge sie mit Strg + V ein. Du kannst viele auf einmal skalieren.',
            'Wähle <strong>Prozentual</strong>, um alles zu skalieren (zum Beispiel 50 %), oder <strong>Nach Größe</strong>, um eine exakte Breite und/oder Höhe in Pixeln festzulegen.',
            'Lass <strong>Seitenverhältnis beibehalten</strong> aktiviert, um Verzerrungen zu vermeiden. Gibst du Breite und Höhe an, wird jedes Bild in diesen Rahmen eingepasst.',
            'Lade jedes Bild einzeln herunter oder klicke auf <strong>Alle herunterladen</strong> für ein ZIP.',
        ],
        'faq' => [
            ['q' => 'Verringert das Skalieren die Qualität?', 'a' => 'Beim Verkleinern bleibt ein Bild scharf. Beim Vergrößern über die Originalgröße hinaus können keine Details entstehen, es kann also etwas unscharf wirken. Bei JPG und WebP kannst du zusätzlich die Ausgabequalität wählen.'],
            ['q' => 'Wie ändere ich die Größe, ohne das Bild zu verzerren?', 'a' => 'Lass <strong>Seitenverhältnis beibehalten</strong> aktiviert und gib nur die Breite oder nur die Höhe ein. Die andere Seite wird automatisch berechnet.'],
            ['q' => 'Wie groß sollten Bilder fürs Web sein?', 'a' => 'Für die meisten Websites reichen 1200–1920 px Breite für bildschirmfüllende Bilder und 600–800 px für Bilder im Inhalt. Kleinere Bilder laden schneller und verbessern die Core Web Vitals.'],
            ['q' => 'Werden meine Bilder ins Internet hochgeladen?', 'a' => 'Nein. Die Bilder werden in deinem Browser skaliert und verlassen dein Gerät nie.'],
            ['q' => 'Wie viele Bilder kann ich auf einmal skalieren?', 'a' => 'Bis zu 30 Bilder pro Durchgang, jeweils bis 25 MB.'],
        ],
    ],

    'heic-to-jpg' => [
        'slug' => 'heic-in-jpg',
        'name' => 'HEIC in JPG',
        'short_description' => 'HEIC-Fotos vom iPhone im Browser in JPG oder PNG umwandeln.',
        'description' => 'Wandle HEIC- und HEIF-Fotos von iPhone oder iPad in JPG oder PNG um. Im Stapel umwandeln und alles als ZIP herunterladen — deine Fotos werden nie hochgeladen.',
        'seo_title' => 'HEIC in JPG umwandeln: iPhone-Fotos kostenlos',
        'seo_description' => 'HEIC kostenlos in JPG umwandeln. iPhone-Fotos im Stapel im Browser in JPG oder PNG konvertieren: privat, ohne Upload und ohne Anmeldung.',
        'content' => <<<'HTML'
<h2>Warum HEIC in JPG umwandeln?</h2>
<p>iPhones speichern Fotos standardmäßig im HEIC-Format, weil sie nur etwa halb so groß wie ein JPG sind. Das Problem ist die Kompatibilität: Viele Windows-Programme, Websites, Online-Formulare, ältere Android-Handys und Fotodruckdienste öffnen HEIC-Dateien immer noch nicht. Als JPG lassen sich deine Fotos überall öffnen.</p>
<h2>HEIC-Dateien unter Windows öffnen</h2>
<p>Windows braucht einen zusätzlichen Codec, um HEIC zu öffnen. Statt etwas zu installieren, zieh die Fotos einfach hierher und wandle sie in Sekunden in JPG um. Die Umwandlung passiert in deinem Browser, deine privaten Fotos werden also nie hochgeladen.</p>
<h2>JPG oder PNG?</h2>
<p>Wähle <strong>JPG</strong> für Fotos — die Dateien sind klein und funktionieren überall. Wähle <strong>PNG</strong> nur, wenn du verlustfreie Qualität zum Bearbeiten brauchst. Nach dem Umwandeln kannst du die Dateien mit „Bilder komprimieren“ oder „Bildgröße ändern“ weiter verkleinern.</p>
HTML,
        'steps' => [
            'Zieh deine HEIC- oder HEIF-Fotos (von iPhone oder iPad) in das Feld oder klicke, um sie auszuwählen. Du kannst viele auf einmal umwandeln.',
            'Wähle das Ausgabeformat: <strong>JPG</strong> für kleine Dateien, die sich überall öffnen, oder <strong>PNG</strong> für verlustfreie Qualität.',
            'Passe bei Bedarf die Qualität an. Bei 85–92 % sehen Fotos aus wie das Original.',
            'Lade jedes Foto einzeln herunter oder klicke auf <strong>Alle herunterladen</strong> für ein ZIP mit allen umgewandelten Bildern.',
        ],
        'faq' => [
            ['q' => 'Was ist eine HEIC-Datei?', 'a' => 'HEIC (High Efficiency Image Container) ist seit iOS 11 das Standard-Fotoformat von iPhone und iPad. Es spart Speicherplatz, aber viele Windows-Programme, Websites und ältere Geräte können es nicht öffnen.'],
            ['q' => 'Werden meine Fotos ins Internet hochgeladen?', 'a' => 'Nein. Deine Fotos werden in deinem Browser umgewandelt und verlassen dein Gerät nie — wichtig bei privaten Bildern.'],
            ['q' => 'Bleibt die Ausrichtung des Fotos erhalten?', 'a' => 'Ja. Die in der HEIC-Datei gespeicherte Drehung wird angewendet, Hochformatfotos stehen also aufrecht.'],
            ['q' => 'Warum dauert die erste Umwandlung ein paar Sekunden?', 'a' => 'Die meisten Browser können HEIC nicht selbst lesen, daher lädt der Konverter beim ersten Mal einen HEIC-Decoder. Danach geht es schnell. Safari kann HEIC nativ dekodieren.'],
            ['q' => 'Wird der Standort (GPS) entfernt?', 'a' => 'Ja. Umgewandelte Bilder enthalten keine EXIF-Metadaten wie GPS-Standort oder Kameradaten.'],
            ['q' => 'Wie verhindere ich, dass mein iPhone in HEIC speichert?', 'a' => 'Gehe zu Einstellungen › Kamera › Formate und wähle <strong>Maximale Kompatibilität</strong>. Neue Fotos werden dann als JPG gespeichert.'],
        ],
    ],

    'crop-image' => [
        'slug' => 'bild-zuschneiden',
        'name' => 'Bild zuschneiden',
        'short_description' => 'Fotos visuell oder auf exakte Größen und Seitenverhältnisse zuschneiden.',
        'description' => 'Zieh einen Rahmen um den Bereich, den du behalten willst, wähle ein Seitenverhältnis wie 1:1 oder 16:9 oder gib exakte Pixelwerte ein. Lade das zugeschnittene Bild als JPG, PNG oder WebP herunter.',
        'seo_title' => 'Bild zuschneiden online kostenlos',
        'seo_description' => 'Bilder kostenlos online zuschneiden. Bereich per Maus wählen, Formate wie 1:1, 4:3 und 16:9 oder exakte Pixel nutzen und als JPG, PNG oder WebP laden.',
        'content' => <<<'HTML'
<h2>Zuschnitte für soziale Netzwerke</h2>
<ul>
<li><strong>1:1</strong>: Profilbilder und quadratische Beiträge.</li>
<li><strong>4:5</strong>: Instagram-Beiträge im Hochformat, die im Feed mehr Platz einnehmen.</li>
<li><strong>9:16</strong>: Stories, Reels, TikTok und YouTube Shorts.</li>
<li><strong>16:9</strong>: YouTube-Thumbnails, Präsentationen und Web-Banner.</li>
</ul>
<h2>Gestaltungstipp: die Drittelregel</h2>
<p>Das Raster in der Auswahl teilt sie in Drittel. Wenn du das Motiv auf eine der Linien oder Schnittpunkte setzt, wirkt das Foto meist ausgewogener und natürlicher, als wenn es in der Mitte steht.</p>
<p>Nach dem Zuschneiden kannst du mit „Bildgröße ändern“ eine exakte Pixelgröße erreichen oder die Datei mit „Bilder komprimieren“ verkleinern.</p>
HTML,
        'steps' => [
            'Zieh ein Bild in das Feld, klicke zum Auswählen oder füge es mit Strg + V ein.',
            'Zieh die Auswahl, um sie zu verschieben, und die Ecken, um ihre Größe zu ändern. Mit den Pfeiltasten verschiebst du pixelgenau (mit Umschalt um 10 px).',
            'Wähle ein Seitenverhältnis wie <strong>1:1</strong> für Profilbilder, <strong>16:9</strong> für Thumbnails oder <strong>9:16</strong> für Stories, oder gib exakte Pixelwerte ein.',
            'Wähle das Ausgabeformat und klicke auf <strong>Zuschneiden und herunterladen</strong>.',
        ],
        'faq' => [
            ['q' => 'Welches Seitenverhältnis soll ich verwenden?', 'a' => 'Nutze 1:1 für Profilbilder und Instagram-Beiträge, 4:5 für Instagram-Beiträge im Hochformat, 16:9 für YouTube-Thumbnails und Präsentationen, 9:16 für Stories und Reels sowie 3:2 oder 4:3 für klassische Fotoabzüge.'],
            ['q' => 'Verringert das Zuschneiden die Qualität?', 'a' => 'Beim Zuschneiden bleiben die Originalpixel des gewählten Bereichs in voller Auflösung erhalten. Bei JPG und WebP kannst du die Qualität wählen; die PNG-Ausgabe ist verlustfrei.'],
            ['q' => 'Wird mein Foto ins Internet hochgeladen?', 'a' => 'Nein. Das Bild wird in deinem Browser zugeschnitten und verlässt dein Gerät nie.'],
            ['q' => 'Welche Formate werden unterstützt?', 'a' => 'Du kannst JPG-, PNG- und WebP-Bilder bis 25 MB zuschneiden und das Ergebnis als JPG, PNG oder WebP speichern.'],
        ],
    ],

    'jpg-to-webp' => [
        'slug' => 'jpg-in-webp',
        'name' => 'JPG in WebP',
        'short_description' => 'JPG-Bilder ins kleinere und schnellere WebP-Format umwandeln.',
        'description' => 'Wandle JPG- und JPEG-Bilder mit einstellbarer Qualität in WebP um. Mehrere Dateien auf einmal umwandeln und einzeln oder zusammen herunterladen. Alles läuft in deinem Browser.',
        'seo_title' => 'JPG in WebP umwandeln – kostenlos und privat',
        'seo_description' => 'JPG kostenlos online in WebP umwandeln. Stapelumwandlung, einstellbare Qualität und ZIP-Download. Die Bilder werden im Browser umgewandelt, ohne Upload.',
        'content' => <<<'HTML'
<h2>Warum JPG in WebP umwandeln?</h2>
<p>WebP-Bilder sind bei gleicher sichtbarer Qualität meist 25–35 % kleiner als JPG. Kleinere Bilder lassen Seiten schneller laden, verbessern den Largest Contentful Paint (LCP) und helfen beim Google-Ranking, das die Page Experience als Signal nutzt. Alle modernen Browser unterstützen WebP.</p>
<h2>WebP auf deiner Website nutzen</h2>
<p>Die meisten Content-Management-Systeme, auch WordPress, akzeptieren WebP-Bilder. Für beste Ergebnisse bringe die Bilder vor dem Umwandeln mit „Bildgröße ändern“ auf ihre Anzeigegröße und halte die Qualität zwischen 75 und 85 %.</p>
<p>Du wandelst Grafiken mit Transparenz um? Nutze „PNG in WebP“. Du brauchst wieder ein universelles Format? Nutze „WebP in JPG“.</p>
HTML,
        'steps' => [
            'Zieh deine JPG-Bilder in das Feld, klicke zum Auswählen oder füge ein Bild mit Strg + V ein. Du kannst mehrere auf einmal hinzufügen.',
            'Wähle die <strong>Qualität</strong>. Bei 75–85 % erhältst du optisch identische, aber deutlich kleinere WebP-Dateien.',
            'Jedes Bild wird sofort in deinem Browser umgewandelt. Prüfe die neue Größe und die Ersparnis in Prozent.',
            'Lade die Bilder einzeln herunter oder klicke auf <strong>Alle herunterladen</strong> für ein ZIP mit allen WebP-Dateien.',
        ],
        'faq' => [
            ['q' => 'Was ist WebP?', 'a' => 'WebP ist ein modernes Bildformat von Google. Bei gleicher sichtbarer Qualität sind WebP-Dateien meist 25–35 % kleiner als JPG, was Websites schneller macht und die Core Web Vitals verbessert.'],
            ['q' => 'Werden meine Bilder ins Internet hochgeladen?', 'a' => 'Nein. Die Umwandlung passiert vollständig in deinem Browser. Deine Bilder verlassen dein Gerät nie.'],
            ['q' => 'Unterstützen alle Browser WebP?', 'a' => 'Ja. Alle modernen Browser (Chrome, Edge, Firefox und Safari ab 14) zeigen WebP-Bilder an. Zum Erstellen von WebP-Dateien braucht es einen aktuellen Browser — falls deiner es nicht kann, sagt dir das Tool Bescheid.'],
            ['q' => 'Kann ich auch PNG in WebP umwandeln?', 'a' => 'Ja. PNG-Dateien werden ebenfalls akzeptiert, und die Transparenz bleibt im WebP erhalten.'],
            ['q' => 'Gibt es Limits?', 'a' => 'Du kannst bis zu 30 Bilder pro Durchgang umwandeln, jeweils bis 25 MB.'],
        ],
    ],

    'png-to-webp' => [
        'slug' => 'png-in-webp',
        'name' => 'PNG in WebP',
        'short_description' => 'PNG-Bilder in WebP umwandeln und die Transparenz behalten.',
        'description' => 'Wandle PNG-Dateien in WebP um, damit sie viel kleiner werden, ohne die Transparenz zu verlieren. Im Stapel umwandeln und einzeln oder als ZIP herunterladen — direkt im Browser.',
        'seo_title' => 'PNG in WebP mit Transparenz umwandeln, kostenlos',
        'seo_description' => 'PNG kostenlos online in WebP umwandeln. Transparenz bleibt erhalten, Stapelumwandlung, einstellbare Qualität und ZIP-Download. Bilder bleiben bei dir.',
        'content' => <<<'HTML'
<h2>PNG oder WebP</h2>
<p>PNG ist großartig für Grafiken mit Transparenz, aber die Dateien sind groß. WebP unterstützt ebenfalls Transparenz und ist meist deutlich kleiner — Logos, Icons, Screenshots und Produktbilder mit transparentem Hintergrund in WebP umzuwandeln, macht Websites schneller, ohne transparente Bereiche zu verlieren.</p>
<h2>Wann du PNG behalten solltest</h2>
<p>Bewahre das Original-PNG als Masterdatei für spätere Bearbeitungen und für Orte auf, die kein WebP akzeptieren. Für JPG-Fotos nutze „JPG in WebP“; um Bilder ohne Formatwechsel zu verkleinern, nutze „Bilder komprimieren“.</p>
<p>Die Umwandlung passiert auf deinem eigenen Gerät: Deine Dateien werden nie hochgeladen, und du kannst mehrere auf einmal umwandeln, die Größe jedes Ergebnisses prüfen und alles zusammen herunterladen.</p>
HTML,
        'steps' => [
            'Zieh deine PNG-Bilder in das Feld, klicke zum Auswählen oder füge einen Screenshot mit Strg + V ein.',
            'Stell die <strong>Qualität</strong> ein. Bei 80–90 % bleiben Grafiken und Screenshots scharf, während die Größe stark sinkt.',
            'Jedes PNG wird sofort in deinem Browser in WebP umgewandelt — transparente Hintergründe bleiben erhalten.',
            'Lade die Bilder einzeln herunter oder nutze <strong>Alle herunterladen</strong> für ein ZIP.',
        ],
        'faq' => [
            ['q' => 'Behält WebP die PNG-Transparenz?', 'a' => 'Ja. WebP unterstützt einen Alphakanal, transparente und halbtransparente Bereiche deines PNGs bleiben also erhalten.'],
            ['q' => 'Wie viel kleiner ist WebP als PNG?', 'a' => 'Bei Fotos und komplexen Bildern ist WebP oft 50–80 % kleiner als PNG. Bei einfachen Grafiken mit wenigen Farben ist die Ersparnis geringer, aber WebP ist meist trotzdem kleiner.'],
            ['q' => 'Kann ich WebP auf meiner Website nutzen?', 'a' => 'Ja. Alle modernen Browser unterstützen WebP, und kleinere Bilder verbessern Ladezeit und Core Web Vitals.'],
            ['q' => 'Werden meine Dateien ins Internet hochgeladen?', 'a' => 'Nein. Die Umwandlung passiert auf deinem Gerät. Deine Bilder werden nie hochgeladen.'],
        ],
    ],

    'webp-to-jpg' => [
        'slug' => 'webp-in-jpg',
        'name' => 'WebP in JPG',
        'short_description' => 'WebP-Bilder in überall kompatible JPGs umwandeln.',
        'description' => 'Wandle WebP-Bilder in JPG um, damit sie sich überall öffnen lassen: in älteren Programmen, E-Mails und Druckdiensten. Im Stapel umwandeln und alles als ZIP herunterladen.',
        'seo_title' => 'WebP in JPG umwandeln – online, kostenlos, schnell',
        'seo_description' => 'WebP kostenlos online in JPG umwandeln. Stapelumwandlung, einstellbare Qualität und ZIP-Download. Die Umwandlung passiert im Browser, ohne Upload.',
        'content' => <<<'HTML'
<h2>Warum landen bei dir WebP-Bilder?</h2>
<p>Viele Websites liefern ihre Bilder als WebP aus, um schneller zu laden — gespeicherte Bilder aus dem Netz sind daher oft <code>.webp</code>-Dateien. Manche Programme, Drucker, E-Mail-Programme und Formulare akzeptieren sie noch nicht; als JPG ist das Problem gelöst.</p>
<h2>Tipps</h2>
<ul>
<li>JPG hat keine Transparenz: Transparente Bereiche werden weiß.</li>
<li>Nutze 85–92 % Qualität für Fotos, die du vielleicht drucken willst.</li>
<li>Das Bild soll danach kleiner werden? Nutze „Bilder komprimieren“ oder „Bildgröße ändern“.</li>
</ul>
<h2>Ist das Umwandeln meiner Fotos sicher?</h2>
<p>Ja. Die Umwandlung passiert auf deinem eigenen Gerät, deine Bilder werden nie hochgeladen. Deine Original-WebP-Dateien bleiben unverändert: Das Tool erstellt neue JPG-Kopien, die du einzeln oder zusammen als ZIP herunterladen kannst.</p>
HTML,
        'steps' => [
            'Zieh deine WebP-Bilder in das Feld oder klicke, um sie auszuwählen. Stapelumwandlung wird unterstützt.',
            'Stell die JPG-<strong>Qualität</strong> ein. 85–92 % liefert bei Fotos hervorragende Ergebnisse.',
            'Jedes Bild wird in deinem Browser in JPG umgewandelt. Transparente Bereiche werden weiß, weil JPG keine Transparenz kennt.',
            'Lade die JPG-Dateien einzeln oder zusammen als ZIP herunter.',
        ],
        'faq' => [
            ['q' => 'Warum WebP in JPG umwandeln?', 'a' => 'JPG funktioniert überall: in älteren Bildbearbeitungen, E-Mail-Programmen, Office-Dokumenten, Druckdiensten und auf Plattformen, die kein WebP akzeptieren.'],
            ['q' => 'Was passiert mit transparenten Hintergründen?', 'a' => 'JPG unterstützt keine Transparenz, transparente Bereiche werden daher weiß gefüllt. Um die Transparenz zu behalten, wandle mit „WebP in PNG“ in PNG um.'],
            ['q' => 'Sinkt die Bildqualität?', 'a' => 'Ab 85 % Qualität ist bei Fotos kein Unterschied sichtbar. Das JPG kann größer als das WebP sein, weil JPG weniger effizient komprimiert.'],
            ['q' => 'Werden meine Bilder ins Internet hochgeladen?', 'a' => 'Nein. Die Umwandlung passiert in deinem Browser, deine Bilder verlassen dein Gerät nie.'],
        ],
    ],

    'png-to-jpg' => [
        'slug' => 'png-in-jpg',
        'name' => 'PNG in JPG',
        'short_description' => 'PNG-Bilder und Screenshots in kleinere JPG-Dateien umwandeln.',
        'description' => 'Wandle PNG-Bilder in JPG um, damit sie kleiner und mit jedem Programm kompatibel sind. Im Stapel umwandeln, Qualität wählen und alles als ZIP herunterladen — direkt im Browser.',
        'seo_title' => 'PNG in JPG umwandeln – kostenlos, schnell, privat',
        'seo_description' => 'PNG kostenlos online in JPG umwandeln. Stapelumwandlung, einstellbare Qualität und ZIP-Download. Die Bilder werden im Browser umgewandelt, nie hochgeladen.',
        'content' => <<<'HTML'
<h2>Wann du PNG in JPG umwandeln solltest</h2>
<p>Screenshots und exportierte Bilder werden oft als PNG gespeichert, das für ein einzelnes fotoähnliches Bild mehrere Megabyte haben kann. Als JPG werden sie deutlich kleiner — ideal für E-Mail-Anhänge, Formulare mit Größenlimit, Kleinanzeigen und das Teilen in sozialen Netzwerken.</p>
<h2>Behalte PNG, wenn es darauf ankommt</h2>
<p>PNG ist besser für Logos, Icons, Diagramme und alles, was einen transparenten Hintergrund oder gestochen scharfen Text braucht. Wenn du eine kleine Datei und trotzdem Transparenz willst, nutze „PNG in WebP“.</p>
<p>Die Datei soll nach dem Umwandeln noch kleiner werden? Schick sie durch „Bilder komprimieren“ oder verkleinere die Abmessungen mit „Bildgröße ändern“.</p>
HTML,
        'steps' => [
            'Zieh deine PNG-Bilder in das Feld, klicke zum Auswählen oder füge einen Screenshot mit Strg + V ein.',
            'Wähle die JPG-<strong>Qualität</strong>. Bei 85–92 % bleiben Fotos und Screenshots scharf.',
            'Jedes PNG wird sofort in JPG umgewandelt. Transparente Bereiche werden weiß, weil JPG keine Transparenz kennt.',
            'Lade die Bilder einzeln herunter oder klicke auf <strong>Alle herunterladen</strong> für ein ZIP.',
        ],
        'faq' => [
            ['q' => 'Warum PNG in JPG umwandeln?', 'a' => 'Als PNG gespeicherte Fotos und Screenshots sind oft um ein Vielfaches größer als dasselbe Bild als JPG. Nach der Umwandlung lassen sie sich leichter versenden, hochladen und teilen und öffnen sich in jedem Programm.'],
            ['q' => 'Was passiert mit transparenten Hintergründen?', 'a' => 'JPG kann keine Transparenz speichern, transparente Bereiche werden daher weiß gefüllt. Um Transparenz und trotzdem eine kleine Datei zu erhalten, nutze „PNG in WebP“.'],
            ['q' => 'Verliere ich Qualität?', 'a' => 'JPG komprimiert verlustbehaftet, aber ab 85 % Qualität ist bei Fotos kein Unterschied sichtbar. Grafiken mit feinem Text können etwas weicher wirken — für diese bleib besser bei PNG oder WebP.'],
            ['q' => 'Werden meine Bilder ins Internet hochgeladen?', 'a' => 'Nein. Die Umwandlung passiert in deinem Browser, deine Bilder verlassen dein Gerät nie.'],
        ],
    ],

    'jpg-to-png' => [
        'slug' => 'jpg-in-png',
        'name' => 'JPG in PNG',
        'short_description' => 'JPG-Fotos in verlustfreie PNG-Bilder umwandeln.',
        'description' => 'Wandle JPG- und JPEG-Bilder in PNG um, damit sie bei weiteren Bearbeitungen keine Qualität mehr verlieren. Im Stapel umwandeln und alle Dateien als ZIP herunterladen.',
        'seo_title' => 'JPG in PNG umwandeln – online, kostenlos, verlustfrei',
        'seo_description' => 'JPG kostenlos online in PNG umwandeln. Stapelumwandlung und ZIP-Download, alles im Browser verarbeitet. Ohne Upload und ohne Anmeldung.',
        'content' => <<<'HTML'
<h2>Warum PNG verwenden?</h2>
<p>JPG verliert bei jedem Bearbeiten und erneuten Speichern etwas Qualität. PNG ist verlustfrei, ein Foto vor dem Bearbeiten in PNG umzuwandeln schützt es also vor weiterem Qualitätsverlust. Viele Design-Tools, Druckdienste und App-Stores verlangen außerdem PNG-Dateien.</p>
<h2>Was dich erwartet</h2>
<p>Das PNG ist meist größer als das ursprüngliche JPG, weil verlustfreie Bilder jedes Pixel exakt speichern. Die Umwandlung stellt keine Details wieder her, die durch die JPG-Kompression bereits verloren gingen, und der Hintergrund bleibt gleich: JPG-Fotos haben keine Transparenz, die erhalten werden könnte.</p>
<p>Du willst lieber eine kleine Datei fürs Web? Nutze „JPG in WebP“ oder „Bilder komprimieren“. Um vorher einen Ausschnitt zu wählen, nutze „Bild zuschneiden“.</p>
HTML,
        'steps' => [
            'Zieh deine JPG- oder JPEG-Bilder in das Feld oder klicke, um sie auszuwählen. Du kannst viele auf einmal umwandeln.',
            'Jedes Bild wird sofort in deinem Browser in PNG umgewandelt.',
            'Prüfe die neue Dateigröße jedes Bildes.',
            'Lade die PNG-Dateien einzeln oder zusammen als ZIP herunter.',
        ],
        'faq' => [
            ['q' => 'Warum JPG in PNG umwandeln?', 'a' => 'PNG ist verlustfrei, das Bild verliert also keine weitere Qualität, wenn du es bearbeitest und erneut speicherst. Manche Programme, Druckdienste und Design-Tools verlangen außerdem PNG-Dateien.'],
            ['q' => 'Verbessert die Umwandlung die Qualität?', 'a' => 'Nein. Die Umwandlung kann keine Details zurückholen, die die JPG-Kompression entfernt hat, verhindert aber weitere Verluste bei späteren Bearbeitungen.'],
            ['q' => 'Warum ist die PNG-Datei größer?', 'a' => 'PNG speichert jedes Pixel ohne verlustbehaftete Kompression, Fotos werden daher meist größer. Fürs Web sind JPG oder WebP für Fotos die bessere Wahl.'],
            ['q' => 'Hat das PNG einen transparenten Hintergrund?', 'a' => 'JPG-Bilder haben keine Transparenz, das PNG behält also denselben einfarbigen Hintergrund wie das Originalfoto.'],
            ['q' => 'Werden meine Bilder ins Internet hochgeladen?', 'a' => 'Nein. Alles passiert auf deinem Gerät.'],
        ],
    ],

    'webp-to-png' => [
        'slug' => 'webp-in-png',
        'name' => 'WebP in PNG',
        'short_description' => 'WebP-Bilder in PNG umwandeln und die Transparenz behalten.',
        'description' => 'Wandle WebP-Bilder in PNG um, damit sie sich in jedem Editor und Programm öffnen lassen — transparente Hintergründe bleiben erhalten. Im Stapel umwandeln und alles als ZIP herunterladen.',
        'seo_title' => 'WebP in PNG mit Transparenz umwandeln, kostenlos',
        'seo_description' => 'WebP kostenlos online in PNG umwandeln. Transparenz bleibt erhalten, Stapelumwandlung und ZIP-Download. Die Bilder verlassen dein Gerät nicht.',
        'content' => <<<'HTML'
<h2>Warum WebP-Bilder Probleme machen</h2>
<p>Websites liefern Bilder als WebP aus, weil die Dateien klein sind und schnell laden. Wenn du eines speicherst, können es aber viele Bildbearbeitungen, Präsentationsprogramme, ältere Betriebssysteme und Formulare nicht öffnen. Als PNG erhältst du eine überall kompatible Datei ohne Qualitätsverlust.</p>
<h2>PNG behält die Transparenz</h2>
<p>Logos, Sticker und Produktbilder aus dem Netz haben oft einen transparenten Hintergrund. PNG bewahrt ihn exakt, anders als JPG. Wenn du für Fotos lieber kleinere Dateien möchtest, nutze „WebP in JPG“.</p>
<p>Du willst den umgekehrten Weg für deine eigene Website gehen? Wandle Bilder mit „PNG in WebP“ oder „JPG in WebP“ um.</p>
HTML,
        'steps' => [
            'Zieh deine WebP-Bilder in das Feld oder klicke, um sie auszuwählen. Stapelumwandlung wird unterstützt.',
            'Jedes Bild wird sofort in PNG umgewandelt — transparente Hintergründe bleiben erhalten.',
            'Prüfe die Größe jeder umgewandelten Datei.',
            'Lade die Bilder einzeln herunter oder klicke auf <strong>Alle herunterladen</strong> für ein ZIP.',
        ],
        'faq' => [
            ['q' => 'Warum WebP in PNG umwandeln?', 'a' => 'Viele Bildbearbeitungen, Design-Tools, Präsentationsprogramme und Formulare akzeptieren WebP noch nicht. PNG funktioniert überall und behält die volle Qualität.'],
            ['q' => 'Bleibt die Transparenz erhalten?', 'a' => 'Ja. Anders als JPG unterstützt PNG Transparenz, Logos, Icons und Sticker behalten also ihren transparenten Hintergrund.'],
            ['q' => 'Ist PNG oder JPG besser?', 'a' => 'Wähle PNG für Grafiken, Logos, Screenshots und alles mit Transparenz. Für Fotos, bei denen eine kleine Datei wichtiger ist, nutze „WebP in JPG“.'],
            ['q' => 'Werden meine Bilder ins Internet hochgeladen?', 'a' => 'Nein. Die Umwandlung passiert vollständig in deinem Browser.'],
        ],
    ],

    'svg-to-png' => [
        'slug' => 'svg-in-png',
        'name' => 'SVG in PNG',
        'short_description' => 'SVG-Vektorgrafiken in jeder Skalierung in PNG umwandeln.',
        'description' => 'Wandle SVG-Icons, Logos und Illustrationen in 1×, 2×, 4× oder 8× Skalierung in PNG um — mit transparentem oder farbigem Hintergrund. Stapelumwandlung im Browser.',
        'seo_title' => 'SVG in PNG umwandeln – hochauflösend, kostenlos',
        'seo_description' => 'SVG kostenlos online in PNG umwandeln, bis 8-fache Auflösung, mit transparentem oder farbigem Hintergrund. Stapelumwandlung ohne Upload.',
        'content' => <<<'HTML'
<h2>Wann du PNG statt SVG brauchst</h2>
<p>SVG ist perfekt für Logos und Icons auf Websites, weil es in jeder Größe scharf bleibt. Viele Orte akzeptieren aber nur Rastergrafiken: Profile in sozialen Netzwerken, E-Mail-Signaturen, Präsentationsfolien, App-Store-Einträge und manche Content-Management-Systeme. Als PNG funktioniert dein Vektordesign überall.</p>
<h2>Die richtige Skalierung wählen</h2>
<ul>
<li><strong>1×</strong>: die im SVG definierte Größe.</li>
<li><strong>2×</strong>: scharf auf hochauflösenden (Retina-)Bildschirmen.</li>
<li><strong>4× oder 8×</strong>: Druck, große Banner oder spätere Bearbeitung.</li>
</ul>
<p>Du brauchst danach eine kleinere Datei? Nutze „Bilder komprimieren“ oder wandle das Ergebnis mit „PNG in WebP“ um.</p>
HTML,
        'steps' => [
            'Zieh deine SVG-Dateien in das Feld oder klicke, um sie auszuwählen. Du kannst mehrere auf einmal umwandeln.',
            'Wähle die <strong>Skalierung</strong>. SVG ist ein Vektorformat, 2× oder 4× ergibt daher scharfe PNGs für hochauflösende Bildschirme.',
            'Lass den Hintergrund transparent oder wähle eine Vollfarbe.',
            'Lade jedes PNG herunter oder klicke auf <strong>Alle herunterladen</strong> für ein ZIP.',
        ],
        'faq' => [
            ['q' => 'Wie groß wird das PNG?', 'a' => 'Das PNG nutzt die im SVG definierte Größe (Breite und Höhe oder die viewBox) multipliziert mit der gewählten Skalierung. Ein 24×24-Icon in 4× ergibt 96×96 Pixel.'],
            ['q' => 'Bleibt der transparente Hintergrund erhalten?', 'a' => 'Ja, standardmäßig. Deaktiviere <strong>Transparenter Hintergrund</strong>, um ihn mit einer Farbe zu füllen.'],
            ['q' => 'Warum sieht mein SVG anders aus?', 'a' => 'SVGs, die Schriften oder Bilder von anderen Websites laden, können diese nicht ins PNG übernehmen. Wandle Text in deinem Design-Tool in Pfade um, um ein exaktes Ergebnis zu erhalten.'],
            ['q' => 'Ist das Umwandeln von SVG-Dateien sicher?', 'a' => 'Ja. SVGs werden in deinem Browser als Bilder gerendert, enthaltene Skripte werden also nie ausgeführt, und die Dateien werden nie hochgeladen.'],
        ],
    ],
];
