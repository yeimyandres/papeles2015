function borrarobjetivo(idobjetivo)
{
	alert("id de objetivo = "+idobjetivo);
	$.ajax({
		url: '../php/eliminarobjetivo.php',
		type: 'post',
		dataType: 'html',
		data: "idobj="+idobjetivo,
	})
	.done(function(respuesta) {
		alert(respuesta);
		cargartablaobjetivos();
	})
	.fail(function() {
		console.log("error");
	});				
}

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
		limpiarobjetivo();
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
		limpiarobjetivo();
		$(".linkborraro").click(function(){
			var idobjetivo = $(this).attr("id");
			borrarobjetivo(idobjetivo);
		});			
	})
	.fail(function() {
		console.log("error");
	});	
}