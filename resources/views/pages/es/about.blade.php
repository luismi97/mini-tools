@php $site = config('site.name'); $count = \App\Support\Catalog::tools()->count(); @endphp
<x-page-layout :seo="$seo" :title="$title">
    <p>{{ $site }} es una colección de {{ $count }} herramientas gratis en línea para tareas cotidianas: formatear JSON, comprimir y convertir imágenes, unir y dividir PDF, contar palabras, generar contraseñas y códigos QR, y calcular préstamos, porcentajes y mucho más.</p>
    <p>Creamos las herramientas que nos gustaría que existieran: rápidas, enfocadas en una sola tarea, gratis y sin registros, ventanas emergentes ni trucos engañosos.</p>

    <h2>Privado por diseño</h2>
    <p>Casi todas las herramientas de {{ $site }} funcionan por completo en tu navegador. Cuando comprimes una foto, unes un PDF o formateas JSON, el trabajo se hace en tu propio dispositivo con tecnología moderna del navegador. <strong>Tus archivos y textos nunca se suben a nuestros servidores</strong>, así que puedes usar las herramientas con fotos personales, contratos, facturas y código fuente con total tranquilidad.</p>

    <h2>Cómo creamos nuestras herramientas</h2>
    <ul>
        <li><strong>Primero, la precisión.</strong> Las calculadoras usan fórmulas estándar y documentadas, y cada parte crítica de la lógica está cubierta por pruebas automatizadas.</li>
        <li><strong>Velocidad.</strong> Cada página carga solo el código que necesita. Las librerías pesadas, como los motores de PDF, se descargan únicamente cuando las usas.</li>
        <li><strong>Accesibilidad.</strong> Las herramientas funcionan con teclado y lectores de pantalla, en celulares y computadoras, en modo claro y oscuro.</li>
        <li><strong>Estándares abiertos.</strong> Usamos librerías de código abierto reconocidas, como PDF.js, pdf-lib y libheif.</li>
    </ul>

    <h2>Cómo se mantiene gratis {{ $site }}</h2>
    <p>{{ $site }} se financia con publicidad no invasiva. Los anuncios nunca bloquean una herramienta ni se colocan dentro del área de trabajo. En el futuro podríamos ofrecer un plan pago opcional con extras como archivos más grandes y procesamiento por lotes; las herramientas principales seguirán siendo gratis.</p>

    <h2>Sugiere una herramienta</h2>
    <p>¿Te falta algo? Agregamos herramientas nuevas con frecuencia según lo que la gente necesita. <a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}">Envíanos tu idea</a>.</p>
</x-page-layout>
