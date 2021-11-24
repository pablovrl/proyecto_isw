<?php
require_once("../../database/db.php");
$rut = $_POST["rut"];

$query = "SELECT * FROM vecino WHERE rut='$rut'";
$vecino = mysqli_query($con, $query);

if (mysqli_num_rows($vecino) == 1) {

  // sesión usuario
  session_id("usuario");
  session_start();
  $fila = mysqli_fetch_array($vecino);
  $_SESSION['id'] = $fila['id'];
  $_SESSION['nombres'] = $fila['nombres'];
  $_SESSION['apellidos'] = $fila['apellidos'];
  $_SESSION['esAdmin'] = $fila['rol_id'] == 1 ? True : False;

  session_write_close();
  header('Location: ../../views/HU_listar_activas/activas.php');

} else {
  session_id("notlogged");
	session_start();
	$_SESSION['mensaje'] = 'Usuario incorrecto.';
	$_SESSION['sub_mensaje'] = 'Por favor inténtelo nuevamente.';
	$_SESSION['tipo'] = 'danger';
	session_write_close();
	header('Location: ../../index.php');
}

