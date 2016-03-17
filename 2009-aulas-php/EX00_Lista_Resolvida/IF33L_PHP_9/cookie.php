<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cookie</title>
</head>
<body>
<?php
	$quantidade = $_COOKIE['nome_cookie'];
	$quantidade++;
	setcookie('nome_cookie', $quantidade);
	echo "$quantidade";
?>
<form method="post" action="cookie.php">
<input type="submit" name="enviar" id="enviar" value="Enviar" />
</form>
</body>
</html>