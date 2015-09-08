<?php

	include './inc/conexion.php';
	$enlace = Conectarse();

?>

<h2>Desarrollo de procedimientos</h2>
<form action="">
	<?php

		$cadenaSQL = "SELECT * FROM asignaciones ORDER BY idasignacion";
		if($resultado = mysqli_query($enlace,$cadenaSQL))
		{
			if (mysqli_affected_rows($enlace)>=1){
				echo "<label for='cboasignacionesend'>Asignaciones en SICA</label>";
				echo "<select class='largo' id='cboasignacionesend' name='cboasignacionesend'>";
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

	<div id="listaobjetivosend">
		
	</div>

	<div id="listaprocedimientosend">
		
	</div>

	<div id="tipodesarrollo">
		<?php

			

		?>
	</div>

	<div id="camposdetextoend">
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
<div id="desregistrados" class="tablaresumen">

</div>