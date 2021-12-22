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
    <!-- Filtro de Busqueda -->
    <?php include("../HU_filtro_avanzado/buscador.php"); ?>
  </div>
  <div class="row justify-content-center">
    <!-- Card List + iteracion PHP -->
    <?php
    //Si no existe una busqueda imprime todas las votaciones terminadas
    if (!isset($buscadorSQL) && !isset($buscadorSQLFecha)) { ?>
    <?php foreach ($votacion as $row) {
        include("../HU_listar_terminadas/card.php");
      }
    }
    if (isset($buscadorSQLFecha)) {
      if (mysqli_num_rows($buscadorSQLFecha) > 0) {
        foreach ($buscadorSQLFecha as $row) {
          include("../../views/HU_listar_terminadas/card.php");
        }
      } else {
        include("../../views/HU_filtro_avanzado/no-card-fecha.php");
      }
    }
    if (isset($buscadorSQL) && !isset($buscadorSQLFecha)) {
      //Si hay una busqueda se imprime el resultado de la busqueda
      if ($count_results > 0) {
        foreach ($buscadorSQL as $row) {
          include("../HU_listar_terminadas/card.php");
        }
      }
      //Si no hay un resultado en la busqueda imprime que no hay resultados
      if ($count_results == 0) {
        include("../HU_listar_terminadas/no-card.php");
      }
    }

    ?>
  </div>
</div>
<script src="fechaTermino.js"></script>
<?php include("../base/footer.php"); ?>