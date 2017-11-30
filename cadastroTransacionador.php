	<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Cadastro de Transicionador</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

</head>
<body>
  
<?php  if(isset($msg)) echo "<h3>" . $msg . "</h3>";
	include('menu.php');
?>

 	<div style="margin-left: 100px; margin-top: 100px">
		<h3 align="center">Transicionador:</h3>
		<form action="processaTransacionador.php" name="frmTransacionador" method="post">
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
			<!--<input type="text"   name= "restrs"       placeholder="Informe o responsável pela farmácia" required="required" maxlength="20" style="width: 170px"/>		<p/>-->
			<input type="text"   name= "ins" placeholder="Digite a Inscrição Estadual"         required="required" maxlength="60" style="width: 170px"/><p/> 
			<input type="text"   name= "rgt" placeholder="Digite o RG"                         required="required" maxlength="20" style="width: 170px"/><p/>
			
			<label>Selecione o tipo de transacionador</label>
			<select name="ctt" style="width: 170px">
				<?php
					require 'db/conexao.php';
					global $conexao;
					
					$sql = 'SELECT destip, codtiptrs from TIPO_TRANSACIONADOR';
				
					$sql = $conexao->prepare("SELECT dsctip, codtiptrs from TIPO_TRANSACIONADOR");
					$sql->execute();
					$sql = $sql->fetchAll(PDO::FETCH_BOTH);
					
					foreach ($sql as $s){
						echo '<option value="'. $s['codtiptrs'] . '"> ' . $s['dsctip'] . '</option>';
					}
				?>
			</select>
			<p>
	       	<button name="btnsalvar" type="submit" style="width: 170px">Salvar</button>
	       	<button name="btnlimpar" type="reset" style="width: 170px">Limpar</button>
			
		</form>		
	</div>
</body>
</html>