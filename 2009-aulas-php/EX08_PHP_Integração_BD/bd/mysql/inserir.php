<?php
	/* Incluindo arquivo de configuração */
	include('config/config.php');

	/* Dados a serem inseridos */
	$nome     = "Diogo Cezar Teixeira Batista";
	$endereco = "Rua Primo Bozelli, 124";
	$email    = "xgordo@gmail.com";
	$telefone = "43-3523-4055";
	
	/* Sql de inserção */	
	$sql = "INSERT INTO agenda (nome, endereco, email, telefone) VALUES ('$nome', '$endereco', '$email', '$telefone')";
	
	/* Executando SQL e armazenando o resultado em $resultado */
	$resultado = mysql_query($sql) or die(mysql_error());
	
	/* Se o resultaod for TRUE (deu certo) exibe mensagem de sucesso, caseo contrário imprime que houve um erro */
	if($resultado){
		echo "Os dados foram inseridos com sucesso.";	
	}
	else{
		echo "Houve um erro ao inserir os dados.";	
	}
	
?>