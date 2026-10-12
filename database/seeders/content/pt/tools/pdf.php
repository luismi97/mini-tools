<?php

/*
| Portuguese copy for the PDF tools (and Image to PDF). See content/pt/tools.php.
*/

return [
    'merge-pdf' => [
        'slug' => 'juntar-pdf',
        'name' => 'Juntar PDF',
        'short_description' => 'Combine vários arquivos PDF em um único documento, na ordem que quiser.',
        'description' => 'Adicione seus arquivos PDF, arraste-os para a ordem que preferir e junte tudo em um só PDF. Os arquivos são combinados no seu navegador e nunca são enviados.',
        'seo_title' => 'Juntar PDF online grátis e com privacidade',
        'seo_description' => 'Junte arquivos PDF grátis online. Combine vários PDFs em um, ordene arrastando e baixe na hora. Sem enviar arquivos e sem cadastro.',
        'content' => <<<'HTML'
<h2>Quando vale a pena juntar arquivos PDF</h2>
<p>Combinar PDFs é útil quando você precisa enviar um único documento: uma candidatura com currículo e carta de apresentação, uma prestação de contas com todos os comprovantes ou um contrato com seus anexos. Um arquivo só é mais fácil de mandar por e-mail, de enviar em portais que aceitam um único anexo e de imprimir na ordem certa.</p>
<h2>Junte PDFs sem enviá-los para a internet</h2>
<p>A maioria dos serviços de PDF online envia seus documentos para os próprios servidores. Esta ferramenta combina os arquivos diretamente no seu navegador, então documentos confidenciais como extratos bancários, laudos médicos e contratos nunca saem do seu computador ou celular.</p>
<h2>Dicas</h2>
<ul>
<li>Use primeiro o Dividir PDF se você só precisa de algumas páginas de um arquivo.</li>
<li>Tem fotos ou digitalizações em vez de PDFs? Converta-as com o JPG para PDF e depois junte.</li>
<li>Precisa das páginas como imagens? Use o PDF para JPG.</li>
</ul>
HTML,
        'steps' => [
            'Solte dois ou mais arquivos PDF na área indicada ou clique para procurá-los.',
            'Arraste os arquivos (ou use as setas) para deixá-los na ordem que quiser. O número de páginas de cada arquivo é exibido.',
            'Clique em <strong>Juntar PDF</strong>.',
            'Seu PDF combinado é baixado na hora como <code>merged.pdf</code>.',
        ],
        'faq' => [
            ['q' => 'Meus arquivos PDF são enviados para um servidor?', 'a' => 'Não. Os PDFs são juntados inteiramente no seu navegador, então documentos confidenciais nunca saem do seu dispositivo.'],
            ['q' => 'Existe limite de arquivos ou de tamanho?', 'a' => 'Você pode juntar até 30 PDFs por vez, com até 100 MB cada. Arquivos muito grandes podem demorar um pouco mais, dependendo do seu dispositivo.'],
            ['q' => 'Links, marcadores e campos de formulário são mantidos?', 'a' => 'O conteúdo das páginas, as imagens e o texto ficam exatamente iguais. Recursos interativos, como marcadores e alguns campos de formulário, podem não ser levados para o arquivo final.'],
            ['q' => 'Posso juntar PDFs protegidos por senha?', 'a' => 'Não. Remova a senha do PDF primeiro e depois junte.'],
            ['q' => 'Posso reordenar ou remover páginas?', 'a' => 'Aqui você reordena arquivos inteiros. Para remover ou extrair páginas específicas, use o Dividir PDF antes ou depois de juntar.'],
        ],
    ],

    'split-pdf' => [
        'slug' => 'dividir-pdf',
        'name' => 'Dividir PDF',
        'short_description' => 'Extraia páginas ou divida um PDF em vários arquivos menores.',
        'description' => 'Extraia páginas específicas para um novo PDF, divida um documento em intervalos personalizados ou salve cada página como um PDF separado. Seu arquivo é processado no navegador.',
        'seo_title' => 'Dividir PDF online: extraia páginas grátis',
        'seo_description' => 'Divida arquivos PDF grátis online. Extraia páginas, separe por intervalos ou salve cada página como um PDF. Privado: seus arquivos não saem do seu dispositivo.',
        'content' => <<<'HTML'
<h2>Por que dividir um PDF?</h2>
<p>Muitas vezes um PDF grande tem mais do que você precisa compartilhar. Dividi-lo permite enviar só as páginas relevantes de um contrato, separar uma única fatura de um extrato mensal, separar documentos digitalizados juntos ou quebrar um arquivo enorme em partes que respeitem os limites do e-mail e dos formulários de envio.</p>
<h2>Exemplos de intervalos de páginas</h2>
<ul>
<li><code>1-3</code>: páginas 1, 2 e 3.</li>
<li><code>1, 4, 7</code>: três páginas avulsas.</li>
<li><code>5-</code>: da página 5 até a última.</li>
<li><code>1-2, 10-12</code>: dois grupos de páginas.</li>
</ul>
<p>Para reunir páginas de arquivos diferentes, use o Juntar PDF. Para transformar páginas em imagens, use o PDF para JPG.</p>
HTML,
        'steps' => [
            'Solte um PDF na área indicada ou clique para procurá-lo. Quando ele carrega, o número de páginas é exibido.',
            'Escolha um modo: <strong>Extrair páginas</strong> para um novo PDF, <strong>Dividir por intervalos</strong> em vários PDFs ou <strong>Cada página</strong> como um PDF separado.',
            'Digite as páginas ou os intervalos, por exemplo <code>1-3, 5, 8-</code> (<code>8-</code> significa da página 8 até o fim).',
            'Clique em <strong>Dividir PDF</strong>. Um único arquivo é baixado direto; vários arquivos são baixados juntos em um ZIP.',
        ],
        'faq' => [
            ['q' => 'Como extraio páginas específicas de um PDF?', 'a' => 'Escolha Extrair páginas e digite os números, por exemplo <code>2, 4-6</code>. Você recebe um novo PDF só com essas páginas, nessa ordem.'],
            ['q' => 'Posso dividir um PDF em vários arquivos?', 'a' => 'Sim. Use Dividir por intervalos: cada intervalo separado por vírgula vira um PDF próprio. Ou escolha Cada página para salvar cada página separadamente.'],
            ['q' => 'Meu PDF é enviado para a internet?', 'a' => 'Não. O PDF é dividido no seu navegador e nunca sai do seu dispositivo, por isso é seguro para contratos, notas fiscais e outros documentos privados.'],
            ['q' => 'O arquivo original é alterado?', 'a' => 'Não. Seu PDF original continua exatamente igual; a ferramenta só cria arquivos novos.'],
            ['q' => 'Funciona com PDFs protegidos por senha?', 'a' => 'Não. Remova a senha do PDF primeiro.'],
        ],
    ],

    'pdf-to-jpg' => [
        'slug' => 'pdf-para-jpg',
        'name' => 'PDF para JPG',
        'short_description' => 'Converta cada página de um PDF em uma imagem JPG de alta qualidade.',
        'description' => 'Converta cada página de um PDF em uma imagem JPG na resolução que escolher. Baixe as páginas uma a uma ou todas juntas em um ZIP. Seu PDF é processado no navegador.',
        'seo_title' => 'Converter PDF para JPG grátis e em alta qualidade',
        'seo_description' => 'Converta PDF para JPG grátis online. Cada página vira uma imagem de alta resolução (até 300 DPI). Baixe em ZIP. Seu PDF não sai do seu dispositivo.',
        'content' => <<<'HTML'
<h2>Por que converter PDF para JPG?</h2>
<p>Imagens são mais fáceis de compartilhar do que PDFs em conversas e redes sociais, podem ser inseridas em apresentações e documentos e têm prévia instantânea em qualquer dispositivo. Converter uma página de PDF em JPG também é o jeito mais simples de transformar um slide, um panfleto ou um certificado em imagem.</p>
<h2>Como escolher a resolução</h2>
<ul>
<li><strong>72 DPI</strong>: prévias pequenas e miniaturas.</li>
<li><strong>150 DPI</strong>: para ver na tela, documentos e apresentações.</li>
<li><strong>300 DPI</strong>: para imprimir e dar zoom em textos pequenos.</li>
</ul>
<p>Só precisa de algumas páginas? Extraia-as primeiro com o Dividir PDF. Para voltar de imagens para documento, use o JPG para PDF.</p>
HTML,
        'steps' => [
            'Solte um PDF na área indicada ou clique para procurá-lo.',
            'Escolha a resolução: <strong>72 DPI</strong> para telas, <strong>150 DPI</strong> para a maioria dos usos ou <strong>300 DPI</strong> para imprimir.',
            'Clique em <strong>Converter para JPG</strong>. Cada página é gerada como imagem e uma prévia é exibida.',
            'Baixe páginas avulsas ou clique em <strong>Baixar tudo</strong> para receber todas as páginas em um ZIP.',
        ],
        'faq' => [
            ['q' => 'Qual DPI devo escolher?', 'a' => '150 DPI é uma boa escolha para compartilhar e para documentos. Use 300 DPI para imprimir ou quando precisar ampliar textos pequenos, e 72 DPI para prévias na web. Quanto maior o DPI, maiores os arquivos.'],
            ['q' => 'Meu PDF é enviado para um servidor?', 'a' => 'Não. As páginas são geradas no seu navegador com o PDF.js, o mesmo mecanismo usado pelo Firefox. Seu arquivo nunca sai do seu dispositivo.'],
            ['q' => 'Quantas páginas posso converter?', 'a' => 'Até 200 páginas por PDF, com arquivos de até 100 MB.'],
            ['q' => 'Posso converter um PDF para PNG?', 'a' => 'Esta ferramenta cria imagens JPG, ideais para documentos e fotos. Se precisar de PNG, converta depois os JPGs com o JPG para PNG.'],
            ['q' => 'Funciona com PDFs protegidos por senha?', 'a' => 'Não. Remova a senha do PDF primeiro.'],
        ],
    ],

    'jpg-to-pdf' => [
        'slug' => 'jpg-para-pdf',
        'name' => 'JPG para PDF',
        'short_description' => 'Converta fotos e digitalizações JPG em um único documento PDF.',
        'description' => 'Combine imagens JPG em um só PDF, escolha o tamanho da página, a orientação e as margens e reordene as páginas antes de baixar. Tudo acontece no seu navegador.',
        'seo_title' => 'Converter JPG para PDF: junte imagens em um PDF',
        'seo_description' => 'Converta JPG para PDF grátis online. Combine várias fotos em um PDF com páginas A4, Carta ou ajustadas à imagem. Privado, rápido e sem cadastro.',
        'content' => <<<'HTML'
<h2>Transforme fotos e digitalizações em um só PDF</h2>
<p>O PDF é o formato padrão para os documentos que você envia a escolas, empregadores, bancos e órgãos públicos. Converter em um único PDF as fotos JPG de comprovantes, documentos de identidade, trabalhos ou páginas assinadas mantém tudo em ordem e deixa o arquivo fácil de enviar e de imprimir.</p>
<h2>Dicas para um bom resultado</h2>
<ul>
<li>Fotografe os documentos com boa luz, bem retos e de cima.</li>
<li>Use o Cortar imagem para tirar o fundo e as bordas da mesa antes de converter.</li>
<li>Escolha A4 ou Carta para documentos que serão impressos, e Ajustar à imagem para álbuns de fotos.</li>
<li>Combine o resultado com outros documentos usando o Juntar PDF.</li>
</ul>
<p>Também tem capturas de tela PNG ou imagens WebP? Use o Imagem para PDF, que aceita todos os formatos de imagem comuns.</p>
HTML,
        'steps' => [
            'Solte suas fotos JPG ou páginas digitalizadas na área indicada, ou clique para procurá-las. Adicione quantas precisar.',
            'Arraste as imagens (ou use as setas) para definir a ordem das páginas.',
            'Escolha o tamanho da página — <strong>A4</strong>, <strong>Carta (EUA)</strong> ou <strong>Ajustar à imagem</strong> —, além da orientação e das margens.',
            'Clique em <strong>Converter para PDF</strong> para baixar um PDF com cada imagem em sua própria página.',
        ],
        'faq' => [
            ['q' => 'Como junto vários JPGs em um só PDF?', 'a' => 'Adicione todos os seus arquivos JPG, ordene-os e clique em Converter para PDF. Cada imagem vira uma página do mesmo PDF.'],
            ['q' => 'Minhas fotos ficarão na orientação certa?', 'a' => 'Sim. A orientação salva por celulares e câmeras (EXIF) é aplicada, então fotos em retrato ficam em pé. A orientação automática também deixa a página em paisagem para imagens largas.'],
            ['q' => 'Qual tamanho de página devo escolher?', 'a' => 'Use A4 no Brasil e na maior parte do mundo, e Carta para os Estados Unidos e o Canadá. Ajustar à imagem cria páginas do tamanho exato de cada foto, sem bordas brancas.'],
            ['q' => 'Minhas imagens são enviadas para a internet?', 'a' => 'Não. O PDF é criado no seu navegador. Suas fotos e documentos nunca saem do seu dispositivo.'],
            ['q' => 'Posso adicionar imagens PNG ou WebP?', 'a' => 'Esta página é para arquivos JPG. Use o Imagem para PDF para combinar imagens JPG, PNG e WebP em um só PDF.'],
        ],
    ],

    'rotate-pdf' => [
        'slug' => 'girar-pdf',
        'name' => 'Girar PDF',
        'short_description' => 'Gire todas as páginas ou só as que estão de lado.',
        'description' => 'Corrija páginas de lado ou de cabeça para baixo: veja a prévia de cada página, gire páginas avulsas ou o documento inteiro e baixe o PDF corrigido. Seu arquivo nunca sai do navegador.',
        'seo_title' => 'Girar PDF online: uma página ou todas',
        'seo_description' => 'Gire páginas de PDF grátis online. Veja a prévia de cada página, gire uma ou todas em 90° ou 180° e salve de forma permanente. Privado: sem enviar arquivos.',
        'content' => <<<'HTML'
<h2>Corrija digitalizações de lado em segundos</h2>
<p>Scanners e apps de digitalização no celular costumam salvar algumas páginas de lado ou de cabeça para baixo, principalmente quando o documento mistura páginas em retrato e paisagem. Girá-las faz o PDF ser lido corretamente na tela e impresso na orientação certa.</p>
<h2>Gire só o que for necessário</h2>
<p>As prévias permitem girar páginas individuais em vez do arquivo inteiro. Cada clique gira uma página 90° no sentido horário; os botões de seta giram para a esquerda ou para a direita, e a rotação é salva de forma permanente no arquivo baixado, sem perda de qualidade.</p>
<p>Também precisa remover páginas? Use o Excluir páginas de PDF. Para combinar vários documentos, use o Juntar PDF, e para transformar páginas em imagens, use o PDF para JPG.</p>
HTML,
        'steps' => [
            'Solte um PDF na área indicada ou clique para procurá-lo. Aparece uma prévia de cada página.',
            'Clique em uma página (ou nos botões de seta dela) para girá-la 90°. Use <strong>Girar todas</strong> para girar todas as páginas de uma vez.',
            'Gire só as páginas que precisarem, por exemplo as digitalizadas que ficaram de lado ou de cabeça para baixo.',
            'Clique em <strong>Baixar PDF girado</strong> para salvar o arquivo corrigido.',
        ],
        'faq' => [
            ['q' => 'Posso girar uma única página de um PDF?', 'a' => 'Sim. Cada página tem seus próprios botões de rotação, então você pode girar só as que estão de lado e deixar o resto igual.'],
            ['q' => 'A rotação é permanente?', 'a' => 'Sim. A nova orientação é salva no PDF baixado, então ele abre corretamente em qualquer leitor de PDF, navegador e impressora.'],
            ['q' => 'Girar o PDF reduz a qualidade?', 'a' => 'Não. A rotação só muda a orientação da página. O texto, as imagens e a qualidade ficam exatamente iguais.'],
            ['q' => 'Meu PDF é enviado para a internet?', 'a' => 'Não. O PDF é processado no seu navegador e nunca sai do seu dispositivo.'],
            ['q' => 'Funciona com PDFs protegidos por senha?', 'a' => 'Não. Remova a senha do PDF primeiro.'],
        ],
    ],

    'delete-pdf-pages' => [
        'slug' => 'excluir-paginas-pdf',
        'name' => 'Excluir páginas de PDF',
        'short_description' => 'Remova páginas indesejadas de um PDF de forma visual.',
        'description' => 'Veja a prévia de cada página de um PDF, clique nas que quer remover e baixe uma cópia limpa. Ideal para páginas em branco de digitalizações e páginas confidenciais que não devem ser compartilhadas.',
        'seo_title' => 'Excluir páginas de um PDF grátis',
        'seo_description' => 'Remova páginas de um PDF grátis online. Veja todas as páginas, clique para excluí-las e baixe o novo PDF. Tudo é processado no seu navegador.',
        'content' => <<<'HTML'
<h2>Por que remover páginas de um PDF?</h2>
<p>Documentos digitalizados costumam trazer páginas em branco, páginas repetidas ou folhas de rosto. Outras vezes você precisa compartilhar um documento sem as páginas que contêm dados pessoais ou confidenciais. Remover essas páginas deixa o arquivo mais leve, mais organizado e mais seguro para enviar.</p>
<h2>Remover, manter ou extrair</h2>
<p>Esta ferramenta é ideal quando você quer descartar algumas páginas e manter o resto. Se só precisa de poucas páginas de um documento longo, o Dividir PDF permite extraí-las digitando os números. Páginas de lado se corrigem com o Girar PDF, e vários arquivos já organizados podem ser combinados com o Juntar PDF.</p>
HTML,
        'steps' => [
            'Solte um PDF na área indicada ou clique para procurá-lo. Aparece uma prévia de cada página.',
            'Clique nas páginas que quer remover. Elas ficam marcadas em vermelho; clique de novo para manter uma página.',
            'Confira o contador para saber quantas páginas serão excluídas.',
            'Clique em <strong>Baixar PDF editado</strong> para salvar uma cópia sem essas páginas.',
        ],
        'faq' => [
            ['q' => 'Como excluo páginas de um PDF?', 'a' => 'Abra o PDF aqui, clique em cada página que quer remover e baixe o arquivo editado. As páginas restantes mantêm a ordem original.'],
            ['q' => 'O arquivo original é alterado?', 'a' => 'Não. Seu PDF original continua igual; a ferramenta baixa uma cópia nova sem as páginas excluídas.'],
            ['q' => 'Posso remover páginas em branco de uma digitalização?', 'a' => 'Sim. Com as prévias é fácil identificar páginas em branco ou repetidas: basta clicar nelas para removê-las.'],
            ['q' => 'Meu PDF é enviado para a internet?', 'a' => 'Não. Tudo acontece no seu navegador, então documentos privados nunca saem do seu dispositivo.'],
            ['q' => 'Posso extrair páginas em vez de removê-las?', 'a' => 'Sim. Para manter só algumas páginas, o Dividir PDF permite digitar os números das páginas que você quer extrair.'],
        ],
    ],

    'image-to-pdf' => [
        'slug' => 'imagem-para-pdf',
        'name' => 'Imagem para PDF',
        'short_description' => 'Converta imagens JPG, PNG e WebP em um único arquivo PDF.',
        'description' => 'Converta fotos, capturas de tela e digitalizações em qualquer formato comum em um só PDF. Reordene as imagens, escolha o tamanho da página e as margens e baixe na hora.',
        'seo_title' => 'Converter imagem para PDF: JPG, PNG e WebP',
        'seo_description' => 'Converta imagens para PDF grátis online. Combine JPG, PNG e WebP em um PDF, reordene páginas e escolha A4, Carta ou ajustar à imagem. Sem enviar arquivos.',
        'content' => <<<'HTML'
<h2>Combine qualquer imagem em um PDF</h2>
<p>Transforme capturas de tela, páginas digitalizadas, fotos de comprovantes e gráficos exportados em um só PDF que qualquer pessoa pode abrir, imprimir ou anexar a um e-mail. Você pode misturar imagens JPG, PNG e WebP no mesmo documento e ordená-las como quiser.</p>
<h2>Como escolher o tamanho da página</h2>
<ul>
<li><strong>A4</strong>: tamanho padrão de documentos no Brasil e na maioria dos países.</li>
<li><strong>Carta</strong>: padrão nos Estados Unidos e no Canadá.</li>
<li><strong>Ajustar à imagem</strong>: cada página tem exatamente o tamanho da sua imagem, sem bordas brancas.</li>
</ul>
<p>Só tem fotos JPG? O JPG para PDF funciona do mesmo jeito. Para adicionar o resultado a outros PDFs, use o Juntar PDF.</p>
HTML,
        'steps' => [
            'Solte suas imagens na área indicada ou clique para procurá-las. Você pode misturar JPG, PNG e WebP no mesmo PDF.',
            'Reordene as imagens arrastando-as ou com os botões de seta.',
            'Escolha o tamanho da página, a orientação e a margem.',
            'Clique em <strong>Converter para PDF</strong> e seu PDF é baixado na hora.',
        ],
        'faq' => [
            ['q' => 'Quais formatos de imagem posso converter em PDF?', 'a' => 'JPG, JPEG, PNG e WebP. Você pode combinar formatos diferentes no mesmo PDF.'],
            ['q' => 'O que acontece com os fundos transparentes dos PNGs?', 'a' => 'As áreas transparentes são colocadas sobre uma página branca, que é como elas aparecem na impressão.'],
            ['q' => 'Posso transformar capturas de tela em um PDF?', 'a' => 'Sim. Capturas de tela costumam ser arquivos PNG: adicione todas, ordene e converta. Use Ajustar à imagem para evitar bordas brancas.'],
            ['q' => 'Minhas imagens ficam privadas?', 'a' => 'Sim. Tudo acontece no seu navegador, então suas imagens nunca são enviadas.'],
        ],
    ],
];
