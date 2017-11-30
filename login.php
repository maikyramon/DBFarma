<?php
	//verificar se o login e senha sao validos
	require 'dao/usuario_dao.php';

	session_start();
	echo 'asd1';
	if (isset($_SESSION["usuario"])) unset($_SESSION["usuario"]);
	echo 'asd2';
	if(isset($_POST["login"]) && isset($_POST["senha"])){
		//verifica login
		echo 'asd3';
		$retorno = validaLogin($_POST["login"], $_POST["senha"]);
		if ($retorno){
			echo 'asd4';
			//cria sessao
			session_start();
			echo 'asd5';
			$_SESSION["usuario"] = $_POST["login"];
			echo 'asd6';
			header ("Location: index.php");
		} else {
			$mensagem = "Login e/ou senha inválidos! tente novamente";
		} echo 'asd7';
    }

?>

<html>
<head>
<meta charset="utf-8">		  
	<meta http-equiv="X-UA-Compatible" content="IE=edge">		  
	<meta name="viewport" content="width=device-width, initial-scale=1">		  		  
	<link href="css/bootstrap.min.css" rel="stylesheet">		  
	<link href="css/style.css" rel="stylesheet">
    <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/testecss.js"></script>
    <link media="all" type="text/css" rel="stylesheet" href="https://bootsnipp.com/css/fullscreen.css">

</head>
<body>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h4 class="panel-title">Acessar</h4>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="POST">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Login" name="login" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="senha" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Lembrar Senha!
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-lg btn-success btn-block panel-body1" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
