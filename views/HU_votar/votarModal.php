<?php

// Obtener titulo y asunto de la votación
$id = $row["id"];
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

?>

<!-- Modal -->
<div class="modal fade" id=<?= "modal" . $contador ?> tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <?= $row['titulo'] ?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><?= $row['asunto'] ?></p>

                <!-- Formulario opciones -->
                <form action="../../../proyecto_isw/models/HU_votar/addVoto.php" method="POST">
                    <input type="hidden" name="votacion_id" value="<?= $id ?>">
                    <?php $counter = 1;
                    foreach ($resultOpciones as $opcion) : ?>
                        <div class="container">
                            <div class="">
                                <input type="radio" name="opcion" value="<?= $opcion["id"] ?>" <?php if ($counter == 1) : echo "checked"; endif; ?>>
                                <label class="">
                                    <?= $opcion["nombre"] ?>
                                </label>
                            </div>
                        </div>
                    <?php $counter++;
                    endforeach; ?>
                    <div class="row">
                        <button type="submit" name="submit" value="submit" class="btn btn-success col-3 offset-8">Votar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>