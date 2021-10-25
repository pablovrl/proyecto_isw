<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de votaciones terminadas</title>
  <link rel="stylesheet" href="../HU_listar_terminadas/style.css?v=<?php echo time(); ?>" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>
<body style="background-color: #C3D9AF;">  
<!-- Header -->
 <?php 
 include("../base/header.php");
 include('../../models/HU_listar_terminadas_query/card_query.php');?>
<!-- Body -->
  <h1 style="text-align:center; margin-top:1vh;">Votaciones Terminadas</h1>
  <div class="container">

<!-- Buscador SQL --> 
    <nav class="navbar navbar-light justify-content-between" style="margin-bottom: 5vh;">
      <form class="form-inline" action="" method="GET" style="margin-left: -0.8vw;">
        <input class="form-control mr-sm-2" type="text" name="busqueda" id="busqueda" placeholder="Buscar titulo de votación">
        <input class="btn my-2 my-sm-0 boton-buscador" type="submit" name="enviar" value="Buscar">
      </form>
      <?php if(isset($_GET['enviar'])){
        $busqueda = $_GET['busqueda'];
        $buscadorSQL = $con->query("SELECT *, max(opcion.cantidad_votos) as 'ganador' from votacion, opcion WHERE votacion.id = opcion.votacion_id and votacion.titulo LIKE '%$busqueda%' and votacion.fecha_termino < NOW() group by votacion.id ORDER BY `ganador` DESC;");
        $count_results = mysqli_num_rows($buscadorSQL);
      } ?>
    <?php if(isset($buscadorSQL)){ ?>
    <form class="form-inline" action="terminadas.php">
      <input class="btn my-2 my-sm-0 boton-cancelar-buscador" type="submit" value="Cancelar Busqueda" >
    </form> <?php } ?>
    </nav>

  </div>

<div class="container mt-3">

  <div class="row">
  <!-- Card List + iteracion PHP -->
    
    <?php 
    if(!isset($buscadorSQL)){ ?>
      
    <?php foreach($votacion as $row){ 
        include("../HU_listar_terminadas/card.php");
      }
    }else{ 
      if($count_results>0){
        foreach($buscadorSQL as $row){
          include("../HU_listar_terminadas/card.php");
        }
      }else{ ?>
        <div class="col-12" style="text-align: center;">
          <p>No se encuentra ninguna votación con ese titulo!</p>
        </div>
    <?php }
      
    }
   ?>                 
  </div>
</div>

</body>
<?php include("../base/footer.php"); ?>
</html>
