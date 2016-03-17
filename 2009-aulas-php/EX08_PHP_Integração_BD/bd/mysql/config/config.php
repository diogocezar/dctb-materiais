<?php

/* Definindo as configurações */
$db_mysql['host'] = "localhost";
$db_mysql['pass'] = "panaca";
$db_mysql['user'] = "root";
$db_mysql['data'] = "agenda";

/* Fazendo a conexão com o banco MySQL e atribuindo a um recurso */
$recurso = mysql_connect($db_mysql['host'], $db_mysql['user'], $db_mysql['pass']) or die(mysql_error());

/* Selecionando um banco de dados */
mysql_select_db($db_mysql['data'], $recurso) or die(mysql_error());

?>