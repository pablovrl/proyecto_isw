<?php 

require_once("./database/db.php"); 

$querySQL = "SELECT * FROM `votacion` WHERE esta_activa = '1' ORDER BY fecha_termino ASC";
$votacionActiva = mysqli_query($con, $querySQL);

?>