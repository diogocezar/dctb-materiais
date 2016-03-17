<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/estilo.css" />
<title>Confronto</title>
</head>
<body class="imagemFundo">
<?php
    //alunos:  ELTON Y. YAMAMOTO / RICARDO MONTEIRO FUGIMOTO / ROSANGELA DE F. PEREIRA
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
    require_once("./classes/Confronto.php");
    require_once("./classes/Monstro.php");
    require_once("./classes/Heroi.php");

	$fileCompetidores = array("Dark Glorysson" =>"./herois/darkglorysson/darkglorysson.txt", "Mellayine" => "./herois/mellayine/mellayine.txt", "Gryin" => "./herois/gryin/gryin.txt", "Lord Black" => "./monstros/lordblack/lordblack.txt", "Matilda" => "./monstros/matilda/matilda.txt", "Montaro" => "./monstros/montaro/montaro.txt");//lendo arquivos

	
	
	function abrirArquivo($file){
	    //guardando no array as chamadas das imagens
		$fileImagens  = array("Dark Glorysson" =>"<img src=\"./imagens/dark_glorysson.jpg\" />", "Mellayine" => "<img src=\"./imagens/mellayine.jpg\" />", "Gryin" => "<img src=\"./imagens/gryin.jpg\" />", "Lord Black" => "<img src=\"./imagens/lord_black.jpg\" />", "Matilda" => "<img src=\"./imagens/matilda.jpg\" />", "Montaro" => "<img src=\"./imagens/montaro.jpg\" />"); //imagens das criaturas
		
		$rec = fopen($file, "r");
		$i = 0;
		while(!feof($rec)){
			$linha = fgets($rec);
		}
		fclose($rec);
		$dados = explode(";", $linha);//transformando em um array 	
?>
<div id="dados">
	<div id="imagem">
<?php
		echo $fileImagens["$dados[0]"];//mostra a imagem da criatura de nome dados[0]
?>
	</div>
	<div id="competidor">
<?php
		echo " Nome: $dados[0]<br>";    //atributos da criatura
		echo " Classe: $dados[1]<br>";
		echo " Nivel: $dados[2]<br>";
		echo " Vida: $dados[3]<br>";
		echo " Magia: $dados[4]<br>";
		echo " Forca: $dados[5]<br>";
		echo " Agilidade: $dados[6]<br>";
		echo " Destreza: $dados[7]<br>";
		echo " Inteligencia: $dados[8]<br>";
		echo " Carisma: $dados[9]";
		if((count($dados)) > 10){
			echo "<br>Bencao: $dados[10]";//se for heroi tem a bencao como atributo
?>
	</div>
</div>
<?php
		}
		
		return $dados;
	}
	function CriarCompetidor($dados, $tipo){
		if($tipo == 1){
			$heroi = $heroi = new Heroi($dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $dados[7], $dados[8], $dados[9], $dados[10]);
			return $heroi;
		}else{
			$monstro = new Monstro($dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $dados[7], $dados[8], $dados[9]);
			return $monstro;
		}
	}	
	//primeira luta
	$dadosDark = abrirArquivo($fileCompetidores["Dark Glorysson"]);
	$dadosMontaro = abrirArquivo($fileCompetidores["Montaro"]); 
	$heroi = CriarCompetidor($dadosDark, 1);
	$monstro = CriarCompetidor($dadosMontaro, 2);
	$Vencedor1 = Confronto::iniciar($monstro, $heroi);
	
	//segunda  luta
	$dadosMellayine = abrirArquivo($fileCompetidores["Mellayine"]);
	$dadosMatilda = abrirArquivo($fileCompetidores["Matilda"]);
		
	$heroi1     = CriarCompetidor($dadosMellayine, 1);
	$monstro1   = CriarCompetidor($dadosMatilda, 2);
	$Vencedor2  = Confronto::iniciar($monstro1, $heroi1);
			
	//disputa entre vencedor 1 e vencedor 2
	$dados = abrirArquivo($fileCompetidores["$Vencedor1"]);
	$dados = abrirArquivo($fileCompetidores["$Vencedor2"]);
	
	//terceira  luta
	$Vencedor3 = Confronto::iniciar($Vencedor1, $Vencedor2);
	
	//quarta  luta
	$dadosGryin = abrirArquivo($fileCompetidores["Gryin"]); 
	$dadosLordBlack = abrirArquivo($fileCompetidores["Lord Black"]);
		
	$heroi4     = CriarCompetidor($dadosGryin, 1);
	$monstro4   = CriarCompetidor($dadosLordBlack, 2);
	$Vencedor4 = Confronto::iniciar($monstro4, $heroi4);
	
	
	//quinta  luta -- final
	$dados = abrirArquivo($fileCompetidores["$Vencedor3"]);
	$dados = abrirArquivo($fileCompetidores["$Vencedor4"]);
	
	
	$Vencedor5 = Confronto::iniciar($Vencedor3, $Vencedor4);
	
?>
</body>
</html>