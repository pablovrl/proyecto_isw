<?php 
require_once("../../database/db.php"); 
$querySQL = "SELECT * FROM `votacion` WHERE votacion.fecha_termino > '$fechaActual' and votacion.activa = 1 ORDER BY fecha_termino ASC";
$votacionActiva = mysqli_query($con, $querySQL);

session_id("usuario");
session_start();
session_write_close();
$id_usuario = $_SESSION["id"];

$querySQL = 
"SELECT votacion.id
FROM vota, votacion, opcion op
WHERE vota.vecino_id = $id_usuario and vota.opcion_id = op.id and votacion.id = op.votacion_id";

$votosHechos = mysqli_query($con, $querySQL);

?>