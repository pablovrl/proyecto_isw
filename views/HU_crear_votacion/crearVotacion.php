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
    
    
  <div class="container d-flex align-items-center justify-content-center formularioContainer"> 
    <div class="formulario">
      <form method="GET" action="asignacionOpciones.php">
              <div class="creacionForm">
                  <h1 class="text-left">Creación Formulario</h1>
              </div>
              <div class="div-inputTitulo"> 
                  <input class="inputTitulo form-control" type="text" name="titulo"  value="<?=$titulo?>" onpaste="return false" placeholder="Introduzca el titulo de la votación..." required/> 
              </div>
              <div class="div-inputAsunto"> 
                  <textarea rows="2" class="inputAsunto form-control" type="textarea" name="asunto" placeholder="Introduzca el asunto de la votación..." required><?=$asunto?></textarea> 
              </div>
              <div class="div-selectOpciones"> 
                  <label for="opciones">Cantidad de opciones: </label>

                  <select class="form-select form-select-lg mb-3" name="opcion" id="opciones">
                      <option value=2>2</option>
                      <option value=3>3</option>
                      <option value=4>4</option>
                  </select>
              </div>
              <div class="div-fecha">
                  <label for="fecha">Fecha de termino:   </label>

                  <input type="datetime-local" id="fecha" name="fecha"
                  name="meeting-time" min="" max="" value=<?=$fecha?> required>

              </div>
              <div class="div-buttonSiguiente">
                  <button type="submit" class="btn btn-success" name="siguiente" >Siguiente</button>
              </div>
              
              <script src="fechaMinima.js"></script>
                
          </div>
      </form>      
      
  </div>

  <?php require("../base/footer.php") ?>