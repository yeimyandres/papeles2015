function reiniciarformulariodes(){
	$("#listaobjetivosend").hide();
	$("#listaprocedimientosend").hide();
	$("#tipodesarrollo").hide();
/*	$("#txtnumprocedimiento").val("");
	$("#txtdescprocedimiento").val("");
	$("#txtfeciniprocedimiento").val("");
	$("#txtfecfinprocedimiento").val("");*/
	$("#camposdetextoend").hide();
	$("#desregistrados").hide();
}

function mostrarformulario(){

	

}

function traerobjetivos(idasignacion){
	$.ajax({
		url: '../php/traerobjetivos2.php',
		type: 'POST',
		dataType: 'html',
		data: "idasignacion="+idasignacion,
	})
	.done(function(resultado) {
		if(resultado!=""){
			$("#listaobjetivosend").html(resultado);
			$("#listaobjetivosend").show();
			$("#cboobjetivos").change(function(){
				var idobjetivo = $(this).val();
				if (idobjetivo==0){
					$("#contenidoobjetivo").hide();
					$("#listaprocedimientosend").hide();
					$("#camposdetextoend").hide();
					$("#desregistrados").hide();
				}else{
					$.ajax({
						url: '../php/traerprocedimientos.php',
						type: 'POST',
						dataType: 'html',
						data: "idobjetivo="+idobjetivo,
					})
					.done(function(resultado2){
						$("#listaprocedimientosend").html(resultado2);
						$("#listaprocedimientosend").show();
						$("#cboprocedimientos").change(mostrarformulario);
					})
					.fail(function() {
						console.log("error");
					});
				}
			});
		}else{
			alert("no hay objetivos relacionados");
		}
	})
	.fail(function() {
		console.log("error");
	});	
}

function borrarprocedimiento(idprocedimiento)
{
	$.ajax({
		url: '../php/eliminarprocedimiento.php',
		type: 'post',
		dataType: 'html',
		data: "idproc="+idprocedimiento,
	})
	.done(function(respuesta) {
		alert(respuesta);
		cargartablaprocedimientos($("#cboasignacionesenp").val(),$("#cboobjetivos").val());
	})
	.fail(function() {
		console.log("error");
	});				
}

function registrarprocedimiento(cadena)
{
	$.ajax({
		url: '../php/registrarprocedimiento.php',
		type: 'post',
		dataType: 'html',
		data: cadena,
	})
	.done(function(respuesta) {
		alert("Registro adicionado exitosamente");
		reiniciarformularioproc();
		$("#cboasignacionesenp").val("0");
	})
	.fail(function() {
		console.log("error");
	});	
}

function cargartablaprocedimientos(idat,idobjetivo)
{
	$.ajax({
		url: '../php/cargartablaprocedimientos.php',
		type: 'post',
		dataType: 'html',
		data: "idat="+idat+"&idobj="+idobjetivo,
	})
	.done(function(respuesta) {
		$("#procregistrados").html(respuesta);
		$(".linkborrarp").click(function(){
			var idprocedimiento = $(this).attr("id");
			borrarprocedimiento(idprocedimiento);
		});			
	})
	.fail(function() {
		console.log("error");
	});	
}