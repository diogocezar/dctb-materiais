<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Método POST</title>
</head>
<body>
<?php
	if(!empty($_POST['nome'])){
		echo "<h1>Seu nome é: ".$_POST['nome']."</h1>";	
	}
	else{
	?>
<form id="form_post" name="form_post" method="post" action="metodo_post.php">
  <label>Nome:
    <input type="text" name="nome" id="nome" />
  </label>
  <label>
        <input type="submit" name="enviar" id="enviar" value="Enviar" />
  </label>
    </form>
    <?php
	}
	?>
</body>
</html>