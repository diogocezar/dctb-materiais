<?php
	$host = "localhost";
	$user = "root";
	$pass = "panaca";
	$base = "noticias";
	
	$conn = mysql_connect($host, $user, $pass) or die(mysql_error());
	
	mysql_select_db($base) or die(mysql_error());

?>