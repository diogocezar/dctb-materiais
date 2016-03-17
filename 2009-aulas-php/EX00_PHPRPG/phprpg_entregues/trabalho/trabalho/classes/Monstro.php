<?php

	require_once("Criatura.php");
	
	class Monstro extends Criatura{
		
		public function __construct($nome, $classe, $nivel, $vida, $magia, $forca, $agilidade, $destreza, $inteligencia, $carisma){
			parent::__construct($nome, $classe, $nivel, $vida, $magia, $forca, $agilidade, $destreza, $inteligencia, $carisma); 
		}
		
		public function descansar(){
			$r = rand(1.1,1.6);
			$coeficientedescanso = ($this->vida + $this->nivel) * $r;
			return $coeficientedescanso;
		}
	}

?>
