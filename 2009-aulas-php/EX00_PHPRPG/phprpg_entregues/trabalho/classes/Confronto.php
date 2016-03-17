<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./css/estilo.css" />

<?php

   include("Heroi.php");//adicionando as classes que serao usadas
   include("Monstro.php");
   
	class Confronto{//classe confronto
		
		public static function iniciar($monstro, $heroi){ //iniciar confronto
			$flag = 1;
			$cont = 1;
?>
<div id="confronto">
<?php			
			while (($monstro->vivo()) && ($heroi->vivo())){
				echo "<br><br>ROUND $cont<br>";
				if ($flag == 1){ 
					$flag = 2; 
					$coeficientemonstro = $monstro->atacar(); 
					$coeficienteheroi = $heroi->defender(); 
					//se o monstro conseguiu atacar
					if ($coeficientemonstro > $coeficienteheroi){ 
						$heroi->perdeVida(8);
											
						echo "<br>".$monstro->getnome()." atacou($coeficientemonstro x $coeficienteheroi)". $heroi->getnome();
         			}else{//se nao conseguiu atacar
					    echo "<br>".$heroi->getnome()." defendeu($coeficienteheroi x $coeficientemonstro) o ataque de " .$monstro->getnome();
						$monstro->perdeVida(8);
					}				
				} 
				else{		 
					$flag = 1; 
					$coeficienteheroi = $heroi->atacar(); 
					$coeficientemonstro = $monstro->defender();
					//se heroi conseguiu atacar
					if ($coeficienteheroi > $coeficientemonstro){ 
						$monstro->perdeVida(8);
						echo "<br>".$heroi." atacou($coeficienteheroi x $coeficientemonstro)".$monstro;	
					}else{ // se nao conseguiu
						echo "<br>".$monstro." defendeu($coeficientemonstro x $coeficienteheroi) o ataque de ".$heroi;	
						$heroi->perdeVida(8);
					}
					
				} 
				
				$cont++;
				echo "<br>Vida do heroi   : ".$heroi->getvida();
				echo "<br>Vida do monstro : ".$monstro->getvida();
			}

			if ($monstro->vivo()){
				$criaturavencedora = $monstro;
			}else{
				$criaturavencedora = $heroi;
			}
			echo "<br><h1>".$criaturavencedora." VENCEU O CONFRONTO!</h1>";
			if ($criaturavencedora->descansar() > 20) {

				$criaturavencedora->revitalizar(); 
				echo "<br>".$criaturavencedora." pode descansar<br>";
?>
</div>
<?php
			}
			
			return $criaturavencedora;	
		}
	}

?>



