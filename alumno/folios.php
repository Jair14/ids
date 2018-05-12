<?php

include '../conexion.php';

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    $error=mysqli_connect_error();
    echo json_encode(array('mensaje' => "Falló la conexión: $error", 'error' => "True"));
    exit();
}
$primera = $_GET['first'];
$ultima = $_GET['last'];
$array = array();
$prueba = "SELECT Id_pregunta FROM materias WHERE Id_pregunta BETWEEN '$primera' AND '$ultima'";
    if(mysqli_multi_query($link, $prueba)){
        do{
            if ($resul = mysqli_use_result($link)) {
                while ($fila = mysqli_fetch_row($resul)) {
                    array_push($array, $fila[0]);
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

echo json_encode($array);
mysqli_close($link);
?>
