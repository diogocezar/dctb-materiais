<?php
abstract class Criatura implements Generica{
	
	/* atributos */
	protected
		$nome,
		$classe,
		$nivel,
		$vida,
		$magia,
		$forca,
		$agilidade,
		$destreza,
		$inteligencia,
		$carisma,
		$foto;
		
	/* construtor */
	public function __construct($nome, $classe, $nivel, $vida, $magia, $forca, $agilidade, $destreza, $inteligencia, $carisma, $foto){
		$this->setNome        ($nome);
		$this->setClasse      ($classe);
		$this->setNivel       ($nivel);
		$this->setMagia       ($magia);
		$this->setVida        ($vida);
		$this->setForca       ($forca);
		$this->setAgilidade   ($agilidade);
		$this->setDestreza    ($destreza);
		$this->setInteligencia($inteligencia);
		$this->setCarisma     ($carisma);
		$this->setFoto        ($foto);
	}
		
	/* função que gera a constante multiplicadora */		
	protected function gerarConstanteMultiplicadora(){
		$random = rand(1, 6);	
		return '1.'.$random;
	}
	
	/* função que retorna o coeficiente de ataque da criatura */
	public function atacar(){
		$coeficienteAtacar = 0;
		$coeficienteAtacar = (($this->getNivel() + $this->getForca() + $this->getAgilidade() + ($this->getMagia()*0.1)) * $this->gerarConstanteMultiplicadora());
		if($coeficienteAtacar > 100){
			$coeficienteAtacar = 100;
		}
		if($coeficienteAtacar < 0){
			$coeficienteAtacar = 0;
		}
		return $coeficienteAtacar;
	}
	
	/* função que retorna o coeficiente de defesa da criatura */ 
	public function defender(){
		$coeficienteDefender = 0;
		$coeficienteDefender = (($this->getAgilidade() + ($this->getDestreza*1.8) + $this->getInteligencia()) * $this->gerarConstanteMultiplicadora() + 10);
		if($coeficienteDefender > 100){
			$coeficienteDefender = 100;
		}
		if($coeficienteDefender < 0){
			$coeficienteDefender = 0;
		}
		return $coeficienteDefender;
	}
	
	/* função que retorna se a criatura está viva */
	public function vivo(){
		$vida = $this->getVida();
		if($vida > 0){
			return true;	
		}
		else{
			return false;
		}
	}
	
	/* funcao que retira uma quantidade de vida da criatura */
	public function perdeVida($qtdVida){
		$vida  = $this->getVida();
		$vida -= $qtdVida;
		$this->setVida($vida);
	}
	
	/* função para revitalizar as forças da criatura */
	public function revitalizar(){
		$vida  = $this->getVida();
		$magia = $this->getMagia();
		if(($vida + 50) > 100){
			$this->setVida(100);
		}
		else{
			$this->setVida($vida+50);
		}
		if(($magia + 30) > 100){
			$this->setMagia(100);
		}
		else{
			$this->setMagia($magia+30);		
		}
	}
	
	abstract public function descansar();
		
	/* implementando funções definida da interfaçe */
	/* função para a construção dos gets e sets */
	public function __call($metodo, $parametros){
		if (substr($metodo, 0, 3) == 'set') {
			$var = substr(strtolower(preg_replace('/([a-z])([A-Z])/', "$1_$2", $metodo)), 4);
			$this->$var = $parametros[0];
		}
		elseif (substr($metodo, 0, 3) == 'get'){
			$var = substr(strtolower(preg_replace('/([a-z])([A-Z])/', "$1_$2", $metodo)), 4);
			return $this->$var;
		}
	}
	/* função para imprimir atributos dos objetos */
	public function __toString(){
		$retorno = "";
		$valores = get_object_vars($this);
		foreach($valores as $chave => $valor){
			if($chave != "foto")
			$retorno .= ucwords($chave).": <strong>".$valor."</strong><br />";	
		}
		return $retorno;
	}
}