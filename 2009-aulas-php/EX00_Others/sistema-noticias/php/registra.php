<?php
$op   = $_GET['tipo'];
$acao = $_GET['acao'];
$id   = $_GET['id'];

/**
* incluindo controle de sessão
*/
include('controla-session.php');

/**
* incluindo sistema de templates
*/
include('../componentes/HTML_Template_IT/IT.php');

/*
* incluindo classes
*/
require_once('../classes/Noticia.php');

if(empty($op)){
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf8\" />";
	echo "<script language=javascript>alert('Uma opção é necessária para inserir ou atualizar o registro.');location.href='index.php'</script>";
	exit();
}

if(empty($acao)){
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf8\" />";
	echo "<script language=javascript>alert('Uma ação de alteração ou inserção é necessária para manipular um registro.');location.href='index.php'</script>";
	exit();
}
else{
	if($acao == "atualizar"){
		if(empty($id)){
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf8\" />";
			echo "<script language=javascript>alert('Uma identificação é necessária para manipular um registro.');location.href='index.php'</script>";
			exit();
		}
	}
}

switch($op){
	case 'usuario':
	// implementar
	break;
		
	case 'noticia' :
		$prefix = "A";
		$titulo = "Noticia";
		
		$tituloNot = $_POST["titulo"];
		$data      = $_POST["data"];
		if(empty($data)){$data = "NOW()";}
		$conteudo  = $_POST["conteudo"];
		
		// Resgata o id do usuário armazenado na sessão
		$id_usuario = $_SESSION['id'];
		
		$noticia = new Noticia();
		
		$noticia->setIdNoticia(''); // Nulo pra entrar no auto increment
		$noticia->setTitulo($tituloNot);
		$noticia->setData($data);
		$noticia->setConteudo($conteudo);
		$noticia->setIdUsuario($id_usuario);
		
		switch($acao){
			case 'adicionar':
				$noticia->preparar();
				$noticia->save();
			break;
			
			case 'atualizar':
				$noticia->setIdNoticia($id);
				$noticia->preparar();
				$noticia->update();
			break;
			
			case 'deletar':
				$noticia->setIdNoticia($id);
				$noticia->preparar();
				$noticia->delete();
			break;			
		}
	break;
}
/* informações de inserção/atualização */

switch($acao){
	case 'adicionar':
		$prefixoAcao = "inserid";
	break;
	
	case 'atualizar':
		$prefixoAcao = "atualizad";
	break;
	
	case 'deletar':
		$prefixoAcao = "excluid";
	break;			
}

$titulo = strtolower($titulo);

$msg .= "<br><div align=\"center\">";
$msg .= $prefix." ".$titulo." foi <b>$prefixoAcao".strtolower($prefix)."</b> com sucesso.<br><br>";
$msg .= "</div>";

$content = $msg;

include('principal.php');
?>