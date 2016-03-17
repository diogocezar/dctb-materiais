<?php
class ContaEspecial extends ContaCorrente{
	
	private $limite;
	
	function __construct($valor, $limite){
		parent::__construct($valor);
		$this->limite = $limite;
	}
	
	function saque($valor){
		if($this->saldo + $this->limite >= $valor){
			$this->saldo = $this->saldo - $valor;
		}
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