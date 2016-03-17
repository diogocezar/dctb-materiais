<?php
include('../classes/Noticia.php');
include('../componentes/HTML_Template_IT/IT.php');
include('controla-session.php');

$acao = $_GET['acao'];
$id   = $_GET['id'];

if(empty($acao)){
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf8\" />";
		echo "<script language=javascript>alert('É necessário uma ação para acessar esse formulário.');location.href='index.php'</script>";
		exit();
}

if($acao == "atualizar"){
	if(!empty($id)){
		$noticia = new Noticia();
		$noticia->unique($id);
		$action = "registra.php?tipo=noticia&acao=atualizar&id=".$noticia->getIdNoticia();
	}
	else{
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf8\" />";
		echo "<script language=javascript>alert('Um id não foi informado para editar a notícia.');location.href='index.php'</script>";
		exit();
	}
}
else{
	$action = "registra.php?tipo=noticia&acao=adicionar";	
}
	
/**
/* diretório dos templates 
*/
$templateHtmlDir = '../html';

$templateHtmlName = 'frm_noticia.html';

/* setando template */
$template = new HTML_Template_IT($templateHtmlDir);

/* instanciando a classe */
$template->loadTemplatefile($templateHtmlName, true, true);
	
$template->setCurrentBlock("bloco_noticia");

	$template->setVariable("action", $action);
	
	$template->setVariable("frmTitulo",   'titulo');
	$template->setVariable("frmData",     'data');
	$template->setVariable("frmConteudo", 'conteudo');
	
	if($acao == "atualizar"){
		echo $noticia->getConteudo;
		$template->setVariable("valorTitulo",   $noticia->getTitulo());
		$template->setVariable("valorData",     $noticia->getData());
		$template->setVariable("valorConteudo", $noticia->getConteudo());
	}

$template->parseCurrentBlock("bloco_noticia");

$content = $template->get();

include('principal.php');
?>