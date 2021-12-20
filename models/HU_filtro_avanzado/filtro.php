<?php
if (isset($_GET['enviar'])) {
    $busqueda = $_GET['busqueda'];
    $fechaInicio = $_GET['desde'];
    $fechaTermino = $_GET['hasta'];

    //Si la fecha de termino es menor a la fecha de inicio va a mostrar un mensaje de error 
    if ($fechaInicio > $fechaTermino) {
        session_id("mensaje");
        session_start();
        $_SESSION['mensaje'] = 'Rango de fechas inválido';
        $_SESSION['sub_mensaje'] = 'Por favor ingrese una fecha de inicio mayor o igual a la fecha de término en su búsqueda!';
        $_SESSION['tipo'] = 'danger';
        session_write_close();
        header('Location: ../HU_listar_terminadas/terminadas.php');
    }


    //Formulario entrega todos los datos del buscador
    if ((strlen($_GET['desde']) > 0) && (strlen($_GET['hasta']) > 0) && (strlen($_GET['busqueda']) > 0)) {
        $buscadorSQL = $con->query("SELECT *, max(opcion.cantidad_votos) as 'ganador' from votacion, opcion WHERE votacion.id = opcion.votacion_id and (votacion.titulo LIKE '%$busqueda%' or votacion.asunto LIKE '%$busqueda%' or opcion.nombre LIKE '%$busqueda%') and votacion.fecha_termino BETWEEN ('$fechaInicio' and '$fechaTermino') and votacion.fecha_termino <= '$fechaActual' and votacion.activa = 1 group by votacion.id ORDER BY `ganador` DESC;");
        //Impresion de la card que cumple las condiciones o mensaje de que no se ingresaron bien los valores
        if (mysqli_num_rows($buscadorSQL) <= 1) {
            $count_results = mysqli_num_rows($buscadorSQL);
        } else {
            $count_results = 0;
        }
    }


    //Formulario entrega solamente fechas
    if ((strlen($_GET['desde']) > 0) && (strlen($_GET['hasta']) > 0) && (strlen($_GET['busqueda']) == 0)) {
        $buscadorSQLFecha = $con->query("SELECT *, max(opcion.cantidad_votos) as 'ganador' from votacion, opcion WHERE votacion.id = opcion.votacion_id 
        and votacion.fecha_termino >= '$fechaInicio' and votacion.fecha_termino <= '$fechaTermino' and votacion.fecha_termino <= '$fechaActual' 
        and votacion.activa = 1 group by votacion.id ORDER BY `ganador` DESC;");
    }


    //Buscador entrega solamente una palabra u oracion
    if ((strlen($_GET['desde']) == 0) && (strlen($_GET['hasta']) == 0) && (strlen($_GET['busqueda']) > 0)) {
        $buscadorSQL = $con->query("SELECT *, max(opcion.cantidad_votos) as 'ganador' from votacion, opcion WHERE votacion.id = opcion.votacion_id and (votacion.titulo LIKE '%$busqueda%' or votacion.asunto LIKE '%$busqueda%' or opcion.nombre LIKE '%$busqueda%') and votacion.fecha_termino < '$fechaActual' and votacion.activa = 1 group by votacion.id ORDER BY `ganador` DESC;");
        //Impresion de la card que cumple las condiciones o no se encuentra ninguna
        if (mysqli_num_rows($buscadorSQL) <= 1) {
            $count_results = mysqli_num_rows($buscadorSQL);
        } else {
            $count_results = 0;
        }
    }


    //No se envia ningun valor dentro del formulario, Mensaje de error
    if ((strlen($_GET['desde']) == 0) && (strlen($_GET['hasta']) == 0) && (strlen($_GET['busqueda']) == 0)) {
        session_id("mensaje");
        session_start();
        $_SESSION['mensaje'] = 'Ningún valor ingresado';
        $_SESSION['sub_mensaje'] = 'Por favor ingrese valores válidos para su búsqueda!';
        $_SESSION['tipo'] = 'danger';
        session_write_close();
        header('Location: ../../views/HU_listar_terminadas/terminadas.php');
    }
}
