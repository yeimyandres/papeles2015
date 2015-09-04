<?php

	include '../inc/conexion.php';

	$enlace = Conectarse();

	$numobjetivo = $_POST["numobjetivo"];
	$descobjetivo = $_POST["descobjetivo"];
	$idasignacion = $_POST["idasignacion"];

	$cadenaSQL = "INSERT INTO objetivos VALUES('$idasignacion','$numobjetivo','".utf8_decode($descobjetivo)."')";

	$resultado = mysqli_query($enlace,$cadenaSQL);


?>