<?php
session_id("usuario");
session_start();
session_write_close();

if (!isset($_SESSION['nombres'])) {
	session_destroy();

	session_id("notlogged");
	session_start();
	$_SESSION['mensaje'] = 'Por favor inicie sesión antes de ingresar.';
	$_SESSION['sub_mensaje'] = 'Muchas gracias.';
	$_SESSION['tipo'] = 'danger';
	session_write_close();
	header('Location: ../../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Junta de Vecinos</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<!-- Fontawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body style="background-color: #fcfcfc;">
	<!-- NAV-BAR -->
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #87a581;">
		<span class="navbar-brand mb-0 h1">Junta de vecinos</span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item ">
					<a class="nav-link" href="../../../proyecto_isw/views/HU_listar_activas/activas.php">Votaciones activas <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="../../../proyecto_isw/views/HU_listar_terminadas/terminadas.php">Votaciones terminadas</a>
				</li>
				<?php if ($_SESSION["esAdmin"]) : ?>
					<li class="nav-item ">
						<a class="nav-link" href="/proyecto_isw/views/HU_crear_votacion/crearVotacion.php">Crear votación</a>
					</li>
				<?php endif; ?>
			</ul>
			<div class="my-2 my-lg-0">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item ">
						<a class="nav-link" href="#"><?= $_SESSION['nombres'] . " " . $_SESSION['apellidos'] ?></a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="../../models/login/cerrarSesion.php">
							<i class="fas fa-sign-out-alt"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>