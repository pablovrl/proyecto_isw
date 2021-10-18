<?php include("./models/HU_listar_activas/cardQuery.php"); ?>

<div class="container mt-3" style="margin-top:2vw;">
    <div class="row">
        <?php foreach ($votacionActiva as $row) : ?>
                <div class="col-6">
                    <div class="card" style="margin-bottom: 3vh;">
                        <div class="card-body" style="padding: 0px !important;">
                            <h5 class="card-header" style="text-align:center; background-color: #b0d482 !important "> <?php echo $row['titulo']; ?></h5>
                            <div class="container">
                                <p class="card-text"style="margin-top: 1vw; margin-right:1vw;"> <?php echo $row['asunto']; ?> </p>                                 
                                <div class="row">
                                    <div class="col-6">
                                        <p class="card-text">Termina el: <?php echo $row['fecha_termino']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-left: 33.3%;margin-top:1vw;  width: 33.33%;display: flex;align-items: center;justify-content: center;">                    
                                <a class="btn" style="background-color: #E3EAA5 !important; color: black; margin-bottom: 1vw;" href=<?= "views/votar.php?id=" . $row["id"]; ?>>Entrar a votar</a>
                            </div>
                        </div>               
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
</div>