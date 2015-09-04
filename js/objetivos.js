function limpiarobjetivo()
{
	$("#txtnumobjetivo").val("");
	$("#txtdescobjetivo").val("");
	$("#controlesenobjetivos").css("display","none");
	$("#cboasignacioneseno").val(0);
	$("#cboasignacioneseno").focus();
}

function registrarobjetivo(cadena)
{
	$.ajax({
		url: '../php/registrarobjetivo.php',
		type: 'post',
		dataType: 'html',
		data: cadena,
	})
	.done(function(respuesta) {
		alert("Registro adicionado exitosamente");
		cargartablaobjetivos();
	})
	.fail(function() {
		console.log("error");
	});	
}

function cargartablaobjetivos()
{
	$.ajax({
		url: '../php/cargartablaobjetivos.php',
		type: 'post',
		dataType: 'html',
	})
	.done(function(respuesta) {
		$("#objregistrados").html(respuesta);
		limpiarasignacion();
	})
	.fail(function() {
		console.log("error");
	});	
}