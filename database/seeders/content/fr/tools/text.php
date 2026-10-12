<?php

/*
| French copy for the text tools. See content/fr/tools.php.
*/

return [
    'word-counter' => [
        'slug' => 'compteur-de-mots',
        'name' => 'Compteur de mots',
        'short_description' => 'Comptez les mots, les caractères, les phrases et le temps de lecture instantanément.',
        'description' => 'Collez ou saisissez votre texte pour compter les mots, les caractères avec et sans espaces, les phrases et les paragraphes, ainsi que le temps de lecture, le temps de parole et la densité des mots-clés.',
        'seo_title' => 'Compteur de mots et de caractères en ligne',
        'seo_description' => 'Compteur de mots gratuit. Comptez mots, caractères (avec et sans espaces), phrases et paragraphes, et voyez le temps de lecture et les mots-clés.',
        'content' => <<<'HTML'
<h2>Limites de longueur courantes</h2>
<ul>
<li><strong>Meta description :</strong> environ 150–160 caractères.</li>
<li><strong>Titre de page pour Google :</strong> environ 50–60 caractères.</li>
<li><strong>Publication sur X (Twitter) :</strong> 280 caractères.</li>
<li><strong>Publication LinkedIn :</strong> 3000 caractères.</li>
<li><strong>Dissertations et devoirs :</strong> souvent entre 500 et 1500 mots.</li>
<li><strong>Article de blog bien référencé :</strong> souvent 1000–2000 mots, selon le sujet.</li>
</ul>
<h2>Conseils d’écriture</h2>
<p>À l’écran, on lit en diagonale : découpez les longs paragraphes en blocs de deux à quatre phrases et utilisez des intertitres pour guider la lecture. Les phrases courtes passent mieux sur le web. Servez-vous de la liste des mots-clés pour vérifier que votre sujet principal apparaît naturellement et que vous ne répétez aucun mot à l’excès. Pour corriger la casse, utilisez le Convertisseur majuscules minuscules ; pour comparer deux brouillons, utilisez Comparer des textes.</p>
HTML,
        'steps' => [
            'Saisissez ou collez votre texte dans le champ. Les compteurs se mettent à jour pendant la saisie.',
            'Consultez le nombre de mots, de caractères (avec et sans espaces), de phrases, de paragraphes et de lignes.',
            'Vérifiez le temps de lecture estimé et le temps de parole : pratique pour les articles, les discours et les présentations.',
            'Consultez les mots les plus fréquents et leur densité pour éviter les répétitions et vérifier votre ciblage SEO.',
        ],
        'faq' => [
            ['q' => 'Comment les mots sont-ils comptés ?', 'a' => 'Un mot est une suite de lettres ou de chiffres. Les mots composés avec un trait d’union, comme <em>arc-en-ciel</em>, comptent pour un seul mot. La ponctuation et les emoji ne comptent pas comme des mots.'],
            ['q' => 'Le nombre de caractères inclut-il les espaces ?', 'a' => 'Les deux sont affichés : <strong>Caractères</strong> inclut les espaces et les retours à la ligne, et <strong>Caractères (sans espaces)</strong> les exclut tous. Les emoji et les lettres accentuées comptent chacun pour un caractère.'],
            ['q' => 'Comment le temps de lecture est-il calculé ?', 'a' => 'Le temps de lecture suppose une vitesse moyenne de lecture silencieuse de 238 mots par minute. Le temps de parole suppose 130 mots par minute, un rythme courant pour les présentations.'],
            ['q' => 'Qu’est-ce que la densité des mots-clés ?', 'a' => 'C’est la fréquence d’un mot par rapport au nombre total de mots. Les mots très courants comme <em>le</em>, <em>la</em> ou <em>et</em> sont ignorés pour que vous voyiez les mots qui définissent votre texte.'],
            ['q' => 'Mon texte est-il enregistré ou envoyé ?', 'a' => 'Non. Tout est compté dans votre navigateur. Votre texte n’est jamais envoyé à un serveur.'],
        ],
    ],

    'case-converter' => [
        'slug' => 'majuscules-minuscules',
        'name' => 'Convertisseur majuscules minuscules',
        'short_description' => 'Passez un texte en MAJUSCULES, minuscules, Casse De Titre, camelCase et plus.',
        'description' => 'Convertissez du texte en majuscules, minuscules, casse de titre, casse de phrase ou formats de développeur comme camelCase, snake_case et kebab-case, en un clic.',
        'seo_title' => 'Convertir majuscules et minuscules en ligne',
        'seo_description' => 'Convertisseur majuscules minuscules gratuit. Passez un texte en MAJUSCULES, minuscules, casse de titre, casse de phrase, camelCase, snake_case et kebab-case.',
        'content' => <<<'HTML'
<h2>Quelle casse utiliser ?</h2>
<ul>
<li><strong>Casse de phrase</strong> : textes courants, libellés d’interface et la plupart des titres en français.</li>
<li><strong>Casse De Titre</strong> : titres en anglais de gros titres, livres et articles.</li>
<li><strong>MAJUSCULES</strong> : libellés courts, sigles et mise en valeur (avec modération).</li>
<li><strong>camelCase et PascalCase</strong> : variables, fonctions et classes en JavaScript, Java et C#.</li>
<li><strong>snake_case et CONSTANT_CASE</strong> : Python, Ruby, colonnes SQL et constantes.</li>
<li><strong>kebab-case</strong> : URL, classes CSS et noms de fichiers.</li>
</ul>
<p>Vous avez tapé tout un paragraphe en laissant la touche Verr. Maj activée ? Collez-le ici et passez-le en casse de phrase en un clic au lieu de tout retaper. Pour compter les mots ou les caractères ensuite, utilisez le Compteur de mots.</p>
HTML,
        'steps' => [
            'Collez ou saisissez votre texte dans le champ d’entrée.',
            'Choisissez une casse : MAJUSCULES, minuscules, Casse De Titre, casse de phrase, etc.',
            'Pour le code, convertissez le texte en <strong>camelCase</strong>, <strong>snake_case</strong>, <strong>kebab-case</strong>, <strong>PascalCase</strong> ou <strong>CONSTANT_CASE</strong>.',
            'Copiez le texte converti ou téléchargez-le sous forme de fichier.',
        ],
        'faq' => [
            ['q' => 'Qu’est-ce que la casse de titre ?', 'a' => 'La casse de titre met une majuscule à la première lettre de chaque mot important, tandis que les petits mots anglais comme <em>a</em>, <em>and</em>, <em>of</em> et <em>the</em> restent en minuscules sauf en début ou en fin. C’est le style des titres et des livres en anglais ; en français, on recommande la casse de phrase.'],
            ['q' => 'Quelle différence entre Casse De Titre et Chaque Mot En Majuscule ?', 'a' => 'Chaque Mot En Majuscule met une majuscule à tous les mots, y compris les plus courts. La Casse De Titre suit les règles des titres anglais et laisse les petits mots en minuscules.'],
            ['q' => 'Comment fonctionne la casse de phrase ?', 'a' => 'La casse de phrase met tout en minuscules puis ajoute une majuscule à la première lettre de chaque phrase. Les noms propres doivent être corrigés à la main.'],
            ['q' => 'Puis-je corriger un texte tapé avec Verr. Maj activé ?', 'a' => 'Oui. Utilisez cASSE iNVERSÉE pour échanger majuscules et minuscules, ou la casse de phrase pour le réécrire correctement.'],
            ['q' => 'Mon texte est-il enregistré ?', 'a' => 'Non. La conversion se fait dans votre navigateur et rien n’est envoyé.'],
        ],
    ],

    'text-compare' => [
        'slug' => 'comparer-textes',
        'name' => 'Comparer des textes',
        'short_description' => 'Comparez deux textes et mettez les différences en évidence.',
        'description' => 'Collez deux versions d’un texte pour voir exactement ce qui a été ajouté et supprimé, ligne par ligne ou mot par mot. Idéal pour les documents, les contrats et le code.',
        'seo_title' => 'Comparer des textes : trouver les différences',
        'seo_description' => 'Comparez deux textes en ligne et surlignez les différences par ligne ou par mot, en ignorant casse et espaces. Votre texte reste dans le navigateur.',
        'content' => <<<'HTML'
<h2>Ce que vous pouvez comparer</h2>
<ul>
<li>Deux versions d’un contrat, d’une dissertation ou d’un article.</li>
<li>Des fichiers de configuration et des extraits de code.</li>
<li>Des listes exportées à des moments différents, pour voir ce qui a été ajouté ou retiré.</li>
<li>Des traductions ou des relectures avant publication.</li>
</ul>
<h2>Comparer par ligne ou par mot</h2>
<p>Le mode par ligne montre quelles lignes ont changé : parfait pour le code et les données. Le mode par mot repère précisément les mots modifiés dans un paragraphe : idéal pour la relecture. Combinez-le avec Supprimer les lignes en double et Trier des lignes pour comparer des listes dont l’ordre n’a pas d’importance.</p>
HTML,
        'steps' => [
            'Collez le texte d’origine à gauche et le texte modifié à droite.',
            "Les différences apparaissent instantanément en dessous : le texte <span class='rounded bg-danger-soft px-1 text-danger'>supprimé</span> en rouge et le texte <span class='rounded bg-success-soft px-1 text-success'>ajouté</span> en vert.",
            'Comparez <strong>par ligne</strong> pour le code, les listes et les documents, ou <strong>par mot</strong> pour repérer de petites modifications dans les phrases.',
            'Ignorez la casse ou les espaces superflus quand seul le contenu compte.',
        ],
        'faq' => [
            ['q' => 'Comment fonctionne la comparaison de textes ?', 'a' => 'L’outil utilise l’algorithme de différences de Myers, la même approche que Git, pour trouver le plus petit ensemble d’insertions et de suppressions qui transforme le texte d’origine en nouveau texte.'],
            ['q' => 'Vaut-il mieux comparer par ligne ou par mot ?', 'a' => 'Le mode par ligne convient mieux au code, aux données CSV, aux listes et aux longs documents. Le mode par mot met en évidence précisément les mots modifiés dans les phrases, idéal pour relire des textes et des versions de contrats.'],
            ['q' => 'Puis-je comparer du code ?', 'a' => 'Oui. Utilisez le mode par ligne. Activez Ignorer les espaces pour ne pas tenir compte des changements d’indentation.'],
            ['q' => 'Y a-t-il une limite de taille ?', 'a' => 'Des textes de plusieurs milliers de lignes sont comparés instantanément. Si les deux textes sont extrêmement différents, l’outil vous proposera de comparer des sections plus courtes.'],
            ['q' => 'Mon texte est-il envoyé sur Internet ?', 'a' => 'Non. La comparaison se fait entièrement dans votre navigateur : vos documents confidentiels restent privés.'],
        ],
    ],

    'remove-duplicate-lines' => [
        'slug' => 'supprimer-lignes-en-double',
        'name' => 'Supprimer les lignes en double',
        'short_description' => 'Effacez les lignes répétées d’une liste en conservant l’ordre d’origine.',
        'description' => 'Supprimez les lignes en double de listes d’e-mails, de mots-clés, d’URL ou de noms en une seule étape, avec des options pour ignorer la casse, retirer les espaces et supprimer les lignes vides.',
        'seo_title' => 'Supprimer les lignes en double d’une liste',
        'seo_description' => 'Supprimez les lignes en double gratuitement. Ordre d’origine conservé, casse ignorable et espaces retirés. Gère les grandes listes dans votre navigateur.',
        'content' => <<<'HTML'
<h2>Nettoyez n’importe quelle liste</h2>
<p>Les doublons se glissent dans les listes d’e-mails, les recherches de mots-clés, les catalogues produits et les exports de données. Les supprimer évite d’envoyer deux fois le même e-mail, de compter deux fois un mot-clé ou d’importer des enregistrements en double dans une base de données.</p>
<h2>Astuces</h2>
<ul>
<li>Activez <strong>Ignorer la casse</strong> pour les e-mails et les mots-clés, où les majuscules n’ont pas d’importance.</li>
<li>Laissez <strong>Supprimer les espaces superflus</strong> activé pour repérer les doublons qui ne diffèrent que par des espaces invisibles.</li>
<li>Besoin aussi d’une liste par ordre alphabétique ? Passez-la dans Trier des lignes.</li>
</ul>
<h2>Fonctionne avec les données de tableur</h2>
<p>Copiez une colonne d’Excel ou de Google Sheets, collez-la ici et recollez les valeurs uniques. Chaque cellule devient une ligne : vous nettoyez des milliers de lignes en quelques secondes, sans formule.</p>
HTML,
        'steps' => [
            'Collez votre liste dans le champ d’entrée, un élément par ligne.',
            'Les lignes en double sont supprimées instantanément. La première occurrence de chaque ligne est conservée, dans l’ordre d’origine.',
            'Choisissez si <strong>Pomme</strong> et <strong>pomme</strong> comptent comme la même ligne, et s’il faut retirer les espaces et supprimer les lignes vides.',
            'Copiez la liste nettoyée ou téléchargez-la en fichier texte.',
        ],
        'faq' => [
            ['q' => 'L’ordre d’origine est-il conservé ?', 'a' => 'Oui. Les lignes gardent leur ordre d’origine et seules les répétitions suivantes sont supprimées. Pour aussi trier la liste, utilisez Trier des lignes.'],
            ['q' => 'Que fait Ignorer la casse ?', 'a' => 'Quand Ignorer la casse est activé, les lignes qui ne diffèrent que par les majuscules (comme <em>Email</em> et <em>email</em>) sont considérées comme des doublons et seule la première est gardée.'],
            ['q' => 'À quoi sert la suppression des espaces superflus ?', 'a' => 'Les lignes copiées depuis des tableurs ou des documents ont souvent des espaces invisibles au début ou à la fin. Les retirer garantit que ces lignes sont bien reconnues comme des doublons.'],
            ['q' => 'Puis-je nettoyer une liste d’e-mails ou de mots-clés ?', 'a' => 'Oui. Cela fonctionne avec n’importe quelle liste : e-mails, URL, mots-clés, références produits ou noms. Les grandes listes de plusieurs centaines de milliers de lignes sont traitées en un instant.'],
            ['q' => 'Mes données restent-elles privées ?', 'a' => 'Oui. Le texte est traité dans votre navigateur et n’est jamais envoyé.'],
        ],
    ],

    'sort-lines' => [
        'slug' => 'trier-lignes',
        'name' => 'Trier des lignes',
        'short_description' => 'Triez des lignes par ordre alphabétique, par longueur, à l’envers ou au hasard.',
        'description' => 'Triez n’importe quelle liste de A à Z ou de Z à A avec tri naturel des nombres, par longueur, à l’envers ou mélangée au hasard. Supprimez en option les doublons et les lignes vides.',
        'seo_title' => 'Trier des lignes par ordre alphabétique en ligne',
        'seo_description' => 'Triez des lignes de texte en ligne : A–Z, Z–A, tri naturel des nombres, par longueur, inversé ou aléatoire. Gratuit et instantané.',
        'content' => <<<'HTML'
<h2>Triez les listes comme on s’y attend</h2>
<p>Le tri alphabétique simple place « Élément 10 » avant « Élément 2 » car il compare caractère par caractère. Le tri naturel compare les nombres selon leur valeur : les listes de noms de fichiers, de versions, de chapitres et de numéros de facture se retrouvent dans le bon ordre.</p>
<h2>Usages populaires</h2>
<ul>
<li>Classer par ordre alphabétique des noms, des glossaires et des bibliographies.</li>
<li>Mélanger une liste pour un tirage au sort, des équipes aléatoires ou des questions de quiz.</li>
<li>Inverser un journal ou une chronologie.</li>
<li>Trier des mots-clés ou des URL avant de les comparer avec Comparer des textes.</li>
</ul>
<p>Pour supprimer les entrées répétées sans changer l’ordre, utilisez Supprimer les lignes en double.</p>
HTML,
        'steps' => [
            'Collez votre liste dans le champ d’entrée, un élément par ligne.',
            'Choisissez l’ordre : <strong>A → Z</strong>, <strong>Z → A</strong>, par longueur, inversé ou aléatoire (mélange).',
            'Laissez <strong>Tri naturel</strong> activé pour que <em>élément 2</em> passe avant <em>élément 10</em>.',
            'Si vous le souhaitez, supprimez les doublons et les lignes vides, puis copiez ou téléchargez la liste triée.',
        ],
        'faq' => [
            ['q' => 'Qu’est-ce que le tri naturel ?', 'a' => 'Le tri naturel classe les nombres présents dans le texte selon leur valeur, comme une personne le ferait : <em>fichier 2</em> passe avant <em>fichier 10</em>. Un tri alphabétique simple placerait <em>fichier 10</em> en premier.'],
            ['q' => 'Comment trier une liste par ordre alphabétique ?', 'a' => 'Collez la liste et choisissez A → Z. Le tri ignore la casse, sauf si vous activez Respecter la casse.'],
            ['q' => 'Comment mélanger une liste au hasard ?', 'a' => 'Choisissez Aléatoire. Chaque clic sur <strong>Mélanger à nouveau</strong> produit un nouvel ordre aléatoire, pratique pour un tirage au sort, former des équipes ou des questions de quiz.'],
            ['q' => 'Cela fonctionne-t-il avec les accents et d’autres langues ?', 'a' => 'Oui. Le tri utilise une comparaison adaptée à la langue : les lettres accentuées sont classées avec leur lettre de base.'],
            ['q' => 'Ma liste est-elle envoyée sur Internet ?', 'a' => 'Non. Le tri se fait dans votre navigateur.'],
        ],
    ],

    'lorem-ipsum-generator' => [
        'slug' => 'generateur-lorem-ipsum',
        'name' => 'Générateur de Lorem Ipsum',
        'short_description' => 'Générez du faux texte par paragraphes, phrases ou mots.',
        'description' => 'Créez du faux texte Lorem Ipsum pour vos maquettes et mises en page. Choisissez paragraphes, phrases ou mots, gardez l’ouverture classique et exportez en texte brut ou en HTML.',
        'seo_title' => 'Générateur de Lorem Ipsum : faux texte gratuit',
        'seo_description' => 'Générez du faux texte Lorem Ipsum en ligne. Paragraphes, phrases ou mots, paragraphes HTML en option et copie en un clic. Gratuit pour tous vos projets.',
        'content' => <<<'HTML'
<h2>D’où vient le Lorem Ipsum ?</h2>
<p>Le passage classique est tiré du « De finibus bonorum et malorum » de Cicéron, écrit en 45 av. J.-C. Les imprimeurs utilisent des versions brouillées de ce texte depuis le XVIe siècle, car il présente une répartition naturelle des lettres et des longueurs de mots : les mises en page paraissent réalistes sans que le contenu ne distraie les relecteurs.</p>
<h2>Conseils pour designers et développeurs</h2>
<ul>
<li>Utilisez des longueurs réalistes : générez le nombre de mots qu’aura votre contenu final.</li>
<li>Remplacez le faux texte par le vrai contenu le plus tôt possible : le contenu façonne le design.</li>
<li>Utilisez l’option HTML pour coller directement les paragraphes dans vos prototypes.</li>
</ul>
<p>Vous voulez connaître la longueur de votre vrai texte ? Utilisez le Compteur de mots.</p>
HTML,
        'steps' => [
            'Choisissez la quantité de faux texte nécessaire et s’il faut la compter en <strong>paragraphes</strong>, <strong>phrases</strong> ou <strong>mots</strong>.',
            'Laissez <strong>Commencer par « Lorem ipsum… »</strong> activé pour l’ouverture classique, ou désactivez-le pour un texte entièrement aléatoire.',
            'Activez <strong>HTML</strong> pour entourer chaque paragraphe de balises <code>&lt;p&gt;</code>, prêt à coller dans une page web.',
            'Copiez ou téléchargez le texte. Cliquez sur <strong>Générer</strong> pour obtenir une nouvelle variante.',
        ],
        'faq' => [
            ['q' => 'Qu’est-ce que le Lorem Ipsum ?', 'a' => 'Le Lorem Ipsum est un faux texte en latin brouillé, tiré d’une œuvre de Cicéron. Designers et développeurs l’utilisent pour remplir les mises en page et garder l’attention sur le design plutôt que sur le contenu.'],
            ['q' => 'Pourquoi utiliser du faux texte plutôt qu’un vrai texte ?', 'a' => 'Il montre comment le vrai texte s’intégrera dans une mise en page — longueur des lignes, espacement des paragraphes et typographie — avant que le texte final soit prêt, sans que le sens ne distraie.'],
            ['q' => 'Puis-je utiliser gratuitement le texte généré ?', 'a' => 'Oui. Le Lorem Ipsum n’est soumis à aucun droit d’auteur et vous pouvez utiliser le texte généré dans n’importe quel projet.'],
            ['q' => 'Quelle quantité de texte puis-je générer ?', 'a' => 'Jusqu’à 200 paragraphes ou phrases, ou 5000 mots à la fois.'],
        ],
    ],
];
