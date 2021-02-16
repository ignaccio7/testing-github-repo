<?php 
	
	require 'conexion.php';
	$conexion = conectarDB();

	$nombre = $_POST['nombre'];
	$colegio = $_POST['colegio'];
	$mesa = $_POST['mesa'];
	$macrodistrito = $_POST['macrodistrito'];
	$zona = $_POST['zona'];
	$direccion = $_POST['direccion'];
	$celular = $_POST['celular'];

	$query = "INSERT into persona(nombre,recinto,mesa,macrodistrito,zona,direccion,celular)
			values('$nombre','$colegio',$mesa,'$macrodistrito','$zona','$direccion',$celular)";
	$resultado = pg_query($conexion,$query);

	
	if($resultado){	?>
	<script>
		alert('registro correcta');
		location.href='inicio.php';
	</script>
	<?php }else{ ?>
	<script>
		alert('no se pudo hacer la registro');
		location.href='inicio.php';
	</script>
	<?php }
?>