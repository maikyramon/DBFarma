<?php
try {
	$conexao = new PDO(
			//dados da conexao
			'pgsql:host=192.168.1.7;dbname=bdfarmacia',
			//usuario, senha
			'postgres','postgres');
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>