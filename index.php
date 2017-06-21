<?php
require 'sessao.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Tela Principal</title>
</head>
<body>
	<h1>DBFarma</h1>
	<form name ="frmPrincipal" method ="POST">
	<input onclick="location.href='cadastroTransicionador.php'" type="button" value="Cadastro de Transacionador"></input>
	<input onclick="location.href='cadastroProduto.php'" type="button" value="Cadastro de Produto"></input>
	<input onclick="location.href='venda.php'" type="button" value="Venda"></input>
	
	<p><p>
	<h2>Relatórios</h2>
	<input type="radio" name="chk" value="1" />Relatorio 1<br />
	<input type="radio" name="chk" value="2" />Relatorio 2<br />
	<input type="radio" name="chk" value="3" />Relatorio 3<br />
	<input type="radio" name="chk" value="4" />Relatorio 4<br />
	
	<p><p>
	<button name = "send" type = "submit">Enviar</button>
	</form>
</body>
</html>

<?php
	require 'db/conexao.php';

	if(isset($_POST) && isset($_POST["chk"])){
		$chk = $_POST["chk"];
		
		switch ($chk){
			case "1": emitirRelatorio1();
			break;
			case "2": emitirRelatorio2();
			break;
			case "3": emitirRelatorio3();
			break;
			case "4": emitirRelatorio4();
			break;
		}
	}
	
	function emitirRelatorio1(){
		global $conexao;
		$sql = 'SELECT t.cgctrs, t.nomtrs, t.datcadtrs FROM TRANSACIONADOR t
                        inner join TRANSACIONADOR_TIPO p on t.codtip = p.codtip
						where t.sextrs = "F" and
							  p.tiptrs = "C"
						ORDER BY nomtrs';
		
		$sql = $conexao->prepare($sql);
		$sql->execute();
		$sql = $sql->fetchAll(PDO::FETCH_BOTH);
		
		echo '<table cellpadding=2 cellspacing=2 border=1>
		      <tr>
		      <th> Código transacionador </th>
		      <th> Nome transacionador </th>
		      <th> Data de cadastro </th>';
			
		foreach ($sql as $s) {
			echo
				'<th>'. $s['cgctrs'].    '</th>'
		      . '<th>'. $s['nomtrs'].    '</th>'
			  . '<th>'. $s['datcadtrs']. '</th>';
		}
			
		echo '</tr></table>';
	}
	
	function emitirRelatorio2(){
		global $conexao;
		$sql = 'SELECT p.codpro, p.nompro, p.valvenpro FROM PRODUTO p
						inner join CATEGORIA c on p.codcat = c.codcat
						where extract(YEAR FROM datcadpro) = 2017 and
							  valvenpro > 100 and
							  c.tipcat = "FP"
						ORDER BY nompro asc';
		
		$sql = $conexao->prepare($sql);
		$sql->execute();
		$sql = $sql->fetchAll(PDO::FETCH_BOTH);
		
		echo '<table cellpadding=2 cellspacing=2 border=1>
		  	  <tr>
		      <th> Código Produto </th>
		   	  <th> Nome produto </th>
		      <th> Valor de venda</th>';
				
		foreach ($sql as $s) {
			echo 
			  '<th>'. $s['codpro'].    '</th>'
			. '<th>'. $s['nompro'].    '</th>'
			. '<th>'. $s['valvenpro']. '</th>';
		}
		
		echo '</tr></table>';
	}
	function emitirRelatorio3(){
		global $conexao;
		
		$sql = 'SELECT extract(MONTH FROM datven) as mes, count(*) as qtd, valtotven FROM VENDA v
						inner join VENDA_ITEM i on i.codven = v.codven
						inner join TRANSACIONADOR t on t.cgctrs = v.cgctrs
						where i.valdesitm > 0 and
							  extract(YEAR FROM v.datven) = 2016 and
							  sextrs = "F"';
		
		$sql = $conexao->prepare($sql);
		$sql->execute();
		$sql = $sql->fetchAll(PDO::FETCH_BOTH);
		
		echo '<table cellpadding=2 cellspacing=2 border=1>	
		      <tr>
		      <th> Mês da venda </th>
		      <th> Quantidade vendas </th>
		      <th> Valor total das vendas</th>';
		   		
		foreach ($sql as $s) {
			echo
		   	  '<th>'. $s['mes'].       '</th>'
			. '<th>'. $s['qtd'].       '</th>'
			. '<th>'. $s['valtotven']. '</th>';
		}
		   		
		echo '</tr></table>';
	}
	
	function emitirRelatorio4(){
		global $conexao;
		$sql = 'SELECT t.cgctrs, v.codven, v.datven, v.valtotven FROM VENDA v
						inner join TRANSACIONADOR t on t.cgctrs = v.cgctrs
						where (t.cidtrs like ("MARAVILHA") or
							   t.cidtrs like ("DESCANÇO")) and
							  (extract(MONTH FROM v.datven) % 2 = 0)
						ORDER BY datven desc';
		
		$sql = $conexao->prepare($sql);
		$sql->execute();
		$sql = $sql->fetchAll(PDO::FETCH_BOTH);
		
		echo '<table cellpadding=2 cellspacing=2 border=1> 
			  <tr>
		      <th> Código cliente </th>
			  <th> Código da venda </th>
		      <th> Data da venda </th>
		      <th> Valor total da venda</th>';
		
		foreach ($sql as $s) {
		   	echo
		   	  '<th>'. $s['cgctrs'].    '</th>'
		   	. '<th>'. $s['codven'].    '</th>'
			. '<th>'. $s['datven'].    '</th>'
			. '<th>'. $s['valtotven']. '</th>';
		}
		   		
		echo '</tr></table>';
	}
?>