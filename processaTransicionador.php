<?php
require 'db/conexao.php';

global $conexao;

if (isset ( $_POST )) {
	$cgc = $_POST["cgc"];
	$nom = $_POST["nom"];
	$sex = $_POST["sex"];
	$raz = $_POST["raz"];
	$fan = $_POST["nom"];
	$nas = $_POST["nas"];
	$cad = $_POST["cad"];
	$tel = $_POST["tel"];
	$cel = $_POST["cel"];
	$ema = $_POST["ema"];
	$end = $_POST["end"];
	$cid = $_POST["cid"];
	$ins = $_POST["ins"];
	$rgt = $_POST["rgt"];
	$ctt = $_POST["ctt"];
	
	if (validaCgc($cgc)){
		$sql = "INSERT INTO TRANSACIONADOR 
		       (CGCTRS,	   NOMTRS, SEXTRS
				RAZSOCTRS, NOMFANTRS, DATNASFUNTRS, DATCADTRS, 
				TELTRS,    CELTRS, EMATRS,    
				ENDTRS,    CIDTRS, LOGTRS,    
			    INSESTTRS, RGTRS, CODTIPTRS)
				values 
			   (:cgc, :nom, :sex,			
				:raz, :fan, :nas, current_timestamp, 
				:tel, :cel, :ema, 
				:end, :cid,	:log, 
				:ins, :rgt, :ctt)";
	
		$sql = $conexao->prepare($sql);
		
		$sql->bindParam(':cgc', $_POST['cgc'], PDO::PARAM_STR);
		$sql->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
		$sql->bindParam(':sex', $_POST['sex'], PDO::PARAM_STR);
		$sql->bindParam(':raz', $_POST['raz'], PDO::PARAM_STR);
		$sql->bindParam(':fan', $_POST['fan'], PDO::PARAM_STR);
		$sql->bindParam(':nas', $_POST['nas'], PDO::PARAM_STR);
		$sql->bindParam(':tel', $_POST['tel'], PDO::PARAM_STR);
		$sql->bindParam(':cel', $_POST['cel'], PDO::PARAM_STR);
		$sql->bindParam(':ema', $_POST['ema'], PDO::PARAM_STR);
		$sql->bindParam(':end', $_POST['end'], PDO::PARAM_STR);
		$sql->bindParam(':cid', $_POST['cid'], PDO::PARAM_STR);
		$sql->bindParam(':log', $_POST['log'], PDO::PARAM_STR);
		$sql->bindParam(':ins', $_POST['ins'], PDO::PARAM_STR);
		$sql->bindParam(':rgt', $_POST['rgt'], PDO::PARAM_STR);
		$sql->bindParam(':ctt', $_POST['ctt'], PDO::PARAM_STR);
		
		$sql->execute();
	}
}

function validaCgc($cgc){
	$sql = 'SELECT cgctrs from TRANSACIONADOR where cgctrs = :cgc';
	$sql = $conexao->prepare($sql);
	$sql = $sql->fetch(PDO::FETCH_ASSOC);
	
	$b = false;
	
	if (isset($sql))
		$b = true;
	
	return $b;
}
?>