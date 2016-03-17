<?php
	class ClassNumeros
	{
		private $numero;
	
		function __construct($numero)
		{
			$contem = (strpos($numero, ";") > 0) ? true : false;
			if($contem)
				$this->numero = explode(";", $numero);
			else
				$this->numero = $numero;
		}
		
		function imprime($p)
		{
			if($p <= 0 || empty($p))
				$p = 1;
			for($i = 0; $i < $this->numero; $i += $p)
				echo " $i ";
		}
		
		function imprimir()
		{
			print_r($this->numero);
		}
		
		function somar()
		{
			$soma = 0;
			foreach($this->numero as $n)
				$soma += $n;
			return $soma;
		}
		
		function maior()
		{
			$maior = $this->numero[0];
			foreach($this->numero as $n)
				if($n > $maior)
					$maior = $n;
			return $maior;
		}
		
		function menor()
		{
			$menor = $this->numero[0];
			foreach($this->numero as $n)
				if($n < $menor)
					$menor = $n;
			return $menor;
		}
		
		function media_aritmetica()
		{
			return ($this->somar() / count($this->numero));
		}
		
		function diferenca()
		{
			return ($this->maior() - $this->menor());
		}
	}
?>