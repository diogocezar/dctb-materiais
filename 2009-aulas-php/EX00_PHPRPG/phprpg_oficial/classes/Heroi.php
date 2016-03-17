<?php
class Heroi extends Criatura{
	
	public $bencao;
	
	/* construtor */
	public function __construct($nome, $classe, $nivel, $vida, $magia, $forca, $agilidade, $destreza, $inteligencia, $carisma, $foto, $bencao){
		parent::__construct($nome, $classe, $nivel, $vida, $magia, $forca, $agilidade, $destreza, $inteligencia, $carisma, $foto);
		$this->setBencao($bencao);
	}
	
	/* função que retorna o coeficiente de descanso do monstro */
	public function descansar(){
		$coeficienteDescanso = 0;
		$coeficienteDescanso = ($this->getVida() + $this->getNivel() + $this->getBencao()) * $this->gerarConstanteMultiplicadora();
		if($coeficienteDescanso > 100){
			$coeficienteDescanso = 100;
		}
		if($coeficienteDescanso < 0){
			$coeficienteDescanso = 0;
		}
		return $coeficienteDescanso;
	}
}