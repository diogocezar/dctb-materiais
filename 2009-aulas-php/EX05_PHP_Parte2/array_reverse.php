<?php
$frutas = array('d' => 'limao', 
				'a' => 'laranja', 
				'b' => 'banana', 
				'c' => 'melancia');

$frutas_reverse = array_reverse($frutas);

foreach ($frutas_reverse as $chave => $valor) {
	echo $chave." = ".$valor."<br>";
}
?>