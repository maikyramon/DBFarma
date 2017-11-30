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
			if (validaCgc($_POST["cgc"])){
				$sql = "SELECT INS_TRANS (:cgc, :nom, :sex, :raz, :fan, :nas, :tel, :cel, :ema, :end, :cid, :ins, :rgt, :ctt)";
			
				$sql = $conexao->prepare($sql);
				
				$sql->bindParam(':cgc', $_POST['cgc'], PDO::PARAM_STR);
				$sql->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
				$sql->bindParam(':sex', $_POST['sex'], PDO::PARAM_STR);
				$sql->bindParam(':raz', $_POST['raz'], PDO::PARAM_STR);
				$sql->bindParam(':fan', $_POST['fan'], PDO::PARAM_STR);
				$sql->bindParam(':nas', $_POST['nas'], PDO::PARAM_STR);
				$sql->bindParam(':tel', $_POST['tel'], PDO::PARAM_STR);
				$sql->bindParam(':cel', $_POST['cel'], PDO::PARAM_STR);
				$sql->bindParam(':ema', $_POST['ema'], PDO::PARAM_STR);
				$sql->bindParam(':end', $_POST['end'], PDO::PARAM_STR);
				$sql->bindParam(':cid', $_POST['cid'], PDO::PARAM_STR);
				$sql->bindParam(':ins', $_POST['ins'], PDO::PARAM_STR);
				$sql->bindParam(':rgt', $_POST['rgt'], PDO::PARAM_STR);
				$sql->bindParam(':ctt', $_POST['ctt'], PDO::PARAM_STR);
				
				$sql->execute();
				
				if($sql->errorCode() == 0)
					echo 'Cadastrado com sucesso. <br><br><a class="btn btn-secondary" height="20px" href="cadastroTransacionador.php"> Voltar </a>';
				else
					echo 'Erro ao inserir dados ('.$sql->errorCode().'), tente novamente. <br><br><a class="btn btn-secondary" href="javascript:history.go(-1)"> Tentar Novamente </a>';
				
			} else echo 'Há um transacionador já cadastrado com este CGC. <br><br><a class="btn btn-secondary" href="javascript:history.go(-1)"> Tentar Novamente </a>';
		}

		function validaCgc($cgc){
			global $conexao;
			
			$sql = 'SELECT count(cgctrs) as conta from TRANSACIONADOR where cgctrs = ?';
			$sql = $conexao->prepare($sql);
			$sql->execute(array($cgc));
			$sql = $sql->fetch(PDO::FETCH_BOTH);
			
			return !($sql['conta'] > 0);
		}
		?>

</div>
</body>
</html>