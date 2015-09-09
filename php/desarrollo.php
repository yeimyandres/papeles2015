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

	<div id="camposdetextoend">
		<div id="general">
			<input type="text">
		</div>
		<div id="comunicacion">
			<input type="text">
		</div>
		<div id="analisis">
			<input type="text">
		</div>
		<div id="hallazgo">
			<input type="text">
		</div>
		<div id="botones">
			<input type="button" id="btnregistrarproc" name="btnregistrarproc" value="Registrar Procedimiento" />
			<input type="reset" value="Limpiar campos" />
		</div>
	</div>

</form>
<div id="desregistrados" class="tablaresumen">

</div>