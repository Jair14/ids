<?php  @session_start(); // Iniciamos una sesión
  $con = mysqli_connect('localhost', 'root', '', 'examen'); // Establecemos la variable de conexión
  $r = $con->query("SET NAMES utf8"); // Escapamos los caracteres especiales
 ?>
