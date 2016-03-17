<?php
	include('sAjax/Sajax.php');
	include('Ajax/ajax.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8895-1" />
<script src="JScripts/codify/codify.js" language="javascript"></script>
<script>
	<?php echo sajax_show_javascript(); ?>
	function call_busca(){
		var digitado = document.getElementById("nome").value;
		x_busca(url_encode(digitado), callback_busca);
	}
	
	function callback_busca(data){
		document.getElementById("resultados").innerHTML = url_decode(data);
	}
</script>
</head>
<body>
        Nome: <input type="text" id="nome" onkeyup="call_busca()">
        <div id="resultados"></div>
</body>
</html>