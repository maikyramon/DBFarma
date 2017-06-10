<?php
try {
	$conexao = new PDO(
			//dados da conexao
			'pgsql:host=localhost;dbname=bdfarmacia',
			//usuario, senha
			'postgres','123');
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>