<?php
$frutas = array("limao", "laranja","banana", "maça");
asort($frutas);
foreach( $frutas as $chave => $valor ){
    echo "$chave = $valor<br>";
}
?>
