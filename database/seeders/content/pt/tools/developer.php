<?php

/*
| Portuguese copy for the developer tools. See content/pt/tools.php.
*/

return [
    'json-formatter' => [
        'slug' => 'formatador-json',
        'name' => 'Formatador JSON',
        'short_description' => 'Formate, valide e minifique JSON direto no navegador.',
        'description' => 'Cole seu JSON para deixá-lo legível com recuo limpo, minificá-lo para produção ou validá-lo e encontrar a linha exata de qualquer erro de sintaxe. Seus dados nunca saem do navegador.',
        'seo_title' => 'Formatador e validador JSON online',
        'seo_description' => 'Formatador e validador JSON grátis online. Embeleze, minifique e valide JSON na hora no seu navegador, sem enviar dados e sem cadastro.',
        'content' => <<<'HTML'
<h2>Por que formatar JSON?</h2>
<p>APIs e arquivos de log costumam devolver JSON em uma única linha enorme, quase impossível de ler. Formatar adiciona recuo e quebras de linha consistentes para você enxergar a estrutura, notar campos faltando e depurar mais rápido. Minificar faz o contrário: remove todos os espaços desnecessários para que respostas e arquivos de configuração fiquem o menor possível.</p>
<h2>Erros comuns de JSON que este validador encontra</h2>
<ul>
<li>Vírgulas finais depois do último item de um objeto ou array.</li>
<li>Aspas simples em vez de aspas duplas em textos e chaves.</li>
<li>Nomes de propriedades sem aspas e comentários, que o JSON não permite.</li>
<li>Vírgulas, colchetes ou chaves faltando.</li>
</ul>
<p>Cada erro é informado com a linha e a coluna exatas. Precisa dos dados em uma planilha? Use o JSON para CSV, ou faça o caminho inverso com o CSV para JSON.</p>
HTML,
        'steps' => [
            'Cole ou digite seu JSON na caixa de <strong>Entrada</strong>, ou clique em <strong>Carregar exemplo</strong> para testar.',
            'Clique em <strong>Formatar</strong> para embelezar ou em <strong>Minificar</strong> para remover todos os espaços. Escolha 2 espaços, 4 espaços ou tabulações e, se quiser, ordene as chaves em ordem alfabética.',
            'Se o JSON for inválido, a mensagem de erro mostra a linha e a coluna exatas, e o cursor pula para o problema.',
            'Copie o resultado ou baixe como arquivo. Você também pode converter o JSON em <strong>CSV</strong> ou em interfaces <strong>TypeScript</strong>.',
        ],
        'faq' => [
            ['q' => 'Meu JSON é enviado para um servidor?', 'a' => 'Não. A formatação, a validação e a conversão acontecem inteiramente no seu navegador com JavaScript. Seus dados nunca saem do seu dispositivo, então é seguro usar com informações privadas ou sensíveis.'],
            ['q' => 'Qual a diferença entre formatar e minificar JSON?', 'a' => 'Formatar (também chamado de embelezar) adiciona recuo e quebras de linha para deixar o JSON fácil de ler. Minificar remove todos os espaços desnecessários para que ele ocupe o mínimo em produção ou ao ser enviado pela rede.'],
            ['q' => 'Por que meu JSON é inválido?', 'a' => 'As causas mais comuns são vírgulas finais, aspas simples em vez de duplas, nomes de propriedades sem aspas, comentários e vírgulas faltando entre os itens. O JSON é mais rígido que a sintaxe de objetos do JavaScript. O validador mostra a linha e a coluna do primeiro erro que encontra.'],
            ['q' => 'Como funciona a conversão de JSON para CSV?', 'a' => 'Um array de objetos vira uma linha por objeto, com uma coluna para cada chave. Objetos aninhados são achatados com notação de ponto (por exemplo <code>owner.name</code>) e arrays aninhados são guardados como texto JSON dentro da célula.'],
            ['q' => 'Existe limite de tamanho?', 'a' => 'Não há um limite fixo, mas como tudo roda no seu navegador, arquivos muito grandes (dezenas de megabytes) podem ficar lentos dependendo do seu dispositivo.'],
        ],
    ],

    'base64-encoder' => [
        'slug' => 'codificar-decodificar-base64',
        'name' => 'Codificador e decodificador Base64',
        'short_description' => 'Codifique e decodifique textos e arquivos em Base64, com suporte a URL.',
        'description' => 'Converta texto em Base64 e vice-versa com suporte completo a UTF-8, mude para Base64 seguro para URL ou transforme qualquer arquivo em uma string Base64 ou em um data URI.',
        'seo_title' => 'Codificar e decodificar Base64: textos e arquivos',
        'seo_description' => 'Codificador e decodificador Base64 grátis online. Suporta UTF-8 e emoji, Base64 seguro para URL e arquivos para data URI. Funciona no seu navegador.',
        'content' => <<<'HTML'
<h2>Para que serve o Base64?</h2>
<ul>
<li>Incorporar imagens pequenas em HTML ou CSS como data URI.</li>
<li>Enviar anexos binários por e-mail (MIME).</li>
<li>Guardar dados binários em JSON, XML ou variáveis de ambiente.</li>
<li>Cabeçalhos de autenticação HTTP Basic e JSON Web Tokens.</li>
</ul>
<h2>Base64 não é criptografia</h2>
<p>O Base64 só muda a forma de representar os dados: qualquer pessoa pode decodificá-lo na hora. Nunca use Base64 para esconder senhas ou segredos. Para criar segredos fortes, use o Gerador de senhas; para inspecionar tokens que usam Base64URL, use o Decodificador JWT.</p>
HTML,
        'steps' => [
            'Escolha <strong>Codificar</strong> para transformar texto em Base64, ou <strong>Decodificar</strong> para voltar de Base64 para texto legível.',
            'Cole seu texto ou sua string Base64. O resultado aparece na hora enquanto você digita.',
            'Ative <strong>Seguro para URL</strong> para usar <code>-</code> e <code>_</code> no lugar de <code>+</code> e <code>/</code> (como nos JWTs e nas URLs).',
            'Para codificar uma imagem ou qualquer arquivo, use <strong>Codificar um arquivo</strong> mais abaixo e copie a string Base64 ou o data URI completo.',
        ],
        'faq' => [
            ['q' => 'O que é Base64?', 'a' => 'Base64 é uma codificação que representa dados binários com 64 caracteres ASCII imprimíveis. É usado para incorporar imagens em HTML e CSS, enviar anexos por e-mail e transportar dados em JSON ou URLs. É uma codificação, não uma criptografia: qualquer pessoa pode decodificá-lo.'],
            ['q' => 'Suporta emoji e caracteres acentuados?', 'a' => 'Sim. O texto é convertido em UTF-8 antes de ser codificado, então emoji, acentos, cedilha e alfabetos não latinos são codificados e decodificados corretamente.'],
            ['q' => 'O que é Base64 seguro para URL?', 'a' => 'O Base64 seguro para URL (Base64URL) troca <code>+</code> por <code>-</code> e <code>/</code> por <code>_</code> e remove o preenchimento <code>=</code>, para que o resultado possa ser usado em URLs e nomes de arquivo. O decodificador aceita as duas variantes automaticamente.'],
            ['q' => 'Por que o Base64 deixa os dados maiores?', 'a' => 'Cada 3 bytes de entrada viram 4 caracteres Base64, então os dados codificados ficam cerca de 33% maiores que o original.'],
            ['q' => 'Meus dados são enviados para a internet?', 'a' => 'Não. A codificação e a decodificação acontecem no seu navegador. Seus textos e arquivos nunca saem do seu dispositivo.'],
        ],
    ],

    'url-encoder' => [
        'slug' => 'codificar-decodificar-url',
        'name' => 'Codificador e decodificador de URL',
        'short_description' => 'Codifique ou decodifique URLs e parâmetros com codificação percentual.',
        'description' => 'Codifique texto para usar com segurança em URLs ou decodifique strings com codificação percentual para texto legível, e inspecione cada parte e cada parâmetro de uma URL.',
        'seo_title' => 'Codificar e decodificar URL online',
        'seo_description' => 'Codificador e decodificador de URL grátis. Codifique valores de consulta ou URLs inteiras, decodifique sequências %20 e veja os parâmetros na hora.',
        'content' => <<<'HTML'
<h2>Por que as URLs precisam de codificação</h2>
<p>As URLs só podem conter um conjunto limitado de caracteres. Espaços, acentos, emoji e símbolos como <code>&amp;</code>, <code>?</code> e <code>#</code> precisam de codificação percentual para que navegadores e servidores os interpretem corretamente. Esquecer de codificar um valor de consulta é uma causa comum de links quebrados e parâmetros perdidos.</p>
<h2>Codificações comuns</h2>
<ul>
<li>Espaço → <code>%20</code> (ou <code>+</code> em dados de formulário)</li>
<li><code>&amp;</code> → <code>%26</code></li>
<li><code>/</code> → <code>%2F</code></li>
<li><code>ç</code> → <code>%C3%A7</code></li>
</ul>
<h2>Codificação para desenvolvedores</h2>
<p>Em JavaScript, use <code>encodeURIComponent()</code> para valores de consulta individuais e <code>encodeURI()</code> para URLs completas. Em PHP, os equivalentes são <code>rawurlencode()</code> e <code>urlencode()</code>, que codifica espaços como sinais de mais. Codificar um valor duas vezes é um erro frequente que gera sequências como <code>%2520</code>.</p>
<p>Trabalhando com tokens ou dados binários? O Codificador e decodificador Base64 e o Decodificador JWT podem ajudar.</p>
HTML,
        'steps' => [
            'Escolha <strong>Codificar</strong> para aplicar a codificação percentual, ou <strong>Decodificar</strong> para transformar sequências como <code>%20</code> em texto legível.',
            'Cole seu texto ou sua URL. O resultado se atualiza enquanto você digita.',
            'Use <strong>Componente</strong> para valores de consulta e segmentos de caminho, ou <strong>URL completa</strong> para manter caracteres como <code>/</code>, <code>?</code> e <code>&amp;</code>.',
            'Quando a entrada é uma URL completa, suas partes e parâmetros aparecem em uma tabela abaixo.',
        ],
        'faq' => [
            ['q' => 'O que é codificação de URL?', 'a' => 'A codificação de URL (codificação percentual) troca os caracteres não permitidos em uma URL por um <code>%</code> seguido de dois dígitos hexadecimais. Por exemplo, um espaço vira <code>%20</code> e o <code>ç</code> vira <code>%C3%A7</code>.'],
            ['q' => 'Qual a diferença entre Componente e URL completa?', 'a' => 'O modo Componente (<code>encodeURIComponent</code>) codifica todos os caracteres reservados, que é o que você precisa para um único valor de consulta. O modo URL completa (<code>encodeURI</code>) mantém intactos os caracteres que estruturam uma URL, como <code>:</code>, <code>/</code>, <code>?</code>, <code>&amp;</code> e <code>=</code>.'],
            ['q' => 'Por que algumas URLs usam + para os espaços?', 'a' => 'Formulários HTML codificam espaços como <code>+</code> nas strings de consulta. Deixe <strong>Tratar + como espaço</strong> ativado ao decodificar dados de formulário ou strings de consulta.'],
            ['q' => 'Meus dados são enviados para algum lugar?', 'a' => 'Não. Tudo é processado no seu navegador.'],
        ],
    ],

    'jwt-decoder' => [
        'slug' => 'decodificador-jwt',
        'name' => 'Decodificador JWT',
        'short_description' => 'Decodifique JSON Web Tokens e inspecione os claims e a expiração.',
        'description' => 'Cole um JWT para decodificar o header e o payload, ver exp, iat e nbf como datas legíveis e conferir se o token expirou. A decodificação acontece no seu dispositivo.',
        'seo_title' => 'Decodificador JWT: decodifique JSON Web Tokens',
        'seo_description' => 'Decodifique tokens JWT grátis. Veja o header, o payload, as datas de expiração e o status do token. Privado: o token não sai do seu navegador.',
        'content' => <<<'HTML'
<h2>Como funcionam os JWTs</h2>
<p>Um JSON Web Token carrega dados (claims) sobre um usuário ou uma sessão, como um ID, suas funções e uma data de expiração. O header e o payload são JSON codificado em Base64URL, e a assinatura permite ao servidor confirmar que ninguém os alterou. Como o payload só está codificado, qualquer pessoa com o token consegue lê-lo: nunca coloque segredos dentro de um JWT.</p>
<h2>Verificações comuns ao depurar</h2>
<ul>
<li>O token expirou (<code>exp</code> no passado)?</li>
<li>Uma diferença de relógio está causando problemas com <code>nbf</code>?</li>
<li>O <code>aud</code> ou o <code>iss</code> correspondem ao que a sua API espera?</li>
<li>O algoritmo (<code>alg</code>) é o que está configurado no seu servidor?</li>
</ul>
<p>Para decodificar outras strings Base64, use o Codificador e decodificador Base64.</p>
HTML,
        'steps' => [
            'Cole um JSON Web Token (JWT) na caixa. O prefixo <code>Bearer</code> é removido automaticamente.',
            'O header e o payload são decodificados na hora e exibidos como JSON formatado.',
            'Confira os claims <strong>exp</strong>, <strong>iat</strong> e <strong>nbf</strong> convertidos em datas legíveis e veja se o token expirou.',
            'Copie o header ou o payload decodificado com um clique.',
        ],
        'faq' => [
            ['q' => 'É seguro colar meu JWT aqui?', 'a' => 'Sim. O token é decodificado inteiramente no seu navegador e nunca é enviado a um servidor. Mesmo assim, trate tokens de produção como senhas e evite compartilhá-los.'],
            ['q' => 'Esta ferramenta verifica a assinatura?', 'a' => 'Não. Ela só decodifica o header e o payload, que são JSON codificado em Base64URL. Verificar a assinatura exige o segredo ou a chave pública e deve ser feito pelo seu servidor.'],
            ['q' => 'O que são exp, iat e nbf?', 'a' => '<code>exp</code> é a data de expiração, <code>iat</code> é quando o token foi emitido e <code>nbf</code> é o momento antes do qual ele não deve ser aceito. Todos são timestamps Unix em segundos.'],
            ['q' => 'Quais são as três partes de um JWT?', 'a' => 'Um JWT tem um header (algoritmo e tipo de token), um payload (os claims) e uma assinatura, separados por pontos: <code>header.payload.signature</code>.'],
        ],
    ],

    'hash-generator' => [
        'slug' => 'gerador-de-hash',
        'name' => 'Gerador de hash',
        'short_description' => 'Gere hashes MD5, SHA-1, SHA-256 e SHA-512 de textos ou arquivos.',
        'description' => 'Calcule de uma vez os hashes MD5, SHA-1, SHA-256, SHA-384 e SHA-512 de qualquer texto ou arquivo, e verifique downloads comparando checksums. Funciona no seu navegador.',
        'seo_title' => 'Gerador de hash MD5, SHA-256 e SHA-512',
        'seo_description' => 'Gere hashes MD5, SHA-1, SHA-256 e SHA-512 de textos ou arquivos e verifique checksums. Os arquivos são processados no navegador, nunca enviados.',
        'content' => <<<'HTML'
<h2>Usos comuns dos hashes</h2>
<ul>
<li><strong>Verificar downloads:</strong> compare o checksum SHA-256 publicado pelo fornecedor de um software com o arquivo que você baixou.</li>
<li><strong>Detectar alterações:</strong> o mesmo arquivo sempre tem o mesmo hash, então hashes diferentes significam conteúdo diferente.</li>
<li><strong>Desenvolvimento:</strong> gere chaves de cache, ETags e identificadores de conteúdo.</li>
<li><strong>Deduplicação:</strong> encontre arquivos idênticos comparando os hashes.</li>
</ul>
<h2>Qual algoritmo devo usar?</h2>
<p>Use SHA-256 para quase tudo: é rápido, amplamente compatível e seguro. O SHA-512 gera um resumo ainda mais longo. MD5 e SHA-1 servem para verificações rápidas de integridade, mas não devem ser usados para segurança. Para codificar dados em vez de obter sua impressão digital, use o Codificador e decodificador Base64.</p>
HTML,
        'steps' => [
            'Digite ou cole um texto, ou escolha <strong>Calcular hash de um arquivo</strong> para obter o checksum de qualquer arquivo.',
            'Os hashes MD5, SHA-1, SHA-256, SHA-384 e SHA-512 são calculados ao mesmo tempo.',
            'Copie o hash de que precisar, em minúsculas ou maiúsculas.',
            'Para verificar um download, cole o checksum esperado em <strong>Comparar</strong>: se corresponder, ele fica marcado em verde.',
        ],
        'faq' => [
            ['q' => 'O que é um hash?', 'a' => 'Uma função hash transforma qualquer entrada em uma impressão digital de tamanho fixo. A mesma entrada sempre gera o mesmo hash, e mudar um único caractere o altera completamente. Hashes são usados para verificar downloads, detectar alterações e indexar dados.'],
            ['q' => 'Como verifico o checksum de um arquivo?', 'a' => 'Calcule o hash do arquivo baixado e cole em Comparar o checksum publicado pelo fornecedor (normalmente SHA-256). Se forem iguais, o arquivo está completo e não foi alterado.'],
            ['q' => 'MD5 ou SHA-1 são seguros?', 'a' => 'Não para segurança. Ambos têm ataques de colisão conhecidos, então use SHA-256 ou SHA-512 em tudo o que envolver segurança. O MD5 ainda serve para verificações rápidas sem fins de segurança.'],
            ['q' => 'Devo guardar senhas com SHA-256?', 'a' => 'Não. Senhas devem ser guardadas com algoritmos lentos e com sal, como bcrypt, scrypt ou Argon2. Hashes rápidos como o SHA-256 são fáceis de atacar por força bruta.'],
            ['q' => 'Meus textos e arquivos são enviados para a internet?', 'a' => 'Não. Os hashes são calculados no seu navegador com a Web Crypto API. Arquivos de qualquer tipo, de até 200 MB, ficam no seu dispositivo.'],
        ],
    ],

    'timestamp-converter' => [
        'slug' => 'conversor-timestamp-unix',
        'name' => 'Conversor de timestamp Unix',
        'short_description' => 'Converta timestamps Unix em datas e datas em timestamps.',
        'description' => 'Converta timestamps epoch em segundos ou milissegundos para hora local, UTC e ISO 8601, e transforme qualquer data em um timestamp Unix. Mostra o timestamp atual em tempo real.',
        'seo_title' => 'Conversor de timestamp Unix para data e vice-versa',
        'seo_description' => 'Converta timestamps Unix em datas legíveis e vice-versa. Segundos ou milissegundos, hora local, UTC e ISO 8601, com o tempo epoch atual.',
        'content' => <<<'HTML'
<h2>Por que os desenvolvedores usam o tempo Unix</h2>
<p>Um timestamp Unix representa um instante com um único número que é igual no mundo inteiro, o que o torna ideal para bancos de dados, APIs, logs, a expiração de JWTs e cabeçalhos de cache. Convertê-los em datas legíveis é uma tarefa diária na depuração.</p>
<h2>Erros comuns</h2>
<ul>
<li>Confundir segundos e milissegundos: um número de 13 dígitos está em milissegundos.</li>
<li>Esquecer os fusos horários: timestamps estão sempre em UTC; só a exibição é local.</li>
<li>Guardar datas como inteiros de 32 bits, que estouram em janeiro de 2038.</li>
</ul>
<p>Está decodificando um token com claims <code>exp</code> e <code>iat</code>? O Decodificador JWT os converte automaticamente. Para contar dias do calendário entre datas, use a Calculadora de datas.</p>
HTML,
        'steps' => [
            'O timestamp Unix atual aparece no topo e se atualiza a cada segundo.',
            'Cole um timestamp em <strong>Timestamp para data</strong>. Segundos e milissegundos são detectados automaticamente.',
            'Veja o resultado como hora local, UTC, ISO 8601 e tempo relativo (por exemplo, “há 3 dias”).',
            'Use <strong>Data para timestamp</strong> para converter uma data e hora, no seu fuso horário ou em UTC.',
        ],
        'faq' => [
            ['q' => 'O que é um timestamp Unix?', 'a' => 'Um timestamp Unix (tempo epoch) é a quantidade de segundos desde 1º de janeiro de 1970 às 00:00:00 UTC. É usado por bancos de dados, APIs, logs e linguagens de programação porque é igual em todos os fusos horários.'],
            ['q' => 'Segundos ou milissegundos?', 'a' => 'A maioria dos sistemas (Unix, PHP, Python, bancos de dados) usa segundos: hoje são 10 dígitos. JavaScript e Java usam milissegundos: 13 dígitos. O conversor detecta qual você colou.'],
            ['q' => 'O que é o problema do ano 2038?', 'a' => 'Sistemas que guardam timestamps como inteiros de 32 bits com sinal estouram em 19 de janeiro de 2038 (timestamp 2147483647). Sistemas modernos usam valores de 64 bits, que bastam para bilhões de anos.'],
            ['q' => 'Como obtenho o timestamp atual no código?', 'a' => 'JavaScript: <code>Math.floor(Date.now() / 1000)</code>. PHP: <code>time()</code>. Python: <code>int(time.time())</code>. SQL (MySQL): <code>UNIX_TIMESTAMP()</code>.'],
        ],
    ],

    'color-converter' => [
        'slug' => 'conversor-de-cores',
        'name' => 'Conversor de cores e verificador de contraste',
        'short_description' => 'Converta cores HEX, RGB e HSL e verifique o contraste WCAG.',
        'description' => 'Converta cores entre HEX, RGB e HSL com um seletor de cor e verifique a taxa de contraste entre texto e fundo segundo os níveis WCAG AA e AAA.',
        'seo_title' => 'Conversor de cores HEX, RGB, HSL e contraste',
        'seo_description' => 'Converta HEX em RGB e HSL e verifique o contraste de cores WCAG para acessibilidade. Conversor de cores grátis com seletor e resultados AA/AAA.',
        'content' => <<<'HTML'
<h2>Como trabalhar com formatos de cor</h2>
<p>Ferramentas de design costumam fornecer as cores em HEX, enquanto frameworks de CSS, código de canvas e bibliotecas de imagem podem exigir RGB ou HSL. O HSL é especialmente prático para criar paletas: você mantém o matiz e muda a luminosidade para criar estados de hover, bordas e fundos que combinam.</p>
<h2>Contraste de cor acessível</h2>
<p>Cerca de um em cada doze homens tem algum tipo de daltonismo, e muita gente lê em telas de celular ao ar livre. As Diretrizes de Acessibilidade para Conteúdo Web (WCAG) exigem uma taxa de contraste mínima de 4.5:1 para texto normal e de 3:1 para texto grande. Confira cada combinação de texto e fundo do seu design, incluindo botões e textos de exemplo dos campos.</p>
<p>Vai criar um QR Code com as cores da sua marca? Teste o contraste aqui primeiro e depois use o Gerador de QR Code.</p>
HTML,
        'steps' => [
            'Digite uma cor em qualquer formato — <code>#0f766e</code>, <code>rgb(15, 118, 110)</code> ou <code>hsl(175, 77%, 26%)</code> — ou escolha com o seletor de cor.',
            'Copie a cor em HEX, RGB ou HSL para CSS, ferramentas de design ou código.',
            'No <strong>Verificador de contraste</strong>, informe uma cor de texto e uma cor de fundo.',
            'Confira os resultados WCAG: busque no mínimo AA (4.5:1) para texto normal.',
        ],
        'faq' => [
            ['q' => 'Qual a diferença entre HEX, RGB e HSL?', 'a' => 'Eles descrevem as mesmas cores de formas diferentes. HEX e RGB indicam os canais vermelho, verde e azul; o HSL usa matiz, saturação e luminosidade, o que facilita criar variações mais claras ou mais escuras de uma cor.'],
            ['q' => 'Qual taxa de contraste eu preciso?', 'a' => 'O WCAG 2 nível AA exige 4.5:1 para texto normal e 3:1 para texto grande (cerca de 24 px, ou 19 px em negrito). O nível AAA exige 7:1 e 4.5:1. Mais contraste deixa o texto legível para mais pessoas, incluindo quem tem baixa visão.'],
            ['q' => 'Por que o contraste acessível importa para o SEO?', 'a' => 'Texto legível mantém os visitantes na página, e auditorias de acessibilidade como o Lighthouse apontam textos com pouco contraste. Sites acessíveis também alcançam mais público.'],
            ['q' => 'Algo é enviado para a internet?', 'a' => 'Não. Todas as conversões e cálculos de contraste são feitos no seu navegador.'],
        ],
    ],

    'regex-tester' => [
        'slug' => 'testador-de-regex',
        'name' => 'Testador de regex',
        'short_description' => 'Teste expressões regulares com destaque em tempo real e grupos.',
        'description' => 'Teste expressões regulares JavaScript com destaque das correspondências em tempo real, grupos de captura, grupos nomeados e prévia de substituições. Os padrões rodam em um worker seguro em segundo plano.',
        'seo_title' => 'Testador de regex: teste expressões regulares',
        'seo_description' => 'Testador de regex grátis com destaque em tempo real, grupos de captura, flags e prévia de substituições. Expressões regulares JavaScript, seguro e privado.',
        'content' => <<<'HTML'
<h2>Guia rápido de regex</h2>
<ul>
<li><code>\d</code> dígito · <code>\w</code> caractere de palavra · <code>\s</code> espaço · <code>.</code> qualquer caractere</li>
<li><code>*</code> 0 ou mais · <code>+</code> 1 ou mais · <code>?</code> opcional · <code>{2,4}</code> entre 2 e 4</li>
<li><code>^</code> início · <code>$</code> fim · <code>\b</code> limite de palavra</li>
<li><code>[abc]</code> um de · <code>[^abc]</code> nenhum de · <code>a|b</code> um ou outro</li>
<li><code>(…)</code> grupo de captura · <code>(?:…)</code> sem captura · <code>(?=…)</code> lookahead</li>
</ul>
<h2>Dicas para testar</h2>
<p>Cole exemplos reais, incluindo os casos que não deveriam corresponder, e observe o destaque enquanto edita. Mantenha os padrões o mais específicos possível e evite quantificadores aninhados para que a busca não fique lenta. Para transformar texto em lote depois de acertar o padrão, o Conversor de maiúsculas e minúsculas e o Ordenar linhas podem ajudar.</p>
HTML,
        'steps' => [
            'Digite sua expressão regular no campo <strong>Padrão</strong> (sem as barras ao redor).',
            'Ative os flags de que precisar: <code>g</code> global, <code>i</code> ignorar maiúsculas, <code>m</code> multilinha, <code>s</code> o ponto inclui quebras de linha, <code>u</code> Unicode.',
            'Cole seu texto de teste. As correspondências são destacadas na hora e listadas com seus grupos de captura.',
            'Ative <strong>Substituir</strong> para ver a prévia de uma substituição usando <code>$1</code>, <code>$2</code> ou <code>$&lt;nome&gt;</code>.',
        ],
        'faq' => [
            ['q' => 'Qual variante de regex este testador usa?', 'a' => 'Ele usa o mecanismo de expressões regulares JavaScript (ECMAScript) do seu navegador, o mesmo do Node.js e do TypeScript. A maior parte da sintaxe é igual à do PCRE, Python e Java, mas alguns recursos, como o suporte a lookbehind ou quantificadores possessivos, variam.'],
            ['q' => 'O que são grupos de captura?', 'a' => 'Os parênteses capturam a parte da correspondência que contêm, para você reutilizá-la. Grupos nomeados como <code>(?&lt;ano&gt;\d{4})</code> deixam os padrões mais fáceis de ler. Use <code>(?:...)</code> para agrupar sem capturar.'],
            ['q' => 'Por que meu padrão excedeu o tempo limite?', 'a' => 'Quantificadores aninhados como <code>(a+)+</code> podem causar backtracking catastrófico, em que o mecanismo testa um número exponencial de combinações. O testador para depois de 1,5 segundo para manter o navegador respondendo.'],
            ['q' => 'Meu texto é enviado para algum lugar?', 'a' => 'Não. A busca roda no seu navegador, em um worker em segundo plano. Nada é enviado.'],
        ],
    ],
];
