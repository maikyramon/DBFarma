<?php
require 'db/conexao.php';

// funчуo que retorna se o login щ valido
function validaLogin($login, $senha){
	global $conexao;
	//preparando o comando
	$comando = $conexao->prepare("SELECT count(*) AS conta FROM usuario WHERE logusu = ? AND senusu = ?");
	
	$comando->execute(array($login, md5($senha)));
	// descarregamos o retorno
	$retorno = $comando->fetch(PDO::FETCH_ASSOC);
	
	//verifica se encontrou o login e senha
	if ($retorno["conta"] > 0) return true;
	
	return false;
}

?>