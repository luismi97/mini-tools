@php $site = config('site.name'); $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title" updated="6 ottobre 2026">
    <p>Usando {{ $site }} accetti i presenti Termini di utilizzo. Se non sei d’accordo, ti preghiamo di non usare il sito.</p>

    <h2>Uso degli strumenti</h2>
    <p>Gli strumenti sono offerti gratuitamente per uso personale e commerciale. Non puoi fare un uso improprio del sito, ad esempio cercando di interromperne il funzionamento, sovraccaricarlo con richieste automatiche o usarlo per scopi illeciti.</p>

    <h2>I tuoi contenuti</h2>
    <p>Conservi tutti i diritti sui file e sui testi che elabori. Poiché gli strumenti funzionano nel tuo browser, non riceviamo né conserviamo i tuoi contenuti. Sei responsabile di assicurarti di avere il diritto di elaborare i contenuti che usi.</p>

    <h2>Nessuna garanzia</h2>
    <p>Gli strumenti e i loro risultati sono forniti «così come sono», senza garanzie di alcun tipo. I calcolatori forniscono stime solo a scopo informativo e non costituiscono consulenza finanziaria, legale, medica o professionale. Verifica sempre i risultati importanti e conserva una copia dei tuoi file originali.</p>

    <h2>Limitazione di responsabilità</h2>
    <p>Nella misura massima consentita dalla legge, {{ $site }} non è responsabile di perdite o danni derivanti dall’uso, o dall’impossibilità di usare, il sito o i suoi strumenti, inclusa la perdita di dati.</p>

    <h2>Servizi di terze parti</h2>
    <p>Il sito può mostrare pubblicità e usare servizi di statistica di terze parti, soggetti ai rispettivi termini e informative sulla privacy. Consulta la nostra <a href="{{ \App\Http\Controllers\PageController::url('privacy-policy') }}">Informativa sulla privacy</a> per maggiori dettagli.</p>

    <h2>Modifiche</h2>
    <p>Possiamo aggiornare questi termini o modificare, aggiungere o rimuovere strumenti in qualsiasi momento. Continuare a usare il sito significa accettare i termini in vigore.</p>

    <h2>Contatti</h2>
    <p>Hai domande su questi termini? Scrivici a <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>
</x-page-layout>
