<?php
	//verificar se o login e senha sao validos
	require 'dao/usuario_dao.php';

	session_start();
	
	if (isset($_SESSION["usuario"])) unset($_SESSION["usuario"]);
	
	if(isset($_POST["login"]) && isset($_POST["senha"])){
		//verifica login
	$retorno = validaLogin($_POST["login"], $_POST["senha"]);
	if ($retorno){
		//cria sessao
		session_start();
		$_SESSION["usuario"] = $_POST["login"];
		header ("Location: index.php");
	} else {
		$mensagem = "Login e/ou senha inválidos! tente novamente";
	}
  }

?>

<html>
<head>
<title> Login:  </title>
</head>
</head>
<body>
 <div style="margin-right: auto; margin-left: auto; width: 200px">
<form method="POST" action="cadastro.php">
<label>Usuário:</label><input type="text" name="login" id="login"><br>
<label>Senha:</label><input type="password" name="senha" id="senha"><br>
<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
</form>
</body>
</html>