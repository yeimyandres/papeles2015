<?php

	include "../inc/conexion.php";
	$enlace = Conectarse();

	$idasignacion = $_POST["idasignacion"];

	$cadenaSQL = "SELECT * FROM objetivos WHERE idasignacion = $idasignacion";
	if($resultado = mysqli_query($enlace,$cadenaSQL))
	{
		if (mysqli_affected_rows($enlace)>=1){
			echo "<select class='largo' id='cboobjetivos' name='cboobjetivos'>";
			echo "<option value='0'>Seleccione un objetivo existente</option>";
			while($registro=mysqli_fetch_row($resultado)){
				echo "<option value='$registro[0]'>";
				echo "Objetivo número ".utf8_encode($registro[2])." de AT ".$idasignacion;
				echo "</option>";
			}
			echo "</select>";
		}else{
			echo "";
		}
	}else{
		echo "";
	}
?>