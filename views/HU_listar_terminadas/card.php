<?php  include('../../models/HU_listar_terminadas_query/card_query.php');
    $votacionid = $row['votacion_id'];
       $ganador_consulta = $con->query("SELECT * FROM opcion WHERE cantidad_votos = (SELECT MAX(cantidad_votos) FROM opcion where votacion_id = $votacionid) and votacion_id = $votacionid");
        if(mysqli_num_rows($ganador_consulta) == 1){
            $fila = mysqli_fetch_array($ganador_consulta);
            $nombre_ganador = $fila['nombre'];
             }
?>


<div class="col-6">
    <div class="card" style="margin-bottom: 3vh;">
        <div class="card-body" style="padding: 0px !important;">
            <h5 class="card-header card-header-text" > <?php echo $row['titulo'] ?></h5>
            <div class="container">
                <p class="card-text card-asunto"><?php echo $row['asunto'] ?></p>                                 
                <div class="row">
                    <div class="col-6">
                        <p class="card-text">Cantidad de votos Total: <?php echo $row['total_votos']; ?></p>
                    </div>
                    <div class="col-6">
                        <p class="card-text">Opción ganadora: <?php echo $nombre_ganador ?>  </p>
                    </div>
                </div>
                <p class="card-text">Votos totales ganador: <?php echo $row['ganador'] ?> votos  </p>
            </div>
            <div class="centrar-boton">                    
                <a href="#" class="btn boton">Más detalles</a>
            </div>
        </div>
    </div>
</div>