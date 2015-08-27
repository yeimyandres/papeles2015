<?php

	include './inc/conexion.php';
	$enlace = Conectarse();

?>

<h2>Observaciones asociadas a las AT</h2>
<form action="">
	<?php

		$cadenaSQL = "SELECT * FROM asignaciones ORDER BY idasignacion";
		if($resultado = mysqli_query($enlace,$cadenaSQL))
		{
			if (mysqli_affected_rows($enlace)>=1){
				echo "<label for='cboasignacioneseno'>Asignaciones en SICA</label>";
				echo "<select class='largo' id='cboasignacioneseno' name='cboasignacioneseno'>";
				echo "<option value='0'>Seleccione una asignacion existente</option>";
				while($registro=mysqli_fetch_row($resultado)){
					echo "<option value='$registro[0]'>";
					echo $registro[0].": ".utf8_encode($registro[4]);
					echo "</option>";
				}
				echo "</select>";
			}else{
				echo "<p>No existen asignaciones registradas</p>";
				echo "<p>Ingrese por la opcion Asignaciones SICA para adicionar asignaciones</p>";
			}
		}
	?>
	<div id="controlesenobjetivos">
		<label for="txtnumobjetivo">Objetivo No.</label>
		<input class="corto" type="text" id="txtnumobjetivo" name="txtnumobjetivo" />
		<label for="txtdescobjetivo">Descripción del Objetivo</label>
		<textarea name="txtdescobjetivocobjetivo" rows="7" class="largo"></textarea>		
	</div>
</form>
<div id="objregistrados" class="tablaresumen">
	<?php

		$cadenaSQL = "SELECT a.idasignacion, a.enteasignacion, a.actividadasignacion, o.descobjetivo, o.numobjetivo FROM objetivos AS o, asignaciones AS a WHERE a.idasignacion=o.idasignacion ORDER BY o.idasignacion, o.idobjetivo";

		if($resultado = mysqli_query($enlace,$cadenaSQL))
		{
			if (mysqli_affected_rows($enlace)>=1){

				echo "<table>";
				echo "<tr>";
				echo "<th>Id AT</th>";
				echo "<th>Ente</th>";
				echo "<th>Actividad</th>";
				echo "<th>Objetivo</th>";
				echo "</tr>";
				while($registro = mysqli_fetch_row($resultado)){
					echo "<tr>";
					echo "<td class='id'>".$registro[0]."</td>";
					echo "<td class='ente'>".utf8_encode($registro[1])."</td>";
					echo "<td class='actividad'>".utf8_encode($registro[2])."</td>";
					echo "<td class='objetivo'>Objetivo ".$registro[4].": ".utf8_encode($registro[3])."</td>";
					echo "</tr>";
				}
				echo "</table>";

			}
		}


	?>
</div>