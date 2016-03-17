<?php
class ContaCorrente{
	
	private $saldo;
	
	public function __construct($valor){
		$this->saldo = $valor;
	}
	
	public function saque($valor){
		if($this->saldo >= $valor){
			$this->saldo -= $valor;	
		}
	}
	
	public function deposito($valor){
		$this->saldo += $valor;
	}
	
	public function __toString(){
		$retorno = "";
		$valores = get_object_vars($this);
		foreach($valores as $chave => $valor){
			$retorno .= ucwords($chave).": ".$valor."<br />";	
		}
		return $retorno;
	}
}
?>