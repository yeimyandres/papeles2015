<?php

	include '../inc/conexion.php';

	$enlace = Conectarse();

	$idobj = $_POST["idobj"];
	$numproc = $_POST["numproc"];
	$descproc = $_POST["descproc"];
	$feciniproc = $_POST["feciniproc"];
	$fecfinproc = $_POST["fecfinproc"];

	$cadenaSQL = "INSERT INTO procedimientos(idobjetivo,numprocedimiento,descprocedimiento,feciniprocedimiento,fecfinprocedimiento) VALUES($idobj,'$numproc','".utf8_decode($descproc)."','$feciniproc','$fecfinproc')";

	$resultado = mysqli_query($enlace,$cadenaSQL);


?>