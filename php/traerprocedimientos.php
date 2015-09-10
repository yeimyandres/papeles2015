<?php

	include "../inc/conexion.php";
	$enlace = Conectarse();

	$idobjetivo = $_POST["idobjetivo"];

	$cadenaSQL = "SELECT * FROM procedimientos WHERE idobjetivo = $idobjetivo";
	if($resultado = mysqli_query($enlace,$cadenaSQL))
	{
		if (mysqli_affected_rows($enlace)>=1){
			echo "<label for='cboprocedimientos'>Procedimientos</label>";
			echo "<select class='largo' id='cboprocedimientos' name='cboprocedimientos'>";
			echo "<option value='0'>Seleccione un procedimiento existente</option>";
			while($registro=mysqli_fetch_row($resultado)){
				echo "<option value='$registro[0]'>";
				echo "Procedimiento número ".utf8_encode($registro[2])." de objetivo ".$idobjetivo;
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