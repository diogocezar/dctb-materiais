<?php
$frutas = array("d" => "limao",
				"a" => "laranja",
				"b" => "banana",
				"c" => "ma�a");
ksort($frutas);
foreach( $frutas as $chave => $valor ){
    echo "$chave = $valor<br>";
}
?>
