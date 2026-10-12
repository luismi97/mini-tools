<?php

/*
| Italian copy for the PDF tools (and Image to PDF). See content/it/tools.php.
*/

return [
    'merge-pdf' => [
        'slug' => 'unisci-pdf',
        'name' => 'Unisci PDF',
        'short_description' => 'Combina più file PDF in un unico documento, nell’ordine che preferisci.',
        'description' => 'Aggiungi i tuoi file PDF, trascinali nell’ordine che vuoi e uniscili in un unico PDF. I file vengono combinati nel tuo browser e non vengono mai caricati.',
        'seo_title' => 'Unisci PDF online, gratis e in privato',
        'seo_description' => 'Unisci file PDF gratis online. Combina più PDF in uno, riordinali trascinandoli e scarica subito il risultato. Senza caricare file e senza registrazione.',
        'content' => <<<'HTML'
<h2>Quando conviene unire file PDF</h2>
<p>Combinare PDF è utile quando devi inviare un solo documento: una candidatura con curriculum e lettera di presentazione, una nota spese con tutte le ricevute o un contratto con i suoi allegati. Un unico file è più facile da inviare via email, da caricare sui portali che accettano un solo allegato e da stampare nell’ordine giusto.</p>
<h2>Unisci PDF senza caricarli online</h2>
<p>La maggior parte dei servizi PDF online carica i tuoi documenti sui propri server. Questo strumento combina i file direttamente nel tuo browser, così documenti riservati come estratti conto, referti medici e contratti non lasciano mai il tuo computer o il tuo telefono.</p>
<h2>Consigli</h2>
<ul>
<li>Usa prima Dividi PDF se ti servono solo alcune pagine di un file.</li>
<li>Hai foto o scansioni invece di PDF? Convertile con JPG in PDF e poi uniscile.</li>
<li>Ti servono le pagine come immagini? Usa PDF in JPG.</li>
</ul>
HTML,
        'steps' => [
            'Trascina due o più file PDF nell’area indicata oppure fai clic per sfogliarli.',
            'Trascina i file (o usa le frecce) per metterli nell’ordine che preferisci. Viene mostrato il numero di pagine di ogni file.',
            'Fai clic su <strong>Unisci PDF</strong>.',
            'Il PDF combinato viene scaricato subito come <code>merged.pdf</code>.',
        ],
        'faq' => [
            ['q' => 'I miei file PDF vengono caricati su un server?', 'a' => 'No. I PDF vengono uniti interamente nel tuo browser, quindi i documenti riservati non lasciano mai il tuo dispositivo.'],
            ['q' => 'C’è un limite di file o di dimensioni?', 'a' => 'Puoi unire fino a 30 PDF alla volta, fino a 100 MB ciascuno. I file molto grandi possono richiedere un po’ più di tempo a seconda del dispositivo.'],
            ['q' => 'Link, segnalibri e campi dei moduli vengono conservati?', 'a' => 'Il contenuto delle pagine, le immagini e il testo restano identici. Gli elementi interattivi, come i segnalibri e alcuni campi dei moduli, potrebbero non essere riportati nel file unito.'],
            ['q' => 'Posso unire PDF protetti da password?', 'a' => 'No. Rimuovi prima la password dal PDF e poi uniscilo.'],
            ['q' => 'Posso riordinare o rimuovere pagine?', 'a' => 'Qui riordini file interi. Per rimuovere o estrarre pagine specifiche, usa Dividi PDF prima o dopo l’unione.'],
        ],
    ],

    'split-pdf' => [
        'slug' => 'dividi-pdf',
        'name' => 'Dividi PDF',
        'short_description' => 'Estrai pagine o dividi un PDF in più file più piccoli.',
        'description' => 'Estrai pagine specifiche in un nuovo PDF, dividi un documento in intervalli personalizzati o salva ogni pagina come PDF separato. Il file viene elaborato nel tuo browser.',
        'seo_title' => 'Dividi PDF online: estrai pagine gratis',
        'seo_description' => 'Dividi file PDF gratis online. Estrai pagine, separa per intervalli o salva ogni pagina come PDF a sé. Privato: i tuoi file restano sul dispositivo.',
        'content' => <<<'HTML'
<h2>Perché dividere un PDF?</h2>
<p>Spesso un PDF grande contiene più di quanto vuoi condividere. Dividerlo ti permette di inviare solo le pagine rilevanti di un contratto, isolare una singola fattura da un estratto mensile, separare documenti scansionati insieme o spezzare un file enorme in parti che rispettino i limiti di email e moduli di caricamento.</p>
<h2>Esempi di intervalli di pagine</h2>
<ul>
<li><code>1-3</code>: pagine 1, 2 e 3.</li>
<li><code>1, 4, 7</code>: tre pagine singole.</li>
<li><code>5-</code>: dalla pagina 5 all’ultima.</li>
<li><code>1-2, 10-12</code>: due gruppi di pagine.</li>
</ul>
<p>Per riunire pagine di file diversi usa Unisci PDF. Per trasformare le pagine in immagini usa PDF in JPG.</p>
HTML,
        'steps' => [
            'Trascina un PDF nell’area indicata oppure fai clic per sfogliarlo. Una volta caricato, viene mostrato il numero di pagine.',
            'Scegli una modalità: <strong>Estrai pagine</strong> in un nuovo PDF, <strong>Dividi per intervalli</strong> in più PDF oppure <strong>Ogni pagina</strong> come PDF separato.',
            'Scrivi le pagine o gli intervalli, ad esempio <code>1-3, 5, 8-</code> (<code>8-</code> significa dalla pagina 8 alla fine).',
            'Fai clic su <strong>Dividi PDF</strong>. Un singolo file viene scaricato direttamente; più file vengono scaricati insieme in un ZIP.',
        ],
        'faq' => [
            ['q' => 'Come estraggo pagine specifiche da un PDF?', 'a' => 'Scegli Estrai pagine e scrivi i numeri, ad esempio <code>2, 4-6</code>. Otterrai un nuovo PDF con solo quelle pagine, in quell’ordine.'],
            ['q' => 'Posso dividere un PDF in più file?', 'a' => 'Sì. Usa Dividi per intervalli: ogni intervallo separato da una virgola diventa un PDF a sé. Oppure scegli Ogni pagina per salvare ogni pagina separatamente.'],
            ['q' => 'Il mio PDF viene caricato online?', 'a' => 'No. Il PDF viene diviso nel tuo browser e non lascia mai il tuo dispositivo, quindi è sicuro per contratti, fatture e altri documenti privati.'],
            ['q' => 'Il file originale viene modificato?', 'a' => 'No. Il PDF originale resta identico; lo strumento crea solo nuovi file.'],
            ['q' => 'Funziona con PDF protetti da password?', 'a' => 'No. Rimuovi prima la password dal PDF.'],
        ],
    ],

    'pdf-to-jpg' => [
        'slug' => 'pdf-in-jpg',
        'name' => 'PDF in JPG',
        'short_description' => 'Converti ogni pagina di un PDF in un’immagine JPG di alta qualità.',
        'description' => 'Converti ogni pagina di un PDF in un’immagine JPG alla risoluzione che preferisci. Scarica le pagine una alla volta o tutte insieme in un ZIP. Il PDF viene elaborato nel tuo browser.',
        'seo_title' => 'Converti PDF in JPG gratis e in alta qualità',
        'seo_description' => 'Converti PDF in JPG gratis online. Ogni pagina diventa un’immagine ad alta risoluzione (fino a 300 DPI). Download in ZIP. Il PDF resta sul tuo dispositivo.',
        'content' => <<<'HTML'
<h2>Perché convertire un PDF in JPG?</h2>
<p>Le immagini si condividono più facilmente dei PDF nelle chat e sui social, si inseriscono in presentazioni e documenti e si visualizzano subito su qualsiasi dispositivo. Convertire una pagina PDF in JPG è anche il modo più semplice per trasformare una slide, un volantino o un attestato in un’immagine.</p>
<h2>Come scegliere la risoluzione</h2>
<ul>
<li><strong>72 DPI</strong>: piccole anteprime e miniature.</li>
<li><strong>150 DPI</strong>: visione a schermo, documenti e presentazioni.</li>
<li><strong>300 DPI</strong>: stampa e zoom sul testo piccolo.</li>
</ul>
<p>Ti servono solo alcune pagine? Estraile prima con Dividi PDF. Per passare dalle immagini a un documento usa JPG in PDF.</p>
HTML,
        'steps' => [
            'Trascina un PDF nell’area indicata oppure fai clic per sfogliarlo.',
            'Scegli la risoluzione: <strong>72 DPI</strong> per lo schermo, <strong>150 DPI</strong> per la maggior parte degli usi o <strong>300 DPI</strong> per la stampa.',
            'Fai clic su <strong>Converti in JPG</strong>. Ogni pagina viene generata come immagine e mostrata in anteprima.',
            'Scarica le singole pagine oppure fai clic su <strong>Scarica tutto</strong> per ottenere tutte le pagine in un ZIP.',
        ],
        'faq' => [
            ['q' => 'Quanti DPI devo scegliere?', 'a' => '150 DPI va bene per condividere e per i documenti. Usa 300 DPI per stampare o quando devi ingrandire testo piccolo, e 72 DPI per le anteprime web. Più DPI significano file più pesanti.'],
            ['q' => 'Il mio PDF viene caricato su un server?', 'a' => 'No. Le pagine vengono generate nel tuo browser con PDF.js, lo stesso motore usato da Firefox. Il file non lascia mai il tuo dispositivo.'],
            ['q' => 'Quante pagine posso convertire?', 'a' => 'Fino a 200 pagine per PDF, con file fino a 100 MB.'],
            ['q' => 'Posso convertire un PDF in PNG?', 'a' => 'Questo strumento crea immagini JPG, ideali per documenti e foto. Se ti servono PNG, converti poi i JPG con JPG in PNG.'],
            ['q' => 'Funziona con PDF protetti da password?', 'a' => 'No. Rimuovi prima la password dal PDF.'],
        ],
    ],

    'jpg-to-pdf' => [
        'slug' => 'jpg-in-pdf',
        'name' => 'JPG in PDF',
        'short_description' => 'Trasforma foto e scansioni JPG in un unico documento PDF.',
        'description' => 'Combina immagini JPG in un unico PDF, scegli formato della pagina, orientamento e margini e riordina le pagine prima di scaricare. Tutto avviene nel tuo browser.',
        'seo_title' => 'Converti JPG in PDF: unisci immagini in un PDF',
        'seo_description' => 'Converti JPG in PDF gratis online. Combina più foto in un PDF con pagine A4, Letter o adattate all’immagine. Privato, veloce e senza registrazione.',
        'content' => <<<'HTML'
<h2>Trasforma foto e scansioni in un unico PDF</h2>
<p>Il PDF è il formato standard per i documenti da inviare a scuole, datori di lavoro, banche e uffici pubblici. Raccogliere in un unico PDF le foto JPG di ricevute, documenti d’identità, compiti o pagine firmate tiene tutto in ordine e rende il file facile da caricare e da stampare.</p>
<h2>Consigli per un buon risultato</h2>
<ul>
<li>Fotografa i documenti con una buona luce, ben distesi e dall’alto.</li>
<li>Usa Ritaglia immagine per eliminare lo sfondo e i bordi del tavolo prima della conversione.</li>
<li>Scegli A4 o Letter per i documenti da stampare e Adatta all’immagine per gli album fotografici.</li>
<li>Combina il risultato con altri documenti usando Unisci PDF.</li>
</ul>
<p>Hai anche screenshot PNG o immagini WebP? Usa Immagine in PDF, che accetta tutti i formati di immagine comuni.</p>
HTML,
        'steps' => [
            'Trascina le tue foto JPG o pagine scansionate nell’area indicata oppure fai clic per sfogliarle. Aggiungine quante ne servono.',
            'Trascina le immagini (o usa le frecce) per definire l’ordine delle pagine.',
            'Scegli il formato della pagina — <strong>A4</strong>, <strong>Letter (USA)</strong> o <strong>Adatta all’immagine</strong> — oltre a orientamento e margini.',
            'Fai clic su <strong>Converti in PDF</strong> per scaricare un PDF con ogni immagine su una pagina.',
        ],
        'faq' => [
            ['q' => 'Come unisco più JPG in un unico PDF?', 'a' => 'Aggiungi tutti i file JPG, mettili in ordine e fai clic su Converti in PDF. Ogni immagine diventa una pagina dello stesso PDF.'],
            ['q' => 'Le mie foto avranno l’orientamento giusto?', 'a' => 'Sì. Viene applicato l’orientamento salvato da telefoni e fotocamere (EXIF), così le foto verticali restano dritte. L’orientamento automatico mette anche la pagina in orizzontale per le immagini larghe.'],
            ['q' => 'Quale formato di pagina devo scegliere?', 'a' => 'Usa A4 in Italia e nella maggior parte dei paesi, e Letter per Stati Uniti e Canada. Adatta all’immagine crea pagine delle dimensioni esatte di ogni foto, senza bordi bianchi.'],
            ['q' => 'Le mie immagini vengono caricate online?', 'a' => 'No. Il PDF viene creato nel tuo browser. Foto e documenti non lasciano mai il tuo dispositivo.'],
            ['q' => 'Posso aggiungere immagini PNG o WebP?', 'a' => 'Questa pagina è per i file JPG. Usa Immagine in PDF per combinare immagini JPG, PNG e WebP in un unico PDF.'],
        ],
    ],

    'rotate-pdf' => [
        'slug' => 'ruota-pdf',
        'name' => 'Ruota PDF',
        'short_description' => 'Ruota tutte le pagine o solo quelle storte.',
        'description' => 'Correggi le pagine girate di lato o capovolte: visualizza l’anteprima di ogni pagina, ruota pagine singole o l’intero documento e scarica il PDF corretto. Il file non lascia mai il browser.',
        'seo_title' => 'Ruota PDF online: una pagina o tutte',
        'seo_description' => 'Ruota le pagine di un PDF gratis online. Guarda l’anteprima di ogni pagina, ruotane una o tutte di 90° o 180° e salva in modo permanente. Senza caricare file.',
        'content' => <<<'HTML'
<h2>Correggi le scansioni storte in pochi secondi</h2>
<p>Scanner e app di scansione sul telefono salvano spesso alcune pagine girate di lato o capovolte, soprattutto quando il documento mescola pagine verticali e orizzontali. Ruotarle fa sì che il PDF si legga correttamente a schermo e si stampi con l’orientamento giusto.</p>
<h2>Ruota solo ciò che serve</h2>
<p>Le anteprime ti permettono di ruotare singole pagine invece dell’intero file. Ogni clic ruota una pagina di 90° in senso orario; i pulsanti freccia ruotano a sinistra o a destra, e la rotazione viene salvata in modo permanente nel file scaricato, senza perdita di qualità.</p>
<p>Devi anche rimuovere delle pagine? Usa Elimina pagine PDF. Per combinare più documenti usa Unisci PDF, e per trasformare le pagine in immagini PDF in JPG.</p>
HTML,
        'steps' => [
            'Trascina un PDF nell’area indicata oppure fai clic per sfogliarlo. Compare un’anteprima di ogni pagina.',
            'Fai clic su una pagina (o sui suoi pulsanti freccia) per ruotarla di 90°. Usa <strong>Ruota tutte</strong> per girare tutte le pagine insieme.',
            'Ruota solo le pagine che ne hanno bisogno, ad esempio quelle scansionate di lato o capovolte.',
            'Fai clic su <strong>Scarica il PDF ruotato</strong> per salvare il file corretto.',
        ],
        'faq' => [
            ['q' => 'Posso ruotare una sola pagina di un PDF?', 'a' => 'Sì. Ogni pagina ha i propri pulsanti di rotazione, quindi puoi ruotare solo quelle storte e lasciare le altre come sono.'],
            ['q' => 'La rotazione è permanente?', 'a' => 'Sì. Il nuovo orientamento viene salvato nel PDF scaricato, che si apre correttamente in qualsiasi lettore PDF, browser e stampante.'],
            ['q' => 'Ruotare il PDF riduce la qualità?', 'a' => 'No. La rotazione cambia solo l’orientamento della pagina. Testo, immagini e qualità restano identici.'],
            ['q' => 'Il mio PDF viene caricato online?', 'a' => 'No. Il PDF viene elaborato nel tuo browser e non lascia mai il tuo dispositivo.'],
            ['q' => 'Funziona con PDF protetti da password?', 'a' => 'No. Rimuovi prima la password dal PDF.'],
        ],
    ],

    'delete-pdf-pages' => [
        'slug' => 'elimina-pagine-pdf',
        'name' => 'Elimina pagine PDF',
        'short_description' => 'Rimuovi visivamente le pagine indesiderate da un PDF.',
        'description' => 'Guarda l’anteprima di ogni pagina di un PDF, fai clic su quelle da rimuovere e scarica una copia pulita. Ideale per le pagine bianche delle scansioni e per le pagine riservate da non condividere.',
        'seo_title' => 'Elimina pagine da un PDF gratis',
        'seo_description' => 'Rimuovi pagine da un PDF gratis online. Guarda tutte le pagine, fai clic per eliminarle e scarica il nuovo PDF. Elaborato nel tuo browser.',
        'content' => <<<'HTML'
<h2>Perché rimuovere pagine da un PDF?</h2>
<p>I documenti scansionati contengono spesso pagine bianche, pagine doppie o copertine. Altre volte devi condividere un documento senza le pagine con dati personali o riservati. Rimuoverle rende il file più leggero, più ordinato e più sicuro da inviare.</p>
<h2>Rimuovere, mantenere o estrarre</h2>
<p>Questo strumento è ideale quando vuoi scartare alcune pagine e tenere il resto. Se ti servono solo poche pagine di un documento lungo, Dividi PDF ti permette di estrarle scrivendone i numeri. Le pagine storte si correggono con Ruota PDF, e più file già ripuliti si possono combinare con Unisci PDF.</p>
HTML,
        'steps' => [
            'Trascina un PDF nell’area indicata oppure fai clic per sfogliarlo. Compare un’anteprima di ogni pagina.',
            'Fai clic sulle pagine da rimuovere. Vengono segnate in rosso; fai di nuovo clic per mantenere una pagina.',
            'Controlla il contatore per sapere quante pagine verranno eliminate.',
            'Fai clic su <strong>Scarica il PDF modificato</strong> per salvare una copia senza quelle pagine.',
        ],
        'faq' => [
            ['q' => 'Come elimino pagine da un PDF?', 'a' => 'Apri il PDF qui, fai clic su ogni pagina da rimuovere e scarica il file modificato. Le pagine rimanenti mantengono l’ordine originale.'],
            ['q' => 'Il file originale viene modificato?', 'a' => 'No. Il PDF originale resta invariato; lo strumento scarica una nuova copia senza le pagine eliminate.'],
            ['q' => 'Posso rimuovere le pagine bianche da una scansione?', 'a' => 'Sì. Con le anteprime è facile individuare pagine bianche o doppie: basta fare clic per rimuoverle.'],
            ['q' => 'Il mio PDF viene caricato online?', 'a' => 'No. Tutto avviene nel tuo browser, quindi i documenti privati non lasciano mai il tuo dispositivo.'],
            ['q' => 'Posso estrarre pagine invece di rimuoverle?', 'a' => 'Sì. Per tenere solo alcune pagine, Dividi PDF ti permette di scrivere i numeri delle pagine da estrarre.'],
        ],
    ],

    'image-to-pdf' => [
        'slug' => 'immagine-in-pdf',
        'name' => 'Immagine in PDF',
        'short_description' => 'Converti immagini JPG, PNG e WebP in un unico file PDF.',
        'description' => 'Trasforma foto, screenshot e scansioni in qualsiasi formato comune in un unico PDF. Riordina le immagini, scegli formato della pagina e margini e scarica subito.',
        'seo_title' => 'Converti immagini in PDF: JPG, PNG e WebP',
        'seo_description' => 'Converti immagini in PDF gratis online. Combina JPG, PNG e WebP in un PDF, riordina le pagine e scegli A4, Letter o adatta all’immagine. Senza caricare file.',
        'content' => <<<'HTML'
<h2>Unisci qualsiasi immagine in un PDF</h2>
<p>Trasforma screenshot, pagine scansionate, foto di ricevute e grafici esportati in un unico PDF che chiunque può aprire, stampare o allegare a un’email. Puoi mescolare immagini JPG, PNG e WebP nello stesso documento e ordinarle come vuoi.</p>
<h2>Come scegliere il formato della pagina</h2>
<ul>
<li><strong>A4</strong>: formato standard dei documenti in Italia e nella maggior parte dei paesi.</li>
<li><strong>Letter</strong>: standard negli Stati Uniti e in Canada.</li>
<li><strong>Adatta all’immagine</strong>: ogni pagina ha esattamente le dimensioni della sua immagine, senza bordi bianchi.</li>
</ul>
<p>Hai solo foto JPG? JPG in PDF funziona allo stesso modo. Per aggiungere il risultato ad altri PDF, usa Unisci PDF.</p>
HTML,
        'steps' => [
            'Trascina le immagini nell’area indicata oppure fai clic per sfogliarle. Puoi mescolare JPG, PNG e WebP nello stesso PDF.',
            'Riordina le immagini trascinandole o con i pulsanti freccia.',
            'Scegli formato della pagina, orientamento e margine.',
            'Fai clic su <strong>Converti in PDF</strong> e il PDF viene scaricato subito.',
        ],
        'faq' => [
            ['q' => 'Quali formati di immagine posso convertire in PDF?', 'a' => 'JPG, JPEG, PNG e WebP. Puoi combinare formati diversi nello stesso PDF.'],
            ['q' => 'Cosa succede agli sfondi trasparenti dei PNG?', 'a' => 'Le aree trasparenti vengono poste su una pagina bianca, che è come appaiono in stampa.'],
            ['q' => 'Posso trasformare degli screenshot in un PDF?', 'a' => 'Sì. Gli screenshot sono di solito file PNG: aggiungili tutti, ordinali e convertili. Usa Adatta all’immagine per evitare bordi bianchi.'],
            ['q' => 'Le mie immagini restano private?', 'a' => 'Sì. Tutto avviene nel tuo browser, quindi le immagini non vengono mai caricate.'],
        ],
    ],
];
