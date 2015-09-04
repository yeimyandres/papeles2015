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
				include './php/'.$seccion;
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
	<script type="text/javascript" src="../js/asignaciones.js"></script>
	<script type="text/javascript" src="../js/objetivos.js"></script>
	<script type="text/javascript" src="../js/procedimientos.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#cboasignacionesenp").change(function(){
				var idasignacion = $(this).val();
				if(idasignacion==0){
					reiniciarformularioproc();
				}else{
					traerobjetivos(idasignacion);
				}
			});
			$("#cboasignacioneseno").change(function(){
				var idasignacion = $(this).val();
				if(idasignacion==0){
					$("#controlesenobjetivos").css("display","none");
				}else{
					$("#controlesenobjetivos").css("display","block");
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
			$(".linkborrara").click(function(){
				var idat = $(this).attr("id");
				$.ajax({
					url: '../php/eliminarasignacion.php',
					type: 'post',
					dataType: 'html',
					data: "id="+idat,
				})
				.done(function(respuesta) {
					alert(respuesta);
					cargartablaasignaciones();
				})
				.fail(function() {
					console.log("error");
				});				
			});
			$(".linkborraro").click(function(){
				var idobjetivo = $(this).attr("id");
				$.ajax({
					url: '../php/eliminarobjetivo.php',
					type: 'post',
					dataType: 'html',
					data: "id="+idobjetivo,
				})
				.done(function(respuesta) {
					alert(respuesta);
					cargartablaobjetivos();
				})
				.fail(function() {
					console.log("error");
				});				
			});			
		});

	</script>

</html>