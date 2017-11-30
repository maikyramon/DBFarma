<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php include('menu.php');?>
   	<div style="margin-left: 100px; margin-top:100px">
		<?php
		require 'db/conexao.php';

		global $conexao;

		if (isset ( $_POST )) {
			if (validaCodFab($_POST["fab"])){
				$sql = "SELECT ins_prod(:nom, :fab,	:com, :ven, :des, :esp, :qua, :tbd, :tbp, :cat);";
				
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
				$sql->bindParam(':cat', $_POST["cat"], PDO::PARAM_STR);

				$sql->execute();
				
				if($sql->errorCode() == 0)
					echo 'Cadastrado com sucesso. <br><br><a class="btn btn-secondary" height="20px" href="cadastroTransacionador.php"> Voltar </a>';
				else
					echo 'Erro ao inserir dados ('.$sql->errorCode().'), tente novamente. <br><br><a class="btn btn-secondary" href="javascript:history.go(-1)"> Tentar Novamente </a>';
				
			} else echo 'Há um produto já cadastrado com este código de fabricação. <br><br><a class="btn btn-secondary" href="javascript:history.go(-1)"> Tentar Novamente </a>';
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
</div>
</body>
</html>