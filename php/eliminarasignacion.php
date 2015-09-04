<?php

	include "../inc/conexion.php";
	$enlace = Conectarse();

	$idat = $_POST["id"];

	$cadenaSQL = "DELETE FROM asignaciones WHERE idasignacion=".$idat;
	if($resultado = mysqli_query($enlace,$cadenaSQL)){
		echo "Asignación eliminada con éxito";
	}else{
		echo "Hubo un error!. Contacte al administrador";
	}
		

?>