<?php 

require_once("./database/db.php"); 

$querySQL = "SELECT * FROM `votacion` WHERE votacion.fecha_termino > '$fechaActual' ORDER BY fecha_termino ASC";
$votacionActiva = mysqli_query($con, $querySQL);

?>