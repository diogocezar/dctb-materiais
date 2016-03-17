<?php
/* Alterando o header */
header("Content-type: image/jpeg");

/* Alocando a imagem */
$imagem = imagecreate(400,400);

/* Definindo a cor do fundo */
imagecolorallocate($imagem, 0, 0, 0);

/* Definindo uma cor branca */
$branco = imagecolorallocate($imagem, 255, 255, 255);

/* Criando primeira linha */
imageline($imagem, 0, 0, 399, 399, $branco);

/* Criando segunda linha */
imageline($imagem, 0, 399, 399, 0, $branco);

/* Imprimindo imagem */
imagejpeg($imagem);

/* Desalocando da memória */
imagedestroy($imagem);
?>