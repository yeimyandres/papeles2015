<?php

	include '../inc/conexion.php';

	$enlace = Conectarse();

	$idat = $_POST["idat"];

	$cadenaSQL = "SELECT a.idasignacion, a.enteasignacion, a.actividadasignacion, o.descobjetivo, o.numobjetivo, o.idobjetivo FROM objetivos AS o, asignaciones AS a WHERE o.idasignacion='$idat' AND a.idasignacion=o.idasignacion ORDER BY o.idasignacion, o.numobjetivo";

	if($resultado = mysqli_query($enlace,$cadenaSQL))
	{
		if (mysqli_affected_rows($enlace)>=1){

			echo "<table>";
			echo "<tr>";
			echo "<th>Id AT</th>";
			echo "<th>Ente</th>";
			echo "<th>Actividad</th>";
			echo "<th>Objetivo</th>";
			echo "<th>Eliminar</th>";
			echo "</tr>";
			while($registro = mysqli_fetch_row($resultado)){
				echo "<tr>";
				echo "<td class='id'>".$registro[0]."</td>";
				echo "<td class='ente'>".utf8_encode($registro[1])."</td>";
				echo "<td class='actividad'>".utf8_encode($registro[2])."</td>";
				echo "<td class='objetivo'>Objetivo ".$registro[4].": ".utf8_encode($registro[3])."</td>";
				echo "<td class='fecini'><a class='linkborraro' id='$registro[5]'>Borrar</a></td>";
				echo "</tr>";
			}
			echo "</table>";

		}
	}

?>