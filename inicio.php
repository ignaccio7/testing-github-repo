
<?php 
	include("seguridad/seguridad.php");
	require 'conexion.php';
	$conexion = conectarDB();	
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
					<a href="inicio.php" class="navbar-brand"><img src="images/logo.png" width="60" alt=""></a>
				</div>
				<!-- aqui inicia el menu -->
				<div class="collapse navbar-collapse" id="navegacion-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Inicio</a></li>
						<li><a href="registro.php">Registro</a></li>						
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
			<div class="col-md-12">
				<h2 class="post-title">
					Listado de Personas
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form action="#" class="navbar-form navbar-right" method="post">
					<div class="form-group">
						<input type="text" name="valorbus" id="valorbus" class="form-control" placeholder="buscar">
					</div>
					<button type="submit" class="btn btn-primary" name="buscaApe">
						<span class="glyphicon glyphicon-search"> nombre</span>
					</button>
					<button type="submit" class="btn btn-success" name="buscaCole">
						<span class="glyphicon glyphicon-search"> colegio</span>
					</button>
					<button type="submit" class="btn btn-info" name="buscaMacro">
						<span class="glyphicon glyphicon-search"> macrodistrito</span>
					</button>
					<button type="submit" class="btn btn-warning" name="buscaZona">
						<span class="glyphicon glyphicon-search"> zona</span>
					</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
						    <tr>
						      	<th scope="col">#</th>
						      	<th scope="col">Nombre</th>
						      	<th scope="col">Recinto</th>
						      	<th scope="col">Mesa</th>
						      	<th scope="col">Macrodistrito</th>
						      	<th scope="col">Zona</th>
						      	<th scope="col">Direccion</th>
						      	<th scope="col">Celular</th>
						      	<?php if ($_SESSION['nivel']==1) {	?>
						      		<th scope="col" colspan="2">Opciones</th>
						      	<?php } ?>						      	
						    </tr>
					  	</thead>
					  	<tbody>
					  	<?php 
					  	if (isset($_POST['buscaApe'])) {
					  		//echo "buscaApe";
					  		$valor = $_POST['valorbus'];
					  		//echo $valor;
					  		?>
					  		<script>
					  			document.getElementById('valorbus').value="<?php echo $valor ?>";
					  		</script>					  		
					  		<?php 					  		
					  		$query="SELECT * from persona where UPPER(nombre) like UPPER('%".$valor."%')";
							$consulta = pg_query($conexion,$query);
							$fila = pg_num_rows($consulta);
							$item=0;
							if ($fila!=0) { 
								while ($dato = pg_fetch_array($consulta)) { 
									$item=$item+1;
								?>
									<tr>
										<th scope="row"><?php echo $item ?></th>
								      	<td><?php echo $dato['nombre'] ?></td>
								      	<td><?php echo $dato['recinto'] ?></td>
								      	<td><?php echo $dato['mesa'] ?></td>
										<td><?php echo $dato['macrodistrito'] ?></td>
										<td><?php echo $dato['zona'] ?></td>
										<td><?php echo $dato['direccion'] ?></td>
										<td><?php echo $dato['celular'] ?></td>

										<?php if ($_SESSION['nivel']==1) {	?>
										<!--OPCIONES-->
										<td><a href="elimina_persona.php?idp=<?php echo $dato['id_persona'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
										<td><a href="modificar_persona.php?idp=<?php echo $dato['id_persona'] ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>	</td>
										<!--OPCIONES-->
										<?php } ?>

									</tr>
							<?php 
								}
								?>
								<tr>
									<td colspan="5"><a href="reporteDPDF2.php?busq=<?php echo $valor ?>" class="btn btn-danger">Generar Reporte</a></td>
								</tr>
							<?php 							
							}else{ ?>
								<tr>
									<td colspan="8">No Hay filas existentes ...</td>
								</tr>
							<?php 
							}

					  	}else if (isset($_POST['buscaCole'])) {
					  		//echo "buscaCole";
					  		$valor = $_POST['valorbus'];
					  		//echo $valor;
					  		?>
					  		<script>
					  			document.getElementById('valorbus').value="<?php echo $valor ?>";
					  		</script>
					  		<?php 					  		
					  		$query="SELECT * from persona where UPPER(recinto) like UPPER('%".$valor."%')";
							$consulta = pg_query($conexion,$query);
							$fila = pg_num_rows($consulta);
							$item=0;
							if ($fila!=0) { 
								while ($dato = pg_fetch_array($consulta)) { 
									$item=$item+1;
									?>
									<tr>
										<th scope="row"><?php echo $item ?></th>
								      	<td><?php echo $dato['nombre'] ?></td>
								      	<td><?php echo $dato['recinto'] ?></td>
								      	<td><?php echo $dato['mesa'] ?></td>
										<td><?php echo $dato['macrodistrito'] ?></td>
										<td><?php echo $dato['zona'] ?></td>
										<td><?php echo $dato['direccion'] ?></td>
										<td><?php echo $dato['celular'] ?></td>

										<?php if ($_SESSION['nivel']==1) {	?>
										<!--OPCIONES-->
										<td><a href="elimina_persona.php?idp=<?php echo $dato['id_persona'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
										<td><a href="modificar_persona.php?idp=<?php echo $dato['id_persona'] ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>	</td>
										<!--OPCIONES-->
										<?php } ?>

									</tr>
							<?php 
								}
							?>
								<tr>
									<td colspan="5"><a href="reporteDPDF3.php?busq=<?php echo $valor ?>" class="btn btn-danger">Generar Reporte</a></td>
								</tr>
							<?php 
							}else{ ?>
								<tr>
									<td colspan="8">No Hay filas existentes ...</td>
								</tr>
							<?php 
							}
					  	}else if (isset($_POST['buscaMacro'])) {
					  		//echo "buscaMacro";
					  		$valor = $_POST['valorbus'];
					  		//echo $valor;
					  		?>
					  		<script>
					  			document.getElementById('valorbus').value="<?php echo $valor ?>";
					  		</script>
					  		<?php 					  		
					  		$query="SELECT * from persona where UPPER(macrodistrito) like UPPER('%".$valor."%')";
							$consulta = pg_query($conexion,$query);
							$fila = pg_num_rows($consulta);
							$item=0;
							if ($fila!=0) { 
								while ($dato = pg_fetch_array($consulta)) { 
									$item=$item+1;
									?>
									<tr>
										<th scope="row"><?php echo $item ?></th>
								      	<td><?php echo $dato['nombre'] ?></td>
								      	<td><?php echo $dato['recinto'] ?></td>
								      	<td><?php echo $dato['mesa'] ?></td>
										<td><?php echo $dato['macrodistrito'] ?></td>
										<td><?php echo $dato['zona'] ?></td>
										<td><?php echo $dato['direccion'] ?></td>
										<td><?php echo $dato['celular'] ?></td>

										<?php if ($_SESSION['nivel']==1) {	?>
										<!--OPCIONES-->
										<td><a href="elimina_persona.php?idp=<?php echo $dato['id_persona'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
										<td><a href="modificar_persona.php?idp=<?php echo $dato['id_persona'] ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>	</td>
										<!--OPCIONES-->
										<?php } ?>

									</tr>
							<?php 
								}
							?>
								<tr>
									<td colspan="5"><a href="reporteDPDF4.php?busq=<?php echo $valor ?>" class="btn btn-danger">Generar Reporte</a></td>
								</tr>
							<?php 
							}else{ ?>
								<tr>
									<td colspan="8">No Hay filas existentes ...</td>
								</tr>
							<?php 
							} 
					  	}else if (isset($_POST['buscaZona'])) {
					  		//echo "buscaZona";
					  		$valor = $_POST['valorbus'];
					  		//echo $valor;
					  		?>
					  		<script>
					  			document.getElementById('valorbus').value="<?php echo $valor ?>";
					  		</script>
					  		<?php 					  		
					  		$query="SELECT * from persona where UPPER(zona) like UPPER('%".$valor."%')";
							$consulta = pg_query($conexion,$query);
							$fila = pg_num_rows($consulta);
							$item=0;
							if ($fila!=0) { 
								while ($dato = pg_fetch_array($consulta)) { 
									$item=$item+1;
									?>
									<tr>
										<th scope="row"><?php echo $item ?></th>
								      	<td><?php echo $dato['nombre'] ?></td>
								      	<td><?php echo $dato['recinto'] ?></td>
								      	<td><?php echo $dato['mesa'] ?></td>
										<td><?php echo $dato['macrodistrito'] ?></td>
										<td><?php echo $dato['zona'] ?></td>
										<td><?php echo $dato['direccion'] ?></td>
										<td><?php echo $dato['celular'] ?></td>

										<?php if ($_SESSION['nivel']==1) {	?>
										<!--OPCIONES-->
										<td><a href="elimina_persona.php?idp=<?php echo $dato['id_persona'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
										<td><a href="modificar_persona.php?idp=<?php echo $dato['id_persona'] ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>	</td>
										<!--OPCIONES-->
										<?php } ?>
										
									</tr>
							<?php 
								}
							?>
								<tr>
									<td colspan="5"><a href="reporteDPDF5.php?busq=<?php echo $valor ?>" class="btn btn-danger">Generar Reporte</a></td>
								</tr>
							<?php 
							}else{ ?>
								<tr>
									<td colspan="8">No Hay filas existentes ...</td>
								</tr>
							<?php 
							} 
					  	}else{
					  		//echo "nada";

					    		$query = "SELECT * from persona";
								$resultado = pg_query($conexion,$query);
								$filas = pg_num_rows($resultado);
								$item=0;
								if ($filas!=0) {
									while ($dato = pg_fetch_array($resultado)) {
										$item=$item+1;
							?>
							<tr>
								<th scope="row"><?php echo $item ?></th>
						      	<td><?php echo $dato['nombre'] ?></td>
						      	<td><?php echo $dato['recinto'] ?></td>
						      	<td><?php echo $dato['mesa'] ?></td>
								<td><?php echo $dato['macrodistrito'] ?></td>
								<td><?php echo $dato['zona'] ?></td>
								<td><?php echo $dato['direccion'] ?></td>
								<td><?php echo $dato['celular'] ?></td>

								<?php if ($_SESSION['nivel']==1) {	?>
								<!--OPCIONES-->
								<td><a href="elimina_persona.php?idp=<?php echo $dato['id_persona'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
								<td><a href="modificar_persona.php?idp=<?php echo $dato['id_persona'] ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>	</td>
								<!--OPCIONES-->
								<?php } ?>

							</tr>
							<?php 
									}
									?>
							<tr>
								<td colspan="5"><a href="reporteDPDF.php" class="btn btn-danger">Generar Reporte</a></td>
							</tr>
							<?php 
								}else{ ?>
									<tr>
										<td colspan="8">No Hay filas existentes ...</td>
									</tr>
							<?php 
								}
					  	}
					  	?>					  						    							    
						</tbody>						
					</table>
				</div>
			</div>
		</div>	
	</section>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>