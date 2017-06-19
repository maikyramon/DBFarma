<?php
try {
	$conexao = new PDO(
			//dados da conexao
			'pgsql:host=192.168.1.109;dbname=bdfarmacia',
			//usuario, senha
			'postgres','123');
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>