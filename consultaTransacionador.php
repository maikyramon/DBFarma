<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Cadastro de Transicionador</title>
</head>
<body>
   	<div>
		<h3 >Transicionador:</h3>
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
	
	if (isset($_POST) && isset($_POST["cgc"])){ 
		$sql = 'SELECT destip, codtiptrs from TIPO_TRANSACIONADOR';
	
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
		$s = $sql->fetchAll(PDO::FETCH_BOTH);
		
		echo '<table cellpadding=2 cellspacing=2 border=1 >';
			if(count($s) > 0) {
				$s = $s[0];
				echo '<tr> <th> CPF/CNPJ </th>	         <th> ' . $s["cgctrs"] . ' </th> </tr>
					  <tr> <th> RG </th>	             <th> ' . $s["rgtrs"] . ' </th> </tr>
					  <tr> <th> Nome </th>	             <th> ' . $s["nomtrs"] . ' </th></tr>
					  <tr> <th> Sexo </th>	             <th> ' . $s["sextrs"] . ' </th></tr>
					  <tr> <th> Razão Social </th>	     <th> ' . $s["razsoctrs"] . ' </th></tr>
					  <tr> <th> Nome Fantasia </th>	     <th> ' . $s["nomfantrs"] . ' </th></tr>
					  <tr> <th> Data nasc/fundação </th> <th> ' . $s["datnasfuntrs"] . ' </th></tr>
					  <tr> <th> Data cadastro </th>	     <th> ' . $s["datcadtrs"] . ' </th></tr>
					  <tr> <th> Telefone </th>	         <th> ' . $s["teltrs"] . ' </th></tr>
					  <tr> <th> Celular </th>	         <th> ' . $s["celtrs"] . ' </th></tr>
					  <tr> <th> E-mail </th>	         <th> ' . $s["ematrs"] . ' </th></tr>
					  <tr> <th> Endereço </th>	         <th> ' . $s["endtrs"] . ' </th></tr>
					  <tr> <th> Cidade </th>	         <th> ' . $s["cidtrs"] . ' </th></tr>
					 '// <tr> <th> Logradouro </th>	     <th> ' . $s["logtrs"] . ' </th></tr>
				   .' <tr> <th> Inscrição Estadual </th> <th> ' . $s["insesttrs"] . ' </th>	</tr>			   
					  <tr> <th> Tipo cliente </th>	     <th> ' . $s["dsctip"] . ' </th> </tr>';
				
			} else echo "Nenhum registro encontrado";
		
		
		echo '</table></div>';
	}
?>