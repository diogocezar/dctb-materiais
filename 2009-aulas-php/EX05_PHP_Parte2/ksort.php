<?php
$frutas = array("d" => "limao",
				"a" => "laranja",
				"b" => "banana",
				"c" => "maça");
ksort($frutas);
foreach( $frutas as $chave => $valor ){
    echo "$chave = $valor<br>";
}
?>
