<?php

/*
| Spanish copy for the image tools. See content/es/tools.php.
*/

return [
    'image-compressor' => [
        'slug' => 'comprimir-imagenes',
        'name' => 'Comprimir imágenes',
        'short_description' => 'Reduce el peso de imágenes JPG, PNG y WebP sin pérdida visible de calidad.',
        'description' => 'Comprime una o varias imágenes a la vez y mira cuánto se ahorra en cada archivo. Las imágenes se procesan en tu dispositivo y nunca se suben a un servidor.',
        'seo_title' => 'Comprimir imágenes JPG, PNG y WebP en línea',
        'seo_description' => 'Comprime imágenes JPG, PNG y WebP gratis en línea. Calidad ajustable, procesamiento por lotes y descarga inmediata. Tus archivos no salen de tu equipo.',
        'content' => <<<'HTML'
<h2>¿Por qué comprimir imágenes?</h2>
<p>Las imágenes pesadas son la causa más común de que un sitio web cargue lento. Comprimirlas reduce el tamaño del archivo —a menudo entre un 60 y un 80 %— sin diferencias visibles, lo que mejora la velocidad de carga, las Core Web Vitals y el SEO. Los archivos más livianos también son más fáciles de enviar por correo, de subir a formularios con límite de tamaño y de guardar.</p>
<h2>Compresión con pérdida y sin pérdida</h2>
<p>JPG y WebP usan compresión con pérdida: descartan detalles que el ojo casi no nota, por eso el control de calidad tiene tanto efecto. PNG es sin pérdida, así que para fotos guardadas como PNG lo que más ahorra es convertirlas a WebP o JPG, o reducir sus dimensiones con Redimensionar imágenes.</p>
<h2>Los mejores formatos para la web</h2>
<ul>
<li><strong>WebP</strong>: la mejor opción general para sitios web; mira JPG a WebP y PNG a WebP.</li>
<li><strong>JPG</strong>: compatibilidad universal para fotos.</li>
<li><strong>PNG</strong>: capturas, logos y gráficos que necesitan bordes nítidos o transparencia.</li>
</ul>
HTML,
        'steps' => [
            'Arrastra tus imágenes JPG, PNG o WebP al recuadro, haz clic para buscarlas o pega una imagen con Ctrl + V.',
            'Ajusta el control de <strong>Calidad</strong>. Entre 70 y 80 % suele reducir muchísimo el peso sin diferencias visibles.',
            'Si quieres, convierte a otro formato o limita el ancho máximo: reducir las fotos grandes es lo que más espacio ahorra.',
            'Descarga cada imagen o haz clic en <strong>Descargar todo</strong> para obtener todas las imágenes comprimidas en un solo ZIP.',
        ],
        'faq' => [
            ['q' => '¿Mis imágenes se suben a un servidor?', 'a' => 'No. La compresión ocurre por completo en tu navegador, usando tu dispositivo. Tus imágenes nunca se suben, se guardan ni las ve nadie más.'],
            ['q' => '¿Qué calidad debo usar?', 'a' => 'Para fotos en sitios web, 70–80 % es un gran equilibrio entre peso y calidad. Usa 85–95 % para imágenes donde importan los detalles y 50–65 % cuando lo prioritario es el archivo más liviano.'],
            ['q' => '¿Por qué mi PNG casi no se redujo?', 'a' => 'PNG es un formato sin pérdida, así que el control de calidad casi no lo afecta. Para archivos mucho más livianos, convierte las fotos PNG a <strong>WebP</strong> o <strong>JPG</strong> con la opción de formato de salida, o reduce el ancho máximo. Si volver a codificar hace el archivo más pesado, se conserva el original.'],
            ['q' => '¿La compresión elimina los metadatos EXIF?', 'a' => 'Sí. Las imágenes recodificadas no conservan metadatos EXIF como los datos de la cámara o la ubicación GPS, lo que también mejora tu privacidad. La orientación se aplica antes de quitar los metadatos.'],
            ['q' => '¿Cuántas imágenes puedo comprimir a la vez?', 'a' => 'Hasta 30 imágenes por lote, de hasta 25 MB cada una.'],
        ],
    ],

    'image-resizer' => [
        'slug' => 'redimensionar-imagenes',
        'name' => 'Redimensionar imágenes',
        'short_description' => 'Cambia el tamaño de imágenes por píxeles o porcentaje, una o varias a la vez.',
        'description' => 'Cambia el ancho y el alto de imágenes JPG, PNG y WebP en píxeles exactos o por porcentaje, manteniendo la proporción. Redimensiona por lotes y descarga todo en un ZIP.',
        'seo_title' => 'Redimensionar imágenes JPG, PNG y WebP gratis',
        'seo_description' => 'Cambia el tamaño de imágenes gratis en línea. Define ancho y alto en píxeles o escala por porcentaje, mantén la proporción y procesa por lotes. Sin subir nada.',
        'content' => <<<'HTML'
<h2>¿Por qué redimensionar imágenes?</h2>
<p>Las cámaras de los celulares producen fotos de 4000 píxeles de ancho o más, mucho más grandes de lo que necesita cualquier pantalla. Redimensionarlas al tamaño en que realmente se van a mostrar hace que carguen más rápido, ocupen menos espacio y cumplan los requisitos de sitios web, tiendas en línea y redes sociales.</p>
<h2>Tamaños de imagen recomendados</h2>
<ul>
<li><strong>Imágenes principales de un sitio web:</strong> 1920 px de ancho.</li>
<li><strong>Imágenes de blog y de productos:</strong> 800–1200 px de ancho.</li>
<li><strong>Publicaciones de Instagram:</strong> 1080 × 1080 px (cuadrada) o 1080 × 1350 px (vertical).</li>
<li><strong>Miniaturas de YouTube:</strong> 1280 × 720 px.</li>
<li><strong>Adjuntos de correo:</strong> 1200–1600 px en el lado más largo.</li>
</ul>
<p>¿Necesitas una forma exacta en lugar de un tamaño menor? Usa Recortar imagen para cortar la foto con una proporción específica y después aligérala con Comprimir imágenes.</p>
HTML,
        'steps' => [
            'Suelta tus imágenes JPG, PNG o WebP en el recuadro, búscalas o pégalas con Ctrl + V. Puedes redimensionar muchas a la vez.',
            'Elige <strong>Por porcentaje</strong> para escalar todo (por ejemplo, 50 %) o <strong>Por tamaño</strong> para definir un ancho y/o alto exactos en píxeles.',
            'Deja activado <strong>Mantener proporción</strong> para no deformarlas. Si defines ancho y alto, cada imagen se ajusta dentro de ese recuadro.',
            'Descarga cada imagen o haz clic en <strong>Descargar todo</strong> para obtener un ZIP.',
        ],
        'faq' => [
            ['q' => '¿Redimensionar reduce la calidad?', 'a' => 'Achicar una imagen la mantiene nítida. Agrandarla más allá de su tamaño original no puede agregar detalles, así que puede verse algo borrosa. En JPG y WebP también puedes elegir la calidad de salida.'],
            ['q' => '¿Cómo cambio el tamaño sin deformar la imagen?', 'a' => 'Deja activado <strong>Mantener proporción</strong> e ingresa solo el ancho o solo el alto. El otro lado se calcula automáticamente para conservar las proporciones originales.'],
            ['q' => '¿Qué tamaño deben tener las imágenes para la web?', 'a' => 'En la mayoría de los sitios basta con 1200–1920 px de ancho para imágenes a pantalla completa y 600–800 px para imágenes dentro del contenido. Las imágenes más pequeñas cargan más rápido y mejoran las Core Web Vitals.'],
            ['q' => '¿Mis imágenes se suben a internet?', 'a' => 'No. Las imágenes se redimensionan en tu navegador y nunca salen de tu dispositivo.'],
            ['q' => '¿Cuántas imágenes puedo redimensionar a la vez?', 'a' => 'Hasta 30 imágenes por lote, de hasta 25 MB cada una.'],
        ],
    ],

    'heic-to-jpg' => [
        'slug' => 'heic-a-jpg',
        'name' => 'HEIC a JPG',
        'short_description' => 'Convierte fotos HEIC del iPhone a JPG o PNG en tu navegador.',
        'description' => 'Convierte fotos HEIC y HEIF de tu iPhone o iPad a JPG o PNG. Convierte por lotes y descarga todo en un ZIP: tus fotos nunca se suben.',
        'seo_title' => 'Convertir HEIC a JPG: fotos de iPhone gratis',
        'seo_description' => 'Convierte HEIC a JPG gratis en línea. Pasa fotos de iPhone a JPG o PNG por lotes en tu navegador: privado, sin subir archivos y sin registro.',
        'content' => <<<'HTML'
<h2>¿Por qué convertir HEIC a JPG?</h2>
<p>Los iPhone guardan las fotos en HEIC de forma predeterminada porque ocupan cerca de la mitad que un JPG. El problema es la compatibilidad: muchas aplicaciones de Windows, sitios web, formularios en línea, celulares Android antiguos y servicios de impresión todavía no abren archivos HEIC. Convertirlas a JPG hace que tus fotos se abran en cualquier lugar.</p>
<h2>Cómo abrir archivos HEIC en Windows</h2>
<p>Windows necesita un códec adicional para abrir HEIC. En lugar de instalar algo, suelta las fotos aquí y conviértelas a JPG en segundos. La conversión ocurre en tu navegador, así que tus fotos personales nunca se suben.</p>
<h2>¿JPG o PNG?</h2>
<p>Elige <strong>JPG</strong> para fotos: los archivos son livianos y funcionan en todas partes. Elige <strong>PNG</strong> solo si necesitas calidad sin pérdida para editar. Después de convertir, puedes reducir aún más los archivos con Comprimir imágenes o con Redimensionar imágenes.</p>
HTML,
        'steps' => [
            'Suelta tus fotos HEIC o HEIF (de un iPhone o iPad) en el recuadro, o haz clic para buscarlas. Puedes convertir muchas a la vez.',
            'Elige el formato de salida: <strong>JPG</strong> para archivos livianos que se abren en todas partes, o <strong>PNG</strong> para calidad sin pérdida.',
            'Ajusta la calidad si hace falta. Entre 85 y 92 % las fotos se ven idénticas al original.',
            'Descarga cada foto o haz clic en <strong>Descargar todo</strong> para obtener un ZIP con todas las imágenes convertidas.',
        ],
        'faq' => [
            ['q' => '¿Qué es un archivo HEIC?', 'a' => 'HEIC (High Efficiency Image Container) es el formato de foto que usan por defecto los iPhone y iPad desde iOS 11. Ahorra espacio, pero muchas aplicaciones de Windows, sitios web y dispositivos antiguos no pueden abrirlo.'],
            ['q' => '¿Mis fotos se suben a internet?', 'a' => 'No. Tus fotos se convierten en tu navegador y nunca salen de tu dispositivo, algo importante para imágenes personales.'],
            ['q' => '¿Se mantiene la orientación de la foto?', 'a' => 'Sí. Se aplica la información de rotación guardada en el archivo HEIC, así que las fotos verticales quedan derechas.'],
            ['q' => '¿Por qué la primera conversión tarda unos segundos?', 'a' => 'La mayoría de los navegadores no pueden leer HEIC por sí solos, así que el convertidor descarga un decodificador HEIC la primera vez que lo usas. Después, las conversiones son rápidas. Safari puede decodificar HEIC de forma nativa.'],
            ['q' => '¿Se elimina la ubicación (GPS)?', 'a' => 'Sí. Las imágenes convertidas no incluyen metadatos EXIF como la ubicación GPS o los datos de la cámara.'],
            ['q' => '¿Cómo hago para que mi iPhone no guarde en HEIC?', 'a' => 'Ve a Ajustes › Cámara › Formatos y elige <strong>Más compatible</strong>. Las fotos nuevas se guardarán en JPG.'],
        ],
    ],

    'crop-image' => [
        'slug' => 'recortar-imagen',
        'name' => 'Recortar imagen',
        'short_description' => 'Recorta fotos de forma visual o a tamaños y proporciones exactas.',
        'description' => 'Arrastra para seleccionar la zona que quieres conservar, elige una proporción como 1:1 o 16:9, o escribe valores exactos en píxeles. Descarga la imagen recortada en JPG, PNG o WebP.',
        'seo_title' => 'Recortar imagen en línea gratis',
        'seo_description' => 'Recorta imágenes gratis en línea. Arrastra para seleccionar, usa proporciones como 1:1, 4:3 y 16:9 o píxeles exactos, y descarga en JPG, PNG o WebP. Sin subir.',
        'content' => <<<'HTML'
<h2>Recortes para redes sociales</h2>
<ul>
<li><strong>1:1</strong>: fotos de perfil y publicaciones cuadradas.</li>
<li><strong>4:5</strong>: publicaciones verticales de Instagram, que ocupan más espacio en el feed.</li>
<li><strong>9:16</strong>: historias, Reels, TikTok y YouTube Shorts.</li>
<li><strong>16:9</strong>: miniaturas de YouTube, presentaciones y banners web.</li>
</ul>
<h2>Consejo de composición: la regla de los tercios</h2>
<p>La cuadrícula dentro de la selección la divide en tercios. Ubicar el sujeto sobre una de las líneas o intersecciones suele crear una foto más equilibrada y natural que centrarlo.</p>
<p>Después de recortar, usa Redimensionar imágenes para llegar a un tamaño exacto en píxeles, o Comprimir imágenes para aligerar el archivo.</p>
HTML,
        'steps' => [
            'Suelta una imagen en el recuadro, haz clic para buscarla o pégala con Ctrl + V.',
            'Arrastra la selección para moverla y arrastra las esquinas para cambiar su tamaño. Usa las flechas del teclado para ajustes al píxel (mantén Shift para mover 10 px).',
            'Elige una proporción como <strong>1:1</strong> para fotos de perfil, <strong>16:9</strong> para miniaturas o <strong>9:16</strong> para historias, o escribe valores exactos en píxeles.',
            'Elige el formato de salida y haz clic en <strong>Recortar y descargar</strong>.',
        ],
        'faq' => [
            ['q' => '¿Qué proporción debo usar?', 'a' => 'Usa 1:1 para fotos de perfil y publicaciones de Instagram, 4:5 para publicaciones verticales de Instagram, 16:9 para miniaturas de YouTube y presentaciones, 9:16 para historias y Reels, y 3:2 o 4:3 para fotos impresas clásicas.'],
            ['q' => '¿Recortar reduce la calidad?', 'a' => 'El recorte conserva los píxeles originales de la zona seleccionada en resolución completa. En JPG y WebP puedes elegir la calidad; la salida PNG es sin pérdida.'],
            ['q' => '¿Mi foto se sube a internet?', 'a' => 'No. La imagen se recorta en tu navegador y nunca sale de tu dispositivo.'],
            ['q' => '¿Qué formatos se admiten?', 'a' => 'Puedes recortar imágenes JPG, PNG y WebP de hasta 25 MB y guardar el resultado en JPG, PNG o WebP.'],
        ],
    ],

    'jpg-to-webp' => [
        'slug' => 'jpg-a-webp',
        'name' => 'JPG a WebP',
        'short_description' => 'Convierte imágenes JPG al formato WebP, más liviano y rápido.',
        'description' => 'Convierte imágenes JPG y JPEG a WebP con calidad ajustable. Convierte varios archivos a la vez y descárgalos por separado o todos juntos. Todo funciona en tu navegador.',
        'seo_title' => 'Convertir JPG a WebP en línea, gratis y privado',
        'seo_description' => 'Convierte JPG a WebP gratis en línea. Conversión por lotes, calidad ajustable y descarga en ZIP. Las imágenes se convierten en tu navegador, sin subirlas.',
        'content' => <<<'HTML'
<h2>¿Por qué convertir JPG a WebP?</h2>
<p>Las imágenes WebP suelen pesar entre un 25 y un 35 % menos que un JPG con la misma calidad visual. Las imágenes más livianas hacen que las páginas carguen más rápido, mejoran el Largest Contentful Paint (LCP) y ayudan al posicionamiento en Google, que usa la experiencia de página como señal de ranking. Todos los navegadores modernos admiten WebP.</p>
<h2>Cómo usar WebP en tu sitio web</h2>
<p>La mayoría de los gestores de contenido, incluido WordPress, aceptan imágenes WebP. Para obtener los mejores resultados, redimensiona las imágenes al tamaño en que se mostrarán con Redimensionar imágenes antes de convertirlas, y mantén la calidad entre 75 y 85 %.</p>
<p>¿Vas a convertir gráficos con transparencia? Usa PNG a WebP. ¿Necesitas volver a un formato universal? Usa WebP a JPG.</p>
HTML,
        'steps' => [
            'Arrastra tus imágenes JPG al recuadro, haz clic para buscarlas o pega una imagen con Ctrl + V. Puedes agregar varias a la vez.',
            'Elige la <strong>Calidad</strong>. Entre 75 y 85 % se obtienen archivos WebP idénticos a la vista y mucho más livianos.',
            'Cada imagen se convierte al instante en tu navegador. Revisa el nuevo peso y el porcentaje ahorrado.',
            'Descarga las imágenes una por una o haz clic en <strong>Descargar todo</strong> para obtener un ZIP con todos los archivos WebP.',
        ],
        'faq' => [
            ['q' => '¿Qué es WebP?', 'a' => 'WebP es un formato de imagen moderno creado por Google. Con la misma calidad visual, los archivos WebP suelen pesar entre un 25 y un 35 % menos que un JPG, lo que hace que los sitios carguen más rápido y mejora las Core Web Vitals.'],
            ['q' => '¿Mis imágenes se suben a internet?', 'a' => 'No. La conversión ocurre por completo en tu navegador. Tus imágenes nunca salen de tu dispositivo.'],
            ['q' => '¿Todos los navegadores admiten WebP?', 'a' => 'Sí. Todos los navegadores modernos (Chrome, Edge, Firefox y Safari 14 o posterior) muestran imágenes WebP. Para crear archivos WebP se necesita un navegador reciente; si el tuyo no puede, la herramienta te avisará.'],
            ['q' => '¿También puedo convertir PNG a WebP?', 'a' => 'Sí. También se aceptan archivos PNG y la transparencia se conserva en el WebP.'],
            ['q' => '¿Hay algún límite?', 'a' => 'Puedes convertir hasta 30 imágenes por lote, de hasta 25 MB cada una.'],
        ],
    ],

    'png-to-webp' => [
        'slug' => 'png-a-webp',
        'name' => 'PNG a WebP',
        'short_description' => 'Convierte imágenes PNG a WebP conservando la transparencia.',
        'description' => 'Convierte archivos PNG a WebP para que pesen mucho menos sin perder la transparencia. Convierte por lotes y descarga por separado o en un ZIP, directamente en tu navegador.',
        'seo_title' => 'Convertir PNG a WebP con transparencia, gratis',
        'seo_description' => 'Convierte PNG a WebP gratis en línea. Conserva la transparencia, convierte por lotes, ajusta la calidad y descarga en ZIP. Las imágenes no salen de tu equipo.',
        'content' => <<<'HTML'
<h2>PNG frente a WebP</h2>
<p>PNG es ideal para gráficos con transparencia, pero sus archivos son pesados. WebP también admite transparencia y suele ser mucho más liviano, así que convertir a WebP logos, íconos, capturas e imágenes de productos con fondo transparente acelera los sitios web sin perder las zonas transparentes.</p>
<h2>Cuándo conservar el PNG</h2>
<p>Guarda el PNG original como archivo maestro para futuras ediciones y para los lugares que no aceptan WebP. Para fotos JPG, usa JPG a WebP; para reducir imágenes sin cambiar de formato, usa Comprimir imágenes.</p>
<p>La conversión se hace en tu propio dispositivo, por lo que tus archivos nunca se suben y puedes convertir varios a la vez, revisar cuánto pesa cada resultado y descargarlos juntos.</p>
HTML,
        'steps' => [
            'Suelta tus imágenes PNG en el recuadro, haz clic para buscarlas o pega una captura con Ctrl + V.',
            'Ajusta la <strong>Calidad</strong>. Entre 80 y 90 % los gráficos y las capturas se mantienen nítidos y el peso baja mucho.',
            'Cada PNG se convierte a WebP al instante en tu navegador, conservando los fondos transparentes.',
            'Descarga las imágenes una por una o usa <strong>Descargar todo</strong> para obtener un ZIP.',
        ],
        'faq' => [
            ['q' => '¿WebP conserva la transparencia del PNG?', 'a' => 'Sí. WebP admite canal alfa, así que las zonas transparentes y semitransparentes de tu PNG se conservan.'],
            ['q' => '¿Cuánto menos pesa WebP que PNG?', 'a' => 'En fotos e imágenes complejas, WebP suele pesar entre un 50 y un 80 % menos que PNG. En gráficos simples con pocos colores el ahorro es menor, pero WebP normalmente sigue siendo más liviano.'],
            ['q' => '¿Puedo usar WebP en mi sitio web?', 'a' => 'Sí. Todos los navegadores modernos admiten WebP, y las imágenes más livianas mejoran la velocidad de carga y las Core Web Vitals.'],
            ['q' => '¿Mis archivos se suben a internet?', 'a' => 'No. La conversión ocurre en tu dispositivo. Tus imágenes nunca se suben.'],
        ],
    ],

    'webp-to-jpg' => [
        'slug' => 'webp-a-jpg',
        'name' => 'WebP a JPG',
        'short_description' => 'Convierte imágenes WebP a JPG, compatible con todo.',
        'description' => 'Convierte imágenes WebP a JPG para que se abran en todas partes: aplicaciones antiguas, correo y servicios de impresión. Convierte por lotes y descarga todo en un ZIP.',
        'seo_title' => 'Convertir WebP a JPG en línea, gratis y rápido',
        'seo_description' => 'Convierte WebP a JPG gratis en línea. Conversión por lotes, calidad ajustable y descarga en ZIP. La conversión ocurre en tu navegador, sin subir archivos.',
        'content' => <<<'HTML'
<h2>¿Por qué me aparecen imágenes WebP?</h2>
<p>Muchos sitios web sirven sus imágenes en WebP para cargar más rápido, así que las imágenes que guardas de internet suelen terminar como archivos <code>.webp</code>. Algunas aplicaciones, impresoras, programas de correo y formularios todavía no los aceptan; convertirlos a JPG lo soluciona.</p>
<h2>Consejos</h2>
<ul>
<li>JPG no tiene transparencia: las zonas transparentes quedan en blanco.</li>
<li>Usa una calidad de 85–92 % para fotos que quizá imprimas.</li>
<li>¿Necesitas que la imagen pese menos después? Usa Comprimir imágenes o Redimensionar imágenes.</li>
</ul>
<h2>¿Es seguro convertir mis fotos?</h2>
<p>Sí. La conversión ocurre en tu propio dispositivo, así que tus imágenes nunca se suben. Tus archivos WebP originales no cambian: la herramienta crea copias JPG nuevas que puedes descargar una por una o juntas en un ZIP.</p>
HTML,
        'steps' => [
            'Suelta tus imágenes WebP en el recuadro o haz clic para buscarlas. Se admite la conversión por lotes.',
            'Define la <strong>Calidad</strong> del JPG. Entre 85 y 92 % se obtienen excelentes resultados en fotos.',
            'Cada imagen se convierte a JPG en tu navegador. Las zonas transparentes quedan en blanco, porque JPG no tiene transparencia.',
            'Descarga los archivos JPG por separado o todos juntos en un ZIP.',
        ],
        'faq' => [
            ['q' => '¿Por qué convertir WebP a JPG?', 'a' => 'JPG funciona en todas partes: editores de fotos antiguos, programas de correo, documentos de oficina, servicios de impresión y plataformas que no aceptan WebP.'],
            ['q' => '¿Qué pasa con los fondos transparentes?', 'a' => 'JPG no admite transparencia, así que las zonas transparentes se rellenan de blanco. Para conservar la transparencia, convierte a PNG con WebP a PNG.'],
            ['q' => '¿Bajará la calidad de la imagen?', 'a' => 'Con una calidad del 85 % o más, la diferencia no se nota en fotos. El JPG puede pesar más que el WebP porque la compresión JPG es menos eficiente.'],
            ['q' => '¿Mis imágenes se suben a internet?', 'a' => 'No. La conversión ocurre en tu navegador y tus imágenes nunca salen de tu dispositivo.'],
        ],
    ],

    'png-to-jpg' => [
        'slug' => 'png-a-jpg',
        'name' => 'PNG a JPG',
        'short_description' => 'Convierte imágenes y capturas PNG en archivos JPG más livianos.',
        'description' => 'Convierte imágenes PNG a JPG para que pesen menos y sean compatibles con cualquier aplicación. Convierte por lotes, elige la calidad y descarga todo en un ZIP, directamente en tu navegador.',
        'seo_title' => 'Convertir PNG a JPG gratis, rápido y privado',
        'seo_description' => 'Convierte PNG a JPG gratis en línea. Conversión por lotes, calidad ajustable y descarga en ZIP. Las imágenes se convierten en tu navegador y nunca se suben.',
        'content' => <<<'HTML'
<h2>Cuándo convertir PNG a JPG</h2>
<p>Las capturas de pantalla y las imágenes exportadas suelen guardarse en PNG, que puede pesar varios megabytes para una sola imagen tipo foto. Convertirlas a JPG reduce mucho el peso: ideal para adjuntos de correo, formularios con límite de tamaño, publicaciones de venta en línea y para compartir en redes sociales.</p>
<h2>Conserva el PNG cuando importa</h2>
<p>PNG es mejor para logos, íconos, diagramas y todo lo que necesite fondo transparente o texto perfectamente nítido. Si necesitas un archivo liviano y además transparencia, usa PNG a WebP.</p>
<p>¿Necesitas que el archivo pese todavía menos después de convertirlo? Pásalo por Comprimir imágenes o reduce sus dimensiones con Redimensionar imágenes.</p>
HTML,
        'steps' => [
            'Suelta tus imágenes PNG en el recuadro, haz clic para buscarlas o pega una captura con Ctrl + V.',
            'Elige la <strong>Calidad</strong> del JPG. Entre 85 y 92 % las fotos y capturas se ven nítidas.',
            'Cada PNG se convierte a JPG al instante. Las zonas transparentes quedan en blanco, porque JPG no tiene transparencia.',
            'Descarga las imágenes una por una o haz clic en <strong>Descargar todo</strong> para obtener un ZIP.',
        ],
        'faq' => [
            ['q' => '¿Por qué convertir PNG a JPG?', 'a' => 'Las fotos y capturas guardadas en PNG suelen pesar varias veces más que la misma imagen en JPG. Al convertirlas son más fáciles de enviar, subir y compartir, y se abren en cualquier aplicación.'],
            ['q' => '¿Qué pasa con los fondos transparentes?', 'a' => 'JPG no puede guardar transparencia, así que las zonas transparentes se rellenan de blanco. Para conservar la transparencia y obtener igualmente un archivo liviano, usa PNG a WebP.'],
            ['q' => '¿Perderé calidad?', 'a' => 'JPG usa compresión con pérdida, pero con una calidad del 85 % o más la diferencia no se nota en fotos. Los gráficos con texto fino pueden verse un poco más suaves; para esos conviene mantener PNG o WebP.'],
            ['q' => '¿Mis imágenes se suben a internet?', 'a' => 'No. La conversión se hace en tu navegador y tus imágenes nunca salen de tu dispositivo.'],
        ],
    ],

    'jpg-to-png' => [
        'slug' => 'jpg-a-png',
        'name' => 'JPG a PNG',
        'short_description' => 'Convierte fotos JPG en imágenes PNG sin pérdida.',
        'description' => 'Convierte imágenes JPG y JPEG a PNG para que no pierdan más calidad al editarlas de nuevo. Convierte por lotes y descarga todos los archivos en un ZIP.',
        'seo_title' => 'Convertir JPG a PNG en línea, gratis y sin pérdida',
        'seo_description' => 'Convierte JPG a PNG gratis en línea. Conversión por lotes y descarga en ZIP, todo procesado en tu navegador. Sin subir archivos y sin registro.',
        'content' => <<<'HTML'
<h2>¿Por qué usar PNG?</h2>
<p>JPG pierde un poco de calidad cada vez que se edita y se vuelve a guardar. PNG es sin pérdida, así que convertir una foto a PNG antes de editarla la protege de un deterioro mayor. Muchas herramientas de diseño, servicios de impresión y tiendas de aplicaciones también piden archivos PNG.</p>
<h2>Qué esperar</h2>
<p>El PNG normalmente pesará más que el JPG original, porque las imágenes sin pérdida guardan cada píxel exactamente. La conversión no recupera detalles que ya se perdieron por la compresión JPG, y el fondo queda igual: las fotos JPG no tienen transparencia que conservar.</p>
<p>¿Prefieres un archivo liviano para la web? Usa JPG a WebP o Comprimir imágenes. Para cortar una parte de la foto antes, usa Recortar imagen.</p>
HTML,
        'steps' => [
            'Suelta tus imágenes JPG o JPEG en el recuadro, o haz clic para buscarlas. Puedes convertir muchas a la vez.',
            'Cada imagen se convierte a PNG al instante en tu navegador.',
            'Revisa el nuevo peso de cada imagen.',
            'Descarga los archivos PNG por separado o todos juntos en un ZIP.',
        ],
        'faq' => [
            ['q' => '¿Por qué convertir JPG a PNG?', 'a' => 'PNG es sin pérdida, así que la imagen no perderá más calidad cuando la edites y la guardes otra vez. Algunas aplicaciones, servicios de impresión y herramientas de diseño también exigen archivos PNG.'],
            ['q' => '¿Convertir mejora la calidad?', 'a' => 'No. La conversión no puede recuperar detalles que la compresión JPG ya eliminó, pero evita más pérdidas en futuras ediciones.'],
            ['q' => '¿Por qué el archivo PNG pesa más?', 'a' => 'PNG guarda cada píxel sin compresión con pérdida, así que las fotos normalmente quedan más pesadas. Para la web, JPG o WebP son mejores opciones para fotos.'],
            ['q' => '¿El PNG tiene fondo transparente?', 'a' => 'Las imágenes JPG no tienen transparencia, así que el PNG conserva el mismo fondo sólido que la foto original.'],
            ['q' => '¿Mis imágenes se suben a internet?', 'a' => 'No. Todo ocurre en tu dispositivo.'],
        ],
    ],

    'webp-to-png' => [
        'slug' => 'webp-a-png',
        'name' => 'WebP a PNG',
        'short_description' => 'Convierte imágenes WebP a PNG y conserva la transparencia.',
        'description' => 'Convierte imágenes WebP a PNG para abrirlas en cualquier editor o aplicación, conservando los fondos transparentes. Convierte por lotes y descarga todo en un ZIP.',
        'seo_title' => 'Convertir WebP a PNG con transparencia, gratis',
        'seo_description' => 'Convierte WebP a PNG gratis en línea. Conserva la transparencia, admite conversión por lotes y descarga en ZIP. Las imágenes no salen de tu equipo.',
        'content' => <<<'HTML'
<h2>Por qué las imágenes WebP dan problemas</h2>
<p>Los sitios web sirven sus imágenes en WebP porque los archivos son livianos y cargan rápido. Pero cuando guardas una, muchos editores, aplicaciones de presentaciones, sistemas operativos antiguos y formularios no la abren. Convertirla a PNG te da un archivo compatible con todo, sin perder calidad.</p>
<h2>PNG conserva la transparencia</h2>
<p>Los logos, stickers e imágenes de productos que guardas de internet suelen tener fondo transparente. PNG los conserva exactamente, a diferencia de JPG. Si prefieres archivos más livianos para fotos, usa WebP a JPG.</p>
<p>¿Quieres hacer lo contrario para tu propio sitio web? Convierte imágenes con PNG a WebP o JPG a WebP.</p>
HTML,
        'steps' => [
            'Suelta tus imágenes WebP en el recuadro o haz clic para buscarlas. Se admite la conversión por lotes.',
            'Cada imagen se convierte a PNG al instante, conservando los fondos transparentes.',
            'Revisa el peso de cada archivo convertido.',
            'Descarga las imágenes una por una o haz clic en <strong>Descargar todo</strong> para obtener un ZIP.',
        ],
        'faq' => [
            ['q' => '¿Por qué convertir WebP a PNG?', 'a' => 'Muchos editores de imagen, herramientas de diseño, aplicaciones de presentaciones y formularios todavía no aceptan WebP. PNG funciona en todas partes y mantiene la calidad completa.'],
            ['q' => '¿Se conserva la transparencia?', 'a' => 'Sí. A diferencia de JPG, PNG admite transparencia, así que los logos, íconos y stickers mantienen su fondo transparente.'],
            ['q' => '¿Me conviene PNG o JPG?', 'a' => 'Elige PNG para gráficos, logos, capturas y todo lo que tenga transparencia. Para fotos donde importa más un archivo liviano, usa WebP a JPG.'],
            ['q' => '¿Mis imágenes se suben a internet?', 'a' => 'No. La conversión se hace por completo en tu navegador.'],
        ],
    ],

    'svg-to-png' => [
        'slug' => 'svg-a-png',
        'name' => 'SVG a PNG',
        'short_description' => 'Convierte gráficos vectoriales SVG a PNG en cualquier escala.',
        'description' => 'Convierte íconos, logos e ilustraciones SVG a PNG en escala 1×, 2×, 4× u 8×, con fondo transparente o de color. Convierte por lotes en tu navegador.',
        'seo_title' => 'Convertir SVG a PNG en alta resolución, gratis',
        'seo_description' => 'Convierte SVG a PNG gratis en línea, hasta 8× de resolución, con fondo transparente o de color. Conversión por lotes, sin subir archivos.',
        'content' => <<<'HTML'
<h2>Cuándo necesitas un PNG en lugar de un SVG</h2>
<p>SVG es perfecto para logos e íconos en sitios web porque se ve nítido en cualquier tamaño. Sin embargo, muchos lugares solo aceptan imágenes rasterizadas: perfiles de redes sociales, firmas de correo, diapositivas de presentaciones, fichas de tiendas de aplicaciones y algunos gestores de contenido. Convertirlo a PNG hace que tu diseño vectorial sirva en cualquier lugar.</p>
<h2>Cómo elegir la escala</h2>
<ul>
<li><strong>1×</strong>: el tamaño definido en el SVG.</li>
<li><strong>2×</strong>: nítido en pantallas de alta resolución (Retina).</li>
<li><strong>4× u 8×</strong>: impresión, banners grandes o ediciones posteriores.</li>
</ul>
<p>¿Necesitas un archivo más liviano después? Usa Comprimir imágenes o convierte el resultado con PNG a WebP.</p>
HTML,
        'steps' => [
            'Suelta tus archivos SVG en el recuadro o haz clic para buscarlos. Puedes convertir varios a la vez.',
            'Elige la <strong>Escala</strong>. SVG es un formato vectorial, así que 2× o 4× genera PNG nítidos para pantallas de alta resolución.',
            'Deja el fondo transparente o elige un color sólido.',
            'Descarga cada PNG o haz clic en <strong>Descargar todo</strong> para obtener un ZIP.',
        ],
        'faq' => [
            ['q' => '¿De qué tamaño será el PNG?', 'a' => 'El PNG usa el tamaño definido en el SVG (su ancho y alto, o su viewBox) multiplicado por la escala que elijas. Un ícono de 24×24 en 4× queda de 96×96 píxeles.'],
            ['q' => '¿Se conserva el fondo transparente?', 'a' => 'Sí, de forma predeterminada. Desmarca <strong>Fondo transparente</strong> para rellenarlo con un color.'],
            ['q' => '¿Por qué mi SVG se ve distinto?', 'a' => 'Los SVG que cargan fuentes o imágenes externas desde otros sitios no pueden incluirlas en el PNG. Convierte el texto en contornos en tu herramienta de diseño para obtener un resultado exacto.'],
            ['q' => '¿Es seguro convertir archivos SVG?', 'a' => 'Sí. Los SVG se renderizan como imágenes en tu navegador, así que ningún script que contengan se ejecuta, y los archivos nunca se suben.'],
        ],
    ],
];
