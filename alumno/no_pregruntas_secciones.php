<?php
include '../conexion.php';
/* comprobar la conexión */
if (mysqli_connect_errno()) {
    //cualquier error lo guardamos a una variable y lo resegresamos a el documento
    $error = mysqli_connect_error();
    echo json_encode(array('mensaje' => "Falló la conexión: $error", 'error' => "True"));
    exit();
}
$ids = $_GET['identificador'];
$array = array();
for ($i=0; $i < count($ids); $i++) {
    $prueba = "SELECT seccion, no_preguntas FROM secciones WHERE id = '$ids[$i]' ";
    if(mysqli_multi_query($link, $prueba)){
        do {
            if ($resul = mysqli_use_result($link)) {
                while ($fila = mysqli_fetch_row($resul)) {
                    array_push($array, array("$fila[0]", "$fila[1]"));
                }
                mysqli_free_result($resul);
            }
            if(mysqli_more_results($link)){
                printf("----------------\n");
            }
        } while (mysqli_next_result($link));
    }
    else{
        $error = mysqli_error($link);
        echo json_encode(array('mensaje' => $error, 'error' => "True"));
        printf("Errormessage: %s\n", mysqli_error($link));
    }
}
echo json_encode($array);
mysqli_close($link);
 ?>
