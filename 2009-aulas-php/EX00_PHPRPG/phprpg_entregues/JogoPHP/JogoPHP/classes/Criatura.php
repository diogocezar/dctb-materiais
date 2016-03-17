<?php
	abstract class Criatura implements Generica
	{
		protected $nome = "", //Noma da criatura
		$classe = "", //Classe que a criatura pertence
		$nivel = 0, //Valores entre 1 e 10
		$vida = 0, //Valores entre 1 e 100
		$magia = 0, //Valores entre 1 e 100
		$forca = 0, //Valores entre 1 e 32
		$agilidade = 0, //Valores entre 1 e 12
		$destreza = 0, //Valores entre 1 e 16
		$inteligencia = 0, //Valores entre 1 e 20
		$carisma = 0; //Valores entre 1 e 12
		
		function __construct(/*$nome, $classe, $nivel, $vida, $magia, $forca, $agilidade, $destreza, $inteligencia, $carisma*/)
		{
			/*$this->setNome($nome);
			$this->setClasse($classe);
			$this->setNivel($nivel);
			$this->setVida($vida);
			$this->setMagia($magia);
			$this->setForca($forca);
			$this->setAgilidade($agilidade);
			$this->setDestreza($destreza);
			$this->setInteligencia($inteligencia);
			$this->setCarisma($carisma);*/
		}
		
		function atacar()
		{	
			$r = (rand(10, 60) / 100) + 1;
			$aux = ($this->getNivel() + $this->getForca() + $this->getAgilidade() + ($this->getMagia() * 0.1)) * $r;
			return ($aux > 100) ? 100 : $aux;
		}
		
		function defender()
		{
			$r = (rand(10, 60) / 100) + 1;
			$aux = ($this->getAgilidade() + ($this->getDestreza() * 1.8) + $this->getInteligencia()) * $r + 10;
			return ($aux > 100) ? 100 : $aux;
		}
		
		function vivo()
		{
			return ($this->getVida() > 0) ? true : false;
		}
		
		function perdeVida()
		{
			$vida = $this->getVida();
			$vida = ($vida - 8);
			$this->setVida($vida);
		}
		
		function revitalizar()
		{
			$vida = $this->getVida() + 50;
			if($vida > 100)
				$vida = 100;
			$magia = $this->getMagia() + 30;
			if($magia > 100)
				$magia = 100;
			$this->setVida($vida);
			$this->setMagia($magia);
		}
		
		abstract function descansar();
		
		function __toString()
		{
			$str = "<strong>Nome:</strong> {$this->getNome()}<hr /> 
			<strong>Classe:</strong> {$this->getClasse()}<hr /> 
			<strong>Nivel:</strong> {$this->getNivel()}<hr /> 
			<strong>Vida:</strong> {$this->getVida()}<hr /> 
			<strong>Magia:</strong> {$this->getMagia()}<hr /> 
			<strong>Forca:</strong> {$this->getForca()}<hr />
			<strong>Agilidade:</strong> {$this->getAgilidade()}<hr />
			<strong>Destreza:</strong> {$this->getDestreza()}<hr /> 
			<strong>Inteligencia:</strong> {$this->getInteligencia()}<hr /> 
			<strong>Carisma:</strong> {$this->getCarisma()}";
			if ($this->getBencao() > 0){
				$str = $str . "<hr /> <strong>Bencao:</strong> {$this->getBencao()}";
			}
			return $str;
			
		}
		
		function __call($metodo,  $parametros) 
		{
   			if (substr($metodo, 0,  3) == 'set') 
			{
     			$var = substr(strtolower(preg_replace('/([a-z])([A-Z])/', "$1_$2", $metodo)),  4);
     			$this->$var = $parametros[0];
   			}
   			else if  (substr($metodo, 0,  3) == 'get') 
			{
     			$var = substr(strtolower(preg_replace('/([a-z])([A-Z])/', "$1_$2", $metodo)),  4);
     			return $this->$var;
   			}
 		}
	} 
?>
