<?php
class Estatica{
	static $var = "Vari�vel Est�tica";
	
	static function getStatic(){
		return Estatica::$var;
	}
}
echo Estatica::getStatic();
?>