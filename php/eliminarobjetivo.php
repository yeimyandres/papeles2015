<?php

	include "../inc/conexion.php";
	$enlace = Conectarse();

	$idobj = $_POST["idobj"];

	$cadenaSQL = "DELETE FROM objetivos WHERE idobjetivo=".$idobj;
	if($resultado = mysqli_query($enlace,$cadenaSQL)){
		echo "Objetivo eliminado con éxito";
	}else{
		echo "Hubo un error!. Contacte al administrador";
	}
		

?>