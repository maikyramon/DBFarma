<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Cadastro de Transicionador</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php include('menu.php');?>
   	<div style="margin-left: 100px; margin-top:100px">
		<h3 >Transicionador:</h3>
		<br>
		<a class="btn btn-secondary" height="20px" title="Adicionar Transacionador" href="cadastroTransacionador.php">
                Cadastrar
            </a>
            <br>
            <br>
		<form action="" name="frmTransacionador" method="post">
			<input type="text" name= "cgc" placeholder="Digite o CPF/CNPJ" required="required" autofocus="autofocus" maxlength="18" style="width: 170px"/>		<p/>
			
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
	
	if (isset($_POST["cgc"])){ 
		$sql = $conexao->prepare("SELECT 
				CGCTRS,    NOMTRS,    SEXTRS,
				RAZSOCTRS, NOMFANTRS, DATNASFUNTRS, DATCADTRS, 
				TELTRS,    CELTRS,    EMATRS,    
				ENDTRS,    CIDTRS,    LOGTRS,    
			    INSESTTRS, RGTRS,     p.DSCTIP 
				from TRANSACIONADOR t
				inner join TIPO_TRANSACIONADOR p on p.codtiptrs = t.codtiptrs
				where cgctrs = ?");
		$sql->execute(array($_POST["cgc"]));
	} else {
		$sql = $conexao->prepare("SELECT 
				CGCTRS,    NOMTRS,    SEXTRS,
				RAZSOCTRS, NOMFANTRS, DATNASFUNTRS, DATCADTRS, 
				TELTRS,    CELTRS,    EMATRS,    
				ENDTRS,    CIDTRS,    LOGTRS,    
			    INSESTTRS, RGTRS,     p.DSCTIP 
				from TRANSACIONADOR t
				inner join TIPO_TRANSACIONADOR p on p.codtiptrs = t.codtiptrs");
		$sql->execute();
	}


		$s = $sql->fetchAll(PDO::FETCH_BOTH);

		echo '<br><br><table class="table table-bordered table-striped table-responsive">';
			if(count($s) > 0) {

				echo '<thead>
                        <tr>
                        	<th></th>	
                            <th> CPF/CNPJ </th>	       
							<th> RG </th>	             
							<th> Nome </th>	           
							<th> Sexo </th>	           
							<th> Razão Social </th>	   
							<th> Nome Fantasia </th>	  
							<th> Data nasc/fundação </th>
							<th> Data cadastro </th>	  
							<th> Telefone </th>	       
							<th> Celular </th>	        
							<th> E-mail </th>	         
							<th> Endereço </th>	       
							<th> Cidade </th>	         
							<th> Inscrição Est. </th>
							<th> Tipo Trans. </th>
                        </tr>
                    </thead>
                    <tbody>';

				foreach ($s as $i => $row){
					echo	'<tr>
	                            <th scope="row"></th>
	                            
	                            <td>'. $row["cgctrs"] . ' </td>	      
								<td>'. $row["rgtrs"] . ' </td>	            
								<td>'. $row["nomtrs"] . ' </td>	          
								<td>'. $row["sextrs"] . ' </td>	          
								<td>'. $row["razsoctrs"] . '  </td>	  
								<td>'. $row["nomfantrs"] . ' </td>	 
								<td>'. $row["datnasfuntrs"].' </td>
								<td>'. $row["datcadtrs"] . ' </td>	 
								<td>'. $row["teltrs"] . '  </td>	      
								<td>'. $row["celtrs"] . '  </td>	       
								<td>'. $row["ematrs"] . '  </td>	        
								<td>'. $row["endtrs"] . '  </td>	      
								<td>'. $row["cidtrs"] . '  </td>	        
								<td>'. $row["insesttrs"] . ' </td>
								<td>'. $row["dsctip"] . ' </td>	  
	                            
	                        </tr>';
				}	
				echo '</tbody></table>';
			} else echo "Nenhum registro encontrado";
		
		
	
?>