<?php 
	include("seguridad/seguridad.php");
	require 'conexion.php';
	$conexion = conectarDB();

	$idpersona = $_REQUEST['idp'];

	$query_p = "SELECT * from persona WHERE id_persona='$idpersona'";
	$resultado_p = pg_query($conexion,$query_p);
	$dato_p = pg_fetch_array($resultado_p);

	if ($_SESSION['nivel']==1) {

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
			.iconoC{
				color: #fff;
				margin: auto;
				padding: 20px;
			}
		</style>
</head>
<body>
	<header>
		<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-1">
						<span class="sr-only">Desplegar / Ocultar Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="inicio.php" class="navbar-brand">
						<img src="images/logo.png" width="60" alt="">
					</a>
				</div>
				<!-- aqui inicia el menu -->
				<div class="collapse navbar-collapse" id="navegacion-1">
					<ul class="nav navbar-nav">
						<li><a href="inicio.php">Inicio</a></li>
						<li class="active"><a href="registro.php">Registro</a></li>
					</ul>
					<!-- PA CERRAR SESION -->
					<div class="navbar-right">					
						<a href="seguridad/salir.php">
							<span class="glyphicon glyphicon-off iconoC"> Salir </span>
						</a>
					</div>
				</div>				
			</div>
		</nav>		
	</header>

	<!-- CUERPO DE LA PAGINA -->
	<section class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h2 class="post-title">
					Modificar Persona
				</h2>
				<form action="modifica_persona.php?idp=<?php echo $dato_p[0] ?>" name="form1" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="nombre" class="control-label col-md-2">
							Nombre Completo:
						</label>
						<div class="col-md-10">
							<input type="text" name="nombre" class="form-control" 
							value="<?php echo trim($dato_p[1])?>">
						</div>
					</div>
					<div class="form-group">
						<label for="colegio" class="control-label col-md-2">
							Recinto de Votacion :
						</label>
						<div class="col-md-10">
							<input type="text" name="colegio" class="form-control" 
							value="<?php echo trim($dato_p[2])?>">
						</div>
					</div>
					<div class="form-group">
						<label for="mesa" class="control-label col-md-2">
							Mesa :
						</label>
						<div class="col-md-10">
							<input type="text" name="mesa" class="form-control" 
							value="<?php echo trim($dato_p[3])?>">
						</div>
					</div>
					<!--			MACRODISTRITO				-->	
					<div class="form-group">
						<label for="macrodistrito" class="control-label col-md-2">
							Elige un Macrodistrito:
						</label>						
						<div class="col-md-10">
							<input type="text" name="macrodistrito" class="form-control" 
							value="<?php echo trim($dato_p[4])?>">
						</div>
					</div>
					<!--			ZONA				-->	
					<div class="form-group">
						<label for="zona" class="control-label col-md-2">
							Elige una Zona:
						</label>						
						<div class="col-md-10">
							<input type="text" name="zona" class="form-control" 
							value="<?php echo trim($dato_p[5])?>">
						</div>
					</div>
					<div class="form-group">
						<label for="direccion" class="control-label col-md-2">
							Direccion :
						</label>
						<div class="col-md-10">
							<input type="text" name="direccion" class="form-control" 
							value="<?php echo trim($dato_p[6])?>">
						</div>
					</div>
					<div class="form-group">
						<label for="celular" class="control-label col-md-2">
							Celular :
						</label>
						<div class="col-md-10">
							<input type="text" name="celular" class="form-control" 
							value="<?php echo trim($dato_p[7])?>">
						</div>
					</div>				
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<button type="submit" class="btn btn-success btn-lg btn-block">Modificar</button>
						</div>						
					</div>
				</form>
			</div>
		</div>	
	</section>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php } ?>