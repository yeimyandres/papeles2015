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
			<h1>Work Papers 2015</h1>
			<p class="slogan">Registro y Control de Papeles de Trabajo</p>
			<figure>
				<a href="">
					<img src="" alt="">
				</a>
			</figure>
		</header>

		<nav>
			<ul>
				<li><a href="../secciones/asignaciones">Asignaciones SICA</a></li>
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

</html>