<?php
/**
* A seguir são colocados os arquivos incluidos e suas respectivas descrições.
*/

/**
* Incluindo impressão de erros.
*/
include('./Errors.php');

	 /** 
	 * Esta classe é responsavel por tratar templates.
	 * xC3 || xClasses 3.0 || 2005
	 *
	 * @author xg0rd0 <xgordo@kakitus.com> 
	 * @version 1.0
	 * @copyright Copyright © 2005, Kakitus.com LTDA. 
	 * @access public
	 * @package Template
	 */
	 
class Template{

	  /** 
      * Atributo que irá armazenar um array com as tags a serem subistituidas.
      * @access private  
      * @name $tags
	  * @var Array
      */		
	var $tags;
	
	  /** 
      * Atributo que irá armazenar um array com o conteúdo a ser subistituido.
      * @access private  
      * @name $replaces
	  * @var Array
      */		
	var $replaces;
	
	  /** 
      * Atributo que irá armazenar o documento (URL) que irá sofrer a alteração.
      * @access private  
      * @name $replaces
	  * @var String
      */		
	var $doc;
	
	 /** 
	  * Método CONSTRUTOR que inicializa os atributos passados como parâmetro.
	  * @access public 
	  * @param Array   $tags
	  * @param Array   $replaces
	  * @param String  $doc
	  * @return void
	  */  
	function Template($tags, $replaces, $doc){
		if(!empty($tags) && !empty($replaces) && !empty($doc)){
			$this->tags     = $tags;
			$this->replaces = $replaces;
			$this->doc      = $doc;
		}
		else{
			$erroTemplate = new Errors($erro['TEMPL_PARMS_VAZ']);
		}		
	}//Template
	
	  /** 
	  * Método que executa a busca e subistiuição das tags.
	  * @access public 
	  * @return String
	  */  
	function change(){
		$maxTags = count($this->tags);
		$maxRepl = count($this->replaces);
		
		if($maxTags == $maxRepl){
			for($i=0; $i<$maxTags; $i++){
				$this->doc = str_replace($this->tags[$i], $this->replaces[$i], $this->doc);
			}
		}
		else{
			$erroTemplate = new Errors($erro['TEMPL_TAG_REPLA']);
		}
		
		return $this->doc;
	}//change
}//Template

?>