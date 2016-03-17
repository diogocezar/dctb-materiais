<?php
	class Frase
	{
		private $frase = array();
	
		function __construct($frase, $por_palavras)
		{
			if($por_palavras)
				for($i = 0; $i < count($frase); $i++)
					$this->frase[$i] = $frase[$i];
			else
				for($i = 0; $i < 80; $i++)
					$this->frase[$i] = $frase[$i];
		}
		
		function testa($frase)
		{
			$aux = $frase;
			$teste = array_reverse($frase, false);
			return ($aux == $teste) ? "é palíndrome." : "não é palíndrome.";
		}
		
		function quantidade($tipo)
		{
			$contador = 0;
			foreach($this->frase as $f)
				if(($tipo == "branco" && $f == " ") || ($tipo == "vogais" && ($f == "a" || $f == "A" || $f == "e" || $f == "E" || $f == 			                     "i" || $f == "I" || $f == "o" || $f == "O" || $f == "u" || $f == "U")) || ($tipo == "numeros" && ($f == "0" || $f ==                     "2" || $f == "3" || $f == "4" || $f == "5" || $f == "6" || $f == "7" || $f == "8" || $f == "9" || $f == "1"
				   )))
					$contador++;
					
			return $contador;
		}
		
		function inverter_palavras()
		{
			$aux = array_reverse($this->frase, false);
			return $aux;
		}
	}
?>
