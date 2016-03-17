<?php
/* Iniciando sessão */
session_start();

/* Conexão com o banco de dados */
include ("./config/mysql-conf.php");

/* Framework sAjax */
include ("./sAjax/sAjax.php");

/* Funções php que serão executadas em ajax */
include ("./ajax/ajax.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8895-1" />
<title>Chat Simples</title>
<script src="jscripts/codify.js"></script>
<script src="jscripts/jscript.js"></script>
<script>
<?= sajax_show_javascript(); ?>
</script>
<link rel="stylesheet" href="css/chat-simples.css" />
</head>
<body onload="focoCampos();atualizaChat()">
	<h1>Chat Simples</h1>
	<?php
		/* Se a opção sair for selecionada: */
		if($_GET['sair'] == "ok"){
			session_unset();
			echo "<script language=javascript>location.href='index.php'</script>";
			exit;
		}
	
		/* Verificando se existe alguma informação enviada pelo post */
		if(!empty($_POST["nome"])){
			/* Verificando se o nome de usuário já existe */
			$_SESSION["sessNomeUsuario"] = $_POST["nome"];
		}
	
		/* Se não encontrar nenhuma variavel de sessão para: sessNomeUsuario, então mostra a caixa para digitar o nome */
		if(empty($_SESSION["sessNomeUsuario"])){
		
	?>
   	<form id="formEntrar" name="formEntrar" method="post" action="index.php">
    	  <input name="nome" type="text" id="nome" value="" />
          <input type="submit" name="send" id="send" value="Entrar" />
	</form>
	<?		
		}//if
		else{
	?>
    <div id="chat"></div>
    
    <div id="infos">
        <div id="quem">Bem vindo, <strong><?= $_SESSION["sessNomeUsuario"] ?></strong></div>
        <div id="logout"><a href="index.php?sair=ok">Sair</a></div>    
    </div>
    
    <form id="formChat" name="formChat" method="post" action="">
      <textarea name="mensagem" id="mensagem" cols="45" rows="5" class="mensagem" onkeypress="enviaFormNoEnter(document.formChat, event.keyCode)"></textarea><br />
    </form>
	<?	
		}//else
	?>
</body>
</html>