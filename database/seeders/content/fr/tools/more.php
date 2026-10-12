<?php

/*
| French copy for converters, generators, health calculators and everyday
| tools. See content/fr/tools.php.
*/

return [
    'json-to-csv' => [
        'slug' => 'json-en-csv',
        'name' => 'JSON en CSV',
        'short_description' => 'Convertissez des tableaux JSON en CSV pour Excel et Google Sheets.',
        'description' => 'Convertissez du JSON en CSV instantanément. Les objets imbriqués deviennent des colonnes et vous pouvez choisir la virgule, le point-virgule, la tabulation ou la barre verticale comme délimiteur.',
        'seo_title' => 'Convertir JSON en CSV gratuitement pour Excel',
        'seo_description' => 'Convertissez du JSON en CSV gratuitement. Aplatit les objets imbriqués, gère virgule, point-virgule et tabulation, et télécharge un CSV prêt à ouvrir.',
        'content' => <<<'HTML'
<h2>Ouvrez des données JSON dans Excel ou Google Sheets</h2>
<p>Les API et les bases de données exportent du JSON, alors que les tableurs travaillent en lignes et en colonnes. Convertir du JSON en CSV permet de trier, filtrer, créer des graphiques et partager les données avec des personnes qui ne codent pas.</p>
<h2>Comment la conversion traite vos données</h2>
<ul>
<li>Chaque objet du tableau devient une ligne.</li>
<li>Chaque clé présente dans au moins un objet devient une colonne.</li>
<li>Les objets imbriqués sont aplatis, par exemple <code>address.city</code>.</li>
<li>Les valeurs qu’un tableur pourrait interpréter comme des formules sont neutralisées par sécurité.</li>
</ul>
<p>Votre JSON est invalide ? Corrigez-le d’abord avec le Formateur JSON. Besoin de faire l’inverse ? Utilisez CSV en JSON.</p>
HTML,
        'steps' => [
            'Collez un tableau JSON d’objets (ou un seul objet) dans l’entrée, ou cliquez sur <strong>Charger un exemple</strong>.',
            'Choisissez le délimiteur : virgule pour la plupart des outils, point-virgule pour Excel dans les pays qui utilisent la virgule décimale (comme la France), ou tabulation pour du TSV.',
            'Le CSV apparaît instantanément. Les objets imbriqués deviennent des colonnes comme <code>address.city</code>.',
            'Copiez le CSV ou téléchargez-le en fichier <code>.csv</code>, prêt pour Excel, Google Sheets ou Numbers.',
        ],
        'faq' => [
            ['q' => 'Quelle structure JSON fonctionne le mieux ?', 'a' => 'Un tableau d’objets, comme <code>[{&quot;name&quot;: &quot;Ada&quot;}, {&quot;name&quot;: &quot;Alan&quot;}]</code>. Chaque objet devient une ligne et chaque clé une colonne. Les objets aux clés différentes sont fusionnés ; les valeurs manquantes restent vides.'],
            ['q' => 'Comment les objets et tableaux imbriqués sont-ils gérés ?', 'a' => 'Les objets imbriqués sont aplatis en notation pointée (<code>address.city</code>). Les tableaux sont écrits dans la cellule sous forme de texte JSON pour ne perdre aucune donnée.'],
            ['q' => 'Pourquoi utiliser le point-virgule comme délimiteur ?', 'a' => 'Dans les pays où la virgule est le séparateur décimal (comme la France, la Belgique ou le Canada francophone), Excel attend des fichiers séparés par des points-virgules. Choisissez le point-virgule si toutes les colonnes apparaissent collées à l’ouverture.'],
            ['q' => 'Puis-je ouvrir le CSV dans Excel sans risque ?', 'a' => 'Oui. Les valeurs qui commencent par <code>=</code>, <code>+</code>, <code>-</code> ou <code>@</code> sont précédées d’une apostrophe pour empêcher l’injection de formules.'],
            ['q' => 'Mes données sont-elles envoyées sur Internet ?', 'a' => 'Non. La conversion se fait entièrement dans votre navigateur.'],
        ],
    ],

    'csv-to-json' => [
        'slug' => 'csv-en-json',
        'name' => 'CSV en JSON',
        'short_description' => 'Convertissez du CSV ou des données de tableur en JSON propre.',
        'description' => 'Collez un CSV ou des données copiées depuis Excel et obtenez un tableau JSON d’objets. Les délimiteurs sont détectés automatiquement et les nombres et booléens convertis en vrais types.',
        'seo_title' => 'Convertir CSV en JSON en ligne gratuitement',
        'seo_description' => 'Convertissez du CSV en JSON gratuitement. Détecte les délimiteurs, gère les champs entre guillemets, convertit nombres et booléens et fonctionne avec Excel.',
        'content' => <<<'HTML'
<h2>Pourquoi convertir du CSV en JSON ?</h2>
<p>Le JSON est le format que comprennent nativement les applications web, les API et JavaScript. Convertir un export de tableur en JSON facilite l’alimentation d’une base de données, la simulation d’une réponse d’API, l’import de données dans un CMS ou le chargement d’une configuration dans une application.</p>
<h2>Des données propres, de vrais types</h2>
<p>Avec la détection des types, les nombres deviennent des nombres et <code>true</code>/<code>false</code> des booléens, tandis que des valeurs comme les codes postaux commençant par zéro restent du texte. Les champs entre guillemets contenant des virgules et des retours à la ligne sont correctement interprétés.</p>
<p>Vous voulez vérifier ou embellir le résultat ? Collez-le dans le Formateur JSON. Pour revenir à un tableur, utilisez JSON en CSV.</p>
HTML,
        'steps' => [
            'Collez vos données CSV dans l’entrée ou cliquez sur <strong>Charger un exemple</strong>. Vous pouvez coller directement depuis Excel ou Google Sheets.',
            'Laissez le délimiteur sur <strong>Automatique</strong> ou choisissez virgule, point-virgule, tabulation ou barre verticale.',
            'Laissez <strong>La première ligne est l’en-tête</strong> activé pour obtenir un tableau d’objets, ou désactivez-le pour un tableau de tableaux.',
            'Avec <strong>Détecter les types</strong>, les nombres et true/false deviennent de vraies valeurs JSON. Copiez ou téléchargez le résultat en <code>.json</code>.',
        ],
        'faq' => [
            ['q' => 'Puis-je coller des données copiées depuis Excel ou Google Sheets ?', 'a' => 'Oui. Les données d’un tableur sont copiées sous forme de texte séparé par des tabulations, que le délimiteur automatique détecte.'],
            ['q' => 'Comment les guillemets et retours à la ligne dans les cellules sont-ils gérés ?', 'a' => 'L’analyseur suit la norme CSV (RFC 4180) : les champs entre guillemets doubles peuvent contenir des virgules, des retours à la ligne et des guillemets échappés (<code>&quot;&quot;</code>).'],
            ['q' => 'Pourquoi certains nombres restent-ils du texte ?', 'a' => 'Les valeurs commençant par zéro, comme les codes postaux ou des identifiants du type <code>007</code>, restent du texte pour ne pas perdre d’information. Les nombres très longs restent aussi du texte pour éviter les erreurs de précision.'],
            ['q' => 'Que deviennent les noms de colonnes en double ou vides ?', 'a' => 'Les en-têtes en double reçoivent un suffixe (<code>name_2</code>) et les vides sont nommés <code>column_N</code> : toutes les valeurs sont conservées.'],
            ['q' => 'Mes données restent-elles privées ?', 'a' => 'Oui. La conversion se fait dans votre navigateur et vos données ne sont jamais envoyées.'],
        ],
    ],

    'unit-converter' => [
        'slug' => 'convertisseur-unites',
        'name' => 'Convertisseur d’unités',
        'short_description' => 'Convertissez longueurs, poids, températures, volumes, surfaces, vitesses et plus.',
        'description' => 'Convertissez instantanément entre unités métriques et impériales : kilomètres en miles, kilos en livres, Celsius en Fahrenheit, tasses en millilitres, pieds carrés en mètres carrés, Mo en Go et bien plus.',
        'seo_title' => 'Convertisseur d’unités : longueur, poids et plus',
        'seo_description' => 'Convertisseur d’unités gratuit : longueur, poids, température, volume, surface, vitesse, temps et données. Unités métriques et impériales, résultats précis.',
        'content' => <<<'HTML'
<h2>Système métrique et impérial</h2>
<p>La majeure partie du monde utilise le système métrique (mètres, kilos, litres, °C), tandis que les États-Unis utilisent surtout des unités traditionnelles (pieds, livres, gallons, °F) et que le Royaume-Uni mélange les deux. Recettes, voyages, achats en ligne, plans de construction et devoirs de sciences obligent sans cesse à passer de l’un à l’autre.</p>
<h2>Valeurs de référence utiles</h2>
<ul>
<li>1 pouce = 2,54 cm · 1 pied = 30,48 cm · 1 mile = 1,609 km</li>
<li>1 kg = 2,2046 lb · 1 once = 28,35 g</li>
<li>1 tasse (US) = 236,6 ml · 1 cuillère à soupe = 3 cuillères à café</li>
<li>0 °C = 32 °F · 100 °C = 212 °F</li>
<li>1 acre = 43 560 pi² · 1 hectare = 2,471 acres</li>
</ul>
<p>Vous travaillez avec des dates plutôt qu’avec des mesures ? Essayez la Calculatrice de dates. Pour l’argent, la Calculatrice de pourcentage gère remises et hausses.</p>
HTML,
        'steps' => [
            'Choisissez une catégorie : longueur, poids, température, volume, surface, vitesse, temps ou données.',
            'Saisissez une valeur et choisissez les unités de <strong>départ</strong> et d’<strong>arrivée</strong>.',
            'Le résultat se met à jour instantanément. Utilisez <strong>Inverser</strong> pour inverser la conversion.',
            'Retrouvez la même valeur dans toutes les autres unités de la catégorie dans le tableau ci-dessous.',
        ],
        'faq' => [
            ['q' => 'Combien de centimètres dans un pouce ?', 'a' => 'Exactement 2,54 centimètres. Un pied mesure 30,48 cm et un mile 1,609344 kilomètre : ce sont des définitions internationales exactes.'],
            ['q' => 'Comment convertir des Celsius en Fahrenheit ?', 'a' => 'Multipliez par 9/5 et ajoutez 32 : °F = °C × 9/5 + 32. Par exemple, 20 °C font 68 °F. Pour l’inverse, retirez 32 et multipliez par 5/9.'],
            ['q' => 'Combien de livres dans un kilo ?', 'a' => 'Un kilogramme équivaut à environ 2,2046 livres, et une livre vaut exactement 0,45359237 kilogramme.'],
            ['q' => 'Les tasses et gallons sont-ils américains ou britanniques ?', 'a' => 'Les tasses, onces liquides, pintes, quarts et gallons utilisent les mesures américaines. Les gallons britanniques (impériaux) sont listés à part car ils sont environ 20 % plus grands.'],
            ['q' => 'Quelle différence entre Mo et Mio ?', 'a' => 'Un mégaoctet (Mo) vaut 1 000 000 d’octets, la mesure des fabricants de stockage. Un mébioctet (Mio) vaut 1 048 576 octets (1024²), celle de nombreux systèmes d’exploitation. C’est pourquoi un disque de 1 To affiche environ 931 Gio.'],
        ],
    ],

    'qr-generator' => [
        'slug' => 'generateur-qr-code',
        'name' => 'Générateur de QR code',
        'short_description' => 'Créez des QR codes pour des liens, du texte, un e-mail, un téléphone ou le Wi-Fi.',
        'description' => 'Générez des QR codes personnalisés avec vos couleurs, votre taille et votre marge, et téléchargez-les en PNG ou en SVG. Gratuit, sans compte et sans rien envoyer à un serveur.',
        'seo_title' => 'Générateur de QR code gratuit en PNG et SVG',
        'seo_description' => 'Créez des QR codes gratuits pour URL, texte, e-mail, téléphone et Wi-Fi. Couleurs, taille et marge au choix. Téléchargement PNG ou SVG, sans inscription.',
        'content' => <<<'HTML'
<h2>Que faire avec un QR code ?</h2>
<ul>
<li><strong>URL</strong> : renvoyez vers un site, un menu, un portfolio ou une page d’avis.</li>
<li><strong>Wi-Fi</strong> : laissez vos invités se connecter à votre réseau sans saisir le mot de passe.</li>
<li><strong>E-mail et téléphone</strong> : lancez un e-mail ou un appel en un seul scan.</li>
<li><strong>Texte</strong> : partagez une courte note, un code promo ou un numéro de série.</li>
</ul>
<h2>Conseils pour un QR code toujours lisible</h2>
<p>Gardez un bon contraste — un code foncé sur fond clair — et laissez une marge libre tout autour. Imprimez-le à au moins 2 × 2 cm, et plus grand s’il doit être scanné de loin, comme sur une affiche. Choisissez un niveau de correction d’erreurs plus élevé si le code risque d’être rayé ou partiellement masqué.</p>
<p>Les codes créés ici sont statiques et gratuits pour toujours : ils n’expirent pas et ne dépendent pas de notre site pour fonctionner.</p>
HTML,
        'steps' => [
            'Choisissez le contenu du QR code : une <strong>URL</strong>, du <strong>texte</strong>, un <strong>e-mail</strong>, un numéro de <strong>téléphone</strong> ou les informations d’un réseau <strong>Wi-Fi</strong>.',
            'Renseignez les informations. L’aperçu se met à jour instantanément pendant la saisie.',
            'Personnalisez la taille, la marge et les couleurs. Gardez une couleur foncée sur un fond clair pour que tous les téléphones puissent le lire.',
            'Téléchargez votre QR code en <strong>PNG</strong> pour les documents et les réseaux sociaux, ou en <strong>SVG</strong> pour l’impression et les outils de design.',
        ],
        'faq' => [
            ['q' => 'Ces QR codes expirent-ils ?', 'a' => 'Non. Les QR codes sont statiques : le contenu est encodé directement dans l’image, ils fonctionnent donc pour toujours et ne dépendent pas de notre site.'],
            ['q' => 'Faut-il télécharger en PNG ou en SVG ?', 'a' => 'Utilisez le PNG pour les sites web, les documents et les réseaux sociaux. Utilisez le SVG pour l’impression, les affiches et les outils de design : c’est un format vectoriel qui reste parfaitement net à toutes les tailles.'],
            ['q' => 'Comment fonctionne le QR code Wi-Fi ?', 'a' => 'Scanné avec l’appareil photo du téléphone, le QR code Wi-Fi propose de se connecter automatiquement au réseau, sans saisir le mot de passe. Il fonctionne avec les iPhone et Android récents.'],
            ['q' => 'Qu’est-ce que le niveau de correction d’erreurs ?', 'a' => 'La correction d’erreurs permet à un QR code de rester lisible même si une partie est abîmée ou masquée. Les niveaux élevés (Q, H) sont plus robustes, mais le code devient plus dense. M est un bon choix par défaut.'],
            ['q' => 'Mes données sont-elles enregistrées ?', 'a' => 'Non. Les QR codes sont générés dans votre navigateur. Vos URL, messages et mots de passe Wi-Fi ne sont jamais envoyés sur nos serveurs.'],
        ],
    ],

    'password-generator' => [
        'slug' => 'generateur-mot-de-passe',
        'name' => 'Générateur de mots de passe',
        'short_description' => 'Créez des mots de passe robustes et aléatoires, de la longueur et avec les caractères voulus.',
        'description' => 'Générez des mots de passe aléatoires robustes en choisissant la longueur, les majuscules, les minuscules, les chiffres et les symboles. Voyez leur robustesse en bits et créez jusqu’à 50 mots de passe à la fois.',
        'seo_title' => 'Générateur de mots de passe robustes et aléatoires',
        'seo_description' => 'Générez des mots de passe robustes et aléatoires. Choisissez la longueur et les caractères, excluez les caractères semblables et vérifiez la robustesse.',
        'content' => <<<'HTML'
<h2>Qu’est-ce qui rend un mot de passe robuste ?</h2>
<p>La robustesse dépend surtout de la <strong>longueur</strong> et du caractère <strong>aléatoire</strong>. Un mot de passe aléatoire de 16 caractères mêlant lettres, chiffres et symboles dépasse 100 bits d’entropie, bien au-delà de ce qu’un attaquant peut deviner. Les mots de passe inventés par des humains, comme des noms, des dates ou des mots suivis d’un chiffre, restent prévisibles, aussi astucieux qu’ils paraissent.</p>
<h2>Bonnes pratiques</h2>
<ul>
<li>Utilisez un mot de passe différent pour chaque compte.</li>
<li>Stockez vos mots de passe dans un gestionnaire plutôt que de les réutiliser.</li>
<li>Activez la double authentification (2FA) pour votre messagerie, votre banque et vos réseaux sociaux.</li>
<li>Changez immédiatement de mot de passe si un service signale une fuite de données.</li>
</ul>
<p>Besoin d’identifiants uniques plutôt que de secrets ? Essayez le Générateur d’UUID.</p>
HTML,
        'steps' => [
            'Choisissez la <strong>longueur</strong> du mot de passe. 16 caractères ou plus sont recommandés pour les comptes importants.',
            'Sélectionnez les caractères à inclure : minuscules, majuscules, chiffres et symboles.',
            'Si vous devez taper le mot de passe à la main, vous pouvez exclure les caractères semblables comme <code>l</code>, <code>1</code>, <code>O</code> et <code>0</code>.',
            'Copiez votre mot de passe en un clic. Cliquez sur <strong>Générer</strong> pour en obtenir un autre, ou créez-en jusqu’à 50 à la fois.',
        ],
        'faq' => [
            ['q' => 'Ces mots de passe sont-ils sûrs ?', 'a' => 'Oui. Ils sont générés dans votre navigateur avec la Web Crypto API, un générateur de nombres aléatoires cryptographiquement sûr, et ne sont jamais envoyés ni stockés sur un serveur.'],
            ['q' => 'Quelle longueur pour un mot de passe ?', 'a' => 'Au moins 12 caractères, et 16 ou plus pour la messagerie, la banque et le mot de passe maître de votre gestionnaire. La longueur apporte plus de sécurité que la complexité.'],
            ['q' => 'Que signifie la robustesse en bits ?', 'a' => 'L’entropie mesure le nombre d’essais nécessaires à un attaquant. Chaque bit supplémentaire double le travail. Plus de 60 bits suffit pour la plupart des comptes, et plus de 80 bits résiste même aux attaques hors ligne.'],
            ['q' => 'Puis-je réutiliser un mot de passe robuste ?', 'a' => 'Non. Utilisez un mot de passe unique par compte et stockez-les dans un gestionnaire de mots de passe. Si un site subit une fuite, vos autres comptes restent protégés.'],
            ['q' => 'Chaque type de caractère est-il garanti ?', 'a' => 'Oui. Chaque mot de passe contient au moins un caractère de chaque type sélectionné.'],
        ],
    ],

    'uuid-generator' => [
        'slug' => 'generateur-uuid',
        'name' => 'Générateur d’UUID',
        'short_description' => 'Générez des UUID v4 aléatoires et v7 ordonnés dans le temps, en masse.',
        'description' => 'Générez jusqu’à 1000 UUID (GUID) à la fois en version 4 ou 7, en majuscules, sans tirets ou entre accolades, et validez des UUID existants.',
        'seo_title' => 'Générateur d’UUID v4 et v7 (GUID) en masse',
        'seo_description' => 'Générez des UUID v4 et v7 en masse, en majuscules, sans tirets ou entre accolades style GUID. Cryptographiquement sûrs et créés dans le navigateur.',
        'content' => <<<'HTML'
<h2>Quand utiliser des UUID</h2>
<p>Les UUID sont idéaux quand des identifiants doivent être créés à plusieurs endroits sans compteur central : bases de données distribuées, applications hors ligne, files de messages, noms de fichiers et identifiants publics qui ne doivent pas révéler le nombre d’enregistrements.</p>
<h2>Les versions d’UUID en bref</h2>
<ul>
<li><strong>v4</strong> : 122 bits aléatoires ; la plus compatible.</li>
<li><strong>v7</strong> : commence par un timestamp Unix, les identifiants sont donc triés par date de création et gardent les index de base de données efficaces.</li>
<li><strong>v1</strong> : basée sur l’heure et la machine ; largement remplacée par la v7.</li>
</ul>
<p>Besoin de secrets aléatoires plutôt que d’identifiants ? Utilisez le Générateur de mots de passe.</p>
HTML,
        'steps' => [
            'Choisissez le nombre d’UUID nécessaires (jusqu’à 1000 à la fois).',
            'Choisissez la version : <strong>v4</strong> (aléatoire, la plus courante) ou <strong>v7</strong> (ordonnée dans le temps, idéale pour les clés de base de données).',
            'Si vous le souhaitez, passez en majuscules, retirez les tirets ou placez chaque UUID entre accolades.',
            'Copiez la liste ou téléchargez-la en fichier texte. Cliquez sur <strong>Générer</strong> pour un nouveau lot.',
        ],
        'faq' => [
            ['q' => 'Qu’est-ce qu’un UUID ?', 'a' => 'Un UUID (identifiant unique universel), aussi appelé GUID, est un identifiant de 128 bits écrit sous forme de 32 chiffres hexadécimaux, par exemple <code>123e4567-e89b-42d3-a456-426614174000</code>. On peut le générer n’importe où sans coordination et il est unique en pratique.'],
            ['q' => 'UUID v4 ou v7 ?', 'a' => 'La v4 est entièrement aléatoire et fonctionne partout. La v7 commence par un timestamp : les nouveaux identifiants sont triés par date de création, ce qui rend les index de base de données plus rapides et plus compacts. Utilisez la v7 pour les clés primaires quand votre stack la prend en charge.'],
            ['q' => 'Ces UUID sont-ils sûrs et uniques ?', 'a' => 'Ils sont générés avec le générateur de nombres aléatoires cryptographiquement sûr de votre navigateur (Web Crypto API). La probabilité d’une collision en v4 est astronomiquement faible.'],
            ['q' => 'Un GUID est-il la même chose qu’un UUID ?', 'a' => 'Oui. GUID est le nom utilisé par Microsoft pour le même format d’identifiant de 128 bits. Utilisez les options majuscules et accolades pour obtenir le style GUID classique <code>{XXXXXXXX-...}</code>.'],
        ],
    ],

    'random-number-generator' => [
        'slug' => 'generateur-nombres-aleatoires',
        'name' => 'Générateur de nombres aléatoires',
        'short_description' => 'Générez des nombres aléatoires dans n’importe quelle plage, avec ou sans doublons.',
        'description' => 'Générez un ou des milliers de nombres vraiment aléatoires dans n’importe quelle plage, sans doublons et avec options de tri. Inclut des raccourcis pour lancer un dé ou tirer des numéros de loto.',
        'seo_title' => 'Générateur de nombres aléatoires sans doublons',
        'seo_description' => 'Générateur de nombres aléatoires gratuit. Tirez des nombres dans n’importe quelle plage, avec ou sans doublons, triés ou non. Sûr et instantané.',
        'content' => <<<'HTML'
<h2>Usages populaires</h2>
<ul>
<li><strong>Tirages au sort et tombolas :</strong> tirez des numéros de billets gagnants sans doublons.</li>
<li><strong>Jeux :</strong> lancez un dé ou choisissez un nombre entre 1 et 10.</li>
<li><strong>Numéros de loto :</strong> générez cinq numéros différents entre 1 et 49.</li>
<li><strong>Enseignement et recherche :</strong> sélectionnez des échantillons aléatoires ou répartissez des groupes.</li>
</ul>
<h2>Vraiment aléatoire et équitable</h2>
<p>De nombreux générateurs simples utilisent des fonctions pseudo-aléatoires prévisibles. Celui-ci utilise le générateur cryptographiquement sûr de votre navigateur et évite le léger biais des méthodes naïves : chaque nombre de la plage a la même probabilité. Pour tirer au sort des noms plutôt que des nombres, utilisez le Tirage au sort de noms. Pour des mots de passe aléatoires robustes, utilisez le Générateur de mots de passe.</p>
HTML,
        'steps' => [
            'Définissez la valeur <strong>minimale</strong> et <strong>maximale</strong> (toutes deux incluses), ou choisissez un raccourci comme un lancer de dé ou un tirage de loto.',
            'Choisissez combien de nombres il vous faut : jusqu’à 10 000 à la fois.',
            'Activez <strong>Sans doublons</strong> pour les tombolas et tirages au sort, et triez les résultats si vous le souhaitez.',
            'Cliquez sur <strong>Générer</strong> et copiez les nombres.',
        ],
        'faq' => [
            ['q' => 'Ces nombres sont-ils vraiment aléatoires ?', 'a' => 'Ils sont générés avec le générateur de nombres aléatoires cryptographiquement sûr de votre navigateur (Web Crypto API), avec un échantillonnage sans biais pour que chaque nombre de la plage ait la même probabilité.'],
            ['q' => 'Puis-je l’utiliser pour une tombola ou un tirage au sort ?', 'a' => 'Oui. Numérotez les participations, définissez la plage de 1 au nombre de participations, activez Sans doublons et générez autant de gagnants que nécessaire. Pour des noms, utilisez le Tirage au sort de noms.'],
            ['q' => 'Le minimum et le maximum sont-ils inclus ?', 'a' => 'Oui. Une plage de 1 à 6 peut donner 1, 2, 3, 4, 5 ou 6, comme un dé.'],
            ['q' => 'Puis-je générer des nombres négatifs ?', 'a' => 'Oui. Utilisez un minimum négatif, par exemple de −50 à 50.'],
        ],
    ],

    'bmi-calculator' => [
        'slug' => 'calculatrice-imc',
        'name' => 'Calculatrice d’IMC',
        'short_description' => 'Calculez votre indice de masse corporelle et votre fourchette de poids santé.',
        'description' => 'Calculez votre IMC en unités métriques ou américaines, voyez votre catégorie et la fourchette de poids santé pour votre taille, selon les références pour adultes de l’OMS et des CDC.',
        'seo_title' => 'Calcul d’IMC pour adultes',
        'seo_description' => 'Calculatrice d’IMC gratuite pour adultes, en kilos ou en livres. Découvrez votre indice de masse corporelle, sa catégorie et le poids santé pour votre taille.',
        'content' => <<<'HTML'
<h2>Ce que signifie votre IMC</h2>
<p>L’indice de masse corporelle compare votre poids à votre taille pour obtenir un seul chiffre que les organismes de santé utilisent pour classer le poids. Chez la plupart des adultes, un IMC entre 18,5 et 24,9 est associé aux risques les plus faibles pour la santé, tandis que des valeurs plus élevées sont liées à un risque accru de maladies comme le diabète de type 2 et les maladies cardiovasculaires.</p>
<h2>Les limites de l’IMC</h2>
<ul>
<li>Il ne distingue pas le muscle de la graisse : les personnes musclées peuvent apparaître en surpoids.</li>
<li>Il n’indique pas où se répartit la graisse ; le tour de taille est une autre mesure utile.</li>
<li>Les fourchettes santé peuvent varier selon l’âge, le sexe et l’origine ethnique.</li>
</ul>
<p>Pour transformer votre objectif en plan quotidien, estimez vos besoins énergétiques avec la Calculatrice de calories.</p>
HTML,
        'steps' => [
            'Choisissez <strong>Métrique</strong> (kilos et centimètres) ou <strong>Unités américaines</strong> (livres, pieds et pouces).',
            'Saisissez votre poids et votre taille. Le résultat se met à jour pendant la saisie.',
            'Consultez votre IMC, sa catégorie et sa position sur l’échelle.',
            'Consultez la fourchette de poids santé pour votre taille.',
        ],
        'faq' => [
            ['q' => 'Comment l’IMC est-il calculé ?', 'a' => 'L’indice de masse corporelle est votre poids en kilos divisé par le carré de votre taille en mètres (kg/m²). En unités américaines, cela équivaut à 703 × livres ÷ pouces².'],
            ['q' => 'Quelles sont les catégories d’IMC pour les adultes ?', 'a' => 'Moins de 18,5 : insuffisance pondérale ; 18,5–24,9 : poids normal ; 25–29,9 : surpoids ; 30 ou plus : obésité, selon l’Organisation mondiale de la santé et les CDC.'],
            ['q' => 'L’IMC est-il fiable ?', 'a' => 'L’IMC est un outil de dépistage rapide, pas un diagnostic. Il ne distingue pas muscle et graisse — les sportifs peuvent obtenir des valeurs élevées — et ne tient compte ni de l’âge, ni du sexe, ni de l’origine ethnique, ni de la répartition des graisses. Parlez de votre santé à un professionnel.'],
            ['q' => 'Les enfants peuvent-ils utiliser cette calculatrice d’IMC ?', 'a' => 'Non. Chez les enfants et les adolescents, l’IMC doit être comparé à des courbes selon l’âge et le sexe. Cette calculatrice est destinée aux adultes de 20 ans et plus.'],
            ['q' => 'Mes données sont-elles enregistrées ?', 'a' => 'Non. Le calcul se fait dans votre navigateur et rien n’est envoyé sur nos serveurs.'],
        ],
    ],

    'calorie-calculator' => [
        'slug' => 'calculatrice-calories',
        'name' => 'Calculatrice de calories',
        'short_description' => 'Estimez les calories quotidiennes pour perdre, maintenir ou prendre du poids.',
        'description' => 'Calculez votre métabolisme de base et votre dépense énergétique totale quotidienne avec l’équation de Mifflin-St Jeor, ainsi que les calories journalières pour perdre, maintenir ou prendre du poids.',
        'seo_title' => 'Calcul des calories journalières et dépense énergétique',
        'seo_description' => 'Calculatrice de calories gratuite : métabolisme de base et dépense quotidienne avec Mifflin-St Jeor, et calories pour perdre, maintenir ou prendre du poids.',
        'content' => <<<'HTML'
<h2>De combien de calories avez-vous besoin ?</h2>
<p>Vos besoins caloriques quotidiens dépendent de votre gabarit, de votre âge, de votre sexe et de votre niveau d’activité. La calculatrice estime d’abord votre métabolisme de base — l’énergie dont votre corps a besoin au repos — puis le multiplie par un facteur d’activité pour estimer votre dépense énergétique totale (DET). Manger autour de votre DET maintient votre poids stable.</p>
<h2>Bien utiliser ces chiffres</h2>
<ul>
<li>Choisissez honnêtement votre niveau d’activité : la plupart des gens le surestiment.</li>
<li>Visez des changements progressifs : 0,25 à 0,5 kg par semaine.</li>
<li>Privilégiez les protéines, les légumes et les aliments peu transformés pour être rassasié avec moins de calories.</li>
<li>Refaites le calcul chaque fois que votre poids varie de 2 à 5 kg.</li>
</ul>
<p>Faites le point sur votre situation actuelle avec la Calculatrice d’IMC.</p>
HTML,
        'steps' => [
            'Choisissez votre sexe et saisissez votre âge.',
            'Saisissez votre poids et votre taille en unités métriques ou américaines.',
            'Choisissez le niveau d’activité qui décrit le mieux une semaine type.',
            'Consultez les calories que vous brûlez par jour (DET) et les objectifs quotidiens pour perdre, maintenir ou prendre du poids.',
        ],
        'faq' => [
            ['q' => 'Comment les calories journalières sont-elles calculées ?', 'a' => 'La calculatrice estime votre métabolisme de base avec l’équation de Mifflin-St Jeor — considérée comme l’une des plus précises pour la plupart des adultes — puis le multiplie par un facteur d’activité pour obtenir votre dépense énergétique totale (DET).'],
            ['q' => 'Quelle différence entre MB et DET ?', 'a' => 'Le MB est l’énergie que votre corps consomme au repos complet. La DET ajoute tout le reste : les mouvements du quotidien, le sport et la digestion. La DET correspond à ce que vous devez manger pour maintenir votre poids.'],
            ['q' => 'Combien de calories manger pour perdre du poids ?', 'a' => 'Un déficit d’environ 500 calories par jour fait perdre environ 0,5 kg par semaine. La plupart des adultes ne devraient pas descendre sous environ 1200 (femmes) ou 1500 (hommes) calories par jour sans suivi médical.'],
            ['q' => 'Pourquoi mon résultat diffère-t-il de ma montre connectée ?', 'a' => 'Tous les chiffres de calories sont des estimations. Montres et formules reposent sur des hypothèses différentes. Utilisez le résultat comme point de départ et ajustez-le selon l’évolution de votre poids sur 2 à 3 semaines.'],
            ['q' => 'S’agit-il d’un avis médical ?', 'a' => 'Non. En cas de grossesse, de maladie ou d’objectifs sportifs, consultez un médecin ou un diététicien.'],
        ],
    ],

    'due-date-calculator' => [
        'slug' => 'calculatrice-date-accouchement',
        'name' => 'Calculatrice de date d’accouchement',
        'short_description' => 'Estimez votre date d’accouchement, la semaine de grossesse et le trimestre.',
        'description' => 'Saisissez le premier jour de vos dernières règles et la durée de votre cycle pour estimer la date d’accouchement, la date de conception, le nombre de semaines de grossesse et les étapes clés.',
        'seo_title' => 'Calcul de la date d’accouchement et du terme',
        'seo_description' => 'Calculatrice de date d’accouchement gratuite. Estimez le terme, la conception, la semaine de grossesse et le trimestre à partir de vos dernières règles.',
        'content' => <<<'HTML'
<h2>Comment la durée de grossesse est calculée</h2>
<p>Une grossesse dure en moyenne 40 semaines d’aménorrhée (280 jours), comptées à partir du premier jour des dernières règles et non de la conception. Si votre cycle est plus long ou plus court que 28 jours, l’ovulation a généralement lieu plus tard ou plus tôt : la calculatrice ajuste donc la date d’accouchement en conséquence.</p>
<h2>Étapes clés</h2>
<ul>
<li><strong>Semaines 1–12 :</strong> premier trimestre ; c’est généralement la période de la première consultation prénatale et de la première échographie.</li>
<li><strong>Semaines 18–22 :</strong> l’échographie morphologique détaillée.</li>
<li><strong>Semaines 27–40 :</strong> troisième trimestre, avec des consultations plus fréquentes.</li>
<li><strong>Semaines 39–40 :</strong> la grossesse est considérée à terme.</li>
</ul>
<p>Vous voulez suivre le compte à rebours ? La Calculatrice de dates indique le nombre exact de jours entre aujourd’hui et votre date d’accouchement.</p>
HTML,
        'steps' => [
            'Saisissez le <strong>premier jour de vos dernières règles</strong>.',
            'Ajustez la <strong>durée moyenne de votre cycle</strong> si elle n’est pas de 28 jours.',
            'Consultez votre date prévue d’accouchement, le nombre de semaines de grossesse et le trimestre en cours.',
            'Consultez les étapes clés de la grossesse.',
        ],
        'faq' => [
            ['q' => 'Comment la date d’accouchement est-elle calculée ?', 'a' => 'La calculatrice utilise la règle de Naegele : 280 jours (40 semaines d’aménorrhée) après le premier jour des dernières règles, ajustés pour les cycles plus longs ou plus courts que 28 jours.'],
            ['q' => 'La date d’accouchement est-elle précise ?', 'a' => 'C’est une estimation. Seuls environ 4 % des bébés naissent le jour prévu ; la plupart arrivent entre la 37e et la 42e semaine. Une échographie précoce donne la date la plus fiable, et votre professionnel de santé peut l’ajuster.'],
            ['q' => 'Pourquoi les semaines sont-elles comptées depuis les dernières règles ?', 'a' => 'La grossesse est comptée depuis le premier jour des dernières règles car la date exacte de l’ovulation et de la conception est rarement connue. C’est pourquoi on est déjà à environ 2 semaines d’aménorrhée au moment de la conception.'],
            ['q' => 'Quels sont les trimestres ?', 'a' => 'Le premier trimestre va jusqu’à la fin de la 12e semaine, le deuxième de la 13e à la 26e semaine, et le troisième de la 27e semaine jusqu’à la naissance.'],
            ['q' => 'S’agit-il d’un avis médical ?', 'a' => 'Non. Cet outil est uniquement informatif. Suivez toujours les conseils de votre médecin ou de votre sage-femme.'],
        ],
    ],

    'online-timer' => [
        'slug' => 'minuteur-en-ligne',
        'name' => 'Minuteur et chronomètre en ligne',
        'short_description' => 'Minuteur avec compte à rebours, chronomètre avec tours et Pomodoro.',
        'description' => 'Un minuteur en ligne gratuit avec alarme, un chronomètre avec temps au tour et un minuteur Pomodoro pour rester concentré. Précis dans les onglets en arrière-plan, avec le temps affiché dans le titre de l’onglet.',
        'seo_title' => 'Minuteur et chronomètre en ligne avec alarme',
        'seo_description' => 'Minuteur en ligne gratuit avec alarme, chronomètre avec tours et minuteur Pomodoro. Précis même en arrière-plan. Sans application et sans inscription.',
        'content' => <<<'HTML'
<h2>Trois outils en un</h2>
<p>Utilisez le <strong>minuteur</strong> pour la cuisine, le sport, les présentations, les examens et les siestes ; le <strong>chronomètre</strong> avec tours pour la course, la natation ou mesurer des tâches ; et le <strong>minuteur Pomodoro</strong> pour étudier ou travailler par blocs de 25 minutes de concentration avec des pauses régulières. Le temps s’affiche dans l’onglet du navigateur : vous pouvez continuer à travailler dans un autre onglet et voir le temps restant.</p>
<h2>Conseils pour travailler concentré</h2>
<ul>
<li>Choisissez une seule tâche par Pomodoro et coupez les notifications.</li>
<li>Profitez des pauses pour vous lever, vous étirer et reposer vos yeux.</li>
<li>Notez combien de cycles prend chaque tâche pour mieux planifier la prochaine fois.</li>
</ul>
<p>Besoin de compter des jours plutôt que des minutes ? Utilisez la Calculatrice de dates.</p>
HTML,
        'steps' => [
            'Choisissez <strong>Minuteur</strong> pour un compte à rebours, <strong>Chronomètre</strong> pour mesurer un temps avec des tours ou <strong>Pomodoro</strong> pour des sessions de concentration.',
            'Pour le minuteur, choisissez un raccourci (de 1 à 60 minutes) ou saisissez heures, minutes et secondes.',
            'Appuyez sur <strong>Démarrer</strong>. Le temps restant s’affiche aussi dans le titre de l’onglet : vous pouvez changer d’onglet.',
            'Une alarme retentit à la fin du temps. Coupez le son si vous préférez un minuteur silencieux.',
        ],
        'faq' => [
            ['q' => 'Le minuteur continue-t-il si je change d’onglet ?', 'a' => 'Oui. Le minuteur s’appuie sur l’horloge et non sur un comptage d’impulsions : il reste précis dans les onglets en arrière-plan, et le temps restant s’affiche dans le titre de l’onglet.'],
            ['q' => 'Pourquoi n’ai-je pas entendu l’alarme ?', 'a' => 'Vérifiez que l’option son est activée et que votre appareil n’est pas en silencieux. Certains navigateurs bloquent le son tant que vous n’avez pas interagi avec la page ; appuyer sur Démarrer compte comme une interaction.'],
            ['q' => 'Qu’est-ce que la technique Pomodoro ?', 'a' => 'C’est une méthode de gestion du temps : vous travaillez concentré pendant 25 minutes, puis faites une pause de 5 minutes. Après quatre cycles, vous prenez une pause plus longue de 15 à 30 minutes. Le minuteur change de phase automatiquement.'],
            ['q' => 'Quelle est la précision du chronomètre ?', 'a' => 'Il affiche les centièmes de seconde et utilise l’horloge de votre appareil, précise à quelques millisecondes près. Utilisez Tour pour enregistrer des temps intermédiaires.'],
            ['q' => 'Fonctionne-t-il hors ligne ?', 'a' => 'Une fois la page chargée, le minuteur, le chronomètre et le Pomodoro fonctionnent dans votre navigateur sans connexion Internet.'],
        ],
    ],

    'random-name-picker' => [
        'slug' => 'tirage-au-sort-noms',
        'name' => 'Tirage au sort de noms',
        'short_description' => 'Tirez des gagnants au hasard dans une liste ou répartissez des personnes en équipes.',
        'description' => 'Collez une liste de noms pour tirer équitablement un ou plusieurs gagnants, en les retirant pour le tour suivant si vous le souhaitez, ou répartissez tout le monde en équipes aléatoires.',
        'seo_title' => 'Tirage au sort de noms : gagnants et équipes',
        'seo_description' => 'Tirage au sort de noms gratuit. Tirez des gagnants dans une liste pour une tombola ou en classe, ou formez des équipes aléatoires. Sans inscription.',
        'content' => <<<'HTML'
<h2>Idéal pour la classe, les équipes et les concours</h2>
<p>Les enseignants utilisent le tirage au sort de noms pour interroger les élèves équitablement, les équipes de travail pour décider qui présente en premier et les créateurs de contenu pour désigner les gagnants d’un concours devant leur audience. Comme le tirage est aléatoire et transparent, personne ne peut dire qu’il était truqué.</p>
<h2>Astuces</h2>
<ul>
<li>Activez <strong>Retirer les noms tirés</strong> pour que chacun ait son tour avant que quelqu’un ne sorte deux fois.</li>
<li>Utilisez <strong>Former des équipes</strong> pour les travaux de groupe, le sport et les jeux.</li>
<li>Nettoyez d’abord votre liste avec Supprimer les lignes en double si vous avez copié les noms depuis plusieurs sources.</li>
</ul>
<p>Vous tirez des billets numérotés ? Utilisez le Générateur de nombres aléatoires.</p>
HTML,
        'steps' => [
            'Collez ou saisissez les noms, un par ligne. Vous pouvez coller une colonne directement depuis un tableur.',
            'Choisissez <strong>Tirer des gagnants</strong> pour tirer un ou plusieurs noms, ou <strong>Former des équipes</strong> pour répartir tout le monde en groupes aléatoires.',
            'Si vous le souhaitez, retirez les noms tirés de la liste pour que le prochain tirage ne porte que sur les autres.',
            'Cliquez sur le bouton et copiez le résultat pour le partager.',
        ],
        'faq' => [
            ['q' => 'Le tirage au sort est-il équitable ?', 'a' => 'Oui. Les gagnants sont choisis avec un générateur aléatoire cryptographiquement sûr : chaque nom a exactement la même chance. L’animation est là pour le plaisir et n’influence pas le résultat.'],
            ['q' => 'Puis-je tirer plusieurs gagnants à la fois ?', 'a' => 'Oui. Indiquez le nombre de gagnants souhaité ; un même nom ne sort jamais deux fois dans un tirage.'],
            ['q' => 'Comment les équipes sont-elles formées ?', 'a' => 'Tout le monde est mélangé au hasard puis réparti dans le nombre d’équipes choisi : les équipes diffèrent d’une personne au maximum.'],
            ['q' => 'Que se passe-t-il si un nom apparaît deux fois ?', 'a' => 'Chaque ligne compte comme une participation : un nom présent deux fois a deux fois plus de chances. Si vous ne le souhaitez pas, utilisez d’abord Supprimer les lignes en double.'],
            ['q' => 'Les noms sont-ils enregistrés ?', 'a' => 'Non. La liste reste dans votre navigateur et n’est jamais envoyée.'],
        ],
    ],
];
