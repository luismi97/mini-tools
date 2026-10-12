@php $site = config('site.name'); $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title" updated="6 de octubre de 2026">
    <p>Esta Política de privacidad explica qué información recopila {{ $site }} ("nosotros") cuando usas este sitio web y cómo se utiliza. Recopilamos solo los datos mínimos necesarios para operar y mejorar el sitio.</p>

    <h2>Archivos y textos que usas con nuestras herramientas</h2>
    <p>Nuestras herramientas procesan tus archivos y textos <strong>localmente en tu navegador</strong>. Las imágenes, PDF, documentos, contraseñas y cualquier texto que pegues no se suben, no se guardan ni los ven nuestros servidores. Cuando cierras o recargas la página, esos datos desaparecen.</p>

    <h2>Información que se recopila automáticamente</h2>
    <p>Como la mayoría de los sitios web, nuestro proveedor de hosting puede registrar logs estándar del servidor (dirección IP, tipo de navegador, páginas solicitadas y hora de la solicitud) por seguridad y para mantener el servicio en funcionamiento. Estos registros se guardan por un tiempo limitado y no se usan para identificarte.</p>

    <h2>Analítica</h2>
    <p>Podemos usar Google Analytics para entender cómo usan el sitio los visitantes, por ejemplo qué herramientas son más populares. Analytics recibe eventos de uso anónimos como "se usó una herramienta" o "se descargó un archivo", junto con detalles técnicos como la cantidad de archivos o el formato de salida. <strong>Nunca enviamos el contenido de tus archivos o textos a la analítica.</strong> Google Analytics usa cookies; puedes desactivarlo con el <a href="https://tools.google.com/dlpage/gaoptout" rel="noopener" target="_blank">complemento de inhabilitación para navegadores de Google Analytics</a>.</p>

    <h2>Publicidad y cookies</h2>
    <p>Podemos mostrar anuncios servidos por Google AdSense. Los proveedores externos, incluido Google, usan cookies para mostrar anuncios según tus visitas anteriores a este y otros sitios web. El uso de cookies publicitarias permite a Google y a sus socios mostrar anuncios basados en tus visitas a este sitio y/o a otros sitios de internet.</p>
    <ul>
        <li>Puedes desactivar la publicidad personalizada en la <a href="https://adssettings.google.com" rel="noopener" target="_blank">Configuración de anuncios de Google</a>.</li>
        <li>Puedes desactivar el uso de cookies de algunos proveedores externos para publicidad personalizada en <a href="https://www.aboutads.info/choices/" rel="noopener" target="_blank">www.aboutads.info</a>.</li>
        <li>Obtén más información en <a href="https://policies.google.com/technologies/partner-sites" rel="noopener" target="_blank">Cómo usa Google la información de los sitios que usan sus servicios</a>.</li>
    </ul>
    <p>Cuando la ley lo exige (por ejemplo, en el Espacio Económico Europeo y el Reino Unido), pedimos tu consentimiento antes de usar cookies no esenciales.</p>

    <h2>Cuentas</h2>
    <p>{{ $site }} no requiere una cuenta, así que no recopilamos nombres, correos electrónicos ni contraseñas para usar las herramientas.</p>

    <h2>Menores de edad</h2>
    <p>Este sitio web no está dirigido a menores de 13 años y no recopilamos a sabiendas información personal de ellos.</p>

    <h2>Tus derechos</h2>
    <p>Según dónde vivas, puedes tener derecho a acceder, corregir o eliminar los datos personales que tengamos sobre ti. Como no guardamos el contenido que procesas con nuestras herramientas, normalmente no hay nada que eliminar. Para hacer una solicitud, escríbenos a <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>

    <h2>Cambios en esta política</h2>
    <p>Podemos actualizar esta política de vez en cuando. La fecha al principio de esta página indica cuándo se modificó por última vez.</p>

    <h2>Contacto</h2>
    <p>¿Tienes preguntas sobre privacidad? Escríbenos a <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>
</x-page-layout>
