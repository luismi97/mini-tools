<?php

/*
| French copy for the PDF tools (and Image to PDF). See content/fr/tools.php.
*/

return [
    'merge-pdf' => [
        'slug' => 'fusionner-pdf',
        'name' => 'Fusionner des PDF',
        'short_description' => 'Réunissez plusieurs fichiers PDF en un seul document, dans l’ordre de votre choix.',
        'description' => 'Ajoutez vos fichiers PDF, faites-les glisser dans l’ordre voulu et fusionnez-les en un seul PDF. Les fichiers sont assemblés dans votre navigateur et ne sont jamais envoyés.',
        'seo_title' => 'Fusionner des PDF en ligne, gratuit et confidentiel',
        'seo_description' => 'Fusionnez des PDF gratuitement en ligne. Réunissez plusieurs PDF en un seul, réorganisez-les par glisser-déposer et téléchargez-les aussitôt. Sans envoi.',
        'content' => <<<'HTML'
<h2>Quand fusionner des fichiers PDF</h2>
<p>Réunir des PDF est utile dès qu’il faut envoyer un seul document : une candidature avec CV et lettre de motivation, une note de frais avec tous ses justificatifs ou un contrat avec ses annexes. Un fichier unique est plus simple à envoyer par e-mail, à déposer sur les portails qui n’acceptent qu’une pièce jointe et à imprimer dans le bon ordre.</p>
<h2>Fusionnez des PDF sans les mettre en ligne</h2>
<p>La plupart des services PDF en ligne envoient vos documents sur leurs serveurs. Cet outil assemble les fichiers directement dans votre navigateur : les documents confidentiels comme les relevés bancaires, les comptes rendus médicaux et les contrats ne quittent jamais votre ordinateur ou votre téléphone.</p>
<h2>Astuces</h2>
<ul>
<li>Utilisez d’abord Diviser un PDF si vous n’avez besoin que de quelques pages d’un fichier.</li>
<li>Vous avez des photos ou des numérisations plutôt que des PDF ? Convertissez-les avec JPG en PDF, puis fusionnez-les.</li>
<li>Besoin des pages sous forme d’images ? Utilisez PDF en JPG.</li>
</ul>
HTML,
        'steps' => [
            'Déposez deux fichiers PDF ou plus dans la zone prévue, ou cliquez pour les parcourir.',
            'Faites glisser les fichiers (ou utilisez les flèches) pour les mettre dans l’ordre voulu. Le nombre de pages de chaque fichier s’affiche.',
            'Cliquez sur <strong>Fusionner les PDF</strong>.',
            'Votre PDF fusionné est téléchargé immédiatement sous le nom <code>merged.pdf</code>.',
        ],
        'faq' => [
            ['q' => 'Mes fichiers PDF sont-ils envoyés sur un serveur ?', 'a' => 'Non. Les PDF sont fusionnés entièrement dans votre navigateur : les documents confidentiels ne quittent jamais votre appareil.'],
            ['q' => 'Y a-t-il une limite de fichiers ou de taille ?', 'a' => 'Vous pouvez fusionner jusqu’à 30 PDF à la fois, de 100 Mo maximum chacun. Les très gros fichiers peuvent prendre un peu plus de temps selon votre appareil.'],
            ['q' => 'Les liens, signets et champs de formulaire sont-ils conservés ?', 'a' => 'Le contenu des pages, les images et le texte restent identiques. Les éléments interactifs, comme les signets et certains champs de formulaire, peuvent ne pas être repris dans le fichier fusionné.'],
            ['q' => 'Puis-je fusionner des PDF protégés par mot de passe ?', 'a' => 'Non. Supprimez d’abord le mot de passe du PDF, puis fusionnez-le.'],
            ['q' => 'Puis-je réorganiser ou supprimer des pages ?', 'a' => 'Ici, vous réorganisez des fichiers entiers. Pour supprimer ou extraire des pages précises, utilisez Diviser un PDF avant ou après la fusion.'],
        ],
    ],

    'split-pdf' => [
        'slug' => 'diviser-pdf',
        'name' => 'Diviser un PDF',
        'short_description' => 'Extrayez des pages ou divisez un PDF en plusieurs fichiers plus petits.',
        'description' => 'Extrayez des pages précises dans un nouveau PDF, divisez un document selon des plages personnalisées ou enregistrez chaque page dans un PDF distinct. Votre fichier est traité dans votre navigateur.',
        'seo_title' => 'Diviser un PDF en ligne : extraire des pages',
        'seo_description' => 'Divisez des PDF gratuitement en ligne. Extrayez des pages, séparez par plages ou enregistrez chaque page à part. Confidentiel : vos fichiers restent chez vous.',
        'content' => <<<'HTML'
<h2>Pourquoi diviser un PDF ?</h2>
<p>Un gros PDF contient souvent plus que ce que vous voulez partager. Le diviser permet d’envoyer seulement les pages utiles d’un contrat, d’isoler une facture d’un relevé mensuel, de séparer des documents numérisés ensemble ou de découper un fichier énorme en parties qui respectent les limites des e-mails et des formulaires d’envoi.</p>
<h2>Exemples de plages de pages</h2>
<ul>
<li><code>1-3</code> : pages 1, 2 et 3.</li>
<li><code>1, 4, 7</code> : trois pages isolées.</li>
<li><code>5-</code> : de la page 5 jusqu’à la dernière.</li>
<li><code>1-2, 10-12</code> : deux groupes de pages.</li>
</ul>
<p>Pour réunir des pages de fichiers différents, utilisez Fusionner des PDF. Pour transformer des pages en images, utilisez PDF en JPG.</p>
HTML,
        'steps' => [
            'Déposez un PDF dans la zone prévue ou cliquez pour le parcourir. Une fois chargé, son nombre de pages s’affiche.',
            'Choisissez un mode : <strong>Extraire des pages</strong> dans un nouveau PDF, <strong>Diviser par plages</strong> en plusieurs PDF, ou <strong>Chaque page</strong> dans un PDF distinct.',
            'Saisissez les pages ou les plages, par exemple <code>1-3, 5, 8-</code> (<code>8-</code> signifie de la page 8 jusqu’à la fin).',
            'Cliquez sur <strong>Diviser le PDF</strong>. Un fichier unique est téléchargé directement ; plusieurs fichiers sont téléchargés ensemble dans un ZIP.',
        ],
        'faq' => [
            ['q' => 'Comment extraire des pages précises d’un PDF ?', 'a' => 'Choisissez Extraire des pages et saisissez les numéros, par exemple <code>2, 4-6</code>. Vous obtenez un nouveau PDF contenant uniquement ces pages, dans cet ordre.'],
            ['q' => 'Puis-je diviser un PDF en plusieurs fichiers ?', 'a' => 'Oui. Utilisez Diviser par plages : chaque plage séparée par une virgule devient son propre PDF. Ou choisissez Chaque page pour enregistrer chaque page séparément.'],
            ['q' => 'Mon PDF est-il envoyé sur Internet ?', 'a' => 'Non. Le PDF est divisé dans votre navigateur et ne quitte jamais votre appareil : c’est sûr pour les contrats, les factures et autres documents privés.'],
            ['q' => 'Le fichier d’origine est-il modifié ?', 'a' => 'Non. Votre PDF d’origine reste exactement identique ; l’outil ne fait que créer de nouveaux fichiers.'],
            ['q' => 'Cela fonctionne-t-il avec des PDF protégés par mot de passe ?', 'a' => 'Non. Supprimez d’abord le mot de passe du PDF.'],
        ],
    ],

    'pdf-to-jpg' => [
        'slug' => 'pdf-en-jpg',
        'name' => 'PDF en JPG',
        'short_description' => 'Convertissez chaque page d’un PDF en image JPG haute qualité.',
        'description' => 'Convertissez chaque page d’un PDF en image JPG à la résolution de votre choix. Téléchargez les pages une à une ou toutes ensemble dans un ZIP. Votre PDF est traité dans votre navigateur.',
        'seo_title' => 'Convertir un PDF en JPG gratuitement, haute qualité',
        'seo_description' => 'Convertissez un PDF en JPG gratuitement. Chaque page devient une image haute résolution (jusqu’à 300 DPI). Téléchargement en ZIP. Votre PDF reste chez vous.',
        'content' => <<<'HTML'
<h2>Pourquoi convertir un PDF en JPG ?</h2>
<p>Les images se partagent plus facilement que les PDF dans les messageries et sur les réseaux sociaux, s’insèrent dans des présentations et des documents, et s’affichent instantanément sur n’importe quel appareil. Convertir une page de PDF en JPG est aussi le moyen le plus simple de transformer une diapositive, un flyer ou un certificat en image.</p>
<h2>Bien choisir la résolution</h2>
<ul>
<li><strong>72 DPI</strong> : petits aperçus et miniatures.</li>
<li><strong>150 DPI</strong> : affichage à l’écran, documents et présentations.</li>
<li><strong>300 DPI</strong> : impression et zoom sur les petits caractères.</li>
</ul>
<p>Vous n’avez besoin que de quelques pages ? Extrayez-les d’abord avec Diviser un PDF. Pour repasser des images au document, utilisez JPG en PDF.</p>
HTML,
        'steps' => [
            'Déposez un PDF dans la zone prévue ou cliquez pour le parcourir.',
            'Choisissez la résolution : <strong>72 DPI</strong> pour l’écran, <strong>150 DPI</strong> pour la plupart des usages ou <strong>300 DPI</strong> pour l’impression.',
            'Cliquez sur <strong>Convertir en JPG</strong>. Chaque page est générée en image et un aperçu s’affiche.',
            'Téléchargez des pages isolées ou cliquez sur <strong>Tout télécharger</strong> pour obtenir toutes les pages dans un ZIP.',
        ],
        'faq' => [
            ['q' => 'Quelle résolution (DPI) choisir ?', 'a' => '150 DPI convient bien au partage et aux documents. Utilisez 300 DPI pour l’impression ou pour agrandir de petits caractères, et 72 DPI pour les aperçus web. Plus le DPI est élevé, plus les fichiers sont lourds.'],
            ['q' => 'Mon PDF est-il envoyé sur un serveur ?', 'a' => 'Non. Les pages sont générées dans votre navigateur avec PDF.js, le moteur utilisé par Firefox. Votre fichier ne quitte jamais votre appareil.'],
            ['q' => 'Combien de pages puis-je convertir ?', 'a' => 'Jusqu’à 200 pages par PDF, pour des fichiers de 100 Mo maximum.'],
            ['q' => 'Puis-je convertir un PDF en PNG ?', 'a' => 'Cet outil crée des images JPG, idéales pour les documents et les photos. Si vous avez besoin de PNG, convertissez ensuite les JPG avec JPG en PNG.'],
            ['q' => 'Cela fonctionne-t-il avec des PDF protégés par mot de passe ?', 'a' => 'Non. Supprimez d’abord le mot de passe du PDF.'],
        ],
    ],

    'jpg-to-pdf' => [
        'slug' => 'jpg-en-pdf',
        'name' => 'JPG en PDF',
        'short_description' => 'Transformez des photos et numérisations JPG en un seul document PDF.',
        'description' => 'Réunissez des images JPG dans un seul PDF, choisissez le format de page, l’orientation et les marges, et réorganisez les pages avant de télécharger. Tout se passe dans votre navigateur.',
        'seo_title' => 'Convertir JPG en PDF : réunir des images en un PDF',
        'seo_description' => 'Convertissez des JPG en PDF gratuitement. Réunissez plusieurs photos dans un PDF au format A4, Lettre ou ajusté à l’image. Rapide et sans inscription.',
        'content' => <<<'HTML'
<h2>Transformez photos et numérisations en un seul PDF</h2>
<p>Le PDF est le format standard des documents que vous envoyez aux écoles, aux employeurs, aux banques et à l’administration. Rassembler dans un seul PDF les photos JPG de justificatifs, de pièces d’identité, de devoirs ou de pages signées garde tout en ordre et rend le fichier facile à envoyer et à imprimer.</p>
<h2>Conseils pour un bon résultat</h2>
<ul>
<li>Photographiez les documents bien éclairés, à plat et vus de dessus.</li>
<li>Utilisez Recadrer une image pour retirer le fond et les bords de la table avant la conversion.</li>
<li>Choisissez A4 ou Lettre pour les documents à imprimer, et Ajuster à l’image pour les albums photo.</li>
<li>Associez le résultat à d’autres documents avec Fusionner des PDF.</li>
</ul>
<p>Vous avez aussi des captures d’écran PNG ou des images WebP ? Utilisez Image en PDF, qui accepte tous les formats d’image courants.</p>
HTML,
        'steps' => [
            'Déposez vos photos JPG ou pages numérisées dans la zone prévue, ou cliquez pour les parcourir. Ajoutez-en autant que nécessaire.',
            'Faites glisser les images (ou utilisez les flèches) pour définir l’ordre des pages.',
            'Choisissez le format de page — <strong>A4</strong>, <strong>Lettre US</strong> ou <strong>Ajuster à l’image</strong> —, ainsi que l’orientation et les marges.',
            'Cliquez sur <strong>Convertir en PDF</strong> pour télécharger un PDF avec chaque image sur sa propre page.',
        ],
        'faq' => [
            ['q' => 'Comment réunir plusieurs JPG dans un seul PDF ?', 'a' => 'Ajoutez tous vos fichiers JPG, mettez-les dans l’ordre et cliquez sur Convertir en PDF. Chaque image devient une page du même PDF.'],
            ['q' => 'Mes photos seront-elles dans le bon sens ?', 'a' => 'Oui. L’orientation enregistrée par les téléphones et les appareils photo (EXIF) est appliquée, donc les photos en portrait restent droites. L’orientation automatique passe aussi la page en paysage pour les images larges.'],
            ['q' => 'Quel format de page choisir ?', 'a' => 'Utilisez A4 en Europe et dans la plupart des pays, et Lettre pour les États-Unis et le Canada. Ajuster à l’image crée des pages à la taille exacte de chaque photo, sans bords blancs.'],
            ['q' => 'Mes images sont-elles envoyées sur Internet ?', 'a' => 'Non. Le PDF est créé dans votre navigateur. Vos photos et documents ne quittent jamais votre appareil.'],
            ['q' => 'Puis-je ajouter des images PNG ou WebP ?', 'a' => 'Cette page est dédiée aux fichiers JPG. Utilisez Image en PDF pour réunir des images JPG, PNG et WebP dans un seul PDF.'],
        ],
    ],

    'rotate-pdf' => [
        'slug' => 'pivoter-pdf',
        'name' => 'Pivoter un PDF',
        'short_description' => 'Faites pivoter toutes les pages ou seulement celles qui sont de travers.',
        'description' => 'Corrigez les pages couchées ou à l’envers : prévisualisez chaque page, faites pivoter des pages isolées ou le document entier et téléchargez le PDF corrigé. Votre fichier ne quitte jamais votre navigateur.',
        'seo_title' => 'Pivoter un PDF en ligne : une page ou toutes',
        'seo_description' => 'Faites pivoter les pages d’un PDF gratuitement. Prévisualisez chaque page, tournez-en une ou toutes de 90° ou 180° et enregistrez. Confidentiel : aucun envoi.',
        'content' => <<<'HTML'
<h2>Corrigez les numérisations de travers en quelques secondes</h2>
<p>Les scanners et les applications de numérisation sur mobile enregistrent souvent certaines pages couchées ou à l’envers, surtout quand le document mélange pages en portrait et en paysage. Les faire pivoter permet de lire le PDF correctement à l’écran et de l’imprimer dans le bon sens.</p>
<h2>Ne faites pivoter que ce qui est nécessaire</h2>
<p>Les aperçus permettent de faire pivoter des pages individuelles plutôt que tout le fichier. Chaque clic tourne une page de 90° dans le sens des aiguilles d’une montre ; les boutons fléchés tournent à gauche ou à droite, et la rotation est enregistrée définitivement dans le fichier téléchargé, sans perte de qualité.</p>
<p>Vous devez aussi retirer des pages ? Utilisez Supprimer des pages PDF. Pour assembler plusieurs documents, utilisez Fusionner des PDF, et pour transformer des pages en images, PDF en JPG.</p>
HTML,
        'steps' => [
            'Déposez un PDF dans la zone prévue ou cliquez pour le parcourir. Un aperçu de chaque page apparaît.',
            'Cliquez sur une page (ou sur ses boutons fléchés) pour la faire pivoter de 90°. Utilisez <strong>Tout pivoter</strong> pour tourner toutes les pages d’un coup.',
            'Ne faites pivoter que les pages qui en ont besoin, par exemple celles numérisées de travers ou à l’envers.',
            'Cliquez sur <strong>Télécharger le PDF pivoté</strong> pour enregistrer le fichier corrigé.',
        ],
        'faq' => [
            ['q' => 'Puis-je faire pivoter une seule page d’un PDF ?', 'a' => 'Oui. Chaque page a ses propres boutons de rotation : vous pouvez tourner uniquement celles qui sont de travers et laisser les autres telles quelles.'],
            ['q' => 'La rotation est-elle définitive ?', 'a' => 'Oui. La nouvelle orientation est enregistrée dans le PDF téléchargé, qui s’ouvre donc correctement dans n’importe quel lecteur PDF, navigateur ou imprimante.'],
            ['q' => 'Faire pivoter un PDF réduit-il la qualité ?', 'a' => 'Non. La rotation ne change que l’orientation de la page. Le texte, les images et la qualité restent exactement identiques.'],
            ['q' => 'Mon PDF est-il envoyé sur Internet ?', 'a' => 'Non. Le PDF est traité dans votre navigateur et ne quitte jamais votre appareil.'],
            ['q' => 'Cela fonctionne-t-il avec des PDF protégés par mot de passe ?', 'a' => 'Non. Supprimez d’abord le mot de passe du PDF.'],
        ],
    ],

    'delete-pdf-pages' => [
        'slug' => 'supprimer-pages-pdf',
        'name' => 'Supprimer des pages PDF',
        'short_description' => 'Retirez visuellement les pages inutiles d’un PDF.',
        'description' => 'Prévisualisez chaque page d’un PDF, cliquez sur celles à retirer et téléchargez une copie propre. Idéal pour les pages blanches des numérisations et les pages confidentielles à ne pas partager.',
        'seo_title' => 'Supprimer des pages d’un PDF gratuitement',
        'seo_description' => 'Supprimez des pages d’un PDF gratuitement. Prévisualisez les pages, cliquez pour les retirer et téléchargez le nouveau PDF. Traité dans votre navigateur.',
        'content' => <<<'HTML'
<h2>Pourquoi supprimer des pages d’un PDF ?</h2>
<p>Les documents numérisés contiennent souvent des pages blanches, des pages en double ou des pages de garde. Parfois, vous devez aussi partager un document sans les pages qui contiennent des données personnelles ou confidentielles. Les retirer rend le fichier plus léger, plus clair et plus sûr à envoyer.</p>
<h2>Supprimer, conserver ou extraire</h2>
<p>Cet outil est idéal quand vous voulez écarter quelques pages et garder le reste. Si vous n’avez besoin que de quelques pages d’un long document, Diviser un PDF permet de les extraire en saisissant leurs numéros. Les pages de travers se corrigent avec Pivoter un PDF, et plusieurs fichiers nettoyés peuvent être assemblés avec Fusionner des PDF.</p>
HTML,
        'steps' => [
            'Déposez un PDF dans la zone prévue ou cliquez pour le parcourir. Un aperçu de chaque page apparaît.',
            'Cliquez sur les pages à retirer. Elles sont marquées en rouge ; cliquez à nouveau pour conserver une page.',
            'Vérifiez le compteur pour savoir combien de pages seront supprimées.',
            'Cliquez sur <strong>Télécharger le PDF modifié</strong> pour enregistrer une copie sans ces pages.',
        ],
        'faq' => [
            ['q' => 'Comment supprimer des pages d’un PDF ?', 'a' => 'Ouvrez le PDF ici, cliquez sur chaque page à retirer et téléchargez le fichier modifié. Les pages restantes gardent leur ordre d’origine.'],
            ['q' => 'Le fichier d’origine est-il modifié ?', 'a' => 'Non. Votre PDF d’origine reste inchangé ; l’outil télécharge une nouvelle copie sans les pages supprimées.'],
            ['q' => 'Puis-je retirer les pages blanches d’une numérisation ?', 'a' => 'Oui. Avec les aperçus, les pages blanches ou en double se repèrent facilement : il suffit de cliquer dessus pour les retirer.'],
            ['q' => 'Mon PDF est-il envoyé sur Internet ?', 'a' => 'Non. Tout se passe dans votre navigateur : les documents privés ne quittent jamais votre appareil.'],
            ['q' => 'Puis-je extraire des pages au lieu de les supprimer ?', 'a' => 'Oui. Pour ne garder que quelques pages, Diviser un PDF permet de saisir les numéros des pages à extraire.'],
        ],
    ],

    'image-to-pdf' => [
        'slug' => 'image-en-pdf',
        'name' => 'Image en PDF',
        'short_description' => 'Convertissez des images JPG, PNG et WebP en un seul fichier PDF.',
        'description' => 'Transformez photos, captures d’écran et numérisations de tout format courant en un seul PDF. Réorganisez les images, choisissez le format de page et les marges, puis téléchargez aussitôt.',
        'seo_title' => 'Convertir une image en PDF : JPG, PNG et WebP',
        'seo_description' => 'Convertissez des images en PDF gratuitement. Réunissez JPG, PNG et WebP dans un PDF, réorganisez les pages et choisissez A4, Lettre ou ajusté. Sans envoi.',
        'content' => <<<'HTML'
<h2>Réunissez toutes vos images dans un PDF</h2>
<p>Transformez captures d’écran, pages numérisées, photos de reçus et graphiques exportés en un seul PDF que tout le monde peut ouvrir, imprimer ou joindre à un e-mail. Vous pouvez mélanger des images JPG, PNG et WebP dans le même document et les ordonner comme vous le souhaitez.</p>
<h2>Bien choisir le format de page</h2>
<ul>
<li><strong>A4</strong> : format standard des documents en France et dans la plupart des pays.</li>
<li><strong>Lettre</strong> : standard aux États-Unis et au Canada.</li>
<li><strong>Ajuster à l’image</strong> : chaque page a exactement la taille de son image, sans bords blancs.</li>
</ul>
<p>Vous n’avez que des photos JPG ? JPG en PDF fonctionne de la même façon. Pour ajouter le résultat à d’autres PDF, utilisez Fusionner des PDF.</p>
HTML,
        'steps' => [
            'Déposez vos images dans la zone prévue ou cliquez pour les parcourir. Vous pouvez mélanger JPG, PNG et WebP dans le même PDF.',
            'Réorganisez les images par glisser-déposer ou avec les boutons fléchés.',
            'Choisissez le format de page, l’orientation et la marge.',
            'Cliquez sur <strong>Convertir en PDF</strong> : votre PDF est téléchargé immédiatement.',
        ],
        'faq' => [
            ['q' => 'Quels formats d’image puis-je convertir en PDF ?', 'a' => 'JPG, JPEG, PNG et WebP. Vous pouvez combiner différents formats dans le même PDF.'],
            ['q' => 'Que deviennent les fonds transparents des PNG ?', 'a' => 'Les zones transparentes sont posées sur une page blanche, comme elles apparaissent à l’impression.'],
            ['q' => 'Puis-je transformer des captures d’écran en PDF ?', 'a' => 'Oui. Les captures d’écran sont généralement des fichiers PNG : ajoutez-les toutes, ordonnez-les et convertissez. Utilisez Ajuster à l’image pour éviter les bords blancs.'],
            ['q' => 'Mes images restent-elles privées ?', 'a' => 'Oui. Tout se passe dans votre navigateur, vos images ne sont donc jamais envoyées.'],
        ],
    ],
];
