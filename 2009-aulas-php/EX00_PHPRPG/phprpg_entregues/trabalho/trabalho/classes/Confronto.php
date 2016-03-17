<?php

   include("Heroi.php");
   include("Monstro.php");
   
	class Confronto{
		
		public static function iniciar($monstro, $heroi){
			$flag = 1;
			$cont = 1;
			
			while (($monstro->vivo()) && ($heroi->vivo())){
				echo "<br>ROUND $cont<br>";
				if ($flag == 1){ 
					$flag = 2; 
					$coeficientemonstro = $monstro->atacar(); 
					$coeficienteheroi = $heroi->defender(); 
					if ($coeficientemonstro > $coeficienteheroi){ 
						$heroi->perdeVida(8); 
						echo "<br>".$monstro->getnome()." atacou($coeficientemonstro x $coeficienteheroi)". $heroi->getnome();
					}else{
					    echo "<br>".$heroi->getnome()." defendeu($coeficienteheroi x $coeficientemonstro) o ataque de " .$monstro->getnome();
						$monstro->perdeVida(8);
					}				
				} 
				else{ 
					$flag = 1; 
					$coeficienteheroi = $heroi->atacar(); 
					$coeficientemonstro = $monstro->defender();
					if ($coeficienteheroi > $coeficientemonstro){ 
						$monstro->perdeVida(8);
						echo "<br>".$heroi." atacou($coeficienteheroi x $coeficientemonstro)".$monstro;	
					}else{
						echo "<br>".$monstro." defendeu($coeficientemonstro x $coeficienteheroi) o ataque de ".$heroi;	
						$heroi->perdeVida(8); 
					}
					
				} 
				
				$cont++;
				echo "<br>Vida do heroi  :  ".$heroi->getvida();
				echo "<br>Vida do monstro:  ".$monstro->getvida();
				echo "<br><pr>";
			}

			if ($monstro->vivo()){
				$criaturavencedora = $monstro;
			}else{
				$criaturavencedora = $heroi;
			}
			
			echo "<h1>".$criaturavencedora." VENCEU O CONFRONTO!</h1>";
			if ($criaturavencedora->descansar() > 20) {
				$criaturavencedora->revitalizar(); 
				echo "".$criaturavencedora." pode descansar";
			}
			
			return $criaturavencedora;	
		}
	}

?>

