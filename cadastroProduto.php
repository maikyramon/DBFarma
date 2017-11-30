<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Cadastro de Produto</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <?php include('menu.php');?>
	<div style="margin-top: 100px; margin-left: 100px;" >
		<h3> Produto: </h3>
	
		<form action="processaProduto.php" name="frmCadastroProduto" method="post">
			<input type="text"   name="nom" placeholder="Nome do Produto"        required="required" style="width: 300px" maxlength="20" /><p>
			<input type="text"   name="fab" placeholder="Nome do Fabricante"     required="required" style="width: 300px" /><p>
			<input type="number" name="com" placeholder="Valor de Compra"        required="required" style="width: 300px" step='any' /><p>
			<input type="number" name="ven" placeholder="Valor de Venda"         required="required" style="width: 300px" step='any' /><p>
			<input type="text"   name="des" placeholder="Percentual de desconto" required="required" style="width: 300px" /><p>
			<input type="text"   name="esp" placeholder="Especificação"          required="required" style="width: 300px" maxlength="20" /><p>
			<input type="text"   name="qua" placeholder="Quantidade de compra"   required="required" style="width: 300px" /><p>
			<p>
			<label> Selecione a tabela de desconto </label> 
			<select name="tbd" style="width: 170px">
				<?php
					require 'db/conexao.php';
					global $conexao;
					
					$sql = $conexao->prepare("SELECT codtabdes, desctabdes from TABELA_DESCONTO");
					$sql->execute();
					$sql = $sql->fetchAll(PDO::FETCH_BOTH);
					
					foreach ($sql as $s){
						echo '<option value="'. $s['codtabdes'] . '"> ' . $s['desctabdes'] . '</option>';
					}
				?>
			</select>
			<p>
			<label> Selecione a tabela de preço </label>
			<select name="tbp" style="width: 170px">
				<?php
					require 'db/conexao.php';
					global $conexao;
					
					$sql = $conexao->prepare("SELECT codtabpre, destabpre from TABELA_PRECO");
					$sql->execute();
					$sql = $sql->fetchAll(PDO::FETCH_BOTH);
					
					foreach ($sql as $s){
						echo '<option value="'. $s['codtabpre'] . '"> ' . $s['destabpre'] . '</option>';
					}
				?>
			</select>
			<p>
			<label> Selecione a categoria </label>
			<select name="cat" style="width: 170px">
				<?php
					require 'db/conexao.php';
					global $conexao;
					
					$sql = $conexao->prepare("SELECT codcat, descat from CATEGORIA");
					$sql->execute();
					$sql = $sql->fetchAll(PDO::FETCH_BOTH);
					
					foreach ($sql as $s){
						
						echo '<option value='. $s['codcat'] . '> ' . $s['descat'] . '</option>';
					}
				?>
			</select>
			
			<p><p>
			
			<button name="btnsalvar" type="submit" style="width: 170px">Salvar</button>
			<button name="btnlimpar" type="reset" style="width: 170px">Limpar</button>
		</form>
	</div>
</body>
</html>