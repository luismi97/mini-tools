<?php

/*
| Italian copy for batch 6: Credit Card Payoff, Loan Comparison, Organize PDF,
| Add Page Numbers to PDF. See content/it/tools.php.
*/

return [
    'credit-card-payoff-calculator' => [
        'slug' => 'calcolo-estinzione-carta-di-credito',
        'name' => 'Calcolo estinzione carta di credito',
        'short_description' => 'Scopri quanto tempo serve per estinguere la carta di credito e quanto costa.',
        'description' => 'Inserisci saldo e tasso della carta per sapere quando sarai senza debiti con una rata fissa, o quanto pagare per estinguerla entro una scadenza, rispetto alla sola rata minima.',
        'seo_title' => 'Calcolo estinzione carta di credito revolving',
        'seo_description' => 'Calcola gratis quanto tempo serve per estinguere la carta di credito, gli interessi totali e la rata necessaria, rispetto alla rata minima.',
        'content' => <<<'HTML'
<h2>Perché la rata minima ti tiene nei debiti</h2>
<p>Con le carte revolving la rata minima corrisponde spesso agli interessi del mese più una piccola percentuale del saldo. Quando il saldo scende, scende anche la rata minima, e la maggior parte di ogni pagamento continua ad andare agli interessi. Un saldo di qualche migliaio di euro può così durare molti anni e costare in interessi più degli acquisti originali. Una rata fissa, anche modesta, cambia completamente il risultato.</p>
<h2>Due modi per pianificare l’estinzione</h2>
<ul>
<li><strong>Pagare un importo fisso</strong>: inserisci quanto puoi pagare ogni mese e scopri la data in cui sarai senza debiti e gli interessi totali.</li>
<li><strong>Estinguerlo entro</strong> un numero di mesi: ottieni la rata mensile necessaria.</li>
</ul>
<p>Hai più carte e prestiti? Il Calcolo estinzione debiti confronta i metodi valanga e palla di neve su tutti i tuoi debiti. Pensi di consolidare con un prestito personale? Verifica la rata con il Calcolo rata prestito e confronta le offerte con il Confronto prestiti.</p>
HTML,
        'steps' => [
            'Inserisci il <strong>saldo della carta</strong> e il <strong>tasso annuo</strong> (li trovi nell’estratto conto).',
            'Scegli <strong>Pagare un importo fisso</strong> e inserisci la rata mensile, oppure <strong>Estinguerlo entro</strong> e scegli il numero di mesi.',
            'Controlla la data in cui sarai senza debiti, gli interessi totali e il confronto con la rata minima.',
            'Copia il link per salvare il piano o condividerlo.',
        ],
        'faq' => [
            ['q' => 'Quanto tempo serve per estinguere la mia carta di credito?', 'a' => 'Dipende da saldo, tasso e da quanto paghi ogni mese. Inseriscili qui sopra per vedere il numero esatto di mesi. Pagare solo la rata minima può allungare anche un debito piccolo per molti anni.'],
            ['q' => 'Come si calcolano gli interessi della carta?', 'a' => 'Gli interessi vengono addebitati ogni mese, circa il tasso annuo diviso 12, sul saldo. Ogni emittente ha le sue regole, quindi il risultato è una stima accurata e non una copia esatta dell’estratto conto.'],
            ['q' => 'Quanto devo pagare per estinguerla in 2 anni?', 'a' => 'Scegli <strong>Estinguerlo entro</strong> e inserisci 24 mesi. Il calcolatore mostra la rata mensile fissa che estingue il debito in quel tempo.'],
            ['q' => 'Perché con la rata minima ci vuole così tanto?', 'a' => 'La rata minima di solito è pari agli interessi più circa l’1% del saldo: scende insieme al saldo e la maggior parte di ogni pagamento va agli interessi. Puoi modificare queste regole in <strong>Condizioni della rata minima</strong>.'],
            ['q' => 'Sono inclusi i nuovi acquisti?', 'a' => 'No. La stima presuppone che tu smetta di usare la carta, che il tasso non cambi e che ogni pagamento sia puntuale.'],
        ],
    ],

    'loan-comparison-calculator' => [
        'slug' => 'confronto-prestiti',
        'name' => 'Confronto prestiti',
        'short_description' => 'Confronta fino a quattro offerte di prestito per rata, spese e costo totale.',
        'description' => 'Confronta le offerte di prestito fianco a fianco con tasso, durata e spese iniziali per trovare la più conveniente, la rata più bassa e il TAEG di ciascuna.',
        'seo_title' => 'Confronto prestiti: confronta le offerte gratis',
        'seo_description' => 'Confronta fino a 4 offerte di prestito: rata mensile, interessi, spese, costo totale e TAEG, per trovare il prestito più conveniente.',
        'content' => <<<'HTML'
<h2>Il tasso più basso non è sempre il prestito più conveniente</h2>
<p>Le banche pubblicizzano il TAN, ma le spese iniziali come istruttoria e incasso rata cambiano il costo reale. Un prestito al 6,9% con 800 € di spese può costare più di uno al 7,5% senza spese. Questo strumento somma interessi e spese nel costo totale del prestito e calcola il TAEG: il tasso che paghi davvero una volta incluse le spese.</p>
<h2>Rata mensile o costo totale</h2>
<p>Una durata più lunga abbassa la rata ma quasi sempre aumenta gli interessi totali. Le etichette indicano quale offerta ha la rata più bassa e quale è la più conveniente nel complesso, così puoi scegliere con consapevolezza tra margine nel bilancio e costo.</p>
<p>Scelta l’offerta, apri il Calcolo rata prestito per vedere il piano di ammortamento completo e l’effetto dei pagamenti extra. Per una casa o un’auto, il Calcolo mutuo e il Calcolo finanziamento auto includono tasse, assicurazione e permuta.</p>
HTML,
        'steps' => [
            'Inserisci ogni <strong>offerta di prestito</strong>: importo, tasso, durata e <strong>spese</strong> iniziali.',
            'Aggiungi fino a quattro offerte con <strong>Aggiungi un’altra offerta</strong>.',
            'Confronta rata mensile, interessi totali, costo totale del prestito e TAEG di ciascuna.',
            'Guarda le etichette <strong>La più conveniente</strong> e <strong>Rata più bassa</strong> per decidere.',
        ],
        'faq' => [
            ['q' => 'Come confronto due offerte di prestito?', 'a' => 'Confronta il costo totale del prestito (interessi più spese), non solo il tasso o la rata. Inserisci entrambe le offerte qui: la più conveniente viene evidenziata.'],
            ['q' => 'Che cos’è il TAEG?', 'a' => 'È il tasso annuo che include le spese iniziali oltre agli interessi. Poiché le spese riducono la somma che ricevi davvero, il TAEG è più alto del TAN quando il prestito prevede spese.'],
            ['q' => 'Una rata più bassa è meglio?', 'a' => 'Non sempre. Una durata più lunga riduce la rata ma di solito aumenta gli interessi totali. Scegli la rata più bassa solo se ti serve quel margine nel bilancio.'],
            ['q' => 'Quali spese devo inserire?', 'a' => 'Inserisci ciò che paghi per ottenere il prestito, come spese di istruttoria, perizia o intermediazione. Non includere assicurazioni facoltative né penali per ritardo.'],
            ['q' => 'I miei dati vengono salvati?', 'a' => 'No. Tutto viene calcolato nel tuo browser e nulla viene inviato ai nostri server.'],
        ],
    ],

    'organize-pdf' => [
        'slug' => 'organizza-pdf',
        'name' => 'Organizza PDF',
        'short_description' => 'Riordina, ruota e rimuovi le pagine di un PDF trascinandole.',
        'description' => 'Visualizza tutte le pagine del PDF, trascinale in un nuovo ordine, ruota quelle storte, rimuovi quelle inutili e scarica il file organizzato.',
        'seo_title' => 'Organizza PDF: riordina le pagine online gratis',
        'seo_description' => 'Riordina le pagine di un PDF gratis: trascinale, ruota o rimuovi pagine e scarica il PDF. Il file viene elaborato nel tuo browser.',
        'content' => <<<'HTML'
<h2>Ogni pagina al suo posto</h2>
<p>I documenti scansionati spesso escono in disordine, una relazione deve spostare un allegato in fondo e un file unito ha bisogno della copertina all’inizio. Questo strumento mostra un’anteprima di ogni pagina: trascinale nell’ordine che vuoi, ruota quelle scansionate di lato e rimuovi le pagine bianche o doppie, tutto in un solo passaggio.</p>
<h2>Privato per scelta</h2>
<p>Il PDF viene aperto e ricostruito interamente nel tuo browser. Non viene caricato nulla, quindi è sicuro anche per contratti, estratti conto e referti medici.</p>
<p>Per combinare prima più file, usa Unisci PDF. Per estrarre alcune pagine in un altro documento, usa Dividi PDF. Se devi solo correggere l’orientamento, Ruota PDF è la via più rapida, e Numera pagine PDF numera il documento finale.</p>
HTML,
        'steps' => [
            'Trascina un PDF nel riquadro o fai clic per sceglierlo. Compare un’anteprima di ogni pagina.',
            'Trascina le pagine nell’ordine che vuoi o usa le frecce sotto ogni pagina.',
            'Fai clic su una pagina per ruotarla o sull’icona del cestino per rimuoverla.',
            'Fai clic su <strong>Scarica PDF organizzato</strong> per salvare il nuovo file.',
        ],
        'faq' => [
            ['q' => 'Come cambio l’ordine delle pagine di un PDF?', 'a' => 'Apri il PDF qui e trascina ogni pagina nella nuova posizione. Su smartphone usa le frecce sotto ogni pagina. Poi scarica il file organizzato.'],
            ['q' => 'Posso ruotare e rimuovere pagine contemporaneamente?', 'a' => 'Sì. Un clic su una pagina la ruota di 90 gradi e il cestino la segna per la rimozione, così correggi tutto in una volta.'],
            ['q' => 'Posso annullare le modifiche?', 'a' => 'Usa <strong>Ordine originale</strong> per tornare all’ordine iniziale. Il file originale non viene mai modificato: lo strumento scarica una nuova copia.'],
            ['q' => 'Il mio PDF viene caricato online?', 'a' => 'No. Le pagine vengono mostrate e ricostruite nel tuo browser, quindi il documento non lascia mai il tuo dispositivo.'],
            ['q' => 'Posso organizzare pagine di più PDF?', 'a' => 'Combina prima i file con Unisci PDF, poi apri qui il file unito per ordinarne le pagine.'],
        ],
    ],

    'add-page-numbers-to-pdf' => [
        'slug' => 'numera-pagine-pdf',
        'name' => 'Numera pagine PDF',
        'short_description' => 'Numera le pagine di un PDF nella posizione e nello stile che preferisci.',
        'description' => 'Aggiungi i numeri di pagina a un PDF in un angolo o al centro, come «1», «1 / 10» o «Pagina 1 di 10», salta la copertina e scegli il primo numero. Funziona nel browser.',
        'seo_title' => 'Numera pagine PDF gratis e in privato',
        'seo_description' => 'Aggiungi i numeri di pagina a un PDF gratis: scegli posizione, formato e numero iniziale, salta la copertina. Il file resta sul tuo dispositivo.',
        'content' => <<<'HTML'
<h2>Quando i numeri di pagina contano</h2>
<p>Relazioni, tesi, contratti, manuali e dispense stampate sono molto più facili da rivedere e discutere quando ogni pagina è numerata. I numeri proteggono anche i documenti stampati: una pagina mancante o fuori posto si nota subito. Molti PDF creati da scanner, smartphone o programmi di presentazione non hanno alcun numero di pagina.</p>
<h2>Scegli lo stile</h2>
<ul>
<li>Metti il numero in un angolo qualsiasi o al centro, in alto o in basso.</li>
<li>Usa un numero semplice, «1 / 10», «Pagina 1» o «Pagina 1 di 10».</li>
<li>Salta la copertina iniziando dalla pagina 2 e scegli il primo numero per continuare una serie.</li>
</ul>
<p>Stai preparando il documento? Unisci PDF combina i file, Organizza PDF corregge l’ordine delle pagine ed Elimina pagine PDF rimuove quelle che non ti servono.</p>
HTML,
        'steps' => [
            'Trascina un PDF nel riquadro o fai clic per sceglierlo.',
            'Scegli la <strong>posizione</strong> e il <strong>formato</strong> dei numeri. L’anteprima mostra il risultato.',
            'Per saltare la copertina, inizia a numerare dalla pagina 2. Cambia il primo numero se serve.',
            'Fai clic su <strong>Aggiungi numeri di pagina</strong> per scaricare il PDF numerato.',
        ],
        'faq' => [
            ['q' => 'Come aggiungo i numeri di pagina a un PDF?', 'a' => 'Apri il PDF qui, scegli dove mettere i numeri e il formato, poi fai clic su <strong>Aggiungi numeri di pagina</strong>. La copia numerata si scarica in pochi secondi.'],
            ['q' => 'Posso saltare la prima pagina?', 'a' => 'Sì. In <strong>Inizia a numerare dalla pagina</strong> inserisci 2 e la copertina resta senza numero. Lascia il primo numero a 1 se la seconda pagina deve avere il numero 1.'],
            ['q' => 'Quali formati sono disponibili?', 'a' => 'Un numero semplice, «1 / 10», «Pagina 1» e «Pagina 1 di 10», in dimensione piccola, media o grande, in un angolo o al centro.'],
            ['q' => 'E le pagine orizzontali o ruotate?', 'a' => 'I numeri vengono posizionati in base a come viene visualizzata ogni pagina, quindi appaiono dritti anche sulle pagine orizzontali o ruotate.'],
            ['q' => 'Il mio PDF viene caricato online?', 'a' => 'No. I numeri vengono aggiunti nel tuo browser e il file non lascia mai il tuo dispositivo.'],
        ],
    ],
];
