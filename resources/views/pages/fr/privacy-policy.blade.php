@php $site = config('site.name'); $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title" updated="6 octobre 2026">
    <p>La présente Politique de confidentialité explique quelles informations {{ $site }} (« nous ») collecte lorsque vous utilisez ce site et comment elles sont utilisées. Nous ne collectons que le minimum de données nécessaire pour faire fonctionner et améliorer le site.</p>

    <h2>Fichiers et textes utilisés avec nos outils</h2>
    <p>Nos outils traitent vos fichiers et vos textes <strong>localement dans votre navigateur</strong>. Les images, PDF, documents, mots de passe et tout texte que vous collez ne sont ni envoyés, ni stockés, ni consultés par nos serveurs. Quand vous fermez ou rechargez la page, ces données disparaissent.</p>

    <h2>Informations collectées automatiquement</h2>
    <p>Comme la plupart des sites, notre hébergeur peut enregistrer des journaux serveur standard (adresse IP, type de navigateur, pages demandées et heure de la requête) pour des raisons de sécurité et de bon fonctionnement du service. Ces journaux sont conservés pour une durée limitée et ne servent pas à vous identifier.</p>

    <h2>Mesure d’audience</h2>
    <p>Nous pouvons utiliser Google Analytics pour comprendre comment les visiteurs utilisent le site, par exemple quels outils sont les plus populaires. Analytics reçoit des événements d’utilisation anonymes comme « outil utilisé » ou « fichier téléchargé », avec des détails techniques tels que le nombre de fichiers ou le format de sortie. <strong>Nous n’envoyons jamais le contenu de vos fichiers ou de vos textes à l’outil de mesure d’audience.</strong> Google Analytics utilise des cookies ; vous pouvez le désactiver avec le <a href="https://tools.google.com/dlpage/gaoptout" rel="noopener" target="_blank">module complémentaire de désactivation de Google Analytics</a>.</p>

    <h2>Publicité et cookies</h2>
    <p>Nous pouvons afficher des annonces diffusées par Google AdSense. Des fournisseurs tiers, dont Google, utilisent des cookies pour diffuser des annonces en fonction de vos visites précédentes sur ce site et sur d’autres sites. Les cookies publicitaires permettent à Google et à ses partenaires de diffuser des annonces basées sur vos visites sur ce site et/ou sur d’autres sites Internet.</p>
    <ul>
        <li>Vous pouvez désactiver la publicité personnalisée dans les <a href="https://adssettings.google.com" rel="noopener" target="_blank">Paramètres des annonces Google</a>.</li>
        <li>Vous pouvez désactiver l’utilisation des cookies de certains fournisseurs tiers pour la publicité personnalisée sur <a href="https://www.aboutads.info/choices/" rel="noopener" target="_blank">www.aboutads.info</a>.</li>
        <li>En savoir plus : <a href="https://policies.google.com/technologies/partner-sites" rel="noopener" target="_blank">Comment Google utilise les informations des sites qui utilisent ses services</a>.</li>
    </ul>
    <p>Lorsque la loi l’exige (par exemple dans l’Espace économique européen et au Royaume-Uni), nous demandons votre consentement avant d’utiliser des cookies non essentiels.</p>

    <h2>Comptes</h2>
    <p>{{ $site }} ne nécessite aucun compte : nous ne collectons ni nom, ni adresse e-mail, ni mot de passe pour utiliser les outils.</p>

    <h2>Mineurs</h2>
    <p>Ce site ne s’adresse pas aux enfants de moins de 13 ans et nous ne collectons pas sciemment d’informations personnelles les concernant.</p>

    <h2>Vos droits</h2>
    <p>Selon votre lieu de résidence (par exemple dans l’Union européenne au titre du RGPD), vous pouvez disposer d’un droit d’accès, de rectification ou d’effacement des données personnelles que nous détenons sur vous. Comme nous ne conservons pas le contenu que vous traitez avec nos outils, il n’y a généralement rien à effacer. Pour toute demande, écrivez-nous à <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>

    <h2>Modifications de cette politique</h2>
    <p>Nous pouvons mettre à jour cette politique de temps à autre. La date en haut de cette page indique sa dernière modification.</p>

    <h2>Contact</h2>
    <p>Une question sur la confidentialité ? Écrivez-nous à <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>
</x-page-layout>
