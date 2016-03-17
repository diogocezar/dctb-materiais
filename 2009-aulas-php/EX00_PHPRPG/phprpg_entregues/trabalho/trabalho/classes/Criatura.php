<?php
	require_once("Generica.php");
	
	abstract class Criatura implements Generica{
	
		protected $nome;
		protected $classe;
		protected $nivel;
		protected $vida;
		protected $magia;
		protected $forca;
		protected $agilidade;
		protected $destreza;
		protected $inteligencia;
		protected $carisma;
					
					
		public function __construct($nome, $classe, $nivel, $vida, $magia, $forca, $agilidade, $destreza, $inteligencia, $carisma ){
			$this->nome = $nome;
			$this->classe = $classe;
			$this->nivel = $nivel;
			$this->vida = $vida;
			$this->magia = $magia;
			$this->forca = $forca;
			$this->agilidade = $agilidade;
			$this->destreza = $destreza;
			$this->inteligencia = $inteligencia;
			$this->carisma = $carisma;
		}
		
		public function atacar(){
		    $r = 0;
			$r = rand((1.1*100),(1.6*100));
			$r = $r/100;
			$coeficiente = ($this->nivel + $this->forca + $this->agilidade + ($this->magia *0.1)) * $r;
			if ($coeficiente > 100){
				$coeficiente = 100;	
			}
			
			return $coeficiente;
		}
		
		public function defender(){
			 $r = 0;
			 $r = rand((1.1*100),(1.6*100));
			 $r = $r/100;
			 $coeficiente = ($this->agilidade + ($this->destreza * 1.8) + $this->inteligencia) * $r + 10;
			 if ($coeficiente > 100){
				$coeficiente = 100;	
			 }
			 return $coeficiente;
		}
		
		public function vivo(){
		   if ($this->vida > 0){
				return true;
		   }else{
				return false;
		   }
		}
		
		public function perdeVida($pontosvida){
		   $this->vida -= $pontosvida;
		}
		
		public function revitalizar(){
		    if(($this->vida + 50) > 100){
				$this->vida = 100;
			}else{
			    $this->vida += 50;
			}
			
			if(($this->magia + 30) > 100){
				$this->magia = 100;
			}else{
			    $this->magia += 30;
			}
			
		}
		
		public function __toString(){
			return $this->nome;
		}
		
		public function __call($metodo, $parametros){
			// se for  set*,  "seta" um valor  para a propriedade
			if (substr($metodo, 0,  3) == 'set') {
				$var = substr(strtolower(preg_replace('/([a-z])([A-Z])/', "$1_$2", $metodo)),  3);
				$this->$var = $parametros[0];
			}
			// se for  get*, retorna o valor  da propriedade
			elseif  (substr($metodo, 0,  3) == 'get') {
				$var = substr(strtolower(preg_replace('/([a-z])([A-Z])/', "$1_$2", $metodo)),  3);
				return $this->$var;
			}
		}
		
		public abstract function descansar();
		

	}

?>
