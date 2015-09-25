<!DOCTYPE html>

<html lang="es">

	<head>
		<title>WorkPapers2015</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="../css/estilos.css">
		<link rel="shortcut icon" href="../img/favicon.ico" />
	</head>

	<body>

		<header>
			<figure>
				<a href="../inicio.php">
					<img src="../img/logo.png" alt="WorkPapers">
				</a>
			</figure>
			<h1>Work Papers 2015</h1>
			<p class="slogan">Registro y Control de Papeles de Trabajo</p>
		</header>

		<nav>
			<ul>
				<li><a href="../secciones/asignaciones">Asignaciones SICA</a></li>
				<li><a href="../secciones/objetivos">Objetivos Asignación</a></li>
				<li><a href="../secciones/procedimientos">Control Procedimientos</a></li>
				<li><a href="../secciones/desarrollo">Desarrollo Auditoría</a></li>
				<li><a href="../secciones/anexos">Anexos Papeles</a></li>
				<li><a href="../secciones/conclusiones">Conclusiones Procedimientos</a></li>
				<li><a href="../secciones/traslados">Traslados hallazgos</a></li>
			</ul>
		</nav>

		<section class="contenedor">
			<?php
				$seccion = $_GET["id"];
				include './php/'.$seccion.".php";
			?>
		</section>

		<footer>
			<p class="piedepagina">2015</p>
			<p class="piedepagina">Yeimy Andrés Arteaga Guerrón</p>
			<p class="piedepagina">Gerencia Departamental Colegiada Valle del Cauca</p>
			<p class="piedepagina">Contraloría General de la República</p>
		</footer>

	</body>

	<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" <?php echo "src='../js/".$seccion.".js'"; ?> ></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#cboasignacionesenp").change(function(){
				var idasignacion = $(this).val();
				reiniciarformularioproc();
				if(idasignacion==0){
					$("#procregistrados").hide();
				}else{
					traerobjetivos(idasignacion);
				}
			});
			$("#cboasignacioneseno").change(function(){
				var idasignacion = $(this).val();
				if(idasignacion==0){
					$("#controlesenobjetivos").css("display","none");
					$("#objregistrados").css("display","none");
				}else{
					$("#controlesenobjetivos").css("display","block");
					$("#objregistrados").css("display","block");
					cargartablaobjetivos(idasignacion);
				}				
			});
			$("#cboasignacionesend").change(function(){
				var idasignacion = $(this).val();
				reiniciarformulariodes();
				if(idasignacion==0){
					$("#desregistrados").hide();
				}else{
					traerobjetivos(idasignacion);
				}				
			});			
			$("#btnregistrarat").click(function(){
				var cadena = "idat="+$("#txtidat").val();
				cadena += "&actividad="+$("#txtactividadat").val();
				cadena += "&ente="+$("#txtenteat").val();
				cadena += "&supervisor="+$("#txtsupervisor").val();
				cadena += "&fecini="+$("#txtfecini").val();
				cadena += "&fecfin="+$("#txtfecfin").val();
				registrarasignacion(cadena);
			});
			$("#btnregistrarobj").click(function(){
				var cadena = "idasignacion="+$("#cboasignacioneseno").val();
				cadena += "&numobjetivo="+$("#txtnumobjetivo").val();
				cadena += "&descobjetivo="+$("#txtdescobjetivo").val();
				registrarobjetivo(cadena);
			});
			$("#btnregistrarproc").click(function(){
				var cadena = "idobj="+$("#cboobjetivos").val();
				cadena += "&numproc="+$("#txtnumprocedimiento").val();
				cadena += "&descproc="+$("#txtdescprocedimiento").val();
				cadena += "&feciniproc="+$("#txtfeciniprocedimiento").val();
				cadena += "&fecfinproc="+$("#txtfecfinprocedimiento").val();
				registrarprocedimiento(cadena);
			});				
			$("#btnregistrardllo").click(function(){
				var tipodllo = $("#txtselecciondllo").val();
				var cadena = "";
/*				switch(tipodllo){
					case '1':
						cadena += "desarrollo="+$("#txtdesarrollogeneral").val();
					case '2':
						cadena += "criterio="+$("#txtcriterio").val();
						cadena += "&fuentecriterio="+$("#txtfuentedecriterio").val();
						cadena += "&condicion="+$("#txtcondicion").val();
						cadena += "&causa="+$("#txtcausa").val();
						cadena += "&efecto="+$("#txtefecto").val();
						cadena += "&disciplinaria="+$("#optdisciplinaria").val();
						cadena += "&fiscal="+$("#optfiscal").val();
						cadena += "&penal="+$("#optpenal").val();
					case '3':
						cadena += "";
						cadena += "";
						cadena += "";
						cadena += "";
					case '4':
						cadena += "";
						cadena += "";
						cadena += "";
						cadena += "";
				}*/
				var disciplinaria = $("#optdisciplinaria").attr("checked");
				var fiscal = $("#optfiscal").attr("checked");
				var penal = $("#optpenal").attr("checked");
				alert("Valor Disciplinaria: "+disciplinaria+", Valor Fiscal: "+fiscal+", Valor Penal: "+penal);
			});
			$(".linkborrara").click(function(){
				var idat = $(this).attr("id");
				borrarasignacion(idat);
			});
			$(".linkborraro").click(function(){
				var idobjetivo = $(this).attr("id");
				borrarobjetivo(idobjetivo);
			});
			$(".linkborrarp").click(function(){
				var idprocedimiento = $(this).attr("id");
				borrarprocedimiento(idprocedimiento);
			});				
		});

	</script>

</html>