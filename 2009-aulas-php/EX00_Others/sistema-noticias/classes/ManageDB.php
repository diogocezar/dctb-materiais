<?php
/* incluindo componentes */
require_once('../componentes/Pear/PEAR.php');
require_once('../componentes/DB/DB.php');
/* incluindo configuração com o banco de dados */
require_once('../config/configDB.php');

class ManageDB{
	public static $db;
	
	/* Função que irá executar um SQL passado como parâmetro */
	public static function execute($sql){
		/* Array global de configuração */
		global $config;
		
		/* Iniciando a conexão com o banco */
		ManageDB::$db = DB::connect($config['dns']);	
		/* Tratando caso o objeto retornado seja um objeto que trata erros */
		if(DB::isError(ManageDB::$db)){
			die(ManageDB::$db->getMessage());
		}
		/* Gerando um resultado */
		$result = ManageDB::$db->query($sql);
		if(!DB::isError($result)){
			return $result;
		}
		else{
			die($result->getMessage());
		}
		/* Desconectando */
		ManageDB::$db->disconect();
	}
	
	public static function insert($tabela, $campos, $valores){
		
		if(empty($campos) || empty($tabela) || count($campos) != count($valores) || empty($tabela)){
			die("Parâmetros passados de forma incorreta!");
		}

		foreach($campos  as $campo){
			$x++;
			$virgula = ",";
			if($x == count($campos)){
				$virgula="";
			}
			$fields .= $campo.$virgula;
		}
		
		foreach($valores as $valor){
			$y++;
			$virgula = ",";
			if($y == count($valores)){
				$virgula="";
			}
			// para transformar '' em NULL
			if(empty($valor)){
				$valor = 'NULL';
			}
			// se não for string retira as '' do SQL
			if(gettype($valor) != 'string' || $valor == 'NULL' || $valor == 'NOW()'){	
				$values .= $valor.$virgula;
			}
			else{
				$values .= "'".$valor."'".$virgula;
			}
		}
		
		$fields = strtolower($fields);
		$sql = "INSERT INTO $tabela ($fields) VALUES ($values)";
		ManageDB::execute($sql);			
	}
	
	public static function update($tabela, $campos, $valores, $condicao){
		
		if(empty($tabela) || count($campos) != count($valores)){
			die("Parâmetros passados de forma incorreta!");	
		}
		
		$limite = count($campos);
		$sql = "UPDATE $tabela SET ";
		$igual = " = ";
		$virgula = ", ";
		for($i=0; $i<$limite; $i++){
			if(gettype($valores[$i]) != 'string' || $valores[$i] == 'NULL'){
				$sql.= strtolower($campos[$i]).$igual.$valores[$i];
			}
			else{
				$sql.= strtolower($campos[$i]).$igual."'".$valores[$i]."'";
			}
			if($i<($limite-1)){
				$sql.= $virgula;
			}		
		}
		if(!empty($condicao)){
			$sql.= " WHERE $condicao";
		}
		ManageDB::execute($sql);			
	}
	
	public static function delete($tabela, $condicao){
		if(empty($tabela) || empty($condicao)){
			die("Parâmetros passados de forma incorreta!");
		}
		$sql = "DELETE FROM $tabela WHERE $condicao";
		ManageDB::execute($sql);
	}
}
?>