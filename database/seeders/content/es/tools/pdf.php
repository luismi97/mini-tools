<?php

/*
| Spanish copy for the PDF tools (and Image to PDF). See content/es/tools.php.
*/

return [
    'merge-pdf' => [
        'slug' => 'unir-pdf',
        'name' => 'Unir PDF',
        'short_description' => 'Combina varios archivos PDF en un solo documento, en el orden que quieras.',
        'description' => 'Agrega tus archivos PDF, arrástralos al orden que prefieras y únelos en un solo PDF. Los archivos se combinan en tu navegador y nunca se suben.',
        'seo_title' => 'Unir PDF en línea gratis y privado',
        'seo_description' => 'Une archivos PDF gratis en línea. Combina varios PDF en uno, ordénalos arrastrando y descárgalo al instante. Sin subir archivos y sin registro.',
        'content' => <<<'HTML'
<h2>Cuándo conviene unir archivos PDF</h2>
<p>Combinar PDF es útil cuando necesitas enviar un único documento: una postulación con el currículum y la carta de presentación, una rendición de gastos con todos sus comprobantes o un contrato con sus anexos. Un solo archivo es más fácil de enviar por correo, de subir a portales que aceptan un único adjunto y de imprimir en el orden correcto.</p>
<h2>Une PDF sin subirlos a internet</h2>
<p>La mayoría de los servicios de PDF en línea suben tus documentos a sus servidores. Esta herramienta combina los archivos directamente en tu navegador, así que documentos confidenciales como estados de cuenta, informes médicos y contratos nunca salen de tu computadora o tu celular.</p>
<h2>Consejos</h2>
<ul>
<li>Usa primero Dividir PDF si solo necesitas algunas páginas de un archivo.</li>
<li>¿Tienes fotos o escaneos en lugar de PDF? Conviértelos con JPG a PDF y después únelos.</li>
<li>¿Necesitas las páginas como imágenes? Usa PDF a JPG.</li>
</ul>
HTML,
        'steps' => [
            'Suelta dos o más archivos PDF en el recuadro o haz clic para buscarlos.',
            'Arrastra los archivos (o usa las flechas) para dejarlos en el orden que quieras. Se muestra la cantidad de páginas de cada archivo.',
            'Haz clic en <strong>Unir PDF</strong>.',
            'Tu PDF combinado se descarga al instante como <code>merged.pdf</code>.',
        ],
        'faq' => [
            ['q' => '¿Mis archivos PDF se suben a un servidor?', 'a' => 'No. Los PDF se unen por completo en tu navegador, así que los documentos confidenciales nunca salen de tu dispositivo.'],
            ['q' => '¿Hay un límite de archivos o de tamaño?', 'a' => 'Puedes unir hasta 30 PDF a la vez, de hasta 100 MB cada uno. Los archivos muy grandes pueden tardar un poco más según tu dispositivo.'],
            ['q' => '¿Se conservan los enlaces, marcadores y campos de formulario?', 'a' => 'El contenido de las páginas, las imágenes y el texto se mantienen tal cual. Los extras interactivos, como los marcadores y algunos campos de formulario, pueden no pasar al archivo unido.'],
            ['q' => '¿Puedo unir PDF protegidos con contraseña?', 'a' => 'No. Primero quita la contraseña del PDF y después únelo.'],
            ['q' => '¿Puedo reordenar o quitar páginas?', 'a' => 'Aquí puedes reordenar archivos completos. Para quitar o extraer páginas concretas, usa Dividir PDF antes o después de unir.'],
        ],
    ],

    'split-pdf' => [
        'slug' => 'dividir-pdf',
        'name' => 'Dividir PDF',
        'short_description' => 'Extrae páginas o divide un PDF en varios archivos más pequeños.',
        'description' => 'Extrae páginas específicas a un PDF nuevo, divide un documento en rangos personalizados o guarda cada página como un PDF independiente. Tu archivo se procesa en tu navegador.',
        'seo_title' => 'Dividir PDF en línea: extrae páginas gratis',
        'seo_description' => 'Divide archivos PDF gratis en línea. Extrae páginas, separa por rangos o guarda cada página como un PDF aparte. Privado: tus archivos no salen de tu equipo.',
        'content' => <<<'HTML'
<h2>¿Por qué dividir un PDF?</h2>
<p>Muchas veces un PDF grande tiene más de lo que necesitas compartir. Dividirlo te permite enviar solo las páginas relevantes de un contrato, sacar una sola factura de un estado de cuenta mensual, separar documentos escaneados juntos o partir un archivo enorme en partes que respeten los límites del correo y de los formularios de carga.</p>
<h2>Ejemplos de rangos de páginas</h2>
<ul>
<li><code>1-3</code>: páginas 1, 2 y 3.</li>
<li><code>1, 4, 7</code>: tres páginas sueltas.</li>
<li><code>5-</code>: desde la página 5 hasta la última.</li>
<li><code>1-2, 10-12</code>: dos grupos de páginas.</li>
</ul>
<p>Para juntar páginas de distintos archivos, usa Unir PDF. Para convertir páginas en imágenes, usa PDF a JPG.</p>
HTML,
        'steps' => [
            'Suelta un PDF en el recuadro o haz clic para buscarlo. Cuando carga, se muestra la cantidad de páginas.',
            'Elige un modo: <strong>Extraer páginas</strong> a un PDF nuevo, <strong>Dividir por rangos</strong> en varios PDF o <strong>Cada página</strong> como un PDF aparte.',
            'Escribe las páginas o los rangos, por ejemplo <code>1-3, 5, 8-</code> (<code>8-</code> significa de la página 8 hasta el final).',
            'Haz clic en <strong>Dividir PDF</strong>. Si es un solo archivo se descarga directo; si son varios, se descargan juntos en un ZIP.',
        ],
        'faq' => [
            ['q' => '¿Cómo extraigo páginas específicas de un PDF?', 'a' => 'Elige Extraer páginas y escribe los números, por ejemplo <code>2, 4-6</code>. Obtendrás un PDF nuevo solo con esas páginas, en ese orden.'],
            ['q' => '¿Puedo dividir un PDF en varios archivos?', 'a' => 'Sí. Usa Dividir por rangos: cada rango separado por comas se convierte en su propio PDF. O elige Cada página para guardar cada página por separado.'],
            ['q' => '¿Mi PDF se sube a internet?', 'a' => 'No. El PDF se divide en tu navegador y nunca sale de tu dispositivo, por lo que es seguro para contratos, facturas y otros documentos privados.'],
            ['q' => '¿Se modifica el archivo original?', 'a' => 'No. Tu PDF original queda exactamente igual; la herramienta solo crea archivos nuevos.'],
            ['q' => '¿Funciona con PDF protegidos con contraseña?', 'a' => 'No. Primero quita la contraseña del PDF.'],
        ],
    ],

    'pdf-to-jpg' => [
        'slug' => 'pdf-a-jpg',
        'name' => 'PDF a JPG',
        'short_description' => 'Convierte cada página de un PDF en una imagen JPG de alta calidad.',
        'description' => 'Convierte cada página de un PDF en una imagen JPG con la resolución que elijas. Descarga las páginas una por una o todas juntas en un ZIP. Tu PDF se procesa en tu navegador.',
        'seo_title' => 'Convertir PDF a JPG gratis y en alta calidad',
        'seo_description' => 'Convierte PDF a JPG gratis en línea. Cada página se vuelve una imagen de alta resolución (hasta 300 DPI). Descarga en ZIP. Tu PDF no sale de tu equipo.',
        'content' => <<<'HTML'
<h2>¿Por qué convertir un PDF a JPG?</h2>
<p>Las imágenes son más fáciles de compartir que los PDF en chats y redes sociales, se pueden insertar en presentaciones y documentos, y se previsualizan al instante en cualquier dispositivo. Convertir una página de PDF a JPG también es la forma más sencilla de transformar una diapositiva, un volante o un certificado en una imagen.</p>
<h2>Cómo elegir la resolución</h2>
<ul>
<li><strong>72 DPI</strong>: vistas previas pequeñas y miniaturas.</li>
<li><strong>150 DPI</strong>: para ver en pantalla, documentos y presentaciones.</li>
<li><strong>300 DPI</strong>: para imprimir y hacer zoom en textos pequeños.</li>
</ul>
<p>¿Solo necesitas algunas páginas? Extráelas primero con Dividir PDF. Para volver de imágenes a documento, usa JPG a PDF.</p>
HTML,
        'steps' => [
            'Suelta un PDF en el recuadro o haz clic para buscarlo.',
            'Elige la resolución: <strong>72 DPI</strong> para pantallas, <strong>150 DPI</strong> para la mayoría de los usos o <strong>300 DPI</strong> para imprimir.',
            'Haz clic en <strong>Convertir a JPG</strong>. Cada página se genera como imagen y se muestra una vista previa.',
            'Descarga páginas sueltas o haz clic en <strong>Descargar todo</strong> para obtener todas las páginas en un ZIP.',
        ],
        'faq' => [
            ['q' => '¿Qué DPI debo elegir?', 'a' => '150 DPI es una buena opción para compartir y para documentos. Usa 300 DPI para imprimir o cuando necesites ampliar textos pequeños, y 72 DPI para vistas previas web. A más DPI, archivos más pesados.'],
            ['q' => '¿Mi PDF se sube a un servidor?', 'a' => 'No. Las páginas se generan en tu navegador con PDF.js, el mismo motor que usa Firefox. Tu archivo nunca sale de tu dispositivo.'],
            ['q' => '¿Cuántas páginas puedo convertir?', 'a' => 'Hasta 200 páginas por PDF, con archivos de hasta 100 MB.'],
            ['q' => '¿Puedo convertir un PDF a PNG?', 'a' => 'Esta herramienta crea imágenes JPG, ideales para documentos y fotos. Si necesitas PNG, convierte después los JPG con JPG a PNG.'],
            ['q' => '¿Funciona con PDF protegidos con contraseña?', 'a' => 'No. Primero quita la contraseña del PDF.'],
        ],
    ],

    'jpg-to-pdf' => [
        'slug' => 'jpg-a-pdf',
        'name' => 'JPG a PDF',
        'short_description' => 'Convierte fotos y escaneos JPG en un solo documento PDF.',
        'description' => 'Combina imágenes JPG en un solo PDF, elige el tamaño de página, la orientación y los márgenes, y reordena las páginas antes de descargar. Todo ocurre en tu navegador.',
        'seo_title' => 'Convertir JPG a PDF: une imágenes en un PDF',
        'seo_description' => 'Convierte JPG a PDF gratis en línea. Combina varias fotos en un PDF con páginas A4, Carta o ajustadas a la imagen. Privado, rápido y sin registro.',
        'content' => <<<'HTML'
<h2>Convierte fotos y escaneos en un solo PDF</h2>
<p>El PDF es el formato estándar para los documentos que envías a escuelas, empleadores, bancos y oficinas de gobierno. Convertir en un único PDF las fotos JPG de comprobantes, identificaciones, tareas o páginas firmadas mantiene todo en orden y hace que el archivo sea fácil de subir y de imprimir.</p>
<h2>Consejos para un buen resultado</h2>
<ul>
<li>Fotografía los documentos con buena luz, bien planos y desde arriba.</li>
<li>Usa Recortar imagen para quitar fondos y bordes de la mesa antes de convertir.</li>
<li>Elige A4 o Carta para documentos que se van a imprimir, y Ajustar a la imagen para álbumes de fotos.</li>
<li>Combina el resultado con otros documentos usando Unir PDF.</li>
</ul>
<p>¿También tienes capturas PNG o imágenes WebP? Usa Imagen a PDF, que acepta todos los formatos de imagen comunes.</p>
HTML,
        'steps' => [
            'Suelta tus fotos JPG o páginas escaneadas en el recuadro, o haz clic para buscarlas. Agrega todas las que necesites.',
            'Arrastra las imágenes (o usa las flechas) para definir el orden de las páginas.',
            'Elige el tamaño de página —<strong>A4</strong>, <strong>Carta (EE. UU.)</strong> o <strong>Ajustar a la imagen</strong>—, además de la orientación y los márgenes.',
            'Haz clic en <strong>Convertir a PDF</strong> para descargar un PDF con cada imagen en su propia página.',
        ],
        'faq' => [
            ['q' => '¿Cómo junto varios JPG en un solo PDF?', 'a' => 'Agrega todos tus archivos JPG, ordénalos y haz clic en Convertir a PDF. Cada imagen se convierte en una página del mismo PDF.'],
            ['q' => '¿Mis fotos quedarán bien orientadas?', 'a' => 'Sí. Se aplica la orientación que guardan los celulares y las cámaras (EXIF), así que las fotos verticales quedan derechas. La orientación automática también pone la página en horizontal para imágenes anchas.'],
            ['q' => '¿Qué tamaño de página debo elegir?', 'a' => 'Usa A4 para la mayor parte del mundo y Carta para Estados Unidos, Canadá, México y otros países de América. Ajustar a la imagen crea páginas del tamaño exacto de cada foto, sin bordes blancos.'],
            ['q' => '¿Mis imágenes se suben a internet?', 'a' => 'No. El PDF se crea en tu navegador. Tus fotos y documentos nunca salen de tu dispositivo.'],
            ['q' => '¿Puedo agregar imágenes PNG o WebP?', 'a' => 'Esta página es para archivos JPG. Usa Imagen a PDF para combinar imágenes JPG, PNG y WebP en un solo PDF.'],
        ],
    ],

    'rotate-pdf' => [
        'slug' => 'girar-pdf',
        'name' => 'Girar PDF',
        'short_description' => 'Gira todas las páginas o solo las que están de lado.',
        'description' => 'Corrige páginas de lado o al revés: previsualiza cada página, gira páginas sueltas o el documento completo y descarga el PDF corregido. Tu archivo nunca sale de tu navegador.',
        'seo_title' => 'Girar PDF en línea: una página o todas',
        'seo_description' => 'Gira páginas de PDF gratis en línea. Previsualiza cada página, gira una o todas 90° o 180° y guarda el cambio de forma permanente. Privado: sin subir archivos.',
        'content' => <<<'HTML'
<h2>Corrige escaneos de lado en segundos</h2>
<p>Los escáneres y las apps para escanear con el celular suelen guardar algunas páginas de lado o al revés, sobre todo cuando el documento mezcla páginas verticales y horizontales. Girarlas hace que el PDF se lea bien en pantalla y se imprima en la orientación correcta.</p>
<h2>Gira solo lo que hace falta</h2>
<p>Las vistas previas te permiten girar páginas individuales en lugar del archivo completo. Cada clic gira una página 90° en el sentido de las agujas del reloj; los botones de flecha giran a la izquierda o a la derecha, y la rotación se guarda de forma permanente en el archivo descargado sin perder calidad.</p>
<p>¿También necesitas quitar páginas? Usa Eliminar páginas de PDF. Para combinar varios documentos, usa Unir PDF, y para convertir páginas en imágenes, usa PDF a JPG.</p>
HTML,
        'steps' => [
            'Suelta un PDF en el recuadro o haz clic para buscarlo. Aparece una vista previa de cada página.',
            'Haz clic en una página (o en sus botones de flecha) para girarla 90°. Usa <strong>Girar todas</strong> para girar todas las páginas a la vez.',
            'Gira solo las páginas que lo necesiten, por ejemplo las escaneadas que quedaron de lado o al revés.',
            'Haz clic en <strong>Descargar PDF girado</strong> para guardar el archivo corregido.',
        ],
        'faq' => [
            ['q' => '¿Puedo girar una sola página de un PDF?', 'a' => 'Sí. Cada página tiene sus propios botones de giro, así que puedes girar solo las que están de lado y dejar el resto igual.'],
            ['q' => '¿La rotación es permanente?', 'a' => 'Sí. La nueva orientación se guarda en el PDF descargado, así que se abre bien en cualquier lector de PDF, navegador e impresora.'],
            ['q' => '¿Girar el PDF reduce la calidad?', 'a' => 'No. La rotación solo cambia la orientación de la página. El texto, las imágenes y la calidad quedan exactamente iguales.'],
            ['q' => '¿Mi PDF se sube a internet?', 'a' => 'No. El PDF se procesa en tu navegador y nunca sale de tu dispositivo.'],
            ['q' => '¿Funciona con PDF protegidos con contraseña?', 'a' => 'No. Primero quita la contraseña del PDF.'],
        ],
    ],

    'delete-pdf-pages' => [
        'slug' => 'eliminar-paginas-pdf',
        'name' => 'Eliminar páginas de PDF',
        'short_description' => 'Quita páginas que no quieres de un PDF de forma visual.',
        'description' => 'Previsualiza cada página de un PDF, haz clic en las que quieres quitar y descarga una copia limpia. Ideal para páginas en blanco de escaneos y páginas confidenciales que no debes compartir.',
        'seo_title' => 'Eliminar páginas de un PDF gratis',
        'seo_description' => 'Quita páginas de un PDF gratis en línea. Previsualiza todas las páginas, haz clic para eliminarlas y descarga el PDF nuevo. Se procesa en tu navegador.',
        'content' => <<<'HTML'
<h2>¿Por qué quitar páginas de un PDF?</h2>
<p>Los documentos escaneados suelen incluir páginas en blanco, páginas repetidas o carátulas. Otras veces necesitas compartir un documento sin las páginas que contienen datos personales o confidenciales. Quitar esas páginas hace que el archivo sea más liviano, más ordenado y más seguro de enviar.</p>
<h2>Quitar, conservar o extraer</h2>
<p>Esta herramienta es ideal cuando quieres descartar algunas páginas y conservar el resto. Si solo necesitas unas pocas páginas de un documento largo, Dividir PDF te permite extraerlas escribiendo sus números. Las páginas de lado se corrigen con Girar PDF, y varios archivos ya depurados se pueden combinar con Unir PDF.</p>
HTML,
        'steps' => [
            'Suelta un PDF en el recuadro o haz clic para buscarlo. Aparece una vista previa de cada página.',
            'Haz clic en las páginas que quieres quitar. Se marcan en rojo; haz clic otra vez para conservar una página.',
            'Revisa el contador para confirmar cuántas páginas se eliminarán.',
            'Haz clic en <strong>Descargar PDF editado</strong> para guardar una copia sin esas páginas.',
        ],
        'faq' => [
            ['q' => '¿Cómo elimino páginas de un PDF?', 'a' => 'Abre el PDF aquí, haz clic en cada página que quieras quitar y descarga el archivo editado. Las páginas restantes conservan su orden original.'],
            ['q' => '¿Se modifica el archivo original?', 'a' => 'No. Tu PDF original queda igual; la herramienta descarga una copia nueva sin las páginas eliminadas.'],
            ['q' => '¿Puedo quitar páginas en blanco de un escaneo?', 'a' => 'Sí. Con las vistas previas es fácil detectar páginas en blanco o repetidas: solo haz clic en ellas para quitarlas.'],
            ['q' => '¿Mi PDF se sube a internet?', 'a' => 'No. Todo ocurre en tu navegador, así que los documentos privados nunca salen de tu dispositivo.'],
            ['q' => '¿Puedo extraer páginas en lugar de quitarlas?', 'a' => 'Sí. Para conservar solo algunas páginas, Dividir PDF te permite escribir los números de las páginas que quieres extraer.'],
        ],
    ],

    'image-to-pdf' => [
        'slug' => 'imagen-a-pdf',
        'name' => 'Imagen a PDF',
        'short_description' => 'Convierte imágenes JPG, PNG y WebP en un solo archivo PDF.',
        'description' => 'Convierte fotos, capturas de pantalla y escaneos en cualquier formato común en un solo PDF. Reordena las imágenes, elige el tamaño de página y los márgenes, y descarga al instante.',
        'seo_title' => 'Convertir imagen a PDF: JPG, PNG y WebP',
        'seo_description' => 'Convierte imágenes a PDF gratis en línea. Combina JPG, PNG y WebP en un PDF, reordena páginas y elige A4, Carta o ajustar a la imagen. Sin subir archivos.',
        'content' => <<<'HTML'
<h2>Combina cualquier imagen en un PDF</h2>
<p>Convierte capturas de pantalla, páginas escaneadas, fotos de comprobantes y gráficos exportados en un solo PDF que cualquiera puede abrir, imprimir o adjuntar a un correo. Puedes mezclar imágenes JPG, PNG y WebP en el mismo documento y ordenarlas como quieras.</p>
<h2>Cómo elegir el tamaño de página</h2>
<ul>
<li><strong>A4</strong>: tamaño estándar de documentos en la mayoría de los países.</li>
<li><strong>Carta</strong>: estándar en Estados Unidos, Canadá, México y otros países de América.</li>
<li><strong>Ajustar a la imagen</strong>: cada página coincide exactamente con su imagen, sin bordes blancos.</li>
</ul>
<p>¿Solo tienes fotos JPG? JPG a PDF funciona igual. Para agregar el resultado a otros PDF, usa Unir PDF.</p>
HTML,
        'steps' => [
            'Suelta tus imágenes en el recuadro o haz clic para buscarlas. Puedes mezclar JPG, PNG y WebP en el mismo PDF.',
            'Reordena las imágenes arrastrándolas o con los botones de flecha.',
            'Elige el tamaño de página, la orientación y el margen.',
            'Haz clic en <strong>Convertir a PDF</strong> y tu PDF se descarga al instante.',
        ],
        'faq' => [
            ['q' => '¿Qué formatos de imagen puedo convertir a PDF?', 'a' => 'JPG, JPEG, PNG y WebP. Puedes combinar formatos distintos en el mismo PDF.'],
            ['q' => '¿Qué pasa con los fondos transparentes de los PNG?', 'a' => 'Las zonas transparentes se colocan sobre una página blanca, que es como se ven al imprimir.'],
            ['q' => '¿Puedo convertir capturas de pantalla en un PDF?', 'a' => 'Sí. Las capturas suelen ser archivos PNG: agrégalas todas, ordénalas y conviértelas. Usa Ajustar a la imagen para evitar bordes blancos.'],
            ['q' => '¿Mis imágenes son privadas?', 'a' => 'Sí. Todo ocurre en tu navegador, así que tus imágenes nunca se suben.'],
        ],
    ],
];
