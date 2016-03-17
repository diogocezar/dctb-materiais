<?php
	$dados['nome'][1] = 'Diogo Cezar';
	$dados['nome'][2] = 'Pedro Fernando';
	$dados['nome'][3] = 'Tomas Ferreira';
	
	$dados['telefone'][1] = '3523-3345';
	$dados['telefone'][2] = '3523-3443';
	$dados['telefone'][3] = '3523-2335';
	
//	$dados = array(0 => array('nome' => 'Diogo Cezar', 'telefone' => '3523-3345'),
//				   1 => array('nome' => 'Pedro Fernando', 'telefone' => '3523-3443'),
//				   2 => array('nome' => 'Tomas Ferreira', 'telefone' => '3523-2335')
//				   );
	
	$id = $_GET['id'];
	
	if(!empty($id)){
		echo "Nome: ".$dados['nome'][$id]."<br>";
		echo "Telefone: ".$dados['telefone'][$id]."<br>";	
		echo "<hr>";
	}
	else{
		echo "Nao foi possivel achar esse usuario!";	
	}
?>