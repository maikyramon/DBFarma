<html>
<head>
<meta charset="utf8">
<title>Relatório 3</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php include('menu.php');?>
   	<div style="margin-left: 100px; margin-top:100px">
		<?php
			require 'sessao.php';
			require 'db/conexao.php';
			global $conexao;
				
			$sql = 'SELECT EXTRACT(MONTH FROM v.datven) AS mes, count(v.*) AS qtd, sum(valtotven) as val FROM VW_RELATORIO3 v';
					
			
			$sql = $conexao->prepare($sql);
			$sql->execute();
			$sql = $sql->fetchAll(PDO::FETCH_BOTH);
			
			echo '<table class="table table-bordered table-striped table-responsive">
			      <thead>
                  <tr>
			      <th> Mês da venda </th>
			      <th> Quantidade vendas </th>
			      <th> Valor total das vendas</th>
				  </tr>';
			   		
			foreach ($sql as $s) {
				echo
				    '<tr>
				   	 <th>'. $s['mes']. '</th>
					 <th>'. $s['qtd']. '</th>
					 <th>'. $s['val']. '</th>
					 </tr>
			         </tbody>
			         </table>';
			}
			   		
			echo '</table>';
		?>
	</div>
</body>
</html>
