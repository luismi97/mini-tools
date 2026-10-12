@php $site = config('site.name'); $email = config('site.contact_email'); @endphp
<x-page-layout :seo="$seo" :title="$title" updated="6 de outubro de 2026">
    <p>Esta Política de privacidade explica quais informações o {{ $site }} ("nós") coleta quando você usa este site e como elas são usadas. Coletamos apenas os dados mínimos necessários para operar e melhorar o site.</p>

    <h2>Arquivos e textos que você usa com nossas ferramentas</h2>
    <p>Nossas ferramentas processam seus arquivos e textos <strong>localmente no seu navegador</strong>. Imagens, PDFs, documentos, senhas e qualquer texto que você cole não são enviados, armazenados nem vistos pelos nossos servidores. Quando você fecha ou recarrega a página, esses dados desaparecem.</p>

    <h2>Informações coletadas automaticamente</h2>
    <p>Como a maioria dos sites, nosso provedor de hospedagem pode registrar logs padrão do servidor (endereço IP, tipo de navegador, páginas solicitadas e horário da solicitação) por segurança e para manter o serviço funcionando. Esses registros são guardados por tempo limitado e não são usados para identificar você.</p>

    <h2>Análise</h2>
    <p>Podemos usar o Google Analytics para entender como os visitantes usam o site, por exemplo quais ferramentas são mais populares. O Analytics recebe eventos de uso anônimos como "ferramenta usada" ou "arquivo baixado", junto com detalhes técnicos como a quantidade de arquivos ou o formato de saída. <strong>Nunca enviamos o conteúdo dos seus arquivos ou textos para a análise.</strong> O Google Analytics usa cookies; você pode desativá-lo com o <a href="https://tools.google.com/dlpage/gaoptout" rel="noopener" target="_blank">complemento de desativação do Google Analytics para navegadores</a>.</p>

    <h2>Publicidade e cookies</h2>
    <p>Podemos exibir anúncios veiculados pelo Google AdSense. Fornecedores terceiros, incluindo o Google, usam cookies para exibir anúncios com base nas suas visitas anteriores a este e a outros sites. O uso de cookies de publicidade permite que o Google e seus parceiros exibam anúncios com base nas suas visitas a este site e/ou a outros sites da internet.</p>
    <ul>
        <li>Você pode desativar a publicidade personalizada nas <a href="https://adssettings.google.com" rel="noopener" target="_blank">Configurações de anúncios do Google</a>.</li>
        <li>Você pode desativar o uso de cookies de alguns fornecedores terceiros para publicidade personalizada em <a href="https://www.aboutads.info/choices/" rel="noopener" target="_blank">www.aboutads.info</a>.</li>
        <li>Saiba mais em <a href="https://policies.google.com/technologies/partner-sites" rel="noopener" target="_blank">Como o Google usa as informações de sites que usam seus serviços</a>.</li>
    </ul>
    <p>Quando a lei exige (por exemplo, no Espaço Econômico Europeu e no Reino Unido), pedimos seu consentimento antes de usar cookies não essenciais.</p>

    <h2>Contas</h2>
    <p>O {{ $site }} não exige uma conta, então não coletamos nomes, e-mails nem senhas para usar as ferramentas.</p>

    <h2>Menores de idade</h2>
    <p>Este site não é direcionado a menores de 13 anos e não coletamos intencionalmente informações pessoais deles.</p>

    <h2>Seus direitos</h2>
    <p>Dependendo de onde você mora (por exemplo, no Brasil pela LGPD ou na União Europeia pelo RGPD), você pode ter o direito de acessar, corrigir ou excluir os dados pessoais que tivermos sobre você. Como não guardamos o conteúdo que você processa com nossas ferramentas, normalmente não há nada para excluir. Para fazer uma solicitação, escreva para <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>

    <h2>Alterações nesta política</h2>
    <p>Podemos atualizar esta política de tempos em tempos. A data no início desta página indica quando ela foi modificada pela última vez.</p>

    <h2>Contato</h2>
    <p>Tem dúvidas sobre privacidade? Escreva para <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>
</x-page-layout>
