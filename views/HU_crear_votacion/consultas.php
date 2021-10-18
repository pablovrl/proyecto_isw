<?php 
    
    include("../../database/db.php");
    
session_start();

$titulo = $_SESSION['sesion']['titulo'];
$asunto = $_SESSION['sesion']['asunto'];
$fechaFin = $_SESSION['sesion']['fecha'];
$opcion = $_SESSION['sesion']['opciones'] + 1; 

    $votacion = "INSERT INTO Votacion VALUES (null,'$titulo','$asunto', true ,null,'$fechaFin',0,1)";  

    mysqli_query($con,$votacion);
    
    $idVotacionSQL = "SELECT max(id) as id from votacion";
    $idVotacion = mysqli_query($con,$idVotacionSQL);
    $fila = mysqli_fetch_array($idVotacion);
    $idVotacion = $fila["id"];

  if(isset($_GET['confirmar'])){

    for($i=0;$i<$_SESSION['sesion']['opciones'];$i++){

        $op = $_GET['opcion'.$i];
        $opciones = "INSERT INTO opcion VALUES (null,'$op',$idVotacion,0)";  
        mysqli_query($con,$opciones);
    }
  } 

    $opciones = "INSERT INTO opcion VALUES (null,'Nulo',$idVotacion,0)";  
    mysqli_query($con,$opciones);
   
    session_destroy();
    header("Location: ../../index.php"); 
   

?>