<?php
/* Alterando o header */
header("Content-type: image/jpeg");

/* Alocando a imagem */
$imagem = imagecreate(300,300);

/* Definindo a cor do fundo */
imagecolorallocate($imagem, 255, 255, 255);

/* Definindo uma cor preta */
$preto = imagecolorallocate($imagem, 0, 0, 0);

/* Criando um array com os pontos */
$pontos = array(150, 10,
				190, 120,
				290, 120,
				210, 180,
				255, 290,
				150, 220,
				45, 290,
				90, 180,
				10, 120,
				110, 120
				);

/* Criando o retângulo */
imagefilledpolygon($imagem, $pontos, 10, $preto);

/* Imprimindo imagem */
imagejpeg($imagem);

/* Desalocando da memória */
imagedestroy($imagem);
?>