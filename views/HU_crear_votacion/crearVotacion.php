

<?php require("../base/header.php") ?>

    <div class="container col-12 my-2 my-md-5"
        >
        <div class="container my-2 my-md-5 shadow-lg p-3 p-md-5  bg-white rounded-lg col-12 col-xl-6 ">
        <form method="GET" action="asignacionOpciones.php">
                <div class="col-12 mt-3 mt-md-0 pl-3 mb-4 text-center text-md-left">
                    <h1 class="h1">Creación de votación</h1>
                </div>
                <div class="col-12 ml-1 mb-4 text-center text-md-left"> 
                    <lable class=" h4 mb-2" for="título">Título</lable>
                    <input class="rounded-lg h-60 bg form-control  mt-2" 
                    style="background-color: #ffff; font-size: 20px; height: 60px; margin-top: 5px"
                    type="text" name="titulo" maxlength="200" placeholder="Ejemplo: Elección de presidente de la junta de vecinos" required/> 
                </div>
                <div class="col-12 ml-1 mb-5 text-center text-md-left"> 
                    <lable class=" h4" for="asunto">Asunto</lable>
                    <textarea rows="2" class="pt-2 col-12 form-control rounded-lg mt-2"  id="textarea"
                    style="background-color: #ffff; resize: none; font-size: 20px; height: 120px; margin-top: 5px "
                    maxlength="255" type="textarea" name="asunto" placeholder="Ejemplo: Votación para escoger presidente de la junta de vecinos" required></textarea> 
                </div>
                <div class="col-12 mb-4 row"
                        style="font-size: 23.8px;"> 
                    <label for="opciones" class="text-center col-md-6 col-12">Número de opciones de la votación: </label>
                   
                    <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                        <select class="form-select form-select-lg ml-2 " name="opcion" id="opciones">
                            <option  value=2>2</option>
                            <option  value=3>3</option>
                            <option  value=4>4</option>
                        </select>
                    </div>
                    
                    
                </div>
                <div class="col-12 mr-0 row" style="font-size:26px;">
                    <label for="fecha" class="text-center col-md-6 col-12  " >Fecha de término de la votación:   </label>

                    <div class="col-md-6 ml-3 ml-md-0  mt-md-0 mt-2 col-sm-12 d-flex align-items-center justify-content-center">
                        <input type="datetime-local" id="fecha" name="fecha"
                        style="font-size:20px;"
                        name="meeting-time" min="" max="" required>   
                     </div>
                    

                </div>

                <div class="col-12 d-flex justify-content-center justify-content-md-end mt-4 mt-md-5">
                    <button type="submit" style="width: 100px; border:none;"
                    class="btn btn-success " name="siguiente" >Siguiente</button>
                </div>
                
                
                <script src="fechaMinima.js"></script>
                    
                
            </div>
         </form>      
        
       </div>
    </div>
 

  <?php require("../base/footer.php") ?>