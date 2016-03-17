<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trablhando com Cookies</title>
</head>
<body>
<?php
	/* Debug, imprimindo os cookies */
	print_r($_COOKIE);

	/* Verificando se o usuário enviou o nome */
	$nome = $_POST['nome'];
	if(!empty($nome)){
		setcookie('nome_cookie', $nome, time()+60*60*24*30);
		echo "<h1>Você foi cadastrado, <strong>$nome</strong></h1>";
		exit;
	}

	/* Verificando o que exibir para o usuário */
	$cookie = $_COOKIE['nome_cookie'];
	if(empty($cookie) && empty($nome)){
		echo "<h1>Essa é a primeira vez que você visita o nosso web site, digite seu nome.</h1><br />";	
	?>
    <form id="form_cookie" name="form_cookie" method="post" action="cookie.php">
        <input name="nome" type="text" id="nome" value="Digite seu nome..." onfocus="this.value='';" />
        <input type="submit" name="enviar" id="enviar" value="Enviar" />
    </form>
    <?php
	}
	else{
		echo "<h1>Bem vindo novamente, <strong>$cookie</strong></h1>";
	}
?>
</body>
</html>