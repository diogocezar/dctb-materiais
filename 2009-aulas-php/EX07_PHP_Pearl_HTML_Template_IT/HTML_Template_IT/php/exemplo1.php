<?php
include('../componentes/Pear/PEAR.php');
include('../componentes/HTML_Template_IT/IT.php');
	
/**
/* diretório dos templates 
*/
$templateHtmlDir = '../html';

$templateHtmlName = 'exemplo1.html';

/* setando template */
$template = new HTML_Template_IT($templateHtmlDir);

/* instanciando a classe */
$template->loadTemplatefile($templateHtmlName, true, true);
	
$template->setCurrentBlock("bloco_titulo");
	$template->setVariable("titulo", 'Exemplo 01');
$template->parseCurrentBlock("bloco_titulo");

$template->setCurrentBlock("bloco_body");
	$template->setVariable("topico1",      'Atividades Complementares');
	$template->setVariable("conteudo1",    'Atividades Complementares');
	$template->setVariable("sub-topico1",  'Atividades Complementares');
	$template->setVariable("sub-conteudo1",'Atividades Complementares');
$template->parseCurrentBlock("bloco_body");

$template->show();
?>