<?php
include_once("../../database/db.php");

$query = 
"SELECT * 
FROM comentario c, vecino ve, votacion vo
WHERE c.votacion_id = vo.id and c.vecino_id = ve.id and vo.id = $id";

$comentarios = mysqli_query($con, $query);