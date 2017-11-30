<html>
<head>
<meta charset="utf8">
<title>Relatório 1</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php include('menu.php');?>
   	<div style="margin-left: 100px; margin-top:100px">
		<?php
			require 'sessao.php';
			require 'db/conexao.php';
			global $conexao;
			$sql = 'SELECT t.cgctrs, t.nomtrs, t.datcadtrs FROM VW_RELATORIO1 t';

			$sql = $conexao->prepare($sql);
			$sql->execute();
			$sql = $sql->fetchAll(PDO::FETCH_BOTH);

			echo '<table class="table table-bordered table-striped table-responsive">
			      <thead>
                  <tr>
			      <th> Código transacionador </th>
			      <th> Nome transacionador </th>
			      <th> Data de cadastro </th>
				  </tr>';
				
			foreach ($sql as $s) {
				echo '<tr>
			          <td>'. $s['cgctrs'].    '</td>
			          <td>'. $s['nomtrs'].    '</td>
				      <td>'. $s['datcadtrs']. '</td>
				      </tr>
				      </tbody>
				      </table>';
			}
		?>
	</div>
</body>
</html>

