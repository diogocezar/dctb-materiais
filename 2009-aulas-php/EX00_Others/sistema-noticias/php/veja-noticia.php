<?php
session_start();
include('../classes/ManageDB.php');
include('../componentes/HTML_Template_IT/IT.php');

$id = $_GET['id'];
	
/**
/* diretório dos templates 
*/
$templateHtmlDir = '../html';

$templateHtmlName = 'veja_noticia.html';

/* setando template */
$template = new HTML_Template_IT($templateHtmlDir);

/* instanciando a classe */
$template->loadTemplatefile($templateHtmlName, true, true);
	
$template->setCurrentBlock("bloco_veja_noticia");

	$sql = "SELECT * FROM noticia WHERE id_noticia = ".$id;
	$result = ManageDB::execute($sql);
	$dados = $result->fetchRow(DB_FETCHMODE_ASSOC);
	$template->setVariable("titulo",   $dados['titulo']);
	$template->setVariable("data",     $dados['data']);
	$template->setVariable("conteudo", $dados['conteudo']);
	if($_SESSION['admin'] == "ok"){
		$opt  = "";
		$opt .= "<a href=\"registra.php?tipo=noticia&acao=deletar&id=".$dados['id_noticia']."\">Excluir</a>";
		$opt .= " / ";
		$opt .= "<a href=\"frmNoticia.php?acao=atualizar&id=".$dados['id_noticia']."\">Editar</a>";
		$template->setVariable("opt", $opt);
	}

$template->parseCurrentBlock("bloco_veja_noticia");

$content = $template->get();

include('principal.php');
?>