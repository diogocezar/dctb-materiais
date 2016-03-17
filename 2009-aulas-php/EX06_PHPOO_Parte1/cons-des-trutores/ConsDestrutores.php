<?php
class ConsDestrutor{
	function __construct(){
		echo "Metodo Construtor Invocado<br>";	
	}	
	function __destruct(){
		echo "Metodo Destrutor Invocado<br>";	
	}
}
$ConsDestrutores = new ConsDestrutor();
unset($ConsDestrutores);
?>