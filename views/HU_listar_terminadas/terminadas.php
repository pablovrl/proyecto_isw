<!-- Header -->
<?php
include("../base/header.php");
include('../../models/HU_listar_terminadas_query/card_query.php');
?>

<!-- Body -->
<div class="container">

  <div class="row justify-content-center my-4">
    <h2 class="">Votaciones Terminadas</h2>
  </div>

  <div class="row justify-content-center">
    
    <!-- Buscador SQL -->
    <form class="form-inline mb-4" action="" method="GET">
      <div class="form-group">
        <input class="form-control" type="text" name="busqueda" id="busqueda" placeholder="Buscar titulo de votación">
        <input class="btn btn-outline-success mx-2" type="submit" name="enviar" value="Buscar">
      </div>
    </form>
    <?php if (isset($_GET['enviar'])) {
      $busqueda = $_GET['busqueda'];
      $buscadorSQL = $con->query("SELECT *, max(opcion.cantidad_votos) as 'ganador' from votacion, opcion WHERE votacion.id = opcion.votacion_id and votacion.titulo LIKE '%$busqueda%' and votacion.fecha_termino < NOW() group by votacion.id ORDER BY `ganador` DESC;");
      $count_results = mysqli_num_rows($buscadorSQL);
    } ?>
    <?php if (isset($buscadorSQL)) { ?>
      <form class="" action="terminadas.php" style="display: inline">
        <input class="btn btn-outline-danger" type="submit" value="Cancelar Busqueda">
      </form> <?php } ?>
  </div>

  <div class="row justify-content-center">
    <!-- Card List + iteracion PHP -->
    <?php
    if (!isset($buscadorSQL)) { ?>

      <?php foreach ($votacion as $row) {
        include("../HU_listar_terminadas/card.php");
      }
    } else {
      if ($count_results > 0) {
        foreach ($buscadorSQL as $row) {
          include("../HU_listar_terminadas/card.php");
        }
      } else { ?>
        <div class="col-12" style="text-align: center;">
          <p>No se encuentra ninguna votación con ese titulo!</p>
        </div>
    <?php }
    }
    ?>
  </div>
</div>

<?php include("../base/footer.php"); ?>