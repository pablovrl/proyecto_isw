<?php

include("../../database/db.php");

session_id("usuario");
session_start();
session_write_close();

if (isset($_GET['editar'])){
    $id = $_GET['id'];
    $titulo = $_GET['titulo'];
    $asunto = $_GET['asunto'];
    $fechaFin = $_GET['fecha'];
    $estado = $_GET['estado'];
}

$idVecino = $_SESSION['id'];

$editarVotacion = "UPDATE votacion set titulo='$titulo', asunto='$asunto', fecha_termino='$fechaFin', activa=$estado WHERE id='$id'";

mysqli_query($con, $editarVotacion);  

// Mensaje de alerta para el index
session_id("mensaje");
session_start();
$_SESSION['mensaje'] = 'Se ha modificado la votación correctamente!';
$_SESSION['sub_mensaje'] = '';
$_SESSION['tipo'] = 'success';
session_write_close();

header("Location: ../../views/HU_listar_activas/activas.php");




