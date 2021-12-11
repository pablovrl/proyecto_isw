<?php
include("../../database/db.php");

$queryVo = 
"SELECT * 
FROM votacion, opcion 
WHERE votacion.id = $id and votacion.fecha_termino <= '$fechaActual' and votacion.activa = 1";
$votaciones = mysqli_query($con, $queryVo);

$queryOp = 
"SELECT * 
FROM votacion, opcion 
WHERE votacion.id = opcion.votacion_id and opcion.votacion_id = $id and votacion.fecha_termino <= '$fechaActual' and votacion.activa = 1";
$opciones = mysqli_query($con, $queryOp);