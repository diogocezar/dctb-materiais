<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Minimax</title>
</head>
<body>
	<?php
		include("class/Venda.php");
		if(!empty($_POST["00"]) || !empty($_POST["01"]) || !empty($_POST["02"]) || !empty($_POST["03"]) || !empty($_POST["04"]) || !empty(		           $_POST["10"]) || !empty($_POST["11"]) || !empty($_POST["12"]) || !empty($_POST["13"]) || !empty($_POST["14"]) || !empty($_POST[           "20"]) || !empty($_POST["21"]) || !empty($_POST["22"]) || !empty($_POST["23"]) || !empty($_POST["24"]) || !empty($_POST["30"])           || !empty($_POST["31"]) || !empty($_POST["32"]) || !empty($_POST["33"]) || !empty($_POST["34"])
		  )
		{
			$matriz = array();
			$matriz[0][0] = $_POST["00"];
			$matriz[0][1] = $_POST["01"];
			$matriz[0][2] = $_POST["02"];
			$matriz[0][3] = $_POST["03"];
			$matriz[0][4] = $_POST["04"];
			$matriz[1][0] = $_POST["10"];
			$matriz[1][1] = $_POST["11"];
			$matriz[1][2] = $_POST["12"];
			$matriz[1][3] = $_POST["13"];
			$matriz[1][4] = $_POST["14"];
			$matriz[2][0] = $_POST["20"];
			$matriz[2][1] = $_POST["21"];
			$matriz[2][2] = $_POST["22"];
			$matriz[2][3] = $_POST["23"];
			$matriz[2][4] = $_POST["24"];
			$matriz[3][0] = $_POST["30"];
			$matriz[3][1] = $_POST["31"];
			$matriz[3][2] = $_POST["32"];
			$matriz[3][3] = $_POST["33"];
			$matriz[3][4] = $_POST["34"];
			$vend = new Venda($matriz, $_POST["comissao"]);
			$total = $vend->total_faturado();
			echo "O total faturado pela companhia é R$ $total.<br />";
			$total_vendedor = array(0 => $vend->total_vendedor(0), 1 => $vend->total_vendedor(1), 2 => $vend->total_vendedor(2), 3 => 		                              $vend->total_vendedor(3));
			echo "O total faturado do vendedor 1 é R$ $total_vendedor[0].<br />";
			echo "O total faturado do vendedor 2 é R$ $total_vendedor[1].<br/>";
			echo "O total faturado do vendedor 3 é R$ $total_vendedor[2].<br />";
			echo "O total faturado do vendedor 4 é R$ $total_vendedor[3].<br />";
			$comissao_vendedor = array(0 => $vend->comissao_vendedor($total_vendedor[0]), 1 => $vend->comissao_vendedor($total_vendedor[1                                       ]), 2 => $vend->comissao_vendedor($total_vendedor[2]), 3 => $vend->comissao_vendedor(                                       $total_vendedor[3])
			                          );
			echo "A comissãoo do vendedor 1 é R$ $comissao_vendedor[0].<br />";
			echo "A comissão do vendedor 2 é R$ $comissao_vendedor[1].<br/>";
			echo "A comissão do vendedor 3 é R$ $comissao_vendedor[2].<br />";
			echo "A comissão do vendedor 4 é R$ $comissao_vendedor[3].<br />";
			$perc_vend = array(0 => $vend->vendedor_participacao($total_vendedor[0], $total), 1 => $vend->vendedor_participacao(	                               $total_vendedor[1], $total), 2 => $vend->vendedor_participacao($total_vendedor[2], $total), 3 => $vend->                               vendedor_participacao($total_vendedor[3], $total)
			                  );
			sort($perc_vend);
			print_r($perc_vend);
		}
		else
		{
	?>
			<form method="post" action="empresa.php">
				<label>0, 0:
					<input type="text" name="00" id="00" />
				</label>
				<label>0, 1:
					<input type="text" name="01" id="01" />
				</label>
				<label>0, 2:
					<input type="text" name="02" id="02" />
				</label>
				<label>0, 3:
					<input type="text" name="03" id="03" />
				</label>
				<label>0, 4:
					<input type="text" name="04" id="04" />
				</label>
				<label>1, 0:
					<input type="text" name="10" id="10" />
				</label>
				<label>1, 1:
					<input type="text" name="11" id="11" />
				</label>
				<label>1, 2:
					<input type="text" name="12" id="12" />
				</label>
				<label>1, 3:
					<input type="text" name="13" id="13" />
				</label>
				<label>1, 4:
					<input type="text" name="14" id="14" />
				</label>
				<label>2, 0:
					<input type="text" name="20" id="20" />
				</label>
				<label>2, 1:
					<input type="text" name="21" id="21" />
				</label>
				<label>2, 2:
					<input type="text" name="22" id="22" />
				</label>
				<label>2, 3:
					<input type="text" name="23" id="23" />
				</label>
				<label>2, 4:
					<input type="text" name="24" id="24" />
				</label>
				<label>3, 0:
					<input type="text" name="30" id="30" />
				</label>
				<label>3, 1:
					<input type="text" name="31" id="31" />
				</label>
				<label>3, 2:
					<input type="text" name="32" id="32" />
				</label>
				<label>3, 3:
					<input type="text" name="33" id="33" />
				</label>
				<label>3, 4:
					<input type="text" name="34" id="34" />
				</label>
				<br />
				<label>Comissão para os vendedores:
					<input type="text" name="comissao" id="comissao" />
				</label>
				<input type="submit" name="enviar" id="enviar" value="Enviar" />
			</form>
	<?php
		}
	?>
</body>
</html>