<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Consulta de Produtos</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php include('menu.php');?>
   	<div style="margin-left: 100px; margin-top:100px">
		<h3>Produto:</h3>
		<br>
		<a class="btn btn-secondary" height="20px" title="Adicionar Produto" href="cadastroProduto.php">
                Cadastrar
            </a>
            <br>
            <br>
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
	
	if (isset($_POST["cod"])){ 
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
	} else {

		$sql = 'SELECT destip, codtiptrs from TIPO_TRANSACIONADOR';
	
		$sql = $conexao->prepare("SELECT 
				codpro, nompro, fabpro, valcompro,
				valvenpro, perdespro, esppro,
				quapro,    td.desctabdes, tp.destabpre, c.descat, 
				datcadpro 
				from PRODUTO p
				inner join TABELA_DESCONTO td on td.codtabdes = p.codtabdes
				inner join TABELA_PRECO tp on tp.codtabpre = p.codtabpre
				inner join CATEGORIA c on c.codcat = p.codcat");
			$sql->execute();
		}
		

		$s = $sql->fetchAll(PDO::FETCH_BOTH);
		
		echo '<br><br><div style="margin-left: 100px"><table class="table table-bordered table-striped table-responsive">';
			
	        if(count($s) > 0) {
	        	echo '	<thead>
                        <tr>
							<th></th>
							<th> Nome </th>	               
							<th> Fabricação </th>	         
							<th> Valor de compra </th>	    
							<th> Valor de venda </th>	     
							<th> Percentual de desconto </th>
							<th> Especificação </th>       
							<th> Quantidade </th>	         
							<th> Tabela desconto </th>	    
							<th> Tabela de preço </th>	    
							<th> Categoria </th>	          
							<th> Data de cadastro </th>	   
						</tr>
	                </thead>
	                <tbody>';

				foreach ($s as $i => $row) {
					echo '<tr>
		                    <th scope="row"></th>
								<td> ' . $row["nompro"] . ' </td>
								<td> ' . $row["fabpro"] . ' </td>
								<td> ' . $row["valcompro"] . ' </td>
								<td> ' . $row["valvenpro"] . ' </td>
								<td> ' . $row["perdespro"] . ' </td>
								<td> ' . $row["esppro"] . ' </td>
								<td> ' . $row["quapro"] . ' </td>
								<td> ' . $row["desctabdes"] . ' </td>
								<td> ' . $row["destabpre"] . ' </td>
								<td> ' . $row["descat"] . ' </td>
								<td> ' . $row["datcadpro"] . ' </td>
							</tr>';
				} 
				echo '</tbody></table>';
			}else echo "Nenhum registro encontrado";
		
?>
			