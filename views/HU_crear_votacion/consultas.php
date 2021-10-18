<?php 
    
    include("../../database/db.php");
    
session_start();

$titulo = $_SESSION['sesion']['titulo'];
$asunto = $_SESSION['sesion']['asunto'];
$fechaFin = $_SESSION['sesion']['fecha'];
$opcion = $_SESSION['sesion']['opciones'] + 1; 



/* if(isset($_GET['confirmar'])){

    for($i=0;$i<$_SESSION['sesion']['opciones'];$i++){

        echo $_GET['opcion'.$i];

    }
}
 */

  $votacion = "INSERT INTO Votacion VALUES (null,'$titulo','$asunto', true ,null,'$fechaFin',0,1)";  

   /*  $opcion = "INSERT INTO Opcion (id, nombre, votacion_id, cantidad_votos) VALUES (NULL,'sex',3,0)";
    mysqli_query($con, $opcion);   */


    mysqli_query($con, $votacion);  
    
    session_destroy();
    require("./crearVotacion.php");
   

?>