<?php
class Agenda{
	private
		$nome,
		$endereco,
		$telefone,
		$email;
	
	public function __construct($nome, $endereco, $telefone, $email){
		$this->nome     = $nome;
		$this->endereco = $endereco;
		$this->telefone = $telefone;
		$this->email    = $email;
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
$itemAgenda = new Agenda("Diogo Cezar", "Rua Anchieta, 1369", "(43)3523-2956", "xgordo@gmail.com");
echo $itemAgenda;
?>