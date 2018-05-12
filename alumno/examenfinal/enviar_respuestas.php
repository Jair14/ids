<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../images/logo.png">
	<title>Evaluación</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="css/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
</head>
<body>
<?php
$folio_alumno = $_POST['folio'];
$respuestas = $_POST['respuestas'];

$opcion = array();
$combinaciones = array("_a", "_b", "_c", "_d");
/*55234776*/
for ($i=0; $i < count($respuestas); $i++) {
    $help = $respuestas[$i];
    for($k = 0; $k < strlen($help[2]); $k++){
        $help2 = $help[2];
        if($help2[$k] == '_'){
            $opcion[$i] = $help2[$k+1];
            $respuestas[$i][2] = str_replace($combinaciones, "", $help[2]);
        }
    }
}

include '../../conexion.php';


if (mysqli_connect_errno()) {
   printf("Falló la conexión: %s <br>", mysqli_connect_error());
   exit();
}

for ($i=0; $i < count($respuestas); $i++) {
    $row = $respuestas[$i];
    $prueba = "INSERT INTO Respuestas_alumno VALUES ('$folio_alumno','$row[1]', '$opcion[$i]','$row[2]')";
    if(!mysqli_query($link, $prueba)){
    printf("Error en la pregunta %d \n Errormessage: %s\n", ($i+1),mysqli_error($link));
    }
}
mysqli_close($link);
?>
<script type="text/javascript">
    swal("Buen trabajo!", "Haz completado la prueba, en un momento se te redireccionará", "success");
</script>
<?php
header("refresh: 5.0; url=../../index.html");
 ?>
</body>
</html>
