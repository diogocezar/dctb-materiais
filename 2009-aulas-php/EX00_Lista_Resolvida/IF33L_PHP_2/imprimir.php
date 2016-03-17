<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>imprimir</title>
</head>
<body>
	<?php
		include("class/ClassNumeros.php");
		if(!empty($_POST['numero']))
		{
			$numero = $_POST["numero"];
			$p = $_POST["p"];
			$imp = new ClassNumeros($numero);
			$imp->imprime($p);
		}
		else
		{
	?>
			<form method="post" action="imprimir.php">
				<label>Número:
					<input type="text" name="numero" id="numero" />
				</label>
				<label>P:
					<input type="text" name="p" id="p" />
				</label>
				<input type="submit" name="enviar" id="enviar" value="Enviar" />
			</form>
	<?php
		}
	?>
</body>
</html>
