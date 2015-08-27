function reiniciarformularioproc(){
	$("#listaobjetivosenproc").hide();
	$("#camposdetextoenproc").hide();
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
					$("#contenidoobjetivo").css("display","none");
					$("#camposdetextoenproc").css("display","none");
				}else{
					$.ajax({
						url: '../php/presentarobjetivo.php',
						type: 'POST',
						dataType: 'html',
						data: "idobjetivo="+idobjetivo,
					})
					.done(function(resultado2) {
						$("#contenidoobjetivo").html(resultado2);
						$("#contenidoobjetivo").css("display","block");
						$("#camposdetextoenproc").css("display","block");
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