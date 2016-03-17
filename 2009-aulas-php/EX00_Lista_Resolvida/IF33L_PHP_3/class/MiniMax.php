<?php
	class MiniMax
	{
		private $matriz = array();
		
		function __construct($matriz)
		{
			for($i = 0; $i < 5; $i++)
				for($j = 0; $j < 5; $j++)
					$this->matriz[$i][$j] = $matriz[$i][$j];
		}
		
		function mini_max()
		{
			$maior = $this->matriz[0][0];
			$linha = 0;
			for($i = 0; $i < 5; $i++)
				for($j = 0; $j < 5; $j++)
					if($this->matriz[$i][$j] > $maior)
					{
						$maior = $this->matriz[$i][$j];
						$linha = $i;
					}
			
			$menor = $this->matriz[$linha][0];
			for($j = 0; $j < 5; $j++)
				if($menor > $this->matriz[$linha][$j])
					$menor = $this->matriz[$linha][$j];
			
			return $menor;	
		}
	}
?>
