<?php
require_once('../../database/db.php');

if (isset($_GET["id"])) {

    // Obtener titulo y asunto de la votación
    $id = $_GET["id"];
    $queryVotacion = "SELECT * FROM votacion WHERE id = $id";
    $resultVotacion = mysqli_query($con, $queryVotacion);

    if (mysqli_num_rows($resultVotacion) == 1) {
        $fila = mysqli_fetch_array($resultVotacion);
        $titulo = $fila["titulo"];
        $asunto = $fila["asunto"];
    }

    // Obtener opciones de la votación
    $queryOpciones = "SELECT * FROM opcion WHERE votacion_id = $id";
    $resultOpciones = mysqli_query($con, $queryOpciones);
}
?>

<?php require('../base/header.php'); ?>

<style>
    .sombra {
        box-shadow: rgba(0, 0, 0, 0.2) 0px 20px 30px;
    }

    .radio {
        border: solid 3px #C3D9AF;
        border-radius: 5px;
    }
    
</style>

<div class="container d-flex align-items-center justify-content-center" style="height: 90vh">
    <div class="card sombra" style="width: 35rem;">
        <div class="card-body">
            <h5 class="card-title" style="text-align: center;"><?= $titulo ?></h5>
            <h6 class="card-subtitle mb-2 text-muted p-2 text-justify"><?= $asunto ?></h6>
            <form action="../../models/HU_votar/addVoto.php" method="POST">
                <input type="hidden" name="votacion_id" value="<?= $id ?>">
                <?php $counter = 1;
                foreach ($resultOpciones as $opcion) : ?>
                    <div class="form-check radio m-2">
                        <div class="p-2">
                            <input class="form-check-input" type="radio" name="opcion" value="<?= $opcion["id"] ?>" 
                            <?php if ($counter == 1) : echo "checked"; endif;?>>
                            <label class="form-check-label" for="exampleRadios1">
                                <?= $opcion["nombre"] ?>
                            </label>
                        </div>
                    </div>
                <?php $counter++;
                endforeach; ?>
                <div class="" style="display: flex; justify-content: center;">
                    <button style="width: 200px;" type="submit" name="submit" value="submit" class="btn btn-success">Votar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require('../base/footer.php'); ?>