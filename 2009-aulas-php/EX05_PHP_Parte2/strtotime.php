<?
$dataAtual = mktime(0,0,0,1,27,2009);
$dataNova  = strtotime("+9 days", $dataAtual);
echo date("d/m/Y", $dataNova);
?>