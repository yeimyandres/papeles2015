<h2>Ingreso de Asignaciones SICA</h2>
<form action="">
	<label for="txtidat">numero de AT</label>
	<input type="text" id="txtidat" name="txtidat" />
	<label for="txtasuntoat">Actividad AT</label>
	<input type="text" id="txtasuntoat" name="txtasuntoat" />
	<label for="txtdescat">Ente AT</label>
	<input type="text" id="txtdescat" name="txtdescat" />
	<label for="txtvigat">Supervisor Encargado</label>
	<input type="text" id="" name="" />
	<label for="txtfecini">Fecha Inicio</label>
	<input type="date" id="txtfecini" name="txtfecini" />
	<label for="txtfecfin">Fecha Finalización</label>
	<input type="date" id="txtfecfin" name="txtfecfin" />
</form>
<div id="atregistradas" class="tablaresumen">
	<?php

		include './inc/conexion.php';

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
				echo "</tr>";
				while($registro = mysqli_fetch_row($resultado)){
					echo "<tr>";
					echo "<td class='id'>".$registro[0]."</td>";
					echo "<td class='actividad'>".utf8_encode($registro[3])."</td>";
					echo "<td class='ente'>".utf8_encode($registro[4])."</td>";
					echo "<td class='supervisor'>".utf8_encode($registro[5])."</td>";
					echo "<td class='fecini'>".$registro[1]."</td>";
					echo "<td class='fecfin'>".$registro[2]."</td>";
					echo "</tr>";
				}
				echo "</table>";

			}
		}


	?>
</div>