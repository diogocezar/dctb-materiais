<?php
	$nome = $_GET['nome'];
	$idade = $_GET['idade'];
	
	if(empty($nome) || empty($idade)){
		echo "Nao foram encontradas todas as variaveis de GET, utilize: metodo_get.php?nome=Diogo&idade=23";						 
	}
	else{
		echo "Ola, $nome. Voce tem $idade anos.";	
	}
?>