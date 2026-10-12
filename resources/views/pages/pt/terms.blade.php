@php $site = config('site.name'); $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title" updated="6 de outubro de 2026">
    <p>Ao usar o {{ $site }}, você aceita estes Termos de uso. Se não concordar, por favor não use o site.</p>

    <h2>Uso das ferramentas</h2>
    <p>As ferramentas são oferecidas gratuitamente para uso pessoal e comercial. Você não pode fazer uso indevido do site, por exemplo tentando interromper seu funcionamento, sobrecarregá-lo com solicitações automatizadas ou usá-lo para fins ilegais.</p>

    <h2>Seu conteúdo</h2>
    <p>Você mantém todos os direitos sobre os arquivos e textos que processa. Como as ferramentas funcionam no seu navegador, não recebemos nem armazenamos o seu conteúdo. Você é responsável por garantir que tem o direito de processar o conteúdo que usa.</p>

    <h2>Sem garantia</h2>
    <p>As ferramentas e seus resultados são oferecidos "no estado em que se encontram", sem garantias de qualquer tipo. As calculadoras oferecem estimativas apenas para fins informativos e não constituem consultoria financeira, jurídica, médica ou profissional. Sempre confira os resultados importantes e guarde uma cópia dos seus arquivos originais.</p>

    <h2>Limitação de responsabilidade</h2>
    <p>Na máxima extensão permitida por lei, o {{ $site }} não se responsabiliza por qualquer perda ou dano decorrente do uso, ou da impossibilidade de uso, do site ou de suas ferramentas, incluindo a perda de dados.</p>

    <h2>Serviços de terceiros</h2>
    <p>O site pode exibir publicidade e usar serviços de análise de terceiros, aos quais se aplicam os próprios termos e políticas de privacidade. Consulte nossa <a href="{{ \App\Http\Controllers\PageController::url('privacy-policy') }}">Política de privacidade</a> para mais detalhes.</p>

    <h2>Alterações</h2>
    <p>Podemos atualizar estes termos ou mudar, adicionar ou remover ferramentas a qualquer momento. Continuar usando o site significa que você aceita os termos em vigor.</p>

    <h2>Contato</h2>
    <p>Tem dúvidas sobre estes termos? Escreva para <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>
</x-page-layout>
