<?php

// Obtener titulo y asunto de la votación
$id = $row["id"];  
$queryVotacion = "SELECT * FROM votacion WHERE id = $id";
$resultVotacion = mysqli_query($con, $queryVotacion);

$fila = mysqli_fetch_array($resultVotacion);
$titulo = $fila["titulo"];
$asunto = $fila["asunto"];
$fecha = $fila["fecha_termino"];


$fechaFormateada = explode(' ', $fecha);
$fechaNueva = $fechaFormateada[0].'T'.$fechaFormateada[1];


?>

<!-- Modal -->
<div class="modal fade" id=<?= "modalEditar".$contador ?> tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" >
        <div class="modal-content" style="z-index: 2">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"> Editar votación </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" action="../HU_editarVotacion/editarConsultas.php">
                <div class="modal-body">

                        <!-- TITULO -->
                    
                        <div class="col-12 ml-1 mb-2 text-center text-md-left"> 
                            <lable class="h4 mb-2" for="título">Título</lable>
                            <input class="rounded-lg col-12 h-20 bg form-control  mt-2" 
                            style="background-color: #ffff; font-size: 20px; height: 60px; margin-top: 5px"
                            type="text" name="titulo" maxlength="200" value="<?= $titulo?>" required/> 

                        </div>
                
                        <!-- ASUNTO -->

                    <div class="col-12 ml-1 pb-3 text-center text-md-left"> 
                        <lable class=" h4" for="asunto">Asunto</lable>
                        <textarea rows="2" class="pt-2 col-12 form-control rounded-lg mt-2"  id="textarea"
                        style="background-color: #ffff; resize: none; font-size: 20px; height: 120px; margin-top: 5px "
                        maxlength="255" type="textarea" name="asunto" placeholder="Ejemplo: Votación para escoger presidente de la junta de vecinos" required><?=$asunto?></textarea> 
                    </div>

                        <!-- FECHA TERMINO -->

                    <div class="col-12 ml-1 mt-0 row " style="font-size:26px;">
                        <label for="fecha" class="text-center col-md-6 col-12  " >Fecha de término de la votación:   </label>

                        <div class="col-md-6 ml-3 ml-md-0 mt-md-0 mt-2 col-sm-12 d-flex align-items-center justify-content-center">
                            <input type="datetime-local" id="fecha" name="fecha"
                            style="font-size:20px;" value="<?=$fechaNueva?>"
                            name="meeting-time" min="" max="" required>   
                        </div>

                    </div>

                    <!-- ESTADO DE LA VOTACION -->

                    <div class="col-12 ml-1 mt-0 row" style="font-size:26px;">
                        <label for="fecha" class="text-center col-md-6 col-12">Estado de la votación</label>
                        
                        <div class="col-md-6 ml-3 ml-md-0 mt-md-0 mt-2 col-sm-12 d-flex align-items-center justify-content-center">
                            <select class="form-select pl-2 pr-2" aria-label="Default select example" name="estado" style="font-size:20px;">
                                
                                <option value="1">Activa</option>
                                <option value="2">No Activa</option>
                                
                            </select>
                        </div>
                        
                    </div>
                

                </div>

                    <input type="hidden" name="id" value="<?=$id?>"/>
                    <!-- BOTON EDITAR -->

                    <div class="modal-footer d-flex col-12 justify-content-center">
                            <button type="submit" name="editar" class="btn btn-success col-4 ">Editar</button>
                    </div>
                   
                   
            </form>
           
        </div>
        <script src="../HU_crear_votacion/fechaMinima.js"></script>
    </div>
</div>