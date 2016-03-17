<?php
$arquivo = './arq/arquivo.txt';
$conteudo = file_get_contents($arquivo);
echo nl2br($conteudo);
?>