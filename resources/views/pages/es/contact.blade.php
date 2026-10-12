@php $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title">
    <p>Leemos todos los mensajes. Escríbenos para:</p>
    <ul>
        <li>reportar un error o un resultado incorrecto,</li>
        <li><a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}">sugerir una herramienta nueva o una mejora</a>,</li>
        <li>consultar sobre publicidad o alianzas.</li>
    </ul>

    <div class="panel not-prose mt-8 flex flex-wrap items-center justify-between gap-4 p-5">
        <div>
            <p class="text-sm text-muted">Correo electrónico</p>
            <a href="mailto:{{ $email }}" class="text-lg font-semibold text-ink no-underline">{{ $email }}</a>
        </div>
        <a href="mailto:{{ $email }}?subject={{ rawurlencode('Comentarios sobre '.config('site.name')) }}" class="btn btn-primary no-underline">Enviar un correo</a>
    </div>

    <h2>Antes de escribir</h2>
    <p>Si algo no funciona, cuéntanos qué herramienta usaste, tu navegador (por ejemplo Chrome, Safari o Firefox) y qué pasó. <strong>Por favor, no nos envíes archivos privados</strong>: con describir el problema es suficiente.</p>
</x-page-layout>
