<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>numeros</title>
</head>
<body>
	<?php
		include("class/ClassNumeros.php");
		if(!empty($_POST['numero']) && count(explode(";", $_POST["numero"])) == 10)
		{
			$num = new ClassNumeros($_POST['numero']);
			$num->imprimir();
			echo "<br /> A soma dos n�meros �: ".$num->somar();
			echo "<br /> A m�dia aritm�tica �: ".$num->media_aritmetica();
			echo "<br /> O maior n�mero �: ".$num->maior();
			echo "<br /> O menor n�mero �: ".$num->menor();
			echo "<br /> O diferen�a entre o maior e o menor �: ".$num->diferenca();
		}
		else
		{
			if(!empty($_POST['numero']) && count($numeros) != 10)
				echo "Os n�meros foram informados incorretamente, informe-os novamente.";
	?>
	<form method="post" action="numeros.php">
		<label>N�mero:
			<input type="text" name="numero" id="numero" />
		</label>
		<input type="submit" name="enviar" id="enviar" value="Enviar" />
		<label>
			Digite da seguinte maneira: (1; 2; 3...)
		</label>
	</form>
	<?php
		}
	?>
</body>
</html>
