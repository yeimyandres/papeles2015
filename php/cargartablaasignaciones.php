<?php

	include '../inc/conexion.php';

	$enlace = Conectarse();

	$cadenaSQL = "SELECT * FROM asignaciones ORDER BY idasignacion, feciniasignacion, fecfinasignacion";

	if($resultado = mysqli_query($enlace,$cadenaSQL))
	{
		if (mysqli_affected_rows($enlace)>=1){

			echo "<table>";
			echo "<tr>";
			echo "<th>Id</th>";
			echo "<th>Actividad</th>";
			echo "<th>Ente</th>";
			echo "<th>Supervisor Responsable</th>";
			echo "<th>Fecha Inicio</th>";
			echo "<th>Fecha Fin</th>";
			echo "<th>Eliminar</th>";
			echo "</tr>";
			while($registro = mysqli_fetch_row($resultado)){
				echo "<tr>";
				echo "<td class='id'>".$registro[0]."</td>";
				echo "<td class='actividad'>".utf8_encode($registro[3])."</td>";
				echo "<td class='ente'>".utf8_encode($registro[4])."</td>";
				echo "<td class='supervisor'>".utf8_encode($registro[5])."</td>";
				echo "<td class='fecini'>".$registro[1]."</td>";
				echo "<td class='fecfin'>".$registro[2]."</td>";
				echo "<td class='enlaceborrar '><a class='linkborrara' id='$registro[0]'>Borrar</a></td>";
				echo "</tr>";
			}
			echo "</table>";

		}
	}

?>