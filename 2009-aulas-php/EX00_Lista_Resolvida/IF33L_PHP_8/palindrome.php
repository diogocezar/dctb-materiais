<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>palindrome</title>
</head>
<body>
	<?php
		include("class/Frase.php");
		if(!empty($_POST['frase']))
		{
			$frase = str_split($_POST['frase']);
			$frs = new Frase("", false);
			$aux = $frs->testa($frase);
			echo "A palavra informada $aux";
		}
		else
		{
	?>
			<form method="post" action="palindrome.php">
				<label>Informe a palavra:
					<input type="text" name="frase" id="frase" />
				</label>
				<input type="submit" name="enviar" id="enviar" value="Enviar" />
			</form>
	<?php
		}
	?>
</body>
</html>
