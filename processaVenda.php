<?php
	require 'db/conexao.php';
	
	global $conexao;
	
	if (isset ( $_POST )) {
		
		$ven = getLastCodVen() + 1;
		
		$sql = "INSERT INTO venda
		       (codven, datven, valtotven, cgctrs)
				values
			   (:ven, current_timestamp, :tot, :trs)";
		
		$sql = $conexao->prepare($sql);
		
		$sql->bindParam(':ven', $ven           , PDO::PARAM_STR);
		$sql->bindParam(':tot', $_POST['total'], PDO::PARAM_STR);
		$sql->bindParam(':trs', $_POST['trs']  , PDO::PARAM_STR);
		$sql->execute();
		
		if($sql->errorCode() == 0){ 
			$qtdtot = $_POST['qtdtot'];
		
			for ($i=0; $i<$qtdtot; $i++){
				$qtd = $_POST['qtd'. $i];
				$vlr = $_POST['vlr'.$i] *= $qtd; 
				$des = $_POST['des'.$i] *= $qtd; 
				$liq = $vlr - $des;
				$cod = $_POST['cod'. $i];
				
				$sql = "INSERT INTO venda_item
		              (valbrtitm, valliqitm, valdesitm, valacritm, codven, codpro)
					   values
			   		  (". $vlr. ", ". $liq. ", ". $des. ", 0, ". $ven. ", ". $cod. ")";;
				/*print_r($_POST);
				echo '<p><p><p>';
				print_r($sql);*/
				
				$sql = $conexao->prepare($sql);
				$sql->execute();
				
				if(!($sql->errorCode() == 0))
					break;
			}
			
			if($sql->errorCode() == 0)
				echo "Vendido com sucesso!";
				else
					echo 'erro: '. $sql->errorCode();
		}
					
	} else echo "Necessário informar ao menos um (1) item";
	
	
	function getLastCodVen(){
		global $conexao;
		
		$sql = "SELECT max(codven) as cod from venda";
		
		$sql = $conexao->prepare($sql);
		$sql->execute();
		$sql = $sql->fetchAll(PDO::FETCH_BOTH);
		
		$cod = $sql[0]['cod'];
		return $cod; 
	}
?>