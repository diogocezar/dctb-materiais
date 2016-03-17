<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Componentes múltiplos</title>
</head>
<?php
	if(!empty($_POST)){
		echo "POST: <br>";
		print_r($_POST);
		echo "<br>";
	}
	if(!empty($_FILES)){
		echo "FILES: <br>";
		print_r($_FILES);	
		echo "<br>";
	}?>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <h1>Testando múltiplos combos </h1>
  <p>
    <input type="checkbox" name="checkbox[]" value="teste1" id="teste1" /> 
  teste 1<br />
  <input type="checkbox" name="checkbox[]" value="teste2" id="teste2" />
  teste 2<br />
  <input type="checkbox" name="checkbox[]" value="teste3" id="teste3" />
  teste 3
  </p>
  <h1>Testando múltiplos arquivos</h1>
  <p>
    <input type="file" name="file[]"/>
    <br />
    <input type="file" name="file[]"/>
    <br />
    <input type="file" name="file[]"/>
</p>
  <p>
    <input type="submit" value="Enviar" />
    <br />
  </p>
</form>
</body>
</html>
