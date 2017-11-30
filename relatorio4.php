<html>
<head>
<meta charset="utf8">
<title>Relatório 4</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php include('menu.php');?>
   	<div style="margin-left: 100px; margin-top:100px">
		<?php
			require 'sessao.php';
			require 'db/conexao.php';

			global $conexao;
			$sql = 'SELECT t.cgctrs, v.codven, v.datven, v.valtotven FROM VW_RELATORIO4 v';
			
			$sql = $conexao->prepare($sql);
			$sql->execute();
			$sql = $sql->fetchAll(PDO::FETCH_BOTH);
			
			echo '<table class="table table-bordered table-striped table-responsive">
			      <thead>
                  <tr>
                  
			      <th> Código cliente </th>
				  <th> Código da venda </th>
			      <th> Data da venda </th>
			      <th> Valor total da venda</th>
				  </tr>';
			
			foreach ($sql as $s) {
			   	echo 
			   	    '<tr>
				   	 <th>'. $s['cgctrs'].    '</th>
				   	 <th>'. $s['codven'].    '</th>
					 <th>'. $s['datven'].    '</th>
					 <th>'. $s['valtotven']. '</th>
					 </tr>
			         </tbody>
			         </table>';
			}
			   		
			echo '</table>';
		?>
	</div>
</body>
</html>
