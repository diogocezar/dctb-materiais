<?php
session_start();
include('../classes/Usuario.php');

$permitidoCS   = false;
$registraCS    = false;
$passouLoginCS = false;

$loginCS = $_POST['login'];
$senhaCS = $_POST['senha'];

if(!empty($loginCS) && !empty($senhaCS)){

	$passouLoginCS = true;
	$mensagemCS    = true;
	
	$usuario = new Usuario();
	$resultadoCS = $usuario->allowLogin($loginCS, $senhaCS);
	
	if($resultadoCS != false){
		$idCS          = (string)$resultadoCS['id_usuario'];
		$nomeCS        = $resultadoCS['nome'];
		$redirecionaCS = "frm-noticia.php?acao=inserir";
		
		$_SESSION['admin'] = "ok";
		$_SESSION['nome']  = $nomeCS;
		$_SESSION['id']    = $idCS;
	}
}

if(!empty($_SESSION['admin'])){
	$permitidoCS = true;
}

if($permitidoCS != true){
	if($mensagemCS == true){
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf8\" />";
		echo "<script language=javascript>alert('Desculpe, você não foi identificado no sistema.');location.href='login.php'</script>";
	}
	else{
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf8\" />";
		echo "<script language=javascript>location.href='login.php'</script>";
	}
	exit();
}

if($passouLoginCS){
	echo "<script language=javascript>location.href='$redirecionaCS'</script>";
	exit();
}
?>