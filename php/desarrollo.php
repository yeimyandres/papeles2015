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

			$cadenaSQL = "SELECT * FROM tiposdedesarrollo ORDER BY desctipodesarrollo";
			if($resultado = mysqli_query($enlace,$cadenaSQL))
			{
				if (mysqli_affected_rows($enlace)>=1){
					echo "<label for='cbotiposdesarrollo'>Tipo de avance de papel de trabajo</label>";
					echo "<select class='largo' id='cbotiposdesarrollo' name='cbotiposdesarrollo'>";
					echo "<option value='0'>Seleccione una tipo de avance existente</option>";
					while($registro=mysqli_fetch_row($resultado)){
						echo "<option value='$registro[0]'>";
						echo utf8_encode($registro[1]);
						echo "</option>";
					}
					echo "</select>";
				}else{
					echo "<p>No existen tipos de avance registrados</p>";
				}
			}

		?>
	</div>

	<div id="desarrollogeneral">
		<label for="txtdesarrollogeneral">Avance</label>
		<textarea class="largo" name="txtdesarrollogeneral" id="txtdesarrollogeneral" rows="10"></textarea>
	</div>

	<div id="comunicarobservacion">
		<label for="txtcriterio"></label>
		<input type="text" id="txtcriterio" name="txtcriterio" />
		<label for="txtfuentedecriterio"></label>
		<input type="text" id="txtfuentedecriterio" name="txtfuentedecriterio" />
		<label for="txtcondicion"></label>
		<input type="text" id="txtcondicion" name="txtcondicion" />
		<label for="txtcausa"></label>
		<input type="text" id="txtcausa" name="txtcausa" />
		<label for="txtefecto"></label>
		<input type="text" id="txtefecto" name="txtefecto" />
		<label for="cboincidencias">Incidencias</label>
		<input type="checkbox" id="lstincidencia" value="1" />Disciplinaria
		<input type="checkbox" id="lstincidencia" value="2" />Fiscal
		<input type="checkbox" id="lstincidencia" value="3" />Penal
	</div>

	<div id="validarrespuesta">
		<label for="txtvalidarrespuesta"></label>
		<input type="text" id="txtvalidarrespuesta" name="txtvalidarrespuesta" />
	</div>

	<div id="configurarhallazgo">
		<label for="txtconfigurarhallazgo"></label>
		<input type="text" id="txtconfigurarhallazgo" name="txtconfigurarhallazgo" />
	</div>

	<div id="botonesend">
		<input type="button" id="btnregistrarproc" name="btnregistrarproc" value="Registrar Procedimiento" />
		<input type="reset" value="Limpiar campos" />
	</div>

</form>

<div id="desregistrados" class="tablaresumen">

</div>