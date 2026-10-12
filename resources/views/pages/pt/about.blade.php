@php $site = config('site.name'); $count = \App\Support\Catalog::tools()->count(); @endphp
<x-page-layout :seo="$seo" :title="$title">
    <p>O {{ $site }} é uma coleção de {{ $count }} ferramentas online grátis para tarefas do dia a dia: formatar JSON, comprimir e converter imagens, juntar e dividir PDFs, contar palavras, gerar senhas e QR Codes, e calcular empréstimos, porcentagens e muito mais.</p>
    <p>Criamos as ferramentas que gostaríamos que existissem: rápidas, focadas em uma única tarefa, grátis e sem cadastros, pop-ups ou truques enganosos.</p>

    <h2>Privado por padrão</h2>
    <p>Quase todas as ferramentas do {{ $site }} funcionam inteiramente no seu navegador. Quando você comprime uma foto, junta um PDF ou formata um JSON, o trabalho é feito no seu próprio dispositivo com tecnologia moderna do navegador. <strong>Seus arquivos e textos nunca são enviados aos nossos servidores</strong>, então você pode usar as ferramentas com fotos pessoais, contratos, notas fiscais e código-fonte com toda a tranquilidade.</p>

    <h2>Como criamos nossas ferramentas</h2>
    <ul>
        <li><strong>Precisão em primeiro lugar.</strong> As calculadoras usam fórmulas padrão e documentadas, e cada parte crítica da lógica é coberta por testes automatizados.</li>
        <li><strong>Velocidade.</strong> Cada página carrega só o código de que precisa. Bibliotecas pesadas, como os mecanismos de PDF, só são baixadas quando você as usa.</li>
        <li><strong>Acessibilidade.</strong> As ferramentas funcionam com teclado e leitores de tela, em celulares e computadores, no modo claro e no escuro.</li>
        <li><strong>Padrões abertos.</strong> Usamos bibliotecas de código aberto reconhecidas, como PDF.js, pdf-lib e libheif.</li>
    </ul>

    <h2>Como o {{ $site }} continua grátis</h2>
    <p>O {{ $site }} é financiado por publicidade não invasiva. Os anúncios nunca bloqueiam uma ferramenta nem ficam dentro da área de trabalho. No futuro poderemos oferecer um plano pago opcional com extras como arquivos maiores e processamento em lote; as ferramentas principais continuarão grátis.</p>

    <h2>Sugira uma ferramenta</h2>
    <p>Sente falta de algo? Adicionamos ferramentas novas com frequência, conforme o que as pessoas precisam. <a href="{{ \App\Http\Controllers\PageController::url('suggest-a-tool') }}">Envie sua ideia</a>.</p>
</x-page-layout>
