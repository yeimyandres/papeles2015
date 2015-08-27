<?php

	include "../inc/conexion.php";
	$enlace = Conectarse();

	$idobjetivo = $_POST["idobjetivo"];

	$cadenaSQL = "SELECT descobjetivo, numobjetivo FROM objetivos WHERE idobjetivo = $idobjetivo";
	if($resultado = mysqli_query($enlace,$cadenaSQL))
	{
		$registro=mysqli_fetch_row($resultado);
		echo "<h3>Objetivo ".$registro[1]."</h3><p>".utf8_encode($registro[0])."</p>";
	}else{
		echo "Errores en la conexion";
	}
?>