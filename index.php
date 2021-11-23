<?php
session_id("notlogged");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Junta de Vecinos</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body style="background-color: #fcfcfc;">

  <div class="container-sm my-5">
    <h1>Login</h1>

    <!-- Alerta para index -->
    <?php if (isset($_SESSION['mensaje'])) : ?>
      <div class="alert alert-<?= $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
        <strong><?= $_SESSION['mensaje'] ?></strong> <?= $_SESSION['sub_mensaje'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif;
    session_destroy(); ?>

    <form method="POST" action="../proyecto_isw/models/login/iniciarSesion.php">
      <div class="form-group">
        <label for="">RUT</label>
        <input type="text" class="form-control" maxlength="10" name="rut">
        <small id="emailHelp" class="form-text text-muted">Con guión y sin puntos.</small>
      </div>
      <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
  </div>



  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>