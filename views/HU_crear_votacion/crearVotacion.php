<?php require("../base/header.php") ?>

    <?php 
      $titulo="";
      $asunto="";
      $fecha="";

      
      if(isset($_GET['fecha'])){
        
        $titulo = $_GET['titulo'];
        $asunto = $_GET['asunto'];
        $fecha = $_GET['fecha'];
      }
      
    
    ?>
    
    
  <div class="container col-12 d-flex align-items-center justify-content-center"
        style="height: 94vh";> 
    <div class="shadow-lg p-3 mb-5 bg-white rounded-lg col-sm-12 col-lg-7">
      <form method="GET" action="asignacionOpciones.php">
              <div class="col-12 mt-1 pl-3 mb-3">
                  <h1 class="text-left h1">Creación Formulario</h1>
              </div>
              <div class="col-12 ml-1 mb-3"> 
                  <input class="rounded-lg h-60 bg form-control" 
                  style="background-color: #ffff; font-size: 20px; height: 60px;"
                  type="text" name="titulo"  value="<?=$titulo?>" onpaste="return false" placeholder="Introduzca el titulo de la votación..." required/> 
              </div>
              <div class="col-12 ml-1 mb-3"> 
                  <textarea rows="2" class="pt-2 form-control rounded-lg" 
                  style="background-color: #ffff; resize: none; font-size: 20px; height: 120px; "
                  type="textarea" name="asunto" placeholder="Introduzca el asunto de la votación..." required><?=$asunto?></textarea> 
              </div>
              <div class="col-12 ml-1 mb-3"
                    style="font-size: 26px;"> 
                  <label for="opciones">Cantidad de opciones: </label>

                  <select class="form-select form-select-lg ml-3 mb-3" name="opcion" id="opciones">
                      <option value=2>2</option>
                      <option value=3>3</option>
                      <option value=4>4</option>
                  </select>
              </div>
              <div class="col-12 ml-1 mb-3" style="font-size:26px;">
                  <label for="fecha">Fecha de termino:   </label>

                  <input class="ml-3" type="datetime-local" id="fecha" name="fecha"
                  style="font-size:20px;"
                  name="meeting-time" min="" max="" value=<?=$fecha?> required>

              </div>
              <div class="col-12">
                  <button type="submit" style="width: 100px; border:none;"
                  class="btn btn-success float-right" name="siguiente" >Siguiente</button>
              </div>
              
              <script src="fechaMinima.js"></script>
                
          </div>
      </form>      
      
  </div>

  <?php require("../base/footer.php") ?>