

<?php  
    require("../base/header.php");
    
    
   $numeroName = 0; 
   $numeroOpcion = 1;

   // Almacenar datos en la sesión
   if(isset($_GET['siguiente'])){
    
    $titulo= $_GET['titulo'];
    $asunto= $_GET['asunto'];
    $option = $_GET['opcion'];
    $fecha= $_GET['fecha'];
  
      
   }


  ?>


<div class="container col-12 d-flex align-items-center justify-content-center"
      style="height: 94vh">  
        
        <div class="shadow-lg p-3 mb-5 col-sm-10 col-lg-7">
        
            <form method="GET" action="<?="consultas.php"?>"> 
              <div class="col-12 mt-1 pl-2 mb-3">
                <h1 class="h1">Asignación de opciones</h1>
              </div>

                <?php 
                  for($i=0;$i<$option;$i++){
                    echo '<div class="col-12 pl-2"><input class="form-control rounded-lg" type="text" name="opcion'.$numeroName++.'" placeholder="opcion'.$numeroOpcion++.'" required></div><br>';
                    
                  }

                  if($option==3){
                    echo '<style>.asignarOpciones{ height: 320px;}</style>';
                  }else if($option==4){
                    echo '<style>.asignarOpciones{ height: 380px;}</style>';
                  }

                ?>
              

                <div class="col-12">
                    <!-- <a name="atras" class="btn btn-success botonAtras" href=>Atras</a> -->
                    <button  name="confirmar" class="btn btn-success float-right">Confirmar</button>

                </div>
                  <input type="hidden" name="titulo" value="<?=$titulo?>"/>
                  <input type="hidden" name="asunto" value="<?=$asunto?>"/>
                  <input type="hidden" name="fecha" value="<?=$fecha?>"/>
                  
                  <input type="hidden" name="opciones" value="<?=$option?>" />

            </form>
          
        </div>

        
  </div>
 
 
