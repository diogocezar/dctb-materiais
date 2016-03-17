<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/estilo.css" />
<title>Confronto</title>
</head>
<body>
<img src="./imagens/dark_glorysson.jpg" />
<img src="./imagens/montaro.jpg" />
<?php

    require_once("./classes/Confronto.php");
    require_once("./classes/Monstro.php");
    require_once("./classes/Heroi.php");
     
	$fileHerois = array("./herois/darkglorysson/darkglorysson.txt", "./herois/mellayine/mellayine.txt", "./herois/gryin/gryin.txt");
	$fileMonstros = array("./monstros/lordblack/lordblack.txt", "./monstros/matilda/matilda.txt", "./monstros/montaro/montaro.txt");
	
	function abrirArquivoHeroi($file){
		$rec = fopen($file, "r");
		$i = 0;
		while(!feof($rec)){
			$linha = fgets($rec);
		}
		fclose($rec);
		$dadosHeroi = explode(";", $linha); 
		echo " <br>Nome: $dadosHeroi[0]<br>";
		echo " Classe: $dadosHeroi[1]<br>";
		echo " Nivel: $dadosHeroi[2]<br>";
		echo " Vida: $dadosHeroi[3]<br>";
		echo " Magia: $dadosHeroi[4]<br>";
		echo " Forca: $dadosHeroi[5]<br>";
		echo " Agilidade: $dadosHeroi[6]<br>";
		echo " Destreza: $dadosHeroi[7]<br>";
		echo " Inteligencia: $dadosHeroi[8]<br>";
		echo " Carisma: $dadosHeroi[9]<br>";
		echo " Bencao: $dadosHeroi[10]<br><br><br>";
		
		return $dadosHeroi;
	}
	
	function abrirArquivoMonstro($file){
		$rec = fopen($file, "r");
		$i = 0;
		while(!feof($rec)){
			$linha = fgets($rec);
		}
		fclose($rec);
		$dadosMonstro = explode(";", $linha); 
		echo " <br>Nome: $dadosMonstro[0]<br>";
		echo " Classe: $dadosMonstro[1]<br>";
		echo " Nivel: $dadosMonstro[2]<br>";
		echo " Vida: $dadosMonstro[3]<br>";
		echo " Magia: $dadosMonstro[4]<br>";
		echo " Forca: $dadosMonstro[5]<br>";
		echo " Agilidade: $dadosMonstro[6]<br>";
		echo " Destreza: $dadosMonstro[7]<br>";
		echo " Inteligencia: $dadosMonstro[8]<br>";
		echo " Carisma: $dadosMonstro[9]<br>";
		
		return $dadosMonstro;
	}
    
	$dadosDark = abrirArquivoHeroi($fileHerois[0]);
	$dadosMontaro = abrirArquivoMonstro($fileMonstros[2]);
	echo "<br><br><h1>FIGHT</h1><br><br>";
	$heroi = new Heroi($dadosDark[0], $dadosDark[1], $dadosDark[2], $dadosDark[3], $dadosDark[4], $dadosDark[5], $dadosDark[6], $dadosDark[7], $dadosDark[8], $dadosDark[9], $dadosDark[10]);
	$monstro = new Monstro($dadosMontaro[0], $dadosMontaro[1], $dadosMontaro[2], $dadosMontaro[3], $dadosMontaro[4], $dadosMontaro[5], $dadosMontaro[6], $dadosMontaro[7], $dadosMontaro[8], $dadosMontaro[9]);
	
	$Vencedor1 = Confronto::iniciar($monstro, $heroi);
	
	$dadosMellayine = abrirArquivoHeroi($fileHerois[1]);
	$dadosMatilda = abrirArquivoMonstro($fileMonstros[1]);
	echo "<br><br><h1>FIGHT</h1><br><br>";
	$heroi = new Heroi($dadosMellayine[0], $dadosMellayine[1], $dadosMellayine[2], $dadosMellayine[3], $dadosMellayine[4], $dadosMellayine[5], $dadosMellayine[6], $dadosMellayine[7], $dadosMellayine[8], $dadosMellayine[9], $dadosMellayine[10]);
	$monstro = new Monstro($dadosMatilda[0], $dadosMatilda[1], $dadosMatilda[2], $dadosMatilda[3], $dadosMatilda[4], $dadosMatilda[5], $dadosMatilda[6], $dadosMatilda[7], $dadosMatilda[8], $dadosMatilda[9]);

	$Vencedor2 = Confronto::iniciar($monstro, $heroi);
?>

<div id="footer">
   		Todos os direitos reservados. <br />
</div>
</div>
</body>

</html>