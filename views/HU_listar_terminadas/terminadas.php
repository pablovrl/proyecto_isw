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
  <?php include("../HU_filtro_avanzado/filtro.php") ?>
  </div>
  <div class="row justify-content-center">
<!-- Card List + iteracion PHP -->
    <?php
//Si no existe una busqueda imprime todas las votaciones terminadas
    if (!isset($buscadorSQL)) { ?>
      <?php foreach ($votacion as $row) {
        include("../HU_listar_terminadas/card.php");
      }
    } else {
//Si hay una busqueda se imprime el resultado de la busqueda
      if ($count_results > 0) {
        foreach ($buscadorSQL as $row) {
          include("../HU_listar_terminadas/card.php");
        }
      }else { 
//Si no hay un resultado en la busqueda imprime que no hay resultados
        include("../HU_listar_terminadas/no-card.php");
      }
    }?>
  </div>
</div>
<script src="fechaTermino.js"></script>
<?php include("../base/footer.php");?>

