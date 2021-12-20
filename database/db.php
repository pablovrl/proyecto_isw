<?php

date_default_timezone_set("America/Santiago");
$fechaActual = date("Y-m-d H:i");


$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "proyecto_isw";

// Credenciales servidor
// $db_host = "mysql.face.ubiobio.cl";
// $db_user = "g3soft";
// $db_pass = "g3isw2021";
// $db_name = "3soft2021";


$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
    echo "No se pudo conectar a la base de datos.";
}
