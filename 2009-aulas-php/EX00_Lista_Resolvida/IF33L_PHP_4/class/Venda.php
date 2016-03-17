<?php
	class Venda
	{
		private $matriz = array();
		private $comissao = array();
		
		function __construct($matriz, $comissao)
		{
			for($i = 0; $i < 4; $i++)
				for($j = 0; $j < 5; $j++)
					$this->matriz[$i][$j] = $matriz[$i][$j];
			$this->comissao = $comissao;
		}
		
		function total_faturado()
		{
			$total = ($this->quantidade_coluna(0) * 100);
			$total += ($this->quantidade_coluna(1) * 120);
			$total += ($this->quantidade_coluna(2) * 150);
			$total += ($this->quantidade_coluna(3) * 350);
			$total += ($this->quantidade_coluna(4) * 500);
			return $total;
		}
		
		function total_vendedor($i)
		{
			$total = ($this->matriz[$i][0] * 100);
			$total += ($this->matriz[$i][1] * 120);
			$total += ($this->matriz[$i][2] * 150);
			$total += ($this->matriz[$i][3] * 350);
			$total += ($this->matriz[$i][4] * 500);
			return $total;
		}
		
		function comissao_vendedor($total_vendedor)
		{
			$comissao = ($total_vendedor * ($this->comissao / 100));
			return $comissao;
		}
		
		function vendedor_participacao($total_vendedor, $total_faturado)
		{
			return (($total_vendedor / $total_faturado) * 100);
		}
		
		protected function quantidade_coluna($j)
		{
			$quantidade = 0;
			for($i = 0; $i < 4; $i++)
				$quantidade += $this->matriz[$i][$j];
			return $quantidade;
		}
	}
?>
