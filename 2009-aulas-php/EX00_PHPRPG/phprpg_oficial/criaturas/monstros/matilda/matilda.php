<?php
$monstros["matilda"] = array("nome"         => "Matilda",
						     "classe"       => "Humano",
						     "nivel"        => 10,
						     "vida"         => 100,
						     "magia"        => 80,
						     "forca"        => 10,
						     "agilidade"    => 8,
						     "destreza"     => 10,
						     "inteligencia" => 18,
						     "carisma"      => 5,
						     "foto"         => "criaturas/monstros/matilda/matilda.jpg");

$matilda = new Monstro($monstros["matilda"]["nome"], 
				       $monstros["matilda"]["classe"],
				       $monstros["matilda"]["nivel"],
				       $monstros["matilda"]["vida"],
				       $monstros["matilda"]["magia"],
				       $monstros["matilda"]["forca"],
				       $monstros["matilda"]["agilidade"],
				       $monstros["matilda"]["destreza"],
				       $monstros["matilda"]["inteligencia"],
				       $monstros["matilda"]["carisma"],
				       $monstros["matilda"]["foto"]
				       );
?>