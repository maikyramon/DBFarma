<?php
require 'db/conexao.php';

global $conexao;

if (isset ( $_POST )) {
	if (validaCodFab($_POST["fab"])){
		$sql = "INSERT INTO PRODUTO
		       (NOMPRO,    FABPRO,    VALCOMPRO,
				VALVENPRO, PERDESPRO, ESPPRO,
				QUAPRO,    CODTABDES, CODTABPRE, CODCAT, 
				DATCADPRO)
				values
			   (:nom, :fab,	:com, 
				:ven, :des, :esp, 
				:qua, :tbd, :tbp, :cat,
				current_timestamp)";
		
		print_r($_POST);
		
		$sql = $conexao->prepare($sql);
		
		$sql->bindParam(':nom', $_POST["nom"], PDO::PARAM_STR);
		$sql->bindParam(':fab', $_POST["fab"], PDO::PARAM_STR);
		$sql->bindParam(':com', $_POST["com"], PDO::PARAM_STR);
		$sql->bindParam(':ven', $_POST["ven"], PDO::PARAM_STR);
		$sql->bindParam(':des', $_POST["des"], PDO::PARAM_STR);
		$sql->bindParam(':esp', $_POST["esp"], PDO::PARAM_STR);
		$sql->bindParam(':qua', $_POST["qua"], PDO::PARAM_STR);
		$sql->bindParam(':tbd', $_POST["tbd"], PDO::PARAM_STR);
		$sql->bindParam(':tbp', $_POST["tbp"], PDO::PARAM_STR);
		$sql->bindParam(':cat', $_POST["cat"], PDO::PARAM_INT);

		$sql->execute();
		
		if($sql->errorCode() == 0)
			echo "Cadastrado com sucesso!";
		else
			echo "Ocorreu um erro ao cadastrar = ". $sql->errorCode();
				
	} else echo "Há um produto já cadastrado com este código de fabricação";
}

function validaCodFab($fab){
	global $conexao;
	
	$sql = 'SELECT count(fabpro) as conta from PRODUTO where fabpro = ?';
	$sql = $conexao->prepare($sql);
	$sql->execute(array($fab));
	$sql = $sql->fetch(PDO::FETCH_BOTH);
	
	return !($sql['conta'] > 0);
}
?>