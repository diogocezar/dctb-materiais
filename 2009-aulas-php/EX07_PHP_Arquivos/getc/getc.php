<?php
$rec = fopen('arquivo.txt', 'r');
$i = 0;
while(!feof($rec)){
$linha = fgetc($rec);
echo "Caractere $i: $linha<br>\n";
$i++;
}
fclose($rec);
?>