<?php 
session_id("mensaje");
session_start();
?>

<!-- Alerta para index -->
<?php if (isset($_SESSION['mensaje'])) : ?>
    <div class="alert alert-<?= $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
        <h1>hola</h1>
        <strong><?= $_SESSION['mensaje'] ?></strong> <?= $_SESSION['sub_mensaje'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; session_destroy(); ?>