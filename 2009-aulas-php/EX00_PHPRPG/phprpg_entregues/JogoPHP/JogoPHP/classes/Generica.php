<?php
	interface Generica
	{
		function __toString();
		function __call($metodo,  $parametros);
	}
?>