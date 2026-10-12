@php $site = config('site.name'); $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title" updated="6 de octubre de 2026">
    <p>Al usar {{ $site }} aceptas estos Términos de uso. Si no estás de acuerdo, por favor no uses el sitio web.</p>

    <h2>Uso de las herramientas</h2>
    <p>Las herramientas se ofrecen gratis para uso personal y comercial. No puedes hacer un uso indebido del sitio, por ejemplo intentando interrumpir su funcionamiento, sobrecargarlo con solicitudes automatizadas o usarlo con fines ilegales.</p>

    <h2>Tu contenido</h2>
    <p>Conservas todos los derechos sobre los archivos y textos que procesas. Como las herramientas funcionan en tu navegador, no recibimos ni guardamos tu contenido. Eres responsable de asegurarte de que tienes derecho a procesar el contenido que usas.</p>

    <h2>Sin garantía</h2>
    <p>Las herramientas y sus resultados se ofrecen "tal cual", sin garantías de ningún tipo. Las calculadoras ofrecen estimaciones solo con fines informativos y no constituyen asesoría financiera, legal, médica ni profesional. Verifica siempre los resultados importantes y guarda una copia de tus archivos originales.</p>

    <h2>Limitación de responsabilidad</h2>
    <p>En la máxima medida permitida por la ley, {{ $site }} no se hace responsable de ninguna pérdida o daño derivado del uso, o de la imposibilidad de uso, del sitio web o de sus herramientas, incluida la pérdida de datos.</p>

    <h2>Servicios de terceros</h2>
    <p>El sitio web puede mostrar publicidad y usar servicios de analítica de terceros, a los que se aplican sus propios términos y políticas de privacidad. Consulta nuestra <a href="{{ \App\Http\Controllers\PageController::url('privacy-policy') }}">Política de privacidad</a> para más detalles.</p>

    <h2>Cambios</h2>
    <p>Podemos actualizar estos términos o cambiar, agregar o quitar herramientas en cualquier momento. Seguir usando el sitio web significa que aceptas los términos vigentes.</p>

    <h2>Contacto</h2>
    <p>¿Tienes preguntas sobre estos términos? Escríbenos a <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>
</x-page-layout>
