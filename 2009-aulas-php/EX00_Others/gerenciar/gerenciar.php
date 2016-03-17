<?php
/* Incluindo conexão com o banco */
include('config/config.php');
/* Capturando a tabela a ser consultada */
$tabela = $_GET['tabela'];
if(empty($tabela)){
	echo "<script>alert('Você deve selecionar uma tabela!');</script>";
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Busca com JQuery + Ajax</title>
<script language="javascript" src="jquery/jquery.js"></script>
<script language="javascript" src="gerenciar/gerenciar.js"></script>
<?php
	/* Extraindo campos da tabela */
	$fields  = mysql_list_fields($db_mysql['data'], $tabela, $recurso);
	$columns = mysql_num_fields($fields);
	
	for ($i = 0; $i < $columns; $i++) {
		$arrayCampos[] = mysql_field_name($fields, $i);
	}
?>
<script>
var tabela = '<?php echo $tabela ?>';
</script>
</head>
<body>
<h1>Busca com JQuery + Ajax</h1>
<fieldset>
  <legend>Pesquisa</legend>
  Nome: <input type="text" id="gerenciar" />
  <select name="campo" id="campo">
  <?php
  	foreach($arrayCampos as $item){
		echo "<option id=\"$item\">$item</option>";	
	}
  ?>
  </select>
</fieldset>

<fieldset>
  <legend>Resultado</legend>
  <div id="loading">Aguarde, carregando...</div>
  <div id="resultado"></div>
</fieldset>
</body>
</html>