function borrarobjetivo(idobjetivo)
{
	$.ajax({
		url: '../php/eliminarobjetivo.php',
		type: 'post',
		dataType: 'html',
		data: "idobj="+idobjetivo,
	})
	.done(function(respuesta) {
		alert(respuesta);
		cargartablaobjetivos($("#cboasignacioneseno").val());
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
	$("#objregistrados").css("display","none");
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
		limpiarobjetivo();
	})
	.fail(function() {
		console.log("error");
	});	
}

function cargartablaobjetivos(idat)
{
	$.ajax({
		url: '../php/cargartablaobjetivos.php',
		type: 'post',
		dataType: 'html',
		data: "idat="+idat,
	})
	.done(function(respuesta) {
		$("#objregistrados").html(respuesta);
		$(".linkborraro").click(function(){
			var idobjetivo = $(this).attr("id");
			borrarobjetivo(idobjetivo);
		});			
	})
	.fail(function() {
		console.log("error");
	});	
}