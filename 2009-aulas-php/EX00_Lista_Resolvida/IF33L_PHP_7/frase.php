<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>frase</title>
</head>
<body>
	<?php
		include("class/Frase.php");
		if(!empty($_POST['frase']))
		{
			$frase = str_split($_POST['frase']);
			$frase_palavra = explode(" ", $_POST['frase']);
			$frs = new Frase($frase, false);
			$fras = new Frase($frase_palavra, true);
			$branco = $frs->quantidade("branco");
			$vogais = $frs->quantidade("vogais");
			$numeros = $frs->quantidade("numeros");
			$frs_invertido = $fras->inverter_palavras();
			echo "A quantidade de espaços em branco é: $branco.<br />";
			echo "A quantidade de vogais é: $vogais.<br />";
			echo "A quantidade de números é: $numeros.<br />";
			print_r($frs_invertido);
		}
		else
		{
	?>
			<form method="post" action="frase.php">
				<label>Informe a frase:
					<input type="text" name="frase" id="frase" />
				</label>
				<input type="submit" name="enviar" id="enviar" value="Enviar" />
			</form>
	<?php
		}
	?>
</body>
</html>
