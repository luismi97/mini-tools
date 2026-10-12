<?php

/*
| Spanish copy for the calculators. See content/es/tools.php.
*/

return [
    'percentage-calculator' => [
        'slug' => 'calculadora-de-porcentajes',
        'name' => 'Calculadora de porcentajes',
        'short_description' => 'Calcula porcentajes, variaciones porcentuales y aumentos al instante.',
        'description' => 'Calcula el X % de un número, qué porcentaje es un número de otro, el aumento o la disminución porcentual entre dos valores, y suma o resta un porcentaje, todo en un solo lugar.',
        'seo_title' => 'Calculadora de porcentajes: % de, variación y aumento',
        'seo_description' => 'Calculadora de porcentajes gratis. Calcula el X % de Y, qué porcentaje es X de Y, aumentos o disminuciones porcentuales, y suma o resta porcentajes al instante.',
        'content' => <<<'HTML'
<h2>Fórmulas de porcentaje</h2>
<ul>
<li><strong>X % de Y</strong> = Y × X / 100</li>
<li><strong>Qué porcentaje es X de Y</strong> = X / Y × 100</li>
<li><strong>Variación porcentual</strong> = (nuevo − anterior) / anterior × 100</li>
<li><strong>Aumentar Y en un X %</strong> = Y × (1 + X / 100)</li>
</ul>
<h2>Ejemplos cotidianos</h2>
<p>Calcula un descuento del 25 % sobre un precio, el impuesto de una compra, cuánto aumentó tu sueldo, qué parte de un presupuesto ya gastaste o el porcentaje de respuestas correctas en un examen. Los puntos porcentuales y los porcentajes no son lo mismo: una tasa que pasa del 10 % al 12 % subió 2 puntos porcentuales, lo que equivale a un aumento del 20 %.</p>
<p>Para dinero a lo largo del tiempo, usa la Calculadora de interés compuesto o la Calculadora de préstamos. Para dividir la cuenta de un restaurante, prueba la Calculadora de propinas.</p>
HTML,
        'steps' => [
            'Elige la calculadora que corresponde a tu pregunta: cada una resuelve un tipo distinto de problema de porcentajes.',
            'Escribe tus números. Los resultados se actualizan al instante; no hace falta presionar ningún botón.',
            'Usa <strong>Variación porcentual</strong> para comparar un valor anterior con uno nuevo, como precios o sueldos.',
            'Usa <strong>Sumar o restar un porcentaje</strong> para descuentos, impuestos o aumentos de precio.',
        ],
        'faq' => [
            ['q' => '¿Cómo calculo el porcentaje de un número?', 'a' => 'Multiplica el número por el porcentaje y divide entre 100. Por ejemplo, el 15 % de 200 es 200 × 15 / 100 = 30.'],
            ['q' => '¿Cómo sé qué porcentaje es un número de otro?', 'a' => 'Divide la parte entre el total y multiplica por 100. Por ejemplo, 30 es (30 / 200) × 100 = 15 % de 200.'],
            ['q' => '¿Cómo se calcula un aumento porcentual?', 'a' => 'Resta el valor anterior al nuevo, divide entre el valor anterior y multiplica por 100. Pasar de 80 a 100 es un aumento de (100 − 80) / 80 × 100 = 25 %.'],
            ['q' => '¿Cómo calculo un descuento?', 'a' => 'Usa Sumar o restar un porcentaje y elige disminuir. Un descuento del 20 % sobre 50 es 50 × (1 − 0,20) = 40.'],
            ['q' => '¿Por qué un aumento del 50 % seguido de una baja del 50 % no da el valor original?', 'a' => 'Porque cada porcentaje se calcula sobre una base distinta. 100 + 50 % = 150, pero 150 − 50 % = 75.'],
        ],
    ],

    'loan-calculator' => [
        'slug' => 'calculadora-de-prestamos',
        'name' => 'Calculadora de préstamos',
        'short_description' => 'Calcula la cuota de tu préstamo, los intereses totales y la tabla de amortización.',
        'description' => 'Ingresa el monto, la tasa de interés y el plazo para calcular tu cuota mensual, quincenal o semanal, además de los intereses totales y una tabla de amortización completa.',
        'seo_title' => 'Calculadora de préstamos: cuota y amortización',
        'seo_description' => 'Calculadora de préstamos gratis con pagos mensuales, cada dos semanas o semanales. Mira los intereses, el total pagado y la tabla de amortización completa.',
        'content' => <<<'HTML'
<h2>Cómo funcionan las cuotas de un préstamo</h2>
<p>En un préstamo amortizable todas las cuotas son del mismo monto, pero su composición cambia con el tiempo. Las primeras cuotas son casi todo intereses; las últimas, casi todo capital. La tabla de amortización muestra exactamente cuánto de cada pago va a intereses y qué tan rápido baja el saldo.</p>
<h2>Cómo pagar menos intereses</h2>
<ul>
<li><strong>Plazo más corto:</strong> cuotas más altas, pero muchos menos intereses en total.</li>
<li><strong>Tasa más baja:</strong> incluso un 1 % menos puede ahorrarte miles en un préstamo largo.</li>
<li><strong>Pagos cada dos semanas:</strong> 26 medias cuotas al año reducen un poco los intereses.</li>
<li><strong>Pagos extra:</strong> lo que pagas de más va directo al capital.</li>
</ul>
<p>¿Vas a ahorrar en lugar de pedir prestado? Mira cómo crece el dinero con la Calculadora de interés compuesto.</p>
HTML,
        'steps' => [
            'Ingresa el <strong>monto del préstamo</strong> que quieres pedir.',
            'Ingresa la <strong>tasa de interés anual</strong> (TAE) que te ofrece la entidad.',
            'Define el <strong>plazo</strong> en años o meses y elige cada cuánto vas a pagar: mensual, cada dos semanas o semanal.',
            'Revisa tu cuota, los intereses totales y el costo total, y explora la <strong>tabla de amortización</strong> por año o por pago. Puedes exportarla en CSV.',
        ],
        'faq' => [
            ['q' => '¿Cómo se calcula la cuota del préstamo?', 'a' => 'La calculadora usa la fórmula estándar de amortización: <code>P = L × r / (1 − (1 + r)<sup>−n</sup>)</code>, donde L es el monto del préstamo, r la tasa de interés por período de pago y n la cantidad total de pagos.'],
            ['q' => '¿Pagar cada dos semanas ahorra dinero?', 'a' => 'Pagar cada dos semanas equivale a 26 pagos al año. Como los intereses se calculan más seguido sobre un saldo un poco menor, normalmente pagas algo menos de intereses en total. Compara los totales cambiando la frecuencia de pago.'],
            ['q' => '¿Qué es una tabla de amortización?', 'a' => 'Es una tabla con cada pago durante la vida del préstamo, separado en la parte que paga intereses y la que reduce el capital, junto con el saldo pendiente después de cada pago.'],
            ['q' => '¿Incluye impuestos, seguros o comisiones?', 'a' => 'No. Los resultados cubren solo capital e intereses. Las hipotecas y los créditos de auto pueden incluir además impuestos, seguros, comisiones de apertura u otros costos que fija la entidad.'],
            ['q' => '¿Se guarda mi información?', 'a' => 'No. Todos los cálculos se hacen en tu navegador y nada de lo que ingresas se envía a nuestros servidores.'],
        ],
    ],

    'compound-interest-calculator' => [
        'slug' => 'calculadora-de-interes-compuesto',
        'name' => 'Calculadora de interés compuesto',
        'short_description' => 'Mira cómo crecen tus ahorros con interés compuesto y aportes.',
        'description' => 'Calcula el valor futuro de una inversión con cualquier frecuencia de capitalización y aportes mensuales o anuales, con una tabla de crecimiento año por año.',
        'seo_title' => 'Calculadora de interés compuesto con aportes',
        'seo_description' => 'Calculadora de interés compuesto gratis. Agrega aportes mensuales o anuales, elige la frecuencia de capitalización y mira cómo crece tu saldo año por año.',
        'content' => <<<'HTML'
<h2>El poder del interés compuesto</h2>
<p>Con el interés compuesto ganas rendimientos sobre tus rendimientos. En plazos largos la curva de crecimiento se empina: en los últimos años, los intereses ganados pueden superar todo lo que aportaste. Por eso empezar temprano, aunque sea con montos pequeños, importa más que invertir grandes sumas más adelante.</p>
<h2>La regla del 72</h2>
<p>Una forma rápida de estimar cuánto tarda el dinero en duplicarse: divide 72 entre la tasa de interés anual. Al 6 %, el dinero se duplica en unos 12 años; al 9 %, en unos 8 años.</p>
<h2>Qué influye en tus resultados</h2>
<ul>
<li>La tasa de interés o el rendimiento esperado.</li>
<li>Cuánto tiempo mantienes la inversión.</li>
<li>Cuánto aportas y con qué frecuencia.</li>
<li>Las comisiones, los impuestos y la inflación, que reducen el rendimiento real.</li>
</ul>
<p>¿Vas a pedir prestado? La Calculadora de préstamos muestra cómo los intereses juegan en tu contra.</p>
HTML,
        'steps' => [
            'Ingresa tu <strong>inversión inicial</strong> y la <strong>tasa de interés anual</strong> esperada.',
            'Define cuántos <strong>años</strong> piensas invertir y cada cuánto se capitalizan los intereses.',
            'Agrega un <strong>aporte</strong> periódico —mensual o anual— o déjalo en 0.',
            'Revisa el valor futuro, cuánto provino de tus aportes y cuánto de los intereses, y la tabla año por año. Si quieres, expórtala en CSV.',
        ],
        'faq' => [
            ['q' => '¿Qué es el interés compuesto?', 'a' => 'Es el interés que se gana tanto sobre el dinero original como sobre los intereses ya ganados. En plazos largos hace que los ahorros crezcan de forma exponencial, por eso empezar temprano importa tanto.'],
            ['q' => '¿Cuál es la fórmula del interés compuesto?', 'a' => 'Sin aportes: <code>A = P (1 + r/n)<sup>nt</sup></code>, donde P es el capital, r la tasa anual, n la cantidad de capitalizaciones por año y t la cantidad de años. Con aportes periódicos, se suma el valor futuro de cada depósito.'],
            ['q' => '¿La frecuencia de capitalización hace mucha diferencia?', 'a' => 'Capitalizar más seguido rinde un poco más, pero el efecto es pequeño comparado con la tasa de interés, el tiempo invertido y lo que aportas.'],
            ['q' => '¿Cuándo se suman los aportes?', 'a' => 'Los aportes se suman al final de cada mes (o año), después de aplicar los intereses de ese período.'],
            ['q' => '¿Esto es asesoría financiera?', 'a' => 'No. Los resultados son estimaciones que suponen un rendimiento constante. Las inversiones reales fluctúan, y no se incluyen impuestos ni comisiones.'],
        ],
    ],

    'age-calculator' => [
        'slug' => 'calculadora-de-edad',
        'name' => 'Calculadora de edad',
        'short_description' => 'Calcula la edad exacta en años, meses y días a partir de una fecha de nacimiento.',
        'description' => 'Ingresa una fecha de nacimiento para obtener la edad exacta en años, meses y días, además del total de meses, semanas y días vividos y una cuenta regresiva para el próximo cumpleaños.',
        'seo_title' => 'Calculadora de edad exacta en años, meses y días',
        'seo_description' => 'Calculadora de edad gratis. Conoce tu edad exacta en años, meses y días, el total de días vividos y cuántos días faltan para tu próximo cumpleaños.',
        'content' => <<<'HTML'
<h2>Cómo se calcula la edad exacta</h2>
<p>La edad exacta cuenta los años calendario completos, después los meses completos y luego los días restantes. Como los meses tienen distinta duración, dividir la cantidad de días entre 365 da resultados ligeramente incorrectos; esta calculadora sigue el calendario.</p>
<h2>Usos de una calculadora de edad</h2>
<ul>
<li>Comprobar requisitos de edad para la escuela, deportes, seguros o la jubilación.</li>
<li>Completar formularios que piden la edad en años y meses.</li>
<li>Saber el tiempo entre dos fechas cualesquiera, como un aniversario o la duración de un proyecto.</li>
<li>Llevar la cuenta regresiva hasta el próximo cumpleaños.</li>
</ul>
<p>Para sumar o restar días a una fecha, o contar días hábiles entre dos fechas, usa la Calculadora de fechas.</p>
HTML,
        'steps' => [
            'Ingresa la <strong>fecha de nacimiento</strong>.',
            'Deja <strong>Edad al</strong> en la fecha de hoy, o elige otra fecha para saber la edad en un momento específico del pasado o del futuro.',
            'Mira la edad exacta en años, meses y días, además del total de meses, semanas, días y horas vividos.',
            'Revisa la cuenta regresiva para el próximo cumpleaños y en qué día de la semana cae.',
        ],
        'faq' => [
            ['q' => '¿Cómo se calcula la edad exacta?', 'a' => 'La calculadora cuenta primero los años completos, después los meses completos y luego los días restantes, según el calendario. Los meses con menos días se manejan correctamente.'],
            ['q' => '¿Qué pasa con las personas que nacieron el 29 de febrero?', 'a' => 'En los años sin 29 de febrero, el cumpleaños se cuenta el 28 de febrero.'],
            ['q' => '¿Puedo calcular el tiempo entre dos fechas cualesquiera?', 'a' => 'Sí. Usa la fecha de nacimiento como fecha inicial y Edad al como fecha final. El resultado muestra los años, meses y días exactos entre ambas.'],
            ['q' => '¿Se guarda mi fecha de nacimiento?', 'a' => 'No. El cálculo se hace en tu navegador y no se envía nada a nuestros servidores.'],
        ],
    ],

    'tip-calculator' => [
        'slug' => 'calculadora-de-propinas',
        'name' => 'Calculadora de propinas',
        'short_description' => 'Calcula la propina y divide la cuenta entre varias personas.',
        'description' => 'Ingresa el monto de la cuenta, elige el porcentaje de propina y la cantidad de personas para ver la propina, el total y cuánto paga cada uno, con opción de redondear hacia arriba.',
        'seo_title' => 'Calculadora de propinas: calcula y divide la cuenta',
        'seo_description' => 'Calculadora de propinas gratis. Elige el porcentaje, divide la cuenta entre las personas que quieras y redondea por persona. Rápida y cómoda en el celular.',
        'content' => <<<'HTML'
<h2>Guía de propinas</h2>
<ul>
<li><strong>Restaurantes en Latinoamérica:</strong> lo habitual es un 10 %; en México y otros países se acostumbra entre 10 y 15 %, y más por un servicio excelente.</li>
<li><strong>España:</strong> la propina es opcional; dejar el redondeo o un 5–10 % es lo común.</li>
<li><strong>Estados Unidos:</strong> 15–20 % por servicio en mesa, y 20 % o más por un servicio excelente.</li>
<li><strong>Delivery y taxis:</strong> suele bastar con redondear o dejar un 10 %.</li>
</ul>
<p>Las costumbres cambian mucho de un país a otro. En varios lugares la cuenta ya incluye un cargo por servicio, así que revísala antes de agregar propina.</p>
<h2>Cómo dividir la cuenta de forma justa</h2>
<p>Cuando todos pidieron montos parecidos, dividir en partes iguales es lo más simple. Si los pedidos fueron muy distintos, cada persona puede calcular su parte más la propina. Redondear hacia arriba por persona evita buscar monedas y deja una propina un poco más generosa.</p>
<p>Para otros cálculos cotidianos, prueba la Calculadora de porcentajes.</p>
HTML,
        'steps' => [
            'Ingresa el monto de la cuenta (con o sin impuestos, como prefieras).',
            'Elige el porcentaje de propina con los botones rápidos o escribe uno personalizado.',
            'Indica cuántas personas van a dividir la cuenta.',
            'Mira la propina, el total y cuánto paga cada persona. Activa <strong>Redondear</strong> para obtener un monto entero por persona.',
        ],
        'faq' => [
            ['q' => '¿Cuánta propina debo dejar?', 'a' => 'En la mayor parte de Latinoamérica lo habitual es un 10 %, y en México entre 10 y 15 %. En España es opcional y en Estados Unidos lo estándar es 15–20 %. En muchos lugares la cuenta ya incluye un cargo por servicio.'],
            ['q' => '¿La propina se calcula antes o después de impuestos?', 'a' => 'Calcularla sobre el monto sin impuestos es común y perfectamente aceptable. Calcularla sobre el total con impuestos es un poco más generoso.'],
            ['q' => '¿Cómo se divide la cuenta?', 'a' => 'La propina se suma a la cuenta y el total se divide en partes iguales entre las personas. Con Redondear activado, cada parte se redondea hacia arriba a la siguiente unidad y la diferencia se suma a la propina.'],
            ['q' => '¿Cómo calculo rápido una propina del 10 %?', 'a' => 'Corre la coma decimal un lugar a la izquierda. En una cuenta de 850, el 10 % es 85; para el 15 %, suma la mitad de eso: 85 + 42,50 = 127,50.'],
        ],
    ],

    'salary-calculator' => [
        'slug' => 'calculadora-de-salario',
        'name' => 'Calculadora de salario',
        'short_description' => 'Convierte tu sueldo entre pago por hora, semanal, mensual y anual.',
        'description' => 'Convierte un sueldo o salario entre montos por hora, diarios, semanales, cada dos semanas, quincenales, mensuales y anuales según tus horas y semanas de trabajo.',
        'seo_title' => 'Calculadora de salario: de pago por hora a anual',
        'seo_description' => 'Calculadora de salario gratis. Convierte el pago por hora a sueldo anual y viceversa, además del pago diario, semanal, quincenal y mensual según tu jornada.',
        'content' => <<<'HTML'
<h2>Cómo comparar ofertas de trabajo</h2>
<p>Las ofertas se expresan de distintas formas: una tarifa por hora en un trabajo y un sueldo anual en otro. Convertir ambas al mismo período hace que la comparación sea justa. Recuerda considerar las vacaciones pagadas, las horas extra, los bonos y prestaciones como el seguro médico o los aportes para la jubilación, que pueden valer mucho dinero al año.</p>
<h2>Conversiones rápidas (jornada de 40 horas)</h2>
<ul>
<li>20 por hora ≈ 41.600 al año</li>
<li>25 por hora ≈ 52.000 al año</li>
<li>30 por hora ≈ 62.400 al año</li>
<li>50.000 al año ≈ 24,04 por hora</li>
</ul>
<p>¿Planeas ahorrar parte de tu sueldo? Mira cómo crecen tus ahorros con la Calculadora de interés compuesto.</p>
HTML,
        'steps' => [
            'Ingresa tu pago y elige qué representa: por hora, diario, semanal, cada dos semanas, quincenal, mensual o anual.',
            'Ajusta tu jornada: horas por semana, días por semana y semanas pagadas al año.',
            'Mira tu pago convertido a todos los demás períodos al instante.',
            'Úsala para comparar ofertas de trabajo, tarifas por hora y sueldos anuales en igualdad de condiciones.',
        ],
        'faq' => [
            ['q' => '¿Cómo convierto un pago por hora en sueldo anual?', 'a' => 'Multiplica el pago por hora por las horas que trabajas por semana y por las semanas que trabajas al año. Con 40 horas semanales y 52 semanas, 25 por hora son 25 × 40 × 52 = 52.000 al año.'],
            ['q' => '¿Cómo convierto un sueldo anual en pago por hora?', 'a' => 'Divide el sueldo anual entre las horas por semana multiplicadas por las semanas al año. 60.000 con 40 horas y 52 semanas es 60.000 / 2.080 ≈ 28,85 por hora.'],
            ['q' => '¿Qué diferencia hay entre pago cada dos semanas y quincenal?', 'a' => 'Cada dos semanas significa 26 pagos al año. Quincenal significa dos pagos al mes, es decir, 24 pagos al año, así que cada pago quincenal es un poco mayor.'],
            ['q' => '¿Incluye impuestos?', 'a' => 'No. Los resultados son el pago bruto antes de impuestos y deducciones, que varían según el país y la situación personal.'],
            ['q' => '¿Debo incluir las semanas de vacaciones?', 'a' => 'Si te pagan las vacaciones (por ejemplo, con sueldo fijo), deja 52 semanas. Si no te pagan los días libres, como en muchos trabajos por hora o independientes, reduce las semanas pagadas al año.'],
        ],
    ],

    'auto-loan-calculator' => [
        'slug' => 'calculadora-prestamo-auto',
        'name' => 'Calculadora de préstamo de auto',
        'short_description' => 'Calcula la cuota de tu auto con vehículo en parte de pago, impuestos y gastos.',
        'description' => 'Calcula tu cuota mensual del auto incluyendo el pago inicial, el vehículo entregado en parte de pago, el impuesto sobre la venta y los gastos de la concesionaria, y compara plazos de 36 a 84 meses.',
        'seo_title' => 'Calculadora de préstamo de auto con impuestos',
        'seo_description' => 'Calculadora de crédito automotriz gratis con vehículo en parte de pago, impuestos y gastos. Mira tu cuota y compara intereses en plazos de 36 a 84 meses.',
        'content' => <<<'HTML'
<h2>Qué incluye un crédito de auto</h2>
<p>El monto que pides prestado es el precio del vehículo más los impuestos y los gastos de la concesionaria, menos tu pago inicial y el valor neto del vehículo que entregas en parte de pago. Los gastos de documentación, título y registro suman rápido, así que incluirlos te da una cuota mensual realista antes de hablar con el vendedor.</p>
<h2>Consejos para pagar menos</h2>
<ul>
<li>Pide una preaprobación en un banco o cooperativa para compararla con el financiamiento de la concesionaria.</li>
<li>Da al menos un 10–20 % de pago inicial para no deber más de lo que vale el auto.</li>
<li>Elige el plazo más corto que puedas pagar: la tabla comparativa muestra los intereses que ahorras.</li>
<li>Negocia el precio del auto por separado del vehículo que entregas y del financiamiento.</li>
</ul>
<p>Para otros préstamos, usa la Calculadora de préstamos; para una vivienda, la Calculadora de hipoteca.</p>
HTML,
        'steps' => [
            'Ingresa el <strong>precio del vehículo</strong>, tu <strong>pago inicial</strong> y, si tienes, el valor del <strong>vehículo que entregas</strong> y lo que todavía debes de él.',
            'Agrega la tasa de <strong>impuesto sobre la venta</strong> y los <strong>gastos</strong> de la concesionaria (documentación, título y registro).',
            'Ingresa la <strong>tasa de interés (TAE)</strong> y elige el plazo del préstamo.',
            'Compara la cuota mensual y los intereses totales para plazos de 36 a 84 meses.',
        ],
        'faq' => [
            ['q' => '¿Cómo se calcula la cuota de un crédito de auto?', 'a' => 'El monto financiado es el precio más impuestos y gastos, menos tu pago inicial y el valor neto del vehículo entregado. La cuota mensual sigue la fórmula estándar de amortización según tu tasa y tu plazo.'],
            ['q' => '¿El impuesto se cobra sobre el vehículo entregado?', 'a' => 'En muchos lugares (como la mayoría de los estados de EE. UU.) el impuesto se aplica solo al precio menos el valor del vehículo entregado, lo que ahorra dinero. Donde se grava el precio completo, desmarca la opción para calcularlo así.'],
            ['q' => '¿Qué pasa si debo más de lo que vale mi vehículo entregado?', 'a' => 'Eso es capital negativo. La diferencia se suma a tu nuevo préstamo, lo que aumenta el monto financiado y los intereses que pagas.'],
            ['q' => '¿Conviene un plazo más largo?', 'a' => 'Los préstamos a 72 u 84 meses bajan la cuota, pero cuestan mucho más en intereses y puedes deber más de lo que vale el auto durante años. Compara los plazos en la tabla debajo de los resultados.'],
            ['q' => '¿Los resultados son exactos?', 'a' => 'Son estimaciones. La tasa, los gastos y los impuestos de tu entidad determinan los números finales.'],
        ],
    ],

    'mortgage-calculator' => [
        'slug' => 'calculadora-de-hipoteca',
        'name' => 'Calculadora de hipoteca',
        'short_description' => 'Calcula tu cuota hipotecaria mensual con impuestos, seguro y PMI.',
        'description' => 'Calcula tu cuota hipotecaria mensual completa —capital, intereses, impuesto predial, seguro de hogar, PMI y cuotas de comunidad—, además de los intereses totales y una tabla de amortización anual.',
        'seo_title' => 'Calculadora de hipoteca con impuestos y seguro',
        'seo_description' => 'Calculadora de hipoteca gratis con impuesto predial, seguro, PMI y cuotas de comunidad. Mira tu cuota mensual, los intereses y la amortización anual.',
        'content' => <<<'HTML'
<h2>Cómo entender tu cuota hipotecaria</h2>
<p>Tu cuota mensual es más que capital e intereses. Muchas entidades cobran también el impuesto predial y el seguro de hogar, y en Estados Unidos los créditos convencionales con menos del 20 % de pago inicial suman un seguro hipotecario privado (PMI). Los condominios y edificios pueden cobrar además cuotas de comunidad. Incluir todo muestra lo que realmente pagarás cada mes.</p>
<h2>Cómo bajar tu cuota</h2>
<ul>
<li><strong>Da un 20 % de pago inicial</strong> para evitar el PMI por completo.</li>
<li><strong>Mejora tu historial crediticio</strong> antes de solicitar el crédito: afecta directamente tu tasa.</li>
<li><strong>Compara entidades</strong>: incluso un 0,25 % menos ahorra miles en 30 años.</li>
<li><strong>Considera un plazo de 15 años</strong> si puedes pagarlo: muchos menos intereses en total.</li>
</ul>
<p>Para otros préstamos, como los de auto o personales, usa la Calculadora de préstamos. Para ver cómo podrían crecer tus ahorros, prueba la Calculadora de interés compuesto.</p>
HTML,
        'steps' => [
            'Ingresa el <strong>precio de la vivienda</strong> y tu <strong>pago inicial</strong>, como porcentaje o como monto.',
            'Elige el <strong>plazo</strong> e ingresa la <strong>tasa de interés</strong> que te cotizaron.',
            'Agrega el <strong>impuesto predial</strong>, el <strong>seguro de hogar</strong>, el <strong>PMI</strong> y las <strong>cuotas de comunidad</strong> para ver tu costo mensual real.',
            'Revisa el desglose mensual, los intereses totales y la tabla de amortización año por año.',
        ],
        'faq' => [
            ['q' => '¿Qué incluye la cuota mensual de una hipoteca?', 'a' => 'La mayoría de las cuotas incluyen capital e intereses, y muchas también el impuesto predial y el seguro de hogar. En Estados Unidos, con menos del 20 % de pago inicial normalmente se paga PMI, y los condominios pueden sumar cuotas de comunidad.'],
            ['q' => '¿Qué es el PMI y cuándo deja de cobrarse?', 'a' => 'El seguro hipotecario privado (PMI) protege a la entidad cuando das menos del 20 % de pago inicial en un crédito convencional de EE. UU. Suele costar entre 0,3 % y 1,5 % del préstamo al año y se elimina automáticamente cuando el saldo llega al 78 % del valor original de la vivienda. La calculadora estima cuántos meses lo pagarás.'],
            ['q' => '¿Conviene una hipoteca a 15 o a 30 años?', 'a' => 'A 15 años las cuotas son más altas, pero la tasa es menor y los intereses totales bajan muchísimo. A 30 años las cuotas son más bajas y flexibles. Compara ambas cambiando el plazo.'],
            ['q' => '¿Cuánta vivienda puedo pagar?', 'a' => 'Una guía común es que el pago total de vivienda no supere cerca del 28 % de tu ingreso bruto mensual, y que todas tus deudas no superen el 36 %. Las entidades analizan tu situación financiera completa.'],
            ['q' => '¿Los resultados son exactos?', 'a' => 'Son estimaciones para planificar. Los impuestos, seguros, PMI y gastos de cierre varían según el lugar, la entidad y tu historial crediticio.'],
        ],
    ],

    'date-calculator' => [
        'slug' => 'calculadora-de-fechas',
        'name' => 'Calculadora de fechas',
        'short_description' => 'Cuenta los días entre fechas o suma y resta días, semanas y meses.',
        'description' => 'Calcula la cantidad de días, semanas, meses y días hábiles entre dos fechas, o suma y resta días, semanas, meses y años para obtener una fecha futura o pasada.',
        'seo_title' => 'Calculadora de fechas: días entre fechas',
        'seo_description' => 'Cuenta los días entre dos fechas, incluidos los días hábiles, o suma y resta días, semanas y meses a cualquier fecha. Gratis e instantáneo.',
        'content' => <<<'HTML'
<h2>Usos comunes</h2>
<ul>
<li><strong>Plazos:</strong> ¿qué fecha es dentro de 30 días hábiles?</li>
<li><strong>Cuentas regresivas:</strong> ¿cuántos días faltan para una boda, un examen, un viaje o un lanzamiento?</li>
<li><strong>Contratos y plazos de aviso:</strong> la fecha 90 días después de la firma.</li>
<li><strong>Embarazo, garantías y suscripciones:</strong> sumar semanas o meses a una fecha inicial.</li>
<li><strong>Planificación de proyectos:</strong> la cantidad de días laborables entre dos hitos.</li>
</ul>
<h2>Cómo se cuentan los meses</h2>
<p>Sumar meses sigue el calendario, no una cantidad fija de días. Un mes después del 15 de marzo es el 15 de abril, sin importar cuánto dure el mes. Cuando el día no existe —como el 30 de febrero— se usa el último día del mes.</p>
<p>Para saber la edad exacta de alguien y su próximo cumpleaños, usa la Calculadora de edad.</p>
HTML,
        'steps' => [
            'Elige <strong>Días entre fechas</strong> para contar el tiempo entre dos fechas, o <strong>Sumar o restar</strong> para obtener una fecha futura o pasada.',
            'Elige las fechas en el calendario o escríbelas.',
            'Activa <strong>Incluir la fecha final</strong> cuando deban contar tanto el primer como el último día, por ejemplo en una reserva o un proyecto.',
            'Usa <strong>Solo días hábiles</strong> para saltar sábados y domingos, por ejemplo para calcular un plazo.',
        ],
        'faq' => [
            ['q' => '¿Cuántos días hay entre dos fechas?', 'a' => 'Ingresa ambas fechas en Días entre fechas. El resultado muestra el total de días, el mismo período en semanas, meses y años, y la cantidad de días hábiles.'],
            ['q' => '¿Debo incluir la fecha final?', 'a' => 'De forma predeterminada, la calculadora cuenta los días desde la fecha inicial hasta la final, como cuando cuentas noches de hotel. Incluye la fecha final cuando ambos días cuentan, como en un evento de 3 días de lunes a miércoles.'],
            ['q' => '¿Qué cuenta como día hábil?', 'a' => 'De lunes a viernes. Los feriados no se excluyen porque cambian según el país, así que réstalos manualmente si hace falta.'],
            ['q' => '¿Qué pasa si sumo un mes al 31 de enero?', 'a' => 'El resultado es el último día de febrero (28 o 29), porque febrero no tiene día 31. Así lo manejan los bancos y la mayoría de los calendarios.'],
            ['q' => '¿Puedo calcular la edad de alguien?', 'a' => 'Sí, pero la Calculadora de edad está hecha para eso y además muestra la cuenta regresiva para el próximo cumpleaños.'],
        ],
    ],

    'debt-payoff-calculator' => [
        'slug' => 'calculadora-pago-de-deudas',
        'name' => 'Calculadora de pago de deudas',
        'short_description' => 'Planifica cuándo quedarás sin deudas con el método avalancha o bola de nieve.',
        'description' => 'Agrega tus tarjetas de crédito y préstamos para ver cuándo quedarás sin deudas y cuántos intereses pagarás con los métodos avalancha y bola de nieve, comparado con pagar solo los mínimos.',
        'seo_title' => 'Calculadora de deudas: avalancha o bola de nieve',
        'seo_description' => 'Calculadora de deudas gratis. Compara los métodos avalancha y bola de nieve, mira cuándo quedarás sin deudas y cuántos intereses ahorran los pagos extra.',
        'content' => <<<'HTML'
<h2>¿Avalancha o bola de nieve?</h2>
<p>Ambos métodos pagan el mínimo de cada deuda y destinan todo el dinero extra a una deuda objetivo. La <strong>avalancha</strong> ataca primero la tasa de interés más alta, que siempre es lo más barato. La <strong>bola de nieve</strong> ataca primero el saldo más pequeño, así que cierras cuentas antes: un empujón de motivación que ayuda a muchas personas a mantener el plan. El mejor método es el que vas a seguir.</p>
<h2>Consejos para salir de deudas más rápido</h2>
<ul>
<li>Deja de hacer compras nuevas con las tarjetas que estás pagando.</li>
<li>Pide a tu banco una tasa más baja: suele funcionar si tienes buen historial de pagos.</li>
<li>Considera transferir el saldo o un préstamo de consolidación con una tasa menor, revisando antes las comisiones.</li>
<li>Destina los ingresos extra, como devoluciones de impuestos o bonos, directo a la deuda objetivo.</li>
</ul>
<p>¿Estás por pedir un préstamo nuevo? La Calculadora de préstamos muestra su costo total antes de firmar.</p>
HTML,
        'steps' => [
            'Anota tus deudas con su <strong>saldo</strong>, su <strong>tasa de interés (TAE)</strong> y su <strong>pago mínimo</strong>.',
            'Ingresa cuánto <strong>extra</strong> puedes pagar cada mes además de los mínimos.',
            'Compara los métodos <strong>avalancha</strong> y <strong>bola de nieve</strong> con pagar solo los mínimos.',
            'Sigue el orden de pago del método que elijas. Cuando terminas de pagar una deuda, su pago pasa a la siguiente.',
        ],
        'faq' => [
            ['q' => '¿Qué es el método avalancha?', 'a' => 'Con el método avalancha pagas el mínimo de cada deuda y pones todo el dinero extra en la deuda con la tasa de interés más alta. Es el que más dinero ahorra en intereses.'],
            ['q' => '¿Qué es el método bola de nieve?', 'a' => 'Con el método bola de nieve pones el dinero extra primero en el saldo más pequeño. Pagas un poco más de intereses, pero los logros rápidos mantienen motivadas a muchas personas.'],
            ['q' => '¿Qué significa que el pago “pasa” a la siguiente deuda?', 'a' => 'Cuando terminas de pagar una deuda, el dinero que destinabas a ella se suma a la siguiente. Tu pago mensual total se mantiene, así que el ritmo de pago se acelera con el tiempo.'],
            ['q' => '¿Por qué dice que mi deuda nunca se pagará?', 'a' => 'Si tus pagos son menores que los intereses que se cobran cada mes, el saldo nunca baja. Aumenta el pago mínimo o el pago extra.'],
            ['q' => '¿Se guarda mi información financiera?', 'a' => 'No. Todo se calcula en tu navegador y no se envía nada a nuestros servidores.'],
        ],
    ],
];
