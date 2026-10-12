<?php

/*
| Italian copy for converters, generators, health calculators and everyday
| tools. See content/it/tools.php.
*/

return [
    'json-to-csv' => [
        'slug' => 'json-in-csv',
        'name' => 'JSON in CSV',
        'short_description' => 'Converti array JSON in CSV per Excel e Fogli Google.',
        'description' => 'Converti JSON in CSV all’istante. Gli oggetti annidati diventano colonne e puoi scegliere virgola, punto e virgola, tabulazione o barra verticale come delimitatore.',
        'seo_title' => 'Converti JSON in CSV gratis per Excel e Fogli',
        'seo_description' => 'Converti JSON in CSV gratis online. Appiattisce gli oggetti annidati, supporta virgola, punto e virgola e tabulazione e scarica un CSV pronto da aprire.',
        'content' => <<<'HTML'
<h2>Apri dati JSON in Excel o Fogli Google</h2>
<p>API e database esportano JSON, ma i fogli di calcolo lavorano con righe e colonne. Convertire JSON in CSV ti permette di ordinare, filtrare, creare grafici e condividere i dati con chi non programma.</p>
<h2>Come la conversione tratta i tuoi dati</h2>
<ul>
<li>Ogni oggetto dell’array diventa una riga.</li>
<li>Ogni chiave presente in almeno un oggetto diventa una colonna.</li>
<li>Gli oggetti annidati vengono appiattiti, ad esempio <code>address.city</code>.</li>
<li>I valori che un foglio di calcolo potrebbe interpretare come formule vengono neutralizzati per sicurezza.</li>
</ul>
<p>Il tuo JSON non è valido? Correggilo prima con il Formattatore JSON. Ti serve il percorso inverso? Usa CSV in JSON.</p>
HTML,
        'steps' => [
            'Incolla un array JSON di oggetti (o un singolo oggetto) nell’input, oppure fai clic su <strong>Carica esempio</strong>.',
            'Scegli il delimitatore: virgola per la maggior parte degli strumenti, punto e virgola per Excel nei paesi che usano la virgola decimale (come l’Italia), oppure tabulazione per il TSV.',
            'Il CSV compare all’istante. Gli oggetti annidati diventano colonne come <code>address.city</code>.',
            'Copia il CSV o scaricalo come file <code>.csv</code>, pronto per Excel, Fogli Google o Numbers.',
        ],
        'faq' => [
            ['q' => 'Quale struttura JSON funziona meglio?', 'a' => 'Un array di oggetti, come <code>[{&quot;name&quot;: &quot;Ada&quot;}, {&quot;name&quot;: &quot;Alan&quot;}]</code>. Ogni oggetto diventa una riga e ogni chiave una colonna. Gli oggetti con chiavi diverse vengono uniti; i valori mancanti restano vuoti.'],
            ['q' => 'Come vengono gestiti oggetti e array annidati?', 'a' => 'Gli oggetti annidati vengono appiattiti con la notazione a punti (<code>address.city</code>). Gli array vengono scritti nella cella come testo JSON per non perdere dati.'],
            ['q' => 'Perché usare il punto e virgola come delimitatore?', 'a' => 'Nei paesi in cui la virgola è il separatore decimale (come Italia e Svizzera), Excel si aspetta file separati da punto e virgola. Scegli il punto e virgola se all’apertura del file le colonne compaiono tutte insieme.'],
            ['q' => 'È sicuro aprire il CSV in Excel?', 'a' => 'Sì. Ai valori che iniziano con <code>=</code>, <code>+</code>, <code>-</code> o <code>@</code> viene anteposto un apostrofo per evitare l’iniezione di formule.'],
            ['q' => 'I miei dati vengono caricati online?', 'a' => 'No. La conversione avviene interamente nel tuo browser.'],
        ],
    ],

    'csv-to-json' => [
        'slug' => 'csv-in-json',
        'name' => 'CSV in JSON',
        'short_description' => 'Converti CSV o dati di fogli di calcolo in JSON pulito.',
        'description' => 'Incolla un CSV o dati copiati da Excel e ottieni un array JSON di oggetti. I delimitatori vengono rilevati automaticamente e numeri e booleani diventano tipi reali.',
        'seo_title' => 'Converti CSV in JSON online, gratis',
        'seo_description' => 'Converti CSV in JSON gratis online. Rileva i delimitatori, gestisce i campi tra virgolette, converte numeri e booleani e funziona con i dati di Excel.',
        'content' => <<<'HTML'
<h2>Perché convertire CSV in JSON?</h2>
<p>Il JSON è il formato che applicazioni web, API e JavaScript comprendono in modo nativo. Convertire un’esportazione da foglio di calcolo in JSON rende facile popolare un database, simulare la risposta di un’API, importare dati in un CMS o caricare una configurazione in un’applicazione.</p>
<h2>Dati puliti, tipi reali</h2>
<p>Con il rilevamento dei tipi, i numeri diventano numeri e <code>true</code>/<code>false</code> diventano booleani, mentre valori come i CAP con zeri iniziali restano testo. I campi tra virgolette con virgole e a capo vengono interpretati correttamente.</p>
<p>Vuoi controllare o abbellire il risultato? Incollalo nel Formattatore JSON. Per tornare a un foglio di calcolo usa JSON in CSV.</p>
HTML,
        'steps' => [
            'Incolla i dati CSV nell’input oppure fai clic su <strong>Carica esempio</strong>. Puoi incollare direttamente da Excel o Fogli Google.',
            'Lascia il delimitatore su <strong>Automatico</strong> oppure scegli virgola, punto e virgola, tabulazione o barra verticale.',
            'Lascia attivo <strong>La prima riga è l’intestazione</strong> per ottenere un array di oggetti, oppure disattivalo per un array di array.',
            'Con <strong>Rileva i tipi</strong>, numeri e true/false diventano veri valori JSON. Copia o scarica il risultato come <code>.json</code>.',
        ],
        'faq' => [
            ['q' => 'Posso incollare dati copiati da Excel o Fogli Google?', 'a' => 'Sì. I dati di un foglio di calcolo vengono copiati come testo separato da tabulazioni, e il delimitatore automatico lo riconosce.'],
            ['q' => 'Come vengono gestite virgolette e a capo nelle celle?', 'a' => 'Il parser segue lo standard CSV (RFC 4180): i campi tra virgolette doppie possono contenere virgole, a capo e virgolette con escape (<code>&quot;&quot;</code>).'],
            ['q' => 'Perché alcuni numeri restano testo?', 'a' => 'I valori con zeri iniziali, come CAP o codici del tipo <code>007</code>, restano testo per non perdere informazioni. Anche i numeri molto lunghi restano testo per evitare errori di precisione.'],
            ['q' => 'Cosa succede ai nomi di colonna duplicati o vuoti?', 'a' => 'Le intestazioni duplicate ricevono un suffisso (<code>name_2</code>) e quelle vuote si chiamano <code>column_N</code>, così tutti i valori vengono conservati.'],
            ['q' => 'I miei dati restano privati?', 'a' => 'Sì. La conversione avviene nel tuo browser e i dati non vengono mai caricati.'],
        ],
    ],

    'unit-converter' => [
        'slug' => 'convertitore-unita',
        'name' => 'Convertitore di unità',
        'short_description' => 'Converti lunghezza, peso, temperatura, volume, superficie, velocità e altro.',
        'description' => 'Converti all’istante tra unità metriche e imperiali: chilometri in miglia, chili in libbre, Celsius in Fahrenheit, tazze in millilitri, piedi quadrati in metri quadrati, MB in GB e molto altro.',
        'seo_title' => 'Convertitore di unità: lunghezza, peso e altro',
        'seo_description' => 'Convertitore di unità gratis: lunghezza, peso, temperatura, volume, superficie, velocità, tempo e dati. Unità metriche e imperiali, risultati precisi.',
        'content' => <<<'HTML'
<h2>Sistema metrico e imperiale</h2>
<p>La maggior parte del mondo usa il sistema metrico (metri, chili, litri, °C), mentre gli Stati Uniti usano soprattutto unità tradizionali (piedi, libbre, galloni, °F) e il Regno Unito mescola i due. Ricette, viaggi, acquisti online, progetti edilizi e compiti di scienze richiedono continuamente di passare da un sistema all’altro.</p>
<h2>Valori di riferimento utili</h2>
<ul>
<li>1 pollice = 2,54 cm · 1 piede = 30,48 cm · 1 miglio = 1,609 km</li>
<li>1 kg = 2,2046 lb · 1 oncia = 28,35 g</li>
<li>1 tazza (USA) = 236,6 ml · 1 cucchiaio = 3 cucchiaini</li>
<li>0 °C = 32 °F · 100 °C = 212 °F</li>
<li>1 acro = 43.560 ft² · 1 ettaro = 2,471 acri</li>
</ul>
<p>Lavori con date invece che con misure? Prova Calcolo date. Per i soldi, Calcolo percentuale gestisce sconti e aumenti.</p>
HTML,
        'steps' => [
            'Scegli una categoria: lunghezza, peso, temperatura, volume, superficie, velocità, tempo o dati.',
            'Inserisci un valore e scegli le unità di <strong>partenza</strong> e di <strong>arrivo</strong>.',
            'Il risultato si aggiorna all’istante. Usa <strong>Inverti</strong> per invertire la conversione.',
            'Guarda lo stesso valore in tutte le altre unità della categoria nella tabella qui sotto.',
        ],
        'faq' => [
            ['q' => 'Quanti centimetri ci sono in un pollice?', 'a' => 'Esattamente 2,54 centimetri. Un piede misura 30,48 cm e un miglio 1,609344 chilometri: sono definizioni internazionali esatte.'],
            ['q' => 'Come converto i Celsius in Fahrenheit?', 'a' => 'Moltiplica per 9/5 e aggiungi 32: °F = °C × 9/5 + 32. Ad esempio, 20 °C sono 68 °F. Per tornare indietro, sottrai 32 e moltiplica per 5/9.'],
            ['q' => 'Quante libbre ci sono in un chilo?', 'a' => 'Un chilogrammo equivale a circa 2,2046 libbre, e una libbra è esattamente 0,45359237 chilogrammi.'],
            ['q' => 'Tazze e galloni sono statunitensi o britannici?', 'a' => 'Tazze, once liquide, pinte, quarti e galloni usano le misure USA. I galloni britannici (imperiali) sono elencati a parte perché sono circa il 20% più grandi.'],
            ['q' => 'Che differenza c’è tra MB e MiB?', 'a' => 'Un megabyte (MB) sono 1.000.000 di byte, la misura usata dai produttori di memorie. Un mebibyte (MiB) sono 1.048.576 byte (1024²), quella usata da molti sistemi operativi. Per questo un disco da 1 TB mostra circa 931 GiB.'],
        ],
    ],

    'qr-generator' => [
        'slug' => 'generatore-codici-qr',
        'name' => 'Generatore di codici QR',
        'short_description' => 'Crea codici QR per link, testo, email, telefono e Wi-Fi.',
        'description' => 'Genera codici QR personalizzati con i tuoi colori, dimensioni e margini e scaricali in PNG o SVG. Gratis, senza account e senza inviare nulla a un server.',
        'seo_title' => 'Generatore di codici QR gratis in PNG e SVG',
        'seo_description' => 'Crea codici QR gratis per URL, testo, email, telefono e Wi-Fi. Colori, dimensioni e margini personalizzabili. Scarica in PNG o SVG. Senza registrazione.',
        'content' => <<<'HTML'
<h2>Cosa puoi fare con un codice QR?</h2>
<ul>
<li><strong>URL</strong>: collega a un sito, un menu, un portfolio o una pagina di recensioni.</li>
<li><strong>Wi-Fi</strong>: fai connettere gli ospiti alla tua rete senza digitare la password.</li>
<li><strong>Email e telefono</strong>: avvia un’email o una chiamata con una sola scansione.</li>
<li><strong>Testo</strong>: condividi una nota breve, un codice sconto o un numero di serie.</li>
</ul>
<h2>Consigli perché il QR si legga sempre</h2>
<p>Mantieni un buon contrasto — un codice scuro su sfondo chiaro — e lascia un margine libero tutto intorno. Stampalo almeno di 2 × 2 cm, e più grande se verrà scansionato da lontano, come su un manifesto. Usa un livello di correzione degli errori più alto se il codice potrebbe graffiarsi o essere coperto in parte.</p>
<p>I codici che crei qui sono statici e gratis per sempre: non scadono e non dipendono dal nostro sito per funzionare.</p>
HTML,
        'steps' => [
            'Scegli cosa conterrà il codice QR: un <strong>URL</strong>, un <strong>testo</strong>, un’<strong>email</strong>, un numero di <strong>telefono</strong> o i dati di una rete <strong>Wi-Fi</strong>.',
            'Compila i dati. L’anteprima si aggiorna all’istante mentre scrivi.',
            'Personalizza dimensioni, margine e colori. Mantieni un colore scuro su sfondo chiaro perché qualsiasi telefono possa leggerlo.',
            'Scarica il codice QR in <strong>PNG</strong> per documenti e social, oppure in <strong>SVG</strong> per la stampa e gli strumenti di design.',
        ],
        'faq' => [
            ['q' => 'Questi codici QR scadono?', 'a' => 'No. I codici QR sono statici: il contenuto è codificato direttamente nell’immagine, quindi funzionano per sempre e non dipendono dal nostro sito.'],
            ['q' => 'Meglio scaricare in PNG o in SVG?', 'a' => 'Usa il PNG per siti web, documenti e social. Usa l’SVG per stampa, manifesti e strumenti di design: è un formato vettoriale che resta perfettamente nitido a qualsiasi dimensione.'],
            ['q' => 'Come funziona il codice QR per il Wi-Fi?', 'a' => 'Quando lo scansioni con la fotocamera del telefono, il codice QR Wi-Fi propone di connettersi automaticamente alla rete, senza digitare la password. Funziona con iPhone e Android recenti.'],
            ['q' => 'Che cos’è il livello di correzione degli errori?', 'a' => 'La correzione degli errori permette a un codice QR di restare leggibile anche se una parte è danneggiata o coperta. I livelli più alti (Q, H) sono più robusti, ma rendono il codice più denso. M è una buona scelta predefinita.'],
            ['q' => 'I miei dati vengono salvati?', 'a' => 'No. I codici QR vengono generati nel tuo browser. URL, messaggi e password del Wi-Fi non vengono mai inviati ai nostri server.'],
        ],
    ],

    'password-generator' => [
        'slug' => 'generatore-password',
        'name' => 'Generatore di password',
        'short_description' => 'Crea password sicure e casuali della lunghezza e con i caratteri che vuoi.',
        'description' => 'Genera password casuali sicure scegliendo lunghezza, maiuscole, minuscole, numeri e simboli. Guarda la robustezza in bit e crea fino a 50 password alla volta.',
        'seo_title' => 'Generatore di password sicure e casuali',
        'seo_description' => 'Genera password sicure e casuali. Scegli lunghezza e caratteri, escludi quelli simili e controlla la robustezza. Le password vengono create nel tuo browser.',
        'content' => <<<'HTML'
<h2>Cosa rende sicura una password?</h2>
<p>La robustezza dipende soprattutto dalla <strong>lunghezza</strong> e dalla <strong>casualità</strong>. Una password casuale di 16 caratteri con lettere, numeri e simboli supera i 100 bit di entropia, ben oltre ciò che un attaccante può indovinare. Le password inventate dalle persone, come nomi, date o parole con un numero alla fine, sono prevedibili per quanto sembrino ingegnose.</p>
<h2>Buone pratiche</h2>
<ul>
<li>Usa una password diversa per ogni account.</li>
<li>Conserva le password in un password manager invece di riutilizzarle.</li>
<li>Attiva l’autenticazione a due fattori (2FA) per email, banca e social network.</li>
<li>Cambia subito la password se un servizio segnala una violazione dei dati.</li>
</ul>
<p>Ti servono identificatori univoci invece di segreti? Prova il Generatore di UUID.</p>
HTML,
        'steps' => [
            'Scegli la <strong>lunghezza</strong> della password. Per gli account importanti sono consigliati 16 caratteri o più.',
            'Seleziona i caratteri da includere: minuscole, maiuscole, numeri e simboli.',
            'Se devi digitare la password a mano, puoi escludere caratteri simili come <code>l</code>, <code>1</code>, <code>O</code> e <code>0</code>.',
            'Copia la password con un clic. Fai clic su <strong>Genera</strong> per ottenerne un’altra, oppure creane fino a 50 alla volta.',
        ],
        'faq' => [
            ['q' => 'Queste password sono sicure?', 'a' => 'Sì. Vengono generate nel tuo browser con la Web Crypto API, un generatore di numeri casuali crittograficamente sicuro, e non vengono mai inviate né salvate su alcun server.'],
            ['q' => 'Quanto deve essere lunga una password?', 'a' => 'Almeno 12 caratteri, e 16 o più per email, banca e la password principale del tuo password manager. La lunghezza dà più sicurezza della complessità.'],
            ['q' => 'Cosa significa la robustezza in bit?', 'a' => 'L’entropia misura quanti tentativi servirebbero a un attaccante. Ogni bit in più raddoppia il lavoro. Oltre 60 bit va bene per la maggior parte degli account, oltre 80 bit è robusto anche contro attacchi offline.'],
            ['q' => 'Posso riutilizzare una password sicura?', 'a' => 'No. Usa una password unica per ogni account e conservale in un password manager. Se un sito subisce una violazione, gli altri tuoi account restano al sicuro.'],
            ['q' => 'Ogni tipo di carattere è garantito?', 'a' => 'Sì. Ogni password include almeno un carattere di ciascun tipo selezionato.'],
        ],
    ],

    'uuid-generator' => [
        'slug' => 'generatore-uuid',
        'name' => 'Generatore di UUID',
        'short_description' => 'Genera UUID v4 casuali e v7 ordinati nel tempo, in blocco.',
        'description' => 'Genera fino a 1000 UUID (GUID) alla volta in versione 4 o 7, in maiuscolo, senza trattini o tra parentesi graffe, e convalida UUID esistenti.',
        'seo_title' => 'Generatore di UUID v4 e v7 (GUID) in blocco',
        'seo_description' => 'Genera UUID gratis online. UUID v4 e v7 in blocco, in maiuscolo, senza trattini o con graffe in stile GUID. Crittograficamente sicuri e generati nel browser.',
        'content' => <<<'HTML'
<h2>Quando usare gli UUID</h2>
<p>Gli UUID sono ideali quando gli identificatori devono essere creati in molti posti senza un contatore centrale: database distribuiti, app che funzionano offline, code di messaggi, nomi di file e identificatori pubblici che non devono rivelare quanti record esistono.</p>
<h2>Le versioni di UUID in breve</h2>
<ul>
<li><strong>v4</strong>: 122 bit casuali; la più supportata.</li>
<li><strong>v7</strong>: inizia con un timestamp Unix, quindi gli ID sono ordinati per data di creazione e mantengono efficienti gli indici del database.</li>
<li><strong>v1</strong>: basata su tempo e macchina; in gran parte sostituita dalla v7.</li>
</ul>
<p>Ti servono segreti casuali invece di identificatori? Usa il Generatore di password.</p>
HTML,
        'steps' => [
            'Scegli quanti UUID ti servono (fino a 1000 alla volta).',
            'Scegli la versione: <strong>v4</strong> (casuale, la più comune) o <strong>v7</strong> (ordinata nel tempo, ideale per le chiavi di database).',
            'Se vuoi, passa al maiuscolo, togli i trattini o racchiudi ogni UUID tra parentesi graffe.',
            'Copia l’elenco o scaricalo come file di testo. Fai clic su <strong>Genera</strong> per un nuovo blocco.',
        ],
        'faq' => [
            ['q' => 'Che cos’è un UUID?', 'a' => 'Un UUID (identificatore univoco universale), chiamato anche GUID, è un identificatore a 128 bit scritto come 32 cifre esadecimali, ad esempio <code>123e4567-e89b-42d3-a456-426614174000</code>. Si può generare ovunque senza coordinamento ed è univoco nella pratica.'],
            ['q' => 'Meglio UUID v4 o v7?', 'a' => 'La v4 è completamente casuale e funziona ovunque. La v7 inizia con un timestamp, quindi i nuovi ID sono ordinati per data di creazione e rendono gli indici del database più veloci e compatti. Usa la v7 per le chiavi primarie se il tuo stack la supporta.'],
            ['q' => 'Questi UUID sono sicuri e univoci?', 'a' => 'Vengono generati con il generatore di numeri casuali crittograficamente sicuro del browser (Web Crypto API). La probabilità di una collisione in v4 è astronomicamente bassa.'],
            ['q' => 'Un GUID è la stessa cosa di un UUID?', 'a' => 'Sì. GUID è il nome che Microsoft usa per lo stesso formato di identificatore a 128 bit. Usa le opzioni maiuscolo e graffe per ottenere il classico stile GUID <code>{XXXXXXXX-...}</code>.'],
        ],
    ],

    'random-number-generator' => [
        'slug' => 'generatore-numeri-casuali',
        'name' => 'Generatore di numeri casuali',
        'short_description' => 'Genera numeri casuali in qualsiasi intervallo, con o senza ripetizioni.',
        'description' => 'Genera uno o migliaia di numeri davvero casuali in qualsiasi intervallo, senza ripetizioni e con opzioni di ordinamento. Include scorciatoie per lanciare dadi ed estrarre numeri del lotto.',
        'seo_title' => 'Generatore di numeri casuali senza ripetizioni',
        'seo_description' => 'Generatore di numeri casuali gratis. Estrai numeri in qualsiasi intervallo, con o senza ripetizioni, ordinati o no. Crittograficamente sicuro e immediato.',
        'content' => <<<'HTML'
<h2>Usi più comuni</h2>
<ul>
<li><strong>Estrazioni e lotterie:</strong> estrai i numeri dei biglietti vincenti senza ripetizioni.</li>
<li><strong>Giochi:</strong> lancia un dado o scegli un numero da 1 a 10.</li>
<li><strong>Numeri del lotto:</strong> genera sei numeri diversi da 1 a 90.</li>
<li><strong>Didattica e ricerca:</strong> seleziona campioni casuali o assegna gruppi.</li>
</ul>
<h2>Davvero casuale ed equo</h2>
<p>Molti generatori semplici usano funzioni pseudocasuali prevedibili. Questo usa il generatore crittograficamente sicuro del tuo browser ed evita la sottile distorsione dei metodi ingenui, così ogni numero dell’intervallo ha la stessa probabilità. Per estrarre nomi invece di numeri usa Sorteggio nomi. Per password casuali sicure usa il Generatore di password.</p>
HTML,
        'steps' => [
            'Imposta il valore <strong>minimo</strong> e <strong>massimo</strong> (entrambi inclusi), oppure scegli una scorciatoia come il lancio di un dado o un’estrazione del lotto.',
            'Scegli quanti numeri ti servono: fino a 10.000 alla volta.',
            'Attiva <strong>Senza ripetizioni</strong> per lotterie ed estrazioni e, se vuoi, ordina i risultati.',
            'Fai clic su <strong>Genera</strong> e copia i numeri.',
        ],
        'faq' => [
            ['q' => 'Questi numeri sono davvero casuali?', 'a' => 'Vengono generati con il generatore di numeri casuali crittograficamente sicuro del tuo browser (Web Crypto API), con un campionamento senza distorsioni perché ogni numero dell’intervallo abbia la stessa probabilità.'],
            ['q' => 'Posso usarlo per una lotteria o un’estrazione?', 'a' => 'Sì. Numera le partecipazioni, imposta l’intervallo da 1 al numero di partecipazioni, attiva Senza ripetizioni e genera quanti vincitori ti servono. Per i nomi usa Sorteggio nomi.'],
            ['q' => 'Minimo e massimo sono inclusi?', 'a' => 'Sì. Un intervallo da 1 a 6 può dare 1, 2, 3, 4, 5 o 6, proprio come un dado.'],
            ['q' => 'Posso generare numeri negativi?', 'a' => 'Sì. Usa un minimo negativo, ad esempio da −50 a 50.'],
        ],
    ],

    'bmi-calculator' => [
        'slug' => 'calcolo-bmi',
        'name' => 'Calcolo BMI',
        'short_description' => 'Calcola il tuo indice di massa corporea e il peso nella norma.',
        'description' => 'Calcola il tuo BMI in unità metriche o statunitensi, scopri la tua categoria e l’intervallo di peso nella norma per la tua altezza, secondo le linee guida per adulti di OMS e CDC.',
        'seo_title' => 'Calcolo BMI per adulti',
        'seo_description' => 'Calcolo del BMI gratis per adulti, in chili o libbre. Scopri il tuo indice di massa corporea, la categoria e il peso nella norma per la tua altezza.',
        'content' => <<<'HTML'
<h2>Cosa significa il tuo BMI</h2>
<p>L’indice di massa corporea mette in rapporto il peso con l’altezza per ottenere un unico numero che gli enti sanitari usano per classificare il peso. Nella maggior parte degli adulti, un BMI tra 18,5 e 24,9 è associato ai rischi per la salute più bassi, mentre valori più alti sono legati a un rischio maggiore di malattie come il diabete di tipo 2 e le malattie cardiovascolari.</p>
<h2>I limiti del BMI</h2>
<ul>
<li>Non distingue i muscoli dal grasso, quindi le persone muscolose possono risultare in sovrappeso.</li>
<li>Non indica dove si accumula il grasso; la circonferenza della vita è un altro dato utile.</li>
<li>Gli intervalli sani possono variare in base a età, sesso e origine etnica.</li>
</ul>
<p>Per trasformare il tuo obiettivo in un piano quotidiano, stima il tuo fabbisogno energetico con Calcolo calorie.</p>
HTML,
        'steps' => [
            'Scegli <strong>Metrico</strong> (chili e centimetri) oppure <strong>Unità USA</strong> (libbre, piedi e pollici).',
            'Inserisci peso e altezza. Il risultato si aggiorna mentre scrivi.',
            'Guarda il tuo BMI, la sua categoria e dove si colloca sulla scala.',
            'Controlla l’intervallo di peso nella norma per la tua altezza.',
        ],
        'faq' => [
            ['q' => 'Come si calcola il BMI?', 'a' => 'L’indice di massa corporea è il peso in chili diviso per il quadrato dell’altezza in metri (kg/m²). In unità USA equivale a 703 × libbre ÷ pollici².'],
            ['q' => 'Quali sono le categorie di BMI per gli adulti?', 'a' => 'Sotto 18,5 è sottopeso, 18,5–24,9 è normopeso, 25–29,9 è sovrappeso e da 30 in su è obesità, secondo l’Organizzazione Mondiale della Sanità e i CDC.'],
            ['q' => 'Il BMI è preciso?', 'a' => 'Il BMI è uno strumento di screening rapido, non una diagnosi. Non distingue muscoli e grasso — gli atleti possono avere valori alti — e non tiene conto di età, sesso, origine etnica e distribuzione del grasso. Parla della tua salute con un professionista.'],
            ['q' => 'I bambini possono usare questo calcolo del BMI?', 'a' => 'No. Per bambini e adolescenti il BMI va confrontato con i percentili per età e sesso. Questo calcolatore è per adulti dai 20 anni in su.'],
            ['q' => 'I miei dati vengono salvati?', 'a' => 'No. Il calcolo avviene nel tuo browser e nulla viene inviato ai nostri server.'],
        ],
    ],

    'calorie-calculator' => [
        'slug' => 'calcolo-calorie',
        'name' => 'Calcolo calorie',
        'short_description' => 'Stima le calorie giornaliere per dimagrire, mantenere o aumentare di peso.',
        'description' => 'Calcola il metabolismo basale e il dispendio energetico totale giornaliero con l’equazione di Mifflin-St Jeor, oltre alle calorie giornaliere per dimagrire, mantenere o aumentare di peso.',
        'seo_title' => 'Calcolo calorie giornaliere e fabbisogno energetico',
        'seo_description' => 'Calcolo delle calorie gratis. Scopri il metabolismo basale e il dispendio giornaliero con Mifflin-St Jeor, e le calorie per dimagrire, mantenere o aumentare.',
        'content' => <<<'HTML'
<h2>Di quante calorie hai bisogno?</h2>
<p>Il fabbisogno calorico giornaliero dipende da corporatura, età, sesso e livello di attività. Il calcolatore stima prima il metabolismo basale — l’energia che il corpo usa a riposo — e poi lo moltiplica per un fattore di attività per stimare il dispendio energetico totale giornaliero (TDEE). Mangiare intorno al tuo TDEE mantiene stabile il peso.</p>
<h2>Come usare i numeri</h2>
<ul>
<li>Scegli il livello di attività con onestà: la maggior parte delle persone lo sovrastima.</li>
<li>Punta a cambiamenti graduali: 0,25–0,5 kg a settimana.</li>
<li>Privilegia proteine, verdure e alimenti poco lavorati per sentirti sazio con meno calorie.</li>
<li>Ripeti il calcolo ogni volta che il tuo peso cambia di 2–5 kg.</li>
</ul>
<p>Scopri da dove parti oggi con Calcolo BMI.</p>
HTML,
        'steps' => [
            'Scegli il sesso e inserisci l’età.',
            'Inserisci peso e altezza in unità metriche o USA.',
            'Scegli il livello di attività che descrive meglio una settimana tipo.',
            'Guarda le calorie che consumi al giorno (TDEE) e gli obiettivi giornalieri per dimagrire, mantenere o aumentare di peso.',
        ],
        'faq' => [
            ['q' => 'Come vengono calcolate le calorie giornaliere?', 'a' => 'Il calcolatore stima il metabolismo basale con l’equazione di Mifflin-St Jeor — considerata tra le più precise per la maggior parte degli adulti — e lo moltiplica per un fattore di attività per ottenere il dispendio energetico totale giornaliero (TDEE).'],
            ['q' => 'Che differenza c’è tra metabolismo basale e TDEE?', 'a' => 'Il metabolismo basale è l’energia che il corpo usa a riposo completo. Il TDEE aggiunge tutto il resto: movimento quotidiano, attività fisica e digestione. Il TDEE è ciò che dovresti mangiare per mantenere il peso.'],
            ['q' => 'Quante calorie devo mangiare per dimagrire?', 'a' => 'Un deficit di circa 500 calorie al giorno porta a perdere circa 0,5 kg a settimana. La maggior parte degli adulti non dovrebbe scendere sotto circa 1200 (donne) o 1500 (uomini) calorie al giorno senza supervisione medica.'],
            ['q' => 'Perché il risultato è diverso da quello del mio smartwatch?', 'a' => 'Tutti i valori di calorie sono stime. Smartwatch e formule si basano su ipotesi diverse. Usa il risultato come punto di partenza e regolalo in base a come cambia il tuo peso in 2–3 settimane.'],
            ['q' => 'È un consiglio medico?', 'a' => 'No. In caso di gravidanza, malattie o obiettivi sportivi, rivolgiti a un medico o a un nutrizionista.'],
        ],
    ],

    'due-date-calculator' => [
        'slug' => 'calcolo-data-parto',
        'name' => 'Calcolo data del parto',
        'short_description' => 'Stima la data del parto, la settimana di gravidanza e il trimestre.',
        'description' => 'Inserisci il primo giorno dell’ultima mestruazione e la durata del ciclo per stimare la data del parto, la data del concepimento, le settimane di gravidanza e le tappe principali.',
        'seo_title' => 'Calcolo data del parto e settimane di gravidanza',
        'seo_description' => 'Calcolo della data del parto gratis. Stima la data presunta del parto, il concepimento, la settimana di gravidanza e il trimestre dall’ultima mestruazione.',
        'content' => <<<'HTML'
<h2>Come si calcola la durata della gravidanza</h2>
<p>Una gravidanza tipica dura circa 40 settimane (280 giorni) contate dal primo giorno dell’ultima mestruazione, non dal concepimento. Se il tuo ciclo è più lungo o più corto di 28 giorni, l’ovulazione avviene di solito più tardi o prima, quindi il calcolatore sposta la data del parto di conseguenza.</p>
<h2>Tappe principali</h2>
<ul>
<li><strong>Settimane 1–12:</strong> primo trimestre; di solito avvengono la prima visita prenatale e la prima ecografia.</li>
<li><strong>Settimane 18–22:</strong> l’ecografia morfologica dettagliata.</li>
<li><strong>Settimane 27–40:</strong> terzo trimestre, con controlli più frequenti.</li>
<li><strong>Settimane 39–40:</strong> la gravidanza è considerata a termine.</li>
</ul>
<p>Vuoi seguire il conto alla rovescia? Calcolo date mostra il numero esatto di giorni tra oggi e la data del parto.</p>
HTML,
        'steps' => [
            'Inserisci il <strong>primo giorno dell’ultima mestruazione</strong>.',
            'Regola la <strong>durata media del ciclo</strong> se non è di 28 giorni.',
            'Guarda la data presunta del parto, le settimane di gravidanza e il trimestre in corso.',
            'Controlla le tappe principali della gravidanza.',
        ],
        'faq' => [
            ['q' => 'Come si calcola la data del parto?', 'a' => 'Il calcolatore usa la regola di Naegele: 280 giorni (40 settimane) dopo il primo giorno dell’ultima mestruazione, adattati ai cicli più lunghi o più corti di 28 giorni.'],
            ['q' => 'Quanto è precisa la data del parto?', 'a' => 'È una stima. Solo circa il 4% dei bambini nasce esattamente alla data prevista; la maggior parte arriva tra la 37ª e la 42ª settimana. Un’ecografia precoce dà la data più precisa, e il tuo medico o la tua ostetrica possono correggerla.'],
            ['q' => 'Perché le settimane si contano dall’ultima mestruazione?', 'a' => 'La gravidanza si conta dal primo giorno dell’ultima mestruazione perché raramente si conoscono con esattezza le date di ovulazione e concepimento. Per questo, al momento del concepimento si è già considerate incinte di circa 2 settimane.'],
            ['q' => 'Quali sono i trimestri?', 'a' => 'Il primo trimestre arriva fino alla fine della 12ª settimana, il secondo va dalla 13ª alla 26ª settimana e il terzo dalla 27ª settimana fino al parto.'],
            ['q' => 'È un consiglio medico?', 'a' => 'No. Questo strumento è solo informativo. Segui sempre le indicazioni del tuo medico o della tua ostetrica.'],
        ],
    ],

    'online-timer' => [
        'slug' => 'timer-online',
        'name' => 'Timer e cronometro online',
        'short_description' => 'Timer con conto alla rovescia, cronometro con giri e timer Pomodoro.',
        'description' => 'Un timer online gratis con sveglia, un cronometro con tempi sul giro e un timer Pomodoro per restare concentrato. Preciso anche nelle schede in background, con il tempo visibile nel titolo della scheda.',
        'seo_title' => 'Timer e cronometro online con sveglia',
        'seo_description' => 'Timer online gratis con sveglia, cronometro con giri e timer Pomodoro. Preciso anche nelle schede in background. Senza app e senza registrazione.',
        'content' => <<<'HTML'
<h2>Tre strumenti in uno</h2>
<p>Usa il <strong>timer</strong> per cucinare, allenarti, presentazioni, esami e pisolini; il <strong>cronometro</strong> con giri per corsa, nuoto o per misurare attività; e il <strong>timer Pomodoro</strong> per studiare o lavorare in blocchi di 25 minuti di concentrazione con pause regolari. Il tempo compare nella scheda del browser, così puoi continuare a lavorare in un’altra scheda e vedere quanto manca.</p>
<h2>Consigli per lavorare concentrato</h2>
<ul>
<li>Scegli una sola attività per Pomodoro e silenzia le notifiche.</li>
<li>Usa le pause per alzarti, fare stretching e riposare gli occhi.</li>
<li>Annota quanti cicli richiede ogni attività per pianificare meglio la volta successiva.</li>
</ul>
<p>Devi contare giorni invece che minuti? Usa Calcolo date.</p>
HTML,
        'steps' => [
            'Scegli <strong>Timer</strong> per un conto alla rovescia, <strong>Cronometro</strong> per misurare il tempo con i giri oppure <strong>Pomodoro</strong> per sessioni di concentrazione.',
            'Per il timer scegli una scorciatoia (da 1 a 60 minuti) oppure inserisci ore, minuti e secondi.',
            'Premi <strong>Avvia</strong>. Il tempo rimanente compare anche nel titolo della scheda, così puoi cambiare scheda.',
            'Allo scadere del tempo suona una sveglia. Disattiva l’audio se preferisci un timer silenzioso.',
        ],
        'faq' => [
            ['q' => 'Il timer continua se cambio scheda?', 'a' => 'Sì. Il timer si basa sull’orologio e non sul conteggio degli impulsi, quindi resta preciso nelle schede in background, e il tempo rimanente compare nel titolo della scheda.'],
            ['q' => 'Perché non ho sentito la sveglia?', 'a' => 'Controlla che l’audio sia attivo e che il dispositivo non sia in modalità silenziosa. Alcuni browser bloccano l’audio finché non interagisci con la pagina; premere Avvia conta come interazione.'],
            ['q' => 'Che cos’è la tecnica del Pomodoro?', 'a' => 'È un metodo di gestione del tempo: lavori concentrato per 25 minuti e poi fai una pausa di 5 minuti. Dopo quattro cicli fai una pausa più lunga, da 15 a 30 minuti. Il timer cambia fase automaticamente.'],
            ['q' => 'Quanto è preciso il cronometro?', 'a' => 'Mostra i centesimi di secondo e usa l’orologio del dispositivo, preciso a pochi millisecondi. Usa Giro per registrare i tempi intermedi.'],
            ['q' => 'Funziona offline?', 'a' => 'Una volta caricata la pagina, timer, cronometro e Pomodoro funzionano nel browser anche senza connessione a internet.'],
        ],
    ],

    'random-name-picker' => [
        'slug' => 'sorteggio-nomi',
        'name' => 'Sorteggio nomi',
        'short_description' => 'Estrai vincitori a caso da un elenco o dividi le persone in squadre.',
        'description' => 'Incolla un elenco di nomi per estrarre in modo equo uno o più vincitori, rimuovendoli per il turno successivo se vuoi, oppure dividi tutti in squadre casuali.',
        'seo_title' => 'Sorteggio nomi online: vincitori e squadre',
        'seo_description' => 'Sorteggio di nomi gratis. Estrai vincitori da un elenco per lotterie e lezioni, oppure dividi i nomi in squadre casuali. Senza registrazione.',
        'content' => <<<'HTML'
<h2>Ideale per classi, squadre e concorsi</h2>
<p>Gli insegnanti usano il sorteggio dei nomi per interrogare gli studenti in modo equo, i team di lavoro per decidere chi presenta per primo e i creator per scegliere i vincitori di un giveaway davanti al pubblico. Poiché l’estrazione è casuale e trasparente, nessuno può dire che sia stata truccata.</p>
<h2>Consigli</h2>
<ul>
<li>Attiva <strong>Rimuovi i nomi estratti</strong> perché tutti abbiano il proprio turno prima che qualcuno esca due volte.</li>
<li>Usa <strong>Forma squadre</strong> per lavori di gruppo, sport e giochi.</li>
<li>Pulisci prima l’elenco con Rimuovi righe duplicate se hai copiato i nomi da più fonti.</li>
</ul>
<p>Devi estrarre biglietti numerati? Usa il Generatore di numeri casuali.</p>
HTML,
        'steps' => [
            'Incolla o scrivi i nomi, uno per riga. Puoi incollare una colonna direttamente da un foglio di calcolo.',
            'Scegli <strong>Estrai vincitori</strong> per estrarre uno o più nomi, oppure <strong>Forma squadre</strong> per dividere tutti in gruppi casuali.',
            'Se vuoi, rimuovi dall’elenco i nomi estratti perché la prossima estrazione includa solo gli altri.',
            'Fai clic sul pulsante e copia il risultato per condividerlo.',
        ],
        'faq' => [
            ['q' => 'Il sorteggio dei nomi è equo?', 'a' => 'Sì. I vincitori vengono scelti con un generatore casuale crittograficamente sicuro, quindi ogni nome ha esattamente la stessa probabilità. L’animazione serve solo a divertirsi: non influisce sul risultato.'],
            ['q' => 'Posso estrarre più vincitori alla volta?', 'a' => 'Sì. Indica quanti vincitori ti servono; lo stesso nome non esce mai due volte in un’estrazione.'],
            ['q' => 'Come vengono formate le squadre?', 'a' => 'Tutti vengono mescolati a caso e distribuiti nel numero di squadre che scegli, quindi le squadre differiscono al massimo di una persona.'],
            ['q' => 'Cosa succede se un nome compare due volte?', 'a' => 'Ogni riga conta come una partecipazione, quindi un nome che compare due volte ha il doppio delle probabilità. Se non lo vuoi, usa prima Rimuovi righe duplicate.'],
            ['q' => 'I nomi vengono salvati?', 'a' => 'No. L’elenco resta nel tuo browser e non viene mai caricato.'],
        ],
    ],
];
