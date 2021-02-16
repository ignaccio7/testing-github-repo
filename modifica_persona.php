<?php 
	
	require 'conexion.php';
	$conexion = conectarDB();

	$idp = $_REQUEST['idp'];

	//echo $idp;
	$nombre = $_POST['nombre'];
	$colegio = $_POST['colegio'];
	$mesa = $_POST['mesa'];
	$macrodistrito = $_POST['macrodistrito'];
	$zona = $_POST['zona'];
	$direccion = $_POST['direccion'];
	$celular = $_POST['celular'];

	$query = "UPDATE persona SET nombre = '$nombre',recinto = '$colegio',mesa = '$mesa',macrodistrito = '$macrodistrito',zona = '$zona',direccion = '$direccion',celular = '$celular' WHERE id_persona = '$idp' ";
	$resultado = pg_query($conexion,$query);

	if($resultado){	?>
	<script>
		alert('modificacion correcta');
		location.href='inicio.php';
	</script>
	<?php }else{ ?>
	<script>
		alert('no se pudo hacer la modificacion');
		location.href='inicio.php';
	</script>
	<?php }

?>