<?php
include_once("../../database/db.php");

session_id("usuario");
session_start();
session_write_close();

if(isset($_POST['submit'])) {
  $id_votacion = intval($_POST['id']);
  $comentario = $_POST['comentario'];
  $id_user = intval($_SESSION['id']);

  echo "VOTACION: ".$id_votacion;
  echo "USUARIO: ".$id_user;
  echo "COMENTARIO: ".$comentario;

  $query = "INSERT INTO comentario VALUES (null, '$comentario', $id_user, $id_votacion)";
  mysqli_query($con, $query);
}

header("Location: ../../views/HU_comentar/comentarios.php?id=".$id_votacion);