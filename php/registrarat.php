<?php

	include '../inc/conexion.php';

	$enlace = Conectarse();

	$idat = $_POST["idat"];
	$actividad = $_POST["actividad"];
	$ente = $_POST["ente"];
	$supervisor = $_POST["supervisor"];
	$fecini = $_POST["fecini"];
	$fecfin = $_POST["fecfin"];

	$cadenaSQL = "INSERT INTO asignaciones VALUES('$idat','$fecini','$fecfin','".utf8_decode($actividad)."','".utf8_decode($ente)."','".utf8_decode($supervisor)."')";

	$resultado = mysqli_query($enlace,$cadenaSQL);

?>