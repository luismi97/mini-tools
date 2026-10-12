<?php

/*
| Spanish copy for converters, generators, health calculators and everyday
| tools. See content/es/tools.php.
*/

return [
    'json-to-csv' => [
        'slug' => 'json-a-csv',
        'name' => 'JSON a CSV',
        'short_description' => 'Convierte arreglos JSON a CSV para Excel y Google Sheets.',
        'description' => 'Convierte JSON a CSV al instante. Los objetos anidados se aplanan en columnas y puedes elegir coma, punto y coma, tabulación o barra vertical como delimitador.',
        'seo_title' => 'Convertir JSON a CSV gratis para Excel y Sheets',
        'seo_description' => 'Convierte JSON a CSV gratis en línea. Aplana objetos anidados, admite coma, punto y coma y tabulación, y descarga un CSV listo para abrir.',
        'content' => <<<'HTML'
<h2>Abre datos JSON en Excel o Google Sheets</h2>
<p>Las API y las bases de datos exportan JSON, pero las hojas de cálculo trabajan con filas y columnas. Convertir JSON a CSV te permite ordenar, filtrar, graficar y compartir los datos con personas que no trabajan con código.</p>
<h2>Cómo trata tus datos la conversión</h2>
<ul>
<li>Cada objeto del arreglo se convierte en una fila.</li>
<li>Cada clave que aparece en algún objeto se convierte en una columna.</li>
<li>Los objetos anidados se aplanan, por ejemplo <code>address.city</code>.</li>
<li>Los valores que una hoja de cálculo podría interpretar como fórmulas se escapan por seguridad.</li>
</ul>
<p>¿Tu JSON no es válido? Corrígelo primero con el Formateador JSON. ¿Necesitas volver atrás? Usa CSV a JSON.</p>
HTML,
        'steps' => [
            'Pega un arreglo JSON de objetos (o un solo objeto) en la entrada, o haz clic en <strong>Cargar ejemplo</strong>.',
            'Elige el delimitador: coma para la mayoría de las herramientas, punto y coma para Excel en países que usan coma decimal, o tabulación para TSV.',
            'El CSV aparece al instante. Los objetos anidados se convierten en columnas como <code>address.city</code>.',
            'Copia el CSV o descárgalo como archivo <code>.csv</code>, listo para Excel, Google Sheets o Numbers.',
        ],
        'faq' => [
            ['q' => '¿Qué estructura de JSON funciona mejor?', 'a' => 'Un arreglo de objetos, como <code>[{&quot;name&quot;: &quot;Ada&quot;}, {&quot;name&quot;: &quot;Alan&quot;}]</code>. Cada objeto se convierte en una fila y cada clave en una columna. Los objetos con claves distintas se combinan; los valores faltantes quedan vacíos.'],
            ['q' => '¿Cómo se manejan los objetos y arreglos anidados?', 'a' => 'Los objetos anidados se aplanan con notación de puntos (<code>address.city</code>). Los arreglos se escriben en la celda como texto JSON para no perder datos.'],
            ['q' => '¿Por qué usar punto y coma como delimitador?', 'a' => 'En los países donde la coma es el separador decimal (como gran parte de Latinoamérica y España), Excel espera archivos separados por punto y coma. Elige punto y coma si al abrir el archivo las columnas aparecen juntas.'],
            ['q' => '¿Es seguro abrir el CSV en Excel?', 'a' => 'Sí. A los valores que empiezan con <code>=</code>, <code>+</code>, <code>-</code> o <code>@</code> se les antepone un apóstrofo para evitar la inyección de fórmulas.'],
            ['q' => '¿Mis datos se suben a internet?', 'a' => 'No. La conversión se hace por completo en tu navegador.'],
        ],
    ],

    'csv-to-json' => [
        'slug' => 'csv-a-json',
        'name' => 'CSV a JSON',
        'short_description' => 'Convierte CSV o datos de hojas de cálculo en JSON limpio.',
        'description' => 'Pega un CSV o datos copiados de Excel y obtén un arreglo JSON de objetos. Los delimitadores se detectan automáticamente y los números y booleanos se convierten a tipos reales.',
        'seo_title' => 'Convertir CSV a JSON en línea, gratis',
        'seo_description' => 'Convierte CSV a JSON gratis en línea. Detecta delimitadores, maneja campos entre comillas, convierte números y booleanos, y funciona con datos de Excel.',
        'content' => <<<'HTML'
<h2>¿Por qué convertir CSV a JSON?</h2>
<p>JSON es el formato que entienden de forma nativa las aplicaciones web, las API y JavaScript. Convertir una exportación de hoja de cálculo a JSON facilita cargar datos iniciales en una base de datos, simular la respuesta de una API, importar datos a un CMS o cargar configuración en una aplicación.</p>
<h2>Datos limpios, tipos reales</h2>
<p>Con la detección de tipos, los números se convierten en números y <code>true</code>/<code>false</code> en booleanos, mientras que valores como códigos postales con ceros a la izquierda se mantienen como texto. Los campos entre comillas con comas y saltos de línea se interpretan correctamente.</p>
<p>¿Quieres revisar o embellecer el resultado? Pégalo en el Formateador JSON. Para volver a una hoja de cálculo, usa JSON a CSV.</p>
HTML,
        'steps' => [
            'Pega tus datos CSV en la entrada o haz clic en <strong>Cargar ejemplo</strong>. Puedes pegar directamente desde Excel o Google Sheets.',
            'Deja el delimitador en <strong>Automático</strong> o elige coma, punto y coma, tabulación o barra vertical.',
            'Deja activado <strong>La primera fila es encabezado</strong> para obtener un arreglo de objetos, o desactívalo para obtener un arreglo de arreglos.',
            'Con <strong>Detectar tipos</strong>, los números y true/false se convierten en valores JSON reales. Copia o descarga el resultado como <code>.json</code>.',
        ],
        'faq' => [
            ['q' => '¿Puedo pegar datos copiados de Excel o Google Sheets?', 'a' => 'Sí. Los datos de una hoja de cálculo se copian como texto separado por tabulaciones, y el delimitador automático lo detecta.'],
            ['q' => '¿Cómo se manejan las comillas y los saltos de línea dentro de las celdas?', 'a' => 'El intérprete sigue el estándar CSV (RFC 4180): los campos entre comillas dobles pueden contener comas, saltos de línea y comillas escapadas (<code>&quot;&quot;</code>).'],
            ['q' => '¿Por qué algunos números quedan como texto?', 'a' => 'Los valores con ceros a la izquierda, como códigos postales o identificadores como <code>007</code>, se mantienen como texto para no perder información. Los números muy largos también se dejan como texto para evitar errores de precisión.'],
            ['q' => '¿Qué pasa con los nombres de columna repetidos o vacíos?', 'a' => 'Los encabezados repetidos reciben un sufijo (<code>name_2</code>) y los vacíos se llaman <code>column_N</code>, así que se conservan todos los valores.'],
            ['q' => '¿Mis datos son privados?', 'a' => 'Sí. La conversión ocurre en tu navegador y tus datos nunca se suben.'],
        ],
    ],

    'unit-converter' => [
        'slug' => 'convertidor-de-unidades',
        'name' => 'Convertidor de unidades',
        'short_description' => 'Convierte longitud, peso, temperatura, volumen, área, velocidad y más.',
        'description' => 'Convierte al instante entre unidades métricas e imperiales: kilómetros a millas, kilos a libras, Celsius a Fahrenheit, tazas a mililitros, pies cuadrados a metros cuadrados, MB a GB y muchas más.',
        'seo_title' => 'Convertidor de unidades: longitud, peso y más',
        'seo_description' => 'Convertidor de unidades gratis: longitud, peso, temperatura, volumen, área, velocidad, tiempo y datos. Unidades métricas e imperiales, resultados precisos.',
        'content' => <<<'HTML'
<h2>Sistema métrico e imperial</h2>
<p>La mayor parte del mundo usa el sistema métrico (metros, kilos, litros, °C), mientras que Estados Unidos usa principalmente unidades tradicionales (pies, libras, galones, °F) y el Reino Unido mezcla ambos. Las recetas, los viajes, las compras en línea, los planos de construcción y las tareas de ciencias obligan a pasar de un sistema a otro todo el tiempo.</p>
<h2>Valores de referencia útiles</h2>
<ul>
<li>1 pulgada = 2,54 cm · 1 pie = 30,48 cm · 1 milla = 1,609 km</li>
<li>1 kg = 2,2046 lb · 1 onza = 28,35 g</li>
<li>1 taza (EE. UU.) = 236,6 ml · 1 cucharada = 3 cucharaditas</li>
<li>0 °C = 32 °F · 100 °C = 212 °F</li>
<li>1 acre = 43.560 pies² · 1 hectárea = 2,471 acres</li>
</ul>
<p>¿Trabajas con fechas en lugar de medidas? Prueba la Calculadora de fechas. Para dinero, la Calculadora de porcentajes resuelve descuentos y aumentos.</p>
HTML,
        'steps' => [
            'Elige una categoría: longitud, peso, temperatura, volumen, área, velocidad, tiempo o datos.',
            'Ingresa un valor y elige las unidades de <strong>origen</strong> y de <strong>destino</strong>.',
            'El resultado se actualiza al instante. Usa <strong>Intercambiar</strong> para invertir la conversión.',
            'Mira el mismo valor en todas las demás unidades de la categoría en la tabla de abajo.',
        ],
        'faq' => [
            ['q' => '¿Cuántos centímetros tiene una pulgada?', 'a' => 'Exactamente 2,54 centímetros. Un pie mide 30,48 cm y una milla 1,609344 kilómetros: son definiciones internacionales exactas.'],
            ['q' => '¿Cómo convierto Celsius a Fahrenheit?', 'a' => 'Multiplica por 9/5 y suma 32: °F = °C × 9/5 + 32. Por ejemplo, 20 °C son 68 °F. Para volver, resta 32 y multiplica por 5/9.'],
            ['q' => '¿Cuántas libras tiene un kilo?', 'a' => 'Un kilogramo equivale a unas 2,2046 libras, y una libra es exactamente 0,45359237 kilogramos.'],
            ['q' => '¿Las tazas y los galones son de EE. UU. o del Reino Unido?', 'a' => 'Las tazas, onzas líquidas, pintas, cuartos y galones usan las medidas de EE. UU. Los galones del Reino Unido (imperiales) aparecen por separado porque son cerca de un 20 % más grandes.'],
            ['q' => '¿Qué diferencia hay entre MB y MiB?', 'a' => 'Un megabyte (MB) son 1.000.000 de bytes, la medida que usan los fabricantes de almacenamiento. Un mebibyte (MiB) son 1.048.576 bytes (1024²), la que usan muchos sistemas operativos. Por eso un disco de 1 TB muestra unos 931 GiB.'],
        ],
    ],

    'qr-generator' => [
        'slug' => 'generador-de-codigos-qr',
        'name' => 'Generador de códigos QR',
        'short_description' => 'Crea códigos QR para enlaces, texto, correo, teléfono y Wi-Fi.',
        'description' => 'Genera códigos QR personalizados con tus colores, tamaño y margen, y descárgalos en PNG o SVG. Gratis, sin cuenta y sin enviar nada a un servidor.',
        'seo_title' => 'Generador de códigos QR gratis en PNG y SVG',
        'seo_description' => 'Crea códigos QR gratis para URL, texto, correo, teléfono y Wi-Fi. Colores, tamaño y margen personalizados. Descarga en PNG o SVG. Sin registro.',
        'content' => <<<'HTML'
<h2>¿Qué puedes hacer con un código QR?</h2>
<ul>
<li><strong>URL</strong>: enlaza a un sitio web, un menú, un portafolio o una página de reseñas.</li>
<li><strong>Wi-Fi</strong>: deja que tus invitados se conecten a tu red sin escribir la contraseña.</li>
<li><strong>Correo y teléfono</strong>: inicia un correo o una llamada con un solo escaneo.</li>
<li><strong>Texto</strong>: comparte una nota breve, un código de descuento o un número de serie.</li>
</ul>
<h2>Consejos para que tu QR siempre se pueda escanear</h2>
<p>Mantén un buen contraste —un código oscuro sobre un fondo claro— y deja un margen libre a su alrededor. Imprímelo de al menos 2 × 2 cm, y más grande si se va a escanear a distancia, como en un afiche. Usa un nivel de corrección de errores más alto si el código puede rayarse o quedar parcialmente tapado.</p>
<p>Los códigos que creas aquí son estáticos y gratis para siempre: no vencen y no dependen de nuestro sitio para funcionar.</p>
HTML,
        'steps' => [
            'Elige qué contendrá el código QR: una <strong>URL</strong>, <strong>texto</strong>, un <strong>correo</strong>, un número de <strong>teléfono</strong> o los datos de una red <strong>Wi-Fi</strong>.',
            'Completa los datos. La vista previa se actualiza al instante mientras escribes.',
            'Personaliza el tamaño, el margen y los colores. Mantén un color oscuro sobre un fondo claro para que cualquier celular pueda escanearlo.',
            'Descarga tu código QR en <strong>PNG</strong> para documentos y redes sociales, o en <strong>SVG</strong> para imprenta y herramientas de diseño.',
        ],
        'faq' => [
            ['q' => '¿Estos códigos QR vencen?', 'a' => 'No. Los códigos QR son estáticos: el contenido está codificado directamente en la imagen, así que funcionan para siempre y no dependen de nuestro sitio web.'],
            ['q' => '¿Me conviene descargar en PNG o en SVG?', 'a' => 'Usa PNG para sitios web, documentos y redes sociales. Usa SVG para imprenta, carteles y herramientas de diseño: es un formato vectorial que se mantiene perfectamente nítido en cualquier tamaño.'],
            ['q' => '¿Cómo funciona el código QR de Wi-Fi?', 'a' => 'Al escanearlo con la cámara del celular, el código QR de Wi-Fi ofrece conectarse a la red automáticamente sin escribir la contraseña. Funciona con iPhone y Android modernos.'],
            ['q' => '¿Qué es el nivel de corrección de errores?', 'a' => 'La corrección de errores permite que un código QR se siga leyendo aunque una parte esté dañada o tapada. Los niveles más altos (Q, H) son más resistentes, pero el código queda más denso. M es una buena opción predeterminada.'],
            ['q' => '¿Se guardan mis datos?', 'a' => 'No. Los códigos QR se generan en tu navegador. Tus URL, mensajes y contraseñas de Wi-Fi nunca se envían a nuestros servidores.'],
        ],
    ],

    'password-generator' => [
        'slug' => 'generador-de-contrasenas',
        'name' => 'Generador de contraseñas',
        'short_description' => 'Crea contraseñas seguras y aleatorias con la longitud y caracteres que quieras.',
        'description' => 'Genera contraseñas aleatorias seguras eligiendo la longitud, mayúsculas, minúsculas, números y símbolos. Mira su fortaleza en bits y crea hasta 50 contraseñas a la vez.',
        'seo_title' => 'Generador de contraseñas seguras y aleatorias',
        'seo_description' => 'Genera contraseñas seguras y aleatorias. Elige la longitud y los caracteres, excluye los que se parecen y revisa su fortaleza. Se crean en tu navegador.',
        'content' => <<<'HTML'
<h2>¿Qué hace que una contraseña sea segura?</h2>
<p>La fortaleza depende sobre todo de la <strong>longitud</strong> y de lo <strong>aleatoria</strong> que sea. Una contraseña aleatoria de 16 caracteres con letras, números y símbolos tiene más de 100 bits de entropía, muy por encima de lo que un atacante puede adivinar. Las contraseñas inventadas por personas, como nombres, fechas o palabras con un número al final, son predecibles por ingeniosas que parezcan.</p>
<h2>Buenas prácticas</h2>
<ul>
<li>Usa una contraseña distinta para cada cuenta.</li>
<li>Guarda tus contraseñas en un gestor de contraseñas en lugar de repetirlas.</li>
<li>Activa la verificación en dos pasos (2FA) en tu correo, tu banco y tus redes sociales.</li>
<li>Cambia la contraseña de inmediato si un servicio informa una filtración de datos.</li>
</ul>
<p>¿Necesitas identificadores únicos en lugar de secretos? Prueba el Generador de UUID.</p>
HTML,
        'steps' => [
            'Elige la <strong>longitud</strong> de la contraseña. Se recomiendan 16 caracteres o más para las cuentas importantes.',
            'Selecciona qué caracteres incluir: minúsculas, mayúsculas, números y símbolos.',
            'Si vas a escribir la contraseña a mano, puedes excluir caracteres parecidos como <code>l</code>, <code>1</code>, <code>O</code> y <code>0</code>.',
            'Copia tu contraseña con un clic. Haz clic en <strong>Generar</strong> para obtener otra, o crea hasta 50 a la vez.',
        ],
        'faq' => [
            ['q' => '¿Estas contraseñas son seguras?', 'a' => 'Sí. Se generan en tu navegador con la Web Crypto API, un generador de números aleatorios criptográficamente seguro, y nunca se envían ni se guardan en ningún servidor.'],
            ['q' => '¿Qué longitud debe tener una contraseña?', 'a' => 'Usa al menos 12 caracteres, y 16 o más para el correo, el banco y la contraseña maestra de tu gestor. La longitud aporta más seguridad que la complejidad.'],
            ['q' => '¿Qué significa la fortaleza en bits?', 'a' => 'La entropía mide cuántos intentos necesitaría un atacante. Cada bit adicional duplica el trabajo. Más de 60 bits es bueno para la mayoría de las cuentas, y más de 80 bits es fuerte incluso frente a ataques sin conexión.'],
            ['q' => '¿Puedo reutilizar una contraseña segura?', 'a' => 'No. Usa una contraseña única para cada cuenta y guárdalas en un gestor de contraseñas. Si un sitio sufre una filtración, tus otras cuentas siguen a salvo.'],
            ['q' => '¿Se garantiza cada tipo de carácter?', 'a' => 'Sí. Cada contraseña incluye al menos un carácter de cada tipo que selecciones.'],
        ],
    ],

    'uuid-generator' => [
        'slug' => 'generador-de-uuid',
        'name' => 'Generador de UUID',
        'short_description' => 'Genera identificadores UUID v4 aleatorios y v7 ordenados por tiempo, en lote.',
        'description' => 'Genera hasta 1000 UUID (GUID) a la vez en versión 4 o 7, en mayúsculas, sin guiones o entre llaves, y valida UUID existentes.',
        'seo_title' => 'Generador de UUID v4 y v7 (GUID) en lote',
        'seo_description' => 'Genera UUID gratis en línea. UUID v4 y v7 en lote, en mayúsculas, sin guiones o con llaves estilo GUID. Criptográficamente seguros y generados en tu navegador.',
        'content' => <<<'HTML'
<h2>Cuándo usar UUID</h2>
<p>Los UUID son ideales cuando los identificadores deben crearse en muchos lugares sin un contador central: bases de datos distribuidas, aplicaciones que funcionan sin conexión, colas de mensajes, nombres de archivo e identificadores públicos que no deberían revelar cuántos registros existen.</p>
<h2>Versiones de UUID de un vistazo</h2>
<ul>
<li><strong>v4</strong>: 122 bits aleatorios; la más compatible.</li>
<li><strong>v7</strong>: empieza con un timestamp Unix, así que los ID se ordenan por fecha de creación y mantienen eficientes los índices de la base de datos.</li>
<li><strong>v1</strong>: basada en el tiempo y la máquina; en gran parte reemplazada por v7.</li>
</ul>
<p>¿Necesitas secretos aleatorios en lugar de identificadores? Usa el Generador de contraseñas.</p>
HTML,
        'steps' => [
            'Elige cuántos UUID necesitas (hasta 1000 a la vez).',
            'Elige la versión: <strong>v4</strong> (aleatoria, la más común) o <strong>v7</strong> (ordenada por tiempo, ideal para claves de base de datos).',
            'Si quieres, cambia a mayúsculas, quita los guiones o encierra cada UUID entre llaves.',
            'Copia la lista o descárgala como archivo de texto. Haz clic en <strong>Generar</strong> para obtener un lote nuevo.',
        ],
        'faq' => [
            ['q' => '¿Qué es un UUID?', 'a' => 'Un UUID (identificador único universal), también llamado GUID, es un identificador de 128 bits escrito como 32 dígitos hexadecimales, por ejemplo <code>123e4567-e89b-42d3-a456-426614174000</code>. Se pueden generar en cualquier lugar sin coordinación y en la práctica son únicos.'],
            ['q' => '¿Uso UUID v4 o v7?', 'a' => 'v4 es completamente aleatorio y funciona en todas partes. v7 empieza con un timestamp, así que los ID nuevos se ordenan por fecha de creación, lo que hace que los índices de la base de datos sean más rápidos y compactos. Usa v7 para claves primarias cuando tu stack lo admita.'],
            ['q' => '¿Estos UUID son seguros y únicos?', 'a' => 'Se generan con el generador de números aleatorios criptográficamente seguro de tu navegador (Web Crypto API). La probabilidad de una colisión en v4 es astronómicamente baja.'],
            ['q' => '¿Un GUID es lo mismo que un UUID?', 'a' => 'Sí. GUID es el nombre que usa Microsoft para el mismo formato de identificador de 128 bits. Usa las opciones de mayúsculas y llaves para obtener el estilo GUID clásico <code>{XXXXXXXX-...}</code>.'],
        ],
    ],

    'random-number-generator' => [
        'slug' => 'generador-de-numeros-aleatorios',
        'name' => 'Generador de números aleatorios',
        'short_description' => 'Genera números aleatorios en cualquier rango, con o sin repetidos.',
        'description' => 'Genera uno o miles de números realmente aleatorios en cualquier rango, sin repetidos y con opciones de orden. Incluye atajos para tirar dados y sorteos de lotería.',
        'seo_title' => 'Generador de números aleatorios sin repetir',
        'seo_description' => 'Generador de números aleatorios gratis. Elige números en cualquier rango, con o sin repetidos, ordenados o no. Criptográficamente seguro e instantáneo.',
        'content' => <<<'HTML'
<h2>Usos populares</h2>
<ul>
<li><strong>Sorteos y rifas:</strong> saca números de boletos ganadores sin repetir.</li>
<li><strong>Juegos:</strong> tira un dado o elige un número del 1 al 10.</li>
<li><strong>Números de lotería:</strong> genera seis números distintos del 1 al 49.</li>
<li><strong>Docencia e investigación:</strong> selecciona muestras al azar o asigna grupos.</li>
</ul>
<h2>Realmente aleatorio y justo</h2>
<p>Muchos generadores simples usan funciones pseudoaleatorias predecibles. Este usa el generador criptográficamente seguro de tu navegador y evita el sesgo sutil de los métodos ingenuos, así que cada número del rango tiene la misma probabilidad. Para sortear nombres en lugar de números, usa el Selector de nombres al azar. Para contraseñas aleatorias seguras, usa el Generador de contraseñas.</p>
HTML,
        'steps' => [
            'Define el valor <strong>mínimo</strong> y el <strong>máximo</strong> (ambos incluidos), o elige un atajo como tirar un dado o un sorteo de lotería.',
            'Elige cuántos números necesitas: hasta 10.000 a la vez.',
            'Activa <strong>Sin repetidos</strong> para rifas y sorteos, y ordena los resultados si quieres.',
            'Haz clic en <strong>Generar</strong> y copia los números.',
        ],
        'faq' => [
            ['q' => '¿Estos números son realmente aleatorios?', 'a' => 'Se generan con el generador de números aleatorios criptográficamente seguro de tu navegador (Web Crypto API), con un muestreo sin sesgo para que todos los números del rango tengan la misma probabilidad.'],
            ['q' => '¿Puedo usarlo para una rifa o un sorteo?', 'a' => 'Sí. Numera las participaciones, define el rango del 1 a la cantidad de participaciones, activa Sin repetidos y genera tantos ganadores como necesites. Para nombres, usa el Selector de nombres al azar.'],
            ['q' => '¿El mínimo y el máximo están incluidos?', 'a' => 'Sí. Un rango del 1 al 6 puede dar 1, 2, 3, 4, 5 o 6, igual que un dado.'],
            ['q' => '¿Puedo generar números negativos?', 'a' => 'Sí. Usa un mínimo negativo, por ejemplo de −50 a 50.'],
        ],
    ],

    'bmi-calculator' => [
        'slug' => 'calculadora-de-imc',
        'name' => 'Calculadora de IMC',
        'short_description' => 'Calcula tu índice de masa corporal y tu rango de peso saludable.',
        'description' => 'Calcula tu IMC en unidades métricas o de EE. UU., mira en qué categoría está y el rango de peso saludable para tu estatura, según las pautas para adultos de la OMS y los CDC.',
        'seo_title' => 'Calculadora de IMC para adultos',
        'seo_description' => 'Calculadora de IMC gratis para adultos, en kilos o libras. Conoce tu índice de masa corporal, su categoría y el rango de peso saludable para tu estatura.',
        'content' => <<<'HTML'
<h2>Qué significa tu IMC</h2>
<p>El índice de masa corporal compara tu peso con tu estatura para obtener un solo número que los organismos de salud usan para clasificar el peso. En la mayoría de los adultos, un IMC entre 18,5 y 24,9 se asocia con los menores riesgos para la salud, mientras que los valores más altos se relacionan con un mayor riesgo de enfermedades como la diabetes tipo 2 y las enfermedades cardíacas.</p>
<h2>Limitaciones del IMC</h2>
<ul>
<li>No distingue músculo de grasa, así que las personas musculosas pueden aparecer con sobrepeso.</li>
<li>No muestra dónde se acumula la grasa; la medida de la cintura es otro dato útil.</li>
<li>Los rangos saludables pueden variar según la edad, el sexo y el origen étnico.</li>
</ul>
<p>Para convertir tu objetivo en un plan diario, estima tus necesidades de energía con la Calculadora de calorías.</p>
HTML,
        'steps' => [
            'Elige <strong>Métrico</strong> (kilos y centímetros) o <strong>Unidades de EE. UU.</strong> (libras, pies y pulgadas).',
            'Ingresa tu peso y tu estatura. El resultado se actualiza mientras escribes.',
            'Mira tu IMC, su categoría y dónde se ubica en la escala.',
            'Revisa el rango de peso saludable para tu estatura.',
        ],
        'faq' => [
            ['q' => '¿Cómo se calcula el IMC?', 'a' => 'El índice de masa corporal es tu peso en kilos dividido por tu estatura en metros al cuadrado (kg/m²). En unidades de EE. UU. equivale a 703 × libras ÷ pulgadas².'],
            ['q' => '¿Cuáles son las categorías de IMC para adultos?', 'a' => 'Menos de 18,5 es bajo peso, 18,5–24,9 es peso saludable, 25–29,9 es sobrepeso y 30 o más es obesidad, según la Organización Mundial de la Salud y los CDC.'],
            ['q' => '¿El IMC es preciso?', 'a' => 'El IMC es una herramienta de detección rápida, no un diagnóstico. No distingue músculo de grasa, así que los deportistas pueden obtener valores altos, y no considera la edad, el sexo, el origen étnico ni la distribución de la grasa. Consulta tu salud con un profesional.'],
            ['q' => '¿Los niños pueden usar esta calculadora de IMC?', 'a' => 'No. En niños y adolescentes, el IMC debe compararse con percentiles según la edad y el sexo. Esta calculadora es para adultos de 20 años o más.'],
            ['q' => '¿Se guardan mis datos?', 'a' => 'No. El cálculo se hace en tu navegador y no se envía nada a nuestros servidores.'],
        ],
    ],

    'calorie-calculator' => [
        'slug' => 'calculadora-de-calorias',
        'name' => 'Calculadora de calorías',
        'short_description' => 'Estima las calorías diarias para bajar, mantener o subir de peso.',
        'description' => 'Calcula tu tasa metabólica basal y tu gasto energético total diario con la ecuación de Mifflin-St Jeor, además de las calorías diarias para bajar, mantener o subir de peso.',
        'seo_title' => 'Calculadora de calorías diarias y gasto energético',
        'seo_description' => 'Calculadora de calorías gratis. Conoce tu TMB y tu gasto energético diario con Mifflin-St Jeor, y las calorías para bajar, mantener o subir de peso.',
        'content' => <<<'HTML'
<h2>¿Cuántas calorías necesitas?</h2>
<p>Tus necesidades diarias de calorías dependen de tu tamaño, tu edad, tu sexo y tu nivel de actividad. La calculadora primero estima tu tasa metabólica basal —la energía que tu cuerpo necesita en reposo— y después la multiplica por un factor de actividad para estimar tu gasto energético total diario (GET). Comer alrededor de tu GET mantiene tu peso estable.</p>
<h2>Cómo aprovechar los números</h2>
<ul>
<li>Elige tu nivel de actividad con honestidad: la mayoría de la gente lo sobrestima.</li>
<li>Apunta a cambios graduales: entre 0,25 y 0,5 kg por semana.</li>
<li>Prioriza las proteínas, las verduras y los alimentos integrales para sentirte satisfecho con menos calorías.</li>
<li>Vuelve a calcular cada vez que tu peso cambie entre 2 y 5 kg.</li>
</ul>
<p>Mira dónde estás hoy con la Calculadora de IMC.</p>
HTML,
        'steps' => [
            'Elige tu sexo e ingresa tu edad.',
            'Ingresa tu peso y tu estatura en unidades métricas o de EE. UU.',
            'Elige el nivel de actividad que mejor describe una semana típica.',
            'Mira las calorías que quemas por día (GET) y las metas diarias para bajar, mantener o subir de peso.',
        ],
        'faq' => [
            ['q' => '¿Cómo se calculan las calorías diarias?', 'a' => 'La calculadora estima tu tasa metabólica basal con la ecuación de Mifflin-St Jeor —considerada una de las más precisas para la mayoría de los adultos— y la multiplica por un factor de actividad para obtener tu gasto energético total diario (GET).'],
            ['q' => '¿Qué diferencia hay entre TMB y GET?', 'a' => 'La TMB es la energía que usa tu cuerpo en reposo absoluto. El GET suma todo lo demás: el movimiento diario, el ejercicio y la digestión. El GET es lo que debes comer para mantener tu peso.'],
            ['q' => '¿Cuántas calorías debo comer para bajar de peso?', 'a' => 'Un déficit de unas 500 calorías por día lleva a bajar aproximadamente 0,5 kg por semana. La mayoría de los adultos no debería bajar de unas 1200 (mujeres) o 1500 (hombres) calorías diarias sin supervisión médica.'],
            ['q' => '¿Por qué mi resultado es distinto al de mi reloj deportivo?', 'a' => 'Todas las cifras de calorías son estimaciones. Los relojes y las fórmulas usan supuestos distintos. Usa el resultado como punto de partida y ajústalo según cómo cambie tu peso en 2 o 3 semanas.'],
            ['q' => '¿Esto es consejo médico?', 'a' => 'No. En caso de embarazo, enfermedades o metas deportivas, consulta a un médico o a un nutricionista.'],
        ],
    ],

    'due-date-calculator' => [
        'slug' => 'calculadora-fecha-de-parto',
        'name' => 'Calculadora de fecha de parto',
        'short_description' => 'Estima tu fecha de parto, la semana de embarazo y el trimestre.',
        'description' => 'Ingresa el primer día de tu última menstruación y la duración de tu ciclo para estimar la fecha de parto, la fecha de concepción, cuántas semanas de embarazo tienes y los hitos principales.',
        'seo_title' => 'Calculadora de fecha de parto y semanas de embarazo',
        'seo_description' => 'Calculadora de fecha de parto gratis. Estima la fecha de parto, la concepción, la semana de embarazo y el trimestre a partir de tu última menstruación.',
        'content' => <<<'HTML'
<h2>Cómo se calcula el tiempo de embarazo</h2>
<p>Un embarazo típico dura unas 40 semanas (280 días) contadas desde el primer día de la última menstruación, no desde la concepción. Si tu ciclo es más largo o más corto que 28 días, la ovulación suele ocurrir más tarde o más temprano, así que la calculadora ajusta la fecha de parto según esa diferencia.</p>
<h2>Hitos principales</h2>
<ul>
<li><strong>Semanas 1–12:</strong> primer trimestre; aquí suelen hacerse el primer control prenatal y la primera ecografía.</li>
<li><strong>Semanas 18–22:</strong> la ecografía morfológica detallada.</li>
<li><strong>Semanas 27–40:</strong> tercer trimestre, con controles más frecuentes.</li>
<li><strong>Semanas 39–40:</strong> se considera embarazo a término.</li>
</ul>
<p>¿Quieres llevar la cuenta regresiva? La Calculadora de fechas muestra la cantidad exacta de días entre hoy y tu fecha de parto.</p>
HTML,
        'steps' => [
            'Ingresa el <strong>primer día de tu última menstruación</strong> (FUM).',
            'Ajusta la <strong>duración promedio de tu ciclo</strong> si no es de 28 días.',
            'Mira tu fecha probable de parto, cuántas semanas de embarazo tienes y en qué trimestre estás.',
            'Revisa los hitos principales del embarazo.',
        ],
        'faq' => [
            ['q' => '¿Cómo se calcula la fecha de parto?', 'a' => 'La calculadora usa la regla de Naegele: 280 días (40 semanas) después del primer día de la última menstruación, ajustados para ciclos más largos o más cortos que 28 días.'],
            ['q' => '¿Qué tan precisa es la fecha de parto?', 'a' => 'Es una estimación. Solo alrededor del 4 % de los bebés nace en su fecha exacta; la mayoría llega entre las semanas 37 y 42. Una ecografía temprana da la fecha más precisa, y tu profesional de salud puede ajustarla.'],
            ['q' => '¿Por qué las semanas se cuentan desde mi última menstruación?', 'a' => 'El embarazo se cuenta desde el primer día de la última menstruación porque rara vez se conocen con exactitud las fechas de ovulación y concepción. Por eso, en el momento de la concepción ya se consideran unas 2 semanas de embarazo.'],
            ['q' => '¿Cuáles son los trimestres?', 'a' => 'El primer trimestre va hasta el final de la semana 12, el segundo de la semana 13 a la 26, y el tercero desde la semana 27 hasta el nacimiento.'],
            ['q' => '¿Esto es consejo médico?', 'a' => 'No. Esta herramienta es solo informativa. Sigue siempre las indicaciones de tu médico o tu matrona.'],
        ],
    ],

    'online-timer' => [
        'slug' => 'temporizador-online',
        'name' => 'Temporizador y cronómetro en línea',
        'short_description' => 'Temporizador con cuenta regresiva, cronómetro con vueltas y Pomodoro.',
        'description' => 'Un temporizador en línea gratis con alarma, un cronómetro con tiempos por vuelta y un temporizador Pomodoro para concentrarte. Preciso en pestañas en segundo plano, con el tiempo visible en el título de la pestaña.',
        'seo_title' => 'Temporizador y cronómetro online con alarma',
        'seo_description' => 'Temporizador online gratis con alarma, cronómetro con vueltas y temporizador Pomodoro. Preciso en pestañas en segundo plano. Sin app y sin registro.',
        'content' => <<<'HTML'
<h2>Tres herramientas en una</h2>
<p>Usa el <strong>temporizador</strong> para cocinar, entrenar, presentaciones, exámenes y siestas; el <strong>cronómetro</strong> con vueltas para correr, nadar o medir tareas; y el <strong>temporizador Pomodoro</strong> para estudiar o trabajar en bloques de 25 minutos de concentración con descansos regulares. El tiempo se muestra en la pestaña del navegador, así que puedes seguir trabajando en otra pestaña y ver cuánto falta.</p>
<h2>Consejos para trabajar concentrado</h2>
<ul>
<li>Elige una sola tarea por Pomodoro y silencia las notificaciones.</li>
<li>Usa los descansos para pararte, estirarte y descansar la vista.</li>
<li>Anota cuántas rondas te lleva cada tarea para planificar mejor la próxima vez.</li>
</ul>
<p>¿Necesitas contar días en lugar de minutos? Usa la Calculadora de fechas.</p>
HTML,
        'steps' => [
            'Elige <strong>Temporizador</strong> para una cuenta regresiva, <strong>Cronómetro</strong> para medir tiempo con vueltas o <strong>Pomodoro</strong> para sesiones de concentración.',
            'En el temporizador, elige un atajo (de 1 a 60 minutos) o escribe horas, minutos y segundos.',
            'Presiona <strong>Iniciar</strong>. El tiempo restante también aparece en el título de la pestaña, así que puedes cambiar de pestaña.',
            'Cuando se acaba el tiempo suena una alarma. Desactiva el sonido si prefieres un temporizador silencioso.',
        ],
        'faq' => [
            ['q' => '¿El temporizador sigue funcionando si cambio de pestaña?', 'a' => 'Sí. El temporizador se basa en el reloj y no en contar pulsos, así que se mantiene preciso en pestañas en segundo plano, y el tiempo restante se muestra en el título de la pestaña.'],
            ['q' => '¿Por qué no escuché la alarma?', 'a' => 'Comprueba que la opción de sonido esté activada y que tu dispositivo no esté en silencio. Algunos navegadores bloquean el sonido hasta que interactúas con la página; presionar Iniciar cuenta como interacción.'],
            ['q' => '¿Qué es la técnica Pomodoro?', 'a' => 'Es un método de gestión del tiempo: trabajas con total concentración durante 25 minutos y después tomas un descanso de 5 minutos. Tras cuatro rondas, tomas un descanso más largo de 15 a 30 minutos. El temporizador cambia de fase automáticamente.'],
            ['q' => '¿Qué tan preciso es el cronómetro?', 'a' => 'Muestra centésimas de segundo y usa el reloj de tu dispositivo, que tiene una precisión de pocos milisegundos. Usa Vuelta para registrar tiempos parciales.'],
            ['q' => '¿Funciona sin conexión?', 'a' => 'Una vez cargada la página, el temporizador, el cronómetro y el Pomodoro funcionan en tu navegador sin conexión a internet.'],
        ],
    ],

    'random-name-picker' => [
        'slug' => 'sorteo-de-nombres',
        'name' => 'Selector de nombres al azar',
        'short_description' => 'Elige ganadores al azar de una lista o divide a las personas en equipos.',
        'description' => 'Pega una lista de nombres para sortear uno o más ganadores de forma justa, quitándolos para la siguiente ronda si quieres, o divide a todos en equipos al azar.',
        'seo_title' => 'Sorteo de nombres al azar: ganadores y equipos',
        'seo_description' => 'Selector de nombres al azar gratis. Sortea ganadores de una lista para rifas y clases, o divide los nombres en equipos aleatorios. Sin registro.',
        'content' => <<<'HTML'
<h2>Ideal para clases, equipos y sorteos</h2>
<p>Los docentes usan los sorteos de nombres para elegir alumnos de forma justa, los equipos de trabajo para decidir quién presenta primero y los creadores de contenido para elegir a los ganadores de un sorteo frente a su audiencia. Como el sorteo es aleatorio y transparente, nadie puede decir que estuvo arreglado.</p>
<h2>Consejos</h2>
<ul>
<li>Activa <strong>Quitar los nombres elegidos</strong> para que todos tengan su turno antes de que alguien salga dos veces.</li>
<li>Usa <strong>Formar equipos</strong> para trabajos en grupo, deportes y juegos.</li>
<li>Limpia tu lista primero con Eliminar líneas duplicadas si copiaste los nombres de varios lugares.</li>
</ul>
<p>¿Vas a sortear boletos numerados? Usa el Generador de números aleatorios.</p>
HTML,
        'steps' => [
            'Pega o escribe los nombres, uno por línea. Puedes pegar una columna directamente desde una hoja de cálculo.',
            'Elige <strong>Elegir ganadores</strong> para sortear uno o más nombres, o <strong>Formar equipos</strong> para dividir a todos en grupos al azar.',
            'Si quieres, quita de la lista los nombres elegidos para que el próximo sorteo solo incluya al resto.',
            'Haz clic en el botón y copia el resultado para compartirlo.',
        ],
        'faq' => [
            ['q' => '¿El sorteo de nombres es justo?', 'a' => 'Sí. Los ganadores se eligen con un generador aleatorio criptográficamente seguro, así que cada nombre tiene exactamente la misma probabilidad. La animación es solo por diversión: no influye en el resultado.'],
            ['q' => '¿Puedo elegir varios ganadores a la vez?', 'a' => 'Sí. Indica cuántos ganadores necesitas; un mismo nombre nunca sale dos veces en un sorteo.'],
            ['q' => '¿Cómo se forman los equipos?', 'a' => 'Todos se mezclan al azar y se reparten en la cantidad de equipos que elijas, así que los equipos difieren como máximo en una persona.'],
            ['q' => '¿Qué pasa si un nombre aparece dos veces?', 'a' => 'Cada línea cuenta como una participación, así que un nombre que aparece dos veces tiene el doble de probabilidades. Si no quieres eso, usa primero Eliminar líneas duplicadas.'],
            ['q' => '¿Se guardan los nombres?', 'a' => 'No. La lista se queda en tu navegador y nunca se sube.'],
        ],
    ],
];
