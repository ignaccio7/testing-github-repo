<?php 
require '../conexion.php';
$con = conectarDB();
$usr=$_POST['usr'];
$pwd=$_POST['pwd'];

//echo "usr ".$usr."</br>";
//echo "pwd ".$pwd."</br>";

$pwd=md5($pwd);

//echo "pwd ".$pwd."</br>";


$query="SELECT * FROM usuario WHERE (usuario='$usr' and pass='$pwd')";
$resultado=pg_query($con, $query);

if($filas=pg_num_rows($resultado)!=0) {
	session_start();
	$_SESSION['ingreso']='si';
	if ($r=pg_fetch_array($resultado)) {
		$_SESSION['nivel']=$r['nivel'];
	}
	header("location:../inicio.php");
}
else{
	header("location:../index.php?error=1");
}

 ?>
 
