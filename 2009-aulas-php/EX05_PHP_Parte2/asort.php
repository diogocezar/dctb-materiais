<?php
$frutas = array("limao", "laranja","banana", "ma�a");
asort($frutas);
foreach( $frutas as $chave => $valor ){
    echo "$chave = $valor<br>";
}
?>
