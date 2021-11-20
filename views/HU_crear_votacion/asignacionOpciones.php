

<?php  
    require("../base/header.php");
    
    
   $numeroName = 0; 
   $numeroOpcion = 1;
   const boton = false;

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
        
        <div class="shadow-lg p-5 mb-4 bg-white rounded-lg col-sm-12 col-lg-6">
        
            <form id="form" method="GET" action=""> 
              <div class="col-12 pl-2 mb-5">
                <h1 class="h1">Asignación de opciones</h1>
              </div>

                <?php 
                  for($i=0;$i<$option;$i++){
                    echo '<div class="col-12 pl-2 mb-3"><input class="form-control rounded-lg"  style="background-color: #ffff; font-size: 20px; height: 60px;"  type="text" name="opcion'.$numeroName++.'" placeholder="opción'.$numeroOpcion++.'" required></div><br>';
                    
                  }

                  if($option==3){
                    echo '<style>.asignarOpciones{ height: 320px;}</style>';
                  }else if($option==4){
                    echo '<style>.asignarOpciones{ height: 380px;}</style>';
                  }

                ?>
              

                <div class="col-12 pl-2">
                    <button name="atras" class="btn btn-success float-left" onclick="actionForm(this.form.id, 'crearVotacion.php'); return false;" >Atras</button>
                    <button  name="confirmar" class="btn btn-success float-right" onclick="actionForm(this.form.id, 'consultas.php'); return false;"  >Confirmar</button>

                    <script>
                      function actionForm(form, act)
                      {
                          document.getElementById(form).action=act;
                          document.getElementById(form).submit();
                      }
                    </script>

                </div>

                  <input type="hidden" name="titulo" value="<?=$titulo?>"/>
                  <input type="hidden" name="asunto" value="<?=$asunto?>"/>
                  <input type="hidden" name="fecha" value="<?=$fecha?>"/>
                  
                  <input type="hidden" name="opciones" value="<?=$option?>" />


            </form>
          
        </div>

        
  </div>
 
 
