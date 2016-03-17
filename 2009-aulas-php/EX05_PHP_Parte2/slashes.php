<?php
$str = "Seu nome é O'reilly?";
// Mostra: Seu nome é O\'reilly?
echo addslashes($str);
echo "<br>";
// Mostra: Seu nome é O'reilly?
echo stripslashes($str);
?>
