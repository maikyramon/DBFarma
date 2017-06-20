<?php
require 'db/conexao.php';

global $conexao;

if (isset ( $_POST )) {
	if (validaLogin($_POST['log'])){
		$sql = "INSERT INTO USUARIO
		       (NOMUSR,	LOGUSR, SENUSR)
				values
			   (:nom, :log, :sen)";
		
		$sql = $conexao->prepare($sql);
		
		$sql->bindParam(':cgc', $_POST['cod'], PDO::PARAM_STR);
		$sql->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
		$sql->bindParam(':sex', $_POST['log'], PDO::PARAM_STR);
		$sql->bindParam(':raz', $_POST['sen'], PDO::PARAM_STR);
		
		$sql->execute();
	} else echo "Há um transacionador já cadastrado com este CGC";
}

function validaLogin($log){
	$sql = 'SELECT logusr from USUARIO where logusr = :log';
	$sql = $conexao->prepare($sql);
	$sql = $sql->fetch(PDO::FETCH_ASSOC);
	
	$b = false;
	
	if (isset($sql))
		$b = true;
		
	return $b;
}
?>