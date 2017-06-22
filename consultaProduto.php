<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Consulta de Produtos</title>
</head>
<body>
   	<div>
		<h3>Produto:</h3>
		<form action="" name="frmProduto" method="post">
			<input type="text" name= "cod" placeholder="Código do Produto" required="required" autofocus="autofocus" maxlength="18" style="width: 170px"/>		<p/>
			
			<p>
	       	<button name="btnConsultar" type="submit" style="width: 170px">Consultar</button>
	       	<button name="btnlimpar" type="reset" style="width: 170px">Limpar</button>
			
		</form>		
	</div>
</body>
</html>

<?php
	require 'db/conexao.php';
	global $conexao;
	
	if (isset($_POST) && isset($_POST["cod"])){ 
		$sql = 'SELECT destip, codtiptrs from TIPO_TRANSACIONADOR';
	
		$sql = $conexao->prepare("SELECT 
				codpro, nompro, fabpro, valcompro,
				valvenpro, perdespro, esppro,
				quapro,    td.desctabdes, tp.destabpre, c.descat, 
				datcadpro 
				from PRODUTO p
				inner join TABELA_DESCONTO td on td.codtabdes = p.codtabdes
				inner join TABELA_PRECO tp on tp.codtabpre = p.codtabpre
				inner join CATEGORIA c on c.codcat = p.codcat
				where codpro = ?");
		
		$sql->execute(array($_POST["cod"]));
		$s = $sql->fetchAll(PDO::FETCH_BOTH);
		
		echo '<table cellpadding=2 cellspacing=2 border=1>';
		
			if(count($s) > 0) {
				$s = $s[0]; 
				echo '<tr> <th> Nome </th>	                 <th> ' . $s["nompro"] . ' </th></tr>
					  <tr> <th> Fabricação </th>	         <th> ' . $s["fabpro"] . ' </th></tr>
					  <tr> <th> Valor de compra </th>	     <th> ' . $s["valcompro"] . ' </th></tr>
					  <tr> <th> Valor de venda </th>	     <th> ' . $s["valvenpro"] . ' </th></tr>
					  <tr> <th> Percentual de desconto </th> <th> ' . $s["perdespro"] . ' </th></tr>
					  <tr> <th> Especificação </th>          <th> ' . $s["esppro"] . ' </th></tr>
					  <tr> <th> Quantidade </th>	         <th> ' . $s["quapro"] . ' </th></tr>
					  <tr> <th> Tabela desconto </th>	     <th> ' . $s["desctabdes"] . ' </th></tr>
					  <tr> <th> Tabela de preço </th>	     <th> ' . $s["destabpre"] . ' </th></tr>
					  <tr> <th> Categoria </th>	             <th> ' . $s["descat"] . ' </th></tr>
					  <tr> <th> Data de cadastro </th>	     <th> ' . $s["datcadpro"] . ' </th></tr>';
				
			} else echo "Nenhum registro encontrado";
		
		echo '</table>';
	}
?>