<?php

/*
| Portuguese copy for converters, generators, health calculators and everyday
| tools. See content/pt/tools.php.
*/

return [
    'json-to-csv' => [
        'slug' => 'json-para-csv',
        'name' => 'JSON para CSV',
        'short_description' => 'Converta arrays JSON em CSV para Excel e Google Planilhas.',
        'description' => 'Converta JSON em CSV na hora. Objetos aninhados viram colunas e você pode escolher vírgula, ponto e vírgula, tabulação ou barra vertical como delimitador.',
        'seo_title' => 'Converter JSON para CSV grátis para Excel e Planilhas',
        'seo_description' => 'Converta JSON para CSV grátis online. Achata objetos aninhados, aceita vírgula, ponto e vírgula e tabulação, e baixa um CSV pronto para abrir.',
        'content' => <<<'HTML'
<h2>Abra dados JSON no Excel ou no Google Planilhas</h2>
<p>APIs e bancos de dados exportam JSON, mas as planilhas trabalham com linhas e colunas. Converter JSON em CSV permite ordenar, filtrar, criar gráficos e compartilhar os dados com pessoas que não trabalham com código.</p>
<h2>Como a conversão trata seus dados</h2>
<ul>
<li>Cada objeto do array vira uma linha.</li>
<li>Cada chave que aparece em algum objeto vira uma coluna.</li>
<li>Objetos aninhados são achatados, por exemplo <code>address.city</code>.</li>
<li>Valores que uma planilha poderia interpretar como fórmulas são escapados por segurança.</li>
</ul>
<p>Seu JSON é inválido? Corrija primeiro com o Formatador JSON. Precisa fazer o caminho inverso? Use o CSV para JSON.</p>
HTML,
        'steps' => [
            'Cole um array JSON de objetos (ou um único objeto) na entrada, ou clique em <strong>Carregar exemplo</strong>.',
            'Escolha o delimitador: vírgula para a maioria das ferramentas, ponto e vírgula para o Excel em países que usam vírgula decimal (como o Brasil), ou tabulação para TSV.',
            'O CSV aparece na hora. Objetos aninhados viram colunas como <code>address.city</code>.',
            'Copie o CSV ou baixe como arquivo <code>.csv</code>, pronto para Excel, Google Planilhas ou Numbers.',
        ],
        'faq' => [
            ['q' => 'Qual estrutura de JSON funciona melhor?', 'a' => 'Um array de objetos, como <code>[{&quot;name&quot;: &quot;Ada&quot;}, {&quot;name&quot;: &quot;Alan&quot;}]</code>. Cada objeto vira uma linha e cada chave uma coluna. Objetos com chaves diferentes são combinados; valores faltando ficam vazios.'],
            ['q' => 'Como objetos e arrays aninhados são tratados?', 'a' => 'Objetos aninhados são achatados com notação de ponto (<code>address.city</code>). Arrays são gravados na célula como texto JSON para não perder dados.'],
            ['q' => 'Por que usar ponto e vírgula como delimitador?', 'a' => 'Nos países em que a vírgula é o separador decimal (como o Brasil e Portugal), o Excel espera arquivos separados por ponto e vírgula. Escolha ponto e vírgula se, ao abrir o arquivo, as colunas aparecerem todas juntas.'],
            ['q' => 'É seguro abrir o CSV no Excel?', 'a' => 'Sim. Valores que começam com <code>=</code>, <code>+</code>, <code>-</code> ou <code>@</code> recebem um apóstrofo na frente para evitar injeção de fórmulas.'],
            ['q' => 'Meus dados são enviados para a internet?', 'a' => 'Não. A conversão é feita inteiramente no seu navegador.'],
        ],
    ],

    'csv-to-json' => [
        'slug' => 'csv-para-json',
        'name' => 'CSV para JSON',
        'short_description' => 'Converta CSV ou dados de planilhas em JSON limpo.',
        'description' => 'Cole um CSV ou dados copiados do Excel e receba um array JSON de objetos. Os delimitadores são detectados automaticamente e números e booleanos viram tipos reais.',
        'seo_title' => 'Converter CSV para JSON online, grátis',
        'seo_description' => 'Converta CSV para JSON grátis online. Detecta delimitadores, trata campos entre aspas, converte números e booleanos e funciona com dados do Excel.',
        'content' => <<<'HTML'
<h2>Por que converter CSV para JSON?</h2>
<p>JSON é o formato que aplicações web, APIs e JavaScript entendem de forma nativa. Converter uma exportação de planilha em JSON facilita popular um banco de dados, simular a resposta de uma API, importar dados em um CMS ou carregar configurações em uma aplicação.</p>
<h2>Dados limpos, tipos reais</h2>
<p>Com a detecção de tipos, números viram números e <code>true</code>/<code>false</code> viram booleanos, enquanto valores como CEPs com zeros à esquerda continuam como texto. Campos entre aspas com vírgulas e quebras de linha são interpretados corretamente.</p>
<p>Quer revisar ou embelezar o resultado? Cole no Formatador JSON. Para voltar a uma planilha, use o JSON para CSV.</p>
HTML,
        'steps' => [
            'Cole seus dados CSV na entrada ou clique em <strong>Carregar exemplo</strong>. Você pode colar direto do Excel ou do Google Planilhas.',
            'Deixe o delimitador em <strong>Automático</strong> ou escolha vírgula, ponto e vírgula, tabulação ou barra vertical.',
            'Deixe <strong>A primeira linha é cabeçalho</strong> ativado para receber um array de objetos, ou desative para receber um array de arrays.',
            'Com <strong>Detectar tipos</strong>, números e true/false viram valores JSON reais. Copie ou baixe o resultado como <code>.json</code>.',
        ],
        'faq' => [
            ['q' => 'Posso colar dados copiados do Excel ou do Google Planilhas?', 'a' => 'Sim. Os dados de uma planilha são copiados como texto separado por tabulações, e o delimitador automático detecta isso.'],
            ['q' => 'Como aspas e quebras de linha dentro das células são tratadas?', 'a' => 'O interpretador segue o padrão CSV (RFC 4180): campos entre aspas duplas podem conter vírgulas, quebras de linha e aspas escapadas (<code>&quot;&quot;</code>).'],
            ['q' => 'Por que alguns números ficam como texto?', 'a' => 'Valores com zeros à esquerda, como CEPs ou identificadores do tipo <code>007</code>, ficam como texto para não perder informação. Números muito longos também ficam como texto para evitar erros de precisão.'],
            ['q' => 'E os nomes de coluna repetidos ou vazios?', 'a' => 'Cabeçalhos repetidos recebem um sufixo (<code>name_2</code>) e os vazios se chamam <code>column_N</code>, então todos os valores são mantidos.'],
            ['q' => 'Meus dados ficam privados?', 'a' => 'Sim. A conversão acontece no seu navegador e seus dados nunca são enviados.'],
        ],
    ],

    'unit-converter' => [
        'slug' => 'conversor-de-unidades',
        'name' => 'Conversor de unidades',
        'short_description' => 'Converta comprimento, peso, temperatura, volume, área, velocidade e mais.',
        'description' => 'Converta na hora entre unidades métricas e imperiais: quilômetros em milhas, quilos em libras, Celsius em Fahrenheit, xícaras em mililitros, pés quadrados em metros quadrados, MB em GB e muito mais.',
        'seo_title' => 'Conversor de unidades: comprimento, peso e mais',
        'seo_description' => 'Conversor de unidades grátis: comprimento, peso, temperatura, volume, área, velocidade, tempo e dados. Unidades métricas e imperiais, resultados precisos.',
        'content' => <<<'HTML'
<h2>Sistema métrico e imperial</h2>
<p>A maior parte do mundo usa o sistema métrico (metros, quilos, litros, °C), enquanto os Estados Unidos usam principalmente unidades tradicionais (pés, libras, galões, °F) e o Reino Unido mistura os dois. Receitas, viagens, compras online, plantas de construção e lições de ciências obrigam a passar de um sistema para o outro o tempo todo.</p>
<h2>Valores de referência úteis</h2>
<ul>
<li>1 polegada = 2,54 cm · 1 pé = 30,48 cm · 1 milha = 1,609 km</li>
<li>1 kg = 2,2046 lb · 1 onça = 28,35 g</li>
<li>1 xícara (EUA) = 236,6 ml · 1 colher de sopa = 3 colheres de chá</li>
<li>0 °C = 32 °F · 100 °C = 212 °F</li>
<li>1 acre = 43.560 pés² · 1 hectare = 2,471 acres</li>
</ul>
<p>Trabalhando com datas em vez de medidas? Experimente a Calculadora de datas. Para dinheiro, a Calculadora de porcentagem resolve descontos e aumentos.</p>
HTML,
        'steps' => [
            'Escolha uma categoria: comprimento, peso, temperatura, volume, área, velocidade, tempo ou dados.',
            'Informe um valor e escolha as unidades de <strong>origem</strong> e de <strong>destino</strong>.',
            'O resultado se atualiza na hora. Use <strong>Inverter</strong> para trocar o sentido da conversão.',
            'Veja o mesmo valor em todas as outras unidades da categoria na tabela abaixo.',
        ],
        'faq' => [
            ['q' => 'Quantos centímetros tem uma polegada?', 'a' => 'Exatamente 2,54 centímetros. Um pé mede 30,48 cm e uma milha 1,609344 quilômetro: são definições internacionais exatas.'],
            ['q' => 'Como converto Celsius em Fahrenheit?', 'a' => 'Multiplique por 9/5 e some 32: °F = °C × 9/5 + 32. Por exemplo, 20 °C são 68 °F. Para voltar, subtraia 32 e multiplique por 5/9.'],
            ['q' => 'Quantas libras tem um quilo?', 'a' => 'Um quilograma equivale a cerca de 2,2046 libras, e uma libra é exatamente 0,45359237 quilograma.'],
            ['q' => 'As xícaras e os galões são dos EUA ou do Reino Unido?', 'a' => 'Xícaras, onças líquidas, pintas, quartos e galões usam as medidas dos EUA. Os galões do Reino Unido (imperiais) aparecem separados porque são cerca de 20% maiores.'],
            ['q' => 'Qual a diferença entre MB e MiB?', 'a' => 'Um megabyte (MB) são 1.000.000 de bytes, a medida usada pelos fabricantes de armazenamento. Um mebibyte (MiB) são 1.048.576 bytes (1024²), a usada por muitos sistemas operacionais. Por isso um disco de 1 TB aparece com cerca de 931 GiB.'],
        ],
    ],

    'qr-generator' => [
        'slug' => 'gerador-de-qr-code',
        'name' => 'Gerador de QR Code',
        'short_description' => 'Crie QR Codes para links, texto, e-mail, telefone e Wi-Fi.',
        'description' => 'Gere QR Codes personalizados com suas cores, tamanho e margem e baixe em PNG ou SVG. Grátis, sem conta e sem enviar nada a um servidor.',
        'seo_title' => 'Gerador de QR Code grátis em PNG e SVG',
        'seo_description' => 'Crie QR Codes grátis para URL, texto, e-mail, telefone e Wi-Fi. Cores, tamanho e margem personalizados. Baixe em PNG ou SVG. Sem cadastro.',
        'content' => <<<'HTML'
<h2>O que você pode fazer com um QR Code?</h2>
<ul>
<li><strong>URL</strong>: leve a um site, um cardápio, um portfólio ou uma página de avaliações.</li>
<li><strong>Wi-Fi</strong>: deixe os convidados entrarem na sua rede sem digitar a senha.</li>
<li><strong>E-mail e telefone</strong>: inicie um e-mail ou uma ligação com uma única leitura.</li>
<li><strong>Texto</strong>: compartilhe uma nota curta, um cupom de desconto ou um número de série.</li>
</ul>
<h2>Dicas para o seu QR Code sempre funcionar</h2>
<p>Mantenha um bom contraste — um código escuro sobre fundo claro — e deixe uma margem livre ao redor. Imprima com pelo menos 2 × 2 cm, e maior se for lido de longe, como em um cartaz. Use um nível de correção de erros mais alto se o código puder ser riscado ou ficar parcialmente coberto.</p>
<p>Os códigos que você cria aqui são estáticos e grátis para sempre: não expiram e não dependem do nosso site para funcionar.</p>
HTML,
        'steps' => [
            'Escolha o que o QR Code vai conter: uma <strong>URL</strong>, um <strong>texto</strong>, um <strong>e-mail</strong>, um número de <strong>telefone</strong> ou os dados de uma rede <strong>Wi-Fi</strong>.',
            'Preencha os dados. A prévia se atualiza na hora enquanto você digita.',
            'Personalize o tamanho, a margem e as cores. Mantenha uma cor escura sobre fundo claro para que qualquer celular consiga ler.',
            'Baixe seu QR Code em <strong>PNG</strong> para documentos e redes sociais, ou em <strong>SVG</strong> para gráfica e ferramentas de design.',
        ],
        'faq' => [
            ['q' => 'Estes QR Codes expiram?', 'a' => 'Não. Os QR Codes são estáticos: o conteúdo é codificado direto na imagem, então funcionam para sempre e não dependem do nosso site.'],
            ['q' => 'É melhor baixar em PNG ou em SVG?', 'a' => 'Use PNG para sites, documentos e redes sociais. Use SVG para gráfica, cartazes e ferramentas de design: é um formato vetorial que fica perfeitamente nítido em qualquer tamanho.'],
            ['q' => 'Como funciona o QR Code de Wi-Fi?', 'a' => 'Ao ser lido pela câmera do celular, o QR Code de Wi-Fi oferece conectar à rede automaticamente, sem digitar a senha. Funciona com iPhone e Android modernos.'],
            ['q' => 'O que é o nível de correção de erros?', 'a' => 'A correção de erros permite que um QR Code continue legível mesmo com uma parte danificada ou coberta. Os níveis mais altos (Q, H) são mais resistentes, mas o código fica mais denso. M é uma boa opção padrão.'],
            ['q' => 'Meus dados são salvos?', 'a' => 'Não. Os QR Codes são gerados no seu navegador. Suas URLs, mensagens e senhas de Wi-Fi nunca são enviadas aos nossos servidores.'],
        ],
    ],

    'password-generator' => [
        'slug' => 'gerador-de-senhas',
        'name' => 'Gerador de senhas',
        'short_description' => 'Crie senhas fortes e aleatórias com o tamanho e os caracteres que quiser.',
        'description' => 'Gere senhas aleatórias fortes escolhendo o tamanho, maiúsculas, minúsculas, números e símbolos. Veja a força em bits e crie até 50 senhas de uma vez.',
        'seo_title' => 'Gerador de senhas fortes e aleatórias',
        'seo_description' => 'Gere senhas fortes e aleatórias. Escolha o tamanho e os caracteres, exclua os parecidos e confira a força. As senhas são criadas no seu navegador.',
        'content' => <<<'HTML'
<h2>O que torna uma senha forte?</h2>
<p>A força depende principalmente do <strong>tamanho</strong> e de quão <strong>aleatória</strong> ela é. Uma senha aleatória de 16 caracteres com letras, números e símbolos tem mais de 100 bits de entropia, muito acima do que um atacante consegue adivinhar. Senhas inventadas por pessoas, como nomes, datas ou palavras com um número no final, são previsíveis por mais criativas que pareçam.</p>
<h2>Boas práticas</h2>
<ul>
<li>Use uma senha diferente para cada conta.</li>
<li>Guarde suas senhas em um gerenciador de senhas em vez de repeti-las.</li>
<li>Ative a verificação em duas etapas (2FA) no e-mail, no banco e nas redes sociais.</li>
<li>Troque a senha imediatamente se um serviço informar um vazamento de dados.</li>
</ul>
<p>Precisa de identificadores únicos em vez de segredos? Experimente o Gerador de UUID.</p>
HTML,
        'steps' => [
            'Escolha o <strong>tamanho</strong> da senha. Recomendam-se 16 caracteres ou mais para contas importantes.',
            'Selecione quais caracteres incluir: minúsculas, maiúsculas, números e símbolos.',
            'Se for digitar a senha à mão, você pode excluir caracteres parecidos como <code>l</code>, <code>1</code>, <code>O</code> e <code>0</code>.',
            'Copie sua senha com um clique. Clique em <strong>Gerar</strong> para outra, ou crie até 50 de uma vez.',
        ],
        'faq' => [
            ['q' => 'Estas senhas são seguras?', 'a' => 'Sim. Elas são geradas no seu navegador com a Web Crypto API, um gerador de números aleatórios criptograficamente seguro, e nunca são enviadas nem guardadas em nenhum servidor.'],
            ['q' => 'Que tamanho uma senha deve ter?', 'a' => 'Use pelo menos 12 caracteres, e 16 ou mais para o e-mail, o banco e a senha mestra do seu gerenciador. O tamanho traz mais segurança do que a complexidade.'],
            ['q' => 'O que significa a força em bits?', 'a' => 'A entropia mede quantas tentativas um atacante precisaria fazer. Cada bit a mais dobra o trabalho. Mais de 60 bits é bom para a maioria das contas, e mais de 80 bits é forte mesmo contra ataques offline.'],
            ['q' => 'Posso reutilizar uma senha forte?', 'a' => 'Não. Use uma senha única para cada conta e guarde-as em um gerenciador de senhas. Se um site sofrer um vazamento, suas outras contas continuam protegidas.'],
            ['q' => 'Cada tipo de caractere é garantido?', 'a' => 'Sim. Cada senha inclui pelo menos um caractere de cada tipo que você selecionar.'],
        ],
    ],

    'uuid-generator' => [
        'slug' => 'gerador-de-uuid',
        'name' => 'Gerador de UUID',
        'short_description' => 'Gere identificadores UUID v4 aleatórios e v7 ordenados por tempo, em lote.',
        'description' => 'Gere até 1000 UUIDs (GUIDs) de uma vez na versão 4 ou 7, em maiúsculas, sem hífens ou entre chaves, e valide UUIDs existentes.',
        'seo_title' => 'Gerador de UUID v4 e v7 (GUID) em lote',
        'seo_description' => 'Gere UUIDs grátis online. UUID v4 e v7 em lote, em maiúsculas, sem hífens ou com chaves no estilo GUID. Criptograficamente seguros e gerados no navegador.',
        'content' => <<<'HTML'
<h2>Quando usar UUIDs</h2>
<p>UUIDs são ideais quando os identificadores precisam ser criados em muitos lugares sem um contador central: bancos de dados distribuídos, aplicações que funcionam offline, filas de mensagens, nomes de arquivo e identificadores públicos que não deveriam revelar quantos registros existem.</p>
<h2>Versões de UUID em resumo</h2>
<ul>
<li><strong>v4</strong>: 122 bits aleatórios; a mais compatível.</li>
<li><strong>v7</strong>: começa com um timestamp Unix, então os IDs ficam ordenados pela data de criação e mantêm os índices do banco de dados eficientes.</li>
<li><strong>v1</strong>: baseada no tempo e na máquina; em grande parte substituída pela v7.</li>
</ul>
<p>Precisa de segredos aleatórios em vez de identificadores? Use o Gerador de senhas.</p>
HTML,
        'steps' => [
            'Escolha quantos UUIDs você precisa (até 1000 de uma vez).',
            'Escolha a versão: <strong>v4</strong> (aleatória, a mais comum) ou <strong>v7</strong> (ordenada por tempo, ideal para chaves de banco de dados).',
            'Se quiser, mude para maiúsculas, remova os hífens ou coloque cada UUID entre chaves.',
            'Copie a lista ou baixe como arquivo de texto. Clique em <strong>Gerar</strong> para um lote novo.',
        ],
        'faq' => [
            ['q' => 'O que é um UUID?', 'a' => 'Um UUID (identificador único universal), também chamado de GUID, é um identificador de 128 bits escrito como 32 dígitos hexadecimais, por exemplo <code>123e4567-e89b-42d3-a456-426614174000</code>. Eles podem ser gerados em qualquer lugar sem coordenação e, na prática, são únicos.'],
            ['q' => 'Uso UUID v4 ou v7?', 'a' => 'O v4 é totalmente aleatório e funciona em todo lugar. O v7 começa com um timestamp, então os IDs novos ficam ordenados pela data de criação, o que deixa os índices do banco de dados mais rápidos e compactos. Use v7 para chaves primárias quando o seu stack suportar.'],
            ['q' => 'Estes UUIDs são seguros e únicos?', 'a' => 'Eles são gerados com o gerador de números aleatórios criptograficamente seguro do seu navegador (Web Crypto API). A probabilidade de colisão no v4 é astronomicamente baixa.'],
            ['q' => 'GUID é o mesmo que UUID?', 'a' => 'Sim. GUID é o nome que a Microsoft usa para o mesmo formato de identificador de 128 bits. Use as opções de maiúsculas e chaves para ter o estilo GUID clássico <code>{XXXXXXXX-...}</code>.'],
        ],
    ],

    'random-number-generator' => [
        'slug' => 'gerador-de-numeros-aleatorios',
        'name' => 'Gerador de números aleatórios',
        'short_description' => 'Gere números aleatórios em qualquer intervalo, com ou sem repetição.',
        'description' => 'Gere um ou milhares de números realmente aleatórios em qualquer intervalo, sem repetição e com opções de ordenação. Inclui atalhos para jogar dados e sortear números de loteria.',
        'seo_title' => 'Gerador de números aleatórios sem repetição',
        'seo_description' => 'Gerador de números aleatórios grátis. Sorteie números em qualquer intervalo, com ou sem repetição, ordenados ou não. Criptograficamente seguro e instantâneo.',
        'content' => <<<'HTML'
<h2>Usos populares</h2>
<ul>
<li><strong>Sorteios e rifas:</strong> sorteie números de bilhetes vencedores sem repetir.</li>
<li><strong>Jogos:</strong> jogue um dado ou escolha um número de 1 a 10.</li>
<li><strong>Números de loteria:</strong> gere seis números diferentes de 1 a 60.</li>
<li><strong>Ensino e pesquisa:</strong> selecione amostras aleatórias ou distribua grupos.</li>
</ul>
<h2>Realmente aleatório e justo</h2>
<p>Muitos geradores simples usam funções pseudoaleatórias previsíveis. Este usa o gerador criptograficamente seguro do seu navegador e evita o viés sutil dos métodos ingênuos, então cada número do intervalo tem a mesma probabilidade. Para sortear nomes em vez de números, use o Sorteador de nomes. Para senhas aleatórias fortes, use o Gerador de senhas.</p>
HTML,
        'steps' => [
            'Defina o valor <strong>mínimo</strong> e o <strong>máximo</strong> (ambos incluídos), ou escolha um atalho como jogar um dado ou um sorteio de loteria.',
            'Escolha quantos números precisa: até 10.000 de uma vez.',
            'Ative <strong>Sem repetições</strong> para rifas e sorteios e, se quiser, ordene os resultados.',
            'Clique em <strong>Gerar</strong> e copie os números.',
        ],
        'faq' => [
            ['q' => 'Estes números são realmente aleatórios?', 'a' => 'Eles são gerados com o gerador de números aleatórios criptograficamente seguro do seu navegador (Web Crypto API), com amostragem sem viés para que todos os números do intervalo tenham a mesma probabilidade.'],
            ['q' => 'Posso usar para uma rifa ou um sorteio?', 'a' => 'Sim. Numere as participações, defina o intervalo de 1 até o número de participações, ative Sem repetições e gere quantos vencedores precisar. Para nomes, use o Sorteador de nomes.'],
            ['q' => 'O mínimo e o máximo estão incluídos?', 'a' => 'Sim. Um intervalo de 1 a 6 pode dar 1, 2, 3, 4, 5 ou 6, como um dado.'],
            ['q' => 'Posso gerar números negativos?', 'a' => 'Sim. Use um mínimo negativo, por exemplo de −50 a 50.'],
        ],
    ],

    'bmi-calculator' => [
        'slug' => 'calculadora-de-imc',
        'name' => 'Calculadora de IMC',
        'short_description' => 'Calcule seu índice de massa corporal e sua faixa de peso saudável.',
        'description' => 'Calcule seu IMC em unidades métricas ou dos EUA, veja em que categoria ele está e a faixa de peso saudável para a sua altura, segundo as diretrizes para adultos da OMS e do CDC.',
        'seo_title' => 'Calculadora de IMC para adultos',
        'seo_description' => 'Calculadora de IMC grátis para adultos, em quilos ou libras. Descubra seu índice de massa corporal, a categoria e a faixa de peso saudável para a sua altura.',
        'content' => <<<'HTML'
<h2>O que o seu IMC significa</h2>
<p>O índice de massa corporal compara seu peso com sua altura para chegar a um único número que os órgãos de saúde usam para classificar o peso. Na maioria dos adultos, um IMC entre 18,5 e 24,9 está associado aos menores riscos para a saúde, enquanto valores mais altos estão ligados a um risco maior de doenças como diabetes tipo 2 e doenças cardíacas.</p>
<h2>Limitações do IMC</h2>
<ul>
<li>Não diferencia músculo de gordura, então pessoas musculosas podem aparecer com sobrepeso.</li>
<li>Não mostra onde a gordura se acumula; a medida da cintura é outro dado útil.</li>
<li>As faixas saudáveis podem variar conforme a idade, o sexo e a origem étnica.</li>
</ul>
<p>Para transformar sua meta em um plano diário, estime suas necessidades de energia com a Calculadora de calorias.</p>
HTML,
        'steps' => [
            'Escolha <strong>Métrico</strong> (quilos e centímetros) ou <strong>Unidades dos EUA</strong> (libras, pés e polegadas).',
            'Informe seu peso e sua altura. O resultado se atualiza enquanto você digita.',
            'Veja seu IMC, a categoria e onde ele fica na escala.',
            'Confira a faixa de peso saudável para a sua altura.',
        ],
        'faq' => [
            ['q' => 'Como o IMC é calculado?', 'a' => 'O índice de massa corporal é o seu peso em quilos dividido pela sua altura em metros ao quadrado (kg/m²). Em unidades dos EUA equivale a 703 × libras ÷ polegadas².'],
            ['q' => 'Quais são as categorias de IMC para adultos?', 'a' => 'Abaixo de 18,5 é abaixo do peso, 18,5–24,9 é peso saudável, 25–29,9 é sobrepeso e 30 ou mais é obesidade, segundo a Organização Mundial da Saúde e o CDC.'],
            ['q' => 'O IMC é preciso?', 'a' => 'O IMC é uma ferramenta de triagem rápida, não um diagnóstico. Ele não diferencia músculo de gordura, então atletas podem ter valores altos, e não considera idade, sexo, origem étnica nem distribuição de gordura. Converse com um profissional de saúde.'],
            ['q' => 'Crianças podem usar esta calculadora de IMC?', 'a' => 'Não. Em crianças e adolescentes, o IMC deve ser comparado com percentis por idade e sexo. Esta calculadora é para adultos a partir de 20 anos.'],
            ['q' => 'Meus dados são salvos?', 'a' => 'Não. O cálculo é feito no seu navegador e nada é enviado aos nossos servidores.'],
        ],
    ],

    'calorie-calculator' => [
        'slug' => 'calculadora-de-calorias',
        'name' => 'Calculadora de calorias',
        'short_description' => 'Estime as calorias diárias para perder, manter ou ganhar peso.',
        'description' => 'Calcule sua taxa metabólica basal e seu gasto energético total diário com a equação de Mifflin-St Jeor, além das calorias diárias para perder, manter ou ganhar peso.',
        'seo_title' => 'Calculadora de calorias diárias e gasto energético',
        'seo_description' => 'Calculadora de calorias grátis. Descubra sua TMB e seu gasto energético diário com Mifflin-St Jeor, e as calorias para perder, manter ou ganhar peso.',
        'content' => <<<'HTML'
<h2>Quantas calorias você precisa?</h2>
<p>Suas necessidades diárias de calorias dependem do seu tamanho, idade, sexo e nível de atividade. A calculadora primeiro estima sua taxa metabólica basal — a energia de que seu corpo precisa em repouso — e depois a multiplica por um fator de atividade para estimar seu gasto energético total diário (GET). Comer por volta do seu GET mantém o peso estável.</p>
<h2>Como aproveitar os números</h2>
<ul>
<li>Escolha seu nível de atividade com honestidade: a maioria das pessoas o superestima.</li>
<li>Busque mudanças graduais: entre 0,25 e 0,5 kg por semana.</li>
<li>Priorize proteínas, verduras e alimentos integrais para se sentir satisfeito com menos calorias.</li>
<li>Refaça o cálculo sempre que seu peso mudar entre 2 e 5 kg.</li>
</ul>
<p>Veja onde você está hoje com a Calculadora de IMC.</p>
HTML,
        'steps' => [
            'Escolha seu sexo e informe sua idade.',
            'Informe seu peso e sua altura em unidades métricas ou dos EUA.',
            'Escolha o nível de atividade que melhor descreve uma semana típica.',
            'Veja as calorias que você gasta por dia (GET) e as metas diárias para perder, manter ou ganhar peso.',
        ],
        'faq' => [
            ['q' => 'Como as calorias diárias são calculadas?', 'a' => 'A calculadora estima sua taxa metabólica basal com a equação de Mifflin-St Jeor — considerada uma das mais precisas para a maioria dos adultos — e a multiplica por um fator de atividade para obter o gasto energético total diário (GET).'],
            ['q' => 'Qual a diferença entre TMB e GET?', 'a' => 'A TMB é a energia que seu corpo usa em repouso absoluto. O GET soma todo o resto: o movimento do dia a dia, os exercícios e a digestão. O GET é o que você deve comer para manter o peso.'],
            ['q' => 'Quantas calorias devo comer para emagrecer?', 'a' => 'Um déficit de cerca de 500 calorias por dia leva a perder aproximadamente 0,5 kg por semana. A maioria dos adultos não deveria ficar abaixo de cerca de 1200 (mulheres) ou 1500 (homens) calorias por dia sem acompanhamento médico.'],
            ['q' => 'Por que meu resultado é diferente do meu relógio esportivo?', 'a' => 'Todos os números de calorias são estimativas. Relógios e fórmulas usam premissas diferentes. Use o resultado como ponto de partida e ajuste conforme seu peso mudar em 2 ou 3 semanas.'],
            ['q' => 'Isto é aconselhamento médico?', 'a' => 'Não. Em caso de gravidez, doenças ou metas esportivas, consulte um médico ou um nutricionista.'],
        ],
    ],

    'due-date-calculator' => [
        'slug' => 'calculadora-data-do-parto',
        'name' => 'Calculadora de data do parto',
        'short_description' => 'Estime a data do parto, a semana de gravidez e o trimestre.',
        'description' => 'Informe o primeiro dia da última menstruação e a duração do seu ciclo para estimar a data do parto, a data da concepção, quantas semanas de gravidez você tem e os principais marcos.',
        'seo_title' => 'Calculadora de data do parto e semanas de gravidez',
        'seo_description' => 'Calculadora de data do parto grátis. Estime a data provável do parto, a concepção, a semana de gravidez e o trimestre a partir da sua última menstruação.',
        'content' => <<<'HTML'
<h2>Como o tempo de gravidez é calculado</h2>
<p>Uma gravidez típica dura cerca de 40 semanas (280 dias) contadas a partir do primeiro dia da última menstruação, não da concepção. Se o seu ciclo é mais longo ou mais curto que 28 dias, a ovulação costuma acontecer mais tarde ou mais cedo, então a calculadora ajusta a data do parto conforme essa diferença.</p>
<h2>Principais marcos</h2>
<ul>
<li><strong>Semanas 1–12:</strong> primeiro trimestre; aqui costumam acontecer a primeira consulta de pré-natal e o primeiro ultrassom.</li>
<li><strong>Semanas 18–22:</strong> o ultrassom morfológico detalhado.</li>
<li><strong>Semanas 27–40:</strong> terceiro trimestre, com consultas mais frequentes.</li>
<li><strong>Semanas 39–40:</strong> a gravidez é considerada a termo.</li>
</ul>
<p>Quer acompanhar a contagem regressiva? A Calculadora de datas mostra o número exato de dias entre hoje e a data do parto.</p>
HTML,
        'steps' => [
            'Informe o <strong>primeiro dia da sua última menstruação</strong> (DUM).',
            'Ajuste a <strong>duração média do seu ciclo</strong> se não for de 28 dias.',
            'Veja a data provável do parto, quantas semanas de gravidez você tem e em que trimestre está.',
            'Confira os principais marcos da gravidez.',
        ],
        'faq' => [
            ['q' => 'Como a data do parto é calculada?', 'a' => 'A calculadora usa a regra de Naegele: 280 dias (40 semanas) depois do primeiro dia da última menstruação, ajustados para ciclos mais longos ou mais curtos que 28 dias.'],
            ['q' => 'Quão precisa é a data do parto?', 'a' => 'É uma estimativa. Só cerca de 4% dos bebês nascem exatamente na data; a maioria chega entre as semanas 37 e 42. Um ultrassom precoce dá a data mais precisa, e seu profissional de saúde pode ajustá-la.'],
            ['q' => 'Por que as semanas são contadas a partir da última menstruação?', 'a' => 'A gravidez é contada a partir do primeiro dia da última menstruação porque raramente se sabe com exatidão a data da ovulação e da concepção. Por isso, no momento da concepção já se consideram cerca de 2 semanas de gravidez.'],
            ['q' => 'Quais são os trimestres?', 'a' => 'O primeiro trimestre vai até o fim da semana 12, o segundo da semana 13 à 26, e o terceiro da semana 27 até o nascimento.'],
            ['q' => 'Isto é aconselhamento médico?', 'a' => 'Não. Esta ferramenta é apenas informativa. Siga sempre as orientações do seu médico ou da sua obstetra.'],
        ],
    ],

    'online-timer' => [
        'slug' => 'timer-online',
        'name' => 'Timer e cronômetro online',
        'short_description' => 'Timer com contagem regressiva, cronômetro com voltas e Pomodoro.',
        'description' => 'Um timer online grátis com alarme, um cronômetro com tempos por volta e um timer Pomodoro para manter o foco. Preciso em abas em segundo plano, com o tempo visível no título da aba.',
        'seo_title' => 'Timer e cronômetro online com alarme',
        'seo_description' => 'Timer online grátis com alarme, cronômetro com voltas e timer Pomodoro. Preciso em abas em segundo plano. Sem app e sem cadastro.',
        'content' => <<<'HTML'
<h2>Três ferramentas em uma</h2>
<p>Use o <strong>timer</strong> para cozinhar, treinar, apresentações, provas e cochilos; o <strong>cronômetro</strong> com voltas para correr, nadar ou medir tarefas; e o <strong>timer Pomodoro</strong> para estudar ou trabalhar em blocos de 25 minutos de foco com pausas regulares. O tempo aparece na aba do navegador, então você pode continuar trabalhando em outra aba e ver quanto falta.</p>
<h2>Dicas para trabalhar com foco</h2>
<ul>
<li>Escolha uma única tarefa por Pomodoro e silencie as notificações.</li>
<li>Use as pausas para levantar, se alongar e descansar a vista.</li>
<li>Anote quantas rodadas cada tarefa leva para planejar melhor da próxima vez.</li>
</ul>
<p>Precisa contar dias em vez de minutos? Use a Calculadora de datas.</p>
HTML,
        'steps' => [
            'Escolha <strong>Timer</strong> para uma contagem regressiva, <strong>Cronômetro</strong> para medir tempo com voltas ou <strong>Pomodoro</strong> para sessões de foco.',
            'No timer, escolha um atalho (de 1 a 60 minutos) ou digite horas, minutos e segundos.',
            'Clique em <strong>Iniciar</strong>. O tempo restante também aparece no título da aba, então você pode trocar de aba.',
            'Quando o tempo acaba, um alarme toca. Desative o som se preferir um timer silencioso.',
        ],
        'faq' => [
            ['q' => 'O timer continua funcionando se eu trocar de aba?', 'a' => 'Sim. O timer se baseia no relógio e não na contagem de pulsos, então continua preciso em abas em segundo plano, e o tempo restante aparece no título da aba.'],
            ['q' => 'Por que não ouvi o alarme?', 'a' => 'Confira se a opção de som está ativada e se o dispositivo não está no silencioso. Alguns navegadores bloqueiam o som até você interagir com a página; clicar em Iniciar conta como interação.'],
            ['q' => 'O que é a técnica Pomodoro?', 'a' => 'É um método de gestão do tempo: você trabalha com foco total por 25 minutos e depois faz uma pausa de 5 minutos. Depois de quatro rodadas, faz uma pausa mais longa, de 15 a 30 minutos. O timer muda de fase automaticamente.'],
            ['q' => 'Quão preciso é o cronômetro?', 'a' => 'Ele mostra centésimos de segundo e usa o relógio do seu dispositivo, que tem precisão de poucos milissegundos. Use Volta para registrar tempos parciais.'],
            ['q' => 'Funciona offline?', 'a' => 'Depois que a página carrega, o timer, o cronômetro e o Pomodoro funcionam no seu navegador sem conexão com a internet.'],
        ],
    ],

    'random-name-picker' => [
        'slug' => 'sorteador-de-nomes',
        'name' => 'Sorteador de nomes',
        'short_description' => 'Sorteie vencedores de uma lista ou divida as pessoas em equipes.',
        'description' => 'Cole uma lista de nomes para sortear um ou mais vencedores de forma justa, removendo-os para a próxima rodada se quiser, ou divida todo mundo em equipes aleatórias.',
        'seo_title' => 'Sorteador de nomes online: vencedores e equipes',
        'seo_description' => 'Sorteador de nomes grátis. Sorteie vencedores de uma lista para rifas e aulas, ou divida os nomes em equipes aleatórias. Sem cadastro.',
        'content' => <<<'HTML'
<h2>Ideal para aulas, equipes e sorteios</h2>
<p>Professores usam o sorteio de nomes para escolher alunos de forma justa, equipes de trabalho para decidir quem apresenta primeiro e criadores de conteúdo para escolher os vencedores de um sorteio na frente do público. Como o sorteio é aleatório e transparente, ninguém pode dizer que foi combinado.</p>
<h2>Dicas</h2>
<ul>
<li>Ative <strong>Remover os nomes sorteados</strong> para que todos tenham a sua vez antes de alguém sair duas vezes.</li>
<li>Use <strong>Formar equipes</strong> para trabalhos em grupo, esportes e jogos.</li>
<li>Limpe a lista primeiro com o Remover linhas duplicadas se você copiou os nomes de vários lugares.</li>
</ul>
<p>Vai sortear bilhetes numerados? Use o Gerador de números aleatórios.</p>
HTML,
        'steps' => [
            'Cole ou digite os nomes, um por linha. Você pode colar uma coluna direto de uma planilha.',
            'Escolha <strong>Sortear vencedores</strong> para sortear um ou mais nomes, ou <strong>Formar equipes</strong> para dividir todo mundo em grupos aleatórios.',
            'Se quiser, remova da lista os nomes sorteados para que o próximo sorteio inclua só o restante.',
            'Clique no botão e copie o resultado para compartilhar.',
        ],
        'faq' => [
            ['q' => 'O sorteio de nomes é justo?', 'a' => 'Sim. Os vencedores são escolhidos com um gerador aleatório criptograficamente seguro, então cada nome tem exatamente a mesma chance. A animação é só por diversão: não influencia o resultado.'],
            ['q' => 'Posso sortear vários vencedores de uma vez?', 'a' => 'Sim. Indique quantos vencedores você precisa; o mesmo nome nunca sai duas vezes em um sorteio.'],
            ['q' => 'Como as equipes são formadas?', 'a' => 'Todos são embaralhados aleatoriamente e distribuídos na quantidade de equipes que você escolher, então as equipes diferem no máximo em uma pessoa.'],
            ['q' => 'E se um nome aparecer duas vezes?', 'a' => 'Cada linha conta como uma participação, então um nome que aparece duas vezes tem o dobro de chances. Se não quiser isso, use antes o Remover linhas duplicadas.'],
            ['q' => 'Os nomes são salvos?', 'a' => 'Não. A lista fica no seu navegador e nunca é enviada.'],
        ],
    ],
];
