<?php
include 'conexion.php';

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

        $usuario=$_POST['usuario'];
        $password=$_POST['password'];


        $prueba = "SELECT * FROM Administracion where '$usuario' = Usuario  and '$password' = Password";
        if(!mysqli_query($link, $prueba)){
        printf("Errormessage: %s\n", mysqli_error($link));
        }
        else{
            $resul = mysqli_use_result($link)
            $fila = mysqli_fetch_row($resul);
            echo $fila[0];
            echo $fila[1];
            mysqli_free_result($resul);
          /*header( "refresh: 0.1;url=administrador/index.html" );*/
        }

mysqli_close($link);
 ?>
