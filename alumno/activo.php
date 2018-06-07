<?php

include '../conexion.php';

/* comprobar la conexión */

if (mysqli_connect_errno()) {
    $error=mysqli_connect_error();
    echo json_encode(array('mensaje' => "Falló la conexión: $error", 'error' => "True"));
    exit();
}

//Obtenemos la información de turno y grado del alumno
$turno = $_POST['turno'];
$grado = $_POST['grado'];
$grado = intval($grado);

//Se transforma el turno en un valor numerico para la búsqueda en la BD
if ($turno == "matutino") {
    $turno = 1000000;
}elseif ($turno == "vespertino") {
    $turno = 2000000;
}

//El array es para ir llevando el rango de las pregutas por seccion para un mismo grupo
$array = array();
//Generamos la consulta la cual va a buscar coincidencia en el grado y asegurando que las preguntas sean las adecuadas para el turno
$prueba = 'SELECT * FROM secciones WHERE grado = '.$grado.' AND active = 1 AND last > '.$turno.'';
if(mysqli_multi_query($link, $prueba)){
    do{
        if ($resul = mysqli_use_result($link)) {
            while ($fila = mysqli_fetch_row($resul)) {
                //Añadimos el resultado devuelto a un array con toda la información
                array_push($array, array('id' => "$fila[5]", 'noPreguntas' => "$fila[1]", 'pinicio' => "$fila[2]", 'pfinal' => "$fila[4]"));
            }
            mysqli_free_result($resul);
        }
        if(mysqli_more_results($link)){
            printf("----------------\n");
        }
    }while (mysqli_next_result($link));
}
else{
    $error = mysqli_error($link);
    echo json_encode(array('mensaje' => $error, 'error' => "True"));
    printf("Errormessage: %s\n", mysqli_error($link));
}
//Devlvemos el array con toda la informacion de secciones
echo json_encode($array);
mysqli_close($link);
 ?>
