function reiniciarformularioproc(){
	$("#listaobjetivosenproc").hide();
	$("#txtnumprocedimiento").val("");
	$("#txtdescprocedimiento").val("");
	$("#txtfeciniprocedimiento").val("");
	$("#txtfecfinprocedimiento").val("");
	$("#camposdetextoenproc").hide();
	$("#procregistrados").hide();
}

function traerobjetivos(idasignacion){
	$.ajax({
		url: '../php/traerobjetivos.php',
		type: 'POST',
		dataType: 'html',
		data: "idasignacion="+idasignacion,
	})
	.done(function(resultado) {
		if(resultado!=""){
			$("#listaobjetivosenproc").html(resultado);
			$("#listaobjetivosenproc").css("display","block");
			$("#cboobjetivos").change(function(){
				var idobjetivo = $(this).val();
				if (idobjetivo==0){
					$("#contenidoobjetivo").hide();
					$("#camposdetextoenproc").hide();
					$("procregistrados").hide();
				}else{
					$.ajax({
						url: '../php/presentarobjetivo.php',
						type: 'POST',
						dataType: 'html',
						data: "idobjetivo="+idobjetivo,
					})
					.done(function(resultado2) {
						$("#contenidoobjetivo").html(resultado2);
						$("#contenidoobjetivo").show();
						$("#camposdetextoenproc").show();
						cargartablaprocedimientos(idasignacion,idobjetivo);
						$("#procregistrados").show();
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