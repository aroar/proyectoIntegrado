<?php
function conexion(){
$mysqli = new mysqli("localhost", "phpmyadmin", "123Ab+++", "Cine");
				mysqli_set_charset($mysqli,'utf8');
			if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: ".$mysqli->connect_error;
			}
		return $mysqli;
}
?>