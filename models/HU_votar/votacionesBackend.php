<?php

require_once("./database/db.php");

$consultaSQL = "SELECT * FROM votacion";
$votaciones = mysqli_query($con, $consultaSQL);