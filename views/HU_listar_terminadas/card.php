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



<div class="col-12 col-lg-6 mb-4">
    <div class="card text-center shadow h-100">
        <div class="card-header font-weight-bold">
            <?= $row['titulo'] ?>
        </div>
        <div class="card-body">
            <p class="card-text"><?= $row['asunto'] ?></p>
            <p class="card-text "> <strong>Votos totales: </strong> <?= $row['total_votos'] ?></p>
            <p class="card-text "><strong>Opción ganadora: </strong>  <?=$nombre_ganador?> con <strong> <?=$row['ganador']?> </strong> votos</p>
            <a href="#" class="btn btn-success">Más detalles</a>
        </div>
        <div class="card-footer text-muted">
            <span class=""> <strong>Terminó</strong> <?= $row['fecha_termino'] ?></span>
        </div>
    </div>
</div>