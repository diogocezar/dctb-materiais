<?php
	include('config/config.php');
	
	$id = $_GET['id'];

	$sql = "SELECT * FROM noticia WHERE idnoticia = $id";
	
	$resultado = mysql_query($sql) or die(mysql_error());
	
	while($dados = mysql_fetch_array($resultado)){
		$id = $dados['idnoticia'];
		echo "Titulo: ".$dados['titulo'];
		echo "<br>";
		echo "Descricao: ".$dados['descricao'];
		echo "<hr>";
	}
?>