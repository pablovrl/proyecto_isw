<?php include('../../models/HU_listar_terminadas_query/card_query.php');
$votacionid = $row['votacion_id'];
$ganador_consulta = $con->query("SELECT * FROM opcion WHERE cantidad_votos = (SELECT MAX(cantidad_votos) FROM opcion where votacion_id = $votacionid) and votacion_id = $votacionid");
if (mysqli_num_rows($ganador_consulta) == 1) {
    $fila = mysqli_fetch_array($ganador_consulta);
    $nombre_ganador = $fila['nombre'];
} else {
    $nombre_ganador = 'Empate';
}
?>