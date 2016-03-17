<?php
session_start();
include('../classes/ManageDB.php');
include('../componentes/HTML_Template_IT/IT.php');
	
/**
/* diretório dos templates 
*/
$templateHtmlDir = '../html';

$templateHtmlName = 'login.html';

/* setando template */
$template = new HTML_Template_IT($templateHtmlDir);

/* instanciando a classe */
$template->loadTemplatefile($templateHtmlName, true, true);
	
$template->setCurrentBlock("bloco_login");
	$template->setVariable("action", "frm-noticia.php?acao=inserir");
	$template->setVariable("frmLogin", "login");
	$template->setVariable("frmSenha", "senha");
$template->parseCurrentBlock("bloco_login");

$content = $template->get();

include('principal.php');
?>