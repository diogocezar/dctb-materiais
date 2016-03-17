<?php
$nome = $_POST['nome'];
if(!empty($nome)){
	
	$conn = mysql_connect('localhost', 'root', 'panaca');
	mysql_select_db('agenda', $conn);
	
	$sql = "SELECT nome FROM agenda WHERE nome LIKE '%".$nome."%'";
	
	$resultado = mysql_query($sql);
	
	while($dados = mysql_fetch_array($resultado)){
		echo $dados['nome'];
		echo "<br />";
		echo "<hr />";
	}
}
?>