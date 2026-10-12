<?php

/*
| Italian copy for the calculators. See content/it/tools.php.
*/

return [
    'percentage-calculator' => [
        'slug' => 'calcolo-percentuale',
        'name' => 'Calcolo percentuale',
        'short_description' => 'Calcola percentuali, variazioni percentuali e aumenti all’istante.',
        'description' => 'Calcola l’X% di un numero, che percentuale è un numero rispetto a un altro, l’aumento o la diminuzione percentuale tra due valori, e aggiungi o togli una percentuale, tutto in un unico posto.',
        'seo_title' => 'Calcolo percentuale: % di, variazione e aumento',
        'seo_description' => 'Calcolo percentuale gratis. Calcola l’X% di Y, che percentuale è X di Y, aumenti o diminuzioni percentuali, e aggiungi o togli percentuali all’istante.',
        'content' => <<<'HTML'
<h2>Formule delle percentuali</h2>
<ul>
<li><strong>X% di Y</strong> = Y × X / 100</li>
<li><strong>Che percentuale è X di Y</strong> = X / Y × 100</li>
<li><strong>Variazione percentuale</strong> = (nuovo − vecchio) / vecchio × 100</li>
<li><strong>Aumentare Y del X%</strong> = Y × (1 + X / 100)</li>
</ul>
<h2>Esempi di tutti i giorni</h2>
<p>Calcola uno sconto del 25% su un prezzo, l’IVA di un acquisto, di quanto è aumentato il tuo stipendio, che parte di un budget hai già speso o la percentuale di risposte corrette in un test. Punti percentuali e percentuali non sono la stessa cosa: un tasso che passa dal 10% al 12% sale di 2 punti percentuali, cioè un aumento del 20%.</p>
<p>Per i soldi nel tempo usa Calcolo interesse composto o Calcolo rata prestito. Per dividere il conto al ristorante prova Calcolo mancia.</p>
HTML,
        'steps' => [
            'Scegli il calcolo che corrisponde alla tua domanda: ognuno risolve un tipo diverso di problema con le percentuali.',
            'Inserisci i numeri. I risultati si aggiornano all’istante, senza bisogno di premere pulsanti.',
            'Usa <strong>Variazione percentuale</strong> per confrontare un valore vecchio con uno nuovo, come prezzi o stipendi.',
            'Usa <strong>Aggiungi o togli una percentuale</strong> per sconti, tasse o aumenti di prezzo.',
        ],
        'faq' => [
            ['q' => 'Come calcolo la percentuale di un numero?', 'a' => 'Moltiplica il numero per la percentuale e dividi per 100. Ad esempio, il 15% di 200 è 200 × 15 / 100 = 30.'],
            ['q' => 'Come capisco che percentuale è un numero di un altro?', 'a' => 'Dividi la parte per il totale e moltiplica per 100. Ad esempio, 30 è (30 / 200) × 100 = 15% di 200.'],
            ['q' => 'Come si calcola un aumento percentuale?', 'a' => 'Sottrai il valore vecchio da quello nuovo, dividi per il valore vecchio e moltiplica per 100. Passare da 80 a 100 è un aumento di (100 − 80) / 80 × 100 = 25%.'],
            ['q' => 'Come calcolo uno sconto?', 'a' => 'Usa Aggiungi o togli una percentuale e scegli Diminuisci. Uno sconto del 20% su 50 è 50 × (1 − 0,20) = 40.'],
            ['q' => 'Perché un aumento del 50% seguito da un calo del 50% non riporta al valore iniziale?', 'a' => 'Perché ogni percentuale si calcola su una base diversa. 100 + 50% = 150, ma 150 − 50% = 75.'],
        ],
    ],

    'loan-calculator' => [
        'slug' => 'calcolo-rata-prestito',
        'name' => 'Calcolo rata prestito',
        'short_description' => 'Calcola la rata del prestito, gli interessi totali e il piano di ammortamento.',
        'description' => 'Inserisci importo, tasso di interesse e durata per calcolare la rata mensile, ogni due settimane o settimanale, oltre agli interessi totali e a un piano di ammortamento completo.',
        'seo_title' => 'Calcolo rata prestito e piano di ammortamento',
        'seo_description' => 'Calcolo della rata del prestito gratis con pagamenti mensili, ogni 2 settimane o settimanali. Guarda interessi, totale pagato e piano di ammortamento completo.',
        'content' => <<<'HTML'
<h2>Come funzionano le rate di un prestito</h2>
<p>In un prestito con ammortamento alla francese tutte le rate hanno lo stesso importo, ma la loro composizione cambia nel tempo. Le prime rate sono quasi solo interessi; le ultime quasi solo capitale. Il piano di ammortamento mostra esattamente quanta parte di ogni pagamento va in interessi e con che velocità scende il debito residuo.</p>
<h2>Come pagare meno interessi</h2>
<ul>
<li><strong>Durata più breve:</strong> rate più alte, ma molti meno interessi in totale.</li>
<li><strong>Tasso più basso:</strong> anche l’1% in meno può far risparmiare migliaia di euro su un prestito lungo.</li>
<li><strong>Pagamenti ogni due settimane:</strong> 26 mezze rate all’anno riducono un po’ gli interessi.</li>
<li><strong>Rimborsi anticipati:</strong> ciò che paghi in più riduce direttamente il capitale.</li>
</ul>
<p>Vuoi risparmiare invece di chiedere un prestito? Guarda come crescono i tuoi soldi con Calcolo interesse composto.</p>
HTML,
        'steps' => [
            'Inserisci l’<strong>importo del prestito</strong> che vuoi chiedere.',
            'Inserisci il <strong>tasso di interesse annuo</strong> (TAEG) proposto dall’istituto.',
            'Imposta la <strong>durata</strong> in anni o mesi e scegli la frequenza dei pagamenti: mensile, ogni due settimane o settimanale.',
            'Controlla la rata, gli interessi totali e il costo complessivo, ed esplora il <strong>piano di ammortamento</strong> per anno o per rata. Puoi esportarlo in CSV.',
        ],
        'faq' => [
            ['q' => 'Come si calcola la rata del prestito?', 'a' => 'Il calcolatore usa la formula di ammortamento standard: <code>P = L × r / (1 − (1 + r)<sup>−n</sup>)</code>, dove L è l’importo del prestito, r il tasso di interesse per periodo di pagamento e n il numero totale di pagamenti.'],
            ['q' => 'Pagare ogni due settimane fa risparmiare?', 'a' => 'Pagare ogni due settimane significa 26 pagamenti all’anno. Poiché gli interessi si calcolano più spesso su un debito leggermente inferiore, in genere paghi un po’ meno interessi in totale. Confronta i totali cambiando la frequenza di pagamento.'],
            ['q' => 'Che cos’è un piano di ammortamento?', 'a' => 'È una tabella con tutti i pagamenti per l’intera durata del prestito, ognuno diviso tra quota interessi e quota capitale, insieme al debito residuo dopo ogni pagamento.'],
            ['q' => 'Include tasse, assicurazioni o spese?', 'a' => 'No. I risultati coprono solo capitale e interessi. Mutui e finanziamenti auto possono includere anche assicurazioni, spese di istruttoria e altri costi stabiliti dall’istituto.'],
            ['q' => 'I miei dati vengono salvati?', 'a' => 'No. Tutti i calcoli avvengono nel tuo browser e nulla di ciò che inserisci viene inviato ai nostri server.'],
        ],
    ],

    'compound-interest-calculator' => [
        'slug' => 'calcolo-interesse-composto',
        'name' => 'Calcolo interesse composto',
        'short_description' => 'Guarda come crescono i tuoi risparmi con l’interesse composto e i versamenti.',
        'description' => 'Calcola il valore futuro di un investimento con qualsiasi frequenza di capitalizzazione e versamenti mensili o annuali, con una tabella di crescita anno per anno.',
        'seo_title' => 'Calcolo interesse composto con versamenti',
        'seo_description' => 'Calcolo dell’interesse composto gratis. Aggiungi versamenti mensili o annuali, scegli la capitalizzazione e guarda crescere il tuo saldo anno dopo anno.',
        'content' => <<<'HTML'
<h2>La forza dell’interesse composto</h2>
<p>Con l’interesse composto guadagni rendimenti sui rendimenti. Su periodi lunghi la curva di crescita diventa sempre più ripida: negli ultimi anni gli interessi maturati possono superare tutto ciò che hai versato. Per questo iniziare presto, anche con piccole somme, conta più che investire grandi cifre più avanti.</p>
<h2>La regola del 72</h2>
<p>Un modo rapido per stimare in quanto tempo il denaro raddoppia: dividi 72 per il tasso di interesse annuo. Al 6% il denaro raddoppia in circa 12 anni; al 9% in circa 8 anni.</p>
<h2>Cosa influenza i risultati</h2>
<ul>
<li>Il tasso di interesse o il rendimento atteso.</li>
<li>Per quanto tempo resti investito.</li>
<li>Quanto versi e con quale frequenza.</li>
<li>Commissioni, tasse e inflazione, che riducono il rendimento reale.</li>
</ul>
<p>Stai per chiedere un prestito? Calcolo rata prestito mostra come gli interessi giocano contro di te.</p>
HTML,
        'steps' => [
            'Inserisci il <strong>capitale iniziale</strong> e il <strong>tasso di interesse annuo</strong> atteso.',
            'Imposta per quanti <strong>anni</strong> vuoi investire e ogni quanto vengono capitalizzati gli interessi.',
            'Aggiungi un <strong>versamento</strong> periodico — mensile o annuale — oppure lascialo a 0.',
            'Controlla il valore futuro, quanto deriva dai versamenti e quanto dagli interessi, e la tabella anno per anno. Se vuoi, esportala in CSV.',
        ],
        'faq' => [
            ['q' => 'Che cos’è l’interesse composto?', 'a' => 'È l’interesse che maturi sia sul capitale iniziale sia sugli interessi già maturati. Su periodi lunghi fa crescere i risparmi in modo esponenziale, ed è per questo che iniziare presto conta tanto.'],
            ['q' => 'Qual è la formula dell’interesse composto?', 'a' => 'Senza versamenti: <code>A = P (1 + r/n)<sup>nt</sup></code>, dove P è il capitale, r il tasso annuo, n il numero di capitalizzazioni all’anno e t il numero di anni. Con versamenti periodici si somma il valore futuro di ogni versamento.'],
            ['q' => 'La frequenza di capitalizzazione fa molta differenza?', 'a' => 'Capitalizzare più spesso rende un po’ di più, ma l’effetto è piccolo rispetto al tasso di interesse, alla durata dell’investimento e a quanto versi.'],
            ['q' => 'Quando vengono aggiunti i versamenti?', 'a' => 'I versamenti vengono aggiunti alla fine di ogni mese (o anno), dopo l’applicazione degli interessi del periodo.'],
            ['q' => 'È una consulenza finanziaria?', 'a' => 'No. I risultati sono stime che presuppongono un rendimento costante. Gli investimenti reali oscillano, e tasse e commissioni non sono incluse.'],
        ],
    ],

    'age-calculator' => [
        'slug' => 'calcolo-eta',
        'name' => 'Calcolo età',
        'short_description' => 'Calcola l’età esatta in anni, mesi e giorni dalla data di nascita.',
        'description' => 'Inserisci una data di nascita per ottenere l’età esatta in anni, mesi e giorni, oltre al totale di mesi, settimane e giorni vissuti e al conto alla rovescia per il prossimo compleanno.',
        'seo_title' => 'Calcolo età esatta in anni, mesi e giorni',
        'seo_description' => 'Calcolo dell’età gratis. Scopri la tua età esatta in anni, mesi e giorni, quanti giorni hai vissuto e quanto manca al prossimo compleanno.',
        'content' => <<<'HTML'
<h2>Come si calcola l’età esatta</h2>
<p>L’età esatta conta prima gli anni di calendario completi, poi i mesi completi e infine i giorni rimanenti. Poiché i mesi hanno durate diverse, dividere il numero di giorni per 365 dà risultati leggermente sbagliati; questo calcolatore segue il calendario.</p>
<h2>A cosa serve un calcolo dell’età</h2>
<ul>
<li>Verificare requisiti di età per scuola, sport, assicurazioni o pensione.</li>
<li>Compilare moduli che chiedono l’età in anni e mesi.</li>
<li>Conoscere il tempo tra due date qualsiasi, come un anniversario o la durata di un progetto.</li>
<li>Seguire il conto alla rovescia per il prossimo compleanno.</li>
</ul>
<p>Per aggiungere o togliere giorni a una data, o contare i giorni lavorativi tra due date, usa Calcolo date.</p>
HTML,
        'steps' => [
            'Inserisci la <strong>data di nascita</strong>.',
            'Lascia <strong>Età al</strong> sulla data di oggi, oppure scegli un’altra data per conoscere l’età in un momento preciso del passato o del futuro.',
            'Guarda l’età esatta in anni, mesi e giorni, oltre al totale di mesi, settimane, giorni e ore vissuti.',
            'Controlla il conto alla rovescia per il prossimo compleanno e in che giorno della settimana cadrà.',
        ],
        'faq' => [
            ['q' => 'Come si calcola l’età esatta?', 'a' => 'Il calcolatore conta prima gli anni completi, poi i mesi completi e infine i giorni rimanenti, seguendo il calendario. I mesi più corti vengono gestiti correttamente.'],
            ['q' => 'E chi è nato il 29 febbraio?', 'a' => 'Negli anni senza 29 febbraio, il compleanno viene contato il 28 febbraio.'],
            ['q' => 'Posso calcolare il tempo tra due date qualsiasi?', 'a' => 'Sì. Usa la data di nascita come data iniziale ed Età al come data finale. Il risultato mostra anni, mesi e giorni esatti tra le due.'],
            ['q' => 'La mia data di nascita viene salvata?', 'a' => 'No. Il calcolo avviene nel tuo browser e nulla viene inviato ai nostri server.'],
        ],
    ],

    'tip-calculator' => [
        'slug' => 'calcolo-mancia',
        'name' => 'Calcolo mancia',
        'short_description' => 'Calcola la mancia e dividi il conto tra più persone.',
        'description' => 'Inserisci l’importo del conto, scegli la percentuale di mancia e il numero di persone per vedere mancia, totale e quota di ciascuno, con l’opzione di arrotondare per eccesso.',
        'seo_title' => 'Calcolo mancia: calcola e dividi il conto',
        'seo_description' => 'Calcolo della mancia gratis. Scegli la percentuale, dividi il conto tra quante persone vuoi e arrotonda a persona. Veloce e comodo dallo smartphone.',
        'content' => <<<'HTML'
<h2>Guida alle mance</h2>
<ul>
<li><strong>Italia:</strong> la mancia non è obbligatoria e il conto include spesso coperto o servizio; lasciare qualche euro o arrotondare per un buon servizio è un gesto apprezzato.</li>
<li><strong>Svizzera:</strong> il servizio è compreso nel prezzo; arrotondare è una cortesia.</li>
<li><strong>Stati Uniti:</strong> 15–20% per il servizio al tavolo, e il 20% o più per un servizio eccellente.</li>
<li><strong>Consegne e taxi:</strong> di solito basta arrotondare o lasciare il 10%.</li>
</ul>
<p>Le abitudini cambiano molto da paese a paese. In molti posti il conto include già un costo di servizio: controllalo prima di aggiungere la mancia.</p>
<h2>Come dividere il conto in modo equo</h2>
<p>Quando tutti hanno ordinato importi simili, dividere in parti uguali è la soluzione più semplice. Se le ordinazioni sono molto diverse, ognuno può calcolare la propria quota più la mancia. Arrotondare per eccesso a persona evita di cercare le monete e lascia una mancia un po’ più generosa.</p>
<p>Per altri calcoli di tutti i giorni prova Calcolo percentuale.</p>
HTML,
        'steps' => [
            'Inserisci l’importo del conto (con o senza tasse, come preferisci).',
            'Scegli la percentuale di mancia con i pulsanti rapidi o inseriscine una personalizzata.',
            'Indica quante persone dividono il conto.',
            'Guarda mancia, totale e quota di ciascuno. Attiva <strong>Arrotonda</strong> per avere un importo tondo a persona.',
        ],
        'faq' => [
            ['q' => 'Quanta mancia devo lasciare?', 'a' => 'In Italia la mancia è facoltativa: di solito si arrotonda o si lascia qualche euro per un buon servizio. In Svizzera il servizio è compreso, mentre negli Stati Uniti lo standard è il 15–20%. In molti posti il conto include già un costo di servizio.'],
            ['q' => 'La mancia si calcola prima o dopo le tasse?', 'a' => 'In Italia i prezzi includono già l’IVA, quindi si calcola semplicemente sul totale. Dove le tasse sono separate, calcolarla sull’importo netto è comune; sul totale è un po’ più generoso.'],
            ['q' => 'Come viene diviso il conto?', 'a' => 'La mancia viene sommata al conto e il totale diviso in parti uguali tra le persone. Con Arrotonda attivo, ogni quota viene arrotondata all’unità superiore e la differenza va alla mancia.'],
            ['q' => 'Come calcolo velocemente una mancia del 10%?', 'a' => 'Sposta la virgola di una posizione a sinistra. Su un conto di 85 €, il 10% è 8,50 €; per il 15% aggiungi la metà: 8,50 + 4,25 = 12,75 €.'],
        ],
    ],

    'salary-calculator' => [
        'slug' => 'calcolo-stipendio',
        'name' => 'Calcolo stipendio',
        'short_description' => 'Converti lo stipendio tra paga oraria, settimanale, mensile e annuale.',
        'description' => 'Converti una retribuzione tra importi orari, giornalieri, settimanali, ogni due settimane, due volte al mese, mensili e annuali in base alle tue ore e settimane di lavoro.',
        'seo_title' => 'Calcolo stipendio: da paga oraria ad annuale',
        'seo_description' => 'Calcolo dello stipendio gratis. Converti la paga oraria in stipendio annuo e viceversa, con importi giornalieri, settimanali e mensili in base all’orario.',
        'content' => <<<'HTML'
<h2>Come confrontare le offerte di lavoro</h2>
<p>Le offerte sono espresse in modi diversi: una paga oraria per un lavoro e una RAL annua per un altro. Convertirle sullo stesso periodo rende il confronto equo. Ricorda di considerare ferie pagate, straordinari, bonus e benefit come assicurazione sanitaria o previdenza integrativa, che possono valere molto all’anno.</p>
<h2>Conversioni rapide (40 ore settimanali)</h2>
<ul>
<li>20 all’ora ≈ 41.600 all’anno</li>
<li>25 all’ora ≈ 52.000 all’anno</li>
<li>30 all’ora ≈ 62.400 all’anno</li>
<li>50.000 all’anno ≈ 24,04 all’ora</li>
</ul>
<p>In Italia lo stipendio annuo è spesso diviso in 13 o 14 mensilità: per confrontarlo con un importo mensile, dividi la RAL per il numero di mensilità. Vuoi risparmiare una parte dello stipendio? Guarda come crescono i tuoi risparmi con Calcolo interesse composto.</p>
HTML,
        'steps' => [
            'Inserisci la tua retribuzione e scegli cosa rappresenta: oraria, giornaliera, settimanale, ogni due settimane, due volte al mese, mensile o annuale.',
            'Regola l’orario: ore a settimana, giorni a settimana e settimane pagate all’anno.',
            'Guarda la tua retribuzione convertita all’istante in tutti gli altri periodi.',
            'Usalo per confrontare offerte di lavoro, paghe orarie e stipendi annui alla pari.',
        ],
        'faq' => [
            ['q' => 'Come converto una paga oraria in stipendio annuo?', 'a' => 'Moltiplica la paga oraria per le ore lavorate a settimana e per le settimane lavorate all’anno. Con 40 ore e 52 settimane, 25 all’ora fanno 25 × 40 × 52 = 52.000 all’anno.'],
            ['q' => 'Come converto uno stipendio annuo in paga oraria?', 'a' => 'Dividi lo stipendio annuo per le ore a settimana moltiplicate per le settimane all’anno. 60.000 con 40 ore e 52 settimane danno 60.000 / 2.080 ≈ 28,85 all’ora.'],
            ['q' => 'Che differenza c’è tra ogni due settimane e due volte al mese?', 'a' => 'Ogni due settimane significa 26 pagamenti all’anno. Due volte al mese significa 24 pagamenti all’anno, quindi ciascuno di questi pagamenti è un po’ più alto.'],
            ['q' => 'Include le tasse?', 'a' => 'No. I risultati sono importi lordi, prima di tasse e contributi, che variano in base al paese e alla situazione personale.'],
            ['q' => 'Devo contare le settimane di ferie?', 'a' => 'Se le ferie sono pagate (per esempio con uno stipendio fisso), lascia 52 settimane. Se i giorni liberi non sono retribuiti, come per molti lavoratori autonomi, riduci le settimane pagate all’anno.'],
        ],
    ],

    'auto-loan-calculator' => [
        'slug' => 'calcolo-finanziamento-auto',
        'name' => 'Calcolo finanziamento auto',
        'short_description' => 'Calcola la rata dell’auto con permuta, imposte e spese.',
        'description' => 'Calcola la rata mensile dell’auto includendo anticipo, permuta del vecchio veicolo, imposta sulle vendite e spese del concessionario, e confronta durate da 36 a 84 mesi.',
        'seo_title' => 'Calcolo finanziamento auto con permuta e imposte',
        'seo_description' => 'Calcolo del finanziamento auto gratis con permuta, imposte e spese. Guarda la rata e confronta gli interessi su durate da 36 a 84 mesi.',
        'content' => <<<'HTML'
<h2>Cosa entra in un finanziamento auto</h2>
<p>L’importo finanziato è il prezzo del veicolo più imposte e spese del concessionario, meno l’anticipo e il valore netto dell’auto che dai in permuta. Spese di pratica, immatricolazione e messa su strada si sommano in fretta: includerle ti dà una rata mensile realistica prima di parlare con il venditore.</p>
<h2>Consigli per pagare meno</h2>
<ul>
<li>Chiedi un’offerta di prestito alla tua banca per confrontarla con il finanziamento del concessionario.</li>
<li>Versa almeno il 10–20% di anticipo per non dovere più di quanto vale l’auto.</li>
<li>Scegli la durata più breve che puoi permetterti: la tabella di confronto mostra gli interessi risparmiati.</li>
<li>Tratta il prezzo dell’auto separatamente dalla permuta e dal finanziamento.</li>
</ul>
<p>Per altri prestiti usa Calcolo rata prestito; per una casa, Calcolo mutuo.</p>
HTML,
        'steps' => [
            'Inserisci il <strong>prezzo del veicolo</strong>, il tuo <strong>anticipo</strong> e, se c’è, il <strong>valore della permuta</strong> e quanto devi ancora pagare su di essa.',
            'Aggiungi l’aliquota dell’<strong>imposta sulle vendite</strong> e le <strong>spese</strong> del concessionario (pratica, immatricolazione e messa su strada).',
            'Inserisci il <strong>tasso di interesse (TAEG)</strong> e scegli la durata del finanziamento.',
            'Confronta la rata mensile e gli interessi totali per durate da 36 a 84 mesi.',
        ],
        'faq' => [
            ['q' => 'Come si calcola la rata di un finanziamento auto?', 'a' => 'L’importo finanziato è il prezzo più imposte e spese, meno l’anticipo e il valore netto della permuta. La rata mensile segue poi la formula di ammortamento standard in base al tasso e alla durata.'],
            ['q' => 'L’imposta si applica anche sull’auto in permuta?', 'a' => 'In molti luoghi (come la maggior parte degli stati USA) l’imposta si applica solo al prezzo meno il valore della permuta, il che fa risparmiare. Dove si tassa il prezzo pieno — come con l’IVA in Europa — disattiva l’opzione.'],
            ['q' => 'E se devo più di quanto vale l’auto in permuta?', 'a' => 'Si parla di patrimonio netto negativo. La differenza viene aggiunta al nuovo finanziamento, aumentando l’importo finanziato e gli interessi pagati.'],
            ['q' => 'Conviene una durata più lunga?', 'a' => 'I finanziamenti a 72 o 84 mesi abbassano la rata, ma costano molto di più in interessi e potresti dovere più di quanto vale l’auto per anni. Confronta le durate nella tabella sotto i risultati.'],
            ['q' => 'I risultati sono esatti?', 'a' => 'Sono stime. Tasso, spese e imposte del tuo istituto determinano i valori definitivi.'],
        ],
    ],

    'mortgage-calculator' => [
        'slug' => 'calcolo-mutuo',
        'name' => 'Calcolo mutuo',
        'short_description' => 'Calcola la rata mensile del mutuo con imposte, assicurazione e PMI.',
        'description' => 'Calcola la rata mensile completa del mutuo — capitale, interessi, imposte sulla casa, assicurazione, PMI e spese condominiali — oltre agli interessi totali e a un piano di ammortamento annuale.',
        'seo_title' => 'Calcolo mutuo con imposte e assicurazione',
        'seo_description' => 'Calcolo del mutuo gratis con imposte sulla casa, assicurazione, PMI e spese condominiali. Guarda la rata mensile, gli interessi e l’ammortamento annuale.',
        'content' => <<<'HTML'
<h2>Capire la rata del mutuo</h2>
<p>Il costo mensile non è fatto solo di capitale e interessi. Ci sono anche le imposte sulla casa e l’assicurazione dell’immobile, e negli Stati Uniti i mutui convenzionali con meno del 20% di anticipo aggiungono un’assicurazione ipotecaria privata (PMI). I condomini prevedono inoltre spese condominiali. Includere tutto mostra quanto pagherai davvero ogni mese.</p>
<h2>Come abbassare la rata</h2>
<ul>
<li><strong>Versa un anticipo del 20%</strong> per evitare del tutto la PMI.</li>
<li><strong>Migliora il tuo merito creditizio</strong> prima di chiedere il mutuo: incide direttamente sul tasso.</li>
<li><strong>Confronta le banche</strong>: anche uno 0,25% in meno fa risparmiare migliaia di euro in 30 anni.</li>
<li><strong>Valuta una durata di 15 anni</strong> se il budget lo consente: molti meno interessi in totale.</li>
</ul>
<p>Per altri prestiti, come quelli auto o personali, usa Calcolo rata prestito. Per vedere come potrebbero crescere i tuoi risparmi, prova Calcolo interesse composto.</p>
HTML,
        'steps' => [
            'Inserisci il <strong>prezzo dell’immobile</strong> e il tuo <strong>anticipo</strong>, in percentuale o in importo.',
            'Scegli la <strong>durata</strong> e inserisci il <strong>tasso di interesse</strong> proposto.',
            'Aggiungi <strong>imposte sulla casa</strong>, <strong>assicurazione</strong>, <strong>PMI</strong> e <strong>spese condominiali</strong> per vedere il costo mensile reale.',
            'Controlla la composizione mensile, gli interessi totali e il piano di ammortamento anno per anno.',
        ],
        'faq' => [
            ['q' => 'Cosa comprende la rata mensile di un mutuo?', 'a' => 'La maggior parte delle rate comprende capitale e interessi, e spesso anche imposte e assicurazione. Negli Stati Uniti, con meno del 20% di anticipo di solito si paga la PMI, e i condomini possono aggiungere spese condominiali.'],
            ['q' => 'Cos’è la PMI e quando smette di essere pagata?', 'a' => 'L’assicurazione ipotecaria privata (PMI) tutela il finanziatore quando versi meno del 20% di anticipo su un mutuo convenzionale USA. Costa circa lo 0,3–1,5% del prestito all’anno e si cancella automaticamente quando il debito residuo arriva al 78% del valore originale dell’immobile. Il calcolatore stima per quanti mesi la pagherai.'],
            ['q' => 'Meglio un mutuo a 15 o a 30 anni?', 'a' => 'A 15 anni le rate sono più alte, ma il tasso è più basso e gli interessi totali calano molto. A 30 anni le rate sono più basse e flessibili. Confronta entrambi cambiando la durata.'],
            ['q' => 'Che casa posso permettermi?', 'a' => 'In Italia le banche di solito chiedono che la rata non superi circa il 30–35% del reddito netto mensile. I finanziatori valutano comunque la tua situazione finanziaria complessiva.'],
            ['q' => 'I risultati sono esatti?', 'a' => 'Sono stime per pianificare. Imposte, assicurazioni, PMI e costi di rogito variano in base al luogo, all’istituto e al tuo profilo creditizio.'],
        ],
    ],

    'date-calculator' => [
        'slug' => 'calcolo-date',
        'name' => 'Calcolo date',
        'short_description' => 'Conta i giorni tra due date o aggiungi e togli giorni, settimane e mesi.',
        'description' => 'Calcola quanti giorni, settimane, mesi e giorni lavorativi ci sono tra due date, oppure aggiungi e togli giorni, settimane, mesi e anni per ottenere una data futura o passata.',
        'seo_title' => 'Calcolo date: giorni tra due date',
        'seo_description' => 'Conta i giorni tra due date, compresi i giorni lavorativi, oppure aggiungi e togli giorni, settimane e mesi a qualsiasi data. Gratis e immediato.',
        'content' => <<<'HTML'
<h2>Usi comuni</h2>
<ul>
<li><strong>Scadenze:</strong> che data è tra 30 giorni lavorativi?</li>
<li><strong>Conti alla rovescia:</strong> quanti giorni mancano a un matrimonio, un esame, un viaggio o un lancio?</li>
<li><strong>Contratti e preavvisi:</strong> la data 90 giorni dopo la firma.</li>
<li><strong>Gravidanza, garanzie e abbonamenti:</strong> aggiungere settimane o mesi a una data iniziale.</li>
<li><strong>Pianificazione di progetti:</strong> il numero di giorni lavorativi tra due traguardi.</li>
</ul>
<h2>Come vengono contati i mesi</h2>
<p>Aggiungere mesi segue il calendario, non un numero fisso di giorni. Un mese dopo il 15 marzo è il 15 aprile, a prescindere dalla durata del mese. Quando il giorno non esiste — come il 30 febbraio — si usa l’ultimo giorno del mese.</p>
<p>Per conoscere l’età esatta di una persona e il suo prossimo compleanno, usa Calcolo età.</p>
HTML,
        'steps' => [
            'Scegli <strong>Giorni tra due date</strong> per contare il tempo tra due date, oppure <strong>Aggiungi o sottrai</strong> per ottenere una data futura o passata.',
            'Scegli le date nel calendario o scrivile.',
            'Attiva <strong>Includi la data finale</strong> quando devono contare sia il primo sia l’ultimo giorno, ad esempio per una prenotazione o un progetto.',
            'Usa <strong>Solo giorni lavorativi</strong> per saltare sabati e domeniche, ad esempio per calcolare una scadenza.',
        ],
        'faq' => [
            ['q' => 'Quanti giorni ci sono tra due date?', 'a' => 'Inserisci entrambe le date in Giorni tra due date. Il risultato mostra il totale dei giorni, lo stesso periodo in settimane, mesi e anni e il numero di giorni lavorativi.'],
            ['q' => 'Devo includere la data finale?', 'a' => 'Per impostazione predefinita il calcolatore conta i giorni dalla data iniziale a quella finale, come si contano le notti in hotel. Includi la data finale quando contano entrambi i giorni, come in un evento di 3 giorni da lunedì a mercoledì.'],
            ['q' => 'Cosa conta come giorno lavorativo?', 'a' => 'Da lunedì a venerdì. Le festività non vengono escluse perché cambiano da paese a paese, quindi sottraile a mano se serve.'],
            ['q' => 'Cosa succede se aggiungo un mese al 31 gennaio?', 'a' => 'Il risultato è l’ultimo giorno di febbraio (28 o 29), perché febbraio non ha il 31. È così che fanno le banche e la maggior parte dei calendari.'],
            ['q' => 'Posso calcolare l’età di una persona?', 'a' => 'Sì, ma Calcolo età è fatto apposta e mostra anche il conto alla rovescia per il prossimo compleanno.'],
        ],
    ],

    'debt-payoff-calculator' => [
        'slug' => 'calcolo-estinzione-debiti',
        'name' => 'Calcolo estinzione debiti',
        'short_description' => 'Pianifica quando sarai libero dai debiti con il metodo valanga o palla di neve.',
        'description' => 'Aggiungi le tue carte di credito e i tuoi prestiti per vedere quando sarai libero dai debiti e quanti interessi pagherai con i metodi valanga e palla di neve, rispetto al pagare solo le rate minime.',
        'seo_title' => 'Calcolo estinzione debiti: valanga o palla di neve',
        'seo_description' => 'Calcolo dell’estinzione dei debiti gratis. Confronta valanga e palla di neve, scopri quando sarai senza debiti e quanto fanno risparmiare i pagamenti extra.',
        'content' => <<<'HTML'
<h2>Valanga o palla di neve?</h2>
<p>Entrambi i metodi pagano la rata minima di ogni debito e destinano tutto il denaro extra a un debito obiettivo. Il metodo <strong>valanga</strong> attacca prima il tasso più alto, che è sempre la scelta più economica. Il metodo <strong>palla di neve</strong> attacca prima il debito più piccolo, così chiudi i conti prima: una spinta motivazionale che aiuta molte persone a seguire il piano. Il metodo migliore è quello che riuscirai a seguire.</p>
<h2>Consigli per uscire prima dai debiti</h2>
<ul>
<li>Smetti di fare nuovi acquisti con le carte che stai ripagando.</li>
<li>Chiedi alla tua banca un tasso più basso: spesso funziona se paghi puntualmente.</li>
<li>Valuta un consolidamento dei debiti a un tasso inferiore, controllando prima le spese.</li>
<li>Destina le entrate straordinarie, come rimborsi fiscali, tredicesima o bonus, direttamente al debito obiettivo.</li>
</ul>
<p>Stai per chiedere un nuovo prestito? Calcolo rata prestito mostra il costo totale prima di firmare.</p>
HTML,
        'steps' => [
            'Elenca i tuoi debiti con <strong>importo residuo</strong>, <strong>tasso di interesse (TAEG)</strong> e <strong>rata minima</strong>.',
            'Inserisci quanto puoi pagare <strong>in più</strong> ogni mese oltre alle rate minime.',
            'Confronta i metodi <strong>valanga</strong> e <strong>palla di neve</strong> con il pagamento delle sole rate minime.',
            'Segui l’ordine di estinzione del metodo scelto. Quando un debito è estinto, la sua rata passa al successivo.',
        ],
        'faq' => [
            ['q' => 'Che cos’è il metodo valanga?', 'a' => 'Con il metodo valanga paghi la rata minima di ogni debito e destini tutto il denaro extra al debito con il tasso più alto. È il metodo che fa risparmiare più interessi.'],
            ['q' => 'Che cos’è il metodo palla di neve?', 'a' => 'Con il metodo palla di neve destini il denaro extra prima al debito più piccolo. Paghi un po’ più di interessi, ma le vittorie rapide mantengono motivate molte persone.'],
            ['q' => 'Cosa significa che la rata “passa” al debito successivo?', 'a' => 'Quando estingui un debito, il denaro che gli destinavi si aggiunge a quello successivo. Il pagamento mensile totale resta uguale, quindi il ritmo di estinzione accelera nel tempo.'],
            ['q' => 'Perché dice che il mio debito non verrà mai estinto?', 'a' => 'Se i tuoi pagamenti sono inferiori agli interessi addebitati ogni mese, il debito non scende mai. Aumenta la rata minima o il pagamento extra.'],
            ['q' => 'I miei dati finanziari vengono salvati?', 'a' => 'No. Tutto viene calcolato nel tuo browser e nulla viene inviato ai nostri server.'],
        ],
    ],
];
