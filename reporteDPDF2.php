<?php 

	ob_start();
	
	require 'conexion.php';
	$conexion = conectarDB();

	$valor = $_REQUEST['busq'];

	// Desactivar toda notificación de error
	error_reporting(0);

?>
<style>
	table{
		background-color: transparent;
	}
	table > thead > tr > th,
	table > tbody > tr > th,
	table > tfoot > tr > th,
	table > thead > tr > td,
	table > tbody > tr > td,
	table > tfoot > tr > td {
	  padding: 5px;
	  line-height: 1.42857143;
	  vertical-align: top;
	  border-top: 1px solid #ddd;
	  font-size: 12px;
	}
	img{
		padding: 0px 20px 0px 0px;
		float: left;
	}
	h2{			
  		font-family: inherit;
		font-weight: 500;
		line-height: 1.1;
		color: inherit;
		padding-right: 20px;
	}
</style>
<img src="images/logo.png" alt="" width="80px">
<h2>Reporte de Datos</h2>
<table width="720px">
    <thead>
	    <tr>
	      	<th scope="col" width="20px">#</th>
	      	<th scope="col" width="50px">Nombre</th>
	      	<th scope="col" width="50px">Recinto</th>
			<th scope="col" width="50px">Macrodistrito</th>
			<th scope="col" width="50px">Zona</th>
			<th scope="col" width="50px">Direccion</th>
			<th scope="col" width="50px">Celular</th>
		</tr>
	</thead>
   <?php 
   	$query = "SELECT * from persona where UPPER(nombre) like UPPER('%".$valor."%')";
	$resultado = pg_query($conexion,$query);
	$filas = pg_num_rows($resultado);
	$item=0;
	if ($filas!=0) {
		while ($dato = pg_fetch_array($resultado)) {
			$item=$item+1;
	?>
	<tr>
		<th scope="row" width="20px"><?php echo $item ?></th>
		<td width="70px"><?php echo $dato['nombre'] ?></td>
		<td width="50px"><?php echo $dato['recinto'] ?></td>
		<td width="50px"><?php echo $dato['macrodistrito'] ?></td>
		<td width="50px"><?php echo $dato['zona'] ?></td>
		<td width="50px"><?php echo $dato['direccion'] ?></td>
		<td width="50px"><?php echo $dato['celular'] ?></td>
	</tr>

<?php }
} ?>
  
</table>
<?php
require_once 'dompdf/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->set_paper("letter", "portrait");
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "profesionales.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
