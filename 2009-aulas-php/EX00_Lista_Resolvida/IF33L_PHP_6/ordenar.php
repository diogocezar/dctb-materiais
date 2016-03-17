<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ordenar</title>
</head>
<body>
	<?php
		if(!empty($_POST['nome1']) && !empty($_POST['nome2']) && !empty($_POST['nome3']))
		{
			$nomes = array(0 => $_POST['nome1'], 1 => $_POST['nome2'], 2 => $_POST['nome3']);
			sort($nomes);
			print_r($nomes);
		}
		else
		{
	?>
			<form method="post" action="ordenar.php">
				<label>Nome um:
					<input type="text" name="nome1" id="nome1" />
				</label>
				<label>Nome dois:
					<input type="text" name="nome2" id="nome2" />
				</label>
				<label>Nome três:
					<input type="text" name="nome3" id="nome3" />
				</label>
				<input type="submit" name="enviar" id="enviar" value="Enviar" />
			</form>
	<?php
		}
	?>
</body>
</html>
