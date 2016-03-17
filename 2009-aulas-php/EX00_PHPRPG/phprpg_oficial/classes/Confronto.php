<?php
class Confronto{
	
	/* implementando o confronto */
	public static function iniciar($monstro, $heroi){
		$nomeMonstro = $monstro->getNome();
		$nomeHeroi   = $heroi->getNome();
		$flag = 'monstro';
		$i = 1;
		$imprimir  = "";
		$imprimir  = Confronto::whovswho($monstro, $heroi);
		$imprimir .= "<h1>Confronto na Arena</h1>";
		$imprimir .= "<div id=\"arena\">";
		$criaturaRetorno = "";
		while($monstro->vivo() && $heroi->vivo()){
			$imprimir .= "<h2>Round $i</h2>";
			$i++;
			if($flag == 'monstro'){
				$flag = 'heroi';
				$coeficienteMonstro = $monstro->atacar();
				$coeficienteHeroi   = $heroi->defender();
				if($coeficienteMonstro > $coeficienteHeroi){
					$heroi->perdeVida(8);
					$imprimir .= "<div id=\"linha\"><img src=\"images/espada_monstros.png\"> <strong>".$nomeMonstro."</strong> <em>atacou</em> ($coeficienteMonstro x $coeficienteHeroi) <strong>".$nomeHeroi."</strong></div>";
					$imprimir .= "<div id=\"linha\"><img src=\"images/acertou.png\"> <strong>".$nomeHeroi."</strong> <em>perdeu</em> <strong>8</strong> pontos de vida</div>";
				}
				else{
					$imprimir .= "<div id=\"linha\"><img src=\"images/defesa.png\"> <strong>".$nomeHeroi."</strong> <em>defendeu</em> ($coeficienteHeroi x $coeficienteMonstro) o ataque de <strong>".$nomeMonstro."</strong></div>";
				}
			}
			else{
				$flag = 'monstro';
				$coeficienteHeroi   = $heroi->atacar();
				$coeficienteMonstro = $monstro->defender();
				if($coeficienteHeroi > $coeficienteMonstro){
					$monstro->perdeVida(8);
					$imprimir .= "<div id=\"linha\"><img src=\"images/espada_herois.png\"> <strong>".$nomeHeroi."</strong> <em>atacou</em> ($coeficienteHeroi x $coeficienteMonstro) <strong>".$nomeMonstro."</strong></div>";
					$imprimir .= "<div id=\"linha\"><img src=\"images/acertou.png\"> <strong>".$nomeMonstro."</strong> <em>perdeu</em> <strong>8</strong> pontos de vida</div>";
				}
				else{
					$imprimir .= "<div id=\"linha\"><img src=\"images/defesa.png\"> <strong>".$nomeMonstro."</strong> <em>defendeu</em> ($coeficienteMonstro x $coeficienteHeroi) o ataque de <strong>".$nomeHeroi."</strong></div>";
				}//else
			}//else
			
			$imprimir .= "<div id=\"linha\" class=\"vida\">Vida do heroi ($nomeHeroi): <strong>".$heroi->getVida()."</strong></div>";
			$imprimir .= "<div id=\"linha\" class=\"vida\">Vida do monstro ($nomeMonstro): <strong>".$monstro->getVida()."</strong></div>";
			
		}//while
		$imprimir .= "</div>";
		if($monstro->vivo()){
			$imprimir .= "<h1>".$nomeMonstro." venceu o confronto</h1>";
			$coeficienteDescanso = $monstro->descansar();
			if($coeficienteDescanso > 20){
				$imprimir .= "<div id=\"linha\">".$nomeMonstro." pode <em>descansar</em></div>";
				$monstro->revitalizar();
			}
			$criaturaRetorno = $monstro;
		}
		else{
			$imprimir .= "<h1>".$nomeHeroi." venceu o confronto</h1>";
			$coeficienteDescanso = $heroi->descansar();
			if($coeficienteDescanso > 20){
				$imprimir .= "<div id=\"linha\">".$nomeHeroi." pode <em>descansar</em></div>";
				$heroi->revitalizar();
			}
			$criaturaRetorno = $heroi;
		}
		$imprimir .= "<div id=\"espaco_confronto\"></div>";
		echo $imprimir;
		return $criaturaRetorno;
	}//iniciar
	
	/* função que imprime os oponentes */
	private function whovswho($monstro, $heroi){
		$imprimir .= "";
		$imprimir .= "<div id=\"container\">";
			$imprimir .= "<div id=\"foto_monstro\"><img src=\"".$monstro->getFoto()."\" /></div>";
			$imprimir .= "<div id=\"infos_monstro\">";
				$imprimir .= $monstro->__toString();
			$imprimir .= "</div>";
			$imprimir .= "<div id=\"xis\">X</div>";
			$imprimir .= "<div id=\"infos_heroi\">";
				$imprimir .= $heroi->__toString();
			$imprimir .= "</div>";
			$imprimir .= "<div id=\"foto_heroi\"><img src=\"".$heroi->getFoto()."\" /></div>";
		$imprimir .= "</div>";
		return $imprimir;
	}
}//confronto
?>