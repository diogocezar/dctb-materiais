<?php
	class Confronto
	{
		static function iniciar($monstro, $heroi)
		{
			$flag = 1;
			$i = 1;
			while($monstro->vivo() && $heroi->vivo())
			{
				echo "<strong>ROUND $i</strong><br />";
				if($flag == 1)
				{
					$flag = 2;
					$ataque = $monstro->atacar();
					$defesa = $heroi->defender();
					$nomeMonstro = $monstro->getNome();
					$nomeHeroi = $heroi->getNome();
					if($ataque > $defesa)
					{
						echo "$nomeMonstro atacou ($ataque x $defesa) $nomeHeroi<br />";
						$heroi->perdeVida();
						echo "$nomeHeroi perdeu 8 pontos de vida<br />";
					}else{
						echo "$nomeHeroi defendeu ($defesa x $ataque) $nomeMonstro<br />";
						//$monstro->perdeVida(4);
					}
					$vidaHeroi = $heroi->getVida();
					$vidaMonstro = $monstro->getVida();
					if ($vidaHeroi < 0){
						$vidaHeroi = 0;
					}
					if ($vidaMonstro < 0){
						$vidaMonstro = 0;
					}
					echo "Vida do heroi: $vidaHeroi<br />";
					echo "Vida do monstro: $vidaMonstro<br />";
				}
				else
				{
					$flag = 1;
					$ataque = $heroi->atacar();
					$defesa = $monstro->defender();
					$nomeMonstro = $monstro->getNome();
					$nomeHeroi = $heroi->getNome();
					if($ataque > $defesa)
					{
						echo "$nomeHeroi atacou ($ataque x $defesa) $nomeMonstro<br />";
						$monstro->perdeVida();
						echo "$nomeMonstro perdeu 8 pontos de vida<br />";
					}else{
						echo "$nomeMonstro defendeu ($defesa x $ataque) $nomeHeroi<br />";
						//$heroi->perdeVida(4);
					}
					$vidaHeroi = $heroi->getVida();
					$vidaMonstro = $monstro->getVida();
					if ($vidaHeroi < 0){
						$vidaHeroi = 0;
					}
					if ($vidaMonstro < 0){
						$vidaMonstro = 0;
					}
					echo "Vida do heroi: $vidaHeroi<br />";
					echo "Vida do monstro: $vidaMonstro<br />";
				}
				$i++;
				echo "<br />";
			}
			if($monstro->vivo())
			{
				echo "$nomeMonstro venceu o confronto. ";
				if($monstro->descansar() > 20)
				{
					$monstro->revitalizar();
					echo "$nomeMonstro pode <strong>descansar</strong>";
				}
			}
			else
			{ 
				echo "$nomeHeroi venceu o confronto. ";
				if($heroi->descansar() > 20)
				{
					$heroi->revitalizar();
					echo "$nomeHeroi pode <strong>descansar</strong>";
				}
			}
		}
	}
?>
