

<?php require("../base/header.php") ?>

    <?php 
      $titulo="";
      $asunto="";
   
      
      if(isset($_GET['fecha'])){
        
        $titulo = $_GET['titulo'];
        $asunto = $_GET['asunto'];

        
      }
      
    
    ?>
    
  <div class="container col-12 d-flex align-items-center justify-content-center"
        style="height: 94vh";> 
    <div class="shadow-lg p-5 mb-4 bg-white rounded-lg col-sm-12 col-lg-6">
      <form method="GET" action="asignacionOpciones.php">
              <div class="col-12 mt-0 pl-3 mb-4">
                  <h1 class="text-left h1">Creación de votación</h1>
              </div>
              <div class="col-12 ml-1 mb-4"> 
                  <lable class="text-left h4" for="título">Título</lable>
                  <input class="rounded-lg h-60 bg form-control" 
                  style="background-color: #ffff; font-size: 20px; height: 60px; margin-top: 5px"
                  type="text" name="titulo" maxlength="200" value="<?=$titulo?>" placeholder="Ejemplo: Elección de presidente de la junta de vecinos" required/> 
              </div>
              <div class="col-12 ml-1 mb-5"> 
                  <lable class="text-left h4" for="asunto">Asunto</lable>
                  <textarea rows="2" class="pt-2 form-control rounded-lg"  id="textarea"
                  style="background-color: #ffff; resize: none; font-size: 20px; height: 120px; margin-top: 5px "
                  maxlength="255" type="textarea" name="asunto" placeholder="Ejemplo: Votación para escoger presidente de la junta de vecinos" required><?=$asunto?></textarea> 
              </div>
              <div class="col-12 ml-1 mb-4"
                    style="font-size: 26px;"> 
                  <label for="opciones">Número de opciones de la votación: </label>

                  <select class="form-select form-select-lg ml-3 mb-4" name="opcion" id="opciones">
                      <option  value=2>2</option>
                      <option  value=3>3</option>
                      <option  value=4>4</option>
                  </select>
                  
              </div>
              <div class="col-12 ml-1 mb-4" style="font-size:26px;">
                  <label for="fecha">Fecha de término de la votación:   </label>

                  <input class="ml-3" type="datetime-local" id="fecha" name="fecha"
                  style="font-size:20px;"
                  name="meeting-time" min="" max="" required>

              </div>
              <div class="col-12 ">
                  <button type="submit" style="width: 100px; border:none;"
                  class="btn btn-success float-right " name="siguiente" >Siguiente</button>
              </div>
              
              
              <script src="fechaMinima.js"></script>
                
              
          </div>
      </form>      
      
  </div>
 

  <?php require("../base/footer.php") ?>