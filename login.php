<?php
require 'dao/usuario_dao.php';

session_start();

// detroi a sessao se existir
if (isset($_SESSION["usuario"])) unset($_SESSION["usuario"]);

if(isset($_POST["login"]) && isset($_POST["senha"])){
	//verifica o login
	$retorno = validaLogin($_POST["login"], $_POST["senha"]);
	if ($retorno){
		session_start();
		$_SESSION["usuario"] = $_POST["login"];
		header("Location: index.php");
	}else {
		$mensagem = "Login Inválido !";
	}
}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>LOGIN</title>
</head>
<body>
	<h3></h3>
	<div style="margin-top: 150px; margin-right: auto; margin-left: auto; width: 200px">
	
	<?php if(isset($mensagem)) echo "<h3>" . $mensagem . "</h3>"; ?>
	
	<form action="" name="frmlogin" method="post">
	<input type="text" name="login" required="required" maxlength="20" autofocus="autofocus"
	placeholder="LOGIN"/>
	<p/>
	<input type="password" name="senha" required="required" maxlength="20" placeholder="SENHA" />
	<p/>
	<button name="btnAcessar" type="submit">Login</button>
	&nbsp;
	<button name="btnLimpar" type="reset">Outro Usuario</button>
	<p/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="registrar.php">Registrar-se</a>
	</form>
	</div>
</body>
</html>