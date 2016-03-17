<?php
$rec = fopen('arquivo.txt', 'r');
$i = 0;
while(!feof($rec)){
$linha = fgets($rec);
echo "Linha $i: $linha<br>\n";
$i++;
}
fclose($rec);
?>