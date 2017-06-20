<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Cadastro de Produto</title>
</head>
<body>
  
 <div style="margin-right: auto; margin-left: auto; width: 165px">
		<h3 align="center">Produto:</h3>

		<form action="" name="frmcadastroproduto" method="post">
		<input type="hidden" name="op" value="I" /> 

		
		<input type="text"name="codpro" placeholder="Código do Produto" required="required"autofocus="autofocus"style="width: 170px/>
		<p />
		<input type="text" name="nompro" placeholder="Nome do Produto" required="required" maxlength="20" style="width: 170px/>
		<p />
		<input type="text" name="fabpro" required="required"placeholder="Nome do Fabricante do Produto"autofocus="autofocus"style="width: 170px" />
		<p />
		<input type="number" step='any'name="valcompro" placeholder="Valor de Compra do Produto" required="required"autofocus="autofocus"style="width: 170px/>
		<p />
		<input type="number" step='any'name="valvenpro" placeholder="Valor de Venda do Produto" required="required"autofocus="autofocus" style="width: 170px/>
		<p />
		<input type="text"name="perdespro" placeholder="Percentual de desconto do Produto" required="required"autofocus="autofocus"style="width: 170px/>
		<p />
		<input type="text"name="esppro" placeholder="Especificação do Produto" required="required"autofocus="autofocus" maxlenght="20" style="width: 170px/>
		<p />
		<input type="text"name="quapro" placeholder="Quantidade de compra do produto" required="required"autofocus="autofocus"style="width: 170px/>
		<p />
		<input type="date"name="datcadpro" placeholder="Digite a data de cadastro no sistema" required="required"autofocus="autofocus"style="width: 170px/>
		<p />
		<input type="text"name="codtabdes" placeholder="Código da tabela de desconto" required="required"autofocus="autofocus" style="width: 170px/>
		<p />
		<input type="radio"  name= "codcat" value ="A" /> Antibióticos &nbsp;&nbsp; <p/> 
		<input type="radio"  name= "codcat" value ="C" /> Controlados &nbsp;&nbsp; <p/>
		<input type="radio"  name= "codcat" value ="H" /> Higiene &nbsp;&nbsp; <p/>
		<input type="radio"  name= "codcat" value ="O" /> Outros &nbsp;&nbsp; <p/>   
		<input type="radio"  name= "codcat" value ="G" /> Genérico <p />
		
		<input type="text"name="codtabpre" placeholder="Código da tabela de preço" required="required"autofocus="autofocus"style="width: 170px/>
		
			<p />
			<p />
			<button name="btnsalvar" type="submit" style="width: 170px">Salvar</button>
			<button name="btnlimpar" type="reset" style="width: 170px">Limpar</button>
		</form>
</body>
</html>