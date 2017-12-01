<?php
require 'db/conexao.php';

global $conexao;

if (isset ( $_POST )) {
	if (validaLogin($_POST['log'])){

		$sql = "INSERT INTO USUARIO
		       (NOMUSU,	LOGUSU, SENUSU)
				values
			   (:nom, :log, :sen)";
		
		$sql = $conexao->prepare($sql);
		
		$sen = md5($_POST['sen']);
		
		$sql->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
		$sql->bindParam(':log', $_POST['log'], PDO::PARAM_STR);
		$sql->bindParam(':sen', $sen, PDO::PARAM_STR);
		
		$sql->execute();
		
		if ($sql->errorCode() == 0)
			echo "Cadastrado com sucesso!";
		
	} else echo "Login ja utilizado";
} else echo  "Login ja utilizado";

function validaLogin($log){
	global $conexao;

	$sql = $conexao->prepare("SELECT count(*) AS conta FROM usuario WHERE logusu = ?");	
	$sql->execute(array($log));
	$sql = $sql->fetch(PDO::FETCH_ASSOC);
		
	return !($sql["conta"] > 0);
}
?>