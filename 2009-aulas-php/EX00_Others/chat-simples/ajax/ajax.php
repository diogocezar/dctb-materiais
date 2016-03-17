<?
/**
* Funções a serem executadas pelo ajax.
*/

/* Configurando o sAjax */
sajax_init();
$sajax_debug_mode = 0;
sajax_export("inserirDados", "recuperarDados");
sajax_handle_client_request();

function inserirDados($mensagem){
	$nomeUsuario = $_SESSION["sessNomeUsuario"];
	$mensagem = rawurldecode($mensagem);
	$mensagem = htmlspecialchars($mensagem);
	$sql = "INSERT INTO chat (id, de, mensagem, quando) VALUES ('', '".$nomeUsuario."', '".$mensagem."', NOW())";
	$query = mysql_query($sql) or die(mysql_error());
}

function recuperarDados(){
	$resultado = "";
	$nomeUsuario = $_SESSION["sessNomeUsuario"];
	$sql = "SELECT de, mensagem, date_format(quando, '%h:%i:%s') as data_formatada FROM chat ORDER BY id DESC LIMIT 50";
	$query = mysql_query($sql) or die(mysql_error());
	while($dados = mysql_fetch_array($query)){
		$resultado .= "<strong>".$dados["de"]."</strong> <small>(".$dados["data_formatada"].")</small> diz: ".$dados["mensagem"];
		$resultado .= "<br /><hr />";
	}
	return rawurlencode($resultado);
}