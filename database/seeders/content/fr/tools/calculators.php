<?php

/*
| French copy for the calculators. See content/fr/tools.php.
*/

return [
    'percentage-calculator' => [
        'slug' => 'calculatrice-pourcentage',
        'name' => 'Calculatrice de pourcentage',
        'short_description' => 'Calculez des pourcentages, des variations et des hausses instantanément.',
        'description' => 'Calculez X % d’un nombre, le pourcentage qu’un nombre représente d’un autre, la hausse ou la baisse en pourcentage entre deux valeurs, et ajoutez ou retirez un pourcentage, au même endroit.',
        'seo_title' => 'Calcul de pourcentage : % de, variation et hausse',
        'seo_description' => 'Calculatrice de pourcentage gratuite. Calculez X % de Y, quel pourcentage X représente de Y, les hausses et baisses en %, et ajoutez ou retirez un pourcentage.',
        'content' => <<<'HTML'
<h2>Formules de pourcentage</h2>
<ul>
<li><strong>X % de Y</strong> = Y × X / 100</li>
<li><strong>Quel pourcentage X représente de Y</strong> = X / Y × 100</li>
<li><strong>Variation en pourcentage</strong> = (nouvelle − ancienne) / ancienne × 100</li>
<li><strong>Augmenter Y de X %</strong> = Y × (1 + X / 100)</li>
</ul>
<h2>Exemples du quotidien</h2>
<p>Calculez une remise de 25 % sur un prix, la TVA d’un achat, l’augmentation de votre salaire, la part d’un budget déjà dépensée ou le pourcentage de bonnes réponses à un examen. Points de pourcentage et pourcentages ne sont pas la même chose : un taux qui passe de 10 % à 12 % gagne 2 points de pourcentage, soit une hausse de 20 %.</p>
<p>Pour l’argent dans le temps, utilisez la Calculatrice d’intérêts composés ou le Simulateur de prêt. Pour partager l’addition au restaurant, essayez la Calculatrice de pourboire.</p>
HTML,
        'steps' => [
            'Choisissez le calcul qui correspond à votre question : chacun résout un type de problème de pourcentage différent.',
            'Saisissez vos nombres. Les résultats se mettent à jour instantanément, sans bouton à cliquer.',
            'Utilisez <strong>Variation en pourcentage</strong> pour comparer une ancienne et une nouvelle valeur, comme des prix ou des salaires.',
            'Utilisez <strong>Ajouter ou soustraire un pourcentage</strong> pour les remises, les taxes ou les hausses de prix.',
        ],
        'faq' => [
            ['q' => 'Comment calculer le pourcentage d’un nombre ?', 'a' => 'Multipliez le nombre par le pourcentage puis divisez par 100. Par exemple, 15 % de 200 font 200 × 15 / 100 = 30.'],
            ['q' => 'Comment savoir quel pourcentage un nombre représente d’un autre ?', 'a' => 'Divisez la partie par le total puis multipliez par 100. Par exemple, 30 représente (30 / 200) × 100 = 15 % de 200.'],
            ['q' => 'Comment calculer une hausse en pourcentage ?', 'a' => 'Soustrayez l’ancienne valeur de la nouvelle, divisez par l’ancienne valeur et multipliez par 100. Passer de 80 à 100 représente une hausse de (100 − 80) / 80 × 100 = 25 %.'],
            ['q' => 'Comment calculer une remise ?', 'a' => 'Utilisez Ajouter ou soustraire un pourcentage et choisissez Diminuer. Une remise de 20 % sur 50 donne 50 × (1 − 0,20) = 40.'],
            ['q' => 'Pourquoi une hausse de 50 % suivie d’une baisse de 50 % ne ramène-t-elle pas à la valeur de départ ?', 'a' => 'Parce que chaque pourcentage s’applique à une base différente. 100 + 50 % = 150, mais 150 − 50 % = 75.'],
        ],
    ],

    'loan-calculator' => [
        'slug' => 'simulateur-de-pret',
        'name' => 'Simulateur de prêt',
        'short_description' => 'Calculez vos mensualités, le coût total des intérêts et le tableau d’amortissement.',
        'description' => 'Saisissez le montant, le taux d’intérêt et la durée pour calculer votre échéance mensuelle, toutes les deux semaines ou hebdomadaire, ainsi que le total des intérêts et un tableau d’amortissement complet.',
        'seo_title' => 'Simulateur de prêt : mensualités et amortissement',
        'seo_description' => 'Simulateur de prêt gratuit : échéances mensuelles, toutes les 2 semaines ou hebdomadaires. Intérêts, total payé et tableau d’amortissement complet.',
        'content' => <<<'HTML'
<h2>Comment fonctionnent les mensualités d’un prêt</h2>
<p>Dans un prêt amortissable, toutes les échéances ont le même montant, mais leur composition évolue. Les premières sont surtout constituées d’intérêts, les dernières surtout de capital. Le tableau d’amortissement montre précisément la part de chaque paiement consacrée aux intérêts et la vitesse à laquelle le capital restant dû diminue.</p>
<h2>Comment payer moins d’intérêts</h2>
<ul>
<li><strong>Durée plus courte :</strong> des échéances plus élevées, mais beaucoup moins d’intérêts au total.</li>
<li><strong>Taux plus bas :</strong> même 1 % de moins peut faire économiser des milliers sur un long prêt.</li>
<li><strong>Paiements toutes les deux semaines :</strong> 26 demi-échéances par an réduisent un peu les intérêts.</li>
<li><strong>Remboursements anticipés :</strong> ce que vous payez en plus réduit directement le capital.</li>
</ul>
<p>Vous épargnez plutôt que d’emprunter ? Voyez comment l’argent fructifie avec la Calculatrice d’intérêts composés.</p>
HTML,
        'steps' => [
            'Saisissez le <strong>montant du prêt</strong> que vous souhaitez emprunter.',
            'Saisissez le <strong>taux d’intérêt annuel</strong> (TAEG) proposé par l’établissement.',
            'Indiquez la <strong>durée</strong> en années ou en mois et la fréquence des paiements : mensuelle, toutes les deux semaines ou hebdomadaire.',
            'Consultez votre échéance, le total des intérêts et le coût total, et parcourez le <strong>tableau d’amortissement</strong> par année ou par échéance. Vous pouvez l’exporter en CSV.',
        ],
        'faq' => [
            ['q' => 'Comment l’échéance du prêt est-elle calculée ?', 'a' => 'Le simulateur utilise la formule d’amortissement standard : <code>P = L × r / (1 − (1 + r)<sup>−n</sup>)</code>, où L est le montant emprunté, r le taux d’intérêt par période de paiement et n le nombre total de paiements.'],
            ['q' => 'Payer toutes les deux semaines fait-il économiser ?', 'a' => 'Payer toutes les deux semaines représente 26 paiements par an. Comme les intérêts sont calculés plus souvent sur un capital un peu plus faible, vous payez généralement un peu moins d’intérêts au total. Comparez en changeant la fréquence de paiement.'],
            ['q' => 'Qu’est-ce qu’un tableau d’amortissement ?', 'a' => 'C’est un tableau de tous les paiements sur la durée du prêt, chacun réparti entre la part d’intérêts et la part de capital remboursé, avec le capital restant dû après chaque paiement.'],
            ['q' => 'Les taxes, assurances ou frais sont-ils inclus ?', 'a' => 'Non. Les résultats ne couvrent que le capital et les intérêts. Les prêts immobiliers et auto peuvent inclure en plus l’assurance emprunteur, des frais de dossier ou d’autres coûts fixés par l’établissement.'],
            ['q' => 'Mes informations sont-elles enregistrées ?', 'a' => 'Non. Tous les calculs se font dans votre navigateur et rien de ce que vous saisissez n’est envoyé sur nos serveurs.'],
        ],
    ],

    'compound-interest-calculator' => [
        'slug' => 'calculatrice-interets-composes',
        'name' => 'Calculatrice d’intérêts composés',
        'short_description' => 'Voyez comment votre épargne grandit avec les intérêts composés et des versements.',
        'description' => 'Calculez la valeur future d’un placement avec n’importe quelle fréquence de capitalisation et des versements mensuels ou annuels, avec un tableau de croissance année par année.',
        'seo_title' => 'Calcul d’intérêts composés avec versements',
        'seo_description' => 'Calculatrice d’intérêts composés gratuite. Ajoutez des versements mensuels ou annuels, choisissez la capitalisation et suivez la croissance de votre épargne.',
        'content' => <<<'HTML'
<h2>La puissance des intérêts composés</h2>
<p>Avec les intérêts composés, vos gains produisent à leur tour des gains. Sur le long terme, la courbe de croissance s’accélère : au cours des dernières années, les intérêts gagnés peuvent dépasser tout ce que vous avez versé. C’est pourquoi commencer tôt, même avec de petites sommes, compte plus que d’investir de gros montants plus tard.</p>
<h2>La règle de 72</h2>
<p>Un moyen rapide d’estimer le temps nécessaire pour doubler votre argent : divisez 72 par le taux d’intérêt annuel. À 6 %, l’argent double en 12 ans environ ; à 9 %, en 8 ans environ.</p>
<h2>Ce qui influence vos résultats</h2>
<ul>
<li>Le taux d’intérêt ou le rendement attendu.</li>
<li>La durée pendant laquelle vous restez investi.</li>
<li>Le montant et la fréquence de vos versements.</li>
<li>Les frais, les impôts et l’inflation, qui réduisent le rendement réel.</li>
</ul>
<p>Vous empruntez ? Le Simulateur de prêt montre comment les intérêts jouent contre vous.</p>
HTML,
        'steps' => [
            'Saisissez votre <strong>capital initial</strong> et le <strong>taux d’intérêt annuel</strong> attendu.',
            'Indiquez le nombre d’<strong>années</strong> de placement et la fréquence de capitalisation des intérêts.',
            'Ajoutez un <strong>versement</strong> régulier — mensuel ou annuel — ou laissez 0.',
            'Consultez la valeur future, la part venant de vos versements et celle des intérêts, ainsi que le tableau année par année. Exportez-le en CSV si besoin.',
        ],
        'faq' => [
            ['q' => 'Que sont les intérêts composés ?', 'a' => 'Ce sont des intérêts calculés à la fois sur le capital de départ et sur les intérêts déjà acquis. Sur le long terme, ils font croître l’épargne de façon exponentielle, d’où l’importance de commencer tôt.'],
            ['q' => 'Quelle est la formule des intérêts composés ?', 'a' => 'Sans versements : <code>A = P (1 + r/n)<sup>nt</sup></code>, où P est le capital, r le taux annuel, n le nombre de capitalisations par an et t le nombre d’années. Avec des versements réguliers, on ajoute la valeur future de chaque versement.'],
            ['q' => 'La fréquence de capitalisation change-t-elle beaucoup ?', 'a' => 'Une capitalisation plus fréquente rapporte un peu plus, mais l’effet reste faible comparé au taux, à la durée de placement et au montant de vos versements.'],
            ['q' => 'Quand les versements sont-ils ajoutés ?', 'a' => 'Les versements sont ajoutés à la fin de chaque mois (ou année), après application des intérêts de la période.'],
            ['q' => 'S’agit-il d’un conseil financier ?', 'a' => 'Non. Les résultats sont des estimations qui supposent un rendement constant. Les placements réels fluctuent, et les impôts et frais ne sont pas inclus.'],
        ],
    ],

    'age-calculator' => [
        'slug' => 'calculatrice-age',
        'name' => 'Calculatrice d’âge',
        'short_description' => 'Calculez l’âge exact en années, mois et jours à partir d’une date de naissance.',
        'description' => 'Saisissez une date de naissance pour obtenir l’âge exact en années, mois et jours, ainsi que le total de mois, de semaines et de jours vécus et un compte à rebours jusqu’au prochain anniversaire.',
        'seo_title' => 'Calcul d’âge exact en années, mois et jours',
        'seo_description' => 'Calculatrice d’âge gratuite. Connaissez votre âge exact en années, mois et jours, le nombre de jours vécus et le compte à rebours jusqu’à votre anniversaire.',
        'content' => <<<'HTML'
<h2>Comment l’âge exact est calculé</h2>
<p>L’âge exact compte les années civiles complètes, puis les mois complets, puis les jours restants. Comme les mois n’ont pas tous la même durée, diviser le nombre de jours par 365 donne des résultats légèrement faux ; cette calculatrice suit le calendrier.</p>
<h2>À quoi sert une calculatrice d’âge</h2>
<ul>
<li>Vérifier des conditions d’âge pour l’école, le sport, l’assurance ou la retraite.</li>
<li>Remplir des formulaires qui demandent l’âge en années et en mois.</li>
<li>Connaître le temps écoulé entre deux dates, comme un anniversaire de mariage ou la durée d’un projet.</li>
<li>Suivre le compte à rebours jusqu’au prochain anniversaire.</li>
</ul>
<p>Pour ajouter ou retirer des jours à une date, ou compter les jours ouvrés entre deux dates, utilisez la Calculatrice de dates.</p>
HTML,
        'steps' => [
            'Saisissez la <strong>date de naissance</strong>.',
            'Laissez <strong>Âge au</strong> sur la date du jour, ou choisissez une autre date pour connaître l’âge à un moment précis du passé ou du futur.',
            'Consultez l’âge exact en années, mois et jours, ainsi que le total de mois, de semaines, de jours et d’heures vécus.',
            'Consultez le compte à rebours jusqu’au prochain anniversaire et le jour de la semaine où il tombe.',
        ],
        'faq' => [
            ['q' => 'Comment l’âge exact est-il calculé ?', 'a' => 'La calculatrice compte d’abord les années complètes, puis les mois complets, puis les jours restants, en suivant le calendrier. Les mois plus courts sont correctement pris en compte.'],
            ['q' => 'Et pour les personnes nées un 29 février ?', 'a' => 'Les années sans 29 février, l’anniversaire est compté le 28 février.'],
            ['q' => 'Puis-je calculer le temps entre deux dates quelconques ?', 'a' => 'Oui. Utilisez la date de naissance comme date de début et Âge au comme date de fin. Le résultat indique les années, mois et jours exacts entre les deux.'],
            ['q' => 'Ma date de naissance est-elle enregistrée ?', 'a' => 'Non. Le calcul se fait dans votre navigateur et rien n’est envoyé sur nos serveurs.'],
        ],
    ],

    'tip-calculator' => [
        'slug' => 'calculatrice-pourboire',
        'name' => 'Calculatrice de pourboire',
        'short_description' => 'Calculez le pourboire et partagez l’addition entre plusieurs personnes.',
        'description' => 'Saisissez le montant de l’addition, choisissez le pourcentage de pourboire et le nombre de personnes pour voir le pourboire, le total et la part de chacun, avec arrondi au supérieur en option.',
        'seo_title' => 'Calculatrice de pourboire : calculer et partager',
        'seo_description' => 'Calculatrice de pourboire gratuite. Choisissez le pourcentage, partagez l’addition entre autant de personnes que vous voulez et arrondissez par personne.',
        'content' => <<<'HTML'
<h2>Guide des pourboires</h2>
<ul>
<li><strong>France, Belgique et Suisse :</strong> le service est compris dans l’addition ; laisser quelques euros ou 5–10 % pour un bon service est un geste apprécié, pas une obligation.</li>
<li><strong>Canada (Québec) :</strong> 15–20 % du montant avant taxes est la norme au restaurant.</li>
<li><strong>États-Unis :</strong> 15–20 % pour le service à table, et 20 % ou plus pour un service excellent.</li>
<li><strong>Livraison et taxis :</strong> arrondir le montant ou laisser 10 % suffit généralement.</li>
</ul>
<p>Les usages varient beaucoup d’un pays à l’autre. Dans de nombreux endroits, l’addition inclut déjà des frais de service : vérifiez-la avant d’ajouter un pourboire.</p>
<h2>Partager l’addition équitablement</h2>
<p>Quand tout le monde a commandé des montants proches, partager à parts égales est le plus simple. Si les commandes sont très différentes, chacun peut calculer sa part plus le pourboire. Arrondir au supérieur par personne évite de chercher de la monnaie et laisse un pourboire un peu plus généreux.</p>
<p>Pour d’autres calculs du quotidien, essayez la Calculatrice de pourcentage.</p>
HTML,
        'steps' => [
            'Saisissez le montant de l’addition (avec ou sans taxes, comme vous préférez).',
            'Choisissez le pourcentage de pourboire avec les boutons rapides ou saisissez une valeur personnalisée.',
            'Indiquez le nombre de personnes qui partagent l’addition.',
            'Consultez le pourboire, le total et la part de chacun. Activez <strong>Arrondir</strong> pour obtenir un montant rond par personne.',
        ],
        'faq' => [
            ['q' => 'Combien laisser de pourboire ?', 'a' => 'En France, en Belgique et en Suisse, le service est compris et le pourboire est facultatif (souvent 5–10 %). Au Québec, 15–20 % est la norme, et aux États-Unis 15–20 %. Dans de nombreux pays, l’addition inclut déjà des frais de service.'],
            ['q' => 'Le pourboire se calcule-t-il avant ou après taxes ?', 'a' => 'Le calculer sur le montant hors taxes est courant et tout à fait acceptable. Le calculer sur le total TTC est un peu plus généreux.'],
            ['q' => 'Comment l’addition est-elle partagée ?', 'a' => 'Le pourboire est ajouté à l’addition et le total est divisé à parts égales entre les personnes. Avec Arrondir activé, chaque part est arrondie à l’unité supérieure et la différence s’ajoute au pourboire.'],
            ['q' => 'Comment calculer rapidement 10 % de pourboire ?', 'a' => 'Décalez la virgule d’un rang vers la gauche. Sur une addition de 85 €, 10 % font 8,50 € ; pour 15 %, ajoutez la moitié : 8,50 + 4,25 = 12,75 €.'],
        ],
    ],

    'salary-calculator' => [
        'slug' => 'convertisseur-de-salaire',
        'name' => 'Convertisseur de salaire',
        'short_description' => 'Convertissez votre salaire entre taux horaire, hebdomadaire, mensuel et annuel.',
        'description' => 'Convertissez une rémunération entre montants horaires, journaliers, hebdomadaires, toutes les deux semaines, deux fois par mois, mensuels et annuels selon vos heures et semaines de travail.',
        'seo_title' => 'Convertisseur de salaire : horaire, mensuel, annuel',
        'seo_description' => 'Convertisseur de salaire gratuit. Passez du taux horaire au salaire annuel et inversement, avec les montants par jour, semaine et mois selon vos horaires.',
        'content' => <<<'HTML'
<h2>Comparer des offres d’emploi</h2>
<p>Les offres sont exprimées de façons différentes : un taux horaire pour un poste, un salaire annuel pour un autre. Les convertir sur la même période rend la comparaison équitable. Pensez aussi aux congés payés, aux heures supplémentaires, aux primes et aux avantages comme la mutuelle ou l’épargne salariale, qui peuvent représenter une somme importante chaque année.</p>
<h2>Conversions rapides (40 heures par semaine)</h2>
<ul>
<li>20 de l’heure ≈ 41 600 par an</li>
<li>25 de l’heure ≈ 52 000 par an</li>
<li>30 de l’heure ≈ 62 400 par an</li>
<li>50 000 par an ≈ 24,04 de l’heure</li>
</ul>
<p>En France, la durée légale est de 35 heures : ajustez simplement les heures par semaine. Vous prévoyez d’épargner une partie de votre salaire ? Voyez votre épargne grandir avec la Calculatrice d’intérêts composés.</p>
HTML,
        'steps' => [
            'Saisissez votre rémunération et ce qu’elle représente : horaire, journalière, hebdomadaire, toutes les deux semaines, deux fois par mois, mensuelle ou annuelle.',
            'Ajustez votre temps de travail : heures par semaine, jours par semaine et semaines payées par an.',
            'Voyez instantanément votre rémunération convertie sur toutes les autres périodes.',
            'Utilisez-le pour comparer offres d’emploi, taux horaires et salaires annuels sur une même base.',
        ],
        'faq' => [
            ['q' => 'Comment convertir un taux horaire en salaire annuel ?', 'a' => 'Multipliez le taux horaire par le nombre d’heures travaillées par semaine et par le nombre de semaines travaillées par an. Avec 40 heures et 52 semaines, 25 de l’heure font 25 × 40 × 52 = 52 000 par an.'],
            ['q' => 'Comment convertir un salaire annuel en taux horaire ?', 'a' => 'Divisez le salaire annuel par les heures par semaine multipliées par les semaines par an. 60 000 avec 40 heures et 52 semaines donnent 60 000 / 2 080 ≈ 28,85 de l’heure.'],
            ['q' => 'Quelle différence entre toutes les deux semaines et deux fois par mois ?', 'a' => 'Toutes les deux semaines correspond à 26 paiements par an. Deux fois par mois correspond à 24 paiements par an : chacun de ces paiements est donc un peu plus élevé.'],
            ['q' => 'Les impôts sont-ils inclus ?', 'a' => 'Non. Les résultats sont des montants bruts, avant impôts et cotisations, qui varient selon le pays et la situation personnelle.'],
            ['q' => 'Faut-il compter les semaines de congés ?', 'a' => 'Si vos congés sont payés (salaire mensuel fixe, par exemple), laissez 52 semaines. Si vos jours de repos ne sont pas rémunérés, comme pour de nombreux indépendants, réduisez le nombre de semaines payées par an.'],
        ],
    ],

    'auto-loan-calculator' => [
        'slug' => 'simulateur-credit-auto',
        'name' => 'Simulateur de crédit auto',
        'short_description' => 'Calculez votre mensualité auto avec reprise, taxes et frais.',
        'description' => 'Calculez votre mensualité de crédit auto en tenant compte de l’apport, de la reprise de votre ancien véhicule, de la taxe sur la vente et des frais du concessionnaire, et comparez des durées de 36 à 84 mois.',
        'seo_title' => 'Simulateur de crédit auto avec reprise et taxes',
        'seo_description' => 'Simulateur de crédit auto gratuit avec reprise, taxes et frais. Voyez votre mensualité et comparez les intérêts sur des durées de 36 à 84 mois.',
        'content' => <<<'HTML'
<h2>Ce qui entre dans un crédit auto</h2>
<p>Le montant emprunté correspond au prix du véhicule plus les taxes et frais du concessionnaire, moins votre apport et la valeur nette de votre ancien véhicule repris. Les frais de dossier, d’immatriculation et de carte grise s’additionnent vite : les inclure donne une mensualité réaliste avant de négocier avec le vendeur.</p>
<h2>Conseils pour payer moins</h2>
<ul>
<li>Demandez une offre de prêt à votre banque pour la comparer au financement du concessionnaire.</li>
<li>Apportez au moins 10–20 % du prix pour ne pas devoir plus que la valeur de la voiture.</li>
<li>Choisissez la durée la plus courte possible : le tableau comparatif montre les intérêts économisés.</li>
<li>Négociez le prix de la voiture séparément de la reprise et du financement.</li>
</ul>
<p>Pour d’autres emprunts, utilisez le Simulateur de prêt ; pour un logement, le Simulateur de prêt immobilier.</p>
HTML,
        'steps' => [
            'Saisissez le <strong>prix du véhicule</strong>, votre <strong>apport</strong> et, le cas échéant, la <strong>valeur de reprise</strong> de votre ancien véhicule et ce qu’il vous reste à payer dessus.',
            'Ajoutez le taux de <strong>taxe sur la vente</strong> et les <strong>frais</strong> du concessionnaire (dossier, immatriculation, carte grise).',
            'Saisissez le <strong>taux d’intérêt (TAEG)</strong> et choisissez la durée du crédit.',
            'Comparez la mensualité et le total des intérêts pour des durées de 36 à 84 mois.',
        ],
        'faq' => [
            ['q' => 'Comment la mensualité d’un crédit auto est-elle calculée ?', 'a' => 'Le montant financé est le prix plus taxes et frais, moins votre apport et la valeur nette de la reprise. La mensualité suit ensuite la formule d’amortissement standard selon votre taux et votre durée.'],
            ['q' => 'La taxe s’applique-t-elle sur le véhicule repris ?', 'a' => 'Dans de nombreux endroits (comme la plupart des États américains), la taxe ne porte que sur le prix moins la valeur de reprise, ce qui fait économiser. Là où le prix complet est taxé, décochez l’option pour calculer ainsi.'],
            ['q' => 'Et si je dois plus que la valeur de mon véhicule repris ?', 'a' => 'C’est une valeur nette négative. La différence s’ajoute à votre nouveau crédit, ce qui augmente le montant financé et les intérêts payés.'],
            ['q' => 'Une durée plus longue est-elle intéressante ?', 'a' => 'Les crédits sur 72 ou 84 mois réduisent la mensualité, mais coûtent bien plus cher en intérêts et vous pouvez devoir plus que la valeur de la voiture pendant des années. Comparez les durées dans le tableau sous les résultats.'],
            ['q' => 'Les résultats sont-ils exacts ?', 'a' => 'Ce sont des estimations. Le taux, les frais et les taxes de votre établissement déterminent les chiffres définitifs.'],
        ],
    ],

    'mortgage-calculator' => [
        'slug' => 'simulateur-pret-immobilier',
        'name' => 'Simulateur de prêt immobilier',
        'short_description' => 'Calculez votre mensualité immobilière avec taxes, assurance et PMI.',
        'description' => 'Calculez votre mensualité de prêt immobilier complète — capital, intérêts, taxe foncière, assurance habitation, PMI et charges de copropriété —, ainsi que le total des intérêts et un tableau d’amortissement annuel.',
        'seo_title' => 'Simulateur de prêt immobilier avec taxes',
        'seo_description' => 'Simulateur de prêt immobilier gratuit avec taxe foncière, assurance, PMI et charges. Voyez votre mensualité, les intérêts et l’amortissement annuel.',
        'content' => <<<'HTML'
<h2>Comprendre votre mensualité immobilière</h2>
<p>Votre coût mensuel ne se limite pas au capital et aux intérêts. Il faut aussi compter la taxe foncière et l’assurance habitation, et aux États-Unis les prêts conventionnels avec moins de 20 % d’apport ajoutent une assurance hypothécaire privée (PMI). Les copropriétés facturent en plus des charges. Tout inclure montre ce que vous paierez réellement chaque mois.</p>
<h2>Comment réduire votre mensualité</h2>
<ul>
<li><strong>Apportez 20 %</strong> pour éviter complètement le PMI.</li>
<li><strong>Soignez votre dossier</strong> avant de demander le prêt : il influence directement votre taux.</li>
<li><strong>Comparez les banques</strong> : même 0,25 % de moins fait économiser des milliers sur 30 ans.</li>
<li><strong>Envisagez 15 ans</strong> si votre budget le permet : beaucoup moins d’intérêts au total.</li>
</ul>
<p>Pour d’autres emprunts, comme un crédit auto ou personnel, utilisez le Simulateur de prêt. Pour voir comment votre épargne pourrait grandir, essayez la Calculatrice d’intérêts composés.</p>
HTML,
        'steps' => [
            'Saisissez le <strong>prix du logement</strong> et votre <strong>apport</strong>, en pourcentage ou en montant.',
            'Choisissez la <strong>durée</strong> et saisissez le <strong>taux d’intérêt</strong> proposé.',
            'Ajoutez la <strong>taxe foncière</strong>, l’<strong>assurance habitation</strong>, le <strong>PMI</strong> et les <strong>charges de copropriété</strong> pour voir votre coût mensuel réel.',
            'Consultez le détail mensuel, le total des intérêts et le tableau d’amortissement année par année.',
        ],
        'faq' => [
            ['q' => 'Que comprend la mensualité d’un prêt immobilier ?', 'a' => 'La plupart des mensualités comprennent capital et intérêts, et beaucoup incluent aussi la taxe foncière et l’assurance. Aux États-Unis, un apport inférieur à 20 % implique généralement un PMI, et les copropriétés peuvent ajouter des charges.'],
            ['q' => 'Qu’est-ce que le PMI et quand s’arrête-t-il ?', 'a' => 'L’assurance hypothécaire privée (PMI) protège le prêteur quand l’apport est inférieur à 20 % sur un prêt conventionnel américain. Elle coûte de 0,3 % à 1,5 % du prêt par an et s’arrête automatiquement quand le solde atteint 78 % de la valeur d’origine du logement. Le simulateur estime pendant combien de mois vous la paierez.'],
            ['q' => 'Vaut-il mieux emprunter sur 15 ou 30 ans ?', 'a' => 'Sur 15 ans, les mensualités sont plus élevées mais le taux est plus bas et le total des intérêts chute fortement. Sur 30 ans, les mensualités sont plus faibles et plus souples. Comparez les deux en changeant la durée.'],
            ['q' => 'Quel logement puis-je m’offrir ?', 'a' => 'En France, les banques limitent en général le taux d’endettement à 35 % des revenus nets, assurance comprise ; ailleurs, on retient souvent 28 % du revenu brut pour le logement. Les prêteurs examinent l’ensemble de votre situation financière.'],
            ['q' => 'Les résultats sont-ils exacts ?', 'a' => 'Ce sont des estimations pour vous aider à planifier. Taxes, assurances, PMI et frais de notaire varient selon le lieu, l’établissement et votre profil.'],
        ],
    ],

    'date-calculator' => [
        'slug' => 'calculatrice-de-dates',
        'name' => 'Calculatrice de dates',
        'short_description' => 'Comptez les jours entre deux dates ou ajoutez et retirez jours, semaines et mois.',
        'description' => 'Calculez le nombre de jours, de semaines, de mois et de jours ouvrés entre deux dates, ou ajoutez et retirez des jours, semaines, mois et années pour obtenir une date future ou passée.',
        'seo_title' => 'Calculatrice de dates : jours entre deux dates',
        'seo_description' => 'Comptez les jours entre deux dates, jours ouvrés compris, ou ajoutez et retirez des jours, semaines et mois à n’importe quelle date. Gratuit et instantané.',
        'content' => <<<'HTML'
<h2>Usages courants</h2>
<ul>
<li><strong>Échéances :</strong> quelle date tombe dans 30 jours ouvrés ?</li>
<li><strong>Comptes à rebours :</strong> combien de jours avant un mariage, un examen, un voyage ou un lancement ?</li>
<li><strong>Contrats et préavis :</strong> la date tombant 90 jours après la signature.</li>
<li><strong>Grossesse, garanties et abonnements :</strong> ajouter des semaines ou des mois à une date de départ.</li>
<li><strong>Gestion de projet :</strong> le nombre de jours ouvrés entre deux jalons.</li>
</ul>
<h2>Comment les mois sont comptés</h2>
<p>Ajouter des mois suit le calendrier, pas un nombre fixe de jours. Un mois après le 15 mars, c’est le 15 avril, quelle que soit la longueur du mois. Quand le jour n’existe pas — comme le 30 février — le dernier jour du mois est utilisé.</p>
<p>Pour connaître l’âge exact de quelqu’un et son prochain anniversaire, utilisez la Calculatrice d’âge.</p>
HTML,
        'steps' => [
            'Choisissez <strong>Jours entre deux dates</strong> pour mesurer l’écart entre deux dates, ou <strong>Ajouter ou soustraire</strong> pour obtenir une date future ou passée.',
            'Choisissez les dates dans le calendrier ou saisissez-les.',
            'Activez <strong>Inclure la date de fin</strong> quand le premier et le dernier jour comptent tous les deux, par exemple pour une réservation ou un projet.',
            'Utilisez <strong>Jours ouvrés uniquement</strong> pour ignorer samedis et dimanches, par exemple pour calculer un délai.',
        ],
        'faq' => [
            ['q' => 'Combien de jours entre deux dates ?', 'a' => 'Saisissez les deux dates dans Jours entre deux dates. Le résultat indique le nombre total de jours, la même durée en semaines, mois et années, ainsi que le nombre de jours ouvrés.'],
            ['q' => 'Faut-il inclure la date de fin ?', 'a' => 'Par défaut, la calculatrice compte les jours de la date de début à la date de fin, comme des nuits d’hôtel. Incluez la date de fin quand les deux jours comptent, comme pour un événement de 3 jours du lundi au mercredi.'],
            ['q' => 'Qu’est-ce qui compte comme jour ouvré ?', 'a' => 'Du lundi au vendredi. Les jours fériés ne sont pas exclus, car ils varient selon le pays : retirez-les manuellement si nécessaire.'],
            ['q' => 'Que se passe-t-il si j’ajoute un mois au 31 janvier ?', 'a' => 'Le résultat est le dernier jour de février (28 ou 29), car février n’a pas de 31. C’est ainsi que procèdent les banques et la plupart des calendriers.'],
            ['q' => 'Puis-je calculer l’âge de quelqu’un ?', 'a' => 'Oui, mais la Calculatrice d’âge est faite pour cela et affiche aussi le compte à rebours jusqu’au prochain anniversaire.'],
        ],
    ],

    'debt-payoff-calculator' => [
        'slug' => 'calculatrice-remboursement-dettes',
        'name' => 'Calculatrice de remboursement de dettes',
        'short_description' => 'Planifiez la fin de vos dettes avec la méthode avalanche ou boule de neige.',
        'description' => 'Ajoutez vos cartes de crédit et vos prêts pour voir quand vous serez libéré de vos dettes et combien d’intérêts vous paierez avec les méthodes avalanche et boule de neige, comparé au paiement des seuls minimums.',
        'seo_title' => 'Remboursement de dettes : avalanche ou boule de neige',
        'seo_description' => 'Calculatrice de dettes gratuite. Comparez avalanche et boule de neige, voyez quand vous serez sans dettes et ce que les paiements en plus font économiser.',
        'content' => <<<'HTML'
<h2>Avalanche ou boule de neige ?</h2>
<p>Les deux méthodes paient le minimum de chaque dette et consacrent tout l’argent supplémentaire à une dette cible. L’<strong>avalanche</strong> s’attaque d’abord au taux le plus élevé, ce qui revient toujours le moins cher. La <strong>boule de neige</strong> s’attaque d’abord au plus petit solde : vous soldez des comptes plus vite, un coup de pouce motivant qui aide beaucoup de gens à tenir le plan. La meilleure méthode est celle que vous suivrez.</p>
<h2>Conseils pour sortir plus vite de vos dettes</h2>
<ul>
<li>Arrêtez les nouveaux achats avec les cartes que vous remboursez.</li>
<li>Demandez un taux plus bas à votre banque : cela marche souvent si vous payez à l’heure.</li>
<li>Envisagez un rachat de crédits à un taux plus faible, en vérifiant d’abord les frais.</li>
<li>Affectez les revenus exceptionnels, comme un remboursement d’impôt ou une prime, directement à la dette cible.</li>
</ul>
<p>Vous allez souscrire un nouveau prêt ? Le Simulateur de prêt montre son coût total avant de signer.</p>
HTML,
        'steps' => [
            'Listez vos dettes avec leur <strong>solde</strong>, leur <strong>taux d’intérêt (TAEG)</strong> et leur <strong>paiement minimum</strong>.',
            'Indiquez combien vous pouvez payer <strong>en plus</strong> chaque mois au-delà des minimums.',
            'Comparez les méthodes <strong>avalanche</strong> et <strong>boule de neige</strong> au paiement des seuls minimums.',
            'Suivez l’ordre de remboursement de la méthode choisie. Quand une dette est soldée, son paiement passe à la suivante.',
        ],
        'faq' => [
            ['q' => 'Qu’est-ce que la méthode avalanche ?', 'a' => 'Avec la méthode avalanche, vous payez le minimum de chaque dette et placez tout l’argent supplémentaire sur la dette au taux le plus élevé. C’est celle qui fait économiser le plus d’intérêts.'],
            ['q' => 'Qu’est-ce que la méthode boule de neige ?', 'a' => 'Avec la méthode boule de neige, vous placez l’argent supplémentaire d’abord sur le plus petit solde. Vous payez un peu plus d’intérêts, mais les victoires rapides gardent beaucoup de gens motivés.'],
            ['q' => 'Que signifie un paiement qui « passe » à la dette suivante ?', 'a' => 'Quand une dette est soldée, l’argent que vous y consacriez s’ajoute à la suivante. Votre paiement mensuel total reste le même : le rythme de remboursement s’accélère donc avec le temps.'],
            ['q' => 'Pourquoi est-il indiqué que ma dette ne sera jamais remboursée ?', 'a' => 'Si vos paiements sont inférieurs aux intérêts facturés chaque mois, le solde ne baisse jamais. Augmentez le paiement minimum ou le paiement supplémentaire.'],
            ['q' => 'Mes informations financières sont-elles enregistrées ?', 'a' => 'Non. Tout est calculé dans votre navigateur et rien n’est envoyé sur nos serveurs.'],
        ],
    ],
];
