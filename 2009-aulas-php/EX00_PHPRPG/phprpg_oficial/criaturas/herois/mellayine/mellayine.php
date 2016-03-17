<?php
$herois["mellayine"] = array("nome"         => "Mellayune",
							 "classe"       => "Humano",
							 "nivel"        => 5,
							 "vida"         => 100,
							 "magia"        => 80,
							 "forca"        => 25,
							 "agilidade"    => 10,
							 "destreza"     => 8,
							 "inteligencia" => 2,
							 "carisma"      => 20,
							 "bencao"       => 10,
							 "foto"         => "criaturas/herois/mellayine/mellayine.jpg");

$mellayine = new Heroi($herois["mellayine"]["nome"], 
					   $herois["mellayine"]["classe"],
					   $herois["mellayine"]["nivel"],
					   $herois["mellayine"]["vida"],
					   $herois["mellayine"]["magia"],
					   $herois["mellayine"]["forca"],
					   $herois["mellayine"]["agilidade"],
					   $herois["mellayine"]["destreza"],
					   $herois["mellayine"]["inteligencia"],
					   $herois["mellayine"]["carisma"],
					   $herois["mellayine"]["foto"],
					   $herois["mellayine"]["bencao"]
					   );
?>