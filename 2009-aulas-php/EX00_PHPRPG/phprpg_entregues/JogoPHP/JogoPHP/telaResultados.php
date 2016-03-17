<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RPG em PHP</title>
<link rel="stylesheet" href="css/resultados.css" type="text/css" />
</head>
<body>
<?php
	include("classes/Generica.php");
	include("classes/Criatura.php");
	include("classes/Heroi.php");
	include("classes/Monstro.php");
	include("classes/Confronto.php");
	$vencedorChave = array ("", "", "", "", "");
	
	function armazenarVencedor($monstro, $heroi){
		if ($monstro->vivo()){
			return $monstro;
		}
		else{
			return $heroi;
		}
	}
	
	function retornaImagem($lutador){
		if ($lutador->getNome() == "Dark Glorysson"){
			return '<img src="players/dark_glorysson.jpg" />';
		}elseif ($lutador->getNome() == "Gryin"){
			return '<img src="players/gryin.jpg" />';
		}elseif ($lutador->getNome() == "Lord Black"){
			return '<img src="players/lord_black.jpg" />';
		}elseif ($lutador->getNome() == "Matilda"){
			return '<img src="players/matilda.jpg" />';
		}elseif ($lutador->getNome() == "Mellayine"){
			return '<img src="players/mellayine.jpg" />';
		}else{ //se for o montaro...
			return '<img src="players/montaro.jpg" />';
		}
	}
	
?>

<div id="container">
	<!-- Início da primeira luta. 1/5 -->
<div id="lutadores">
    <div id="apresentaPlayers">
        <div id="player1">
            <div id="imgP1" class="imagens"><img src="players/montaro.jpg" /></div>
            <div id="caracP1" class="caracteristicas">
                <?php
                $arquivo = './monstros/montaro.txt';
                $conteudoMonstro = explode(";", file_get_contents($arquivo));
                $monstro = new Monstro($conteudoMonstro[0], $conteudoMonstro[1], $conteudoMonstro[2], $conteudoMonstro[3], 
                                       $conteudoMonstro[4], $conteudoMonstro[5], $conteudoMonstro[6], $conteudoMonstro[7], 
                                       $conteudoMonstro[8], $conteudoMonstro[9]);
                echo "$monstro";
            ?>  
            </div>
        </div>
    <div id="versus"> X</div>
    <div id="player2">
        <div id="caracP2" class="caracteristicas">
            <?php
                $arquivo = './monstros/dark.txt';
                $conteudoHeroi = explode(";", file_get_contents($arquivo));
                $heroi = new Heroi($conteudoHeroi[0], $conteudoHeroi[1], $conteudoHeroi[2], $conteudoHeroi[3], $conteudoHeroi[4],
                                   $conteudoHeroi[5], $conteudoHeroi[6], $conteudoHeroi[7], $conteudoHeroi[8], $conteudoHeroi[9],
                                   $conteudoHeroi[10]);
                echo "$heroi";
            ?>      
        </div>
        <div id="imgP2"  class="imagens"> <img src="players/dark_glorysson.jpg" /> </div>
    </div>
</div>
</div>
<div id="rounds">
      <div id="conteudoRounds">
        <?php
			Confronto::iniciar($monstro, $heroi);
			$vencedorChave[0] = armazenarVencedor($monstro, $heroi);
		?>
      </div>
</div>
	
	
	    
    <!-- Início da segunda luta. 2/5 -->
<div id="lutadores">    
	<div id="apresentaPlayers">
		<div id="player1">
        	<div id="imgP1" class="imagens"><img src="players/matilda.jpg"/></div>
        	<div id="caracP1" class="caracteristicas">
            	<?php
					$arquivo = './monstros/matilda.txt';
					$conteudoMonstro = explode(";", file_get_contents($arquivo));
					$monstro = new Monstro($conteudoMonstro[0], $conteudoMonstro[1], $conteudoMonstro[2], $conteudoMonstro[3],
										   $conteudoMonstro[4], $conteudoMonstro[5], $conteudoMonstro[6], $conteudoMonstro[7], 
										   $conteudoMonstro[8], $conteudoMonstro[9]);
					echo "$monstro";
				?> 
			</div>
      	</div>
        <div id="versus"> X</div>
        <div id="player2">
        	<div id="caracP2" class="caracteristicas">
                <?php
					$arquivo = './monstros/mellayine.txt';
					$conteudoHeroi = explode(";", file_get_contents($arquivo));
					$heroi = new Heroi($conteudoHeroi[0], $conteudoHeroi[1], $conteudoHeroi[2], $conteudoHeroi[3], $conteudoHeroi[4],
									   $conteudoHeroi[5], $conteudoHeroi[6], $conteudoHeroi[7], $conteudoHeroi[8], $conteudoHeroi[9],
									   $conteudoHeroi[10]);
					echo "$heroi";
				?>
			</div>
            <div id="imgP2"  class="imagens"><img src="players/mellayine.jpg" /></div>
      	</div>
  	</div>
</div>
<div id="rounds"> 
    <div id="conteudoRounds"> 
        <?php
            Confronto::iniciar($monstro, $heroi);
            $vencedorChave[1] = armazenarVencedor($monstro, $heroi);
        ?>
    </div>
</div>
    <!-- Fim da segunda luta. 2/5 -->
    
    
    
