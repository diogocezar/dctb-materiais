<?php
require_once('ManageDB.php');
class Noticia{
	private
		$id_noticia,
		$titulo,
		$data,
		$conteudo,
		$id_usuario,
	
		$tabela,
		$campos,
		$valores,
		$condicao;
		
	public function __construct(){
		$this->preparar();
	}
	
	public function preparar(){
		/* Resgatando atributos */
		$id_noticia = $this->getIdNoticia();
		$titulo     = $this->getTitulo();
		$data       = $this->getData();
		$conteudo   = $this->getConteudo();
		$id_usuario = $this->getIdUsuario();
		
		/* Setando a tabela */
		$this->setTabela('noticia');	
		
		/* Setando campos da tabela */
		$campos = array('id_noticia',
						'titulo',
						'data',
						'conteudo',
						'id_usuario');
		
		$this->setCampos($campos);
		
		/* Pegando atributos e setando como valores */
		$valores = array($id_noticia,
						 $titulo,
						 $data,
						 $conteudo,
						 $id_usuario);
		
		$this->setValores($valores);
		
		/* Setando a condição para update e delete, id = atributo_da_classe */
		$this->setCondicao($campos[0].' = '.$valores[0]);
	}
	
	/* Recuperando uma notícia com um determinado ID */
	public function unique($id){
		$sql = "SELECT * FROM ".$this->getTabela()." WHERE id_noticia = ".$id;
		$result = ManageDB::execute($sql);
		$dados = $result->fetchRow(DB_FETCHMODE_ASSOC);
		
		$this->setIdNoticia($dados['id_noticia']);
		$this->setTitulo($dados['titulo']);
		$this->setData($dados['data']);
		$this->setConteudo($dados['conteudo']);
		$this->setIdUsuario($dados['id_usuario']);
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