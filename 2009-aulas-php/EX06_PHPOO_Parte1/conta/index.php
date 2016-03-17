<?php
include("class/ContaCorrente.php");
include("class/ContaEspecial.php");

$CC = new ContaCorrente(1000);
$CC->saque(500);
$CC->saque(500);
$CC->saque(10);
$CC->deposito(150);
echo "Conta Corrente: ";
echo $CC;

$CE = new ContaEspecial(1000, 500);
$CE->saque(500);
$CE->saque(500);
$CE->saque(10);
echo "Conta Especial: ";
echo $CE;
?>