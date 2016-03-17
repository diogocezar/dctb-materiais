<?php

/* Definindo as configurações */
$db_pgsql['host'] = "localhost";
$db_pgsql['pass'] = "panaca";
$db_pgsql['user'] = "postgres";
$db_pgsql['data'] = "agenda";

/* Fazendo a conexão com o banco MySQL e atribuindo a um recurso */
$connection_string = "host={$db_pgsql['host']} port=5432 dbname={$db_pgsql['data']} user={$db_pgsql['user']} password={$db_pgsql['pass']}";
$recurso = pg_connect($connection_string) or die(pg_last_error());
?>