<?php
$frutas = array ("limao", "laranja", "banana", "ma��");
rsort ($frutas);
foreach( $frutas as $chave => $valor ){
    echo "$chave = $valor<br>";
}
?>
