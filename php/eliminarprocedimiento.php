<?php

	include "../inc/conexion.php";
	$enlace = Conectarse();

	$idproc = $_POST["idproc"];

	$cadenaSQL = "DELETE FROM procedimientos WHERE idprocedimiento=".$idproc;
	if($resultado = mysqli_query($enlace,$cadenaSQL)){
		echo "Procedimiento eliminado con éxito";
	}else{
		echo "Hubo un error!. Contacte al administrador";
	}

?>