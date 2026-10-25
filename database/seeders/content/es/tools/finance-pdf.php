<?php

/*
| Spanish copy for batch 6: Credit Card Payoff, Loan Comparison, Organize PDF,
| Add Page Numbers to PDF. See content/es/tools.php.
*/

return [
    'credit-card-payoff-calculator' => [
        'slug' => 'calculadora-tarjeta-de-credito',
        'name' => 'Calculadora de pago de tarjeta de crédito',
        'short_description' => 'Descubre cuánto tardas en liquidar tu tarjeta de crédito y cuánto te cuesta.',
        'description' => 'Ingresa el saldo y la tasa de tu tarjeta para ver cuándo quedarás libre de deuda con un pago mensual fijo, o cuánto debes pagar para liquidarla en un plazo, comparado con pagar solo el mínimo.',
        'seo_title' => 'Calculadora de tarjeta de crédito: fecha sin deuda',
        'seo_description' => 'Calcula gratis cuánto tardas en pagar tu tarjeta de crédito, los intereses totales y el pago necesario para liquidarla, frente a pagar solo el mínimo.',
        'content' => <<<'HTML'
<h2>Por qué el pago mínimo te mantiene endeudado</h2>
<p>Los bancos fijan el pago mínimo en algo así como los intereses del mes más un pequeño porcentaje del saldo. Cuando el saldo baja, el mínimo también baja, así que la mayor parte de cada pago se va en intereses. Un saldo de 5000 con una tasa del 23% puede tardar más de 15 años en liquidarse de esta forma y costar en intereses más que las compras originales. Un pago fijo, aunque sea modesto, cambia por completo el resultado.</p>
<h2>Dos formas de planear el pago</h2>
<ul>
<li><strong>Pagar un monto fijo</strong>: ingresa lo que puedes pagar cada mes y verás tu fecha sin deuda y los intereses totales.</li>
<li><strong>Liquidarla en un plazo</strong>: elige una cantidad de meses y obtén el pago mensual que necesitas.</li>
</ul>
<p>¿Tienes varias tarjetas y préstamos? La Calculadora de pago de deudas compara los métodos avalancha y bola de nieve con todas tus deudas. ¿Piensas consolidar con un préstamo personal? Revisa la cuota con la Calculadora de préstamos y compara ofertas con el Comparador de préstamos.</p>
HTML,
        'steps' => [
            'Ingresa el <strong>saldo de la tarjeta</strong> y su <strong>tasa de interés</strong> anual (aparecen en tu estado de cuenta).',
            'Elige <strong>Pagar un monto fijo</strong> e ingresa tu pago mensual, o <strong>Liquidarla en un plazo</strong> y elige la cantidad de meses.',
            'Revisa tu fecha sin deuda, los intereses totales y la comparación con pagar solo el mínimo.',
            'Copia el enlace para guardar tu plan o compartirlo.',
        ],
        'faq' => [
            ['q' => '¿Cuánto tardaré en pagar mi tarjeta de crédito?', 'a' => 'Depende del saldo, la tasa y cuánto pagues cada mes. Ingrésalos arriba para ver la cantidad exacta de meses. Pagar solo el mínimo puede alargar una deuda de unos miles durante 15 años o más.'],
            ['q' => '¿Cómo se calculan los intereses de la tarjeta?', 'a' => 'Las tarjetas cobran intereses cada mes, aproximadamente la tasa anual dividida entre 12, sobre tu saldo. Muchos bancos usan el saldo promedio diario, así que el resultado es una estimación cercana y no una copia exacta de tu estado de cuenta.'],
            ['q' => '¿Cuánto debo pagar para liquidarla en 2 años?', 'a' => 'Elige <strong>Liquidarla en un plazo</strong> e ingresa 24 meses. La calculadora muestra el pago mensual fijo que salda la deuda en ese tiempo.'],
            ['q' => '¿Por qué el pago mínimo tarda tanto?', 'a' => 'El mínimo suele ser los intereses más cerca del 1% del saldo, así que baja a medida que baja el saldo y la mayor parte de cada pago se va en intereses. Puedes cambiar estas condiciones en <strong>Condiciones del pago mínimo</strong>.'],
            ['q' => '¿Incluye compras nuevas?', 'a' => 'No. La estimación supone que dejas de usar la tarjeta, la tasa no cambia y pagas siempre a tiempo.'],
        ],
    ],

    'loan-comparison-calculator' => [
        'slug' => 'comparador-de-prestamos',
        'name' => 'Comparador de préstamos',
        'short_description' => 'Compara hasta cuatro ofertas de préstamo por cuota, gastos y costo total.',
        'description' => 'Compara ofertas de préstamo lado a lado con su tasa, plazo y gastos iniciales para encontrar la más barata, la de cuota más baja y la tasa efectiva de cada una.',
        'seo_title' => 'Comparador de préstamos: compara ofertas gratis',
        'seo_description' => 'Compara hasta 4 ofertas de préstamo lado a lado. Mira la cuota mensual, los intereses, los gastos, el costo total y la tasa efectiva de cada una.',
        'content' => <<<'HTML'
<h2>La tasa más baja no siempre es el préstamo más barato</h2>
<p>Los bancos compiten con la tasa de interés, pero los gastos iniciales, como la comisión por apertura, cambian el costo real. Un préstamo al 6,9% con una comisión de 800 puede salir más caro que uno al 7,5% sin comisión. Este comparador suma intereses y gastos en el costo total del préstamo y muestra la tasa efectiva anual: la tasa que realmente pagas cuando se incluyen los gastos.</p>
<h2>Cuota mensual frente a costo total</h2>
<p>Un plazo más largo baja la cuota mensual, pero casi siempre aumenta los intereses totales. Las etiquetas muestran qué oferta tiene la cuota más baja y cuál es la más barata en total, para que elijas con claridad entre liquidez y costo.</p>
<p>Cuando elijas una oferta, abre la Calculadora de préstamos para ver su tabla de amortización completa y cuánto se acorta con pagos extra. ¿Vas a comprar casa o auto? La Calculadora de hipoteca y la Calculadora de préstamo de auto incluyen impuestos, seguros y la entrega de tu auto usado.</p>
HTML,
        'steps' => [
            'Ingresa cada <strong>oferta de préstamo</strong>: monto, tasa de interés, plazo y <strong>gastos</strong> iniciales.',
            'Agrega hasta cuatro ofertas con <strong>Agregar otra oferta</strong>.',
            'Compara la cuota mensual, los intereses totales, el costo total del préstamo y la tasa efectiva de cada una.',
            'Fíjate en las etiquetas <strong>La más barata</strong> y <strong>Cuota más baja</strong> para decidir.',
        ],
        'faq' => [
            ['q' => '¿Cómo comparo dos ofertas de préstamo?', 'a' => 'Compara el costo total del préstamo (intereses más gastos), no solo la tasa ni la cuota mensual. Ingresa ambas ofertas aquí y la más barata queda resaltada.'],
            ['q' => '¿Qué es la tasa efectiva anual?', 'a' => 'Es la tasa anual que incluye los gastos iniciales además de los intereses. Como los gastos reducen el dinero que realmente recibes, la tasa efectiva es mayor que la tasa anunciada cuando el préstamo tiene gastos.'],
            ['q' => '¿Es mejor una cuota mensual más baja?', 'a' => 'No necesariamente. Un plazo más largo baja la cuota pero suele aumentar los intereses totales. Elige la cuota más baja solo si necesitas ese margen en tu presupuesto.'],
            ['q' => '¿Qué gastos debo incluir?', 'a' => 'Incluye lo que pagas para obtener el préstamo, como comisión por apertura, estudio de crédito o gastos de cierre. No incluyas seguros opcionales ni cargos por atraso.'],
            ['q' => '¿Se guarda mi información?', 'a' => 'No. Todo se calcula en tu navegador y no se envía nada a nuestros servidores.'],
        ],
    ],

    'organize-pdf' => [
        'slug' => 'organizar-pdf',
        'name' => 'Organizar PDF',
        'short_description' => 'Reordena, gira y quita páginas de un PDF arrastrándolas.',
        'description' => 'Mira todas las páginas de tu PDF, arrástralas a un nuevo orden, gira las que están de lado y quita las que no necesitas, y descarga el archivo organizado.',
        'seo_title' => 'Organizar PDF: reordena páginas en línea gratis',
        'seo_description' => 'Reordena las páginas de un PDF gratis. Arrástralas a un nuevo orden, gira o quita páginas y descarga tu PDF. El archivo se procesa en tu navegador.',
        'content' => <<<'HTML'
<h2>Cada página en su lugar</h2>
<p>Los documentos escaneados suelen salir en desorden, los informes necesitan mover un anexo al final y los archivos combinados necesitan la portada primero. Esta herramienta muestra una vista previa de cada página para que las arrastres al orden que quieras, gires las que se escanearon de lado y quites las páginas en blanco o repetidas, todo en un solo paso.</p>
<h2>Privado por diseño</h2>
<p>Tu PDF se abre y se reconstruye por completo en tu navegador. No se sube nada, así que es seguro para contratos, estados de cuenta e informes médicos.</p>
<p>Para combinar varios archivos primero, usa Unir PDF. Para sacar algunas páginas a otro documento, usa Dividir PDF. Si solo necesitas corregir la orientación, Girar PDF es lo más rápido, y Numerar páginas de PDF numera el documento final.</p>
HTML,
        'steps' => [
            'Suelta un PDF en el recuadro o haz clic para buscarlo. Aparece una vista previa de cada página.',
            'Arrastra las páginas al orden que quieras o usa las flechas debajo de cada una.',
            'Haz clic en una página para girarla o usa el ícono de papelera para quitarla.',
            'Haz clic en <strong>Descargar PDF organizado</strong> para guardar el archivo nuevo.',
        ],
        'faq' => [
            ['q' => '¿Cómo cambio el orden de las páginas de un PDF?', 'a' => 'Abre el PDF aquí y arrastra cada página a su nueva posición. En el celular, usa las flechas debajo de cada página. Después descarga el archivo organizado.'],
            ['q' => '¿Puedo girar y quitar páginas al mismo tiempo?', 'a' => 'Sí. Al hacer clic en una página se gira 90 grados y la papelera la marca para quitarla, así que corriges todo de una vez.'],
            ['q' => '¿Puedo deshacer los cambios?', 'a' => 'Usa <strong>Orden original</strong> para volver al orden inicial. Tu archivo original nunca se modifica: la herramienta descarga una copia nueva.'],
            ['q' => '¿Mi PDF se sube a internet?', 'a' => 'No. Las páginas se muestran y se reconstruyen en tu navegador, así que el documento nunca sale de tu dispositivo.'],
            ['q' => '¿Puedo organizar páginas de varios PDF?', 'a' => 'Primero combina los archivos con Unir PDF y luego abre aquí el archivo unido para ordenar sus páginas.'],
        ],
    ],

    'add-page-numbers-to-pdf' => [
        'slug' => 'numerar-paginas-pdf',
        'name' => 'Numerar páginas de PDF',
        'short_description' => 'Numera las páginas de un PDF en la posición y el estilo que quieras.',
        'description' => 'Añade números de página a un PDF en cualquier esquina o al centro, como "1", "1 / 10" o "Página 1 de 10", omite la portada y elige el primer número. Funciona en tu navegador.',
        'seo_title' => 'Numerar páginas de PDF gratis y en privado',
        'seo_description' => 'Añade números de página a un PDF gratis. Elige posición, formato y número inicial, y omite la portada. Tu archivo nunca sale de tu dispositivo.',
        'content' => <<<'HTML'
<h2>Cuándo importan los números de página</h2>
<p>Informes, tesis, contratos, manuales y apuntes impresos son mucho más fáciles de revisar y comentar cuando cada página está numerada. Los números también protegen los documentos impresos: una página que falta o está fuera de lugar se nota de inmediato. Muchos PDF exportados desde escáneres, celulares o presentaciones no tienen ningún número de página.</p>
<h2>Elige el estilo</h2>
<ul>
<li>Coloca el número en cualquier esquina o al centro, arriba o abajo.</li>
<li>Usa un número simple, &quot;1 / 10&quot;, &quot;Página 1&quot; o &quot;Página 1 de 10&quot;.</li>
<li>Omite la portada empezando en la página 2 y elige el primer número para continuar una serie.</li>
</ul>
<p>¿Preparando el documento? Unir PDF combina archivos, Organizar PDF corrige el orden de las páginas y Eliminar páginas de PDF quita las que no necesitas.</p>
HTML,
        'steps' => [
            'Suelta un PDF en el recuadro o haz clic para buscarlo.',
            'Elige la <strong>posición</strong> y el <strong>formato</strong> de los números. La vista previa muestra cómo quedarán.',
            'Para omitir la portada, empieza a numerar en la página 2. Cambia el primer número si lo necesitas.',
            'Haz clic en <strong>Añadir números de página</strong> para descargar el PDF numerado.',
        ],
        'faq' => [
            ['q' => '¿Cómo agrego números de página a un PDF?', 'a' => 'Abre el PDF aquí, elige dónde van los números y su formato, y haz clic en <strong>Añadir números de página</strong>. La copia numerada se descarga en segundos.'],
            ['q' => '¿Puedo omitir la primera página?', 'a' => 'Sí. En <strong>Empezar a numerar en la página</strong> pon 2 y la portada queda limpia. Deja el primer número en 1 si la segunda página debe llevar el 1.'],
            ['q' => '¿Qué formatos hay?', 'a' => 'Un número simple, &quot;1 / 10&quot;, &quot;Página 1&quot; y &quot;Página 1 de 10&quot;, en tamaño pequeño, mediano o grande, en cualquier esquina o al centro.'],
            ['q' => '¿Qué pasa con las páginas horizontales o giradas?', 'a' => 'Los números se colocan según cómo se ve cada página, así que aparecen derechos también en páginas horizontales o giradas.'],
            ['q' => '¿Mi PDF se sube a internet?', 'a' => 'No. Los números se agregan en tu navegador y el archivo nunca sale de tu dispositivo.'],
        ],
    ],
];
