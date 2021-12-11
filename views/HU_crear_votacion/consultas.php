<?php

include("../../database/db.php");

session_id("usuario");
session_start();
session_write_close();

if (isset($_GET['confirmar'])){
  $titulo = $_GET['titulo'];
  $asunto = $_GET['asunto'];
  $fechaFin = $_GET['fecha'];
  $opcion = $_GET['opciones'];
}

$idVecino = $_SESSION['id'];

// Crear votación en la BD

$votacion = "INSERT INTO votacion VALUES (null,'$titulo','$asunto','$fechaActual','$fechaFin',0, $idVecino,1)";

mysqli_query($con, $votacion);  

// Recibir ID de la última votación para asignarlo a las opciones

 $idVotacionSQL = "SELECT max(id) as id from votacion";
$idVotacion = mysqli_query($con, $idVotacionSQL);
$fila = mysqli_fetch_array($idVotacion);
$idVotacion = $fila["id"];  


 if (isset($_GET['confirmar'])) {

  // Crear las opciones de la votación en la BD
  for ($i = 0; $i < $opcion ; $i++) {

    $op = $_GET['opcion' . $i];
    $opciones = "INSERT INTO opcion VALUES (null,'$op',$idVotacion,0)";
    mysqli_query($con, $opciones);
  }
}  

// Crear opción de NULO
 $opciones = "INSERT INTO opcion VALUES (null,'Nulo',$idVotacion,0)";
mysqli_query($con, $opciones);   

// Mensaje de alerta para el index
session_id("mensaje");
session_start();
$_SESSION['mensaje'] = 'Se ha creado la votación correctamente!';
$_SESSION['sub_mensaje'] = '';
$_SESSION['tipo'] = 'success';
session_write_close();

header("Location: ../../views/HU_listar_activas/activas.php");