<?php
	/* Definindo as configurações */
	$config['host'] = "localhost";
	$config['pass'] = "panaca";
	$config['base'] = "agenda";
	$config['user'] = "postgres";
	$config['type'] = "pgsql";
	
	/* DNS */	
	$config['dns']  = $config['type']."://".$config['user'].":".$config['pass']."@".$config['host']."/".$config['base'];
?>