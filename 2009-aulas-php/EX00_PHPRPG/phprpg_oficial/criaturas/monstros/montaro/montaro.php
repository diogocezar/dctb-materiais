<?php
$monstros["montaro"] = array("nome"         => "Montaro",
						     "classe"       => "Elfo das Trevas",
						     "nivel"        => 7,
						     "vida"         => 100,
						     "magia"        => 100,
						     "forca"        => 10,
						     "agilidade"    => 5,
						     "destreza"     => 10,
						     "inteligencia" => 15,
						     "carisma"      => 10,
						     "foto"         => "criaturas/monstros/montaro/montaro.jpg");

$montaro = new Monstro($monstros["montaro"]["nome"], 
				       $monstros["montaro"]["classe"],
				       $monstros["montaro"]["nivel"],
				       $monstros["montaro"]["vida"],
				       $monstros["montaro"]["magia"],
				       $monstros["montaro"]["forca"],
				       $monstros["montaro"]["agilidade"],
				       $monstros["montaro"]["destreza"],
				       $monstros["montaro"]["inteligencia"],
				       $monstros["montaro"]["carisma"],
				       $monstros["montaro"]["foto"]
				       );
?>