<?php

/*
| Portuguese copy for the image tools. See content/pt/tools.php.
*/

return [
    'image-compressor' => [
        'slug' => 'comprimir-imagens',
        'name' => 'Comprimir imagens',
        'short_description' => 'Reduza o tamanho de imagens JPG, PNG e WebP sem perda visível de qualidade.',
        'description' => 'Comprima uma ou várias imagens de uma vez e veja quanto cada arquivo economiza. As imagens são processadas no seu dispositivo e nunca são enviadas a um servidor.',
        'seo_title' => 'Comprimir imagens JPG, PNG e WebP online',
        'seo_description' => 'Comprima imagens JPG, PNG e WebP grátis online. Qualidade ajustável, processamento em lote e download imediato. Seus arquivos não saem do dispositivo.',
        'content' => <<<'HTML'
<h2>Por que comprimir imagens?</h2>
<p>Imagens pesadas são a causa mais comum de sites lentos. Comprimi-las reduz o tamanho do arquivo — muitas vezes entre 60 e 80% — sem diferença visível, o que melhora a velocidade de carregamento, as Core Web Vitals e o SEO. Arquivos menores também são mais fáceis de mandar por e-mail, de enviar em formulários com limite de tamanho e de armazenar.</p>
<h2>Compressão com perdas e sem perdas</h2>
<p>JPG e WebP usam compressão com perdas: descartam detalhes que o olho quase não percebe, por isso o controle de qualidade faz tanta diferença. O PNG é sem perdas, então para fotos salvas em PNG o que mais economiza é convertê-las em WebP ou JPG, ou reduzir as dimensões com o Redimensionar imagens.</p>
<h2>Os melhores formatos para a web</h2>
<ul>
<li><strong>WebP</strong>: a melhor opção geral para sites; veja o JPG para WebP e o PNG para WebP.</li>
<li><strong>JPG</strong>: compatibilidade universal para fotos.</li>
<li><strong>PNG</strong>: capturas de tela, logos e gráficos que precisam de bordas nítidas ou transparência.</li>
</ul>
HTML,
        'steps' => [
            'Arraste suas imagens JPG, PNG ou WebP para a área indicada, clique para procurá-las ou cole uma imagem com Ctrl + V.',
            'Ajuste o controle de <strong>Qualidade</strong>. Entre 70 e 80% costuma reduzir muito o tamanho sem diferença visível.',
            'Se quiser, converta para outro formato ou limite a largura máxima: reduzir fotos grandes é o que mais economiza espaço.',
            'Baixe cada imagem ou clique em <strong>Baixar tudo</strong> para receber todas as imagens comprimidas em um único ZIP.',
        ],
        'faq' => [
            ['q' => 'Minhas imagens são enviadas para um servidor?', 'a' => 'Não. A compressão acontece inteiramente no seu navegador, usando o seu dispositivo. Suas imagens nunca são enviadas, armazenadas nem vistas por mais ninguém.'],
            ['q' => 'Qual qualidade devo usar?', 'a' => 'Para fotos em sites, 70–80% é um ótimo equilíbrio entre tamanho e qualidade. Use 85–95% para imagens em que os detalhes importam e 50–65% quando o mais importante é o arquivo menor.'],
            ['q' => 'Por que meu PNG quase não diminuiu?', 'a' => 'O PNG é um formato sem perdas, então o controle de qualidade quase não o afeta. Para arquivos bem menores, converta as fotos PNG em <strong>WebP</strong> ou <strong>JPG</strong> com a opção de formato de saída, ou reduza a largura máxima. Se recodificar deixar o arquivo maior, o original é mantido.'],
            ['q' => 'A compressão remove os metadados EXIF?', 'a' => 'Sim. As imagens recodificadas não mantêm metadados EXIF, como dados da câmera ou localização GPS, o que também melhora sua privacidade. A orientação é aplicada antes de os metadados serem removidos.'],
            ['q' => 'Quantas imagens posso comprimir de uma vez?', 'a' => 'Até 30 imagens por lote, com até 25 MB cada.'],
        ],
    ],

    'image-resizer' => [
        'slug' => 'redimensionar-imagens',
        'name' => 'Redimensionar imagens',
        'short_description' => 'Mude o tamanho de imagens por pixels ou porcentagem, uma ou várias de uma vez.',
        'description' => 'Mude a largura e a altura de imagens JPG, PNG e WebP em pixels exatos ou por porcentagem, mantendo a proporção. Redimensione em lote e baixe tudo em um ZIP.',
        'seo_title' => 'Redimensionar imagens JPG, PNG e WebP grátis',
        'seo_description' => 'Mude o tamanho de imagens grátis online. Defina largura e altura em pixels ou escale por porcentagem, mantenha a proporção e processe em lote. Sem enviar nada.',
        'content' => <<<'HTML'
<h2>Por que redimensionar imagens?</h2>
<p>As câmeras dos celulares produzem fotos com 4000 pixels de largura ou mais, muito maiores do que qualquer tela precisa. Redimensioná-las para o tamanho em que realmente serão exibidas faz com que carreguem mais rápido, ocupem menos espaço e atendam aos requisitos de sites, lojas virtuais e redes sociais.</p>
<h2>Tamanhos de imagem recomendados</h2>
<ul>
<li><strong>Imagens de destaque de um site:</strong> 1920 px de largura.</li>
<li><strong>Imagens de blog e de produtos:</strong> 800–1200 px de largura.</li>
<li><strong>Posts do Instagram:</strong> 1080 × 1080 px (quadrado) ou 1080 × 1350 px (retrato).</li>
<li><strong>Miniaturas do YouTube:</strong> 1280 × 720 px.</li>
<li><strong>Anexos de e-mail:</strong> 1200–1600 px no lado maior.</li>
</ul>
<p>Precisa de um formato exato em vez de um tamanho menor? Use o Cortar imagem para recortar a foto em uma proporção específica e depois deixe-a mais leve com o Comprimir imagens.</p>
HTML,
        'steps' => [
            'Solte suas imagens JPG, PNG ou WebP na área indicada, procure-as ou cole com Ctrl + V. Você pode redimensionar muitas de uma vez.',
            'Escolha <strong>Por porcentagem</strong> para escalar tudo (por exemplo, 50%) ou <strong>Por tamanho</strong> para definir largura e/ou altura exatas em pixels.',
            'Deixe <strong>Manter proporção</strong> ativado para não distorcer. Se você definir largura e altura, cada imagem se ajusta dentro desse retângulo.',
            'Baixe cada imagem ou clique em <strong>Baixar tudo</strong> para receber um ZIP.',
        ],
        'faq' => [
            ['q' => 'Redimensionar reduz a qualidade?', 'a' => 'Diminuir uma imagem a mantém nítida. Aumentá-la além do tamanho original não consegue adicionar detalhes, então ela pode ficar um pouco borrada. Em JPG e WebP você também pode escolher a qualidade de saída.'],
            ['q' => 'Como mudo o tamanho sem distorcer a imagem?', 'a' => 'Deixe <strong>Manter proporção</strong> ativado e informe só a largura ou só a altura. O outro lado é calculado automaticamente para manter as proporções originais.'],
            ['q' => 'Que tamanho as imagens para a web devem ter?', 'a' => 'Na maioria dos sites bastam 1200–1920 px de largura para imagens em tela cheia e 600–800 px para imagens dentro do conteúdo. Imagens menores carregam mais rápido e melhoram as Core Web Vitals.'],
            ['q' => 'Minhas imagens são enviadas para a internet?', 'a' => 'Não. As imagens são redimensionadas no seu navegador e nunca saem do seu dispositivo.'],
            ['q' => 'Quantas imagens posso redimensionar de uma vez?', 'a' => 'Até 30 imagens por lote, com até 25 MB cada.'],
        ],
    ],

    'heic-to-jpg' => [
        'slug' => 'heic-para-jpg',
        'name' => 'HEIC para JPG',
        'short_description' => 'Converta fotos HEIC do iPhone em JPG ou PNG no seu navegador.',
        'description' => 'Converta fotos HEIC e HEIF do seu iPhone ou iPad em JPG ou PNG. Converta em lote e baixe tudo em um ZIP — suas fotos nunca são enviadas.',
        'seo_title' => 'Converter HEIC para JPG: fotos do iPhone grátis',
        'seo_description' => 'Converta HEIC para JPG grátis online. Transforme fotos do iPhone em JPG ou PNG em lote no seu navegador: privado, sem enviar arquivos e sem cadastro.',
        'content' => <<<'HTML'
<h2>Por que converter HEIC para JPG?</h2>
<p>Os iPhones salvam as fotos em HEIC por padrão porque elas ocupam cerca da metade de um JPG. O problema é a compatibilidade: muitos programas do Windows, sites, formulários online, celulares Android antigos e serviços de impressão ainda não abrem arquivos HEIC. Convertê-las em JPG faz suas fotos abrirem em qualquer lugar.</p>
<h2>Como abrir arquivos HEIC no Windows</h2>
<p>O Windows precisa de um codec adicional para abrir HEIC. Em vez de instalar algo, solte as fotos aqui e converta-as em JPG em segundos. A conversão acontece no seu navegador, então suas fotos pessoais nunca são enviadas.</p>
<h2>JPG ou PNG?</h2>
<p>Escolha <strong>JPG</strong> para fotos: os arquivos são leves e funcionam em todo lugar. Escolha <strong>PNG</strong> só se precisar de qualidade sem perdas para editar. Depois de converter, você pode reduzir ainda mais os arquivos com o Comprimir imagens ou com o Redimensionar imagens.</p>
HTML,
        'steps' => [
            'Solte suas fotos HEIC ou HEIF (de um iPhone ou iPad) na área indicada, ou clique para procurá-las. Você pode converter muitas de uma vez.',
            'Escolha o formato de saída: <strong>JPG</strong> para arquivos leves que abrem em qualquer lugar, ou <strong>PNG</strong> para qualidade sem perdas.',
            'Ajuste a qualidade se precisar. Entre 85 e 92% as fotos ficam idênticas ao original.',
            'Baixe cada foto ou clique em <strong>Baixar tudo</strong> para receber um ZIP com todas as imagens convertidas.',
        ],
        'faq' => [
            ['q' => 'O que é um arquivo HEIC?', 'a' => 'HEIC (High Efficiency Image Container) é o formato de foto padrão dos iPhones e iPads desde o iOS 11. Ele economiza espaço, mas muitos programas do Windows, sites e dispositivos antigos não conseguem abri-lo.'],
            ['q' => 'Minhas fotos são enviadas para a internet?', 'a' => 'Não. Suas fotos são convertidas no seu navegador e nunca saem do seu dispositivo, algo importante para imagens pessoais.'],
            ['q' => 'A orientação da foto é mantida?', 'a' => 'Sim. A informação de rotação salva no arquivo HEIC é aplicada, então fotos em retrato ficam em pé.'],
            ['q' => 'Por que a primeira conversão demora alguns segundos?', 'a' => 'A maioria dos navegadores não lê HEIC sozinha, então o conversor baixa um decodificador HEIC na primeira vez que você o usa. Depois disso as conversões são rápidas. O Safari consegue decodificar HEIC de forma nativa.'],
            ['q' => 'A localização (GPS) é removida?', 'a' => 'Sim. As imagens convertidas não incluem metadados EXIF, como a localização GPS ou os dados da câmera.'],
            ['q' => 'Como faço meu iPhone parar de salvar em HEIC?', 'a' => 'Vá em Ajustes › Câmera › Formatos e escolha <strong>Mais Compatível</strong>. As novas fotos serão salvas em JPG.'],
        ],
    ],

    'crop-image' => [
        'slug' => 'cortar-imagem',
        'name' => 'Cortar imagem',
        'short_description' => 'Corte fotos de forma visual ou em tamanhos e proporções exatos.',
        'description' => 'Arraste para selecionar a área que quer manter, escolha uma proporção como 1:1 ou 16:9 ou digite valores exatos em pixels. Baixe a imagem cortada em JPG, PNG ou WebP.',
        'seo_title' => 'Cortar imagem online grátis',
        'seo_description' => 'Corte imagens grátis online. Arraste para selecionar, use proporções como 1:1, 4:3 e 16:9 ou pixels exatos e baixe em JPG, PNG ou WebP. Sem enviar nada.',
        'content' => <<<'HTML'
<h2>Cortes para redes sociais</h2>
<ul>
<li><strong>1:1</strong>: fotos de perfil e posts quadrados.</li>
<li><strong>4:5</strong>: posts em retrato do Instagram, que ocupam mais espaço no feed.</li>
<li><strong>9:16</strong>: stories, Reels, TikTok e YouTube Shorts.</li>
<li><strong>16:9</strong>: miniaturas do YouTube, apresentações e banners para a web.</li>
</ul>
<h2>Dica de composição: a regra dos terços</h2>
<p>A grade dentro da seleção a divide em terços. Posicionar o assunto sobre uma das linhas ou interseções costuma criar uma foto mais equilibrada e natural do que centralizá-lo.</p>
<p>Depois de cortar, use o Redimensionar imagens para chegar a um tamanho exato em pixels, ou o Comprimir imagens para deixar o arquivo mais leve.</p>
HTML,
        'steps' => [
            'Solte uma imagem na área indicada, clique para procurá-la ou cole com Ctrl + V.',
            'Arraste a seleção para movê-la e arraste os cantos para mudar o tamanho. Use as setas do teclado para ajustes de um pixel (segure Shift para mover 10 px).',
            'Escolha uma proporção como <strong>1:1</strong> para fotos de perfil, <strong>16:9</strong> para miniaturas ou <strong>9:16</strong> para stories, ou digite valores exatos em pixels.',
            'Escolha o formato de saída e clique em <strong>Cortar e baixar</strong>.',
        ],
        'faq' => [
            ['q' => 'Qual proporção devo usar?', 'a' => 'Use 1:1 para fotos de perfil e posts do Instagram, 4:5 para posts em retrato do Instagram, 16:9 para miniaturas do YouTube e apresentações, 9:16 para stories e Reels, e 3:2 ou 4:3 para fotos impressas clássicas.'],
            ['q' => 'Cortar reduz a qualidade?', 'a' => 'O corte mantém os pixels originais da área selecionada em resolução total. Em JPG e WebP você pode escolher a qualidade; a saída PNG é sem perdas.'],
            ['q' => 'Minha foto é enviada para a internet?', 'a' => 'Não. A imagem é cortada no seu navegador e nunca sai do seu dispositivo.'],
            ['q' => 'Quais formatos são aceitos?', 'a' => 'Você pode cortar imagens JPG, PNG e WebP de até 25 MB e salvar o resultado em JPG, PNG ou WebP.'],
        ],
    ],

    'jpg-to-webp' => [
        'slug' => 'jpg-para-webp',
        'name' => 'JPG para WebP',
        'short_description' => 'Converta imagens JPG para o formato WebP, mais leve e rápido.',
        'description' => 'Converta imagens JPG e JPEG em WebP com qualidade ajustável. Converta vários arquivos de uma vez e baixe-os separadamente ou todos juntos. Tudo funciona no seu navegador.',
        'seo_title' => 'Converter JPG para WebP online, grátis e privado',
        'seo_description' => 'Converta JPG para WebP grátis online. Conversão em lote, qualidade ajustável e download em ZIP. As imagens são convertidas no navegador, sem envio.',
        'content' => <<<'HTML'
<h2>Por que converter JPG para WebP?</h2>
<p>Imagens WebP costumam ser de 25 a 35% menores que um JPG com a mesma qualidade visual. Imagens mais leves fazem as páginas carregarem mais rápido, melhoram o Largest Contentful Paint (LCP) e ajudam no posicionamento no Google, que usa a experiência na página como sinal de ranking. Todos os navegadores modernos suportam WebP.</p>
<h2>Como usar WebP no seu site</h2>
<p>A maioria dos gerenciadores de conteúdo, incluindo o WordPress, aceita imagens WebP. Para os melhores resultados, redimensione as imagens para o tamanho em que serão exibidas com o Redimensionar imagens antes de converter, e mantenha a qualidade entre 75 e 85%.</p>
<p>Vai converter gráficos com transparência? Use o PNG para WebP. Precisa voltar para um formato universal? Use o WebP para JPG.</p>
HTML,
        'steps' => [
            'Arraste suas imagens JPG para a área indicada, clique para procurá-las ou cole uma imagem com Ctrl + V. Você pode adicionar várias de uma vez.',
            'Escolha a <strong>Qualidade</strong>. Entre 75 e 85% você obtém arquivos WebP visualmente idênticos e bem mais leves.',
            'Cada imagem é convertida na hora no seu navegador. Confira o novo tamanho e a porcentagem economizada.',
            'Baixe as imagens uma a uma ou clique em <strong>Baixar tudo</strong> para receber um ZIP com todos os arquivos WebP.',
        ],
        'faq' => [
            ['q' => 'O que é WebP?', 'a' => 'WebP é um formato de imagem moderno criado pelo Google. Com a mesma qualidade visual, os arquivos WebP costumam ser de 25 a 35% menores que um JPG, o que faz os sites carregarem mais rápido e melhora as Core Web Vitals.'],
            ['q' => 'Minhas imagens são enviadas para a internet?', 'a' => 'Não. A conversão acontece inteiramente no seu navegador. Suas imagens nunca saem do seu dispositivo.'],
            ['q' => 'Todos os navegadores suportam WebP?', 'a' => 'Sim. Todos os navegadores modernos (Chrome, Edge, Firefox e Safari 14 ou superior) exibem imagens WebP. Para criar arquivos WebP é preciso um navegador recente; se o seu não conseguir, a ferramenta avisa.'],
            ['q' => 'Também posso converter PNG para WebP?', 'a' => 'Sim. Arquivos PNG também são aceitos e a transparência é mantida no WebP.'],
            ['q' => 'Existe algum limite?', 'a' => 'Você pode converter até 30 imagens por lote, com até 25 MB cada.'],
        ],
    ],

    'png-to-webp' => [
        'slug' => 'png-para-webp',
        'name' => 'PNG para WebP',
        'short_description' => 'Converta imagens PNG em WebP mantendo a transparência.',
        'description' => 'Converta arquivos PNG em WebP para deixá-los muito mais leves sem perder a transparência. Converta em lote e baixe separadamente ou em um ZIP, direto no navegador.',
        'seo_title' => 'Converter PNG para WebP com transparência, grátis',
        'seo_description' => 'Converta PNG para WebP grátis online. Mantém a transparência, converte em lote, ajusta a qualidade e baixa em ZIP. As imagens não saem do seu dispositivo.',
        'content' => <<<'HTML'
<h2>PNG ou WebP</h2>
<p>O PNG é ótimo para gráficos com transparência, mas seus arquivos são pesados. O WebP também suporta transparência e costuma ser bem mais leve, então converter para WebP logos, ícones, capturas de tela e fotos de produtos com fundo transparente acelera os sites sem perder as áreas transparentes.</p>
<h2>Quando manter o PNG</h2>
<p>Guarde o PNG original como arquivo mestre para edições futuras e para os lugares que não aceitam WebP. Para fotos JPG, use o JPG para WebP; para reduzir imagens sem mudar de formato, use o Comprimir imagens.</p>
<p>A conversão é feita no seu próprio dispositivo, então seus arquivos nunca são enviados e você pode converter vários de uma vez, conferir o tamanho de cada resultado e baixar tudo junto.</p>
HTML,
        'steps' => [
            'Solte suas imagens PNG na área indicada, clique para procurá-las ou cole uma captura de tela com Ctrl + V.',
            'Ajuste a <strong>Qualidade</strong>. Entre 80 e 90% gráficos e capturas de tela continuam nítidos e o tamanho cai bastante.',
            'Cada PNG é convertido em WebP na hora no seu navegador, mantendo os fundos transparentes.',
            'Baixe as imagens uma a uma ou use <strong>Baixar tudo</strong> para receber um ZIP.',
        ],
        'faq' => [
            ['q' => 'O WebP mantém a transparência do PNG?', 'a' => 'Sim. O WebP suporta canal alfa, então as áreas transparentes e semitransparentes do seu PNG são mantidas.'],
            ['q' => 'Quanto menor o WebP fica em relação ao PNG?', 'a' => 'Em fotos e imagens complexas, o WebP costuma ser de 50 a 80% menor que o PNG. Em gráficos simples com poucas cores a economia é menor, mas o WebP normalmente continua mais leve.'],
            ['q' => 'Posso usar WebP no meu site?', 'a' => 'Sim. Todos os navegadores modernos suportam WebP, e imagens mais leves melhoram a velocidade de carregamento e as Core Web Vitals.'],
            ['q' => 'Meus arquivos são enviados para a internet?', 'a' => 'Não. A conversão acontece no seu dispositivo. Suas imagens nunca são enviadas.'],
        ],
    ],

    'webp-to-jpg' => [
        'slug' => 'webp-para-jpg',
        'name' => 'WebP para JPG',
        'short_description' => 'Converta imagens WebP em JPG, compatível com tudo.',
        'description' => 'Converta imagens WebP em JPG para abri-las em qualquer lugar: programas antigos, e-mail e serviços de impressão. Converta em lote e baixe tudo em um ZIP.',
        'seo_title' => 'Converter WebP para JPG online, grátis e rápido',
        'seo_description' => 'Converta WebP para JPG grátis online. Conversão em lote, qualidade ajustável e download em ZIP. A conversão acontece no navegador, sem enviar arquivos.',
        'content' => <<<'HTML'
<h2>Por que aparecem imagens WebP para mim?</h2>
<p>Muitos sites servem suas imagens em WebP para carregar mais rápido, então as imagens que você salva da internet costumam acabar como arquivos <code>.webp</code>. Alguns programas, impressoras, clientes de e-mail e formulários ainda não os aceitam; convertê-los em JPG resolve o problema.</p>
<h2>Dicas</h2>
<ul>
<li>O JPG não tem transparência: as áreas transparentes ficam brancas.</li>
<li>Use uma qualidade de 85–92% para fotos que você talvez imprima.</li>
<li>Precisa que a imagem fique mais leve depois? Use o Comprimir imagens ou o Redimensionar imagens.</li>
</ul>
<h2>É seguro converter minhas fotos?</h2>
<p>Sim. A conversão acontece no seu próprio dispositivo, então suas imagens nunca são enviadas. Seus arquivos WebP originais não mudam: a ferramenta cria cópias JPG novas que você pode baixar uma a uma ou juntas em um ZIP.</p>
HTML,
        'steps' => [
            'Solte suas imagens WebP na área indicada ou clique para procurá-las. A conversão em lote é suportada.',
            'Defina a <strong>Qualidade</strong> do JPG. Entre 85 e 92% o resultado em fotos é excelente.',
            'Cada imagem é convertida em JPG no seu navegador. As áreas transparentes ficam brancas, porque o JPG não tem transparência.',
            'Baixe os arquivos JPG separadamente ou todos juntos em um ZIP.',
        ],
        'faq' => [
            ['q' => 'Por que converter WebP para JPG?', 'a' => 'O JPG funciona em todo lugar: editores de fotos antigos, clientes de e-mail, documentos de escritório, serviços de impressão e plataformas que não aceitam WebP.'],
            ['q' => 'O que acontece com os fundos transparentes?', 'a' => 'O JPG não suporta transparência, então as áreas transparentes são preenchidas de branco. Para manter a transparência, converta em PNG com o WebP para PNG.'],
            ['q' => 'A qualidade da imagem vai cair?', 'a' => 'Com qualidade de 85% ou mais, a diferença não aparece em fotos. O JPG pode ficar maior que o WebP porque a compressão JPG é menos eficiente.'],
            ['q' => 'Minhas imagens são enviadas para a internet?', 'a' => 'Não. A conversão acontece no seu navegador e suas imagens nunca saem do seu dispositivo.'],
        ],
    ],

    'png-to-jpg' => [
        'slug' => 'png-para-jpg',
        'name' => 'PNG para JPG',
        'short_description' => 'Converta imagens e capturas de tela PNG em arquivos JPG mais leves.',
        'description' => 'Converta imagens PNG em JPG para deixá-las mais leves e compatíveis com qualquer programa. Converta em lote, escolha a qualidade e baixe tudo em um ZIP, direto no navegador.',
        'seo_title' => 'Converter PNG para JPG grátis, rápido e privado',
        'seo_description' => 'Converta PNG para JPG grátis online. Conversão em lote, qualidade ajustável e download em ZIP. As imagens são convertidas no navegador e nunca enviadas.',
        'content' => <<<'HTML'
<h2>Quando converter PNG para JPG</h2>
<p>Capturas de tela e imagens exportadas costumam ser salvas em PNG, que pode ter vários megabytes para uma única imagem do tipo foto. Convertê-las em JPG reduz muito o tamanho: ideal para anexos de e-mail, formulários com limite de tamanho, anúncios de venda online e para compartilhar em redes sociais.</p>
<h2>Mantenha o PNG quando importar</h2>
<p>O PNG é melhor para logos, ícones, diagramas e tudo o que precise de fundo transparente ou texto perfeitamente nítido. Se você precisa de um arquivo leve e também de transparência, use o PNG para WebP.</p>
<p>Precisa que o arquivo fique ainda menor depois de converter? Passe-o pelo Comprimir imagens ou reduza as dimensões com o Redimensionar imagens.</p>
HTML,
        'steps' => [
            'Solte suas imagens PNG na área indicada, clique para procurá-las ou cole uma captura de tela com Ctrl + V.',
            'Escolha a <strong>Qualidade</strong> do JPG. Entre 85 e 92% fotos e capturas de tela ficam nítidas.',
            'Cada PNG é convertido em JPG na hora. As áreas transparentes ficam brancas, porque o JPG não tem transparência.',
            'Baixe as imagens uma a uma ou clique em <strong>Baixar tudo</strong> para receber um ZIP.',
        ],
        'faq' => [
            ['q' => 'Por que converter PNG para JPG?', 'a' => 'Fotos e capturas de tela salvas em PNG costumam ter várias vezes o tamanho da mesma imagem em JPG. Convertidas, elas ficam mais fáceis de enviar, carregar e compartilhar, e abrem em qualquer programa.'],
            ['q' => 'O que acontece com os fundos transparentes?', 'a' => 'O JPG não consegue guardar transparência, então as áreas transparentes são preenchidas de branco. Para manter a transparência e ainda ter um arquivo leve, use o PNG para WebP.'],
            ['q' => 'Vou perder qualidade?', 'a' => 'O JPG usa compressão com perdas, mas com qualidade de 85% ou mais a diferença não aparece em fotos. Gráficos com texto fino podem ficar um pouco mais suaves; para esses, vale manter PNG ou WebP.'],
            ['q' => 'Minhas imagens são enviadas para a internet?', 'a' => 'Não. A conversão é feita no seu navegador e suas imagens nunca saem do seu dispositivo.'],
        ],
    ],

    'jpg-to-png' => [
        'slug' => 'jpg-para-png',
        'name' => 'JPG para PNG',
        'short_description' => 'Converta fotos JPG em imagens PNG sem perdas.',
        'description' => 'Converta imagens JPG e JPEG em PNG para que não percam mais qualidade ao serem editadas de novo. Converta em lote e baixe todos os arquivos em um ZIP.',
        'seo_title' => 'Converter JPG para PNG online, grátis e sem perdas',
        'seo_description' => 'Converta JPG para PNG grátis online. Conversão em lote e download em ZIP, tudo processado no seu navegador. Sem enviar arquivos e sem cadastro.',
        'content' => <<<'HTML'
<h2>Por que usar PNG?</h2>
<p>O JPG perde um pouco de qualidade cada vez que é editado e salvo de novo. O PNG é sem perdas, então converter uma foto em PNG antes de editá-la a protege de mais desgaste. Muitas ferramentas de design, serviços de impressão e lojas de aplicativos também pedem arquivos PNG.</p>
<h2>O que esperar</h2>
<p>O PNG normalmente fica maior que o JPG original, porque imagens sem perdas guardam cada pixel exatamente. A conversão não recupera detalhes que já se perderam na compressão JPG, e o fundo continua igual: fotos JPG não têm transparência para manter.</p>
<p>Prefere um arquivo leve para a web? Use o JPG para WebP ou o Comprimir imagens. Para recortar uma parte da foto antes, use o Cortar imagem.</p>
HTML,
        'steps' => [
            'Solte suas imagens JPG ou JPEG na área indicada, ou clique para procurá-las. Você pode converter muitas de uma vez.',
            'Cada imagem é convertida em PNG na hora no seu navegador.',
            'Confira o novo tamanho de cada imagem.',
            'Baixe os arquivos PNG separadamente ou todos juntos em um ZIP.',
        ],
        'faq' => [
            ['q' => 'Por que converter JPG para PNG?', 'a' => 'O PNG é sem perdas, então a imagem não perde mais qualidade quando você editá-la e salvá-la de novo. Alguns programas, serviços de impressão e ferramentas de design também exigem arquivos PNG.'],
            ['q' => 'Converter melhora a qualidade?', 'a' => 'Não. A conversão não recupera detalhes que a compressão JPG já removeu, mas evita novas perdas em edições futuras.'],
            ['q' => 'Por que o arquivo PNG fica maior?', 'a' => 'O PNG guarda cada pixel sem compressão com perdas, então as fotos normalmente ficam maiores. Para a web, JPG ou WebP são opções melhores para fotos.'],
            ['q' => 'O PNG tem fundo transparente?', 'a' => 'Imagens JPG não têm transparência, então o PNG mantém o mesmo fundo sólido da foto original.'],
            ['q' => 'Minhas imagens são enviadas para a internet?', 'a' => 'Não. Tudo acontece no seu dispositivo.'],
        ],
    ],

    'webp-to-png' => [
        'slug' => 'webp-para-png',
        'name' => 'WebP para PNG',
        'short_description' => 'Converta imagens WebP em PNG e mantenha a transparência.',
        'description' => 'Converta imagens WebP em PNG para abri-las em qualquer editor ou programa, mantendo os fundos transparentes. Converta em lote e baixe tudo em um ZIP.',
        'seo_title' => 'Converter WebP para PNG com transparência, grátis',
        'seo_description' => 'Converta WebP para PNG grátis online. Mantém a transparência, permite conversão em lote e download em ZIP. As imagens não saem do seu dispositivo.',
        'content' => <<<'HTML'
<h2>Por que imagens WebP dão problema</h2>
<p>Os sites servem imagens em WebP porque os arquivos são leves e carregam rápido. Mas quando você salva uma, muitos editores, programas de apresentação, sistemas operacionais antigos e formulários não conseguem abri-la. Convertê-la em PNG gera um arquivo compatível com tudo, sem perder qualidade.</p>
<h2>O PNG mantém a transparência</h2>
<p>Logos, figurinhas e fotos de produtos que você salva da internet costumam ter fundo transparente. O PNG os mantém exatamente, ao contrário do JPG. Se preferir arquivos mais leves para fotos, use o WebP para JPG.</p>
<p>Quer fazer o contrário para o seu próprio site? Converta imagens com o PNG para WebP ou o JPG para WebP.</p>
HTML,
        'steps' => [
            'Solte suas imagens WebP na área indicada ou clique para procurá-las. A conversão em lote é suportada.',
            'Cada imagem é convertida em PNG na hora, mantendo os fundos transparentes.',
            'Confira o tamanho de cada arquivo convertido.',
            'Baixe as imagens uma a uma ou clique em <strong>Baixar tudo</strong> para receber um ZIP.',
        ],
        'faq' => [
            ['q' => 'Por que converter WebP para PNG?', 'a' => 'Muitos editores de imagem, ferramentas de design, programas de apresentação e formulários ainda não aceitam WebP. O PNG funciona em todo lugar e mantém a qualidade total.'],
            ['q' => 'A transparência é mantida?', 'a' => 'Sim. Ao contrário do JPG, o PNG suporta transparência, então logos, ícones e figurinhas mantêm o fundo transparente.'],
            ['q' => 'É melhor PNG ou JPG?', 'a' => 'Escolha PNG para gráficos, logos, capturas de tela e tudo o que tiver transparência. Para fotos em que um arquivo leve importa mais, use o WebP para JPG.'],
            ['q' => 'Minhas imagens são enviadas para a internet?', 'a' => 'Não. A conversão é feita inteiramente no seu navegador.'],
        ],
    ],

    'svg-to-png' => [
        'slug' => 'svg-para-png',
        'name' => 'SVG para PNG',
        'short_description' => 'Converta gráficos vetoriais SVG em PNG em qualquer escala.',
        'description' => 'Converta ícones, logos e ilustrações SVG em PNG na escala 1×, 2×, 4× ou 8×, com fundo transparente ou colorido. Converta em lote no seu navegador.',
        'seo_title' => 'Converter SVG para PNG em alta resolução, grátis',
        'seo_description' => 'Converta SVG para PNG grátis online, com até 8× de resolução e fundo transparente ou colorido. Conversão em lote, sem enviar arquivos.',
        'content' => <<<'HTML'
<h2>Quando você precisa de um PNG em vez de um SVG</h2>
<p>O SVG é perfeito para logos e ícones em sites porque fica nítido em qualquer tamanho. Porém, muitos lugares só aceitam imagens rasterizadas: perfis de redes sociais, assinaturas de e-mail, slides de apresentações, páginas de lojas de aplicativos e alguns gerenciadores de conteúdo. Converter em PNG faz seu design vetorial funcionar em qualquer lugar.</p>
<h2>Como escolher a escala</h2>
<ul>
<li><strong>1×</strong>: o tamanho definido no SVG.</li>
<li><strong>2×</strong>: nítido em telas de alta resolução (Retina).</li>
<li><strong>4× ou 8×</strong>: impressão, banners grandes ou edições posteriores.</li>
</ul>
<p>Precisa de um arquivo mais leve depois? Use o Comprimir imagens ou converta o resultado com o PNG para WebP.</p>
HTML,
        'steps' => [
            'Solte seus arquivos SVG na área indicada ou clique para procurá-los. Você pode converter vários de uma vez.',
            'Escolha a <strong>Escala</strong>. O SVG é vetorial, então 2× ou 4× gera PNGs nítidos para telas de alta resolução.',
            'Deixe o fundo transparente ou escolha uma cor sólida.',
            'Baixe cada PNG ou clique em <strong>Baixar tudo</strong> para receber um ZIP.',
        ],
        'faq' => [
            ['q' => 'De que tamanho o PNG vai ficar?', 'a' => 'O PNG usa o tamanho definido no SVG (sua largura e altura, ou seu viewBox) multiplicado pela escala que você escolher. Um ícone de 24×24 em 4× fica com 96×96 pixels.'],
            ['q' => 'O fundo transparente é mantido?', 'a' => 'Sim, por padrão. Desmarque <strong>Fundo transparente</strong> para preenchê-lo com uma cor.'],
            ['q' => 'Por que meu SVG ficou diferente?', 'a' => 'SVGs que carregam fontes ou imagens externas de outros sites não conseguem incluí-las no PNG. Converta o texto em contornos na sua ferramenta de design para ter um resultado exato.'],
            ['q' => 'É seguro converter arquivos SVG?', 'a' => 'Sim. Os SVGs são renderizados como imagens no seu navegador, então nenhum script contido neles é executado, e os arquivos nunca são enviados.'],
        ],
    ],
];
