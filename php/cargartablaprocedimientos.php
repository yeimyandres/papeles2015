<?php

	include '../inc/conexion.php';

	$enlace = Conectarse();

	$idat = $_POST["idat"];
	$idobj = $_POST["idobj"];

		$cadenaSQL = "SELECT a.idasignacion, a.enteasignacion, o.numobjetivo, o.descobjetivo, p.numprocedimiento, p.descprocedimiento, p.idprocedimiento FROM procedimientos AS p, objetivos AS o, asignaciones AS a WHERE o.idasignacion='$idat' AND p.idobjetivo=$idobj AND a.idasignacion=o.idasignacion AND o.idobjetivo=p.idobjetivo ORDER BY o.idasignacion, o.idobjetivo";

		if($resultado = mysqli_query($enlace,$cadenaSQL))
		{
			if (mysqli_affected_rows($enlace)>=1){

				echo "<table>";
				echo "<tr>";
				echo "<th>Id AT</th>";
				echo "<th>Objetivo</th>";
				echo "<th>Procedimiento</th>";
				echo "<th>Eliminar</th>";
				echo "</tr>";
				while($registro = mysqli_fetch_row($resultado)){
					echo "<tr>";
					echo "<td class='id'>".$registro[0].": ".utf8_encode($registro[1])."</td>";
					echo "<td class='objetivo'>Objetivo ".$registro[2].": ".utf8_encode($registro[3])."</td>";
					echo "<td class='procedimiento'>".utf8_encode($registro[4]).": ".utf8_encode($registro[5])."</td>";
					echo "<td class='fecini'><a class='linkborrarp' id='$registro[6]'>Borrar</a></td>";
					echo "</tr>";
				}
				echo "</table>";

			}
		}
?>