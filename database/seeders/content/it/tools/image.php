<?php

/*
| Italian copy for the image tools. See content/it/tools.php.
*/

return [
    'image-compressor' => [
        'slug' => 'comprimi-immagini',
        'name' => 'Comprimi immagini',
        'short_description' => 'Riduci il peso di immagini JPG, PNG e WebP senza perdita di qualità visibile.',
        'description' => 'Comprimi una o più immagini alla volta e guarda quanto risparmi su ogni file. Le immagini vengono elaborate sul tuo dispositivo e non vengono mai caricate su un server.',
        'seo_title' => 'Comprimi immagini JPG, PNG e WebP online',
        'seo_description' => 'Comprimi immagini JPG, PNG e WebP gratis online. Qualità regolabile, elaborazione in blocco e download immediato. I file restano sul tuo dispositivo.',
        'content' => <<<'HTML'
<h2>Perché comprimere le immagini?</h2>
<p>Le immagini pesanti sono la causa più comune dei siti lenti. Comprimerle riduce le dimensioni del file — spesso del 60–80% — senza differenze visibili, migliorando velocità di caricamento, Core Web Vitals e SEO. File più leggeri sono anche più facili da inviare via email, da caricare nei moduli con limiti di dimensione e da archiviare.</p>
<h2>Compressione con e senza perdita</h2>
<p>JPG e WebP usano una compressione con perdita: eliminano dettagli che l’occhio nota appena, ed è per questo che il cursore della qualità incide tanto. Il PNG è senza perdita, quindi per le foto salvate in PNG il risparmio maggiore si ottiene convertendole in WebP o JPG, o riducendone le dimensioni con Ridimensiona immagini.</p>
<h2>I formati migliori per il web</h2>
<ul>
<li><strong>WebP</strong>: la scelta migliore in generale per i siti; vedi JPG in WebP e PNG in WebP.</li>
<li><strong>JPG</strong>: compatibilità universale per le foto.</li>
<li><strong>PNG</strong>: screenshot, loghi e grafiche che richiedono bordi netti o trasparenza.</li>
</ul>
HTML,
        'steps' => [
            'Trascina le immagini JPG, PNG o WebP nell’area indicata, fai clic per sfogliarle o incolla un’immagine con Ctrl + V.',
            'Regola il cursore <strong>Qualità</strong>. Tra il 70 e l’80% di solito il peso si riduce moltissimo senza differenze visibili.',
            'Se vuoi, converti in un altro formato o limita la larghezza massima: ridurre le foto grandi è ciò che fa risparmiare più spazio.',
            'Scarica ogni immagine oppure fai clic su <strong>Scarica tutto</strong> per ottenere tutte le immagini compresse in un unico ZIP.',
        ],
        'faq' => [
            ['q' => 'Le mie immagini vengono caricate su un server?', 'a' => 'No. La compressione avviene interamente nel tuo browser, sul tuo dispositivo. Le immagini non vengono mai caricate, salvate né viste da altri.'],
            ['q' => 'Che qualità devo usare?', 'a' => 'Per le foto sui siti web, 70–80% è un ottimo equilibrio tra peso e qualità. Usa 85–95% per le immagini in cui contano i dettagli e 50–65% quando la priorità è il file più leggero.'],
            ['q' => 'Perché il mio PNG si è ridotto pochissimo?', 'a' => 'Il PNG è un formato senza perdita, quindi il cursore della qualità incide poco. Per file molto più leggeri converti le foto PNG in <strong>WebP</strong> o <strong>JPG</strong> con l’opzione del formato di output, oppure riduci la larghezza massima. Se la ricodifica rende il file più pesante, viene mantenuto l’originale.'],
            ['q' => 'La compressione rimuove i metadati EXIF?', 'a' => 'Sì. Le immagini ricodificate non conservano metadati EXIF come i dati della fotocamera o la posizione GPS, il che tutela anche la tua privacy. L’orientamento viene applicato prima di rimuovere i metadati.'],
            ['q' => 'Quante immagini posso comprimere alla volta?', 'a' => 'Fino a 30 immagini per blocco, fino a 25 MB ciascuna.'],
        ],
    ],

    'image-resizer' => [
        'slug' => 'ridimensiona-immagini',
        'name' => 'Ridimensiona immagini',
        'short_description' => 'Cambia le dimensioni delle immagini in pixel o in percentuale, una o tante insieme.',
        'description' => 'Cambia larghezza e altezza di immagini JPG, PNG e WebP in pixel esatti o in percentuale, mantenendo le proporzioni. Ridimensiona in blocco e scarica tutto in un ZIP.',
        'seo_title' => 'Ridimensiona immagini JPG, PNG e WebP gratis',
        'seo_description' => 'Ridimensiona immagini gratis. Imposta larghezza e altezza in pixel o scala in percentuale, mantieni le proporzioni e lavora in blocco. Senza caricare nulla.',
        'content' => <<<'HTML'
<h2>Perché ridimensionare le immagini?</h2>
<p>Le fotocamere degli smartphone producono foto larghe 4000 pixel o più, molto più di quanto serva a qualsiasi schermo. Ridimensionarle alla misura in cui verranno davvero mostrate le fa caricare più in fretta, occupa meno spazio e rispetta i requisiti di siti web, negozi online e social network.</p>
<h2>Dimensioni consigliate</h2>
<ul>
<li><strong>Immagini principali di un sito:</strong> 1920 px di larghezza.</li>
<li><strong>Immagini di blog e prodotti:</strong> 800–1200 px di larghezza.</li>
<li><strong>Post di Instagram:</strong> 1080 × 1080 px (quadrato) o 1080 × 1350 px (verticale).</li>
<li><strong>Miniature di YouTube:</strong> 1280 × 720 px.</li>
<li><strong>Allegati email:</strong> 1200–1600 px sul lato più lungo.</li>
</ul>
<p>Ti serve un’inquadratura precisa invece di una dimensione più piccola? Usa Ritaglia immagine per tagliare la foto con proporzioni specifiche e poi alleggeriscila con Comprimi immagini.</p>
HTML,
        'steps' => [
            'Trascina le immagini JPG, PNG o WebP nell’area indicata, sfogliale o incollale con Ctrl + V. Puoi ridimensionarne molte alla volta.',
            'Scegli <strong>In percentuale</strong> per scalare tutto (ad esempio 50%) oppure <strong>Per dimensioni</strong> per impostare larghezza e/o altezza esatte in pixel.',
            'Lascia attivo <strong>Mantieni le proporzioni</strong> per non deformarle. Se imposti larghezza e altezza, ogni immagine viene adattata all’interno di quel riquadro.',
            'Scarica ogni immagine oppure fai clic su <strong>Scarica tutto</strong> per ottenere un ZIP.',
        ],
        'faq' => [
            ['q' => 'Ridimensionare riduce la qualità?', 'a' => 'Rimpicciolire un’immagine la mantiene nitida. Ingrandirla oltre la dimensione originale non può aggiungere dettagli, quindi può risultare un po’ sfocata. Per JPG e WebP puoi anche scegliere la qualità di output.'],
            ['q' => 'Come ridimensiono senza deformare l’immagine?', 'a' => 'Lascia attivo <strong>Mantieni le proporzioni</strong> e inserisci solo la larghezza o solo l’altezza. L’altro lato viene calcolato automaticamente per mantenere le proporzioni originali.'],
            ['q' => 'Che dimensioni devono avere le immagini per il web?', 'a' => 'Per la maggior parte dei siti bastano 1200–1920 px di larghezza per le immagini a tutto schermo e 600–800 px per quelle nel contenuto. Immagini più piccole si caricano più velocemente e migliorano i Core Web Vitals.'],
            ['q' => 'Le mie immagini vengono caricate online?', 'a' => 'No. Le immagini vengono ridimensionate nel tuo browser e non lasciano mai il tuo dispositivo.'],
            ['q' => 'Quante immagini posso ridimensionare alla volta?', 'a' => 'Fino a 30 immagini per blocco, fino a 25 MB ciascuna.'],
        ],
    ],

    'heic-to-jpg' => [
        'slug' => 'heic-in-jpg',
        'name' => 'HEIC in JPG',
        'short_description' => 'Converti le foto HEIC dell’iPhone in JPG o PNG nel browser.',
        'description' => 'Converti foto HEIC e HEIF di iPhone o iPad in JPG o PNG. Converti in blocco e scarica tutto in un ZIP: le tue foto non vengono mai caricate.',
        'seo_title' => 'Converti HEIC in JPG: foto iPhone gratis',
        'seo_description' => 'Converti HEIC in JPG gratis online. Trasforma le foto dell’iPhone in JPG o PNG in blocco nel browser: privato, senza caricare file e senza registrazione.',
        'content' => <<<'HTML'
<h2>Perché convertire HEIC in JPG?</h2>
<p>Gli iPhone salvano le foto in HEIC per impostazione predefinita perché occupano circa la metà di un JPG. Il problema è la compatibilità: molti programmi Windows, siti web, moduli online, vecchi telefoni Android e servizi di stampa non aprono ancora i file HEIC. Convertirle in JPG le rende apribili ovunque.</p>
<h2>Come aprire i file HEIC su Windows</h2>
<p>Windows ha bisogno di un codec aggiuntivo per aprire i file HEIC. Invece di installare qualcosa, trascina qui le foto e convertile in JPG in pochi secondi. La conversione avviene nel browser, quindi le tue foto personali non vengono mai caricate.</p>
<h2>JPG o PNG?</h2>
<p>Scegli <strong>JPG</strong> per le foto: i file sono leggeri e funzionano ovunque. Scegli <strong>PNG</strong> solo se ti serve una qualità senza perdita per il fotoritocco. Dopo la conversione puoi alleggerire ancora i file con Comprimi immagini o Ridimensiona immagini.</p>
HTML,
        'steps' => [
            'Trascina le foto HEIC o HEIF (da iPhone o iPad) nell’area indicata oppure fai clic per sfogliarle. Puoi convertirne molte alla volta.',
            'Scegli il formato di output: <strong>JPG</strong> per file leggeri che si aprono ovunque, oppure <strong>PNG</strong> per una qualità senza perdita.',
            'Regola la qualità se serve. Tra l’85 e il 92% le foto sono identiche all’originale.',
            'Scarica ogni foto oppure fai clic su <strong>Scarica tutto</strong> per ottenere un ZIP con tutte le immagini convertite.',
        ],
        'faq' => [
            ['q' => 'Che cos’è un file HEIC?', 'a' => 'HEIC (High Efficiency Image Container) è il formato fotografico predefinito di iPhone e iPad da iOS 11. Fa risparmiare spazio, ma molti programmi Windows, siti web e dispositivi più vecchi non riescono ad aprirlo.'],
            ['q' => 'Le mie foto vengono caricate online?', 'a' => 'No. Le foto vengono convertite nel tuo browser e non lasciano mai il dispositivo, un aspetto importante per le immagini personali.'],
            ['q' => 'L’orientamento della foto viene mantenuto?', 'a' => 'Sì. Le informazioni di rotazione salvate nel file HEIC vengono applicate, quindi le foto verticali restano dritte.'],
            ['q' => 'Perché la prima conversione richiede qualche secondo?', 'a' => 'La maggior parte dei browser non legge l’HEIC da sola, quindi il convertitore scarica un decoder HEIC al primo utilizzo. Poi le conversioni sono rapide. Safari decodifica l’HEIC in modo nativo.'],
            ['q' => 'La posizione GPS viene rimossa?', 'a' => 'Sì. Le immagini convertite non includono metadati EXIF come la posizione GPS o i dati della fotocamera.'],
            ['q' => 'Come faccio a far salvare l’iPhone in JPG invece che in HEIC?', 'a' => 'Vai in Impostazioni › Fotocamera › Formati e scegli <strong>Più compatibile</strong>. Le nuove foto verranno salvate in JPG.'],
        ],
    ],

    'crop-image' => [
        'slug' => 'ritaglia-immagine',
        'name' => 'Ritaglia immagine',
        'short_description' => 'Ritaglia le foto visivamente o con dimensioni e proporzioni esatte.',
        'description' => 'Trascina per selezionare l’area da mantenere, scegli proporzioni come 1:1 o 16:9 oppure inserisci valori esatti in pixel. Scarica l’immagine ritagliata in JPG, PNG o WebP.',
        'seo_title' => 'Ritaglia immagine online gratis',
        'seo_description' => 'Ritaglia immagini gratis online. Seleziona trascinando, usa proporzioni come 1:1, 4:3 e 16:9 o pixel esatti e scarica in JPG, PNG o WebP. Senza caricare nulla.',
        'content' => <<<'HTML'
<h2>Ritagli per i social</h2>
<ul>
<li><strong>1:1</strong>: foto profilo e post quadrati.</li>
<li><strong>4:5</strong>: post verticali di Instagram, che occupano più spazio nel feed.</li>
<li><strong>9:16</strong>: storie, Reels, TikTok e YouTube Shorts.</li>
<li><strong>16:9</strong>: miniature di YouTube, presentazioni e banner web.</li>
</ul>
<h2>Consiglio di composizione: la regola dei terzi</h2>
<p>La griglia all’interno della selezione la divide in terzi. Posizionare il soggetto su una delle linee o delle intersezioni crea di solito una foto più equilibrata e naturale rispetto a metterlo al centro.</p>
<p>Dopo il ritaglio, usa Ridimensiona immagini per raggiungere una dimensione esatta in pixel, oppure Comprimi immagini per alleggerire il file.</p>
HTML,
        'steps' => [
            'Trascina un’immagine nell’area indicata, fai clic per sfogliarla o incollala con Ctrl + V.',
            'Trascina la selezione per spostarla e gli angoli per ridimensionarla. Usa le frecce della tastiera per regolazioni al pixel (tieni premuto Maiusc per spostarti di 10 px).',
            'Scegli proporzioni come <strong>1:1</strong> per le foto profilo, <strong>16:9</strong> per le miniature o <strong>9:16</strong> per le storie, oppure inserisci valori esatti in pixel.',
            'Scegli il formato di output e fai clic su <strong>Ritaglia e scarica</strong>.',
        ],
        'faq' => [
            ['q' => 'Quali proporzioni devo usare?', 'a' => 'Usa 1:1 per foto profilo e post di Instagram, 4:5 per i post verticali di Instagram, 16:9 per miniature di YouTube e presentazioni, 9:16 per storie e Reels, e 3:2 o 4:3 per le classiche stampe fotografiche.'],
            ['q' => 'Ritagliare riduce la qualità?', 'a' => 'Il ritaglio mantiene i pixel originali dell’area selezionata a piena risoluzione. Per JPG e WebP puoi scegliere la qualità; l’output PNG è senza perdita.'],
            ['q' => 'La mia foto viene caricata online?', 'a' => 'No. L’immagine viene ritagliata nel tuo browser e non lascia mai il tuo dispositivo.'],
            ['q' => 'Quali formati sono supportati?', 'a' => 'Puoi ritagliare immagini JPG, PNG e WebP fino a 25 MB e salvare il risultato in JPG, PNG o WebP.'],
        ],
    ],

    'jpg-to-webp' => [
        'slug' => 'jpg-in-webp',
        'name' => 'JPG in WebP',
        'short_description' => 'Converti immagini JPG nel formato WebP, più leggero e veloce.',
        'description' => 'Converti immagini JPG e JPEG in WebP con qualità regolabile. Converti più file alla volta e scaricali singolarmente o tutti insieme. Tutto funziona nel tuo browser.',
        'seo_title' => 'Converti JPG in WebP online, gratis e privato',
        'seo_description' => 'Converti JPG in WebP gratis online. Conversione in blocco, qualità regolabile e download in ZIP. Le immagini vengono convertite nel browser, senza caricarle.',
        'content' => <<<'HTML'
<h2>Perché convertire JPG in WebP?</h2>
<p>Le immagini WebP pesano di solito il 25–35% in meno di un JPG con la stessa qualità visiva. Immagini più leggere fanno caricare più in fretta le pagine, migliorano il Largest Contentful Paint (LCP) e aiutano il posizionamento su Google, che usa l’esperienza sulla pagina come segnale di ranking. Tutti i browser moderni supportano WebP.</p>
<h2>Come usare WebP sul tuo sito</h2>
<p>La maggior parte dei CMS, WordPress compreso, accetta immagini WebP. Per risultati migliori, porta le immagini alla dimensione di visualizzazione con Ridimensiona immagini prima di convertirle e tieni la qualità tra il 75 e l’85%.</p>
<p>Devi convertire grafiche con trasparenza? Usa PNG in WebP. Ti serve tornare a un formato universale? Usa WebP in JPG.</p>
HTML,
        'steps' => [
            'Trascina le immagini JPG nell’area indicata, fai clic per sfogliarle o incolla un’immagine con Ctrl + V. Puoi aggiungerne più di una alla volta.',
            'Scegli la <strong>Qualità</strong>. Tra il 75 e l’85% ottieni file WebP identici a vista e molto più leggeri.',
            'Ogni immagine viene convertita subito nel tuo browser. Controlla il nuovo peso e la percentuale risparmiata.',
            'Scarica le immagini una alla volta oppure fai clic su <strong>Scarica tutto</strong> per un ZIP con tutti i file WebP.',
        ],
        'faq' => [
            ['q' => 'Che cos’è WebP?', 'a' => 'WebP è un formato di immagine moderno creato da Google. A parità di qualità visiva, i file WebP pesano di solito il 25–35% in meno di un JPG, il che rende i siti più veloci e migliora i Core Web Vitals.'],
            ['q' => 'Le mie immagini vengono caricate online?', 'a' => 'No. La conversione avviene interamente nel tuo browser. Le immagini non lasciano mai il tuo dispositivo.'],
            ['q' => 'Tutti i browser supportano WebP?', 'a' => 'Sì. Tutti i browser moderni (Chrome, Edge, Firefox e Safari 14 o successivo) mostrano le immagini WebP. Per creare file WebP serve un browser recente; se il tuo non ci riesce, lo strumento te lo segnala.'],
            ['q' => 'Posso convertire anche PNG in WebP?', 'a' => 'Sì. Sono accettati anche i file PNG e la trasparenza viene mantenuta nel WebP.'],
            ['q' => 'Ci sono dei limiti?', 'a' => 'Puoi convertire fino a 30 immagini per blocco, fino a 25 MB ciascuna.'],
        ],
    ],

    'png-to-webp' => [
        'slug' => 'png-in-webp',
        'name' => 'PNG in WebP',
        'short_description' => 'Converti immagini PNG in WebP mantenendo la trasparenza.',
        'description' => 'Converti file PNG in WebP per renderli molto più leggeri senza perdere la trasparenza. Converti in blocco e scarica singolarmente o in un ZIP, direttamente nel browser.',
        'seo_title' => 'Converti PNG in WebP con trasparenza, gratis',
        'seo_description' => 'Converti PNG in WebP gratis online. Mantiene la trasparenza, converte in blocco, regola la qualità e scarica in ZIP. Le immagini restano sul tuo dispositivo.',
        'content' => <<<'HTML'
<h2>PNG o WebP</h2>
<p>Il PNG è ottimo per le grafiche con trasparenza, ma i suoi file sono pesanti. Anche il WebP supporta la trasparenza ed è di solito molto più leggero: convertire in WebP loghi, icone, screenshot e foto di prodotti su sfondo trasparente velocizza i siti senza perdere le aree trasparenti.</p>
<h2>Quando conservare il PNG</h2>
<p>Tieni il PNG originale come file master per le modifiche future e per i servizi che non accettano WebP. Per le foto JPG usa JPG in WebP; per alleggerire le immagini senza cambiare formato usa Comprimi immagini.</p>
<p>La conversione avviene sul tuo dispositivo: i file non vengono mai caricati e puoi convertirne diversi alla volta, controllare il peso di ogni risultato e scaricarli tutti insieme.</p>
HTML,
        'steps' => [
            'Trascina le immagini PNG nell’area indicata, fai clic per sfogliarle o incolla uno screenshot con Ctrl + V.',
            'Regola la <strong>Qualità</strong>. Tra l’80 e il 90% grafiche e screenshot restano nitidi e il peso cala molto.',
            'Ogni PNG viene convertito in WebP all’istante nel browser, mantenendo gli sfondi trasparenti.',
            'Scarica le immagini una alla volta oppure usa <strong>Scarica tutto</strong> per ottenere un ZIP.',
        ],
        'faq' => [
            ['q' => 'Il WebP mantiene la trasparenza del PNG?', 'a' => 'Sì. Il WebP supporta il canale alfa, quindi le aree trasparenti e semitrasparenti del PNG vengono mantenute.'],
            ['q' => 'Quanto è più leggero il WebP rispetto al PNG?', 'a' => 'Per foto e immagini complesse il WebP pesa spesso il 50–80% in meno del PNG. Per grafiche semplici con pochi colori il risparmio è minore, ma il WebP di solito resta più leggero.'],
            ['q' => 'Posso usare WebP sul mio sito?', 'a' => 'Sì. Tutti i browser moderni supportano WebP, e immagini più leggere migliorano la velocità di caricamento e i Core Web Vitals.'],
            ['q' => 'I miei file vengono caricati online?', 'a' => 'No. La conversione avviene sul tuo dispositivo. Le immagini non vengono mai caricate.'],
        ],
    ],

    'webp-to-jpg' => [
        'slug' => 'webp-in-jpg',
        'name' => 'WebP in JPG',
        'short_description' => 'Converti immagini WebP in JPG, compatibile ovunque.',
        'description' => 'Converti immagini WebP in JPG per aprirle ovunque: vecchi programmi, email e servizi di stampa. Converti in blocco e scarica tutto in un ZIP.',
        'seo_title' => 'Converti WebP in JPG online, gratis e veloce',
        'seo_description' => 'Converti WebP in JPG gratis online. Conversione in blocco, qualità regolabile e download in ZIP. La conversione avviene nel browser, senza caricare file.',
        'content' => <<<'HTML'
<h2>Perché ti ritrovi immagini WebP?</h2>
<p>Molti siti pubblicano le immagini in WebP per caricarsi più in fretta, quindi le immagini che salvi dal web finiscono spesso come file <code>.webp</code>. Alcuni programmi, stampanti, client email e moduli non li accettano ancora; convertirli in JPG risolve il problema.</p>
<h2>Consigli</h2>
<ul>
<li>Il JPG non supporta la trasparenza: le aree trasparenti diventano bianche.</li>
<li>Usa una qualità dell’85–92% per le foto che potresti stampare.</li>
<li>Vuoi un’immagine più leggera dopo? Usa Comprimi immagini o Ridimensiona immagini.</li>
</ul>
<h2>È sicuro convertire le mie foto?</h2>
<p>Sì. La conversione avviene sul tuo dispositivo, quindi le immagini non vengono mai caricate. I file WebP originali non cambiano: lo strumento crea nuove copie JPG da scaricare una alla volta o tutte insieme in un ZIP.</p>
HTML,
        'steps' => [
            'Trascina le immagini WebP nell’area indicata oppure fai clic per sfogliarle. La conversione in blocco è supportata.',
            'Imposta la <strong>Qualità</strong> del JPG. Tra l’85 e il 92% i risultati sulle foto sono eccellenti.',
            'Ogni immagine viene convertita in JPG nel browser. Le aree trasparenti diventano bianche, perché il JPG non supporta la trasparenza.',
            'Scarica i file JPG singolarmente o tutti insieme in un ZIP.',
        ],
        'faq' => [
            ['q' => 'Perché convertire WebP in JPG?', 'a' => 'Il JPG funziona ovunque: vecchi editor di foto, client email, documenti d’ufficio, servizi di stampa e piattaforme che non accettano WebP.'],
            ['q' => 'Cosa succede agli sfondi trasparenti?', 'a' => 'Il JPG non supporta la trasparenza, quindi le aree trasparenti vengono riempite di bianco. Per mantenerla, converti in PNG con WebP in PNG.'],
            ['q' => 'La qualità dell’immagine peggiorerà?', 'a' => 'Con una qualità dell’85% o più la differenza sulle foto non si vede. Il JPG può pesare più del WebP perché la compressione JPG è meno efficiente.'],
            ['q' => 'Le mie immagini vengono caricate online?', 'a' => 'No. La conversione avviene nel tuo browser e le immagini non lasciano mai il tuo dispositivo.'],
        ],
    ],

    'png-to-jpg' => [
        'slug' => 'png-in-jpg',
        'name' => 'PNG in JPG',
        'short_description' => 'Converti immagini e screenshot PNG in file JPG più leggeri.',
        'description' => 'Converti immagini PNG in JPG per renderle più leggere e compatibili con qualsiasi programma. Converti in blocco, scegli la qualità e scarica tutto in un ZIP, direttamente nel browser.',
        'seo_title' => 'Converti PNG in JPG gratis, veloce e privato',
        'seo_description' => 'Converti PNG in JPG gratis online. Conversione in blocco, qualità regolabile e download in ZIP. Le immagini vengono convertite nel browser, mai caricate.',
        'content' => <<<'HTML'
<h2>Quando convertire PNG in JPG</h2>
<p>Screenshot e immagini esportate vengono spesso salvati in PNG, che può pesare diversi megabyte per una singola immagine di tipo fotografico. Convertirli in JPG riduce molto il peso: ideale per allegati email, moduli con limiti di dimensione, annunci di vendita online e condivisione sui social.</p>
<h2>Tieni il PNG quando conta</h2>
<p>Il PNG è migliore per loghi, icone, diagrammi e tutto ciò che richiede uno sfondo trasparente o un testo perfettamente nitido. Se ti serve un file leggero ma anche la trasparenza, usa PNG in WebP.</p>
<p>Vuoi un file ancora più leggero dopo la conversione? Passalo in Comprimi immagini o riducine le dimensioni con Ridimensiona immagini.</p>
HTML,
        'steps' => [
            'Trascina le immagini PNG nell’area indicata, fai clic per sfogliarle o incolla uno screenshot con Ctrl + V.',
            'Scegli la <strong>Qualità</strong> del JPG. Tra l’85 e il 92% foto e screenshot restano nitidi.',
            'Ogni PNG viene convertito in JPG all’istante. Le aree trasparenti diventano bianche, perché il JPG non supporta la trasparenza.',
            'Scarica le immagini una alla volta oppure fai clic su <strong>Scarica tutto</strong> per ottenere un ZIP.',
        ],
        'faq' => [
            ['q' => 'Perché convertire PNG in JPG?', 'a' => 'Foto e screenshot salvati in PNG pesano spesso molte volte di più della stessa immagine in JPG. Una volta convertiti sono più facili da inviare, caricare e condividere, e si aprono in qualsiasi programma.'],
            ['q' => 'Cosa succede agli sfondi trasparenti?', 'a' => 'Il JPG non può memorizzare la trasparenza, quindi le aree trasparenti vengono riempite di bianco. Per mantenere la trasparenza con un file comunque leggero, usa PNG in WebP.'],
            ['q' => 'Perderò qualità?', 'a' => 'Il JPG usa una compressione con perdita, ma con una qualità dell’85% o più la differenza sulle foto non si nota. Le grafiche con testo sottile possono apparire un po’ più morbide; per quelle conviene restare su PNG o WebP.'],
            ['q' => 'Le mie immagini vengono caricate online?', 'a' => 'No. La conversione avviene nel tuo browser e le immagini non lasciano mai il tuo dispositivo.'],
        ],
    ],

    'jpg-to-png' => [
        'slug' => 'jpg-in-png',
        'name' => 'JPG in PNG',
        'short_description' => 'Converti foto JPG in immagini PNG senza perdita.',
        'description' => 'Converti immagini JPG e JPEG in PNG perché non perdano altra qualità durante le modifiche successive. Converti in blocco e scarica tutti i file in un ZIP.',
        'seo_title' => 'Converti JPG in PNG online, gratis e senza perdita',
        'seo_description' => 'Converti JPG in PNG gratis online. Conversione in blocco e download in ZIP, tutto elaborato nel browser. Senza caricare file e senza registrazione.',
        'content' => <<<'HTML'
<h2>Perché usare il PNG?</h2>
<p>Il JPG perde un po’ di qualità ogni volta che viene modificato e salvato di nuovo. Il PNG è senza perdita, quindi convertire una foto in PNG prima di modificarla la protegge da ulteriore degrado. Molti strumenti di design, servizi di stampa e store di app richiedono inoltre file PNG.</p>
<h2>Cosa aspettarsi</h2>
<p>Il PNG di solito pesa più del JPG originale, perché le immagini senza perdita memorizzano ogni pixel con esattezza. La conversione non recupera i dettagli già persi con la compressione JPG, e lo sfondo resta uguale: le foto JPG non hanno trasparenza da mantenere.</p>
<p>Preferisci un file leggero per il web? Usa JPG in WebP o Comprimi immagini. Per tagliare prima una parte della foto, usa Ritaglia immagine.</p>
HTML,
        'steps' => [
            'Trascina le immagini JPG o JPEG nell’area indicata oppure fai clic per sfogliarle. Puoi convertirne molte alla volta.',
            'Ogni immagine viene convertita in PNG all’istante nel browser.',
            'Controlla il nuovo peso di ogni immagine.',
            'Scarica i file PNG singolarmente o tutti insieme in un ZIP.',
        ],
        'faq' => [
            ['q' => 'Perché convertire JPG in PNG?', 'a' => 'Il PNG è senza perdita, quindi l’immagine non perderà altra qualità quando la modificherai e la salverai di nuovo. Alcuni programmi, servizi di stampa e strumenti di design richiedono inoltre file PNG.'],
            ['q' => 'La conversione migliora la qualità?', 'a' => 'No. La conversione non può recuperare i dettagli eliminati dalla compressione JPG, ma evita ulteriori perdite nelle modifiche future.'],
            ['q' => 'Perché il file PNG pesa di più?', 'a' => 'Il PNG memorizza ogni pixel senza compressione con perdita, quindi le foto di solito pesano di più. Per il web, JPG o WebP sono scelte migliori per le foto.'],
            ['q' => 'Il PNG ha lo sfondo trasparente?', 'a' => 'Le immagini JPG non hanno trasparenza, quindi il PNG mantiene lo stesso sfondo pieno della foto originale.'],
            ['q' => 'Le mie immagini vengono caricate online?', 'a' => 'No. Tutto avviene sul tuo dispositivo.'],
        ],
    ],

    'webp-to-png' => [
        'slug' => 'webp-in-png',
        'name' => 'WebP in PNG',
        'short_description' => 'Converti immagini WebP in PNG mantenendo la trasparenza.',
        'description' => 'Converti immagini WebP in PNG per aprirle in qualsiasi editor o programma, mantenendo gli sfondi trasparenti. Converti in blocco e scarica tutto in un ZIP.',
        'seo_title' => 'Converti WebP in PNG con trasparenza, gratis',
        'seo_description' => 'Converti WebP in PNG gratis online. Mantiene la trasparenza, supporta la conversione in blocco e il download in ZIP. Le immagini restano sul tuo dispositivo.',
        'content' => <<<'HTML'
<h2>Perché le immagini WebP danno problemi</h2>
<p>I siti pubblicano le immagini in WebP perché i file sono leggeri e veloci. Ma quando ne salvi una, molti editor, programmi di presentazione, sistemi operativi meno recenti e moduli non riescono ad aprirla. Convertirla in PNG ti dà un file compatibile ovunque, senza perdere qualità.</p>
<h2>Il PNG mantiene la trasparenza</h2>
<p>Loghi, sticker e foto di prodotti salvati dal web hanno spesso uno sfondo trasparente. Il PNG lo conserva esattamente, a differenza del JPG. Se per le foto preferisci file più leggeri, usa WebP in JPG.</p>
<p>Vuoi fare il contrario per il tuo sito? Converti le immagini con PNG in WebP o JPG in WebP.</p>
HTML,
        'steps' => [
            'Trascina le immagini WebP nell’area indicata oppure fai clic per sfogliarle. La conversione in blocco è supportata.',
            'Ogni immagine viene convertita in PNG all’istante, mantenendo gli sfondi trasparenti.',
            'Controlla il peso di ogni file convertito.',
            'Scarica le immagini una alla volta oppure fai clic su <strong>Scarica tutto</strong> per ottenere un ZIP.',
        ],
        'faq' => [
            ['q' => 'Perché convertire WebP in PNG?', 'a' => 'Molti editor di immagini, strumenti di design, programmi di presentazione e moduli non accettano ancora WebP. Il PNG funziona ovunque e mantiene la piena qualità.'],
            ['q' => 'La trasparenza viene mantenuta?', 'a' => 'Sì. A differenza del JPG, il PNG supporta la trasparenza, quindi loghi, icone e sticker mantengono lo sfondo trasparente.'],
            ['q' => 'Meglio PNG o JPG?', 'a' => 'Scegli il PNG per grafiche, loghi, screenshot e tutto ciò che ha trasparenza. Per le foto in cui conta di più un file leggero, usa WebP in JPG.'],
            ['q' => 'Le mie immagini vengono caricate online?', 'a' => 'No. La conversione avviene interamente nel tuo browser.'],
        ],
    ],

    'svg-to-png' => [
        'slug' => 'svg-in-png',
        'name' => 'SVG in PNG',
        'short_description' => 'Converti grafiche vettoriali SVG in PNG a qualsiasi scala.',
        'description' => 'Converti icone, loghi e illustrazioni SVG in PNG a scala 1×, 2×, 4× o 8×, con sfondo trasparente o colorato. Conversione in blocco nel browser.',
        'seo_title' => 'Converti SVG in PNG ad alta risoluzione, gratis',
        'seo_description' => 'Converti SVG in PNG gratis online, fino a 8× di risoluzione, con sfondo trasparente o colorato. Conversione in blocco, senza caricare file.',
        'content' => <<<'HTML'
<h2>Quando ti serve un PNG invece di un SVG</h2>
<p>L’SVG è perfetto per loghi e icone sui siti web perché resta nitido a qualsiasi dimensione. Molti servizi però accettano solo immagini raster: profili social, firme email, slide di presentazioni, schede degli store di app e alcuni CMS. Convertirlo in PNG rende il tuo design vettoriale utilizzabile ovunque.</p>
<h2>Come scegliere la scala</h2>
<ul>
<li><strong>1×</strong>: la dimensione definita nell’SVG.</li>
<li><strong>2×</strong>: nitido sugli schermi ad alta risoluzione (Retina).</li>
<li><strong>4× o 8×</strong>: stampa, banner grandi o modifiche successive.</li>
</ul>
<p>Ti serve un file più leggero dopo? Usa Comprimi immagini o converti il risultato con PNG in WebP.</p>
HTML,
        'steps' => [
            'Trascina i file SVG nell’area indicata oppure fai clic per sfogliarli. Puoi convertirne diversi alla volta.',
            'Scegli la <strong>Scala</strong>. L’SVG è vettoriale, quindi 2× o 4× producono PNG nitidi per gli schermi ad alta risoluzione.',
            'Lascia lo sfondo trasparente oppure scegli un colore pieno.',
            'Scarica ogni PNG oppure fai clic su <strong>Scarica tutto</strong> per ottenere un ZIP.',
        ],
        'faq' => [
            ['q' => 'Che dimensioni avrà il PNG?', 'a' => 'Il PNG usa la dimensione definita nell’SVG (larghezza e altezza, o il suo viewBox) moltiplicata per la scala scelta. Un’icona 24×24 a 4× diventa di 96×96 pixel.'],
            ['q' => 'Lo sfondo trasparente viene mantenuto?', 'a' => 'Sì, per impostazione predefinita. Disattiva <strong>Sfondo trasparente</strong> per riempirlo con un colore.'],
            ['q' => 'Perché il mio SVG appare diverso?', 'a' => 'Gli SVG che caricano font o immagini esterne da altri siti non possono includerli nel PNG. Converti il testo in tracciati nel tuo strumento di design per un risultato esatto.'],
            ['q' => 'È sicuro convertire file SVG?', 'a' => 'Sì. Gli SVG vengono renderizzati come immagini nel browser, quindi gli eventuali script contenuti non vengono mai eseguiti, e i file non vengono mai caricati.'],
        ],
    ],
];
