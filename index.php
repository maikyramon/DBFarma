<?php
require 'sessao.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Tela Principal</title>
</head>
<body>
	<h1>DBFarma</h1>
	<form name ="frmcontato" method ="POST">
	<button name = "send" type = "submit">Enviar</button>
	<button name = "clean" type = "reset">Limpar</button>
	
	<p><p>
	<h2>Relatórios</h2>
	<input type="radio" name="chk" value="1" />Relatorio 1<br />
	<input type="radio" name="chk" value="2" />Relatorio 2<br />
	<input type="radio" name="chk" value="3" />Relatorio 3<br />
	<input type="radio" name="chk" value="4" />Relatorio 4<br />
	
	<p><p>
	<button name = "send" type = "submit">Enviar</button>
	<p>
	<a href="cadastroUsuario.php">Cadastrar-se</a>
	</form>
</body>
</html>

<?php
	if(isset($_POST) && isset($_POST["chk"])){
		$chk = $_POST["chk"];
		
		switch ($chk){
			case "1": $sql = 'SELECT name, color, calories FROM fruit ORDER BY name';; 
			break;
			case "2": $sql = 'SELECT name, color, calories FROM fruit ORDER BY name';;
			break;
			case "3": $sql = 'SELECT name, color, calories FROM fruit ORDER BY name';;
			break;
			case "4": $sql = 'SELECT name, color, calories FROM fruit ORDER BY name';;
			break;
			
			foreach ($conn->query($sql) as $row) {
				
			}
		}
	}
?>