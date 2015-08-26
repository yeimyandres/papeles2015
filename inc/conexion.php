<?php
	function Conectarse(){
		$enlace = mysqli_connect("localhost","papeles","Apguerrayeian3ag","papeles");
		if(mysqli_connect_errno()){
			printf("Falló la conexión: %s\n", mysqli_connect_error());
			exit();
		}else{
			return $enlace;
		}
	}
?>