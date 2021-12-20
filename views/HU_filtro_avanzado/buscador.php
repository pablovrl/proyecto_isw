<!-- Buscador SQL -->
<?php include("../HU_votar/alerta.php"); ?>
<form class="form-inline mb-4" action="" method="GET">
    <div class="form-group">
        <input class="form-control" type="text" name="busqueda" id="busqueda" placeholder="Buscar título, asunto u opción de votación">
        <label class="mx-2" for="desde">Desde:</label>
        <input class="form-control" type="date" name="desde" value="desde" id="desde" min="2021-07-01" max="">
        <label class="mx-2" for="hasta">Hasta:</label>
        <input class="form-control" type="date" name="hasta" value="hasta" id="hasta" min="2021-07-01" max="">
        <input class="btn btn-outline-success mx-2 dis" type="submit" name="enviar" value="Buscar">
    </div>
</form>
<!-- Buscador SQL^ -->
<?php include("../../models/HU_filtro_avanzado/filtro.php");
// Si hay una busqueda valida se agregara el boton de cancelar busqueda
if (isset($buscadorSQL) || isset($buscadorSQLFecha)) { ?>
    <form class="" action="terminadas.php" style="display: inline">
        <input class="btn btn-outline-danger" type="submit" value="Cancelar Búsqueda">
    </form>
<?php } ?>