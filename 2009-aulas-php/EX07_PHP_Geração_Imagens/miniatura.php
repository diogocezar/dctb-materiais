<?php
/* Alterando o header */
header("Content-type: image/jpeg");

/* criando a imagem a partir da original */
$imagem_original = imagecreatefromjpeg('guitar.jpg');

/* altura e largura da imagem original */
$image_x = imagesx($imagem_original);
$image_y = imagesy($imagem_original);

/* altura e largura da nova imagem */
$mini_x = '400';
$mini_y = '200';

/* criando uma imagem temporaria */
$mini = imagecreatetruecolor($mini_x, $mini_y);

/* copiando a imagem original para a miniatura */
imagecopyresampled($mini, $imagem_original, 0, 0, 0, 0, $mini_x, $mini_y, $image_x, $image_y); 

/* Imprimindo imagem */
imagejpeg($mini);

/* Desalocando da memória */
imagedestroy($mini);
?>