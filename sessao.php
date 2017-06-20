<?php

//inicia a sessão
session_start();
// se nao estiver iniciando o array da sessao e nao houver informa��o
//do usuario logado redireciona para o login
if ((!isset($_SESSION)) || (!isset($_SESSION["usuario"]))){
	// comando de redirecionamento (forçado)
	header("Location: login.php");
}

?>
