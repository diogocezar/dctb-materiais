<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
function ilista($txt){
	echo "<li>O arquivo $txt.</li>\n";
}

$arquivo = './arquivo.txt';

if(file_exists($arquivo)){
?>
    <h3><?= $arquivo ?></h3>
    Diretório: <strong><?= dirname($arquivo) ?></strong><br>
    Arquivo: <strong><?= basename($arquivo) ?></strong><br>
    Arquivo sem extensão: <strong><?= basename($arquivo, 'txt') ?></strong><br>
    Tamanho: <strong><?= filesize($arquivo) ?></strong> bytes<br>
    <ul>
	<?php
        if(is_readable($arquivo)) ilista('pode ser lido');
        if(is_writable($arquivo)) ilista('pode ser escrito');
        if(is_executable($arquivo)) ilista('é executável');
        if(is_dir($arquivo)) ilista('é um diretório');
        if(is_file($arquivo)) ilista('é um arquivo comum');
        if(is_link($arquivo)) ilista('é um link simbólico');
    ?>
	</ul>
<?php
}
else {
	echo "Erro: arquivo não existe.<br>";
}
?>
<body>
</body>
</html>