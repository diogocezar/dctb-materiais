<?php
/**
/* diretório dos templates 
*/
$templateHtmlDir = '../html';

$templateHtmlName = 'pagina_principal.html';

/* setando template */
$template = new HTML_Template_IT($templateHtmlDir);

/* instanciando a classe */
$template->loadTemplatefile($templateHtmlName, true, true);
	
$template->setCurrentBlock("bloco_titulo");
	$template->setVariable("titulo", 'Meu Site');
$template->parseCurrentBlock("bloco_titulo");

$menu = array('Principal' => 'index.php',
			  'Contato'   => 'contato.php',
			  'Artigos'   => 'artigos.php',
			  'Galeria'   => 'galeria.php');

$template->setCurrentBlock("bloco_menu");
foreach($menu as $item => $key){
	$template->setCurrentBlock("bloco_menu_item");
		$template->setVariable("link-menu", $key);
		$template->setVariable("label-menu", $item);
	$template->parseCurrentBlock("bloco_menu_item");
}
$template->parseCurrentBlock("bloco_menu");

/* Bloco que vai mostrar o conteúdo da página interna */
$template->setCurrentBlock("bloco_content");
	/* A variável content foi definida na página que incluiu essa */
	$template->setVariable("content", $content);
$template->parseCurrentBlock("bloco_content");

$template->setCurrentBlock("bloco_footer");
	$template->setVariable("footer", 'Todos os diereitos reservados');
$template->parseCurrentBlock("bloco_footer");

$template->show();
?>