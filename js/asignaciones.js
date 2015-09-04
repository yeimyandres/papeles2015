function limpiarasignacion()
{
	$("#txtidat").val("");
	$("#txtactividadat").val("");
	$("#txtenteat").val("");
	$("#txtsupervisor").val("");
	$("#txtfecini").val("");
	$("#txtfecfin").val("");
	$("#txtidat").focus();
}

function registrarasignacion(cadena)
{
	$.ajax({
		url: '../php/registrarat.php',
		type: 'post',
		dataType: 'html',
		data: cadena,
	})
	.done(function(respuesta) {
		alert("Registro adicionado exitosamente");
		cargartablaasignacion();
	})
	.fail(function() {
		console.log("error");
	});	
}

function cargartablaasignacion()
{
	$.ajax({
		url: '../php/cargartablaasignaciones.php',
		type: 'post',
		dataType: 'html',
	})
	.done(function(respuesta) {
		$("#atregistradas").html(respuesta);
		limpiarasignacion();
	})
	.fail(function() {
		console.log("error");
	});	
}