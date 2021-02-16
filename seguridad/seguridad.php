<?php 

	session_start();

	//echo $_SESSION['ingreso'];

	if ($_SESSION['ingreso']!='si') {
		header("location:../index.php?error=2");
	}

 ?>