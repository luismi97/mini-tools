@php $site = config('site.name'); $count = \App\Support\Catalog::tools()->count(); @endphp
<x-page-layout :seo="$seo" :title="$title">
    <p>{{ $site }} est une collection de {{ $count }} outils gratuits en ligne pour les tâches du quotidien : formater du JSON, compresser et convertir des images, fusionner et diviser des PDF, compter des mots, générer des mots de passe et des QR codes, calculer des prêts, des pourcentages et bien plus encore.</p>
    <p>Nous créons les outils que nous aimerions trouver : rapides, centrés sur une seule tâche, gratuits, sans inscription, sans pop-ups et sans pièges.</p>

    <h2>Confidentiel par conception</h2>
    <p>Presque tous les outils de {{ $site }} fonctionnent entièrement dans votre navigateur. Quand vous compressez une photo, fusionnez un PDF ou formatez du JSON, le travail est effectué sur votre propre appareil grâce aux technologies modernes du navigateur. <strong>Vos fichiers et vos textes ne sont jamais envoyés sur nos serveurs</strong> : vous pouvez utiliser les outils en toute sérénité avec vos photos personnelles, contrats, factures et code source.</p>

    <h2>Comment nous concevons nos outils</h2>
    <ul>
        <li><strong>La précision d’abord.</strong> Les calculatrices utilisent des formules standard et documentées, et chaque partie critique de la logique est couverte par des tests automatisés.</li>
        <li><strong>La rapidité.</strong> Chaque page ne charge que le code dont elle a besoin. Les bibliothèques lourdes, comme les moteurs PDF, ne sont téléchargées que lorsque vous les utilisez.</li>
        <li><strong>L’accessibilité.</strong> Les outils fonctionnent au clavier et avec les lecteurs d’écran, sur mobile comme sur ordinateur, en mode clair comme en mode sombre.</li>
        <li><strong>Les standards ouverts.</strong> Nous utilisons des bibliothèques open source reconnues comme PDF.js, pdf-lib et libheif.</li>
    </ul>

    <h2>Comment {{ $site }} reste gratuit</h2>
    <p>{{ $site }} est financé par une publicité non intrusive. Les annonces ne bloquent jamais un outil et ne sont jamais placées dans la zone de travail. Nous pourrons proposer plus tard une offre payante facultative avec des extras comme des fichiers plus volumineux et le traitement par lots ; les outils principaux resteront gratuits.</p>

    <h2>Proposer un outil</h2>
    <p>Il vous manque quelque chose ? Nous ajoutons régulièrement de nouveaux outils selon les besoins des utilisateurs. <a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}">Envoyez-nous votre idée</a>.</p>
</x-page-layout>
