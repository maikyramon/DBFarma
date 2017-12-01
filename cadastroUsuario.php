<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Cadastro de Usuário</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div style="margin-top: 100px; margin-left: 100px;>
	<form action="processaUsuario.php" name="frmcadusuario" method="post">
	 	<h2>Cadastro de Usuário</h2> 
		<input type="text" name="nom" placeholder="Nome Completo" required="required" autofocus="autofocus" maxlength="40" style="width: 350px"/><p/><p/>
		<input type="text" name="log" placeholder="Login"         required="required" autofocus="autofocus" maxlength="30" style="width: 350px"/><p/>
		<input type="text" name="sen" placeholder="Senha"         required="required" autofocus="autofocus" maxlength="40" style="width: 350px"/><p/>
		
		<button name="btnsalvar" type="submit" style="width: 175px">Salvar</button>
		<button name="btnlimpar" type="reset" style="width: 175px">Limpar</button>
	
	</form>
</div>
</body>
</html>
<?php


?>
