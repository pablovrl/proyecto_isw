<?php
include("../../views/base/header.php");
include("../../models/HU_listar_activas/cardQuery.php");
include("../HU_votar/alerta.php");
?>

<div class="container">
  <div class="row justify-content-center my-4">
    <h2 class="">Votaciones Activas</h2>
  </div>

  <div class="row justify-content-center">
    <?php $contador = 1;
    foreach ($votacionActiva as $row) : ?>
      <?php
      $votoHecho = "";
      $mensajeBoton = "Ir a votar!";
      foreach ($votosHechos as $votacion) {
        if ($votacion['id'] == $row['id']) {
          $votoHecho = "disabled";
          $mensajeBoton = "Tu voto ya ha sido guardado!";
          break;
        }
      }
      ?>
      <div class="col-12 col-lg-6 mb-4">
        <div class="card text-center shadow h-100">
          <div class="card-header font-weight-bold">
            <?= $row['titulo'] ?>
          </div>
          <div class="card-body">
            <p class="card-text"><?= $row['asunto'] ?></p>
            <p class="card-text"> <strong> <?= $row['total_votos'] ?> </strong> personas ya han votado, ¿Qué esperas? </p>
            <button <?= $votoHecho ?> type="button" class="btn btn-success" data-toggle="modal" data-target=<?= "#modal" . $contador ?>><?=$mensajeBoton?></button>
          </div>
          <div class="card-footer text-muted">
            <?php
            // Formateando la fecha
            $fechaFormateada = explode(' ', $row['fecha_termino']);
            $fechaSeparada = explode('-', $fechaFormateada[0]);
            $horaTermino = $fechaFormateada[1];
            $fechaTermino = $fechaSeparada[2] . '/' . $fechaSeparada[1] . '/' . $fechaSeparada[0];
            ?>
            <span class=""> <strong>Termina </strong> <?= "el " . $fechaTermino . " a las " . $horaTermino ?></span>
          </div>
        </div>
      </div>
      <?php require("../HU_votar/votarModal.php") ?>
    <?php $contador++;
    endforeach; ?>
  </div>
</div>

<?php
include("../../views/base/footer.php");
?>