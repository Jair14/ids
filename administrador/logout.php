<?php
include 'conexion.php'; //Incluimos la conexión
// Establecemos las variables de sesión
$user =   $_SESSION['user'];
$password = $_SESSION['pasw'] ;
echo $user;
echo $password;
$ses= $con->query("UPDATE administracion SET session = 0 WHERE  Usuario = '$user' AND Password = '$password'"); // Actualizamos los valores de la sesión activa
$_SESSION = array(); // Creamos un arreglo con las sesiones creadas
session_destroy(); // Destruimos las sesiones
header("location: index.php"); // Redireccionamos al index
 ?>
