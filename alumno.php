<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="images/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plantel Azteca</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
<?php
    //LA variable opc se usa para saber si está en la bd
    $opc = True;
    include 'conexion.php';
    /* comprobar la conexión */
    if (mysqli_connect_errno()) {
        printf("Falló la conexión: %s <br>", mysqli_connect_error());
        exit();
    }
    //Obtemos la matricula y la confirmación de la misma
    $password = $_POST['alum_password'];
    $verifica = $_POST['verify'];
    //Se genera la consulta a la BD para saber si la matrícula existe
    $prueba = "SELECT * FROM alumnos where '$password' = Folio";
    if(mysqli_multi_query($link, $prueba)){
        if ($resul = mysqli_use_result($link)) {
            if ($fila = mysqli_fetch_row($resul)) {
                //Se usa el resultado para comprobar que todo sea igual y se verifica para evitar errores
                if($fila[0] == $password && $verifica == $password){
                    //Al final se redirecciona a alumno/index.html y se manda una variable de url con la matricula del alumno
                    header( "refresh: 0.1;url=alumno/index.html?folio=$password" );
                }
            }
            else {
                //Normalmente esto pasará para acá cuando no se encuentre en la BD
                //Será modificado para poder mandar el error indicado
                $opc = False;
            }
        }
        mysqli_free_result($resul);
    }
    else{
        printf("Errormessage: %s <br>", mysqli_error($link));
    }
    mysqli_close($link);
?>
</head>
<body>
    <!-- Se comprobara que la matricula y verificación sean iguales sino se manda el error-->
    <?php if(!($password==$verifica)):?>
        <?php $opc = False;?>
        <script type="text/javascript">
            swal(
                'Error',
                'Su matrícula no coincide, inténtelo nuevamente',
                'error'
            ).then(function(){
                window.location.href = "index.html"
            });
        </script>
        <!-- De ser iguales entonces se pasa a ver si existe en la BD para poder
        Mandar el error adecuado-->
    <?php elseif(!$opc):?>
        <script type="text/javascript">
            swal(
                'Error',
                'No encontrado en la base de datos, inténtelo nuevamente',
                'error'
            ).then(function(){
                window.location.href = "index.html"
            });
        </script>
    <?php endif; ?>
</body>
</html>
