<?php
	/* Definindo as configurações */
	$config['host'] = "localhost";
	$config['pass'] = "panaca";
	$config['base'] = "sistema-noticias";
	$config['user'] = "root";
	$config['type'] = "mysql";
	
	/* DNS */	
	$config['dns']  = $config['type']."://".$config['user'].":".$config['pass']."@".$config['host']."/".$config['base'];
?>