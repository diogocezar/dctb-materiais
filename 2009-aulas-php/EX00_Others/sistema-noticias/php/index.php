<?php
session_start();
include('../classes/ManageDB.php');
include('../componentes/HTML_Template_IT/IT.php');
	
/**
/* diretório dos templates 
*/
$templateHtmlDir = '../html';

$templateHtmlName = 'lista_noticia.html';

/* setando template */
$template = new HTML_Template_IT($templateHtmlDir);

/* instanciando a classe */
$template->loadTemplatefile($templateHtmlName, true, true);
	
$template->setCurrentBlock("bloco_lista_noticia");

	$sql = "SELECT * FROM noticia";
	$result = ManageDB::execute($sql);
	while($dados = $result->fetchRow(DB_FETCHMODE_ASSOC)){
		$template->setCurrentBlock("bloco_lista_noticia_item");
			$template->setVariable("titulo",   $dados['titulo']);
			$template->setVariable("data",     $dados['data']);
			$template->setVariable("conteudo", substr($dados['conteudo'], 0, 200));
			$template->setVariable("link-noticia", "veja-noticia.php?id=".$dados['id_noticia']);
			if($_SESSION['admin'] == "ok"){
				$opt  = "";
				$opt .= "<a href=\"registra.php?tipo=noticia&acao=deletar&id=".$dados['id_noticia']."\">Excluir</a>";
				$opt .= " / ";
				$opt .= "<a href=\"frm-noticia.php?acao=atualizar&id=".$dados['id_noticia']."\">Editar</a>";
				$template->setVariable("opt", $opt);
			}
		$template->parseCurrentBlock("bloco_lista_noticia_item");
	}

$template->parseCurrentBlock("bloco_lista_noticia");

$content = $template->get();

include('principal.php');
?>