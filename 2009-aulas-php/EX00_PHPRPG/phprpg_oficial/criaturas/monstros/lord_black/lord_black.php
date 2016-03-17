<?php
$monstros["lord_black"] = array("nome"         => "Lord Black",
						        "classe"       => "Humano",
						        "nivel"        => 10,
						     	"vida"         => 100,
						     	"magia"        => 20,
						     	"forca"        => 32,
						     	"agilidade"    => 12,
						     	"destreza"     => 10,
						     	"inteligencia" => 10,
						     	"carisma"      => 1,
						     	"foto"         => "criaturas/monstros/lord_black/lord_black.jpg");

$lord_black = new Monstro($monstros["lord_black"]["nome"], 
				       	  $monstros["lord_black"]["classe"],
				          $monstros["lord_black"]["nivel"],
				          $monstros["lord_black"]["vida"],
				          $monstros["lord_black"]["magia"],
				          $monstros["lord_black"]["forca"],
				          $monstros["lord_black"]["agilidade"],
				          $monstros["lord_black"]["destreza"],
				          $monstros["lord_black"]["inteligencia"],
				          $monstros["lord_black"]["carisma"],
				          $monstros["lord_black"]["foto"]
				          );
?>