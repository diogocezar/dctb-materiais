<?php
$herois["gryin"] = array("nome"         => "Gryin",
						 "classe"       => "Anão",
						 "nivel"        => 10,
						 "vida"         => 100,
						 "magia"        => 50,
						 "forca"        => 30,
						 "agilidade"    => 5,
						 "destreza"     => 10,
						 "inteligencia" => 5,
						 "carisma"      => 1,
						 "bencao"       => 10,
						 "foto"         => "criaturas/herois/gryin/gryin.jpg");

$gryin = new Heroi($herois["gryin"]["nome"], 
				   $herois["gryin"]["classe"],
				   $herois["gryin"]["nivel"],
				   $herois["gryin"]["vida"],
				   $herois["gryin"]["magia"],
				   $herois["gryin"]["forca"],
				   $herois["gryin"]["agilidade"],
				   $herois["gryin"]["destreza"],
				   $herois["gryin"]["inteligencia"],
				   $herois["gryin"]["carisma"],
				   $herois["gryin"]["foto"],
				   $herois["gryin"]["bencao"]
				   );
?>