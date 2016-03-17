<?php
require_once('ManageDB.php');
class Usuario{
	private
		$id_usuario,
		$nome,
		$login,
		$senha,
	
		$tabela,
		$campos,
		$valores,
		$condicao;
		
	public function __construct(){
		$this->preparar();
	}
	
	public function preparar(){
		/* Resgatando atributos */
		$id_usuario = $this->getIdUsuario();
		$nome       = $this->getNome();
		$login      = $this->getLogin();
		$senha      = $this->getSenha();
		
		/* Setando a tabela */
		$this->setTabela('usuario');	
		
		/* Setando campos da tabela */
		$campos = array('id_usuario',
						'nome',
						'login',
						'senha');
		
		$this->setCampos($campos);
		
		/* Pegando atributos e setando como valores */
		$valores = array($id_usuario,
						 $nome,
						 $login,
						 $senha);
		
		$this->setValores($valores);
		
		/* Setando a condição para update e delete, id = atributo_da_classe */
		$this->setCondicao($campos[0].' = '.$valores[0]);
	}
	
	/* Método para efetuar o login */
	public function allowLogin($login, $senha){
		$sql .= "SELECT * FROM ";
		$sql .= $this->getTabela();
		
		$result = ManageDB::execute($sql);
		$retorno = false;
		if(!DB::isError($resultado)){
			while($dados = $result->fetchRow(DB_FETCHMODE_ASSOC)){
				if($login == $dados['login'] && $senha == $dados['senha']){
					$retorno['id_usuario'] = $dados['id_usuario'];
					$retorno['nome']       = $dados['nome'];
					$retorno['login']      = $dados['login'];
					$retorno['senha']      = $dados['senha'];
				}
			}
		}	
		return $retorno;
	}
	
	/* Recuperando uma notícia com um determinado ID */
	public function unique($id){
		$sql = "SELECT * FROM ".$this->getTabela()." WHERE id_noticia = ".$id;
		$result = ManageDB::execute($sql);
		$dados = $result->fetchRow(DB_FETCHMODE_ASSOC);
		
		$this->setIdUsuario($dados['id_usuario']);
		$this->setNome($dados['nome']);
		$this->setLogin($dados['login']);
		$this->setSenha($dados['senha']);
	}
	
	public function save(){
		ManageDB::insert($this->getTabela(), $this->getCampos(), $this->getValores());
	}
	
	public function update(){
		ManageDB::update($this->getTabela(), $this->getCampos(), $this->getValores(), $this->getCondicao());
	}
	
	public function delete(){
		ManageDB::delete($this->getTabela(), $this->getCondicao());
	}
	
	/* implementando funções definida da interfaçe */
	/* função para a construção dos gets e sets */
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
}
?>