<?php

/*
| French copy for the developer tools. See content/fr/tools.php.
*/

return [
    'json-formatter' => [
        'slug' => 'formateur-json',
        'name' => 'Formateur JSON',
        'short_description' => 'Formatez, validez et minifiez du JSON directement dans votre navigateur.',
        'description' => 'Collez votre JSON pour l’embellir avec une indentation propre, le minifier pour la production ou le valider et trouver la ligne exacte de chaque erreur de syntaxe. Vos données ne quittent jamais votre navigateur.',
        'seo_title' => 'Formateur et validateur JSON en ligne',
        'seo_description' => 'Formateur et validateur JSON gratuit en ligne. Embellissez, minifiez et validez du JSON instantanément dans votre navigateur, sans envoi ni inscription.',
        'content' => <<<'HTML'
<h2>Pourquoi formater du JSON ?</h2>
<p>Les API et les fichiers de logs renvoient souvent du JSON sur une seule ligne interminable, presque impossible à lire. Le formater ajoute une indentation et des retours à la ligne cohérents pour voir la structure, repérer les champs manquants et déboguer plus vite. Le minifier fait l’inverse : il retire tous les espaces inutiles pour que les réponses et les fichiers de configuration soient les plus légers possible.</p>
<h2>Erreurs JSON courantes détectées par ce validateur</h2>
<ul>
<li>Virgules finales après le dernier élément d’un objet ou d’un tableau.</li>
<li>Guillemets simples au lieu de guillemets doubles pour les chaînes et les clés.</li>
<li>Noms de propriétés sans guillemets et commentaires, interdits en JSON.</li>
<li>Virgules, crochets ou accolades manquants.</li>
</ul>
<p>Chaque erreur est signalée avec sa ligne et sa colonne exactes. Besoin des données dans un tableur ? Utilisez JSON en CSV, ou faites l’inverse avec CSV en JSON.</p>
HTML,
        'steps' => [
            'Collez ou saisissez votre JSON dans le champ <strong>Entrée</strong>, ou cliquez sur <strong>Charger un exemple</strong> pour essayer.',
            'Cliquez sur <strong>Formater</strong> pour l’embellir ou sur <strong>Minifier</strong> pour retirer tous les espaces. Choisissez 2 espaces, 4 espaces ou des tabulations et, si vous le souhaitez, triez les clés par ordre alphabétique.',
            'Si votre JSON est invalide, le message d’erreur indique la ligne et la colonne exactes, et le curseur se place sur le problème.',
            'Copiez le résultat ou téléchargez-le sous forme de fichier. Vous pouvez aussi convertir le JSON en <strong>CSV</strong> ou en interfaces <strong>TypeScript</strong>.',
        ],
        'faq' => [
            ['q' => 'Mon JSON est-il envoyé sur un serveur ?', 'a' => 'Non. Le formatage, la validation et la conversion se font entièrement dans votre navigateur en JavaScript. Vos données ne quittent jamais votre appareil : vous pouvez l’utiliser sans crainte avec des informations privées ou sensibles.'],
            ['q' => 'Quelle différence entre formater et minifier du JSON ?', 'a' => 'Formater (ou embellir) ajoute indentation et retours à la ligne pour rendre le JSON lisible. Minifier retire tous les espaces inutiles pour qu’il soit le plus léger possible en production ou lors de son envoi sur le réseau.'],
            ['q' => 'Pourquoi mon JSON est-il invalide ?', 'a' => 'Les causes les plus fréquentes sont les virgules finales, les guillemets simples au lieu de doubles, les noms de propriétés sans guillemets, les commentaires et les virgules manquantes entre les éléments. Le JSON est plus strict que la syntaxe des objets JavaScript. Le validateur indique la ligne et la colonne de la première erreur trouvée.'],
            ['q' => 'Comment fonctionne la conversion JSON vers CSV ?', 'a' => 'Un tableau d’objets devient une ligne par objet, avec une colonne par clé. Les objets imbriqués sont aplatis en notation pointée (par exemple <code>owner.name</code>) et les tableaux imbriqués sont conservés sous forme de texte JSON dans la cellule.'],
            ['q' => 'Y a-t-il une limite de taille ?', 'a' => 'Il n’y a pas de limite fixe, mais comme tout s’exécute dans votre navigateur, les très gros fichiers (plusieurs dizaines de mégaoctets) peuvent être lents selon votre appareil.'],
        ],
    ],

    'base64-encoder' => [
        'slug' => 'encoder-decoder-base64',
        'name' => 'Encodeur et décodeur Base64',
        'short_description' => 'Encodez et décodez textes et fichiers en Base64, compatible URL.',
        'description' => 'Convertissez du texte en Base64 et inversement avec une prise en charge complète de l’UTF-8, passez au Base64 compatible URL ou transformez n’importe quel fichier en chaîne Base64 ou en data URI.',
        'seo_title' => 'Encoder et décoder du Base64 : textes et fichiers',
        'seo_description' => 'Encodeur et décodeur Base64 gratuit en ligne. Gère l’UTF-8 et les emoji, le Base64 compatible URL et les fichiers en data URI. Fonctionne dans le navigateur.',
        'content' => <<<'HTML'
<h2>À quoi sert le Base64 ?</h2>
<ul>
<li>Intégrer de petites images dans du HTML ou du CSS sous forme de data URI.</li>
<li>Envoyer des pièces jointes binaires par e-mail (MIME).</li>
<li>Stocker des données binaires dans du JSON, du XML ou des variables d’environnement.</li>
<li>Les en-têtes d’authentification HTTP Basic et les JSON Web Tokens.</li>
</ul>
<h2>Le Base64 n’est pas du chiffrement</h2>
<p>Le Base64 ne fait que changer la représentation des données : n’importe qui peut le décoder instantanément. Ne l’utilisez jamais pour cacher des mots de passe ou des secrets. Pour créer des secrets robustes, utilisez le Générateur de mots de passe ; pour inspecter des jetons en Base64URL, utilisez le Décodeur JWT.</p>
HTML,
        'steps' => [
            'Choisissez <strong>Encoder</strong> pour convertir du texte en Base64, ou <strong>Décoder</strong> pour revenir du Base64 à un texte lisible.',
            'Collez votre texte ou votre chaîne Base64. Le résultat apparaît instantanément pendant la saisie.',
            'Activez <strong>Compatible URL</strong> pour utiliser <code>-</code> et <code>_</code> à la place de <code>+</code> et <code>/</code> (comme dans les JWT et les URL).',
            'Pour encoder une image ou n’importe quel fichier, utilisez <strong>Encoder un fichier</strong> plus bas et copiez la chaîne Base64 ou le data URI complet.',
        ],
        'faq' => [
            ['q' => 'Qu’est-ce que le Base64 ?', 'a' => 'Le Base64 est un encodage qui représente des données binaires avec 64 caractères ASCII imprimables. Il sert à intégrer des images dans le HTML et le CSS, à envoyer des pièces jointes par e-mail et à transporter des données dans du JSON ou des URL. C’est un encodage, pas un chiffrement : tout le monde peut le décoder.'],
            ['q' => 'Les emoji et les caractères accentués sont-ils pris en charge ?', 'a' => 'Oui. Le texte est converti en UTF-8 avant l’encodage : emoji, accents, cédilles et alphabets non latins sont encodés et décodés correctement.'],
            ['q' => 'Qu’est-ce que le Base64 compatible URL ?', 'a' => 'Le Base64 compatible URL (Base64URL) remplace <code>+</code> par <code>-</code> et <code>/</code> par <code>_</code>, et supprime le remplissage <code>=</code>, pour que le résultat puisse figurer dans des URL et des noms de fichiers. Le décodeur accepte automatiquement les deux variantes.'],
            ['q' => 'Pourquoi le Base64 alourdit-il les données ?', 'a' => 'Chaque groupe de 3 octets devient 4 caractères Base64 : les données encodées sont donc environ 33 % plus volumineuses que l’original.'],
            ['q' => 'Mes données sont-elles envoyées sur Internet ?', 'a' => 'Non. L’encodage et le décodage se font dans votre navigateur. Vos textes et fichiers ne quittent jamais votre appareil.'],
        ],
    ],

    'url-encoder' => [
        'slug' => 'encoder-decoder-url',
        'name' => 'Encodeur et décodeur d’URL',
        'short_description' => 'Encodez ou décodez des URL et des paramètres avec l’encodage pourcent.',
        'description' => 'Encodez du texte pour l’utiliser sans risque dans une URL ou décodez des chaînes encodées en pourcent en texte lisible, et inspectez chaque partie et chaque paramètre d’une URL.',
        'seo_title' => 'Encoder et décoder une URL en ligne',
        'seo_description' => 'Encodeur et décodeur d’URL gratuit. Encodez des valeurs de requête ou des URL complètes, décodez les séquences %20 et détaillez les paramètres instantanément.',
        'content' => <<<'HTML'
<h2>Pourquoi les URL doivent être encodées</h2>
<p>Une URL ne peut contenir qu’un nombre limité de caractères. Les espaces, les accents, les emoji et les symboles comme <code>&amp;</code>, <code>?</code> et <code>#</code> doivent être encodés en pourcent pour que navigateurs et serveurs les interprètent correctement. Oublier d’encoder une valeur de requête est une cause fréquente de liens cassés et de paramètres perdus.</p>
<h2>Encodages courants</h2>
<ul>
<li>Espace → <code>%20</code> (ou <code>+</code> dans les données de formulaire)</li>
<li><code>&amp;</code> → <code>%26</code></li>
<li><code>/</code> → <code>%2F</code></li>
<li><code>é</code> → <code>%C3%A9</code></li>
</ul>
<h2>L’encodage pour les développeurs</h2>
<p>En JavaScript, utilisez <code>encodeURIComponent()</code> pour une valeur de requête et <code>encodeURI()</code> pour une URL complète. En PHP, les équivalents sont <code>rawurlencode()</code> et <code>urlencode()</code>, qui encode les espaces en signes plus. Encoder une valeur deux fois est une erreur fréquente qui produit des séquences comme <code>%2520</code>.</p>
<p>Vous travaillez avec des jetons ou des données binaires ? L’Encodeur et décodeur Base64 et le Décodeur JWT peuvent vous aider.</p>
HTML,
        'steps' => [
            'Choisissez <strong>Encoder</strong> pour appliquer l’encodage pourcent, ou <strong>Décoder</strong> pour transformer des séquences comme <code>%20</code> en texte lisible.',
            'Collez votre texte ou votre URL. Le résultat se met à jour pendant la saisie.',
            'Utilisez <strong>Composant</strong> pour les valeurs de requête et les segments de chemin, ou <strong>URL complète</strong> pour conserver les caractères comme <code>/</code>, <code>?</code> et <code>&amp;</code>.',
            'Quand l’entrée est une URL complète, ses parties et ses paramètres s’affichent dans un tableau en dessous.',
        ],
        'faq' => [
            ['q' => 'Qu’est-ce que l’encodage d’URL ?', 'a' => 'L’encodage d’URL (encodage pourcent) remplace les caractères interdits dans une URL par un <code>%</code> suivi de deux chiffres hexadécimaux. Par exemple, une espace devient <code>%20</code> et <code>é</code> devient <code>%C3%A9</code>.'],
            ['q' => 'Quelle différence entre Composant et URL complète ?', 'a' => 'Le mode Composant (<code>encodeURIComponent</code>) encode tous les caractères réservés, ce qu’il faut pour une valeur de requête isolée. Le mode URL complète (<code>encodeURI</code>) laisse intacts les caractères qui structurent une URL, comme <code>:</code>, <code>/</code>, <code>?</code>, <code>&amp;</code> et <code>=</code>.'],
            ['q' => 'Pourquoi certaines URL utilisent-elles + pour les espaces ?', 'a' => 'Les formulaires HTML encodent les espaces en <code>+</code> dans les chaînes de requête. Laissez <strong>Traiter + comme une espace</strong> activé pour décoder des données de formulaire ou des chaînes de requête.'],
            ['q' => 'Mes données sont-elles envoyées quelque part ?', 'a' => 'Non. Tout est traité dans votre navigateur.'],
        ],
    ],

    'jwt-decoder' => [
        'slug' => 'decodeur-jwt',
        'name' => 'Décodeur JWT',
        'short_description' => 'Décodez des JSON Web Tokens et inspectez leurs claims et leur expiration.',
        'description' => 'Collez un JWT pour décoder son header et son payload, afficher exp, iat et nbf sous forme de dates lisibles et vérifier si le jeton a expiré. Le décodage se fait sur votre appareil.',
        'seo_title' => 'Décodeur JWT : décoder des JSON Web Tokens',
        'seo_description' => 'Décodez des jetons JWT gratuitement : header, payload, dates d’expiration et état du jeton. Confidentiel : le jeton reste dans votre navigateur.',
        'content' => <<<'HTML'
<h2>Comment fonctionnent les JWT</h2>
<p>Un JSON Web Token transporte des données (claims) sur un utilisateur ou une session, comme un identifiant, ses rôles et une date d’expiration. Le header et le payload sont du JSON encodé en Base64URL, et la signature permet au serveur de vérifier que personne ne les a modifiés. Le payload étant seulement encodé, quiconque possède le jeton peut le lire : ne mettez jamais de secrets dans un JWT.</p>
<h2>Vérifications courantes lors du débogage</h2>
<ul>
<li>Le jeton a-t-il expiré (<code>exp</code> dans le passé) ?</li>
<li>Un décalage d’horloge pose-t-il problème avec <code>nbf</code> ?</li>
<li>Le <code>aud</code> ou le <code>iss</code> correspondent-ils à ce qu’attend votre API ?</li>
<li>L’algorithme (<code>alg</code>) est-il celui configuré sur votre serveur ?</li>
</ul>
<p>Pour décoder d’autres chaînes Base64, utilisez l’Encodeur et décodeur Base64.</p>
HTML,
        'steps' => [
            'Collez un JSON Web Token (JWT) dans le champ. Le préfixe <code>Bearer</code> est retiré automatiquement.',
            'Le header et le payload sont décodés instantanément et affichés en JSON formaté.',
            'Consultez les claims <strong>exp</strong>, <strong>iat</strong> et <strong>nbf</strong> convertis en dates lisibles, et vérifiez si le jeton a expiré.',
            'Copiez le header ou le payload décodé en un clic.',
        ],
        'faq' => [
            ['q' => 'Puis-je coller mon JWT ici sans risque ?', 'a' => 'Oui. Le jeton est décodé entièrement dans votre navigateur et n’est jamais envoyé à un serveur. Traitez tout de même les jetons de production comme des mots de passe et évitez de les partager.'],
            ['q' => 'Cet outil vérifie-t-il la signature ?', 'a' => 'Non. Il décode uniquement le header et le payload, qui sont du JSON encodé en Base64URL. La vérification de la signature nécessite le secret ou la clé publique et doit être faite par votre serveur.'],
            ['q' => 'Que signifient exp, iat et nbf ?', 'a' => '<code>exp</code> est la date d’expiration, <code>iat</code> la date d’émission du jeton et <code>nbf</code> le moment avant lequel il ne doit pas être accepté. Ce sont tous des timestamps Unix en secondes.'],
            ['q' => 'Quelles sont les trois parties d’un JWT ?', 'a' => 'Un JWT comporte un header (algorithme et type de jeton), un payload (les claims) et une signature, séparés par des points : <code>header.payload.signature</code>.'],
        ],
    ],

    'hash-generator' => [
        'slug' => 'generateur-de-hash',
        'name' => 'Générateur de hash',
        'short_description' => 'Générez des hashs MD5, SHA-1, SHA-256 et SHA-512 de textes ou de fichiers.',
        'description' => 'Calculez en une fois les hashs MD5, SHA-1, SHA-256, SHA-384 et SHA-512 de n’importe quel texte ou fichier, et vérifiez vos téléchargements en comparant les sommes de contrôle. Fonctionne dans votre navigateur.',
        'seo_title' => 'Générateur de hash MD5, SHA-256 et SHA-512',
        'seo_description' => 'Générez des hashs MD5, SHA-1, SHA-256 et SHA-512 de textes ou de fichiers et vérifiez des checksums. Les fichiers restent dans votre navigateur.',
        'content' => <<<'HTML'
<h2>Usages courants des hashs</h2>
<ul>
<li><strong>Vérifier un téléchargement :</strong> comparez la somme de contrôle SHA-256 publiée par l’éditeur d’un logiciel avec le fichier téléchargé.</li>
<li><strong>Détecter des modifications :</strong> un même fichier a toujours le même hash, donc des hashs différents signifient un contenu différent.</li>
<li><strong>Développement :</strong> générez des clés de cache, des ETags et des identifiants de contenu.</li>
<li><strong>Dédoublonnage :</strong> trouvez les fichiers identiques en comparant leurs hashs.</li>
</ul>
<h2>Quel algorithme choisir ?</h2>
<p>Utilisez SHA-256 pour presque tout : il est rapide, largement pris en charge et sûr. SHA-512 produit une empreinte encore plus longue. MD5 et SHA-1 conviennent aux contrôles d’intégrité rapides, mais pas à un usage de sécurité. Pour encoder des données plutôt que d’en calculer l’empreinte, utilisez l’Encodeur et décodeur Base64.</p>
HTML,
        'steps' => [
            'Saisissez ou collez un texte, ou choisissez <strong>Calculer le hash d’un fichier</strong> pour obtenir la somme de contrôle de n’importe quel fichier.',
            'Les hashs MD5, SHA-1, SHA-256, SHA-384 et SHA-512 sont calculés simultanément.',
            'Copiez le hash dont vous avez besoin, en minuscules ou en majuscules.',
            'Pour vérifier un téléchargement, collez la somme de contrôle attendue dans <strong>Comparer</strong> : en cas de correspondance, elle s’affiche en vert.',
        ],
        'faq' => [
            ['q' => 'Qu’est-ce qu’un hash ?', 'a' => 'Une fonction de hachage transforme n’importe quelle entrée en une empreinte de longueur fixe. La même entrée donne toujours le même hash, et la modification d’un seul caractère le change complètement. Les hashs servent à vérifier des téléchargements, détecter des modifications et indexer des données.'],
            ['q' => 'Comment vérifier la somme de contrôle d’un fichier ?', 'a' => 'Calculez le hash du fichier téléchargé et collez dans Comparer la somme publiée par l’éditeur (généralement SHA-256). Si elles correspondent, le fichier est complet et n’a pas été altéré.'],
            ['q' => 'MD5 ou SHA-1 sont-ils sûrs ?', 'a' => 'Plus pour la sécurité. Des attaques par collision sont connues pour les deux : utilisez SHA-256 ou SHA-512 pour tout ce qui touche à la sécurité. MD5 reste utile pour des contrôles rapides sans enjeu de sécurité.'],
            ['q' => 'Faut-il stocker les mots de passe avec SHA-256 ?', 'a' => 'Non. Les mots de passe doivent être stockés avec des algorithmes lents et salés comme bcrypt, scrypt ou Argon2. Les hashs rapides comme SHA-256 sont faciles à attaquer par force brute.'],
            ['q' => 'Mes textes et fichiers sont-ils envoyés sur Internet ?', 'a' => 'Non. Les hashs sont calculés dans votre navigateur avec la Web Crypto API. Les fichiers de tout type, jusqu’à 200 Mo, restent sur votre appareil.'],
        ],
    ],

    'timestamp-converter' => [
        'slug' => 'convertisseur-timestamp-unix',
        'name' => 'Convertisseur de timestamp Unix',
        'short_description' => 'Convertissez des timestamps Unix en dates et des dates en timestamps.',
        'description' => 'Convertissez des timestamps epoch en secondes ou millisecondes en heure locale, UTC et ISO 8601, et transformez n’importe quelle date en timestamp Unix. Affiche le timestamp actuel en direct.',
        'seo_title' => 'Convertisseur timestamp Unix en date et inversement',
        'seo_description' => 'Convertissez des timestamps Unix en dates lisibles et inversement. Secondes ou millisecondes, heure locale, UTC et ISO 8601, avec le temps epoch actuel.',
        'content' => <<<'HTML'
<h2>Pourquoi les développeurs utilisent le temps Unix</h2>
<p>Un timestamp Unix représente un instant par un seul nombre, identique partout dans le monde, ce qui le rend idéal pour les bases de données, les API, les logs, l’expiration des JWT et les en-têtes de cache. Le convertir en date lisible est une tâche quotidienne lors du débogage.</p>
<h2>Erreurs courantes</h2>
<ul>
<li>Confondre secondes et millisecondes : un nombre à 13 chiffres est en millisecondes.</li>
<li>Oublier les fuseaux horaires : un timestamp est toujours en UTC ; seul l’affichage est local.</li>
<li>Stocker des dates en entiers 32 bits, qui débordent en janvier 2038.</li>
</ul>
<p>Vous décodez un jeton avec des claims <code>exp</code> et <code>iat</code> ? Le Décodeur JWT les convertit automatiquement. Pour compter les jours calendaires entre deux dates, utilisez la Calculatrice de dates.</p>
HTML,
        'steps' => [
            'Le timestamp Unix actuel s’affiche en haut et se met à jour chaque seconde.',
            'Collez un timestamp dans <strong>Timestamp vers date</strong>. Les secondes et les millisecondes sont détectées automatiquement.',
            'Affichez-le en heure locale, en UTC, en ISO 8601 et en temps relatif (par exemple « il y a 3 jours »).',
            'Utilisez <strong>Date vers timestamp</strong> pour convertir une date et une heure, dans votre fuseau horaire ou en UTC.',
        ],
        'faq' => [
            ['q' => 'Qu’est-ce qu’un timestamp Unix ?', 'a' => 'Un timestamp Unix (temps epoch) est le nombre de secondes écoulées depuis le 1er janvier 1970 à 00:00:00 UTC. Les bases de données, les API, les logs et les langages de programmation l’utilisent car il est identique dans tous les fuseaux horaires.'],
            ['q' => 'Secondes ou millisecondes ?', 'a' => 'La plupart des systèmes (Unix, PHP, Python, bases de données) utilisent les secondes : 10 chiffres aujourd’hui. JavaScript et Java utilisent les millisecondes : 13 chiffres. Le convertisseur détecte ce que vous avez collé.'],
            ['q' => 'Qu’est-ce que le bug de l’an 2038 ?', 'a' => 'Les systèmes qui stockent les timestamps en entiers signés de 32 bits débordent le 19 janvier 2038 (timestamp 2147483647). Les systèmes modernes utilisent des valeurs 64 bits, suffisantes pour des milliards d’années.'],
            ['q' => 'Comment obtenir le timestamp actuel dans le code ?', 'a' => 'JavaScript : <code>Math.floor(Date.now() / 1000)</code>. PHP : <code>time()</code>. Python : <code>int(time.time())</code>. SQL (MySQL) : <code>UNIX_TIMESTAMP()</code>.'],
        ],
    ],

    'color-converter' => [
        'slug' => 'convertisseur-de-couleurs',
        'name' => 'Convertisseur de couleurs et vérificateur de contraste',
        'short_description' => 'Convertissez des couleurs HEX, RGB et HSL et vérifiez le contraste WCAG.',
        'description' => 'Convertissez des couleurs entre HEX, RGB et HSL avec un sélecteur de couleur, et vérifiez le rapport de contraste entre texte et fond selon les niveaux WCAG AA et AAA.',
        'seo_title' => 'Convertisseur de couleurs HEX, RGB, HSL et contraste',
        'seo_description' => 'Convertissez HEX en RGB et HSL et vérifiez le contraste des couleurs WCAG pour l’accessibilité. Convertisseur gratuit avec sélecteur et résultats AA/AAA.',
        'content' => <<<'HTML'
<h2>Travailler avec les formats de couleur</h2>
<p>Les outils de design donnent souvent les couleurs en HEX, alors que les frameworks CSS, le code canvas et les bibliothèques d’images peuvent demander du RGB ou du HSL. Le HSL est particulièrement pratique pour créer des palettes : on garde la teinte et on change la luminosité pour obtenir des états de survol, des bordures et des fonds assortis.</p>
<h2>Un contraste de couleurs accessible</h2>
<p>Environ un homme sur douze présente une forme de daltonisme, et beaucoup de gens lisent sur un écran de téléphone en plein soleil. Les Règles pour l’accessibilité des contenus Web (WCAG) exigent un rapport de contraste minimal de 4.5:1 pour le texte normal et de 3:1 pour le texte large. Vérifiez chaque combinaison texte/fond de votre design, y compris les boutons et les textes d’exemple des champs.</p>
<p>Vous créez un QR code aux couleurs de votre marque ? Testez d’abord le contraste ici, puis utilisez le Générateur de QR code.</p>
HTML,
        'steps' => [
            'Saisissez une couleur dans n’importe quel format — <code>#0f766e</code>, <code>rgb(15, 118, 110)</code> ou <code>hsl(175, 77%, 26%)</code> — ou choisissez-la avec le sélecteur de couleur.',
            'Copiez la couleur en HEX, RGB ou HSL pour le CSS, vos outils de design ou votre code.',
            'Dans le <strong>Vérificateur de contraste</strong>, saisissez une couleur de texte et une couleur de fond.',
            'Consultez les résultats WCAG : visez au minimum AA (4.5:1) pour le texte normal.',
        ],
        'faq' => [
            ['q' => 'Quelle différence entre HEX, RGB et HSL ?', 'a' => 'Ils décrivent les mêmes couleurs de manières différentes. HEX et RGB indiquent les canaux rouge, vert et bleu ; HSL utilise la teinte, la saturation et la luminosité, ce qui facilite la création de variantes plus claires ou plus foncées d’une couleur.'],
            ['q' => 'Quel rapport de contraste me faut-il ?', 'a' => 'Le niveau AA des WCAG 2 exige 4.5:1 pour le texte normal et 3:1 pour le texte large (environ 24 px, ou 19 px en gras). Le niveau AAA exige 7:1 et 4.5:1. Plus de contraste rend le texte lisible pour plus de monde, y compris les personnes malvoyantes.'],
            ['q' => 'Pourquoi un contraste accessible compte-t-il pour le SEO ?', 'a' => 'Un texte lisible retient les visiteurs sur la page, et les audits d’accessibilité comme Lighthouse signalent les textes trop peu contrastés. Les sites accessibles touchent aussi un public plus large.'],
            ['q' => 'Quelque chose est-il envoyé sur Internet ?', 'a' => 'Non. Toutes les conversions et tous les calculs de contraste se font dans votre navigateur.'],
        ],
    ],

    'regex-tester' => [
        'slug' => 'testeur-de-regex',
        'name' => 'Testeur de regex',
        'short_description' => 'Testez des expressions régulières avec surlignage en direct et groupes.',
        'description' => 'Testez des expressions régulières JavaScript avec surlignage des correspondances en direct, groupes de capture, groupes nommés et aperçu des remplacements. Les motifs s’exécutent dans un worker sécurisé en arrière-plan.',
        'seo_title' => 'Testeur de regex : tester des expressions régulières',
        'seo_description' => 'Testeur de regex gratuit : surlignage en direct, groupes de capture, flags et aperçu des remplacements. Expressions régulières JavaScript, sûr et privé.',
        'content' => <<<'HTML'
<h2>Aide-mémoire des regex</h2>
<ul>
<li><code>\d</code> chiffre · <code>\w</code> caractère de mot · <code>\s</code> espace · <code>.</code> n’importe quel caractère</li>
<li><code>*</code> 0 ou plus · <code>+</code> 1 ou plus · <code>?</code> facultatif · <code>{2,4}</code> entre 2 et 4</li>
<li><code>^</code> début · <code>$</code> fin · <code>\b</code> limite de mot</li>
<li><code>[abc]</code> l’un de · <code>[^abc]</code> aucun de · <code>a|b</code> l’un ou l’autre</li>
<li><code>(…)</code> groupe de capture · <code>(?:…)</code> sans capture · <code>(?=…)</code> lookahead</li>
</ul>
<h2>Conseils pour vos tests</h2>
<p>Collez des exemples réels, y compris les cas qui ne doivent pas correspondre, et observez le surlignage pendant vos modifications. Gardez des motifs aussi précis que possible et évitez les quantificateurs imbriqués pour que la recherche reste rapide. Pour transformer du texte en masse une fois le bon motif trouvé, le Convertisseur majuscules minuscules et Trier des lignes peuvent vous aider.</p>
HTML,
        'steps' => [
            'Saisissez votre expression régulière dans le champ <strong>Motif</strong> (sans les barres obliques qui l’entourent).',
            'Activez les flags nécessaires : <code>g</code> global, <code>i</code> ignorer la casse, <code>m</code> multiligne, <code>s</code> le point inclut les sauts de ligne, <code>u</code> Unicode.',
            'Collez votre texte de test. Les correspondances sont surlignées instantanément et listées avec leurs groupes de capture.',
            'Activez <strong>Remplacer</strong> pour prévisualiser une substitution avec <code>$1</code>, <code>$2</code> ou <code>$&lt;nom&gt;</code>.',
        ],
        'faq' => [
            ['q' => 'Quelle variante de regex ce testeur utilise-t-il ?', 'a' => 'Il utilise le moteur d’expressions régulières JavaScript (ECMAScript) de votre navigateur, le même que Node.js et TypeScript. La syntaxe est en grande partie identique à PCRE, Python et Java, mais certaines fonctions, comme la prise en charge du lookbehind ou les quantificateurs possessifs, diffèrent.'],
            ['q' => 'Que sont les groupes de capture ?', 'a' => 'Les parenthèses capturent la partie de la correspondance qu’elles contiennent pour que vous puissiez la réutiliser. Les groupes nommés comme <code>(?&lt;annee&gt;\d{4})</code> rendent les motifs plus lisibles. Utilisez <code>(?:...)</code> pour grouper sans capturer.'],
            ['q' => 'Pourquoi mon motif a-t-il dépassé le délai ?', 'a' => 'Les quantificateurs imbriqués comme <code>(a+)+</code> peuvent provoquer un backtracking catastrophique, où le moteur essaie un nombre exponentiel de combinaisons. Le testeur s’arrête après 1,5 seconde pour que votre navigateur reste réactif.'],
            ['q' => 'Mon texte est-il envoyé quelque part ?', 'a' => 'Non. La recherche s’exécute dans votre navigateur, dans un worker en arrière-plan. Rien n’est envoyé.'],
        ],
    ],
];
