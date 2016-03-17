<?php
 
	require_once("Criatura.php");
	//require_once ("Criatura.php");
 
	class Heroi extends Criatura{
		protected $bencao;
							
		public function __construct($nome, $classe, $nivel, $vida, $magia, $forca, $agilidade, $destreza, $inteligencia, $carisma, $bencao ){
			parent::__construct($nome, $classe, $nivel, $vida, $magia, $forca, $agilidade, $destreza, $inteligencia, $carisma); 
			$this->bencao = $bencao; 
		}
		
		public function descansar(){
		    $r = rand(1.1,1.6);
			$coeficientedescanso = ($this->vida + $this->nivel + $this->bencao) * $r; 
			return $coeficientedescanso;
		}
	}

?>
