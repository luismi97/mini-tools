@php $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title">
    <p>Lemos todas as mensagens. Escreva para nós para:</p>
    <ul>
        <li>relatar um erro ou um resultado incorreto,</li>
        <li><a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}">sugerir uma ferramenta nova ou uma melhoria</a>,</li>
        <li>perguntar sobre publicidade ou parcerias.</li>
    </ul>

    <div class="panel not-prose mt-8 flex flex-wrap items-center justify-between gap-4 p-5">
        <div>
            <p class="text-sm text-muted">E-mail</p>
            <a href="mailto:{{ $email }}" class="text-lg font-semibold text-ink no-underline">{{ $email }}</a>
        </div>
        <a href="mailto:{{ $email }}?subject={{ rawurlencode('Comentários sobre o '.config('site.name')) }}" class="btn btn-primary no-underline">Enviar um e-mail</a>
    </div>

    <h2>Antes de escrever</h2>
    <p>Se algo não funciona, conte qual ferramenta você usou, seu navegador (por exemplo Chrome, Safari ou Firefox) e o que aconteceu. <strong>Por favor, não nos envie arquivos privados</strong>: descrever o problema é suficiente.</p>
</x-page-layout>
