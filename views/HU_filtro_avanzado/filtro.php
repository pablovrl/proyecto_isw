<!-- Buscador SQL -->
<form class="form-inline mb-4" action="" method="GET">
    <div class="form-group">
    <input class="form-control" type="text" name="busqueda" id="busqueda" placeholder="Buscar título de votación" required>
    <label class="mx-2" for="desde">Desde:</label>
    <input class="form-control" type="date" name="desde" value="desde" id="desde" min="2021-07-01" max="2021-12-31"  required>
    <label class="mx-2" for="desde">Hasta:</label>
    <input class="form-control" type="date" name="hasta" value="hasta" id="hasta" min="2021-07-01" max="2021-12-31"  required>
    <input class="btn btn-outline-success mx-2" type="submit" name="enviar" value="Buscar">
    </div>
</form>
<?php if (isset($_GET['enviar'])) {
    $busqueda = $_GET['busqueda'];
    $fechaInicio = $_GET['desde'];
    $fechaTermino = $_GET['hasta'];
    $buscadorSQL = $con->query("SELECT *, max(opcion.cantidad_votos) as 'ganador' from votacion, opcion WHERE votacion.id = opcion.votacion_id and 
    (votacion.titulo LIKE '%$busqueda%' or votacion.asunto LIKE '%$busqueda%' or opcion.nombre LIKE '%$busqueda%') 
    and votacion.fecha_termino BETWEEN ('$fechaInicio' and '$fechaTermino') and votacion.fecha_termino < NOW() and
    votacion.activa = 1 group by votacion.id ORDER BY `ganador` DESC;");
    if($fechaInicio < $fechaTermino){    
        if (mysqli_num_rows($buscadorSQL) <= 1) {
            $count_results = mysqli_num_rows($buscadorSQL);
        }else{
            $count_results = 0;
        }
    }else{
        $count_results = 0;
    }
} ?>
<!-- Si hay una busqueda SQL se agregara el boton de cancelar busqueda-->
<?php if (isset($buscadorSQL)) {?>
    <form class="" action="terminadas.php" style="display: inline">
        <input class="btn btn-outline-danger" type="submit" value="Cancelar Búsqueda">
    </form> 
<?php }?>


