@php $site = config('site.name'); $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title" updated="6 ottobre 2026">
    <p>La presente Informativa sulla privacy spiega quali informazioni raccoglie {{ $site }} («noi») quando usi questo sito e come vengono utilizzate. Raccogliamo solo i dati minimi necessari per far funzionare e migliorare il sito.</p>

    <h2>File e testi che usi con i nostri strumenti</h2>
    <p>I nostri strumenti elaborano file e testi <strong>localmente nel tuo browser</strong>. Immagini, PDF, documenti, password e qualsiasi testo incollato non vengono caricati, salvati né visti dai nostri server. Quando chiudi o ricarichi la pagina, questi dati scompaiono.</p>

    <h2>Informazioni raccolte automaticamente</h2>
    <p>Come la maggior parte dei siti, il nostro fornitore di hosting può registrare log standard del server (indirizzo IP, tipo di browser, pagine richieste e ora della richiesta) per motivi di sicurezza e per mantenere il servizio funzionante. Questi log vengono conservati per un periodo limitato e non vengono usati per identificarti.</p>

    <h2>Statistiche</h2>
    <p>Possiamo usare Google Analytics per capire come i visitatori usano il sito, ad esempio quali strumenti sono più popolari. Analytics riceve eventi di utilizzo anonimi come «strumento usato» o «file scaricato», insieme a dettagli tecnici come il numero di file o il formato di output. <strong>Non inviamo mai il contenuto dei tuoi file o testi alle statistiche.</strong> Google Analytics usa cookie; puoi disattivarlo con il <a href="https://tools.google.com/dlpage/gaoptout" rel="noopener" target="_blank">componente aggiuntivo del browser per la disattivazione di Google Analytics</a>.</p>

    <h2>Pubblicità e cookie</h2>
    <p>Possiamo mostrare annunci forniti da Google AdSense. I fornitori terzi, tra cui Google, usano cookie per pubblicare annunci in base alle tue visite precedenti a questo e ad altri siti. L’uso dei cookie pubblicitari consente a Google e ai suoi partner di mostrare annunci basati sulle tue visite a questo sito e/o ad altri siti su internet.</p>
    <ul>
        <li>Puoi disattivare la pubblicità personalizzata nelle <a href="https://adssettings.google.com" rel="noopener" target="_blank">Impostazioni annunci di Google</a>.</li>
        <li>Puoi disattivare l’uso dei cookie di alcuni fornitori terzi per la pubblicità personalizzata su <a href="https://www.aboutads.info/choices/" rel="noopener" target="_blank">www.aboutads.info</a>.</li>
        <li>Scopri di più: <a href="https://policies.google.com/technologies/partner-sites" rel="noopener" target="_blank">Come Google utilizza le informazioni dei siti che usano i suoi servizi</a>.</li>
    </ul>
    <p>Quando la legge lo richiede (ad esempio nello Spazio economico europeo, nel Regno Unito e in Svizzera), chiediamo il tuo consenso prima di usare cookie non essenziali.</p>

    <h2>Account</h2>
    <p>{{ $site }} non richiede un account, quindi non raccogliamo nomi, indirizzi email o password per usare gli strumenti.</p>

    <h2>Minori</h2>
    <p>Questo sito non è rivolto ai minori di 13 anni e non raccogliamo consapevolmente loro informazioni personali.</p>

    <h2>I tuoi diritti</h2>
    <p>A seconda di dove vivi (ad esempio nell’Unione europea ai sensi del GDPR), potresti avere il diritto di accedere, rettificare o cancellare i dati personali che conserviamo su di te. Poiché non conserviamo i contenuti che elabori con i nostri strumenti, di solito non c’è nulla da cancellare. Per una richiesta scrivici a <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>

    <h2>Modifiche alla presente informativa</h2>
    <p>Possiamo aggiornare questa informativa di tanto in tanto. La data in cima a questa pagina indica l’ultima modifica.</p>

    <h2>Contatti</h2>
    <p>Hai domande sulla privacy? Scrivici a <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>
</x-page-layout>
