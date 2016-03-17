<?php
include('../componentes/Pear/PEAR.php');
include('../componentes/HTML_Template_IT/IT.php');

/* Fazendo conexão com o banco de dados */
$conn = mysql_connect('localhost','root','panaca') or die(mysql_error());
mysql_select_db('agenda', $conn) or die(mysql_error());

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

$conteudo_interno = $template->get();

/**
/* diretório dos templates 
*/
$templateHtmlDir = '../html';

$templateHtmlName = 'exemplo2.html';

/* setando template */
$template = new HTML_Template_IT($templateHtmlDir);

/* instanciando a classe */
$template->loadTemplatefile($templateHtmlName, true, true);
	
$template->setCurrentBlock("bloco_titulo");
	$template->setVariable("titulo", 'Exemplo 02');
$template->parseCurrentBlock("bloco_titulo");

$template->setCurrentBlock("bloco_body");

	/* Importante preencher os blocos internos primeiro */
	$sql = "SELECT * FROM agenda";
	$resultado = mysql_query($sql) or die(mysql_error());
	
	while($dados = mysql_fetch_array($resultado)){
		$template->setCurrentBlock("bloco_item_agenda");
		
			$template->setVariable("nome",     $dados['nome']);
			$template->setVariable("endereco", $dados['endereco']);
			$template->setVariable("email",    $dados['email']);
			$template->setVariable("telefone", $dados['telefone']);
			
		$template->parseCurrentBlock("bloco_item_agenda");
	}

	$template->setVariable("titulo-agenda", $conteudo_interno);
$template->parseCurrentBlock("bloco_body");

$template->show();
?>