<?php
$frutas = array("d" => "limao",
				"a" => "laranja",
				"b" => "banana",
				"c" => "maça");
krsort($frutas);
foreach( $frutas as $chave => $valor ){
    echo "$chave = $valor<br>";
}
?>
