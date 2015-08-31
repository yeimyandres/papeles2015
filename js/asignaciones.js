function registrarasignacion(cadena)
{
	$.ajax({
		url: '../php/registrarat.php',
		type: 'post',
		dataType: 'html',
		data: cadena,
	})
	.done(function(respuesta) {
		if (respuesta=="S"){

		}else{

		}
	})
	.fail(function() {
		console.log("error");
	});	
}

function cargartablaresumen()
{
	$.ajax({
		url: '/path/to/file',
		type: 'default GET (Other values: POST)',
		dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {param1: 'value1'},
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
}