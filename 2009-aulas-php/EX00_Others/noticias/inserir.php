<?php
	include('config/config.php');

	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];
	
	$sql = "INSERT INTO noticia (titulo, descricao) VALUES ('$titulo', '$descricao')";
	
	$resultado = mysql_query($sql) or die(mysql_error());
	
	if($resultado){
		echo "<h1>Dados inseridos com sucesso!</h1>";	
	}
	else{
		echo "<h1>Não foi possível inserir os dados</h1>";	
	}

?>