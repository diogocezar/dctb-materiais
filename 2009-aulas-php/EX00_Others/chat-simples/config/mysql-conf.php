<?
/* Cria uma array com as configurações para se conectar ao banco de dados */
$mysql = array("base" => "testes",
               "host" => "localhost",
			   "user" => "root",
			   "pass" => "panaca");
			   
/* Criando uma conexão com o banco de dados */
$conn = mysql_connect($mysql["host"],
                      $mysql["user"],
					  $mysql["pass"]) or die (mysql_error());

/* Selecionando um banco de dados a ser utilizado */
$bd = mysql_select_db($mysql["base"], $conn) or die (mysql_error());