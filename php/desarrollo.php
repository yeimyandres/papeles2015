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

			$cadenaSQL = "SELECT * FROM tiposdedesarrollo";
			if($resultado = mysqli_query($enlace,$cadenaSQL))
			{
				if (mysqli_affected_rows($enlace)>=1)
				{
					while($registro=mysqli_fetch_row($resultado)){
						echo "<input type='radio' id='radiotipos' name='radiotipos' value='".$registro[0]."' />".utf8_encode($registro[1])."<br />";
					}
				}else{
					echo "<p>No existen tipos de avance registrados</p>";
				}
			}

		?>
	</div>

	<input type="hidden" id="txtselecciondllo" name="txtselecciondllo" /> 

	<div id="desarrollogeneral">
		<label for="txtdesarrollogeneral">Avance de Procedimiento</label>
		<textarea class="xlargo" name="txtdesarrollogeneral" id="txtdesarrollogeneral" rows="5"></textarea>
	</div>

	<div id="comunicarobservacion">
		<label for="txtcriterio">Criterio(s)</label>
		<textarea name="txtcriterio" id="txtcriterio" class="xlargo" rows="5"></textarea>
		<label for="txtfuentedecriterio">Fuente(s) de Criterio</label>
		<textarea name="txtfuentedecriterio" id="txtfuentedecriterio" class="xlargo" rows="5"></textarea>
		<label for="txtcondicion">Condición</label>
		<textarea name="txt" id="txt" class="xlargo" rows="5"></textarea>
		<label for="txtcausa">Causa</label>
		<textarea name="txt" id="txt" class="xlargo" rows="5"></textarea>
		<label for="txtefecto">Efecto</label>
		<textarea name="txt" id="txt" class="xlargo" rows="5"></textarea>
		<div class="incidencias">
			<input type="checkbox" id="optdisciplinaria" />Disciplinaria
			<input type="checkbox" id="optfiscal" />Fiscal
			<input type="checkbox" id="optpenal" />Penal
		</div>
	</div>

	<div id="validarrespuesta">
		<label for="txtvalidarrespuesta">Validación de Respuesta</label>
		<input type="text" id="txtvalidarrespuesta" name="txtvalidarrespuesta" />
	</div>

	<div id="configurarhallazgo">
		<label for="txtconfigurarhallazgo"></label>
		<input type="text" id="txtconfigurarhallazgo" name="txtconfigurarhallazgo" />
	</div>

	<div id="botonesend">
		<input type="button" id="btnregistrardllo" name="btnregistrarproc" value="Registrar Procedimiento" />
		<input type="reset" value="Limpiar campos" />
	</div>

</form>

<div id="desregistrados" class="tablaresumen">

</div>