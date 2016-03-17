<?php
/**
/* diretório dos templates 
*/
$templateHtmlDir = '../html';

$templateHtmlName = 'principal.html';

/* setando template */
$template = new HTML_Template_IT($templateHtmlDir);

/* instanciando a classe */
$template->loadTemplatefile($templateHtmlName, true, true);

if($_SESSION['admin'] == "ok"){
	$template->setCurrentBlock("bloco_logado");
		$template->setVariable("nome", $_SESSION['nome']);
	$template->parseCurrentBlock("bloco_logado");
}

$template->setCurrentBlock("bloco_titulo");
	$template->setVariable("titulo", 'Sistema de Noticias em PHP');
$template->parseCurrentBlock("bloco_titulo");

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