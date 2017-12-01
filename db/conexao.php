<?php
try {
	$conexao = new PDO(
			//dados da conexao
			'pgsql:host=localhost;dbname=bdfarmacia',
			//usuario, senha
			'postgres','13232729');
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>