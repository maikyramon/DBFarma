<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Cadastro de Usu�rio</title>
</head>
<body>
	<form action="processaUsuario.php" method="post">
	 	<h2>Cadastro de Usuário</h2> 
		<input type="text" name="log" placeholder="Nome Completo" required="required" autofocus="autofocus" maxlength="40" style="width: 170px"/><p/>
		<input type="text" name="nom" placeholder="Login"         required="required" autofocus="autofocus" maxlength="30" style="width: 170px"/><p/>
		<input type="text" name="sen" placeholder="Senha"         required="required" autofocus="autofocus" maxlength="40" style="width: 170px"/><p/>
		
		<button name="btnsalvar" type="submit" style="width: 170px">Salvar</button>
		<button name="btnlimpar" type="reset" style="width: 170px">Limpar</button>
	
	</form>
</body>
</html>
<?php


?>
