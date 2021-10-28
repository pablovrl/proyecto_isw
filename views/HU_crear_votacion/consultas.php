<?php

include("../../database/db.php");

session_start();

// Recibir datos de la sesión
$titulo = $_SESSION['sesion']['titulo'];
$asunto = $_SESSION['sesion']['asunto'];
$fechaFin = $_SESSION['sesion']['fecha'];
$opcion = $_SESSION['sesion']['opciones'] + 1;

// Crear votación en la BD
$votacion = "INSERT INTO Votacion VALUES (null,'$titulo','$asunto',null,'$fechaFin',0,1)";

mysqli_query($con, $votacion);

// Recibir ID de la última votación para asignarlo a las opciones
$idVotacionSQL = "SELECT max(id) as id from votacion";
$idVotacion = mysqli_query($con, $idVotacionSQL);
$fila = mysqli_fetch_array($idVotacion);
$idVotacion = $fila["id"];


if (isset($_GET['confirmar'])) {

  // Crear las opciones de la votación en la BD
  for ($i = 0; $i < $_SESSION['sesion']['opciones']; $i++) {

    $op = $_GET['opcion' . $i];
    $opciones = "INSERT INTO opcion VALUES (null,'$op',$idVotacion,0)";
    mysqli_query($con, $opciones);
  }
}

// Crear opción de NULO
$opciones = "INSERT INTO opcion VALUES (null,'Nulo',$idVotacion,0)";
mysqli_query($con, $opciones);

// Mensaje de alerta para el index
$_SESSION['mensaje'] = 'Se ha creado la votación correctamente!';
$_SESSION['sub_mensaje'] = '';
$_SESSION['tipo'] = 'success';

header("Location: ../../index.php");
