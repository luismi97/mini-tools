<?php

/*
| Italian copy for the developer tools. See content/it/tools.php.
*/

return [
    'json-formatter' => [
        'slug' => 'formattatore-json',
        'name' => 'Formattatore JSON',
        'short_description' => 'Formatta, convalida e minifica JSON direttamente nel browser.',
        'description' => 'Incolla il tuo JSON per renderlo leggibile con un rientro pulito, minificarlo per la produzione o convalidarlo e trovare la riga esatta di ogni errore di sintassi. I tuoi dati non lasciano mai il browser.',
        'seo_title' => 'Formattatore e validatore JSON online',
        'seo_description' => 'Formattatore e validatore JSON gratis online. Abbellisci, minifica e convalida JSON all’istante nel browser, senza caricare dati e senza registrazione.',
        'content' => <<<'HTML'
<h2>Perché formattare il JSON?</h2>
<p>API e file di log restituiscono spesso JSON su un’unica riga lunghissima, quasi impossibile da leggere. Formattarlo aggiunge rientri e a capo coerenti, così vedi la struttura, noti i campi mancanti e fai debug più in fretta. Minificarlo fa il contrario: elimina tutti gli spazi superflui perché risposte e file di configurazione siano il più leggeri possibile.</p>
<h2>Errori JSON comuni che questo validatore individua</h2>
<ul>
<li>Virgole finali dopo l’ultimo elemento di un oggetto o di un array.</li>
<li>Virgolette singole al posto delle doppie in stringhe e chiavi.</li>
<li>Nomi di proprietà senza virgolette e commenti, non ammessi in JSON.</li>
<li>Virgole, parentesi quadre o graffe mancanti.</li>
</ul>
<p>Ogni errore viene segnalato con riga e colonna esatte. Ti servono i dati in un foglio di calcolo? Usa JSON in CSV, oppure fai il percorso inverso con CSV in JSON.</p>
HTML,
        'steps' => [
            'Incolla o scrivi il tuo JSON nel campo <strong>Input</strong>, oppure fai clic su <strong>Carica esempio</strong> per provare.',
            'Fai clic su <strong>Formatta</strong> per abbellirlo o su <strong>Minifica</strong> per togliere tutti gli spazi. Scegli 2 spazi, 4 spazi o tabulazioni e, se vuoi, ordina le chiavi alfabeticamente.',
            'Se il JSON non è valido, il messaggio di errore indica riga e colonna esatte e il cursore salta al problema.',
            'Copia il risultato o scaricalo come file. Puoi anche convertire il JSON in <strong>CSV</strong> o in interfacce <strong>TypeScript</strong>.',
        ],
        'faq' => [
            ['q' => 'Il mio JSON viene inviato a un server?', 'a' => 'No. Formattazione, convalida e conversione avvengono interamente nel tuo browser con JavaScript. I tuoi dati non lasciano mai il dispositivo, quindi puoi usarlo tranquillamente con informazioni private o sensibili.'],
            ['q' => 'Che differenza c’è tra formattare e minificare il JSON?', 'a' => 'Formattare (o abbellire) aggiunge rientri e a capo per rendere il JSON leggibile. Minificare elimina tutti gli spazi superflui perché occupi il meno possibile in produzione o durante la trasmissione in rete.'],
            ['q' => 'Perché il mio JSON non è valido?', 'a' => 'Le cause più comuni sono virgole finali, virgolette singole invece di doppie, nomi di proprietà senza virgolette, commenti e virgole mancanti tra gli elementi. Il JSON è più rigido della sintassi degli oggetti JavaScript. Il validatore mostra riga e colonna del primo errore trovato.'],
            ['q' => 'Come funziona la conversione da JSON a CSV?', 'a' => 'Un array di oggetti diventa una riga per oggetto, con una colonna per ogni chiave. Gli oggetti annidati vengono appiattiti con la notazione a punti (ad esempio <code>owner.name</code>) e gli array annidati vengono salvati come testo JSON nella cella.'],
            ['q' => 'C’è un limite di dimensioni?', 'a' => 'Non c’è un limite fisso, ma poiché tutto gira nel browser, file molto grandi (decine di megabyte) possono essere lenti a seconda del dispositivo.'],
        ],
    ],

    'base64-encoder' => [
        'slug' => 'codifica-decodifica-base64',
        'name' => 'Codificatore e decodificatore Base64',
        'short_description' => 'Codifica e decodifica testi e file in Base64, anche sicuro per URL.',
        'description' => 'Converti testo in Base64 e viceversa con pieno supporto UTF-8, passa al Base64 sicuro per URL o trasforma qualsiasi file in una stringa Base64 o in un data URI.',
        'seo_title' => 'Codifica e decodifica Base64: testi e file',
        'seo_description' => 'Codificatore e decodificatore Base64 gratis online. Supporta UTF-8 ed emoji, Base64 sicuro per URL e file in data URI. Funziona nel tuo browser.',
        'content' => <<<'HTML'
<h2>A cosa serve il Base64?</h2>
<ul>
<li>Incorporare piccole immagini in HTML o CSS come data URI.</li>
<li>Inviare allegati binari via email (MIME).</li>
<li>Memorizzare dati binari in JSON, XML o variabili d’ambiente.</li>
<li>Intestazioni di autenticazione HTTP Basic e JSON Web Token.</li>
</ul>
<h2>Il Base64 non è crittografia</h2>
<p>Il Base64 cambia solo il modo in cui i dati sono rappresentati: chiunque può decodificarlo all’istante. Non usarlo mai per nascondere password o segreti. Per creare segreti robusti usa il Generatore di password; per analizzare token in Base64URL usa il Decodificatore JWT.</p>
HTML,
        'steps' => [
            'Scegli <strong>Codifica</strong> per trasformare il testo in Base64, oppure <strong>Decodifica</strong> per tornare dal Base64 a un testo leggibile.',
            'Incolla il testo o la stringa Base64. Il risultato compare all’istante mentre scrivi.',
            'Attiva <strong>Sicuro per URL</strong> per usare <code>-</code> e <code>_</code> al posto di <code>+</code> e <code>/</code> (come nei JWT e negli URL).',
            'Per codificare un’immagine o qualsiasi file, usa <strong>Codifica un file</strong> più in basso e copia la stringa Base64 o il data URI completo.',
        ],
        'faq' => [
            ['q' => 'Che cos’è il Base64?', 'a' => 'Il Base64 è una codifica che rappresenta dati binari con 64 caratteri ASCII stampabili. Si usa per incorporare immagini in HTML e CSS, inviare allegati via email e trasportare dati in JSON o negli URL. È una codifica, non una cifratura: chiunque può decodificarla.'],
            ['q' => 'Supporta emoji e lettere accentate?', 'a' => 'Sì. Il testo viene convertito in UTF-8 prima della codifica, quindi emoji, accenti e alfabeti non latini vengono codificati e decodificati correttamente.'],
            ['q' => 'Che cos’è il Base64 sicuro per URL?', 'a' => 'Il Base64 sicuro per URL (Base64URL) sostituisce <code>+</code> con <code>-</code> e <code>/</code> con <code>_</code> ed elimina il riempimento <code>=</code>, così il risultato può essere usato negli URL e nei nomi dei file. Il decodificatore accetta automaticamente entrambe le varianti.'],
            ['q' => 'Perché il Base64 rende i dati più grandi?', 'a' => 'Ogni 3 byte di input diventano 4 caratteri Base64, quindi i dati codificati occupano circa il 33% in più dell’originale.'],
            ['q' => 'I miei dati vengono caricati online?', 'a' => 'No. Codifica e decodifica avvengono nel tuo browser. Testi e file non lasciano mai il tuo dispositivo.'],
        ],
    ],

    'url-encoder' => [
        'slug' => 'codifica-decodifica-url',
        'name' => 'Codificatore e decodificatore URL',
        'short_description' => 'Codifica o decodifica URL e parametri con la codifica percentuale.',
        'description' => 'Codifica il testo per usarlo in sicurezza negli URL o decodifica stringhe con codifica percentuale in testo leggibile, e analizza ogni parte e ogni parametro di un URL.',
        'seo_title' => 'Codifica e decodifica URL online',
        'seo_description' => 'Codificatore e decodificatore URL gratis. Codifica valori di query o URL completi, decodifica le sequenze %20 e scomponi i parametri all’istante.',
        'content' => <<<'HTML'
<h2>Perché gli URL vanno codificati</h2>
<p>Gli URL possono contenere solo un insieme limitato di caratteri. Spazi, accenti, emoji e simboli come <code>&amp;</code>, <code>?</code> e <code>#</code> devono essere codificati con la percentuale perché browser e server li interpretino correttamente. Dimenticare di codificare un valore di query è una causa frequente di link rotti e parametri persi.</p>
<h2>Codifiche comuni</h2>
<ul>
<li>Spazio → <code>%20</code> (o <code>+</code> nei dati dei moduli)</li>
<li><code>&amp;</code> → <code>%26</code></li>
<li><code>/</code> → <code>%2F</code></li>
<li><code>è</code> → <code>%C3%A8</code></li>
</ul>
<h2>La codifica per sviluppatori</h2>
<p>In JavaScript usa <code>encodeURIComponent()</code> per i singoli valori di query e <code>encodeURI()</code> per gli URL completi. In PHP gli equivalenti sono <code>rawurlencode()</code> e <code>urlencode()</code>, che codifica gli spazi come segni più. Codificare due volte un valore è un errore frequente che produce sequenze come <code>%2520</code>.</p>
<p>Lavori con token o dati binari? Il Codificatore e decodificatore Base64 e il Decodificatore JWT possono aiutarti.</p>
HTML,
        'steps' => [
            'Scegli <strong>Codifica</strong> per applicare la codifica percentuale, oppure <strong>Decodifica</strong> per trasformare sequenze come <code>%20</code> in testo leggibile.',
            'Incolla il testo o l’URL. Il risultato si aggiorna mentre scrivi.',
            'Usa <strong>Componente</strong> per valori di query e segmenti di percorso, oppure <strong>URL completo</strong> per mantenere caratteri come <code>/</code>, <code>?</code> e <code>&amp;</code>.',
            'Se l’input è un URL completo, le sue parti e i suoi parametri vengono mostrati in una tabella qui sotto.',
        ],
        'faq' => [
            ['q' => 'Che cos’è la codifica degli URL?', 'a' => 'La codifica degli URL (codifica percentuale) sostituisce i caratteri non ammessi in un URL con un <code>%</code> seguito da due cifre esadecimali. Ad esempio, uno spazio diventa <code>%20</code> e <code>è</code> diventa <code>%C3%A8</code>.'],
            ['q' => 'Che differenza c’è tra Componente e URL completo?', 'a' => 'La modalità Componente (<code>encodeURIComponent</code>) codifica tutti i caratteri riservati, ed è ciò che serve per un singolo valore di query. La modalità URL completo (<code>encodeURI</code>) lascia intatti i caratteri che strutturano un URL, come <code>:</code>, <code>/</code>, <code>?</code>, <code>&amp;</code> e <code>=</code>.'],
            ['q' => 'Perché alcuni URL usano + per gli spazi?', 'a' => 'I moduli HTML codificano gli spazi come <code>+</code> nelle stringhe di query. Lascia attivo <strong>Tratta + come spazio</strong> quando decodifichi dati di moduli o stringhe di query.'],
            ['q' => 'I miei dati vengono inviati da qualche parte?', 'a' => 'No. Tutto viene elaborato nel tuo browser.'],
        ],
    ],

    'jwt-decoder' => [
        'slug' => 'decodificatore-jwt',
        'name' => 'Decodificatore JWT',
        'short_description' => 'Decodifica i JSON Web Token e controlla claim e scadenza.',
        'description' => 'Incolla un JWT per decodificarne header e payload, vedere exp, iat e nbf come date leggibili e verificare se il token è scaduto. La decodifica avviene sul tuo dispositivo.',
        'seo_title' => 'Decodificatore JWT: decodifica JSON Web Token',
        'seo_description' => 'Decodifica token JWT gratis. Visualizza header, payload, date di scadenza e stato del token. Privato: il token non lascia il tuo browser.',
        'content' => <<<'HTML'
<h2>Come funzionano i JWT</h2>
<p>Un JSON Web Token trasporta dati (claim) su un utente o una sessione, come un ID, i ruoli e una data di scadenza. Header e payload sono JSON codificato in Base64URL, e la firma permette al server di verificare che nessuno li abbia modificati. Poiché il payload è solo codificato, chiunque abbia il token può leggerlo: non mettere mai segreti dentro un JWT.</p>
<h2>Controlli tipici durante il debug</h2>
<ul>
<li>Il token è scaduto (<code>exp</code> nel passato)?</li>
<li>Una differenza di orologio crea problemi con <code>nbf</code>?</li>
<li><code>aud</code> o <code>iss</code> corrispondono a ciò che la tua API si aspetta?</li>
<li>L’algoritmo (<code>alg</code>) è quello configurato sul tuo server?</li>
</ul>
<p>Per decodificare altre stringhe Base64, usa il Codificatore e decodificatore Base64.</p>
HTML,
        'steps' => [
            'Incolla un JSON Web Token (JWT) nel campo. Il prefisso <code>Bearer</code> viene rimosso automaticamente.',
            'Header e payload vengono decodificati all’istante e mostrati come JSON formattato.',
            'Controlla i claim <strong>exp</strong>, <strong>iat</strong> e <strong>nbf</strong> convertiti in date leggibili e verifica se il token è scaduto.',
            'Copia l’header o il payload decodificato con un clic.',
        ],
        'faq' => [
            ['q' => 'È sicuro incollare qui il mio JWT?', 'a' => 'Sì. Il token viene decodificato interamente nel browser e non viene mai inviato a un server. Tratta comunque i token di produzione come password ed evita di condividerli.'],
            ['q' => 'Questo strumento verifica la firma?', 'a' => 'No. Decodifica solo header e payload, che sono JSON codificato in Base64URL. La verifica della firma richiede il segreto o la chiave pubblica e va fatta sul tuo server.'],
            ['q' => 'Cosa sono exp, iat e nbf?', 'a' => '<code>exp</code> è la data di scadenza, <code>iat</code> il momento di emissione del token e <code>nbf</code> il momento prima del quale non deve essere accettato. Sono tutti timestamp Unix in secondi.'],
            ['q' => 'Quali sono le tre parti di un JWT?', 'a' => 'Un JWT ha un header (algoritmo e tipo di token), un payload (i claim) e una firma, separati da punti: <code>header.payload.signature</code>.'],
        ],
    ],

    'hash-generator' => [
        'slug' => 'generatore-di-hash',
        'name' => 'Generatore di hash',
        'short_description' => 'Genera hash MD5, SHA-1, SHA-256 e SHA-512 di testi o file.',
        'description' => 'Calcola in una volta gli hash MD5, SHA-1, SHA-256, SHA-384 e SHA-512 di qualsiasi testo o file, e verifica i download confrontando i checksum. Funziona nel tuo browser.',
        'seo_title' => 'Generatore di hash MD5, SHA-256 e SHA-512',
        'seo_description' => 'Genera hash MD5, SHA-1, SHA-256 e SHA-512 di testi o file e verifica i checksum. I file vengono elaborati nel browser, mai caricati.',
        'content' => <<<'HTML'
<h2>Usi comuni degli hash</h2>
<ul>
<li><strong>Verificare i download:</strong> confronta il checksum SHA-256 pubblicato dallo sviluppatore di un software con il file scaricato.</li>
<li><strong>Rilevare modifiche:</strong> lo stesso file ha sempre lo stesso hash, quindi hash diversi indicano contenuti diversi.</li>
<li><strong>Sviluppo:</strong> genera chiavi di cache, ETag e identificatori di contenuto.</li>
<li><strong>Deduplicazione:</strong> trova file identici confrontando i loro hash.</li>
</ul>
<h2>Quale algoritmo usare?</h2>
<p>Usa SHA-256 per quasi tutto: è veloce, ampiamente supportato e sicuro. SHA-512 produce un’impronta ancora più lunga. MD5 e SHA-1 vanno bene per controlli rapidi di integrità, ma non per scopi di sicurezza. Per codificare dati invece di calcolarne l’impronta, usa il Codificatore e decodificatore Base64.</p>
HTML,
        'steps' => [
            'Scrivi o incolla un testo, oppure scegli <strong>Calcola l’hash di un file</strong> per ottenere il checksum di qualsiasi file.',
            'Gli hash MD5, SHA-1, SHA-256, SHA-384 e SHA-512 vengono calcolati contemporaneamente.',
            'Copia l’hash che ti serve, in minuscolo o in maiuscolo.',
            'Per verificare un download, incolla il checksum atteso in <strong>Confronta</strong>: se corrisponde, viene evidenziato in verde.',
        ],
        'faq' => [
            ['q' => 'Che cos’è un hash?', 'a' => 'Una funzione di hash trasforma qualsiasi input in un’impronta di lunghezza fissa. Lo stesso input produce sempre lo stesso hash, e cambiare un solo carattere lo modifica completamente. Gli hash servono a verificare download, rilevare modifiche e indicizzare dati.'],
            ['q' => 'Come verifico il checksum di un file?', 'a' => 'Calcola l’hash del file scaricato e incolla in Confronta il checksum pubblicato dallo sviluppatore (di solito SHA-256). Se coincidono, il file è completo e non è stato alterato.'],
            ['q' => 'MD5 o SHA-1 sono sicuri?', 'a' => 'Non per la sicurezza. Per entrambi sono noti attacchi di collisione, quindi usa SHA-256 o SHA-512 per tutto ciò che riguarda la sicurezza. MD5 va ancora bene per controlli rapidi senza finalità di sicurezza.'],
            ['q' => 'Devo salvare le password con SHA-256?', 'a' => 'No. Le password vanno salvate con algoritmi lenti e con salt come bcrypt, scrypt o Argon2. Gli hash veloci come SHA-256 sono facili da attaccare con la forza bruta.'],
            ['q' => 'I miei testi e file vengono caricati online?', 'a' => 'No. Gli hash vengono calcolati nel tuo browser con la Web Crypto API. File di qualsiasi tipo, fino a 200 MB, restano sul tuo dispositivo.'],
        ],
    ],

    'timestamp-converter' => [
        'slug' => 'convertitore-timestamp-unix',
        'name' => 'Convertitore di timestamp Unix',
        'short_description' => 'Converti timestamp Unix in date e date in timestamp.',
        'description' => 'Converti timestamp epoch in secondi o millisecondi in ora locale, UTC e ISO 8601, e trasforma qualsiasi data in un timestamp Unix. Mostra il timestamp attuale in tempo reale.',
        'seo_title' => 'Convertitore di timestamp Unix in data e viceversa',
        'seo_description' => 'Converti timestamp Unix in date leggibili e viceversa. Secondi o millisecondi, ora locale, UTC e ISO 8601, con il tempo epoch attuale.',
        'content' => <<<'HTML'
<h2>Perché gli sviluppatori usano il tempo Unix</h2>
<p>Un timestamp Unix rappresenta un istante con un solo numero, identico in tutto il mondo: ideale per database, API, log, scadenza dei JWT e intestazioni di cache. Convertirlo in una data leggibile è un’operazione quotidiana durante il debug.</p>
<h2>Errori comuni</h2>
<ul>
<li>Confondere secondi e millisecondi: un numero di 13 cifre è in millisecondi.</li>
<li>Dimenticare i fusi orari: i timestamp sono sempre in UTC, solo la visualizzazione è locale.</li>
<li>Salvare le date come interi a 32 bit, che vanno in overflow a gennaio 2038.</li>
</ul>
<p>Stai decodificando un token con i claim <code>exp</code> e <code>iat</code>? Il Decodificatore JWT li converte automaticamente. Per contare i giorni di calendario tra due date usa Calcolo date.</p>
HTML,
        'steps' => [
            'Il timestamp Unix attuale è mostrato in alto e si aggiorna ogni secondo.',
            'Incolla un timestamp in <strong>Da timestamp a data</strong>. Secondi e millisecondi vengono rilevati automaticamente.',
            'Visualizzalo come ora locale, UTC, ISO 8601 e tempo relativo (ad esempio “3 giorni fa”).',
            'Usa <strong>Da data a timestamp</strong> per convertire data e ora, nel tuo fuso orario o in UTC.',
        ],
        'faq' => [
            ['q' => 'Che cos’è un timestamp Unix?', 'a' => 'Un timestamp Unix (tempo epoch) è il numero di secondi trascorsi dal 1° gennaio 1970 alle 00:00:00 UTC. Lo usano database, API, log e linguaggi di programmazione perché è uguale in tutti i fusi orari.'],
            ['q' => 'Secondi o millisecondi?', 'a' => 'La maggior parte dei sistemi (Unix, PHP, Python, database) usa i secondi: oggi 10 cifre. JavaScript e Java usano i millisecondi: 13 cifre. Il convertitore riconosce cosa hai incollato.'],
            ['q' => 'Cos’è il problema dell’anno 2038?', 'a' => 'I sistemi che salvano i timestamp come interi con segno a 32 bit vanno in overflow il 19 gennaio 2038 (timestamp 2147483647). I sistemi moderni usano valori a 64 bit, sufficienti per miliardi di anni.'],
            ['q' => 'Come ottengo il timestamp attuale nel codice?', 'a' => 'JavaScript: <code>Math.floor(Date.now() / 1000)</code>. PHP: <code>time()</code>. Python: <code>int(time.time())</code>. SQL (MySQL): <code>UNIX_TIMESTAMP()</code>.'],
        ],
    ],

    'color-converter' => [
        'slug' => 'convertitore-di-colori',
        'name' => 'Convertitore di colori e verifica contrasto',
        'short_description' => 'Converti colori HEX, RGB e HSL e verifica il contrasto WCAG.',
        'description' => 'Converti colori tra HEX, RGB e HSL con un selettore colore e verifica il rapporto di contrasto tra testo e sfondo secondo i livelli WCAG AA e AAA.',
        'seo_title' => 'Convertitore di colori HEX, RGB, HSL e contrasto',
        'seo_description' => 'Converti HEX in RGB e HSL e verifica il contrasto dei colori WCAG per l’accessibilità. Convertitore gratuito con selettore e risultati AA/AAA.',
        'content' => <<<'HTML'
<h2>Lavorare con i formati di colore</h2>
<p>Gli strumenti di design forniscono spesso i colori in HEX, mentre framework CSS, codice canvas e librerie di immagini possono richiedere RGB o HSL. L’HSL è particolarmente comodo per creare palette: mantieni la tonalità e cambi la luminosità per ottenere stati hover, bordi e sfondi coordinati.</p>
<h2>Contrasto di colore accessibile</h2>
<p>Circa un uomo su dodici ha una forma di daltonismo, e molte persone leggono sullo smartphone all’aperto. Le Linee guida per l’accessibilità dei contenuti web (WCAG) richiedono un rapporto di contrasto minimo di 4.5:1 per il testo normale e di 3:1 per il testo grande. Controlla ogni combinazione di testo e sfondo del tuo design, compresi i pulsanti e i testi segnaposto dei campi.</p>
<p>Stai creando un codice QR con i colori del tuo brand? Prova prima il contrasto qui e poi usa il Generatore di codici QR.</p>
HTML,
        'steps' => [
            'Inserisci un colore in qualsiasi formato — <code>#0f766e</code>, <code>rgb(15, 118, 110)</code> o <code>hsl(175, 77%, 26%)</code> — oppure sceglilo con il selettore.',
            'Copia il colore in HEX, RGB o HSL per CSS, strumenti di design o codice.',
            'Nella <strong>Verifica contrasto</strong>, inserisci un colore del testo e un colore di sfondo.',
            'Controlla i risultati WCAG: punta almeno ad AA (4.5:1) per il testo normale.',
        ],
        'faq' => [
            ['q' => 'Che differenza c’è tra HEX, RGB e HSL?', 'a' => 'Descrivono gli stessi colori in modi diversi. HEX e RGB indicano i canali rosso, verde e blu; HSL usa tonalità, saturazione e luminosità, il che rende facile creare varianti più chiare o più scure di un colore.'],
            ['q' => 'Che rapporto di contrasto mi serve?', 'a' => 'Il livello AA delle WCAG 2 richiede 4.5:1 per il testo normale e 3:1 per il testo grande (circa 24 px, o 19 px in grassetto). Il livello AAA richiede 7:1 e 4.5:1. Più contrasto rende il testo leggibile per più persone, comprese quelle ipovedenti.'],
            ['q' => 'Perché il contrasto accessibile conta per la SEO?', 'a' => 'Un testo leggibile trattiene i visitatori sulla pagina, e gli audit di accessibilità come Lighthouse segnalano i testi con poco contrasto. I siti accessibili raggiungono anche un pubblico più ampio.'],
            ['q' => 'Viene caricato qualcosa online?', 'a' => 'No. Tutte le conversioni e i calcoli del contrasto avvengono nel tuo browser.'],
        ],
    ],

    'regex-tester' => [
        'slug' => 'tester-regex',
        'name' => 'Tester di regex',
        'short_description' => 'Prova le espressioni regolari con evidenziazione in tempo reale e gruppi.',
        'description' => 'Prova espressioni regolari JavaScript con evidenziazione delle corrispondenze in tempo reale, gruppi di cattura, gruppi con nome e anteprima delle sostituzioni. I pattern girano in un worker sicuro in background.',
        'seo_title' => 'Tester di regex: prova le espressioni regolari',
        'seo_description' => 'Tester di regex gratis: evidenziazione in tempo reale, gruppi di cattura, flag e anteprima delle sostituzioni. Espressioni regolari JavaScript, private.',
        'content' => <<<'HTML'
<h2>Promemoria delle regex</h2>
<ul>
<li><code>\d</code> cifra · <code>\w</code> carattere di parola · <code>\s</code> spazio · <code>.</code> qualsiasi carattere</li>
<li><code>*</code> 0 o più · <code>+</code> 1 o più · <code>?</code> facoltativo · <code>{2,4}</code> da 2 a 4</li>
<li><code>^</code> inizio · <code>$</code> fine · <code>\b</code> confine di parola</li>
<li><code>[abc]</code> uno tra · <code>[^abc]</code> nessuno tra · <code>a|b</code> l’uno o l’altro</li>
<li><code>(…)</code> gruppo di cattura · <code>(?:…)</code> senza cattura · <code>(?=…)</code> lookahead</li>
</ul>
<h2>Consigli per i test</h2>
<p>Incolla esempi reali, compresi i casi che non dovrebbero corrispondere, e osserva l’evidenziazione mentre modifichi. Mantieni i pattern il più specifici possibile ed evita quantificatori annidati perché la ricerca resti veloce. Per trasformare il testo in blocco dopo aver trovato il pattern giusto, possono aiutarti il Convertitore maiuscole e minuscole e Ordina righe.</p>
HTML,
        'steps' => [
            'Scrivi l’espressione regolare nel campo <strong>Pattern</strong> (senza le barre che la racchiudono).',
            'Attiva i flag necessari: <code>g</code> globale, <code>i</code> ignora maiuscole, <code>m</code> multiriga, <code>s</code> il punto include gli a capo, <code>u</code> Unicode.',
            'Incolla il testo di prova. Le corrispondenze vengono evidenziate all’istante ed elencate con i loro gruppi di cattura.',
            'Attiva <strong>Sostituisci</strong> per vedere l’anteprima di una sostituzione con <code>$1</code>, <code>$2</code> o <code>$&lt;nome&gt;</code>.',
        ],
        'faq' => [
            ['q' => 'Quale variante di regex usa questo tester?', 'a' => 'Usa il motore di espressioni regolari JavaScript (ECMAScript) del tuo browser, lo stesso di Node.js e TypeScript. La sintassi è in gran parte uguale a PCRE, Python e Java, ma alcune funzioni, come il supporto al lookbehind o i quantificatori possessivi, variano.'],
            ['q' => 'Cosa sono i gruppi di cattura?', 'a' => 'Le parentesi catturano la parte della corrispondenza che racchiudono, così puoi riutilizzarla. I gruppi con nome come <code>(?&lt;anno&gt;\d{4})</code> rendono i pattern più leggibili. Usa <code>(?:...)</code> per raggruppare senza catturare.'],
            ['q' => 'Perché il mio pattern è andato in timeout?', 'a' => 'Quantificatori annidati come <code>(a+)+</code> possono causare un backtracking catastrofico, in cui il motore prova un numero esponenziale di combinazioni. Il tester si ferma dopo 1,5 secondi perché il browser resti reattivo.'],
            ['q' => 'Il mio testo viene inviato da qualche parte?', 'a' => 'No. La ricerca gira nel tuo browser, in un worker in background. Non viene caricato nulla.'],
        ],
    ],
];
