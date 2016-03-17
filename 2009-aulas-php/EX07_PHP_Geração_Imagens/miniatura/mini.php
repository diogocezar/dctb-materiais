<?php
/* Alterando o header */
header("Content-type: image/jpeg");

$localImagem = $_GET['loc'];
$x_mini = $_GET['l'];
$y_mini = $_GET['a'];

/* criando a imagem a partir da original */
$imagem_original = imagecreatefromjpeg($localImagem);

/* altura e largura da imagem original */
$image_x = imagesx($imagem_original);
$image_y = imagesy($imagem_original);

/* altura e largura da nova imagem */
$mini_x = $x_mini;
$mini_y = $y_mini;

/* criando uma imagem temporaria */
$mini = imagecreatetruecolor($mini_x, $mini_y);

/* copiando a imagem original para a miniatura */
imagecopyresampled($mini, $imagem_original, 0, 0, 0, 0, $mini_x, $mini_y, $image_x, $image_y); 

/* Imprimindo imagem */
imagejpeg($mini);

/* Desalocando da memória */
imagedestroy($mini);
?>