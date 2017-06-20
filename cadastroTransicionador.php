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
	<form action="processarTransacionador.php" name="frmtransicionador" method="post">
		<input type="hidden" name= "op"  value="I" /> 
		<input type="text"   name= "cgc" placeholder="Digite o CPF/CNPJ"                   required="required" autofocus="autofocus" maxlength="18" style="width: 170px"/>		<p/>
		<input type="text"   name= "nom" placeholder="Digite o nome"                       required="required" maxlength="60" style="width: 170px"/>		<p/>
		<input type="radio"  name= "sex" value ="F" /> Feminino &nbsp;&nbsp; <p/> 
		<input type="radio"  name= "sex" value ="M" /> Masculino <p />
		<input type="text"   name= "raz" placeholder="Digite a Razão Social"               required="required" maxlength="30" style="width: 170px"/><p/>
		<input type="text"   name= "fan" placeholder="Digite o Nome Fantasia"              required="required" maxlength="30" style="width: 170px"/><p/>
		<input type="date"   name= "nas" placeholder="Digite a Data de Nascimento"         required="required"                style="width: 170px"/><p/>
		<input type="text"   name= "tel" placeholder="Digite o Número do Telefone Fixo"    required="required" maxlength="20" style="width: 170px"/><p/>
		<input type="text"   name= "cel" placeholder="Digite o Número do Telefone Celular" required="required" maxlength="20" style="width: 170px"/><p/>
		<input type="text"   name= "ema" placeholder="Digite o E-mail"                     required="required" maxlength="30" style="width: 170px"/><p/>
		<input type="text"   name= "end" placeholder="Digite o Endereço"                   required="required" maxlength="30" style="width: 170px"/><p/>
		<input type="text"   name= "cid" placeholder="Digite a Cidade"                     required="required"                style="width: 170px"/><p/>
		<input type="text"   name= "cid" placeholder="Digite a Logradouro"                 required="required"                style="width: 170px"/><p/>
		<!--<input type="text"   name= "restrs"       placeholder="Informe o responsável pela farmácia" required="required" maxlength="20" style="width: 170px"/>		<p/>-->
		<input type="text"   name= "ins" placeholder="Digite a Inscrição Estadual"         required="required" maxlength="60" style="width: 170px"/><p/> 
		<input type="text"   name= "rgt" placeholder="Digite o RG"                         required="required" maxlength="20" style="width: 170px"/><p/>
		
		<label>Selecione o tipo de transacionador</label>
		<select name=ctt style="width: 170px">
		<?php  
			$sql = 'SELECT destiptrs, tiptrs from TRANSACIONADOR_TIPO';
		
			$sql = $conexao->prepare($sql);
			$sql = $sql->fetch(PDO::FETCH_ASSOC);
			
			while ($sql){
				echo "<option value=\"". $sql['codtiptrs'] ."\">" . $sql['destiptrs'] . "</option>";
			}
		?>
		</select>		
		
        <p/>
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000000000" />
			<p/><p/>
			<button name="btnsalvar" type="submit" style="width: 170px">Salvar</button>
			<button name="btnlimpar" type="reset" style="width: 170px">Limpar</button>
		</form>		
	</div>
</body>
</html>