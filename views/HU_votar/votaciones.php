<?php require('./models/HU_votar/votacionesBackend.php'); ?>

<div>
    <?php foreach ($votaciones as $votacion) : ?>
        <div>
            <h3 style="display: inline;"><?= "ID: " . $votacion["id"] . " " . $votacion["titulo"] ?></h3>
            <a class="btn btn-primary" href=<?= "./views/HU_votar/votar.php?id=" . $votacion["id"] ?>>votar</a>
        </div>
    <?php endforeach; ?>
</div>