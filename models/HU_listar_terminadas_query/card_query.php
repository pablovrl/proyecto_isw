<?php
include("../../database/db.php");

$query = "SELECT *, max(opcion.cantidad_votos) as 'ganador' from votacion, opcion WHERE votacion.id = opcion.votacion_id and votacion.fecha_termino <= '$fechaActual' and votacion.activa = 1 group by votacion.id ORDER BY `ganador` DESC;
";
$votacion = mysqli_query($con, $query);
