<?php

/*
| French copy for batch 6: Credit Card Payoff, Loan Comparison, Organize PDF,
| Add Page Numbers to PDF. See content/fr/tools.php.
*/

return [
    'credit-card-payoff-calculator' => [
        'slug' => 'calculatrice-remboursement-carte-credit',
        'name' => 'Calculatrice de remboursement de carte de crédit',
        'short_description' => 'Découvrez combien de temps il faut pour rembourser une carte de crédit et son coût.',
        'description' => 'Saisissez le solde et le taux de votre carte pour savoir quand vous serez libéré de la dette avec une mensualité fixe, ou combien payer pour la rembourser dans un délai donné, comparé au paiement minimum.',
        'seo_title' => 'Remboursement de carte de crédit : calculatrice',
        'seo_description' => 'Calculez gratuitement la durée de remboursement de votre carte, les intérêts totaux et la mensualité nécessaire, face au paiement minimum.',
        'content' => <<<'HTML'
<h2>Pourquoi le paiement minimum vous garde endetté</h2>
<p>Le paiement minimum correspond souvent aux intérêts du mois plus un petit pourcentage du solde. Quand le solde baisse, le minimum baisse aussi, et la plus grande partie de chaque paiement continue de partir en intérêts. Un crédit renouvelable de quelques milliers d’euros peut ainsi durer de nombreuses années et coûter plus en intérêts que les achats eux-mêmes. Une mensualité fixe, même modeste, change complètement la donne.</p>
<h2>Deux façons de planifier le remboursement</h2>
<ul>
<li><strong>Payer un montant fixe</strong> : indiquez ce que vous pouvez payer chaque mois pour voir la date de fin et les intérêts totaux.</li>
<li><strong>Être libéré de la dette en</strong> un nombre de mois choisi : obtenez la mensualité nécessaire.</li>
</ul>
<p>Plusieurs cartes et crédits à rembourser ? La Calculatrice de remboursement de dettes compare les méthodes avalanche et boule de neige. Vous envisagez un rachat par un prêt personnel ? Vérifiez la mensualité avec le Simulateur de prêt et comparez les offres avec le Comparateur de prêts.</p>
HTML,
        'steps' => [
            'Saisissez le <strong>solde de la carte</strong> et son <strong>taux annuel</strong> (indiqués sur votre relevé).',
            'Choisissez <strong>Payer un montant fixe</strong> et saisissez votre mensualité, ou <strong>Être libéré de la dette en</strong> et choisissez un nombre de mois.',
            'Consultez la date de fin, les intérêts totaux et la comparaison avec le paiement minimum.',
            'Copiez le lien pour enregistrer votre plan ou le partager.',
        ],
        'faq' => [
            ['q' => 'Combien de temps pour rembourser ma carte de crédit ?', 'a' => 'Cela dépend du solde, du taux et de ce que vous payez chaque mois. Saisissez-les ci-dessus pour obtenir le nombre exact de mois. Ne payer que le minimum peut étaler une petite dette sur de nombreuses années.'],
            ['q' => 'Comment les intérêts de la carte sont-ils calculés ?', 'a' => 'Les intérêts sont prélevés chaque mois, à peu près le taux annuel divisé par 12, sur le solde. Chaque établissement a ses propres règles : le résultat est donc une estimation proche, pas une copie exacte de votre relevé.'],
            ['q' => 'Combien payer pour tout rembourser en 2 ans ?', 'a' => 'Choisissez <strong>Être libéré de la dette en</strong> et saisissez 24 mois. La calculatrice affiche la mensualité fixe qui solde la dette dans ce délai.'],
            ['q' => 'Pourquoi le paiement minimum prend-il autant de temps ?', 'a' => 'Le minimum correspond en général aux intérêts plus environ 1 % du solde : il diminue avec le solde et la plupart de chaque paiement part en intérêts. Vous pouvez modifier ces règles dans <strong>Conditions du paiement minimum</strong>.'],
            ['q' => 'Les nouveaux achats sont-ils pris en compte ?', 'a' => 'Non. L’estimation suppose que vous n’utilisez plus la carte, que le taux ne change pas et que chaque paiement est fait à temps.'],
        ],
    ],

    'loan-comparison-calculator' => [
        'slug' => 'comparateur-de-prets',
        'name' => 'Comparateur de prêts',
        'short_description' => 'Comparez jusqu’à quatre offres de prêt : mensualité, frais et coût total.',
        'description' => 'Comparez des offres de prêt côte à côte avec leur taux, leur durée et leurs frais de dossier pour trouver la moins chère, la mensualité la plus basse et le TAEG de chacune.',
        'seo_title' => 'Comparateur de prêts : comparez les offres',
        'seo_description' => 'Comparez jusqu’à 4 offres de prêt côte à côte : mensualité, intérêts, frais, coût total du crédit et TAEG pour trouver le prêt le moins cher.',
        'content' => <<<'HTML'
<h2>Le taux le plus bas n’est pas toujours le prêt le moins cher</h2>
<p>Les banques mettent en avant le taux nominal, mais les frais de dossier et autres frais initiaux changent le coût réel. Un prêt à 6,9 % avec 800 € de frais peut coûter plus cher qu’un prêt à 7,5 % sans frais. Ce comparateur additionne intérêts et frais dans le coût total du crédit et calcule le TAEG : le taux que vous payez vraiment une fois les frais inclus.</p>
<h2>Mensualité ou coût total</h2>
<p>Une durée plus longue réduit la mensualité mais augmente presque toujours les intérêts totaux. Les badges indiquent l’offre à la mensualité la plus basse et celle qui coûte le moins au total, pour choisir en connaissance de cause entre budget mensuel et coût.</p>
<p>Une fois l’offre choisie, ouvrez le Simulateur de prêt pour voir son tableau d’amortissement complet et l’effet des remboursements anticipés. Pour un logement ou une voiture, le Simulateur de prêt immobilier et le Simulateur de crédit auto tiennent compte des taxes, de l’assurance et de la reprise.</p>
HTML,
        'steps' => [
            'Saisissez chaque <strong>offre de prêt</strong> : montant, taux, durée et <strong>frais</strong> initiaux.',
            'Ajoutez jusqu’à quatre offres avec <strong>Ajouter une offre</strong>.',
            'Comparez la mensualité, les intérêts totaux, le coût total du crédit et le TAEG de chaque offre.',
            'Repérez les badges <strong>La moins chère</strong> et <strong>Mensualité la plus basse</strong> pour décider.',
        ],
        'faq' => [
            ['q' => 'Comment comparer deux offres de prêt ?', 'a' => 'Comparez le coût total du crédit (intérêts plus frais), pas seulement le taux ou la mensualité. Saisissez les deux offres ici : la moins chère est mise en évidence.'],
            ['q' => 'Qu’est-ce que le TAEG ?', 'a' => 'Le taux annuel effectif global inclut les frais initiaux en plus des intérêts. Comme les frais réduisent la somme réellement reçue, le TAEG est supérieur au taux nominal dès qu’un prêt comporte des frais.'],
            ['q' => 'Une mensualité plus basse est-elle préférable ?', 'a' => 'Pas forcément. Une durée plus longue réduit la mensualité mais augmente souvent les intérêts totaux. Ne choisissez la mensualité la plus basse que si votre budget en a besoin.'],
            ['q' => 'Quels frais inclure ?', 'a' => 'Incluez ce que vous payez pour obtenir le prêt : frais de dossier, de courtage ou de garantie. N’incluez pas les assurances facultatives ni les pénalités de retard.'],
            ['q' => 'Mes informations sont-elles enregistrées ?', 'a' => 'Non. Tout est calculé dans votre navigateur et rien n’est envoyé sur nos serveurs.'],
        ],
    ],

    'organize-pdf' => [
        'slug' => 'organiser-pdf',
        'name' => 'Organiser un PDF',
        'short_description' => 'Réordonnez, pivotez et supprimez les pages d’un PDF par glisser-déposer.',
        'description' => 'Affichez toutes les pages de votre PDF, faites-les glisser dans un nouvel ordre, pivotez celles qui sont de travers et supprimez celles qui sont inutiles, puis téléchargez le fichier.',
        'seo_title' => 'Organiser un PDF : réordonner les pages gratuitement',
        'seo_description' => 'Réordonnez les pages d’un PDF gratuitement : glissez-les, pivotez ou supprimez des pages et téléchargez le PDF. Tout se passe dans votre navigateur.',
        'content' => <<<'HTML'
<h2>Chaque page à sa place</h2>
<p>Les documents numérisés sortent souvent dans le désordre, un rapport doit déplacer une annexe à la fin et un fichier fusionné a besoin de sa page de garde en premier. Cet outil affiche un aperçu de chaque page : faites-les glisser dans l’ordre voulu, pivotez celles qui ont été numérisées de travers et supprimez les pages blanches ou en double, en une seule étape.</p>
<h2>Confidentiel par conception</h2>
<p>Votre PDF est ouvert et reconstruit entièrement dans votre navigateur. Rien n’est envoyé, ce qui le rend sûr pour les contrats, relevés bancaires et comptes rendus médicaux.</p>
<p>Pour combiner plusieurs fichiers d’abord, utilisez Fusionner des PDF. Pour extraire quelques pages dans un autre document, utilisez Diviser un PDF. Pour corriger uniquement l’orientation, Pivoter un PDF est le plus rapide, et Numéroter les pages d’un PDF numérote le document final.</p>
HTML,
        'steps' => [
            'Déposez un PDF dans la zone ou cliquez pour le choisir. Un aperçu de chaque page s’affiche.',
            'Faites glisser les pages dans l’ordre voulu ou utilisez les flèches sous chaque page.',
            'Cliquez sur une page pour la pivoter ou sur l’icône de corbeille pour la supprimer.',
            'Cliquez sur <strong>Télécharger le PDF organisé</strong> pour enregistrer le nouveau fichier.',
        ],
        'faq' => [
            ['q' => 'Comment changer l’ordre des pages d’un PDF ?', 'a' => 'Ouvrez le PDF ici et faites glisser chaque page à sa nouvelle place. Sur mobile, utilisez les flèches sous chaque page. Téléchargez ensuite le fichier organisé.'],
            ['q' => 'Puis-je pivoter et supprimer des pages en même temps ?', 'a' => 'Oui. Un clic sur une page la fait pivoter de 90 degrés et la corbeille la marque pour suppression : tout se corrige en une fois.'],
            ['q' => 'Puis-je annuler mes modifications ?', 'a' => 'Utilisez <strong>Ordre d’origine</strong> pour revenir à l’ordre initial. Votre fichier d’origine n’est jamais modifié : l’outil télécharge une nouvelle copie.'],
            ['q' => 'Mon PDF est-il envoyé sur un serveur ?', 'a' => 'Non. Les pages sont affichées et reconstruites dans votre navigateur, le document ne quitte donc jamais votre appareil.'],
            ['q' => 'Puis-je organiser des pages de plusieurs PDF ?', 'a' => 'Combinez d’abord les fichiers avec Fusionner des PDF, puis ouvrez ici le fichier fusionné pour ordonner ses pages.'],
        ],
    ],

    'add-page-numbers-to-pdf' => [
        'slug' => 'numeroter-pages-pdf',
        'name' => 'Numéroter les pages d’un PDF',
        'short_description' => 'Numérotez les pages d’un PDF à l’emplacement et dans le style de votre choix.',
        'description' => 'Ajoutez des numéros de page à un PDF dans un coin ou au centre, au format « 1 », « 1 / 10 » ou « Page 1 sur 10 », ignorez la page de garde et choisissez le premier numéro.',
        'seo_title' => 'Numéroter les pages d’un PDF gratuitement',
        'seo_description' => 'Ajoutez des numéros de page à un PDF gratuitement : position, format, premier numéro, page de garde ignorée. Le fichier reste sur votre appareil.',
        'content' => <<<'HTML'
<h2>Quand les numéros de page comptent</h2>
<p>Rapports, mémoires, contrats, manuels et supports imprimés sont bien plus faciles à relire et à commenter quand chaque page est numérotée. Les numéros protègent aussi les documents imprimés : une page manquante ou intervertie se voit immédiatement. Beaucoup de PDF issus de scanners, de téléphones ou de logiciels de présentation n’ont aucun numéro de page.</p>
<h2>Choisissez le style</h2>
<ul>
<li>Placez le numéro dans n’importe quel coin ou au centre, en haut ou en bas.</li>
<li>Utilisez un simple numéro, « 1 / 10 », « Page 1 » ou « Page 1 sur 10 ».</li>
<li>Ignorez la page de garde en commençant à la page 2 et choisissez le premier numéro pour poursuivre une série.</li>
</ul>
<p>Vous préparez le document ? Fusionner des PDF combine les fichiers, Organiser un PDF corrige l’ordre des pages et Supprimer des pages PDF retire celles dont vous n’avez pas besoin.</p>
HTML,
        'steps' => [
            'Déposez un PDF dans la zone ou cliquez pour le choisir.',
            'Choisissez la <strong>position</strong> et le <strong>format</strong> des numéros. L’aperçu montre le résultat.',
            'Pour ignorer la page de garde, commencez la numérotation à la page 2. Modifiez le premier numéro si besoin.',
            'Cliquez sur <strong>Ajouter les numéros de page</strong> pour télécharger le PDF numéroté.',
        ],
        'faq' => [
            ['q' => 'Comment ajouter des numéros de page à un PDF ?', 'a' => 'Ouvrez le PDF ici, choisissez l’emplacement et le format des numéros, puis cliquez sur <strong>Ajouter les numéros de page</strong>. La copie numérotée se télécharge en quelques secondes.'],
            ['q' => 'Puis-je ignorer la première page ?', 'a' => 'Oui. Indiquez 2 dans <strong>Commencer la numérotation à la page</strong> et la page de garde reste vierge. Laissez le premier numéro à 1 si la deuxième page doit porter le numéro 1.'],
            ['q' => 'Quels formats sont proposés ?', 'a' => 'Un simple numéro, « 1 / 10 », « Page 1 » et « Page 1 sur 10 », en petite, moyenne ou grande taille, dans un coin ou au centre.'],
            ['q' => 'Et les pages en paysage ou pivotées ?', 'a' => 'Les numéros sont placés selon l’affichage de chaque page : ils apparaissent donc à l’endroit, même sur les pages en paysage ou pivotées.'],
            ['q' => 'Mon PDF est-il envoyé sur un serveur ?', 'a' => 'Non. Les numéros sont ajoutés dans votre navigateur et le fichier ne quitte jamais votre appareil.'],
        ],
    ],
];
