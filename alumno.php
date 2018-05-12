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
    $opc = True;
    include 'conexion.php';
    /* comprobar la conexión */
    if (mysqli_connect_errno()) {
        printf("Falló la conexión: %s <br>", mysqli_connect_error());
        exit();
    }
    $password = $_POST['alum_password'];
    $verifica = $_POST['verify'];
    $prueba = "SELECT * FROM alumnos where '$password' = Folio";
    if(mysqli_multi_query($link, $prueba)){
        if ($resul = mysqli_use_result($link)) {
            if ($fila = mysqli_fetch_row($resul)) {
                if($fila[0] == $password && $verifica == $password){
                    header( "refresh: 0.1;url=alumno/index.html?folio=$password" );
                }
            }
            else {
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
    <?php if(!($password==$verifica)):?>
        <?php $opc = False;?>
        <script type="text/javascript">
            swal(
                'Error',
                'Su folio no coincide, inténtelo nuevamente',
                'error'
            ).then(function(){
                window.location.href = "index.html"
            });
        </script>
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
