<?php
function divide($a, $b, $verificaDivZero = true){
	if($verificaDivZero){
		if($b == 0){
			return 'Divis�o por zero';
		}
	}
	return ($a / $b);
}
echo divide(10,0);
?>
