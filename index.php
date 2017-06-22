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
	<h2>Cadastros</h2>
	<form name ="frmPrincipal" method ="POST">
	<input onclick="location.href='cadastroTransacionador.php'" type="button" value="Cadastro de Transacionador"></input>
	<input onclick="location.href='cadastroProduto.php'" type="button" value="Cadastro de Produto"></input>
	<input onclick="location.href='venda.php'" type="button" value="Venda"></input>
	
	<p><p>
	<h2>Consultas</h2>
	
	<input onclick="location.href='consultaTransacionador.php'" type="button" value="Consulta de Transacionador"></input>
	<input onclick="location.href='consultaProduto.php'" type="button" value="Consulta de Produto"></input>
	
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
		$sql = 'SELECT t.cgctrs, t.nomtrs, t.datcadtrs FROM transacionador t
                INNER JOIN tipo_transacionador p ON t.codtiptrs = p.codtiptrs
				WHERE t.sextrs = \'F\' AND
					  p.tiptrs = \'C\'
				ORDER BY nomtrs DESC';
		
		$sql = $conexao->prepare($sql);
		$sql->execute();
		$sql = $sql->fetchAll(PDO::FETCH_BOTH);
		
		echo '<table cellpadding=2 cellspacing=2 border=1>
		      <tr>
		      <th> Código transacionador </th>
		      <th> Nome transacionador </th>
		      <th> Data de cadastro </th>
			  </tr>';
			
		foreach ($sql as $s) {
			echo '<tr>'
		       . '<th>'. $s['cgctrs'].    '</th>'
		       . '<th>'. $s['nomtrs'].    '</th>'
			   . '<th>'. $s['datcadtrs']. '</th>'
			   . '</tr>';
		}
			
		echo '</table>';
	}
	
	function emitirRelatorio2(){
		global $conexao;
		$sql = 'SELECT p.codpro, p.nompro, p.valvenpro FROM produto p
				INNER JOIN categoria c ON p.codcat = c.codcat
				WHERE extract(YEAR FROM datcadpro) = 2017 AND
					  valvenpro > 100 AND
					  c.codcat = 6
				ORDER BY nompro ASC';
		
		$sql = $conexao->prepare($sql);
		$sql->execute();
		$sql = $sql->fetchAll(PDO::FETCH_BOTH);
		
		echo '<table cellpadding=2 cellspacing=2 border=1>
		  	  <tr>
		      <th> Código Produto </th>
		   	  <th> Nome produto </th>
		      <th> Valor de venda </th>
			  </tr>';
				
		foreach ($sql as $s) {
			echo 
			  '<tr>'
			. '<th>'. $s['codpro'].    '</th>'
			. '<th>'. $s['nompro'].    '</th>'
			. '<th>'. $s['valvenpro']. '</th>'
			. '</tr>';
		}
		
		echo '</table>';
	}
	function emitirRelatorio3(){
		global $conexao;
		
		$sql = 'SELECT EXTRACT(MONTH FROM v.datven) AS mes, count(v.*) AS qtd, sum(valtotven) as val FROM venda v
				INNER JOIN venda_item i ON i.codven = v.codven
				INNER JOIN transacionador t ON t.cgctrs = v.cgctrs
				WHERE i.valdesitm > 0 AND
					  extract(YEAR FROM v.datven) = 2016 AND
					  sextrs = \'M\'
				GROUP BY mes';
		
		$sql = $conexao->prepare($sql);
		$sql->execute();
		$sql = $sql->fetchAll(PDO::FETCH_BOTH);
		
		echo '<table cellpadding=2 cellspacing=2 border=1>	
		      <tr>
		      <th> Mês da venda </th>
		      <th> Quantidade vendas </th>
		      <th> Valor total das vendas</th>
			  </tr>';
		   		
		foreach ($sql as $s) {
			echo
			  '<tr>'
		   	. '<th>'. $s['mes'].       '</th>'
			. '<th>'. $s['qtd'].       '</th>'
			. '<th>'. $s['val']. '</th>'
			. '</tr>';
		}
		   		
		echo '</table>';
	}
	
	function emitirRelatorio4(){
		global $conexao;
		$sql = 'SELECT t.cgctrs, v.codven, v.datven, v.valtotven FROM venda v
				INNER JOIN transacionador t ON t.cgctrs = v.cgctrs
				WHERE (upper(t.cidtrs) like (\'MARAVILHA\') OR
					   upper(t.cidtrs) like (\'DESCANÇO\')) AND
					   mod(cast(EXTRACT(MONTH FROM v.datven)as integer), 2) > 0
				ORDER BY datven DESC';
		
		$sql = $conexao->prepare($sql);
		$sql->execute();
		$sql = $sql->fetchAll(PDO::FETCH_BOTH);
		
		echo '<table cellpadding=2 cellspacing=2 border=1> 
			  <tr>
		      <th> Código cliente </th>
			  <th> Código da venda </th>
		      <th> Data da venda </th>
		      <th> Valor total da venda</th>
			  </tr>';
		
		foreach ($sql as $s) {
		   	echo 
		   	  '<tr>'
		   	. '<th>'. $s['cgctrs'].    '</th>'
		   	. '<th>'. $s['codven'].    '</th>'
			. '<th>'. $s['datven'].    '</th>'
			. '<th>'. $s['valtotven']. '</th>'
			. '</tr>';
		}
		   		
		echo '</table>';
	}
?>