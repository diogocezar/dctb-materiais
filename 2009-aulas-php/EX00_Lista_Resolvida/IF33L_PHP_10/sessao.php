<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sessão</title>
</head>
<body>
	<?php
		if($_POST['login'] == "maverick" && $_POST['senha'] == "logan08")
			echo "Bem vindo";
		else if(!empty($_POST['login']) || !empty($_POST['senha']))
		{
			session_destroy();
			echo "Você não faz parte do sistema!";
			header("Location: http://localhost/sessao.php");
		}
		else
		{
	?>
			<form id="form_cookie" name="form_cookie" method="post" action="sessao.php">
				<input name="login" type="text" id="login" value="Digite seu login..." onfocus="this.value='';" />
				<input name="senha" type="password" id="senha" value="" />
				<input type="submit" name="enviar" id="enviar" value="Enviar" />
			</form>
	<?php
		}
	?>
</body>
</html>