<?php
class Call{
	private $nome;
	private $idade;
	private $data_nascimento;
	
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
	
	public function __toString(){
		$retorno = "";
		$valores = get_object_vars($this);
		foreach($valores as $chave => $valor){
			$retorno .= ucwords($chave).": ".$valor."<br />";	
		}
		return $retorno;
	}
}
$call = new Call();
echo $call;
echo "<hr>";
$call->setNome('Diogo');
$call->setIdade(23);
$call->setDataNascimento('19/02/1986');
echo $call;

?>