<?php

/**
* Funções a serem executadas pelo ajax.
*/

/* Configurando o sAjax */
sajax_init();
$sajax_debug_mode = 0;
sajax_export("busca");
sajax_handle_client_request();



function busca($string){
	
	$string = rawurldecode($string);
	
    if ($string == "")
    {
        return "";
    }

	$itens[0] = "Felipe";
	$itens[1] = "João";
	$itens[2] = "Juca";
	$itens[3] = "Mariana";
	$itens[4] = "Fernando";
	$itens[5] = "Talita";
	$itens[6] = "Tales";
	$itens[7] = "Diogo";
	$itens[8] = "Alberto";
	$itens[9] = "Diego";
	
    for ($i = 0; $i < count($itens); $i++)
    {
        if (eregi($string, $itens[$i]))
        {
            $return["html"] .= $itens[$i]."<br />";
        }
    }
    return ($return["html"]);
}
?>