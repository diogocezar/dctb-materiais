<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Consultar Agenda</title>
</head>
<body>
<?php
	/* Incluindo arquivo de configuração */
	include('config/config.php');

	
	/* Sql de consulta */	
	$sql = "SELECT * FROM agenda";
	
	/* Executando SQL e armazenando o resultado em $resultado */
	$resultado = mysql_query($sql) or die(mysql_error());
	
	echo "<h1>Agenda de Contatos</h1>";
	
	/* Colocando a coleção de dados em um laço */
	while($dados = mysql_fetch_array($resultado)){
		echo "Nome: ".$dados['nome']."<br />";
		echo "Endereco: ".$dados['endereco']."<br />";	
		echo "Email: ".$dados['email']."<br />";
		echo "Telefone: ".$dados['telefone']."<br />";
		echo "<hr>";
	}
	
?>
</body>
</html>