<?php
	include('config/config.php');

	$sql = "SELECT * FROM noticia";
	
	$resultado = mysql_query($sql) or die(mysql_error());
	
	while($dados = mysql_fetch_array($resultado)){
		$id = $dados['idnoticia'];
		echo "Titulo: ".$dados['titulo'];
		echo "<br>";
		echo "<a href=\"detalhes_noticia.php?id=$id\">Veja detalhes</a>";
		echo "<hr>";
	}
?>