<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<style type="text/css">
		* {
			margin: 0px;
			padding: 0px;
		}
		html {
	        height:100%;
	        width:100%;
    	}
		body{
			background: url(images/fondo2.jpg) #2b2b2a;			
			background-size:100% 100%;			
		}

		form{
			background: #fff;
			width: 360px;
			border: 1px solid #4e4d4d;
			border-radius: 3px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			box-shadow: inset 0 0 10px #000;
			margin: 50px auto;
		}
		/*
		form h1{
			text-align: center;
			color: #000;
			font-weight: normal;
			font-size: 30pt;
			margin: 10px 0px;
		}
		*/
		form img{
			padding: 20px;
		}
		form input{
			width: 280px;
			height: 35px;
			padding: 0px 10;
			margin: 10px 30px;
			color: #6d6d6d;
			text-align: center;
		}
		form button{
			width: 135px;
			margin: 20px ;
			height: 50px;
			background: #262626;
			color: #fff;
			border: 1px solid #232323;
			box-shadow: 0px 2px 0px #000;
			-moz-box-shadow: 0px 2px 0px #000;
			-webkit-box-shadow: 0px 2px 0px #000;
			border-radius: 3px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
		}
		form button:hover{
			background: rgb(58,203,199);
			color: #000;
		}

	</style>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	
	<form action="seguridad/control.php" method="post" id="formulario">
		<!--<h1>Login</h1>-->
		<center>
		<img src="images/logo.png" alt="" width="250" height="200">
		</center>
		<input type="text" maxlength="20" placeholder="ingrese Usuario" name="usr">
		<input type="password" placeholder="ingrese Contraseña" name="pwd">
		<center>
		<button type="submit">Iniciar Sesion</button><br>
		<?php 
			if (isset($_GET['error'])) {
				$e=$_GET['error'];
				if ($e==1) {
					echo "Usuario o contraseña incorrecta";
				}
				if ($e==2) {
					echo "Debe Ingresar un Usuario o Contraseña Validos";
				}
			}
		?>
		</center>
	</form>
	
</body>
</html>