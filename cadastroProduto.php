<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Cadastro de Produto</title>
</head>
<body>
  
	<div style="margin-right: auto; margin-left: auto; width: 165px">
		<h3 align="center">Produto:</h3>
	
		<form action="processaProduto.php" name="frmCadastroProduto" method="post">
			<input type="text"   name="cod" placeholder="Código do Produto"            required="required" style="width: 170px" autofocus="autofocus"/><p>
			<input type="text"   name="nom" placeholder="Nome do Produto"              required="required" style="width: 170px" maxlength="20"/><p>
			<input type="text"   name="fab" placeholder="Nome do Fabricante"           required="required" style="width: 170px" /><p>
			<input type="number" name="com" placeholder="Valor de Compra"              required="required" style="width: 170px" step='any'><p>
			<input type="number" name="ven" placeholder="Valor de Venda"               required="required" style="width: 170px" step='any' /><p>
			<input type="text"   name="des" placeholder="Percentual de desconto"       required="required" style="width: 170px" /><p>
			<input type="text"   name="esp" placeholder="Especificação"                required="required" style="width: 170px" maxlength="20" /><p>
			<input type="text"   name="qua" placeholder="Quantidade de compra"         required="required" style="width: 170px" /><p>

			<input type="text"   name="tbd" placeholder="Código da tabela de desconto" required="required" style="width: 170px" autofocus="autofocus" />		<p>
			<input type="text"   name="tbp" placeholder="Código da tabela de preço"    required="required" style="width: 170px/"><p>
			
			<input type="radio"  name="cat" value ="A" /> Antibióticos &nbsp;&nbsp; <p> 
			<input type="radio"  name="cat" value ="C" /> Controlados &nbsp;&nbsp; <p>
			<input type="radio"  name="cat" value ="H" /> Higiene &nbsp;&nbsp; <p>
			<input type="radio"  name="cat" value ="O" /> Outros &nbsp;&nbsp; <p>   
			<input type="radio"  name="cat" value ="G" /> Genérico <p><p>
			
			<button name="btnsalvar" type="submit" style="width: 170px">Salvar</button>
			<button name="btnlimpar" type="reset" style="width: 170px">Limpar</button>
		</form>
	</div>
</body>
</html>