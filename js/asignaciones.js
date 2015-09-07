function borrarasignacion(idat)
{
	$.ajax({
		url: '../php/eliminarasignacion.php',
		type: 'post',
		dataType: 'html',
		data: "idat="+idat,
	})
	.done(function(respuesta) {
		alert(respuesta);
		cargartablaasignacion();
		limpiarasignacion();
	})
	.fail(function() {
		console.log("error");
	});				
}
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
		$(".linkborrara").click(function(){
			var idat = $(this).attr("id");
			borrarasignacion(idat);
		});			
	})
	.fail(function() {
		console.log("error");
	});	
}