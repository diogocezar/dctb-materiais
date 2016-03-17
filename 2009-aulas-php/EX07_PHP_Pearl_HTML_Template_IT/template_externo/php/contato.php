<?php
include('../componentes/Pear/PEAR.php');
include('../componentes/HTML_Template_IT/IT.php');
	
/**
/* diretório dos templates 
*/
$templateHtmlDir = '../html';

$templateHtmlName = 'interna.html';

/* setando template */
$template = new HTML_Template_IT($templateHtmlDir);

/* instanciando a classe */
$template->loadTemplatefile($templateHtmlName, true, true);
	
$template->setCurrentBlock("bloco_interna");
	$template->setVariable("titulo", 'Contato');
	$template->setVariable("conteudo", 'Você está na contato');
$template->parseCurrentBlock("bloco_interna");

$content = $template->get();

include('principal.php');
?>