<?php

/*
| Spanish copy for the developer tools. See content/es/tools.php.
*/

return [
    'json-formatter' => [
        'slug' => 'formateador-json',
        'name' => 'Formateador JSON',
        'short_description' => 'Formatea, valida y minifica JSON directamente en tu navegador.',
        'description' => 'Pega tu JSON para embellecerlo con una sangría limpia, minificarlo para producción o validarlo y encontrar la línea exacta de cualquier error de sintaxis. Tus datos nunca salen de tu navegador.',
        'seo_title' => 'Formateador y validador JSON en línea',
        'seo_description' => 'Formateador y validador JSON gratis en línea. Embellece, minifica y valida JSON al instante en tu navegador, sin subir datos y sin registro.',
        'content' => <<<'HTML'
<h2>¿Por qué formatear JSON?</h2>
<p>Las API y los archivos de log suelen devolver JSON en una sola línea larguísima que es casi imposible de leer. Formatearlo agrega sangría y saltos de línea coherentes para que veas la estructura, detectes campos faltantes y depures más rápido. Minificarlo hace lo contrario: elimina todos los espacios innecesarios para que las respuestas y los archivos de configuración ocupen lo mínimo.</p>
<h2>Errores comunes de JSON que detecta este validador</h2>
<ul>
<li>Comas finales después del último elemento de un objeto o arreglo.</li>
<li>Comillas simples en lugar de dobles en textos y claves.</li>
<li>Nombres de propiedades sin comillas y comentarios, que JSON no permite.</li>
<li>Comas, corchetes o llaves faltantes.</li>
</ul>
<p>Cada error se informa con su línea y columna exactas. ¿Necesitas los datos en una hoja de cálculo? Usa JSON a CSV, o haz el camino inverso con CSV a JSON.</p>
HTML,
        'steps' => [
            'Pega o escribe tu JSON en el cuadro de <strong>Entrada</strong>, o haz clic en <strong>Cargar ejemplo</strong> para probar.',
            'Haz clic en <strong>Formatear</strong> para embellecerlo o en <strong>Minificar</strong> para quitar todos los espacios. Elige 2 espacios, 4 espacios o tabulaciones y, si quieres, ordena las claves alfabéticamente.',
            'Si tu JSON no es válido, el mensaje de error muestra la línea y la columna exactas, y el cursor salta al problema.',
            'Copia el resultado o descárgalo como archivo. También puedes convertir el JSON a <strong>CSV</strong> o a interfaces de <strong>TypeScript</strong>.',
        ],
        'faq' => [
            ['q' => '¿Mi JSON se envía a un servidor?', 'a' => 'No. El formateo, la validación y la conversión ocurren por completo en tu navegador con JavaScript. Tus datos nunca salen de tu dispositivo, así que es seguro usarlo con información privada o sensible.'],
            ['q' => '¿Qué diferencia hay entre formatear y minificar JSON?', 'a' => 'Formatear (también llamado embellecer) agrega sangría y saltos de línea para que el JSON sea fácil de leer. Minificar quita todos los espacios innecesarios para que ocupe lo mínimo en producción o al enviarlo por la red.'],
            ['q' => '¿Por qué mi JSON no es válido?', 'a' => 'Las causas más comunes son comas finales, comillas simples en lugar de dobles, nombres de propiedades sin comillas, comentarios y comas faltantes entre elementos. JSON es más estricto que la sintaxis de objetos de JavaScript. El validador muestra la línea y la columna del primer error que encuentra.'],
            ['q' => '¿Cómo funciona la conversión de JSON a CSV?', 'a' => 'Un arreglo de objetos se convierte en una fila por objeto, con una columna por cada clave. Los objetos anidados se aplanan con notación de puntos (por ejemplo <code>owner.name</code>) y los arreglos anidados se guardan como texto JSON dentro de la celda.'],
            ['q' => '¿Hay un límite de tamaño?', 'a' => 'No hay un límite fijo, pero como todo funciona en tu navegador, los archivos muy grandes (decenas de megabytes) pueden ir lentos según tu dispositivo.'],
        ],
    ],

    'base64-encoder' => [
        'slug' => 'codificar-decodificar-base64',
        'name' => 'Codificador y decodificador Base64',
        'short_description' => 'Codifica y decodifica texto y archivos en Base64, con soporte para URL.',
        'description' => 'Convierte texto a Base64 y viceversa con soporte completo de UTF-8, cambia a Base64 seguro para URL o convierte cualquier archivo en una cadena Base64 o un data URI.',
        'seo_title' => 'Codificar y decodificar Base64: texto y archivos',
        'seo_description' => 'Codificador y decodificador Base64 gratis en línea. Soporta UTF-8 y emoji, Base64 seguro para URL y archivos a data URI. Funciona en tu navegador.',
        'content' => <<<'HTML'
<h2>¿Para qué se usa Base64?</h2>
<ul>
<li>Incrustar imágenes pequeñas en HTML o CSS como data URI.</li>
<li>Enviar adjuntos binarios por correo electrónico (MIME).</li>
<li>Guardar datos binarios en JSON, XML o variables de entorno.</li>
<li>Encabezados de autenticación HTTP Basic y JSON Web Tokens.</li>
</ul>
<h2>Base64 no es cifrado</h2>
<p>Base64 solo cambia la forma de representar los datos: cualquiera puede decodificarlo al instante. Nunca lo uses para ocultar contraseñas o secretos. Para crear secretos seguros, usa el Generador de contraseñas; para inspeccionar tokens que usan Base64URL, usa el Decodificador JWT.</p>
HTML,
        'steps' => [
            'Elige <strong>Codificar</strong> para convertir texto a Base64, o <strong>Decodificar</strong> para volver de Base64 a texto legible.',
            'Pega tu texto o tu cadena Base64. El resultado aparece al instante mientras escribes.',
            'Activa <strong>Seguro para URL</strong> para usar <code>-</code> y <code>_</code> en lugar de <code>+</code> y <code>/</code> (como en los JWT y las URL).',
            'Para codificar una imagen o cualquier archivo, usa <strong>Codificar un archivo</strong> más abajo y copia la cadena Base64 o el data URI completo.',
        ],
        'faq' => [
            ['q' => '¿Qué es Base64?', 'a' => 'Base64 es una codificación que representa datos binarios con 64 caracteres ASCII imprimibles. Se usa para incrustar imágenes en HTML y CSS, enviar adjuntos por correo y transportar datos en JSON o URL. Es una codificación, no un cifrado: cualquiera puede decodificarla.'],
            ['q' => '¿Admite emoji y caracteres con tilde?', 'a' => 'Sí. El texto se convierte a UTF-8 antes de codificarlo, así que los emoji, las tildes, la ñ y los alfabetos no latinos se codifican y decodifican correctamente.'],
            ['q' => '¿Qué es Base64 seguro para URL?', 'a' => 'Base64 seguro para URL (Base64URL) reemplaza <code>+</code> por <code>-</code> y <code>/</code> por <code>_</code>, y quita el relleno <code>=</code>, para que el resultado se pueda usar en URL y nombres de archivo. El decodificador acepta ambas variantes automáticamente.'],
            ['q' => '¿Por qué Base64 hace que los datos ocupen más?', 'a' => 'Cada 3 bytes de entrada se convierten en 4 caracteres Base64, así que los datos codificados ocupan alrededor de un 33 % más que el original.'],
            ['q' => '¿Mis datos se suben a internet?', 'a' => 'No. La codificación y la decodificación ocurren en tu navegador. Tus textos y archivos nunca salen de tu dispositivo.'],
        ],
    ],

    'url-encoder' => [
        'slug' => 'codificar-decodificar-url',
        'name' => 'Codificador y decodificador de URL',
        'short_description' => 'Codifica o decodifica URL y parámetros con codificación porcentual.',
        'description' => 'Codifica texto para usarlo de forma segura en URL o decodifica cadenas con codificación porcentual a texto legible, e inspecciona cada parte y cada parámetro de una URL.',
        'seo_title' => 'Codificar y decodificar URL en línea',
        'seo_description' => 'Codificador y decodificador de URL gratis. Codifica valores de consulta o URL completas, decodifica secuencias %20 y desglosa los parámetros al instante.',
        'content' => <<<'HTML'
<h2>Por qué las URL necesitan codificación</h2>
<p>Las URL solo pueden contener un conjunto limitado de caracteres. Los espacios, las tildes, los emoji y símbolos como <code>&amp;</code>, <code>?</code> y <code>#</code> deben codificarse con porcentaje para que los navegadores y servidores los interpreten bien. Olvidar codificar un valor de consulta es una causa habitual de enlaces rotos y parámetros perdidos.</p>
<h2>Codificaciones comunes</h2>
<ul>
<li>Espacio → <code>%20</code> (o <code>+</code> en datos de formulario)</li>
<li><code>&amp;</code> → <code>%26</code></li>
<li><code>/</code> → <code>%2F</code></li>
<li><code>ñ</code> → <code>%C3%B1</code></li>
</ul>
<h2>Codificación para desarrolladores</h2>
<p>En JavaScript, usa <code>encodeURIComponent()</code> para valores de consulta individuales y <code>encodeURI()</code> para URL completas. En PHP, los equivalentes son <code>rawurlencode()</code> y <code>urlencode()</code>, que codifica los espacios como signos más. Codificar un valor dos veces es un error frecuente que produce secuencias como <code>%2520</code>.</p>
<p>¿Trabajas con tokens o datos binarios? El Codificador y decodificador Base64 y el Decodificador JWT te pueden ayudar.</p>
HTML,
        'steps' => [
            'Elige <strong>Codificar</strong> para aplicar codificación porcentual, o <strong>Decodificar</strong> para convertir secuencias como <code>%20</code> en texto legible.',
            'Pega tu texto o tu URL. El resultado se actualiza mientras escribes.',
            'Usa <strong>Componente</strong> para valores de consulta y segmentos de ruta, o <strong>URL completa</strong> para conservar caracteres como <code>/</code>, <code>?</code> y <code>&amp;</code>.',
            'Cuando la entrada es una URL completa, sus partes y parámetros se muestran en una tabla debajo.',
        ],
        'faq' => [
            ['q' => '¿Qué es la codificación de URL?', 'a' => 'La codificación de URL (codificación porcentual) reemplaza los caracteres no permitidos en una URL por un <code>%</code> seguido de dos dígitos hexadecimales. Por ejemplo, un espacio se convierte en <code>%20</code> y la <code>ñ</code> en <code>%C3%B1</code>.'],
            ['q' => '¿Qué diferencia hay entre Componente y URL completa?', 'a' => 'El modo Componente (<code>encodeURIComponent</code>) codifica todos los caracteres reservados, que es lo que necesitas para un único valor de consulta. El modo URL completa (<code>encodeURI</code>) deja intactos los caracteres que estructuran una URL, como <code>:</code>, <code>/</code>, <code>?</code>, <code>&amp;</code> e <code>=</code>.'],
            ['q' => '¿Por qué algunas URL usan + para los espacios?', 'a' => 'Los formularios HTML codifican los espacios como <code>+</code> en las cadenas de consulta. Deja activado <strong>Tratar + como espacio</strong> al decodificar datos de formulario o cadenas de consulta.'],
            ['q' => '¿Mis datos se envían a algún lado?', 'a' => 'No. Todo se procesa en tu navegador.'],
        ],
    ],

    'jwt-decoder' => [
        'slug' => 'decodificador-jwt',
        'name' => 'Decodificador JWT',
        'short_description' => 'Decodifica JSON Web Tokens e inspecciona sus claims y vencimiento.',
        'description' => 'Pega un JWT para decodificar su header y su payload, ver exp, iat y nbf como fechas legibles y comprobar si el token venció. La decodificación ocurre en tu equipo.',
        'seo_title' => 'Decodificador JWT: decodifica JSON Web Tokens',
        'seo_description' => 'Decodifica tokens JWT gratis. Mira el header, el payload, las fechas de vencimiento y el estado del token. Privado: el token no sale de tu navegador.',
        'content' => <<<'HTML'
<h2>Cómo funcionan los JWT</h2>
<p>Un JSON Web Token transporta datos (claims) sobre un usuario o una sesión, como un ID, sus roles y una fecha de vencimiento. El header y el payload son JSON codificado en Base64URL, y la firma permite al servidor comprobar que nadie los modificó. Como el payload solo está codificado, cualquiera que tenga el token puede leerlo: nunca pongas secretos dentro de un JWT.</p>
<h2>Revisiones habituales al depurar</h2>
<ul>
<li>¿El token venció (<code>exp</code> en el pasado)?</li>
<li>¿Una diferencia de reloj está causando problemas con <code>nbf</code>?</li>
<li>¿El <code>aud</code> o el <code>iss</code> coinciden con lo que espera tu API?</li>
<li>¿El algoritmo (<code>alg</code>) es el que tiene configurado tu servidor?</li>
</ul>
<p>Para decodificar otras cadenas Base64, usa el Codificador y decodificador Base64.</p>
HTML,
        'steps' => [
            'Pega un JSON Web Token (JWT) en el cuadro. El prefijo <code>Bearer</code> se quita automáticamente.',
            'El header y el payload se decodifican al instante y se muestran como JSON formateado.',
            'Revisa los claims <strong>exp</strong>, <strong>iat</strong> y <strong>nbf</strong> convertidos a fechas legibles, y si el token está vencido.',
            'Copia el header o el payload decodificado con un clic.',
        ],
        'faq' => [
            ['q' => '¿Es seguro pegar mi JWT aquí?', 'a' => 'Sí. El token se decodifica por completo en tu navegador y nunca se envía a un servidor. Aun así, trata los tokens de producción como contraseñas y evita compartirlos.'],
            ['q' => '¿Esta herramienta verifica la firma?', 'a' => 'No. Solo decodifica el header y el payload, que son JSON codificado en Base64URL. Verificar la firma requiere el secreto o la clave pública y debe hacerlo tu servidor.'],
            ['q' => '¿Qué son exp, iat y nbf?', 'a' => '<code>exp</code> es la fecha de vencimiento, <code>iat</code> es cuándo se emitió el token y <code>nbf</code> es el momento antes del cual no debe aceptarse. Todos son timestamps Unix en segundos.'],
            ['q' => '¿Cuáles son las tres partes de un JWT?', 'a' => 'Un JWT tiene un header (algoritmo y tipo de token), un payload (los claims) y una firma, separados por puntos: <code>header.payload.signature</code>.'],
        ],
    ],

    'hash-generator' => [
        'slug' => 'generador-de-hash',
        'name' => 'Generador de hash',
        'short_description' => 'Genera hashes MD5, SHA-1, SHA-256 y SHA-512 de textos o archivos.',
        'description' => 'Calcula a la vez los hashes MD5, SHA-1, SHA-256, SHA-384 y SHA-512 de cualquier texto o archivo, y verifica descargas comparando checksums. Funciona en tu navegador.',
        'seo_title' => 'Generador de hash MD5, SHA-256 y SHA-512',
        'seo_description' => 'Genera hashes MD5, SHA-1, SHA-256 y SHA-512 de textos o archivos y verifica checksums. Los archivos se procesan en tu navegador, nunca se suben.',
        'content' => <<<'HTML'
<h2>Usos comunes de los hashes</h2>
<ul>
<li><strong>Verificar descargas:</strong> compara el checksum SHA-256 que publica el proveedor de un software con el archivo que descargaste.</li>
<li><strong>Detectar cambios:</strong> un mismo archivo siempre tiene el mismo hash, así que hashes distintos significan contenido distinto.</li>
<li><strong>Desarrollo:</strong> genera claves de caché, ETags e identificadores de contenido.</li>
<li><strong>Deduplicación:</strong> encuentra archivos idénticos comparando sus hashes.</li>
</ul>
<h2>¿Qué algoritmo debo usar?</h2>
<p>Usa SHA-256 para casi todo: es rápido, ampliamente compatible y seguro. SHA-512 da un resumen aún más largo. MD5 y SHA-1 sirven para comprobaciones rápidas de integridad, pero no deben usarse con fines de seguridad. Para codificar datos en lugar de obtener su huella, usa el Codificador y decodificador Base64.</p>
HTML,
        'steps' => [
            'Escribe o pega un texto, o elige <strong>Calcular hash de un archivo</strong> para obtener el checksum de cualquier archivo.',
            'Los hashes MD5, SHA-1, SHA-256, SHA-384 y SHA-512 se calculan al mismo tiempo.',
            'Copia el hash que necesites, en minúsculas o mayúsculas.',
            'Para verificar una descarga, pega el checksum esperado en <strong>Comparar</strong>: si coincide, se marca en verde.',
        ],
        'faq' => [
            ['q' => '¿Qué es un hash?', 'a' => 'Una función hash convierte cualquier entrada en una huella de longitud fija. La misma entrada siempre da el mismo hash, y cambiar un solo carácter lo cambia por completo. Los hashes se usan para verificar descargas, detectar cambios e indexar datos.'],
            ['q' => '¿Cómo verifico el checksum de un archivo?', 'a' => 'Calcula el hash del archivo descargado y pega en Comparar el checksum que publica el proveedor (normalmente SHA-256). Si coinciden, el archivo está completo y no fue alterado.'],
            ['q' => '¿MD5 o SHA-1 son seguros?', 'a' => 'Ya no para seguridad. Ambos tienen ataques de colisión conocidos, así que usa SHA-256 o SHA-512 para todo lo relacionado con seguridad. MD5 sigue sirviendo para comprobaciones rápidas sin fines de seguridad.'],
            ['q' => '¿Debo guardar contraseñas con SHA-256?', 'a' => 'No. Las contraseñas deben guardarse con algoritmos lentos y con sal, como bcrypt, scrypt o Argon2. Los hashes rápidos como SHA-256 se pueden atacar por fuerza bruta con facilidad.'],
            ['q' => '¿Mis textos y archivos se suben a internet?', 'a' => 'No. Los hashes se calculan en tu navegador con la Web Crypto API. Los archivos de cualquier tipo, de hasta 200 MB, se quedan en tu dispositivo.'],
        ],
    ],

    'timestamp-converter' => [
        'slug' => 'convertidor-timestamp-unix',
        'name' => 'Convertidor de timestamp Unix',
        'short_description' => 'Convierte timestamps Unix a fechas y fechas a timestamps.',
        'description' => 'Convierte timestamps epoch en segundos o milisegundos a hora local, UTC e ISO 8601, y convierte cualquier fecha en un timestamp Unix. Muestra el timestamp actual en vivo.',
        'seo_title' => 'Convertidor de timestamp Unix a fecha y viceversa',
        'seo_description' => 'Convierte timestamps Unix a fechas legibles y viceversa. Segundos o milisegundos, hora local, UTC e ISO 8601, con el tiempo epoch actual.',
        'content' => <<<'HTML'
<h2>Por qué los desarrolladores usan el tiempo Unix</h2>
<p>Un timestamp Unix representa un instante con un solo número que es igual en todo el mundo, lo que lo hace ideal para bases de datos, API, logs, el vencimiento de los JWT y los encabezados de caché. Convertirlos en fechas legibles es una tarea diaria al depurar.</p>
<h2>Errores comunes</h2>
<ul>
<li>Confundir segundos y milisegundos: un número de 13 dígitos está en milisegundos.</li>
<li>Olvidar las zonas horarias: los timestamps siempre están en UTC; solo la visualización es local.</li>
<li>Guardar fechas como enteros de 32 bits, que se desbordan en enero de 2038.</li>
</ul>
<p>¿Estás decodificando un token con claims <code>exp</code> e <code>iat</code>? El Decodificador JWT los convierte automáticamente. Para contar días calendario entre fechas, usa la Calculadora de fechas.</p>
HTML,
        'steps' => [
            'El timestamp Unix actual se muestra arriba y se actualiza cada segundo.',
            'Pega un timestamp en <strong>Timestamp a fecha</strong>. Los segundos y milisegundos se detectan automáticamente.',
            'Míralo como hora local, UTC, ISO 8601 y tiempo relativo (por ejemplo, “hace 3 días”).',
            'Usa <strong>Fecha a timestamp</strong> para convertir una fecha y hora, en tu zona horaria o en UTC.',
        ],
        'faq' => [
            ['q' => '¿Qué es un timestamp Unix?', 'a' => 'Un timestamp Unix (tiempo epoch) es la cantidad de segundos transcurridos desde el 1 de enero de 1970 a las 00:00:00 UTC. Lo usan bases de datos, API, logs y lenguajes de programación porque es igual en todas las zonas horarias.'],
            ['q' => '¿Segundos o milisegundos?', 'a' => 'La mayoría de los sistemas (Unix, PHP, Python, bases de datos) usan segundos: hoy son 10 dígitos. JavaScript y Java usan milisegundos: 13 dígitos. El convertidor detecta cuál pegaste.'],
            ['q' => '¿Qué es el problema del año 2038?', 'a' => 'Los sistemas que guardan los timestamps como enteros de 32 bits con signo se desbordan el 19 de enero de 2038 (timestamp 2147483647). Los sistemas modernos usan valores de 64 bits, que alcanzan para miles de millones de años.'],
            ['q' => '¿Cómo obtengo el timestamp actual en código?', 'a' => 'JavaScript: <code>Math.floor(Date.now() / 1000)</code>. PHP: <code>time()</code>. Python: <code>int(time.time())</code>. SQL (MySQL): <code>UNIX_TIMESTAMP()</code>.'],
        ],
    ],

    'color-converter' => [
        'slug' => 'convertidor-de-colores',
        'name' => 'Convertidor de colores y verificador de contraste',
        'short_description' => 'Convierte colores HEX, RGB y HSL y verifica el contraste WCAG.',
        'description' => 'Convierte colores entre HEX, RGB y HSL con un selector de color, y verifica la relación de contraste entre texto y fondo según WCAG AA y AAA.',
        'seo_title' => 'Convertidor de colores HEX, RGB, HSL y contraste',
        'seo_description' => 'Convierte HEX a RGB y HSL y verifica el contraste de color WCAG para accesibilidad. Convertidor de colores gratis con selector y resultados AA/AAA.',
        'content' => <<<'HTML'
<h2>Cómo trabajar con formatos de color</h2>
<p>Las herramientas de diseño suelen dar los colores en HEX, mientras que los frameworks de CSS, el código de canvas y las librerías de imágenes pueden necesitar RGB o HSL. HSL es especialmente práctico para crear paletas: mantienes el tono y cambias la luminosidad para crear estados hover, bordes y fondos que combinan.</p>
<h2>Contraste de color accesible</h2>
<p>Aproximadamente uno de cada doce hombres tiene algún tipo de daltonismo, y mucha gente lee en pantallas de celular al aire libre. Las Pautas de Accesibilidad para el Contenido Web (WCAG) exigen una relación de contraste mínima de 4.5:1 para texto normal y de 3:1 para texto grande. Revisa cada combinación de texto y fondo de tu diseño, incluidos los botones y los textos de ejemplo de los campos.</p>
<p>¿Vas a crear un código QR con los colores de tu marca? Prueba el contraste aquí primero y después usa el Generador de códigos QR.</p>
HTML,
        'steps' => [
            'Escribe un color en cualquier formato —<code>#0f766e</code>, <code>rgb(15, 118, 110)</code> o <code>hsl(175, 77%, 26%)</code>— o elígelo con el selector de color.',
            'Copia el color en HEX, RGB o HSL para CSS, herramientas de diseño o código.',
            'En el <strong>Verificador de contraste</strong>, ingresa un color de texto y un color de fondo.',
            'Revisa los resultados WCAG: apunta como mínimo a AA (4.5:1) para texto normal.',
        ],
        'faq' => [
            ['q' => '¿Qué diferencia hay entre HEX, RGB y HSL?', 'a' => 'Describen los mismos colores de distintas formas. HEX y RGB indican los canales rojo, verde y azul; HSL usa tono, saturación y luminosidad, lo que facilita crear variantes más claras u oscuras de un color.'],
            ['q' => '¿Qué relación de contraste necesito?', 'a' => 'WCAG 2 nivel AA exige 4.5:1 para texto normal y 3:1 para texto grande (unos 24 px, o 19 px en negrita). El nivel AAA exige 7:1 y 4.5:1. Más contraste hace que el texto sea legible para más personas, incluidas las que tienen baja visión.'],
            ['q' => '¿Por qué importa el contraste accesible para el SEO?', 'a' => 'Un texto legible mantiene a los visitantes en la página, y las auditorías de accesibilidad como Lighthouse marcan los textos con poco contraste. Los sitios accesibles también llegan a más público.'],
            ['q' => '¿Se sube algo a internet?', 'a' => 'No. Todas las conversiones y cálculos de contraste se hacen en tu navegador.'],
        ],
    ],

    'regex-tester' => [
        'slug' => 'probador-de-regex',
        'name' => 'Probador de regex',
        'short_description' => 'Prueba expresiones regulares con resaltado en vivo y grupos.',
        'description' => 'Prueba expresiones regulares de JavaScript con resaltado de coincidencias en vivo, grupos de captura, grupos con nombre y vista previa de reemplazos. Los patrones se ejecutan en un worker seguro en segundo plano.',
        'seo_title' => 'Probador de regex: prueba expresiones regulares',
        'seo_description' => 'Probador de regex gratis con resaltado en vivo, grupos de captura, flags y vista previa de reemplazos. Expresiones regulares de JavaScript, seguro y privado.',
        'content' => <<<'HTML'
<h2>Guía rápida de regex</h2>
<ul>
<li><code>\d</code> dígito · <code>\w</code> carácter de palabra · <code>\s</code> espacio · <code>.</code> cualquier carácter</li>
<li><code>*</code> 0 o más · <code>+</code> 1 o más · <code>?</code> opcional · <code>{2,4}</code> entre 2 y 4</li>
<li><code>^</code> inicio · <code>$</code> fin · <code>\b</code> límite de palabra</li>
<li><code>[abc]</code> uno de · <code>[^abc]</code> ninguno de · <code>a|b</code> uno u otro</li>
<li><code>(…)</code> grupo de captura · <code>(?:…)</code> sin captura · <code>(?=…)</code> búsqueda hacia adelante</li>
</ul>
<h2>Consejos para probar</h2>
<p>Pega ejemplos reales, incluidos los casos que no deberían coincidir, y observa el resaltado mientras editas. Mantén los patrones lo más específicos posible y evita los cuantificadores anidados para que la búsqueda no sea lenta. Para transformar texto en bloque después de encontrar el patrón correcto, te pueden ayudar el Convertidor de mayúsculas y minúsculas y Ordenar líneas.</p>
HTML,
        'steps' => [
            'Escribe tu expresión regular en el campo <strong>Patrón</strong> (sin las barras que la rodean).',
            'Activa los flags que necesites: <code>g</code> global, <code>i</code> ignorar mayúsculas, <code>m</code> multilínea, <code>s</code> el punto incluye saltos de línea, <code>u</code> Unicode.',
            'Pega tu texto de prueba. Las coincidencias se resaltan al instante y se listan con sus grupos de captura.',
            'Activa <strong>Reemplazar</strong> para previsualizar una sustitución usando <code>$1</code>, <code>$2</code> o <code>$&lt;nombre&gt;</code>.',
        ],
        'faq' => [
            ['q' => '¿Qué variante de regex usa este probador?', 'a' => 'Usa el motor de expresiones regulares de JavaScript (ECMAScript) de tu navegador, el mismo que usan Node.js y TypeScript. La mayor parte de la sintaxis es igual que en PCRE, Python y Java, pero algunas funciones, como el soporte de lookbehind o los cuantificadores posesivos, varían.'],
            ['q' => '¿Qué son los grupos de captura?', 'a' => 'Los paréntesis capturan la parte de la coincidencia que contienen, para que puedas reutilizarla. Los grupos con nombre como <code>(?&lt;anio&gt;\d{4})</code> hacen que los patrones sean más fáciles de leer. Usa <code>(?:...)</code> para agrupar sin capturar.'],
            ['q' => '¿Por qué mi patrón superó el tiempo límite?', 'a' => 'Los cuantificadores anidados como <code>(a+)+</code> pueden causar un backtracking catastrófico, en el que el motor prueba una cantidad exponencial de combinaciones. El probador se detiene después de 1,5 segundos para que tu navegador siga respondiendo.'],
            ['q' => '¿Mi texto se envía a algún lado?', 'a' => 'No. La búsqueda se ejecuta en tu navegador, en un worker en segundo plano. No se sube nada.'],
        ],
    ],
];