<!-- Início da terceira luta. 3/5 -->
<div id="lutadores">    
	<div id="apresentaPlayers">
		<div id="player1">
        	<div id="imgP1" class="imagens"><img src="players/lord_black.jpg"/></div>
        	<div id="caracP1" class="caracteristicas">
            	<?php
					$arquivo = './monstros/lord.txt';
					$conteudoMonstro = explode(";", file_get_contents($arquivo));
					$monstro = new Monstro($conteudoMonstro[0], $conteudoMonstro[1], $conteudoMonstro[2], $conteudoMonstro[3], 
										   $conteudoMonstro[4], $conteudoMonstro[5], $conteudoMonstro[6], $conteudoMonstro[7],
										   $conteudoMonstro[8], $conteudoMonstro[9]);
					echo "$monstro";
				?> 
			</div>
      	</div>
        <div id="versus"> X</div>
        <div id="player2">
        	<div id="caracP2" class="caracteristicas">
                <?php
					$arquivo = './monstros/gryin.txt';
					$conteudoHeroi = explode(";", file_get_contents($arquivo));
					$heroi = new Heroi($conteudoHeroi[0], $conteudoHeroi[1], $conteudoHeroi[2], $conteudoHeroi[3], $conteudoHeroi[4],
									   $conteudoHeroi[5], $conteudoHeroi[6], $conteudoHeroi[7], $conteudoHeroi[8], $conteudoHeroi[9],
									   $conteudoHeroi[10]);
					echo "$heroi";
				?>
			</div>
            <div id="imgP2"  class="imagens"><img src="players/gryin.jpg" /></div>
      	</div>
  	</div>
</div>
<div id="rounds"> 
    <div id="conteudoRounds"> 
        <?php
            Confronto::iniciar($monstro, $heroi);
            $vencedorChave[2] = armazenarVencedor($monstro, $heroi);
        ?>
    </div>
</div>
<!-- Fim da terceira luta. 3/5 -->
    
    
<!-- Início da quarta luta. 4/5 -->
<div id="lutadores">
    <div id="apresentaPlayers">
        <div id="player1">
            <div id="imgP1" class="imagens">
                <?php
                    echo retornaImagem($vencedorChave[0]);
                ?>
            </div>
        <div id="caracP1" class="caracteristicas">
            <?php
                echo "$vencedorChave[0]";
            ?>
        </div>
    <div id="versus"> X</div>
    <div id="player2">
        <div id="caracP2" class="caracteristicas">
            <?php
                echo "$vencedorChave[1]";
            ?>          
        </div>
        <div id="imgP2"  class="imagens">
            <?php
                echo retornaImagem($vencedorChave[1]);
            ?>
        </div>
    </div>
</div>
</div>
<div id="rounds"> 
    <div id="conteudoRounds"> 
        <?php
			if ($vencedorChave[0]->getBencao() > 0){ //entra quando a benção é maior que 0 (HERÓI)
				Confronto::iniciar($vencedorChave[1], $vencedorChave[0]);
			}else{//senão ele é monstro.
				Confronto::iniciar($vencedorChave[0], $vencedorChave[1]);
			}
            $vencedorChave[3] = armazenarVencedor($vencedorChave[0], $vencedorChave[1]);
        ?>
    </div>
</div>
<!-- Fim da quarta luta. 4/5 -->
    
    
    
<!-- Início da quinta luta. 5/5 -->
<div id="lutadores">
    <div id="apresentaPlayers">
    <div id="player1">
        <div id="imgP1" class="imagens">
        <?php
            echo retornaImagem($vencedorChave[3]);
        ?>
        </div>
        <div id="caracP1" class="caracteristicas">
        <?php
            echo "$vencedorChave[3]";
        ?>
        </div>
    </div>
    <div id="versus"> X</div>
    <div id="player2">
        <div id="caracP2" class="caracteristicas">
        <?php
            echo "$vencedorChave[2]";
        ?>
        </div>
        <div id="imgP2"  class="imagens">
        <?php
            echo retornaImagem($vencedorChave[2]);
        ?>
        </div>
    </div>
</div>
</div>
<div id="rounds"> 
    <div id="conteudoRounds"> 
        <?php
			if ($vencedorChave[3]->getBencao() > 0){ //entra quando a benção é maior que 0 (HERÓI)
				Confronto::iniciar($vencedorChave[2], $vencedorChave[3]);
			}else{//senão ele é monstro.
				Confronto::iniciar($vencedorChave[3], $vencedorChave[2]);
			}
            $vencedorChave[4] = armazenarVencedor($vencedorChave[3], $vencedorChave[2]);
        ?>
    </div>
</div>
<!-- Fim da quinta luta. 5/5 -->
    
    <div id="infoFinais">
        <h2> <center> O vencedor é:  </center> </h2>
        <div id="top">
            <div id="vencedorImg" class="imagens">
                <?php
                    echo retornaImagem($vencedorChave[4]);
                ?>
            </div>
            <div id="vencedor" class="caracteristicas">
                <?php
                    echo "$vencedorChave[4]";
                ?>
            </div>
		</div>
    </div>
    
    <div id="direitosAutorais">
    	<center> 
    	Melhor visualização do site em resoluções superiores a 1024x768. <br />
      	<strong>Adriano Alves de Lima, Ramon Bozelli Fermino.</strong></center></font>    
    </div>
</div>
</div>
</body>
</html>