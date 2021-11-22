

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
    <style>
        @media (min-width: 600px) {
            .res {
                height: 90vh;
            }
        }
    </style>

<div class="container col-12 d-flex align-items-center justify-content-center res">  
        
        <div class="container  my-md-5 shadow-lg p-3 p-md-5  bg-white rounded-lg col-12 col-xl-6">
        
            <form id="form" method="GET" action="consultas.php"> 
              <div class="col-12 pl-2 mt-3 mt-md-0 mb-5 text-md-left text-center">
                <h1 class="h1">Asignación de opciones</h1>
              </div>

                <?php 
                  for($i=0;$i<$option;$i++){
                    echo '<div class="col-12 pl-2 mt-3"><input class="form-control rounded-lg"  style="background-color: #ffff; font-size: 20px; height: 55px;"  type="text" name="opcion'.$numeroName++.'" placeholder="opción'.$numeroOpcion++.'" required></div><br>';
                    
                  }

                  if($option==3){
                    echo '<style>.asignarOpciones{ height: 320px;}</style>';
                  }else if($option==4){
                    echo '<style>.asignarOpciones{ height: 380px;}</style>';
                  }

                ?>
              

                <div class="col-12 d-flex justify-content-center top justify-content-md-end mt-2 mb-2 ">
                    
                    <button  name="confirmar" class="btn btn-success float-right"  >Confirmar</button>

                </div>

                  <input type="hidden" name="titulo" value="<?=$titulo?>"/>
                  <input type="hidden" name="asunto" value="<?=$asunto?>"/>
                  <input type="hidden" name="fecha" value="<?=$fecha?>"/>
                  
                  <input type="hidden" name="opciones" value="<?=$option?>" />

                  
            </form>
          
        </div>

        
  </div>
 
 
