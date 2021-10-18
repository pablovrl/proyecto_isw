

<?php  
    require("../base/header.php");
    
    
   $numeroName = 0; 
   $numeroOpcion = 1;

   if(isset($_GET['siguiente'])){
    
    $titulo= $_GET['titulo'];
    $asunto= $_GET['asunto'];
    $option = $_GET['opcion'];
    $fecha= $_GET['fecha'];

      $_SESSION['sesion']= array(); 
     
      $_SESSION['sesion']['titulo']= $titulo;
      $_SESSION['sesion']['asunto']= $asunto;
      $_SESSION['sesion']['opciones']= $option;
      $_SESSION['sesion']['fecha']= $fecha;
  
      
   }


  ?>


<div class="container d-flex align-items-center justify-content-center formularioContainer">  
        
        <div class="asignarOpciones">
          <form method="GET" action="<?="consultas.php"?>"> 
            <div>
              <h1 class="creacionForm">Asignación de opciones</h1>
            </div>

              <?php 
                for($i=0;$i<$option;$i++){
                  echo '<div class="opciones"><input class="form-control" type="text" name="opcion'.$numeroName++.'" placeholder="opcion'.$numeroOpcion++.'" required></div><br>';
                  
                }

                if($option==3){
                  echo '<style>.asignarOpciones{ height: 320px;}</style>';
                }else if($option==4){
                  echo '<style>.asignarOpciones{ height: 380px;}</style>';
                }

              ?>
            

              <div class="div-botonesAsignacion d-flex justify-content-between">
                  <a  name="atras" class="btn btn-success botonAtras" href=<?="crearVotacion.php?titulo=$titulo&asunto=$asunto&fecha=$fecha"?> >Atras</a>
                  <button  name="confirmar" class="btn btn-success">Confirmar</button>

              </div>
          </form>
        </div>

        
  </div>
 
 
