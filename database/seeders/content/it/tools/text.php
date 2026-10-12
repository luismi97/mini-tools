<?php

/*
| Italian copy for the text tools. See content/it/tools.php.
*/

return [
    'word-counter' => [
        'slug' => 'contatore-parole',
        'name' => 'Contatore di parole',
        'short_description' => 'Conta parole, caratteri, frasi e tempo di lettura all’istante.',
        'description' => 'Incolla o scrivi il tuo testo per contare parole, caratteri con e senza spazi, frasi e paragrafi, oltre al tempo di lettura, al tempo di lettura ad alta voce e alla densità delle parole chiave.',
        'seo_title' => 'Contatore di parole e caratteri online',
        'seo_description' => 'Contatore di parole gratis. Conta parole, caratteri (con e senza spazi), frasi e paragrafi, e guarda il tempo di lettura e le parole chiave.',
        'content' => <<<'HTML'
<h2>Limiti di lunghezza comuni</h2>
<ul>
<li><strong>Meta description:</strong> circa 150–160 caratteri.</li>
<li><strong>Titolo della pagina per Google:</strong> circa 50–60 caratteri.</li>
<li><strong>Post su X (Twitter):</strong> 280 caratteri.</li>
<li><strong>Post su LinkedIn:</strong> 3000 caratteri.</li>
<li><strong>Temi e tesine:</strong> spesso tra 500 e 1500 parole.</li>
<li><strong>Articolo di blog che si posiziona bene:</strong> spesso 1000–2000 parole, a seconda dell’argomento.</li>
</ul>
<h2>Consigli di scrittura</h2>
<p>Sullo schermo si legge in diagonale: dividi i paragrafi lunghi in blocchi da due a quattro frasi e usa i sottotitoli per guidare la lettura. Le frasi brevi funzionano meglio online. Usa l’elenco delle parole chiave per verificare che l’argomento principale compaia in modo naturale e che non ripeti troppo nessuna parola. Per correggere maiuscole e minuscole usa il Convertitore maiuscole e minuscole; per confrontare due bozze usa Confronta testi.</p>
HTML,
        'steps' => [
            'Scrivi o incolla il tuo testo nel riquadro. I conteggi si aggiornano mentre scrivi.',
            'Guarda il numero di parole, caratteri (con e senza spazi), frasi, paragrafi e righe.',
            'Controlla il tempo di lettura stimato e quello ad alta voce: utile per articoli, discorsi e presentazioni.',
            'Controlla le parole più frequenti e la loro densità per evitare ripetizioni e verificare il focus SEO.',
        ],
        'faq' => [
            ['q' => 'Come vengono contate le parole?', 'a' => 'Una parola è qualsiasi sequenza di lettere o numeri. Le parole con trattino, come <em>italo-francese</em>, contano come una sola. Punteggiatura ed emoji non contano come parole.'],
            ['q' => 'Il conteggio dei caratteri include gli spazi?', 'a' => 'Vengono mostrati entrambi: <strong>Caratteri</strong> include spazi e a capo, mentre <strong>Caratteri (senza spazi)</strong> li esclude tutti. Emoji e lettere accentate contano come un carattere ciascuna.'],
            ['q' => 'Come viene calcolato il tempo di lettura?', 'a' => 'Il tempo di lettura presuppone una velocità media di lettura silenziosa di 238 parole al minuto. Il tempo ad alta voce presuppone 130 parole al minuto, un ritmo comune nelle presentazioni.'],
            ['q' => 'Che cos’è la densità delle parole chiave?', 'a' => 'È la frequenza con cui una parola compare rispetto al totale delle parole. Le parole molto comuni, come <em>il</em>, <em>la</em> o <em>e</em>, vengono ignorate per mostrarti le parole che caratterizzano il testo.'],
            ['q' => 'Il mio testo viene salvato o caricato?', 'a' => 'No. Tutto viene contato nel tuo browser. Il testo non viene mai inviato a un server.'],
        ],
    ],

    'case-converter' => [
        'slug' => 'maiuscole-minuscole',
        'name' => 'Convertitore maiuscole e minuscole',
        'short_description' => 'Trasforma il testo in MAIUSCOLO, minuscolo, Stile Titolo, camelCase e altro.',
        'description' => 'Converti il testo in maiuscolo, minuscolo, stile titolo, maiuscola iniziale o in formati per sviluppatori come camelCase, snake_case e kebab-case con un clic.',
        'seo_title' => 'Converti maiuscole e minuscole online',
        'seo_description' => 'Convertitore maiuscole e minuscole gratis. Trasforma testi in MAIUSCOLO, minuscolo, Stile Titolo, maiuscola iniziale, camelCase, snake_case e kebab-case.',
        'content' => <<<'HTML'
<h2>Quale formato usare?</h2>
<ul>
<li><strong>Maiuscola iniziale</strong>: testi, etichette dell’interfaccia e la maggior parte dei titoli in italiano.</li>
<li><strong>Stile Titolo</strong>: titoli in inglese di articoli, libri e notizie.</li>
<li><strong>MAIUSCOLO</strong>: etichette brevi, sigle ed enfasi (con moderazione).</li>
<li><strong>camelCase e PascalCase</strong>: variabili, funzioni e classi in JavaScript, Java e C#.</li>
<li><strong>snake_case e CONSTANT_CASE</strong>: Python, Ruby, colonne SQL e costanti.</li>
<li><strong>kebab-case</strong>: URL, classi CSS e nomi di file.</li>
</ul>
<p>Hai scritto un intero paragrafo con il Bloc Maiusc attivo senza accorgertene? Incollalo qui e convertilo in maiuscola iniziale con un clic invece di riscriverlo. Per contare parole o caratteri dopo, usa il Contatore di parole.</p>
HTML,
        'steps' => [
            'Incolla o scrivi il testo nel riquadro di input.',
            'Scegli un formato: MAIUSCOLO, minuscolo, Stile Titolo, maiuscola iniziale e altri.',
            'Se programmi, converti il testo in <strong>camelCase</strong>, <strong>snake_case</strong>, <strong>kebab-case</strong>, <strong>PascalCase</strong> o <strong>CONSTANT_CASE</strong>.',
            'Copia il testo convertito o scaricalo come file.',
        ],
        'faq' => [
            ['q' => 'Che cos’è lo Stile Titolo?', 'a' => 'Lo Stile Titolo mette in maiuscolo la prima lettera di ogni parola importante, mentre le parole brevi inglesi come <em>a</em>, <em>and</em>, <em>of</em> e <em>the</em> restano minuscole tranne all’inizio o alla fine. È lo stile dei titoli e dei libri in inglese; in italiano si consiglia la maiuscola iniziale.'],
            ['q' => 'Che differenza c’è tra Stile Titolo e Ogni Parola Maiuscola?', 'a' => 'Ogni Parola Maiuscola mette in maiuscolo tutte le parole, comprese quelle brevi. Lo Stile Titolo segue le regole dei titoli inglesi e lascia minuscole le parole piccole.'],
            ['q' => 'Come funziona la maiuscola iniziale?', 'a' => 'Trasforma tutto in minuscolo e mette in maiuscolo la prima lettera di ogni frase. I nomi propri vanno corretti a mano.'],
            ['q' => 'Posso sistemare un testo scritto con il Bloc Maiusc attivo?', 'a' => 'Sì. Usa iNVERTITO per scambiare maiuscole e minuscole, oppure la maiuscola iniziale per riscriverlo correttamente.'],
            ['q' => 'Il mio testo viene salvato?', 'a' => 'No. La conversione avviene nel tuo browser e nulla viene caricato.'],
        ],
    ],

    'text-compare' => [
        'slug' => 'confronta-testi',
        'name' => 'Confronta testi',
        'short_description' => 'Confronta due testi ed evidenzia le differenze.',
        'description' => 'Incolla due versioni di un testo per vedere esattamente cosa è stato aggiunto e rimosso, riga per riga o parola per parola. Ideale per documenti, contratti e codice.',
        'seo_title' => 'Confronta testi: trova le differenze',
        'seo_description' => 'Confronta due testi online ed evidenzia le differenze per riga o per parola. Ignora maiuscole e spazi. Privato: il testo non lascia il tuo browser.',
        'content' => <<<'HTML'
<h2>Cosa puoi confrontare</h2>
<ul>
<li>Due versioni di un contratto, di un saggio o di un articolo.</li>
<li>File di configurazione e porzioni di codice.</li>
<li>Elenchi esportati in momenti diversi, per vedere cosa è stato aggiunto o rimosso.</li>
<li>Traduzioni o revisioni prima della pubblicazione.</li>
</ul>
<h2>Confronto per riga o per parola</h2>
<p>La modalità per riga mostra quali righe sono cambiate: perfetta per codice e dati. La modalità per parola indica esattamente quali parole sono cambiate in un paragrafo: ideale per la revisione dei testi. Combinala con Rimuovi righe duplicate e Ordina righe per confrontare elenchi in cui l’ordine non conta.</p>
HTML,
        'steps' => [
            'Incolla il testo originale a sinistra e quello modificato a destra.',
            "Le differenze compaiono subito sotto: il testo <span class='rounded bg-danger-soft px-1 text-danger'>rimosso</span> in rosso e quello <span class='rounded bg-success-soft px-1 text-success'>aggiunto</span> in verde.",
            'Confronta <strong>per riga</strong> per codice, elenchi e documenti, oppure <strong>per parola</strong> per individuare piccole modifiche nelle frasi.',
            'Ignora maiuscole o spazi superflui quando conta solo il contenuto.',
        ],
        'faq' => [
            ['q' => 'Come funziona il confronto dei testi?', 'a' => 'Lo strumento usa l’algoritmo delle differenze di Myers, lo stesso approccio di Git, per trovare l’insieme più piccolo di inserimenti ed eliminazioni che trasforma il testo originale in quello nuovo.'],
            ['q' => 'Meglio confrontare per riga o per parola?', 'a' => 'La modalità per riga è migliore per codice, dati CSV, elenchi e documenti lunghi. La modalità per parola evidenzia esattamente le parole cambiate nelle frasi, ideale per rivedere testi e versioni di contratti.'],
            ['q' => 'Posso confrontare del codice?', 'a' => 'Sì. Usa la modalità per riga. Attiva Ignora spazi per non considerare le modifiche che riguardano solo il rientro.'],
            ['q' => 'C’è un limite di dimensioni?', 'a' => 'Testi di migliaia di righe vengono confrontati all’istante. Se i due testi sono estremamente diversi, lo strumento ti chiederà di confrontare sezioni più brevi.'],
            ['q' => 'Il mio testo viene caricato online?', 'a' => 'No. Il confronto avviene interamente nel tuo browser, quindi i documenti riservati restano privati.'],
        ],
    ],

    'remove-duplicate-lines' => [
        'slug' => 'rimuovi-righe-duplicate',
        'name' => 'Rimuovi righe duplicate',
        'short_description' => 'Elimina le righe ripetute da un elenco mantenendo l’ordine originale.',
        'description' => 'Rimuovi le righe duplicate da elenchi di email, parole chiave, URL o nomi in un solo passaggio, con opzioni per ignorare le maiuscole, togliere gli spazi ed eliminare le righe vuote.',
        'seo_title' => 'Rimuovi righe duplicate da qualsiasi elenco',
        'seo_description' => 'Rimuovi righe duplicate gratis. Mantiene l’ordine originale, può ignorare le maiuscole e togliere gli spazi. Funziona con elenchi grandi nel tuo browser.',
        'content' => <<<'HTML'
<h2>Pulisci qualsiasi elenco</h2>
<p>I duplicati si infilano in liste di email, ricerche di parole chiave, cataloghi di prodotti ed esportazioni di dati. Rimuoverli evita di inviare due volte la stessa email, di contare due volte una parola chiave o di importare record ripetuti in un database.</p>
<h2>Consigli</h2>
<ul>
<li>Attiva <strong>Ignora maiuscole</strong> per email e parole chiave, dove le maiuscole non contano.</li>
<li>Lascia attivo <strong>Rimuovi gli spazi superflui</strong> per trovare duplicati che differiscono solo per spazi invisibili.</li>
<li>Ti serve anche l’elenco in ordine alfabetico? Passalo in Ordina righe.</li>
</ul>
<h2>Funziona con i dati dei fogli di calcolo</h2>
<p>Copia una colonna da Excel o Fogli Google, incollala qui e incolla di nuovo i valori univoci. Ogni cella diventa una riga, così ripulisci migliaia di righe in pochi secondi, senza formule.</p>
HTML,
        'steps' => [
            'Incolla il tuo elenco nel riquadro di input, un elemento per riga.',
            'Le righe duplicate vengono rimosse all’istante. Resta la prima occorrenza di ogni riga, nell’ordine originale.',
            'Scegli se <strong>Mela</strong> e <strong>mela</strong> contano come la stessa riga, e se togliere gli spazi ed eliminare le righe vuote.',
            'Copia l’elenco pulito o scaricalo come file di testo.',
        ],
        'faq' => [
            ['q' => 'L’ordine originale viene mantenuto?', 'a' => 'Sì. Le righe mantengono l’ordine originale e vengono rimosse solo le ripetizioni successive. Per ordinare anche l’elenco, usa Ordina righe.'],
            ['q' => 'Cosa fa Ignora maiuscole?', 'a' => 'Con Ignora maiuscole attivo, le righe che differiscono solo per le maiuscole (come <em>Email</em> ed <em>email</em>) vengono considerate duplicati e si mantiene solo la prima.'],
            ['q' => 'A cosa serve togliere gli spazi superflui?', 'a' => 'Le righe copiate da fogli di calcolo o documenti hanno spesso spazi invisibili all’inizio o alla fine. Toglierli garantisce che quelle righe vengano riconosciute come duplicati.'],
            ['q' => 'Posso pulire un elenco di email o parole chiave?', 'a' => 'Sì. Funziona con qualsiasi elenco: email, URL, parole chiave, codici prodotto o nomi. Gli elenchi grandi, con centinaia di migliaia di righe, vengono elaborati in un attimo.'],
            ['q' => 'I miei dati restano privati?', 'a' => 'Sì. Il testo viene elaborato nel tuo browser e non viene mai caricato.'],
        ],
    ],

    'sort-lines' => [
        'slug' => 'ordina-righe',
        'name' => 'Ordina righe',
        'short_description' => 'Ordina le righe alfabeticamente, per lunghezza, al contrario o a caso.',
        'description' => 'Ordina qualsiasi elenco dalla A alla Z o dalla Z alla A con ordinamento naturale dei numeri, per lunghezza, al contrario o mescolato a caso. Facoltativamente rimuovi duplicati e righe vuote.',
        'seo_title' => 'Ordina righe in ordine alfabetico online',
        'seo_description' => 'Ordina righe di testo in ordine alfabetico online: A–Z, Z–A, ordinamento naturale dei numeri, per lunghezza, al contrario o a caso. Gratis e immediato.',
        'content' => <<<'HTML'
<h2>Ordina gli elenchi come ci si aspetta</h2>
<p>L’ordine alfabetico semplice mette «Elemento 10» prima di «Elemento 2» perché confronta carattere per carattere. L’ordinamento naturale confronta i numeri in base al valore, così elenchi di nomi di file, versioni, capitoli e numeri di fattura finiscono nell’ordine giusto.</p>
<h2>Usi più comuni</h2>
<ul>
<li>Mettere in ordine alfabetico nomi, glossari e bibliografie.</li>
<li>Mescolare un elenco per estrazioni, squadre casuali o domande di un quiz.</li>
<li>Invertire un registro o una cronologia.</li>
<li>Ordinare parole chiave o URL prima di confrontarli con Confronta testi.</li>
</ul>
<p>Per rimuovere le voci ripetute senza cambiare l’ordine, usa Rimuovi righe duplicate.</p>
HTML,
        'steps' => [
            'Incolla il tuo elenco nel riquadro di input, un elemento per riga.',
            'Scegli l’ordine: <strong>A → Z</strong>, <strong>Z → A</strong>, per lunghezza, al contrario o casuale (mescola).',
            'Lascia attivo <strong>Ordinamento naturale</strong> perché <em>elemento 2</em> venga prima di <em>elemento 10</em>.',
            'Se vuoi, rimuovi duplicati e righe vuote, poi copia o scarica l’elenco ordinato.',
        ],
        'faq' => [
            ['q' => 'Che cos’è l’ordinamento naturale?', 'a' => 'L’ordinamento naturale ordina i numeri presenti nel testo in base al valore, come farebbe una persona: <em>file 2</em> viene prima di <em>file 10</em>. Un ordine alfabetico semplice metterebbe prima <em>file 10</em>.'],
            ['q' => 'Come metto un elenco in ordine alfabetico?', 'a' => 'Incolla l’elenco e scegli A → Z. L’ordinamento ignora le maiuscole, a meno che tu non attivi Distingui maiuscole.'],
            ['q' => 'Come mescolo un elenco a caso?', 'a' => 'Scegli Casuale. Ogni clic su <strong>Mescola di nuovo</strong> produce un nuovo ordine casuale, utile per estrazioni, formare squadre o domande di un quiz.'],
            ['q' => 'Funziona con le lettere accentate e con altre lingue?', 'a' => 'Sì. L’ordinamento usa un confronto che rispetta la lingua, quindi le lettere accentate vengono ordinate insieme alla loro lettera base.'],
            ['q' => 'Il mio elenco viene caricato online?', 'a' => 'No. L’ordinamento avviene nel tuo browser.'],
        ],
    ],

    'lorem-ipsum-generator' => [
        'slug' => 'generatore-lorem-ipsum',
        'name' => 'Generatore di Lorem Ipsum',
        'short_description' => 'Genera testo segnaposto per paragrafi, frasi o parole.',
        'description' => 'Crea testo segnaposto Lorem Ipsum per mockup e layout. Scegli paragrafi, frasi o parole, mantieni l’inizio classico ed esporta in testo semplice o HTML.',
        'seo_title' => 'Generatore di Lorem Ipsum: testo segnaposto',
        'seo_description' => 'Genera testo segnaposto Lorem Ipsum online. Paragrafi, frasi o parole, paragrafi HTML facoltativi e copia con un clic. Gratis per qualsiasi progetto.',
        'content' => <<<'HTML'
<h2>Da dove viene il Lorem Ipsum?</h2>
<p>Il passo classico deriva dal «De finibus bonorum et malorum» scritto da Cicerone nel 45 a.C. I tipografi usano versioni rimescolate di questo testo dal XVI secolo perché ha una distribuzione naturale di lettere e lunghezze delle parole: i layout sembrano realistici senza che il contenuto distragga chi li revisiona.</p>
<h2>Consigli per designer e sviluppatori</h2>
<ul>
<li>Usa lunghezze realistiche: genera il numero di parole che avrà il contenuto vero.</li>
<li>Sostituisci il testo segnaposto con quello reale il prima possibile: è il contenuto a dare forma al design.</li>
<li>Usa l’opzione HTML per incollare i paragrafi direttamente nei tuoi prototipi.</li>
</ul>
<p>Vuoi sapere quanto è lungo il tuo testo reale? Usa il Contatore di parole.</p>
HTML,
        'steps' => [
            'Scegli quanto testo segnaposto ti serve e se contarlo in <strong>paragrafi</strong>, <strong>frasi</strong> o <strong>parole</strong>.',
            'Lascia attivo <strong>Inizia con «Lorem ipsum…»</strong> per l’apertura classica, oppure disattivalo per un testo completamente casuale.',
            'Attiva <strong>HTML</strong> per racchiudere ogni paragrafo in tag <code>&lt;p&gt;</code>, pronto da incollare in una pagina web.',
            'Copia o scarica il testo. Fai clic su <strong>Genera</strong> per ottenere una nuova variante.',
        ],
        'faq' => [
            ['q' => 'Che cos’è il Lorem Ipsum?', 'a' => 'Il Lorem Ipsum è un testo segnaposto in latino rimescolato, derivato da un’opera di Cicerone. Designer e sviluppatori lo usano per riempire i layout e concentrare l’attenzione sul design invece che sul contenuto.'],
            ['q' => 'Perché usare un testo segnaposto invece di un testo reale?', 'a' => 'Mostra come il testo reale scorrerà in un layout — lunghezza delle righe, spazi tra i paragrafi e tipografia — prima che il testo definitivo sia pronto, senza che il significato distragga.'],
            ['q' => 'Posso usare gratis il testo generato?', 'a' => 'Sì. Il Lorem Ipsum non è protetto da diritto d’autore e puoi usare il testo generato in qualsiasi progetto.'],
            ['q' => 'Quanto testo posso generare?', 'a' => 'Fino a 200 paragrafi o frasi, oppure 5000 parole alla volta.'],
        ],
    ],
];
