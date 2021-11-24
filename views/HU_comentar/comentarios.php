<?php
require("../../views/base/header.php");
$id = intval($_GET['id']);
require("../../models/HU_comentar/getComentarios.php")
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center my-4">COMENTARIOS</h2>
      <?php if (mysqli_num_rows($comentarios) == 0) : ?>
        <h3 class="text-center">Aún no hay comentarios, escribe el primero!</h3>
      <?php endif; ?>
    </div>
  </div>

  <div class="row">
    <!-- Button trigger modal -->
    <div class="col-md-12 d-flex justify-content-center my-2">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Escribe un comentario!
      </button>
    </div>
  </div>

  <div class="row"></div>

  <div style="height: 80vh; overflow-y: auto;">
    <?php foreach ($comentarios as $row) : ?>
      <div class="card my-2 shadow-sm" style="width: 100%;">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted"><?= $row["nombres"] . " " . $row["apellidos"] ?></h6>
          <p class="card-text"><?= $row["contenido"] ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añade un nuevo comentario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../../models/HU_comentar/addComentario.php" method="POST">
          <input type="hidden" name="id" value=<?= $id ?>>
          <div class="form-group">
            <input class="form-control" type="text" name="comentario" placeholder="Escribe aquí tu comentario">
          </div>
          <div class="form-group">
            <button class="btn btn-primary float-right" type="submit" name="submit">Comentar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  require("../../views/base/footer.php");
  ?>