<?php include("./models/HU_listar_activas/cardQuery.php"); ?>

<h1 style="text-align:center; margin-top:1vh;">Votaciones Activas</h1>
<div class="container mt-3" style="margin-top:2vh;">
    <div class="row">
        <?php foreach ($votacionActiva as $row) : ?>
            <div class="col-6">
                <div class="card" style="margin-bottom: 3vh;">
                    <div class="card-body" style="padding: 0px !important;">
                        <h5 class="card-header" style="text-align:center; background-color: #b0d482 !important "> <?php echo $row['titulo']; ?></h5>
                        <div class="container" style=" height: 15vh;">
                            <div class="row">
                                <div class="col-12">
                                    <p class="card-text" style="text-align:justify; margin-top: 1vh; margin-right:1vw;"> <?php echo $row['asunto']; ?> </p>
                                </div>
                            </div>                                 
                            <div class="row">
                                <div class="col-6">
                                    <p class="card-text" style="margin-top: 1vh;">Termina el: <?php echo $row['fecha_termino']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div style="margin-left: 33.3%;margin-top:1vw;  width: 33.33%;display: flex;align-items: center;justify-content: center;">                    
                            <a class="btn" style="background-color: #E3EAA5 !important; color: black; margin-bottom: 1vw;" href=<?= "./views/HU_votar/votar.php?id=" . $row["id"]; ?>>Entrar a votar</a>
                        </div>
                    </div>               
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>