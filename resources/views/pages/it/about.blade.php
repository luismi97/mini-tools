@php $site = config('site.name'); $count = \App\Support\Catalog::tools()->count(); @endphp
<x-page-layout :seo="$seo" :title="$title">
    <p>{{ $site }} è una raccolta di {{ $count }} strumenti online gratuiti per le attività di tutti i giorni: formattare JSON, comprimere e convertire immagini, unire e dividere PDF, contare parole, generare password e codici QR, e calcolare prestiti, percentuali e molto altro.</p>
    <p>Creiamo gli strumenti che vorremmo trovare: veloci, dedicati a un solo compito, gratuiti e senza registrazioni, pop-up o trucchi ingannevoli.</p>

    <h2>Privacy fin dalla progettazione</h2>
    <p>Quasi tutti gli strumenti di {{ $site }} funzionano interamente nel tuo browser. Quando comprimi una foto, unisci un PDF o formatti un JSON, il lavoro viene svolto sul tuo dispositivo grazie alle moderne tecnologie del browser. <strong>I tuoi file e i tuoi testi non vengono mai caricati sui nostri server</strong>, quindi puoi usare gli strumenti in tutta tranquillità con foto personali, contratti, fatture e codice sorgente.</p>

    <h2>Come costruiamo i nostri strumenti</h2>
    <ul>
        <li><strong>Prima di tutto la precisione.</strong> I calcolatori usano formule standard e documentate, e ogni parte critica della logica è coperta da test automatici.</li>
        <li><strong>Velocità.</strong> Ogni pagina carica solo il codice di cui ha bisogno. Le librerie pesanti, come i motori PDF, vengono scaricate solo quando le usi.</li>
        <li><strong>Accessibilità.</strong> Gli strumenti funzionano con tastiera e screen reader, su smartphone e computer, in modalità chiara e scura.</li>
        <li><strong>Standard aperti.</strong> Usiamo librerie open source affermate come PDF.js, pdf-lib e libheif.</li>
    </ul>

    <h2>Come {{ $site }} resta gratuito</h2>
    <p>{{ $site }} è finanziato da pubblicità non invasiva. Gli annunci non bloccano mai uno strumento e non vengono mai inseriti nell’area di lavoro. In futuro potremmo offrire un piano a pagamento facoltativo con extra come file più grandi ed elaborazione in blocco; gli strumenti principali resteranno gratuiti.</p>

    <h2>Suggerisci uno strumento</h2>
    <p>Ti manca qualcosa? Aggiungiamo spesso nuovi strumenti in base a ciò di cui le persone hanno bisogno. <a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}">Inviaci la tua idea</a>.</p>
</x-page-layout>
