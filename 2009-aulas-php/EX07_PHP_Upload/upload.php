<html>
<head>
<title>Upload em PHP</title>
</head>
<body>
<?php
if (!empty($_FILES['arquivo']['name'])){
	$uploaddir = "./files/";
	$arquivo = $uploaddir. $_FILES['arquivo']['name'];
	if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivo)) {
		echo "O arquivo foi gravado com sucesso.";
	}
	else
	{
		echo "Erro. O arquivo não foi enviado.";
	}
}
?>
<form enctype="multipart/form-data" action="upload.php" method="POST">
Enviar este arquivo: <input name="arquivo" type="file">
<input type="submit" value="Envia Arquivo">
</form>
</body>
</html>