<?php include '../conexion.php'; ?>
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
    <?php $respuestas = $_POST["enviar_calificacion"]; ?>
    <?php if (mysqli_connect_errno()) {
       printf("Falló la conexión: %s <br>", mysqli_connect_error());
       exit();
    }

    for ($i=0; $i < sizeof($respuestas); $i++) {
        $respuestas_c = $respuestas[$i];
        $prueba = "INSERT INTO calificacion VALUES ('$respuestas_c[0]','$respuestas_c[1]', '$respuestas_c[2]','$respuestas_c[3]', '$respuestas_c[4]', '$respuestas_c[5]')";
        if(!mysqli_query($link, $prueba)){
        printf("Error en la pregunta %d Errormessage: %s <br>", ($i+1),mysqli_error($link));
        }
    }
    mysqli_close($link);
    ?>
    <script type="text/javascript">
        swal("Buen trabajo!", "Se han guardado los datos exitosamente", "success");
    </script>
    <?php
    header("refresh: 5.0; url=calif.html");
     ?>
</body>
</html>
