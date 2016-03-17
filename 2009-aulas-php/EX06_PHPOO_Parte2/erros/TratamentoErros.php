<?php
class TratamentoErros{
	private $nome;
	
	public function __construct($nome){
		try{
			if(empty($nome)){
				throw new Exception("Nome nao pode ser em branco.");	
			}
			else{
				$this->nome = $nome;
				echo "Nome eh ".$this->nome;
			}			
		}
		catch(Exception $e){
			echo $e->getMessage();	
		}
	}
}

$TE = new TratamentoErros("oioi");
?>