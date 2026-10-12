<?php

/*
| Portuguese copy for the text tools. See content/pt/tools.php.
*/

return [
    'word-counter' => [
        'slug' => 'contador-de-palavras',
        'name' => 'Contador de palavras',
        'short_description' => 'Conte palavras, caracteres, frases e tempo de leitura na hora.',
        'description' => 'Cole ou digite seu texto para contar palavras, caracteres com e sem espaços, frases e parágrafos, além do tempo de leitura, do tempo de fala e da densidade de palavras-chave.',
        'seo_title' => 'Contador de palavras e caracteres online',
        'seo_description' => 'Contador de palavras grátis. Conte palavras, caracteres (com e sem espaços), frases e parágrafos, e veja o tempo de leitura e as palavras-chave.',
        'content' => <<<'HTML'
<h2>Limites de tamanho comuns</h2>
<ul>
<li><strong>Meta description:</strong> cerca de 150–160 caracteres.</li>
<li><strong>Título de página para o Google:</strong> cerca de 50–60 caracteres.</li>
<li><strong>Post no X (Twitter):</strong> 280 caracteres.</li>
<li><strong>Post no LinkedIn:</strong> 3000 caracteres.</li>
<li><strong>Redações e trabalhos acadêmicos:</strong> costumam pedir entre 500 e 1500 palavras.</li>
<li><strong>Artigo de blog que se posiciona bem:</strong> muitas vezes 1000–2000 palavras, dependendo do tema.</li>
</ul>
<h2>Dicas de escrita</h2>
<p>Na tela as pessoas leem por cima, então divida parágrafos longos em outros mais curtos, de duas a quatro frases, e use subtítulos para guiar a leitura. Frases curtas funcionam melhor na internet. Use a lista de palavras-chave para conferir se o tema principal aparece de forma natural e se você não repete demais nenhuma palavra. Para corrigir maiúsculas, use o Conversor de maiúsculas e minúsculas; para comparar dois rascunhos, use o Comparar textos.</p>
HTML,
        'steps' => [
            'Digite ou cole seu texto na caixa. As contagens se atualizam na hora enquanto você digita.',
            'Veja o número de palavras, caracteres (com e sem espaços), frases, parágrafos e linhas.',
            'Confira o tempo estimado de leitura e de fala: útil para artigos, discursos e apresentações.',
            'Confira as palavras mais frequentes e a densidade delas para não abusar de nenhuma e conferir o foco de SEO.',
        ],
        'faq' => [
            ['q' => 'Como as palavras são contadas?', 'a' => 'Uma palavra é qualquer sequência de letras ou números. Palavras com hífen, como <em>guarda-chuva</em>, contam como uma só. Sinais de pontuação e emoji não contam como palavras.'],
            ['q' => 'A contagem de caracteres inclui os espaços?', 'a' => 'As duas aparecem: <strong>Caracteres</strong> inclui espaços e quebras de linha, e <strong>Caracteres (sem espaços)</strong> exclui todos os espaços. Emoji e letras acentuadas contam como um caractere cada.'],
            ['q' => 'Como o tempo de leitura é calculado?', 'a' => 'O tempo de leitura considera uma velocidade média de leitura silenciosa de 238 palavras por minuto. O tempo de fala considera 130 palavras por minuto, um ritmo comum em apresentações.'],
            ['q' => 'O que é densidade de palavras-chave?', 'a' => 'É a frequência com que uma palavra aparece em relação ao total de palavras. Palavras muito comuns, como <em>o</em>, <em>a</em> ou <em>e</em>, são ignoradas para que você veja as palavras que definem o seu texto.'],
            ['q' => 'Meu texto é salvo ou enviado?', 'a' => 'Não. Tudo é contado no seu navegador. Seu texto nunca é enviado a um servidor.'],
        ],
    ],

    'case-converter' => [
        'slug' => 'converter-maiusculas-minusculas',
        'name' => 'Conversor de maiúsculas e minúsculas',
        'short_description' => 'Mude o texto para MAIÚSCULAS, minúsculas, Estilo Título, camelCase e mais.',
        'description' => 'Converta texto entre maiúsculas, minúsculas, estilo título, estilo frase e formatos para desenvolvedores como camelCase, snake_case e kebab-case com um clique.',
        'seo_title' => 'Converter maiúsculas e minúsculas online',
        'seo_description' => 'Conversor de maiúsculas e minúsculas grátis. Passe textos para MAIÚSCULAS, minúsculas, Estilo Título, estilo frase, camelCase, snake_case e kebab-case na hora.',
        'content' => <<<'HTML'
<h2>Qual formato de texto usar?</h2>
<ul>
<li><strong>Estilo frase</strong>: textos, rótulos de interface e a maioria dos títulos em português.</li>
<li><strong>Estilo Título</strong>: títulos em inglês de manchetes, livros e artigos.</li>
<li><strong>MAIÚSCULAS</strong>: rótulos curtos, siglas e ênfase (com moderação).</li>
<li><strong>camelCase e PascalCase</strong>: variáveis, funções e classes em JavaScript, Java e C#.</li>
<li><strong>snake_case e CONSTANT_CASE</strong>: Python, Ruby, colunas SQL e constantes.</li>
<li><strong>kebab-case</strong>: URLs, classes CSS e nomes de arquivo.</li>
</ul>
<p>Escreveu um parágrafo inteiro com o Caps Lock ligado sem perceber? Cole aqui e converta para estilo frase com um clique em vez de digitar tudo de novo. Para contar palavras ou caracteres depois, use o Contador de palavras.</p>
HTML,
        'steps' => [
            'Cole ou digite seu texto na caixa de entrada.',
            'Escolha um formato: MAIÚSCULAS, minúsculas, Estilo Título, estilo frase e outros.',
            'Se você programa, pode converter o texto em <strong>camelCase</strong>, <strong>snake_case</strong>, <strong>kebab-case</strong>, <strong>PascalCase</strong> ou <strong>CONSTANT_CASE</strong>.',
            'Copie o texto convertido ou baixe como arquivo.',
        ],
        'faq' => [
            ['q' => 'O que é o Estilo Título?', 'a' => 'O Estilo Título coloca em maiúscula a primeira letra de cada palavra importante, enquanto palavras curtas do inglês como <em>a</em>, <em>and</em>, <em>of</em> e <em>the</em> ficam em minúscula, exceto no início ou no fim. É o estilo de manchetes e livros em inglês; em português recomenda-se o estilo frase.'],
            ['q' => 'Qual a diferença entre Estilo Título e Cada Palavra Com Maiúscula?', 'a' => 'Cada Palavra Com Maiúscula coloca em maiúscula todas as palavras, incluindo as curtas. O Estilo Título segue as regras de manchetes em inglês e deixa as palavras pequenas em minúscula.'],
            ['q' => 'Como funciona o estilo frase?', 'a' => 'O estilo frase passa tudo para minúsculas e coloca em maiúscula a primeira letra de cada frase. Nomes próprios precisam ser corrigidos à mão.'],
            ['q' => 'Posso consertar um texto escrito com o Caps Lock ligado?', 'a' => 'Sim. Use iNVERTIDO para trocar maiúsculas e minúsculas, ou estilo frase para reescrevê-lo corretamente.'],
            ['q' => 'Meu texto é salvo?', 'a' => 'Não. A conversão é feita no seu navegador e nada é enviado.'],
        ],
    ],

    'text-compare' => [
        'slug' => 'comparar-textos',
        'name' => 'Comparar textos',
        'short_description' => 'Compare dois textos e destaque as diferenças.',
        'description' => 'Cole duas versões de um texto para ver exatamente o que foi adicionado e removido, linha por linha ou palavra por palavra. Ideal para documentos, contratos e código.',
        'seo_title' => 'Comparar textos: encontre as diferenças',
        'seo_description' => 'Compare dois textos online e destaque as diferenças por linha ou por palavra. Ignore maiúsculas e espaços. Privado: seu texto não sai do navegador.',
        'content' => <<<'HTML'
<h2>O que você pode comparar</h2>
<ul>
<li>Duas versões de um contrato, uma redação ou um artigo.</li>
<li>Arquivos de configuração e trechos de código.</li>
<li>Listas exportadas em momentos diferentes, para ver o que entrou ou saiu.</li>
<li>Traduções ou revisões de texto antes de publicar.</li>
</ul>
<h2>Comparar por linha ou por palavra</h2>
<p>O modo por linha mostra quais linhas mudaram: perfeito para código e dados. O modo por palavra aponta exatamente quais palavras mudaram dentro de um parágrafo: ideal para revisar textos. Combine com o Remover linhas duplicadas e o Ordenar linhas para comparar listas em que a ordem não importa.</p>
HTML,
        'steps' => [
            'Cole o texto original à esquerda e o texto alterado à direita.',
            "As diferenças aparecem abaixo na hora: o texto <span class='rounded bg-danger-soft px-1 text-danger'>removido</span> em vermelho e o <span class='rounded bg-success-soft px-1 text-success'>adicionado</span> em verde.",
            'Compare <strong>por linha</strong> para código, listas e documentos, ou <strong>por palavra</strong> para encontrar pequenas mudanças nas frases.',
            'Ignore maiúsculas ou espaços extras quando só o conteúdo importar.',
        ],
        'faq' => [
            ['q' => 'Como funciona a comparação de textos?', 'a' => 'A ferramenta usa o algoritmo de diferenças de Myers, a mesma abordagem do Git, para encontrar o menor conjunto de inserções e remoções que transforma o texto original no novo.'],
            ['q' => 'É melhor comparar por linha ou por palavra?', 'a' => 'O modo por linha é melhor para código, dados CSV, listas e documentos longos. O modo por palavra destaca exatamente quais palavras mudaram dentro das frases, ideal para revisar textos e versões de contratos.'],
            ['q' => 'Posso comparar código?', 'a' => 'Sim. Use o modo por linha. Ative Ignorar espaços para desconsiderar mudanças que são só de recuo.'],
            ['q' => 'Existe limite de tamanho?', 'a' => 'Textos com milhares de linhas são comparados na hora. Se os dois textos forem extremamente diferentes, a ferramenta pede para você comparar trechos menores.'],
            ['q' => 'Meu texto é enviado para a internet?', 'a' => 'Não. A comparação é feita inteiramente no seu navegador, então documentos confidenciais continuam privados.'],
        ],
    ],

    'remove-duplicate-lines' => [
        'slug' => 'remover-linhas-duplicadas',
        'name' => 'Remover linhas duplicadas',
        'short_description' => 'Apague as linhas repetidas de uma lista e mantenha a ordem original.',
        'description' => 'Remova linhas duplicadas de listas de e-mails, palavras-chave, URLs ou nomes em um único passo, com opções para ignorar maiúsculas, remover espaços e eliminar linhas vazias.',
        'seo_title' => 'Remover linhas duplicadas de qualquer lista',
        'seo_description' => 'Remova linhas duplicadas grátis. Mantém a ordem original, pode ignorar maiúsculas e remover espaços. Funciona com listas grandes no seu navegador.',
        'content' => <<<'HTML'
<h2>Limpe qualquer lista</h2>
<p>Duplicatas aparecem em listas de e-mails, pesquisas de palavras-chave, catálogos de produtos e exportações de dados. Removê-las evita mandar o mesmo e-mail duas vezes, contar duas vezes uma palavra-chave ou importar registros repetidos para um banco de dados.</p>
<h2>Dicas</h2>
<ul>
<li>Ative <strong>Ignorar maiúsculas</strong> para e-mails e palavras-chave, em que as maiúsculas não importam.</li>
<li>Deixe <strong>Remover espaços extras</strong> ativado para pegar duplicatas que só diferem por espaços invisíveis.</li>
<li>Também precisa da lista em ordem alfabética? Passe-a pelo Ordenar linhas.</li>
</ul>
<h2>Funciona com dados de planilhas</h2>
<p>Copie uma coluna do Excel ou do Google Planilhas, cole aqui e cole de volta os valores únicos. Cada célula vira uma linha, então você limpa milhares de linhas em segundos, sem fórmulas.</p>
HTML,
        'steps' => [
            'Cole sua lista na caixa de entrada, um item por linha.',
            'As linhas duplicadas são removidas na hora. A primeira ocorrência de cada linha é mantida, na ordem original.',
            'Escolha se <strong>Maçã</strong> e <strong>maçã</strong> contam como a mesma linha, e se quer remover espaços e linhas vazias.',
            'Copie a lista limpa ou baixe como arquivo de texto.',
        ],
        'faq' => [
            ['q' => 'A ordem original é mantida?', 'a' => 'Sim. As linhas mantêm a ordem original e só as repetições posteriores são removidas. Para também ordenar a lista, use o Ordenar linhas.'],
            ['q' => 'O que faz Ignorar maiúsculas?', 'a' => 'Com Ignorar maiúsculas ativado, linhas que só diferem nas maiúsculas (como <em>Email</em> e <em>email</em>) são tratadas como duplicadas e só a primeira é mantida.'],
            ['q' => 'Para que serve remover os espaços extras?', 'a' => 'Linhas copiadas de planilhas ou documentos costumam ter espaços invisíveis no início ou no fim. Removê-los garante que essas linhas sejam reconhecidas como duplicadas.'],
            ['q' => 'Posso limpar uma lista de e-mails ou palavras-chave?', 'a' => 'Sim. Funciona com qualquer lista: e-mails, URLs, palavras-chave, códigos de produto ou nomes. Listas grandes, de centenas de milhares de linhas, são processadas num instante.'],
            ['q' => 'Meus dados ficam privados?', 'a' => 'Sim. O texto é processado no seu navegador e nunca é enviado.'],
        ],
    ],

    'sort-lines' => [
        'slug' => 'ordenar-linhas',
        'name' => 'Ordenar linhas',
        'short_description' => 'Ordene linhas em ordem alfabética, por tamanho, invertidas ou aleatórias.',
        'description' => 'Ordene qualquer lista de A a Z ou de Z a A com ordem natural de números, por tamanho, invertida ou embaralhada. Opcionalmente remova duplicatas e linhas vazias.',
        'seo_title' => 'Ordenar linhas em ordem alfabética online',
        'seo_description' => 'Ordene linhas de texto em ordem alfabética online: A–Z, Z–A, ordem natural de números, por tamanho, invertida ou aleatória. Grátis e instantâneo.',
        'content' => <<<'HTML'
<h2>Ordene listas como as pessoas esperam</h2>
<p>A ordem alfabética simples coloca "Item 10" antes de "Item 2" porque compara caractere por caractere. A ordem natural compara os números pelo valor, então listas de nomes de arquivo, versões, capítulos e números de notas fiscais ficam na ordem certa.</p>
<h2>Usos populares</h2>
<ul>
<li>Colocar em ordem alfabética nomes, glossários e bibliografias.</li>
<li>Embaralhar uma lista para sorteios, equipes aleatórias ou perguntas de um quiz.</li>
<li>Inverter um registro ou uma linha do tempo.</li>
<li>Ordenar palavras-chave ou URLs antes de compará-las com o Comparar textos.</li>
</ul>
<p>Para remover entradas repetidas sem mudar a ordem, use o Remover linhas duplicadas.</p>
HTML,
        'steps' => [
            'Cole sua lista na caixa de entrada, um item por linha.',
            'Escolha a ordem: <strong>A → Z</strong>, <strong>Z → A</strong>, por tamanho, invertida ou aleatória (embaralhar).',
            'Deixe <strong>Ordem natural</strong> ativada para que <em>item 2</em> fique antes de <em>item 10</em>.',
            'Se quiser, remova duplicatas e linhas vazias, e depois copie ou baixe a lista ordenada.',
        ],
        'faq' => [
            ['q' => 'O que é a ordem natural?', 'a' => 'A ordem natural ordena os números dentro do texto pelo valor, como uma pessoa esperaria: <em>arquivo 2</em> vem antes de <em>arquivo 10</em>. A ordem alfabética simples colocaria <em>arquivo 10</em> primeiro.'],
            ['q' => 'Como coloco uma lista em ordem alfabética?', 'a' => 'Cole a lista e escolha A → Z. A ordenação ignora maiúsculas, a menos que você ative Diferenciar maiúsculas.'],
            ['q' => 'Como embaralho uma lista?', 'a' => 'Escolha Aleatório. Cada clique em <strong>Embaralhar de novo</strong> gera uma ordem aleatória nova, útil para sorteios, formar equipes ou perguntas de um quiz.'],
            ['q' => 'Funciona com palavras acentuadas e em outros idiomas?', 'a' => 'Sim. A ordenação usa uma comparação que respeita o idioma, então letras acentuadas ficam junto da letra base.'],
            ['q' => 'Minha lista é enviada para a internet?', 'a' => 'Não. A ordenação é feita no seu navegador.'],
        ],
    ],

    'lorem-ipsum-generator' => [
        'slug' => 'gerador-lorem-ipsum',
        'name' => 'Gerador de Lorem Ipsum',
        'short_description' => 'Gere texto de exemplo por parágrafos, frases ou palavras.',
        'description' => 'Crie texto de exemplo Lorem Ipsum para maquetes e layouts. Escolha parágrafos, frases ou palavras, mantenha o início clássico e exporte texto simples ou HTML.',
        'seo_title' => 'Gerador de Lorem Ipsum: texto de exemplo',
        'seo_description' => 'Gere texto de exemplo Lorem Ipsum online. Parágrafos, frases ou palavras, parágrafos HTML opcionais e cópia com um clique. Grátis para qualquer projeto.',
        'content' => <<<'HTML'
<h2>De onde vem o Lorem Ipsum?</h2>
<p>A passagem clássica vem de "De finibus bonorum et malorum", escrito por Cícero em 45 a.C. Impressores usam versões embaralhadas desse texto desde o século XVI porque ele tem uma distribuição natural de letras e tamanhos de palavras, então os layouts parecem realistas sem que o conteúdo distraia quem os revisa.</p>
<h2>Dicas para designers e desenvolvedores</h2>
<ul>
<li>Use tamanhos realistas: gere a quantidade de palavras que o conteúdo real vai ter.</li>
<li>Troque o texto de exemplo pelo texto real o quanto antes: o conteúdo dá forma ao design.</li>
<li>Use a opção HTML para colar os parágrafos direto nos seus protótipos.</li>
</ul>
<p>Quer saber o tamanho do seu texto real? Use o Contador de palavras.</p>
HTML,
        'steps' => [
            'Escolha quanto texto de exemplo precisa e se quer contá-lo em <strong>parágrafos</strong>, <strong>frases</strong> ou <strong>palavras</strong>.',
            'Deixe <strong>Começar com “Lorem ipsum…”</strong> ativado para o início clássico, ou desative para um texto totalmente aleatório.',
            'Ative <strong>HTML</strong> para envolver cada parágrafo em tags <code>&lt;p&gt;</code>, pronto para colar em uma página web.',
            'Copie ou baixe o texto. Clique em <strong>Gerar</strong> para uma variação nova.',
        ],
        'faq' => [
            ['q' => 'O que é Lorem Ipsum?', 'a' => 'Lorem Ipsum é um texto de exemplo em latim embaralhado, derivado de uma obra de Cícero. Designers e desenvolvedores o usam para preencher layouts e manter a atenção no design, não no conteúdo.'],
            ['q' => 'Por que usar texto de exemplo em vez de texto real?', 'a' => 'Ele mostra como o texto real vai fluir em um layout — comprimento das linhas, espaço entre parágrafos e tipografia — antes de o texto final estar pronto, sem que o significado distraia.'],
            ['q' => 'Posso usar o texto gerado de graça?', 'a' => 'Sim. O Lorem Ipsum não tem direitos autorais e você pode usar o texto gerado em qualquer projeto.'],
            ['q' => 'Quanto texto posso gerar?', 'a' => 'Até 200 parágrafos ou frases, ou 5000 palavras de uma vez.'],
        ],
    ],
];
