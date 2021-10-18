<div>
    <?php if (isset($_SESSION['mensaje'])) : ?>
        <div class="alert alert-<?= $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
            <strong><?= $_SESSION['mensaje'] ?></strong> <?= $_SESSION['sub_mensaje'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php session_unset(); session_destroy(); endif; ?>
</div>