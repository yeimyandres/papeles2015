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
		cargartablaresumen();
	})
	.fail(function() {
		console.log("error");
	});	
}

function cargartablaresumen()
{
	$.ajax({
		url: '../php/cargartablaasignaciones.php',
		type: 'post',
		dataType: 'html',
	})
	.done(function(respuesta) {
		$("#atregistradas").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	});	
}