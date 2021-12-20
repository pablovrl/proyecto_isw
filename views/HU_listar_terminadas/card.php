<?php include('../../models/HU_listar_terminadas_query/ganador_query.php'); ?>

<div class="col-12 col-lg-6 mb-4">
    <div class="card text-center shadow h-100">
        <div class="card-header font-weight-bold">
            <?= $row['titulo'] ?>
        </div>
        <div class="card-body">
            <p class="card-text"><?= $row['asunto'] ?></p>
            <p class="card-text "> <strong>Votos totales: </strong> <?= $row['total_votos'] ?></p>
            <p class="card-text "><strong>Opción ganadora: </strong> <?= $nombre_ganador ?> con <strong> <?= $row['ganador'] ?> </strong> votos</p>
            <a href=<?= "../HU_mostrar_detalles/detalles.php?id=" . $row['votacion_id'] ?> class="btn btn-success">Más detalles</a>
            <a href=<?= "../HU_comentar/comentarios.php?id=" . $row['votacion_id'] ?> class="btn btn-success">Comentar</a>
        </div>
        <div class="card-footer text-muted">
            <?php
            // Formateando la fecha
            $fechaFormateada = explode(' ', $row['fecha_termino']);
            $fechaSeparada = explode('-', $fechaFormateada[0]);
            $horaTermino = $fechaFormateada[1];
            $fechaTermino = $fechaSeparada[2] . '/' . $fechaSeparada[1] . '/' . $fechaSeparada[0];
            ?>
            <span class=""> <strong>Terminó</strong> <?= "el " . $fechaTermino . " a las " . $horaTermino ?></span>
        </div>
    </div>
</div>