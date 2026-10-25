<?php

/*
| Portuguese copy for the calculators. See content/pt/tools.php.
*/

return [
    'percentage-calculator' => [
        'slug' => 'calculadora-de-porcentagem',
        'name' => 'Calculadora de porcentagem',
        'short_description' => 'Calcule porcentagens, variações percentuais e aumentos na hora.',
        'description' => 'Calcule X% de um número, que porcentagem um número é de outro, o aumento ou a redução percentual entre dois valores, e some ou subtraia uma porcentagem, tudo em um só lugar.',
        'seo_title' => 'Calculadora de porcentagem: % de, variação e aumento',
        'seo_description' => 'Calculadora de porcentagem grátis. Calcule X% de Y, que porcentagem X é de Y, aumentos ou reduções percentuais, e some ou subtraia porcentagens na hora.',
        'content' => <<<'HTML'
<h2>Fórmulas de porcentagem</h2>
<ul>
<li><strong>X% de Y</strong> = Y × X / 100</li>
<li><strong>Que porcentagem X é de Y</strong> = X / Y × 100</li>
<li><strong>Variação percentual</strong> = (novo − anterior) / anterior × 100</li>
<li><strong>Aumentar Y em X%</strong> = Y × (1 + X / 100)</li>
</ul>
<h2>Exemplos do dia a dia</h2>
<p>Calcule um desconto de 25% sobre um preço, o imposto de uma compra, quanto seu salário aumentou, que parte de um orçamento você já gastou ou a porcentagem de acertos em uma prova. Pontos percentuais e porcentagens não são a mesma coisa: uma taxa que passa de 10% para 12% subiu 2 pontos percentuais, o que equivale a um aumento de 20%.</p>
<p>Para dinheiro ao longo do tempo, use a Calculadora de juros compostos ou a Calculadora de empréstimo. Para dividir a conta do restaurante, experimente a Calculadora de gorjeta.</p>
HTML,
        'steps' => [
            'Escolha a calculadora que corresponde à sua pergunta: cada uma resolve um tipo diferente de problema de porcentagem.',
            'Digite seus números. Os resultados se atualizam na hora; não é preciso apertar nenhum botão.',
            'Use <strong>Variação percentual</strong> para comparar um valor anterior com um novo, como preços ou salários.',
            'Use <strong>Somar ou subtrair uma porcentagem</strong> para descontos, impostos ou reajustes de preço.',
        ],
        'faq' => [
            ['q' => 'Como calculo a porcentagem de um número?', 'a' => 'Multiplique o número pela porcentagem e divida por 100. Por exemplo, 15% de 200 é 200 × 15 / 100 = 30.'],
            ['q' => 'Como sei que porcentagem um número é de outro?', 'a' => 'Divida a parte pelo total e multiplique por 100. Por exemplo, 30 é (30 / 200) × 100 = 15% de 200.'],
            ['q' => 'Como se calcula um aumento percentual?', 'a' => 'Subtraia o valor anterior do novo, divida pelo valor anterior e multiplique por 100. Passar de 80 para 100 é um aumento de (100 − 80) / 80 × 100 = 25%.'],
            ['q' => 'Como calculo um desconto?', 'a' => 'Use Somar ou subtrair uma porcentagem e escolha diminuir. Um desconto de 20% sobre 50 é 50 × (1 − 0,20) = 40.'],
            ['q' => 'Por que um aumento de 50% seguido de uma queda de 50% não volta ao valor original?', 'a' => 'Porque cada porcentagem é calculada sobre uma base diferente. 100 + 50% = 150, mas 150 − 50% = 75.'],
        ],
    ],

    'loan-calculator' => [
        'slug' => 'calculadora-de-emprestimo',
        'name' => 'Calculadora de empréstimo',
        'short_description' => 'Calcule a parcela do empréstimo, o total de juros e a tabela de amortização.',
        'description' => 'Informe o valor, a taxa de juros e o prazo para calcular a parcela mensal, quinzenal ou semanal, além do total de juros e uma tabela de amortização completa.',
        'seo_title' => 'Calculadora de empréstimo: parcela e amortização',
        'seo_description' => 'Calculadora de empréstimo grátis com parcelas mensais, a cada 2 semanas ou semanais. Veja os juros, o total pago e a tabela de amortização completa.',
        'content' => <<<'HTML'
<h2>Como funcionam as parcelas de um empréstimo</h2>
<p>Em um empréstimo com parcelas fixas (sistema Price), todas as parcelas têm o mesmo valor, mas a composição muda com o tempo. As primeiras parcelas são quase só juros; as últimas, quase só amortização. A tabela de amortização mostra exatamente quanto de cada pagamento vai para os juros e com que rapidez o saldo cai.</p>
<h2>Como pagar menos juros</h2>
<ul>
<li><strong>Prazo menor:</strong> parcelas mais altas, mas muito menos juros no total.</li>
<li><strong>Taxa menor:</strong> até 1% a menos pode economizar milhares em um empréstimo longo.</li>
<li><strong>Pagamentos a cada 2 semanas:</strong> 26 meias parcelas por ano reduzem um pouco os juros.</li>
<li><strong>Pagamentos extras:</strong> o que você paga a mais vai direto para o principal.</li>
</ul>
<p>Vai poupar em vez de pegar emprestado? Veja como o dinheiro cresce com a Calculadora de juros compostos.</p>
HTML,
        'steps' => [
            'Informe o <strong>valor do empréstimo</strong> que você quer pegar.',
            'Informe a <strong>taxa de juros anual</strong> oferecida pela instituição.',
            'Defina o <strong>prazo</strong> em anos ou meses e escolha a frequência dos pagamentos: mensal, a cada 2 semanas ou semanal.',
            'Confira a parcela, o total de juros e o custo total, e explore a <strong>tabela de amortização</strong> por ano ou por parcela. Você pode exportá-la em CSV.',
        ],
        'faq' => [
            ['q' => 'Como a parcela do empréstimo é calculada?', 'a' => 'A calculadora usa a fórmula padrão de amortização (tabela Price): <code>P = L × r / (1 − (1 + r)<sup>−n</sup>)</code>, em que L é o valor do empréstimo, r a taxa de juros por período de pagamento e n o número total de pagamentos.'],
            ['q' => 'Quanto economizo com pagamentos extras?', 'a' => 'Informe um valor em <strong>Pagamento extra por parcela</strong>. A calculadora mostra quanto você economiza em juros, quanto antes termina e a nova data de quitação, e o gráfico compara os dois saldos. Confirme com o banco que a amortização extra reduz o saldo devedor.'],
            ['q' => 'Pagar a cada 2 semanas economiza dinheiro?', 'a' => 'Pagar a cada 2 semanas equivale a 26 pagamentos por ano. Como os juros são calculados com mais frequência sobre um saldo um pouco menor, normalmente você paga um pouco menos de juros no total. Compare os totais mudando a frequência de pagamento.'],
            ['q' => 'O que é uma tabela de amortização?', 'a' => 'É uma tabela com cada pagamento ao longo do empréstimo, separado na parte que paga juros e na que reduz o principal, junto com o saldo devedor depois de cada pagamento.'],
            ['q' => 'Inclui impostos, seguros ou tarifas?', 'a' => 'Não. Os resultados cobrem só principal e juros. Financiamentos imobiliários e de veículos podem incluir também IOF, seguros, tarifas de abertura e outros custos definidos pela instituição.'],
            ['q' => 'Minhas informações são salvas?', 'a' => 'Não. Todos os cálculos são feitos no seu navegador e nada do que você digita é enviado aos nossos servidores.'],
        ],
    ],

    'compound-interest-calculator' => [
        'slug' => 'calculadora-de-juros-compostos',
        'name' => 'Calculadora de juros compostos',
        'short_description' => 'Veja como suas economias crescem com juros compostos e aportes.',
        'description' => 'Calcule o valor futuro de um investimento com qualquer frequência de capitalização e aportes mensais ou anuais, com uma tabela de crescimento ano a ano.',
        'seo_title' => 'Calculadora de juros compostos com aportes',
        'seo_description' => 'Calculadora de juros compostos grátis. Adicione aportes mensais ou anuais, escolha a capitalização e veja seu saldo crescer ano a ano.',
        'content' => <<<'HTML'
<h2>O poder dos juros compostos</h2>
<p>Com juros compostos você ganha rendimento sobre o rendimento. Em prazos longos a curva de crescimento fica íngreme: nos últimos anos, os juros ganhos podem superar tudo o que você aportou. Por isso começar cedo, mesmo com valores pequenos, importa mais do que investir grandes quantias mais tarde.</p>
<h2>A regra do 72</h2>
<p>Um jeito rápido de estimar quanto tempo o dinheiro leva para dobrar: divida 72 pela taxa de juros anual. A 6%, o dinheiro dobra em cerca de 12 anos; a 9%, em cerca de 8 anos.</p>
<h2>O que influencia os seus resultados</h2>
<ul>
<li>A taxa de juros ou o rendimento esperado.</li>
<li>Por quanto tempo você mantém o investimento.</li>
<li>Quanto você aporta e com que frequência.</li>
<li>Taxas, impostos e inflação, que reduzem o rendimento real.</li>
</ul>
<p>Vai pegar dinheiro emprestado? A Calculadora de empréstimo mostra como os juros jogam contra você.</p>
HTML,
        'steps' => [
            'Informe o <strong>investimento inicial</strong> e a <strong>taxa de juros anual</strong> esperada.',
            'Defina por quantos <strong>anos</strong> pretende investir e com que frequência os juros são capitalizados.',
            'Adicione um <strong>aporte</strong> periódico — mensal ou anual — ou deixe em 0.',
            'Confira o valor futuro, quanto veio dos seus aportes e quanto dos juros, e a tabela ano a ano. Se quiser, exporte em CSV.',
        ],
        'faq' => [
            ['q' => 'O que são juros compostos?', 'a' => 'São juros ganhos tanto sobre o dinheiro original quanto sobre os juros já acumulados. Em prazos longos eles fazem as economias crescerem de forma exponencial, por isso começar cedo faz tanta diferença.'],
            ['q' => 'Qual é a fórmula dos juros compostos?', 'a' => 'Sem aportes: <code>A = P (1 + r/n)<sup>nt</sup></code>, em que P é o capital, r a taxa anual, n o número de capitalizações por ano e t o número de anos. Com aportes periódicos, soma-se o valor futuro de cada depósito.'],
            ['q' => 'A frequência de capitalização faz muita diferença?', 'a' => 'Capitalizar com mais frequência rende um pouco mais, mas o efeito é pequeno comparado à taxa de juros, ao tempo investido e ao que você aporta.'],
            ['q' => 'Quando os aportes são somados?', 'a' => 'Os aportes são somados no fim de cada mês (ou ano), depois de aplicados os juros daquele período.'],
            ['q' => 'Isto é consultoria financeira?', 'a' => 'Não. Os resultados são estimativas que supõem um rendimento constante. Investimentos reais oscilam, e impostos e taxas não estão incluídos.'],
        ],
    ],

    'age-calculator' => [
        'slug' => 'calculadora-de-idade',
        'name' => 'Calculadora de idade',
        'short_description' => 'Calcule a idade exata em anos, meses e dias a partir da data de nascimento.',
        'description' => 'Informe uma data de nascimento para ver a idade exata em anos, meses e dias, além do total de meses, semanas e dias vividos e uma contagem regressiva para o próximo aniversário.',
        'seo_title' => 'Calculadora de idade exata em anos, meses e dias',
        'seo_description' => 'Calculadora de idade grátis. Descubra sua idade exata em anos, meses e dias, o total de dias vividos e quantos dias faltam para o próximo aniversário.',
        'content' => <<<'HTML'
<h2>Como a idade exata é calculada</h2>
<p>A idade exata conta os anos completos do calendário, depois os meses completos e, por fim, os dias restantes. Como os meses têm durações diferentes, dividir o número de dias por 365 dá resultados ligeiramente errados; esta calculadora segue o calendário.</p>
<h2>Para que usar uma calculadora de idade</h2>
<ul>
<li>Conferir requisitos de idade para escola, esportes, seguros ou aposentadoria.</li>
<li>Preencher formulários que pedem a idade em anos e meses.</li>
<li>Saber o tempo entre duas datas quaisquer, como um aniversário de casamento ou a duração de um projeto.</li>
<li>Acompanhar a contagem regressiva para o próximo aniversário.</li>
</ul>
<p>Para somar ou subtrair dias de uma data, ou contar dias úteis entre duas datas, use a Calculadora de datas.</p>
HTML,
        'steps' => [
            'Informe a <strong>data de nascimento</strong>.',
            'Deixe <strong>Idade em</strong> na data de hoje, ou escolha outra data para saber a idade em um momento específico do passado ou do futuro.',
            'Veja a idade exata em anos, meses e dias, além do total de meses, semanas, dias e horas vividos.',
            'Confira a contagem regressiva para o próximo aniversário e em que dia da semana ele cai.',
        ],
        'faq' => [
            ['q' => 'Como a idade exata é calculada?', 'a' => 'A calculadora conta primeiro os anos completos, depois os meses completos e por fim os dias restantes, seguindo o calendário. Meses com menos dias são tratados corretamente.'],
            ['q' => 'E quem nasceu em 29 de fevereiro?', 'a' => 'Nos anos sem 29 de fevereiro, o aniversário é contado em 28 de fevereiro.'],
            ['q' => 'Posso calcular o tempo entre duas datas quaisquer?', 'a' => 'Sim. Use a data de nascimento como data inicial e Idade em como data final. O resultado mostra os anos, meses e dias exatos entre as duas.'],
            ['q' => 'Minha data de nascimento é salva?', 'a' => 'Não. O cálculo é feito no seu navegador e nada é enviado aos nossos servidores.'],
        ],
    ],

    'tip-calculator' => [
        'slug' => 'calculadora-de-gorjeta',
        'name' => 'Calculadora de gorjeta',
        'short_description' => 'Calcule a gorjeta e divida a conta entre várias pessoas.',
        'description' => 'Informe o valor da conta, escolha a porcentagem da gorjeta e o número de pessoas para ver a gorjeta, o total e quanto cada um paga, com opção de arredondar para cima.',
        'seo_title' => 'Calculadora de gorjeta: calcule e divida a conta',
        'seo_description' => 'Calculadora de gorjeta grátis. Escolha a porcentagem, divida a conta entre quantas pessoas quiser e arredonde por pessoa. Rápida e prática no celular.',
        'content' => <<<'HTML'
<h2>Guia de gorjetas</h2>
<ul>
<li><strong>Restaurantes no Brasil:</strong> a taxa de serviço de 10% costuma vir na conta e é opcional; pague mais se o atendimento foi excelente.</li>
<li><strong>Portugal:</strong> a gorjeta é opcional; deixar o troco ou 5–10% é o comum.</li>
<li><strong>Estados Unidos:</strong> 15–20% pelo serviço à mesa, e 20% ou mais por um atendimento excelente.</li>
<li><strong>Delivery e táxi:</strong> costuma bastar arredondar o valor ou deixar 10%.</li>
</ul>
<p>Os costumes mudam muito de um país para outro. Em vários lugares a conta já inclui uma taxa de serviço, então confira antes de somar gorjeta.</p>
<h2>Como dividir a conta de forma justa</h2>
<p>Quando todos pediram valores parecidos, dividir em partes iguais é o mais simples. Se os pedidos foram muito diferentes, cada pessoa pode calcular a sua parte mais a gorjeta. Arredondar para cima por pessoa evita procurar moedas e deixa uma gorjeta um pouco mais generosa.</p>
<p>Para outras contas do dia a dia, experimente a Calculadora de porcentagem.</p>
HTML,
        'steps' => [
            'Informe o valor da conta (com ou sem impostos, como preferir).',
            'Escolha a porcentagem da gorjeta com os botões rápidos ou digite uma personalizada.',
            'Indique quantas pessoas vão dividir a conta.',
            'Veja a gorjeta, o total e quanto cada pessoa paga. Ative <strong>Arredondar</strong> para ter um valor inteiro por pessoa.',
        ],
        'faq' => [
            ['q' => 'Quanto devo deixar de gorjeta?', 'a' => 'No Brasil, o habitual é a taxa de serviço de 10%, que costuma vir incluída na conta e é opcional. Em Portugal a gorjeta é opcional, e nos Estados Unidos o padrão é 15–20%.'],
            ['q' => 'A gorjeta é calculada antes ou depois dos impostos?', 'a' => 'Calcular sobre o valor sem impostos é comum e perfeitamente aceitável. Calcular sobre o total com impostos é um pouco mais generoso.'],
            ['q' => 'Como a conta é dividida?', 'a' => 'A gorjeta é somada à conta e o total é dividido em partes iguais entre as pessoas. Com Arredondar ativado, cada parte é arredondada para cima até a próxima unidade e a diferença vai para a gorjeta.'],
            ['q' => 'Como calculo rápido uma gorjeta de 10%?', 'a' => 'Mova a vírgula uma casa para a esquerda. Em uma conta de 85, os 10% são 8,50; para 15%, some a metade disso: 8,50 + 4,25 = 12,75.'],
        ],
    ],

    'salary-calculator' => [
        'slug' => 'calculadora-de-salario',
        'name' => 'Calculadora de salário',
        'short_description' => 'Converta seu salário entre valor por hora, semanal, mensal e anual.',
        'description' => 'Converta um salário entre valores por hora, diários, semanais, a cada 2 semanas, duas vezes por mês, mensais e anuais com base nas suas horas e semanas de trabalho.',
        'seo_title' => 'Calculadora de salário: de valor por hora a anual',
        'seo_description' => 'Calculadora de salário grátis. Converta o valor por hora em salário anual e vice-versa, além do valor diário, semanal e mensal conforme a sua jornada.',
        'content' => <<<'HTML'
<h2>Como comparar ofertas de trabalho</h2>
<p>As ofertas aparecem em formatos diferentes: um valor por hora em um trabalho e um salário anual em outro. Converter as duas para o mesmo período torna a comparação justa. Lembre-se de considerar férias remuneradas, horas extras, bônus e benefícios como plano de saúde ou previdência, que podem valer muito dinheiro por ano.</p>
<h2>Conversões rápidas (jornada de 40 horas)</h2>
<ul>
<li>20 por hora ≈ 41.600 por ano</li>
<li>25 por hora ≈ 52.000 por ano</li>
<li>30 por hora ≈ 62.400 por ano</li>
<li>50.000 por ano ≈ 24,04 por hora</li>
</ul>
<p>Pretende poupar parte do salário? Veja como suas economias crescem com a Calculadora de juros compostos.</p>
HTML,
        'steps' => [
            'Informe seu pagamento e escolha o que ele representa: por hora, diário, semanal, a cada 2 semanas, duas vezes por mês, mensal ou anual.',
            'Ajuste a jornada: horas por semana, dias por semana e semanas pagas por ano.',
            'Veja seu pagamento convertido em todos os outros períodos na hora.',
            'Use para comparar ofertas de trabalho, valores por hora e salários anuais em pé de igualdade.',
        ],
        'faq' => [
            ['q' => 'Como converto um valor por hora em salário anual?', 'a' => 'Multiplique o valor por hora pelas horas trabalhadas por semana e pelas semanas trabalhadas no ano. Com 40 horas semanais e 52 semanas, 25 por hora são 25 × 40 × 52 = 52.000 por ano.'],
            ['q' => 'Como converto um salário anual em valor por hora?', 'a' => 'Divida o salário anual pelas horas por semana multiplicadas pelas semanas por ano. 60.000 com 40 horas e 52 semanas é 60.000 / 2.080 ≈ 28,85 por hora.'],
            ['q' => 'Qual a diferença entre a cada 2 semanas e duas vezes por mês?', 'a' => 'A cada 2 semanas significa 26 pagamentos por ano. Duas vezes por mês significa 24 pagamentos por ano, então cada um desses pagamentos é um pouco maior.'],
            ['q' => 'Inclui impostos?', 'a' => 'Não. Os resultados são o pagamento bruto antes de impostos e descontos, que variam conforme o país e a situação pessoal.'],
            ['q' => 'Devo incluir as semanas de férias?', 'a' => 'Se suas férias são remuneradas (por exemplo, com salário fixo), deixe 52 semanas. Se os dias de folga não são pagos, como em muitos trabalhos por hora ou autônomos, reduza as semanas pagas por ano.'],
        ],
    ],

    'auto-loan-calculator' => [
        'slug' => 'calculadora-financiamento-carro',
        'name' => 'Calculadora de financiamento de carro',
        'short_description' => 'Calcule a parcela do carro com usado na troca, impostos e taxas.',
        'description' => 'Calcule a parcela mensal do carro incluindo a entrada, o carro usado dado na troca, o imposto sobre a venda e as taxas da concessionária, e compare prazos de 36 a 84 meses.',
        'seo_title' => 'Calculadora de financiamento de carro',
        'seo_description' => 'Calculadora de financiamento de veículos grátis com carro na troca, impostos e taxas. Veja a parcela e compare os juros em prazos de 36 a 84 meses.',
        'content' => <<<'HTML'
<h2>O que entra em um financiamento de carro</h2>
<p>O valor financiado é o preço do veículo mais impostos e taxas da concessionária, menos a sua entrada e o valor líquido do carro que você dá na troca. Taxas de documentação, transferência e registro somam rápido, então incluí-las dá uma parcela mensal realista antes de você conversar com o vendedor.</p>
<h2>Dicas para pagar menos</h2>
<ul>
<li>Peça uma pré-aprovação em um banco ou cooperativa para comparar com o financiamento da concessionária.</li>
<li>Dê pelo menos 10–20% de entrada para não dever mais do que o carro vale.</li>
<li>Escolha o menor prazo que couber no bolso: a tabela comparativa mostra os juros que você economiza.</li>
<li>Negocie o preço do carro separadamente do usado na troca e do financiamento.</li>
</ul>
<p>Para outros empréstimos, use a Calculadora de empréstimo; para um imóvel, a Calculadora de financiamento imobiliário.</p>
HTML,
        'steps' => [
            'Informe o <strong>preço do veículo</strong>, sua <strong>entrada</strong> e, se tiver, o valor do <strong>carro na troca</strong> e quanto ainda deve dele.',
            'Adicione a alíquota do <strong>imposto sobre a venda</strong> e as <strong>taxas</strong> da concessionária (documentação, transferência e registro).',
            'Informe a <strong>taxa de juros anual</strong> e escolha o prazo do financiamento.',
            'Compare a parcela mensal e o total de juros em prazos de 36 a 84 meses.',
        ],
        'faq' => [
            ['q' => 'Como a parcela de um financiamento de carro é calculada?', 'a' => 'O valor financiado é o preço mais impostos e taxas, menos a sua entrada e o valor líquido do carro na troca. A parcela mensal segue a fórmula padrão de amortização com base na sua taxa e no seu prazo.'],
            ['q' => 'O imposto incide sobre o carro dado na troca?', 'a' => 'Em muitos lugares (como na maioria dos estados dos EUA) o imposto incide só sobre o preço menos o valor do carro na troca, o que economiza dinheiro. Onde o preço total é tributado, desmarque a opção para calcular assim.'],
            ['q' => 'E se eu dever mais do que meu carro na troca vale?', 'a' => 'Isso é patrimônio negativo. A diferença é somada ao novo financiamento, o que aumenta o valor financiado e os juros que você paga.'],
            ['q' => 'Vale a pena um prazo mais longo?', 'a' => 'Financiamentos de 72 ou 84 meses baixam a parcela, mas custam muito mais em juros, e você pode dever mais do que o carro vale por anos. Compare os prazos na tabela abaixo dos resultados.'],
            ['q' => 'Os resultados são exatos?', 'a' => 'São estimativas. A taxa, as tarifas e os impostos da sua instituição determinam os números finais.'],
        ],
    ],

    'mortgage-calculator' => [
        'slug' => 'calculadora-financiamento-imobiliario',
        'name' => 'Calculadora de financiamento imobiliário',
        'short_description' => 'Calcule a parcela mensal do imóvel com impostos, seguro e PMI.',
        'description' => 'Calcule a parcela mensal completa do financiamento imobiliário — principal, juros, IPTU, seguro residencial, PMI e condomínio —, além do total de juros e uma tabela de amortização anual.',
        'seo_title' => 'Calculadora de financiamento imobiliário',
        'seo_description' => 'Calculadora de financiamento imobiliário grátis com IPTU, seguro, PMI e condomínio. Veja a parcela mensal, os juros e a amortização anual.',
        'content' => <<<'HTML'
<h2>Como entender a parcela do seu imóvel</h2>
<p>O custo mensal é mais do que principal e juros. Também entram o IPTU e o seguro residencial, e nos Estados Unidos os financiamentos convencionais com menos de 20% de entrada somam um seguro hipotecário privado (PMI). Apartamentos e condomínios cobram ainda a taxa de condomínio. Incluir tudo mostra quanto você realmente vai pagar por mês.</p>
<h2>Como reduzir a parcela</h2>
<ul>
<li><strong>Dê 20% de entrada</strong> para evitar o PMI por completo.</li>
<li><strong>Melhore seu histórico de crédito</strong> antes de pedir o financiamento: ele afeta diretamente a taxa.</li>
<li><strong>Compare instituições</strong>: até 0,25% a menos economiza milhares em 30 anos.</li>
<li><strong>Considere um prazo de 15 anos</strong> se couber no orçamento: muito menos juros no total.</li>
</ul>
<p>Para outros empréstimos, como de carro ou pessoais, use a Calculadora de empréstimo. Para ver como suas economias podem crescer, experimente a Calculadora de juros compostos.</p>
HTML,
        'steps' => [
            'Informe o <strong>preço do imóvel</strong> e sua <strong>entrada</strong>, em porcentagem ou em valor.',
            'Escolha o <strong>prazo</strong> e informe a <strong>taxa de juros</strong> que lhe ofereceram.',
            'Adicione o <strong>IPTU</strong>, o <strong>seguro residencial</strong>, o <strong>PMI</strong> e o <strong>condomínio</strong> para ver o custo mensal real.',
            'Confira a composição mensal, o total de juros e a tabela de amortização ano a ano.',
        ],
        'faq' => [
            ['q' => 'O que entra na parcela mensal de um financiamento imobiliário?', 'a' => 'A maioria das parcelas inclui principal e juros, e muitas também o IPTU e o seguro. Nos Estados Unidos, com menos de 20% de entrada normalmente se paga PMI, e condomínios podem somar a taxa de condomínio.'],
            ['q' => 'Vale a pena amortizar o financiamento?', 'a' => 'Pagamentos extras reduzem o prazo e cortam muito os juros totais. Informe um valor em <strong>Pagamento extra por mês</strong> para ver a economia e a nova data de quitação. Compare com outros usos do dinheiro, como uma reserva de emergência ou dívidas com juros mais altos.'],
            ['q' => 'O que é o PMI e quando ele deixa de ser cobrado?', 'a' => 'O seguro hipotecário privado (PMI) protege a instituição quando você dá menos de 20% de entrada em um financiamento convencional dos EUA. Custa entre 0,3% e 1,5% do empréstimo por ano e é cancelado automaticamente quando o saldo chega a 78% do valor original do imóvel. A calculadora estima por quantos meses você vai pagá-lo.'],
            ['q' => 'É melhor financiar em 15 ou em 30 anos?', 'a' => 'Em 15 anos as parcelas são mais altas, mas a taxa é menor e o total de juros cai muito. Em 30 anos as parcelas são mais baixas e flexíveis. Compare as duas mudando o prazo.'],
            ['q' => 'Que valor de imóvel cabe no meu bolso?', 'a' => 'Uma referência comum é que o custo total da moradia não passe de cerca de 28% da renda bruta mensal, e que todas as dívidas não passem de 36%. As instituições analisam sua situação financeira completa.'],
            ['q' => 'Os resultados são exatos?', 'a' => 'São estimativas para planejamento. Impostos, seguros, PMI e custos de escritura variam conforme o local, a instituição e o seu histórico de crédito.'],
        ],
    ],

    'date-calculator' => [
        'slug' => 'calculadora-de-datas',
        'name' => 'Calculadora de datas',
        'short_description' => 'Conte os dias entre datas ou some e subtraia dias, semanas e meses.',
        'description' => 'Calcule quantos dias, semanas, meses e dias úteis há entre duas datas, ou some e subtraia dias, semanas, meses e anos para chegar a uma data futura ou passada.',
        'seo_title' => 'Calculadora de datas: dias entre datas',
        'seo_description' => 'Conte os dias entre duas datas, incluindo os dias úteis, ou some e subtraia dias, semanas e meses de qualquer data. Grátis e instantâneo.',
        'content' => <<<'HTML'
<h2>Usos comuns</h2>
<ul>
<li><strong>Prazos:</strong> que data é daqui a 30 dias úteis?</li>
<li><strong>Contagens regressivas:</strong> quantos dias faltam para um casamento, uma prova, uma viagem ou um lançamento?</li>
<li><strong>Contratos e avisos prévios:</strong> a data 90 dias depois da assinatura.</li>
<li><strong>Gravidez, garantias e assinaturas:</strong> somar semanas ou meses a uma data inicial.</li>
<li><strong>Planejamento de projetos:</strong> o número de dias úteis entre dois marcos.</li>
</ul>
<h2>Como os meses são contados</h2>
<p>Somar meses segue o calendário, não um número fixo de dias. Um mês depois de 15 de março é 15 de abril, independentemente da duração do mês. Quando o dia não existe — como 30 de fevereiro — é usado o último dia do mês.</p>
<p>Para saber a idade exata de alguém e o próximo aniversário, use a Calculadora de idade.</p>
HTML,
        'steps' => [
            'Escolha <strong>Dias entre datas</strong> para contar o tempo entre duas datas, ou <strong>Somar ou subtrair</strong> para chegar a uma data futura ou passada.',
            'Escolha as datas no calendário ou digite-as.',
            'Ative <strong>Incluir a data final</strong> quando o primeiro e o último dia devem contar, por exemplo em uma reserva ou um projeto.',
            'Use <strong>Somente dias úteis</strong> para pular sábados e domingos, por exemplo para calcular um prazo.',
        ],
        'faq' => [
            ['q' => 'Quantos dias há entre duas datas?', 'a' => 'Informe as duas datas em Dias entre datas. O resultado mostra o total de dias, o mesmo período em semanas, meses e anos e o número de dias úteis.'],
            ['q' => 'Devo incluir a data final?', 'a' => 'Por padrão, a calculadora conta os dias da data inicial até a final, como quando você conta diárias de hotel. Inclua a data final quando os dois dias contam, como em um evento de 3 dias de segunda a quarta.'],
            ['q' => 'O que conta como dia útil?', 'a' => 'De segunda a sexta-feira. Os feriados não são excluídos porque mudam conforme o país e a cidade, então subtraia-os manualmente se precisar.'],
            ['q' => 'E se eu somar um mês a 31 de janeiro?', 'a' => 'O resultado é o último dia de fevereiro (28 ou 29), porque fevereiro não tem dia 31. É assim que bancos e a maioria dos calendários fazem.'],
            ['q' => 'Posso calcular a idade de alguém?', 'a' => 'Sim, mas a Calculadora de idade foi feita para isso e ainda mostra a contagem regressiva para o próximo aniversário.'],
        ],
    ],

    'debt-payoff-calculator' => [
        'slug' => 'calculadora-quitacao-de-dividas',
        'name' => 'Calculadora de quitação de dívidas',
        'short_description' => 'Planeje quando ficará sem dívidas com o método avalanche ou bola de neve.',
        'description' => 'Adicione seus cartões de crédito e empréstimos para ver quando ficará sem dívidas e quanto pagará de juros com os métodos avalanche e bola de neve, comparado a pagar só os mínimos.',
        'seo_title' => 'Calculadora de dívidas: avalanche ou bola de neve',
        'seo_description' => 'Calculadora de dívidas grátis. Compare os métodos avalanche e bola de neve, veja quando ficará sem dívidas e quanto de juros os pagamentos extras economizam.',
        'content' => <<<'HTML'
<h2>Avalanche ou bola de neve?</h2>
<p>Os dois métodos pagam o mínimo de cada dívida e direcionam todo o dinheiro extra para uma dívida alvo. A <strong>avalanche</strong> ataca primeiro os maiores juros, que é sempre o mais barato. A <strong>bola de neve</strong> ataca primeiro o menor saldo, então você quita contas mais cedo: um empurrão de motivação que ajuda muita gente a manter o plano. O melhor método é aquele que você vai seguir.</p>
<h2>Dicas para sair das dívidas mais rápido</h2>
<ul>
<li>Pare de fazer compras novas nos cartões que está quitando.</li>
<li>Peça ao seu banco uma taxa menor: costuma funcionar se você tem bom histórico de pagamento.</li>
<li>Considere a portabilidade ou um crédito consolidado com juros menores, conferindo antes as tarifas.</li>
<li>Direcione rendas extras, como restituição do imposto de renda, 13º salário ou bônus, direto para a dívida alvo.</li>
</ul>
<p>Está para pegar um empréstimo novo? A Calculadora de empréstimo mostra o custo total antes de assinar.</p>
HTML,
        'steps' => [
            'Liste suas dívidas com o <strong>saldo</strong>, a <strong>taxa de juros anual</strong> e o <strong>pagamento mínimo</strong>.',
            'Informe quanto <strong>extra</strong> você consegue pagar por mês além dos mínimos.',
            'Compare os métodos <strong>avalanche</strong> e <strong>bola de neve</strong> com pagar só os mínimos.',
            'Siga a ordem de quitação do método escolhido. Quando uma dívida é quitada, o pagamento dela passa para a próxima.',
        ],
        'faq' => [
            ['q' => 'O que é o método avalanche?', 'a' => 'Com o método avalanche você paga o mínimo de cada dívida e coloca todo o dinheiro extra na dívida com os maiores juros. É o que mais economiza em juros.'],
            ['q' => 'O que é o método bola de neve?', 'a' => 'Com o método bola de neve você coloca o dinheiro extra primeiro no menor saldo. Você paga um pouco mais de juros, mas as vitórias rápidas mantêm muita gente motivada.'],
            ['q' => 'O que significa o pagamento “passar” para a próxima dívida?', 'a' => 'Quando você quita uma dívida, o dinheiro que ia para ela é somado à próxima. Seu pagamento mensal total continua o mesmo, então o ritmo de quitação acelera com o tempo.'],
            ['q' => 'Por que diz que minha dívida nunca será quitada?', 'a' => 'Se seus pagamentos forem menores que os juros cobrados a cada mês, o saldo nunca diminui. Aumente o pagamento mínimo ou o pagamento extra.'],
            ['q' => 'Minhas informações financeiras são salvas?', 'a' => 'Não. Tudo é calculado no seu navegador e nada é enviado aos nossos servidores.'],
        ],
    ],
];
