<?php

//inicia a sessÃ£o
session_start();
// se nao estiver iniciando o array da sessao e nao houver informação
//do usuario logado redireciona para o login
if ((!isset($_SESSION)) || (!isset($_SESSION["usuario"]))){
	// comando de redirecionamento (forÃ§ado)
	header("Location: login.php");
}

?>
