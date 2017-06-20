<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Cadastro de Transicionador</title>
</head>
<body>
  
<?php  if(isset($msg)) echo "<h3>" . $msg . "</h3>";?>
 <div style="margin-right: auto; margin-left: auto; width: 165px">
		<h3 align="center">Transicionador:</h3>

		<form action="" name="frmtransicionador" method="post">
		<input type="hidden" name="op" value="I" /> 
		
		
		<input type="text"name="cgctrs" placeholder="Digite o CPF/CNPJ" required="required"autofocus="autofocus" maxlenght="18" style="width: 170px/>
		<p />
		<input type="text" name="nomtrs" placeholder="Digite o nome" required="required" maxlength="60" style="width: 170px/>
		<p />
		<input type="text" name="razsoctrs" required="required"placeholder="Digite a Razão Social"autofocus="autofocus" maxlenght="30"style="width: 170px" />
		<p />
		<input type="text"name="nomfantrs" placeholder="Digite o Nome Fantasia" required="required"autofocus="autofocus" maxlenght="30" style="width: 170px/>
		<p />
		<input type="date"name="datnasfuntrs" placeholder="Digite a Data de Nascimento" required="required"autofocus="autofocus" style="width: 170px/>
		<p />
		<input type="text"name="teltrs" placeholder="Digite o Número do Telefone Fixo" required="required"autofocus="autofocus" maxlenght="20" style="width: 170px/>
		<p />
		<input type="text"name="celtrs" placeholder="Digite o Número do Telefone Celular" required="required"autofocus="autofocus" maxlenght="20" style="width: 170px/>
		<p />
		<input type="text"name="ematrs" placeholder="Digite o E-mail" required="required"autofocus="autofocus" maxlenght="30" style="width: 170px/>
		<p />
		<input type="text"name="endtrs" placeholder="Digite o Endereço" required="required"autofocus="autofocus" maxlenght="30" style="width: 170px/>
		<p />
		<input type="text"name="cidtrs" placeholder="Digite a Cidade" required="required"autofocus="autofocus" style="width: 170px/>
		<p />
		<input type="text"name="restrs" placeholder="Informe o responsável pela farmácia" required="required"autofocus="autofocus" maxlenght="20" style="width: 170px/>
		<p />
		<input type="text"name="insesttrs" placeholder="Digite a Inscrição Estadual" required="required"autofocus="autofocus" maxlenght="60" style="width: 170px/>
		<p />
		<input type="text"name="rgtrs" placeholder="Digite o RG" required="required"autofocus="autofocus" maxlenght="20" style="width: 170px/>
		<p />
		<input type="text"name="codtiptrs" placeholder="Digite o Código do Tipo do Transicionador" required="required"autofocus="autofocus" maxlenght="1" style="width: 170px/>
		<p />
		<input type="file" name="img" />
		<p />
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000000000" />
			<p />
			<p />
			<button name="btnsalvar" type="submit" style="width: 170px">Salvar</button>
			<button name="btnlimpar" type="reset" style="width: 170px">Limpar</button>
		</form>
</body>
</html>