<?php
include('../config/config.php');

$digitado = $_POST['digitado'];
$campo    = $_POST['campo'];
$tabela   = $_POST['tabela'];

if(!empty($digitado) && !empty($campo) && !empty($tabela)){
	
	$sql = "SELECT * FROM $tabela WHERE $campo LIKE '%".$digitado."%'";
	$resultado = mysql_query($sql);
	
	while($dados = mysql_fetch_array($resultado)){
		$keys = array_keys($dados);
		$imprimir = '';
		foreach($keys as $key){
			if(!is_numeric($key)){
				$imprimir .= $dados[$key].' | ';	
			}
		}
		echo $imprimir;
		echo "<br />";
		echo "<hr />";
	}
}
?>