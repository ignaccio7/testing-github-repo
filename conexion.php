<?php 

	function conectarDB()
	{
		$host = "host=ec2-3-222-11-129.compute-1.amazonaws.com";
		$port = "port=5432";
		$dbname = "dbname=d451d96iqptffn";
		$user = "user=xpdwatsbobontv";
		$password = "password=540e7a83b77d1c2f85ec685c75d43f3f85ca4e2b606103d60c9f6ac0e3feeb25";

		$bd = pg_connect("$host $port $dbname $user $password");

		if (!$bd) {
			echo "Error: ".pg_last_error();
		}else{
			//echo "Conexion Exitosa con postgres";
			return $bd;
		}
	}
	//conectarDB();
?>
