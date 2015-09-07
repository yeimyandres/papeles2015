<?php

	include './inc/conexion.php';
	$enlace = Conectarse();

?>

<h2>Objetivos de Auditoría asociados a las AT</h2>
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
		<textarea name="txtdescobjetivo" id="txtdescobjetivo" rows="7" class="largo"></textarea>
		<input type="button" id="btnregistrarobj" name="btnregistrarobj" value="Registrar Objetivo" />
		<input type="reset" value="Limpiar campos" />
	</div>
</form>
<div id="objregistrados" class="tablaresumen">
</div>