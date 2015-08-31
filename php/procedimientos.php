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
				echo "<label for='cboasignacionesenp'>Asignaciones en SICA</label>";
				echo "<select class='largo' id='cboasignacionesenp' name='cboasignacionesenp'>";
				echo "<option value='0'>Seleccione una asignacion existente</option>";
				while($registro=mysqli_fetch_row($resultado)){
					echo "<option value='$registro[0]'>";
					echo "AT ".$registro[0].": ".utf8_encode($registro[4]);
					echo "</option>";
				}
				echo "</select>";
			}else{
				echo "<p>No existen asignaciones registradas</p>";
				echo "<p>Ingrese por la opcion Asignaciones SICA para adicionar asignaciones</p>";
			}
		}
	?>
	<div id="listaobjetivosenproc">
		
	</div>

	<div id="camposdetextoenproc">
		<label for="txtnumprocedimiento">Procedimiento No.</label>
		<input type="text" class="corto" id="txtnumprocedimiento" name="txtnumprocedimiento" />
		<label for="txtdescprocedimiento">Descripción del Procedimiento</label>
		<textarea class="largo" name="txtdescprocedimiento" id="txtdescprocedimiento" rows="7"></textarea>
		<label for="txtfeciniprocedimiento">Fecha inicial</label>
		<input class="corto" type="date" id="txtfeciniprocedimiento" name="txtfeciniprocedimiento" />
		<label for="txtfecfinprocedimiento">Fecha final</label>
		<input class="corto" type="date" id="txtfecfinprocedimiento" name="txtfecfinprocedimiento" />
		<input type="button" id="btnregistrarproc" name="btnregistrarproc" value="Registrar Procedimiento" />
		<input type="reset" value="Limpiar campos" />		
	</div>

</form>
<div id="procregistrados" class="tablaresumen">
	<?php

		$cadenaSQL = "SELECT a.idasignacion, a.enteasignacion, o.numobjetivo, o.descobjetivo, p.numprocedimiento, p.descprocedimiento FROM procedimientos AS p, objetivos AS o, asignaciones AS a WHERE a.idasignacion=o.idasignacion AND o.idobjetivo=p.idobjetivo ORDER BY o.idasignacion, o.idobjetivo";

		if($resultado = mysqli_query($enlace,$cadenaSQL))
		{
			if (mysqli_affected_rows($enlace)>=1){

				echo "<table>";
				echo "<tr>";
				echo "<th>Id AT</th>";
				echo "<th>Objetivo</th>";
				echo "<th>procedimiento</th>";
				echo "</tr>";
				while($registro = mysqli_fetch_row($resultado)){
					echo "<tr>";
					echo "<td class='id'>".$registro[0].": ".utf8_encode($registro[1])."</td>";
					echo "<td class='objetivo'>Objetivo ".$registro[2].": ".utf8_encode($registro[3])."</td>";
					echo "<td class='procedimiento'>".utf8_encode($registro[4]).": ".utf8_encode($registro[5])."</td>";
					echo "</tr>";
				}
				echo "</table>";

			}
		}

	?>
</div>