<?php
include('../componentes/Pear/PEAR.php');
include('../componentes/HTML_Template_IT/IT.php');
	
/**
/* diretório dos templates 
*/
$templateHtmlDir = '../html';

$templateHtmlName = 'galeria.html';

/* setando template */
$template = new HTML_Template_IT($templateHtmlDir);

/* instanciando a classe */
$template->loadTemplatefile($templateHtmlName, true, true);
	
$template->setCurrentBlock("bloco_conteudo");
	$template->setVariable("titulo", 'Galeria');
$template->parseCurrentBlock("bloco_conteudo");

$conteudo = $template->get();
include('templatePrincipal.php');
?>