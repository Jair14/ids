<?php

include '../conexion.php';

/* comprobar la conexión */

if (mysqli_connect_errno()) {
    $error=mysqli_connect_error();
    echo json_encode(array('mensaje' => "Falló la conexión: $error", 'error' => "True"));
    exit();
}
$turno = $_POST['turno'];
$grado = $_POST['grado'];

$array = array();
$prueba = "SELECT * FROM division_examen WHERE '$grado' = grado AND '$turno' = turno AND 's' = activo";
    if(mysqli_multi_query($link, $prueba)){
        do{
            if ($resul = mysqli_use_result($link)) {
                while ($fila = mysqli_fetch_row($resul)) {
                    echo json_encode(array('id' => "$fila[0]", 'pinicio' => "$fila[4]", 'pfinal' => "$fila[5]"));
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
mysqli_close($link);

 ?>
