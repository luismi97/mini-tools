<?php

/*
| Spanish copy for the text tools. See content/es/tools.php.
*/

return [
    'word-counter' => [
        'slug' => 'contador-de-palabras',
        'name' => 'Contador de palabras',
        'short_description' => 'Cuenta palabras, caracteres, oraciones y tiempo de lectura al instante.',
        'description' => 'Pega o escribe tu texto para contar palabras, caracteres con y sin espacios, oraciones y párrafos, además del tiempo de lectura, el tiempo en voz alta y la densidad de palabras clave.',
        'seo_title' => 'Contador de palabras y caracteres en línea',
        'seo_description' => 'Contador de palabras gratis. Cuenta palabras, caracteres (con y sin espacios), oraciones y párrafos, y mira el tiempo de lectura y las palabras clave.',
        'content' => <<<'HTML'
<h2>Límites de longitud habituales</h2>
<ul>
<li><strong>Meta descripción:</strong> unos 150–160 caracteres.</li>
<li><strong>Título de página para Google:</strong> unos 50–60 caracteres.</li>
<li><strong>Publicación en X (Twitter):</strong> 280 caracteres.</li>
<li><strong>Publicación en LinkedIn:</strong> 3000 caracteres.</li>
<li><strong>Ensayos y trabajos académicos:</strong> suelen pedir entre 500 y 1500 palabras.</li>
<li><strong>Artículo de blog que posiciona bien:</strong> con frecuencia 1000–2000 palabras, según el tema.</li>
</ul>
<h2>Consejos de escritura</h2>
<p>En pantalla la gente lee en diagonal, así que divide los párrafos largos en otros más cortos de dos a cuatro oraciones y usa subtítulos para guiar la lectura. Las oraciones cortas se leen mejor en internet. Usa la lista de palabras clave para comprobar que tu tema principal aparece de forma natural y que no repites demasiado ninguna palabra. Para corregir mayúsculas, usa el Convertidor de mayúsculas y minúsculas; para comparar dos borradores, usa Comparar textos.</p>
HTML,
        'steps' => [
            'Escribe o pega tu texto en el cuadro. Los conteos se actualizan al instante mientras escribes.',
            'Mira la cantidad de palabras, caracteres (con y sin espacios), oraciones, párrafos y líneas.',
            'Revisa el tiempo estimado de lectura y de lectura en voz alta: útil para artículos, discursos y presentaciones.',
            'Revisa las palabras más frecuentes y su densidad para no abusar de ninguna y comprobar el enfoque SEO.',
        ],
        'faq' => [
            ['q' => '¿Cómo se cuentan las palabras?', 'a' => 'Una palabra es cualquier secuencia de letras o números. Las palabras con guion, como <em>franco-chileno</em>, cuentan como una sola. Los signos de puntuación y los emoji no cuentan como palabras.'],
            ['q' => '¿El conteo de caracteres incluye los espacios?', 'a' => 'Se muestran ambos: <strong>Caracteres</strong> incluye los espacios y saltos de línea, y <strong>Caracteres (sin espacios)</strong> excluye todos los espacios. Los emoji y las letras con tilde cuentan como un carácter cada uno.'],
            ['q' => '¿Cómo se calcula el tiempo de lectura?', 'a' => 'El tiempo de lectura supone una velocidad promedio de lectura en silencio de 238 palabras por minuto. El tiempo en voz alta supone 130 palabras por minuto, un ritmo habitual en presentaciones.'],
            ['q' => '¿Qué es la densidad de palabras clave?', 'a' => 'Es la frecuencia con la que aparece una palabra en relación con el total de palabras. Las palabras muy comunes, como <em>el</em>, <em>la</em> o <em>y</em>, se ignoran para que veas las palabras que definen tu texto.'],
            ['q' => '¿Mi texto se guarda o se sube?', 'a' => 'No. Todo se cuenta en tu navegador. Tu texto nunca se envía a un servidor.'],
        ],
    ],

    'case-converter' => [
        'slug' => 'convertir-mayusculas-minusculas',
        'name' => 'Convertidor de mayúsculas y minúsculas',
        'short_description' => 'Cambia texto a MAYÚSCULAS, minúsculas, Tipo Título, camelCase y más.',
        'description' => 'Convierte texto entre mayúsculas, minúsculas, tipo título, tipo oración y formatos para desarrolladores como camelCase, snake_case y kebab-case con un clic.',
        'seo_title' => 'Convertir mayúsculas y minúsculas en línea',
        'seo_description' => 'Convertidor de mayúsculas y minúsculas gratis. Pasa texto a MAYÚSCULAS, minúsculas, Tipo Título, tipo oración, camelCase, snake_case y kebab-case al instante.',
        'content' => <<<'HTML'
<h2>¿Qué formato de texto conviene usar?</h2>
<ul>
<li><strong>Tipo oración</strong>: textos, etiquetas de interfaz y la mayoría de los títulos en español.</li>
<li><strong>Tipo Título</strong>: títulos en inglés de titulares, libros y artículos.</li>
<li><strong>MAYÚSCULAS</strong>: etiquetas cortas, siglas y énfasis (con moderación).</li>
<li><strong>camelCase y PascalCase</strong>: variables, funciones y clases en JavaScript, Java y C#.</li>
<li><strong>snake_case y CONSTANT_CASE</strong>: Python, Ruby, columnas SQL y constantes.</li>
<li><strong>kebab-case</strong>: URL, clases CSS y nombres de archivo.</li>
</ul>
<p>¿Escribiste un párrafo entero con el Bloq Mayús activado sin darte cuenta? Pégalo aquí y conviértelo a tipo oración con un clic en lugar de volver a escribirlo. Para contar palabras o caracteres después, usa el Contador de palabras.</p>
HTML,
        'steps' => [
            'Pega o escribe tu texto en el cuadro de entrada.',
            'Elige un formato: MAYÚSCULAS, minúsculas, Tipo Título, tipo oración y más.',
            'Si programas, puedes convertir el texto a <strong>camelCase</strong>, <strong>snake_case</strong>, <strong>kebab-case</strong>, <strong>PascalCase</strong> o <strong>CONSTANT_CASE</strong>.',
            'Copia el texto convertido o descárgalo como archivo.',
        ],
        'faq' => [
            ['q' => '¿Qué es el Tipo Título?', 'a' => 'El Tipo Título pone en mayúscula la primera letra de cada palabra importante, mientras que palabras cortas del inglés como <em>a</em>, <em>and</em>, <em>of</em> y <em>the</em> quedan en minúscula salvo al principio o al final. Es el estilo de los titulares y libros en inglés; en español se recomienda el tipo oración.'],
            ['q' => '¿Qué diferencia hay entre Tipo Título y Cada Palabra En Mayúscula?', 'a' => 'Cada Palabra En Mayúscula pone en mayúscula todas las palabras, incluidas las cortas. Tipo Título sigue las reglas de los titulares en inglés y deja en minúscula las palabras pequeñas.'],
            ['q' => '¿Cómo funciona el tipo oración?', 'a' => 'El tipo oración pasa todo a minúsculas y pone en mayúscula la primera letra de cada oración. Los nombres propios hay que corregirlos a mano.'],
            ['q' => '¿Puedo arreglar un texto escrito con el Bloq Mayús activado?', 'a' => 'Sí. Usa iNVERTIDO para intercambiar mayúsculas y minúsculas, o tipo oración para reescribirlo correctamente.'],
            ['q' => '¿Mi texto se guarda?', 'a' => 'No. La conversión se hace en tu navegador y no se sube nada.'],
        ],
    ],

    'text-compare' => [
        'slug' => 'comparar-textos',
        'name' => 'Comparar textos',
        'short_description' => 'Compara dos textos y resalta las diferencias.',
        'description' => 'Pega dos versiones de un texto para ver exactamente qué se agregó y qué se quitó, línea por línea o palabra por palabra. Ideal para documentos, contratos y código.',
        'seo_title' => 'Comparar textos: encuentra las diferencias',
        'seo_description' => 'Compara dos textos en línea y resalta las diferencias por línea o por palabra. Ignora mayúsculas y espacios. Privado: tu texto no sale de tu navegador.',
        'content' => <<<'HTML'
<h2>Qué puedes comparar</h2>
<ul>
<li>Dos versiones de un contrato, un ensayo o un artículo.</li>
<li>Archivos de configuración y fragmentos de código.</li>
<li>Listas exportadas en distintos momentos, para ver qué se agregó o se quitó.</li>
<li>Traducciones o correcciones de estilo antes de publicar.</li>
</ul>
<h2>Comparar por línea o por palabra</h2>
<p>El modo por línea muestra qué líneas cambiaron: perfecto para código y datos. El modo por palabra señala exactamente qué palabras cambiaron dentro de un párrafo: ideal para revisar textos. Combínalo con Eliminar líneas duplicadas y Ordenar líneas para comparar listas en las que el orden no importa.</p>
HTML,
        'steps' => [
            'Pega el texto original a la izquierda y el texto modificado a la derecha.',
            "Las diferencias aparecen abajo al instante: el texto <span class='rounded bg-danger-soft px-1 text-danger'>eliminado</span> en rojo y el <span class='rounded bg-success-soft px-1 text-success'>agregado</span> en verde.",
            'Compara <strong>por línea</strong> para código, listas y documentos, o <strong>por palabra</strong> para detectar pequeños cambios en las oraciones.',
            'Ignora las mayúsculas o los espacios sobrantes cuando solo importa el contenido.',
        ],
        'faq' => [
            ['q' => '¿Cómo funciona la comparación de textos?', 'a' => 'La herramienta usa el algoritmo de diferencias de Myers, el mismo enfoque que usa Git, para encontrar el conjunto más pequeño de inserciones y eliminaciones que convierte el texto original en el nuevo.'],
            ['q' => '¿Conviene comparar por línea o por palabra?', 'a' => 'El modo por línea es mejor para código, datos CSV, listas y documentos largos. El modo por palabra resalta exactamente qué palabras cambiaron dentro de las oraciones, ideal para revisar textos y versiones de contratos.'],
            ['q' => '¿Puedo comparar código?', 'a' => 'Sí. Usa el modo por línea. Activa Ignorar espacios para omitir los cambios que son solo de sangría.'],
            ['q' => '¿Hay un límite de tamaño?', 'a' => 'Los textos de miles de líneas se comparan al instante. Si los dos textos son extremadamente distintos, la herramienta te pedirá comparar secciones más pequeñas.'],
            ['q' => '¿Mi texto se sube a internet?', 'a' => 'No. La comparación se hace por completo en tu navegador, así que los documentos confidenciales siguen siendo privados.'],
        ],
    ],

    'remove-duplicate-lines' => [
        'slug' => 'eliminar-lineas-duplicadas',
        'name' => 'Eliminar líneas duplicadas',
        'short_description' => 'Borra las líneas repetidas de una lista y conserva el orden original.',
        'description' => 'Quita las líneas duplicadas de listas de correos, palabras clave, URL o nombres en un solo paso, con opciones para ignorar mayúsculas, quitar espacios y eliminar líneas vacías.',
        'seo_title' => 'Eliminar líneas duplicadas de cualquier lista',
        'seo_description' => 'Elimina líneas duplicadas gratis. Conserva el orden original, puede ignorar mayúsculas y quitar espacios. Funciona con listas grandes en tu navegador.',
        'content' => <<<'HTML'
<h2>Limpia cualquier lista</h2>
<p>Los duplicados se cuelan en listas de correos, investigaciones de palabras clave, catálogos de productos y exportaciones de datos. Quitarlos evita enviar el mismo correo dos veces, contar dos veces una palabra clave o importar registros repetidos a una base de datos.</p>
<h2>Consejos</h2>
<ul>
<li>Activa <strong>Ignorar mayúsculas</strong> para correos y palabras clave, donde las mayúsculas no importan.</li>
<li>Deja activado <strong>Quitar espacios sobrantes</strong> para detectar duplicados que solo se diferencian por espacios invisibles.</li>
<li>¿También necesitas la lista en orden alfabético? Pásala por Ordenar líneas.</li>
</ul>
<h2>Funciona con datos de hojas de cálculo</h2>
<p>Copia una columna de Excel o Google Sheets, pégala aquí y vuelve a pegar los valores únicos. Cada celda se convierte en una línea, así que puedes depurar miles de filas en segundos sin fórmulas.</p>
HTML,
        'steps' => [
            'Pega tu lista en el cuadro de entrada, un elemento por línea.',
            'Las líneas duplicadas se eliminan al instante. Se conserva la primera aparición de cada línea, en su orden original.',
            'Elige si <strong>Manzana</strong> y <strong>manzana</strong> cuentan como la misma línea, y si quieres quitar espacios y eliminar líneas vacías.',
            'Copia la lista limpia o descárgala como archivo de texto.',
        ],
        'faq' => [
            ['q' => '¿Conserva el orden original?', 'a' => 'Sí. Las líneas mantienen su orden original y solo se quitan las repeticiones posteriores. Para ordenar también la lista, usa Ordenar líneas.'],
            ['q' => '¿Qué hace Ignorar mayúsculas?', 'a' => 'Con Ignorar mayúsculas activado, las líneas que solo se diferencian en las mayúsculas (como <em>Correo</em> y <em>correo</em>) se tratan como duplicadas y solo se conserva la primera.'],
            ['q' => '¿Para qué sirve quitar los espacios sobrantes?', 'a' => 'Las líneas copiadas de hojas de cálculo o documentos suelen tener espacios invisibles al principio o al final. Quitarlos asegura que esas líneas se reconozcan como duplicadas.'],
            ['q' => '¿Puedo limpiar una lista de correos o palabras clave?', 'a' => 'Sí. Funciona con cualquier lista: correos, URL, palabras clave, códigos de producto o nombres. Las listas grandes, de cientos de miles de líneas, se procesan en un momento.'],
            ['q' => '¿Mis datos son privados?', 'a' => 'Sí. El texto se procesa en tu navegador y nunca se sube.'],
        ],
    ],

    'sort-lines' => [
        'slug' => 'ordenar-lineas',
        'name' => 'Ordenar líneas',
        'short_description' => 'Ordena líneas alfabéticamente, por longitud, al revés o al azar.',
        'description' => 'Ordena cualquier lista de la A a la Z o de la Z a la A con orden natural de números, por longitud, al revés o mézclala al azar. Opcionalmente quita duplicados y líneas vacías.',
        'seo_title' => 'Ordenar líneas alfabéticamente en línea',
        'seo_description' => 'Ordena líneas de texto alfabéticamente en línea: A–Z, Z–A, orden natural de números, por longitud, al revés o al azar. Gratis e instantáneo.',
        'content' => <<<'HTML'
<h2>Ordena listas como la gente espera</h2>
<p>El orden alfabético simple pone "Elemento 10" antes que "Elemento 2" porque compara carácter por carácter. El orden natural compara los números por su valor, así que las listas de nombres de archivo, versiones, capítulos y números de factura quedan en el orden correcto.</p>
<h2>Usos populares</h2>
<ul>
<li>Ordenar alfabéticamente nombres, glosarios y bibliografías.</li>
<li>Mezclar una lista para sorteos, equipos al azar o preguntas de un cuestionario.</li>
<li>Invertir un registro o una línea de tiempo.</li>
<li>Ordenar palabras clave o URL antes de compararlas con Comparar textos.</li>
</ul>
<p>Para quitar entradas repetidas sin cambiar el orden, usa Eliminar líneas duplicadas.</p>
HTML,
        'steps' => [
            'Pega tu lista en el cuadro de entrada, un elemento por línea.',
            'Elige el orden: <strong>A → Z</strong>, <strong>Z → A</strong>, por longitud, al revés o aleatorio (mezclar).',
            'Deja activado <strong>Orden natural</strong> para que <em>elemento 2</em> quede antes que <em>elemento 10</em>.',
            'Si quieres, quita duplicados y líneas vacías, y después copia o descarga la lista ordenada.',
        ],
        'faq' => [
            ['q' => '¿Qué es el orden natural?', 'a' => 'El orden natural ordena los números dentro del texto por su valor, como lo esperaría una persona: <em>archivo 2</em> va antes que <em>archivo 10</em>. El orden alfabético simple pondría primero <em>archivo 10</em>.'],
            ['q' => '¿Cómo ordeno una lista alfabéticamente?', 'a' => 'Pega la lista y elige A → Z. El orden ignora las mayúsculas, salvo que actives Distinguir mayúsculas.'],
            ['q' => '¿Cómo mezclo una lista al azar?', 'a' => 'Elige Aleatorio. Cada clic en <strong>Mezclar de nuevo</strong> genera un orden aleatorio nuevo, útil para sorteos, formar equipos o preguntas de un cuestionario.'],
            ['q' => '¿Funciona con palabras con tilde y en otros idiomas?', 'a' => 'Sí. El orden usa una comparación que respeta el idioma, así que las letras con tilde quedan junto a su letra base.'],
            ['q' => '¿Mi lista se sube a internet?', 'a' => 'No. El ordenamiento se hace en tu navegador.'],
        ],
    ],

    'lorem-ipsum-generator' => [
        'slug' => 'generador-lorem-ipsum',
        'name' => 'Generador de Lorem Ipsum',
        'short_description' => 'Genera texto de relleno por párrafos, oraciones o palabras.',
        'description' => 'Crea texto de relleno Lorem Ipsum para maquetas y diseños. Elige párrafos, oraciones o palabras, mantén el inicio clásico y exporta texto plano o HTML.',
        'seo_title' => 'Generador de Lorem Ipsum: texto de relleno',
        'seo_description' => 'Genera texto de relleno Lorem Ipsum en línea. Párrafos, oraciones o palabras, párrafos HTML opcionales y copia con un clic. Gratis para cualquier proyecto.',
        'content' => <<<'HTML'
<h2>¿De dónde viene el Lorem Ipsum?</h2>
<p>El pasaje clásico proviene de "De finibus bonorum et malorum", escrito por Cicerón en el año 45 a. C. Los impresores usan versiones desordenadas de ese texto desde el siglo XVI porque tiene una distribución natural de letras y longitudes de palabra, así que los diseños se ven realistas sin que el contenido distraiga a quien los revisa.</p>
<h2>Consejos para diseñadores y desarrolladores</h2>
<ul>
<li>Usa longitudes realistas: genera la cantidad de palabras que tendrá tu contenido real.</li>
<li>Reemplaza el texto de relleno por el texto real lo antes posible: el contenido da forma al diseño.</li>
<li>Usa la opción HTML para pegar los párrafos directamente en tus prototipos.</li>
</ul>
<p>¿Quieres saber cuánto mide tu texto real? Usa el Contador de palabras.</p>
HTML,
        'steps' => [
            'Elige cuánto texto de relleno necesitas y si lo quieres contar en <strong>párrafos</strong>, <strong>oraciones</strong> o <strong>palabras</strong>.',
            'Deja activado <strong>Empezar con “Lorem ipsum…”</strong> para el inicio clásico, o desactívalo para un texto completamente aleatorio.',
            'Activa <strong>HTML</strong> para envolver cada párrafo en etiquetas <code>&lt;p&gt;</code>, listo para pegar en una página web.',
            'Copia o descarga el texto. Haz clic en <strong>Generar</strong> para obtener una variación nueva.',
        ],
        'faq' => [
            ['q' => '¿Qué es el Lorem Ipsum?', 'a' => 'El Lorem Ipsum es un texto de relleno en latín desordenado, derivado de una obra de Cicerón. Diseñadores y desarrolladores lo usan para llenar diseños y que la atención se centre en el diseño y no en el contenido.'],
            ['q' => '¿Por qué usar texto de relleno en lugar de texto real?', 'a' => 'Muestra cómo fluirá el texto real en un diseño —largo de las líneas, espacio entre párrafos y tipografía— antes de tener el texto final, sin que el significado distraiga.'],
            ['q' => '¿Puedo usar gratis el texto generado?', 'a' => 'Sí. El Lorem Ipsum no tiene derechos de autor y puedes usar el texto generado en cualquier proyecto.'],
            ['q' => '¿Cuánto texto puedo generar?', 'a' => 'Hasta 200 párrafos u oraciones, o 5000 palabras a la vez.'],
        ],
    ],
];
