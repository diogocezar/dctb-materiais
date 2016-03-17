<?php
$frutas = array('d' => 'limao', 
				'a' => 'laranja', 
				'b' => 'banana', 
				'c' => 'melancia');

shuffle($frutas);
foreach ($frutas as $chave => $valor) {
	echo $chave." = ".$valor."<br>";
}
?>