<?php
interface Generica{
	/* definindo função para imprimir atributos dos objetos */
	public function __toString();
	/* definindo função para a construção dos gets e sets */
	public function __call($metodo, $parametros);
}
?>