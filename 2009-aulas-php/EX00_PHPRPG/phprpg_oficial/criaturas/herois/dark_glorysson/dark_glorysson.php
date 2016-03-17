<?php
$herois["dark_glorysson"] = array("nome"         => "Dark Glorysson",
								  "classe"       => "Humano",
								  "nivel"        => 8,
								  "vida"         => 100,
								  "magia"        => 100,
								  "forca"        => 10,
								  "agilidade"    => 5,
								  "destreza"     => 10,
								  "inteligencia" => 15,
								  "carisma"      => 2,
								  "bencao"       => 10,
								  "foto"         => "criaturas/herois/dark_glorysson/dark_glorysson.jpg");


$dark_glorysson = new Heroi($herois["dark_glorysson"]["nome"], 
					        $herois["dark_glorysson"]["classe"],
							$herois["dark_glorysson"]["nivel"],
							$herois["dark_glorysson"]["vida"],
							$herois["dark_glorysson"]["magia"],
							$herois["dark_glorysson"]["forca"],
							$herois["dark_glorysson"]["agilidade"],
							$herois["dark_glorysson"]["destreza"],
							$herois["dark_glorysson"]["inteligencia"],
							$herois["dark_glorysson"]["carisma"],
							$herois["dark_glorysson"]["foto"],
							$herois["dark_glorysson"]["bencao"]
							);
?>