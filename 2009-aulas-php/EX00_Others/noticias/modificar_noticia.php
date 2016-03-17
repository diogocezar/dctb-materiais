<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alterar Noticia</title>
</head>
<body>
<h1>Digite a notícia a se alterada</h1>
<?php
	include('config/config.php');
	$id = $_GET['id'];
	$sql = "SELECT * FROM noticia WHERE idnoticia = $id";
	$resultado = mysql_query($sql) or die(mysql_error());
	$dados = mysql_fetch_array($resultado);
?>
<form id="form1" name="form1" method="post" action="alterar.php">
  <p>Titulo 
    <input type="text" name="titulo" id="titulo" value="<?= $dados['titulo'] ?>" />
  </p>
  <p>Descricao 
    <textarea name="descricao" id="descricao" cols="45" rows="5"><?= $dados['descricao'] ?></textarea>
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Enviar" />
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
