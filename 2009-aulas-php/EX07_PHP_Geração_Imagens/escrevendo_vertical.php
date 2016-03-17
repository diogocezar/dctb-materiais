<?php
/* Alterando o header */
header("Content-type: image/jpeg");

/* Alocando a imagem */
$imagem = imagecreate(40,200);

/* Definindo a cor do fundo */
imagecolorallocate($imagem, 255, 255, 255);

/* Definindo uma cor preta */
$preto = imagecolorallocate($imagem, 0, 0, 0);

/* Criando o retângulo */
imagestringup($imagem, 5, 10, 190, "TESTANDO A ESCRITA", $preto);

/* Imprimindo imagem */
imagejpeg($imagem);

/* Desalocando da memória */
imagedestroy($imagem);
?>