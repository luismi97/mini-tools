@php $site = config('site.name'); $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title" updated="6 octobre 2026">
    <p>En utilisant {{ $site }}, vous acceptez les présentes Conditions d’utilisation. Si vous n’êtes pas d’accord, merci de ne pas utiliser le site.</p>

    <h2>Utilisation des outils</h2>
    <p>Les outils sont proposés gratuitement pour un usage personnel et commercial. Vous ne devez pas faire un usage abusif du site, par exemple en tentant de perturber son fonctionnement, en le surchargeant de requêtes automatisées ou en l’utilisant à des fins illégales.</p>

    <h2>Votre contenu</h2>
    <p>Vous conservez tous les droits sur les fichiers et textes que vous traitez. Les outils fonctionnant dans votre navigateur, nous ne recevons ni ne stockons votre contenu. Il vous appartient de vous assurer que vous avez le droit de traiter le contenu que vous utilisez.</p>

    <h2>Absence de garantie</h2>
    <p>Les outils et leurs résultats sont fournis « en l’état », sans garantie d’aucune sorte. Les calculatrices fournissent des estimations à titre indicatif uniquement et ne constituent pas un conseil financier, juridique, médical ou professionnel. Vérifiez toujours les résultats importants et conservez une copie de vos fichiers d’origine.</p>

    <h2>Limitation de responsabilité</h2>
    <p>Dans toute la mesure permise par la loi, {{ $site }} ne saurait être tenu responsable de toute perte ou de tout dommage résultant de l’utilisation ou de l’impossibilité d’utiliser le site ou ses outils, y compris la perte de données.</p>

    <h2>Services tiers</h2>
    <p>Le site peut afficher de la publicité et utiliser des services de mesure d’audience tiers, soumis à leurs propres conditions et politiques de confidentialité. Consultez notre <a href="{{ \App\Http\Controllers\PageController::url('privacy-policy') }}">Politique de confidentialité</a> pour plus de détails.</p>

    <h2>Modifications</h2>
    <p>Nous pouvons mettre à jour ces conditions ou modifier, ajouter ou retirer des outils à tout moment. Continuer à utiliser le site vaut acceptation des conditions en vigueur.</p>

    <h2>Contact</h2>
    <p>Une question sur ces conditions ? Écrivez-nous à <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>
</x-page-layout>
