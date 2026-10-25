<?php

/*
| Brazilian Portuguese copy for batch 6: Credit Card Payoff, Loan Comparison,
| Organize PDF, Add Page Numbers to PDF. See content/pt/tools.php.
*/

return [
    'credit-card-payoff-calculator' => [
        'slug' => 'calculadora-cartao-de-credito',
        'name' => 'Calculadora de quitação do cartão de crédito',
        'short_description' => 'Descubra quanto tempo leva para quitar o cartão de crédito e quanto custa.',
        'description' => 'Informe o saldo e os juros do seu cartão para ver quando você ficará sem dívida com um pagamento mensal fixo, ou quanto precisa pagar para quitá-lo em um prazo, comparado a pagar só o mínimo.',
        'seo_title' => 'Calculadora de cartão de crédito: quite sua fatura',
        'seo_description' => 'Calcule grátis quanto tempo leva para quitar o cartão de crédito, os juros totais e o pagamento necessário, comparado a pagar só o mínimo.',
        'content' => <<<'HTML'
<h2>Por que o pagamento mínimo mantém você endividado</h2>
<p>O pagamento mínimo costuma ser os juros do mês mais uma pequena porcentagem do saldo. Quando o saldo cai, o mínimo também cai, e a maior parte de cada pagamento continua indo para os juros. Com os juros do rotativo, uma dívida de alguns milhares de reais pode levar muitos anos para acabar e custar em juros mais do que as compras originais. Um pagamento fixo, mesmo modesto, muda completamente o resultado.</p>
<h2>Duas formas de planejar a quitação</h2>
<ul>
<li><strong>Pagar um valor fixo</strong>: informe quanto você consegue pagar por mês e veja a data em que fica sem dívida e os juros totais.</li>
<li><strong>Quitar em um prazo</strong>: escolha um número de meses e veja o pagamento mensal necessário.</li>
</ul>
<p>Tem vários cartões e empréstimos? A Calculadora de quitação de dívidas compara os métodos avalanche e bola de neve com todas as suas dívidas. Pensando em trocar a dívida por um empréstimo pessoal mais barato? Confira a parcela na Calculadora de empréstimo e compare ofertas no Comparador de empréstimos.</p>
HTML,
        'steps' => [
            'Informe o <strong>saldo do cartão</strong> e a <strong>taxa de juros</strong> anual (estão na sua fatura).',
            'Escolha <strong>Pagar um valor fixo</strong> e informe o pagamento mensal, ou <strong>Quitar em um prazo</strong> e escolha o número de meses.',
            'Veja a data em que você fica sem dívida, os juros totais e a comparação com pagar só o mínimo.',
            'Copie o link para salvar seu plano ou compartilhá-lo.',
        ],
        'faq' => [
            ['q' => 'Quanto tempo vou levar para quitar meu cartão de crédito?', 'a' => 'Depende do saldo, dos juros e de quanto você paga por mês. Informe esses dados acima para ver o número exato de meses. Pagar só o mínimo pode fazer uma dívida pequena durar muitos anos.'],
            ['q' => 'Como os juros do cartão são calculados?', 'a' => 'O cartão cobra juros todo mês, aproximadamente a taxa anual dividida por 12, sobre o saldo. Como cada banco tem regras próprias, o resultado é uma estimativa próxima e não uma cópia exata da fatura.'],
            ['q' => 'Quanto preciso pagar para quitar em 2 anos?', 'a' => 'Escolha <strong>Quitar em um prazo</strong> e informe 24 meses. A calculadora mostra o pagamento mensal fixo que quita a dívida nesse prazo.'],
            ['q' => 'Por que o pagamento mínimo demora tanto?', 'a' => 'O mínimo costuma ser os juros mais uma pequena porcentagem do saldo, então ele diminui junto com o saldo e a maior parte de cada pagamento vai para os juros. Você pode mudar essas regras em <strong>Regras do pagamento mínimo</strong>.'],
            ['q' => 'Inclui compras novas?', 'a' => 'Não. A estimativa considera que você para de usar o cartão, os juros não mudam e todos os pagamentos são feitos em dia.'],
        ],
    ],

    'loan-comparison-calculator' => [
        'slug' => 'comparador-de-emprestimos',
        'name' => 'Comparador de empréstimos',
        'short_description' => 'Compare até quatro ofertas de empréstimo por parcela, tarifas e custo total.',
        'description' => 'Compare ofertas de empréstimo lado a lado com taxa, prazo e tarifas iniciais para encontrar a mais barata no total, a menor parcela e o custo efetivo de cada uma.',
        'seo_title' => 'Comparador de empréstimos: compare ofertas grátis',
        'seo_description' => 'Compare até 4 ofertas de empréstimo lado a lado. Veja a parcela mensal, os juros, as tarifas, o custo total e o custo efetivo de cada uma.',
        'content' => <<<'HTML'
<h2>A menor taxa nem sempre é o empréstimo mais barato</h2>
<p>Os bancos competem pela taxa de juros anunciada, mas tarifas iniciais, como a tarifa de abertura de crédito, mudam o custo real. Um empréstimo a 6,9% com uma tarifa de 800 pode sair mais caro que outro a 7,5% sem tarifa. Este comparador soma juros e tarifas no custo total do empréstimo e mostra o custo efetivo: a taxa que você realmente paga quando as tarifas entram na conta.</p>
<h2>Parcela mensal ou custo total</h2>
<p>Um prazo mais longo reduz a parcela, mas quase sempre aumenta os juros totais. As etiquetas mostram qual oferta tem a menor parcela e qual é a mais barata no total, para você escolher com clareza entre fôlego no orçamento e custo.</p>
<p>Depois de escolher uma oferta, abra a Calculadora de empréstimo para ver a tabela de amortização completa e quanto ela encurta com pagamentos extras. Vai comprar imóvel ou carro? A Calculadora de financiamento imobiliário e a Calculadora de financiamento de carro incluem impostos, seguros e o carro na troca.</p>
HTML,
        'steps' => [
            'Informe cada <strong>oferta de empréstimo</strong>: valor, taxa de juros, prazo e <strong>tarifas</strong> iniciais.',
            'Adicione até quatro ofertas com <strong>Adicionar outra oferta</strong>.',
            'Compare a parcela mensal, os juros totais, o custo total do empréstimo e o custo efetivo de cada uma.',
            'Observe as etiquetas <strong>A mais barata</strong> e <strong>Menor parcela</strong> para decidir.',
        ],
        'faq' => [
            ['q' => 'Como comparar duas ofertas de empréstimo?', 'a' => 'Compare o custo total do empréstimo (juros mais tarifas), não só a taxa ou a parcela. Informe as duas ofertas aqui e a mais barata fica destacada.'],
            ['q' => 'O que é o custo efetivo (CET)?', 'a' => 'É a taxa anual que inclui as tarifas iniciais além dos juros. Como as tarifas reduzem o dinheiro que você realmente recebe, o custo efetivo é maior que a taxa anunciada quando o empréstimo tem tarifas.'],
            ['q' => 'Uma parcela menor é melhor?', 'a' => 'Nem sempre. Um prazo maior reduz a parcela, mas costuma aumentar os juros totais. Escolha a menor parcela só se precisar desse espaço no orçamento.'],
            ['q' => 'Quais tarifas devo incluir?', 'a' => 'Inclua o que você paga para obter o empréstimo, como tarifa de abertura de crédito, cadastro ou avaliação. Não inclua seguros opcionais nem multas por atraso.'],
            ['q' => 'Minhas informações são salvas?', 'a' => 'Não. Tudo é calculado no seu navegador e nada é enviado aos nossos servidores.'],
        ],
    ],

    'organize-pdf' => [
        'slug' => 'organizar-pdf',
        'name' => 'Organizar PDF',
        'short_description' => 'Reordene, gire e remova páginas de um PDF arrastando-as.',
        'description' => 'Veja todas as páginas do seu PDF, arraste-as para uma nova ordem, gire as que estão de lado e remova as que não precisa, depois baixe o arquivo organizado.',
        'seo_title' => 'Organizar PDF: reordene páginas online grátis',
        'seo_description' => 'Reordene páginas de PDF online grátis. Arraste as páginas para uma nova ordem, gire ou remova páginas e baixe o PDF. Tudo no seu navegador.',
        'content' => <<<'HTML'
<h2>Cada página no lugar certo</h2>
<p>Documentos digitalizados costumam sair fora de ordem, relatórios precisam de um anexo no final e arquivos combinados precisam da capa em primeiro lugar. Esta ferramenta mostra uma prévia de cada página para você arrastar tudo para a ordem desejada, girar as páginas digitalizadas de lado e remover páginas em branco ou repetidas, tudo em uma única etapa.</p>
<h2>Privado por padrão</h2>
<p>Seu PDF é aberto e reconstruído inteiramente no navegador. Nada é enviado, o que torna a ferramenta segura para contratos, extratos bancários e exames médicos.</p>
<p>Para combinar vários arquivos antes, use Juntar PDF. Para separar algumas páginas em outro documento, use Dividir PDF. Se só precisa corrigir a orientação, Girar PDF é o caminho mais rápido, e Numerar páginas de PDF numera o documento final.</p>
HTML,
        'steps' => [
            'Solte um PDF na caixa ou clique para procurar. Aparece uma prévia de cada página.',
            'Arraste as páginas para a ordem desejada ou use as setas abaixo de cada uma.',
            'Clique em uma página para girá-la ou use o ícone de lixeira para removê-la.',
            'Clique em <strong>Baixar PDF organizado</strong> para salvar o novo arquivo.',
        ],
        'faq' => [
            ['q' => 'Como mudar a ordem das páginas de um PDF?', 'a' => 'Abra o PDF aqui e arraste cada página para a nova posição. No celular, use as setas abaixo de cada página. Depois baixe o arquivo organizado.'],
            ['q' => 'Posso girar e remover páginas ao mesmo tempo?', 'a' => 'Sim. Clicar em uma página a gira 90 graus e a lixeira a marca para remoção, então você corrige tudo de uma vez.'],
            ['q' => 'Posso desfazer as alterações?', 'a' => 'Use <strong>Ordem original</strong> para voltar à ordem inicial. Seu arquivo original nunca é alterado: a ferramenta baixa uma cópia nova.'],
            ['q' => 'Meu PDF é enviado para algum servidor?', 'a' => 'Não. As páginas são exibidas e reconstruídas no seu navegador, então o documento nunca sai do seu dispositivo.'],
            ['q' => 'Posso organizar páginas de vários PDFs?', 'a' => 'Primeiro combine os arquivos com Juntar PDF e depois abra aqui o arquivo combinado para ordenar as páginas.'],
        ],
    ],

    'add-page-numbers-to-pdf' => [
        'slug' => 'numerar-paginas-pdf',
        'name' => 'Numerar páginas de PDF',
        'short_description' => 'Numere as páginas de um PDF na posição e no estilo que quiser.',
        'description' => 'Adicione números de página a um PDF em qualquer canto ou ao centro, como "1", "1 / 10" ou "Página 1 de 10", pule a capa e escolha o primeiro número. Funciona no seu navegador.',
        'seo_title' => 'Numerar páginas de PDF grátis e com privacidade',
        'seo_description' => 'Adicione números de página a um PDF grátis. Escolha posição, formato e número inicial, e pule a capa. Seu arquivo nunca sai do seu dispositivo.',
        'content' => <<<'HTML'
<h2>Quando os números de página fazem diferença</h2>
<p>Relatórios, TCCs, contratos, manuais e apostilas impressas ficam muito mais fáceis de revisar e discutir quando cada página está numerada. Os números também protegem documentos impressos: uma página faltando ou fora de ordem aparece na hora. Muitos PDFs gerados por scanners, celulares ou apresentações não têm nenhum número de página.</p>
<h2>Escolha o estilo</h2>
<ul>
<li>Coloque o número em qualquer canto ou ao centro, em cima ou embaixo.</li>
<li>Use um número simples, &quot;1 / 10&quot;, &quot;Página 1&quot; ou &quot;Página 1 de 10&quot;.</li>
<li>Pule a capa começando na página 2 e escolha o primeiro número para continuar uma sequência.</li>
</ul>
<p>Preparando o documento? Juntar PDF combina arquivos, Organizar PDF corrige a ordem das páginas e Excluir páginas de PDF remove as que você não precisa.</p>
HTML,
        'steps' => [
            'Solte um PDF na caixa ou clique para procurar.',
            'Escolha a <strong>posição</strong> e o <strong>formato</strong> dos números. A prévia mostra como vão ficar.',
            'Para pular a capa, comece a numerar na página 2. Altere o primeiro número se precisar.',
            'Clique em <strong>Adicionar números de página</strong> para baixar o PDF numerado.',
        ],
        'faq' => [
            ['q' => 'Como adicionar números de página a um PDF?', 'a' => 'Abra o PDF aqui, escolha onde ficam os números e o formato, e clique em <strong>Adicionar números de página</strong>. A cópia numerada é baixada em segundos.'],
            ['q' => 'Posso pular a primeira página?', 'a' => 'Sim. Em <strong>Começar a numerar na página</strong>, coloque 2 e a capa fica sem número. Deixe o primeiro número em 1 se a segunda página deve ser a número 1.'],
            ['q' => 'Quais formatos existem?', 'a' => 'Um número simples, &quot;1 / 10&quot;, &quot;Página 1&quot; e &quot;Página 1 de 10&quot;, em tamanho pequeno, médio ou grande, em qualquer canto ou ao centro.'],
            ['q' => 'E as páginas na horizontal ou giradas?', 'a' => 'Os números são posicionados conforme cada página é exibida, então aparecem na posição certa também em páginas horizontais ou giradas.'],
            ['q' => 'Meu PDF é enviado para algum servidor?', 'a' => 'Não. Os números são adicionados no seu navegador e o arquivo nunca sai do seu dispositivo.'],
        ],
    ],
];
