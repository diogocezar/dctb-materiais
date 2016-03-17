<?php
	include('componentes/Pear/PEAR.php');
	include('componentes/DB/DB.php');
	include('config/config.php');

	/* Iniciando a conexão com o banco */
	$db = DB::connect($config['dns']);
	/* Tratando caso o objeto retornado seja um objeto que trata erros */
	if(DB::isError($db)){
		die($db->getMessage());
	}
	/* Gerando SQL de consulta */
	$sql = "SELECT * FROM agenda";
	
	/* Retornando a coleção de dados */
	$resultado = $db->query($sql);
	
	/* Caso não ocorra nenhum erro */
	if(!DB::isError($resultado)){
		/* Percorrendo os resultados */
		while($dados = $resultado->fetchRow(DB_FETCHMODE_ASSOC)){
			echo "Nome: ".$dados['nome']."<br />";
			echo "Endereco: ".$dados['endereco']."<br />";	
			echo "Email: ".$dados['email']."<br />";
			echo "Telefone: ".$dados['telefone']."<br />";
			echo "<hr>";
		}
		$resultado->free();
	}
	else{
		die($resultado->getMessage());
	}
	/* Desconectando do banco */
	$db->disconnect();
?>