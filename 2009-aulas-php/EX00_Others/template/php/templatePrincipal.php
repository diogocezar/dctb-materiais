<?php	
/**
/* diretório dos templates 
*/
$templateHtmlDir = '../html';

$templateHtmlName = 'templatePrincipal.html';

/* setando template */
$template = new HTML_Template_IT($templateHtmlDir);

/* instanciando a classe */
$template->loadTemplatefile($templateHtmlName, true, true);
	
$template->setCurrentBlock("bloco_titulo");
	$template->setVariable("titulo", 'Template Principal');
$template->parseCurrentBlock("bloco_titulo");

$template->setCurrentBlock("bloco_menu");
	$template->setVariable("principal",  'Principal');
	$template->setVariable("artigos",    'Artigos');
	$template->setVariable("galeria",    'Galeria');
	$template->setVariable("cadastrese", 'Cadastre-se');
	$template->setVariable("contato",    'Contato');
	
	$template->setVariable("linkPrincipal",  'index.php');
	$template->setVariable("linkArtigos",    'artigos.php');
	$template->setVariable("linkGaleria",    'galeria.php');
	$template->setVariable("linkCadastrese", 'cadastrese.php');
	$template->setVariable("linkContato",    'contato.php');
$template->parseCurrentBlock("bloco_menu");

$template->setCurrentBlock("bloco_content");
	/* A variável conteúdo representa um outro template gerado na página
	 * que irá incluir a página template principal
	 */  
	$template->setVariable("conteudo",  $conteudo);
$template->parseCurrentBlock("bloco_content");

$template->setCurrentBlock("bloco_footer");
	$template->setVariable("direitos",  "Todos os direitos reservados");
	$template->setVariable("autor",     "Diogo Cezar Teixeira Batista");
$template->parseCurrentBlock("bloco_footer");

$template->show();
?>