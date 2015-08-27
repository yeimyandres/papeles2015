<h2>Ingreso de Asignaciones SICA</h2>
<form action="">
	<label for="txtidat">numero de AT</label>
	<input class="corto" type="text" id="txtidat" name="txtidat" />
	<label for="txtactividadat">Actividad AT</label>
	<textarea class="largo" name="txtactividadat" id="txtactividadat" rows="7"></textarea>
	<label for="txtenteat">Ente AT</label>
	<input class="largo" type="text" id="txtenteat" name="txtenteat" />
	<label for="txtsupervisor">Supervisor Encargado</label>
	<input class="largo" type="text" id="txtsupervisor" name="txtsupervisor" />
	<label for="txtfecini">Fecha Inicio</label>
	<input class="corto" type="date" id="txtfecini" name="txtfecini" />
	<label for="txtfecfin">Fecha Finalización</label>
	<input class="corto" type="date" id="txtfecfin" name="txtfecfin" />
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