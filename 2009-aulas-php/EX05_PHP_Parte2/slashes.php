<?php
$str = "Seu nome � O'reilly?";
// Mostra: Seu nome � O\'reilly?
echo addslashes($str);
echo "<br>";
// Mostra: Seu nome � O'reilly?
echo stripslashes($str);
?>
