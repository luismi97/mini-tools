<?php

/*
| French copy for the image tools. See content/fr/tools.php.
*/

return [
    'image-compressor' => [
        'slug' => 'compresser-images',
        'name' => 'Compresser des images',
        'short_description' => 'Réduisez le poids des images JPG, PNG et WebP sans perte de qualité visible.',
        'description' => 'Compressez une ou plusieurs images à la fois et voyez le gain obtenu sur chaque fichier. Les images sont traitées sur votre appareil et ne sont jamais envoyées sur un serveur.',
        'seo_title' => 'Compresser des images JPG, PNG et WebP en ligne',
        'seo_description' => 'Compressez des images JPG, PNG et WebP gratuitement. Qualité réglable, traitement par lots et téléchargement immédiat. Vos fichiers restent sur votre appareil.',
        'content' => <<<'HTML'
<h2>Pourquoi compresser des images ?</h2>
<p>Les images trop lourdes sont la première cause de lenteur des sites web. Les compresser réduit la taille des fichiers — souvent de 60 à 80 % — sans différence visible, ce qui améliore le temps de chargement, les Core Web Vitals et le référencement. Des fichiers plus légers sont aussi plus faciles à envoyer par e-mail, à déposer dans des formulaires limités en taille et à stocker.</p>
<h2>Compression avec ou sans perte</h2>
<p>Le JPG et le WebP utilisent une compression avec perte : ils suppriment des détails que l’œil remarque à peine, d’où l’effet important du réglage de qualité. Le PNG est sans perte : pour des photos enregistrées en PNG, le meilleur gain consiste à les convertir en WebP ou en JPG, ou à réduire leurs dimensions avec Redimensionner des images.</p>
<h2>Les meilleurs formats pour le web</h2>
<ul>
<li><strong>WebP</strong> : le meilleur choix global pour les sites ; voir JPG en WebP et PNG en WebP.</li>
<li><strong>JPG</strong> : compatibilité universelle pour les photos.</li>
<li><strong>PNG</strong> : captures d’écran, logos et graphiques qui exigent des contours nets ou de la transparence.</li>
</ul>
HTML,
        'steps' => [
            'Faites glisser vos images JPG, PNG ou WebP dans la zone prévue, cliquez pour les parcourir ou collez une image avec Ctrl + V.',
            'Réglez le curseur de <strong>Qualité</strong>. Entre 70 et 80 %, le poids baisse énormément sans différence visible.',
            'Si vous le souhaitez, convertissez dans un autre format ou limitez la largeur maximale : réduire les grandes photos est ce qui fait gagner le plus de place.',
            'Téléchargez chaque image ou cliquez sur <strong>Tout télécharger</strong> pour obtenir toutes les images compressées dans un seul ZIP.',
        ],
        'faq' => [
            ['q' => 'Mes images sont-elles envoyées sur un serveur ?', 'a' => 'Non. La compression se fait entièrement dans votre navigateur, sur votre appareil. Vos images ne sont jamais envoyées, stockées ni vues par quelqu’un d’autre.'],
            ['q' => 'Quelle qualité choisir ?', 'a' => 'Pour les photos de sites web, 70–80 % offre un excellent équilibre entre poids et qualité. Utilisez 85–95 % pour les images où les détails comptent et 50–65 % quand le fichier le plus léger est la priorité.'],
            ['q' => 'Pourquoi mon PNG a-t-il à peine diminué ?', 'a' => 'Le PNG est un format sans perte : le réglage de qualité n’a presque pas d’effet. Pour des fichiers bien plus légers, convertissez les photos PNG en <strong>WebP</strong> ou en <strong>JPG</strong> via le format de sortie, ou réduisez la largeur maximale. Si le réencodage alourdit le fichier, l’original est conservé.'],
            ['q' => 'La compression supprime-t-elle les métadonnées EXIF ?', 'a' => 'Oui. Les images réencodées ne conservent pas les métadonnées EXIF comme les informations de l’appareil ou la position GPS, ce qui protège aussi votre vie privée. L’orientation est appliquée avant la suppression des métadonnées.'],
            ['q' => 'Combien d’images puis-je compresser à la fois ?', 'a' => 'Jusqu’à 30 images par lot, de 25 Mo maximum chacune.'],
        ],
    ],

    'image-resizer' => [
        'slug' => 'redimensionner-images',
        'name' => 'Redimensionner des images',
        'short_description' => 'Changez la taille d’images en pixels ou en pourcentage, une ou plusieurs à la fois.',
        'description' => 'Modifiez la largeur et la hauteur d’images JPG, PNG et WebP en pixels exacts ou en pourcentage, en conservant les proportions. Redimensionnez par lots et téléchargez tout dans un ZIP.',
        'seo_title' => 'Redimensionner des images JPG, PNG et WebP',
        'seo_description' => 'Redimensionnez des images gratuitement. Largeur et hauteur en pixels ou échelle en pourcentage, proportions conservées et traitement par lots. Sans envoi.',
        'content' => <<<'HTML'
<h2>Pourquoi redimensionner des images ?</h2>
<p>Les appareils photo des téléphones produisent des images de 4000 pixels de large ou plus, bien plus grandes que ce dont un écran a besoin. Les redimensionner à leur taille d’affichage réelle accélère leur chargement, réduit l’espace occupé et respecte les exigences des sites web, des boutiques en ligne et des réseaux sociaux.</p>
<h2>Tailles d’image recommandées</h2>
<ul>
<li><strong>Images principales d’un site :</strong> 1920 px de large.</li>
<li><strong>Images de blog et de produits :</strong> 800–1200 px de large.</li>
<li><strong>Publications Instagram :</strong> 1080 × 1080 px (carré) ou 1080 × 1350 px (portrait).</li>
<li><strong>Miniatures YouTube :</strong> 1280 × 720 px.</li>
<li><strong>Pièces jointes d’e-mail :</strong> 1200–1600 px sur le plus grand côté.</li>
</ul>
<p>Besoin d’un cadrage précis plutôt que d’une taille plus petite ? Utilisez Recadrer une image pour découper la photo selon un format donné, puis allégez-la avec Compresser des images.</p>
HTML,
        'steps' => [
            'Déposez vos images JPG, PNG ou WebP dans la zone prévue, parcourez vos fichiers ou collez-les avec Ctrl + V. Vous pouvez en redimensionner plusieurs à la fois.',
            'Choisissez <strong>En pourcentage</strong> pour tout mettre à l’échelle (par exemple 50 %) ou <strong>Par dimensions</strong> pour définir une largeur et/ou une hauteur exactes en pixels.',
            'Laissez <strong>Conserver les proportions</strong> activé pour éviter toute déformation. Si vous définissez largeur et hauteur, chaque image tient dans ce cadre.',
            'Téléchargez chaque image ou cliquez sur <strong>Tout télécharger</strong> pour obtenir un ZIP.',
        ],
        'faq' => [
            ['q' => 'Redimensionner réduit-il la qualité ?', 'a' => 'Réduire une image la garde nette. L’agrandir au-delà de sa taille d’origine ne peut pas ajouter de détails, elle peut donc paraître un peu floue. En JPG et WebP, vous pouvez aussi choisir la qualité de sortie.'],
            ['q' => 'Comment redimensionner sans déformer l’image ?', 'a' => 'Laissez <strong>Conserver les proportions</strong> activé et saisissez seulement la largeur ou seulement la hauteur. L’autre côté est calculé automatiquement pour garder les proportions d’origine.'],
            ['q' => 'Quelle taille pour les images web ?', 'a' => 'Pour la plupart des sites, 1200–1920 px de large suffisent pour les images plein écran et 600–800 px pour les images dans le contenu. Des images plus petites se chargent plus vite et améliorent les Core Web Vitals.'],
            ['q' => 'Mes images sont-elles envoyées sur Internet ?', 'a' => 'Non. Les images sont redimensionnées dans votre navigateur et ne quittent jamais votre appareil.'],
            ['q' => 'Combien d’images puis-je redimensionner à la fois ?', 'a' => 'Jusqu’à 30 images par lot, de 25 Mo maximum chacune.'],
        ],
    ],

    'heic-to-jpg' => [
        'slug' => 'heic-en-jpg',
        'name' => 'HEIC en JPG',
        'short_description' => 'Convertissez les photos HEIC de l’iPhone en JPG ou PNG dans votre navigateur.',
        'description' => 'Convertissez les photos HEIC et HEIF de votre iPhone ou iPad en JPG ou PNG. Convertissez par lots et téléchargez tout dans un ZIP — vos photos ne sont jamais envoyées.',
        'seo_title' => 'Convertir HEIC en JPG : photos iPhone gratuitement',
        'seo_description' => 'Convertissez HEIC en JPG gratuitement. Passez vos photos d’iPhone en JPG ou PNG par lots dans votre navigateur : confidentiel, sans envoi et sans inscription.',
        'content' => <<<'HTML'
<h2>Pourquoi convertir HEIC en JPG ?</h2>
<p>Les iPhone enregistrent les photos en HEIC par défaut, car elles occupent environ moitié moins de place qu’un JPG. Le problème, c’est la compatibilité : de nombreux logiciels Windows, sites web, formulaires en ligne, anciens téléphones Android et services d’impression n’ouvrent toujours pas les fichiers HEIC. Les convertir en JPG permet de les ouvrir partout.</p>
<h2>Comment ouvrir des fichiers HEIC sous Windows</h2>
<p>Windows a besoin d’un codec supplémentaire pour ouvrir le HEIC. Plutôt que d’installer quoi que ce soit, déposez vos photos ici et convertissez-les en JPG en quelques secondes. La conversion se fait dans votre navigateur : vos photos personnelles ne sont jamais envoyées.</p>
<h2>JPG ou PNG ?</h2>
<p>Choisissez <strong>JPG</strong> pour les photos : les fichiers sont légers et fonctionnent partout. Choisissez <strong>PNG</strong> uniquement si vous avez besoin d’une qualité sans perte pour retoucher. Après la conversion, vous pouvez encore alléger les fichiers avec Compresser des images ou Redimensionner des images.</p>
HTML,
        'steps' => [
            'Déposez vos photos HEIC ou HEIF (d’un iPhone ou d’un iPad) dans la zone prévue, ou cliquez pour les parcourir. Vous pouvez en convertir plusieurs à la fois.',
            'Choisissez le format de sortie : <strong>JPG</strong> pour des fichiers légers qui s’ouvrent partout, ou <strong>PNG</strong> pour une qualité sans perte.',
            'Ajustez la qualité si nécessaire. Entre 85 et 92 %, les photos sont identiques à l’original.',
            'Téléchargez chaque photo ou cliquez sur <strong>Tout télécharger</strong> pour obtenir un ZIP de toutes les images converties.',
        ],
        'faq' => [
            ['q' => 'Qu’est-ce qu’un fichier HEIC ?', 'a' => 'Le HEIC (High Efficiency Image Container) est le format photo par défaut des iPhone et iPad depuis iOS 11. Il économise de l’espace, mais de nombreux logiciels Windows, sites web et anciens appareils ne savent pas l’ouvrir.'],
            ['q' => 'Mes photos sont-elles envoyées sur Internet ?', 'a' => 'Non. Vos photos sont converties dans votre navigateur et ne quittent jamais votre appareil, ce qui compte pour des images personnelles.'],
            ['q' => 'L’orientation de la photo est-elle conservée ?', 'a' => 'Oui. Les informations de rotation enregistrées dans le fichier HEIC sont appliquées : les photos en portrait restent droites.'],
            ['q' => 'Pourquoi la première conversion prend-elle quelques secondes ?', 'a' => 'La plupart des navigateurs ne savent pas lire le HEIC seuls : le convertisseur télécharge donc un décodeur HEIC lors de la première utilisation. Ensuite, les conversions sont rapides. Safari sait décoder le HEIC nativement.'],
            ['q' => 'La position GPS est-elle supprimée ?', 'a' => 'Oui. Les images converties ne contiennent pas de métadonnées EXIF comme la position GPS ou les informations de l’appareil.'],
            ['q' => 'Comment empêcher mon iPhone d’enregistrer en HEIC ?', 'a' => 'Allez dans Réglages › Appareil photo › Formats et choisissez <strong>Le plus compatible</strong>. Les nouvelles photos seront enregistrées en JPG.'],
        ],
    ],

    'crop-image' => [
        'slug' => 'recadrer-image',
        'name' => 'Recadrer une image',
        'short_description' => 'Recadrez des photos visuellement ou selon des dimensions et formats exacts.',
        'description' => 'Faites glisser pour sélectionner la zone à garder, choisissez un format comme 1:1 ou 16:9, ou saisissez des valeurs exactes en pixels. Téléchargez l’image recadrée en JPG, PNG ou WebP.',
        'seo_title' => 'Recadrer une image en ligne gratuitement',
        'seo_description' => 'Recadrez des images gratuitement : sélection à la souris, formats 1:1, 4:3 et 16:9 ou pixels exacts, puis téléchargement en JPG, PNG ou WebP. Sans envoi.',
        'content' => <<<'HTML'
<h2>Recadrages pour les réseaux sociaux</h2>
<ul>
<li><strong>1:1</strong> : photos de profil et publications carrées.</li>
<li><strong>4:5</strong> : publications Instagram en portrait, qui occupent plus de place dans le fil.</li>
<li><strong>9:16</strong> : stories, Reels, TikTok et YouTube Shorts.</li>
<li><strong>16:9</strong> : miniatures YouTube, présentations et bannières web.</li>
</ul>
<h2>Astuce de composition : la règle des tiers</h2>
<p>La grille à l’intérieur de la sélection la divise en tiers. Placer le sujet sur l’une des lignes ou des intersections donne généralement une photo plus équilibrée et naturelle que de le centrer.</p>
<p>Après le recadrage, utilisez Redimensionner des images pour atteindre une taille exacte en pixels, ou Compresser des images pour alléger le fichier.</p>
HTML,
        'steps' => [
            'Déposez une image dans la zone prévue, cliquez pour la parcourir ou collez-la avec Ctrl + V.',
            'Faites glisser la sélection pour la déplacer et ses coins pour la redimensionner. Utilisez les flèches du clavier pour un ajustement au pixel près (maintenez Maj pour déplacer de 10 px).',
            'Choisissez un format comme <strong>1:1</strong> pour les photos de profil, <strong>16:9</strong> pour les miniatures ou <strong>9:16</strong> pour les stories, ou saisissez des valeurs exactes en pixels.',
            'Choisissez le format de sortie et cliquez sur <strong>Recadrer et télécharger</strong>.',
        ],
        'faq' => [
            ['q' => 'Quel format choisir ?', 'a' => 'Utilisez 1:1 pour les photos de profil et les publications Instagram, 4:5 pour les publications Instagram en portrait, 16:9 pour les miniatures YouTube et les présentations, 9:16 pour les stories et les Reels, et 3:2 ou 4:3 pour les tirages photo classiques.'],
            ['q' => 'Le recadrage réduit-il la qualité ?', 'a' => 'Le recadrage conserve les pixels d’origine de la zone sélectionnée en pleine résolution. En JPG et WebP, vous pouvez choisir la qualité ; la sortie PNG est sans perte.'],
            ['q' => 'Ma photo est-elle envoyée sur Internet ?', 'a' => 'Non. L’image est recadrée dans votre navigateur et ne quitte jamais votre appareil.'],
            ['q' => 'Quels formats sont pris en charge ?', 'a' => 'Vous pouvez recadrer des images JPG, PNG et WebP jusqu’à 25 Mo et enregistrer le résultat en JPG, PNG ou WebP.'],
        ],
    ],

    'jpg-to-webp' => [
        'slug' => 'jpg-en-webp',
        'name' => 'JPG en WebP',
        'short_description' => 'Convertissez des images JPG au format WebP, plus léger et plus rapide.',
        'description' => 'Convertissez des images JPG et JPEG en WebP avec une qualité réglable. Convertissez plusieurs fichiers à la fois et téléchargez-les séparément ou tous ensemble. Tout se passe dans votre navigateur.',
        'seo_title' => 'Convertir JPG en WebP en ligne, gratuit et privé',
        'seo_description' => 'Convertissez JPG en WebP gratuitement. Conversion par lots, qualité réglable et téléchargement en ZIP. Tout se fait dans votre navigateur, sans envoi.',
        'content' => <<<'HTML'
<h2>Pourquoi convertir JPG en WebP ?</h2>
<p>Les images WebP sont généralement 25 à 35 % plus légères qu’un JPG de qualité visuelle équivalente. Des images plus légères accélèrent le chargement des pages, améliorent le Largest Contentful Paint (LCP) et aident le référencement sur Google, qui tient compte de l’expérience de page. Tous les navigateurs modernes prennent en charge le WebP.</p>
<h2>Utiliser le WebP sur votre site</h2>
<p>La plupart des CMS, dont WordPress, acceptent les images WebP. Pour de meilleurs résultats, redimensionnez les images à leur taille d’affichage avec Redimensionner des images avant de les convertir, et gardez une qualité entre 75 et 85 %.</p>
<p>Vous convertissez des graphiques avec transparence ? Utilisez PNG en WebP. Besoin de revenir à un format universel ? Utilisez WebP en JPG.</p>
HTML,
        'steps' => [
            'Faites glisser vos images JPG dans la zone prévue, cliquez pour les parcourir ou collez une image avec Ctrl + V. Vous pouvez en ajouter plusieurs à la fois.',
            'Choisissez la <strong>Qualité</strong>. Entre 75 et 85 %, les fichiers WebP sont visuellement identiques et bien plus légers.',
            'Chaque image est convertie instantanément dans votre navigateur. Vérifiez le nouveau poids et le pourcentage gagné.',
            'Téléchargez les images une par une ou cliquez sur <strong>Tout télécharger</strong> pour obtenir un ZIP de tous les fichiers WebP.',
        ],
        'faq' => [
            ['q' => 'Qu’est-ce que le WebP ?', 'a' => 'Le WebP est un format d’image moderne créé par Google. À qualité visuelle égale, les fichiers WebP sont généralement 25 à 35 % plus légers qu’un JPG, ce qui accélère les sites et améliore les Core Web Vitals.'],
            ['q' => 'Mes images sont-elles envoyées sur Internet ?', 'a' => 'Non. La conversion se fait entièrement dans votre navigateur. Vos images ne quittent jamais votre appareil.'],
            ['q' => 'Tous les navigateurs prennent-ils en charge le WebP ?', 'a' => 'Oui. Tous les navigateurs modernes (Chrome, Edge, Firefox et Safari 14 ou plus) affichent les images WebP. Créer des fichiers WebP nécessite un navigateur récent ; si le vôtre ne le peut pas, l’outil vous le signale.'],
            ['q' => 'Puis-je aussi convertir des PNG en WebP ?', 'a' => 'Oui. Les fichiers PNG sont aussi acceptés et leur transparence est conservée dans le WebP.'],
            ['q' => 'Y a-t-il des limites ?', 'a' => 'Vous pouvez convertir jusqu’à 30 images par lot, de 25 Mo maximum chacune.'],
        ],
    ],

    'png-to-webp' => [
        'slug' => 'png-en-webp',
        'name' => 'PNG en WebP',
        'short_description' => 'Convertissez des images PNG en WebP en conservant la transparence.',
        'description' => 'Convertissez des fichiers PNG en WebP pour les alléger nettement sans perdre la transparence. Convertissez par lots et téléchargez séparément ou dans un ZIP, directement dans votre navigateur.',
        'seo_title' => 'Convertir PNG en WebP avec transparence, gratuit',
        'seo_description' => 'Convertissez PNG en WebP gratuitement. Transparence conservée, conversion par lots, qualité réglable et téléchargement en ZIP. Les images restent chez vous.',
        'content' => <<<'HTML'
<h2>PNG ou WebP</h2>
<p>Le PNG est excellent pour les graphiques avec transparence, mais ses fichiers sont lourds. Le WebP gère aussi la transparence et est généralement bien plus léger : convertir en WebP logos, icônes, captures d’écran et photos de produits sur fond transparent accélère les sites sans perdre les zones transparentes.</p>
<h2>Quand garder le PNG</h2>
<p>Conservez le PNG d’origine comme fichier maître pour les retouches futures et pour les plateformes qui n’acceptent pas le WebP. Pour des photos JPG, utilisez JPG en WebP ; pour alléger des images sans changer de format, utilisez Compresser des images.</p>
<p>La conversion se fait sur votre propre appareil : vos fichiers ne sont jamais envoyés et vous pouvez en convertir plusieurs à la fois, vérifier le poids de chaque résultat et tout télécharger d’un coup.</p>
HTML,
        'steps' => [
            'Déposez vos images PNG dans la zone prévue, cliquez pour les parcourir ou collez une capture d’écran avec Ctrl + V.',
            'Réglez la <strong>Qualité</strong>. Entre 80 et 90 %, graphiques et captures restent nets et le poids baisse fortement.',
            'Chaque PNG est converti en WebP instantanément dans votre navigateur, avec ses fonds transparents.',
            'Téléchargez les images une par une ou utilisez <strong>Tout télécharger</strong> pour obtenir un ZIP.',
        ],
        'faq' => [
            ['q' => 'Le WebP conserve-t-il la transparence du PNG ?', 'a' => 'Oui. Le WebP gère le canal alpha : les zones transparentes et semi-transparentes de votre PNG sont conservées.'],
            ['q' => 'De combien le WebP est-il plus léger que le PNG ?', 'a' => 'Pour les photos et les images complexes, le WebP est souvent 50 à 80 % plus léger que le PNG. Pour des graphiques simples avec peu de couleurs, le gain est moindre, mais le WebP reste généralement plus léger.'],
            ['q' => 'Puis-je utiliser le WebP sur mon site ?', 'a' => 'Oui. Tous les navigateurs modernes prennent en charge le WebP, et des images plus légères améliorent la vitesse de chargement et les Core Web Vitals.'],
            ['q' => 'Mes fichiers sont-ils envoyés sur Internet ?', 'a' => 'Non. La conversion se fait sur votre appareil. Vos images ne sont jamais envoyées.'],
        ],
    ],

    'webp-to-jpg' => [
        'slug' => 'webp-en-jpg',
        'name' => 'WebP en JPG',
        'short_description' => 'Convertissez des images WebP en JPG, compatible partout.',
        'description' => 'Convertissez des images WebP en JPG pour les ouvrir partout : anciens logiciels, e-mail et services d’impression. Convertissez par lots et téléchargez tout dans un ZIP.',
        'seo_title' => 'Convertir WebP en JPG en ligne, gratuit et rapide',
        'seo_description' => 'Convertissez WebP en JPG gratuitement. Conversion par lots, qualité réglable et téléchargement en ZIP. La conversion se fait dans votre navigateur, sans envoi.',
        'content' => <<<'HTML'
<h2>Pourquoi tombe-t-on sur des images WebP ?</h2>
<p>De nombreux sites servent leurs images en WebP pour charger plus vite : les images enregistrées depuis Internet finissent donc souvent en fichiers <code>.webp</code>. Certains logiciels, imprimantes, clients de messagerie et formulaires ne les acceptent pas encore ; les convertir en JPG règle le problème.</p>
<h2>Astuces</h2>
<ul>
<li>Le JPG ne gère pas la transparence : les zones transparentes deviennent blanches.</li>
<li>Utilisez une qualité de 85–92 % pour les photos que vous pourriez imprimer.</li>
<li>Besoin d’alléger l’image ensuite ? Utilisez Compresser des images ou Redimensionner des images.</li>
</ul>
<h2>Convertir mes photos est-il sûr ?</h2>
<p>Oui. La conversion se fait sur votre propre appareil : vos images ne sont jamais envoyées. Vos fichiers WebP d’origine ne changent pas : l’outil crée de nouvelles copies JPG à télécharger une par une ou ensemble dans un ZIP.</p>
HTML,
        'steps' => [
            'Déposez vos images WebP dans la zone prévue ou cliquez pour les parcourir. La conversion par lots est prise en charge.',
            'Réglez la <strong>Qualité</strong> du JPG. Entre 85 et 92 %, le résultat est excellent pour les photos.',
            'Chaque image est convertie en JPG dans votre navigateur. Les zones transparentes deviennent blanches, car le JPG ne gère pas la transparence.',
            'Téléchargez les fichiers JPG séparément ou tous ensemble dans un ZIP.',
        ],
        'faq' => [
            ['q' => 'Pourquoi convertir WebP en JPG ?', 'a' => 'Le JPG fonctionne partout : anciens éditeurs photo, clients de messagerie, documents bureautiques, services d’impression et plateformes qui n’acceptent pas le WebP.'],
            ['q' => 'Que deviennent les fonds transparents ?', 'a' => 'Le JPG ne gère pas la transparence : les zones transparentes sont remplies de blanc. Pour la conserver, convertissez en PNG avec WebP en PNG.'],
            ['q' => 'La qualité de l’image va-t-elle baisser ?', 'a' => 'À partir de 85 % de qualité, la différence est invisible sur les photos. Le JPG peut être plus lourd que le WebP, car la compression JPG est moins efficace.'],
            ['q' => 'Mes images sont-elles envoyées sur Internet ?', 'a' => 'Non. La conversion se fait dans votre navigateur et vos images ne quittent jamais votre appareil.'],
        ],
    ],

    'png-to-jpg' => [
        'slug' => 'png-en-jpg',
        'name' => 'PNG en JPG',
        'short_description' => 'Convertissez des images et captures PNG en fichiers JPG plus légers.',
        'description' => 'Convertissez des images PNG en JPG pour les alléger et les rendre compatibles avec n’importe quel logiciel. Convertissez par lots, choisissez la qualité et téléchargez tout dans un ZIP, dans votre navigateur.',
        'seo_title' => 'Convertir PNG en JPG gratuitement, rapide et privé',
        'seo_description' => 'Convertissez PNG en JPG gratuitement. Conversion par lots, qualité réglable et téléchargement en ZIP. Tout se fait dans le navigateur, sans envoi.',
        'content' => <<<'HTML'
<h2>Quand convertir PNG en JPG</h2>
<p>Les captures d’écran et les images exportées sont souvent enregistrées en PNG, qui peut peser plusieurs mégaoctets pour une simple image de type photo. Les convertir en JPG réduit fortement leur poids : idéal pour les pièces jointes, les formulaires limités en taille, les annonces de vente en ligne et le partage sur les réseaux sociaux.</p>
<h2>Gardez le PNG quand c’est important</h2>
<p>Le PNG est préférable pour les logos, les icônes, les schémas et tout ce qui nécessite un fond transparent ou un texte parfaitement net. Si vous voulez un fichier léger tout en gardant la transparence, utilisez PNG en WebP.</p>
<p>Besoin d’un fichier encore plus léger après la conversion ? Passez-le dans Compresser des images ou réduisez ses dimensions avec Redimensionner des images.</p>
HTML,
        'steps' => [
            'Déposez vos images PNG dans la zone prévue, cliquez pour les parcourir ou collez une capture d’écran avec Ctrl + V.',
            'Choisissez la <strong>Qualité</strong> du JPG. Entre 85 et 92 %, photos et captures restent nettes.',
            'Chaque PNG est converti en JPG instantanément. Les zones transparentes deviennent blanches, car le JPG ne gère pas la transparence.',
            'Téléchargez les images une par une ou cliquez sur <strong>Tout télécharger</strong> pour obtenir un ZIP.',
        ],
        'faq' => [
            ['q' => 'Pourquoi convertir PNG en JPG ?', 'a' => 'Les photos et captures enregistrées en PNG pèsent souvent plusieurs fois plus que la même image en JPG. Une fois converties, elles sont plus faciles à envoyer, à mettre en ligne et à partager, et s’ouvrent dans n’importe quel logiciel.'],
            ['q' => 'Que deviennent les fonds transparents ?', 'a' => 'Le JPG ne peut pas stocker la transparence : les zones transparentes sont remplies de blanc. Pour conserver la transparence avec un fichier léger, utilisez PNG en WebP.'],
            ['q' => 'Vais-je perdre en qualité ?', 'a' => 'Le JPG utilise une compression avec perte, mais à partir de 85 % de qualité la différence est invisible sur les photos. Les graphiques avec du texte fin peuvent paraître un peu plus doux ; pour eux, mieux vaut garder le PNG ou le WebP.'],
            ['q' => 'Mes images sont-elles envoyées sur Internet ?', 'a' => 'Non. La conversion se fait dans votre navigateur et vos images ne quittent jamais votre appareil.'],
        ],
    ],

    'jpg-to-png' => [
        'slug' => 'jpg-en-png',
        'name' => 'JPG en PNG',
        'short_description' => 'Convertissez des photos JPG en images PNG sans perte.',
        'description' => 'Convertissez des images JPG et JPEG en PNG pour qu’elles ne perdent plus de qualité lors des retouches suivantes. Convertissez par lots et téléchargez tous les fichiers dans un ZIP.',
        'seo_title' => 'Convertir JPG en PNG en ligne, gratuit et sans perte',
        'seo_description' => 'Convertissez JPG en PNG gratuitement. Conversion par lots et téléchargement en ZIP, le tout traité dans votre navigateur. Sans envoi et sans inscription.',
        'content' => <<<'HTML'
<h2>Pourquoi utiliser le PNG ?</h2>
<p>Le JPG perd un peu de qualité à chaque retouche et réenregistrement. Le PNG est sans perte : convertir une photo en PNG avant de la retoucher la protège d’une dégradation supplémentaire. De nombreux outils de design, services d’impression et magasins d’applications demandent aussi des fichiers PNG.</p>
<h2>À quoi s’attendre</h2>
<p>Le PNG sera généralement plus lourd que le JPG d’origine, car les images sans perte conservent chaque pixel à l’identique. La conversion ne récupère pas les détails déjà perdus par la compression JPG, et le fond reste le même : les photos JPG n’ont pas de transparence à conserver.</p>
<p>Vous préférez un fichier léger pour le web ? Utilisez JPG en WebP ou Compresser des images. Pour découper une partie de la photo avant, utilisez Recadrer une image.</p>
HTML,
        'steps' => [
            'Déposez vos images JPG ou JPEG dans la zone prévue, ou cliquez pour les parcourir. Vous pouvez en convertir plusieurs à la fois.',
            'Chaque image est convertie en PNG instantanément dans votre navigateur.',
            'Vérifiez le nouveau poids de chaque image.',
            'Téléchargez les fichiers PNG séparément ou tous ensemble dans un ZIP.',
        ],
        'faq' => [
            ['q' => 'Pourquoi convertir JPG en PNG ?', 'a' => 'Le PNG est sans perte : l’image ne perdra plus de qualité lorsque vous la retoucherez et l’enregistrerez à nouveau. Certains logiciels, services d’impression et outils de design exigent aussi des fichiers PNG.'],
            ['q' => 'La conversion améliore-t-elle la qualité ?', 'a' => 'Non. La conversion ne peut pas récupérer les détails supprimés par la compression JPG, mais elle évite de nouvelles pertes lors des retouches futures.'],
            ['q' => 'Pourquoi le fichier PNG est-il plus lourd ?', 'a' => 'Le PNG conserve chaque pixel sans compression avec perte : les photos sont donc généralement plus lourdes. Pour le web, le JPG ou le WebP conviennent mieux aux photos.'],
            ['q' => 'Le PNG a-t-il un fond transparent ?', 'a' => 'Les images JPG n’ont pas de transparence : le PNG conserve donc le même fond uni que la photo d’origine.'],
            ['q' => 'Mes images sont-elles envoyées sur Internet ?', 'a' => 'Non. Tout se passe sur votre appareil.'],
        ],
    ],

    'webp-to-png' => [
        'slug' => 'webp-en-png',
        'name' => 'WebP en PNG',
        'short_description' => 'Convertissez des images WebP en PNG en conservant la transparence.',
        'description' => 'Convertissez des images WebP en PNG pour les ouvrir dans n’importe quel éditeur ou logiciel, avec leurs fonds transparents. Convertissez par lots et téléchargez tout dans un ZIP.',
        'seo_title' => 'Convertir WebP en PNG avec transparence, gratuit',
        'seo_description' => 'Convertissez WebP en PNG gratuitement. Transparence conservée, conversion par lots et téléchargement en ZIP. Les images ne quittent pas votre appareil.',
        'content' => <<<'HTML'
<h2>Pourquoi les images WebP posent problème</h2>
<p>Les sites servent leurs images en WebP parce que les fichiers sont légers et rapides. Mais une fois enregistrées, de nombreux éditeurs, logiciels de présentation, anciens systèmes d’exploitation et formulaires ne savent pas les ouvrir. Les convertir en PNG donne un fichier compatible partout, sans perte de qualité.</p>
<h2>Le PNG conserve la transparence</h2>
<p>Les logos, stickers et photos de produits enregistrés depuis Internet ont souvent un fond transparent. Le PNG les conserve à l’identique, contrairement au JPG. Si vous préférez des fichiers plus légers pour des photos, utilisez WebP en JPG.</p>
<p>Vous voulez faire l’inverse pour votre propre site ? Convertissez vos images avec PNG en WebP ou JPG en WebP.</p>
HTML,
        'steps' => [
            'Déposez vos images WebP dans la zone prévue ou cliquez pour les parcourir. La conversion par lots est prise en charge.',
            'Chaque image est convertie en PNG instantanément, avec ses fonds transparents.',
            'Vérifiez le poids de chaque fichier converti.',
            'Téléchargez les images une par une ou cliquez sur <strong>Tout télécharger</strong> pour obtenir un ZIP.',
        ],
        'faq' => [
            ['q' => 'Pourquoi convertir WebP en PNG ?', 'a' => 'De nombreux éditeurs d’images, outils de design, logiciels de présentation et formulaires n’acceptent toujours pas le WebP. Le PNG fonctionne partout et conserve toute la qualité.'],
            ['q' => 'La transparence est-elle conservée ?', 'a' => 'Oui. Contrairement au JPG, le PNG gère la transparence : logos, icônes et stickers gardent leur fond transparent.'],
            ['q' => 'Vaut-il mieux le PNG ou le JPG ?', 'a' => 'Choisissez le PNG pour les graphiques, logos, captures d’écran et tout ce qui comporte de la transparence. Pour des photos où un fichier léger compte davantage, utilisez WebP en JPG.'],
            ['q' => 'Mes images sont-elles envoyées sur Internet ?', 'a' => 'Non. La conversion se fait entièrement dans votre navigateur.'],
        ],
    ],

    'svg-to-png' => [
        'slug' => 'svg-en-png',
        'name' => 'SVG en PNG',
        'short_description' => 'Convertissez des graphiques vectoriels SVG en PNG à n’importe quelle échelle.',
        'description' => 'Convertissez des icônes, logos et illustrations SVG en PNG à l’échelle 1×, 2×, 4× ou 8×, sur fond transparent ou coloré. Conversion par lots dans votre navigateur.',
        'seo_title' => 'Convertir SVG en PNG haute résolution, gratuit',
        'seo_description' => 'Convertissez SVG en PNG gratuitement, jusqu’à 8× la résolution, sur fond transparent ou coloré. Conversion par lots, sans envoi de fichiers.',
        'content' => <<<'HTML'
<h2>Quand il vous faut un PNG plutôt qu’un SVG</h2>
<p>Le SVG est parfait pour les logos et les icônes sur le web, car il reste net à toutes les tailles. Mais de nombreux endroits n’acceptent que des images matricielles : profils de réseaux sociaux, signatures d’e-mail, diapositives de présentation, fiches de magasins d’applications et certains CMS. Le convertir en PNG rend votre design vectoriel utilisable partout.</p>
<h2>Bien choisir l’échelle</h2>
<ul>
<li><strong>1×</strong> : la taille définie dans le SVG.</li>
<li><strong>2×</strong> : net sur les écrans haute résolution (Retina).</li>
<li><strong>4× ou 8×</strong> : impression, grandes bannières ou retouches ultérieures.</li>
</ul>
<p>Besoin d’un fichier plus léger ensuite ? Utilisez Compresser des images ou convertissez le résultat avec PNG en WebP.</p>
HTML,
        'steps' => [
            'Déposez vos fichiers SVG dans la zone prévue ou cliquez pour les parcourir. Vous pouvez en convertir plusieurs à la fois.',
            'Choisissez l’<strong>Échelle</strong>. Le SVG étant vectoriel, 2× ou 4× produit des PNG nets pour les écrans haute résolution.',
            'Gardez le fond transparent ou choisissez une couleur unie.',
            'Téléchargez chaque PNG ou cliquez sur <strong>Tout télécharger</strong> pour obtenir un ZIP.',
        ],
        'faq' => [
            ['q' => 'Quelle taille aura le PNG ?', 'a' => 'Le PNG reprend la taille définie dans le SVG (sa largeur et sa hauteur, ou son viewBox) multipliée par l’échelle choisie. Une icône de 24×24 en 4× donne 96×96 pixels.'],
            ['q' => 'Le fond transparent est-il conservé ?', 'a' => 'Oui, par défaut. Décochez <strong>Fond transparent</strong> pour le remplir d’une couleur.'],
            ['q' => 'Pourquoi mon SVG s’affiche-t-il différemment ?', 'a' => 'Les SVG qui chargent des polices ou des images externes depuis d’autres sites ne peuvent pas les inclure dans le PNG. Vectorisez le texte dans votre outil de design pour un résultat exact.'],
            ['q' => 'Convertir des fichiers SVG est-il sûr ?', 'a' => 'Oui. Les SVG sont rendus comme des images dans votre navigateur : aucun script qu’ils contiennent n’est exécuté, et les fichiers ne sont jamais envoyés.'],
        ],
    ],
];
