<?php
/* Alterando o header */
header("Content-type: image/jpeg");

/* Alocando a imagem */
$imagem = imagecreate(200,40);

/* Definindo a cor do fundo */
imagecolorallocate($imagem, 255, 255, 255);

/* Definindo uma cor preta */
$preto = imagecolorallocate($imagem, 0, 0, 0);

/* Criando o retângulo */
imagestring($imagem, 5, 3, 3, "TESTANDO A ESCRITA", $preto);

/* Imprimindo imagem */
imagejpeg($imagem);

/* Desalocando da memória */
imagedestroy($imagem);
?>