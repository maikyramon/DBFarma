<html>
<head>
<meta charset="utf8">
<title>Relatório 2</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php include('menu.php');?>
   	<div style="margin-left: 100px; margin-top:100px">
		<?php
			require 'sessao.php';
			require 'db/conexao.php';
			global $conexao;

			$sql = 'SELECT p.codpro, p.nompro, p.valvenpro FROM VW_RELATORIO2 p';
			
			$sql = $conexao->prepare($sql);
			$sql->execute();
			$sql = $sql->fetchAll(PDO::FETCH_BOTH);
			
			echo '<table class="table table-bordered table-striped table-responsive">
			      <thead>
                  <tr>
			      <th> Código Produto </th>
			   	  <th> Nome produto </th>
			      <th> Valor de venda </th>
				  </tr>';
					
			foreach ($sql as $s) {
				echo 
				    '<tr>
				 	 <th>'. $s['codpro'].    '</th>
			 		 <th>'. $s['nompro'].    '</th>
		 			 <th>'. $s['valvenpro']. '</th>
	 				 </tr>
			         </tbody>
			         </table>';
			}
		?>
	</div>
</body>
</html>
