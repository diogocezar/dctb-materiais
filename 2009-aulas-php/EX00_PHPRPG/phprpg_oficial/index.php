<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHPRPG</title>
</head>
<link href="css/phprpg.css" rel="stylesheet" type="text/css">
<body>
<?php

/* Incluindo classes do sistema */

include('classes/Generica.php');
include('classes/Criatura.php');
include('classes/Heroi.php');
include('classes/Monstro.php');
include('classes/Confronto.php');

/* Incluindo os personagens */

include('criaturas/herois/dark_glorysson/dark_glorysson.php');
include('criaturas/herois/gryin/gryin.php');
include('criaturas/herois/mellayine/mellayine.php');

include('criaturas/monstros/lord_black/lord_black.php');
include('criaturas/monstros/matilda/matilda.php');
include('criaturas/monstros/montaro/montaro.php');

/* iniciando os combate */
$vencedor1 = Confronto::iniciar($montaro, $dark_glorysson);
$vencedor2 = Confronto::iniciar($matilda, $mellayine);

$final1    = Confronto::iniciar($vencedor1, $vencedor2);
$final2    = Confronto::iniciar($gryin, $lord_black);

$final     = Confronto::iniciar($final1, $final2);
?>
</body>
</html>