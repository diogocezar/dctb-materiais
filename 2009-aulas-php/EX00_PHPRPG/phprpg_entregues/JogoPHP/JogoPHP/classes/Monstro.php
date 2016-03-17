<?php
	class Monstro extends Criatura
	{
		function __construct($nome, $classe, $nivel, $vida, $magia, $forca, $agilidade, $destreza, $inteligencia, $carisma)
		{
			$this->setNome($nome);
			$this->setClasse($classe);
			$this->setNivel($nivel);
			$this->setVida($vida);
			$this->setMagia($magia);
			$this->setForca($forca);
			$this->setAgilidade($agilidade);
			$this->setDestreza($destreza);
			$this->setInteligencia($inteligencia);
			$this->setCarisma($carisma);
		}
		
		function descansar()
		{
			$aux = ($this->getVida() + $this->getNivel()) * ((rand(10, 60) * 0.01) + 1);
			return ($aux > 100) ? 100 : $aux;
		}
	}
?>