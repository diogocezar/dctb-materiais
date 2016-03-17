<?php
/* Alterando o header */
header("Content-type: image/jpeg");

/* Alocando a imagem */
$imagem = imagecreate(300,300);

/* Definindo a cor do fundo */
imagecolorallocate($imagem, 255, 255, 255);

/* Definindo uma cor preta */
$preto = imagecolorallocate($imagem, 0, 0, 0);

/* Criando o retângulo */
imagearc($imagem, 150, 150, 300, 300, 0, 180, $preto);

/* Imprimindo imagem */
imagejpeg($imagem);

/* Desalocando da memória */
imagedestroy($imagem);
?>