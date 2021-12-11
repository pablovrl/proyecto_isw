<?php
include("../../views/base/header.php");
$id = intval($_GET['id']);
include("../../models/HU_mostrar_detalles/queryDetalles.php");

$queryVotacion = "SELECT * FROM votacion WHERE votacion.id = $id";
$votacion = mysqli_query($con, $queryVotacion);

$queryOpciones = "SELECT * FROM opcion WHERE opcion.votacion_id = $id";
$opciones = mysqli_query($con, $queryOpciones);

$votacion = mysqli_fetch_array($votacion);
?>

<div class="container">
<div class="row justify-content-center my-4">
    <h2 class="">Detalles</h2>
</div>
    <div class="col-12 col-lg-12 mb-4">
        <div class="card text-center shadow h-100">
            <div class="card-header font-weight-bold">
            <p class="card-text"><?= $votacion["titulo"] ?></p>
            </div>
            <div class="card-body">
                <p class="card-text"><?= $votacion["asunto"] ?></p>
                <?php include("pie_graphic.php") ?>
            </div>
        </div>
    </div>
</div>

<?php
include("../../views/base/footer.php");
?>