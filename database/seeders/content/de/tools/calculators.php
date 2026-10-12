<?php

/*
| German copy for the calculators. See content/de/tools.php.
*/

return [
    'percentage-calculator' => [
        'slug' => 'prozentrechner',
        'name' => 'Prozentrechner',
        'short_description' => 'Prozente, prozentuale Veränderungen und Aufschläge sofort berechnen.',
        'description' => 'Berechne X % einer Zahl, wie viel Prozent eine Zahl von einer anderen ist, die prozentuale Zu- oder Abnahme zwischen zwei Werten und schlage Prozente auf oder ziehe sie ab — alles an einem Ort.',
        'seo_title' => 'Prozentrechner: % von, Veränderung und Aufschlag',
        'seo_description' => 'Kostenloser Prozentrechner. Berechne X % von Y, wie viel Prozent X von Y ist, prozentuale Zu- und Abnahmen und Prozentaufschläge oder Rabatte sofort.',
        'content' => <<<'HTML'
<h2>Prozentformeln</h2>
<ul>
<li><strong>X % von Y</strong> = Y × X / 100</li>
<li><strong>Wie viel Prozent ist X von Y</strong> = X / Y × 100</li>
<li><strong>Prozentuale Veränderung</strong> = (neu − alt) / alt × 100</li>
<li><strong>Y um X % erhöhen</strong> = Y × (1 + X / 100)</li>
</ul>
<h2>Beispiele aus dem Alltag</h2>
<p>Berechne 25 % Rabatt auf einen Preis, die Mehrwertsteuer eines Einkaufs, um wie viel dein Gehalt gestiegen ist, welchen Teil eines Budgets du schon ausgegeben hast oder den Anteil richtiger Antworten in einer Prüfung. Prozentpunkte und Prozente sind nicht dasselbe: Steigt ein Zinssatz von 10 % auf 12 %, sind das 2 Prozentpunkte — aber ein Anstieg um 20 %.</p>
<p>Für Geld über die Zeit nutze den Zinseszinsrechner oder den Kreditrechner. Um die Restaurantrechnung zu teilen, probiere den Trinkgeldrechner.</p>
HTML,
        'steps' => [
            'Wähle den Rechner, der zu deiner Frage passt — jeder löst eine andere Art von Prozentaufgabe.',
            'Gib deine Zahlen ein. Die Ergebnisse aktualisieren sich sofort, ohne Knopfdruck.',
            'Nutze <strong>Prozentuale Veränderung</strong>, um einen alten mit einem neuen Wert zu vergleichen, etwa Preise oder Gehälter.',
            'Nutze <strong>Prozentsatz aufschlagen oder abziehen</strong> für Rabatte, Steuern oder Preiserhöhungen.',
        ],
        'faq' => [
            ['q' => 'Wie berechne ich den Prozentwert einer Zahl?', 'a' => 'Multipliziere die Zahl mit dem Prozentsatz und teile durch 100. Zum Beispiel sind 15 % von 200 = 200 × 15 / 100 = 30.'],
            ['q' => 'Wie finde ich heraus, wie viel Prozent eine Zahl von einer anderen ist?', 'a' => 'Teile den Teil durch das Ganze und multipliziere mit 100. Zum Beispiel ist 30 (30 / 200) × 100 = 15 % von 200.'],
            ['q' => 'Wie berechnet man eine prozentuale Steigerung?', 'a' => 'Ziehe den alten Wert vom neuen ab, teile durch den alten Wert und multipliziere mit 100. Von 80 auf 100 ist eine Steigerung um (100 − 80) / 80 × 100 = 25 %.'],
            ['q' => 'Wie berechne ich einen Rabatt?', 'a' => 'Nutze „Prozentsatz aufschlagen oder abziehen“ und wähle Verringern. 20 % Rabatt auf 50 ergibt 50 × (1 − 0,20) = 40.'],
            ['q' => 'Warum ergibt +50 % und danach −50 % nicht wieder den Ausgangswert?', 'a' => 'Weil sich jeder Prozentsatz auf eine andere Basis bezieht. 100 + 50 % = 150, aber 150 − 50 % = 75.'],
        ],
    ],

    'loan-calculator' => [
        'slug' => 'kreditrechner',
        'name' => 'Kreditrechner',
        'short_description' => 'Kreditrate, Gesamtzinsen und Tilgungsplan berechnen.',
        'description' => 'Gib Betrag, Zinssatz und Laufzeit ein, um deine monatliche, zweiwöchentliche oder wöchentliche Rate, die Gesamtzinsen und einen vollständigen Tilgungsplan zu berechnen.',
        'seo_title' => 'Kreditrechner: Rate und Tilgungsplan berechnen',
        'seo_description' => 'Kostenloser Kreditrechner mit monatlichen, zweiwöchentlichen oder wöchentlichen Raten. Sieh Zinsen, Gesamtkosten und den vollständigen Tilgungsplan.',
        'content' => <<<'HTML'
<h2>So funktionieren Kreditraten</h2>
<p>Bei einem Annuitätendarlehen ist jede Rate gleich hoch, ihre Zusammensetzung ändert sich aber mit der Zeit. Die ersten Raten bestehen fast nur aus Zinsen, die letzten fast nur aus Tilgung. Der Tilgungsplan zeigt genau, wie viel jeder Zahlung in Zinsen fließt und wie schnell die Restschuld sinkt.</p>
<h2>So zahlst du weniger Zinsen</h2>
<ul>
<li><strong>Kürzere Laufzeit:</strong> höhere Raten, aber insgesamt deutlich weniger Zinsen.</li>
<li><strong>Niedrigerer Zinssatz:</strong> Schon 1 % weniger kann bei langen Krediten Tausende sparen.</li>
<li><strong>Zahlung alle zwei Wochen:</strong> 26 halbe Raten pro Jahr senken die Zinsen leicht.</li>
<li><strong>Sondertilgungen:</strong> Was du zusätzlich zahlst, verringert direkt die Restschuld.</li>
</ul>
<p>Du sparst lieber, statt dir Geld zu leihen? Sieh mit dem Zinseszinsrechner, wie dein Geld wächst.</p>
HTML,
        'steps' => [
            'Gib den gewünschten <strong>Kreditbetrag</strong> ein.',
            'Gib den <strong>effektiven Jahreszins</strong> deines Kreditangebots ein.',
            'Lege die <strong>Laufzeit</strong> in Jahren oder Monaten fest und wähle das Zahlungsintervall: monatlich, alle zwei Wochen oder wöchentlich.',
            'Prüfe Rate, Gesamtzinsen und Gesamtkosten und sieh dir den <strong>Tilgungsplan</strong> nach Jahr oder Rate an. Du kannst ihn als CSV exportieren.',
        ],
        'faq' => [
            ['q' => 'Wie wird die Kreditrate berechnet?', 'a' => 'Der Rechner nutzt die Standard-Annuitätenformel: <code>P = L × r / (1 − (1 + r)<sup>−n</sup>)</code>, wobei L der Kreditbetrag, r der Zinssatz pro Zahlungsperiode und n die Gesamtzahl der Zahlungen ist.'],
            ['q' => 'Spart eine Zahlung alle zwei Wochen Geld?', 'a' => 'Alle zwei Wochen zu zahlen bedeutet 26 Zahlungen pro Jahr. Da die Zinsen häufiger auf eine etwas niedrigere Restschuld berechnet werden, zahlst du insgesamt meist etwas weniger Zinsen. Vergleiche die Summen, indem du das Zahlungsintervall änderst.'],
            ['q' => 'Was ist ein Tilgungsplan?', 'a' => 'Eine Tabelle mit jeder Zahlung über die gesamte Laufzeit, aufgeteilt in Zinsanteil und Tilgungsanteil, zusammen mit der Restschuld nach jeder Zahlung.'],
            ['q' => 'Sind Steuern, Versicherungen oder Gebühren enthalten?', 'a' => 'Nein. Die Ergebnisse umfassen nur Tilgung und Zinsen. Baufinanzierungen und Autokredite können zusätzlich Versicherungen, Bearbeitungsgebühren oder andere Kosten des Kreditgebers enthalten.'],
            ['q' => 'Werden meine Daten gespeichert?', 'a' => 'Nein. Alle Berechnungen laufen in deinem Browser, und nichts von deinen Eingaben wird an unsere Server gesendet.'],
        ],
    ],

    'compound-interest-calculator' => [
        'slug' => 'zinseszinsrechner',
        'name' => 'Zinseszinsrechner',
        'short_description' => 'Sieh, wie deine Ersparnisse mit Zinseszins und Sparraten wachsen.',
        'description' => 'Berechne den Endwert einer Geldanlage mit beliebiger Verzinsungshäufigkeit und monatlichen oder jährlichen Sparraten — mit einer Wachstumstabelle Jahr für Jahr.',
        'seo_title' => 'Zinseszinsrechner mit Sparrate',
        'seo_description' => 'Kostenloser Zinseszinsrechner. Monatliche oder jährliche Sparraten hinzufügen, Verzinsung wählen und sehen, wie dein Guthaben Jahr für Jahr wächst.',
        'content' => <<<'HTML'
<h2>Die Kraft des Zinseszinses</h2>
<p>Mit Zinseszins verdienst du Erträge auf deine Erträge. Über lange Zeiträume wird die Wachstumskurve immer steiler: In den letzten Jahren können die erhaltenen Zinsen alles übersteigen, was du eingezahlt hast. Deshalb ist früh anzufangen — auch mit kleinen Beträgen — wichtiger, als später große Summen anzulegen.</p>
<h2>Die 72er-Regel</h2>
<p>So schätzt du schnell, wann sich dein Geld verdoppelt: Teile 72 durch den jährlichen Zinssatz. Bei 6 % verdoppelt sich das Geld in etwa 12 Jahren, bei 9 % in etwa 8 Jahren.</p>
<h2>Was dein Ergebnis beeinflusst</h2>
<ul>
<li>Der Zinssatz oder die erwartete Rendite.</li>
<li>Wie lange du investiert bleibst.</li>
<li>Wie viel und wie oft du einzahlst.</li>
<li>Gebühren, Steuern und Inflation, die die reale Rendite schmälern.</li>
</ul>
<p>Du leihst dir Geld? Der Kreditrechner zeigt, wie Zinsen gegen dich arbeiten.</p>
HTML,
        'steps' => [
            'Gib dein <strong>Anfangskapital</strong> und den erwarteten <strong>Jahreszins</strong> ein.',
            'Lege fest, wie viele <strong>Jahre</strong> du anlegen willst und wie oft die Zinsen gutgeschrieben werden.',
            'Füge eine regelmäßige <strong>Sparrate</strong> hinzu — monatlich oder jährlich — oder lass sie auf 0.',
            'Prüfe den Endwert, wie viel aus deinen Einzahlungen und wie viel aus Zinsen stammt, und die Tabelle Jahr für Jahr. Exportiere sie bei Bedarf als CSV.',
        ],
        'faq' => [
            ['q' => 'Was ist Zinseszins?', 'a' => 'Zinseszins sind Zinsen, die sowohl auf das ursprüngliche Kapital als auch auf bereits erhaltene Zinsen anfallen. Über lange Zeiträume lässt er Ersparnisse exponentiell wachsen — deshalb ist ein früher Start so wichtig.'],
            ['q' => 'Wie lautet die Zinseszinsformel?', 'a' => 'Ohne Einzahlungen: <code>A = P (1 + r/n)<sup>nt</sup></code>, wobei P das Kapital, r der Jahreszins, n die Anzahl der Zinsgutschriften pro Jahr und t die Anzahl der Jahre ist. Bei regelmäßigen Einzahlungen wird der Endwert jeder Einzahlung addiert.'],
            ['q' => 'Macht die Verzinsungshäufigkeit einen großen Unterschied?', 'a' => 'Häufigere Verzinsung bringt etwas mehr, der Effekt ist aber klein im Vergleich zu Zinssatz, Anlagedauer und Einzahlungshöhe.'],
            ['q' => 'Wann werden die Einzahlungen addiert?', 'a' => 'Die Einzahlungen werden am Ende jedes Monats (oder Jahres) addiert, nachdem die Zinsen der Periode gutgeschrieben wurden.'],
            ['q' => 'Ist das eine Finanzberatung?', 'a' => 'Nein. Die Ergebnisse sind Schätzungen mit konstanter Rendite. Echte Geldanlagen schwanken, und Steuern sowie Gebühren sind nicht berücksichtigt.'],
        ],
    ],

    'age-calculator' => [
        'slug' => 'altersrechner',
        'name' => 'Altersrechner',
        'short_description' => 'Das genaue Alter in Jahren, Monaten und Tagen aus dem Geburtsdatum berechnen.',
        'description' => 'Gib ein Geburtsdatum ein und erhalte das genaue Alter in Jahren, Monaten und Tagen, dazu die gelebten Monate, Wochen und Tage insgesamt und einen Countdown bis zum nächsten Geburtstag.',
        'seo_title' => 'Altersrechner: genaues Alter in Jahren, Monaten, Tagen',
        'seo_description' => 'Kostenloser Altersrechner. Finde dein genaues Alter in Jahren, Monaten und Tagen heraus, die gelebten Tage insgesamt und den Countdown bis zum Geburtstag.',
        'content' => <<<'HTML'
<h2>So wird das genaue Alter berechnet</h2>
<p>Das genaue Alter zählt zuerst die vollen Kalenderjahre, dann die vollen Monate und schließlich die restlichen Tage. Da Monate unterschiedlich lang sind, führt das Teilen der Tage durch 365 zu leicht falschen Ergebnissen — dieser Rechner folgt dem Kalender.</p>
<h2>Wofür ein Altersrechner nützlich ist</h2>
<ul>
<li>Altersvoraussetzungen für Schule, Sport, Versicherung oder Rente prüfen.</li>
<li>Formulare ausfüllen, die das Alter in Jahren und Monaten verlangen.</li>
<li>Die Zeit zwischen zwei beliebigen Daten ermitteln, etwa einem Jahrestag oder einer Projektdauer.</li>
<li>Den Countdown bis zum nächsten Geburtstag verfolgen.</li>
</ul>
<p>Um Tage zu einem Datum zu addieren oder abzuziehen oder Werktage zwischen zwei Daten zu zählen, nutze den Datumsrechner.</p>
HTML,
        'steps' => [
            'Gib das <strong>Geburtsdatum</strong> ein.',
            'Lass <strong>Alter am</strong> auf heute stehen oder wähle ein anderes Datum, um das Alter zu einem bestimmten Zeitpunkt in Vergangenheit oder Zukunft zu sehen.',
            'Sieh das genaue Alter in Jahren, Monaten und Tagen sowie die gelebten Monate, Wochen, Tage und Stunden insgesamt.',
            'Prüfe den Countdown bis zum nächsten Geburtstag und auf welchen Wochentag er fällt.',
        ],
        'faq' => [
            ['q' => 'Wie wird das genaue Alter berechnet?', 'a' => 'Der Rechner zählt zuerst die vollen Jahre, dann die vollen Monate und dann die restlichen Tage nach dem Kalender. Kürzere Monate werden korrekt berücksichtigt.'],
            ['q' => 'Was ist mit Menschen, die am 29. Februar geboren sind?', 'a' => 'In Jahren ohne 29. Februar wird der Geburtstag am 28. Februar gezählt.'],
            ['q' => 'Kann ich die Zeit zwischen zwei beliebigen Daten berechnen?', 'a' => 'Ja. Nutze das Geburtsdatum als Start- und „Alter am“ als Enddatum. Das Ergebnis zeigt die genauen Jahre, Monate und Tage dazwischen.'],
            ['q' => 'Wird mein Geburtsdatum gespeichert?', 'a' => 'Nein. Die Berechnung läuft in deinem Browser, und nichts wird an unsere Server gesendet.'],
        ],
    ],

    'tip-calculator' => [
        'slug' => 'trinkgeldrechner',
        'name' => 'Trinkgeldrechner',
        'short_description' => 'Trinkgeld berechnen und die Rechnung auf mehrere Personen aufteilen.',
        'description' => 'Gib den Rechnungsbetrag ein, wähle den Trinkgeld-Prozentsatz und die Anzahl der Personen und sieh Trinkgeld, Gesamtbetrag und Anteil pro Person — auf Wunsch aufgerundet.',
        'seo_title' => 'Trinkgeldrechner: Trinkgeld berechnen und teilen',
        'seo_description' => 'Kostenloser Trinkgeldrechner. Prozentsatz wählen, die Rechnung auf beliebig viele Personen aufteilen und pro Person aufrunden. Schnell und handyfreundlich.',
        'content' => <<<'HTML'
<h2>Trinkgeld-Knigge</h2>
<ul>
<li><strong>Deutschland und Österreich:</strong> Üblich sind etwa 5–10 % oder Aufrunden auf einen glatten Betrag; bei sehr gutem Service gern mehr.</li>
<li><strong>Schweiz:</strong> Der Service ist im Preis enthalten; Aufrunden ist eine freundliche Geste, aber keine Pflicht.</li>
<li><strong>USA:</strong> 15–20 % für den Service am Tisch, 20 % oder mehr für hervorragenden Service.</li>
<li><strong>Lieferdienste und Taxis:</strong> Aufrunden oder etwa 10 % reichen meist.</li>
</ul>
<p>Die Gepflogenheiten unterscheiden sich stark von Land zu Land. Vielerorts enthält die Rechnung bereits eine Servicegebühr — prüfe sie, bevor du Trinkgeld gibst.</p>
<h2>Die Rechnung fair teilen</h2>
<p>Wenn alle ähnlich viel bestellt haben, ist eine gleichmäßige Aufteilung am einfachsten. Bei sehr unterschiedlichen Bestellungen kann jede Person ihren Anteil plus Trinkgeld selbst berechnen. Aufrunden pro Person erspart das Kleingeldsuchen und macht das Trinkgeld etwas großzügiger.</p>
<p>Für andere Alltagsrechnungen probiere den Prozentrechner.</p>
HTML,
        'steps' => [
            'Gib den Rechnungsbetrag ein (mit oder ohne Steuern, wie du möchtest).',
            'Wähle den Trinkgeld-Prozentsatz über die Schnellwahl oder gib einen eigenen ein.',
            'Lege fest, wie viele Personen die Rechnung teilen.',
            'Sieh Trinkgeld, Gesamtbetrag und Anteil pro Person. Aktiviere <strong>Aufrunden</strong> für einen glatten Betrag pro Person.',
        ],
        'faq' => [
            ['q' => 'Wie viel Trinkgeld sollte ich geben?', 'a' => 'In Deutschland und Österreich sind etwa 5–10 % üblich, oft wird einfach aufgerundet. In der Schweiz ist der Service inklusive, und in den USA sind 15–20 % Standard. Vielerorts enthält die Rechnung bereits eine Servicegebühr.'],
            ['q' => 'Berechnet man das Trinkgeld vor oder nach Steuern?', 'a' => 'Bei uns sind die Preise meist inklusive Mehrwertsteuer, man rechnet also einfach mit dem Endbetrag. Wo Steuern separat ausgewiesen werden, ist beides üblich — auf den Gesamtbetrag ist etwas großzügiger.'],
            ['q' => 'Wie wird die Rechnung aufgeteilt?', 'a' => 'Das Trinkgeld wird zur Rechnung addiert und die Summe gleichmäßig auf alle Personen verteilt. Mit „Aufrunden“ wird jeder Anteil auf die nächste ganze Einheit aufgerundet, und die Differenz kommt zum Trinkgeld.'],
            ['q' => 'Wie berechne ich schnell 10 % Trinkgeld?', 'a' => 'Verschiebe das Komma um eine Stelle nach links. Bei einer Rechnung von 85 € sind 10 % also 8,50 €; für 15 % addierst du die Hälfte davon: 8,50 + 4,25 = 12,75 €.'],
        ],
    ],

    'salary-calculator' => [
        'slug' => 'gehaltsumrechner',
        'name' => 'Gehaltsumrechner',
        'short_description' => 'Gehalt zwischen Stundenlohn, Wochen-, Monats- und Jahresgehalt umrechnen.',
        'description' => 'Rechne einen Lohn oder ein Gehalt zwischen stündlichen, täglichen, wöchentlichen, zweiwöchentlichen, halbmonatlichen, monatlichen und jährlichen Beträgen um — passend zu deinen Arbeitsstunden und -wochen.',
        'seo_title' => 'Gehaltsumrechner: Stundenlohn in Jahresgehalt',
        'seo_description' => 'Kostenloser Gehaltsumrechner. Stundenlohn in Jahresgehalt umrechnen und umgekehrt, dazu Tages-, Wochen- und Monatsbeträge passend zu deiner Arbeitszeit.',
        'content' => <<<'HTML'
<h2>Jobangebote vergleichen</h2>
<p>Jobangebote werden unterschiedlich angegeben: ein Stundenlohn bei der einen Stelle, ein Jahresgehalt bei der anderen. Wenn du beide auf denselben Zeitraum umrechnest, wird der Vergleich fair. Denk auch an bezahlten Urlaub, Überstunden, Boni und Zusatzleistungen wie betriebliche Altersvorsorge, die im Jahr viel Geld wert sein können.</p>
<h2>Schnelle Umrechnungen (40-Stunden-Woche)</h2>
<ul>
<li>20 pro Stunde ≈ 41.600 pro Jahr</li>
<li>25 pro Stunde ≈ 52.000 pro Jahr</li>
<li>30 pro Stunde ≈ 62.400 pro Jahr</li>
<li>50.000 pro Jahr ≈ 24,04 pro Stunde</li>
</ul>
<p>Du willst einen Teil deines Gehalts sparen? Sieh mit dem Zinseszinsrechner, wie deine Ersparnisse wachsen.</p>
HTML,
        'steps' => [
            'Gib deinen Verdienst ein und wähle, wofür er steht: pro Stunde, Tag, Woche, alle zwei Wochen, zweimal im Monat, pro Monat oder pro Jahr.',
            'Passe deine Arbeitszeit an: Stunden pro Woche, Tage pro Woche und bezahlte Wochen pro Jahr.',
            'Sieh deinen Verdienst sofort in alle anderen Zeiträume umgerechnet.',
            'Nutze ihn, um Jobangebote, Stundenlöhne und Jahresgehälter auf gleicher Basis zu vergleichen.',
        ],
        'faq' => [
            ['q' => 'Wie rechne ich einen Stundenlohn in ein Jahresgehalt um?', 'a' => 'Multipliziere den Stundenlohn mit den Arbeitsstunden pro Woche und den Arbeitswochen pro Jahr. Bei 40 Stunden und 52 Wochen ergeben 25 pro Stunde 25 × 40 × 52 = 52.000 pro Jahr.'],
            ['q' => 'Wie rechne ich ein Jahresgehalt in einen Stundenlohn um?', 'a' => 'Teile das Jahresgehalt durch die Stunden pro Woche mal die Wochen pro Jahr. 60.000 bei 40 Stunden und 52 Wochen ergibt 60.000 / 2.080 ≈ 28,85 pro Stunde.'],
            ['q' => 'Was ist der Unterschied zwischen alle zwei Wochen und zweimal im Monat?', 'a' => 'Alle zwei Wochen bedeutet 26 Zahlungen pro Jahr. Zweimal im Monat bedeutet 24 Zahlungen pro Jahr, jede dieser Zahlungen ist also etwas höher.'],
            ['q' => 'Sind Steuern berücksichtigt?', 'a' => 'Nein. Die Ergebnisse sind Bruttobeträge vor Steuern und Sozialabgaben, die je nach Land und persönlicher Situation variieren.'],
            ['q' => 'Soll ich Urlaubswochen mitzählen?', 'a' => 'Wenn dein Urlaub bezahlt ist (zum Beispiel bei festem Monatsgehalt), lass 52 Wochen stehen. Wenn freie Tage nicht bezahlt werden, wie bei vielen Selbstständigen, verringere die bezahlten Wochen pro Jahr.'],
        ],
    ],

    'auto-loan-calculator' => [
        'slug' => 'autokreditrechner',
        'name' => 'Autokreditrechner',
        'short_description' => 'Autorate mit Inzahlungnahme, Steuern und Gebühren berechnen.',
        'description' => 'Berechne deine monatliche Autorate inklusive Anzahlung, Inzahlungnahme deines alten Fahrzeugs, Umsatzsteuer und Händlergebühren, und vergleiche Laufzeiten von 36 bis 84 Monaten.',
        'seo_title' => 'Autokreditrechner mit Inzahlungnahme und Steuern',
        'seo_description' => 'Kostenloser Autokreditrechner mit Inzahlungnahme, Steuern und Gebühren. Sieh deine Rate und vergleiche die Zinsen bei Laufzeiten von 36 bis 84 Monaten.',
        'content' => <<<'HTML'
<h2>Was in einen Autokredit einfließt</h2>
<p>Der Kreditbetrag ist der Fahrzeugpreis plus Steuern und Händlergebühren, abzüglich deiner Anzahlung und des Nettowerts deines in Zahlung gegebenen Fahrzeugs. Gebühren für Überführung, Zulassung und Papiere summieren sich schnell — wenn du sie einrechnest, kennst du eine realistische Monatsrate, bevor du mit dem Händler sprichst.</p>
<h2>Tipps, um weniger zu zahlen</h2>
<ul>
<li>Hol dir ein Kreditangebot deiner Bank, um es mit der Händlerfinanzierung zu vergleichen.</li>
<li>Zahle mindestens 10–20 % an, damit du nicht mehr schuldest, als das Auto wert ist.</li>
<li>Wähle die kürzeste Laufzeit, die du dir leisten kannst — die Vergleichstabelle zeigt die gesparten Zinsen.</li>
<li>Verhandle den Autopreis getrennt von Inzahlungnahme und Finanzierung.</li>
</ul>
<p>Für andere Kredite nutze den Kreditrechner, für eine Immobilie den Hypothekenrechner.</p>
HTML,
        'steps' => [
            'Gib den <strong>Fahrzeugpreis</strong>, deine <strong>Anzahlung</strong> und ggf. den <strong>Wert der Inzahlungnahme</strong> sowie die Restschuld darauf ein.',
            'Füge den <strong>Umsatzsteuer</strong>-Satz und die <strong>Gebühren</strong> des Händlers (Überführung, Zulassung, Papiere) hinzu.',
            'Gib den <strong>Zinssatz (effektiv)</strong> ein und wähle die Laufzeit.',
            'Vergleiche Monatsrate und Gesamtzinsen für Laufzeiten von 36 bis 84 Monaten.',
        ],
        'faq' => [
            ['q' => 'Wie wird die Rate eines Autokredits berechnet?', 'a' => 'Der finanzierte Betrag ist der Preis plus Steuern und Gebühren, abzüglich Anzahlung und Nettowert der Inzahlungnahme. Die Monatsrate folgt dann der Standard-Annuitätenformel mit deinem Zinssatz und deiner Laufzeit.'],
            ['q' => 'Fällt die Steuer auch auf das in Zahlung gegebene Auto an?', 'a' => 'In vielen Regionen (etwa den meisten US-Bundesstaaten) wird die Steuer nur auf den Preis abzüglich Inzahlungnahme erhoben, was Geld spart. Wo der volle Preis besteuert wird — wie bei der Mehrwertsteuer in Europa —, deaktiviere die Option.'],
            ['q' => 'Was, wenn ich mehr schulde, als mein Altfahrzeug wert ist?', 'a' => 'Das ist negatives Eigenkapital. Die Differenz wird auf den neuen Kredit aufgeschlagen, was den finanzierten Betrag und die Zinsen erhöht.'],
            ['q' => 'Lohnt sich eine längere Laufzeit?', 'a' => 'Kredite über 72 oder 84 Monate senken die Rate, kosten aber deutlich mehr Zinsen, und du schuldest unter Umständen jahrelang mehr, als das Auto wert ist. Vergleiche die Laufzeiten in der Tabelle unter den Ergebnissen.'],
            ['q' => 'Sind die Ergebnisse exakt?', 'a' => 'Es sind Schätzungen. Zinssatz, Gebühren und Steuern deines Kreditgebers bestimmen die endgültigen Zahlen.'],
        ],
    ],

    'mortgage-calculator' => [
        'slug' => 'hypothekenrechner',
        'name' => 'Hypothekenrechner',
        'short_description' => 'Monatliche Rate für deine Immobilie mit Steuern, Versicherung und PMI berechnen.',
        'description' => 'Berechne deine vollständige monatliche Belastung — Tilgung, Zinsen, Grundsteuer, Gebäudeversicherung, PMI und Hausgeld — sowie die Gesamtzinsen und einen jährlichen Tilgungsplan.',
        'seo_title' => 'Hypothekenrechner mit Steuern und Versicherung',
        'seo_description' => 'Kostenloser Hypothekenrechner mit Grundsteuer, Versicherung, PMI und Hausgeld. Sieh deine Monatsrate, die Zinsen und den jährlichen Tilgungsplan.',
        'content' => <<<'HTML'
<h2>Deine monatliche Belastung verstehen</h2>
<p>Deine monatlichen Kosten bestehen aus mehr als Tilgung und Zinsen. Dazu kommen Grundsteuer und Gebäudeversicherung, und in den USA verlangen konventionelle Kredite mit weniger als 20 % Eigenkapital zusätzlich eine private Hypothekenversicherung (PMI). Bei Eigentumswohnungen fällt außerdem Hausgeld an. Wenn du alles einrechnest, siehst du, was du wirklich jeden Monat zahlst.</p>
<h2>So senkst du deine Rate</h2>
<ul>
<li><strong>Bring 20 % Eigenkapital mit</strong>, um PMI ganz zu vermeiden.</li>
<li><strong>Verbessere deine Bonität</strong> vor dem Kreditantrag — sie beeinflusst direkt den Zinssatz.</li>
<li><strong>Vergleiche Banken</strong>: Schon 0,25 % weniger sparen über 30 Jahre Tausende.</li>
<li><strong>Erwäge 15 Jahre Laufzeit</strong>, wenn es dein Budget erlaubt — deutlich weniger Zinsen insgesamt.</li>
</ul>
<p>Für andere Kredite wie Auto- oder Ratenkredite nutze den Kreditrechner. Um zu sehen, wie deine Ersparnisse wachsen könnten, probiere den Zinseszinsrechner.</p>
HTML,
        'steps' => [
            'Gib den <strong>Kaufpreis der Immobilie</strong> und dein <strong>Eigenkapital</strong> ein, als Prozentsatz oder Betrag.',
            'Wähle die <strong>Laufzeit</strong> und gib den angebotenen <strong>Zinssatz</strong> ein.',
            'Füge <strong>Grundsteuer</strong>, <strong>Gebäudeversicherung</strong>, <strong>PMI</strong> und <strong>Hausgeld</strong> hinzu, um deine tatsächlichen Monatskosten zu sehen.',
            'Prüfe die monatliche Aufteilung, die Gesamtzinsen und den Tilgungsplan Jahr für Jahr.',
        ],
        'faq' => [
            ['q' => 'Was ist in der monatlichen Rate enthalten?', 'a' => 'Die meisten Raten bestehen aus Tilgung und Zinsen; oft kommen Grundsteuer und Versicherung hinzu. In den USA zahlt man bei weniger als 20 % Eigenkapital meist PMI, und Eigentumswohnungen haben Hausgeld.'],
            ['q' => 'Was ist PMI und wann entfällt sie?', 'a' => 'Die private Hypothekenversicherung (PMI) schützt den Kreditgeber, wenn du bei einem konventionellen US-Kredit weniger als 20 % Eigenkapital einbringst. Sie kostet etwa 0,3–1,5 % des Kredits pro Jahr und entfällt automatisch, wenn die Restschuld 78 % des ursprünglichen Immobilienwerts erreicht. Der Rechner schätzt, wie viele Monate du sie zahlst.'],
            ['q' => 'Sind 15 oder 30 Jahre Laufzeit besser?', 'a' => 'Bei 15 Jahren sind die Raten höher, aber der Zins ist niedriger und die Gesamtzinsen sinken stark. Bei 30 Jahren sind die Raten niedriger und flexibler. Vergleiche beides, indem du die Laufzeit änderst.'],
            ['q' => 'Wie viel Immobilie kann ich mir leisten?', 'a' => 'Eine gängige Faustregel im deutschsprachigen Raum: Die Monatsrate sollte nicht mehr als etwa 35–40 % deines Nettoeinkommens betragen. Banken prüfen deine gesamte finanzielle Situation.'],
            ['q' => 'Sind die Ergebnisse exakt?', 'a' => 'Es sind Schätzungen zur Planung. Steuern, Versicherungen, PMI und Kaufnebenkosten variieren je nach Ort, Bank und Bonität.'],
        ],
    ],

    'date-calculator' => [
        'slug' => 'datumsrechner',
        'name' => 'Datumsrechner',
        'short_description' => 'Tage zwischen Daten zählen oder Tage, Wochen und Monate addieren und abziehen.',
        'description' => 'Berechne die Anzahl der Tage, Wochen, Monate und Werktage zwischen zwei Daten oder addiere und subtrahiere Tage, Wochen, Monate und Jahre, um ein zukünftiges oder vergangenes Datum zu erhalten.',
        'seo_title' => 'Datumsrechner: Tage zwischen zwei Daten',
        'seo_description' => 'Tage zwischen zwei Daten zählen, inklusive Werktage, oder Tage, Wochen und Monate zu einem Datum addieren und abziehen. Kostenlos und sofort.',
        'content' => <<<'HTML'
<h2>Typische Anwendungen</h2>
<ul>
<li><strong>Fristen:</strong> Welches Datum ist in 30 Werktagen?</li>
<li><strong>Countdowns:</strong> Wie viele Tage bis zur Hochzeit, Prüfung, Reise oder zum Launch?</li>
<li><strong>Verträge und Kündigungsfristen:</strong> das Datum 90 Tage nach der Unterschrift.</li>
<li><strong>Schwangerschaft, Garantien und Abos:</strong> Wochen oder Monate zu einem Startdatum addieren.</li>
<li><strong>Projektplanung:</strong> die Anzahl der Arbeitstage zwischen zwei Meilensteinen.</li>
</ul>
<h2>So werden Monate gezählt</h2>
<p>Das Addieren von Monaten folgt dem Kalender, nicht einer festen Anzahl von Tagen. Ein Monat nach dem 15. März ist der 15. April, egal wie lang der Monat ist. Gibt es den Tag nicht — wie den 30. Februar —, wird der letzte Tag des Monats verwendet.</p>
<p>Um das genaue Alter einer Person und ihren nächsten Geburtstag zu ermitteln, nutze den Altersrechner.</p>
HTML,
        'steps' => [
            'Wähle <strong>Tage zwischen Daten</strong>, um die Zeit zwischen zwei Daten zu zählen, oder <strong>Addieren oder subtrahieren</strong>, um ein zukünftiges oder vergangenes Datum zu erhalten.',
            'Wähle die Daten im Kalender oder tippe sie ein.',
            'Aktiviere <strong>Enddatum mitzählen</strong>, wenn erster und letzter Tag zählen sollen, etwa bei einer Buchung oder einem Projekt.',
            'Nutze <strong>Nur Werktage</strong>, um Samstage und Sonntage auszulassen, zum Beispiel für eine Frist.',
        ],
        'faq' => [
            ['q' => 'Wie viele Tage liegen zwischen zwei Daten?', 'a' => 'Gib beide Daten unter „Tage zwischen Daten“ ein. Das Ergebnis zeigt die Gesamtzahl der Tage, denselben Zeitraum in Wochen, Monaten und Jahren sowie die Anzahl der Werktage.'],
            ['q' => 'Soll ich das Enddatum mitzählen?', 'a' => 'Standardmäßig zählt der Rechner die Tage vom Start- bis zum Enddatum, wie Hotelnächte. Zähle das Enddatum mit, wenn beide Tage zählen, etwa bei einer dreitägigen Veranstaltung von Montag bis Mittwoch.'],
            ['q' => 'Was zählt als Werktag?', 'a' => 'Montag bis Freitag. Feiertage werden nicht abgezogen, da sie je nach Land und Bundesland variieren — ziehe sie bei Bedarf manuell ab.'],
            ['q' => 'Was passiert, wenn ich zum 31. Januar einen Monat addiere?', 'a' => 'Das Ergebnis ist der letzte Tag im Februar (28. oder 29.), weil der Februar keinen 31. hat. So handhaben es auch Banken und die meisten Kalender.'],
            ['q' => 'Kann ich das Alter einer Person berechnen?', 'a' => 'Ja, aber der Altersrechner ist genau dafür gemacht und zeigt zusätzlich den Countdown bis zum nächsten Geburtstag.'],
        ],
    ],

    'debt-payoff-calculator' => [
        'slug' => 'schuldenabbau-rechner',
        'name' => 'Schuldenabbau-Rechner',
        'short_description' => 'Mit der Lawinen- oder Schneeballmethode planen, wann du schuldenfrei bist.',
        'description' => 'Füge deine Kreditkarten und Kredite hinzu und sieh, wann du schuldenfrei bist und wie viele Zinsen du mit der Lawinen- und der Schneeballmethode zahlst — im Vergleich zu reinen Mindestraten.',
        'seo_title' => 'Schuldenabbau-Rechner: Lawine oder Schneeball',
        'seo_description' => 'Kostenloser Schuldenabbau-Rechner. Vergleiche Lawinen- und Schneeballmethode, sieh, wann du schuldenfrei bist und wie viel Zinsen Sondertilgungen sparen.',
        'content' => <<<'HTML'
<h2>Lawine oder Schneeball?</h2>
<p>Beide Methoden zahlen auf jede Schuld die Mindestrate und stecken alles zusätzliche Geld in eine Zielschuld. Die <strong>Lawinenmethode</strong> greift zuerst den höchsten Zinssatz an — das ist immer am günstigsten. Die <strong>Schneeballmethode</strong> greift zuerst den kleinsten Saldo an, sodass du früher Konten schließt: ein Motivationsschub, der vielen hilft, durchzuhalten. Die beste Methode ist die, die du auch durchziehst.</p>
<h2>Tipps, um schneller schuldenfrei zu werden</h2>
<ul>
<li>Mach keine neuen Einkäufe mit den Karten, die du abbezahlst.</li>
<li>Frag deine Bank nach einem niedrigeren Zinssatz — das klappt oft bei pünktlicher Zahlung.</li>
<li>Erwäge eine Umschuldung zu einem niedrigeren Zins und prüfe vorher die Gebühren.</li>
<li>Steck Sondereinnahmen wie Steuererstattungen, Weihnachtsgeld oder Boni direkt in die Zielschuld.</li>
</ul>
<p>Du nimmst gerade einen neuen Kredit auf? Der Kreditrechner zeigt die Gesamtkosten, bevor du unterschreibst.</p>
HTML,
        'steps' => [
            'Trage deine Schulden mit <strong>Restbetrag</strong>, <strong>Zinssatz (effektiv)</strong> und <strong>Mindestrate</strong> ein.',
            'Gib ein, wie viel du monatlich <strong>zusätzlich</strong> zu den Mindestraten zahlen kannst.',
            'Vergleiche die <strong>Lawinen-</strong> und die <strong>Schneeballmethode</strong> mit reinen Mindestraten.',
            'Folge der Tilgungsreihenfolge der gewählten Methode. Ist eine Schuld getilgt, wandert ihre Rate zur nächsten.',
        ],
        'faq' => [
            ['q' => 'Was ist die Lawinenmethode?', 'a' => 'Bei der Lawinenmethode zahlst du auf jede Schuld die Mindestrate und steckst alles zusätzliche Geld in die Schuld mit dem höchsten Zinssatz. So sparst du am meisten Zinsen.'],
            ['q' => 'Was ist die Schneeballmethode?', 'a' => 'Bei der Schneeballmethode steckst du zusätzliches Geld zuerst in den kleinsten Saldo. Du zahlst etwas mehr Zinsen, aber die schnellen Erfolge halten viele Menschen motiviert.'],
            ['q' => 'Was heißt, die Rate „wandert“ zur nächsten Schuld?', 'a' => 'Ist eine Schuld getilgt, wird das Geld, das du dafür gezahlt hast, auf die nächste Schuld aufgeschlagen. Deine monatliche Gesamtzahlung bleibt gleich, das Tilgungstempo steigt also mit der Zeit.'],
            ['q' => 'Warum heißt es, meine Schuld würde nie getilgt?', 'a' => 'Wenn deine Zahlungen niedriger sind als die monatlich anfallenden Zinsen, sinkt der Saldo nie. Erhöhe die Mindestrate oder die Zusatzzahlung.'],
            ['q' => 'Werden meine Finanzdaten gespeichert?', 'a' => 'Nein. Alles wird in deinem Browser berechnet, und nichts wird an unsere Server gesendet.'],
        ],
    ],
];
